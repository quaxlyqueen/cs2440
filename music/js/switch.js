async function modeSwitch() {
  const content = document.getElementById("content");
  var response = await fetch('explore.php');

  if (response.status === 200) {
    let data = async () => { return await response.text() };
    let text = await data();
    content.innerHTML = text;
  }
}
