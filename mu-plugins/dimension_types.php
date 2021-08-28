
<?php
function dimension_types() {

  // Webshop post type
  register_post_type('webshop',array(
    'show_in_rest' => true,   // Use block editor instead of classical editor
    'supports' => array('title','editor', 'thumbnail', 'excerpt'),
    'rewrite' => array('slug' => 'webshops'),
    'has_archive' => true,   
    'public' => true,
    'taxonomies' => array(
      'category'
    ),
    'labels' => array(
      'name' => 'Webshops',
      'add_new_item' => 'Add New Webshop',
      'edit_item' => 'Edit Webshop',
      'all_items' => 'All Webshops',
      'singular_name' => 'Webshop'
    ),
    'menu_icon' => 'dashicons-cart'
  ));

  // Brand post type
  register_post_type('brand',array(
    'show_in_rest' => true,
    'supports' => array('title','editor','thumbnail', 'excerpt'), 
    'rewrite' => array('slug' => 'brands'),
    'has_archive' => true,
    'public' => true,
    'taxonomies' => array(
      'category'
    ),
    'labels' => array(
      'name' => 'Brands',
      'add_new_item' => 'Add New Brand',
      'edit_item' => 'Edit Brand',
      'all_items' => 'All Brands',
      'singular_name' => 'Brand'
    ),
    'menu_icon' => 'dashicons-tag'
  ));
/*
    // Note post type
    register_post_type('note',array(
      'capability_type' => 'note',
      'map_meta_cap' => true,
      'show_in_rest' => true,
      'supports' => array('title','editor'), 
      'public' => false,
      'show_ui' => true,
      'labels' => array(
        'name' => 'Notes',
        'add_new_item' => 'Add New Note',
        'edit_item' => 'Edit Note',
        'all_items' => 'All Notes',
        'singular_name' => 'Note'
      ),
      'menu_icon' => 'dashicons-welcome-write-blog'
    ));

        // Like post type
        register_post_type('like',array(
          'supports' => array('title'), 
          'public' => false,
          'show_ui' => true,
          'labels' => array(
            'name' => 'Likes',
            'add_new_item' => 'Add New Like',
            'edit_item' => 'Edit Like',
            'all_items' => 'All Likes',
            'singular_name' => 'Like'
          ),
          'menu_icon' => 'dashicons-heart'
        ));
 */ 
}

add_action('init', 'dimension_types');
