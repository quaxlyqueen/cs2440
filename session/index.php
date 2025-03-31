<?php
session_start();
if ($_SESSION['new-access'] == true) {
    $_SESSION['new-access'] = false;
}
require_once '../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();

include_once ('includes/functions.php');
authUser();
?>

<!doctype html>
<html lang="en">

<head>
    <title>Session</title>
    <link href="session/css/styles.css" type="text/css" rel="stylesheet">
    <script src="session/js/index.js"></script>
</head>

<body>
    <?php include_once ('session/includes/nav.php'); ?>
    <div id="content">
        <?php
        $page = $_GET['page'];
        switch ($_GET['page']) {
            case 'home':
                $_GET['file'] = 'session/includes/fbi.txt';
                getHome();
                break;
            case 'video':
                include ('session/includes/video.php');
                break;
            case 'account':
                include ('session/includes/account.php');
                break;
            default:
                getHome();
                break;
        }
        ?>
    </div>
</body>

</html>
