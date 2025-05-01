const add_to_cart = document.querySelector('input[type="submit"]');

const modal = document.querySelector('.modal');
const username = document.querySelector('#username');
const password = document.querySelector('#password');
const login_button = document.querySelector('#login_submit');


add_to_cart.addEventListener('click', (e) => {
  e.preventDefault();

  if (modal.classList[0] === "fade-in") {
    modal.classList.remove("fade-in");
    modal.classList.add("fade-out");
  } else {
    modal.classList.remove("fade-out");
    modal.classList.add("fade-in");
  }


  modal.addEventListener('click', () => {
    if (modal.classList[0] === "fade-in") {
      modal.classList.remove("fade-in");
      modal.classList.add("fade-out");
    } else {
      modal.classList.remove("fade-out");
      modal.classList.add("fade-in");
    }
  })

});
