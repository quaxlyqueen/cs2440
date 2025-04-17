<?php
// Form handling
include_once 'includes/init.php';

if (isset($_POST['form_id'])) {
    switch ($_POST['form_id']) {
        case 'login':
            $result = auth_user($_POST['username'], $_POST['password']);
            if ($result === true)
                header('Location: .');
            else
                $err = $result;
            break;
        case 'signup':
            $result = create_user($_POST['username'], $_POST['password'], $_POST['v_password']);
            if ($result === true)
                header('Location: account.php?view=signup_success');
            else
                $err = $result;
            break;
    }
}

// HTML Generation
include_once 'includes/head.php';

if (isset($_GET['action']) && $_GET['action'] == 'logout')
    logout();

if (!isset($_GET['view']) && !isset($_SESSION['hashbrown_access']))
    $view = 'login';
else
    $view = $_GET['view'];

echo '<div class="content">';

switch ($view) {
    case 'login':
        echo login((isset($err) ? $err : ''));
        break;
    case 'signup':
        echo signup((isset($err) ? $err : ''));
        break;
    case 'display':
        echo display();
        break;
    case 'signup_success':
        echo signup_success();
        break;
}

echo '</div>';

include_once 'includes/foot.php';

function login($err = null)
{
    $form = '
        <form method="post" class="card">
            <input type="hidden" name="form_id" value="login">

            <label for="username">Username:</label>
            <input id="username" type="text" name="username"' . (isset($_POST['username']) ? ' value="' . $_POST['username'] . '"' : '') . ' required>

            <label for="password">Password:</label>
            <input id="password" type="password" name="password"' . (isset($_POST['password']) ? ' value="' . $_POST['password'] . '"' : '') . ' required>

            <a href="account.php?view=signup">Or signup instead</a>

            <div class="row">
                <input type="reset" class="reset button">
                <input type="submit" class="success button">
            </div>

            ' . $err . '
        </form>
    ';

    return $form;
}

function signup($err = null)
{
    $form = '
        <form method="post" class="card">
            <input type="hidden" name="form_id" value="signup">

            <label for="username">Username:</label>
            <input id="username" type="text" name="username"' . (isset($_POST['username']) ? ' value="' . $_POST['username'] . '"' : '') . ' required>

            <label for="password">Password:</label>
            <input id="password" type="password" name="password"' . (isset($_POST['password']) ? ' value="' . $_POST['password'] . '"' : '') . ' required>

            <label for="v_password">Verify Password:</label>
            <input id="v_password" type="password" name="v_password"' . (isset($_POST['v_password']) ? ' value="' . $_POST['v_password'] . '"' : '') . ' required>

            <a href="account.php?view=login">Or login instead</a>

            <div class="row">
                <input type="reset" class="reset button">
                <input type="submit" class="success button">
            </div>

            ' . $err . '
        </form>
    ';

    return $form;
}

function signup_success()
{
    $display = '
        <div class="card success">
            <h3>Account creation success!</h3>
            <p><a href="account.php?view=login">Login</a> to get started.</p>
        </div>
    ';

    return $display;
}

function display()
{
    $display = '
        <h1>Account</h1>

        <div class="content">
            <div class="card">
                <div class="row space_between">
                    <h3>' . $_SESSION['username'] . '</h3>
                    <img src="' . get_user_image() . '">
                </div>
            </div>
        </div>
    ';

    return $display;
}
