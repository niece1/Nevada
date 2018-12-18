<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Nevada
 */

get_header();
?>
    <!--Breadcrumbs-->

<?php if(get_post_meta('212', 'ale_archive_breadcrumbs', true)){ ?>
<section class="breadcrumbs" data-type="background" style="background-image: url(<?php echo esc_attr(get_post_meta('212', 'ale_archive_breadcrumbs', true)); ?>);">
	<div class="figcap">
  <h3 class="page-title">
					<?php
					/* translators: %s: search query. */
					printf( esc_html__( 'Search Results for: %s', 'nevada' ), '<span>' . get_search_query() . '</span>' );
					?>
				</h3>
  <h6><?php nevada_the_breadcrumb(); ?></h6>
</div>
</section>
<?php } ?>
<!-- /.breadcrumbs -->

    <div class="single_layout">
	<div class="single_layout_wrapper">
		<div class="blog_left">	

		<?php if ( have_posts() ) : ?>

			

			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'search' );

			endwhile;

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
