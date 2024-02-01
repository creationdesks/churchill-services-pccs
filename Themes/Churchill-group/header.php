<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WP_Bootstrap_4
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta name="google-site-verification" content="KtNTo7jlKLDXtTkKVreQaJT2ikq0NmGZR9S5Xq2VP9M" />
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge" />
	<link rel="profile" href="//gmpg.org/xfn/11">
	<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
	<?php wp_head(); ?>
	<script>
			(function() {
		  jQuery(document).on("click", ".click-to-expand", function() {
			var imageSrc = jQuery(this).parents(".image-grid").find("img").attr("src");
			jQuery(".js-modal-image").attr("src", imageSrc);
		  });
		})();
	</script>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'wp-bootstrap-4' ); ?></a>

	<header id="masthead" class="site-header <?php if ( get_theme_mod( 'sticky_header', 0 ) ) : echo 'sticky-top'; endif; ?>">
		<nav id="site-navigation" class="main-navigation navbar navbar-expand-lg navbar-dark bg-dark">
			<?php if( get_theme_mod( 'header_within_container', 0 ) ) : ?><div class="container-fluid"><?php endif; ?>
			<div class="col-12">
			
			  <div class="row">
				<div class="col-lg-3 col-sm-12 col-xs-12 logo">
				<?php the_custom_logo(); ?>

				<div class="site-branding-text">
					<?php
						if ( is_front_page() && is_home() ) : ?>
		                    <h1 class="site-title h3 mb-0"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="navbar-brand mb-0"><?php bloginfo( 'name' ); ?></a></h1>
		                <?php else : ?>
		                    <h2 class="site-title h3 mb-0"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="navbar-brand mb-0"><?php bloginfo( 'name' ); ?></a></h2>
		                <?php
						endif;

						if ( get_theme_mod( 'show_site_description', 1 ) ) {
		                    $description = get_bloginfo( 'description', 'display' );
		                    if ( $description || is_customize_preview() ) : ?>
		                        <p class="site-description"><?php echo esc_html( $description ); ?></p>
		                    <?php
		                    endif;
		                }
					?>
				</div>
				</div>
				<div class="col-lg-9 col-sm-12 col-xs-12 top-bar-right">
					<div class="row">
						<div class="col-lg-12">
							<div class="row">
								<!-- <div class="col-lg-4 col-md-4 col-xs-12"> -->
								  <?php //get_search_form(); ?>
								<!-- </div> Logins panel -->
								<div class="col-lg-12 col-md-12 col-xs-12 login-pan">
									<a class="btn" href="https://www.mo-dus.co.uk/Login/" target="_blank"><span class="grouploginsEmployee"></span>Employee</a>
	<!-- sg-popup-id-2635 -->		<a class="btn" href="https://www.mo-dus.co.uk/Login/" target="_blank"><span class="grouploginsClient"></span>Client</a>
	<!-- sg-popup-id-2638 -->		<a class="btn" href="https://www.mo-dus.co.uk/Login/" target="_blank"><span class="grouploginsSupplier"></span>Supplier</a>
								</div>
							</div>
						</div>
					</div>

					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#primary-menu-wrap" aria-controls="primary-menu-wrap" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<?php
						wp_nav_menu( array(
						'theme_location'  => 'menu-1',
						'menu_id'         => 'primary-menu',
						'container'       => 'div',
						'container_class' => 'collapse navbar-collapse',
						'container_id'    => 'primary-menu-wrap',
						'menu_class'      => 'navbar-nav ml-auto',
			            'fallback_cb'     => '__return_false',
			            'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
			            'depth'           => 2,
			            'walker'          => new WP_bootstrap_4_walker_nav_menu()
					) );
					?>
						<?php if( get_theme_mod( 'header_within_container', 0 ) ) : ?></div><!-- /.container --><?php endif; ?>
				</div>
			</div>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
