<?php
require 'inc/functions.php';

$section = 'Home';

include 'inc/header.php'; ?>
  <section>
    <div class="container">
      <div class="entry-list">
        <?php
        foreach (get_entry_list() as $item) {
            echo "<article>";
            echo "<h2><a href='detail.php'>" . $item['title'] . "</a></h2>";
            echo "<time datetime='" . $item['date'] . "'>" . date("F d, Y", strtotime($item['date'])) . "</time>";
            echo "</article>";
        }
        ?>
      </div>
    </div>
  </section>
<?php include 'inc/footer.php'; ?>
