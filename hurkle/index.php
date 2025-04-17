<?php
session_start();
place_hurkle();
if (!isset($_SESSION['size']))
    $_SESSION['size'] = 10;
?>

<!doctype html>
<html lang="en">

<head>
  <title>Hurkle</title>
  <link href="css/styles.css" type="text/css" rel="stylesheet">
  <script src="js/index.js"></script>
</head>

<body>
  <?php
function evaluate_input()
{
    if (isset($_POST['position'])) {
        echo '<p>Hurkle position: ' . $_SESSION['x'] . ':' . $_SESSION['y'] . '</p>';
        [$x, $y] = explode(':', $_POST['position']);

        if ($x == $_SESSION['x'] && $y == $_SESSION['y'])
            echo '<p>You found the Hurkle!</p>';
        else {
            $direction = '';
            if ($y < $_SESSION['y'])
                $direction .= 'South';
            else if ($y > $_SESSION['y'])
                $direction .= 'North';

            if ($x < $_SESSION['x'])
                $direction .= 'East';
            if ($x > $_SESSION['x'])
                $direction .= 'West';

            echo '<p>Hurkle is ' . $direction . '</p>';
        }
    }

    if (isset($_POST['reset'])) {
        reset_session();
    }

    if (isset($_GET['size'])) {
        $_SESSION['size'] = $_GET['size'];
        reset_session();
        header('Location: .');
    }
}

evaluate_input();

echo '
<div id="content">
  <h1>Hurkle</h1>
';
echo generate_grid();
echo bottom_bar();
echo '</div>';

function bottom_bar()
{
    $forms = '
  <div class="row">
    <form method="get">
      <select name="size" id="size">
';

    for ($i = 2; $i < 12; $i++)
        $forms .= '<option value="' . $i . '">' . $i . '</option>';

    $forms .= '
      </select>

      <input type="submit" class="button">
    </form>
    <form method="post">
      <input type="submit" name="reset" value="Restart" class="button">
    </form>
  </div>
';

    return $forms;
}

function reset_session()
{
    unset($_SESSION['x']);
    unset($_SESSION['y']);
    place_hurkle();
}

function generate_grid()
{
    $grid = '
        <form method="post" style="display: grid; grid-template-columns: repeat(' . $_SESSION['size'] . ', 50px); grid-template-rows: repeat(' . $_SESSION['size'] . ', 50px);">
    ';

    for ($i = 0; $i < $_SESSION['size']; $i++) {
        for ($j = 0; $j < $_SESSION['size']; $j++) {
            $grid .= '
            <input class="cell" type="submit" name="position" value="' . $j . ':' . $i . '">
          ';
        }
    }

    $grid .= '
        </form>
    ';

    return $grid;
}

function place_hurkle()
{
    if (!isset($_SESSION['x']) && !isset($_SESSION['y'])) {
        $_SESSION['x'] = rand(0, $_SESSION['size'] - 1);
        $_SESSION['y'] = rand(0, $_SESSION['size'] - 1);
    }
}
?>
</body>

</html>
