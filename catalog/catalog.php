<?php
include_once 'functions/init.php';
include_once 'functions/catalog.php';

// UI Components
foreach (glob('components/products/*.php') as $file)
    require_once $file;

include_once 'components/head.php';

echo '<h1 class="margin-left">Catalog</h1>';

echo '<div id="catalog" class="std_width center">';
pretty_dump(fetch_catalog());
echo catalog_grid(fetch_catalog());
echo '</div>';

include_once 'components/foot.php';
