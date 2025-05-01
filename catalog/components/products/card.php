<?php

function product_card($product)
{
    $card = '
    <a class="card column center full_width padding" href="product.php?id=' . $product['id'] . '">
      <div class="img_container">
        <img src="img/' . $product['image'] . '">
      </div>

      <div class="row">
        <h4>' . $product['name'] . '</h4>
        <h5>' . $product['price'] . '</h5>
      </div>
    </a>
  ';

    return $card;
}
