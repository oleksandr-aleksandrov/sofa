<?php get_header(); ?>
<?php $slider_images = get_field('home_page_slider');
if ($slider_images): ?>
    <div class="front-page-slider">
        <?php foreach ($slider_images as $image): ?>
            <div class="slide"
                 style="background-image: url('<?php echo $image['url']; ?>');"></div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

<?php get_footer(); ?>