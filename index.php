<?php
require 'inc/functions.php';

$page = 'Home';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $search = trim(filter_input(INPUT_POST, 'search', FILTER_SANITIZE_STRING));
    $searchby = trim(filter_input(INPUT_POST, 'searchby', FILTER_SANITIZE_STRING));

    $entries = search_entries($search, $searchby);

}

include 'inc/header.php'; ?>
    <section>
      <div class="container">
        <form method="post">
          Search:
          <select name="searchby" required>
            <option value="title">Title</option>
            <option value="tags">Tag</option>
          </select>
          <input type="search" name="search" required>
        </form>
        <div class="entry-list">
          <?php
          if (isset($entries)) {
              foreach ($entries as $entry) {
                  echo "<article>";
                  echo "<h2><a href='detail.php?id=" . $entry['id'] . "'>" . $entry['title'] . "</a></h2>";
                  echo "<time datetime='" . $entry['date'] . "'>" . date("F d, Y", strtotime($entry['date'])) . "</time><br>";
                  if (!empty($entry['tags'])) {
                      $tags = explode(',', $entry['tags']);
                      foreach ($tags as $tag) {
                          echo "<a href='tags.php?tag=" . trim($tag) . "'>#" . trim($tag) . "</a> ";
                      }
                  }
                  echo "</article>";
              }
          } else {
              foreach (get_entry_list() as $item) {
                  echo "<article>";
                  echo "<h2><a href='detail.php?id=" . $item['id'] . "'>" . $item['title'] . "</a></h2>";
                  echo "<time datetime='" . $item['date'] . "'>" . date("F d, Y", strtotime($item['date'])) . "</time><br>";
                  if (!empty($item['tags'])) {
                      $tags = explode(',', $item['tags']);
                      foreach ($tags as $tag) {
                          echo "<a href='tags.php?tag=" . trim($tag) . "'>#" . trim($tag) . "</a> ";
                      }
                  }
                  echo "</article>";
              }
          }
          ?>
        </div>
      </div>
    </section>
<?php include 'inc/footer.php'; ?>
