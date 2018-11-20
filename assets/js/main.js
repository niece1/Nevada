$(document).ready(function(){

  //Navigation menu scripts

   // If a link has a dropdown, add sub menu toggle.
   $('nav ul li a:not(:only-child)').click(function(e) {
    $(this).siblings('.nav-dropdown').toggle();

    // Close one dropdown when selecting another
    $('.nav-dropdown').not($(this).siblings()).hide();
    e.stopPropagation();
   });

   // Clicking away from dropdown will remove the dropdown class
   $('html').click(function() {
     $('.nav-dropdown').hide();
   });

   // Toggle open and close nav styles on click
   $('#nav-toggle').click(function() {
     $('nav ul').slideToggle();
   });

   // Hamburger to X toggle
   $('#nav-toggle').on('click', function() {
     this.classList.toggle('active');
   });

  //Fullscreen search menu

   $('#search').click(function() {
     $('.search_overlay').animate({top: "0px"}, 500);
    });

   $('.close_button').click(function() {
     $('.search_overlay').animate({top: "-100vh"}, 500);
   });


//Parallax
    var $window = $(window);
    if($('section[data-type="background"]').length){
        $('section[data-type="background"]').each(function(){

            var $obj = $(this);
            var offset = $obj.offset().top;

            $(window).scroll(function()
            {
                offset = $obj.offset().top;

                if ($window.scrollTop() > (offset - window.innerHeight))
                {
                    var yPos = -(($window.scrollTop() - offset) / 2 );
                    var coords = '50% ' + ( yPos ) + 'px';
                    $obj.css({ backgroundPosition:  coords });
                }
            });
            $(window).resize(function()
            {
                offset = $obj.offset().top;
            });
        });
    }
   
   

//Sticky Navigation

    $(window).scroll(function(event) {
      if($(this).scrollTop() > 400) {
      $(".navigation").fadeIn();
      $(".navigation").addClass('fixed');
    }
    else {
      $(".navigation").removeClass('fixed')
    }
    });

   // Button Up
    var $btnUp = $(".btn-up")
    $(window).on("scroll", function(){
      if ($(window).scrollTop()>= 500){
        $btnUp.fadeIn();
      }else{
        $btnUp.fadeOut();
      }
    });
    $btnUp.on("click", function(){
      $("html,body").animate({scrollTop:0}, 900)
    });

    //Slick Slider 

$(".vertical_slider").slick({
  infinite:true,
  draggable: true,
  fade: true,
  dots: true,
  autoplay: true,
  slidesToShow: 1,
  slidesToScroll: 1,
  speed: 3000,
  autoplaySpeed: 4000,
  pauseOnDotsHover:true,
  pauseOnHover:false,
  
  
});

 $(".brands_wrapper").slick({
  infinite:true,
  arrows: false,
  autoplay: true,
  slidesToShow: 6,
  slidesToScroll: 1,
  speed: 1000,
  autoplaySpeed: 2000,
  pauseOnHover: false,
  responsive: [
    {
      breakpoint: 1000,
      settings: {
        slidesToShow: 5,
        slidesToScroll: 1,
        infinite: true,
        
      }
    },
    {
      breakpoint: 800,
      settings: {
        slidesToShow: 4,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 650,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 450,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1,
        infinite: true,
        
      }
    },
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]
  
});

 // Accordion

  var allPanels = $('.accordion > .inner').hide();
  

  $('.accordion > h5 > a').click(function() {
     $(this).slideDown(500);
    $(this).toggleClass('selected');
  
 
    $(this).parent().next().slideToggle(function() { 

      });

    return false;
  });

}); // end DOM ready
