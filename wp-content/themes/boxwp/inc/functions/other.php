<?php
/**
* More Custom Functions
*
* @package BoxWP WordPress Theme
* @copyright Copyright (C) 2018 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

// Get custom-logo URL
function boxwp_custom_logo() {
    if ( ! has_custom_logo() ) {return;}
    $boxwp_custom_logo_id = get_theme_mod( 'custom_logo' );
    $boxwp_logo = wp_get_attachment_image_src( $boxwp_custom_logo_id , 'full' );
    return $boxwp_logo[0];
}

function boxwp_read_more_text() {
       $readmoretext = esc_html__( 'Continue Reading', 'boxwp' );
        if ( boxwp_get_option('read_more_text') ) {
                $readmoretext = boxwp_get_option('read_more_text');
        }
       return $readmoretext;
}

// Category ids in post class
function boxwp_category_id_class($classes) {
        global $post;
        foreach((get_the_category($post->ID)) as $category) {
            $classes [] = 'wpcat-' . $category->cat_ID . '-id';
        }
        return $classes;
}
add_filter('post_class', 'boxwp_category_id_class');

// Change excerpt length
function boxwp_excerpt_length($length) {
    if ( is_admin() ) {
        return $length;
    }
    $read_more_length = 15;
    if ( boxwp_get_option('read_more_length') ) {
        $read_more_length = boxwp_get_option('read_more_length');
    }
    return $read_more_length;
}
add_filter('excerpt_length', 'boxwp_excerpt_length');

// Change excerpt more word
function boxwp_excerpt_more($more) {
       if ( is_admin() ) {
         return $more;
       }
       return '...';
}
add_filter('excerpt_more', 'boxwp_excerpt_more');

// Adds custom classes to the array of body classes.
function boxwp_body_classes( $classes ) {
    // Adds a class of group-blog to blogs with more than 1 published author.
    if ( is_multi_author() ) {
        $classes[] = 'boxwp-group-blog';
    }

    if( is_singular() ) {
        if ( is_page_template( array( 'template-full-width-page.php', 'template-full-width-post.php' ) ) ) {
           $classes[] = 'boxwp-body-full-width';
        }
    } else {
        $classes[] = 'boxwp-body-full-width';
    }

    return $classes;
}
add_filter( 'body_class', 'boxwp_body_classes' );


function boxwp_post_style() {
       $post_style = 'grid';
       return $post_style;
}


function boxwp_grid_thumb_style() {
       $thumb_style = 'boxwp-square-image';
       return $thumb_style;
}


function boxwp_grid_no_thumb_url() {
       $thumb_url = get_template_directory_uri() . '/assets/images/no-image-4-4.jpg';
       return $thumb_url;
}


function boxwp_post_grid_cols() {
       $post_column = 'boxwp-4-col';
       return $post_column;
}

function boxwp_footer_grid_cols() {
       $footer_column = 'boxwp-footer-4-col';
       return $footer_column;
}