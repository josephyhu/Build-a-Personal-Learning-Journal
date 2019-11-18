<?php
/**
 * Selects id, title, date, and tags from all entries ordered first by date in descending order then by id in descending order limited by $limit per page and starting at $offset.
 *
 * @param int $limit The number of entries per page.
 * @param int $offset The number the entries should start from per page.
 */
function get_entry_list($limit, $offset) {
    include 'connection.php';

    $sql = "SELECT id, title, date, tags FROM entries ORDER BY date DESC, id DESC LIMIT ? OFFSET ?";
    try {
        $results = $db->prepare($sql);
        $results->bindValue(1, $limit, PDO::PARAM_INT);
        $results->bindValue(2, $offset, PDO::PARAM_INT);
        $results->execute();
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage() . "<br>";
        return array();
    }
    return $results->fetchAll();
}

/**
 * Selects id, title, date, and tags from all entries whos tags match $tag with anything at the start or the end of it ordered first by date in descending order then by id in descending order limited by $limit per page and starting at $offset.
 *
 * @param int $limit The number of entries per page.
 * @param int $offset The number the entries should start from per page.
 */
function get_entry_list_by_tag($tag, $limit, $offset) {
    include 'connection.php';

    $sql = "SELECT id, title, date, tags FROM entries WHERE tags LIKE '%$tag%' ORDER BY date DESC, id DESC LIMIT ? OFFSET ?";
    try {
        $results = $db->prepare($sql);
        $results->bindValue(1, $limit, PDO::PARAM_INT);
        $results->bindValue(2, $offset, PDO::PARAM_INT);
        $results->execute();
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage() . "<br>";
        return array();
    }
    return $results->fetchAll();
}

/**
 * Selects everything from a specific entry with id matching $id.
 *
 * @param int $id The entry id.
 */
function get_entry($id) {
    include 'connection.php';

    $sql = "SELECT * FROM entries WHERE id = ?";
    try {
        $results = $db->prepare($sql);
        $results->bindValue(1, $id, PDO::PARAM_INT);
        $results->execute();
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage() . "<br>";
        return false;
    }
    return $results->fetch();
}

/**
 * Selects id, title, date, and tags from all entries whos titles match $search with anything at the start or the end of it ordered first by date in descending order then by id in descending order limited by $limit per page and starting at $offset.
 *
 * @param int $limit The number of entries per page.
 * @param int $offset The number the entries should start from per page.
 */
function search_entries($search, $limit, $offset) {
    include 'connection.php';


    $sql = "SELECT id, title, date, tags FROM entries WHERE title LIKE '%$search%' ORDER BY date DESC LIMIT ? OFFSET ?";
    try {
        $results = $db->prepare($sql);
        $results->bindValue(1, $limit, PDO::PARAM_INT);
        $results->bindValue(2, $offset, PDO::PARAM_INT);
        $results->execute();
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage() . "<br>";
        return array();
    }
    return $results->fetchAll();
}

/**
 * Counts the number of entries whose titles match $search with anything at the start and the end of it.
 */
function count_entries($search) {
    include 'connection.php';

    $sql = "SELECT COUNT(*) FROM entries WHERE title LIKE '%$search%'";
    try {
        $results = $db->prepare($sql);
        $results->execute();
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage() . "<br>";
        return false;
    }
    return $results->fetchColumn();
}

/**
 * Adds a new entry.
 *
 * @param string $title The title of the entry.
 * @param string $date The date the entry was posted.
 * @param int $time The time spent learning.
 * @param string $timeUnits The hour(s) or the minute(s).
 * @param mixed $learned What the user has learned.
 * @param mixed $resources The resources the user used for their post.
 * @param mixed $tag The tags for the entry.
 */
function add_entry($title, $date, $time, $timeUnits, $learned, $resources, $tag) {
    include 'connection.php';

    $sql = 'INSERT INTO entries (title, date, time_spent, time_units, learned, resources, tags) VALUES (?, ?, ?, ?, ?, ?, ?)';
    try {
        $results = $db->prepare($sql);
        $results->bindValue(1, $title, PDO::PARAM_STR);
        $results->bindValue(2, $date, PDO::PARAM_STR);
        $results->bindValue(3, $time, PDO::PARAM_INT);
        $results->bindValue(4, $timeUnits, PDO::PARAM_STR);
        $results->bindValue(5, $learned, PDO::PARAM_LOB);
        $results->bindValue(6, $resources, PDO::PARAM_LOB);
        $results->bindValue(7, $tag, PDO::PARAM_LOB);
        $results->execute();
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage() . "<br>";
        return false;
    }
    return true;
}

/**
 * Edits an existing entry.
 *
 * @param string $title The title of the entry.
 * @param string $date The date the entry was edited.
 * @param int $time The time spent learning.
 * @param string $timeUnits The hour(s) or the minute(s).
 * @param mixed $learned What the user has learned.
 * @param mixed $resources The resources the user used for their post.
 * @param mixed $tag The tags for the entry.
 * @param int $id The entry id.
 */
function edit_entry($title, $date, $time, $timeUnits, $learned, $resources, $tag, $id) {
    include 'connection.php';

    $sql = 'UPDATE entries SET title = ?, date = ?, time_spent = ?, time_units = ?, learned = ?, resources = ?, tags = ? WHERE id = ?';
    try {
        $results = $db->prepare($sql);
        $results->bindValue(1, $title, PDO::PARAM_STR);
        $results->bindValue(2, $date, PDO::PARAM_STR);
        $results->bindValue(3, $time, PDO::PARAM_INT);
        $results->bindValue(4, $timeUnits, PDO::PARAM_STR);
        $results->bindValue(5, $learned, PDO::PARAM_LOB);
        $results->bindValue(6, $resources, PDO::PARAM_LOB);
        $results->bindValue(7, $tag, PDO::PARAM_LOB);
        $results->bindValue(8, $id, PDO::PARAM_INT);
        $results->execute();
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage() . "<br>";
        return false;
    }
    return true;
}

/**
 * Deletes an entry by its id.
 *
 * @param int $id The entry id.
 */
function delete_entry($id) {
    include 'connection.php';

    $sql = 'DELETE FROM entries WHERE id = ?';
    try {
        $results = $db->prepare($sql);
        $results->bindValue(1, $id, PDO::PARAM_INT);
        $results->execute();
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage() . "<br>";
        return false;
    }
    return true;
}

/**
 * Deletes all entries from the site.
 */
function delete_all_entries() {
    include 'connection.php';

    $sql = 'DELETE FROM entries';
    try {
        $results = $db->prepare($sql);
        $results->execute();
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage() . "<br>";
        return false;
    }
    return true;
}
