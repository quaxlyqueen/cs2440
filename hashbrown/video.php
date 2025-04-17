<?php
include_once 'includes/init.php';

if (!isset($_SESSION['hashbrown_access']) || !$_SESSION['hashbrown_access'])
    header('Location: account.php?view=login');

include_once 'includes/functions.php';
include_once 'includes/head.php';

echo '<h1>YouTube Video</h1>';
echo '<iframe width="560" height="315" src="https://www.youtube.com/embed/8BIcAZxFfrc?si=DMccopjQMFNs361I" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>';

include_once 'includes/foot.php';
