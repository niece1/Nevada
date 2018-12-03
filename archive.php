<?php
/**
 * The template for displaying archive pages
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

<div class="single_layout">
	<div class="single_layout_wrapper">
		<div class="blog_left">

	

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header><!-- .page-header -->

			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'search' );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

		</div>
<div class="right_sidebar">
<?php
get_sidebar(); ?>
</div>
</div>

<?php

get_footer();
