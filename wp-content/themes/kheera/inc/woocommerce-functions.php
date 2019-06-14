<?php
/**
* Woocommerce Related Functions and Hooks
*
* @package kheera
*
*/

	
	
	/**
	 * Set Add to Cart Fragment to update cart count icon
	 *
	 * @package kheera	
	 *
	 * @since 1.0.0
	 */	
	function kheera_woo_cart_count_fragment( $fragments ) { 
		$fragments['div.cart-icon-container'] = '<div class="cart-icon-container">' . WC()->cart->get_cart_contents_count() . '</div>';
		return $fragments;
	}
	add_filter( 'woocommerce_add_to_cart_fragments', 'kheera_woo_cart_count_fragment' );
	
	
	/**
	 * Remove default woocommerce_before_shop_loop_item_title action hooks
	 *
	 * @package kheera	
	 *
	 * @since 1.0.0
	 */	
	function kheera_remove_woocommerce_before_shop_loop_item_title(){
		remove_action('woocommerce_before_shop_loop_item_title','woocommerce_show_product_loop_sale_flash',10);
		remove_action('woocommerce_before_shop_loop_item_title','woocommerce_template_loop_product_thumbnail',10);
	}
	add_action('woocommerce_before_shop_loop_item_title','kheera_remove_woocommerce_before_shop_loop_item_title',9);	
	
	
	/**
	 * Theme function for woocommerce_before_shop_loop_item_title action hook
	 *
	 * @package kheera	
	 *
	 * @since 1.0.0
	 */	
	function kheera_woocommerce_before_shop_loop_item_title(){ ?>
	
		<?php if(has_post_thumbnail()): ?>
			<div class="product-main-img-container">
				<?php  the_post_thumbnail('kheera_small', array('class' => 'img-responsive','itemprop'=>'image')); 
					   wc_get_template( 'loop/sale-flash.php' ); ?>
			</div>
		<?php endif; 
	
	}
	add_action('woocommerce_before_shop_loop_item_title','kheera_woocommerce_before_shop_loop_item_title',10);

	
	/**
	 * Remove default woocommerce_shop_loop_item_title action hooks
	 *
	 * @package kheera	
	 *
	 * @since 1.0.0
	 */	
	function kheera_remove_woocommerce_shop_loop_item_title(){
		remove_action('woocommerce_shop_loop_item_title','woocommerce_template_loop_product_title',10);
	}
	add_action('woocommerce_shop_loop_item_title','kheera_remove_woocommerce_shop_loop_item_title',9);


	/**
	 * Theme Function for woocommerce_shop_loop_item_title action hooks
	 *
	 * @package kheera	
	 *
	 * @since 1.0.0
	 */	
	function kheera_woocommerce_shop_loop_item_title(){ 
		
	 ?>
		<h2 itemprop="name" class="product-title"><?php the_title();?></h2>
	<?php }
	add_action('woocommerce_shop_loop_item_title','kheera_woocommerce_shop_loop_item_title',10);

		
	/**
	 * Remove Rating from woocommerce_after_shop_loop_item_title action hooks
	 *
	 * @package kheera	
	 *
	 * @since 1.0.0
	 */	
	function kheera_remove_woocommerce_after_shop_loop_item_title(){
		remove_action('woocommerce_after_shop_loop_item_title','woocommerce_template_loop_rating',5);
	}
	add_action('woocommerce_after_shop_loop_item_title','kheera_remove_woocommerce_after_shop_loop_item_title',4);	
	
	
	/**
	 * Remove Sale Flash from woocommerce_before_single_product_summary action hook
	 *
	 * @package kheera	
	 *
	 * @since 1.0.0
	 */
	function kheera_remove_woocommerce_before_single_product_summary(){
		remove_action('woocommerce_before_single_product_summary','woocommerce_show_product_sale_flash',10);
	}
	add_action('woocommerce_before_single_product_summary','kheera_remove_woocommerce_before_single_product_summary',9);	
	
	
	/**
	 * Remove Product sharing from woocommerce_single_product_summary action hook
	 *
	 * @package kheera	
	 *
	 * @since 1.0.3
	 */
	function kheera_remove_woocommerce_single_product_summary(){
		remove_action('woocommerce_single_product_summary','woocommerce_template_single_sharing',50);
	}
	add_action('woocommerce_single_product_summary','kheera_remove_woocommerce_single_product_summary',9);

	
	
	/**
	 * Remove Gravatar display and sharing from woocommerce_review_before action hook
	 *
	 * @package kheera	
	 *
	 * @since 1.0.0
	 */
	function kheera_remove_woocommerce_review_before(){
		remove_action('woocommerce_review_before','woocommerce_review_display_gravatar',10);
	}	
	add_action('woocommerce_review_before','kheera_remove_woocommerce_review_before',9);
	
	
	/**
	 * Display Gravatar Alt Function - woocommerce_review_before action hook
	 *
	 * @package kheera	
	 *
	 * @since 1.0.0
	 */
	function kheera_woocommerce_review_display_gravatar($comment){
		
		echo get_avatar( $comment, 75,'','',array('class' => 'img-responsive img-circle') ); 
	}	
	add_action('woocommerce_review_before','kheera_woocommerce_review_display_gravatar',10);
	
	
	/**
	 * Remove Related Products  from woocommerce_after_single_product_summary action hook
	 *
	 * @package kheera	
	 *
	 * @since 1.0.0
	 */
	function kheera_remove_woocommerce_after_single_product_summary(){
		remove_action('woocommerce_after_single_product_summary','woocommerce_output_related_products',20);
	}
	add_action('woocommerce_after_single_product_summary','kheera_remove_woocommerce_after_single_product_summary',19);	
	
	
	/**
	 * Set Related Products Args  - woocommerce_after_single_product_summary action hook
	 *
	 * @package kheera	
	 *
	 * @since 1.0.0
	 */
	function kheera_woocommerce_output_related_products(){
		
		$args = array(
			'posts_per_page' => 3,
			'columns'        => 3,
			'orderby'        => 'rand', // @codingStandardsIgnoreLine.
		);

		woocommerce_related_products( apply_filters( 'woocommerce_output_related_products_args', $args ) );
	}	
	add_action('woocommerce_after_single_product_summary','kheera_woocommerce_output_related_products',20);

	/**
	 * Remove empty cart message  from woocommerce_cart_is_empty action hook
	 *
	 * @package kheera	
	 *
	 * @since 1.0.0
	 */
	function kheera_remove_woocommerce_cart_is_empty(){
		remove_action('woocommerce_cart_is_empty','wc_empty_cart_message',10);
	}	
	add_action('woocommerce_cart_is_empty','kheera_remove_woocommerce_cart_is_empty',9);	
	
	
	/**
	 * Display empty cart message -  woocommerce_cart_is_empty action hook
	 *
	 * @package kheera	
	 *
	 * @since 1.0.0
	 */
	function kheera_woocommerce_cart_is_empty(){
		echo '<div class="empty-cart">';
		echo '<i class="fas fa-shopping-cart"></i>';
		echo '<h4>'.esc_html(__('Your shopping cart is empty','kheera')).'</h4>';
		echo '</div>';
	}	
	add_action('woocommerce_cart_is_empty','kheera_woocommerce_cart_is_empty',10);	
	
	
	/**
	 * Woocommerce comments end callback - Disable outputing and html to avoid
	 * html5 validation error
	 *
	 * @package kheera	
	 *
	 * @since 1.0.0
	 */
	function kheera_woocommerce_comments_end(){
		echo ' ';
	}	
	
	/**
	 * Woocommerce Aggregate Rating Filter 
	 *
	 * Used to add schemma.org markup filter: woocommerce_product_get_rating_html
	 *
	 * @package kheera	
	 *
	 * @since 1.0.3
	 */
	function kheera_woocommerce_aggregate_product_rating( $html, $rating, $count ){
		 if ( $rating > 0 ) { 
			/* translators: %s: average product rating  */ 	 
			$html = '<div class="star-rating" title="' . sprintf( esc_attr__( 'Rated %s out of 5', 'kheera' ), $rating ) . '">'; 
			$html .= '<span style="width:' . ( ( $rating / 5 ) * 100 ) . '%"><strong class="rating" itemprop="ratingValue">' . $rating . '</strong> ' . esc_html__( 'out of 5', 'kheera' ) . '</span>'; 
			$html .= '</div>'; 
		} else { 
			$html = ''; 
		} 

		return $html;
	}
	add_filter( 'woocommerce_product_get_rating_html', 'kheera_woocommerce_aggregate_product_rating', 10, 3 );
	
	/**
	 * Woocommerce Display Review Text 
	 *
	 * Used to replace default comment function, in order to add schemma.org markup..
	 *
	 * @package kheera	
	 *
	 * @since 1.0.3
	 */
	function kheera_woocommerce_review_display_comment_text() {
		echo '<div class="description" itemprop="decription">';
			comment_text();
		echo '</div>';
	}
