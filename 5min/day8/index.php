<!doctype html>
<html lang="en">

<head>
  <title>Dummy Title</title>
  <link href="css/styles.css" type="text/css" rel="stylesheet">
  <script src="js/index.js"></script>
</head>

<body>
  <h1>Hello cruel world!</h1>
  <form method="get">
    <input name="fname">
    <input name="lname">
    <button>Submit</button>
  </form>

  <?php
if (isset($_GET['fname'])) {
    echo '<p>' . $_GET['fname'] . '</p>';
    echo '<p>' . $_GET['lname'] . '</p>';
}
?>
</body>

</html>
