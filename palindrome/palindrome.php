<?php
$input = $_GET['input'];
$sanitized_input = sanitize_input($input);
if ($sanitized_input == strrev($sanitized_input))
    $output = '<p>Is Palindrome</p>';
else
    $output = '<p>Is Not Palindrome</p>';

function sanitize_input($input)
{
    $output = strtolower($input);
    $output = trim($output);
    $output = str_replace([',', ' '], '', $output);

    return $output;
}
?>

<!doctype html>
<html lang="en">

<head>
  <title>Palindrome Tester</title>
</head>

<body>
  <h1>Palindrome Tester</h1>
  <form action="palindrome.php" method="[post | get]">
    <input type="text" name="input">
    <input type="submit">
  </form>
  <?php
echo $output;
?>
</body>

</html>
