<?php
/*Template name: Home
*/
?>

<?php get_header(); ?>

<section class="parallax" data-type="background" style="background-image: url('<?php echo esc_attr(get_post_meta($post->ID, 'ale_file_upload_main_photo', true)); ?>'); background-position: center center; background-repeat: no-repeat; background-size: cover; background-attachment: fixed;">
  <div id="particles"></div>
  <div class="parallax_wrapper">

    
    <div class="parallax_title">
      <?php if(get_post_meta($post->ID, 'ale_main_title', true)){ ?>
        <h2><?php echo esc_attr(get_post_meta($post->ID, 'ale_main_title', true)); ?></h2>
      <?php } ?>
      
      <?php if(get_post_meta($post->ID, 'ale_main_description', true)){ ?>
        <h6><?php echo esc_attr(get_post_meta($post->ID, 'ale_main_description', true)); ?></h6>
      <?php } ?>

      <a href="/shop" class="button">
       <?php if(get_post_meta($post->ID, 'ale_main_button', true)){ ?>
        <?php echo esc_attr(get_post_meta($post->ID, 'ale_main_button', true)); ?>
      <?php } ?>
    </a>
  </div>
</div>
<!-- /.parallax -->
</section>

<section class="welcome">
  <div class="welcome_wrapper">
   <div class="item1">
    <?php if(get_post_meta($post->ID, 'ale_welcome_section_title_1', true)){ ?>
      <h6><?php echo esc_attr(get_post_meta($post->ID, 'ale_welcome_section_title_1', true)); ?></h6>
    <?php } ?>

    <?php if(get_post_meta($post->ID, 'ale_welcome_section_title_2', true)){ ?>
      <h3><?php echo esc_attr(get_post_meta($post->ID, 'ale_welcome_section_title_2', true)); ?></h3>
    <?php } ?>

    <?php if(get_post_meta($post->ID, 'ale_welcome_section_description', true)){ ?>
      <p><?php echo esc_attr(get_post_meta($post->ID, 'ale_welcome_section_description', true)); ?></p>
    <?php } ?>
  </div>

  <div class="item2">

    <?php if(get_post_meta($post->ID, 'ale_file_upload_icon_1', true)){ ?>
     <img src="<?php echo esc_attr(get_post_meta($post->ID, 'ale_file_upload_icon_1', true)); ?>" class="animated infinite pulse" alt="about">
   <?php } ?>
   
   <?php if(get_post_meta($post->ID, 'ale_icon_title_1', true)){ ?>
    <h6><?php echo esc_attr(get_post_meta($post->ID, 'ale_icon_title_1', true)); ?></h6>
  <?php } ?>

  <?php if(get_post_meta($post->ID, 'ale_icon_description_1', true)){ ?>
    <p><?php echo esc_attr(get_post_meta($post->ID, 'ale_icon_description_1', true)); ?></p>
  <?php } ?>

  <a href="/about" class="button">
   <?php if(get_post_meta($post->ID, 'ale_icon_button_1', true)){ ?>
    <?php echo esc_attr(get_post_meta($post->ID, 'ale_icon_button_1', true)); ?>
  <?php } ?>
</a>
</div>

<div class="item3">
 <?php if(get_post_meta($post->ID, 'ale_file_upload_icon_2', true)){ ?>
  <img src="<?php echo esc_attr(get_post_meta($post->ID, 'ale_file_upload_icon_2', true)); ?>" class="animated infinite pulse" alt="blog">
<?php } ?>

<?php if(get_post_meta($post->ID, 'ale_icon_title_2', true)){ ?>
  <h6><?php echo esc_attr(get_post_meta($post->ID, 'ale_icon_title_2', true)); ?></h6>
<?php } ?>

<?php if(get_post_meta($post->ID, 'ale_icon_description_2', true)){ ?>
  <p><?php echo esc_attr(get_post_meta($post->ID, 'ale_icon_description_2', true)); ?></p>
<?php } ?>

<a href="/blog" class="button">
 <?php if(get_post_meta($post->ID, 'ale_icon_button_2', true)){ ?>
  <?php echo esc_attr(get_post_meta($post->ID, 'ale_icon_button_2', true)); ?>
<?php } ?>
</a>
</div>

<div class="item4">
  <?php if(get_post_meta($post->ID, 'ale_file_upload_icon_3', true)){ ?>
    <img src="<?php echo esc_attr(get_post_meta($post->ID, 'ale_file_upload_icon_3', true)); ?>" class="animated infinite pulse" alt="shop">
  <?php } ?>
  
  <?php if(get_post_meta($post->ID, 'ale_icon_title_3', true)){ ?>
    <h6><?php echo esc_attr(get_post_meta($post->ID, 'ale_icon_title_3', true)); ?></h6>
  <?php } ?>

  <?php if(get_post_meta($post->ID, 'ale_icon_description_3', true)){ ?>
    <p><?php echo esc_attr(get_post_meta($post->ID, 'ale_icon_description_3', true)); ?></p>
  <?php } ?>

  <a href="/shop" class="button">
   <?php if(get_post_meta($post->ID, 'ale_icon_button_3', true)){ ?>
    <?php echo esc_attr(get_post_meta($post->ID, 'ale_icon_button_3', true)); ?>
  <?php } ?>
</a>
</div>
</div>
</section>
<!-- /.about -->

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

<!--Discover Store Section-->

<section class="discover_store">
  <div class="discover_store_wrapper">
    <h3>Discover our best wine items</h3>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos, rem unde aliquid itaque culpa eveniet ducimus, amet possimus tenetur ratione quo hic nam sit assumenda fuga reprehenderit officia ipsum deserunt!</p>
  </div>
</section>
<!-- /.discover_store -->

<!--Store Section-->

<section class="store">
  <div class="store_wrapper">

    <?php
    echo do_shortcode('[recent_products per_page="6" columns="3" orderby="rand" order="rand"]');
    ?>

    

  </div>
</section>
<!-- /.store -->

<!--Have Questions Section-->

<section class="have_questions" style="background-image: url('<?php echo esc_attr(get_post_meta($post->ID, 'ale_file_upload_have_questions_background', true)); ?>'); background-attachment: fixed;">
  <div class="have_questions_wrapper">
    <div class="question_part">
     
     <?php if(get_post_meta($post->ID, 'ale_have_questions_title', true)){ ?>
      <h2><?php echo esc_attr(get_post_meta($post->ID, 'ale_have_questions_title', true)); ?></h2>
    <?php } ?>

  </div>
  <div class="button_part">
   <a href="/contact" class="button">
     <?php if(get_post_meta($post->ID, 'ale_have_questions_button', true)){ ?>
      <?php echo esc_attr(get_post_meta($post->ID, 'ale_have_questions_button', true)); ?>
    <?php } ?>
  </a>
</div>
</div>
</section>

<!--People Introduction Section-->

<section class="discover_blog">
  <div class="discover_blog_wrapper">
    <?php if(get_post_meta($post->ID, 'ale_people_item_position_1', true)){ ?>
      <h3><?php echo esc_attr(get_post_meta($post->ID, 'ale_people_section_title', true)); ?></h3>
    <?php } ?>

    <?php if(get_post_meta($post->ID, 'ale_people_item_employee_name_1', true)){ ?>
      <p><?php echo esc_attr(get_post_meta($post->ID, 'ale_people_section_description', true)); ?></p>
    <?php } ?>

  </div>
</section>
<!-- /.discover_people -->

<!--People Section-->

<section class="people">
  <div class="people_wrapper">
    
    <div class="people_item card_item">

      <?php if(get_post_meta($post->ID, 'ale_file_upload_people_item_1', true)){ ?>
        <img src="<?php echo esc_attr(get_post_meta($post->ID, 'ale_file_upload_people_item_1', true)); ?>" alt="People">
      <?php } ?>

      <div class="info">
        <?php if(get_post_meta($post->ID, 'ale_people_item_position_1', true)){ ?>
          <h5><?php echo esc_attr(get_post_meta($post->ID, 'ale_people_item_position_1', true)); ?></h5>
        <?php } ?>
        
        <?php if(get_post_meta($post->ID, 'ale_people_item_employee_name_1', true)){ ?>
          <p><?php echo esc_attr(get_post_meta($post->ID, 'ale_people_item_employee_name_1', true)); ?></p>
        <?php } ?>

        <p class="info_social">

          <?php if(get_post_meta($post->ID, 'ale_people_item_facebook_1', true)){ ?>
            <a href="<?php echo esc_attr(get_post_meta($post->ID, 'ale_people_item_facebook_1', true)); ?>"><i class="fab fa-facebook-f"></i></a>
          <?php } ?>

          <?php if(get_post_meta($post->ID, 'ale_people_item_twitter_1', true)){ ?>
            <a href="<?php echo esc_attr(get_post_meta($post->ID, 'ale_people_item_twitter_1', true)); ?>"><i class="fab fa-twitter"></i></a>
          <?php } ?>

          <?php if(get_post_meta($post->ID, 'ale_people_item_instagram_1', true)){ ?>
            <a href="<?php echo esc_attr(get_post_meta($post->ID, 'ale_people_item_instagram_1', true)); ?>"><i class="fab fa-instagram"></i></a>
          <?php } ?>

          <?php if(get_post_meta($post->ID, 'ale_people_item_pinterest_1', true)){ ?>
            <a href="<?php echo esc_attr(get_post_meta($post->ID, 'ale_people_item_pinterest_1', true)); ?>"><i class="fab fa-pinterest-p"></i></a>
          <?php } ?>
        </p>
      </div>
    </div>

    <div class="people_item card_item">

      <?php if(get_post_meta($post->ID, 'ale_file_upload_people_item_2', true)){ ?>
        <img src="<?php echo esc_attr(get_post_meta($post->ID, 'ale_file_upload_people_item_2', true)); ?>" alt="People">
      <?php } ?>

      <div class="info">
        <?php if(get_post_meta($post->ID, 'ale_people_item_position_2', true)){ ?>
          <h5><?php echo esc_attr(get_post_meta($post->ID, 'ale_people_item_position_2', true)); ?></h5>
        <?php } ?>
        
        <?php if(get_post_meta($post->ID, 'ale_people_item_employee_name_2', true)){ ?>
          <p><?php echo esc_attr(get_post_meta($post->ID, 'ale_people_item_employee_name_2', true)); ?></p>
        <?php } ?>

        <p class="info_social">

          <?php if(get_post_meta($post->ID, 'ale_people_item_facebook_2', true)){ ?>
            <a href="<?php echo esc_attr(get_post_meta($post->ID, 'ale_people_item_facebook_2', true)); ?>"><i class="fab fa-facebook-f"></i></a>
          <?php } ?>

          <?php if(get_post_meta($post->ID, 'ale_people_item_twitter_2', true)){ ?>
            <a href="<?php echo esc_attr(get_post_meta($post->ID, 'ale_people_item_twitter_2', true)); ?>"><i class="fab fa-twitter"></i></a>
          <?php } ?>

          <?php if(get_post_meta($post->ID, 'ale_people_item_instagram_2', true)){ ?>
            <a href="<?php echo esc_attr(get_post_meta($post->ID, 'ale_people_item_instagram_2', true)); ?>"><i class="fab fa-instagram"></i></a>
          <?php } ?>

          <?php if(get_post_meta($post->ID, 'ale_people_item_pinterest_2', true)){ ?>
            <a href="<?php echo esc_attr(get_post_meta($post->ID, 'ale_people_item_pinterest_2', true)); ?>"><i class="fab fa-pinterest-p"></i></a>
          <?php } ?>
        </p>
      </div>
    </div>

    <div class="people_item card_item">

      <?php if(get_post_meta($post->ID, 'ale_file_upload_people_item_3', true)){ ?>
        <img src="<?php echo esc_attr(get_post_meta($post->ID, 'ale_file_upload_people_item_3', true)); ?>" alt="People">
      <?php } ?>

      <div class="info">
        <?php if(get_post_meta($post->ID, 'ale_people_item_position_3', true)){ ?>
          <h5><?php echo esc_attr(get_post_meta($post->ID, 'ale_people_item_position_3', true)); ?></h5>
        <?php } ?>
        
        <?php if(get_post_meta($post->ID, 'ale_people_item_employee_name_3', true)){ ?>
          <p><?php echo esc_attr(get_post_meta($post->ID, 'ale_people_item_employee_name_3', true)); ?></p>
        <?php } ?>

        <p class="info_social">

          <?php if(get_post_meta($post->ID, 'ale_people_item_facebook_3', true)){ ?>
            <a href="<?php echo esc_attr(get_post_meta($post->ID, 'ale_people_item_facebook_3', true)); ?>"><i class="fab fa-facebook-f"></i></a>
          <?php } ?>

          <?php if(get_post_meta($post->ID, 'ale_people_item_twitter_3', true)){ ?>
            <a href="<?php echo esc_attr(get_post_meta($post->ID, 'ale_people_item_twitter_3', true)); ?>"><i class="fab fa-twitter"></i></a>
          <?php } ?>

          <?php if(get_post_meta($post->ID, 'ale_people_item_instagram_3', true)){ ?>
            <a href="<?php echo esc_attr(get_post_meta($post->ID, 'ale_people_item_instagram_3', true)); ?>"><i class="fab fa-instagram"></i></a>
          <?php } ?>

          <?php if(get_post_meta($post->ID, 'ale_people_item_pinterest_3', true)){ ?>
            <a href="<?php echo esc_attr(get_post_meta($post->ID, 'ale_people_item_pinterest_3', true)); ?>"><i class="fab fa-pinterest-p"></i></a>
          <?php } ?>
        </p>
      </div>
    </div>

    <div class="people_item card_item">

      <?php if(get_post_meta($post->ID, 'ale_file_upload_people_item_4', true)){ ?>
        <img src="<?php echo esc_attr(get_post_meta($post->ID, 'ale_file_upload_people_item_4', true)); ?>" alt="People">
      <?php } ?>

      <div class="info">
        <?php if(get_post_meta($post->ID, 'ale_people_item_position_4', true)){ ?>
          <h5><?php echo esc_attr(get_post_meta($post->ID, 'ale_people_item_position_4', true)); ?></h5>
        <?php } ?>
        
        <?php if(get_post_meta($post->ID, 'ale_people_item_employee_name_4', true)){ ?>
          <p><?php echo esc_attr(get_post_meta($post->ID, 'ale_people_item_employee_name_4', true)); ?></p>
        <?php } ?>

        <p class="info_social">

          <?php if(get_post_meta($post->ID, 'ale_people_item_facebook_4', true)){ ?>
            <a href="<?php echo esc_attr(get_post_meta($post->ID, 'ale_people_item_facebook_4', true)); ?>"><i class="fab fa-facebook-f"></i></a>
          <?php } ?>

          <?php if(get_post_meta($post->ID, 'ale_people_item_twitter_4', true)){ ?>
            <a href="<?php echo esc_attr(get_post_meta($post->ID, 'ale_people_item_twitter_4', true)); ?>"><i class="fab fa-twitter"></i></a>
          <?php } ?>

          <?php if(get_post_meta($post->ID, 'ale_people_item_instagram_4', true)){ ?>
            <a href="<?php echo esc_attr(get_post_meta($post->ID, 'ale_people_item_instagram_4', true)); ?>"><i class="fab fa-instagram"></i></a>
          <?php } ?>

          <?php if(get_post_meta($post->ID, 'ale_people_item_pinterest_4', true)){ ?>
            <a href="<?php echo esc_attr(get_post_meta($post->ID, 'ale_people_item_pinterest_4', true)); ?>"><i class="fab fa-pinterest-p"></i></a>
          <?php } ?>
        </p>
      </div>
    </div>

  </div>
</section>

<!--Brands section-->

<section class="brands">
  <div class="brands_wrapper">
    <div class="brands_item">
      <?php if(get_post_meta($post->ID, 'ale_file_upload_brand_icon_1', true)){ ?>
        <img src="<?php echo esc_attr(get_post_meta($post->ID, 'ale_file_upload_brand_icon_1', true)); ?>" alt="Brand">
      <?php } ?>
      
    </div>

    <div class="services_item">
      <?php if(get_post_meta($post->ID, 'ale_file_upload_brand_icon_2', true)){ ?>
        <img src="<?php echo esc_attr(get_post_meta($post->ID, 'ale_file_upload_brand_icon_2', true)); ?>" alt="Brand">
      <?php } ?>
    </div>

    <div class="services_item">
      <?php if(get_post_meta($post->ID, 'ale_file_upload_brand_icon_3', true)){ ?>
        <img src="<?php echo esc_attr(get_post_meta($post->ID, 'ale_file_upload_brand_icon_3', true)); ?>" alt="Brand">
      <?php } ?>
    </div>

    <div class="services_item">
      <?php if(get_post_meta($post->ID, 'ale_file_upload_brand_icon_4', true)){ ?>
        <img src="<?php echo esc_attr(get_post_meta($post->ID, 'ale_file_upload_brand_icon_4', true)); ?>" alt="Brand">
      <?php } ?>
    </div>

    <div class="services_item">
      <?php if(get_post_meta($post->ID, 'ale_file_upload_brand_icon_5', true)){ ?>
        <img src="<?php echo esc_attr(get_post_meta($post->ID, 'ale_file_upload_brand_icon_5', true)); ?>" alt="Brand">
      <?php } ?>
    </div>

    <div class="services_item">
      <?php if(get_post_meta($post->ID, 'ale_file_upload_brand_icon_6', true)){ ?>
        <img src="<?php echo esc_attr(get_post_meta($post->ID, 'ale_file_upload_brand_icon_6', true)); ?>" alt="Brand">
      <?php } ?>
    </div>

    <div class="services_item">
      <?php if(get_post_meta($post->ID, 'ale_file_upload_brand_icon_7', true)){ ?>
        <img src="<?php echo esc_attr(get_post_meta($post->ID, 'ale_file_upload_brand_icon_7', true)); ?>" alt="Brand">
      <?php } ?>
    </div>
  </div>
</section>

<!--Video Section-->

<section class="video">
  <div class="video_wrapper">
    <div class="video_content">
      <div class="video_content_wrapper">
        <?php if(get_post_meta($post->ID, 'ale_youtube_title', true)){ ?>
          <h5><?php echo esc_attr(get_post_meta($post->ID, 'ale_youtube_title', true)); ?></h5>
        <?php } ?>

        <?php if(get_post_meta($post->ID, 'ale_youtube_subtitle', true)){ ?>
          <p><b><?php echo esc_attr(get_post_meta($post->ID, 'ale_youtube_subtitle', true)); ?></b></p>
        <?php } ?>

        <?php if(get_post_meta($post->ID, 'ale_youtube_description', true)){ ?>
          <p><?php echo esc_attr(get_post_meta($post->ID, 'ale_youtube_description', true)); ?></p>
        <?php } ?>
      </div>
    </div>
    <div class="youtube">
     <?php if(get_post_meta($post->ID, 'ale_youtube_content', true)){ ?>
      <iframe 
      src="<?php echo esc_attr(get_post_meta($post->ID, 'ale_youtube_content', true)); ?>" allowfullscreen frameborder="0">
    </iframe>
  <?php } ?>
</div>
</div>
</section>

<?php get_footer(); ?>





