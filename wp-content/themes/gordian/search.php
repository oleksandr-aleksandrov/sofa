<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package gordian
 */

get_header();
?>
    <div class="container py-7" xmlns="http://www.w3.org/1999/html">
        <div class="row">

            <?php if (have_posts()) : ?>

                <div class="col-md-12">
                    <h1 class="page-title text-center mb-3 page-title-default entry-title">
                        <?php
                        /* translators: %s: search query. */
                        printf(esc_html__('Поиск: %s', 'gordian'), '<span>' . get_search_query() . '</span>');
                        ?>
                    </h1>
                </div>
                <div class="col-md-9 mx-auto mb-5">
                    <form role="search" method="get" class="search-form text-center col-md-12"
                          action="<?php echo home_url('/'); ?>">
                        <input type="search" class="search-field pl-2"
                               placeholder="<?php echo esc_attr_x('Поиск …', 'placeholder') ?>"
                               value="<?php echo get_search_query() ?>" name="s"
                               title="<?php echo esc_attr_x('Search for:', 'label') ?>" autofocus/>
                        <button type="submit" class="search-submit">
                            <i class="oi oi-magnifying-glass"></i>
                        </button>
                    </form>
                </div>
                <?php
                /* Start the Loop */
                while (have_posts()) :
                    the_post();

//                    get_template_part('template-parts/content', 'search');
                    echo render_template_part('content-shop');
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
