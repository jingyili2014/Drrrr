<?php
/**
 * Search Form Template
 *
 *
 * @package kheera
 */
?>


	<div class="search-form-close"><i class="fas fa-window-close"></i></div>
	<form  method="get" autocomplete="off" action="<?php  echo esc_url_raw( home_url( '/' ) ); ?>">
		<input type="text" name="s" class="search-form-input" value=""  placeholder="<?php esc_attr_e('Search and hit enter...','kheera'); ?>"/>
		<button class="search-form-submit btn-primary" name="submit" type="submit"><i class="fa fa-search"></i></button>
	</form>