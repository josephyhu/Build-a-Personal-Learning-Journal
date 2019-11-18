<?php
/**
 * Deletes all entries from the site. Displays either a success or a failure message then redirects to index.php.
 * Dark background.
 */
require 'inc/functions.php';

$pageTitle = 'Delete All Entries';

if (delete_all_entries()) {
    echo 'Successfully deleted all entries.';
    header('refresh: 1; url = index.php');
} else {
    echo 'Unable to delete all entries. Try again.';
    header('refresh: 1; url = index.php');
}
include 'inc/header.php';

include 'inc/footer.php';
