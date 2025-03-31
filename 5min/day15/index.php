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
if (isset($_POST['band']))
    echo $_POST['band'];
else
    echo form();
?>
</body>

</html>

<?php
function form()
{
    $form = '
  <form method="post">
    <label for="metallica">Metallica</label>
    <input type="radio" value="metallica" id="metallica" name="band">
    <label for="megadeth">Megadeth</label>
    <input type="radio" value="megadeth" id="megadeth" name="band">
    <label for="maiden">Maiden</label>
    <input type="radio" value="maiden" id="maiden" name="band">
    <input type="submit">
  </form>
';

    return $form;
}
?>
