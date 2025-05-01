<?php
// Use environment variables for the database password and IP address.
$db = $_ENV['DATABASE'];
$db_user = $_ENV['DATABASE_USER'];
$db_pass = $_ENV['DATABASE_PASSWORD'];
$ip_addr = $_ENV['IP_ADDRESS'];

// Make some constants
if ($_SERVER['HTTP_HOST'] == 'localhost:2440') {
    define('HOST', 'localhost');
    define('USER', $db_user);
    define('PASS', $db_pass);
    define('DB', $db);
} else {
    define('HOST', $ip_addr);
    define('USER', $db_user);
    define('PASS', $db_pass);
    define('DB', $db);
}

function exec_stmt($stmt, $param_types, ...$args)
{
    $conn = get_connection();
    $stmt = $conn->prepare($stmt);
    $stmt->bind_param($param_types, ...$args);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result)
        return $result;
    else
        return mysqli_insert_id($conn);
}

function get_connection()
{
    $conn = new mysqli(HOST, USER, PASS, DB);
    return $conn;
}
