<?php
$pageTitle = ' | Profile';
include 'inc/header.php';
?>
<section>
<div class="container">
<a href="profile_l.php" class="button">Light</a>
<br><br><br>
<?php
$contents = file_get_contents("https://teamtreehouse.com/josephyhu.json");
$contents = utf8_encode($contents);
$data = json_decode($contents, true);
$points = $data["points"];
arsort($points);

foreach ($points as $key => $value) {
    echo $key . ": " . $value . "<br>";
}
?>
</div>
</section>
<?php include 'inc/footer.php';
