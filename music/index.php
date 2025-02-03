<?php
session_start();

if (!isset($_GET['code'])) {
    header('Location: https://login.joshashton.dev/');
    // header('Location: http://localhost:9753/');
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
    <button id="switcher" onclick=modeSwitch('core')>Core</button>
    <div id="content">
    <?php include ('explore.php'); ?>
    </div>
</body>
</html>
