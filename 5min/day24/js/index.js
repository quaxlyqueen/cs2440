const div = document.querySelector('div');
const button = document.querySelector('button')

let times = 1;
button.addEventListener('click', (e) => {
  let px = 300 * times;
  times++;
  div.style.top = px + 'px';
});
