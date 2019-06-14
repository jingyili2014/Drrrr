<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package kheera
 */

	get_header(); ?>

	<main id="primary" class="content-container container">
				
		<div class="single-col-container">
			
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

		</div>
		
			
			
	</main>
	
	<?php
	
	get_footer();
