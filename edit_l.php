<?php
require 'inc/functions.php';

$title = $date = $time = $timeSpent = $learned = $resources = $tag = '';
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$item = get_entry($id);

$pageTitle = 'Edit Entry';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
    $title = trim(filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING));
    $date = trim(filter_input(INPUT_POST, 'date', FILTER_SANITIZE_STRING));
    $date = trim(filter_input(INPUT_POST, 'time', FILTER_SANITIZE_STRING));
    $timeSpent = trim(filter_input(INPUT_POST, 'timeSpent', FILTER_SANITIZE_NUMBER_INT));
    $timeUnits = trim(filter_input(INPUT_POST, 'timeSpentUnits', FILTER_SANITIZE_STRING));
    $learned = trim(filter_input(INPUT_POST, 'whatILearned', FILTER_SANITIZE_STRING));
    $resources = trim(filter_input(INPUT_POST, 'ResourcesToRemember', FILTER_SANITIZE_STRING));
    $tag = trim(filter_input(INPUT_POST, 'tags', FILTER_SANITIZE_STRING));

    if (edit_entry($title, $date, $time, $timeUnits, $learned, $resources, $tag, $id)) {
        echo 'Successfully edited entry.';
        header('refresh: 1; url = detail_l.php?id=' . $id . '');
    } else {
        echo 'Unable to edit entry. Try again.';
    }
}

include 'inc/header_l.php';
?>
    <section>
      <div class="container">
        <a href="edit.php?id=<?php echo $id; ?>" class="button">Dark</a>
        <div class="edit-entry">
          <h2>Edit Entry</h2>
          <form method="post">
            <label for="title">Title<span style="color:red">*</span></label>
            <input id="title" type="text" name="title" value="<?php echo $item['title']; ?>" required><br>
            <label for="date">Date<span style="color:red">*</span></label>
            <input id="date" type="date" name="date" value="<?php echo $item['date']; ?>" required><br>
            <label for"time">Time<span style="color:red">*</span></label>
            <input id="time" type="time" name="time" value="<?php echo $item['time']; ?>" required></br>
            <label for="time-spent">Time Spent<span style="color:red">*</span></label>
            <input id="time-spent" type="number" name="timeSpent" value="<?php echo $item['time_spent']; ?>" required>
            <select name="timeSpentUnits" required>
              <option value="hour(s)" <?php if ($item['time_units'] == 'hour(s)') { echo 'selected'; } ?>>hour(s)</option>
              <option value="minute(s)" <?php if ($item['time_units'] == 'minute(s)') { echo 'selected'; } ?>>minute(s)</option>
            </select>
            <label for="what-i-learned">What I Learned<span style="color:red">*</span></label>
            <textarea id="what-i-learned" rows="5" name="whatILearned" required><?php echo $item['learned']; ?></textarea>
            <label for="resources-to-remember">Resources to Remember (separate with commas, start links with 'http://' or 'https://')</label>
            <textarea id="resources-to-remember" rows="5" name="ResourcesToRemember"><?php echo $item['resources']; ?></textarea>
            <label for="tags">Tags (separate with commas)</label>
            <textarea id="tags" rows="2" name="tags"><?php echo $item['tags']; ?></textarea>
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <input type="submit" value="Edit Entry" class="button">
            <a href="index_l.php" class="button button-secondary">Cancel</a>
          </form>
        </div>
      </div>
    </section>
<?php include 'inc/footer.php'; ?>
