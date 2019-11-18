<?php
/**
 * Deletes all entries from the site. Displays either a success or a failure message then redirects to index_l.php.
 * Light background.
 */
require 'inc/functions.php';

$pageTitle = 'Delete All Entries';

if (delete_all_entries()) {
    echo 'Successfully deleted all entries.';
    header('refresh: 1; url = index_l.php');
} else {
    echo 'Unable to delete all entries. Try again.';
    header('refresh: 1; url = index_l.php');
}
include 'inc/header_l.php';

include 'inc/footer.php';
