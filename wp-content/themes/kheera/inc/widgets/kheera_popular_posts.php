<?php  
/**
* Widget Kheera Latest Posts 
*
*
* @package kheera	1.0.0
*/

	add_action( 'widgets_init', array ( 'kheera_popular_posts', 'register' ) );

	class Kheera_Popular_Posts extends WP_Widget {

		
		// Constructor.
		public function __construct(){
			parent::__construct( strtolower( __CLASS__ ), esc_html(__('Kheera - Popular Posts Widget','kheera')) );
		}

    
		// widget  form
		public function form( $instance ){

			
			
			//widget title
			$title = isset ( $instance['kheera_title_widget'] ) ? esc_attr($instance['kheera_title_widget']) : __('Popular Posts', 'kheera'); ?>
			<p><label for="<?php echo esc_attr( $this->get_field_id( 'kheera_title_widget' )); ?>">
				<?php echo esc_html__( 'Title', 'kheera' ); ?>
			</label>
			<br /><input type="text" 
				name="<?php echo esc_attr(  $this->get_field_name( 'kheera_title_widget' ));?>" 
				id="<?php echo esc_attr(  $this->get_field_id( 'kheera_title_widget' )); ?>" 
				value="<?php echo esc_attr( $title );?>" class="widefat"></p>
					
			<?php //posts visible number - default number 1
			$posts_number_array = array ( 1 => __('Single Post','kheera'),
										  3 => __(' 3 Posts','kheera'));
			$number = isset ( $instance['kheera_posts_number'] ) ? absint($instance['kheera_posts_number']) : 1 ; ?>
			
			<p><label for="<?php echo esc_attr(  $this->get_field_id( 'kheera_posts_number' )); ?>">
				<?php echo esc_html__( 'Number of visible Posts on slider:','kheera');?>
				</label>
			<select id="<?php echo esc_attr(  $this->get_field_id( 'kheera_posts_number' )); ?>" 
					name="<?php echo esc_attr(  $this->get_field_name( 'kheera_posts_number' ));?>" class="widefat">
			<?php foreach ($posts_number_array as $key => $value){
					printf('<option value="%1$s" %3$s >%2$s</option>', esc_attr($key), esc_attr($value), selected( esc_attr($number), esc_attr($key)));
			} ?>
			</select></p> 
			
			<?php //post category - Default ALL
			$category_array = kheera_get_post_slider_categories(); 
			$category = isset ( $instance['kheera_posts_cat'] ) ? esc_attr($instance['kheera_posts_cat']) : 'ALL' ; ?>
			<p><label for="<?php echo esc_attr(  $this->get_field_id( 'kheera_posts_cat' )); ?>">
				<?php echo esc_html__( 'Select Posts Category:','kheera');?>
				</label>
			<select id="<?php echo esc_attr(  $this->get_field_id( 'kheera_posts_cat' )); ?>" 
					name="<?php echo esc_attr(  $this->get_field_name( 'kheera_posts_cat' ));?>" class="widefat">
			<?php foreach ($category_array as $key => $value){
					printf('<option value="%1$s" %3$s >%2$s</option>', esc_attr($key), esc_attr($value), selected( esc_attr($category), esc_attr($key)));
			} ?>
			</select></p>
			
			
			<?php //posts number - default number 4
			$number_count = isset ( $instance['kheera_posts_number_count'] ) ? absint($instance['kheera_posts_number_count']) : 4 ; ?>
			
			<p><label for="<?php echo esc_attr(  $this->get_field_id( 'kheera_posts_number_count' )); ?>">
				<?php echo esc_html__( 'Number of Posts to show:','kheera');?>
				</label>
			<input class="tiny-text" 
				id="<?php echo esc_attr(  $this->get_field_id( 'kheera_posts_number_count' ));?>" 
				name="<?php echo esc_attr(  $this->get_field_name( 'kheera_posts_number_count' ));?>" 
				type="number" step="1" min="1" value="<?php echo absint($number_count);?>" size="3" />
			</p>

			<?php	
		}

		// widget output.
		public function widget( $args, $instance ){   // Widget output
       
			extract($args); ?>
			
			<div class="widget" itemscope itemtype="http://schema.org/ItemList">
				<?php 
				
					if(isset( $instance['kheera_title_widget'] )){
						print '<h4>'.esc_html($instance['kheera_title_widget']).'</h4>';
					} 
				
					//set posts_per_page args
					if(isset( $instance['kheera_posts_number_count'] )){
						$args = array(	'posts_per_page' =>  $instance['kheera_posts_number_count'] );
					}
					else
					{
						$args = array(	'posts_per_page' =>  4 );
					}
					
					//set category args
					if(isset( $instance['kheera_posts_cat'] )){
						array_push( $args,	array('cat' =>  $instance['kheera_posts_cat'] ));
					}
					
					if(isset( $instance['kheera_posts_number'] )){
						switch($instance['kheera_posts_number']){
							case 1:
								echo '<div class="popular-posts-slider owl-carousel owl-theme">';
								break;
							case 3:
								echo '<div class="popular-posts-slider-3 owl-carousel owl-theme">';
								break;
							default:
								echo '<div class="popular-posts-slider owl-carousel owl-theme">';
								break;
						}	
					}
					
					$query = new WP_Query( $args );
					if ( $query->have_posts() ) : 
						while ( $query->have_posts() ) :
							$query->the_post(); 
							
								/*Display the post only if there is a fetaured image,
								* since the view is slider like, displaying posts without featured imagesavealpha
								* creates subpar user experience */
								if ( has_post_thumbnail() ) : ?>
									
									<div class="popular-posts-slider-item" data-dot='<i class="far fa-circle"></i>' itemprop="itemListElement" itemscope itemtype="https://schema.org/BlogPosting">
							
										<div class="popular-post-item-img-container">
											<a itemprop="url" href="<?php echo esc_url_raw(get_permalink($query->post->ID)); ?>'">
											<?php echo	get_the_post_thumbnail($query->post->ID,'kheera_small', array('class'=>'img-responsive', 'itemprop'=>'image')); ?>
											</a>
										</div>
							
										<h5 itemprop="name headline"><a itemprop="url" href="<?php echo esc_url_raw(get_permalink($query->post->ID)); ?>">
										<?php echo esc_html(get_the_title($query->post->ID)); ?>
										</a></h5>
									</div>
							
								<?php endif;  ?>
							
						<?php endwhile; 
					endif;
					wp_reset_postdata(); ?>		
					
				</div>
			</div>	
			<?php		
		}

    
		// save - sanitize content
		public function update( $new_instance, $old_instance ){
        
			$instance = $old_instance;
			$instance['kheera_title_widget'] = sanitize_text_field( $new_instance['kheera_title_widget'] );
			$instance['kheera_posts_number'] = absint( $new_instance['kheera_posts_number'] );
			$instance['kheera_posts_number_count'] = absint( $new_instance['kheera_posts_number_count'] );
			$instance['kheera_posts_cat'] = sanitize_text_field( $new_instance['kheera_posts_cat'] );
			return $instance;
		}

    
		// register widget
		public static function register(){
			register_widget( __CLASS__ );
		}
	}