<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package kheera
 */

get_header(); ?>

	
	<main id="primary" class="content-container container">
				
		<?php	if (kheera_get_main_sidebar_setting('404') === 'left') :  
					get_sidebar();
		endif; ?>
		
		
		<div class="<?php echo esc_html(kheera_get_main_content_class('404')); ?>">
			
			<div class="content-widget-area col-md-12">
				<?php dynamic_sidebar( 'kheera_before_content' ); ?>	
			</div>

			<section class="error-404 not-found">
				
				<h1 class="title-404">404</h1>
				<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'kheera' ); ?></h1>
				

				<p><?php esc_html_e( 'It looks like nothing was found at this location.', 'kheera' ); ?></p>

			</section>
			
			
			<div class="content-widget-area col-md-12">
				<?php dynamic_sidebar( 'kheera_after_content' ); ?>	
			</div>

		</div>
		
		<?php	if(kheera_get_main_sidebar_setting('404') == 'right'): 
					get_sidebar();
		endif; ?>
		
	</main>
	

<?php
get_footer();
