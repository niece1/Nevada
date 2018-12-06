<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Nevada
 */

get_header();
?>
   
   <!--Breadcrumbs-->

<?php if(get_post_meta('212', 'ale_about_breadcrumbs', true)){ ?>
<section class="breadcrumbs" data-type="background" style="background-image: url(<?php echo esc_attr(get_post_meta('212', 'ale_about_breadcrumbs', true)); ?>); background-color: rgba(0, 0, 0, 0.9);"> 
  <h3><?php the_title(); ?></h3>
  <h6><?php nevada_the_breadcrumb(); ?></h6>
</section>
<?php } ?>
<!-- /.breadcrumbs -->

	

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

		

<?php

get_footer();
