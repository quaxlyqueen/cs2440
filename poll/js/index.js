const radioButtons = document.querySelectorAll('input[type="radio"]');

radioButtons.forEach(radio => {
  radio.addEventListener('change', () => {
    // Remove 'checked' class from all labels
    radioButtons.forEach(otherRadio => {
      otherRadio.parentNode.classList.remove('checked'); // parentNode gets the label
      console.log('removed checked');
    });

    // Add 'checked' class to the currently selected label
    if (radio.checked) {
      radio.parentNode.classList.add('checked');
      console.log('added checked');
    }
  });
});
