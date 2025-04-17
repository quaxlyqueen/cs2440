<?php
session_start();
// Use environment variables for the database password and IP address.
$db_pass = $_ENV['DATABASE_PASSWORD'];
$ip_addr = $_ENV['IP_ADDRESS'];

// Make some constants
if ($_SERVER['HTTP_HOST'] == 'localhost') {
    define('HOST', 'localhost');
    define('USER', 'root');
    define('PASS', $db_pass);
    define('DB', 'session');
} else {
    define('HOST', $ip_addr);
    define('USER', 'root');
    define('PASS', $db_pass);
    define('DB', 'session');
}

function getHome()
{
    echo '<h1>View Confidential Information</h1>';
    if (!$_SESSION['new-access']) {
        if (isset($_GET['error']) && $_GET['error'] === true) {
            echo '
          <div class="card error">
            <h5 class="error">Access Denied.</h5>
            <p class="error">Invalid username or password.</p>
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
    } else if (isset($_GET['file']) && isset($_SESSION['new-access'])) {
        echo '
    <div class="card success">
      <h5 class="success">Access Granted.</h5>
    </div>
    <form method="get">
      <div class="row">
        <button name="file" value="includes/fbi.txt">FBI</button>
        <button name="file" value="includes/spies.txt">Spies</button>
      </div>
    </form>
  ';
        fileRead($_GET['file']);
    }
}

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

function authUser()
{
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Connect to the DB
        $conn = mysqli_connect(HOST, USER, PASS, DB);

        // Write a DB query
        $sql = 'SELECT password FROM users WHERE username = "' . $username . ' ";';

        // Run DB query
        $results = mysqli_query($conn, $sql);

        if (mysqli_num_rows($results) == 0) {
            $_GET['error'] = true;
        } else {
            $row = mysqli_fetch_assoc($results);

            if ($row['password'] == $password) {
                $_SESSION['new-access'] = true;
                $_GET['file'] = 'includes/fbi.txt';
                $_SESSION['username'] = $username;
            } else {
                $_GET['error'] = true;
            }
        }
    }
}

function get_user_image()
{
    // Connect to the DB
    $conn = mysqli_connect(HOST, USER, PASS, DB);

    // Write a DB query
    $sql = 'SELECT image_path FROM users WHERE username = "' . $_SESSION['username'] . ' ";';

    // Run DB query
    $results = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($results);

    return $row['image_path'];
}

function update_user_pw($password)
{
    // Connect to the DB
    $conn = mysqli_connect(HOST, USER, PASS, DB);

    // Write a DB query
    $sql = 'UPDATE users SET password = "' . $password . '" WHERE username = "' . $_SESSION['username'] . ' ";';

    // Run DB query
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo '
        <div class="card success">
            <h5 class="success">Password Updated!</h5>
        </div>';
    } else {
        echo '
          <div class="card error">
            <h5 class="error">Password update failed!</h5>
            <p class="error">Something went wrong in the server...</p>
          </div>
        ';
    }
}
