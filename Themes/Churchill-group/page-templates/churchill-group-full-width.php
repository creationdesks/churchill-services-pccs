<?php
/*
* Template Name: Churchill Group Full Width
*/

get_header(); ?>

    <div class="">
        <div id="primary" class="content-area">
            <main id="main" class="site-main">
				<?php
					if ( is_front_page() )
					//echo do_shortcode('[slide-anything id="22"]');
					echo do_shortcode('[slide-anything id="12702"]');
				//echo do_shortcode('[INSERT_ELEMENTOR id="12432"]');
				?>
			<!-- <div class="white" style="background:rgba(0,0,0,0); border:solid 0px rgba(0,0,0,0); border-radius:0px; padding:0px 0px 0px 0px;">
					<div id="slider_22_slide01" class="sa_hover_container" style="padding:4% 10%; margin:0px 0%; background-image:url(&quot;/wp-content/uploads/2019/11/BG-banner.jpg&quot;); background-position:right bottom; background-size:cover; background-repeat:no-repeat;">
						<div class="row">
							<div class="col-md-5">
								<div class="daily-date">
									<div class="card-wrapper flip-right">
										<div class="card">
											<div class="card-front text-white bg-dark">
												<?php // echo do_shortcode('[sc name="auto_date"]'); ?>
												<!-- <div class="date">
													<p class="auto-date2">02</p><span>December</span>
													<p class="auto-date">02</p><span>December</span>
												</div> -->
											<!-- </div> -->
											<!-- <div class="card-back bg-black">
												<a class="permalink-card-back" href="/churchills-festive-countdown/" >
												<?php // echo do_shortcode('[advent_calendar]'); ?>
													<!-- <div class="special-content">
														<p>In February we celebrated the i-FM technology award win in the People in Technology category for Cati our SaaS (software as a service) platform that digitises paper-based compliance tasks. It allows users to streamline all things building compliance, providing a real-time status of each asset and notifying users when upcoming inspections are due.</p> 
													</div> -->
												<!--</a>
											</div>
										</div>
									</div>
								</div> 
								<div class="calendar-header"><a id="font-alex" class="font-alex" href="/churchills-festive-countdown/">Churchill's festive countdown</a></div>
							</div>
							<div class="col-md-2">&nbsp;</div>
							<div class="col-md-5">
								<img class="aligncenter size-full wp-image-11206" src="/wp-content/uploads/2019/11/buble-Greetings-for-seasons-text-edited-final.png" alt="" width="842" height="523">
							</div>
						</div>
					</div>
				</div>-->
				<?php // masterslider("ms-1-1"); ?>
				<?php echo do_shortcode('[churchill_menu_slider]');?>
				<section id="case-studies" class="">
					<img class="aligncenter size-full wp-image-202" src="/churchill-group/wp-content/uploads/2019/03/portfolio-line.jpg" alt="Portfolio-line" width="114" height="1" />
					<h1>Latest</h1>
					<div class="gallery row">
							<?php $myquery = new WP_Query( array( 'post_type' => 'post', 'posts_per_page' => '6', ) );?>
						<?php $i = 0; ?>
						<?php 
								$classes = array(
										'w-0',
										'col-md-8 col-sm-6 col-xs-12 cbox-1',
										'col-md-4 col-sm-6 col-xs-12 cbox-2',
										'col-md-4 col-sm-6 col-xs-12 cbox-3',
										'col-md-4 col-sm-6 col-xs-12 cbox-4',
										'col-md-4 col-sm-6 col-xs-12 cbox-5',
										'col-md-8 col-sm-6 col-xs-12 cbox-6',
										'col-md-4 col-sm-6 col-xs-12 cbox-7',
										'col-md-4 col-sm-6 col-xs-12 cbox-8',
										'col-md-4 col-sm-6 col-xs-12 cbox-9',
										'col-md-4 col-sm-6 col-xs-12 cbox-10',
										
									);
									 
								?>
						<?php while ( $myquery->have_posts() ) : $myquery->the_post(); ?>
							<?php $i++; $i<0; $CssClass = $classes[$i]; ?>		
							<?php $backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>
						<div class="gallery-list <?php echo $CssClass;?>">
							<div class="card" id="post-<?php the_ID(); ?>" style="background: linear-gradient(to right, rgba(0,0,0,.5), rgba(0,0,0,0.5), rgba(0,0,0,0.6)), url('<?php echo $backgroundImg[0]; ?>') no-repeat;">
								<div class="card-body">
										<?php echo do_shortcode("[featured-images]");?>
										<?php the_title( '<h2 class="card-title">', '</h2>' );?> 
										<p><?php echo excerpt(25);?></p>
										<?php $category = get_the_category(); ?>
										<?php if ($category[0]->cat_ID == '4'){?>
									<br><div class="card-btn"><a class="btn-d amulet-btn" href="<?php the_permalink(); ?>">VIEW</a></div>
										<?php } ?>
										<?php if ($category[0]->cat_ID == '8'){?>
									<br><div class="card-btn"><a class="btn-d environmental-btn" href="<?php the_permalink(); ?>">VIEW</a></div>
										<?php } ?>
										<?php if ($category[0]->cat_ID == '6'){?>
									<br><div class="card-btn"><a class="btn-d cleaning-btn" href="<?php the_permalink(); ?>">VIEW</a></div>
										<?php } ?>
										<?php if ($category[0]->cat_ID == '17'){?>
									<br><div class="card-btn"><a class="btn-d cleaning-btn" href="<?php the_permalink(); ?>">VIEW</a></div>
										<?php } ?>
										<?php if ($category[0]->cat_ID == '7'){?>
									<br><div class="card-btn"><a class="btn-d environmental-btn" href="<?php the_permalink(); ?>">VIEW</a></div>
										<?php } ?>
										<?php if ($category[0]->cat_ID == '3'){?>
									<br><div class="card-btn"><a class="btn-d portfolio-btn" href="<?php the_permalink(); ?>">VIEW</a></div>
										<?php } ?>
										<?php if ($category[0]->cat_ID == '5'){?>
									<br><div class="card-btn"><a class="btn-d radish-btn" href="<?php the_permalink(); ?>">VIEW</a></div>
										<?php } ?>
										<?php if ($category[0]->cat_ID == '51'){?>
									<br><div class="card-btn"><a class="btn-d cleaning-btn" href="<?php the_permalink(); ?>">VIEW</a></div>
										<?php } ?>
										<?php if ($category[0]->cat_ID == '72'){?>
									<br><div class="card-btn"><a class="btn-d cleaning-btn" href="<?php the_permalink(); ?>">VIEW</a></div>
										<?php } ?>
									<?php if ($category[0]->cat_ID == '69'){?>
									<br><div class="card-btn"><a class="btn-d onverve-btn" href="<?php the_permalink(); ?>">VIEW</a></div>
										<?php } ?>
									<?php if ($category[0]->cat_ID == '19'){?>
									<br><div class="card-btn"><a class="btn-d onverve-btn" href="<?php the_permalink(); ?>">VIEW</a></div>
										<?php } ?>		
									<?php if ($category[0]->cat_ID == '14'){?>
									<br><div class="card-btn"><a class="btn-d cleaning-btn" href="<?php the_permalink(); ?>">VIEW</a></div>
										<?php } ?>
									<?php if ($category[0]->cat_ID == '15'){?>
									<br><div class="card-btn"><a class="btn-d portfolio-btn" href="<?php the_permalink(); ?>">VIEW</a></div>
										<?php } ?>		
								</div>
							</div>
						</div>
						
						<?php endwhile; // end of the loop. ?>	
						<?php wp_reset_query();?>
						
						<div class="gallery-list col-md-4 col-sm-6 col-xs-12 cbox-11">
							<div class="card">
								<div class="card-body">
									<a class="view-all" href="/news/"><h2 class="card-title">VIEW ALL</h2></a>
								</div>
							</div>
						</div>	
					</div>	
				</section>
				<div id="modalGallery" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modalGalleryLabel" aria-hidden="true">
				  <div class="modal-dialog" role="document">
					<div class="modal-content">
					  <div class="modal-body">
						<img class="js-modal-image" src="" alt="..." />
					  </div>
					</div>
				  </div>
				</div>
				<section id="our-accreditations">
					<div class="col-lg-12 col-md-12">
						<img class="aligncenter size-full wp-image-202" src="/churchill-group/wp-content/uploads/2019/03/portfolio-line.jpg" alt="Portfolio-line" width="114" height="1" />
						<h1>Our accreditations, registrations and awards </h1>
					</div>
					<?php echo do_shortcode('[slide-anything id="1943"]'); ?>
				</section>
				<section id="follow-us">
					<div class="container-fluid">
						<div class="row follow-box">
							<div class="twitter-box"> 
								<img class="aligncenter size-full wp-image-202" src="/churchill-group/wp-content/uploads/2019/03/portfolio-line.jpg" alt="Portfolio-line" width="114" height="1" />
								<h1>Follow us</h1>
								<?php echo do_shortcode('[arrow_sf id="8486"]'); ?>
							</div>
						</div>	
					</div>
				</section> 
				<section id="video-display">
				<?php
					if ( is_front_page() )
					echo do_shortcode('[slide-anything id="576"]');
				?>
				</section>
                <?php
                while ( have_posts() ) : the_post();

                    get_template_part( 'template-parts/content', 'page-full' );

                    // If comments are open or we have at least one comment, load up the comment template.
                    if ( comments_open() || get_comments_number() ) :
                        comments_template();
                    endif;

                endwhile; // End of the loop.
                ?>

            </main><!-- #main -->
        </div><!-- #primary -->
    </div>

<?php
get_footer();
