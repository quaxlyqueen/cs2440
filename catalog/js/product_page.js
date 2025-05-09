const is_logged_in = document.querySelector("#is_logged_in");
const product_id = document.querySelector("#product_id");
const quantity = document.querySelector("#quantity");
const add_to_cart = document.querySelector('input[type="submit"]');

const modal = document.querySelector(".modal");
const username = document.querySelector("#username");
const password = document.querySelector("#password");
const login_button = document.querySelector("#login_submit");

add_to_cart.addEventListener("click", (e) => {
  e.preventDefault();

  if (is_logged_in.value == "true") {
    fetch("functions/catalog.php", {
      method: "POST",
      headers: {
        "Content-Type": "application/x-www-form-urlencoded",
      },
      body: 'form_id=add_to_cart&product_id=' + product_id.value + '&quantity=' + quantity.value,
    })
      .then((response) => response.text())
      .then((data) => {
        document.querySelector('#dotton > small').innerText = decodeURIComponent(data);
      });
  } else {
    if (modal.classList[0] === "fade-in") {
      modal.classList.remove("fade-in");
      modal.classList.add("fade-out");
    } else {
      modal.classList.remove("fade-out");
      modal.classList.add("fade-in");
    }

    modal.addEventListener("click", () => {
      if (modal.classList[0] === "fade-in") {
        modal.classList.remove("fade-in");
        modal.classList.add("fade-out");
      } else {
        modal.classList.remove("fade-out");
        modal.classList.add("fade-in");
      }
    });
  }
});
