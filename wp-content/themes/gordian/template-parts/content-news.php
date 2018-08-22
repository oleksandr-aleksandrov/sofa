<?php global $post; ?>
<article id="post-<?php the_ID(); ?>" <?php post_class('col-md-10 mx-auto shop-grid-item'); ?>>
    <h1 class="text-center "><a class="d-inline-block entry-title"
                                href="<?php echo get_permalink($post) ?>"><?php the_title(); ?></a></h1>
    <div class="text-center ">
        <a href="<?php echo get_permalink($post) ?>" class="d-inline-block">
            <img class="img-fluid"
                 src="<?php echo get_the_post_thumbnail_url($post->ID, 'single_news_image'); ?>')"
                 alt="<?php get_the_post_thumbnail_caption(); ?>">
        </a>
    </div>
    <div class="text-center button-read-more">
        <a href="<?php echo get_permalink($post) ?>" class="d-inline-block mt-4 ">Read More →</a>
    </div>
</article>
<hr class="col-md-12">