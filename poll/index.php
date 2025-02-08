<?php
require_once 'vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();

// Use environment variables for the database password and IP address.
$db_pass = $_ENV['DATABASE_PASSWORD'];
$ip_addr = $_ENV['IP_ADDRESS'];

// Make some constants
if ($_SERVER['HTTP_HOST'] == 'localhost') {
    define('HOST', 'localhost');
    define('USER', 'root');
    define('PASS', $db_pass);
    define('DB', 'poll');
} else {
    define('HOST', $ip_addr);
    define('USER', 'root');
    define('PASS', $db_pass);
    define('DB', 'poll');
}

$poll_options = [
    'Atom',
    'Brackets',
    'Eclipse',
    'Emacs',
    'Gedit',
    'IntelliJ',
    'Nano',
    'NetBeans',
    'NeoVim',
    'Notepad++',
    'Sublime',
    'Visual Studio',
    'Visual Studio Code',
    'XCode',
];

if (isset($_POST['option'])) {
    setcookie('form_submitted', 'true', time() + 3600, '/');  // Expires in 1 hour (adjust as needed)
}
?>

<!doctype html>
<html lang="en">

<head>
  <title>Poll</title>
  <link href="css/styles.css" type="text/css" rel="stylesheet">
  <script src="js/index.js" defer></script>
</head>

<body>
  <h1>Poll</h1>
<?php
if (!isset($_POST['option']) && !isset($_COOKIE['form_submitted'])) {
    echo '
<h3>What is the best text editor or IDE?</h3>
  <form method="post">';

    foreach ($poll_options as $option) {
        echo '
      <div class="option">
        <label for="' . $option . '">
        <input type="radio" value="' . $option . '" id="' . $option . '" name="option">
        ' . $option . '
        </label>
      </div>
    ';
    }

    echo '
    <button>Submit</button>
  </form>';
} else {
    echo "<h3>Thank you! Here's the results.</h3>";
    if ($_COOKIE['form_submitted'])
        displayChart();
    else
        updateDb($_POST['option']);
}
?>
</body>

</html>
<?php
function updateDb($option)
{
    $conn = mysqli_connect(HOST, USER, PASS, DB);

    // Write a DB query
    $sql = 'SELECT * FROM poll_results WHERE option = "' . $option . '";';

    // Run DB query
    $results = mysqli_query($conn, $sql);
    if (mysqli_num_rows($results) == 0) {
        $sql = "INSERT INTO poll_results (option, count) VALUES (' . $option . ', 1)";
        $results = mysqli_query($conn, $sql);
    } else {
        $sql = 'UPDATE poll_results SET count = count + 1 WHERE option = "' . $option . '";';
        $results = mysqli_query($conn, $sql);
    }

    displayChart();
}

function displayChart()
{
    // Connect to the DB
    $conn = mysqli_connect(HOST, USER, PASS, DB);

    $sql = 'SELECT * FROM poll_results ORDER BY count DESC;';
    $data = mysqli_query($conn, $sql);

    $sql = 'SELECT SUM(count) AS total_count FROM poll_results;';
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $totalCount = $row['total_count'];

    echo '<div class="chart">';
    while ($row = mysqli_fetch_assoc($data)) {
        $width = ($row['count'] / $totalCount) * 100;
        $calculatedWidth = max($width, 5);
        echo '<p class="chart-label">' . $row['option'] . '</p>';
        echo '<div class="bar" style="width: ' . $calculatedWidth . '%"><p class="bar-label">' . ceil($width) . '%</p></div>';
    }
    echo '</div>';
}
?>
