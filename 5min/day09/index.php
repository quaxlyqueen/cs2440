<!doctype html>
<html lang="en">

<head>
  <title>Dummy Title</title>
  <link href="css/styles.css" type="text/css" rel="stylesheet">
  <script src="js/index.js"></script>
</head>

<body>
  <form method="post">
    <select name="items">
      <?php
for ($i = 1; $i <= 30; $i++) {
    echo '<option value="' . $i . '">Item #' . $i . '</option>';
}
?>
    <input type="submit">
    </select>
  </form>
</body>

</html>
