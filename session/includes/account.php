<?php
session_start();

if ($_SESSION['access'] !== true)
    header('Location: .');

include_once ('functions.php');

echo '<h1>Account</h1>';

if (isset($_POST['password1']) && isset($_POST['password2'])) {
    if ($_POST['password1'] == $_POST['password2']) {
        update_user_pw($_POST['password1']);
    } else {
        $_GET['error'] = true;
    }
}

echo '<div id="account-content">
        <img src="' . get_user_image() . '" />
        <form method="post" id="update-pw">
            <input name="password1" type="password" placeholder="New Password">
            <input name="password2" type="password" placeholder="Retype New Password">
            <button>Submit</button>
        </form>
    </div>';
?>
