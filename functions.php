<?php

/**
 * Theme setup.
 */
function Rabbit_setup()
{
    add_theme_support('title-tag');

    register_nav_menus(
        array(
            'primary' => __('Primary Menu', 'tailpress'),
        )
    );

    add_theme_support(
        'html5',
        array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        )
    );

    add_theme_support('custom-logo');
    add_theme_support('post-thumbnails');

    add_theme_support('align-wide');
    add_theme_support('wp-block-styles');

    add_theme_support('editor-styles');
    add_editor_style('css/editor-style.css');
}

add_action('after_setup_theme', 'Rabbit_setup');

/**
 * Enqueue theme assets.
 */
function Rabbit_enqueue_scripts()
{
    $theme = wp_get_theme();

    wp_enqueue_style('tailpress', Rabbit_asset('css/app.css?v=' . getV(20)), array(), $theme->get('Version'));
    wp_enqueue_script('tailpress', Rabbit_asset('js/app.js?v=' . getV(20)), array(), $theme->get('Version'));
}

add_action('wp_enqueue_scripts', 'Rabbit_enqueue_scripts');

/**
 * Get asset path.
 *
 * @param string  $path Path to asset.
 *
 * @return string
 */
function Rabbit_asset($path)
{
    if (wp_get_environment_type() === 'production') {
        return get_stylesheet_directory_uri() . '/' . $path;
    }

    return add_query_arg('time', time(), get_stylesheet_directory_uri() . '/' . $path);
}

//Dodanie supportu do woocommerce
function mytheme_add_woocommerce_support()
{
    add_theme_support('woocommerce');
}
add_action('after_setup_theme', 'mytheme_add_woocommerce_support');


//Załączenie plików funkcyjnych
require_once "functions/custom_post.php";
require_once "functions/walker_nav_menu.php";
require_once "functions/other.php";

/////////////////////////////
function getV($n)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';

    for ($i = 0; $i < $n; $i++) {
        $index = rand(0, strlen($characters) - 1);
        $randomString .= $characters[$index];
    }

    return $randomString;
}
add_filter("show_admin_bar", "__return_false");