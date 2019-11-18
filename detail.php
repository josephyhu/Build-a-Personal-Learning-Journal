<?php
/**
 * Displays all information for a specific entry by id. Allows the user to eithe edit or delete the entry. Displays a confirmation box if the delete button is clicked.
 * Dark background.
 *
 * @param int $id The entry id.
 * @param string $title The title of the entry.
 * @param string $date The date the entry was posted.
 * @param int $time The time spent learning.
 * @param string $timeUnits The hour(s) or the minute(s).
 * @param mixed $learned What the user has learned.
 * @param mixed $resources The resources the user used for their post.
 * @param mixed $tag The tags for the entry.
 */
require 'inc/functions.php';

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$item = get_entry($id);

$pageTitle = $item['title'];

include 'inc/header.php';
?>
    <section>
      <div class="container">
        <a href="detail_l.php?id=<?php echo $id; ?>" class="button">Light</a>
        <div class="entry-list single">
          <article>
            <h1><?php echo $item['title']; ?></h1>
            <time datetime="<?php $item['date']; ?>"><?php echo date('F d, Y', strtotime($item['date'])); ?></time>
            <div class='entry'>
              <h3>Time Spent: </h3>
              <p><?php echo $item['time_spent'] . " " . $item['time_units']; ?></p>
            </div>
            <div class='entry'>
              <h3>What I Learned:</h3>
              <?php foreach (explode("\n", $item['learned']) as $learned) {
                  echo "<p>" . $learned . "</p>";
              }
              ?>
            </div>
            <div class='entry'>
              <h3>Resources to Remember:</h3>
              <?php
              if (!empty($item['resources'])) {
                  echo "<ul>";
                  foreach (explode(',', $item['resources']) as $resource) {
                      if (stripos(trim($resource), 'http://') === 0 or stripos(trim($resource), 'https://') === 0) {
                          echo "<li><a href='" . strtolower(trim($resource)) . "' target='_blank'>" . strtolower(trim($resource)) . "</a></li>";
                      } else {
                          echo "<li>" . trim($resource) . "</li>";
                      }
                  }
                  echo "</ul>";
              }
              ?>
            </div>
            <div class='entry'>
              <h3>Tags:</h3>
              <?php
              if (!empty($item['tags'])) {
                  $tags = explode(',', $item['tags']);
                  echo "<ul>";
                  foreach ($tags as $tag) {
                      echo "<li><a href='tags.php?tag=" . trim($tag) . "'>#" . trim($tag) . "</a></li>";
                  }
                  echo "</ul>";
              }
              ?>
            </div>
          </article>
        </div>
      </div>
      <div class="edit">
        <p><a href="edit.php?id=<?php echo $id; ?>">Edit Entry</a></p>
        <p><input type="submit" class="button" value="Delete Entry" onclick="confirmDelete()"></p>
      </div>
      <script>
      function confirmDelete() {
        var r = confirm("Confirm delete.")
        if (r == true) {
          window.location.replace("delete.php?id=<?php echo $id; ?>");
        }
      }
      </script>
    </section>
<?php include 'inc/footer.php'; ?>
