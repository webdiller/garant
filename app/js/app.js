const headerModule = (function () {
  try {
    let menu_phone = document.getElementById('menu_phone');
    let menu_dropdown = document.getElementById('menu_dropdown');
    menu_phone.addEventListener('click', function (e) {
      e.preventDefault();
      menu_dropdown.classList.toggle('active');
    });
  } catch (error) {}

  try {
    let menu_call = document.getElementById('menu_call');
    let header__nav = document.querySelector('.header__nav');
    let header__nav_item = document.querySelectorAll('.header__nav-item');
    menu_call.addEventListener('click', function (e) {
      e.preventDefault();
      header__nav.classList.toggle('active');
    });
    if (window.innerWidth <= 1500) {
      header__nav.addEventListener('click', function (e) {
        e.stopPropagation();
        header__nav.classList.remove('active');
      });
    }
  } catch (error) {}
  try {
    let btn_call = document.querySelectorAll('[data-call]');
    let btn_close = document.querySelectorAll('[data-close]');
    let modal = document.getElementById('modal');
    btn_call.forEach((item) => {
      item.addEventListener('click', function (e) {
        e.preventDefault();
        modal.classList.toggle('active');
      });
    });
    btn_close.forEach((item) => {
      item.addEventListener('click', function (e) {
        e.preventDefault();
        modal.classList.remove('active');
      });
    });
  } catch (error) {}
  try {
    document.querySelectorAll('#menu_phone a').forEach(item=>{
      item.addEventListener('click', function (e) {
        e.stopPropagation();
      });
    })
  } catch (error) {}
})();

console.log(
  'Разработка: webdiller.ru - Евгений Бутков - tg:webdillerru - +79996159789 - eugenefromrus@gmail.com'
);
