<?php
/*
* Template Name: Sold Products
*/

get_header(); ?>
    <div class="container py-7">
        <div class="row">
            <?php
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            $args = array(
                'posts_per_page' => 2,
                'post_type' => 'shop',
//    'post__in' => $user_fav,
                'post_status' => 'publish',
                'meta_query' => [
                    [
                        'key' => 'is_sold',
                        'compare' => '==',
                        'value' => 0
                    ]
                ],
                'suppress_filters' => true,
                'paged' => $paged,
                'order_by' => 'date',
                'order' => 'ASC'
            );
            $wp_query = new WP_Query($args);

            if ($wp_query->have_posts()):while ($wp_query->have_posts()):$wp_query->the_post();

                ?>

                <?php echo render_template_part('content-shop'); ?>

                <?php
            endwhile;

                custom_paginate_links();
                ?>

                <!--    <div class="post-nav-container">-->
                <!--        --><?php //previous_posts_link(__('&rarr; Older Posts'));
                ?>
                <!--        --><?php //next_posts_link(__('Newer Posts &larr; '));
                ?>
                <!--    </div>-->
                <?php wp_reset_query();
            else :

                //            get_template_part('template-parts/content', 'none');
                echo 'Sorry, no posts found.';
            endif; ?>
        </div>
    </div>

<?php get_footer(); ?>