document.querySelectorAll('div').forEach((d) => {
  d.style.backgroundColor = 'black';
  d.addEventListener('click', populate);
})

function populate() {
  if (this.style.backgroundColor === 'black') {
    this.style.backgroundColor = 'red';
    this.style.borderRadius = '50%';
  } else {
    this.style.backgroundColor = 'black';
    this.style.borderRadius = '0%';
  }
}
