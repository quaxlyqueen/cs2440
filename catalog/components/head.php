<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" href="css/base.css">
  <link rel="stylesheet" href="css/colors.css">
  <?php
  switch ($_SERVER['SCRIPT_NAME']) {
    case '/create-account.php':
      echo '<script src="js/create-account.js" defer></script>';
      break;
    case '/product.php':
      if (!isset($_SESSION['id']))
        echo '<script src="js/login-modal.js" defer></script>';
      break;
  }
  ?>
</head>

<body>
  <?php include_once 'nav.php'; ?>
