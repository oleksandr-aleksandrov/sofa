<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package gordian
 */

get_header();
?>

    <div class="container py-7">
        <div class="row">

            <?php
            while (have_posts()) :
                the_post(); ?>
                <div class="col-md-8 mx-auto">
                    <h1 class="text-center entry-title mb-4">
                        <?php the_title(); ?>
                    </h1>
                    <img class="img-fluid mb-5"
                         src="<?php echo get_the_post_thumbnail_url($post->ID, 'single_news_image'); ?>')"
                         alt="<?php get_the_post_thumbnail_caption(); ?>">
                    <?php the_content(); ?>
                </div>
                <div class="shop-navigation col-md-10 mx-auto pt-5">
                    <?php the_post_navigation(); ?>
                </div>

            <?php endwhile; // End of the loop.
            ?>

        </div>
    </div>
<?php

get_footer();
