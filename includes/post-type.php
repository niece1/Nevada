<?php
function nevada_custom_post_type_slider() {
    $labels = array(
        'name'                  => _x( 'Sliders', 'Post type general name', 'textdomain' ),
        'singular_name'         => _x( 'Slider', 'Post type singular name', 'textdomain' ),
      
    );
 
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'slider' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array( 'title', 'editor', 'thumbnail' ),
    );
 
    register_post_type( 'slider', $args );
}
 
add_action( 'init', 'nevada_custom_post_type_slider' );


function nevada_custom_post_type_services() {
    $labels = array(
        'name'                  => _x( 'Services', 'Post type general name', 'textdomain' ),
        'singular_name'         => _x( 'Services', 'Post type singular name', 'textdomain' ),    
    );
 
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'services' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array( 'title', 'editor', 'thumbnail' ),
    );
 
    register_post_type( 'services', $args );
}
add_action( 'init', 'nevada_custom_post_type_services' );
?>