<?php
/**
 * gordian functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package gordian
 */

if (!function_exists('gordian_setup')) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function gordian_setup()
    {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on gordian, use a find and replace
         * to change 'gordian' to the name of your theme in all the template files.
         */
        load_theme_textdomain('gordian', get_template_directory() . '/languages');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support('title-tag');

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support('post-thumbnails');
        add_image_size('single_news_image', 900, 900);
        add_image_size('single_product_image_zoom', 1300, 1300);
        add_image_size('archive_product_image', 600, 700, true);
        add_image_size('header_logo', 100, 100);
        add_image_size('header_logo_sm', 70, 70);

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(array(
            'menu-1' => esc_html__('Primary', 'gordian'),
        ));

        /**
         * Register CPT area
         */
//////////

        new \GK\PostType\News();
        new \GK\PostType\Products();
//////////


        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support('html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ));

        // Set up the WordPress core custom background feature.
        add_theme_support('custom-background', apply_filters('gordian_custom_background_args', array(
            'default-color' => 'ffffff',
            'default-image' => '',
        )));

        // Add theme support for selective refresh for widgets.
        add_theme_support('customize-selective-refresh-widgets');

        /**
         * Add support for core custom logo.
         *
         * @link https://codex.wordpress.org/Theme_Logo
         */
        add_theme_support('custom-logo');
    }
endif;
add_action('after_setup_theme', 'gordian_setup');


/*
 * File required area
 */
//////////

require_once('functions/functions-home-page.php');
//////////

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function gordian_content_width()
{
    // This variable is intended to be overruled from themes.
    // Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
    // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
    $GLOBALS['content_width'] = apply_filters('gordian_content_width', 640);
}

add_action('after_setup_theme', 'gordian_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function gordian_widgets_init()
{
    register_sidebar(array(
        'name' => esc_html__('Sidebar', 'gordian'),
        'id' => 'sidebar-1',
        'description' => esc_html__('Add widgets here.', 'gordian'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));
}

add_action('widgets_init', 'gordian_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function gordian_scripts()
{
//	wp_enqueue_style( 'gordian-style', get_stylesheet_uri() );

    wp_register_style('bootstrap-css', 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css');
    wp_enqueue_style('bootstrap-css');

    wp_register_style('bootstrap-icon', 'https://cdnjs.cloudflare.com/ajax/libs/open-iconic/1.1.1/font/css/open-iconic-bootstrap.min.css');
    wp_enqueue_style('bootstrap-icon');

    wp_register_style('slick-css', 'http://cdn.jsdelivr.net/jquery.slick/1.6.0/slick.css');
    wp_enqueue_style('slick-css');

    wp_register_style('main-css', get_template_directory_uri() . '/app/css/main.css');
    wp_enqueue_style('main-css');

    wp_enqueue_script('html5shiv', 'https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js');
    wp_script_add_data('html5shiv', 'conditional', 'lt IE 9');

    wp_enqueue_script('respond', 'https://oss.maxcdn.com/respond/1.4.2/respond.min.js');
    wp_script_add_data('respond', 'conditional', 'lt IE 9');

    wp_register_script('bootstrap-js', 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js', array('jquery'), true);
    wp_enqueue_script('bootstrap-js');

    wp_register_script('main-js', get_template_directory_uri() . '/app/js/main.js', array('jquery'), null, true);
    wp_enqueue_script('main-js');

    wp_register_script('slick-js', 'http://cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js', array('jquery'), null, true);
    wp_enqueue_script('slick-js');


    wp_register_script('elevateZoom-js', get_template_directory_uri() . '/app/js/jquery.elevateZoom-3.0.8.min.js', array('jquery'), null, true);
    wp_enqueue_script('elevateZoom-js');

    wp_register_script('fancybox-js', get_template_directory_uri() . '/app/js/components/jquery.fancybox.js', array('jquery'), null, true);
    wp_enqueue_script('fancybox-js');


    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}

add_action('wp_enqueue_scripts', 'gordian_scripts');


function render_template_part($template, $params = [])
{
    ob_start();
    extract($params);
    include(locate_template('template-parts/' . $template . '.php'));
    if (isset($_SESSION['errors']))
        unset($_SESSION['errors']);
    return ob_get_clean();
}

// deleting attribute type in scripts and styles

add_filter('style_loader_tag', 'sj_remove_type_attr', 10, 2);
add_filter('script_loader_tag', 'sj_remove_type_attr', 10, 2);
function sj_remove_type_attr($tag)
{
    return preg_replace("/type=['\"]text\/(javascript|css)['\"]/", '', $tag);
}

function custom_paginate_links($prev_page_text = '<i class="prev-page">←</i>', $next_page_text = '<i class="next-page">→</i>')
{
    global $wp_rewrite, $wp_query;
    if ($wp_query->max_num_pages <= 1)
        return;
    //Current page
    $current = $wp_query->query_vars['paged'] > 1 ? $wp_query->query_vars['paged'] : 1;
    //Array with arguments for paginate_links()
    $pagination = array(
        'base' => @add_query_arg('page', '%#%'),
        'format' => '',
        'total' => $wp_query->max_num_pages,
        'current' => $current,
        'prev_text' => $prev_page_text,
        'next_text' => $next_page_text,
        'end_size' => 1,
        'mid_size' => 1,
        'show_all' => false,
        'type' => 'array'
    );
    if ($wp_rewrite->using_permalinks())
        $pagination['base'] = user_trailingslashit(trailingslashit(remove_query_arg('s', get_pagenum_link(1))) . 'page/%#%/', 'paged');
    if (!empty($wp_query->query_vars['s']))
        $pagination['add_args'] = array('s' => get_query_var('s'));
    //Generating pages
    $pages = paginate_links($pagination);
    echo '<div class="col-md-12">';
    echo '<ul class="pagination my-pagination justify-content-center pt-5 pb-3">';
    if ($current == 1) echo '<li><span class="disabled">' . $prev_page_text . '</span></li>';
    foreach ($pages as $page) {
        echo '<li>' . $page . '</li>';
    }
    if ($current == $wp_query->max_num_pages) echo '<li><span class="disabled">' . $next_page_text . '</span></li>';
    echo '</ul>';
    echo '</div>';
}


//add_filter('manage_edit-post_columns', 'true_add_post_columns_2', 10, 1); // manage_edit-{тип поста}_columns, то есть вы можете добавлять колонку не только для записей
add_filter('manage_edit-shop_columns', 'true_add_post_columns_2', 10, 1);
add_action('manage_posts_custom_column', 'true_fill_post_columns_2', 10, 1);

/* добавление колонки */
function true_add_post_columns_2($my_columns)
{
    $my_columns['sold'] = 'Продано? ';
    return $my_columns;
}

/* заполнение колонки */
function true_fill_post_columns_2($column)
{
    global $post;
    switch ($column) {
        case 'field_is_sold':
            echo ($x = get_field($post->ID, 'is_sold')) ? $x : 0; // это простое условие, если произвольного поля не существует, то выводим 0
            break;
    }
}


//add_filter('manage_edit-post_sortable_columns', 'true_sort_prosmotr'); // manage_edit-{тип поста}_sortable_columns
//add_filter('manage_edit-shop_sortable_columns', 'true_sort_prosmotr');
//add_action('pre_get_posts', 'true_orderby_prosmotr');
//
//function true_sort_prosmotr($columns)
//{
//    $columns['sold'] = 'views'; //  $columns['ID колонки'] = 'Значение параметра orderby'
//
//    //Кстати, здесь вы также можете сделать любую колонку несортируемой, просто удалите её из массива
//    //unset($columns['date']);
//
//    return $columns;
//}

//function true_orderby_prosmotr($query)
//{
//
//    // так как сортировка будет осуществляться только в админке
//    if (!is_admin())
//        return;
//
//    $orderby = $query->get('orderby');
//
//    if ('views' == $orderby) { // 'views' - параметр в GET-запросе
//        $query->set('meta_key', 'prosmort'); // 'prosmort' - название произвольного поля
//        $query->set('orderby', 'meta_value'); // если сортировка не по числовому значению, а по алфавиту, замените на 'meta_value'
//    }
//}


function true_id($args)
{
    $args['post_page_id'] = 'ID';
    return $args;
}

function true_custom($column, $id)
{
    if ($column === 'post_page_id') {
        echo $id;
    }
}

add_filter('manage_pages_columns', 'true_id', 5);
add_action('manage_pages_custom_column', 'true_custom', 5, 2);
add_filter('manage_posts_columns', 'true_id', 5);
add_action('manage_posts_custom_column', 'true_custom', 5, 2);


add_filter('navigation_markup_template', 'hide_title_posts_navigation');
function hide_title_posts_navigation()
{
    return '
     <nav class="navigation %1$s" role="navigation">
         <div class="nav-links">%3$s</div>
     </nav>';
}


class dropdown_walker_nav_menu extends Walker_Nav_menu
{

    function start_lvl(&$output, $depth = 0, $args = array())
    {
        $indent = str_repeat("\t", $depth);
        $submenu = ($depth > 0) ? ' sub-menu' : '';
        $output .= "\n$indent<ul class=\"dropdown-menu$submenu depth_$depth\">\n";
    }

    function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0)
    {
        $indent = ($depth) ? str_repeat("\t", $depth) : '';
        $li_attributes = '';
        $class_names = $value = '';
        $classes = empty($item->classes) ? array() : (array)$item->classes;
        $classes[] = ($args->walker->has_children) ? 'dropdown' : '';
        $classes[] = ($item->current || $item->current_item_anchestor) ? 'active' : '';
        $classes[] = 'nav-item';
        $classes[] = 'nav-item-' . $item->ID;
        if ($depth && $args->walker->has_children) {
            $classes[] = 'dropdown-menu';
        }
        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
        $class_names = ' class="' . esc_attr($class_names) . '"';
        $id = apply_filters('nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args);
        $id = strlen($id) ? ' id="' . esc_attr($id) . '"' : '';
        $output .= $indent . '<li ' . $id . $value . $class_names . $li_attributes . '>';
        $attributes = !empty($item->attr_title) ? ' title="' . esc_attr($item->attr_title) . '"' : '';
        $attributes .= !empty($item->target) ? ' target="' . esc_attr($item->target) . '"' : '';
        $attributes .= !empty($item->xfn) ? ' rel="' . esc_attr($item->xfn) . '"' : '';
        $attributes .= !empty($item->url) ? ' href="' . esc_attr($item->url) . '"' : '';
        $attributes .= ($args->walker->has_children) ? ' class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"' : ' class="nav-link"';
        $item_output = $args->before;
        $item_output .= ($depth > 0) ? '<a class="dropdown-item"' . $attributes . '>' : '<a' . $attributes . '>';
        $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
        $item_output .= '</a>';
        $item_output .= $args->after;
        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }
}

