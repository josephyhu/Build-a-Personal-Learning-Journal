<?php
require 'inc/functions.php';

$title = $date = $time = $learned = $resources = $tags = '';
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
    $tags = trim(filter_input(INPUT_POST, 'tags', FILTER_SANITIZE_STRING));

    if (edit_entry($title, $date, $time, $learned, $resources, $tags, $id)) {
        echo 'Successfully edited entry.';
        header('refresh: 1; url = detail.php?id="'. $id . '"');
    } else {
        echo 'Unable to edit entry. Try again.';
    }
}

include 'inc/header.php'; ?>
  <section>
    <div class="container">
      <div class="edit-entry">
        <h2>Edit Entry</h2>
        <form method="post">
          <label for="title">Title</label>
          <input id="title" type="text" name="title" value="<?php echo $item[0]['title']; ?>"><br>
          <label for="date">Date</label>
          <input id="date" type="date" name="date" value="<?php echo $item[0]['date']; ?>"><br>
          <label for="time-spent">Time Spent (hours/min)</label>
          <input id="time-spent" type="text" name="timeSpent" value="<?php echo $item[0]['time_spent']; ?>"><br>
          <label for="what-i-learned">What I Learned</label>
          <textarea id="what-i-learned" rows="5" name="whatILearned"><?php echo $item[0]['learned']; ?></textarea>
          <label for="resources-to-remember">Resources to Remember (separate with commas)</label>
          <textarea id="resources-to-remember" rows="5" name="ResourcesToRemember"><?php echo $item[0]['resources']; ?></textarea>
          <label for="tags">Tags (separate with commas)</label>
          <textarea id="tags" rows="2" name="tags"><?php echo $item[0]['tags']; ?></textarea>
          <input type="hidden" name="id" value="<?php echo $id; ?>">
          <input type="submit" value="Edit Entry" class="button">
          <a href="index.php" class="button button-secondary">Cancel</a>
        </form>
      </div>
    </div>
  </section>
<?php include 'inc/footer.php'; ?>
