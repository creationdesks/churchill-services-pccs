<?php
/**
 * Plugin Name: posts slick slider
 * Description: Adds a posts slick slider where ever you want
 * Version: 1.0.0
 * Author: Gururaj Acharya
 * Author URI: https://creationdesks.com/
 * Text Domain: posts-slick-slider
 * Domain Path: /languages
 *
 * License: GPLv2 or later
 */

/**
 * Prevent direct access data leaks
 **/
if ( ! defined( 'ABSPATH' ) ) {
    exit; 
}

function scripts_adds_to_the_head() {
 
    //wp_enqueue_script('jquery');
 
	
    wp_register_script( 'slick-js', plugin_dir_url( __FILE__ ) . 'js/slick.min.js', array('jquery'),'',true  );
	wp_register_script( 'carousal-slick-js', plugin_dir_url( __FILE__ ) . 'js/carousel-slick.js', array('jquery'),'',true );
	wp_register_script( 'initialize-js', plugin_dir_url( __FILE__ ) . 'js/initialize.js', array('jquery'),'',true  );
    wp_register_style( 'custom-css', plugin_dir_url( __FILE__ ) . 'css/custom.css','','', 'screen');
	wp_register_style( 'slick-css', plugin_dir_url( __FILE__ ) . 'css/slick.min.css','','', 'screen' );
	
 
    wp_enqueue_script( 'slick-js' );
	wp_enqueue_script( 'carousel-slick-js' );
	wp_enqueue_script( 'initialize-js');
    wp_enqueue_style( 'slick-css' );
	wp_enqueue_style( 'custom-css');
 
}
 
add_action( 'wp_enqueue_scripts', 'scripts_adds_to_the_head' );

function new_excerpt_more($more) {
 global $post;
 return '<p class="read-more"><a class="moretag" 
 href="'. get_permalink($post->ID) . '">Read More</a></p>';
}
add_filter('excerpt_more', 'new_excerpt_more');

// shortcode to list all posts

function latest_posts_shortcode(  $atts, $content = null ) {
	
	extract(shortcode_atts(array(
		"image_size" 		=> 'full',
		"slidestoshow" 		=> '3',
		"slidestoscroll" 	=> '1',		
		"dots"     			=> 'true',
		"arrows"     		=> 'true',
		"autoplay"     		=> 'true',	
		"autoplay_interval" => '3000',
		"speed"             => '300',
		"centermode"        => 'false',	
		"variablewidth"    	=> 'false',
		"image_fit" 		=> 'true',
		"sliderheight"     	=> '',	
		"rtl"               => '',

	), $atts));

	
	$slidestoshow 		= !empty($slidestoshow) 			? $slidestoshow 				: 3;
	$slidestoscroll 	= !empty($slidestoscroll) 			? $slidestoscroll 				: 1;
	$show_content 		= ( $show_content == 'false' ) 		? false 						: true;	
	$dots 				= ( $dots == 'false' ) 				? 'false' 						: 'true';
	$arrows 			= ( $arrows == 'false' ) 			? 'false' 						: 'true';
	$autoplay 			= ( $autoplay == 'false' ) 			? 'false' 						: 'true';
	$autoplay_interval 	= (!empty($autoplay_interval)) 		? $autoplay_interval 			: 3000;
	$speed 				= (!empty($speed)) 					? $speed 						: 300;	
	$sliderheight 		= (!empty($sliderheight)) 			? $sliderheight 				: '';
	$slider_height_css 	= (!empty($sliderheight))			? "style='height:{$sliderheight}px;'" : '';
	$image_fit			= ( $image_fit == 'false' )			? 0                             : 1;
	$centermode 		= ( $centermode == 'false' ) 		? 'false' 						: 'true';
	$variablewidth 		= ( $variablewidth == 'false' ) 	? 'false' 						: 'true';
	$sliderimage_size 	= !empty($image_size) 				? $image_size 					: 'full';
	
	// For RTL
	if( empty($rtl) && is_rtl() ) {
		$rtl = 'true';
	} elseif ( $rtl == 'true' ) {
		$rtl = 'true';
	} else {
		$rtl = 'false';
	}
	
	// Taking some variables
	$image_fit_class = ( $image_fit ) 			? 'latest-image-fit'		: '';
	
	// Slider configuration
	$slider_conf = compact('slidestoshow','slidestoscroll','dots', 'arrows', 'autoplay', 'autoplay_interval', 'speed', 'rtl', 'centermode' , 'variablewidth');
	
	ob_start();
	
    $slick_query = new WP_Query( array(
        'post_type' => 'post',
		'posts_per_page' => -1,
        'order' => 'desc',
        'orderby' => 'date',
    ) );
    if ( $slick_query->have_posts() ) { ?>
	
	<div class="latest-slick-posts-wrp latest-clearfix"> 
	<div class="slider responsive latest-slick-posts latest-center latest-image-fit">							
       <?php while ( $slick_query->have_posts() ) : $slick_query->the_post(); ?>
		<div class="slider__item">
			<div class="slick-image-slide-wrap">
				<?php $slider_img= wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>
				<img src="<?php echo $slider_img[0]; ?>" alt="<?php the_title(); ?>" />
				<div class="slider-overlay">
					<div class="slider-content">
						<h2 class="slide-title"><?php the_title(); ?></h2>
						<div class="slick-slider-short-content">
							<p><?php echo the_excerpt(); ?></p>			
						</div>
						<?php 
						$post_length = get_the_excerpt( $length );
						if ( $post_length ){
							echo '';
						}else {
						 echo '<p class="read-more"><a href="' . get_permalink() . '" class="slider-readmore"></a></p>';
						 }?>
					</div>
				</div>
			</div>		
		</div>
		<?php endwhile;?>
		
	</div>
	<div class="latest-carousal-conf latest-hide" data-conf="<?php echo htmlspecialchars(json_encode($slider_conf)); ?>"></div>
	</div>	
	
		<?php wp_reset_postdata(); wp_reset_query(); ?>
			
    <?php return ob_get_clean();
    
    }
}

add_shortcode( 'latest-slick-posts', 'latest_posts_shortcode' );