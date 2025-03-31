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
    $fs = fopen('records.txt', 'a');
    $text = implode(',', $_POST['options']);
    fwrite($fs, $text);
} else {
    echo '
  <form method="post">
    <label for="metallica">Metallica</label>
    <input type="checkbox" value="Metallica" id="metallica" name="options[]">
    <label for="megadeth">Megadeth</label>
    <input type="checkbox" value="Megadeth" id="megadeth" name="options[]">
    <label for="clairo">Clairo</label>
    <input type="checkbox" value="Clairo" id="clairo" name="options[]">
    <label for="abstract">Kevin Abstract</label>
    <input type="checkbox" value="Kevin Abstract" id="abstract" name="options[]">
    <label for="slippy">Megadeth</label>
    <input type="checkbox" value="Slipknot" id="slippy" name="options[]">
    <input type="submit">
  </form>
';
}
?>
</body>

</html>
