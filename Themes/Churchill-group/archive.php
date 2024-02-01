<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WP_Bootstrap_4
 */

get_header(); ?>

<?php
	$default_sidebar_position = get_theme_mod( 'default_sidebar_position', 'right' );
?>

	<div class="container-fluid news">
		<div class="row">

			
			<div class="col-md-12 wp-bp-content-width">
			
				<div id="primary" class="content-area">
					<main id="main" class="site-main">

					<?php
					if ( have_posts() ) : ?>

						<header class="page-header mt-3r">
							<?php // Get the current category ID, e.g. if we're on a category archive page
								$category = get_category( get_query_var( 'cat' ) );
								$cat_id = $category->cat_ID;
								// Get the image ID for the category
								$image_id = get_term_meta ( $cat_id, 'category-image-id', true );
								// Echo the image
								echo wp_get_attachment_image ( $image_id, 'large' ); ?>		
							<div class="title-section">		
								<img class="aligncenter size-full wp-image-202" src="https://www.skylinemicrosites.co.uk/churchill-group/wp-content/uploads/2019/03/portfolio-line.jpg" alt="" width="114" height="1">
							<?php
								the_archive_title( '<h1 class="blog-title">', '</h1>' );
								the_archive_description( '<div class="archive-description text-muted">', '</div>' );
							?>
							</div>
						</header><!-- .page-header -->
						<div class="row"> 
						<?php
						/* Start the Loop */
						while ( have_posts() ) : the_post();

							/*
							 * Include the Post-Format-specific template for the content.
							 * If you want to override this in a child theme, then include a file
							 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
							  */
							 ?> 
							<div class="col-lg-4 col-md-6 mb-4"> 
							<?php get_template_part( 'template-parts/content', get_post_format() );?>
							</div>	
					<?php endwhile;?>
						</div>
						<?php	
						the_posts_navigation( array(
							'next_text' => esc_html__( 'Newer Posts', 'wp-bootstrap-4' ),
							'prev_text' => esc_html__( 'Older Posts', 'wp-bootstrap-4' ),
						) );

					else :

						get_template_part( 'template-parts/content', 'none' );

					endif; ?>

					</main><!-- #main -->
				</div><!-- #primary -->
			</div>
			<!-- /.col-md-12 -->

			
		</div>
		<!-- /.row -->
	</div>
	<!-- /.container -->
<section class="container-fluid" style="padding:0;margin:0 auto;">
		<div class="footer-banner-text">
		<?php
			echo do_shortcode('[slide-anything id="1853"]');
		?>
		</div>
</section>
<?php
get_footer();
