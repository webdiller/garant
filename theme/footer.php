<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package garant
 */

?>

<footer class="footer">
  <div class="footer__wrapper">
    <div class="footer__left">
      <div class="footer__left-header">
        <p class="footer__left-title">Гарант-Качество</p>
      </div>

      <div class="footer__left-contacts">
        <div class="footer__left-col">
          <?php echo the_field('footer_messangers', 'option'); ?>
        </div>

        <div class="footer__left-contacts-col">
          <?php echo the_field('footer_etc', 'option'); ?>
					  <script data-b24-form="click/11/xl4gq1" data-skip-moving="true">
        (function(w,d,u){
                var s=d.createElement('script');s.async=true;s.src=u+'?'+(Date.now()/180000|0);
                var h=d.getElementsByTagName('script')[0];h.parentNode.insertBefore(s,h);
        })(window,document,'https://cdn-ru.bitrix24.ru/b16364020/crm/form/loader_11.js');
</script>
          <button data-call class="footer__call">Заказать звонок</button>
        </div>
      </div>
      <div class="footer__contacts-copy">
		  <a class="footer__copy" href="https://www.webreforma.ru/">Политика конфиденциальности</a>
		  <p>Создание сайта Digital-агентство</p>
		  <a href="/">WebReforma</a>
		</div>
    </div>
    <div class="footer__right">
      <?php echo the_field('map', 'option'); ?>
    </div>
    <div class="footer__contacts-copy footer__contacts-copy_mobile">
      <a class="footer__copy" href="https://www.webreforma.ru/">Политика конфиденциальности</a>
      <p>Создание сайта Digital-агентство <a href="/">WebReforma</a></p>
    </div>
  </div>
</footer>

<div id="modal" class="modal">
  <div class="modal__wrapper">
    <button data-close class="modal__close">✖</button>
    <p class="modal__title">Оставьте заявку</p>
    <p class="modal__descr">Наш специалист свяжется с вами в течении 15 минут</p>
    <form class="modal__form">
      <input type="text" placeholder="Ваше имя *" class="modal__input modal__input_user" />
      <input type="number" placeholder="Ваш телефон *" class="modal__input modal__input_phone" />
      <div class="modal__group">
        <input class="modal__agree-input" type="checkbox" id="agree" name="agree" />
        <label class="modal__agree-label" for="agree">
          Я прочитал(а) и согласен(а) с Политикой конфиденциальности*
        </label>
      </div>
      <button class="modal__agree">Отправить заявку</button>
    </form>
  </div>
</div>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>