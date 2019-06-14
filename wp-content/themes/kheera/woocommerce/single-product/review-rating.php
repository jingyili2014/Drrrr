<?php
/**
 * The template to display the reviewers star rating in reviews
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/review-rating.php.
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
 * @version 3.1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $comment;
$rating = intval( get_comment_meta( $comment->comment_ID, 'rating', true ) );

if ( $rating && 'yes' === get_option( 'woocommerce_enable_review_rating' ) ) {
	
	if ( $rating > 0 ) { 
		/* translators: %s: review rating */
		echo '<div class="star-rating" title="' . sprintf( esc_attr__( 'Rated %s out of 5', 'kheera' ), esc_html($rating) ) . '" itemprop="reviewRating" itemscope itemtype="http://schema.org/Rating">'; 
		echo '<span style="width:' . ( ( esc_html($rating) / 5 ) * 100 ) . '%"><strong class="rating" itemprop="ratingValue">' . esc_html($rating) . '</strong> ' . esc_html__( 'out of 5', 'kheera' ) . '</span>'; 
		echo '</div>'; 
	}	
	
}
