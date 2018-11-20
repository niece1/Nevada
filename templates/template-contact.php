<?php
/*Template name: Contact
*/
?>
<?php get_header(); ?>
	<section class="breadcrumbs" data-type="background"  style="background-image: url(img/jeans-2406521_1920.jpg);">	
    <h3>Contact Us</h3>
  <h6><i class="fas fa-home"></i>Home<i class="fas fa-angle-right"></i>Contacts</h6>
	<!-- /.breacrumbs -->
	</section>

	<div class="search_overlay">
		<i class="fas fa-times close_button"></i>
		<div class="search_input">
			<input type="text" name="" placeholder="Search...">
		</div>
	</div>
	<!-- /#search_nav -->

<!--Contact Form Section-->

  <section class="contacts">
    <div class="contacts_wrapper">
      <div class="form">
        <h5>Contact us</h5>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorem, reiciendis, placeat. Ea maxime deserunt quidem, a asperiores consectetur autem animi.</p>
        <form action="#">
          
             <div class="input_styles">
              <input type="text" class="mat_input" id="name" placeholder="Name" >
              <span class="backgrounds"></span>
             </div>
              
            <div class="input_styles">
              <input type="email" class="mat_input" id="email" placeholder="Email" >
              <span class="backgrounds"></span>
            </div>
      
            <div class="input_styles">
              <input type="text" class="mat_input" id="message" placeholder="Message" >
              <span class="backgrounds"></span>
            </div>

        </form>
        <a href="#" class="button">Send</a>
      </div>

      <div class="store_address">
        <h5>Our store</h5>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas reiciendis nesciunt dolorum, deserunt itaque incidunt.</p>
        <p>Phone: <span class="address_details">+1 12 158 148</span></p>
        <p>Email: <span class="address_details">nevada@gmail.com</span></p>
        <p>Address: <span class="address_details">159 Barking Road, San Diego, CA 21012</span></p>
      </div>
    </div>
  </section>

  <section id="googleMap"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3358.426248955876!2d-117.10163848482053!3d32.67470908100293!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80d95239afe91d91%3A0x8291162b4695eccf!2s1200+Highland+Ave%2C+National+City%2C+CA+91950%2C+USA!5e0!3m2!1sen!2sua!4v1534687653411" width="100%" height="500" frameborder="0" style="border:0" allowfullscreen></iframe></section>

  <?php get_footer(); ?>