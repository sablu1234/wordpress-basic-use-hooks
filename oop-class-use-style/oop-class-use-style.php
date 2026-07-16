<?php
/**
 * Plugin Name: OOP CLASS USE STYLE
 * Plugin URI: https://example.com
 * Description: A simple WordPress plugin to register Book Custom Post Type.
 * Version: 1.0.0
 * Author: Sablu Hasan
 * Author URI: https://sablu-hasan.vercel.app/
 * License: GPL2
 * Text Domain: text-domain
 */

if (!defined('ABSPATH')) {
    exit;
}

require_once plugin_dir_path( __FILE__ ) . 'admin/cpt.php';

final class Checkout_Field{
    public function __construct(){
        add_action( 'admin_menu', [$this, 'wpdocs_register_my_custom_menu_page'] );
    }

    public function wpdocs_register_my_custom_menu_page(){
        add_menu_page(
            __('Custom Menu', 'text-domain'), 'custom Menu', 'manage_options','custompage', [$this,'my_cusotom_menu_page'],'dashicons-admin-generic',6
        );

        add_submenu_page(
            'custompage','Existing WP','Existing WP ', 'read', 'sub_menu',[$this, 'wpdocs_orders_function']
        );
    }

    public function my_cusotom_menu_page(){
        ?>
        <div class="wrap">
			<h1><?php esc_html_e( 'Admin Page Test', 'text-domain' ); ?></h1>
		</div>
        <?php
    }
    public function wpdocs_orders_function(){
        ?>
        <div class="wrap">
			<h1><?php esc_html_e( 'Admin Page Test', 'text-domain' ); ?></h1>
		</div>
        <?php
    }

}
new Checkout_Field();

/**
 * Child class extending Checkout_Field_CPT
 */
class Custom_Books_CPT extends Checkout_Field_CPT {
    
    public function __construct() {
        // parent::__construct() প্যারেন্ট ক্লাসের (Checkout_Field_CPT) কনস্ট্রাক্টরকে রান করায়।
        // এর ফলে প্যারেন্ট ক্লাসে থাকা হুক add_action('init', ...) সচল হয় এবং চাইল্ড ক্লাসের ওভাররাইড মেথড রান করে।
        parent::__construct();
    }

    /**
     * Override parent register_books_cpt method to customize settings.
     */
    public function register_books_cpt() {
        $labels = [
            'name'               => __('Extended Books', 'text-domain'),
            'singular_name'      => __('Extended Book', 'text-domain'),
            'add_new'            => __('Add Extended Book', 'text-domain'),
            'add_new_item'       => __('Add New Extended Book', 'text-domain'),
            'edit_item'          => __('Edit Extended Book', 'text-domain'),
            'all_items'          => __('All Extended Books', 'text-domain'),
        ];

        $args = [
            'labels'             => $labels,
            'public'             => true,
            'has_archive'        => true,
            'show_in_rest'       => true, 
            'supports'           => ['title', 'editor', 'thumbnail', 'excerpt'],
            'menu_icon'          => 'dashicons-book-alt',
        ];

        register_post_type('extended_book', $args);
    }
}

// Instantiate the child class
new Custom_Books_CPT();

