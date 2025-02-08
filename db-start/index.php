<?php
require_once 'vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();
$db_pass = $_ENV['DATABASE_PASSWORD'];

// Make some constants
define('HOST', '173.255.248.228');
define('USER', 'root');
define('PASS', $db_pass);
define('DB', 'palindromes');

// Connect to the DB
$conn = mysqli_connect(HOST, USER, PASS, DB);

// Write a DB query
$sql = 'SELECT * FROM palindrome;';

// Run DB query
$results = mysqli_query($conn, $sql);

// Loop through data
while ($row = mysqli_fetch_array($results, MYSQLI_ASSOC)) {
    echo $row['phrase'] . '<br>';
};
?>
