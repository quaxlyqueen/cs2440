<?php
session_start();
include ('login.php');
exec('php explore.php &');
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
    <button id="switcher" onclick=modeSwitch('core')>Core</button>

    <div id="content">
    <?php include ('explore.php'); ?>
    </div>
</body>
</html>
