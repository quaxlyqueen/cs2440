<?php
if (!isset($_GET['id']))
  header('Location: catalog.php');

require_once 'functions/init.php';
require_once 'functions/catalog.php';

// UI Components
foreach (glob('components/products/*.php') as $file)
  require_once $file;

require_once 'components/user/login.php';

require_once 'components/head.php';

echo '<div id="product_page" class="std_width center">';
$product = fetch_product($_GET['id']);
echo product_page($product);
echo '</div>';

require_once 'components/foot.php';
