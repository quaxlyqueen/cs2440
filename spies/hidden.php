<?php
$users = array('chuck' => 'roast', 'bob' => 'ross');
$access = false;

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    if (array_key_exists($username, $users) && $users[$username] === $password)
        $access = true;
}

$file = 'fbi.txt';

function fileRead($file)
{
    if (isset($_GET['fbi']))
        $file = 'fbi.txt';
    else
        $file = 'spies.txt';
    if ($access) {
        echo "reading $file";
        $fs = fopen($file, 'r');
        $string = fread($fs, filesize($file));
        $values = explode('||>><<||', $string);

        echo '<table>';
        foreach ($values as $v) {
            list($a, $b) = explode(',', $v);

            echo '
              <tr>
                <td>' . $a . '</td>
                <td>' . $b . '</td>
              </tr>
            ';
        }
        echo '</table>';
    } else
        header('Location: .?access=false');
}
?>
<!doctype html>
<html lang="en">

<head>
  <title>Spies</title>
  <link href="css/styles.css" type="text/css" rel="stylesheet">
  <script src="js/index.js"></script>
</head>

<body>
  <h1>View Confidential Information</h1>

<?php
if ($access) {
    echo '<p>Access Granted</p>';

    echo '
        <button name="fbi" type="submit" method="get">FBI</button>
        <button name="spies" type="submit" method="get">Spies</button>
    ';

    fileRead($file);
}
?>
</body>

</html>

<?php
?>
