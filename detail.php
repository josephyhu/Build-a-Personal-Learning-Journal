<?php
require 'inc/functions.php';

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$item = get_entry($id);

$page = $item['title'];

include 'inc/header.php'; ?>
    <section>
      <div class="container">
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
              <p><?php echo $item['learned']; ?></p>
            </div>
            <div class='entry'>
              <h3>Resources to Remember:</h3>
              <?php
              if (!empty($item['resources'])) {
                  echo "<ul>";
                  foreach (explode(trim(','), $item['resources']) as $resource) {
                      echo "<li>" . trim($resource) . "</li>";
                  }
                  echo "</ul>";
              }
              ?>
            </div>
            <div class='entry'>
              <h3>Tags:</h3>
              <?php
              if (!empty($item['tags'])) {
                  $tags = explode(trim(','), $item['tags']);
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
        <p><a href="delete.php?id=<?php echo $id; ?>">Delete Entry</a></p>
      </div>
    </section>
<?php include 'inc/footer.php'; ?>
