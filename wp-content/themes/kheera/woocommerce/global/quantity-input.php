<?php
/**
 * Product quantity inputs
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/global/quantity-input.php.
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
 * @version 3.4.0
 */

	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	if ( $max_value && $min_value === $max_value ) {
		?>
		<div class="quantity hidden">
			<input type="hidden" id="<?php echo esc_attr( $input_id ); ?>" class="qty" name="<?php echo esc_attr( $input_name ); ?>" value="<?php echo esc_attr( $min_value ); ?>" />
		</div>
		<?php
	} else {
		?>
		
		<a  class="btn btn-default add-product-quantity-button" data-input-id="<?php echo esc_attr( $input_id ); ?>">+</a>
		<a  class="btn btn-default remove-product-quantity-button" data-input-id="<?php echo esc_attr( $input_id ); ?>">-</a>
		<input type="text" id="<?php echo esc_attr( $input_id ); ?>" class="input-text qty text product-quantity-form-input"  name="<?php echo esc_attr( $input_name ); ?>" value="<?php echo esc_attr( $input_value ); ?>" title="<?php echo esc_attr_x( 'Qty', 'Product quantity input tooltip', 'kheera' ) ?>" size="4" pattern="<?php echo esc_attr( $pattern ); ?>"/>
		
		<?php
	}
