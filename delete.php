<?php
/**
 * Deletes a specific entry by its id. Displays success message then redirects to index.php on success, and displays a failure message then redirects to the entry on failure.
 * Dark background.
 *
 * @param int $id The entry id.
 */
require 'inc/functions.php';

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

$pageTitle = 'Delete Entry';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
}
if (delete_entry($id)) {
    echo 'Successfully deleted entry.';
    header('refresh: 1; url = index.php');
} else {
    echo 'Unable to delete entry. Try again.';
    header('refresh: 1; url = detail.php?id="' . $id . '"');
}
include 'inc/header.php';

include 'inc/footer.php';
