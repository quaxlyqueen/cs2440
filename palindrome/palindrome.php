<?php
if (isset($_GET['input']))
    $input = $_GET['input'];
else
    echo '<p>Enter something!</p';

$sanitized_input = sanitize_input($input);
if ($sanitized_input == strrev($sanitized_input))
    $output = '<p>Is Palindrome</p>';
else
    $output = '<p>Is Not Palindrome</p>';

function sanitize_input($input)
{
    $invalid_chars = [' ', "'", '?', '/', '\\', '.', ','];
    $output = strtolower($input);
    $output = trim($output);
    $output = str_replace($invalid_chars, '', $output);

    return $output;
}
?>
