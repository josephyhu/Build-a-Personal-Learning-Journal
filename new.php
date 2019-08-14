<?php include 'inc/header.php'; ?>
  <section>
    <div class="container">
      <div class="new-entry">
        <h2>New Entry</h2>
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
          <label for="tags">Tags (separate with commas)</label>
          <textarea id="tags", rows="5", name="tags"></textarea>
          <input type="submit" value="Publish Entry" class="button">
          <a href="#" class="button button-secondary">Cancel</a>
        </form>
      </div>
    </div>
  </section>
<?php include 'inc/footer.php'; ?>
