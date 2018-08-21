<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package gordian
 */

get_header();
?>


    <section class="error-404 not-found py-7">
        <div class="container text-center">
            <h1 class="error-404-title pb-4">404</h1>
            <p> Извините, но запрошенная вами страница не найдена.</p>
            <p>
                Нажмите <a href="<?php bloginfo('url'); ?>/shop">здесь</a>, чтобы продолжить покупки.
            </p>
        </div>
    </section><!-- .error-404 -->


<?php
get_footer();
