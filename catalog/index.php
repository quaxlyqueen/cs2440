<?php
include_once 'functions/init.php';
require_once 'functions/user.php';

if (isset($_POST['username']) && isset($_POST['password'])) {
    if (login($_POST['username'], $_POST['password']))
        header('Location: catalog.php');
    else
        echo '<p>Username and/or password are incorrect!</p>';
}

include_once 'components/head.php';
include_once 'components/user/login.php';

if (isset($_SESSION['id'])) {
    echo '<h1>Welcome to the store</h1>';
} else
    echo login_form();

include_once 'components/foot.php';
