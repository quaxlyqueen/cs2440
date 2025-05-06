<?php
include_once 'functions/init.php';
include_once 'functions/catalog.php';

if (isset($_GET['redirect']))
    header('Location: product.php?id=' . $_GET['redirect']);

// UI Components
foreach (glob('components/products/*.php') as $file)
    require_once $file;

include_once 'components/head.php';

echo '
<div class="row space_between full_width center margin-top margin-bottom">
    <h1 class="margin-left">Catalog</h1>
    <div class="column center_children md_width margin-right">
        <div class="card full_width padding" style="height: fit-content;">
            <p>We\'ve Got Just What You Didn\'t Know You Needed! From gravity-defying gizmos to explosively helpful solutions, browse our catalog and unleash your inner inventor (or hapless pursuer)!</p>
        </div>
    </div>
</div>
';

echo '<div id="catalog" class="std_width center">';
echo '';
pretty_dump(fetch_catalog());
echo catalog_grid(fetch_catalog());
echo '</div>';

include_once 'components/foot.php';
