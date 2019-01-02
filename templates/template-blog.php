<?php
/*Template name: Blog
*/
get_header(); ?>

<!--Breadcrumbs-->

<?php if(get_post_meta('212', 'ale_blog_breadcrumbs', true)){ ?>
  <section class="breadcrumbs" data-type="background" style="background-image: url(<?php echo esc_attr(get_post_meta('212', 'ale_blog_breadcrumbs', true)); ?>);">
    <div class="figcap">
      <h3><?php the_title(); ?></h3>
      <h6><?php nevada_the_breadcrumb(); ?></h6>
    </section>
  </div>
<?php } ?>
<!-- /.breadcrumbs -->

<!--Blog Section-->

<section class="blogpost">
 
  <div class="blogpost_wrapper">

   <?php	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
   
   query_posts(array(
    'post_type' => 'post', // You can add a custom post type if you like
    'paged' => $paged,
    'posts_per_page' => 6 // limit of posts
  ));
   
  if ( have_posts() ) :  while ( have_posts() ) : the_post(); ?>
    
    <div class="blog_holder">
      <div class="blog_items card_items">
        
        <?php the_post_thumbnail(); ?>
        <div class="info_overlay">
          
          <a href="<?php the_permalink(); ?>" class="button">Read more</a>
        </div>
        
      </div>
      <small>Posted at <?php the_time('j F Y'); ?></small>
      <h6><?php the_title(); ?></h6>
      <p><?php the_excerpt(); ?></p>
    </div>
    <?php
  endwhile;
  
  
  
else :
 
// no posts found message goes here...
 
endif; ?>

</div>
<?php  nevada_pagination(); ?>
</section>

<?php get_footer(); ?>
