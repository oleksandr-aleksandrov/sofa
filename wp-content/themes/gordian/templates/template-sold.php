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
                        'value' => 1
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

                <article id="post-<?php the_ID(); ?>" <?php post_class('col-md-6 shop-grid-item'); ?>>
                    <div class="shop-product-item">
                        <img class="img-fluid"
                             src="<?php echo get_the_post_thumbnail_url($post->ID, 'archive_product_image'); ?>')"
                             alt="<?php get_the_post_thumbnail_caption(); ?>">
                        <div class="shop-product-item-link position-cover d-block text-center"
                             href="<?php echo get_permalink($post) ?>">
                            <div class="shop-product-item-description">
                                <h2 class="shop-product-item-title"><?php the_title(); ?></h2>
                                <p class="shop-product-item-price">₴123123</p>
                                <p class="shop-product-item-sku">Gordian knot: <?php the_ID(); ?></p>
                            </div>
                        </div>
                    </div>
                </article>

                <?php
            endwhile;

                custom_paginate_links();
                ?>

                <?php wp_reset_query();
            else : ?>
                <div class="col-md-12">
                    <h2 class="text-center page-title-default entry-title"><?php _e('Еще нету проданного товара', 'gk'); ?></h2>
                </div>
            <?php endif; ?>
        </div>
    </div>

<?php get_footer(); ?>