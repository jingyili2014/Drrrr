<?php  
/**
* Widget Kheera Latest Posts 
*
*
* @package kheera	1.0.0
*/

	add_action( 'widgets_init', array ( 'kheera_latest_posts', 'register' ) );

	class Kheera_Latest_Posts extends WP_Widget {

		
		// Constructor.
		public function __construct(){
			parent::__construct( strtolower( __CLASS__ ), esc_html(__('Kheera - Latest Posts Widget','kheera')) );
		}

    
		// widget  form
		public function form( $instance ){

			
			
			//widget title
			$title = isset ( $instance['kheera_title_widget'] ) ? esc_attr($instance['kheera_title_widget']) : __('Latest Posts', 'kheera'); ?>
			<p><label for="<?php echo esc_attr($this->get_field_id( 'kheera_title_widget' )); ?>">
				<?php echo esc_html__( 'Title', 'kheera' ); ?>
			</label>
			<br /><input type="text" 
				name="<?php echo esc_attr($this->get_field_name( 'kheera_title_widget' ));?>" 
				id="<?php echo esc_attr($this->get_field_id( 'kheera_title_widget' )); ?>" 
				value="<?php echo esc_attr( $title );?>" class="widefat"></p>
					
			<?php //posts number - default number 4
			$number = isset ( $instance['kheera_posts_number'] ) ? absint($instance['kheera_posts_number']) : 4 ; ?>
			
			<p><label for="<?php echo esc_attr($this->get_field_id( 'kheera_posts_number' )); ?>">
				<?php echo esc_html__( 'Number of Posts to show:','kheera');?>
				</label>
			<input class="tiny-text" 
				id="<?php echo esc_attr($this->get_field_id( 'kheera_posts_number' ));?>" 
				name="<?php echo esc_attr($this->get_field_name( 'kheera_posts_number' ));?>" 
				type="number" step="1" min="1" value="<?php echo absint($number);?>" size="3" />
			</p> 
			
			<?php //post category - Default ALL
			$category_array = kheera_get_post_slider_categories(); 
			$category = isset ( $instance['kheera_posts_cat'] ) ? esc_attr($instance['kheera_posts_cat']) : 'ALL' ; ?>
			<p><label for="<?php echo esc_attr($this->get_field_id( 'kheera_posts_cat' )); ?>">
				<?php echo esc_html__( 'Select Posts Category:','kheera');?>
				</label>
			<select id="<?php echo esc_attr($this->get_field_id( 'kheera_posts_cat' )); ?>" 
					name="<?php echo esc_attr($this->get_field_name( 'kheera_posts_cat' ));?>" class="widefat">
			<?php foreach ($category_array as $key => $value){
					printf('<option value="%1$s" %3$s >%2$s</option>', esc_attr($key), esc_attr($value), selected( esc_attr($category), esc_attr($key)));
			} ?>
			</select></p>
			
			<?php 	
		}

		// widget output.
		public function widget( $args, $instance ){   // Widget output
       
			extract($args); ?>
			
			<div class="widget" itemscope itemtype="http://schema.org/ItemList">
				<?php if(isset( $instance['kheera_title_widget'] )){
						print '<h4>'.esc_html($instance['kheera_title_widget']).'</h4>';
				} ?>
				<div class="row">
					
					<?php if(isset( $instance['kheera_posts_number'] )){
						$args = array(	'posts_per_page' =>  $instance['kheera_posts_number'] );
					}
					else
					{
						$args = array(	'posts_per_page' =>  4 );
					}
					
					if(isset( $instance['kheera_posts_cat'] )){
						array_push($args , array(	'cat' =>  $instance['kheera_posts_cat'] ));
					}
					
					$query = new WP_Query( $args );
					if ( $query->have_posts() ) : 
						while ( $query->have_posts() ) :
							$query->the_post(); ?>
							
							<div class="latest-post-container col-md-12" itemprop="itemListElement" itemscope itemtype="https://schema.org/BlogPosting">
							
								<?php if ( has_post_thumbnail() ) : ?>
									<div class="latest-post-img-container">
										<a itemprop="url" href="<?php echo esc_url(get_permalink($query->post->ID)); ?>'">
										<?php echo	get_the_post_thumbnail($query->post->ID,'kheera_small', array('class'=>'img-responsive', 'itemprop'=>'image')); ?>
										</a>
									</div>
								<?php endif;  ?>

							
								<p><a itemprop="url name headline" href="<?php echo esc_url(get_permalink($query->post->ID)); ?>">
								<?php echo esc_html(get_the_title($query->post->ID)); ?>
								</a></p>
								<time class="latest-post-date" datetime="<?php echo esc_html(get_the_date('Y-m-d',$query->post->ID)); ?>" itemprop="datePublished">
								<?php echo esc_html(get_the_date( get_option('date_format'),$query->post->ID)); ?>
								</time>
							</div>
							
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
			$instance['kheera_posts_cat'] = sanitize_text_field( $new_instance['kheera_posts_cat'] );
			return $instance;
		}

    
		// register widget
		public static function register(){
			register_widget( __CLASS__ );
		}
	}