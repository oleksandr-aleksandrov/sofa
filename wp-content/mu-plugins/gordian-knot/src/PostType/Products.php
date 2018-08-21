<?php
namespace GK\PostType;
/**
 *
 * @package GK\PostType
 */
class Products implements IPostType
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
        /**
         *
         */
        add_action('acf/init', [$this, 'fields']);
        /**
         *
         */
        add_action('acf/init', [$this, 'products_fields']);

    }

    /**
     *
     */
    public function register_post_type()
    {
        register_post_type('shop', [
            'labels' => [
                'name' => __('Магазин', 'gk'),
                'singular_name' => __('Магазин', 'gk'),
                'add_new' => __('Добавить товар', 'gk'),
                'add_new_item' => __('Добавить товар', 'gk'),
                'edit_item' => __('Редактировать товар', 'gk'),
                'new_item' => __('Добавить товар', 'gk'),
                'all_items' => __('Все товары', 'gk'),
                'view_item' => __('Просмотреть товар', 'gk'),
                'search_items' => __('Поиск товара', 'gk'),
                'not_found' => __('Товар не найден', 'gk'),
                'not_found_in_trash' => __('Товара нету в корзине', 'gk'),
                'menu_name' => __('Магазин', 'gk')
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
            'rewrite' => ['slug' => 'shop']
        ]);

    }

    /**
     *
     */
    public function add_taxonomy()
    {
        \register_taxonomy('shop-category', 'shop', [
            'hierarchical' => true,
            'label' => __('Категории', 'gk'),
            'query_var' => true,
            'rewrite' => ['slug' => 'shop-category']
        ]);
    }

    /**
     *
     */
    public function add_theme_support()
    {
        add_theme_support('post-thumbnails', array('shop'));
    }

    /**
     *
     */
    public function fields()
    {
        /**
         *
         */
        acf_add_local_field_group([
            'key' => 'group_news',
            'title' => __('Продано', 'gk'),
            'fields' => [
                [
                    'key' => 'field_is_sold',
                    'label' => __('Товар продан?', 'gk'),
                    'name' => 'is_sold',
                    'type' => 'true_false',
                    'message' => __('Добавить товар к списку продано', 'gk'),
                ],
            ],
            'location' => [
                [
                    [
                        'param' => 'post_type',
                        'operator' => '==',
                        'value' => 'shop',
                    ],
                ],
            ],
            'position' => 'side',
        ]);
    }

    public function products_fields()
    {
        /**
         *
         */
        acf_add_local_field_group([
            'key' => 'new_products_content',
            'title' => __('Дополнительный контент', 'gk'),
            'fields' => [
                [
                    'key' => 'product_price',
                    'label' => __('Цена товара', 'gk'),
                    'name' => 'product_price',
                    'type' => 'number',
                ],
                [
                    'key' => 'products_content_tab',
                    'label' => __('Галерея Изображений', 'gk'),
                    'name' => 'products_content_tab',
                    'type' => 'tab',
                ],
                [
                    'key' => 'products_gallery',
                    'label' => __('', 'gk'),
                    'name' => 'products_gallery',
                    'type' => 'gallery',
                ],
            ],
            'location' => [
                [
                    [
                        'param' => 'post_type',
                        'operator' => '==',
                        'value' => 'shop',
                    ],
                ],
            ],
        ]);
    }
}
