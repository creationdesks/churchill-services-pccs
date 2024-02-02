<?php 
	 add_action( 'wp_enqueue_scripts', 'churchill_group_enqueue_styles' );
	 function churchill_group_enqueue_styles() {
 		 		 
		 // enqueue parent styles
			wp_enqueue_style('parent-style', get_template_directory_uri() .'/style.css');
			
	
		// enqueue child styles
			wp_enqueue_style('animate', get_stylesheet_directory_uri() . '/assets/css/animate/animate.css');
			wp_enqueue_style('owl-carousel', get_stylesheet_directory_uri() . '/assets/css/owl/owl.carousel.css');
			wp_enqueue_style('owl-theme', get_stylesheet_directory_uri() . '/assets/css/owl/owl.theme.default.css');
			wp_enqueue_style('marquee-style', get_stylesheet_directory_uri() .'/assets/css/marquee.css');
			wp_enqueue_style( 'slick-style', get_stylesheet_directory_uri() . '/assets/css/slick.css');
			wp_enqueue_style('child-style', get_stylesheet_directory_uri() .'/style.css', array('parent-style'));
		 
		 	wp_enqueue_style( 'google-fonts-poppins', 'https://fonts.googleapis.com/css?family=Poppins:400,700,900', true ); 
			wp_enqueue_style( 'google-fonts-ubuntu', 'https://fonts.googleapis.com/css?family=Ubuntu:300,400,500,700', true );
			wp_enqueue_style( 'google-fonts-lato', 'https://fonts.googleapis.com/css?family=Lato:300,400,700', true );
			wp_enqueue_style( 'google-fonts-muli', 'https://fonts.googleapis.com/css?family=Muli:300,400,600,700&display=swap', true );
			wp_enqueue_style( 'google-fonts-alex-brush', 'https://fonts.googleapis.com/css?family=Alex+Brush&display=swap&subset=latin-ext', true);
			wp_enqueue_style( 'load-fa', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css', true);
			wp_enqueue_style( 'font-awesome', 'https://use.fontawesome.com/releases/v5.6.3/css/all.css', true);	
			
			//wp_enqueue_script( 'jquery.backstretch', get_stylesheet_directory_uri() . '/assets/js/jquery.backstretch.min.js', array('jquery'), '0.1', true );
			wp_enqueue_script( 'owl-carousel', get_stylesheet_directory_uri() . '/assets/js/owl/owl.carousel.js', array('jquery'), '', true );
			wp_enqueue_script( 'marquee', get_stylesheet_directory_uri() . '/assets/js/marquee/jquery.marquee.js', array('jquery'), '', true );
			wp_enqueue_script('matchheight', get_stylesheet_directory_uri() . '/assets/js/jquery-match-height/jquery.matchHeight.js', array('jquery'), '', true);
			wp_enqueue_script( 'slick', get_stylesheet_directory_uri() . '/assets/js/slick.min.js', array('jquery'), '1.8.1', true );
			//wp_enqueue_script( 'my_app_script', get_stylesheet_directory_uri() .'/assets/js/app.js', array('jquery'), '1.0', true );
		  } 
	
/**
 * for new excerpt limitation on custom page template
 **/
	function excerpt($limit) {
      $excerpt = explode(' ', get_the_excerpt(), $limit);
      if (count($excerpt)>=$limit) {
        array_pop($excerpt);
        $excerpt = implode(" ",$excerpt).'...';
      } else {
        $excerpt = implode(" ",$excerpt);
      } 
      $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
      return $excerpt;
    }

    function content($limit) {
      $content = explode(' ', get_the_content(), $limit);
      if (count($content)>=$limit) {
        array_pop($content);
        $content = implode(" ",$content).'...';
      } else {
        $content = implode(" ",$content);
      } 
      $content = preg_replace('/\[.+\]/','', $content);
      $content = apply_filters('the_content', $content); 
      $content = str_replace(']]>', ']]&gt;', $content);
      return $content;
    }

/**
 * Plugin class for post category image display on archive pages
 **/
if ( ! class_exists( 'CT_TAX_META' ) ) {

class CT_TAX_META {

  public function __construct() {
    //
  }
 
 /*
  * Initialize the class and start calling our hooks and filters
  * @since 1.0.0
 */
 public function init() {
   add_action( 'category_add_form_fields', array ( $this, 'add_category_image' ), 10, 2 );
   add_action( 'created_category', array ( $this, 'save_category_image' ), 10, 2 );
   add_action( 'category_edit_form_fields', array ( $this, 'update_category_image' ), 10, 2 );
   add_action( 'edited_category', array ( $this, 'updated_category_image' ), 10, 2 );
   add_action( 'admin_enqueue_scripts', array( $this, 'load_media' ) );
   add_action( 'admin_footer', array ( $this, 'add_script' ) );
 }

public function load_media() {
 wp_enqueue_media();
}
 
 /*
  * Add a form field in the new category page
  * @since 1.0.0
 */
 public function add_category_image ( $taxonomy ) { ?>
   <div class="form-field term-group">
     <label for="category-image-id"><?php _e('Image', 'hero-theme'); ?></label>
     <input type="hidden" id="category-image-id" name="category-image-id" class="custom_media_url" value="">
     <div id="category-image-wrapper"></div>
     <p>
       <input type="button" class="button button-secondary ct_tax_media_button" id="ct_tax_media_button" name="ct_tax_media_button" value="<?php _e( 'Add Image', 'hero-theme' ); ?>" />
       <input type="button" class="button button-secondary ct_tax_media_remove" id="ct_tax_media_remove" name="ct_tax_media_remove" value="<?php _e( 'Remove Image', 'hero-theme' ); ?>" />
    </p>
   </div>
 <?php
 }
 
 /*
  * Save the form field
  * @since 1.0.0
 */
 public function save_category_image ( $term_id, $tt_id ) {
   if( isset( $_POST['category-image-id'] ) && '' !== $_POST['category-image-id'] ){
     $image = $_POST['category-image-id'];
     add_term_meta( $term_id, 'category-image-id', $image, true );
   }
 }
 
 /*
  * Edit the form field
  * @since 1.0.0
 */
 public function update_category_image ( $term, $taxonomy ) { ?>
   <tr class="form-field term-group-wrap">
     <th scope="row">
       <label for="category-image-id"><?php _e( 'Image', 'hero-theme' ); ?></label>
     </th>
     <td>
       <?php $image_id = get_term_meta ( $term -> term_id, 'category-image-id', true ); ?>
       <input type="hidden" id="category-image-id" name="category-image-id" value="<?php echo $image_id; ?>">
       <div id="category-image-wrapper">
         <?php if ( $image_id ) { ?>
           <?php echo wp_get_attachment_image ( $image_id, 'thumbnail' ); ?>
         <?php } ?>
       </div>
       <p>
         <input type="button" class="button button-secondary ct_tax_media_button" id="ct_tax_media_button" name="ct_tax_media_button" value="<?php _e( 'Add Image', 'hero-theme' ); ?>" />
         <input type="button" class="button button-secondary ct_tax_media_remove" id="ct_tax_media_remove" name="ct_tax_media_remove" value="<?php _e( 'Remove Image', 'hero-theme' ); ?>" />
       </p>
     </td>
   </tr>
 <?php
 }

/*
 * Update the form field value
 * @since 1.0.0
 */
 public function updated_category_image ( $term_id, $tt_id ) {
   if( isset( $_POST['category-image-id'] ) && '' !== $_POST['category-image-id'] ){
     $image = $_POST['category-image-id'];
     update_term_meta ( $term_id, 'category-image-id', $image );
   } else {
     update_term_meta ( $term_id, 'category-image-id', '' );
   }
 }

/*
 * Add script
 * @since 1.0.0
 */
 public function add_script() { ?>
   <script>
     jQuery(document).ready( function($) {
       function ct_media_upload(button_class) {
         var _custom_media = true,
         _orig_send_attachment = wp.media.editor.send.attachment;
         $('body').on('click', button_class, function(e) {
           var button_id = '#'+$(this).attr('id');
           var send_attachment_bkp = wp.media.editor.send.attachment;
           var button = $(button_id);
           _custom_media = true;
           wp.media.editor.send.attachment = function(props, attachment){
             if ( _custom_media ) {
               $('#category-image-id').val(attachment.id);
               $('#category-image-wrapper').html('<img class="custom_media_image" src="" style="margin:0;padding:0;max-height:100px;float:none;" />');
               $('#category-image-wrapper .custom_media_image').attr('src',attachment.url).css('display','block');
             } else {
               return _orig_send_attachment.apply( button_id, [props, attachment] );
             }
            }
         wp.media.editor.open(button);
         return false;
       });
     }
     ct_media_upload('.ct_tax_media_button.button'); 
     $('body').on('click','.ct_tax_media_remove',function(){
       $('#category-image-id').val('');
       $('#category-image-wrapper').html('<img class="custom_media_image" src="" style="margin:0;padding:0;max-height:100px;float:none;" />');
     });
     // Thanks: http://stackoverflow.com/questions/15281995/wordpress-create-category-ajax-response
     $(document).ajaxComplete(function(event, xhr, settings) {
       var queryStringArr = settings.data.split('&');
       if( $.inArray('action=add-tag', queryStringArr) !== -1 ){
         var xml = xhr.responseXML;
         $response = $(xml).find('term_id').text();
         if($response!=""){
           // Clear the thumb image
           $('#category-image-wrapper').html('');
         }
       }
     });
   });
 </script>
 <?php }

  }
 
$CT_TAX_META = new CT_TAX_META();
$CT_TAX_META -> init();
 
}

// This theme uses wp_nav_menu() in one another location.
		register_nav_menus( array(
			'menu-2' => esc_html__( 'Secondary', 'wp-bootstrap-4' ),
			'menu-4' => esc_html__( 'footer', 'wp-bootstrap-4' ),
		) );

// Add a custom user role
add_role( 'site-manager', __('Site Manager' ), array( ) );
add_role( 'recruit_manager', __('Recruit Manager'), array( ) );

// prefix "category:" form category title
function prefix_category_title( $title ) {
    if ( is_category() ) {
        $title = single_cat_title( '', false );
    }
    return $title;
}
add_filter( 'get_the_archive_title', 'prefix_category_title' );

// shortcode to list all posts which come in (radish) catering page

add_shortcode( 'latest_posts_radish', 'latest_posts_radish_shortcode' );

function latest_posts_radish_shortcode( $atts ) {
    ob_start();
    $radish_query = new WP_Query( array(
        'post_type' => 'post',
		'category_name' => 'radish',
        'posts_per_page' => 5,
        'order' => 'desc',
        'orderby' => 'date',
    ) );
    if ( $radish_query->have_posts() ) { ?>
	<?php $i = 0; ?>
						<?php 
								$grid_classes = array(
										'w-0',
										'col-md-8 col-sm-6 col-xs-12 cbox-1',
										'col-md-4 col-sm-6 col-xs-12 cbox-2',
										'col-md-4 col-sm-6 col-xs-12 cbox-3',
										'col-md-4 col-sm-6 col-xs-12 cbox-4',
										'col-md-4 col-sm-6 col-xs-12 cbox-5',
									);
								?>
	<div class="gallery row">							
        <?php while ( $radish_query->have_posts() ) : $radish_query->the_post(); ?>
		<?php $i++; $i<0; $StyleClass = $grid_classes[$i]; ?>		
		<?php $bgImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>
            <div class="gallery-list <?php echo $StyleClass;?>">
				<div class="card" id="post-<?php the_ID(); ?>" style="background: linear-gradient(to right, rgba(0,0,0,.5), rgba(0,0,0,0.5), rgba(0,0,0,0.6)), url('<?php echo $bgImg[0]; ?>') no-repeat;">
					<div class="card-body">
						<?php echo do_shortcode("[featured-images]");?>
						<?php the_title( '<h2 class="card-title">', '</h2>' );?> 
						<p><?php echo excerpt(25);?></p>
						<br><div class="card-btn"><a class="btn-d radish-btn" href="<?php the_permalink(); ?>">VIEW</a></div>
					</div>
				</div>
			</div>
            <?php endwhile;?>
	</div>		
			<?php wp_reset_postdata(); wp_reset_query(); ?>
			
    <?php $myvariable = ob_get_clean();
    return $myvariable;
    }
}

// shortcode to list all posts which come in (amulet) security page

add_shortcode( 'latest_posts_amulet', 'latest_posts_amulet_shortcode2' );

function latest_posts_amulet_shortcode2( $atts ) {
    ob_start();
    $amulet_query = new WP_Query( array(
        'post_type' => 'post',
		'category_name' => 'amulet',
        'posts_per_page' => 5,
        'order' => 'desc',
        'orderby' => 'date',
    ) );
    if ( $amulet_query->have_posts() ) { ?>
	<?php $i = 0; ?>
						<?php 
								$col_classes = array(
										'w-0',
										'col-md-8 col-sm-6 col-xs-12 cbox-1',
										'col-md-4 col-sm-6 col-xs-12 cbox-2',
										'col-md-4 col-sm-6 col-xs-12 cbox-3',
										'col-md-4 col-sm-6 col-xs-12 cbox-4',
										'col-md-4 col-sm-6 col-xs-12 cbox-5',
									);
								?>
	<div class="gallery row">							
        <?php while ( $amulet_query->have_posts() ) : $amulet_query->the_post(); ?>
		<?php $i++; $i<0; $reqClass = $col_classes[$i]; ?>		
		<?php $featureImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>
            <div class="gallery-list <?php echo $reqClass;?>">
				<div class="card" id="post-<?php the_ID(); ?>" style="background: linear-gradient(to right, rgba(0,0,0,.5), rgba(0,0,0,0.5), rgba(0,0,0,0.6)), url('<?php echo $featureImg[0]; ?>') no-repeat;">
					<div class="card-body">
						<?php echo do_shortcode("[featured-images]");?>
						<?php the_title( '<h2 class="card-title">', '</h2>' );?> 
						<p><?php echo excerpt(25);?></p>
						<br><div class="card-btn"><a class="btn-d amulet-btn" href="<?php the_permalink(); ?>">VIEW</a></div>
					</div>
				</div>
			</div>
            <?php endwhile;?>
	</div>		
			<?php wp_reset_postdata(); wp_reset_query(); ?>
			
    <?php $amuletVariable = ob_get_clean();
    return $amuletVariable;
    }
}

// shortcode to list all posts which come in Portfolio page

add_shortcode( 'latest_posts_portfolio', 'latest_posts_portfolio_shortcode3' );

function latest_posts_portfolio_shortcode3( $atts ) {
    ob_start();
    $pfolio_query = new WP_Query( array(
        'post_type' => 'post',
		'category_name' => 'portfolio-by-churchill',
        'posts_per_page' => 5,
        'order' => 'desc',
        'orderby' => 'date',
    ) );
    if ( $pfolio_query->have_posts() ) { ?>
	<?php $i = 0; ?>
						<?php 
								$div_classes = array(
										'w-0',
										'col-md-8 col-sm-6 col-xs-12 cbox-1',
										'col-md-4 col-sm-6 col-xs-12 cbox-2',
										'col-md-4 col-sm-6 col-xs-12 cbox-3',
										'col-md-4 col-sm-6 col-xs-12 cbox-4',
										'col-md-4 col-sm-6 col-xs-12 cbox-5',
									);
								?>
	<div class="gallery row">							
        <?php while ( $pfolio_query->have_posts() ) : $pfolio_query->the_post(); ?>
		<?php $i++; $i<0; $latestClass = $div_classes[$i]; ?>		
		<?php $divgpImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>
            <div class="gallery-list <?php echo $latestClass;?>">
				<div class="card" id="post-<?php the_ID(); ?>" style="background: linear-gradient(to right, rgba(0,0,0,.5), rgba(0,0,0,0.5), rgba(0,0,0,0.6)), url('<?php echo $divgpImg[0]; ?>') no-repeat;">
					<div class="card-body">
						<?php echo do_shortcode("[featured-images]");?>
						<?php the_title( '<h2 class="card-title">', '</h2>' );?> 
						<p><?php echo excerpt(25);?></p>
						<br><div class="card-btn"><a class="btn-d portfolio-btn" href="<?php the_permalink(); ?>">VIEW</a></div>
					</div>
				</div>
			</div>
            <?php endwhile;?>
	</div>		
			<?php wp_reset_postdata(); 
			
			wp_reset_query(); ?>
			
    <?php $pfvariable = ob_get_clean();
    return $pfvariable;
    }
}

// shortcode to list all posts which come in cleaning page

add_shortcode( 'latest_posts_cleaning', 'latest_posts_cleaning_shortcod4' );

function latest_posts_cleaning_shortcod4( $atts ) {
    ob_start();
    $cleaning_query = new WP_Query( array(
        'post_type' => 'post',
		'category_name' => 'churchill-cleaning',
        'posts_per_page' => 5,
        'order' => 'desc',
        'orderby' => 'date',
    ) );
    if ( $cleaning_query->have_posts() ) { ?>
	<?php $i = 0; ?>
						<?php 
								$cl_classes = array(
										'w-0',
										'col-md-8 col-sm-6 col-xs-12 cbox-1',
										'col-md-4 col-sm-6 col-xs-12 cbox-2',
										'col-md-4 col-sm-6 col-xs-12 cbox-3',
										'col-md-4 col-sm-6 col-xs-12 cbox-4',
										'col-md-4 col-sm-6 col-xs-12 cbox-5',
									);
								?>
	<div class="gallery row">							
        <?php while ( $cleaning_query->have_posts() ) : $cleaning_query->the_post(); ?>
		<?php $i++; $i<0; $cleaningClass = $cl_classes[$i]; ?>		
		<?php $clgpImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>
            <div class="gallery-list <?php echo $cleaningClass;?>">
				<div class="card" id="post-<?php the_ID(); ?>" style="background: linear-gradient(to right, rgba(0,0,0,.5), rgba(0,0,0,0.5), rgba(0,0,0,0.6)), url('<?php echo $clgpImg[0]; ?>') no-repeat;">
					<div class="card-body">
						<?php echo do_shortcode("[featured-images]");?>
						<?php the_title( '<h2 class="card-title">', '</h2>' );?> 
						<p><?php echo excerpt(25);?></p>
						<br><div class="card-btn"><a class="btn-d cleaning-btn" href="<?php the_permalink(); ?>">VIEW</a></div>
					</div>
				</div>
			</div>
            <?php endwhile;?>
	</div>		
			<?php wp_reset_postdata(); 
			
			wp_reset_query(); ?>
			
    <?php $clvariable = ob_get_clean();
    return $clvariable;
    }
}

// shortcode to list all posts which come in environmental page

add_shortcode( 'latest_posts_environmental', 'latest_posts_environment_shortcod5' );

function latest_posts_environment_shortcod5( $atts ) {
    ob_start();
    $environmental_query = new WP_Query( array(
        'post_type' => 'post',
		'category_name' => 'churchill-environmental',
        'posts_per_page' => 5,
        'order' => 'desc',
        'orderby' => 'date',
    ) );
    if ( $environmental_query->have_posts() ) { ?>
	<?php $i = 0; ?>
						<?php 
								$env_classes = array(
										'w-0',
										'col-md-8 col-sm-6 col-xs-12 cbox-1',
										'col-md-4 col-sm-6 col-xs-12 cbox-2',
										'col-md-4 col-sm-6 col-xs-12 cbox-3',
										'col-md-4 col-sm-6 col-xs-12 cbox-4',
										'col-md-4 col-sm-6 col-xs-12 cbox-5',
									);
								?>
	<div class="gallery row">							
        <?php while ( $environmental_query->have_posts() ) : $environmental_query->the_post(); ?>
		<?php $i++; $i<0; $environmentalClass = $env_classes[$i]; ?>		
		<?php $envgpImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>
            <div class="gallery-list <?php echo $environmentalClass;?>">
				<div class="card" id="post-<?php the_ID(); ?>" style="background: linear-gradient(to right, rgba(0,0,0,.5), rgba(0,0,0,0.5), rgba(0,0,0,0.6)), url('<?php echo $envgpImg[0]; ?>') no-repeat;">
					<div class="card-body">
						<?php echo do_shortcode("[featured-images]");?>
						<?php the_title( '<h2 class="card-title">', '</h2>' );?> 
						<p><?php echo excerpt(25);?></p>
						<br><div class="card-btn"><a class="btn-d environmental-btn" href="<?php the_permalink(); ?>">VIEW</a></div>
					</div>
				</div>
			</div>
            <?php endwhile;?>
	</div>		
			<?php wp_reset_postdata(); 
			
			wp_reset_query(); ?>
			
    <?php $envVariable = ob_get_clean();
    return $envVariable;
    }
}

// shortcode to list all posts which come in ex-military page

add_shortcode( 'latest_posts_exmilitary', 'latest_posts_exmilitary_shortcod6' );

function latest_posts_exmilitary_shortcod6( $atts ) {
    ob_start();
    $exmilitary_query = new WP_Query( array(
        'post_type' => 'post',
		'category_name' => 'armed-forces',
        'posts_per_page' => 5,
        'order' => 'desc',
        'orderby' => 'date',
    ) );
    if ( $exmilitary_query->have_posts() ) { ?>
	<?php $i = 0; ?>
						<?php 
								$exm_classes = array(
										'w-0',
										'col-md-8 col-sm-6 col-xs-12 cbox-1',
										'col-md-4 col-sm-6 col-xs-12 cbox-2',
										'col-md-4 col-sm-6 col-xs-12 cbox-3',
										'col-md-4 col-sm-6 col-xs-12 cbox-4',
										'col-md-4 col-sm-6 col-xs-12 cbox-5',
									);
								?>
	<div class="gallery row">							
        <?php while ( $exmilitary_query->have_posts() ) : $exmilitary_query->the_post(); ?>
		<?php $i++; $i<0; $exmilitaryClass = $exm_classes[$i]; ?>		
		<?php $exmgpImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>
            <div class="gallery-list <?php echo $exmilitaryClass;?>">
				<div class="card" id="post-<?php the_ID(); ?>" style="background: linear-gradient(to right, rgba(0,0,0,.5), rgba(0,0,0,0.5), rgba(0,0,0,0.6)), url('<?php echo $exmgpImg[0]; ?>') no-repeat;">
					<div class="card-body">
						<?php echo do_shortcode("[featured-images]");?>
						<?php the_title( '<h2 class="card-title">', '</h2>' );?> 
						<p><?php echo excerpt(25);?></p>
						<br><div class="card-btn"><a class="btn-d environmental-btn" href="<?php the_permalink(); ?>">VIEW</a></div>
					</div>
				</div>
			</div>
            <?php endwhile;?>
	</div>		
			<?php wp_reset_postdata(); 
			
			wp_reset_query(); ?>
			
    <?php $exmVariable = ob_get_clean();
    return $exmVariable;
    }
}

// shortcode to list all posts which come with editors pick tag

add_shortcode( 'latest_posts_editorsPic', 'latest_editorspic_posts_shortcode' );

function latest_editorspic_posts_shortcode( $atts ) {
    ob_start();
    $editorspic_query = new WP_Query( array(
        'post_type' => 'post',
		'tag' => 'editors-pick',
        'posts_per_page' => 5,
        'order' => 'desc',
        'orderby' => 'date',
    ) );
    if ( $editorspic_query->have_posts() ) { ?>
	<?php $i = 0; ?>
						<?php 
								$edp_classes = array(
										'w-0',
										'col-md-8 col-sm-6 col-xs-12 cbox-1',
										'col-md-4 col-sm-6 col-xs-12 cbox-2',
										'col-md-4 col-sm-6 col-xs-12 cbox-3',
										'col-md-4 col-sm-6 col-xs-12 cbox-4',
										'col-md-4 col-sm-6 col-xs-12 cbox-5',
									);
								?>
	<div class="gallery row">							
        <?php while ( $editorspic_query->have_posts() ) : $editorspic_query->the_post(); ?>
		<?php $i++; $i<0; $editorspicClass = $edp_classes[$i]; ?>		
		<?php $edpgpImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>
            <div class="gallery-list <?php echo $editorspicClass;?>">
				<div class="card" id="post-<?php the_ID(); ?>" style="background: linear-gradient(to right, rgba(0,0,0,.5), rgba(0,0,0,0.5), rgba(0,0,0,0.6)), url('<?php echo $edpgpImg[0]; ?>') no-repeat;">
					<div class="card-body">
						<?php echo do_shortcode("[featured-images]");?>
						<?php the_title( '<h2 class="card-title">', '</h2>' );?> 
						<p><?php echo excerpt(25);?></p>
						<br><div class="card-btn"><a class="btn-d esg-btn" href="<?php the_permalink(); ?>">VIEW</a></div>
					</div>
				</div>
			</div>
            <?php endwhile;?>
	</div>		
			<?php wp_reset_postdata(); 
			
			wp_reset_query(); ?>
			
    <?php $edpVariable = ob_get_clean();
    return $edpVariable;
    }
}


// ^ there should only be one of these at the top of your child theme's functions.php file
add_filter( 'job_manager_default_company_logo', 'smyles_custom_job_manager_logo' );
function smyles_custom_job_manager_logo( $logo_url ){
	// Change the value below to match the filename of the custom logo you want to use
	// Place the file in a /images/ directory in your child theme's root directory.
	// The example provided assumes "/images/custom_logo.png" exists in your child theme
	$filename = 'churchill-group_200x200.png';
	global $post;
	$Identified_company = get_post_meta( $post->ID, '_company_name', true );
	if ($Identified_company == "Amulet"){
		$filename = 'Amulet-Launch-news-age.jpg';
	} elseif ($Identified_company == "Radish"){
		$filename = 'radish-jobs.png';
	} elseif ($Identified_company == "Environmental"){
		$filename = 'color-environment-150x126.png';
	} elseif ($Identified_company == "Makeready"){
		$filename = 'Makeready-jobs-logo.png';
	} elseif ($Identified_company == "Cleaning"){
		$filename = 'cleaning-color-150x126.png';
	} 
	
	$logo_url = get_stylesheet_directory_uri() . '/assets/images/' . $filename;
	
	return $logo_url;
	
}

// display custom logo for chirstmas advent calender page


function change_logo_on_single($html) {

   if(is_page(10320)){
      $html = preg_replace('/<img(.*?)\/>/', '<img src="/wp-content/uploads/2019/11/churchill-white-logo.png" class="custom-logo" alt="" itemprop="logo" />', $html);
   }

   return $html;
}

add_filter('get_custom_logo','change_logo_on_single');

// shortcode for marquee section sustainability page 

add_shortcode( 'marquee_posts_scrolling', 'latest_posts_marquee_scrolling' );

function latest_posts_marquee_scrolling( $atts ) {
	ob_start();
	$marquee_query = new WP_Query( array(
        'post_type' => 'post',
		'posts_per_page' => 10,
        'order' => 'desc',
        'orderby' => 'date',
    ) );
	if ($marquee_query->have_posts()):?>
		<div class="em-trending-posts">
            <div class="container">
                <div class="trending-now-title">News tracker</div>
                <div class="marquee-wrapper">
                    <div class="trending-now-posts marquee">
						<?php while ($marquee_query->have_posts()):$marquee_query->the_post();?>
                            <a href="<?php the_permalink()?>">
							<!-- <span class="trend-date"><?php //echo human_time_diff(get_the_time('U'), current_time('timestamp')) .' '.__( 'ago','churchill-group' ); ?></span> -->
							<span class="trend-title"><?php the_title();?></span>
                            </a>
							<?php if ( 'post' === get_post_type() ) : wp_bootstrap_4_entry_footer(); endif; ?>
                        <?php endwhile; wp_reset_postdata();?>
                    </div>
                </div>
            </div>
        </div>
	<?php endif;
	$marquee_variable = ob_get_clean();
    return $marquee_variable;
}

// shortcode for sustaibility page dynamic posts-1

add_shortcode( 'feature_posts_sustainability1', 'latest_posts_feature_section1');

function latest_posts_feature_section1( $atts ){
	ob_start();
	$feature1_query = new WP_Query( array( 'post_type' => 'post', 'posts_per_page' => '2', 'order' => 'ASC', 'orderby' => 'date', 'tag' => 'initiatives' ) );
	$i = 0; 
		$classes = array(
			'w-0',
			'col-md-6 col-sm-6 col-xs-12 cbox-2',
			'col-md-6 col-sm-6 col-xs-12 cbox-3',
		);
	if ($feature1_query->have_posts()):?>	
		<div id="feature-postblock" class="">
			<div class="gallery row">							 
				<?php while ( $feature1_query->have_posts() ) : $feature1_query->the_post(); ?>
				<?php $i++; $i<0; $boxClass = $classes[$i]; ?>		
				<?php $bkgrImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>
				<div class="gallery-list <?php echo $boxClass;?>">
					<div class="card" id="post-<?php the_ID(); ?>" style="background: linear-gradient(to right, rgba(0,0,0,.5), rgba(0,0,0,0.5), rgba(0,0,0,0.6)), url('<?php echo $bkgrImg[0]; ?>') no-repeat;">
						<div class="card-body">
							<?php if ( 'post' === get_post_type() ) : wp_bootstrap_4_entry_footer();?> <br><span class="entry-date"><?php echo get_the_date(); ?></span><?php endif; ?>
							<a href="<?php the_permalink();?>" title="<?php the_title_attribute(); ?>"><?php the_title( '<h2 class="card-title">', '</h2>' );?></a> 
						</div>
					</div>
				</div>
				<?php endwhile; // end of the loop. ?>	
				<?php wp_reset_query();?>
			</div>	
		</div>
	<?php endif;
	$f1_variable = ob_get_clean();
    return $f1_variable;	
}

// shortcode for sustaibility page dynamic posts-2

add_shortcode( 'feature_posts_sustainability2', 'latest_posts_feature_section2');

function latest_posts_feature_section2( $atts ){
	ob_start();
	$feature2_query = new WP_Query( array( 'post_type' => 'post', 'posts_per_page' => '4', 'tag' => 'editors-pick' ) );
	$i = 0; 
		$classes = array(
			'w-0',
			'col-lg-6 col-md-6 mb-1',
			'col-lg-6 col-md-6 mb-1',
			'col-lg-6 col-md-6 mb-1',
			'col-lg-6 col-md-6 mb-1',
		);
	if ($feature2_query->have_posts()):?>	
		<div id="editors-postblock" class="">
			<div class="gallery-title row">
				<span>Editor’s pick</span>
			</div>
			<div class="gallery row">
				<?php while ( $feature2_query->have_posts() ) : $feature2_query->the_post(); ?>
				<?php $i++; $i<0; $gridClass = $classes[$i]; ?>		
				<?php $bzsImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>
				<div class="gallery-list <?php echo $gridClass;?>">
					<img class="card-img-top" src="<?php echo $bzsImg[0]; ?>" alt="Card image cap">
					<div id="post-<?php the_ID(); ?>" <?php post_class( 'card mt-3r h-100' ); ?>>
						<div class="card-body">
							<?php if ( 'post' === get_post_type() ) : wp_bootstrap_4_entry_footer(); endif; ?>
							<a href="<?php the_permalink();?>" title="<?php the_title_attribute(); ?>"><?php the_title( '<h2 class="card-title">', '</h2>' );?></a>
							<span class="entry-date"><?php echo get_the_date(); ?></span>
							<span class="comments">
							<?php
                                $number = get_comments_number(get_the_ID());
                                  if (0 == $number) {
                                  $respond_link = get_permalink() . '#respond';
                                  $comment_link = apply_filters('respond_link', $respond_link, get_the_ID());
                                  } else {
                                  $comment_link = get_comments_link();
                                  }
                            ?>
                            <a href="<?php echo esc_url($comment_link) ?>">
                              <i class="far fa-comments"></i>
                              <?php echo esc_html($number); ?>
                            </a>
							</span>
							<p class="excerpt"><?php echo excerpt(32);?></p>
										<?php $category = get_the_category(); ?>
										<?php if ($category[0]->cat_ID == '4'){?>
										<div class="card-btn"><a class="btn-d amulet-btn" href="<?php the_permalink(); ?>">VIEW</a></div>
										<?php } ?>
										<?php if ($category[0]->cat_ID == '8'){?>
										<div class="card-btn"><a class="btn-d environmental-btn" href="<?php the_permalink(); ?>">VIEW</a></div>
										<?php } ?>
										<?php if ($category[0]->cat_ID == '6'){?>
										<div class="card-btn"><a class="btn-d cleaning-btn" href="<?php the_permalink(); ?>">VIEW</a></div>
										<?php } ?>
										<?php if ($category[0]->cat_ID == '7'){?>
										<div class="card-btn"><a class="btn-d environmental-btn" href="<?php the_permalink(); ?>">VIEW</a></div>
										<?php } ?>
										<?php if ($category[0]->cat_ID == '3'){?>
										<div class="card-btn"><a class="btn-d portfolio-btn" href="<?php the_permalink(); ?>">VIEW</a></div>
										<?php } ?>
										<?php if ($category[0]->cat_ID == '5'){?>
										<div class="card-btn"><a class="btn-d radish-btn" href="<?php the_permalink(); ?>">VIEW</a></div>
										<?php } ?>
										<?php if ($category[0]->cat_ID == '51'){?>
										<div class="card-btn"><a class="btn-d cleaning-btn" href="<?php the_permalink(); ?>">VIEW</a></div>
										<?php } ?>
										<?php if ($category[0]->cat_ID == '69'){?>
										<div class="card-btn"><a class="btn-d onverve-btn" href="<?php the_permalink(); ?>">VIEW</a></div>
										<?php } ?>
										<?php if ($category[0]->cat_ID == '19'){?>
										<div class="card-btn"><a class="btn-d onverve-btn" href="<?php the_permalink(); ?>">VIEW</a></div>
										<?php } ?>		
										<?php if ($category[0]->cat_ID == '14'){?>
										<div class="card-btn"><a class="btn-d cleaning-btn" href="<?php the_permalink(); ?>">VIEW</a></div>
										<?php } ?>
										<?php if ($category[0]->cat_ID == '15'){?>
										<div class="card-btn"><a class="btn-d portfolio-btn" href="<?php the_permalink(); ?>">VIEW</a></div>
										<?php } ?>	
						</div>
					</div>
				</div>
				<?php endwhile; // end of the loop. ?>	
				<?php wp_reset_query();?>
			</div>	
		</div>
	<?php endif;
	$f2_variable = ob_get_clean();
    return $f2_variable;	
}

// shortcode for sustaibility page dynamic posts-2

add_shortcode( 'apprentices_posts_sustainability2', 'latest_posts_apprentices');

function latest_posts_apprentices( $atts ){
	ob_start();
	$apprentices_query = new WP_Query( array( 'post_type' => 'post', 'posts_per_page' => '-1', 'tag' => 'apprentice' ) );
	$i = 0; 
		$classes = array(
			'w-0',
			'col-lg-12 col-md-12 mb-1',
		);
	if ($apprentices_query->have_posts()):?>	
		<div id="apprentices-postblock" class="">
			<div class="gallery-title row">
				<span>Our apprentices</span>
			</div>
			<div class="gallery row">
				<div class="owl-carousel owl-theme">
					<?php while ( $apprentices_query->have_posts() ) : $apprentices_query->the_post(); ?>
					<div class="item">
                        <div class="item-single">
							<?php $i++; $i<0; $gridClass = $app_classes[$i]; ?>		
							<?php $appbzsImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>
							<div class="gallery-list <?php echo $gridClass;?>">
								<img class="card-img-top" src="<?php echo $appbzsImg[0]; ?>" alt="Card image cap">
								<div id="post-<?php the_ID(); ?>" <?php post_class( 'card mt-3r h-100' ); ?>>
									<div class="card-body">
										<?php if ( 'post' === get_post_type() ) : wp_bootstrap_4_entry_footer(); endif; ?>
										<a href="<?php the_permalink();?>" title="<?php the_title_attribute(); ?>"><?php the_title( '<h2 class="card-title">', '</h2>' );?></a>
										<span class="entry-date"><?php echo get_the_date(); ?></span>
										<span class="comments">
										<?php
											$number = get_comments_number(get_the_ID());
											  if (0 == $number) {
											  $respond_link = get_permalink() . '#respond';
											  $comment_link = apply_filters('respond_link', $respond_link, get_the_ID());
											  } else {
											  $comment_link = get_comments_link();
											  }
										?>
										<a href="<?php echo esc_url($comment_link) ?>">
										  <i class="far fa-comments"></i>
										  <?php echo esc_html($number); ?>
										</a>
										</span>
										<p class="excerpt"><?php echo excerpt(32);?></p>
										<div class="card-btn"><a class="btn-d portfolio-btn" href="<?php the_permalink(); ?>">VIEW</a></div>	
									</div>
								</div>
							</div>
						</div>
					</div>	
					<?php endwhile; // end of the loop. ?>	
					<?php wp_reset_query();?>
				</div>
			</div>	
		</div>
	<?php endif;
	$apprentice_variable = ob_get_clean();
    return $apprentice_variable;	
}


// shortcode for sustaibility page dynamic posts-3

add_shortcode( 'slider_posts_sustainability3', 'latest_posts_slider_section3');

function latest_posts_slider_section3( $atts ){
	ob_start();
	$slider3_query = new WP_Query( array( 'post_type' => 'post', 'posts_per_page' => '6', 'order' => 'desc', 'orderby' => 'date', 'tag' => 'todays-insights', ) );
	if ($slider3_query->have_posts()):?>	
		<div id="slider-postblock" class="">
			<div class="gallery-title row">
				<span>Today’s insights</span>
			</div>
			<div class="gallery row">
			<div class="owl-carousel owl-theme">
				<?php while ( $slider3_query->have_posts() ) : $slider3_query->the_post(); ?>
				    <div class="item">
                        <div class="item-single">
                            <?php $imageBackground = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>
							<div class="card" id="post-<?php the_ID(); ?>" style="background: linear-gradient(to right, rgba(0,0,0,.5), rgba(0,0,0,0.5), rgba(0,0,0,0.6)), url('<?php echo $imageBackground[0]; ?>') no-repeat; background-position: center center; background-size: cover;">
								<div class="card-body">
									<?php if ( 'post' === get_post_type() ) : wp_bootstrap_4_entry_footer();?> <br><span class="entry-date"><?php echo get_the_date(); ?></span><?php endif; ?>
									<a href="<?php the_permalink();?>" title="<?php the_title_attribute(); ?>"><?php the_title( '<h2 class="card-title">', '</h2>' );?></a> 
								</div>
							</div>
						</div>
					</div>	
				<?php endwhile; // end of the loop. ?>	
				<?php wp_reset_query();?>
			</div>
			</div>	
		</div>
	<?php endif;
	$s3_variable = ob_get_clean();
    return $s3_variable;	
}

// shortcode for sustaibility page dynamic posts-4

function count_post_visits() {
   if( is_single() ) {
      global $post;
      $views = get_post_meta( $post->ID, 'my_post_viewed', true );
      if( $views == '' ) {
         update_post_meta( $post->ID, 'my_post_viewed', '1' );   
      } else {
         $views_no = intval( $views );
         update_post_meta( $post->ID, 'my_post_viewed', ++$views_no );
      }
   }
}
add_action( 'wp_head', 'count_post_visits' );

add_shortcode( 'widget_posts_sustainability4', 'widget_posts_section4');

function widget_posts_section4($args){
	ob_start();
	
	$popular_posts_args = array(
		'posts_per_page' => 6,
		'meta_key' => 'my_post_viewed',
		'orderby' => 'meta_value_num',
		'order'=> 'DESC'
	);
 
	$popular_posts_loop = new WP_Query( $popular_posts_args );
	
	if (($popular_posts_loop->get_posts($args)) && $popular_posts_loop->have_posts()) {
        $popular_posts_loop->widget_start($args); ?>
		<div id="express_posts_block" class="">	
			<div class="gallery-title row">
				<span>Most viewed</span>
			</div>
			<div class="express_posts row clearfix">
				<?php
                $total_posts = $popular_posts_loop->post_count;
                $counter = 1;
                while ($popular_posts_loop->have_posts()): $popular_posts_loop->the_post();
                    $wrapper_class_start = $wrapper_class_end = '';
                    if(1 == $counter){
                        $wrapper_class_start = '<div class="big-express float-l">';
                        $wrapper_class_end = '</div>';
                        $image_size = 'full';
						}else{
                        $image_size = 'thumbnail';
                        if(2 == $counter){
                            $wrapper_class_start = '<div class="float-l">';
                        }
                        if($counter == $total_posts){
                            $wrapper_class_end = '</div>';
                        }
                    }
                    ?>
                    <?php echo wp_kses_post($wrapper_class_start);?>
					<div class="article-block-wrapper clearfix">
						<?php if (has_post_thumbnail()) { ?>
                        <div class="entry-image">
                            <a href="<?php the_permalink() ?>">
                                <?php
									the_post_thumbnail( $image_size, array(
                                        'alt' => the_title_attribute( array(
                                            'echo' => false,
                                        ) ),
                                    ) );
                                    ?>
                            </a>
                        </div>
                        <?php } ?>
						<div class="article-details">
                            <h3 class="entry-title">
                                <a href="<?php the_permalink() ?>">
                                    <?php the_title(); ?>
                                </a>
                            </h3>
							<div class="meta-info">
								<span class="entry-date"><?php echo get_the_date(); ?></span>
								<span class="comments">
								<?php
									$number = get_comments_number(get_the_ID());
									  if (0 == $number) {
									  $respond_link = get_permalink() . '#respond';
									  $comment_link = apply_filters('respond_link', $respond_link, get_the_ID());
									  } else {
									  $comment_link = get_comments_link();
									  }
								?>
								<a href="<?php echo esc_url($comment_link) ?>">
								  <i class="far fa-comments"></i>
								  <?php echo esc_html($number); ?>
								</a>
								</span>
							</div>
							<?php
                            if($counter == 1){ ?>
                                    <div class="em-excerpt">
                                        <?php
                                        $content = excerpt(32);
                                        echo wpautop(esc_html($content));
                                        ?>
                                    </div>
                            <?php } ?>
						</div>
					</div>
					<?php echo wp_kses_post($wrapper_class_end);?>
                    <?php $counter++; endwhile;wp_reset_postdata();?>
			</div>
		</div>
		<?php $popular_posts_loop->widget_end($args);	
	}
	$s4_variable = ob_get_clean();
    return $s4_variable;
}

// shortcode for sustaibility page dynamic posts-5

add_shortcode( 'carousel_posts_sustainability5', 'carousel_posts_section5');

function carousel_posts_section5($args){
	ob_start();
	
	$documents_posts_args = array(
		'post_type' => 'post',
		'posts_per_page' => -1,
        'order' => 'desc',
        'orderby' => 'date',
		'category_name' => 'case-study',
	);
 
	$documents_posts_loop = new WP_Query( $documents_posts_args );
	
	if (($documents_posts_loop->get_posts($args)) && $documents_posts_loop->have_posts()) {
        $documents_posts_loop->widget_start($args); ?>
		<div id="carousel-widget">
			<div class="gallery-title row">
				<span>Charter documents access</span>
			</div>
			<div id="carousel_posts_block" class="row">	
			<div class="owl-carousel owl-theme">
                <?php while ($documents_posts_loop->have_posts()): $documents_posts_loop->the_post(); 
				if (has_post_thumbnail()){ ?>
                   <div class="item">
						<a href="<?php the_permalink() ?>">
							<?php $imageBackground = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>
							<div class="entry-image" style="background: linear-gradient(to right, rgba(0,0,0,.5), rgba(0,0,0,0.5), rgba(0,0,0,0.6)), url('<?php echo $imageBackground[0]; ?>') no-repeat; background-position: center right; background-size: cover; min-height:300px;">
							</div>
						</a>		
						<div class="article-block-wrapper">
							<div class="article-details">
								<div class="meta-info">
									<?php if ( 'post' === get_post_type() ) : wp_bootstrap_4_entry_footer(); endif; ?>
								</div>
								<h3 class="entry-title">
									<a href="<?php the_permalink() ?>">
										<?php the_title(); ?>
									</a>
								</h3>
							</div>
						</div>	
					</div>
					<?php
                    }
                    endwhile; wp_reset_postdata();
                    ?>
			</div>
			</div>
		</div>
		<?php $documents_posts_loop->widget_end($args);	
	}
	$s5_variable = ob_get_clean();
    return $s5_variable;
}

/*
* Creating a function to create our CPT sustaibility champions
*/
 
function sustaibility_champions_post_type() {
 
// UI labels for Custom Post Type Champions
    $labels = array(
        'name'                => _x( 'Champions', 'Post Type General Name', 'churchill-group' ),
        'singular_name'       => _x( 'Champion', 'Post Type Singular Name', 'churchill-group' ),
        'menu_name'           => __( 'Champions', 'churchill-group' ),
        'parent_item_colon'   => __( 'Parent Champion', 'churchill-group' ),
        'all_items'           => __( 'All Champions', 'churchill-group' ),
        'view_item'           => __( 'View Champion', 'churchill-group' ),
        'add_new_item'        => __( 'Add New Champion', 'churchill-group' ),
        'add_new'             => __( 'Add New', 'churchill-group' ),
        'edit_item'           => __( 'Edit Champion', 'churchill-group' ),
        'update_item'         => __( 'Update Champion', 'churchill-group' ),
        'search_items'        => __( 'Search Champion', 'churchill-group' ),
        'not_found'           => __( 'Not Found', 'churchill-group' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'churchill-group' ),
    );
     
// other options for Custom Post Type Champions
     
    $args = array(
        'label'               => __( 'champions', 'churchill-group' ),
        'description'         => __( 'Our Sustainability Champions', 'churchill-group' ),
        'labels'              => $labels,
        // Features this CPT supports in Post Editor
        'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
        /* A hierarchical CPT is like Pages and can have
        * Parent and child items. A non-hierarchical CPT
        * is like Posts.
        */ 
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'page',
    );
     
    // Registering your Custom Post Type
    register_post_type( 'champions', $args );
 
}
 
/* Hook into the 'init' action so that the function
* Containing our post type registration is not 
* unnecessarily executed. 
*/
 
add_action( 'init', 'sustaibility_champions_post_type', 0 );

// shortcode for to display sustaibility champions

add_shortcode( 'our_sustainability_champions', 'widget_sustainability_champions');

function widget_sustainability_champions($args){
	ob_start();
	
	$champions_posts_args = array(
		'post_type' => 'champions',
		'posts_per_page' => 4,
		'orderby' => 'date',
		'order'=> 'DESC',
	);
 
	$champions_posts_loop = new WP_Query( $champions_posts_args );
	
	if (($champions_posts_loop->get_posts($args)) && $champions_posts_loop->have_posts()) {
        $champions_posts_loop->widget_start($args); ?>
		<div id="champions_posts_block" class="">	
			<div class="gallery-title row">
				<span>Our sustainability champions</span>
			</div>
			<!-- <h3 class="sub-header">What motivates them?</h3> -->
			<div class="express_posts row clearfix">
				<?php
                $total_posts = $champions_posts_loop->post_count;
                $counter = 1;
                while ($champions_posts_loop->have_posts()): $champions_posts_loop->the_post();
                    $wrapper_class_start = $wrapper_class_end = '';
                    if(1 == $counter){
                        $wrapper_class_start = '<div class="big-express float-l">';
                        $wrapper_class_end = '</div>';
                        $image_size = 'full';
						}else{
                        $image_size = 'full';
                        if(2 == $counter){
                            $wrapper_class_start = '<div class="float-l">';
                        }
                        if($counter == $total_posts){
                            $wrapper_class_end = '</div>';
                        }
                    }
                    ?>
                    <?php echo wp_kses_post($wrapper_class_start);?>
					<div class="article-block-wrapper clearfix">
						<?php if (has_post_thumbnail()) { ?>
                        <div class="entry-image">
                                <?php
									the_post_thumbnail( $image_size, array(
                                        'alt' => the_title_attribute( array(
                                            'echo' => false,
                                        ) ),
                                    ) );
                                    ?>
                        </div>
                        <?php } ?>
						<div class="article-details">
                            <h3 class="entry-title">
                                <?php the_title(); ?>
                            </h3>
							<div class="em-excerpt">
                                        <?php
										//$content = ;
                                        //echo wpautop(esc_html($content));
										the_content();
                                        ?>
                                    </div>
                        </div>
					</div>
					<?php echo wp_kses_post($wrapper_class_end);?>
                    <?php $counter++; endwhile;wp_reset_postdata();?>
			</div>
		</div>
		<?php $champions_posts_loop->widget_end($args);	
	}
	$champions_variable = ob_get_clean();
    return $champions_variable;
}

// shortcode for churchill menu slider model
	
	add_shortcode( 'churchill_menu_slider', 'menu_slider_model');

function menu_slider_model(){
	ob_start();?>
		<div class="container">
			<div class="row">
				<div class="col">
					<div id="product__slider">
						  <div class="product__slider-thmb">
							<div class="slide"><img src="/wp-content/uploads/2021/04/Cleaning-slick-menu.png" alt="Churchill Cleaning" class="img-responsive"></div>
							<div class="slide"><img src="/wp-content/uploads/2021/04/Portfolio-slick-menu.png" alt="Portfolio by churchill" class="img-responsive"></div>
							<div class="slide"><img src="/wp-content/uploads/2021/06/chequers_new_img2.png" alt="Chequers" class="img-responsive"></div>
							<div class="slide"><img src="/wp-content/uploads/2021/04/Environmental-slick-menu.png" alt="Churchill Environmental" class="img-responsive"></div>
							<div class="slide"><img src="/wp-content/uploads/2021/05/on-verve-main-slider-logo.png" alt="On-Verve" class="img-responsive"></div>
							<div class="slide"><img src="/wp-content/uploads/2021/04/Amulet-slick-menu.png" alt="Amulet" class="img-responsive"></div>
							<div class="slide"><img src="/wp-content/uploads/2021/04/Radish-slick-menu.png" alt="Radish" class="img-responsive"></div>
							<div class="slide"><img src="/wp-content/uploads/2021/04/Cati-slick-menu.png" alt="Cati" class="img-responsive"></div>
							<div class="slide"><img src="/wp-content/uploads/2021/11/modus-slider-logo.png" alt="Modus" class="img-responsive"></div>
						  </div>
						  <div class="product__slider-main">
							<div class="slide">
								<h1>Churchill Cleaning</h1>
								<p class="master-text">Our range of contract cleaning services is focused on helping our clients maintain outstandingly clean and safe environments by delivering quality services, reliably and consistently.</p>
								<a class="btn btn-default button-c cleaning-btn" href="/cleaning/">Find out more</a>
							</div>
							<div class="slide">
								<h1>Portfolio by Churchill</h1>
								<p class="master-text">Portfolio is our high specification cleaning service for professional workplaces provided by people who take a concierge-level approach to what they do.</p>
								<a class="btn btn-default button-c portfolio-btn" href="/portfolio/">Find out more</a>
							</div>
							<div class="slide">
								<h1>Chequers</h1>
								<p class="master-text">Chequers is a specialist services partner predominantly in the housing sector, providing facilities services that have a positive impact on people’s homes, workplaces and communities.</p>
								<a class="btn btn-default button-c cleaning-btn" href="/chequers/">Find out more</a>
							</div>
							<div class="slide">
								<h1>Churchill Environmental</h1>
								<p class="master-text">We believe that everyone deserves to take the safety of their environment as a given and we work in partnership with our clients to deliver environmental compliance services in a transparent, efficient and service-led way.</p>
								<a class="btn btn-default button-c environmental-btn" href="/environmental/">Find out more</a>
							</div>
							<div class="slide">
								<h1>On Verve</h1>
								<p class="master-text">A thriving workplace starts with happy guests, which is why we're a guest and employee services provider dedicated to making a difference in the most positive way.</p>
								<a class="btn btn-default button-c onverve-btn" href="/guest-services/">Find out more</a>
							</div>
							<div class="slide">
								<h1>Amulet</h1>
								<p class="master-text">Our services are designed to deliver freedom through security - enabling organisations to provide a positive, safe and secure environment so that everyday life and core business operations just happen.</p>
								<a class="btn btn-default button-c amulet-btn" href="/security/">Find out more</a>
							</div>
							<div class="slide">
								<h1>Radish</h1>
								<p class="master-text">We work with our customers in a way that is flexible, transparent and tailored to their needs, so that together we provide food that does good. Through good food we build better workplaces, living spaces, learning environments and widen the community we operate in.</p>
								<a class="btn btn-default button-c radish-btn" href="/catering/">Find out more</a>
							</div>
							<div class="slide">
								<h1>Cati</h1>
								<p class="master-text">Cati is our online compliance solution designed to effectively manage your legal and business critical compliance across your portfolio.</p>
								<a class="btn btn-default button-c environmental-btn" href="/cati/">Find out more</a>
							</div>
							<div class="slide">
								<h1>Mo:dus</h1>
								<p class="master-text">Mo:dus is a modular platform with easy to tailor functionality to provide solutions to real challenges. It’s an innovative and flexible piece of software for people engagement, workflow processing and reporting. Our aim is to make work life better.</p>
								<a class="btn btn-default button-c onverve-btn" href="/digitisation/">Find out more</a>
							</div>
						  </div>
					</div>
				</div>	
			</div>
		</div>
		
<?php
$slider_variable = ob_get_clean();
    return $slider_variable;
}

function my_mce_buttons_2($buttons) {	
	/**
	 * Add in a core button that's disabled by default
	 */
	$buttons[] = 'sup';
	$buttons[] = 'sub';

	return $buttons;
}
add_filter('mce_buttons_2', 'my_mce_buttons_2');

/* contact forms tracking through DOM events */

add_action( 'wp_footer', 'mycustom_wp_footer' );
 
/*function mycustom_wp_footer() {
?>
<script type="text/javascript">
document.addEventListener( 'wpcf7mailsent', function( event ) {
    if ( '1717' == event.detail.contactFormId ) {
        ga( 'send', 'event', 'Contact Form', 'submit' );
    }
}, false );
</script>
<?php
}*/
// change the placeholder text on selecting categories in jobmanger search filters

add_filter('gettext', 'wpse243242_change_wp_job_manager_text', 20, 3 );
function wpse243242_change_wp_job_manager_text( $translated_text, $untranslated_text, $domain ) {
    if ( 'wp-job-manager' !== $domain ) {
        return $translated_text;        
    }

    // make the changes to the text
    switch( $untranslated_text ) {
            // Multi category select
            case 'Choose a category&hellip;':
                $translated_text = __( 'Filter by Job Category&hellip;', 'text_domain' );
            break;

            // Single category select
            case 'Any category':
                $translated_text = __( 'Any Division', 'text_domain' );
            break;

            // add more items
     }

    return $translated_text;        
}