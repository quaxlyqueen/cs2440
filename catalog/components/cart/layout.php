<?php

function cart_layout()
{
  $total = 0;

  $layout = '
    <div id="cart_container" class="glass std_width column center margin-top padding" style="height: 600px; overflow-y: auto;">
      <table>
        <tr>
          <th>Name</th>
          <th>Quantity</th>
          <th>Unit $</th>
          <th>Total $</th>
          <th></th>
        </tr>
  ';

  foreach ($_SESSION['cart'] as $id => $q) {
    $product = fetch_product($id);
    $total += $product['price'] * $q;
    $layout .= cart_item($product, $q);
  }

  $layout .= '
      </table>
    ' . cart_checkout($total) . '
    </div>
  ';

  return $layout;
}
