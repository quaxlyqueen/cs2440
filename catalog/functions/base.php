<?php
function pretty_dump($arg)
{
    ob_start();
    echo '<pre>';
    print_r($arg);
    echo '</pre>';
    return ob_get_clean();
}

function random_string()
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $rand_string = '';
    for ($i = 0; $i < 512; $i++)
        $rand_string = $characters[rand(0, strlen($characters) - 1)];

    return $rand_string;
}

function verify_hash($arg, $hash_salt)
{
    list($salt_hex, $hash) = explode('.', $hash_salt, 2);
    $salt = hex2bin($salt_hex);
    $calculated_hash = hash('sha512', $salt . $arg . $_ENV['SALT']);
    return hash_equals($hash, $calculated_hash);
}

function hash_salt($arg = null)
{
    if (!$arg)
        $arg = random_string();

    $salt1 = random_bytes(256);
    $salt2 = $_ENV['SALT'];

    return bin2hex($salt1) . '.' . hash('sha512', $salt1 . $arg . $salt2);
}
