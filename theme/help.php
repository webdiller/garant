<!--
Сервисное обслуживание 7
Медицинская мебель 3
Стоматологические установки 11
Реставрация мебели 39
--> 

<!-- 
.prev,
.current,
.page-numbers,
.next
 -->

<?php
$arg_cat = array(
  'orderby'      => 'name',
  'order'        => 'ASC',
  'hide_empty'   => 1,
  'exclude'      => '',
  'include'      => '',
  'taxonomy'     => 'category',
  'category' => 4
);
$categories = get_categories($arg_cat);
?>
<article class="<?php mts_article_class(); ?>">
  <div id="content_box">
    <?php if (have_posts()) while (have_posts()) : the_post(); ?>
      <div id="post-<?php the_ID(); ?>" <?php post_class('g post'); ?>>
        <div class="single_page">
          <div class="post-content box mark-links entry-content">
            <?php the_content(); ?>

          </div>
          <!--.post-content box mark-links-->
        </div>
      </div>
    <?php endwhile; ?>
    <?php
    if ($categories) {
      foreach ($categories as $cat) {

        $arg_posts =  array(
          'orderby'      => 'name', // сортировка по имени
          'order'        => 'ASC', // от меньшего к большему
          'posts_per_page' => 3, // по три поста
          'post_type' => 'post', // тип записи "посты"
          'post_status' => 'publish', // опубликованные посты
          'cat' => $cat->cat_ID, // получаем id рубрик
        );
        $query = new WP_Query($arg_posts);
    ?>
    <?php
      }
    }
    ?>