<?php

if (isset($_POST['form_id'])) {
    require_once '../vendor/autoload.php';
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
    $dotenv->safeLoad();

    require_once 'base.php';
    require_once 'db.php';

    switch ($_POST['form_id']) {
        case 'create-account':
            if (isset($_POST['username'])) {
                $result['exists'] = (username_exists(urldecode($_POST['username'])) ? 'True' : 'False');
                echo json_encode($result);
            }
            break;
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
    $user = exec_stmt('SELECT id FROM user WHERE username = ? AND password = ?', 'ss', $username, $password)->fetch_assoc();

    if (!isset($user['id']))
        return false;

    $_SESSION['id'] = $user['id'];
    return true;
}

function signup($username, $password, $verify_password)
{
    echo 'test';
    if (username_exists($username))
        return false;

    echo 'username=' . $username;

    if ($password != $verify_password)
        return false;

    $user_id = exec_stmt('INSERT INTO user (username, password) VALUES (?, ?)', 'ss', $username, $password);

    echo 'user_id=' . $user_id;

    if (!isset($user_id))
        return false;

    $_SESSION['id'] = $user_id;
    return true;
}
