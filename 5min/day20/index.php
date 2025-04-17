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
  if (!empty($_POST)) {
    foreach ($_POST as $key => $value) {
      echo '<p>' . $value . '</p>';
    }
  } else {
    $form = '
    <form method="post">
      <input name="1">
      <input name="2">
      <input name="3">
      <input name="4">
      <input name="5">

      <input type="submit">
    </form>
  ';

    echo $form;
  }
  ?>
</body>

</html>
