<?php
/**
 * Plugin Name: Checkout field
 * Plugin URI: https://example.com
 * Description: A simple WordPress plugin for age verification.
 * Version: 1.0.0
 * Author: Sablu Hasan
 * Author URI: https://sablu-hasan.vercel.app/
 * License: GPL2
 * Text Domain: age-verification
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
            __('Custom Menu', 'age-verification'), 'custom Menu', 'manage_options','custompage', [$this,'my_cusotom_menu_page'],'dashicons-admin-generic',6
        );

        add_submenu_page(
            'custompage','Existing WP','Existing WP ', 'read', 'sub_menu',[$this, 'wpdocs_orders_function']
        );
    }

    public function my_cusotom_menu_page(){
        ?>
        <div class="wrap">
			<h1><?php esc_html_e( 'Admin Page Test', 'checkout-field' ); ?></h1>
		</div>
        <?php
    }
    public function wpdocs_orders_function(){
        ?>
        <div class="wrap">
			<h1><?php esc_html_e( 'Admin Page Test', 'checkout-field' ); ?></h1>
		</div>
        <?php
    }

}
new Checkout_Field();

