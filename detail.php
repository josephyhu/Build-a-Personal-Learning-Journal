<?php
require 'inc/functions.php';

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$item = get_entry($id);

$section = $item[0]['title'];

include 'inc/header.php'; ?>
  <section>
    <div class="container">
      <div class="entry-list single">
        <article>
          <h1><?php echo $item[0]['title']; ?></h1>
          <time datetime="<?php $item[0]['date']; ?>"><?php echo date('F d, Y', strtotime($item[0]['date'])); ?></time>
          <div class='entry'>
            <h3>Time Spent: </h3>
            <p><?php echo $item[0]['time_spent']; ?></p>
          </div>
          <div class='entry'>
            <h3>What I Learned:</h3>
            <p><?php echo $item[0]['learned']; ?></p>
          </div>
          <div class='entry'>
            <h3>Resources to Remember:</h3>
            <?php if (!empty($item[0]['resources'])) {
                echo "<ul>";
                foreach (explode(trim(", "), $item[0]['resources']) as $resource) {
                    echo "<li>$resource</li>";
                }
                echo "</ul>";
              }
              ?>
          </div>
          <div class='entry'>
            <h3>Tags:</h3>
            <?php if (!empty($item[0]['tags'])) {
                $tags = explode(trim(", "), $item[0]['tags']);
                echo "<ul>";
                foreach ($tags as $tag) {
                    echo "<li><a href='tags.php?t=" . trim($tag) . "'>" . $tag . "</a></li>";
                }
                echo "</ul>";
              }
              ?>
            </ul>
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
