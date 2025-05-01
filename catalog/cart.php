<?php
require_once 'functions/init.php';

if (!isset($_SESSION['id']))
    header('Location: catalog.php');

// UI Components
foreach (glob('components/cart/*.php') as $file)
    require_once $file;

require_once 'components/head.php';

require_once 'components/foot.php';
