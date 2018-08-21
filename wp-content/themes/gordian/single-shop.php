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

<?php
while (have_posts()) :
    the_post(); ?>

    <article id="post-<?php the_ID(); ?>" <?php post_class('py-7'); ?>>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="single-product-title text-center mb-3 d-md-none"><?php the_title(); ?></h2>
                </div>
                <div class="col-md-6 mb-5">
                    <img class="img-fluid" id="singleProductImageItem"
                         src="<?php echo get_the_post_thumbnail_url($post->ID, 'archive_product_image'); ?>"
                         alt="<?php the_post_thumbnail_caption(); ?>"
                         data-zoom-image="<?php echo get_the_post_thumbnail_url($post->ID, 'full'); ?> "/>
                    <?php
                    $images = get_field('products_gallery');
                    if ($images): ?>
                        <div id="singleProductGalleryImages" class="text-center">
                            <a class="d-inline-block single-product-gallery-item active" href="#"
                               data-image="<?php echo get_the_post_thumbnail_url($post->ID, 'archive_product_image'); ?>"
                               data-zoom-image="<?php echo get_the_post_thumbnail_url($post->ID, 'full'); ?>">
                                <img width="100" class="img-fluid" id="singleProductImageItem"
                                     src="<?php echo get_the_post_thumbnail_url($post->ID, 'thumbnail'); ?>"
                                     alt="<?php the_post_thumbnail_caption(); ?>"/>
                            </a>
                            <?php foreach ($images as $image): ?>
                                <a class="d-inline-block single-product-gallery-item" href="#"
                                   data-image="<?php echo $image['sizes']['archive_product_image']; ?>"
                                   data-zoom-image="<?php echo $image['url']; ?>">
                                    <img width="100" class="img-fluid" id="singleProductImageItem"
                                         src="<?php echo $image['sizes']['thumbnail']; ?>"
                                         alt="<?php echo $image['alt']; ?>"/>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="col-md-6">
                    <h1 class="single-product-title mb-4"><?php the_title(); ?></h1>
                    <p class="shop-product-item-sku mb-4">Gk: <?php the_ID(); ?></p>
                    <p class="single-product-item-price mb-5">₴ <?php the_field('product_price'); ?></p>

                    <?php the_content(); ?>
                </div>
            </div>
            <div class="shop-navigation pt-5">
                <?php
                the_post_navigation(array(
                    'next_text' => '<span class="meta-nav" aria-hidden="true">Далее</span> ',
                    'prev_text' => '<span class="meta-nav" aria-hidden="true">Назад</span> ',
                )); ?>
            </div>
        </div>
    </article>
<?php endwhile; ?>

<?php
get_footer();
