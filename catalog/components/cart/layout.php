<?php

function cart_layout()
{
  $total = 0;

  $layout = '
    <div class="grid_2x1 center std_width glass padding">
      <div class="card list full_width padding shadow" style="height: 700px;">
  ';

  foreach ($_SESSION['cart'] as $id => $q) {
    $product = fetch_product($id);
    $total += $product['price'] * $q;
    $layout .= cart_item($product, $q);
  }

  $layout .= '
      </div>
      ' . cart_checkout($total) . '
    </div>
  ';

  return $layout;
}
