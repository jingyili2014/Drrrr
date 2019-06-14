<?php
/**
 * Single Product Image
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-image.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author 		RebornThemes
 * @package 	Kheera
 * @version 3.5.1
 */

defined( 'ABSPATH' ) || exit;

	// Note: `wc_get_gallery_image_html` was added in WC 3.3.2 and did not exist prior. This check protects against theme overrides being used on older versions of WC.
	if ( ! function_exists( 'wc_get_gallery_image_html' ) ) {
		return;
	}

	global $product,$post;

	
	$post_thumbnail_id = $product->get_image_id();
	?>
	
	
	<div class="product-gallery-container col-md-6 col-sm-6 col-xs-12">
		<div class="product-main-img-container">
			<?php
			if ( has_post_thumbnail() ) {
				//$html  = wc_get_gallery_image_html( $post_thumbnail_id, true );
				$html = '<a href="'.get_the_post_thumbnail_url().'" class="product-featured-image product-main-featured-image">';
				$html .=  get_the_post_thumbnail($post,'kheera_normal', array('class' => 'img-responsive product-main-img', 'itemprop' => 'image' )); 
				$html .= '</a>';
			} else {
				$html  = '<div class="woocommerce-product-gallery__image">';
				$html .= sprintf( '<a href="%s" class="product-featured-image"><img src="%s" alt="%s" class="wp-post-image img-responsive" /></a>', esc_url( wc_placeholder_img_src() ), esc_attr__( 'Awaiting product image', 'kheera' ) );
				$html .= '</div>';
			}
			
			wc_get_template( 'single-product/sale-flash.php' );
			
			echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', $html, $post_thumbnail_id ); ?>
		</div>
		
		<?php do_action( 'woocommerce_product_thumbnails' ); ?>
		
	</div>
