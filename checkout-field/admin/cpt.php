<?php
if (!defined('ABSPATH')) {
    exit;
}

class Checkout_Field_CPT {
    
    /**
     * Constructor to initialize hooks.
     */
    public function __construct() {
        add_action('init', [$this, 'register_books_cpt']);
    }

    /**
     * Register Custom Post Type for Books.
     */
    public function register_books_cpt() {
        $labels = [
            'name'               => __('Books', 'checkout-field'),
            'singular_name'      => __('Book', 'checkout-field'),
            'add_new'            => __('Add New', 'checkout-field'),
            'add_new_item'       => __('Add New Book', 'checkout-field'),
            'edit_item'          => __('Edit Book', 'checkout-field'),
            'all_items'          => __('All Books', 'checkout-field'),
        ];

        $args = [
            'labels'             => $labels,
            'public'             => true,
            'has_archive'        => true,
            'show_in_rest'       => true, // Enable Gutenberg editor
            'supports'           => ['title', 'editor', 'thumbnail'],
            'menu_icon'          => 'dashicons-book',
        ];

        register_post_type('book', $args);
    }
}

// Instantiate the CPT class
new Checkout_Field_CPT();
