<?php
if (isset($_POST['form_id'])) {
    session_start();
    require_once '/home/prod/cs2440/catalog/vendor/autoload.php';
    $dotenv = Dotenv\Dotenv::createImmutable('/home/prod/cs2440/catalog');
    $dotenv->safeLoad();
    require_once 'base.php';
    require_once 'db.php';

    switch ($_POST['form_id']) {
        case 'add_to_cart':
            if (isset($_POST['product_id']) && isset($_POST['quantity']))
                echo urlencode(add_to_cart($_POST['product_id'], $_POST['quantity']));
            break;
        case 'cart':
            handle_cart();
            break;
    }
}

function handle_cart()
{
    if (!isset($_POST['product_id'])) {
        echo urlencode('failure');
        return;
    }

    $id = $_POST['product_id'];

    if (isset($_POST['action'])) {
        switch ($_POST['action']) {
            case 'remove':
                $_SESSION['cart'][$id] = 0;
                unset($_SESSION['cart'][$id]);
                echo urlencode(format_money(calculate_total()));
                break;
            case 'adjust':
                $_SESSION['cart'][$id] = $_POST['quantity'];
                echo urlencode(format_money(calculate_total()));
                break;
        }
    }
}

function calculate_total()
{
    $total = 0;
    foreach ($_SESSION['cart'] as $id => $q) {
        $product = fetch_product($id);
        $total += $product['price'] * $q;
    }

    return $total;
}

function set_quantity($id, $q)
{
    if (isset($_SESSION['cart'][$id]))
        $_SESSION['cart'][$id] = $q;
}

function add_to_cart($id, $q)
{
    if (!isset($_SESSION['cart'][$id]))
        $_SESSION['cart'][$id] = $q;
    else
        $_SESSION['cart'][$id] = $_SESSION['cart'][$id] + $q;

    return count($_SESSION['cart']);
}

function fetch_catalog()
{
    $conn = get_connection();
    $result = $conn->query('SELECT * FROM product');
    return $result;
}

function fetch_product($id)
{
    $result = exec_stmt('SELECT * FROM product WHERE id = ?', 'i', $id);
    return $result->fetch_assoc();
}
