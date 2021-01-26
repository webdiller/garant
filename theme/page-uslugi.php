<?php
/*
Template Name: Uslugi Page
*/
?>

<?php get_header(); ?>

<div id="main">
  <div class="content group">
    <div class="usluga-content">
      <div class="usluga-content__wrapper">
        <div class="usluga-content__header">
          <div class="usluga-content__card">
            <p><?php echo the_field('uslugi_text_left'); ?></p>
			  <script data-b24-form="click/9/o3ljhf" data-skip-moving="true">
        (function(w,d,u){
                var s=d.createElement('script');s.async=true;s.src=u+'?'+(Date.now()/180000|0);
                var h=d.getElementsByTagName('script')[0];h.parentNode.insertBefore(s,h);
        })(window,document,'https://cdn-ru.bitrix24.ru/b16364020/crm/form/loader_9.js');
</script>
			  <script data-b24-form="click/9/o3ljhf" data-skip-moving="true">
        (function(w,d,u){
                var s=d.createElement('script');s.async=true;s.src=u+'?'+(Date.now()/180000|0);
                var h=d.getElementsByTagName('script')[0];h.parentNode.insertBefore(s,h);
        })(window,document,'https://cdn-ru.bitrix24.ru/b16364020/crm/form/loader_9.js');
</script>
            <button>Оставить заявку на услугу</button>
          </div>
          <?php if( get_field('uslugi_img') ): ?>
			<img src="<?php the_field('uslugi_img'); ?>" />
		  <?php endif; ?>
        </div>
        <p class="usluga-content__descr"><?php echo the_field('uslugi_text_bottom'); ?></p>
        <div class="usluga-content__lists">
          <ul class="usluga-content__razdel usluga-content__razdel_mr-0">
            <?php $posts = get_posts(['category_name'    => 'services', 'numberposts' => -1,'orderby' => 'title']);
            foreach($posts as $post){
                        setup_postdata($post);
                    ?>
                    <!-- Содержимое записи -->
                    <li>
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </li>
                <?php }
            wp_reset_postdata();
           ?>
          </ul>
        </div>
      </div>
    </div>
    <?php 
    $images = get_field('uslugi_gallery');
	  if( $images ): ?>
	  <div class="portfolio">
		  <div class="portfolio__wrapper">
			  <p class="portfolio__title">Галерея</p> 
			  <ul class="portfolio__list">
				  <?php foreach( $images as $image ): ?>
				  <li class="portfolio__item">
					  <a href="<?php echo esc_url($image['url']); ?>">
						  <img src="<?php echo esc_url($image['sizes']['thumbnail']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
					  </a>
				  </li>
				  <?php endforeach; ?>
			  </ul>
		  </div>
	  </div>
	  <?php endif; ?>
	  
  </div><!-- /content -->
</div><!-- /main -->

<?php get_footer(); ?>