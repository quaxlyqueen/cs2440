<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/colors.css">
    <link rel="stylesheet" href="https://nerdfonts.com/assets/css/webfont.css">
    <script src="js/index.js" defer></script>
    <?php
    switch ($_SERVER['SCRIPT_NAME']) {
        case '/create-account.php':
            echo '<script src="js/create-account.js" defer></script>';
            break;
        case '/product.php':
            echo '<script src="js/product_page.js" defer></script>';
            break;
        case '/cart.php':
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
