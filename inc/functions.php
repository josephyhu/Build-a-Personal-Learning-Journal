<?php
function get_entry_list($limit, $offset) {
    include 'connection.php';

    $sql = "SELECT id, title, date, time, tags FROM entries ORDER BY date DESC, time DESC, id DESC LIMIT ? OFFSET ?";
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

function get_entry_list_by_tag($tag, $limit, $offset) {
    include 'connection.php';

    $sql = "SELECT id, title, date, tags FROM entries WHERE tags LIKE '%$tag%' ORDER BY date DESC, time DESC, id DESC LIMIT ? OFFSET ?";
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

function search_entries($search, $limit, $offset) {
    include 'connection.php';


    $sql = "SELECT id, title, date, tags FROM entries WHERE title LIKE '%$search%' ORDER BY date DESC, time DESC, id DESC LIMIT ? OFFSET ?";
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

function add_entry($title, $date, $time, $timeSpent, $timeUnits, $learned, $resources, $tag) {
    include 'connection.php';

    $sql = 'INSERT INTO entries (title, date, time, time_spent, time_units, learned, resources, tags) VALUES (?, ?, ?, ?, ?, ?, ?, ?)';
    try {
        $results = $db->prepare($sql);
        $results->bindValue(1, $title, PDO::PARAM_STR);
        $results->bindValue(2, $date, PDO::PARAM_STR);
        $results->bindValue(3, $time, PDO::PARAM_STR);
        $results->bindValue(4, $timeSpent, PDO::PARAM_INT);
        $results->bindValue(5, $timeUnits, PDO::PARAM_STR);
        $results->bindValue(6, $learned, PDO::PARAM_LOB);
        $results->bindValue(7, $resources, PDO::PARAM_LOB);
        $results->bindValue(8, $tag, PDO::PARAM_LOB);
        $results->execute();
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage() . "<br>";
        return false;
    }
    return true;
}

function edit_entry($title, $date, $time, $timeSpent, $timeUnits, $learned, $resources, $tag, $id) {
    include 'connection.php';

    $sql = 'UPDATE entries SET title = ?, date = ?, time = ?, time_spent = ?, time_units = ?, learned = ?, resources = ?, tags = ? WHERE id = ?';
    try {
        $results = $db->prepare($sql);
        $results->bindValue(1, $title, PDO::PARAM_STR);
        $results->bindValue(2, $date, PDO::PARAM_STR);
        $results->bindValue(3, $time, PDO::PARAM_STR);
        $results->bindvalue(4, $timeSpent, PDO::PARAM_INT);
        $results->bindValue(5, $timeUnits, PDO::PARAM_STR);
        $results->bindValue(6, $learned, PDO::PARAM_LOB);
        $results->bindValue(7, $resources, PDO::PARAM_LOB);
        $results->bindValue(8, $tag, PDO::PARAM_LOB);
        $results->bindValue(9, $id, PDO::PARAM_INT);
        $results->execute();
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage() . "<br>";
        return false;
    }
    return true;
}

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
