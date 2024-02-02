<?php
/*
* Template Name: Churchill Group Press Releases
*/

get_header(); ?>

<?php
	$default_sidebar_position = get_theme_mod( 'default_sidebar_position', 'right' );
?>

<div class="container-fluid news">
		<div class="row">
			<div class="col-md-6 col-sm-12">
			<div class="title-section">
				<img class="aligncenter size-full wp-image-202" src="/churchill-group/wp-content/uploads/2019/03/portfolio-line.jpg" alt="portfolio-line" width="114" height="1">
				<h2 class="blog-title">Latest press releases</h2>
			</div>
			</div>
			<div class="col-md-6 col-sm-12">
				<div class="new_search">
				<?php echo do_shortcode( '[ivory-search id="13955" title="Search Blog Posts only"]' );?>
				</div>
			</div>	
			<div class="col-md-12 wp-bp-content-width">
				
					
					<div class="row">
					<?php	
						$cat_args = array(
								'order' => 'desc',
								'order_by' => 'date',
								'posts_per_page'=> 9, 
								'category_name'=> 'press-releases',
								'paged' => get_query_var( 'paged' )
								);
						$wp_query = new WP_Query($cat_args);						
						/* Start the Loop */
						if ( $wp_query->have_posts() ) :		
						while ($wp_query->have_posts()) : $wp_query->the_post();?>

						<div class="col-lg-4 col-md-6 mb-4">
						<?php // Include the Post-Format-specific template for the content.
							get_template_part( 'template-parts/content', 'blog') ; ?>
						</div>
						<?php endwhile;?>
					</div>
						<?php the_posts_navigation( array(
							'next_text' => esc_html__( 'Newer', 'wp-bootstrap-4' ),
							'prev_text' => esc_html__( 'Older', 'wp-bootstrap-4' ),
						) );
						
						else :

						get_template_part( 'template-parts/content', 'none' );

						endif; 
						wp_reset_postdata();
						?>
						
			</div><!-- col -->
		</div>
			<!-- /.row -->

		</div>	
		
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
