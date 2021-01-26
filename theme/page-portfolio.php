<?php
/*
Template Name: Portfolio Page
*/
?>

<?php get_header(); ?>

<div id="main">
  <div class="content group">
    <div class="portfolio">
      <div class="portfolio__wrapper">
        <p class="portfolio__description">
          Высокий уровень вовлечения представителей целевой аудитории является четким
          доказательством простого факта: постоянное информационно-пропагандистское обеспечение
          нашей деятельности играет определяющее значение для благоприятных перспектив. В своём
          стремлении повысить качество жизни
        </p>
        <div id="gallery" class="portfolio__list">
          <?php
          global $wp_query;
          $wp_query = new WP_Query(array(
            'category_name' => 'portfolio ',
            'posts_per_page' => 9,
            'paged' => get_query_var('paged') ?: 1 // страница пагинации
          ));
          while (have_posts()) {
            the_post();
          ?>
            <a href="<?php the_post_thumbnail_url(); ?>" class="portfolio__item" data-fancybox data-caption="<?php the_title(); ?>">
              <img class="portfolio__img" src="<?php the_post_thumbnail_url(); ?>" alt="thumbnail" />
            </a>
          <?php
          }
          the_posts_pagination(array(
            'prev_text'    => __('-'),
            'next_text'    => __('-'),
            'end_size' => 1,
          ));
          wp_reset_query();
          ?>
        </div>
		<div class="call-engineer">
          <div class="call-engineer__wrapper">
			  <script data-b24-form="click/13/adz5lw" data-skip-moving="true">
        (function(w,d,u){
                var s=d.createElement('script');s.async=true;s.src=u+'?'+(Date.now()/180000|0);
                var h=d.getElementsByTagName('script')[0];h.parentNode.insertBefore(s,h);
        })(window,document,'https://cdn-ru.bitrix24.ru/b16364020/crm/form/loader_13.js');
</script>
            <button class="call-engineer__btn">Вызвать инженера</button>
          </div>
        </div>
      </div>
    </div>
  </div><!-- /content -->
</div><!-- /main -->

<?php get_footer(); ?>