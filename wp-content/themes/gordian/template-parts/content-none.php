<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package gordian
 */

?>

<section class="no-results not-found col-md-12">

    <h1 class="text-center page-title-default entry-title"><?php esc_html_e('Ничего не найдено', 'gordian'); ?></h1>
    <div class="mx-auto my-5">
        <form role="search" method="get" class="search-form text-center col-md-9 mx-auto"
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

</section><!-- .no-results -->
