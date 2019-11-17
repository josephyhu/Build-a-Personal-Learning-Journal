<?php
require 'inc/functions.php';

$pageTitle = 'About Me';

include 'inc/header.php';
?>
    <section>
      <div class="container">
        <a href="about_l.php?" class="button">Light</a>
        <div class="entry-list">
          <h1>About Me</h1>
          <p>I am currently a Treehouse PHP Techdegree student. You can contact me via email at <a href="mailto:josephsyhu@gmail.com">josephsyhu@gmail.com</a>.</p>
          <p>You can also visit these pages.</p>
          <ul>
            <li><a href="https://teamtreehouse.com/josephyhu" target="_blank">Go to my Treehouse profile page.</a></li>
            <li><a href="https://github.com/josephyhu" target="_blank">Go to my GitHub profile page.</a></li>
            <li><a href="https://www.linkedin.com/in/josephyhu" target="_blank">Go to my LinkedIn profile page.</a></li>
          </ul>
        </div>
      </div>
    </section>
<?php include 'inc/footer.php'; ?>
