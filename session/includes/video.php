<?php
session_start();

if ($_SESSION['new-access'] !== true)
    header('Location: .');

echo '<h1>YouTube Video</h1>';
echo '
<iframe width="560" height="315" src="https://www.youtube.com/embed/8BIcAZxFfrc?si=DMccopjQMFNs361I" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
';
