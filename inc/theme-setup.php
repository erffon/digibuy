<?php
defined('ABSPATH') || exit;

function dgb_theme_setup(): void
{

    add_theme_support('custom-logo', [
        'width' => 200,
        'height' => 60,
        'flex-width' => true,
        'flex-height' => true,
    ]);
    add_theme_support('html5', [
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
    add_theme_support('woocommerce');
    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');
}

add_action('after_setup_theme', 'dgb_theme_setup');

function dgb_vite_running(): bool
{
    $host = wp_parse_url(home_url(), PHP_URL_HOST);
    if (!in_array($host, ['localhost', '127.0.0.1'], true) && wp_get_environment_type() !== 'local') {
        return false;
    }

    $connection = @fsockopen('127.0.0.1', 5173, $error_code, $error_message, 0.05);
    if (!$connection) {
        return false;
    }

    fclose($connection);
    return true;
}

function dgb_print_vite_assets(): void
{
    $vite_url = 'http://127.0.0.1:5173';
    wp_print_script_tag(['type' => 'module', 'src' => $vite_url . '/@vite/client']);
    wp_print_script_tag(['type' => 'module', 'src' => $vite_url . '/scss/entries/global.scss']);
}

function dgb_enqueue_assets(): void
{
    $theme_version = wp_get_theme()->get( 'Version');

    $global_css_path = THEME_PATH . '/assets/dist/global.css';
    $global_css_version = file_exists($global_css_path)
        ? (string)filemtime($global_css_path)
        : $theme_version;

    if (dgb_vite_running()) {
        add_action('wp_head', 'dgb_print_vite_assets', 5);
    } else {
        wp_enqueue_style(
            'dgb-global-css',
            THEME_URI . '/assets/dist/global.css',
            [],
            $global_css_version
        );
    }

    if (!is_admin()) {
        wp_enqueue_script('dgb-embla-js', THEME_URI . '/assets/js/embla.js', ['jquery'], '8.6.0', true);

        wp_enqueue_script('dgb-carousel-js', THEME_URI . '/assets/js/carousel.js', ['jquery','dgb-embla-js'], $theme_version, true);
    }
}

add_action('wp_enqueue_scripts', 'dgb_enqueue_assets');

function dgb_register_elementor_locations($elementor_theme_manager): void
{
    $elementor_theme_manager->register_all_core_location();
}

add_action('elementor/theme/register_locations', 'dgb_register_elementor_locations');

// SVG support for media
add_filter('upload_mimes', function ($mimes) {
    $mimes['svg'] = 'image/svg+xml';

    return $mimes;
});