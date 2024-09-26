document.addEventListener("DOMContentLoaded", function () {
  const sizeButtons = document.querySelectorAll('button[data-size]');
  const form = document.getElementById('add-to-cart-form');
  const selectedSizeInput = document.getElementById('selected-size');

  sizeButtons.forEach(function (button) {
    button.addEventListener('click', function () {
      const selectedSize = button.getAttribute('data-size');
      selectedSizeInput.value = selectedSize;

      sizeButtons.forEach(btn => btn.classList.remove('active'));

      button.classList.add('active');
    });
  });

  form.addEventListener('submit', function (event) {
    if (!selectedSizeInput.value) {
      event.preventDefault();
    }
  });
});
