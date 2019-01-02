<?php
/*Template name: About
*/
get_header(); ?>

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

<!--About Section-->

<section class="get_to_know_us">
  <div class="get_to_know_us_wrapper">
    <div class="photo_block">
      <?php if(get_post_meta($post->ID, 'ale_file_upload_main_about_photo', true)){ ?>
        <img src="<?php echo esc_attr(get_post_meta($post->ID, 'ale_file_upload_main_about_photo', true)); ?>" alt="Store">
      <?php } ?>
    </div>

    <div class="know_us_block">
     <?php if(get_post_meta($post->ID, 'ale_main_about_title', true)){ ?>
      <h4><?php echo esc_attr(get_post_meta($post->ID, 'ale_main_about_title', true)); ?></h4>
    <?php } ?>

    <?php if(get_post_meta($post->ID, 'ale_main_about_description', true)){ ?>
      <p><?php echo esc_attr(get_post_meta($post->ID, 'ale_main_about_description', true)); ?></p>
    <?php } ?>

    <?php if(get_post_meta($post->ID, 'ale_about_list1', true)){ ?>
      <p class="black">
        <i class="far fa-check-circle"></i>
        <?php echo esc_attr(get_post_meta($post->ID, 'ale_about_list1', true)); ?>
      </p>
    <?php } ?>

    <?php if(get_post_meta($post->ID, 'ale_about_list2', true)){ ?>
      <p class="black">
        <i class="far fa-check-circle"></i>
        <?php echo esc_attr(get_post_meta($post->ID, 'ale_about_list2', true)); ?>
      </p>
    <?php } ?>

    <?php if(get_post_meta($post->ID, 'ale_about_list3', true)){ ?>
      <p class="black">
        <i class="far fa-check-circle"></i>
        <?php echo esc_attr(get_post_meta($post->ID, 'ale_about_list3', true)); ?>
      </p>
    <?php } ?>

    <?php if(get_post_meta($post->ID, 'ale_about_list4', true)){ ?>
      <p class="black">
        <i class="far fa-check-circle"></i>
        <?php echo esc_attr(get_post_meta($post->ID, 'ale_about_list4', true)); ?>
      </p>
    <?php } ?>


    <a href="/shop" class="button">
      <?php if(get_post_meta($post->ID, 'ale_about_button', true)){ ?>
        <?php echo esc_attr(get_post_meta($post->ID, 'ale_about_button', true)); ?>
      <?php } ?>
    </a>
  </div>
</div>
</section>

<!--Services section-->

<section class="services">
  <div class="services_wrapper">

    <div class="services_item">

      <?php if(get_post_meta('18', 'ale_file_upload_service_icon_1', true)){ ?>
        <img src="<?php echo esc_attr(get_post_meta('18', 'ale_file_upload_service_icon_1', true)); ?>" alt="Services">
      <?php } ?>

      <?php if(get_post_meta('18', 'ale_service_icon_title_1', true)){ ?>
        <p><?php echo esc_attr(get_post_meta('18', 'ale_service_icon_title_1', true)); ?></p>
      <?php } ?>
    </div>

    <div class="services_item">

      <?php if(get_post_meta('18', 'ale_file_upload_service_icon_2', true)){ ?>
        <img src="<?php echo esc_attr(get_post_meta('18', 'ale_file_upload_service_icon_2', true)); ?>" alt="Services">
      <?php } ?>

      <?php if(get_post_meta('18', 'ale_service_icon_title_2', true)){ ?>
        <p><?php echo esc_attr(get_post_meta('18', 'ale_service_icon_title_2', true)); ?></p>
      <?php } ?>
    </div>
    <div class="services_item">

      <?php if(get_post_meta('18', 'ale_file_upload_service_icon_3', true)){ ?>
        <img src="<?php echo esc_attr(get_post_meta('18', 'ale_file_upload_service_icon_3', true)); ?>" alt="Services">
      <?php } ?>

      <?php if(get_post_meta('18', 'ale_service_icon_title_3', true)){ ?>
        <p><?php echo esc_attr(get_post_meta('18', 'ale_service_icon_title_3', true)); ?></p>
      <?php } ?>
    </div>

    <div class="services_item">

      <?php if(get_post_meta('18', 'ale_file_upload_service_icon_4', true)){ ?>
        <img src="<?php echo esc_attr(get_post_meta('18', 'ale_file_upload_service_icon_4', true)); ?>" alt="Services">
      <?php } ?>

      <?php if(get_post_meta('18', 'ale_service_icon_title_4', true)){ ?>
        <p><?php echo esc_attr(get_post_meta('18', 'ale_service_icon_title_4', true)); ?></p>
      <?php } ?>
    </div>
    <div class="services_item">

      <?php if(get_post_meta('18', 'ale_file_upload_service_icon_5', true)){ ?>
        <img src="<?php echo esc_attr(get_post_meta('18', 'ale_file_upload_service_icon_5', true)); ?>" alt="Services">
      <?php } ?>

      <?php if(get_post_meta('18', 'ale_service_icon_title_5', true)){ ?>
        <p><?php echo esc_attr(get_post_meta('18', 'ale_service_icon_title_5', true)); ?></p>
      <?php } ?>
    </div>
    <div class="services_item">

      <?php if(get_post_meta('18', 'ale_file_upload_service_icon_6', true)){ ?>
        <img src="<?php echo esc_attr(get_post_meta('18', 'ale_file_upload_service_icon_6', true)); ?>" alt="Services">
      <?php } ?>

      <?php if(get_post_meta('18', 'ale_service_icon_title_6', true)){ ?>
        <p><?php echo esc_attr(get_post_meta('18', 'ale_service_icon_title_6', true)); ?></p>
      <?php } ?>
    </div>
  </div>
</section>


<!--About Introduction-->

<section class="about_introduction">
  <div class="about_introduction_wrapper">
    <div class="vertical_slider">

      <?php
      $args = array(
        'post_type'   => 'slider',
        'suppress_filters' => true
      );
      $myposts = get_posts( $args );
      foreach( $myposts as $post ){ setup_postdata($post);
        ?>
        <div class="image_holder">
          <?php the_post_thumbnail(); ?>
        </div>
        <?php  
      }
      wp_reset_postdata();
      ?>
    </div>

    <div class="slider_info">

      <div class="slider_info_inner">
      	<?php if(get_post_meta($post->ID, 'ale_file_upload_about_icon_1', true)){ ?>
          <img src="<?php echo esc_attr(get_post_meta($post->ID, 'ale_file_upload_about_icon_1', true)); ?>" class="animated infinite pulse" alt="about">
        <?php } ?>

        <?php if(get_post_meta($post->ID, 'ale_icon_about_title_1', true)){ ?>
          <h6><?php echo esc_attr(get_post_meta($post->ID, 'ale_icon_about_title_1', true)); ?></h6>
        <?php } ?>

        <?php if(get_post_meta($post->ID, 'ale_icon_about_description_1', true)){ ?>
          <p><?php echo esc_attr(get_post_meta($post->ID, 'ale_icon_about_description_1', true)); ?></p>
        <?php } ?>
      </div>
      
      <div class="slider_info_inner">
      	<?php if(get_post_meta($post->ID, 'ale_file_upload_about_icon_2', true)){ ?>
          <img src="<?php echo esc_attr(get_post_meta($post->ID, 'ale_file_upload_about_icon_2', true)); ?>" class="animated infinite pulse" alt="about">
        <?php } ?>

        <?php if(get_post_meta($post->ID, 'ale_icon_about_title_2', true)){ ?>
          <h6><?php echo esc_attr(get_post_meta($post->ID, 'ale_icon_about_title_2', true)); ?></h6>
        <?php } ?>

        <?php if(get_post_meta($post->ID, 'ale_icon_about_description_2', true)){ ?>
          <p><?php echo esc_attr(get_post_meta($post->ID, 'ale_icon_about_description_2', true)); ?></p>
        <?php } ?>
      </div>
    </div>

    <div class="slider_info">

      <div class="slider_info_inner">
      	<?php if(get_post_meta($post->ID, 'ale_file_upload_about_icon_3', true)){ ?>
          <img src="<?php echo esc_attr(get_post_meta($post->ID, 'ale_file_upload_about_icon_3', true)); ?>" class="animated infinite pulse" alt="about">
        <?php } ?>

        <?php if(get_post_meta($post->ID, 'ale_icon_about_title_3', true)){ ?>
          <h6><?php echo esc_attr(get_post_meta($post->ID, 'ale_icon_about_title_3', true)); ?></h6>
        <?php } ?>

        <?php if(get_post_meta($post->ID, 'ale_icon_about_description_3', true)){ ?>
          <p><?php echo esc_attr(get_post_meta($post->ID, 'ale_icon_about_description_3', true)); ?></p>
        <?php } ?>
      </div>
      
      <div class="slider_info_inner">
      	<?php if(get_post_meta($post->ID, 'ale_file_upload_about_icon_4', true)){ ?>
          <img src="<?php echo esc_attr(get_post_meta($post->ID, 'ale_file_upload_about_icon_4', true)); ?>" class="animated infinite pulse" alt="about">
        <?php } ?>

        <?php if(get_post_meta($post->ID, 'ale_icon_about_title_4', true)){ ?>
          <h6><?php echo esc_attr(get_post_meta($post->ID, 'ale_icon_about_title_4', true)); ?></h6>
        <?php } ?>

        <?php if(get_post_meta($post->ID, 'ale_icon_about_description_4', true)){ ?>
          <p><?php echo esc_attr(get_post_meta($post->ID, 'ale_icon_about_description_4', true)); ?></p>
        <?php } ?>
      </div>
    </div>
  </div>
</section>

<!--Counter Section-->

<section class="counter">
  <div class="counter_wrapper">

    <div class="count">
      <?php if(get_post_meta($post->ID, 'ale_counter_value_1', true)){ ?>
        <h2 class="count_number"><?php echo esc_attr(get_post_meta($post->ID, 'ale_counter_value_1', true)); ?></h2>
      <?php } ?>

      <?php if(get_post_meta($post->ID, 'ale_counter_title_1', true)){ ?>
        <p><?php echo esc_attr(get_post_meta($post->ID, 'ale_counter_title_1', true)); ?></p>
      <?php } ?>
    </div>

    <div class="count">
     <?php if(get_post_meta($post->ID, 'ale_counter_value_2', true)){ ?>
      <h2 class="count_number"><?php echo esc_attr(get_post_meta($post->ID, 'ale_counter_value_2', true)); ?></h2>
    <?php } ?>
    
    <?php if(get_post_meta($post->ID, 'ale_counter_title_2', true)){ ?>
      <p><?php echo esc_attr(get_post_meta($post->ID, 'ale_counter_title_2', true)); ?></p>
    <?php } ?>
  </div>

  <div class="count">
   <?php if(get_post_meta($post->ID, 'ale_counter_value_3', true)){ ?>
    <h2 class="count_number"><?php echo esc_attr(get_post_meta($post->ID, 'ale_counter_value_3', true)); ?></h2>
  <?php } ?>

  <?php if(get_post_meta($post->ID, 'ale_counter_title_3', true)){ ?>
    <p><?php echo esc_attr(get_post_meta($post->ID, 'ale_counter_title_3', true)); ?></p>
  <?php } ?>
</div>

<div class="count">
 <?php if(get_post_meta($post->ID, 'ale_counter_value_4', true)){ ?>
  <h2 class="count_number"><?php echo esc_attr(get_post_meta($post->ID, 'ale_counter_value_4', true)); ?></h2>
<?php } ?>

<?php if(get_post_meta($post->ID, 'ale_counter_title_4', true)){ ?>
  <p><?php echo esc_attr(get_post_meta($post->ID, 'ale_counter_title_4', true)); ?></p>
<?php } ?>
</div>
</div>
</section>



<!--Discover Store Section-->

<section class="discover_store">
  <div class="discover_store_wrapper">

    <?php if(get_post_meta($post->ID, 'ale_faq_title', true)){ ?>
      <h3><?php echo esc_attr(get_post_meta($post->ID, 'ale_faq_title', true)); ?></h3>
    <?php } ?>

    <?php if(get_post_meta($post->ID, 'ale_faq_description', true)){ ?>
      <p><?php echo esc_attr(get_post_meta($post->ID, 'ale_faq_description', true)); ?></p>
    <?php } ?>

  </div>
</section>
<!-- /.discover_store -->

<!--Frequently Asked Questions-->

<section class="faq">
  <div class="faq_wrapper">
    <div class="accordion">

     <?php if(get_post_meta($post->ID, 'ale_faq_question_1', true)){ ?>
      <h5><a href="#"><?php echo esc_attr(get_post_meta($post->ID, 'ale_faq_question_1', true)); ?></a></h5>
    <?php } ?>
    <div class="inner">

      <?php if(get_post_meta($post->ID, 'ale_faq_answer_1', true)){ ?>
        <p><?php echo esc_attr(get_post_meta($post->ID, 'ale_faq_answer_1', true)); ?></p>
      <?php } ?>
    </div>
    
    <?php if(get_post_meta($post->ID, 'ale_faq_question_2', true)){ ?>
      <h5><a href="#"><?php echo esc_attr(get_post_meta($post->ID, 'ale_faq_question_2', true)); ?></a></h5>
    <?php } ?>
    <div class="inner">
      <?php if(get_post_meta($post->ID, 'ale_faq_answer_2', true)){ ?>
        <p><?php echo esc_attr(get_post_meta($post->ID, 'ale_faq_answer_2', true)); ?></p>
      <?php } ?>
    </div>

    <?php if(get_post_meta($post->ID, 'ale_faq_question_3', true)){ ?>
      <h5><a href="#"><?php echo esc_attr(get_post_meta($post->ID, 'ale_faq_question_3', true)); ?></a></h5>
    <?php } ?>
    <div class="inner">
      <?php if(get_post_meta($post->ID, 'ale_faq_answer_3', true)){ ?>
        <p><?php echo esc_attr(get_post_meta($post->ID, 'ale_faq_answer_3', true)); ?></p>
      <?php } ?>
    </div>

    <?php if(get_post_meta($post->ID, 'ale_faq_question_4', true)){ ?>
      <h5><a href="#"><?php echo esc_attr(get_post_meta($post->ID, 'ale_faq_question_4', true)); ?></a></h5>
    <?php } ?>
    <div class="inner">
      <?php if(get_post_meta($post->ID, 'ale_faq_answer_4', true)){ ?>
        <p><?php echo esc_attr(get_post_meta($post->ID, 'ale_faq_answer_4', true)); ?></p>
      <?php } ?>
    </div>

    <?php if(get_post_meta($post->ID, 'ale_faq_question_5', true)){ ?>
      <h5><a href="#"><?php echo esc_attr(get_post_meta($post->ID, 'ale_faq_question_5', true)); ?></a></h5>
    <?php } ?>
    <div class="inner">
      <?php if(get_post_meta($post->ID, 'ale_faq_answer_5', true)){ ?>
        <p><?php echo esc_attr(get_post_meta($post->ID, 'ale_faq_answer_5', true)); ?></p>
      <?php } ?>
    </div>

    <?php if(get_post_meta($post->ID, 'ale_faq_question_6', true)){ ?>
      <h5><a href="#"><?php echo esc_attr(get_post_meta($post->ID, 'ale_faq_question_6', true)); ?></a></h5>
    <?php } ?>
    <div class="inner">
      <?php if(get_post_meta($post->ID, 'ale_faq_answer_6', true)){ ?>
        <p><?php echo esc_attr(get_post_meta($post->ID, 'ale_faq_answer_6', true)); ?></p>
      <?php } ?>
    </div>

    <?php if(get_post_meta($post->ID, 'ale_faq_question_7', true)){ ?>
      <h5><a href="#"><?php echo esc_attr(get_post_meta($post->ID, 'ale_faq_question_7', true)); ?></a></h5>
    <?php } ?>
    <div class="inner">
      <?php if(get_post_meta($post->ID, 'ale_faq_answer_7', true)){ ?>
        <p><?php echo esc_attr(get_post_meta($post->ID, 'ale_faq_answer_7', true)); ?></p>
      <?php } ?>
    </div>

    <?php if(get_post_meta($post->ID, 'ale_faq_question_8', true)){ ?>
      <h5><a href="#"><?php echo esc_attr(get_post_meta($post->ID, 'ale_faq_question_8', true)); ?></a></h5>
    <?php } ?>
    <div class="inner">
      <?php if(get_post_meta($post->ID, 'ale_faq_answer_8', true)){ ?>
        <p><?php echo esc_attr(get_post_meta($post->ID, 'ale_faq_answer_8', true)); ?></p>
      <?php } ?>
    </div>

  </div>
</div>
</section>


<?php get_footer(); ?>


