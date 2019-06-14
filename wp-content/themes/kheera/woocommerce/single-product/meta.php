<?php
/**
 * Single Product Meta
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/meta.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		RebornThemes
 * @package 	Kheera
 * @version     3.0.0
 */

	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	global $product;
	?>
	
	
	<div class="product-meta-container">

		<?php do_action( 'woocommerce_product_meta_start' ); ?>
		
		<table class="table">
			<tbody>
			<?php if ( wc_product_sku_enabled() && ( $product->get_sku() || $product->is_type( 'variable' ) ) ) : ?>

				<tr>
					<td><?php esc_html_e( 'SKU:', 'kheera' ); ?></td>
					<td itemprop="productID"><?php echo esc_html(( $sku = $product->get_sku() )) ? $sku : esc_html__( 'N/A', 'kheera' ); ?></td>
				</tr>

			<?php endif; ?>

			<tr>
				<td><?php esc_html_e( 'CATEGORIES:', 'kheera' ); ?></td>
				<td><?php echo wc_get_product_category_list( $product->get_id(), ', ', '', '' ); ?></td>
			</tr>
		
			<tr>
				<td><?php esc_html_e( 'TAGS:', 'kheera' ); ?></td>
				<td itemprop="keywords"><?php echo wc_get_product_tag_list( $product->get_id(), ', ', '', '' ); ?></td>
			 </tr>

			</tbody>
		</table>	
		
		<?php do_action( 'woocommerce_product_meta_end' ); 
		
		wc_get_template( 'single-product/share.php' ); ?>

	</div>
