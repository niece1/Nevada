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


