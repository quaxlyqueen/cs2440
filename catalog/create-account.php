<?php
require_once 'functions/init.php';
require_once 'functions/user.php';

if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['v_password'])) {
  if (!signup($_POST['username'], $_POST['password'], $_POST['v_password']))
    echo '<p>Username is taken, or password do not match.</p>';
  else {
    header('Location: catalog.php');
  }
}

require_once 'components/head.php';
require_once 'components/user/signup.php';

echo signup_form();

require_once 'components/foot.php';
