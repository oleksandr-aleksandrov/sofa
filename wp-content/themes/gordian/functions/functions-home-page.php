<?php

function register_fields_front_page()
{
    if (function_exists('acf_add_local_field_group')):
        \acf_add_local_field_group([
            'key' => 'home_content',
            'title' => __('Контент', 'gk'),
            'fields' => [
                [
                    'key' => 'home_content_slider',
                    'label' => __('Слайдер', 'gk'),
                    'name' => 'home_content_slider',
                    'type' => 'tab',
                ],
                [
                    'key' => 'home_page_slider',
                    'label' => __('', 'gk'),
                    'name' => 'home_page_slider',
                    'type' => 'gallery',
                ],
            ],
            'location' => [
                [
                    [
                        'param' => 'page_type',
                        'operator' => '==',
                        'value' => 'front_page',
                    ],
                ],
            ],
        ]);
    endif;
}

\add_action('acf/init', 'register_fields_front_page');