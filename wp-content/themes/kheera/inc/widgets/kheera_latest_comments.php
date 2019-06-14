<?php  
/**
* Widget Kheera Latest Coments
*
*
* @package kheera	1.0.0
*/

	add_action( 'widgets_init', array ( 'kheera_latest_comments', 'register' ) );

	class Kheera_Latest_Comments extends WP_Widget {

		
		// Constructor.
		public function __construct(){
			parent::__construct( strtolower( __CLASS__ ), esc_html(__('Kheera - Latest Comennts Widget','kheera')) );
		}

    
		// widget  form
		public function form( $instance ){

			//widget title
			$title = isset ( $instance['kheera_title_widget'] ) ? esc_attr($instance['kheera_title_widget']) : __('Latest Comments', 'kheera'); ?>
			<p><label for="<?php echo esc_attr($this->get_field_id( 'kheera_title_widget'));  ?>">
				<?php echo esc_html__( 'Title', 'kheera' );?>
			</label>
			<br /><input type="text" name="<?php echo esc_attr($this->get_field_name( 'kheera_title_widget' ));?>" id="%1$s" value="<?php echo esc_attr( $title );?>" class="widefat"></p>
			
			<?php //comments number
			$number = isset ( $instance['kheera_comments_number'] ) ? absint($instance['kheera_comments_number']) : 5 ; ?>
			
			<p><label for="<?php echo esc_attr($this->get_field_id( 'kheera_comments_number' )); ?>">
				<?php echo esc_html__( 'Number of comments to show:','kheera');?>
			</label>
			<input class="tiny-text" id="<?php echo  esc_attr($this->get_field_id( 'kheera_comments_number' ));?>" name="<?php echo  esc_attr($this->get_field_name( 'kheera_comments_number' ));?>" type="number" step="1" min="1" value="<?php echo absint($number);?>" size="3" />
			</p> 
			
			<?php
			
		}

		// widget output.
		public function widget( $args, $instance ){   // Widget output
       
			extract($args);

			print '<div class="widget">';
			//title output
			if(isset( $instance['kheera_title_widget'] ) || $instance['kheera_title_widget']){
				print '<h4>'.esc_attr($instance['kheera_title_widget']).'</h4>';
			}
			
			
			$comments = get_comments( apply_filters( 'widget_comments_args', array(
					'number'      => $instance['kheera_comments_number'],
					'status'      => 'approve',
					'post_status' => 'publish'
			), $instance ) );
			
			if ( is_array( $comments ) && $comments ) {
				
				echo'<div class="latest-comments-container" itemscope itemtype="http://schema.org/UserComments">';
					
				foreach ( (array) $comments as $comment ) { ?>
					<div class="latest-comment-container">
						<div class="latest-comment-img-container">
								<?php echo get_avatar( $comment, 50,'','',array('class' => 'img-responsive img-circle') ); ?>
						</div>
						
						
							<time class="latest-comment-date" itemprop="commentTime" datetime="<?php echo esc_html(get_comment_date( 'Y-m-d' , $comment ));?>">
								<?php echo esc_html(get_comment_date( get_option('date_format') , $comment ));?> 
							</time>
							<strong itemprop="creator"><?php echo get_comment_author_link( $comment ); ?>
							: </strong>
							
							<p itemprop="commentText">
								<?php comment_excerpt($comment->comment_ID); ?>
							</p>	
							
						
						
					</div> <?php
				}
				echo '</div>';
			}	
			
			echo '</div>';
		}

    
		// save - sanitize content
		public function update( $new_instance, $old_instance ){
        
			$instance = $old_instance;
			$instance['kheera_title_widget'] = sanitize_text_field( $new_instance['kheera_title_widget'] );
			$instance['kheera_comments_number'] = absint( $new_instance['kheera_comments_number'] );
			return $instance;
		}

    
		// register widget
		public static function register(){
			register_widget( __CLASS__ );
		}
	}