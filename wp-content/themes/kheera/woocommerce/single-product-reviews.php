<?php
/**
 * Display single product reviews (comments)
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product-reviews.php.
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
 * @version     3.5.0
 */
	if ( ! defined( 'ABSPATH' ) ) {
		exit; // Exit if accessed directly
	}

	global $product;

	if ( ! comments_open() ) {
		return;
	}

	?>
	<div id="reviews" class="post-comments-container">
		<div id="comments">
			<h2 class="woocommerce-Reviews-title"><?php
				if ( get_option( 'woocommerce_enable_review_rating' ) === 'yes' && ( $count = $product->get_review_count() ) ) {
					/* translators: 1: reviews count 2: product name */
					printf( esc_html( _n( '%1$s review for %2$s', '%1$s reviews for %2$s', $count, 'kheera' ) ), esc_html( $count ), '<span>' . get_the_title() . '</span>' );
				} else {
					esc_html_e( 'Reviews', 'kheera' );
				}
			?></h2>

			<?php if ( have_comments() ) : ?>

				
				<?php wp_list_comments( apply_filters( 'woocommerce_product_review_list_args', 
													   array( 'callback' => 'woocommerce_comments',
															  'end-callback' => 'kheera_woocommerce_comments_end') ) ); ?>
				

					<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
						echo '<nav class="woocommerce-pagination">';
						paginate_comments_links( apply_filters( 'woocommerce_comment_pagination_args', array(
							'prev_text' => __( '<i class="fa  fa-angle-double-left" aria-hidden="true"></i> Previous Reviews','kheera' ),
							'next_text' => __( 'More Reviews <i class="fa fa-angle-double-right" aria-hidden="true"></i>','kheera' ),
							'type'      => 'plain',
						) ) );
						echo '</nav>';
					endif; ?>

			<?php else : ?>

				<p class="woocommerce-noreviews"><?php esc_html_e( 'There are no reviews for this product. Be the first to review it.', 'kheera' ); ?></p>

			<?php endif; ?>
		</div>
	</div>
	
	<div class="row comment-form">
	
		<?php if ( get_option( 'woocommerce_review_rating_verification_required' ) === 'no' || wc_customer_bought_product( '', get_current_user_id(), $product->get_id() ) ) : 

			
			$aria_req = ( $req ? " aria-required='true'" : '' );
			
			
			$commenter = wp_get_current_commenter();

			$comment_form = array(
				/* translators: %s: product title */
				'title_reply'          => have_comments() ? esc_html__( 'Add a review', 'kheera' ) : sprintf( esc_html__( 'Be the first to review &ldquo;%s&rdquo;', 'kheera' ), get_the_title() ),
				/* translators: %s: product title */
				'title_reply_to'       => esc_html__( 'Leave a Reply to %s', 'kheera' ),
				'title_reply_before'   => '<h6>',
				'title_reply_after'    => '</h6>',
				'comment_notes_after'  => '<div class="col-md-12 col-sm-12"><p>'.esc_html__('Your e-mail will not be published. All required Fields are marked','kheera').'</p></div>',
				'fields'               => array(
					'author' => '<div class="col-md-4 col-sm-4">' .
								'<input id="author" name="author" class="comment-form-input" type="text" placeholder="'.esc_html__('Enter your name','kheera').
								( $req ? esc_html__(' - (Required)','kheera') : '' ).'" value="'.esc_attr( $commenter['comment_author'] ) .'" ' . $aria_req . ' /></div>',
					'email'  => '<div class="col-md-4 col-sm-4">'.
								'<input id="email" name="email" type="text" class="comment-form-input" placeholder="'.esc_html__('Enter your e-mail','kheera').
								( $req ? esc_html__(' - (Required)','kheera') : '' ).'" value="' . esc_attr( $commenter['comment_author_url'] ).
								'"  /></div>',
				),
				'label_submit'  => esc_html__( 'Submit', 'kheera' ),
				'class_submit' => 'comment-form-submit btn-primary',
				'logged_in_as'  => '',
				'comment_field' => '',
			);

			if ( $account_page_url = wc_get_page_permalink( 'myaccount' ) ) {
				/* translators: %s: url of account page */
				$comment_form['must_log_in'] = '<p class="must-log-in">' . sprintf( __( 'You must be <a href="%s">logged in</a> to post a review.', 'kheera' ), esc_url( $account_page_url ) ) . '</p>';
			}

			if ( get_option( 'woocommerce_enable_review_rating' ) === 'yes' ) {
				$comment_form['comment_field'] = '<div class="col-md-4 col-sm-4 comment-form-rating"><label for="rating">' . esc_html__( 'Your rating:', 'kheera' ) . '</label><select name="rating" id="rating" required>
					<option value="">' . esc_html__( 'Rate&hellip;', 'kheera' ) . '</option>
					<option value="5">' . esc_html__( 'Perfect', 'kheera' ) . '</option>
					<option value="4">' . esc_html__( 'Good', 'kheera' ) . '</option>
					<option value="3">' . esc_html__( 'Average', 'kheera' ) . '</option>
					<option value="2">' . esc_html__( 'Not that bad', 'kheera' ) . '</option>
					<option value="1">' . esc_html__( 'Very poor', 'kheera' ) . '</option>
				</select></div> ';
			}

			$comment_form['comment_field'] .= '<div class="col-md-12 col-sm-12">'.
													'<textarea id="comment" name="comment" placeholder="'.__('Enter Your Comment','kheera').( $req ? __(' - (Required)','kheera') : '' ).
													'" class="comment-form-textarea" cols="45" rows="8" aria-required="true">'.
												'</textarea></div>';

			comment_form( apply_filters( 'woocommerce_product_review_comment_form_args', $comment_form ) );
		
		else : ?>

			<p class="woocommerce-verification-required"><?php esc_html_e( 'Only logged in customers who have purchased this product may leave a review.', 'kheera' ); ?></p>

		<?php endif; ?>

		<div class="clear"></div>
	</div>
