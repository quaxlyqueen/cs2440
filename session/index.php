<?php
session_start();
require_once '../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();

include_once('includes/functions.php');
authUser();
?>

<!doctype html>
<html lang="en">

<head>
    <title>Session</title>
    <link href="css/styles.css" type="text/css" rel="stylesheet">
    <script src="js/index.js"></script>
</head>

<body>
    <?php include_once('includes/nav.php'); ?>
    <div id="content">
        <?php
        $page = $_GET['page'];
        switch ($_GET['page']) {
            case 'home':
                $_GET['file'] = 'includes/fbi.txt';
                getHome();
                break;
            case 'video':
                include('includes/video.php');
                break;
            case 'account':
                include('includes/account.php');
                break;
            default:
                getHome();
                break;
        }
        ?>
    </div>
</body>

</html>
