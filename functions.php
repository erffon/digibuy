<?php
defined('ABSPATH') and exit;


require_once get_template_directory() .
    '/inc/libs/class-tgm-plugin-activation.php';

add_action('tgmpa_register', 'dgb_register_plugins');

function dgb_register_plugins(): void
{
    $plugins = [
        [
            'name' => 'Elementor',
            'slug' => 'elementor',
            'required' => true,
        ],
        [
            'name' => 'WooCommerce',
            'slug' => 'woocommerce',
            'required' => true,
        ],
        [
            'name' => 'ووکامرسی فارسی',
            'slug' => 'persian-woocommerce',
            'required' => true,
        ],
    ];


    $config = [
        'id' => 'digibuy',
        'menu' => 'digibuy-install-plugins',
        'parent_slug' => 'themes.php',
        'has_notices' => true,
        'dismissable' => false,
        'is_automatic' => false,

        'strings' => [
            'page_title' => 'افزونه‌های موردنیاز دیجی‌بای',
            'menu_title' => 'نصب افزونه‌های ضروری',

            'notice_can_install_required' => _n_noop(
                'برای استفاده از قالب دیجی‌بای، نصب افزونه %1$s ضروری است.',
                'برای استفاده از قالب دیجی‌بای، نصب افزونه‌های %1$s ضروری است.',
                'digibuy'
            ),

            'notice_can_activate_required' => _n_noop(
                'افزونه %1$s نصب شده اما فعال نیست.',
                'افزونه‌های %1$s نصب شده‌اند اما فعال نیستند.',
                'digibuy'
            ),

            'install_link' => _n_noop(
                'نصب افزونه',
                'نصب افزونه‌ها',
                'digibuy'
            ),

            'activate_link' => _n_noop(
                'فعال‌سازی افزونه',
                'فعال‌سازی افزونه‌ها',
                'digibuy'
            ),

            'return' => 'بازگشت به مدیریت افزونه‌ها',
            'dashboard' => 'بازگشت به پیشخوان',

            'plugin_activated' => 'افزونه با موفقیت فعال شد.',

            'complete' => 'تمام افزونه‌های موردنیاز با موفقیت نصب و فعال شدند. %1$s',

            'dismiss' => 'بستن این اعلان',
        ],
    ];

    tgmpa($plugins, $config);

}

define('THEME_PATH', get_template_directory());
define('THEME_URI', get_template_directory_uri());

require_once THEME_PATH . '/inc/theme-setup.php';
