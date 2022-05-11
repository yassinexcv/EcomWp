<?php
/*
 * This file initializes the theme per
 * theme type / functions etc.
 * It contains only theme related functions etc.
 *
 * @package justwp-business/theme-init
 * @since 0.0.1
 */

if (!function_exists('fashionable_store_check_woocommerce')):
    function fashionable_store_check_woocommerce()
    {
        if (class_exists('WooCommerce')):return true;
        else: return false; endif;
    }
endif;

if (!function_exists('fashionable_store_add_woo_class')):
    function fashionable_store_add_woo_class($classes)
    {

        if (fashionable_store_check_woocommerce()) {
            return array_merge($classes, array('woocommerce woocommerce-enabled'));
        } else {
            return array_merge($classes);
        }
    }
endif;
add_filter('body_class', 'fashionable_store_add_woo_class');

if (!function_exists('fashionable_store_wp_menu_fallback')):
    function fashionable_store_wp_menu_fallback()
    {
        /*
         * If no menu item is assigned to a menu , then please ,create some :D
         */
        if (current_user_can('edit_others_pages')):
            echo '<ul class="top-menu no-menu-items"><li>
<a href="' . esc_url(admin_url('nav-menus.php')) . '">' . esc_html__('Add a Menu', 'fashionable-store') . '</a>
</li></ul>';
        endif;
    }

endif;


if (!function_exists('fashionable_store_get_prefix')):
    function fashionable_store_get_prefix()
    {
        /*
         *  Generic prefix for that theme.
         */
        $prefix = 'fashionable-store';

        return esc_attr($prefix);
    }
endif;

if (!function_exists('fashionable_store_get_logo_url')):
    function fashionable_store_get_logo_url()
    {

        $custom_logo_id = get_theme_mod('custom_logo');
        $image = wp_get_attachment_image_src($custom_logo_id, 'full');

        return $image[0];
    }
endif;


if (!function_exists('fashionable_store_set_header_image')):
    function fashionable_store_set_header_image()
    {

        $header_image_url = esc_url(get_header_image());
        if (empty($header_image_url)): return; endif;

        $prefix = fashionable_store_get_prefix();
        $where_to_show = absint(get_theme_mod($prefix . '_everywhere_header', '0'));
        $header_style = absint(get_theme_mod($prefix . '_header_with_sidemenu_enable', '0'));

        if ($header_style == 1): // Get the header with the side menu
            $html = '<div class="header-image-with-side-menu-container pad-tb-20">';
            $html .= '<div class="container grid-xl">';
            $html .= '<div class="columns">';
            $html .= '<div class="column col-3 col-sm-12">';
            $html .= '<h4 class="side-menu-header"><span class="fas fa-list-alt"></span>' . esc_html__('Browse Categories', 'fashionable-store') . '</h4>';

            $html .= wp_nav_menu(array(
                'theme_location' => 'side-menu',
                'menu_class' => 'side-menu',
                'container' => 'nav',
                'container_class' => 'side-menu-nav',
                'echo' => false,
                'fallback_cb' => 'false'
            ));

            $html .= '</div>'; // .column col-4

            $html .= '<div class="column col-9 hide-sm side-menu-header-image" style="background-image: url(' . $header_image_url . ') ">';
            $header_text = absint(get_theme_mod($prefix . '_header_image_content', ''));
            if ($header_text != 0 && $header_text != null):
                $page = get_post(absint($header_text));
                $html .= '<div class="header-page-wrapper animated fadeInUp">';
                $html .= '<h2><a href="' . esc_url(get_permalink($page->ID)) . '" title="' . esc_attr($page->post_title) . '">' . esc_html($page->post_title) . '</a></h2>';
                $html .= '</div>';
            endif;
            $html .= '</div>'; // column col-8

            $html .= '</div>'; // columns
            $html .= '</div>';//container
            $html .= '</div>'; // header-image-with-side-menu-container
        else:
            $html = '<div class="header-image-container" style="background-image: url(' . get_header_image() . ') ">';
            /* Has header text? */

            $header_text = absint(get_theme_mod($prefix . '_header_image_content', ''));
            if ($header_text != 0 && $header_text != null):
                $page = get_post(absint($header_text));
                $html .= '<div class="header-page-wrapper">';
                $html .= '<h2>' . esc_html($page->post_title) . '</h2>';
                $html .= '<a href="' . esc_url(get_the_permalink($page->ID)) . '" class="header-page-button akis-btn is-uppercase is-square is-danger">' . esc_html__('Learn More', 'fashionable-store') . '</a>';
                $html .= '</div>';
            endif;
            $html .= '</div>'; // .header-image-container

        endif;

        if ($where_to_show == 0) {
            if (is_front_page() || is_home()) {
                echo $html;
            }
        } else {
            echo $html;
        }

    }
endif;
add_action('fashionable_store_after_header', 'fashionable_store_set_header_image', 5);

if (!function_exists('fashionable_store_show_slider')):
    function fashionable_store_show_slider()
    {
        $checkSlider = fashionable_store_check_slider();
        if ($checkSlider == true) {
            if (is_front_page() || is_home()):
                get_template_part('template-parts/slider/slider', 'tpl');
            endif;
        }
    }
endif;
add_action('fashionable_store_after_header', 'fashionable_store_show_slider', 4);
/*
 * Register the WordPress customizer
 *
 * @since 1.0.0
 */
add_action('customize_register', 'fashionable_store_customizer_settings');
if (!function_exists('fashionable_store_customizer_settings')):
    function fashionable_store_customizer_settings($wp_customize)
    {
        $prefix = 'fashionable-store';
        require_once(get_template_directory() . '/includes/customizer-functions/customizer-panels.php'); // Get all the panels.
    }
endif;

/*
 * Function tha returns the single blog posts categories
 */
if (!function_exists('fashionable_store_post_categories')):
    function fashionable_store_post_categories()
    {
        $terms = wp_get_object_terms(get_the_ID(), 'category');
        if (!empty($terms)):
            $html = '';
            foreach ($terms as $term):
                $html .= '<a href="' . esc_url(get_term_link($term->term_id)) . '">' . esc_html($term->name) . '</a>';
            endforeach;

            return $html;
        else:
            return false;
        endif;


    }
endif;


/*
 * Theme Customizer Sanitization function
 * for extra elements.
 */

function fashionable_store_sanitize_number_absint($number, $setting)
{
    $number = absint($number);

    return ($number ? $number : $setting->default);
}

function fashionable_store_sanitize_checkbox($checked)
{

    return ((isset($checked) && true == $checked) ? true : false);
}

function fashionable_store_sanitize_dropdown_pages($page_id, $setting)
{

    $page_id = absint($page_id);

    return ('publish' == get_post_status($page_id) ? $page_id : $setting->default);
}


if (!function_exists('fashionable_store_featured_categories')):
    function fashionable_store_featured_categories()
    {
        $prefix = fashionable_store_get_prefix();
        $featured_categories = esc_html(get_theme_mod($prefix . '_featured_categories_field', ''));
        $featured_categories_array = array();
        if (empty($featured_categories)):return false;
        else:
            $featured_categories_array = explode(',', $featured_categories);
            if (!empty($featured_categories_array)):
                return $featured_categories_array;
            else:
                return false;
            endif;
        endif;
    }
endif;

if (!function_exists('fashionable_store_set_fcats_style_two_class')):
    function fashionable_store_set_fcats_style_two_class($counter)
    {

        /*
         * This function works with the style 2 of the featured categories on the home page.
         */
        if ($counter % 1 == 0 && $counter == 1) {
            return 'col-8';
        } elseif ($counter % 2 == 0 && $counter == 2) {
            return 'col-4';
        } elseif ($counter % 3 == 0) {
            return 'col-3';
        } elseif ($counter % 4 == 0) {
            return 'col-3';
        } else if ($counter % 5 == 0) {
            return 'col-3';
        } else if ($counter % 6 == 0) {
            return 'col-3';
        }

    }
endif;

if (!function_exists('fashionable_store_check_slider')):
    function fashionable_store_check_slider()
    {
        $prefix = fashionable_store_get_prefix();
        $sliderOpt = absint(get_theme_mod($prefix . '_slider_parent_page', ''));
        if ($sliderOpt != 0) {
            return true;
        } else {
            return false;
        }
    }
endif;