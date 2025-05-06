<?php

function product_card($product)
{
  $card = '
    <a class="card full_width padding shadow" href="product.php?id=' . $product['id'] . '">
      <div class="column center full_width space_between" style="height: 100%;">
        <div class="img_container">
          <img src="img/' . $product['image'] . '">
        </div>

        <div class="column">
          <div class="line std_width margin-top center"></div>
          <h5 style="font-size: 1.3vw; font-weight: 400;">' . $product['name'] . '</h5>
          <p>' . format_money($product['price']) . '</p>
          <input type="submit" value="View">
        </div>
      </div>
    </a>
  ';

  return $card;
}
