<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package kheera
 */

	if ( ! is_active_sidebar( 'kheera_main_sidebar' ) ) {
		return;
	}
	?>

	<aside id="secondary" class="sidebar-col-container col-md-4 col-sm-12 col-xs-12">
		<?php dynamic_sidebar( 'kheera_main_sidebar' ); ?>
	</aside>
