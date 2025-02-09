<?php
session_start();

echo '
  <form method="get" id="nav">
    <button name="page" value="account">Account</button>
    <button name="page" value="home">Home</button>
    <button name="page" value="video">Video</button>
    ' . getLogoutButton() . '
  </form>
';

function getLogoutButton()
{
    if ($_SESSION['access'] === true)
        return '<button name="logout" value="true" class="reset">Logout</button>';
}

if (isset($_GET['logout'])) {
    $_SESSION['access'] = false;
    session_destroy();
    header('Location: .');
}
?>
