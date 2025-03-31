async function modeSwitch(mode) {
  const content = document.getElementById("content");
  console.log(mode);
  if (mode == 'explore') {
    var response = await fetch('explore.php');

    if (response.status === 200) {
      let data = async () => { return await response.text() };
      let text = await data();
      content.innerHTML = text;
    }
    switcher.setAttribute("onclick", "modeSwitch('core')")
    switcher.innerText = 'Core';
  } else {
    var response = await fetch('core.php');

    if (response.status === 200) {
      let data = async () => { return await response.text() };
      let text = await data();
      content.innerHTML = text;
    }
    switcher.setAttribute("onclick", "modeSwitch('explore')")
    switcher.innerText = 'Explore';
  }
}
