<?php
include_once 'includes/init.php';

if (!isset($_SESSION['hashbrown_access']) || !$_SESSION['hashbrown_access'])
    header('Location: account.php?view=login');

include_once 'includes/head.php';

echo '<div id="content">';
echo getHome((isset($_GET['file']) ? $_GET['file'] : 'fbi.txt'));
echo '</div>';

include_once 'includes/foot.php';

function getHome($file)
{
    $view = '
        <h1>View Confidential Information</h1>
        <form method="get" class="center">
            <div class="row">
                <button name="file" value="fbi.txt">FBI</button>
                <button name="file" value="spies.txt">Spies</button>
            </div>
        </form>
        ' . table_from_file($file) . '
    ';

    return $view;
}
