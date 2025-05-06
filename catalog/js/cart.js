const items = document.querySelectorAll(".cart_item");
const total = document.querySelector("h3#total");

items.forEach((item) => {
  const quantity = item.querySelector(".item_quantity");
  const id = item.querySelector('input[type="hidden"]');
  const delete_btn = item.querySelector("i");

  quantity.addEventListener("change", () =>
    handle_quantity_change(id.value, quantity.value, item),
  );

  delete_btn.addEventListener("click", () => remove_item(id.value, item));
});

function handle_quantity_change(id, q, item) {
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
      .then((response) => response.text())
      .then((data) => {
        total.innerText = decodeURIComponent(data);
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
    .then((response) => response.text())
    .then((data) => {
      total.innerText = decodeURIComponent(data);
      item.remove();
    });
}
