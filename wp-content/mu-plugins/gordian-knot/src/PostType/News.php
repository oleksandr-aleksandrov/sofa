<?php
namespace GK\PostType;
/**
 *
 * @package GK\PostType
 */
class News implements IPostType
{
    /**
     *
     */
    public function __construct()
    {
        /**
         *
         */
        add_action('init', [$this, 'register_post_type']);
        /**
         *
         */
        add_action('init', [$this, 'add_theme_support']);
        /**
         *
         */
        add_action('init', [$this, 'add_taxonomy']);

    }

    /**
     *
     */
    public function register_post_type()
    {
        register_post_type('news', [
            'labels' => [
                'name' => __('Новости', 'gk'),
                'singular_name' => __('Новости', 'gk'),
                'add_new' => __('Добавить новость', 'gk'),
                'add_new_item' => __('Добавить новость', 'gk'),
                'edit_item' => __('Редактировать новость', 'gk'),
                'new_item' => __('Добавить новость', 'gk'),
                'all_items' => __('Все новости', 'gk'),
                'view_item' => __('Просмотреть новость', 'gk'),
                'search_items' => __('Поиск новости', 'gk'),
                'not_found' => __('Новостей нет', 'gk'),
                'not_found_in_trash' => __('Новостей нет в Корзине', 'gk'),
                'menu_name' => __('Новости', 'gk')
            ],
            'can_export' => true,
            'exclude_from_search' => false,
            'public' => true,
            'hierarchical' => false,
            'publicly_queryable' => true,
            'show_in_menu' => true,
            'show_in_nav_menus' => true,
            'show_ui' => true,
            'has_archive' => true,
            'supports' => ['title', 'editor', 'thumbnail', 'excerpt', 'author', 'comments'],
            'rewrite' => ['slug' => 'news']
        ]);

    }

    /**
     *
     */
    public function add_taxonomy()
    {
        \register_taxonomy('news-category', 'news', [
            'hierarchical' => true,
            'label' => __('Категории', 'gk'),
            'query_var' => true,
            'rewrite' => ['slug' => 'news-category']
        ]);
    }

    /**
     *
     */
    public function add_theme_support()
    {
        add_theme_support('post-thumbnails', array('vi_news'));
    }
}
