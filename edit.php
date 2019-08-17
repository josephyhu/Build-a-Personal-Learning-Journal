<?php
require 'inc/functions.php';

$section = 'Edit Entry';
$title = $date = $time = $learned = $resources = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
    $title = trim(filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING));
    $date = trim(filter_input(INPUT_POST, 'date', FILTER_SANITIZE_STRING));
    $time = trim(filter_input(INPUT_POST, 'timeSpent', FILTER_SANITIZE_STRING));
    $learned = trim(filter_input(INPUT_POST, 'whatILearned', FILTER_SANITIZE_STRING));
    $resources = trim(filter_input(INPUT_POST, 'ResourcesToRemember', FILTER_SANITIZE_STRING));

    if (edit_entry($title, $date, $time, $learned, $resources, $id)) {
        header('Location: index.php');
    } else {
        echo 'Could not edit entry';
    }
}

include 'inc/header.php'; ?>
  <section>
    <div class="container">
      <div class="edit-entry">
        <h2>Edit Entry</h2>
        <form method="post">
          <label for="title">Title</label>
          <input id="title" type="text" name="title" value="<?php echo htmlspecialchars($title); ?>"><br>
          <label for="date">Date</label>
          <input id="date" type="date" name="date" value="<?php echo htmlspecialchars($date); ?>"<br>
          <label for="time-spent">Time Spent (hours/min)</label>
          <input id="time-spent" type="text" name="timeSpent" value="<?php echo htmlspecialchars($time); ?>"><br>
          <label for="what-i-learned">What I Learned</label>
          <textarea id="what-i-learned" rows="5" name="whatILearned" value="<?php echo htmlspecialchars($learned); ?>"></textarea>
          <label for="resources-to-remember">Resources to Remember</label>
          <textarea id="resources-to-remember" rows="5" name="ResourcesToRemember" value="<?php echo htmlspecialchars($resources); ?>"></textarea>
          <input type="submit" value="Publish Entry" class="button">
          <a href="index.php" class="button button-secondary">Cancel</a>
        </form>
      </div>
    </div>
  </section>
<?php include 'inc/footer.php'; ?>
