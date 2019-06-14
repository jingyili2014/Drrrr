<?php
/**
 * The template for displaying product widget entries.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-widget-product.php.
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author 		RebornThemes
 * @package 	Kheera
 * @version 3.5.2
 */

	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	global $product;
	
	if ( ! is_a( $product, 'WC_Product' ) ) {
		return;
	}

	
	?>
	<li>
		
		<?php do_action( 'woocommerce_widget_product_item_start', $args ); ?>
		
		<div class="product-widget-item">
			<a href="<?php echo esc_url( $product->get_permalink() ); ?>">
				<div class="product-main-img-container">
					<?php echo $product->get_image('kheera_small',array( 'class' => 'img-responsive'), false); ?>
				</div>	
				<h6 class="product-title"><?php echo $product->get_name(); ?></h6>
				<div class="product-loop-price-container">
					<span class="product-price"><?php echo $product->get_price_html(); ?></span>
				</div>	
			</a>
		</div>		

		<?php do_action( 'woocommerce_widget_product_item_end', $args ); ?>
	</li>
