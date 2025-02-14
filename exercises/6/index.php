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
if (isset($_POST['fname'])) {
    echo '<p>' . $_POST['fname'] . '</p>';
    echo '<p>' . $_POST['lname'] . '</p>';
} else {
    echo '
  <form method="POST">
    <input name="fname">
    <input name="lname">
    <button>Submit</button>
  </form>
';
}
?>
</body>

</html>
