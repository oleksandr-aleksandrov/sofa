<?php global $post; ?>
<article id="post-<?php the_ID(); ?>" <?php post_class('col-md-6 shop-grid-item'); ?>>
    <div class="shop-product-item">
        <img class="img-fluid"
             src="<?php echo get_the_post_thumbnail_url($post->ID, 'archive_product_image'); ?>')"
             alt="<?php get_the_post_thumbnail_caption(); ?>">
        <a class="shop-product-item-link position-cover d-block text-center"
           href="<?php echo get_permalink($post) ?>">
            <div class="shop-product-item-description">
                <h2 class="shop-product-item-title"><?php the_title(); ?></h2>
                <p class="shop-product-item-price">₴ <?php the_field('product_price'); ?></p>
                <p class="shop-product-item-sku">Gk: <?php the_ID(); ?></p>
            </div>
        </a>
    </div>
</article>