<?php
session_start();
$users = array(
    'chuck' => 'roast',
    'bob' => 'ross'
);

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    if (array_key_exists($username, $users) && $users[$username] === $password) {
        $_SESSION['access'] = true;
        $_GET['file'] = 'includes/fbi.txt';
    } else {
        $_GET['error'] = true;
    }
}

if (isset($_GET['logout'])) {
    $_SESSION['access'] = false;
    header('Location: .');
}

?>

<!doctype html>
<html lang="en">

<head>
    <title>Spies</title>
    <link href="css/styles.css" type="text/css" rel="stylesheet">
    <script src="js/index.js"></script>
</head>

<body>
    <h1>View Confidential Information</h1>
    <?php
    if ($_SESSION['access'] !== true) {
        if (isset($_GET['error']) && $_GET['error'] === true) {
            echo '
          <div class="card error">
            <h5 class="error">Access Denied.</h5>
          </div>
        ';
        }
        echo '
        <form method="post">
          <div class="row">
            <input name="username" type="text" placeholder="username">
            <input name="password" type="password" placeholder="password">
          </div>
          <div class="row">
            <button>Submit</button>
            <button type="reset" class="reset">Reset</button>
          </div>
        </form>
    ';
    } else if (isset($_GET['file']) && isset($_SESSION['access'])) {
        echo '
    <div class="card success">
      <h5 class="success">Access Granted.</h5>
    </div>
    <form method="get">
      <div class="row">
        <button name="file" value="includes/fbi.txt">FBI</button>
        <button name="file" value="includes/spies.txt">Spies</button>
        <button name="logout" value="true" class="reset">Logout</button>
      </div>
    </form>
  ';
        fileRead($_GET['file']);
    }
    ?>
</body>

</html>

<?php
function fileRead($file)
{
    $fs = fopen($file, 'r');
    $string = fread($fs, filesize($file));
    $values = explode('||>><<||', $string);

    echo '
    <table>
      <tr>
        <th>Agent</th>
        <th>Codename</th>
      </tr>
    ';
    foreach ($values as $v) {
        list($a, $b) = explode(',', $v);

        echo '
              <tr>
                <td>' . ucfirst($a) . '</td>
                <td>' . ucwords($b) . '</td>
              </tr>
            ';
    }
    echo '</table>';
}
?>
