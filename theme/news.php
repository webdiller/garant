<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package garant
 */

get_header();
?>
<main id="primary" class="site-main">
  <div class="news">
    <div class="news__wrapper">
      <ul>
        <?php
        $query = new WP_Query(['category_name' => 'news']);
        if (have_posts()) {
          while ($query->have_posts()) {
            $query->the_post();
        ?>
            <li>
              <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail(); ?>
                <div>
                  <p><?php the_title(); ?></p>
                  <?php the_excerpt(); ?>
                  <span> <?php echo get_the_date(); ?></span>
                </div>
              </a>
            </li>
        <?php
          }
        } else {
          echo wpautop('Новостей не найдено');
        }
        ?>
      </ul>
    </div>
  </div>
</main><!-- #main -->

<?php
get_footer();
