/*
Author       : rasti
Template Name: rasti - Digital Agency WordPress Theme
Version      : 1.0
*/

(function($) {
	'use strict';
	
	jQuery(document).ready(function(){
	
	     /*START MENU JS*/
	      $('#navigation a[href*=#]:not([href=#])').on('click', function() {
            if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
              var target = $(this.hash);
              target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
              if (target.length) {
                $('html,body').animate({

                  scrollTop: (target.offset().top - 40)
                }, 1000);
                return false;
              }
            }
          });
			

		// jQuery Menu Nav
		jQuery('#mobile_menu nav').meanmenu({
			meanScreenWidth: "767",
			meanMenuContainer: ".menu_wrap",				
		});

		$(window).scroll(function() {
		  if ($(this).scrollTop() > 100) {
			$('.menu-top').addClass('menu-shrink');
		  } else {
			$('.menu-top').removeClass('menu-shrink');
		  }
		});

		/*END MENU JS*/ 
		

		

	}); 	

				
})(jQuery);


  

