<?php

function custom_woocommerce_megamenu()
{
    $parent_categories = get_terms(array(
        'taxonomy' => 'product_cat',
        'parent' => 0,
        'hide_empty' => false,
    ));

    if (!empty($parent_categories) && !is_wp_error($parent_categories)) {
        echo '<ul class="native-mega-menu">';
        foreach ($parent_categories as $parent) {
            // بررسی اینکه آیا این دسته فرزند دارد یا خیر (برای تعیین داشتن مگامنو)
            $sub_categories = get_terms(array(
                'taxonomy' => 'product_cat',
                'parent' => $parent->term_id,
                'hide_empty' => false,
            ));

            $has_children = !empty($sub_categories);
            $thumbnail_id = get_term_meta($parent->term_id, 'thumbnail_id', true);
            $image_url = wp_get_attachment_url($thumbnail_id);

            echo '<li class="menu-item-parent ' . ($has_children ? 'has-mega' : '') . '">';
            echo '<a href="' . esc_url(get_term_link($parent)) . '">' . esc_html($parent->name) . '</a>';

            // اگر دسته فرزند داشت، ساختار مگامنو را رندر کن
            if ($has_children) {
                echo '<div class="mega-menu-dropdown">';
                echo '<div class="mega-container">';

                foreach ($sub_categories as $sub) {
                    echo '<div class="mega-column">';
                    echo '<h4><a href="' . esc_url(get_term_link($sub)) . '">' . esc_html($sub->name) . '</a></h4>';

                    // زیرمجموعه‌های سطح سوم
                    $grand_children = get_terms(array(
                        'taxonomy' => 'product_cat',
                        'parent' => $sub->term_id,
                        'hide_empty' => false,
                    ));

                    if (!empty($grand_children)) {
                        echo '<ul>';
                        foreach ($grand_children as $grand) {
                            echo '<li><a href="' . esc_url(get_term_link($grand)) . '">' . esc_html($grand->name) . '</a></li>';
                        }
                        echo '</ul>';
                    }
                    echo '</div>'; // .mega-column
                }

                // نمایش تصویر دسته‌بندی والد در صورت وجود
                if ($image_url) {
                    echo '<div class="mega-banner"><img src="' . esc_url($image_url) . '" alt="' . esc_attr($parent->name) . '"></div>';
                }

                echo '</div>'; // .mega-container
                echo '</div>'; // .mega-menu-dropdown
            }

            echo '</li>';
        }
        echo '</ul>';
    }
}