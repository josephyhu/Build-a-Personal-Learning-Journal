<?php
require 'inc/functions.php';

$section = 'Home';

include 'inc/header.php'; ?>
  <section>
    <div class="container">
      <div class="entry-list">
        <?php
        $page = filter_input(INPUT_GET, 'p', FILTER_SANITIZE_NUMBER_INT);
        if (empty($page)) {
            $page = 1;
        }

        foreach (get_entry_list() as $item) {
            echo "<article>";
            echo "<h2><a href='detail.php?p=". $page . "'>" . $item['title'] . "</a></h2>";
            echo "<time datetime='" . $item['date'] . "'>" . date("F d, Y", strtotime($item['date'])) . "</time>";
            echo "</article>";
            $page++;
        }
        ?>
      </div>
    </div>
  </section>
<?php include 'inc/footer.php'; ?>
