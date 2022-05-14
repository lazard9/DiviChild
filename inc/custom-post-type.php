<?php 
function cpt_news_register() {

    $labels = array(
        'name'                  => _x( 'News', 'post type general name', 'lgbcoin' ),
        'singular_name'         => _x( 'News', 'post type singular name', 'lgbcoin' ),
        'menu_name'             => __( 'News', 'lgbcoin' ),
        'parent_item_colon'     => '',
        'all_items'             => __( 'All News', 'lgbcoin' ),
        'view_item'             => __( 'View News', 'lgbcoin' ),
        'add_new'               => __( 'Add New', 'lgbcoin' ),
        'add_new_item'          => __( 'Add New News', 'lgbcoin' ),
        'edit_item'             => __( 'Edit News', 'lgbcoin' ),
        'update_item'           => __( 'Update News', 'lgbcoin' ),
        'new_item'              => __( 'New News', 'lgbcoin' ),
        'search_items'          => __( 'Search News', 'lgbcoin' ),
        'not_found'             => __( 'No News found', 'lgbcoin' ),
        'not_found_in_trash'    => __( 'No News found in Trash', 'lgbcoin' ), 
    );

    $args = array(
        'label'                 => __( 'News', 'lgbcoin' ),
        'labels'                => $labels,
        'supports'           => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
		'hierarchical'          => false,
        'public'                => false,  // it's not public, it shouldn't have it's own permalink, and so on
        'publicly_queryable'    => false,  // you should be able to query it
        'show_ui'               => true,  // you should be able to edit it in wp-admin
        'exclude_from_search'   => true,  // you should exclude it from search results
        'show_in_nav_menus'     => false,  // you shouldn't be able to add it to menus
        'has_archive'           => false,  // it shouldn't have archive page
        'description'           => 'News custom post type.',
		'rewrite'               => array( 'slug' => 'news' ),
        'show_in_menu'          => true,
        'menu_icon'             => 'dashicons-media-document',
        'menu_position'         => 4,
        'show_in_admin_bar'     => true,
        'can_export'            => true,
        'capability_type'       => 'post',
        //'show_in_rest'          => true
    ); 
    register_post_type('news',$args);

}

add_action( 'init', 'cpt_news_register', 0 );