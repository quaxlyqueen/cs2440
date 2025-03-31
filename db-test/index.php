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
    define('DB', 'palindromes');
} else {
    define('HOST', $ip_addr);
    define('USER', 'root');
    define('PASS', $db_pass);
    define('DB', 'palindromes');
}

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
