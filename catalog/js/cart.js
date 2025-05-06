const cart = document.querySelector('#cart_container');
const items = document.querySelectorAll(".cart_item");
const total = document.querySelector("h3#total");

items.forEach((item) => {
  const quantity = item.querySelector(".item_quantity");
  let item_total = item.querySelector('.item_total');
  const id = item.querySelector('input[type="hidden"]');
  const delete_btn = item.querySelector("i");

  quantity.addEventListener("change", () =>
    handle_quantity_change(id.value, quantity.value, item_total, item),
  );

  delete_btn.addEventListener("click", () => remove_item(id.value, item));
});

function handle_quantity_change(id, q, item_total, item) {
  if (parseInt(q) == 0) {
    remove_item(id, item);
  } else {
    fetch("/catalog/functions/catalog.php", {
      method: "POST",
      headers: {
        "Content-Type": "application/x-www-form-urlencoded",
      },
      body: "form_id=cart&action=adjust&product_id=" + id + "&quantity=" + q,
    })
      .then((response) => response.json())
      .then((data) => {
        total.innerText = data['total'];
        item_total.innerText = data['item_total'];
      });
  }
}

function remove_item(id, item) {
  fetch("/catalog/functions/catalog.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/x-www-form-urlencoded",
    },
    body: "form_id=cart&action=remove&product_id=" + id,
  })
    .then((response) => response.json())
    .then((data) => {
      if (data['count'] == 0) {
        document.querySelector('body').removeChild(cart);
        // Create a new div element
        var newDiv = document.createElement('div');
        newDiv.classList.add('glass', 'center', 'md_width', 'padding', 'margin-top');
        newDiv.style.height = 'auto';

        // Add content to the new div
        newDiv.innerHTML = '<h3>Your cart is empty!</h3><p>Check out our innovative and reliable products <a href="catalog.php">here</a>.</p>';

        // Append the new div to the body
        document.querySelector('body').appendChild(newDiv);
      } else {
        total.innerText = data['total'];
        item.remove();
      }

      let dot = document.querySelector('#dotton');
      let count = document.querySelector('#dotton > small');
      if (data[count] == 0)
        dot.style.visibility = 'hidden';
      else
        count.innerText = data['count'];
    });
}
