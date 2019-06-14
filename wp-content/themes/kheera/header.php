<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package kheera
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> itemscope itemtype="https://schema.org/WebPage">

		
		<div class="search-form-container container-fluid">
			<?php get_search_form(); ?>
		</div> 
			
			
		<?php	if(get_theme_mod( 'kheera_back_to_top_setting')): ?>
			<div class="scroll-to-top">
				<a id="return-to-top"><i class="fas fa-angle-up"></i></a>
			</div>
		<?php endif; ?>	
			
		<?php	if(get_theme_mod( 'kheera_loader_setting')): ?>
			<div id="preloader-wrapper">
				<div id="preloader"></div>
				<div class="preloader-section"></div>
			</div>
		<?php endif; ?>	
		
		
		<header class="container-fluid">
			
			<?php	if(get_theme_mod( 'kheera_header_top_bar_display_setting', true )): ?>
				<div class="top-bar-icons">	
					<div class="container">
						<div class="row">
							<div class="col-md-6 col-sm-6 col-xs-6 top-bar-social-icons">
								<ul class="top-bar-social-icons">
									<?php kheera_social_icons_list_items(); ?>
								</ul> 
							</div>
							<div class="col-md-6 col-sm-6 col-xs-6 top-bar-features-icons">
								<ul class="top-bar-features-icons" >
									
									<li><a><i class="fas fa-search hidden-search-icon" aria-hidden="true"></i></a></li>
									
									<li><a><i class="fas fa-bars hidden-sidebar-icon" aria-hidden="true"></i></a></li>
									
									<?php if ( class_exists( 'WooCommerce' ) ): ?>
										<li><a href="<?php echo esc_url(wc_get_cart_url()); ?>"><i class="fas fa-shopping-cart hidden-cart-icon" aria-hidden="true">
											<span class="cart-icon-container"><?php  echo esc_html(WC()->cart->get_cart_contents_count()); ?> </span></i></a>
										</li>
									<?php endif; ?>	
								</ul> 
							</div>
						</div>
					</div>	
				</div>
			<?php endif; ?>	
			
			<div class="container logo-container align-center">
				
				<?php if( has_custom_logo()): ?>
				<div itemscope itemtype="http://schema.org/Brand">
					<?php the_custom_logo(); ?>
				</div>
				<?php else: ?>
					<h1>
						<a href="<?php print esc_url(home_url( '/' )); ?>">
							<?php print esc_html(get_bloginfo( 'name', 'display' ) ); ?>
						</a>
					</h1>
					
				<?php endif; ?>
				
			</div>
			
			
			<div class="primary-navigation">
				<div class="container">
					<nav class="navbar">
						<a class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapse-navigation" ><i class="fa fa-bars menu-toggle"></i></a>
						<div id="collapse-navigation" class="col-md-10 col-sm-12 col-xs-12 collapse navbar-collapse" itemscope itemtype="https://schema.org/SiteNavigationElement">
							<?php wp_nav_menu( array('theme_location' => 'Primary_Navigation', 
													 'walker'=>new Kheera_Nav_Walker(),
												     'menu_class'=>'nav navbar-nav' ) );
							?>	
						</div>	
					</nav>
				</div>
			</div>
			
			<?php if((is_home() || is_front_page() )  || get_theme_mod('kheera_header_slider_display_pages_setting')): ?>
			<div class="container-fluid home-slider-container">
				<div class="home-slider-<?php print esc_attr(kheera_get_header_slider_style()); ?> owl-carousel owl-theme" itemscope itemtype="http://schema.org/ItemList">
					<?php kheera_display_header_slider_items(); ?>
				</div>
			</div>
			<?php endif; ?>
			
		</header>

		
		<aside class="hidden-sidebar">
			<div class="hidden-sidebar-close">
				<a id="sidebar-close"><i class="fas fa-window-close"></i></a>
			</div>
			<div class="widget-area row">
				<?php dynamic_sidebar( 'kheera_hidden_sidebar' ); ?>	
			</div>
		</aside>
	
		
		
		<?php	if(get_theme_mod( 'kheera_sticky_menu_setting', true )): ?>
		<div id="sticky-menu" class="secondary-navigation">
				<div class="container">
					<div class="col-md-2 col-sm-2 col-xs-6 secondary-logo-container"> <!-- logo container -->
						<?php if(get_theme_mod('kheera_secondary_logo_setting')): ?>
							<a href="<?php print esc_url_raw(home_url( '/' )); ?>">
							<img class="img-responsive" 
							src="<?php print esc_url_raw(get_theme_mod('kheera_secondary_logo_setting')); ?>" 
							alt="<?php print esc_attr(get_bloginfo( 'name', 'display' ) ); ?>"/></a>
						<?php endif; ?>	
					</div>
					<nav class="col-md-9 col-sm-9 col-xs-6"> <!-- sticky menu navigation -->
						<a class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapse-sticky-navigation" ><i class="fa fa-bars menu-toggle"></i></a>
						<div id="collapse-sticky-navigation" class="collapse navbar-collapse" itemscope itemtype="https://schema.org/SiteNavigationElement">
							<?php wp_nav_menu( array('theme_location' => 'Primary_Navigation', 
													 'walker'=>new Kheera_Sticky_Nav_Walker(),
												     'menu_class'=>'nav navbar-nav' ) );
							?>	
						</div>
					</nav>
				</div>
				<?php	if(get_theme_mod( 'kheera_sticky_menu_progress_setting', true )): ?>
					<div class="sticky-progress-bar-container">
						<div class="sticky-progress-bar"></div>
					</div>
				<?php endif; ?>	
		</div>
		<?php endif; ?>	
	
	
		
		<div class="container after-header-widget-area">
			
			<?php	if(get_theme_mod( 'kheera_display_promo_boxes_setting', true ) && (is_home() || is_front_page())): ?>
				<div class="widget"><!-- Promo Boxes -->
					<div class="row">
						<?php
							kheera_display_header_promo_box(1);
							kheera_display_header_promo_box(2);
							kheera_display_header_promo_box(3);
						?>
					</div>
				</div>	
			<?php endif; ?>
			
			<?php dynamic_sidebar( 'kheera_after_header' ); ?>	
			
		</div>
