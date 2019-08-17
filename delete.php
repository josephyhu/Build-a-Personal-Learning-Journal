<?php
require 'inc/functions.php';

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

$section = 'Delete Entry';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
}
if (delete_entry($id)) {
    echo 'Successfully deleted entry';
} else {
    echo 'Unable to delete entry';
}
include 'inc/header.php';

include 'inc/footer.php';
