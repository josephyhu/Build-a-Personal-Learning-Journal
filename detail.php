<?php
require 'inc/functions.php';

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$item = get_entry($id);

$section = $item[0]['title'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['delete'])) {
        if (delete_entry($id)) {
            header('Location: index.php?msg=Entry+deleted');
            exit;
        } else {
            header('Location: index.php?msg=Unable+to+delete+entry');
            exit;
        }
    }
}

if (isset($_GET['msg'])) {
    $error_message = trim(filter_input(INPUT_GET, 'msg', FILTER_SANITIZE_STRING));
}

include 'inc/header.php'; ?>
  <section>
    <div class="container">
      <div class="entry-list single">
        <article>
          <?php
          if (isset($error_message)) {
              echo "<p>$error_message</p>";
          }
          ?>
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
            <p><?php echo $item[0]['resources']; ?></p>
          </div>
        </article>
      </div>
    </div>
    <div class="edit">
      <p><a href="edit.php">Edit Entry</a></p>
      <form method="post" action="index.php">
        <input type="hidden" value="<?php $id; ?>" name="delete">
        <input type="submit" class="button" value="Delete Entry">
      </form>
    </div>
  </section>
<?php include 'inc/footer.php'; ?>
