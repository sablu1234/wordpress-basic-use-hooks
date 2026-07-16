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
            'name'               => __('Books', 'text-domain'),
            'singular_name'      => __('Book', 'text-domain'),
            'add_new'            => __('Add New', 'text-domain'),
            'add_new_item'       => __('Add New Book', 'text-domain'),
            'edit_item'          => __('Edit Book', 'text-domain'),
            'all_items'          => __('All Books', 'text-domain'),
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
