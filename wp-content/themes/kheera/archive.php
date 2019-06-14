<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package kheera
 */

	get_header(); ?>

	<main id="primary" class="content-container container">
		
		<?php	if(kheera_get_main_sidebar_setting('ARCHIVES') == 'left'): 
					get_sidebar();
				endif; ?>
				
		<div class="<?php echo esc_html(kheera_get_main_content_class('ARCHIVES')); ?>">
		
			<div class="content-widget-area col-md-12">
				<?php dynamic_sidebar( 'kheera_before_content' ); ?>	
			</div>

		<?php
		if ( have_posts() ) : 

			if(get_theme_mod( 'kheera_archives_layout_setting','kheera_full_width_layout')){
				$kheera_archives_layout = get_theme_mod( 'kheera_archives_layout_setting');
			}
			
				
			if($kheera_archives_layout != 'kheera_full_width_layout'): ?>
				<div class="<?php print esc_html(kheera_get_layout_class($kheera_archives_layout));?>" itemscope itemtype="http://schema.org/ItemList">
			<?php else: ?>
				<div itemscope itemtype="http://schema.org/ItemList">
			<?php endif;
			
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				switch($kheera_archives_layout){
					case 'kheera_full_width_layout':
						get_template_part( 'template-parts/content-fullwidth', 'none' );
						break;
					case 'kheera_list_layout':
						get_template_part( 'template-parts/content-list', 'none' );
						break;
					case 'kheera_grid_layout' :
						get_template_part( 'template-parts/content-grid', 'none' );
						break;
					default:
						get_template_part( 'template-parts/content-fullwidth', 'none' );
						break;
				}

			endwhile; ?>
			
			
			</div>
			
			
			<div class="posts-pagination col-md-12">
					
				<?php 
					// str-replace is used to remove not needed html attribute for HTML5 Validation
					print str_replace('role="navigation"','',get_the_posts_pagination( array(
												'mid_size' => 2,
												'prev_text' =>__( '<i class="fa  fa-angle-double-left" aria-hidden="true"></i> Previous','kheera' ),
												'next_text' => __( 'Next <i class="fa fa-angle-double-right" aria-hidden="true"></i>','kheera' ),) ));
				?>
			</div>

		<?php else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

			<div class="content-widget-area col-md-12">
				<?php dynamic_sidebar( 'kheera_after_content' ); ?>	
			</div>

		</div>
		
		<?php	if(kheera_get_main_sidebar_setting('ARCHIVES') == 'right'): 
					get_sidebar();
				endif; ?>
		
	</main>

<?php

	get_footer();
