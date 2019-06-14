<?php
/**
* Functions which enhance the theme by hooking into WordPress
*
* @package kheera
*/


	/**
	 * Adds custom classes to the array of body classes.
	 *
	 * @param array $classes Classes for the body element.
	 * @return array
	 */
	function kheera_body_classes( $classes ) {
		// Adds a class of hfeed to non-singular pages.
		if ( ! is_singular() ) {
			$classes[] = 'hfeed';
		}

		return $classes;
	}
	add_filter( 'body_class', 'kheera_body_classes' );

	/**
	 * Add a pingback url auto-discovery header for singularly identifiable articles.
	 */
	function kheera_pingback_header() {
		if ( is_singular() && pings_open() ) {
			echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
		}
	}
	add_action( 'wp_head', 'kheera_pingback_header' );
	
	
	/**
	 * Add Class to Custom Logo
	 *
	 * @package kheera	
	 *
	 * @since 1.0.0
	 */	
	function kheera_custom_logo_class($html){
   
		$html = str_replace( 'custom-logo', 'img-responsive', $html );
		return $html;

	}	
	add_filter( 'get_custom_logo', 'kheera_custom_logo_class' );
	
	
	
	/**
	 * Move textarea comment field at the bottom of the form 
	 *
	 * @package kheera	
	 *
	 * @since 1.0.0
	 */	
	function kheera_comment_field_to_bottom( $fields ) {

		$comment_field = $fields['comment'];
		unset( $fields['comment'] );
		$fields['comment'] = $comment_field;
		return $fields;
	}
	add_filter( 'comment_form_fields', 'kheera_comment_field_to_bottom' );
	
	
	
	
	/**
	 * Comments callback function
	 *
	 * @package kheera	
	 *
	 * @since 1.0.0
	 */	
	function kheera_comments_callback($comment, $args, $depth){
		
		?>
		
		<div id="comment-<?php comment_ID(); ?>" <?php comment_class( $args['has_children'] ? 'parent' : '', $comment ); ?>>
			<div id="div-comment-<?php comment_ID(); ?>" class="comment-body col-md-12 col-sm-12 post-comment-container 
			<?php if($depth > 1): echo 'comment-reply '; endif;?>" itemscope itemtype="https://schema.org/Comment">
				
					
				<?php if ( 0 != $args['avatar_size'] ) echo get_avatar( $comment, $args['avatar_size'],'','',array('class' => 'img-responsive img-circle') ); ?>
				<h6 itemprop="author"><?php print get_comment_author_link( $comment ); ?>
					
					<span class="comment-date">
					<?php 
						/* translators: 1%s: date 2%s: time */ 
						printf( esc_attr(__( '%1$s at %2$s','kheera' )), get_comment_date( '', $comment ), get_comment_time() ); ?>
					</span>
					<?php edit_comment_link( __( 'Edit','kheera' ), '<span class="edit-link">', '</span>' ); ?>
				</h6>

				<?php if ( $comment->comment_approved == '0') : ?>
				<p class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.','kheera' ); ?></p>
				<?php endif; ?>
				
				<div itemprop="text">
					<?php comment_text(); ?> 
				</div>	

				<?php
				comment_reply_link( array_merge( $args, array(
					'add_below' => 'div-comment',
					'depth'     => $depth,
					'max_depth' => $args['max_depth'],
					'reply_text' => __('Reply','kheera'), 
					'add_below'     => 'comment',
					'respond_id'    => 'respond',
					
					) ) );  ?>
			
			</div> <?php
        
	}
	
	
	/**
	 * Add image responsive class filter 
	 *
	 * @package kheera	
	 *
	 * @since 1.0.0
	 */	
	function kheera_add_img_responsive_class($class){
		$class .= ' img-responsive';
		return $class;
	}
	add_filter('get_image_tag_class','kheera_add_img_responsive_class');


	/**
	 * Set Default Excerpt Length
	 *
	 * @package kheera	
	 *
	 * @since 1.0.0
	 */	
	function kheera_excerpt_length($length) {
		if(is_admin()){
			return $length;
		}
		else{	
			return 50;
		}	
	}
	add_filter( 'excerpt_length', 'kheera_excerpt_length');	
	
	
	/**
	 * Remove [...] from Excerpt 
	 *
	 * @package kheera	
	 *
	 * @since 1.0.0
	 */
	function kheera_excerpt_more( $more ) {
		
		if(is_admin()){
			return $more;
		}
		else{	
			return '...';
		}
	}
	add_filter('excerpt_more', 'kheera_excerpt_more');
	
	
	
	/**
	 * Custom Tag Cloud Widget - All links same size 
	 *
	 * @package kheera	
	 *
	 * @since 1.0.0
	 */
	function kheera_widget_tag_cloud_args($args) {
		
		$args['largest'] = 0.500; 
		$args['smallest'] = 0.500; 
		$args['unit'] = 'rem'; 
		
		return $args;
		
	}
	add_filter( 'widget_tag_cloud_args', 'kheera_widget_tag_cloud_args' );
	
	
	/**
	 * Custom Nav Menu Widget 
	 *
	 * @package kheera	
	 *
	 * @since 1.0.0
	 */
	function kheera_nav_menu_widget_args($args){
		
		$args['walker'] = new Kheera_Widget_Nav_Walker();
		$args['container'] = 'nav';
		$args['container_class'] = 'navbar';
		$args['menu_class'] = 'nav navbar-nav';
		
		return $args;
	}
	add_filter( 'widget_nav_menu_args', 'kheera_nav_menu_widget_args' );
	
	/**
	 * Remove type attribute from style and script tags so there are no warning
	 * for html5 validation.
	 *
	 * @package kheera	
	 *
	 * @since 1.0.0
	 */
	function kheera_remove_type_attr($tag, $handle) {
		return preg_replace( "/type=['\"]text\/(javascript|css)['\"]/", '', $tag );
	}
	add_filter('style_loader_tag', 'kheera_remove_type_attr', 10, 2);
	add_filter('script_loader_tag', 'kheera_remove_type_attr', 10, 2);
	
	
	/**
	 * Remove Rest output html in header to avoid validation errors
	 *
	 * @package kheera	
	 *
	 * @since 1.0.0
	 */
	function kheera_remove_rest_output_link_header(){
		remove_action( 'template_redirect', 'rest_output_link_header', 11, 0 );
		remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );
		remove_action( 'wp_head', 'wp_oembed_add_discovery_links', 10 );
	}	
	add_action( 'after_setup_theme', 'kheera_remove_rest_output_link_header' );
	
	


