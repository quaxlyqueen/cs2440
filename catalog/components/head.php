<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/colors.css">
    <link rel="stylesheet" href="https://nerdfonts.com/assets/css/webfont.css">
    <script src="js/index.js" defer></script>
    <?php
    switch ($_SERVER['SCRIPT_NAME']) {
        case '/catalog/index.php':
            if (!isset($_SESSION['id']))
                echo '<script src="js/login.js" defer></script>';
            break;

        case '/catalog/create-account.php':
            echo '<script src="js/create-account.js" defer></script>';
            break;
        case '/catalog/product.php':
            echo '<script src="js/product_page.js" defer></script>';
            if (!isset($_SESSION['id']))
                echo '<script src="js/login.js" defer></script>';
            break;
        case '/catalog/cart.php':
            echo '<script src="js/cart.js" defer></script>';
            break;
    }
    ?>
</head>

<body>
    <?php
    include_once 'nav.php';
    include_once 'bubbles.php';
    ?>
