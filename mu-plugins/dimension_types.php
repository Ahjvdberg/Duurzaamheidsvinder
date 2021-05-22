
<?php
function dimension_types() {

  // Program post type
  register_post_type('program',array(
    'show_in_rest' => true,
    'supports' => array('title','editor'),
    'rewrite' => array('slug' => 'programs'),
    'has_archive' => true,   
    'public' => true,
    'labels' => array(
      'name' => 'Programs',
      'add_new_item' => 'Add New Program',
      'edit_item' => 'Edit Program',
      'all_items' => 'All Programs',
      'singular_name' => 'Program'
    ),
    'menu_icon' => 'dashicons-awards'
  ));

  // Professor post type
  register_post_type('professor',array(
    'show_in_rest' => true,
    'supports' => array('title','editor','thumbnail'), 
    'public' => true,
    'labels' => array(
      'name' => 'professors',
      'add_new_item' => 'Add New professor',
      'edit_item' => 'Edit Professor',
      'all_items' => 'All Professors',
      'singular_name' => 'Professor'
    ),
    'menu_icon' => 'dashicons-welcome-learn-more'
  ));

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
  
}

add_action('init', 'dimension_types');
