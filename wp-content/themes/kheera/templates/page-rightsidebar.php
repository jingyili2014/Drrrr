<?php
	/**
	* Template Name: Page - Right Sidebar
	*
	* This is the template that displays page with the main sidebar on the right.
	*
	* @package Kheera
	*/

	get_header(); ?>
	
	<main id="primary" class="content-container container">
				
		<article <?php post_class('main-col-container col-md-8 col-sm-12 col-xs-12">'); ?>>
			
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
		
		<?php get_sidebar(); ?>
		
	</main>
	
	<?php
	
	get_footer();