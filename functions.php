<?php
/**
 * Nevada functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Nevada
 */
 /*
 Theme Settings
 */
 require get_template_directory() . '/includes/theme-settings.php';

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */


/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
require get_template_directory() . '/includes/widget-areas.php';

/**
 * Enqueue scripts and styles.
 */
require get_template_directory() . '/includes/enqueue-script-style.php';

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/includes/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/includes/template-tags.php';

/**
 * Help functions.
 */
require get_template_directory() . '/includes/helpers.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/includes/template-functions.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/includes/init-tgm.php';

/*Metaboxes*/
require get_template_directory() . '/includes/metaboxes.php';

/*Searchform*/
require get_template_directory() . '/includes/searchform.php';

/*Theme Options*/
require get_template_directory() . '/includes/theme-options.php';

/*Register Custom Post Type*/
require get_template_directory() . '/includes/post-type.php';

/*Register Custom Post Type*/
require get_template_directory() . '/includes/breadcrumbs.php';

/*Register Custom Post Type*/
require get_template_directory() . '/includes/pagination.php';

/*Navigation*/
require get_template_directory() . '/includes/navigation.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/includes/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/includes/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/includes/woocommerce.php';
	require get_template_directory() . '/woocommerce/includes/wc-functions.php';
	require get_template_directory() . '/woocommerce/includes/wc-functions-remove.php';
	require get_template_directory() . '/woocommerce/includes/wc_functions_cart.php';
}

// The excerpt length and output
add_filter( 'excerpt_length', function(){
	return 25;
} );
add_filter('excerpt_more', function($more) {
	return '...';
});

// Comment form fields reorder

add_filter('comment_form_fields', 'nevada_reorder_comment_fields' );
function nevada_reorder_comment_fields( $fields ){
	// die(print_r( $fields )); // посмотрим какие поля есть

	$new_fields = array(); // сюда соберем поля в новом порядке

	$myorder = array('author','email','comment'); // нужный порядок

	foreach( $myorder as $key ){
		$new_fields[ $key ] = $fields[ $key ];
		unset( $fields[ $key ] );
	}

	// если остались еще какие-то поля добавим их в конец
	if( $fields )
		foreach( $fields as $key => $val )
			$new_fields[ $key ] = $val;

		return $new_fields;
	}

// Comment form URL field remove
	add_filter('comment_form_default_fields', 'nevada_url_remove');
	function nevada_url_remove($fields)
	{
		if(isset($fields['url']))
			unset($fields['url']);
		return $fields;
	}


