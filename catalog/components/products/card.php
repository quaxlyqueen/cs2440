<?php

function product_card($product)
{
  $card = '
    <a class="card column center full_width padding shadow" href="product.php?id=' . $product['id'] . '">
      <div class="img_container">
        <img src="img/' . $product['image'] . '">
      </div>

      <div class="column">
        <h5>' . $product['name'] . '</h5>
        <p>' . format_money($product['price']) . '</p>
      </div>
    </a>
  ';

  return $card;
}
