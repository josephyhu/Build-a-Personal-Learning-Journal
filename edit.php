<?php
require 'inc/functions.php';

$pageTitle = 'Edit Entry';

include 'inc/header.php'; ?>
  <section>
    <div class="container">
      <div class="edit-entry">
        <h2>Edit Entry</h2>
        <form>
          <label for="title">Title (required)</label>
          <input id="title" type="text" name="title" required><br>
          <label for="date">Date (required)</label>
          <input id="date" type="date" name="date" required><br>
          <label for="time-spent">Time Spent (required)</label>
          <input id="time-spent" type="text" name="timeSpent" required><br>
          <label for="what-i-learned">What I Learned (required)</label>
          <textarea id="what-i-learned" rows="5" name="whatILearned" required></textarea>
          <label for="resources-to-remember">Resources to Remember</label>
          <textarea id="resources-to-remember" rows="5" name="ResourcesToRemember"></textarea>
          <input type="submit" value="Publish Entry" class="button">
          <a href="index.php" class="button button-secondary">Cancel</a>
        </form>
      </div>
    </div>
  </section>
<?php include 'inc/footer.php'; ?>
