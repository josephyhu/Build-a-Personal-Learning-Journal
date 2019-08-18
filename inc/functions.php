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

function get_entry($id) {
    include 'connection.php';

    $sql = 'SELECT * FROM entries WHERE id = ?';
    try {
        $results = $db->prepare($sql);
        $results->bindValue(1, $id, PDO::PARAM_INT);;
        $results->execute();
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage() . "<br>";
        return false;
    }
    return $results->fetchAll(PDO::FETCH_ASSOC);
}

function get_entry_by_tag($tag) {
    include 'connection.php';

    $sql = "SELECT * FROM entries WHERE tags LIKE '%$tag%'";
    try {
        $results = $db->query($sql);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage() . "<br>";
        return false;
    }
    return $results->fetchAll(PDO::FETCH_ASSOC);
}

function add_entry($title, $date, $time, $learned, $resources, $tag) {
    include 'connection.php';

    $sql = 'INSERT INTO entries (title, date, time_spent, learned, resources, tags) VALUES (?, ?, ?, ?, ?, ?)';
    try {
        $results = $db->prepare($sql);
        $results->bindValue(1, $title, PDO::PARAM_STR);
        $results->bindValue(2, $date, PDO::PARAM_STR);
        $results->bindValue(3, $time, PDO::PARAM_STR);
        $results->bindValue(4, $learned, PDO::PARAM_LOB);
        $results->bindValue(5, $resources, PDO::PARAM_LOB);
        $results->bindValue(6, $tag, PDO::PARAM_LOB);
        $results->execute();
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage() . "<br>";
        return false;
    }
    return true;
}

function edit_entry($title, $date, $time, $learned, $resources, $tag, $id) {
    include 'connection.php';

    $sql = 'UPDATE entries SET title = ?, date = ?, time_spent = ?, learned = ?, resources = ?, tags = ? WHERE id = ?';
    try {
        $results = $db->prepare($sql);
        $results->bindValue(1, $title, PDO::PARAM_STR);
        $results->bindValue(2, $date, PDO::PARAM_STR);
        $results->bindValue(3, $time, PDO::PARAM_STR);
        $results->bindValue(4, $learned, PDO::PARAM_LOB);
        $results->bindValue(5, $resources, PDO::PARAM_LOB);
        $results->bindValue(6, $tag, PDO::PARAM_LOB);
        $results->bindValue(7, $id, PDO::PARAM_INT);
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
