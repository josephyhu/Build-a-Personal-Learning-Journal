<?php
require 'inc/functions.php';

if (isset($_GET['id'])) {
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
    $item = get_entry($id);
}

$section = $item['title'];

include 'inc/header.php'; ?>
  <section>
    <div class="container">
      <div class="entry-list single">
        <article>
          <h1><?php $item['title']; ?></h1>
          <time datetime="<?php $item['date']; ?>"><?php date('F d, Y', strtotime($item['date'])); ?></time>
          <div class='entry'>
            <h3>Time Spent: </h3>
            <p><?php $item['time_spent']; ?></p>
          </div>
          <div class='entry'>
            <h3>What I Learned:</h3>
            <p><?php $item['learned']; ?></p>
          </div>
          <div class='entry'>
            <h3>Resources to Remember:</h3>
            <p><?php $item['resources']; ?></p>
          </div>
        </article>
      </div>
    </div>
    <div class="edit">
      <p><a href="edit.php">Edit Entry</a></p>
    </div>
  </section>
<?php include 'inc/footer.php'; ?>
