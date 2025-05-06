<?php
// Use environment variables for the database password and IP address.
$db = $_ENV['DB'];
$db_user = $_ENV['DB_UN'];
$db_pass = $_ENV['DB_PW'];
$ip_addr = $_ENV['DB_IP'];

// Make some constants
if ($_SERVER['HTTP_HOST'] == 'localhost') {
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

    if ($result) {
        return $result;
    } else {
        return mysqli_insert_id($conn);
    }
}

function get_connection()
{
    $conn = new mysqli(HOST, USER, PASS, DB);
    return $conn;
}
