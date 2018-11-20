<?php
/*Template name: About
*/
?>

<?php get_header(); ?>

<!--Breadcrumbs-->

	<section class="breadcrumbs" data-type="background" style="background-image: url(img/blue-jeans-2160265_1920.jpg); background-color: rgba(0, 0, 0, 0.9);">	
	<h3>About Us</h3>
  <h6><i class="fas fa-home"></i>Home<i class="fas fa-angle-right"></i>About</h6>
	</section>
<!-- /.breadcrumbs -->


	<div class="search_overlay">
		<i class="fas fa-times close_button"></i>
		<div class="search_input">
			<input type="text" name="" placeholder="Search...">
		</div>
	</div>
	<!-- /#search_nav -->

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


        <a href="#" class="button">
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
      <div class="image_holder">
        <img src="img/0436_1083_447_f.jpg" alt="Jeans">
      </div>

      <div class="image_holder">
        <img src="img/0436_1083_447_of.jpg" alt="Jeans">
      </div>

      <div class="image_holder">
        <img src="img/0166352461_1_1_3.jpg" alt="Jeans">
      </div>

    </div>
    <div class="slider_info">
      <div class="slider_info_inner">
        <img src="img/gear.png" class="animated infinite pulse" alt="about">
          <h6>Highest Quality</h6>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo, cumque sed repellendus?</p>
      </div>
    
      <div class="slider_info_inner">
        <img src="img/famous.png" class="animated infinite pulse" alt="about">
          <h6>Famous Brands</h6>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo, cumque sed repellendus?</p>
      </div>
    </div>

    <div class="slider_info">

      <div class="slider_info_inner">
        <img src="img/charity.png" class="animated infinite pulse" alt="about">
          <h6>Satisfied Customers</h6>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo, cumque sed repellendus?</p>
      </div>
    
      <div class="slider_info_inner">
        <img src="img/sales.png" class="animated infinite pulse" alt="about">
          <h6>Exclusive Offers</h6>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo, cumque sed repellendus?</p>
      </div>

    </div>

  </div>
</section>

<!--Counter Section-->

  <section class="counter">
    <div class="counter_wrapper">
      <div class="count">
      <h2 class="count_number">125</h2>
      <p>Items of wine</p>
      </div>
      <div class="count">
      <h2 class="count_number">854</h2>
      <p>Bottles of wine</p>
      </div>
      <div class="count">
      <h2 class="count_number">5416</h2>
      <p>Litres of wine</p>
      </div>
      <div class="count">
      <h2 class="count_number">7525</h2>
      <p>Happy customer</p>
      </div>
    </div>
  </section>



<!--Discover Store Section-->

  <section class="discover_store">
    <div class="discover_store_wrapper">
      <h3>Frequently asked questions</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos, rem unde aliquid itaque culpa eveniet ducimus, amet possimus tenetur ratione quo hic nam sit assumenda fuga reprehenderit officia ipsum deserunt!</p>
    </div>
  </section>
  <!-- /.discover_store -->

  <!--Frequently Asked Questions-->

  <section class="faq">
    <div class="faq_wrapper">
      <div class="accordion">
        <h5><a href="#">General</a></h5>
        <div class="inner">
          <p>An mel sumo libris assentior. Quando dicant legimus sea ea, diam convenire forensibus ad pri, mea voluptua scripserit ex. In accumsan delicata sit. Usu munere eripuit indoctum id. Has putent adversarium an, illum melius option ut ius. Mel ne aeque nonumy, stet exerci qualisque quo in.</p>
        </div>
  
        <h5><a href="#">Advanced</a></h5>
        <div class="inner">
          <p>An mel sumo libris assentior. Quando dicant legimus sea ea, diam convenire forensibus ad pri, mea voluptua scripserit ex. In accumsan delicata sit. Usu munere eripuit indoctum id. Has putent adversarium an, illum melius option ut ius. Mel ne aeque nonumy, stet exerci qualisque quo in.</p>
        </div>

        <h5><a href="#">General</a></h5>
        <div class="inner">
          <p>An mel sumo libris assentior. Quando dicant legimus sea ea, diam convenire forensibus ad pri, mea voluptua scripserit ex. In accumsan delicata sit. Usu munere eripuit indoctum id. Has putent adversarium an, illum melius option ut ius. Mel ne aeque nonumy, stet exerci qualisque quo in.</p>
        </div>

        <h5><a href="#">General</a></h5>
        <div class="inner">
          <p>An mel sumo libris assentior. Quando dicant legimus sea ea, diam convenire forensibus ad pri, mea voluptua scripserit ex. In accumsan delicata sit. Usu munere eripuit indoctum id. Has putent adversarium an, illum melius option ut ius. Mel ne aeque nonumy, stet exerci qualisque quo in.</p>
        </div>

        <h5><a href="#">General</a></h5>
        <div class="inner">
          <p>An mel sumo libris assentior. Quando dicant legimus sea ea, diam convenire forensibus ad pri, mea voluptua scripserit ex. In accumsan delicata sit. Usu munere eripuit indoctum id. Has putent adversarium an, illum melius option ut ius. Mel ne aeque nonumy, stet exerci qualisque quo in.</p>
        </div>

        <h5><a href="#">General</a></h5>
        <div class="inner">
          <p>An mel sumo libris assentior. Quando dicant legimus sea ea, diam convenire forensibus ad pri, mea voluptua scripserit ex. In accumsan delicata sit. Usu munere eripuit indoctum id. Has putent adversarium an, illum melius option ut ius. Mel ne aeque nonumy, stet exerci qualisque quo in.</p>
        </div>

        <h5><a href="#">General</a></h5>
        <div class="inner">
          <p>An mel sumo libris assentior. Quando dicant legimus sea ea, diam convenire forensibus ad pri, mea voluptua scripserit ex. In accumsan delicata sit. Usu munere eripuit indoctum id. Has putent adversarium an, illum melius option ut ius. Mel ne aeque nonumy, stet exerci qualisque quo in.</p>
        </div>

        <h5><a href="#">General</a></h5>
        <div class="inner">
          <p>An mel sumo libris assentior. Quando dicant legimus sea ea, diam convenire forensibus ad pri, mea voluptua scripserit ex. In accumsan delicata sit. Usu munere eripuit indoctum id. Has putent adversarium an, illum melius option ut ius. Mel ne aeque nonumy, stet exerci qualisque quo in.</p>
        </div>

      </div>
    </div>
  </section>


  <?php get_footer(); ?>


