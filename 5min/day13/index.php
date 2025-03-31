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
$content = '';
$fs = fopen('includes/instructions.txt', 'r');
while ($str = fgets($fs)) {
    $words = explode(' ', $str);
    foreach ($words as $w) {
        $content .= '<span>' . $w . '</span>';
    }
}
echo $content;
$form = '
  <form method="post">
    <label for="word">Word</label>
    <input type="text" name="word" id="word" placeholder="word">
    <input type="submit">
  </form>
';

if (empty($_POST))
    echo $form;
else {
    echo $form;
    echo $_POST['word'];
}
?>
</body>

</html>
