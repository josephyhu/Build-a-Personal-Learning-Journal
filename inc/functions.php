<?php
function get_entry_list() {
    include 'connection.php';

    try {
        return $db->query('SELECT id, title, date, time_spent,
                          learned, resources FROM entries ORDER BY date DESC');
    } catch (Exception $e) {
        echo "Error:" . $e->getMessage() . "<br>";
        return array();
    }
}

function add_entry($title, $date, $timeSpent, $whatILearned, $ResourcesToRemember) {
    include 'connection.php';

    $sql = 'INSERT INTO entries (title, date, time_spent, learned, resources) VALUES(?, ?, ?, ?, ?)';
    try {
        $results = $db->prepare($sql);
        $results->bindValue(1, $title, PDO::PARAM_STR);
        $results->bindValue(2, $date, PDO::PARAM_STR);
        $results->bindValue(3, $timeSpent, PDO::PARAM_STR);
        $results->bindValue(4, $whatILearned, PDO::PARAM_STR);
        $results->bindValue(5, $ResourcesToRemember, PDO::PARAM_STR);
        $results->execute();
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage() . "<br>";
        return false;
    }
    return true;
}
