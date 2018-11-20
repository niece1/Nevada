<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Nevada
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
    
	<?php wp_head(); ?>
</head>

<body>
<section class="navigation">
  <div class="nav-container">
    <div class="brand">
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo('name'); ?></a>
    </div>
    <nav>
      <div class="nav-mobile"><a id="nav-toggle" href="#!"><span></span></a></div>
       <?php nevada_primary_menu(); ?> 
         <div class="menu-menu-1-container">
           <ul class="nav-list">
              <li id="icon_cart"> 
                  <?php nevada_woocommerce_cart_link(); ?>
              </li>
              <li>
                <a href="#" id="search"><i class="fas fa-search"></i></a>
              </li>
            </ul>
         </div>
    </nav>
  </div>
</section>

  <div class="search_overlay">
    <i class="fas fa-times close_button"></i>
      <?php get_search_form('nevada_my_search_form'); ?>
  </div>
  <!-- /#search_overlay -->

	
