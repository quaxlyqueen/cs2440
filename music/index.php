<?php
session_start();

if (!isset($_GET['code'])) {
    header('Location: http://localhost:9753/login');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Favorite Albums</title>
    <link rel="stylesheet" href="css/styles.css" type="text/css">
    <script src="js/switch.js"></script>
</head>

<body>
    <h1>My Favorite Albums</h1>
    <button id="switcher" onclick=modeSwitch('core')>Explore</button>
    <div id="content">
    <?php include ('explore.php'); ?>
    </div>
</body>
</html>
