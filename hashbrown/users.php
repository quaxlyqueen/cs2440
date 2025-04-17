<?php
include_once 'includes/init.php';

if (!isset($_SESSION['hashbrown_access']) || !$_SESSION['hashbrown_access'])
    header('Location: account.php?view=login');

$users = query('SELECT * FROM users');

include_once 'includes/head.php';
echo '
  <div class="card">
    <h3 class="center">Users</h3>
    <table class="center">
      <tr>
        <th>ID</th>
        <th>Username</th>
        <th>Password</th>
      </tr>
';

foreach ($users as $u) {
    echo '
      <tr>
        <td>' . $u['id'] . '</td>
        <td>' . $u['username'] . '</td>
        <td>' . $u['password'] . '</td>
      </tr>
  ';
}
echo '</div></table>';

include_once 'includes/foot.php';
