<?php
	/**
	* Template Name: Page - Right Sidebar
	*
	* This is the template that displays page without any sidebars.
	*
	* @package Kheera
	*/

	get_header(); ?>
	
	<main id="primary" class="content-container container">
				
		<article <?php post_class('single-col-container');?>>
			
			<div class="content-widget-area col-md-12">
				<?php dynamic_sidebar( 'kheera_before_content' ); ?>	
			</div>

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>
			
			<div class="content-widget-area col-md-12">
				<?php dynamic_sidebar( 'kheera_after_content' ); ?>	
			</div>

		</article>
		
	</main>
	
	<?php
	
	get_footer();