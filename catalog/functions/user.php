<?php

if (isset($_POST['form_id'])) {
    include_once '../vendor/autoload.php';
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
    $dotenv->safeLoad();

    include_once 'base.php';
    include_once 'db.php';

    switch ($_POST['form_id']) {
        case 'create-account':
            if (isset($_POST['username'])) {
                $result['exists'] = (username_exists(urldecode($_POST['username'])) ? 'True' : 'False');
                echo json_encode($result);
            }
            break;
        case 'login':
            if (isset($_POST['username']) && isset($_POST['password']))
                echo json_encode(login($_POST['username'], $_POST['password']));
    }
}

function username_exists($username)
{
    $result = exec_stmt('SELECT username FROM user WHERE username = ?', 's', $username)->fetch_assoc();

    if (isset($result['username']))
        return true;
    else
        return false;
}

function login($username, $password)
{
    $user = exec_stmt('SELECT id, password FROM user WHERE username = ?', 's', $username)->fetch_assoc();

    if (!isset($user['id']))
        return false;

    if (!password_verify($password, $user['password'])) {
        return false;
    }

    $_SESSION['id'] = $user['id'];
    return true;
}

function signup($username, $password, $verify_password)
{
    if (username_exists($username))
        return false;

    if ($password != $verify_password)
        return false;

    $user_id = exec_stmt('INSERT INTO user (username, password) VALUES (?, ?)', 'ss', $username, password_hash($password, PASSWORD_DEFAULT));

    if (!isset($user_id))
        return false;

    $_SESSION['id'] = $user_id;
    return true;
}
