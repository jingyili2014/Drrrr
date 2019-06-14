<?php
/**
* Register widget area.
*
* @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
*
* @package BoxWP WordPress Theme
* @copyright Copyright (C) 2018 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

function boxwp_widgets_init() {

register_sidebar(array(
    'id' => 'boxwp-header-banner',
    'name' => esc_html__( 'Header Banner', 'boxwp' ),
    'description' => esc_html__( 'This sidebar is located on the header of the web page.', 'boxwp' ),
    'before_widget' => '<div id="%1$s" class="boxwp-header-widget widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="boxwp-widget-title">',
    'after_title' => '</h2>'));

register_sidebar(array(
    'id' => 'boxwp-main-sidebar',
    'name' => esc_html__( 'Main Sidebar', 'boxwp' ),
    'description' => esc_html__( 'This sidebar is located on the right-hand side of web page.', 'boxwp' ),
    'before_widget' => '<div id="%1$s" class="boxwp-side-widget widget boxwp-box %2$s"><div class="boxwp-box-inside">',
    'after_widget' => '</div></div>',
    'before_title' => '<h2 class="boxwp-widget-title"><span>',
    'after_title' => '</span></h2>'));

register_sidebar(array(
    'id' => 'boxwp-home-fullwidth-widgets',
    'name' => esc_html__( 'Top Full Width Widgets (Home Page Only)', 'boxwp' ),
    'description' => esc_html__( 'This full-width widget area is located at the top of homepage.', 'boxwp' ),
    'before_widget' => '<div id="%1$s" class="boxwp-main-widget boxwp-box widget %2$s"><div class="boxwp-box-inside">',
    'after_widget' => '</div></div>',
    'before_title' => '<div class="boxwp-widget-heading"><h2 class="boxwp-widget-title"><span>',
    'after_title' => '</span></h2></div>'));

register_sidebar(array(
    'id' => 'boxwp-fullwidth-widgets',
    'name' => esc_html__( 'Top Full Width Widgets (Every Page)', 'boxwp' ),
    'description' => esc_html__( 'This full-width widget area is located at the top of every page.', 'boxwp' ),
    'before_widget' => '<div id="%1$s" class="boxwp-main-widget boxwp-box widget %2$s"><div class="boxwp-box-inside">',
    'after_widget' => '</div></div>',
    'before_title' => '<div class="boxwp-widget-heading"><h2 class="boxwp-widget-title"><span>',
    'after_title' => '</span></h2></div>'));

register_sidebar(array(
    'id' => 'boxwp-home-top-widgets',
    'name' => esc_html__( 'Top Widgets (Home Page Only)', 'boxwp' ),
    'description' => esc_html__( 'This widget area is located at the top of homepage.', 'boxwp' ),
    'before_widget' => '<div id="%1$s" class="boxwp-main-widget boxwp-box widget %2$s"><div class="boxwp-box-inside">',
    'after_widget' => '</div></div>',
    'before_title' => '<div class="boxwp-widget-heading"><h2 class="boxwp-widget-title"><span>',
    'after_title' => '</span></h2></div>'));

register_sidebar(array(
    'id' => 'boxwp-top-widgets',
    'name' => esc_html__( 'Top Widgets (Every Page)', 'boxwp' ),
    'description' => esc_html__( 'This widget area is located at the top of every page.', 'boxwp' ),
    'before_widget' => '<div id="%1$s" class="boxwp-main-widget boxwp-box widget %2$s"><div class="boxwp-box-inside">',
    'after_widget' => '</div></div>',
    'before_title' => '<div class="boxwp-widget-heading"><h2 class="boxwp-widget-title"><span>',
    'after_title' => '</span></h2></div>'));

register_sidebar(array(
    'id' => 'boxwp-home-bottom-widgets',
    'name' => esc_html__( 'Bottom Widgets (Home Page Only)', 'boxwp' ),
    'description' => esc_html__( 'This widget area is located at the bottom of homepage.', 'boxwp' ),
    'before_widget' => '<div id="%1$s" class="boxwp-main-widget boxwp-box widget %2$s"><div class="boxwp-box-inside">',
    'after_widget' => '</div></div>',
    'before_title' => '<div class="boxwp-widget-heading"><h2 class="boxwp-widget-title"><span>',
    'after_title' => '</span></h2></div>'));

register_sidebar(array(
    'id' => 'boxwp-bottom-widgets',
    'name' => esc_html__( 'Bottom Widgets (Every Page)', 'boxwp' ),
    'description' => esc_html__( 'This widget area is located at the bottom of every page.', 'boxwp' ),
    'before_widget' => '<div id="%1$s" class="boxwp-main-widget boxwp-box widget %2$s"><div class="boxwp-box-inside">',
    'after_widget' => '</div></div>',
    'before_title' => '<div class="boxwp-widget-heading"><h2 class="boxwp-widget-title"><span>',
    'after_title' => '</span></h2></div>'));

register_sidebar(array(
    'id' => 'boxwp-top-footer',
    'name' => esc_html__( 'Footer Top', 'boxwp' ),
    'description' => esc_html__( 'This sidebar is located on the top of the footer.', 'boxwp' ),
    'before_widget' => '<div id="%1$s" class="boxwp-footer-widget widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="boxwp-widget-title"><span>',
    'after_title' => '</span></h2>'));

register_sidebar(array(
    'id' => 'boxwp-footer-1',
    'name' => esc_html__( 'Footer 1', 'boxwp' ),
    'description' => esc_html__( 'This sidebar is located on the left bottom of web page.', 'boxwp' ),
    'before_widget' => '<div id="%1$s" class="boxwp-footer-widget widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="boxwp-widget-title"><span>',
    'after_title' => '</span></h2>'));

register_sidebar(array(
    'id' => 'boxwp-footer-2',
    'name' => esc_html__( 'Footer 2', 'boxwp' ),
    'description' => esc_html__( 'This sidebar is located on the middle bottom of web page.', 'boxwp' ),
    'before_widget' => '<div id="%1$s" class="boxwp-footer-widget widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="boxwp-widget-title"><span>',
    'after_title' => '</span></h2>'));

register_sidebar(array(
    'id' => 'boxwp-footer-3',
    'name' => esc_html__( 'Footer 3', 'boxwp' ),
    'description' => esc_html__( 'This sidebar is located on the middle bottom of web page.', 'boxwp' ),
    'before_widget' => '<div id="%1$s" class="boxwp-footer-widget widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="boxwp-widget-title"><span>',
    'after_title' => '</span></h2>'));

register_sidebar(array(
    'id' => 'boxwp-footer-4',
    'name' => esc_html__( 'Footer 4', 'boxwp' ),
    'description' => esc_html__( 'This sidebar is located on the right bottom of web page.', 'boxwp' ),
    'before_widget' => '<div id="%1$s" class="boxwp-footer-widget widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="boxwp-widget-title"><span>',
    'after_title' => '</span></h2>'));

register_sidebar(array(
    'id' => 'boxwp-bottom-footer',
    'name' => esc_html__( 'Footer Bottom', 'boxwp' ),
    'description' => esc_html__( 'This sidebar is located on the bottom of the footer.', 'boxwp' ),
    'before_widget' => '<div id="%1$s" class="boxwp-footer-widget widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="boxwp-widget-title"><span>',
    'after_title' => '</span></h2>'));

}
add_action( 'widgets_init', 'boxwp_widgets_init' );


function boxwp_top_wide_widgets() { ?>

<?php if ( is_active_sidebar( 'boxwp-home-fullwidth-widgets' ) || is_active_sidebar( 'boxwp-fullwidth-widgets' ) ) : ?>
<div class="boxwp-featured-posts-area boxwp-top-wrapper clearfix">
<?php if(is_front_page() && !is_paged()) { ?>
<?php dynamic_sidebar( 'boxwp-home-fullwidth-widgets' ); ?>
<?php } ?>

<?php dynamic_sidebar( 'boxwp-fullwidth-widgets' ); ?>
</div>
<?php endif; ?>
<?php }


function boxwp_top_widgets() { ?>

<?php if ( is_active_sidebar( 'boxwp-home-top-widgets' ) || is_active_sidebar( 'boxwp-top-widgets' ) ) : ?>
<div class="boxwp-featured-posts-area boxwp-featured-posts-area-top clearfix">
<?php if(is_front_page() && !is_paged()) { ?>
<?php dynamic_sidebar( 'boxwp-home-top-widgets' ); ?>
<?php } ?>

<?php dynamic_sidebar( 'boxwp-top-widgets' ); ?>
</div>
<?php endif; ?>

<?php }


function boxwp_bottom_widgets() { ?>

<?php if ( is_active_sidebar( 'boxwp-home-bottom-widgets' ) || is_active_sidebar( 'boxwp-bottom-widgets' ) ) : ?>
<div class='boxwp-featured-posts-area boxwp-featured-posts-area-bottom clearfix'>
<?php if(is_front_page() && !is_paged()) { ?>
<?php dynamic_sidebar( 'boxwp-home-bottom-widgets' ); ?>
<?php } ?>

<?php dynamic_sidebar( 'boxwp-bottom-widgets' ); ?>
</div>
<?php endif; ?>

<?php }