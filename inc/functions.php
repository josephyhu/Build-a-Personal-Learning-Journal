<?php
function get_entry_list() {
    include 'connection.php';

    try {
        return $db->query('SELECT id, title, date, tags FROM entries ORDER BY date DESC');
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage() . "<br>";
        return array();
    }
}

function get_entry_list_by_tag($tag) {
    include 'connection.php';

    try {
        return $db->query("SELECT id, title, date FROM entries WHERE tags LIKE '%$tag%' ORDER BY date DESC");
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage() . "<br>";
        return array();
    }
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
    return $results->fetchAll(PDO::FETCH_ASSOC);
}

function add_entry($title, $date, $timeH, $timeM, $learned, $resources, $tag) {
    include 'connection.php';

    $sql = 'INSERT INTO entries (title, date, time_spent_h, time_spent_m, learned, resources, tags) VALUES (?, ?, ?, ?, ?, ?, ?)';
    try {
        $results = $db->prepare($sql);
        $results->bindValue(1, $title, PDO::PARAM_STR);
        $results->bindValue(2, $date, PDO::PARAM_STR);
        $results->bindValue(3, $timeH, PDO::PARAM_INT);
        $results->bindValue(4, $timeM, PDO::PARAM_INT);
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

function edit_entry($title, $date, $timeH, $timeM, $learned, $resources, $tag, $id) {
    include 'connection.php';

    $sql = 'UPDATE entries SET title = ?, date = ?, time_spent_h = ?, time_spent_m = ?, learned = ?, resources = ?, tags = ? WHERE id = ?';
    try {
        $results = $db->prepare($sql);
        $results->bindValue(1, $title, PDO::PARAM_STR);
        $results->bindValue(2, $date, PDO::PARAM_STR);
        $results->bindValue(3, $timeH, PDO::PARAM_INT);
        $results->bindValue(4, $timeM, PDO::PARAM_INT);
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
