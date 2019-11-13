<?php
require 'inc/functions.php';

$pageTitle = 'Home';

$page = filter_input(INPUT_GET, 'p', FILTER_SANITIZE_NUMBER_INT);
if (empty($page)) {
    $page = 1;
}

$limit = 25;
$offset = $limit * ($page - 1);

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['search'])) {
    $search = trim(filter_input(INPUT_GET, 'search', FILTER_SANITIZE_STRING));
    $searchby = trim(filter_input(INPUT_GET, 'searchby', FILTER_SANITIZE_STRING));

    $entries = search_entries($search, $searchby, $limit, $offset);
    $count = count_entries($search, $searchby);

    if ($count == 1) {
        echo "Found " . $count . " entry.";
    } else {
        echo "Found " . $count . " entries.";
    }
}

include 'inc/header.php'; ?>
    <section>
      <div class="container">
        <form method="get">
          Search:
          <select name="searchby" required>
            <option value="title">Title</option>
            <option value="tag">Tag</option>
          </select>
          <input type="search" name="search" required>
        </form>
        <br>
        <?php
        if (!empty($entries) && $page > 1) {
            echo "<a href='index.php?searchby=" . $searchby . "&search=" . $search . "&p=" . ($page-1) . "' class='button'>Previous Page</a>";
        }
        if (count($entries) >= $limit) {
            echo "<a href='index.php?searchby=" . $searchby . "&search=" . $search . "&p=" . ($page+1) . "' class='button'>Next Page</a>";
        }
        if (empty($entries) && $page > 1) {
            echo "<a href='index.php?p=" . ($page-1). "' class='button'>Previous Page</a>";
        }
        if (empty($entries) && count(get_entry_list($limit, $offset)) >= $limit) {
            echo "<a href='index.php?p=" . ($page+1). "' class='button'>Next Page</a>";
        }
        ?>
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
              foreach (get_entry_list($limit, $offset) as $item) {
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
