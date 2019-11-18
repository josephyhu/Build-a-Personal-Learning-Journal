<?php
/**
 * Displays all entries filtered by $tag
 * Light background.
 *
 * @param int $limit The number of entries per page.
 * @param int $offset The number the entries should start from per page.
 * @param string $title The title of the entry.
 * @param string $date The date the entry was posted.
 * @param mixed $tag The tags for the entry.
 */
require 'inc/functions.php';

$tag = filter_input(INPUT_GET, 'tag', FILTER_SANITIZE_STRING);

$pageTitle = trim($tag);

$page = filter_input(INPUT_GET, 'p', FILTER_SANITIZE_NUMBER_INT);
if (empty($page)) {
    $page = 1;
}

$limit = 25;
$offset = $limit * ($page - 1);

include 'inc/header_l.php';
?>
    <section>
      <div class="container">
        <?php
        if ($page > 1) {
            echo "<a href='tags_l.php?tag=" . trim($tag) . "&p=" . ($page-1) . "' class='button'>Previous Page</a>";
        }
        if (count(get_entry_list_by_tag($tag, $limit, $offset)) >= $limit) {
            echo "<a href='tags_l.php?tag=" . trim($tag) . "&p=" . ($page+1) . "' class='button'>Next Page</a>";
        }
        ?>
        <?php
        if ($page > 1) {
            echo "<a href='tags.php?tag=" . trim($tag) . "&p=" . $page . "' class='button'>Dark</a>";
        } else {
            echo "<a href='tags.php?tag=" . trim($tag) . "' class='button'>Dark</a>";
        }
        ?>
        <div class="entry-list">
          <h1><?php echo "#" . trim($tag); ?></h1>
          <?php
          foreach (get_entry_list_by_tag($tag, $limit, $offset) as $item) {
              echo "<article>";
              echo "<h2><a href='detail_l.php?id=" . $item['id'] . "'>" . $item['title'] . "</a></h2>";
              echo "<time datetime='" . $item['date'] . "'>" . date("F d, Y", strtotime($item['date'])) . "</time><br>";
              $tags = explode(',', $item['tags']);
              foreach ($tags as $tag) {
                  echo "<a href='tags_l.php?tag=" . trim($tag) . "'>#" . trim($tag) . "</a> ";
              }
              echo "<article>";
          }
          ?>
        </div>
      </div>
    </section>
<?php include 'inc/footer.php'; ?>
