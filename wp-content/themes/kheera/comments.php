<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package kheera
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
 
	if ( post_password_required() ) {
		return;
	}
	?>

	<div id="comments" class="post-comments-container">

		<?php if ( have_comments() ) : 
				if(get_comments_number() == 1){ ?>
					<h4><?php print esc_html(__('1 Comment','kheera')); ?></h4>
				<?php }
				else{ ?>
					
					<h4><?php 
						/* translators: %s: comments count  */ 	
						printf( esc_attr(__('%s Comments','kheera')),esc_attr(get_comments_number())); ?></h4>
				<?php }	

					the_comments_navigation(); 
				
					wp_list_comments( array('style'      => 'div',
											'short_ping' => true,
											'callback' => 'kheera_comments_callback',
											'avatar_size' => 75,) );	

				// If comments are closed and there are comments, let's leave a little note, shall we?
				if ( ! comments_open() ) : ?>
					<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'kheera' ); ?></p>
				<?php
				endif;

		endif; 	?>
	
	</div>	
	
	<div class="row comment-form">
		<?php 
			$aria_req = ( $req ? " aria-required='true'" : '' );
				
			comment_form($args = array( 'title_reply_before' => '<h6>',
										'title_reply_after' => '</h6>',
										'fields' => apply_filters( 'comment_form_default_fields', 
										array(	'author' => '<div class="col-md-4 col-sm-4">' .
															'<input id="author" name="author" class="comment-form-input" type="text" placeholder="'.__('Enter your name','kheera').
															( $req ? __(' - (Required)','kheera') : '' ).'" value="'.esc_attr( $commenter['comment_author'] ) .'" ' . $aria_req . ' /></div>',
												'email' =>	 '<div class="col-md-4 col-sm-4">'.
															'<input id="email" name="email" type="text" class="comment-form-input" placeholder="'.__('Your e-mail address','kheera').
															( $req ? __(' - (Required)','kheera') : '' ).'" value="' . esc_attr(  $commenter['comment_author_email'] ).'" '.$aria_req.'/></div>',
												'url' =>    '<div class="col-md-4 col-sm-4">'.
															'<input id="url" name="url" type="text" class="comment-form-input" placeholder="'.__('Your website url','kheera').
															( $req ? __(' - (Required)','kheera') : '' ).'" value="' . esc_attr( $commenter['comment_author_url'] ).
															'"  /></div>')),
											'comment_field' =>  '<div class="col-md-12 col-sm-12">'.
																'<textarea id="comment" name="comment" placeholder="'.__('Enter Your Comment','kheera').( $req ? __(' - (Required)','kheera') : '' ).
																'" class="comment-form-textarea" cols="45" rows="8" aria-required="true">'.
																'</textarea></div>',
											'class_submit' => 'comment-form-submit btn-primary',
											'comment_notes_before' => '<div class="col-md-12 col-sm-12"><p>'.__('Your e-mail will not be published. All required Fields are marked','kheera').'</p></div>',
											
											));

			?>
	</div>