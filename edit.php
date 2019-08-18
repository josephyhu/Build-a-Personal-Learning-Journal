<?php
require 'inc/functions.php';

$title = $date = $time = $learned = $resources = '';
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$item = get_entry($id);

$section = 'Edit Entry';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
    $title = trim(filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING));
    $date = trim(filter_input(INPUT_POST, 'date', FILTER_SANITIZE_STRING));
    $time = trim(filter_input(INPUT_POST, 'timeSpent', FILTER_SANITIZE_STRING));
    $learned = trim(filter_input(INPUT_POST, 'whatILearned', FILTER_SANITIZE_STRING));
    $resources = trim(filter_input(INPUT_POST, 'ResourcesToRemember', FILTER_SANITIZE_STRING));

    if (edit_entry($title, $date, $time, $learned, $resources, $id)) {
        echo 'Successfully edited entry';
    } else {
        echo 'Unable to edit entry';
    }
}

include 'inc/header.php'; ?>
  <section>
    <div class="container">
      <div class="edit-entry">
        <h2>Edit Entry</h2>
        <form method="post">
          <label for="title">Title</label>
          <?php if (isset($_POST['id'])) {
              echo "<input id='title' type='text' name='title' value='" . htmlspecialchars($title) . "'><br>";
          } else {
              echo "<input id='title' type='text' name='title' value='" . $item[0]['title'] . "'><br>";
          }
          ?>
          <label for="date">Date</label>
          <?php if (isset($_POST['id'])) {
              echo "<input id='date' type='date' name='date' value='" . htmlspecialchars($date) . "'><br>";
          } else {
              echo "<input id='date' type='date' name='date' value='" . $item[0]['date'] . "'><br>";
          }
          ?>
          <label for="time-spent">Time Spent (hours/min)</label>
          <?php if (isset($_POST['id'])) {
              echo "<input id='time-spent' type='text' name='timeSpent' value='" . htmlspecialchars($time) . "'><br>";
          } else {
              echo "<input id='time-spent' type='text' name='timeSpent' value='" . $item[0]['time_spent'] . "'><br>";
          }
          ?>
          <label for="what-i-learned">What I Learned</label>
          <?php if (isset($_Post['id'])) {
              echo "<textarea id='what-i-learned' rows='5' name='whatILearned'>" . htmlspecialchars($learned) . "</textarea>";
          } else {
              echo "<textarea id='what-i-learned' rows='5' name='whatILearned'>" . $item[0]['learned'] . "</textarea>";
          }
          ?>
          <label for="resources-to-remember">Resources to Remember</label>
          <?php if (isset($_POST['id'])) {
              echo "<textarea id='resources-to-remember' rows='5' name='ResourcesToRemember'>" . htmlspecialchars($resources) . "</textarea>";
          } else {
              echo "<textarea id='resources-to-remember' rows='5' name='ResourcesToRemember'>" . $item[0]['resources'] . "</textarea>";
          }
          ?>
          <input type="hidden" name="id" value="<?php echo $id; ?>">
          <input type="submit" value="Publish Entry" class="button">
          <a href="index.php" class="button button-secondary">Cancel</a>
        </form>
      </div>
    </div>
  </section>
<?php include 'inc/footer.php'; ?>
