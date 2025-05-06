<?php
function product_page($product)
{
  $page = '
    <div class="product_page_card glass column center full_width padding margin-top">
      <div class="img_container">
        <img src="img/' . $product['image'] . '">
      </div>
      <div class="column card full_width padding margin-top shadow" style="height: auto;">
        <div class="row space_between">
          <h3>' . $product['name'] . '</h3>
          <h3>' . format_money($product['price']) . '</h3>
        </div>

        <p>' . $product['description'] . '</p>
        <form class="row space_between" id="add_to_cart">
          <input type="hidden" name="is_logged_in" value="' . (isset($_SESSION['id']) ? 'true' : 'false') . '" id="is_logged_in">
          <input type="hidden" name="product_id" value="' . $product['id'] . '" id="product_id">
          <div class="column margin center_children">
            <label for="quantity">Quantity:</label>
            <input type="number" value="1" id="quantity" name="quantity" min="1" max="1000" class="full_width">
          </div>
          
          <input type="submit" class="margin" id="add_to_cart_btn" value="Add to Cart">
        </form>
        </div>
      </div>

      <div class="modal">
        <div class="modal_content">
          ' . login_form() . '
        </div>
    </div>
  ';

  return $page;
}
