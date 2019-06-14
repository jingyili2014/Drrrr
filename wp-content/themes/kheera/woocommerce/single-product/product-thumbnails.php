<?php
/**
 * Single Product Thumbnails
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-thumbnails.php.
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
 * @version     3.5.1
 */

	defined( 'ABSPATH' ) || exit;

	// Note: `wc_get_gallery_image_html` was added in WC 3.3.2 and did not exist prior. This check protects against theme overrides being used on older versions of WC.
	if ( ! function_exists( 'wc_get_gallery_image_html' ) ) {
		return;
	}

	global $product,$post;

	$attachment_ids = $product->get_gallery_image_ids();

	if ( $attachment_ids && has_post_thumbnail() ) { ?>
		<div class="product-thumbs-img-container" itemscope itemtype="http://schema.org/ImageGallery">
			
			<?php if ( has_post_thumbnail() ) { // add the main featured img as gallery thumbnail too ?>
			<div class="product-thumb-img-container col-md-4 col-sm-4 col-xs-4" itemscope itemtype="http://schema.org/ImageObject">	
				<?php echo '<a href="'.get_the_post_thumbnail_url().'" class="product-featured-image">';
					  echo  get_the_post_thumbnail($post,'kheera_normal', array('class' => 'img-responsive product-thumb-img', 'itemprop'=>'image')); 
				      echo '</a>';
				?>	  
			</div>	
			<?php }
		
		 foreach ( $attachment_ids as $attachment_id ) { ?>
			<div class="product-thumb-img-container col-md-4 col-sm-4 col-xs-4">
				<?php 
					$image_attrs_normal = wp_get_attachment_image_src($attachment_id,'kheera_normal',false);
					$html = '<a href="'.$image_attrs_normal[0].'" class="product-featured-image">';
					$html .='<img class="img-responsive product-thumb-img" src="'.$image_attrs_normal[0].'" alt/>'; 
					$html .= '</a>';
					echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', $html, $attachment_id ); 
				?>
			</div>	
		<?php } ?>
		
		
		</div>
		
	<?php }
