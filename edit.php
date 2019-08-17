<?php
require 'inc/functions.php';

$pageTitle = 'Edit Entry';

include 'inc/header.php'; ?>
  <section>
    <div class="container">
      <div class="edit-entry">
        <h2>Edit Entry</h2>
        <form method="post">
          <label for="title">Title<span style="color:red">*</span></label>
          <input id="title" type="text" name="title" value="<?php echo htmlspecialchars($title); ?>" required><br>
          <label for="date">Date<span style="color:red">*</span></label>
          <input id="date" type="date" name="date" value="<?php echo htmlspecialchars($date); ?>" required><br>
          <label for="time-spent">Time Spent<span style="color:red">*</span></label>
          <input id="time-spent" type="text" name="timeSpent" value="<?php echo htmlspecialchars($time); ?>" required><br>
          <label for="what-i-learned">What I Learned<span style="color:red">*</span></label>
          <textarea id="what-i-learned" rows="5" name="whatILearned" value="<?php echo htmlspecialchars($learned); ?>" required></textarea>
          <label for="resources-to-remember">Resources to Remember</label>
          <textarea id="resources-to-remember" rows="5" name="ResourcesToRemember" value="<?php echo htmlspecialchars($resources); ?>"></textarea>
          <input type="submit" value="Publish Entry" class="button">
          <a href="index.php" class="button button-secondary">Cancel</a>
        </form>
      </div>
    </div>
  </section>
<?php include 'inc/footer.php'; ?>
