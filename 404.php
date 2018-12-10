<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
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

	<div class="nevada_page">
	    <div class="nevada_page_wrapper">

			<section class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'nevada' ); ?></h1>
				</header><!-- .page-header -->
				<div class="page-content">
					<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'nevada' ); ?></p>

					<?php
					get_search_form();
					?>
					<?php
					/* translators: %1$s: smiley */
					$nevada_archive_content = '<p>' . sprintf( esc_html__( 'Try looking in the monthly archives. %1$s', 'nevada' ), convert_smilies( ':)' ) ) . '</p>';
					the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$nevada_archive_content" );
					?>

				</div><!-- .page-content -->
			</section><!-- .error-404 -->
		</div>
    </div>

<?php
get_footer();
