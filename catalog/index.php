<?php
require_once 'functions/init.php';
require_once 'functions/user.php';

if (isset($_POST['username']) && isset($_POST['password'])) {
    if (login($_POST['username'], $_POST['password'])) {
        header('Location: catalog.php');
    } else {
        echo '<p>Username and/or password are incorrect!</p>';
    }
}

require_once 'components/head.php';
require_once 'components/user/login.php';

if (isset($_SESSION['id'])) {
    echo '
        <div id="welcome" class="glass" style="width: auto; height: auto;">
            <h1>Welcome to ACME!</h1>
            <p><strong>Where \'Oops!\' is Part of the Plan.</strong></p>
        </div>
    ';

    include_once 'components/bubbles.php';
} else {
    echo login_form();
}

require_once 'components/foot.php';
