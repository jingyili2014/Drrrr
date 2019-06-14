<?php
/**
* Enqueue scripts and styles
*
* @package BoxWP WordPress Theme
* @copyright Copyright (C) 2018 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

function boxwp_scripts() {
    wp_enqueue_style('boxwp-maincss', get_stylesheet_uri(), array(), NULL);
    wp_enqueue_style('font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.min.css', array(), NULL );
    wp_enqueue_style('boxwp-webfont', '//fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i|Domine:400,700|Oswald:400,700', array(), NULL);
    wp_enqueue_script('jquery-fitvids', get_template_directory_uri() .'/assets/js/jquery.fitvids.js', array( 'jquery' ), NULL, true);

    $boxwp_sticky_menu = TRUE;
    $boxwp_sticky_mobile_menu = TRUE;
    if ( !boxwp_get_option('enable_sticky_mobile_menu') ) {
        $boxwp_sticky_mobile_menu = FALSE;
    }

    $boxwp_sticky_sidebar = FALSE;
    if( is_singular() ) {
        if ( !is_page_template( array( 'template-full-width-page.php', 'template-full-width-post.php' ) ) ) {
            $boxwp_sticky_sidebar = TRUE;
            wp_enqueue_script('ResizeSensor', get_template_directory_uri() .'/assets/js/ResizeSensor.js', array( 'jquery' ), NULL, true);
            wp_enqueue_script('theia-sticky-sidebar', get_template_directory_uri() .'/assets/js/theia-sticky-sidebar.js', array( 'jquery' ), NULL, true);
        }
    }

    wp_enqueue_script('boxwp-customjs', get_template_directory_uri() .'/assets/js/custom.js', array( 'jquery' ), NULL, true);
    wp_localize_script( 'boxwp-customjs', 'boxwp_ajax_object',
        array(
            'ajaxurl' => admin_url( 'admin-ajax.php' ),
            'sticky_menu' => $boxwp_sticky_menu,
            'sticky_menu_mobile' => $boxwp_sticky_mobile_menu,
            'sticky_sidebar' => $boxwp_sticky_sidebar,
        )
    );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'boxwp_scripts' );

/**
 * Enqueue IE compatible scripts and styles.
 */
function boxwp_ie_scripts() {
    wp_enqueue_script( 'html5shiv', get_template_directory_uri(). '/assets/js/html5shiv.js', array(), NULL, false);
    wp_script_add_data( 'html5shiv', 'conditional', 'lt IE 9' );

    wp_enqueue_script( 'respond', get_template_directory_uri(). '/assets/js/respond.js', array(), NULL, false );
    wp_script_add_data( 'respond', 'conditional', 'lt IE 9' );
}
add_action( 'wp_enqueue_scripts', 'boxwp_ie_scripts' );

/**
 * Enqueue customizer styles.
 */
function boxwp_enqueue_customizer_styles() {
    wp_enqueue_style( 'boxwp-customizer-styles', get_template_directory_uri() . '/inc/admin/css/customizer-style.css', array(), NULL );
    wp_enqueue_style('font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.min.css', array(), NULL );
}
add_action( 'customize_controls_enqueue_scripts', 'boxwp_enqueue_customizer_styles' );