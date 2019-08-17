<?php
require 'inc/functions.php';

$pageTitle = 'New Entry';
$title = $date = $timeSpent = $whatILearned = $ResourcesToRemember = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = trim(filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING));
    $date = trim(filter_input(INPUT_POST, 'date', FILTER_SANITIZE_STRING));
    $timeSpent = trim(filter_input(INPUT_POST, 'timeSpent', FILTER_SANITIZE_STRING));
    $whatILearned = trim(filter_input(INPUT_POST, 'whatILearned', FILTER_SANITIZE_STRING));
    $ResourcesToRemember = trim(filter_input(INPUT_POST, 'ResourcesToRemember', FILTER_SANITIZE_STRING));

    if (add_entry($title, $date, $timeSpent, $whatILearned, $ResourcesToRemember)) {
        header('Location: index.php');
    } else {
        echo 'Could not add entry';
    }
}

include 'inc/header.php'; ?>
  <section>
    <div class="container">
      <div class="new-entry">
        <h2>New Entry</h2>
        <form method="post">
          <label for="title">Title<span style="color:red">*</span></label>
          <input id="title" type="text" name="title" value="<?php echo htmlspecialchars($title); ?>" required><br>
          <label for="date">Date<span style="color:red">*</span></label>
          <input id="date" type="date" name="date" value="<?php echo htmlspecialchars($date); ?>" required><br>
          <label for="time-spent">Time Spent<span style="color:red">*</span></label>
          <input id="time-spent" type="text" name="timeSpent" value="<?php echo htmlspecialchars($timeSpent); ?>" required><br>
          <label for="what-i-learned">What I Learned<span style="color:red">*</span></label>
          <textarea id="what-i-learned" rows="5" name="whatILearned" value="<?php echo htmlspecialchars($whatILearned); ?>" required></textarea>
          <label for="resources-to-remember">Resources to Remember</label>
          <textarea id="resources-to-remember" rows="5" name="ResourcesToRemember" value="<?php echo htmlspecialchars($ResourcesToRemember); ?>"></textarea>
          <input type="submit" value="Publish Entry" class="button">
          <a href="index.php" class="button button-secondary">Cancel</a>
        </form>
      </div>
    </div>
  </section>
<?php include 'inc/footer.php'; ?>
