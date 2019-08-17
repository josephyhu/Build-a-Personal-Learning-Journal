<?php
function get_entry_list() {
    include 'connection.php';

    try {
        return $db->query('SELECT title, date FROM entries ORDER BY date DESC');
    } catch (Exception $e) {
        echo "Error:" . $e->getMessage() . "<br>";
        return array();
    }
}

function get_entry_details() {
    include 'connection.php';

    try {
        return $db->query('SELECT * FROM entries ORDER BY date DESC LIMIT 1');
    } catch (Exception $e) {
        echo "Error:" . $e->getMessage() . "<br>";
        return array();
    }
}

function add_entry($title, $date, $time, $learned, $resources) {
    include 'connection.php';

    $sql = 'INSERT INTO entries (title, date, time_spent, learned, resources) VALUES(?, ?, ?, ?, ?)';
    try {
        $results = $db->prepare($sql);
        $results->bindValue(1, $title, PDO::PARAM_STR);
        $results->bindValue(2, $date, PDO::PARAM_STR);
        $results->bindValue(3, $time, PDO::PARAM_STR);
        $results->bindValue(4, $learned, PDO::PARAM_STR);
        $results->bindValue(5, $resources, PDO::PARAM_STR);
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
