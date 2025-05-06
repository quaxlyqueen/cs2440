<?php
require_once 'functions/init.php';
require_once 'functions/user.php';

if (isset($_POST['username']) && isset($_POST['password'])) {
    if (isset($_POST['product_id']) && login($_POST['username'], $_POST['password']))
        header('Location: product.php?id=' . $_POST['product_id']);
    else if (login($_POST['username'], $_POST['password']))
        header('Location: .');
}

require_once 'components/head.php';
require_once 'components/user/login.php';

if (isset($_SESSION['id'])) {
    echo '
        <div class="column center center_children" style="margin-top: 30vh;">
            <div class="glass padding std_width" style="height: auto;">
                <h1>Welcome to ACME!</h1>
                <p><strong>Where \'Oops!\' is Part of the Plan.</strong></p>
            </div>
        </div>
    ';

    include_once 'components/bubbles.php';
} else {
    echo login_form();
}

require_once 'components/foot.php';
