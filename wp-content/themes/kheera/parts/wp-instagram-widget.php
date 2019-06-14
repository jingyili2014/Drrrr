<?php
/**
 * Custom template part for WP Instagram Widget
 *
 *
 * @package kheera	
 */
	 
	if ( $args['id'] == 'kheera_instagram_footer'){ // if sidebar is before footer
	 
		echo '<li class="col-md-2 col-sm-4 col-xs-6">
				<a href="'. esc_url( $item['link'] ) 
							. '" target="' . esc_attr( $target ) 
						    .'">
				<img src="' . esc_url( $item[$size] ) 
							. '"  alt="' 
							. esc_attr( $item['description'] ) 
							. '" title="' 
							. esc_attr( $item['description'] ) 
							. '"  class="img-responsive" /></a>
				<div class="instagram-overlay-container">
					<a href="'. esc_url( $item['link'] ) 
							. '" target="' . esc_attr( $target ) 
						    .'">
						<i class="fas fa-external-link-alt"></i>
					</a>	
				</div>
			</li>'; 
	}
	else{ //display default widget content
		echo '<li class="' . esc_attr( $liclass ) . '"><a href="' . esc_url( $item['link'] ) . '" target="' . esc_attr( $target ) . '"  class="' . esc_attr( $aclass ) . '"><img src="' . esc_url( $item[$size] ) . '"  alt="' . esc_attr( $item['description'] ) . '" title="' . esc_attr( $item['description'] ) . '"  class="' . esc_attr( $imgclass ) . '"/></a></li>';
	}