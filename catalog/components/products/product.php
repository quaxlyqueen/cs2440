<?php
function product_page($product)
{
  $page = '
    <div class="product_page_card column center full_width padding">
      <div class="img_container">
        <img src="img/' . $product['image'] . '">
      </div>
      <div class="column">
        <div class="row space_between">
          <h3>' . $product['name'] . '</h3>
          <h3>' . $product['price'] . '</h3>
        </div>

        <p>' . $product['description'] . '</p>
        <form class="row" id="add_to_cart">
          <input type="hidden" name="is_logged_in" value="' . (isset($_SESSION['id']) ? 'true' : 'false') . '">
          <div class="column margin">
            <label for="quantity">Quantity:</label>
            <input type="number" value="1" id="quantity" name="quantity" min="1">
          </div>
          
          <input type="submit" value="Add to Cart" class="margin">
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
