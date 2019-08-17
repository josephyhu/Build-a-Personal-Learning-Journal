<?php
require 'inc/functions.php';

foreach (get_entry_details() as $item) {
    $section = $item['title'];
}

if (isset($_POST['delete'])) {
    if (delete_entry(filter_input(INPUT_POST, 'delete', FILTER_SANITIZE_NUMBER_INT))) {
        header('Location: index.php?msg=Deleted+entry');
        exit;
  } else {
        header('Location: index.php?msg=Unable+to=delete+entry');
        exit;
  }
}

if (isset($_GET['msg'])) {
    $error_message = trim(filter_input(INPUT_GET, 'msg', FILTER_SANITIZE_STRING));
}

include 'inc/header.php'; ?>
  <section>
    <div class="container">
      <div class="entry-list single">
        <?php
        foreach (get_entry_details() as $item) {
            echo "<article>";
            echo "<h1>" . $item['title'] . "</h1>";
            echo "<time datetime='" . $item['date'] . "'>" . date('F d, Y', strtotime($item['date'])) . "</time>";
            echo "<div class='entry'>";
            echo "<h3>Time Spent: </h3>";
            echo "<p>" . $item['time_spent'] . "</p>";
            echo "</div>";
            echo "<div class='entry'>";
            echo "<h3>What I Learned:</h3>";
            echo "<p>" . $item['learned'] . "</p>";
            echo "<div class='entry'>";
            echo "<h3>Resources to Remember:</h3";
            echo "<p>" . $item['resources'] . "</p>";
            echo "</div>";
            echo "</article>";
       }
       ?>
      </div>
    </div>
    <div class="edit">
      <p><a href="edit.php">Edit Entry</a></p>
      <?php
      if (isset($error_message)) {
          echo "<p>$error_message</p>";
      }
      ?>
      <?php
      foreach (get_entry_list() as $item) {
          echo "<form method='post' action='detail.php'>\n";
          echo "<input type='hidden' name='delete' value='" . $item['id'] . "'>\n";
          echo "<input type='submit' value='Delete Entry' class='button'>\n";
          echo "</form>";
       }
       ?>
    </div>
  </section>
<?php include 'inc/footer.php'; ?>
