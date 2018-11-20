<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );
add_action( 'woocommerce_before_main_content', 'nevada_add_breadcrumbs', 20 );
function nevada_add_breadcrumbs(){
	?>
	<!--Breadcrumbs-->

	<section class="breadcrumbs" data-type="background" style="background-image: url(img/blue-jeans-2160265_1920.jpg); background-color: rgba(0, 0, 0, 0.9);">	
	<h3><?php echo wp_get_document_title(); ?></h3>
  <h6><?php woocommerce_breadcrumb(); ?></h6>
	</section>
<!-- /.breadcrumbs -->
<?php
}



add_action( 'woocommerce_before_single_product_summary', 'nevada_wrapper_product_image_start', 5 );
function nevada_wrapper_product_image_start() {
	?>
	<div class="product_left">
	<?php
}
add_action( 'woocommerce_before_single_product_summary', 'nevada_wrapper_product_image_end', 25 );
function nevada_wrapper_product_image_end() {
	?>
	</div>
	<?php
}
add_action( 'woocommerce_before_single_product_summary', 'nevada_wrapper_product_entry_start', 30 );
function nevada_wrapper_product_entry_start() {
	?>
	<div class="product_right">
	<?php
}
add_action( 'woocommerce_after_single_product_summary', 'nevada_wrapper_product_entry_end', 5 );
function nevada_wrapper_product_entry_end() {
	?>
	</div>
	<?php
}

add_action( 'wp_enqueue_scripts', 'nevada_woocommerce_scripts' );
function nevada_woocommerce_scripts() {
	wp_enqueue_style( 'nevada-woocommerce-style', get_template_directory_uri() . '/woocommerce.css' );

	$font_path   = WC()->plugin_url() . '/assets/fonts/';
	$inline_font = '@font-face {
			font-family: "star";
			src: url("' . $font_path . 'star.eot");
			src: url("' . $font_path . 'star.eot?#iefix") format("embedded-opentype"),
				url("' . $font_path . 'star.woff") format("woff"),
				url("' . $font_path . 'star.ttf") format("truetype"),
				url("' . $font_path . 'star.svg#star") format("svg");
			font-weight: normal;
			font-style: normal;
		}';

	wp_add_inline_style( 'nevada-woocommerce-style', $inline_font );
}

add_action( 'woocommerce_before_main_content', 'nevada_archive_wrapper_start', 40 );
function nevada_archive_wrapper_start(){
	if ( is_shop() ) {
?>
	<div class="archive_wrapper">
<?php
   }
}
add_action( 'woocommerce_after_main_content', 'nevada_archive_wrapper_end', 20 );
function nevada_archive_wrapper_end(){
	if ( is_shop() ) {
?>
    </div>
	<?php
   }
}

/**
 * Change number or products per row to 3
 
add_filter('loop_shop_columns', 'loop_columns');

	function loop_columns($columns) {
		if ( is_shop() ) {
            $columns = 4;
		}
		return $columns; 
	}
*/
/**
 * Change number of products that are displayed per page (shop page)
 
add_filter( 'loop_shop_per_page', 'new_loop_shop_per_page', 20 );

function new_loop_shop_per_page( $cols ) {
  // $cols contains the current number of products per page based on the value stored on Options -> Reading
  // Return the number of products you wanna show per page.
  $cols = 16;
  return $cols;
}
*/
add_filter( 'woocommerce_show_page_title', 'nevada_hide_title_shop' );
function nevada_hide_title_shop( $hide ) {
	if ( is_shop() ) {
		$hide = false;
	}
	
	return $hide;
}

add_filter( 'post_class', 'nevada_add_class_loop_item' );
function nevada_add_class_loop_item($clasess){
	if(is_shop() || is_product_taxonomy()){
		$clasess[] = 'store_wrapper';
	}
	return $clasess;
}




add_action( 'woocommerce_before_shop_loop_item_title', 'nevada_loop_product_span_open' , 5);
function nevada_loop_product_span_open(){
	?>
	<span>
	<?php
}
add_action( 'woocommerce_shop_loop_item_title', 'nevada_loop_product_span_close' , 5);
function nevada_loop_product_span_close(){
	?>
	</span>
	<?php
}

function woocommerce_template_loop_product_link_open() {
	global $product;

	$link = apply_filters( 'woocommerce_loop_product_link', get_the_permalink(), $product );

	echo '<a href="' . esc_url( $link ) . '" class="woocommerce-LoopProduct-link woocommerce-loop-product__link link_effect" data-content="">';
}

remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating',5 );
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price',10 );

remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title',10 );
add_action( 'woocommerce_after_shop_loop_item', 'nevada_template_loop_product_title', 6 );
function nevada_template_loop_product_title(){
	echo '<h6><a class"title_link" href="'. get_permalink() .'">' . get_the_title() . '</a></h6>';
}

add_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_rating', 7 );
add_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_price', 8 );

add_action( 'woocommerce_before_shop_loop', 'nevada_wrapper_div_archive_start', 5 );
function nevada_wrapper_div_archive_start() {
	?>
	<div class="result_and_form_align">
	<?php
}
add_action( 'woocommerce_before_shop_loop', 'nevada_wrapper_div_archive_end', 35 );
function nevada_wrapper_div_archive_end() {
	?>
	</div>
	<?php
}

add_action( 'woocommerce_before_single_product', 'nevada_wrapper_print_notice_start', 5 );
function nevada_wrapper_print_notice_start() {
	?>
	<div class="nevada_page">
	<div class="nevada_page_wrapper">
	<?php
}
add_action( 'woocommerce_before_single_product', 'nevada_wrapper_print_notice_end', 15 );
function nevada_wrapper_print_notice_end() {
	?>
	</div>
	</div>
	<?php
}


