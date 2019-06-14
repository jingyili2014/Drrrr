<?php

	/**
	 * kheera Theme Customizer
	 *
	 * @package kheera
	 */

	/**
	 * Add postMessage support for site title and description for the Theme Customizer.
	 *
	 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
	 */
	function kheera_customize_register( $wp_customize ) {
		$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
		$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
		$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

		if ( isset( $wp_customize->selective_refresh ) ) {
			$wp_customize->selective_refresh->add_partial( 'blogname', array(
				'selector'        => '.site-title a',
				'render_callback' => 'kheera_customize_partial_blogname',
			) );
			$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
				'selector'        => '.site-description',
				'render_callback' => 'kheera_customize_partial_blogdescription',
			) );
		}
		
		//Typography Settings
		
		$wp_customize->add_section( 'kheera_typography_settings', array(
									'priority'       => 1,
									'capability'     => 'edit_theme_options',
									'theme_supports' => '',
									'title'          => __('Typography Settings', 'kheera'),));	
		
		//headings font 
		$wp_customize->add_setting( 'kheera_headings_font_family_setting' , array(
									'default' => 'Oranienbaum,serif',
									'transport' => 'refresh',
									'sanitize_callback' => 'kheera_choices_sanitize',) );
		$wp_customize->add_control(	'kheera_headings_font_family_setting', 	array(
									'label'    => __( 'Select the Headings font family', 'kheera' ),
									'section'  => 'kheera_typography_settings',
									'settings' => 'kheera_headings_font_family_setting',
									'type'     => 'select',
									'choices'  => kheera_google_fonts_array(),));

		
		//Body Text font 
		$wp_customize->add_setting( 'kheera_body_font_family_setting' , array(
									'default' => 'Overlock,cursive',
									'transport' => 'refresh',
									'sanitize_callback' => 'kheera_choices_sanitize',) );
		$wp_customize->add_control(	'kheera_body_font_family_setting', 	array(
									'label'    => __( 'Select the Body font family', 'kheera' ),
									'section'  => 'kheera_typography_settings',
									'settings' => 'kheera_body_font_family_setting',
									'type'     => 'select',
									'choices'  => kheera_google_fonts_array(),));
									
		//Navigation & Buttons font 
		$wp_customize->add_setting( 'kheera_extra_font_family_setting' , array(
									'default' => 'Voces,cursive',
									'transport' => 'refresh',
									'sanitize_callback' => 'kheera_choices_sanitize',) );
		$wp_customize->add_control(	'kheera_extra_font_family_setting', 	array(
									'label'    => __( 'Select the Navigation & Buttons font family', 'kheera' ),
									'section'  => 'kheera_typography_settings',
									'settings' => 'kheera_extra_font_family_setting',
									'type'     => 'select',
									'choices'  => kheera_google_fonts_array(),));							

		//Body Text font size  
		$wp_customize->add_setting( 'kheera_body_font_size_setting' , array(
									'default' => 22,
									'transport' => 'refresh',
									'sanitize_callback' => 'kheera_range_sanitize',) );
		$wp_customize->add_control(	'kheera_body_font_size_setting', 	array(
									'label'    => __( 'Font Size: ', 'kheera' ),
									'section'  => 'kheera_typography_settings',
									'settings' => 'kheera_body_font_size_setting',
									'type'     => 'range',
									'input_attrs' => array( 'min'   => 18,
															 'max'   => 30,
															 'step'  => 1,),));

		//Font Language
		$wp_customize->add_setting( 'kheera_font_language_setting' , array(
									'default' => 'latin',
									'transport' => 'refresh',
									'sanitize_callback' => 'kheera_choices_sanitize',) );
		$wp_customize->add_control(	'kheera_font_language_setting', 	array(
									'label'    => __( 'Select Language Character Set for the selected fonts.', 'kheera' ),
									'description' => __('Note: Not all fonts support all the languages character sets listed','kheera'),
									'section'  => 'kheera_typography_settings',
									'settings' => 'kheera_font_language_setting',
									'type'     => 'select',
									'choices'  => array('arabic' => 'Arabic',
														'bengali' => 'Bengali',
														'cyrillic' => 'Cyrillic',
														'devanagari' => 'Devanagari',
														'greek' => 'Greek',
														'gujarati' => 'Gujarati',
														'hebrew' => 'Hebrew',
														'kannada' => 'Kannada',
														'khmer' => 'Khmer',
														'latin' => 'Latin',
														'malayalam' => 'Malayalam',
														'myanmar' => 'Myanmar',
														'oriya' => 'Oriya',
														'sinhala' => 'Sinhala',
														'tamil' => 'Tamil',
														'telugu' => 'Telugu',
														'thai' => 'Thai',
														'vietnamese' => 'Vietnamese'),));	
		
		
		//Color Settings
		
		$wp_customize->add_section( 'kheera_color_settings', array(
									'priority'       => 2,
									'capability'     => 'edit_theme_options',
									'theme_supports' => '',
									'title'          => __('Color Settings', 'kheera'),));
		//Main Color							
		$wp_customize->add_setting( 'kheera_main_color_setting' , array(
									'default' => '#AB4234',
									'transport' => 'refresh',
									'sanitize_callback' => 'kheera_hex_color_sanitize',) );							
		$wp_customize->add_control( new WP_Customize_Color_Control( 
										$wp_customize,
										'kheera_main_color_setting', 
										array(	'label'      => __( 'Main Color', 'kheera' ),
												'section'    => 'kheera_color_settings',
												'settings'   => 'kheera_main_color_setting',)));
		//Main Text Color							
		$wp_customize->add_setting( 'kheera_main_text_color_setting' , array(
									'default' => '#FFFFFF',
									'transport' => 'refresh',
									'sanitize_callback' => 'kheera_hex_color_sanitize',) );							
		$wp_customize->add_control( new WP_Customize_Color_Control( 
										$wp_customize,
										'kheera_main_text_color_setting', 
										array(	'label'      => __( 'Main Text Color', 'kheera' ),
												'description' => __('Used only if main color is the background color of the element','kheera'),
												'section'    => 'kheera_color_settings',
												'settings'   => 'kheera_main_text_color_setting',)));
		//Main Hover Color							
		$wp_customize->add_setting( 'kheera_main_hover_color_setting' , array(
									'default' => '#161717',
									'transport' => 'refresh',
									'sanitize_callback' => 'kheera_hex_color_sanitize',) );							
		$wp_customize->add_control( new WP_Customize_Color_Control( 
										$wp_customize,
										'kheera_main_hover_color_setting', 
										array(	'label'      => __( 'Main Hover Color', 'kheera' ),
												'description' => __('For elements using the main color','kheera'),
												'section'    => 'kheera_color_settings',
												'settings'   => 'kheera_main_hover_color_setting',)));
		//Main Hover Text Color							
		$wp_customize->add_setting( 'kheera_main_hover_text_color_setting' , array(
									'default' => '#FFFFFF',
									'transport' => 'refresh',
									'sanitize_callback' => 'kheera_hex_color_sanitize',) );							
		$wp_customize->add_control( new WP_Customize_Color_Control( 
										$wp_customize,
										'kheera_main_hover_text_color_setting', 
										array(	'label'      => __( 'Hover Text color when main hover color is used in background', 'kheera' ),
												'description' => __('Used only if main hover color is the background color of the element','kheera'),
												'section'    => 'kheera_color_settings',
												'settings'   => 'kheera_main_hover_text_color_setting',)));
		
		//Header Settings
		
		$wp_customize->add_panel( 'kheera_header_options', array(
								  'priority'       => 3,
								  'capability'     => 'edit_theme_options',
								  'theme_supports' => '',
								  'title'          => __( 'Header Settings', 'kheera' ),));
								  
		//Header Layout Options
		$wp_customize->add_section( 'kheera_header_settings', array(
									'priority'       => 1,
									'capability'     => 'edit_theme_options',
									'theme_supports' => '',
									'title'          => __('Header Layout', 'kheera'),
									'panel'  => 'kheera_header_options',	) );
		
		//top bar display
		$wp_customize->add_setting( 'kheera_top_bar_display_setting' , array(
									'default' => true,
									'transport' => 'refresh',
									'sanitize_callback' => 'kheera_bool_sanitize',) );
		$wp_customize->add_control(	'kheera_top_bar_display_setting', 	array(
									'label'    => __( 'Display Header Top Bar', 'kheera' ),
									'description' => __('If Header Top Bar is not displayed: search, hidden sidebar and shopping cart will not be available','kheera'),
									'section'  => 'kheera_header_settings',
									'settings' => 'kheera_top_bar_display_setting',
									'type'     => 'checkbox',));										
	
		
		//header style
		$wp_customize->add_setting( 'kheera_header_slider_style_setting' , array(
									'default' => '3',
									'transport' => 'refresh',
									'sanitize_callback' => 'kheera_choices_sanitize',) );
		$wp_customize->add_control(	'kheera_header_slider_style_setting', 	array(
									'label'    => __( 'Select Header Layout', 'kheera' ),
									'section'  => 'kheera_header_settings',
									'settings' => 'kheera_header_slider_style_setting',
									'type'     => 'radio',
									'choices'  => array('1'  => __('3 Posts Slider','kheera'),
														'2'  => __('2 Posts Slider','kheera'),
														'3'  => __('Full Header Slider','kheera'),),));

		//Header Slider Options
		$wp_customize->add_section( 'kheera_header_slider_settings', array(
									'priority'       => 2,
									'capability'     => 'edit_theme_options',
									'theme_supports' => '',
									'title'          => __('Header Slider', 'kheera'),
									'panel'  => 'kheera_header_options',) );

		
		//slider display on all pages
		$wp_customize->add_setting( 'kheera_header_slider_display_pages_setting' , array(
									'default' => false,
									'transport' => 'refresh',
									'sanitize_callback' => 'kheera_bool_sanitize',) );
		$wp_customize->add_control(	'kheera_header_slider_display_pages_setting', 	array(
									'label'    => __( 'Display Slider on all pages', 'kheera' ),
									'description' => __('If set, this option will enable slider to display on all the pages of the site. Otherwise it will be displayed only on home page.','kheera'),
									'section'  => 'kheera_header_slider_settings',
									'settings' => 'kheera_header_slider_display_pages_setting',
									'type'     => 'checkbox',));	
		
		
		// slider posts number
		$wp_customize->add_setting( 'kheera_slider_posts_number_setting' , array(
									'default' => 4,
									'transport' => 'refresh',
									'sanitize_callback' => 'kheera_range_sanitize',) );
		$wp_customize->add_control(	'kheera_slider_posts_number_setting', 	array(
									'label'    => __( 'How many posts to show? ', 'kheera' ),
									'section'  => 'kheera_header_slider_settings',
									'settings' => 'kheera_slider_posts_number_setting',
									'type'     => 'range',
									'input_attrs' => array( 'min'   => 3,
															 'max'   => 8,
															 'step'  => 1,),));	
		
		

		// Slider posts category
		$wp_customize->add_setting( 'kheera_slider_posts_category_setting' , array(
									'default' => 'ALL',
									'transport' => 'refresh',
									'sanitize_callback' => 'kheera_choices_sanitize',) );
		$wp_customize->add_control(	'kheera_slider_posts_category_setting', 	array(
									'label'    => __( 'Select the slider posts category', 'kheera' ),
									'section'  => 'kheera_header_slider_settings',
									'settings' => 'kheera_slider_posts_category_setting',
									'type'     => 'select',
									'choices'  => kheera_get_post_slider_categories(),));

		//promo boxes
		$wp_customize->add_section( 'kheera_promo_boxes_settings', array(
									'priority'       => 6,
									'capability'     => 'edit_theme_options',
									'theme_supports' => '',
									'panel'  => 'kheera_header_options',
									'title'          => __('Promo Boxes', 'kheera'),));

		// display promo boxes  
		$wp_customize->add_setting( 'kheera_display_promo_boxes_setting' , array(
									'default' => true,
									'transport' => 'refresh',
									'sanitize_callback' => 'kheera_bool_sanitize',) );
		$wp_customize->add_control(	'kheera_display_promo_boxes_setting', 	array(
									'label'    => __( 'Display Promo Boxes', 'kheera' ),
									'section'  => 'kheera_promo_boxes_settings',
									'settings' => 'kheera_display_promo_boxes_setting',
									'type'     => 'checkbox',));
		
		
		//promo box 1 image
		$wp_customize->add_setting( 'kheera_promobox1_image_setting' , array(
									'transport' => 'refresh',
									'sanitize_callback' => 'kheera_image_sanitize',) );
		$wp_customize->add_control(	 new WP_Customize_Image_Control($wp_customize, 'kheera_promobox1_image_setting', array(
																								'label'      => __( 'Promo Box 1 Image', 'kheera' ),
																								'section'    => 'kheera_promo_boxes_settings',
																								'settings'   => 'kheera_promobox1_image_setting')));	
																								
		//promo box 1 SubTitle
		$wp_customize->add_setting( 'kheera_promobox1_subtitle_setting' , array(
									'default' => __('Read More','kheera'),
									'transport' => 'refresh',
									'sanitize_callback' => 'kheera_html_sanitize',) );
		$wp_customize->add_control(	'kheera_promobox1_subtitle_setting', 	array(
									'label'    => __( 'Promo Box 1 SubTitle', 'kheera' ),
									'section'  => 'kheera_promo_boxes_settings',
									'settings' => 'kheera_promobox1_subtitle_setting',
									'type'     => 'text',));
		
		//promo box 1 Title
		$wp_customize->add_setting( 'kheera_promobox1_title_setting' , array(
									'default' => __('Promo Box 1','kheera'),
									'transport' => 'refresh',
									'sanitize_callback' => 'kheera_html_sanitize',) );
		$wp_customize->add_control(	'kheera_promobox1_title_setting', 	array(
									'label'    => __( 'Promo Box 1 Title', 'kheera' ),
									'section'  => 'kheera_promo_boxes_settings',
									'settings' => 'kheera_promobox1_title_setting',
									'type'     => 'text',));	
		
		//promo box 1 Link
		$wp_customize->add_setting( 'kheera_promobox1_url_setting' , array(
									'default' => '#',
									'transport' => 'refresh',
									'sanitize_callback' => 'kheera_url_sanitize',) );
		$wp_customize->add_control(	'kheera_promobox1_url_setting', 	array(
									'label'    => __( 'Promo Box 1 Link', 'kheera' ),
									'section'  => 'kheera_promo_boxes_settings',
									'settings' => 'kheera_promobox1_url_setting',
									'type'     => 'url',));	

		//promo box 2 image
		$wp_customize->add_setting( 'kheera_promobox2_image_setting' , array(
									'transport' => 'refresh',
									'sanitize_callback' => 'kheera_image_sanitize',) );
		$wp_customize->add_control(	 new WP_Customize_Image_Control($wp_customize, 'kheera_promobox2_image_setting', array(
																								'label'      => __( 'Promo Box 2 Image', 'kheera' ),
																								'section'    => 'kheera_promo_boxes_settings',
																								'settings'   => 'kheera_promobox2_image_setting')));	
																								
		//promo box 2 SubTitle
		$wp_customize->add_setting( 'kheera_promobox2_subtitle_setting' , array(
									'default' => __('Read More','kheera'),
									'transport' => 'refresh',
									'sanitize_callback' => 'kheera_html_sanitize',) );
		$wp_customize->add_control(	'kheera_promobox2_subtitle_setting', 	array(
									'label'    => __( 'Promo Box 2 Subtitle', 'kheera' ),
									'section'  => 'kheera_promo_boxes_settings',
									'settings' => 'kheera_promobox2_subtitle_setting',
									'type'     => 'text',));										
		
		//promo box 2 Title
		$wp_customize->add_setting( 'kheera_promobox2_title_setting' , array(
									'default' => __('Promo Box 2','kheera'),
									'transport' => 'refresh',
									'sanitize_callback' => 'kheera_html_sanitize',) );
		$wp_customize->add_control(	'kheera_promobox2_title_setting', 	array(
									'label'    => __( 'Promo Box 2 Title', 'kheera' ),
									'section'  => 'kheera_promo_boxes_settings',
									'settings' => 'kheera_promobox2_title_setting',
									'type'     => 'text',));	
		
		//promo box 2 Link
		$wp_customize->add_setting( 'kheera_promobox2_url_setting' , array(
									'default' => '#',
									'transport' => 'refresh',
									'sanitize_callback' => 'kheera_url_sanitize',) );
		$wp_customize->add_control(	'kheera_promobox2_url_setting', 	array(
									'label'    => __( 'Promo Box 2 Link', 'kheera' ),
									'section'  => 'kheera_promo_boxes_settings',
									'settings' => 'kheera_promobox2_url_setting',
									'type'     => 'url',));

		//promo box 3 image
		$wp_customize->add_setting( 'kheera_promobox3_image_setting' , array(
									'transport' => 'refresh',
									'sanitize_callback' => 'kheera_image_sanitize',) );
		$wp_customize->add_control(	 new WP_Customize_Image_Control($wp_customize, 'kheera_promobox3_image_setting', array(
																								'label'      => __( 'Promo Box 3 Image', 'kheera' ),
																								'section'    => 'kheera_promo_boxes_settings',
																								'settings'   => 'kheera_promobox3_image_setting')));	
																								
		
		//promo box 3 SubTitle
		$wp_customize->add_setting( 'kheera_promobox3_subtitle_setting' , array(
									'default' => __('Read More','kheera'),
									'transport' => 'refresh',
									'sanitize_callback' => 'kheera_html_sanitize',) );
		$wp_customize->add_control(	'kheera_promobox3_subtitle_setting', 	array(
									'label'    => __( 'Promo Box 3 Subtitle', 'kheera' ),
									'section'  => 'kheera_promo_boxes_settings',
									'settings' => 'kheera_promobox3_subtitle_setting',
									'type'     => 'text',));

		//promo box 3 Title
		$wp_customize->add_setting( 'kheera_promobox3_title_setting' , array(
									'default' => __('Promo Box 3','kheera'),
									'transport' => 'refresh',
									'sanitize_callback' => 'kheera_html_sanitize',) );
		$wp_customize->add_control(	'kheera_promobox3_title_setting', 	array(
									'label'    => __( 'Promo Box 3 Title', 'kheera' ),
									'section'  => 'kheera_promo_boxes_settings',
									'settings' => 'kheera_promobox3_title_setting',
									'type'     => 'text',));	
							
		
		//promo box 3 Link
		$wp_customize->add_setting( 'kheera_promobox3_url_setting' , array(
									'default' => '#',
									'transport' => 'refresh',
									'sanitize_callback' => 'kheera_url_sanitize',) );
		$wp_customize->add_control(	'kheera_promobox3_url_setting', 	array(
									'label'    => __( 'Promo Box 3 Link', 'kheera' ),
									'section'  => 'kheera_promo_boxes_settings',
									'settings' => 'kheera_promobox3_url_setting',
									'type'     => 'url',));									
											
		
		
		
		//Footer Settings
		
		$wp_customize->add_section( 'kheera_footer_settings', array(
									'priority'       => 4,
									'capability'     => 'edit_theme_options',
									'theme_supports' => '',
									'title'          => __('Footer Settings', 'kheera'),));
		
		
		//footer widget							
		$wp_customize->add_setting( 'kheera_footer_widgets_display_setting' , array(
									'default' => true,
									'transport' => 'refresh',
									'sanitize_callback' => 'kheera_bool_sanitize',) );
		$wp_customize->add_control(	'kheera_footer_widgets_display_setting', 	array(
									'label'    => __( 'Display Footer Widgets Areas', 'kheera' ),
									'section'  => 'kheera_footer_settings',
									'settings' => 'kheera_footer_widgets_display_setting',
									'type'     => 'checkbox',));
		//footer copyright text 
		$wp_customize->add_setting( 'kheera_footer_copyright_text_setting' , array(
									'default' => ' ',
									'transport' => 'refresh',
									'sanitize_callback' => 'kheera_nonhtml_sanitize',) );
		$wp_customize->add_control(	'kheera_footer_copyright_text_setting', 	array(
									'label'    => __( 'Enter Footer Copyright Text', 'kheera' ),
									'section'  => 'kheera_footer_settings',
									'settings' => 'kheera_footer_copyright_text_setting',
									'type'     => 'textarea',));
		
		//General Settings
		
		$wp_customize->add_panel( 'kheera_general_settings', array(
								  'priority'       => 5,
								  'capability'     => 'edit_theme_options',
								  'theme_supports' => '',
								  'title'          => __( 'General Settings', 'kheera' ),));
		
		//layout options
		$wp_customize->add_section( 'kheera_layout_options', array(
									'priority'       => 1,
									'capability'     => 'edit_theme_options',
									'theme_supports' => '',
									'title'          => __('Layout Options', 'kheera'),
									'panel'  => 'kheera_general_settings',));
									
		// home layout
		$wp_customize->add_setting( 'kheera_home_layout_setting' , array(
									'default' => 'kheera_full_width_grid_layout',
									'transport' => 'refresh',
									'sanitize_callback' => 'kheera_choices_sanitize') );
		$wp_customize->add_control(	'kheera_home_layout_setting', 	array(
									'label'    => __( 'Select Home layout', 'kheera' ),
									'section'  => 'kheera_layout_options',
									'settings' => 'kheera_home_layout_setting',
									'type'     => 'radio',
									'choices'  => array('kheera_full_width_layout'  => __('Full Width Layout','kheera'),
														'kheera_list_layout'  => __('List Layout','kheera'),
														'kheera_grid_layout'  => __('Grid  Columns Layout','kheera'),
														'kheera_full_width_list_layout'  => __('First Post Full Width and the rest List Layout','kheera'),
														'kheera_full_width_grid_layout'  => __('First Post Full Width and the rest Grid Layout','kheera'),),));

		// Archives layout
		$wp_customize->add_setting( 'kheera_archives_layout_setting' , array(
									'default' => 'kheera_list_layout',
									'transport' => 'refresh',
									'sanitize_callback' => 'kheera_choices_sanitize') );
		$wp_customize->add_control(	'kheera_archives_layout_setting', 	array(
									'label'    => __( 'Archives/Categories/Search Results layout', 'kheera' ),
									'section'  => 'kheera_layout_options',
									'settings' => 'kheera_archives_layout_setting',
									'type'     => 'radio',
									'choices'  => array('kheera_full_width_layout'  => __('Full Width Layout','kheera'),
														'kheera_list_layout'  => __('List Layout','kheera'),
														'kheera_grid_layout'  => __('Grid  Columns Layout','kheera'),),));		
		
		// Archives Grid Columns layout
		$wp_customize->add_setting( 'kheera_grid_columns_setting' , array(
									'default' => 2,
									'transport' => 'refresh',
									'sanitize_callback' => 'kheera_choices_sanitize') );
		$wp_customize->add_control(	'kheera_grid_columns_setting', 	array(
									'label'    => __( 'Number of columns for grid layout', 'kheera' ),
									'description' => __('3 Column Grid is intended for layouts without sidebars','kheera'),
									'section'  => 'kheera_layout_options',
									'settings' => 'kheera_grid_columns_setting',
									'type'     => 'select',
									'choices'  => array(2  => __('2 Columns Grid','kheera'),
														3  => __('3 Columns Grid','kheera'),),));
		
		//general  options
		$wp_customize->add_section( 'kheera_general_options', array(
									'priority'       => 2,
									'capability'     => 'edit_theme_options',
									'theme_supports' => '',
									'title'          => __('General Options', 'kheera'),
									'panel'  => 'kheera_general_settings',));
		
		//Back To Top Setting display
		$wp_customize->add_setting( 'kheera_back_to_top_setting' , array(
									'default' => true,
									'transport' => 'refresh',
									'sanitize_callback' => 'kheera_bool_sanitize') );
		$wp_customize->add_control(	'kheera_back_to_top_setting', 	array(
									'label'    => __( 'Display Back To Top Button', 'kheera' ),
									'section'  => 'kheera_general_options',
									'settings' => 'kheera_back_to_top_setting',
									'type'     => 'checkbox',
									'description' => __('Scroll to Top Button display for all pages of the site','kheera'),));
									
		//Loader Setting display
		$wp_customize->add_setting( 'kheera_loader_setting' , array(
									'default' => true,
									'transport' => 'refresh',
									'sanitize_callback' => 'kheera_bool_sanitize') );
		$wp_customize->add_control(	'kheera_loader_setting', 	array(
									'label'    => __( 'Display Content Loader', 'kheera' ),
									'section'  => 'kheera_general_options',
									'settings' => 'kheera_loader_setting',
									'type'     => 'checkbox',
									'description' => __('Loading animation is displayed for all the pages of the site. It\'s used in case
									content takes too long to load','kheera'),));

		//Sticky Menu Setting display
		$wp_customize->add_setting( 'kheera_sticky_menu_setting' , array(
									'default' => true,
									'transport' => 'refresh',
									'sanitize_callback' => 'kheera_bool_sanitize') );
		$wp_customize->add_control(	'kheera_sticky_menu_setting', 	array(
									'label'    => __( 'Display Sticky Navigation', 'kheera' ),
									'section'  => 'kheera_general_options',
									'settings' => 'kheera_sticky_menu_setting',
									'type'     => 'checkbox',
									'description' => __('Sticky Menu is being displayed on all pages,
									after scrolling down.','kheera'),));
									
		//Sticky Menu ProgressBar Setting display
		$wp_customize->add_setting( 'kheera_sticky_menu_progress_setting' , array(
									'default' => true,
									'transport' => 'refresh',
									'sanitize_callback' => 'kheera_bool_sanitize') );
		$wp_customize->add_control(	'kheera_sticky_menu_progress_setting', 	array(
									'label'    => __( 'Display Progress Bar on Sticky Navigation', 'kheera' ),
									'section'  => 'kheera_general_options',
									'settings' => 'kheera_sticky_menu_progress_setting',
									'type'     => 'checkbox',
									'description' => __('Progress Bar is being displayed on the bottom of the sticky menu,
									indicating the progress of the content scrolling.','kheera'),));							
									
		//Sticky Menu Secondary Logo
		$wp_customize->add_setting( 'kheera_secondary_logo_setting' , array(
									'transport' => 'refresh',
									'sanitize_callback' => 'kheera_image_sanitize',) );
		$wp_customize->add_control(	 new WP_Customize_Image_Control($wp_customize, 'kheera_secondary_logo_setting', array(
																								'label'      => __( 'Secondary Logo. It is used on the sticky menu.', 'kheera' ),
																								'section'    => 'kheera_general_options',
																								'settings'   => 'kheera_secondary_logo_setting')));	
		
		
		// full text on posts
		$wp_customize->add_setting( 'kheera_full_text_posts_setting' , array(
									'default' => false,
									'transport' => 'refresh',
									'sanitize_callback' => 'kheera_bool_sanitize') );
		$wp_customize->add_control(	'kheera_full_text_posts_setting', 	array(
									'label'    => __( 'Display the full post  instead of excerpt.', 'kheera' ),
									'section'  => 'kheera_general_options',
									'settings' => 'kheera_full_text_posts_setting',
									'type'     => 'checkbox',
									'description' => __('Only available for Full Width Post Layout','kheera'),));
		
		//RTL Support
		$wp_customize->add_setting( 'kheera_rtl_support_setting' , array(
									'default' => false,
									'transport' => 'refresh',
									'sanitize_callback' => 'kheera_bool_sanitize') );
		$wp_customize->add_control(	'kheera_rtl_support_setting', 	array(
									'label'    => __( 'RTL Support', 'kheera' ),
									'section'  => 'kheera_general_options',
									'settings' => 'kheera_rtl_support_setting',
									'type'     => 'checkbox',
									'description' => __('Enable RTL language Support','kheera'),));
		
		
		
		
		
		
		//sidebar  options
		$wp_customize->add_section( 'kheera_sidebar_options', array(
									'priority'       => 3,
									'capability'     => 'edit_theme_options',
									'theme_supports' => '',
									'title'          => __('Sidebar Options', 'kheera'),
									'panel'  => 'kheera_general_settings',));
		
		// home sidebar
		$wp_customize->add_setting( 'kheera_home_sidebar_setting' , array(
									'default' => 'hidden',
									'transport' => 'refresh',
									'sanitize_callback' => 'kheera_choices_sanitize') );
		$wp_customize->add_control(	'kheera_home_sidebar_setting', 	array(
									'label'    => __( 'Sidebar options for Home', 'kheera' ),
									'section'  => 'kheera_sidebar_options',
									'settings' => 'kheera_home_sidebar_setting',
									'type'     => 'radio',
									'choices'  => array('left'  => __('Left  Sidebar','kheera'),
														'right'  => __('Right  Sidebar','kheera'),
														'hidden'  => __('No Sidebar','kheera'),),));

		// archives-categories sidebar
		$wp_customize->add_setting( 'kheera_archives_sidebar_setting' , array(
									'default' => 'hidden',
									'transport' => 'refresh',
									'sanitize_callback' => 'kheera_choices_sanitize') );
		$wp_customize->add_control(	'kheera_archives_sidebar_setting', 	array(
									'label'    => __( 'Sidebar Options for Archives/Categories/Search', 'kheera' ),
									'section'  => 'kheera_sidebar_options',
									'settings' => 'kheera_archives_sidebar_setting',
									'type'     => 'radio',
									'choices'  => array('left'  => __('Left  Sidebar','kheera'),
														'right'  => __('Right  Sidebar','kheera'),
														'hidden'  => __('No Sidebar','kheera'),),));

		// 404 sidebar
		$wp_customize->add_setting( 'kheera_404_sidebar_setting' , array(
									'default' => 'hidden',
									'transport' => 'refresh',
									'sanitize_callback' => 'kheera_choices_sanitize') );
		$wp_customize->add_control(	'kheera_404_sidebar_setting', 	array(
									'label'    => __( 'Sidebar Options for 404 Page', 'kheera' ),
									'section'  => 'kheera_sidebar_options',
									'settings' => 'kheera_404_sidebar_setting',
									'type'     => 'radio',
									'choices'  => array('left'  => __('Left  Sidebar','kheera'),
														'right'  => __('Right  Sidebar','kheera'),
														'hidden'  => __('No Sidebar','kheera'),),));
														
		// Shop/Product sidebar
		$wp_customize->add_setting( 'kheera_woo_sidebar_setting' , array(
									'default' => 'hidden',
									'transport' => 'refresh',
									'sanitize_callback' => 'kheera_choices_sanitize') );
		$wp_customize->add_control(	'kheera_woo_sidebar_setting', 	array(
									'label'    => __( 'Sidebar Options for Woocommerce', 'kheera' ),
									'section'  => 'kheera_sidebar_options',
									'settings' => 'kheera_woo_sidebar_setting',
									'type'     => 'radio',
									'choices'  => array('left'  => __('Left  Sidebar','kheera'),
														'right'  => __('Right  Sidebar','kheera'),
														'hidden'  => __('No Sidebar','kheera'),),));
		
		
		//Social Media Icons 
		$wp_customize->add_section( 'kheera_social_icons_options', array(
									'priority'       => 3,
									'capability'     => 'edit_theme_options',
									'theme_supports' => '',
									'title'          => __('Social Media Icons', 'kheera'),
									'panel'  => 'kheera_general_settings',));
		
		//Facebook Link Setting
		$wp_customize->add_setting( 'kheera_facebook_link_setting' , array(
									'default' => '',
									'transport' => 'refresh',
									'sanitize_callback' => 'kheera_url_sanitize') );
		$wp_customize->add_control(	'kheera_facebook_link_setting', 	array(
									'label'    => __( 'Enter your Facebook Page Url', 'kheera' ),
									'section'  => 'kheera_social_icons_options',
									'settings' => 'kheera_facebook_link_setting',
									'type'     => 'url',));

		//Twitter Link Setting
		$wp_customize->add_setting( 'kheera_twitter_link_setting' , array(
									'default' => '',
									'transport' => 'refresh',
									'sanitize_callback' => 'kheera_url_sanitize') );
		$wp_customize->add_control(	'kheera_twitter_link_setting', 	array(
									'label'    => __( 'Enter your Twitter Page Url', 'kheera' ),
									'section'  => 'kheera_social_icons_options',
									'settings' => 'kheera_twitter_link_setting',
									'type'     => 'url',));	

		//Google+ Link Setting
		$wp_customize->add_setting( 'kheera_google_plus_link_setting' , array(
									'default' => '',
									'transport' => 'refresh',
									'sanitize_callback' => 'kheera_url_sanitize') );
		$wp_customize->add_control(	'kheera_google_plus_link_setting', 	array(
									'label'    => __( 'Enter your Google+ Page Url', 'kheera' ),
									'section'  => 'kheera_social_icons_options',
									'settings' => 'kheera_google_plus_link_setting',
									'type'     => 'url',));	

		//Instagram Link Setting
		$wp_customize->add_setting( 'kheera_instagram_link_setting' , array(
									'default' => '',
									'transport' => 'refresh',
									'sanitize_callback' => 'kheera_url_sanitize') );
		$wp_customize->add_control(	'kheera_instagram_link_setting', 	array(
									'label'    => __( 'Enter your Instagram Page Url', 'kheera' ),
									'section'  => 'kheera_social_icons_options',
									'settings' => 'kheera_instagram_link_setting',
									'type'     => 'url',));

		//LinkedIn Link Setting
		$wp_customize->add_setting( 'kheera_linkedin_link_setting' , array(
									'default' => '',
									'transport' => 'refresh',
									'sanitize_callback' => 'kheera_url_sanitize') );
		$wp_customize->add_control(	'kheera_linkedin_link_setting', 	array(
									'label'    => __( 'Enter your linkedIn Page Url', 'kheera' ),
									'section'  => 'kheera_social_icons_options',
									'settings' => 'kheera_linkedin_link_setting',
									'type'     => 'url',));

		//youTube Link Setting
		$wp_customize->add_setting( 'kheera_youtube_link_setting' , array(
									'default' => '',
									'transport' => 'refresh',
									'sanitize_callback' => 'kheera_url_sanitize') );
		$wp_customize->add_control(	'kheera_youtube_link_setting', 	array(
									'label'    => __( 'Enter your youTube Channel Url', 'kheera' ),
									'section'  => 'kheera_social_icons_options',
									'settings' => 'kheera_youtube_link_setting',
									'type'     => 'url',));
		
		//Post Options 
		$wp_customize->add_section( 'kheera_post_options', array(
									'priority'       => 3,
									'capability'     => 'edit_theme_options',
									'theme_supports' => '',
									'title'          => __('Post Options', 'kheera'),
									'panel'  => 'kheera_general_settings',));
		
		//Display Author
		$wp_customize->add_setting( 'kheera_display_author_setting' , array(
									'default' => true,
									'transport' => 'refresh',
									'sanitize_callback' => 'kheera_bool_sanitize') );
		$wp_customize->add_control(	'kheera_display_author_setting', 	array(
									'label'    => __( 'Display Author', 'kheera' ),
									'section'  => 'kheera_post_options',
									'settings' => 'kheera_display_author_setting',
									'type'     => 'checkbox',
									'description' => __('Display author\'s description below post content.','kheera'),));
									
		//Display Related Posts
		$wp_customize->add_setting( 'kheera_display_related_posts_setting' , array(
									'default' => true,
									'transport' => 'refresh',
									'sanitize_callback' => 'kheera_bool_sanitize') );
		$wp_customize->add_control(	'kheera_display_related_posts_setting', 	array(
									'label'    => __( 'Display Related Posts', 'kheera' ),
									'section'  => 'kheera_post_options',
									'settings' => 'kheera_display_related_posts_setting',
									'type'     => 'checkbox',
									'description' => __('Display Related Posts after post content.','kheera'),));							

			
		
		
	}
	add_action( 'customize_register', 'kheera_customize_register' );

	/**
	 * Render the site title for the selective refresh partial.
	 *
	 * @return void
	 */
	function kheera_customize_partial_blogname() {
		bloginfo( 'name' );
	}

	/**
	 * Render the site tagline for the selective refresh partial.
	 *
	 * @return void
	 */
	function kheera_customize_partial_blogdescription() {
		bloginfo( 'description' );
	}

	/**
	 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
	 */
	function kheera_customize_preview_js() {
		wp_enqueue_script( 'kheera-customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), '20151215', true );
	}
	add_action( 'customize_preview_init', 'kheera_customize_preview_js' );
	
	/*
	  Sanitization callback functions
	*/  
	
	//checkbox - boolean sanitize
	function kheera_bool_sanitize( $checked ) {
		return ( ( isset( $checked ) && true == $checked ) ? true : false );
	}
	
	//image sanitize
	function kheera_image_sanitize( $image, $setting ) {
		$file = wp_check_filetype( $image, get_allowed_mime_types() );
		return ( $file['ext'] ? $image : $setting->default );
	}
	
	//url sanitize
	function kheera_url_sanitize($url){
		return esc_url_raw( $url );
	}

	//choices - select sanitize
	function kheera_choices_sanitize( $input, $setting ) {
		
		$choices = $setting->manager->get_control($setting->id)->choices;
		return ( array_key_exists(  $input , $choices ) ?  $input  : $setting->default );
	}

	//html sanitize
	function kheera_html_sanitize( $html ) {
		return wp_filter_post_kses( $html );
	}

	//range - integer number sanitize
	function kheera_range_sanitize( $number, $setting ) {
		$number = absint( $number );
		
		$input_attrs = $setting->manager->get_control($setting->id)->input_attrs;
	
		$min = ( isset( $input_attrs['min'] ) ? $input_attrs['min'] : $number );
		$max = ( isset( $input_attrs['max'] ) ? $input_attrs['max'] : $number );
		$step = ( isset( $input_attrs['step'] ) ? $input_attrs['step'] : 1 );
	
		return ( $min <= $number && $number <= $max && is_int( $number / $step ) ? $number : $setting->default );
	}

	//sanitize non html
	function kheera_nonhtml_sanitize( $nohtml ) {
		return wp_filter_nohtml_kses( $nohtml );
	}

	//hex color sanitize
	function kheera_hex_color_sanitize( $hex_color, $setting ) {
		return sanitize_hex_color( $hex_color );
	}	
	
