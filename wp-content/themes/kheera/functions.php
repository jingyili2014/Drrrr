<?php

	/**
	 * kheera functions and definitions
	 *
	 * @link https://developer.wordpress.org/themes/basics/theme-functions/
	 *
	 * @package kheera
	 */

	if ( ! function_exists( 'kheera_setup' ) ) :
		
		function kheera_setup() {
			
			/*
			 * Make theme available for translation.
			 * Translations can be filed in the /languages/ directory.
			 */
			load_theme_textdomain( 'kheera', get_template_directory() . '/languages' );

			// Add default posts and comments RSS feed links to head.
			add_theme_support( 'automatic-feed-links' );

			/*
			 * Let WordPress manage the document title.
			 */
			add_theme_support( 'title-tag' );

			/*
			 * Enable support for Post Thumbnails on posts and pages.
			 *
			 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
			 */
			add_theme_support( 'post-thumbnails' );
			add_image_size('kheera_large', 1600, 1067, true);
			add_image_size('kheera_normal', 1080, 700, true);
			add_image_size('kheera_medium', 720, 480, true);
			add_image_size('kheera_small',  400, 260, true);
			add_image_size('kheera_xsmall', 150, 100, true);

			
			/*
			 * Switch default core markup for search form, comment form, and comments
			 * to output valid HTML5.
			 */
			add_theme_support( 'html5', array(
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			) );

			// Add theme support for selective refresh for widgets.
			add_theme_support( 'customize-selective-refresh-widgets' );

			/**
			 * Add support for core custom logo.
			 *
			 * @link https://codex.wordpress.org/Theme_Logo
			 */
			add_theme_support( 'custom-logo', array(
				'height'      => 150,
				'width'       => 500,
				'flex-width'  => true,
				'flex-height' => true,
			) );
			
			// Add theme support for Post Formats
			add_theme_support( 'post-formats', array( 'gallery', 'video', 'audio', 'quote'  ) );
			
			// This theme uses wp_nav_menu() in one location.
			register_nav_menus( array(
				'Primary_Navigation' => esc_html__( 'Primary Navigation', 'kheera' ),
			) );
			
			//Add theme Woocommerce support
			add_theme_support( 'woocommerce' );
			
			// Set up the WordPress core custom background feature.
			add_theme_support( 'custom-background', apply_filters( 'kheera_custom_background_args', array(
				'default-color' => 'F3F5F5',
				'default-image' => '',
			) ) );
			
			/*
			 * Gutenberg Support Option
			 */
			
			// Add Wide Align Support
			add_theme_support( 'align-wide' );
			
			// Remove support for custom font-sizes
			add_theme_support('disable-custom-font-sizes');
						
			//Add theme support for editor styles
			add_theme_support('editor-styles');
			
			//Add theme support for default block styles
			add_theme_support( 'wp-block-styles' );
			
			//Add theme support for responsive embeds
			add_theme_support( 'responsive-embeds' );
	
		}
	endif;
	add_action( 'after_setup_theme', 'kheera_setup' );

	
	/**
	 * Set the content width in pixels, based on the theme's design and stylesheet.
	 *
	 * Priority 0 to make it available to lower priority callbacks.
	 *
	 * @global int $content_width
	 */
	function kheera_content_width() {
		$GLOBALS['content_width'] = apply_filters( 'kheera_content_width', 1200 );
	}
	add_action( 'after_setup_theme', 'kheera_content_width', 0 );

	/**
	 * Register widget areas.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
	 */
	function kheera_widgets_init() {
		
		//Main Sidebar
		register_sidebar( array(
			'name'          => esc_html__( 'Main Sidebar', 'kheera' ),
			'id'            => 'kheera_main_sidebar',
			'description'   => esc_html__( 'Add widgets here.', 'kheera' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4>',
			'after_title'   => '</h4>',
		) );
		
		//Hidden Sidebar
		register_sidebar( array(
			'name'          => esc_html__( 'Hidden Sidebar', 'kheera' ),
			'id'            => 'kheera_hidden_sidebar',
			'description'   => esc_html__( 'Add widgets here.', 'kheera' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4>',
			'after_title'   => '</h4>',
		) );
		
		//Before Content 
		register_sidebar( array(
			'name'          => esc_html__( 'Before Content', 'kheera' ),
			'id'            => 'kheera_before_content',
			'description'   => esc_html__( 'Add widgets here.', 'kheera' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4>',
			'after_title'   => '</h4>',
		) );
		
		//After Content 
		register_sidebar( array(
			'name'          => esc_html__( 'After Content', 'kheera' ),
			'id'            => 'kheera_after_content',
			'description'   => esc_html__( 'Add widgets here.', 'kheera' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4>',
			'after_title'   => '</h4>',
		) );
		
		//After Header 
		register_sidebar( array(
			'name'          => esc_html__( 'After Header', 'kheera' ),
			'id'            => 'kheera_after_header',
			'description'   => esc_html__( 'Add widgets here.', 'kheera' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4>',
			'after_title'   => '</h4>',
		) );
		
		//Instagram Footer 
		register_sidebar( array(
			'name'          => esc_html__( 'Instagram Footer', 'kheera' ),
			'id'            => 'kheera_instagram_footer',
			'description'   => esc_html__( 'Only for instagram widget.', 'kheera' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4>',
			'after_title'   => '</h4>',
		) );
		
		//Footer Section 1
		register_sidebar( array(
			'name'          => esc_html__( 'Footer Section 1', 'kheera' ),
			'id'            => 'kheera_footer_section_1',
			'description'   => esc_html__( 'Add widgets here.', 'kheera' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4>',
			'after_title'   => '</h4>',
		) );
		
		//Footer Section 2
		register_sidebar( array(
			'name'          => esc_html__( 'Footer Section 2', 'kheera' ),
			'id'            => 'kheera_footer_section_2',
			'description'   => esc_html__( 'Add widgets here.', 'kheera' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4>',
			'after_title'   => '</h4>',
		) );
		
		//Footer Section 3
		register_sidebar( array(
			'name'          => esc_html__( 'Footer Section 3', 'kheera' ),
			'id'            => 'kheera_footer_section_3',
			'description'   => esc_html__( 'Add widgets here.', 'kheera' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4>',
			'after_title'   => '</h4>',
		) );
	}
	add_action( 'widgets_init', 'kheera_widgets_init' );

	/**
	 * Enqueue scripts and styles.
	 */
	function kheera_scripts() {
		
		
		//Add Google Fonts
		wp_enqueue_style( 'Google-Fonts',
						esc_url_raw('//fonts.googleapis.com/css' . kheera_google_fonts_query( 
							array ( 
								'0' => get_theme_mod('kheera_headings_font_family_setting','Oranienbaum,serif'),
								'1' => get_theme_mod('kheera_body_font_family_setting','Overlock,cursive'),
								'2' => get_theme_mod('kheera_extra_font_family_setting','Voces,cursive'),),
						    get_theme_mod('kheera_font_language_setting','latin'))),
						array(),
						null,
						'all');
		
		
		//add style sheets
		wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), null, 'all' );
		wp_enqueue_style( 'animate', get_template_directory_uri() . '/assets/css/animate.css', array(), null, 'all' );
		wp_enqueue_style( 'owl-carousel', get_template_directory_uri() . '/assets/css/owl.carousel.min.css', array(), null, 'all' );
		wp_enqueue_style( 'font-awesome', get_template_directory_uri() .'/assets/css/fontawesome-all.min.css', array(), null, 'all' );
		
		
		if(is_singular('product')){
			wp_enqueue_style( 'magnific-popup-css', get_template_directory_uri() .'/assets/css/magnific-popup.css', array(), null, 'all' );
		}	
		
		wp_enqueue_style( 'kheera-style', get_template_directory_uri() .'/assets/css/kheera.css', array(), null, 'all' );	
		
		/* Enable RTL Support if it's activated 
		*  in customizer options.
		*
		*  @since 1.0.1	 
		*
		*/
		if(get_theme_mod('kheera_rtl_support_setting')){
			wp_enqueue_style( 'kheera-style-rtl', get_template_directory_uri() .'/assets/css/kheera-rtl.css', array(), null, 'all' );
		}
			
		
		wp_enqueue_style( 'kheera-theme-style', get_stylesheet_uri() );
		
		
		//add scripts
		wp_enqueue_script( 'kheera-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), '20151215', true );
		wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), null, true );
		wp_enqueue_script( 'jquery-owl-carousel-js', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', array('jquery'), null, true );
		
		if(is_singular('product')){
			wp_enqueue_script( 'jquery-Magnific-popup-js', get_template_directory_uri() . '/assets/js/jquery.magnific-popup.min.js', array('jquery'), null, true );
		}
		
		wp_enqueue_script( 'kheera-scripts', get_template_directory_uri() . '/assets/js/kheera.js', array('jquery'), null, true );
		
		
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
	add_action( 'wp_enqueue_scripts', 'kheera_scripts' );

	
	
	
	/*
	 * Kheera styles the visual editor to resemble the theme style,
	 * specifically font, colors, and column width.
	 *
	 * @since 1.0.1
	 */
	add_editor_style( 'assets/css/editor-style.css' );
	
	
	/**
	 * Custom template tags for this theme.
	 */
	if ( file_exists(  get_template_directory().'/inc/template-tags.php')){
		require_once( ( get_template_directory() .'/inc/template-tags.php'));
	}

	/**
	 * Functions which enhance the theme by hooking into WordPress.
	 */
	if ( file_exists(  get_template_directory().'/inc/template-functions.php')){
		require_once( ( get_template_directory() .'/inc/template-functions.php'));
	}
	
	/**
	 * Woocommerce Related Functions .
	 */
	if ( file_exists(  get_template_directory().'/inc/woocommerce-functions.php')){
		require_once( ( get_template_directory() .'/inc/woocommerce-functions.php'));
	}

	
	/**
	* Google fonts functions and array
	*/
	if ( file_exists(  get_template_directory().'/inc/kheera_fonts.php')){
		require_once( ( get_template_directory() .'/inc/kheera_fonts.php'));
	}
	
	/**
	 * Customizer additions.
	 */
	if ( file_exists(  get_template_directory().'/inc/customizer.php')){
		require_once( ( get_template_directory() .'/inc/customizer.php'));
	}
	
	/**
	 * Kheera Nav Walker Class
	 */
	if ( file_exists(  get_template_directory().'/inc/kheera_nav_walker.php')){
		require_once( ( get_template_directory() .'/inc/kheera_nav_walker.php'));
	}
	
	/**
	 * Kheera StickyMenu-Secondary Navigation Nav Walker Class
	 */
	if ( file_exists(  get_template_directory().'/inc/kheera_sticky_nav_walker.php')){
		require_once( ( get_template_directory() .'/inc/kheera_sticky_nav_walker.php'));
	}
	
	/**
	 * Kheera Widgets Nav Walker Class
	 */
	if ( file_exists(  get_template_directory().'/inc/kheera_widget_nav_walker.php')){
		require_once( ( get_template_directory() .'/inc/kheera_widget_nav_walker.php'));
	}
	
	
	/**
	 * Kheera Latest Comments Widget
	 */
	if ( file_exists(  get_template_directory().'/inc/widgets/kheera_latest_comments.php')){
		require_once( ( get_template_directory() .'/inc/widgets/kheera_latest_comments.php'));
	}
	
	/**
	 * Kheera Latest Posts Widget
	 */
	if ( file_exists(  get_template_directory().'/inc/widgets/kheera_latest_posts.php')){
		require_once( ( get_template_directory() .'/inc/widgets/kheera_latest_posts.php'));
	}
	
	/**
	 * Kheera Popular Posts Widget
	 */
	if ( file_exists(  get_template_directory().'/inc/widgets/kheera_popular_posts.php')){
		require_once( ( get_template_directory() .'/inc/widgets/kheera_popular_posts.php'));
	}
	
	
	/**
	 * Kheera - TGM Plugin Activator Class
	 */
	if ( file_exists(  get_template_directory().'/inc/lib/class-tgm-plugin-activation.php')){
		require_once( get_template_directory().'/inc/lib/class-tgm-plugin-activation.php');
		
		//TGMPA configuration
		if ( file_exists(  get_template_directory().'/inc/lib/tgm-plugins.php')){
			require_once( get_template_directory().'/inc/lib/tgm-plugins.php');
		
			add_action( 'tgmpa_register', 'kheera_register_plugins' );
		}	
	}	
	

	/**
	 * Load Jetpack compatibility file.
	 */
	if ( defined( 'JETPACK__VERSION' ) ) {
		if ( file_exists(  get_template_directory().'/inc/jetpack.php')){
		require_once( ( get_template_directory() .'/inc/jetpack.php'));
		}
	}

	
	/**
	 * Add Theme Inline Styles
	 *
	 * @package kheera	
	 *
	 * @since 1.0.0
	 */	
	function kheera_inline_styles() {

		wp_enqueue_style( 'kheera-style', get_stylesheet_uri() );
		
		$custom_css = "\n".'/* Kheera Custom CSS Styles  */'."\n";
		
		//typography - master font settings
		
		$custom_css .= " \n\n /* Main Font Size */";
		$custom_css .= " \n html{ font-size: ".get_theme_mod('kheera_body_font_size_setting','18')."px; 	}";
		
		$custom_css .= "\n\n /* Main Font */";
		$custom_css .= " \n body, footer, .shop_table .product-price {
			".kheera_google_fonts_css(get_theme_mod('kheera_body_font_family_setting','Overlock,cursive'))."
		}";
		
		$custom_css .= " \n\n /*Heading Font */";
		$custom_css .= " \n .search-form-container .search-form-input, .prev-post-nav-container a, .next-post-nav-container a,
		.top-bar-cart-total-container, h1,h2,h3,h4,h5,h6, span.dropcap, .dropcap::first-letter,
		.widget .latest-post-container p, .promo-box-sub-title, footer .widget .latest-post-container p,
		.post-comment-container h6 {
			".kheera_google_fonts_css(get_theme_mod('kheera_headings_font_family_setting','Oranienbaum,serif'))."
		}";	
		
		$custom_css .= " \n\n /* Buttons - Extra Font */";
		$custom_css .= " \n .on-sale-indicator-container, .product-category, .product-before-sale-price, .product-price
		.add-product-quantity-button, .remove-product-quantity-button, .product-quantity-form-input
		.add-to-cart-form-submit, .product-meta-container table, .product-meta-container  td,
		.product-social-share-container, .search-form-close, .top-post-meta-container,
		.bottom-post-meta-container, .related-post-container, .top-bar-product-container,
		.top-bar-cart-button, .widget .newsletter-form-input, .widget .newsletter-form-submit,
		footer .widget .newsletter-form-input, footer .widget .newsletter-form-submit ,
		.post-comment-container h6 .comment-date, .comment-reply-link, .footer-bar,
		.slider-category, .slider-author, .slider-date, .slider-comments, .navbar-nav  li  a,
		.navbar a, .secondary-navigation .navbar-nav  li  a, .read-more-button, .comment-form-submit {
			".kheera_google_fonts_css(get_theme_mod('kheera_extra_font_family_setting','Voces,cursive'))."
		}";	
		
		
		//master color settings
		
		$custom_css .= " \n\n /* Main Color */";
	
		$custom_css .= " \n .scroll-to-top, .search-form-container .search-form-submit, .post-tags-meta	a,
		.top-bar-cart-button, .label-primary, 
		footer .widget .newsletter-form-submit, .widget .newsletter-form-submit, .cart-icon-container,
		.read-more-button, .on-sale-indicator-container, .add-to-cart-form-submit,
		footer .widget .tag-cloud-link:hover, .comment-form-submit, .woocommerce #respond input#submit.alt, 
		.woocommerce a.button.alt, .woocommerce button.button.alt, 
		.woocommerce input.button.alt, .woocommerce button.button.alt.disabled, .widget .search-form-submit,
		.woocommerce a.button, .add_to_cart_button, .woocommerce a.button, 
		.woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit,
		.sticky-progress-bar, .read-more-button:focus, .read-more-button:active, .read-more-button:focus:active,
		.btn-primary, .btn-primary:focus, .btn-primary:focus:active, .btn-primary:active, .woocommerce-store-notice,
		p.demo_store {
			background-color:".get_theme_mod('kheera_main_color_setting').";
		}";

		$custom_css .= "\n\n a, .search-form-close:hover, .related-post-container a:hover, .post-share-meta a:hover,
		.top-post-meta-container a:hover, .main-post-gallery-container .owl-prev,
		.main-post-gallery-container  .owl-next,	.top-bar-product-container a,
		.main-col-container ul li:before, 	.single-col-container ul li:before,.product-single-col-container ul li:before,
		.product-main-col-container ul li:before, .main-col-container ol li:before,
		.single-col-container ol li:before, .product-single-col-container ol li:before,
		.product-main-col-container ol li:before, .widget li, .widget li a:hover, .widget .navbar-nav  li  a:hover,
		.top-bar-icons a:hover, .top-bar-icons i:hover,.home-slider-container .owl-prev,
		.home-slider-container .owl-next, .product-social-share-container a:hover, .post-comment-container a,
		.related-product-container a:hover, .widget .latest-post-container a:hover,
		.content-widget-area .widget .popular-posts-slider-3 .owl-prev:hover, 
		.content-widget-area .widget .popular-posts-slider-3  .owl-next:hover,
		.content-widget-area .widget .popular-posts-slider-item h5:hover,
		.content-widget-area .widget .popular-posts-slider-3 .owl-dot:hover,
		.widget .popular-posts-slider .owl-dot:hover, .widget .popular-posts-slider .owl-prev:hover,
		.widget .popular-posts-slider  .owl-next:hover, .widget .popular-posts-slider-item h5:hover,
		.hide-top-bar-shopping-cart {
			color:".get_theme_mod('kheera_main_color_setting').";
		}";

		$custom_css .= "\n\n footer .widget h4, .widget h4, .navbar-nav li a:hover, .product-tabs-titles-container .active,
		.product-tabs-titles-container h3:hover, #preloader {
			border-color: ".get_theme_mod('kheera_main_color_setting').";
		}";	
		
		$custom_css .= "\n\n \n /* Main Text Color */";
		$custom_css .= " \n .scroll-to-top  a, .search-form-submit, .post-tags-meta	a,
		.main-post-gallery-container .owl-prev:hover, .main-post-gallery-container  .owl-next:hover,
		.top-bar-cart-button, .label-primary, footer .widget .newsletter-form-submit,
		.widget .newsletter-form-submit, .cart-icon-container, .read-more-button, .on-sale-indicator-container,
		.add-to-cart-form-submit, .comment-form-submit, .woocommerce #respond input#submit.alt, 
		.woocommerce a.button.alt, .woocommerce button.button.alt, 
		.woocommerce input.button.alt, .woocommerce button.button.alt.disabled, .widget .search-form-submit,
		.woocommerce a.button, .add_to_cart_button, .woocommerce a.button, 
		.woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit {
			color:".get_theme_mod('kheera_main_text_color_setting').";
		}";	
		
		$custom_css .= " \n \n /* Main Hover Color */";
		$custom_css .= " \n .scroll-to-top:hover, .search-form-container .search-form-submit:hover, .post-tags-meta	a:hover,
		.top-bar-cart-button:hover, .label-primary:hover, footer .widget .newsletter-form-submit:hover,
		.widget .newsletter-form-submit:hover, .read-more-button:hover, .add-to-cart-form-submit:hover,
		.comment-form-submit:hover, .woocommerce #respond input#submit.alt:hover, 
		.woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, 
		.woocommerce input.button.alt:hover, .woocommerce button.button.alt.disabled:hover,
		.widget .search-form-submit:hover, .woocommerce a.button:hover, .add_to_cart_button:hover,
		.woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover,
		.woocommerce #respond input#submit:hover		{
			background-color:".get_theme_mod('kheera_main_hover_color_setting').";
		}";

		$custom_css .= " \n .hide-top-bar-shopping-cart:hover{
			color:".get_theme_mod('kheera_main_hover_color_setting').";
		}";	
		
		$custom_css .= " \n \n /* Main Text Hover Color */";
		$custom_css .= " \n .scroll-to-top:hover a, .search-form-container .search-form-submit:hover, .post-tags-meta a:hover,
		.top-bar-cart-button:hover, .label-primary:hover, footer .widget .newsletter-form-submit:hover,
		.widget .newsletter-form-submit:hover,.home-slider-container .owl-prev:hover ,
		.home-slider-container .owl-next:hover, .read-more-button:hover, .add-to-cart-form-submit:hover,
		.comment-form-submit:hover, .woocommerce #respond input#submit.alt:hover, 
		.woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, 
		.woocommerce input.button.alt:hover, .woocommerce button.button.alt.disabled:hover,
		.widget .search-form-submit:hover, .woocommerce a.button:hover, .add_to_cart_button:hover,
		.woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover,
		.woocommerce #respond input#submit {
			color:".get_theme_mod('kheera_main_hover_text_color_setting').";
		}";	
		
		
		//slider style 3
		if(kheera_get_header_slider_style()==3){
			
			if ( (is_home() || is_front_page() )  || get_theme_mod('kheera_header_slider_display_pages_setting')){
			
				$custom_css .= "\n\n".'/* Kheera Slider Styles  */'."\n
					\n header { 
					\n 	height:630px; 
					\n } 
					\n  
					\n @media (min-width: 1200px) {
					\n 	header {
					\n 		height:630px;
					\n 	}
					\n }
					\n 
					\n @media (min-width: 992px) and (max-width: 1199px) { 
					\n 	header {
					\n 		height:630px;
					\n 	}
					\n }
					\n 
					\n @media (min-width: 768px) and (max-width: 991px) {
					\n 	header {
					\n 		height:530px;
					\n 	}
					\n }
					\n 
					\n @media (max-width: 767px) {
					\n 	header {
					\n 		height:400px;
					\n 	}
					\n }";
			}	
		}	
		
		wp_add_inline_style( 'kheera-style', stripslashes(wp_filter_nohtml_kses( $custom_css)) );
			
	}
	add_action( 'wp_enqueue_scripts', 'kheera_inline_styles' );
	
	
	/**
	 * Add Theme Inline Slider Scripts
	 *
	 * @package kheera	
	 *
	 * @since 1.0.0
	 */	
	function kheera_slider_script(){
		
		wp_enqueue_script( 'kheera-scripts', get_template_directory_uri() . '/assets/js/kheera.js', array('jquery'), null, true );
		
		
		//create the jquery script
		$inline_script = '(function ($) { "use strict";';
		
		$inline_script .= "\n".'$(document).ready(function(){';
		
		if(is_singular('product')){
			//initiate product featured image lightbox zoom
			$inline_script .= "\n"."$('.product-featured-image').magnificPopup({type:'image'});";
		}
		
		if(get_theme_mod( 'kheera_header_slider_display_pages_setting') || is_home() || is_front_page() ){
		
			switch(kheera_get_header_slider_style()){
				case '1':
						$inline_script .= "\n".' $(".home-slider-1").owlCarousel({
												items:2,
												loop:true,
												lazyLoad: true,
												nav : true, 
												pagination: false,
												dots:false, 
												smartSpeed:700,
												margin:0,
												center:true,
												autoWidth:true,
												stagePadding:0, 
												navText:  ["<i class=\'fa fa-angle-left\'></i>","<i class=\'fa fa-angle-right\'></i>"],
												responsive : {	
												0 : { 
													items:1,
													autoHeight:false,
													autoWidth:false
												},
												767 : {
													items:1 
												},
												991 : {	
													items:2
												},
												1300 :{ 
													items:2 
												}
											}
										});'; 	
						 break;	
				case '2':
						$inline_script .= "\n".'$(".home-slider-2").owlCarousel({
											items:2,
											loop:true,
											lazyLoad: true,
											nav : true, 
											pagination: false,
											dots:false, 
											smartSpeed:700,
											margin:0,
											center:false,
											autoWidth:false,
											stagePadding:0, 
											navText:  ["<i class=\'fa fa-angle-left\'></i>","<i class=\'fa fa-angle-right\'></i>"],
											responsive : {	
												0 : { 
													items:1,
													autoHeight:false,
													autoWidth:false,
													center:true
												},
												767 : {
													items:1 
												},
												991 : {	
													items:2
												},
												1300 :{ 
													items:2 
												}
											}
										});';
						break;	
				case '3':
						$inline_script .= "\n".'$(".home-slider-3").owlCarousel({
											items:1,
											loop:true,
											lazyLoad: true,
											nav : true, 
											pagination: false,
											dots:false, 
											smartSpeed:700,
											margin:0,
											center:false,
											autoWidth:false,
											stagePadding:0, 
											navText:  ["<i class=\'fa fa-angle-left\'></i>","<i class=\'fa fa-angle-right\'></i>"],
											responsive : {	
												0 : { 
													items:1,
													autoHeight:false,
													autoWidth:false,
													center:true
												},
												767 : {
													items:1 
												},
												991 : {	
													items:1
												},
												1300 :{ 
													items:1 
												}
											}
										});';
						break;	
				default:
						$inline_script .= "\n".' $(".home-slider-1").owlCarousel({
												items:2,
												loop:true,
												lazyLoad: true,
												nav : true, 
												pagination: false,
												dots:false, 
												smartSpeed:700,
												margin:0,
												center:true,
												autoWidth:true,
												stagePadding:0, 
												navText:  ["<i class=\'fa fa-angle-left\'></i>","<i class=\'fa fa-angle-right\'></i>"],
												responsive : {	
												0 : { 
													items:1,
													autoHeight:false,
													autoWidth:false
												},
												767 : {
													items:1 
												},
												991 : {	
													items:2
												},
												1300 :{ 
													items:2 
												}
											}
										});'; 
						break;
			}	
		
		}
		$inline_script .= "\n".'});	 ';
		$inline_script .= "\n".'})(jQuery);	 ';
		
		wp_add_inline_script( 'kheera-scripts', $inline_script);
			
	}
	add_action( 'wp_enqueue_scripts', 'kheera_slider_script' );
	
	
	

	
