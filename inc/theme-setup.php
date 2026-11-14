<?php
defined( 'ABSPATH' ) || exit;
function dgb_theme_setup():void {

    add_theme_support('custom-logo');
    add_theme_support('html5',[
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',

    ]);
    add_theme_support('menus');
    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');
    add_theme_support('widgets');

    if(class_exists('WooCommerce')) {
        add_theme_support('woocommerce');
        add_theme_support( 'wc-product-gallery-zoom' );
        add_theme_support( 'wc-product-gallery-lightbox' );
        add_theme_support( 'wc-product-gallery-slider' );
    }
}
add_action('after_setup_theme', 'dgb_theme_setup');

// disable WooCommerce default styles
//add_filter( 'woocommerce_enqueue_styles', '__return_false' );