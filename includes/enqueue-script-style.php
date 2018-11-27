<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

function nevada_scripts() {
	wp_enqueue_style( 'nevada-style', get_stylesheet_uri() );
	wp_enqueue_style( 'slick', get_template_directory_uri() . '/assets/slick/slick.css', array ('nevada-style'), null, 'all' );
	wp_enqueue_style( 'slick-theme', get_template_directory_uri() . '/assets/slick/slick-theme.css',  array ('nevada-style'), null, 'all' );
	wp_enqueue_style( 'animate', get_template_directory_uri() . '/assets/css/animate.min.css', array ('nevada-style'), null, 'all' );
	wp_enqueue_style( 'fonts', 'https://fonts.googleapis.com/css?family=Monoton|Old+Standard+TT|Open+Sans', array ('nevada-style'), null, 'all' );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/fontawesome-free-5.2.0-web/css/all.min.css', array ('nevada-style'), null, 'all' );

    wp_deregister_script( 'jquery-core' );
    wp_register_script( 'jquery-core', '//ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js');
	wp_enqueue_script( 'slick', get_template_directory_uri() . '/assets/slick/slick.js', array ('jquery'), '', true);
	wp_enqueue_script( 'nevada-particles', get_template_directory_uri() . '/assets/js/particles.js', array ('jquery'), '', true);

	 if(is_page_template('template-about.php')) {
	wp_enqueue_script( 'nevada-counter', get_template_directory_uri() . '/assets/js/counter.js', array ('jquery'), '', true);
     }
	wp_enqueue_script( 'navada-customizer', get_template_directory_uri() . '/assets/js/customizer.js', array ('jquery'), '', true);
	wp_enqueue_script( 'nevada-main', get_template_directory_uri() . '/assets/js/main.js', array ('jquery'), '', true);
	wp_enqueue_script( 'nevada-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), '20151215', true );
	wp_enqueue_script( 'nevada-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), '20151215', true );
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'nevada_scripts' );

function ale_add_scripts($hook) {
	if ( $hook=='post.php' || $hook == 'post-new.php' || $hook == 'page-new.php' || $hook =='page.php' ) {
	wp_enqueue_script( 'aletheme_metaboxes', get_template_directory_uri() . '/includes/js/metaboxes.js', array( 'jquery', 'jquery-ui-core', 'jquery-ui-datepicker', 'media-upload', 'thickbox' ) );
    }
}
add_action('admin_enqueue_scripts', 'ale_add_scripts', 10);