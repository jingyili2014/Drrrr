<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package kheera
 */

?>
	
	<div class="container-fluid widget-area-before-footer">
		<?php dynamic_sidebar( 'kheera_instagram_footer' ); ?>	
	</div>

	<footer class="container-fluid">
		
	<?php	if(get_theme_mod( 'kheera_footer_widgets_display_setting', true )): ?>
		<div class="container footer-content">
			<div class="row">
				<div class="col-md-4 col-sm-12 col-xs-12">
					<?php dynamic_sidebar( 'kheera_footer_section_1' ); ?>	
				</div>
				<div class="col-md-4  col-sm-6 col-xs-12">
					<?php dynamic_sidebar( 'kheera_footer_section_2' ); ?>
				</div>
				<div class="col-md-4  col-sm-6 col-xs-12">
					<?php dynamic_sidebar( 'kheera_footer_section_3' ); ?>
				</div>
			</div>
		</div>
	<?php endif; ?>	
	
		<div class="container footer-bar">
		<?php	if(get_theme_mod( 'madchefie_footer_copyright_text_setting')):
			print esc_html(get_theme_mod( 'madchefie_footer_copyright_text_setting'));
		else:
			//link to reborn themes if text on footer is not set
			print esc_html(get_bloginfo( 'name', 'display' ) ); 
		endif; ?>
			- <a href="<?php echo esc_url('https://www.wordpress.org');?>"><?php esc_html_e('Powered by WordPress','kheera');?></a>			
			- <a href="<?php echo esc_url('https://www.rebornthemes.com');?>"><?php esc_html_e('Designed by ','kheera');?>Reborn Themes</a>			
			
		</div>
		
	</footer>
	
	
	<?php wp_footer(); ?>

	</body>
</html>