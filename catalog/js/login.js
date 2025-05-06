const form = document.querySelector("form");
const username_field = document.querySelector("#username");
const password_field = document.querySelector("#password");
const submit_button = document.querySelector('input[type="submit"]');
const err = document.querySelector("#invalid");
let rp = '';

submit_button.addEventListener("click", (e) => {
  e.preventDefault();

  fetch("/catalog/functions/user.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/x-www-form-urlencoded",
    },
    body:
      "form_id=login&username=" +
      username_field.value +
      "&password=" +
      password_field.value,
  })
    .then((response) => {
      return response.text(); // Parse response body as JSON
    })
    .then((data) => {
      if (data == "granted") form.submit();
      else err.innerText = "Username or Password are incorrect.";
    });
});
