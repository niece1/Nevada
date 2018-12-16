<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Nevada
 */

get_header();
?>
<!--Breadcrumbs-->

<?php if(get_post_meta('212', 'ale_about_breadcrumbs', true)){ ?>
<section class="breadcrumbs" data-type="background" style="background-image: url(<?php echo esc_attr(get_post_meta('212', 'ale_about_breadcrumbs', true)); ?>);">
	<div class="figcap">
  <h3><?php the_title(); ?></h3>
  <h6><?php nevada_the_breadcrumb(); ?></h6>
</div>
</section>
<?php } ?>
<!-- /.breadcrumbs -->

<div class="single_layout">
	<div class="single_layout_wrapper">
		<div class="blog_left">
	
		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', get_post_type() );

		//	the_post_navigation();

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>
	
	</div>
    <div class="right_sidebar">
<?php
get_sidebar(); ?>
</div>
</div>
</div> <?php
get_footer();
