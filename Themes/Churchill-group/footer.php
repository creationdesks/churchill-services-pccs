<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WP_Bootstrap_4
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer text-center bg-white mt-4 text-muted">
		<section class="footer-widgets text-left">
			<div class="container-fluid">
				<div class="row">
					<?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
						<div class="col-lg-6 col-md-12">
							<aside class="widget-area footer-1-area mb-2">
								<?php dynamic_sidebar( 'footer-1' ); ?>
							</aside>
						</div>
					<?php endif; ?>

					<?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
						<div class="col">
							<aside class="widget-area footer-2-area mb-2">
								<?php dynamic_sidebar( 'footer-2' ); ?>
							</aside>
						</div>
					<?php endif; ?>

					<?php if ( is_active_sidebar( 'footer-3' ) ) : ?>
						<div class="col-lg-6 col-md-12">
							<aside class="widget-area footer-3-area mb-2">
								<?php dynamic_sidebar( 'footer-3' ); ?>
							</aside>
						</div>
					<?php endif; ?>

					<?php if ( is_active_sidebar( 'footer-4' ) ) : ?>
						<div class="col">
							<aside class="widget-area footer-4-area mb-2">
								<?php dynamic_sidebar( 'footer-4' ); ?>
							</aside>
						</div>
					<?php endif; ?>
				</div>
				<!-- /.row -->
			</div>
		</section>
		<section id="footer-contactinfo" class="row">
				<div class="vc_row wpb_row vc_row-fluid container vc_custom_layer vc_row-has-fill">
					<div class="contact-box wpb_column vc_column_container vc_col-sm-3 vc_col-xs-12 vc_col-has-fill">
						<div class="vc_column-inner vc_custom_blocks">
							<div class="wpb_wrapper">
								<h4 class="service-heading">Head office</h4>
								<p>First Floor, Cedar House<br>Parkland Square<br> 750a Capability Green<br>Luton<br>LU1 3LU</p>
								<p>Company Reg. No. 07317156</p>
							</div>
						</div>
					</div>
					<div class="contact-box wpb_column vc_column_container vc_col-sm-3 vc_col-xs-12">
						<div class="vc_column-inner vc_custom_blocks">
							<div class="wpb_wrapper">
								<h4 class="service-heading">London hub</h4>
								<p>167 Fleet Street<br>London<br>EC4A 2EA</p>
							</div>
						</div>
					</div>
					<div class="contact-box wpb_column vc_column_container vc_col-sm-3 vc_col-xs-12">
						<div class="vc_column-inner vc_custom_blocks">
							<div class="wpb_wrapper">
								<h4 class="service-heading">Northern hub</h4>
								<p>Suite B<br>The Exchange<br>Unit 5 Main gate<br>Team Valley<br>NE11 0BE</p>
						</div>
						</div>
					</div>
					<div class="contact-box wpb_column vc_column_container vc_col-sm-3 vc_col-xs-12 vc_col-has-fill">
						<div class="vc_column-inner vc_custom_blocks">
							<div class="wpb_wrapper">
								<h4 class="service-heading">Scotland hub</h4>
								<p>Suite 47<br>Grovewood Business Centre<br>Strathclyde Business Park<br>Bellshill<br>ML4 3NQ</p>
						</div>
						</div>
					</div>
				</div>
				<div class="vc_row wpb_row vc_row-fluid">
					<div class="vc_column-inner vc_custom_mapping">
						<div class="wpb_wrapper">
							<div class="contact-map-container map-toggle-on">
								<div id="" class="kd_map" style="position: relative; overflow: hidden;">
									<!--<iframe src="//www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2465.883637016444!2d-0.3471447645233491!3d51.826556104211235!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x48763848a1affec7%3A0xea52c45c74be3874!2sChurchill!5e0!3m2!1sen!2sin!4v1553694168184" width="100%" height="1000" frameborder="0" style="border:0;margin-top:-160px;" allowfullscreen></iframe> -->
									<img src="/wp-content/uploads/2021/11/googlemap.png" width="100%" height="100%">
								</div>
							</div>
						</div>
					</div>
				</div>
		</section>

		<div class="container-fluid footer-nav">
			<div class="row">
				<div class="col-lg-6 col-md-6">
				<a href="https://www.linkedin.com/" class="social-linkedin" target="_blank" rel="nofollow">
					<span>
					  	<i class="fa fa-linkedin" aria-hidden="true"></i>
					</span>
				</a>
				<a href="https://twitter.com/" class="social-twitter" target="_blank" rel="nofollow">
					<span>
						<i class="fa fa-twitter" aria-hidden="true"></i>
					</span>
				</a>
				</div>
				<div class="col-lg-6 col-md-6">
				<div class="site-info">
					<span>Copyright © 2022 </span><a href="<?php echo esc_url( '#' ); ?>">Churchill Group</a>
					<span class="sep"> | Powered by</span>
					<a href="<?php echo esc_url( '#' ); ?>" target="_blank">Skyline MicroSites</a>
				</div><!-- .site-info -->
				<nav id="site-navigation" class="navbar navbar-expand-lg navbar-dark">
						<?php
						wp_nav_menu( array(
							'theme_location'  => 'menu-4',
							'menu_id'         => 'footer-menu',
							'container'       => 'div',
							'container_class' => 'navbar-collapse',
							'container_id'    => 'secondary-menu-wrap',
							'menu_class'      => 'navbar-nav ml-auto',
							'fallback_cb'     => '__return_false',
							'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
							'depth'           => 2,
							'walker'          => new WP_bootstrap_4_walker_nav_menu()
						) );
					?>
				</nav><!-- /Navigation -->
				</div><!-- /column -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</footer><!-- #colophon -->
</div><!-- #page -->
<a id="back2Top" title="Back to top" href="#">&#10148;</a>
<?php wp_footer(); ?>
<!-- Forgot client password --> 
<script>
/*jQuery("#client_forgot").click(function(e){
	var error = "";
	e.preventDefault();
	if(jQuery("#sg-popup-content-wrapper-2635 input[name='user_username']:visible").val().trim().length) {
		jQuery.ajax({
			url: "",
			type: "POST",
			data: {
				what: "recover-client-pwd",
				action: "view",
				user: jQuery("#sg-popup-content-wrapper-2635 input[name='user_username']:visible").val() // 
			},
			success: function (data) {
				if(data == "no_email")
					error = 'It seems we do not have an email address for you, so we cannot send you a new password.<br>Please email <a href=""></a>';
				else if(data == "not_found")
					error = "We could not find this user in the Client Portal";
				else
					error = "An email has been sent to: "+data;

				// TODO: Show the error in a popup or the way you decide
				jQuery('div.error').html(error);
			}
		});
	}
	else{
		// TODO: If the username is empty, ask the user to enter first the username and then click on "I FORGOT MY PASSWORD"
		jQuery('div.error').html("Please enter first the username and then click on I FORGOT MY PASSWORD");
	}
});

jQuery(".help_button").click(function(){
	location.href = "/before-you-continue/employee-request";
});*/
</script>	
<script>
/*Scroll to top when arrow up clicked BEGIN*/
jQuery(window).scroll(function() {
    var height = jQuery(window).scrollTop();
    if (height > 100) {
        jQuery('#back2Top').fadeIn();
    } else {
        jQuery('#back2Top').fadeOut();
    }
});
jQuery(document).ready(function() {
    jQuery("#back2Top").click(function(event) {
        event.preventDefault();
        jQuery("html, body").animate({ scrollTop: 0 }, "slow");
        return false;
    });

});
 /*Scroll to top when arrow up clicked END*/
 </script>
 <script>
jQuery(document).ready(function($){

var myVar = setInterval(myTimer, 300);

function myTimer() { 
if(jQuery('.social-feed-container-8486 .col-md-6').length == 6){ 
	
	var newcontent = '<div class="text-center col-lg-6 col-xs-12"><div class="card"><div class="card-body"><a class="view-all" href="https://twitter.com/"><h2 class="card-title">VIEW ALL</h2></a></div></div></div>'	
	jQuery('div.grid-item.col-md-6:last').replaceWith(newcontent);
	
}
 }
 
function myStopFunction() {
  clearInterval(myVar);
} 

})
</script>
<script>
  jQuery(function () {
    jQuery('.trending-now-posts').marquee({
		duration: 40000,
		gap:0,
		delayBeforeStart: 0,
		direction: 'left',
		duplicated: true,
		pauseOnHover: true,
		startVisible: true
	});
  });
</script>
<script>
jQuery(document).ready(function($){

var worker = null;
var loaded = 0;
$('#counter').each(function(){
		$(this).prop('Counter',0).animate({
		Counter: $(this).text()
	}, {
        duration: 5000,
        easing: 'swing',
        step: function (now) {
            $(this).text(Math.ceil(now));
        }
    });
});
function increment() {
	//$('#counter').html(loaded+'000');
    $('#drink').css('top', (100-loaded*2.5)+'%');
    if(loaded==30) {
        loaded = 0;
	   stopLoading();
      // setTimeout(startLoading, 1500);
    }
    else loaded++;    
}

function startLoading() {
   worker = setInterval(increment, 150);
}
function stopLoading() {
   clearInterval(worker);
}

startLoading();
    
});
</script>
<script>
	jQuery(document).ready(function(){
		jQuery('#carousel_posts_block .owl-carousel').owlCarousel({
            loop:true,
			margin:5,
			dots: false,
            responsive:{
                0:{
                    items:1
				},
                600:{
                    items:2
                },
                1000:{
                    items:3
                }
            },
			nav:true
	    });
	});
</script>
<script>
jQuery(document).ready(function(){
	jQuery('#apprentices-postblock .owl-carousel').owlCarousel({
            loop:true,
            nav:true,
            items:1,
            dots: false,
			autoplay:true,
			autoplayTimeout:5000,
			autoplayHoverPause:true
	});
});
	jQuery(document).ready(function(){
		jQuery('#slider-postblock .owl-carousel').owlCarousel({
            loop:true,
            nav:true,
            items:1,
            dots: false,
			autoplay:true,
			autoplayTimeout:5000,
			autoplayHoverPause:true
	});
});
</script>
 <script>
jQuery(document).ready(function($) {
            $('.product__slider-main').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: false,
                autoplay: false,
                lazyLoad: 'ondemand',
                autoplaySpeed: 3000,
                asNavFor: '.product__slider-thmb'
            });

            $('.product__slider-thmb').slick({
                slidesToShow: 7,
                slidesToScroll: 1,
                lazyLoad: 'ondemand',
                asNavFor: '.product__slider-main',
                arrows: true,
				centerMode: false,
                focusOnSelect: true,
				variableWidth: false,
				autoplay: false,
				responsive: [{
                            breakpoint: 1950,
                            settings: {
                                slidesToShow: 7,
                                slidesToScroll: 1,
								autoplay: true
                            }
                        },
						{
                            breakpoint: 1441,
                            settings: {
                                slidesToShow: 7,
                                slidesToScroll: 1,
								autoplay: true
                            }
                        },
                        {
                            breakpoint: 1281,
                            settings: {
                                slidesToShow: 7,
                                slidesToScroll: 1,
								autoplay: true
                            }
                        },
                        {
                            breakpoint: 1025,
                            settings: {
                                slidesToShow: 4,
                                slidesToScroll: 1,
								autoplay: true,
                            }
                        },
                        {
                            breakpoint: 801,
                            settings: {
                                slidesToShow: 2,
                                slidesToScroll: 1,
								autoplay: true
                            }
                        },
                        {
                            breakpoint: 600,
                            settings: {
                                slidesToShow: 2,
                                slidesToScroll: 1,
								autoplay: true
                            }
                        },
                        {
                            breakpoint: 481,
                            settings: {
                                slidesToShow: 1,
                                slidesToScroll: 1,
								centerMode: true,
								autoplay: true
                            }
                        }]
            });

 //remove active class from all thumbnail slides
 $('.product__slider-thmb .slick-slide').removeClass('slick-active');

 //set active class to first thumbnail slides
 $('.product__slider-thmb .slick-slide').eq(0).addClass('slick-active');

 // On before slide change match active thumbnail to current slide
 $('.product__slider-main').on('beforeChange', function (event, slick, currentSlide, nextSlide) {
 	var mySlideNumber = nextSlide;
 	$('.product__slider-thmb .slick-slide').removeClass('slick-active');
 	$('.product__slider-thmb .slick-slide').eq(mySlideNumber).addClass('slick-active');
});
  
});
</script>
 </body>
</html>
