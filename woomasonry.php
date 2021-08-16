<?php

/*
  Plugin Name:       WooCommerce Products Masonry Grid
  Plugin URI:        http://www.intensewp.com/woomasonry-woocommerce-products-post-masonry-grid/
  Description:       Display your products in masonry grid view. beautiful animation effect when changing the product categories
  Version:           1.4
  Author:            DraftPress
  Author URI:        https://draftpress.com/
  License:           GPL-2.0+
  License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
  Text Domain:       woomasonry
  Domain Path:       /languages
 /
// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */

add_action('admin_menu', 'woomasonry_add_menu');

function woomasonry_add_menu() {
    add_submenu_page('woocommerce', __('Woo Masonry', 'woomasonry'), __('Woo Masonry', 'woomasonry'), 'manage_options', 'woomasonry', 'woomasonry_home');
}

function woomasonry_home() {
    global $wpdb;
    include 'wm_home.php';
}

function woomasonry_admin_notice__error() {
    $class = 'notice notice-error';
    $message = __('It seems WooCommerce is not installed or activated. Woo Masonry Products Grid works only with active Woocommerce plugin.', 'woomasonry');

    printf('<div class="%1$s"><p>%2$s</p></div>', esc_attr($class), esc_html($message));
}

function enqueue_woomasonry() {
    wp_enqueue_style('woomasonry_css1', plugins_url('css/layout.css', __FILE__));

    wp_enqueue_script('woomasonry_js1', plugins_url('js/isotope.pkgd.min.js', __FILE__), array(), '20170506', true);
    wp_enqueue_script('woomasonry_js2', plugins_url('js/wm_func.js', __FILE__), array(), '20170507', true);
}

add_action('wp_enqueue_scripts', 'enqueue_woomasonry');

function woomasonry_public_error() {
    $wm_error_msg = __('It seems WooCommerce is not installed or activated. Woo Masonry Products Grid works only with active Woocommerce plugin.', 'woomasonry');
    return $wm_error_msg;
}

function woomasonry_isotope_html($atts) {
    $wm_output  = "";
    $wm_atts = shortcode_atts(array(
        'number' => 6,
        'cat' => '',
      ), $atts);

    if ($wm_atts['cat'] <> '') {
        $arr_cats = explode(',', $wm_atts['cat']);
        $wm_catTerms = get_terms('product_cat', array(
            'hide_empty' => 1,
            'orderby' => 'ASC',
            'slug' => $arr_cats, //cat="hoodies, t-shirts"
        ));
    } else {
        $wm_catTerms = get_terms('product_cat', array(
            'hide_empty' => 1,
            'orderby' => 'ASC',
        ));
    }
 //$do_ac = do_action('woocommerce_before_single_product');
  $wm_output .= do_action('woocommerce_before_single_product') . 
  '<div id="filters" class="button-group">
  <button class="button is-checked" data-filter="*">show all</button>';

    if ($wm_catTerms) {

        foreach ($wm_catTerms as $woo_term) {
            $wm_output .= '<button class="button" data-filter=".' . $woo_term->slug . '">' . $woo_term->name . '</button>';
        }
    }

    $wm_output .= '</div>';
    if ($wm_catTerms <> '') {
        $wm_output .= '<div class = "grid">';

        foreach ($wm_catTerms as $woo_term) {
            global $product;

            $wm_prod_args = array('post_type' => 'product', 'posts_per_page' => $wm_atts['number'], 'product_cat' => $woo_term->slug);

            $loop = new WP_Query($wm_prod_args);

            while ($loop->have_posts()) : $loop->the_post();
                $_product = wc_get_product(get_the_ID());
                $wm_output .= '
            <div class = "element-item ' . $woo_term->slug . ' " data-category = "' . $woo_term->slug . '">
            <div class="woomsproduct">
			' . woocommerce_get_product_thumbnail() . '
			<h1><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></h1>
			<p class="woomsprce">' . $_product->get_price_html() . '</p>
			' .
                        apply_filters('woocommerce_loop_add_to_cart_link', sprintf('<a href="%s" rel="nofollow" data-product_id="%s" data-product_sku="%s" class="woomscart button %s product_type_%s">%s</a>', esc_url($_product->add_to_cart_url()), esc_attr($_product->get_id()), esc_attr($_product->get_sku()), $_product->is_purchasable() ? 'add_to_cart_button' : '', esc_attr($_product->get_type()), esc_html($_product->add_to_cart_text())
                                ), $_product) . '
                            </div>
            </div>';
            endwhile;
        }
        $wm_output .= '</div></div>';
        wp_reset_query();
        return $wm_output;
    }
}
add_shortcode('woomasonry_grid', 'woomasonry_isotope_html');
function woomasonry_plugin_init() {
  if (!class_exists('WooCommerce')) {
    add_action('admin_notices', 'woomasonry_admin_notice__error');
    //add_shortcode('woomasonry_grid', 'woomasonry_public_error');
  }
}
add_action( 'plugins_loaded', 'woomasonry_plugin_init' );
