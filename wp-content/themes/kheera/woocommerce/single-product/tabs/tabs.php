<?php
/**
 * Single Product tabs
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/tabs/tabs.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	https://docs.woocommerce.com/document/template-structure/
 * @author 		RebornThemes
 * @package 	Kheera
 * @version 2.4.0
 */

	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	/**
	 * Filter tabs and allow third parties to add their own.
	 *
	 * Each tab is an array containing title, callback and priority.
	 * @see woocommerce_default_product_tabs()
	 */
	$tabs = apply_filters( 'woocommerce_product_tabs', array() );

	if ( ! empty( $tabs ) ) : ?>

		
		<div class="product-tabs-container woocommerce-tabs wc-tabs-wrapper">
			
			<div class="product-tabs-titles-container col-md-12">
			
				<?php 
					$kheera_loop_count = 0;
					foreach ( $tabs as $key => $tab ) : ?>
						<?php $kheera_loop_count++; ?>
						<h3 id ="tab-title-<?php echo esc_attr( $key ); ?>" class="product-tabs-title <?php 
							if($kheera_loop_count == 1){
								echo ' active ';
							}	
							echo esc_attr( $key ); ?>_tab" aria-controls="tab-<?php echo esc_attr( $key ); ?>">
							<?php echo apply_filters( 'woocommerce_product_' . $key . '_tab_title', esc_html( $tab['title'] ), $key ); ?>
						</h3>
						
				<?php endforeach; 
					  $kheera_loop_count = 0;?>
			
			</div>
			
			<div class="product-tab-content-container col-md-12">
				<?php foreach ( $tabs as $key => $tab ) : ?>
					<?php $kheera_loop_count++; ?>
					<div class="product-desc-tab-container <?php
					if($kheera_loop_count == 1){
						echo ' active ';
					}
					else{
						echo ' hidden ';
					}	?>" id="tab-<?php echo esc_attr( $key ); ?>" role="tabpanel" aria-labelledby="tab-title-<?php echo esc_attr( $key ); ?>">
						<?php if ( isset( $tab['callback'] ) ) {
								call_user_func( $tab['callback'], $key, $tab ); 
								} ?>
					</div>
				<?php endforeach; 
				
				unset($kheera_loop_count); ?>
			</div>
			
		</div>

	<?php endif; ?>
