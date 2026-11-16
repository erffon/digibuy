<?php
/**
 * Redux Framework basic options config.
 * For full documentation, please visit: https://devs.redux.io/
 *
 * @package Redux Framework
 */

// phpcs:disable
defined( 'ABSPATH' ) || exit;

Redux::set_section(
	$opt_name,
	array(
		'title'      => esc_html__( 'بنرهای تبلیغاتی', $theme_textdomain ),
		'id'         => 'commercial-banners',
		'desc'       => '',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'      => 'top-banner-type',
				'type'    => 'radio',
				'title'   => esc_html__( 'نوع بنر بالای هدر', $theme_textdomain ),
                'subtitle'=>esc_html('نوع محتوای ورودی بنر بالای هدر',$theme_textdomain),
				'options' => array(
					'image' => esc_html__( 'تصویر', $theme_textdomain ),
					'text'  => esc_html__( 'متن', $theme_textdomain ),
				),
				'default' => 'text',
			),
			array(
				'id'           => 'top-banner-media',
				'type'         => 'media',
				'required'     => array( 'top-banner-type', '=', 'image' ),
				'width'        => '1920',
				'height'       => '40',
				'url'          => true,
				'title'        => esc_html__( 'بنر بالای هدر', $theme_textdomain ),
				'compiler'     => 'true',
				'desc'         => esc_html__( 'ابعاد تصویر مورد نیاز: 1920 پیکسل (طول) و 40 پیکسل (عرض)', $theme_textdomain ),
				'subtitle'     => esc_html__( 'مناسب اطلاعیه ها و جشنواره ها', $theme_textdomain ),
				'preview_size' => 'full',
			),
			array(
				'id'       => 'top-banner-text',
				'type'     => 'editor',
				'title'    => esc_html__( 'متن بنر بالای هدر', $theme_textdomain ),
				'required' => array( 'top-banner-type', '=', 'text' ),
				'args'     => array(
					'teeny'         => false,
					'media_buttons' => false,
					'textarea_rows' => 5,
				),
			),
            array(
                'id'       => 'blog-archive-top-banner',
                'type'     => 'gallery',
                'title'=>esc_html__('گالری تبلیغاتی صفحه مقالات', $theme_textdomain),
                'width'    => '1500',
                'height'   => '369',
                'url'      => true,
            )

		),
	)
);