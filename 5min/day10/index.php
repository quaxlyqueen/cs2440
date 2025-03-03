<?php
$fields = [
    'first-name' => 'e.g., Bob',
    'last-name' => 'e.g., Ross',
    'street-address' => 'e.g., 123 Main Street',
    'city' => 'e.g., Boston',
    'state' => 'e.g., MA',
    'zip' => 'e.g., 02108',
];

include ('includes/functions.php');
?>

<!doctype html>
<html lang="en">

<head>
  <title>Dummy Title</title>
  <link href="css/styles.css" type="text/css" rel="stylesheet">
  <script src="js/index.js"></script>
</head>

<body>
<?php
echo '<div class="center>
  ' . generateForm($fields) . '
  </div>';
?>
</body>

</html>
