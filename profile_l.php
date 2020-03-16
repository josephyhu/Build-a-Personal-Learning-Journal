<?php
$pageTitle = ' | Profile';
include 'inc/header_l.php';
?>
<section>
<div class="container">
<a href="profile.php" class="button">Dark</a>
<br><br><br>
<h1>Profile</h1>
<?php
$contents = file_get_contents("https://teamtreehouse.com/josephyhu.json");
$contents = utf8_encode($contents);
$data = json_decode($contents, true);
$badges = count($data["badges"]);
$points = $data["points"];
arsort($points);
echo "<p>Total badges: " . $badges . "</p>";
echo "<p>Points:</p>";
foreach ($points as $key => $value) {
    echo "<p>" . $key . ": " . $value . "</p>";
}
?>
</div>
</section>
<?php include 'inc/footer.php';
