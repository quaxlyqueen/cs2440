<?php
require_once 'functions/init.php';

if (!isset($_SESSION['id']))
    header('Location: catalog.php');

// UI Components
foreach (glob('components/cart/*.php') as $file)
    require_once $file;

require_once 'functions/catalog.php';
require_once 'components/head.php';

if (empty($_SESSION['cart'])) {
    echo '
        <div class="glass center md_width padding margin-top" style="height: auto;">
            <h3>Your cart is empty!</h3>
            <p>Check out our innovative and reliable products <a href="catalog.php">here</a>.</p>
        </div>
    ';
} else {
    if (isset($_POST['form_id'])) {
        $total = calculate_total();
        $items = [];
        foreach ($_SESSION['cart'] as $id => $q) {
            $items[fetch_product($id)['name']] = $q;
            unset($_SESSION['cart'][$id]);
        }

        echo cart_confirmation($_POST['fname'], $_POST['lname'], $_POST['add'], $_POST['city'], $_POST['state'], $_POST['zip'], $total, $items);
    } else
        echo cart_layout();
}

require_once 'components/foot.php';
