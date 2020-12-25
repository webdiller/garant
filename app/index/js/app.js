let form = document.getElementById('sendForm');
form.addEventListener('submit', function (e) {
  e.preventDefault();
});

let menu_phone = document.getElementById('menu_phone');
let menu_dropdown = document.getElementById('menu_dropdown');
menu_phone.addEventListener('click', function (e) {
  e.preventDefault();
  menu_dropdown.classList.toggle('active');
});
