<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package garant
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="news-item">
        <div class="news-item__wrapper">
            <span class="news-item__date"><?php echo get_the_date(); ?></span>
            <div class="entry-content">
                <?php
                the_content(
                    sprintf(
                        wp_kses(
                            /* translators: %s: Name of current post. Only visible to screen readers */
                            __('Continue reading<span class="screen-reader-text"> "%s"</span>', 'garant'),
                            array(
                                'span' => array(
                                    'class' => array(),
                                ),
                            )
                        ),
                        wp_kses_post(get_the_title())
                    )
                );
                wp_link_pages(
                    array(
                        'before' => '<div class="page-links">' . esc_html__('Pages:', 'garant'),
                        'after'  => '</div>',
                    )
                );
                ?>
            </div><!-- .entry-content -->
        </div>
    </div>
</article><!-- #post-<?php the_ID(); ?> -->