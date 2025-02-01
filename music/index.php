<?php
session_start();
include ('core.php');
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
    <button onclick=modeSwitch() type="submit">Click me</button>

    <div id="content">
    <?php
    echo get_core();
    ?>
    </div>
</body>
</html>
