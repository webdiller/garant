document.addEventListener('DOMContentLoaded', function () {
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
      let menu_bar = document.getElementById('menu_bar');
      let menu_close = document.getElementById('menu_close');
      let header__nav = document.querySelector('.header__nav');
      menu_call.addEventListener('click', function (e) {
        e.preventDefault();
        header__nav.classList.toggle('active');
        menu_bar.classList.toggle('active');
        menu_close.classList.toggle('active');
      });
      if (window.innerWidth <= 1500) {
        header__nav.addEventListener('click', function (e) {
          e.stopPropagation();
          header__nav.classList.remove('active');
          menu_bar.classList.add('active');
          menu_close.classList.remove('active');
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
      document.querySelectorAll('#menu_phone a').forEach((item) => {
        item.addEventListener('click', function (e) {
          e.stopPropagation();
        });
      });
    } catch (error) {}
  })();

  const lightBoxModule = (function () {
    try {
    } catch (error) {}
  })();
  const sliderModule = (function () {
    try {
      const mainImgWrapper = document.querySelector('#slider .slider__main-img-wrapper');
      const mainImg = document.querySelector('#slider .slider__main-img');
      const thumbImagesWrapper = document.querySelectorAll('#slider .slider__thumb-wrapper');
      const thumbImages = document.querySelectorAll('#slider .slider__thumb-wrapper img');
      const imgWrapper1 = document.querySelector('#slider .slider__thumb-wrapper:nth-child(1)');
      const imgWrapper2 = document.querySelector('#slider .slider__thumb-wrapper:nth-child(2)');
      const imgWrapper3 = document.querySelector('#slider .slider__thumb-wrapper:nth-child(3)');
      const img1 = document.querySelector('#slider .slider__thumb-wrapper:nth-child(1) img');
      const img2 = document.querySelector('#slider .slider__thumb-wrapper:nth-child(2) img');
      const img3 = document.querySelector('#slider .slider__thumb-wrapper:nth-child(3) img');
      const arrowLeft = document.querySelector('#slider .slider__arrow-left');
      const arrowRight = document.querySelector('#slider .slider__arrow-right');

      const imagesArr = [];

      thumbImagesWrapper.forEach((item) => {
        item.addEventListener('click', function (e) {
          mainImgWrapper.classList.add('active');
          thumbImagesWrapper.forEach((item) => item.classList.remove('current'));
          e.target.parentElement.classList.add('active', 'current');
          setTimeout(() => {
            let srcMain = mainImg.src;
            let srcChild = e.target.src;
            mainImg.src = srcChild;
            e.target.src = srcMain;
          }, 300);
          setTimeout(() => {
            mainImgWrapper.classList.remove('active');
            e.target.parentElement.classList.remove('active');
          }, 300);
        });
      });

      arrowLeft.addEventListener('click', function () {
        let arr = [];
        thumbImagesWrapper.forEach((item) => arr.push(item.classList.value));
        let condition = arr.some((elem) => elem.includes('current'));
        if (condition) {
          let elem = document.querySelector('#slider .slider__thumb-wrapper.current');
          if (elem.previousElementSibling !== null) {
            mainImgWrapper.classList.add('active');
            elem.classList.remove('current');
            elem.previousElementSibling.classList.add('current', 'active');
            setTimeout(() => {
              let srcMain = mainImg.src;
              let srcChild = elem.previousElementSibling.children[0].src;
              mainImg.src = srcChild;
              elem.previousElementSibling.children[0].src = srcMain;
            }, 300);
            setTimeout(() => {
              mainImgWrapper.classList.remove('active');
              elem.previousElementSibling.classList.remove('active');
            }, 300);
          } else {
            mainImgWrapper.classList.add('active');
            elem.classList.remove('current');
            document.querySelector('#slider .slider__thumb-wrapper:nth-child(3)').classList.add('current', 'active');
            setTimeout(() => {
              let srcMain = document.querySelector('#slider > div.slider__main > div.slider__main-img-wrapper > img').src;
              let srcChild = document.querySelector('#slider .slider__thumb-wrapper:nth-child(3) img').src;
              document.querySelector('#slider > div.slider__main > div.slider__main-img-wrapper > img').src = srcChild;
              document.querySelector('#slider > div.slider__thumbnails > div:nth-child(3) > img').src = srcMain;
            }, 300);
            setTimeout(() => {
              mainImgWrapper.classList.remove('active');
              document.querySelector('#slider > div.slider__thumbnails > div:nth-child(3)').classList.remove('active');
            }, 300);
          }
        }
      });

      arrowRight.addEventListener('click', function () {
        let arr = [];
        thumbImagesWrapper.forEach((item) => arr.push(item.classList.value));
        let condition = arr.some((elem) => elem.includes('current'));
        if (condition) {
          let elem = document.querySelector('#slider .slider__thumb-wrapper.current');
          if (elem.nextElementSibling !== null) {
            mainImgWrapper.classList.add('active');
            elem.classList.remove('current');
            elem.nextElementSibling.classList.add('current', 'active');
            setTimeout(() => {
              let srcMain = mainImg.src;
              let srcChild = elem.nextElementSibling.children[0].src;
              mainImg.src = srcChild;
              elem.nextElementSibling.children[0].src = srcMain;
            }, 300);
            setTimeout(() => {
              mainImgWrapper.classList.remove('active');
              elem.nextElementSibling.classList.remove('active');
            }, 300);
          } else {
            mainImgWrapper.classList.add('active');
            elem.classList.remove('current');
            document.querySelector('#slider .slider__thumb-wrapper:nth-child(1)').classList.add('current', 'active');
            setTimeout(() => {
              let srcMain = document.querySelector('#slider > div.slider__main > div.slider__main-img-wrapper > img').src;
              let srcChild = document.querySelector('#slider .slider__thumb-wrapper:nth-child(1) img').src;
              document.querySelector('#slider > div.slider__main > div.slider__main-img-wrapper > img').src = srcChild;
              document.querySelector('#slider > div.slider__thumbnails > div:nth-child(1) > img').src = srcMain;
            }, 300);
            setTimeout(() => {
              mainImgWrapper.classList.remove('active');
              document.querySelector('#slider > div.slider__thumbnails > div:nth-child(1)').classList.remove('active');
            }, 300);
          }
        }
      });

    } catch (error) {}
  })();

  // console.log(
  //   'Разработка: webdiller.ru - Евгений Бутков - tg:webdillerru - +79996159789 - eugenefromrus@gmail.com'
  // );
});
