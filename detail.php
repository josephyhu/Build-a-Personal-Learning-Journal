<?php
require 'inc/functions.php';

$section = 'Details';

include 'inc/header.php'; ?>
  <section>
    <div class="container">
      <div class="entry-list single">
        <?php
        foreach (get_entry_list() as $item) {
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
      <form>
        <input type="submit" value="Delete Entry" class="button">
      </form>
    </div>
  </section>
<?php include 'inc/footer.php'; ?>
