const username_field = document.querySelector("#username");
const password_field = document.querySelector("#password");
const v_password_field = document.querySelector("#v_password");
const submit_button = document.querySelector('input[type="submit"]');

const err_username = document.querySelector("#err_username");
const err_match = document.querySelector("#err_match");
const err_length = document.querySelector("#err_length");
const err_num = document.querySelector("#err_num");

function handle_input() {
  const password = password_field.value;
  const v_password = v_password_field.value;
  if (password != v_password && v_password != "")
    err_match.innerText = "Passwords do not match.";
  else err_match.innerText = "";

  if (password.length < 8)
    err_length.innerText = "Password must be at least 8 characters long.";
  else err_length.innerText = "";

  const num_regex = /\d/;
  if (!num_regex.test(password))
    err_num.innerText = "Password must have at least 1 digit.";
  else err_num.innerText = "";

  if (
    err_match.innerText == "" &&
    err_length.innerText == "" &&
    err_num.innerText == "" &&
    err_username.innerText == "" &&
    v_password != ""
  )
    submit_button.disabled = false;
  else submit_button.disabled = true;
}

function handle_username() {
  const username = username_field.value;

  fetch("functions/user.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/x-www-form-urlencoded",
    },
    body: "form_id=create-account&username=" + username,
  })
    .then((response) => {
      if (!response.ok) {
        console.log("Failed to check if username exists!");
      }

      return response.json(); // Parse response body as JSON
    })
    .then((data) => {
      if (data["exists"] == "True")
        err_username.innerText = "Username is taken.";
      else err_username.innerText = "";
    });
}

username_field.addEventListener("blur", handle_username);
password_field.addEventListener("input", handle_input);
v_password_field.addEventListener("input", handle_input);
submit_button.disabled = true;
