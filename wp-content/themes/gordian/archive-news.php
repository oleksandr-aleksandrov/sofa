<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package gordian
 */

get_header();
$categories = get_the_terms($post->ID, 'news-category');
?>


    <div class="container py-7">
        <div class="row">
            <?php if (have_posts()) : ?>
<!--                <h1 class="col-md-12 entry-title mb-5 page-title-default text-center">-->
<!--                    --><?php //foreach ($categories as $category) {
//
//                        echo isset($category->cat_name) ? $category->cat_name : '';
//
//                    } ?>
<!--                </h1>-->

                <?php
                /* Start the Loop */
                while (have_posts()) :
                    the_post();

                    echo render_template_part('content-news');

                endwhile;

                custom_paginate_links();

            else :

                get_template_part('template-parts/content', 'none');

            endif;
            ?>

        </div>
    </div>
<?php
get_footer();
