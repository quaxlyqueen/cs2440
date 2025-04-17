<?php

function nav()
{
    $nav = '
    <nav>
        <ul>
            <li><a href="index.php"' . ($_SERVER['SCRIPT_NAME'] == '/index.php' ? ' class="active"' : '') . '>Home</a></li>
    ';

    if (isset($_SESSION['hashbrown_access']) && $_SESSION['hashbrown_access']) {
        $nav .= '
            <li><a href="account.php?view=display"' . ($_SERVER['SCRIPT_NAME'] == '/account.php' ? ' class="active"' : '') . '>Account</a></li>
            <li><a href="users.php"' . ($_SERVER['SCRIPT_NAME'] == '/users.php' ? ' class="active"' : '') . '>Users</a></li>
            <li><a href="video.php"' . ($_SERVER['SCRIPT_NAME'] == '/video.php' ? ' class="active"' : '') . '>Video</a></li>
            <li><a href="account.php?action=logout">Logout</a></li>
        ';
    }

    $nav .= '
        </ul>
    </nav>
    ';

    return $nav;
}
