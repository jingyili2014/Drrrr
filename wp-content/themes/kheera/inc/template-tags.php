<?php
/**
* Custom template tags for this theme
*
* @package kheera	1.0.0
*/

	if ( ! function_exists( 'kheera_posted_on' ) ) :
		/**
		 * Prints HTML with meta information for the current post-date/time.
		 */
		function kheera_posted_on() {
			$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
			if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
				$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
			}

			$time_string = sprintf( $time_string,
				esc_attr( get_the_date( 'c' ) ),
				esc_html( get_the_date() ),
				esc_attr( get_the_modified_date( 'c' ) ),
				esc_html( get_the_modified_date() )
			);

			$posted_on = sprintf(
				/* translators: %s: post date. */
				esc_html_x( 'Posted on %s', 'post date', 'kheera' ),
				'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
			);

			echo '<span class="posted-on">' . $posted_on . '</span>'; // WPCS: XSS OK.

		}
	endif;

	if ( ! function_exists( 'kheera_posted_by' ) ) :
		/**
		 * Prints HTML with meta information for the current author.
		 */
		function kheera_posted_by() {
			$byline = sprintf(
				/* translators: %s: post author. */
				esc_html_x( 'by %s', 'post author', 'kheera' ),
				'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
			);

			echo '<span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.

		}
	endif;

	if ( ! function_exists( 'kheera_entry_footer' ) ) :
		/**
		 * Prints HTML with meta information for the categories, tags and comments.
		 */
		function kheera_entry_footer() {
			// Hide category and tag text for pages.
			if ( 'post' === get_post_type() ) {
				/* translators: used between list items, there is a space after the comma */
				$categories_list = get_the_category_list( esc_html__( ', ', 'kheera' ) );
				if ( $categories_list ) {
					/* translators: 1: list of categories. */
					printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'kheera' ) . '</span>', $categories_list ); // WPCS: XSS OK.
				}

				/* translators: used between list items, there is a space after the comma */
				$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'kheera' ) );
				if ( $tags_list ) {
					/* translators: 1: list of tags. */
					printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'kheera' ) . '</span>', $tags_list ); // WPCS: XSS OK.
				}
			}

			if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
				echo '<span class="comments-link">';
				comments_popup_link(
					sprintf(
						wp_kses(
							/* translators: %s: post title */
							__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'kheera' ),
							array(
								'span' => array(
									'class' => array(),
								),
							)
						),
						get_the_title()
					)
				);
				echo '</span>';
			}

			edit_post_link(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Edit <span class="screen-reader-text">%s</span>', 'kheera' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				),
				'<span class="edit-link">',
				'</span>'
			);
		}
	endif;

	if ( ! function_exists( 'kheera_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function kheera_post_thumbnail() {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}

		if ( is_singular() ) :
		?>

		<div class="post-thumbnail">
			<?php the_post_thumbnail(); ?>
		</div><!-- .post-thumbnail -->

		<?php else : ?>

		<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true">
			<?php
				the_post_thumbnail( 'post-thumbnail', array(
					'alt' => the_title_attribute( array(
						'echo' => false,
					) ),
				) );
			?>
		</a>

		<?php endif; // End is_singular().
	}
	endif;
	
	
	/**
	 * Get the posts categories - used for customizer slider settings
	 *
	 * @package kheera	
	 *
	 * @since 1.0.0
	 */
	function kheera_get_post_slider_categories()
	{
		//get posts categories
		$kheera_categories_choices = array( 'ALL' => __('All Categories','kheera'));
		$categories = get_categories( array ('orderby' => 'name','order' => 'ASC','taxonomy' => 'category'));
		foreach( $categories as $key => $value ){
			$value = $value->to_array(); //turn Wp_Term object to array
			$kheera_categories_choices = $kheera_categories_choices + array( $value['term_id'] => $value['name']);
		}
		return $kheera_categories_choices;
	}
	
	/**
	 * Display Social Media Icons List Items
	 *
	 * @package kheera	
	 *
	 * @since 1.0.0
	 */
	function kheera_social_icons_list_items()
	{	
		//facebook
		if( get_theme_mod( 'kheera_facebook_link_setting', '' ) != '' ): ?>
		<li><a href="<?php print esc_url(get_theme_mod( 'kheera_facebook_link_setting')); ?>"><i class="fab fa-facebook" ></i></a></li> 
		<?php endif; 
		
		//twitter						
		if(get_theme_mod( 'kheera_twitter_link_setting', '' ) != ''):?>
		<li><a href="<?php print esc_url(get_theme_mod( 'kheera_twitter_link_setting')); ?>"><i class="fab fa-twitter" aria-hidden="true"></i></a></li>
		<?php endif; 
								
		// google plus
		if(get_theme_mod( 'kheera_google_plus_link_setting', '' ) != ''):?>
		<li><a href="<?php print esc_url(get_theme_mod( 'kheera_google_plus_link_setting')); ?>"><i class="fab fa-google-plus" aria-hidden="true"></i></a></li>
		<?php endif; 
								
		//linkedin
		if(get_theme_mod( 'kheera_linkedin_link_setting', '' ) != ''):?>
		<li><a href="<?php print esc_url(get_theme_mod( 'kheera_linkedin_link_setting')); ?>"><i class="fab fa-linkedin" aria-hidden="true"></i></a></li>
		<?php endif; 								
							
		//instagram
		if(get_theme_mod( 'kheera_instagram_link_setting', '' ) != ''):?>
		<li><a href="<?php print esc_url(get_theme_mod( 'kheera_instagram_link_setting')); ?>"><i class="fab fa-instagram" aria-hidden="true"></i></a></li>
		<?php endif; 								
							
		//youTube
		if(get_theme_mod( 'kheera_youtube_link_setting', '' ) != ''):?>
		<li><a href="<?php print esc_url(get_theme_mod( 'kheera_youtube_link_setting')); ?>"><i class="fab fa-youtube" aria-hidden="true"></i></a></li>
		<?php endif; 
	}
	
	/**
	 * Display Header Promo Boxes
	 *
	 * @package kheera	
	 *
	 * @since 1.0.0
	 */
	function kheera_display_header_promo_box( $box_identifier){ // integer param, can be only 1,2 or 3
		
		$box_identifier = absint($box_identifier);
		
		if($box_identifier >=1 && $box_identifier <= 3){
			$output = '<div class="promo-box-container col-md-4 col-sm-4 col-xs-12">';
			$output .=  '<a href="'.esc_url(get_theme_mod('kheera_promobox'.$box_identifier.'_url_setting','#')).'">';
			$output .=  '<a href="'.esc_url(get_theme_mod('kheera_promobox'.$box_identifier.'_url_setting','#')).'">';
			
			if(get_theme_mod('kheera_promobox'.$box_identifier.'_image_setting')):
				$output .= '<img class="img-responsive" src="'.esc_url_raw(get_theme_mod('kheera_promobox'.$box_identifier.'_image_setting','Image')).'" ';
				$output .= ' alt="'.esc_html(get_theme_mod('kheera_promobox'.$box_identifier.'_title_setting',__('Read More','kheera'))).'"/></a>';
			else: 
				$output .= '<img class="img-responsive"  src="'.get_template_directory_uri().'/assets/images/promobox'.$box_identifier.'.jpg"'; 
				$output .= ' alt="'.esc_attr(get_bloginfo( 'name', 'display' ) ).'" /></a>';			
			endif;
			$output .= '<div class="promo-box-overlay">';
			$output .= '<a href="'.esc_url_raw(get_theme_mod('kheera_promobox'.$box_identifier.'_url_setting','#')).'">';
			$output .= '<span class="promo-box-sub-title">';
			$output .= esc_html(get_theme_mod('kheera_promobox'.$box_identifier.'_subtitle_setting',__('Read More','kheera'))).'</span></a>';
			$output .=  '<h4 class="promo-box-title"><a href="'.esc_url_raw(get_theme_mod('kheera_promobox'.$box_identifier.'_url_setting','#')).'">';
			$output .= esc_html(get_theme_mod('kheera_promobox'.$box_identifier.'_title_setting',__('Read More','kheera'))).'</a></h4>';
			$output .= '</div></div>';
			
			print $output;
		}	
	}
	
	/**
	 * Get Header Slider Style
	 *
	 * @package kheera	
	 *
	 * @since 1.0.0
	 */
	function kheera_get_header_slider_style()
	{
		$slider_style = absint(get_theme_mod( 'kheera_header_slider_style_setting','1')); 
		if($slider_style >=1 && $slider_style <= 3){
			return $slider_style;
		}
		else{
			return 1; //default slider style value
		}	
		
	}

	
	/**
	 * Get Post Category
	 *
	 * This function is used to get the posts category except the slider category,
	 * in cases where multiple post categories are set. 
	 *
	 * @package kheera	
	 *
	 * @since 1.0.0
	 */
	function kheera_get_post_display_category($postID){
		
		if(get_post_status($postID)){ // if post exist non false string will be returned
				
			$post_categories = get_the_category($postID);
			if( is_array($post_categories)){ 
				if(count($post_categories) > 1){
					foreach($post_categories as $key=>$value){ //if category is not one of the slider used categories
						if( $value->term_id != get_theme_mod( 'kheera_slider_posts_category_setting','ALL')){
							return $value->name;
							break;
						}	  
					}	
				}
				else{
					if(isset($post_categories[0]->name)){
						return $post_categories[0]->name;
					}
					else{
						return false;
					}	
				}		
			}
			else{
				return false;
			}	
		}
		else{
			return false;
		}
		
	}
	
	
	/**
	 * Display Header Slider Items
	 *
	 * @package kheera	
	 *
	 * @since 1.0.3
	 */	
	function kheera_display_header_slider_items()
	{
		
		$slider_category = get_theme_mod( 'kheera_slider_posts_category_setting','ALL');
		if($slider_category == 'ALL' || !$slider_category ){
			$args = array(	'posts_per_page' => esc_html(get_theme_mod( 'kheera_slider_posts_number_setting',4)));
		}
		else{
			$args = array(	'cat' => $slider_category,
							'posts_per_page' => esc_html(get_theme_mod( 'kheera_slider_posts_number_setting',4)));
		}
		
		$query = new WP_Query( $args );
 		if ( $query->have_posts() ) : 
			while ( $query->have_posts() ) :
				$query->the_post(); ?>
				<?php if ( has_post_thumbnail() ) : ?>
					
					<div class="home-slider-<?php print esc_attr(kheera_get_header_slider_style()); ?>-item" itemprop="itemListElement" itemscope itemtype="https://schema.org/BlogPosting">
						
						<?php the_post_thumbnail('kheera_large', array('class'=>'img-responsive', 'itemprop'=>'image')); ?>	
						<div class="home-slider-item-overlay">
							<span class="slider-category"><?php echo esc_html( kheera_get_post_display_category($query->post->ID) );?></span>
							<h2 itemprop="name headline"><a itemprop="url" href="<?php the_permalink(); ?>"><?php print esc_html(get_the_title($query->post->ID)); ?></a></h2>
							
							<span itemprop="author" class="slider-author">
								<?php 
									/* translators: %s: author name  */ 	
									printf(esc_html(__('By %s','kheera')),esc_attr(get_the_author_meta('display_name'))); ?>
							</span>
							<time class="slider-date" datetime="<?php echo esc_html(get_the_date('Y-m-d',$query->post->ID)); ?>" itemprop="datePublished">
								
								<?php 
									/* translators: %s: publish date  */ 	
									printf(esc_html(__('Posted On %s','kheera')),esc_attr(get_the_date(get_option('date_format'),$query->post->ID))); ?>
							</time>
							<span class="slider-comments" itemprop="commentCount">
								<?php 
									/* translators: %s: comments count  */ 	
									printf(esc_html(__('%s Comments','kheera')),esc_attr(get_comments_number($query->post->ID))); ?>
							</span>
						</div>	
						
					</div>
				<?php endif;			
			 endwhile; 
		endif;
		wp_reset_postdata();
		
	}
	
	/**
	 * Get Main Sidebar Setting
	 *
	 * @package kheera	
	 *
	 * @since 1.0.0
	 */	
	 function kheera_get_main_sidebar_setting($content_type){
		
		switch($content_type){ //content type HOME, ARCHIVES, SEARCH, 404, SHOP
			case 'HOME':
				if(get_theme_mod( 'kheera_home_sidebar_setting', 'hidden' )){
					return get_theme_mod( 'kheera_home_sidebar_setting', 'hidden');
				}
				else{
					return 'hidden';
				}
				break;
			case 'ARCHIVES':
				if(get_theme_mod( 'kheera_archives_sidebar_setting', 'hidden' )){
					return get_theme_mod( 'kheera_archives_sidebar_setting', 'hidden');
				}
				else{
					return 'hidden';
				}
				break;
			case 'SEARCH':
				if(get_theme_mod( 'kheera_archives_sidebar_setting', 'hidden' )){
					return get_theme_mod( 'kheera_archives_sidebar_setting', 'hidden');
				}
				else{
					return 'hidden';
				}
				break;
			case '404':
				if(get_theme_mod( 'kheera_404_sidebar_setting', 'hidden' )){
					return get_theme_mod( 'kheera_404_sidebar_setting', 'hidden');
				}
				else{
					return 'hidden';
				}
				break;
			case 'SHOP':
				if(get_theme_mod( 'kheera_woo_sidebar_setting', 'hidden' )){
					return get_theme_mod( 'kheera_woo_sidebar_setting', 'hidden');
				}
				else{
					return 'hidden';
				}
				break;	
			default:
				return 'hidden'; //default sidebar setting
				break;	
		}
		
	 }	 

	
	
	/**
	 * Get Main Content CSS Class 
	 *
	 * @package kheera	
	 *
	 * @since 1.0.0
	 */	
	function kheera_get_main_content_class($content_type){
		
		switch($content_type){ //content type HOME, ARCHIVES, SEARCH, 404, SHOP
			case 'HOME':
				if(kheera_get_main_sidebar_setting('HOME') == 'left' ||
				   kheera_get_main_sidebar_setting('HOME') == 'right'){
					return 'main-col-container col-md-8 col-sm-12 col-xs-12';
				}
				else{
					return 'single-col-container';
				}
				break;
			case 'ARCHIVES':
				if(kheera_get_main_sidebar_setting('ARCHIVES') == 'left' ||
				   kheera_get_main_sidebar_setting('ARCHIVES') == 'right'){
					return 'main-col-container col-md-8 col-sm-12 col-xs-12';
				}
				else{
					return 'single-col-container';
				}
				break;
			case 'SEARCH':
				if(kheera_get_main_sidebar_setting('SEARCH') == 'left' ||
				   kheera_get_main_sidebar_setting('SEARCH') == 'right'){
					return 'main-col-container col-md-8 col-sm-12 col-xs-12';
				}
				else{
					return 'single-col-container';
				}
				break;
			case '404':
				if(kheera_get_main_sidebar_setting('404') == 'left' ||
				   kheera_get_main_sidebar_setting('404') == 'right'){
					return 'main-col-container col-md-8 col-sm-12 col-xs-12';
				}
				else{
					return 'single-col-container';
				}
				break;
			case 'SHOP':
				if(kheera_get_main_sidebar_setting('SHOP') == 'left' ||
				   kheera_get_main_sidebar_setting('SHOP') == 'right'){
					return 'product-main-col-container col-md-8 col-sm-12 col-xs-12';
				}
				else{
					return 'product-single-col-container';
				}
				break;	
			default:
				return 'single-col-container'; //default content class - no sidebar setting
				break;	
		}
	}


	
	/**
	 * Display similar posts (related by tags) - used in single post
	 *
	 * @package kheera	
	 *
	 * @since 1.0.3
	 */	
	function kheera_related_posts(){
	
		$post_id = get_the_ID();
		$kheera_post_tags_ids = array();
	
		$tags = wp_get_post_tags($post_id);
		if ($tags && !is_wp_error( $tags )) {
			foreach ( $tags as $value ) {
				array_push( $kheera_post_tags_ids, $value->term_id );
			}
		
			$args = array('tag__in' => $kheera_post_tags_ids,
						'post_type' => get_post_type( $post_id ),
						'posts_per_page' => '3',
						'post__not_in' => array( $post_id ));
		
					
			$query = new WP_Query( $args );
 
			if ( $query->have_posts() ) : ?>
			
				<div class="related-posts-container row">
					<h4><?php esc_html_e('You may also like','kheera'); ?> </h4>
				
				<?php	while ( $query->have_posts() ) :
 
							$query->the_post(); ?>
							<div class="related-post-container col-md-4 col-sm-4 col-xs-12" itemprop="itemListElement" itemscope itemtype="https://schema.org/BlogPosting">
								
								<?php if( has_post_thumbnail()): ?>
									<a itemprop="url" href="<?php echo esc_url( get_permalink()); ?>">
									<?php the_post_thumbnail('kheera_small', array('class' => 'img-responsive', 'itemprop'=>'image')); ?>
									</a>
								<?php endif;	?>
								
								<?php the_title( '<a itemprop="url" href="' . esc_url( get_permalink() ) . '" rel="bookmark"><h5 itemprop="name headline">', '</h5></a>' ); ?>
								<?php echo esc_html(__(' Posted On','kheera'));?> 
								<time class="post-meta-date" datetime="<?php echo esc_html(get_the_date('Y-m-d',$query->post->ID)); ?>" itemprop="datePublished">
									<?php echo esc_html(get_the_date(get_option('date_format'),$query->post->ID)); ?>
								</time>
							</div>
				<?php	endwhile; ?>
				</div>
			<?php endif;
			wp_reset_postdata();				
		}
	
	}

	/**
	 * Get the number of Columns (2 or 3) in Grid Layout
	 *
	 * @package kheera	
	 *
	 * @since 1.0.0
	 */	
	function kheera_get_grid_layout_cols(){
		$kheera_grid_cols = absint(get_theme_mod( 'kheera_grid_columns_setting'));
		if ($kheera_grid_cols == 2 || $kheera_grid_cols ==3){
				return $kheera_grid_cols;
		}
		else{
			return 2;	
		}	
	}
	

	/**
	 * Get the layout container class
	 *
	 * @package kheera	
	 *
	 * @since 1.0.0
	 */
	function kheera_get_layout_class($kheera_layout_setting){
		
		if(isset($kheera_layout_setting)){
			switch ($kheera_layout_setting){
				case 'kheera_list_layout':
					return 'lists-posts-container';
					break;
				case 'kheera_grid_layout':
					if(kheera_get_grid_layout_cols() == 2){
						return	'col2-grid-posts-container row';
					}
					else{	
						return	'col3-grid-posts-container row';
					}
					break;
				case 'kheera_full_width_list_layout':
					return 'lists-posts-container';	
					break;
				case 'kheera_full_width_grid_layout':
					break;
				default:
					return 'lists-posts-container';
					break;
			}	
		}
		else{
			return 'lists-posts-container';
		}	
	}