<!doctype html>
<html lang="en">

<head>
  <title>Dummy Title</title>
  <link href="css/styles.css" type="text/css" rel="stylesheet">
  <script src="js/index.js"></script>
</head>

<body>
  <h1>Hello cruel world!</h1>
  <?php
  $str = 'a';
  $end = 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa';

  while ($str !== $end) {
    echo '<li>' . strlen($str) . '</li>';
    $str .= 'a';
  }
  ?>
</body>

</html>
