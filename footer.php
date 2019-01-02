<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Nevada
 */
global $nevada_option;
?>

<!--Footer-->

<footer>
  <div class="footer_wrapper">
    <div class="footer_logo">
      <h3><a id="fl" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo('name'); ?></a></h3>
      
      <?php if($nevada_option['store-description']){ ?>
        <p><?php echo esc_attr($nevada_option['store-description']); ?></p>
      <?php } ?>

      <?php if($nevada_option['social-title']){ ?>
        <small><?php echo esc_attr($nevada_option['social-title']); ?></small><br>
      <?php } ?>

      <?php if($nevada_option['social-facebook']){ ?>
        <a href="<?php echo esc_attr($nevada_option['social-facebook']); ?>"><i class="fab fa-facebook-f"></i></a>
      <?php } ?>

      <?php if($nevada_option['social-twitter']){ ?>
        <a href="<?php echo esc_attr($nevada_option['social-twitter']); ?>"><i class="fab fa-twitter"></i></a>
      <?php } ?>

      <?php if($nevada_option['social-youtube']){ ?>
        <a href="<?php echo esc_attr($nevada_option['social-youtube']); ?>"><i class="fab fa-youtube"></i></a>
      <?php } ?>

      <?php if($nevada_option['social-instagram']){ ?>
        <a href="<?php echo esc_attr($nevada_option['social-instagram']); ?>"><i class="fab fa-instagram"></i></a>
      <?php } ?>

    </div>
    
    <div class="newsletter">
      <?php if($nevada_option['newsletter-title']){ ?>
        <h6><?php echo esc_attr($nevada_option['newsletter-title']); ?></h6>
      <?php } ?>

      <?php if($nevada_option['newsletter-entry_description'] && ['newsletter-description']){ ?>
        <p><span><?php echo esc_attr($nevada_option['newsletter-entry_description']); ?></span><?php echo esc_attr($nevada_option['newsletter-description']); ?></p>
      <?php } ?>

      <?php if($nevada_option['mail_title']){ ?>
        <small><?php echo esc_attr($nevada_option['mail_title']); ?></small><br>
      <?php } ?>
      <form action="https://nevada.us19.list-manage.com/subscribe/post" method="POST">
        <input type="hidden" name="u" value="36868ded834eb33118f98eb92">
        <input type="hidden" name="id" value="30fb87cbba">
        <input type="email" placeholder="Your email address" name="MERGE0" id="MERGE0" value=""><br>
        <button class="button" type="submit">Send</button>

      </form>
    </div>

    <div class="get_in_touch">
      <?php if($nevada_option['contacts_title']){ ?>
        <h6><?php echo esc_attr($nevada_option['contacts_title']); ?></h6>
      <?php } ?>

      
      <?php if($nevada_option['street_address']){ ?>
        <p><?php echo esc_attr($nevada_option['street_address']); ?></p>
      <?php } ?>

      
      <?php if($nevada_option['city_index']){ ?>
        <p><?php echo esc_attr($nevada_option['city_index']); ?></p>
      <?php } ?>

      
      <?php if($nevada_option['country']){ ?>
        <p><?php echo esc_attr($nevada_option['country']); ?></p>
      <?php } ?>
      
      <?php if($nevada_option['delivery_title']){ ?>
       <p><span><?php echo esc_attr($nevada_option['delivery_title']); ?></span></p>
     <?php } ?>

     <?php if($nevada_option['delivery_hours_1']){ ?>
      <p><?php echo esc_attr($nevada_option['delivery_hours_1']); ?></p>
    <?php } ?>

    <?php if($nevada_option['delivery_hours_2']){ ?>
      <p><?php echo esc_attr($nevada_option['delivery_hours_2']); ?></p>
    <?php } ?>

    <?php if($nevada_option['delivery_hours_3']){ ?>
      <p><?php echo esc_attr($nevada_option['delivery_hours_3']); ?></p>
    <?php } ?>

    <?php if($nevada_option['phone']){ ?>
     <p><i class="fas fa-mobile-alt"></i><?php echo esc_attr($nevada_option['phone']); ?></p>
   <?php } ?>
 </div>

 <div class="useful_links">
  <?php if($nevada_option['links_title']){ ?>
    <h6><?php echo esc_attr($nevada_option['links_title']); ?></h6>
  <?php } ?>
  
  <?php nevada_footer_menu(); ?>

</div>

</div>
</footer>

<button class="btn-up"><i class="fas fa-angle-up"></i></button>

<?php wp_footer(); ?>

</body>
</html>
