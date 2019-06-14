<?php

	/**
	 * Register TGMPA function for Recommended Plugins
	 *
	 * @package kheera
	 *
	 */
	
	
	function kheera_register_plugins() {
	
		$plugins = array(
		
						
						//Woocommerce Plugin 
						array(
							'name'     => 'WooCommerce',
							'slug'     => 'woocommerce',
							'required' => false,
							'version'            => '3.3.0', 
							'force_activation'   => false, 
							'force_deactivation' => false, 
						),
						
						//Widget Logic Plugin 
						array(
							'name'     => 'Widget Logic',
							'slug'     => 'widget-logic',
							'required' => false,
							'version'            => '5.9.0', 
							'force_activation'   => false, 
							'force_deactivation' => false, 
						),
						
						//Mail Chimp Sign Up Form Plugin
						array(
							'name'               => 'MailChimp for WordPress', 
							'slug'               => 'mailchimp-for-wp', 
							'required'           => false, 
							'version'            => '4.1.4', 
							'force_activation'   => false, 
							'force_deactivation' => false, 
						),
						
						//WP Instagram Widget 
						array(
							'name'               => 'WP Instagram Widget', 
							'slug'               => 'wp-instagram-widget', 
							'required'           => false, 
							'version'            => '1.9.8', 
							'force_activation'   => false, 
							'force_deactivation' => false, 
						),
						
						//WordPress Importer
						array(
							'name'               => 'WordPress Importer', 
							'slug'               => 'wordpress-importer', 
							'required'           => false, 
							'version'            => '0.6.3', 
							'force_activation'   => false, 
							'force_deactivation' => false, 
						),
						
						//Customizer Reset
						array(
							'name'               => 'Customizer Reset', 
							'slug'               => 'customizer-reset-by-wpzoom', 
							'required'           => false, 
							'version'            => '1.0.1', 
							'force_activation'   => false, 
							'force_deactivation' => false, 
						),
						
						//Customizer Export/Import
						array(
							'name'               => 'Customizer Export/Import', 
							'slug'               => 'customizer-export-import', 
							'required'           => false, 
							'version'            => '0.7', 
							'force_activation'   => false, 
							'force_deactivation' => false, 
						),
						
						//Widget Imported & Exporter
						array(
							'name'               => 'Widget Importer & Exporter', 
							'slug'               => 'widget-importer-exporter', 
							'required'           => false, 
							'version'            => '1.5.3', 
							'force_activation'   => false, 
							'force_deactivation' => false, 
						),
		
		
					);
					
		$config = array( 'id'           => 'kheera',                 
						 'menu'         => 'kheera_tgmpa-install-plugins', 
						 'has_notices'  => true,
						 'dismissable'  => true,
						 'is_automatic' => false,
						 'message'      => __('Install all recommended plugins to use all the theme features','kheera'),   
						);	
					
		tgmpa( $plugins, $config );			
	
	}
?>