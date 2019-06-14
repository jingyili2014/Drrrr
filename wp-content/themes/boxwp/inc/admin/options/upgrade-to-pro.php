<?php
/**
* Upgrade to pro options
*
* @package BoxWP WordPress Theme
* @copyright Copyright (C) 2018 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

function boxwp_upgrade_to_pro($wp_customize) {

    $wp_customize->add_section( 'sc_boxwp_upgrade', array( 'title' => esc_html__( 'Upgrade to Pro Version', 'boxwp' ), 'priority' => 400 ) );
    
    $wp_customize->add_setting( 'boxwp_options[upgrade_text]', array( 'default' => '', 'sanitize_callback' => '__return_false', ) );
    
    $wp_customize->add_control( new BoxWP_Customize_Static_Text_Control( $wp_customize, 'boxwp_upgrade_text_control', array(
        'label'       => esc_html__( 'BoxWP Pro', 'boxwp' ),
        'section'     => 'sc_boxwp_upgrade',
        'settings' => 'boxwp_options[upgrade_text]',
        'description' => esc_html__( 'Do you enjoy BoxWP? Upgrade to BoxWP Pro now and get:', 'boxwp' ).
            '<ul class="boxwp-customizer-pro-features">' .
                '<li><i class="fa fa-check"></i> ' . esc_html__( 'Color Options', 'boxwp' ) . '</li>' .
                '<li><i class="fa fa-check"></i> ' . esc_html__( 'Font Options', 'boxwp' ) . '</li>' .
                '<li><i class="fa fa-check"></i> ' . esc_html__( 'Layout Options', 'boxwp' ) . '</li>' .
                '<li><i class="fa fa-check"></i> ' . esc_html__( 'News Ticker', 'boxwp' ) . '</li>' .
                '<li><i class="fa fa-check"></i> ' . esc_html__( 'Custom Page Templates', 'boxwp' ) . '</li>' .
                '<li><i class="fa fa-check"></i> ' . esc_html__( 'Custom Post Templates', 'boxwp' ) . '</li>' .
                '<li><i class="fa fa-check"></i> ' . esc_html__( 'Posts Grid-Layout Styles (2/3/4 Columns)', 'boxwp' ) . '</li>' .
                '<li><i class="fa fa-check"></i> ' . esc_html__( 'Posts Grid-Thumbnails Styles (Horizontal/Square/Vertical/Auto Height)', 'boxwp' ) . '</li>' .
                '<li><i class="fa fa-check"></i> ' . esc_html__( 'Featured Posts Widgets with Layout Styles (2/3/4 Columns) and Thumbnail Styles (Horizontal/Square/Vertical/Auto Height) : These widgets displays recent/popular/random posts or posts from a given category or tag.', 'boxwp' ) . '</li>' .
                '<li><i class="fa fa-check"></i> ' . esc_html__( '1/2/3/4 Columns Footer', 'boxwp' ) . '</li>' .
                '<li><i class="fa fa-check"></i> ' . esc_html__( 'Tabbed Widget', 'boxwp' ) . '</li>' .
                '<li><i class="fa fa-check"></i> ' . esc_html__( 'Social Profiles Widget and About Me Widget', 'boxwp' ) . '</li>' .
                '<li><i class="fa fa-check"></i> ' . esc_html__( '2 Header Layouts (full-width header or header+728x90 ad)', 'boxwp' ) . '</li>' .
                '<li><i class="fa fa-check"></i> ' . esc_html__( 'Post Summaries/Posts Share Buttons', 'boxwp' ) . '</li>' .
                '<li><i class="fa fa-check"></i> ' . esc_html__( 'Related Posts with Thumbnails', 'boxwp' ) . '</li>' .
                '<li><i class="fa fa-check"></i> ' . esc_html__( 'Author Bio Box with Social Buttons', 'boxwp' ) . '</li>' .
                '<li><i class="fa fa-check"></i> ' . esc_html__( 'Sticky Menu/Sticky Sidebars with enable/disable capability', 'boxwp' ) . '</li>' .
                '<li><i class="fa fa-check"></i> ' . esc_html__( 'WooCommerce Support', 'boxwp' ) . '</li>' .
                '<li><i class="fa fa-check"></i> ' . esc_html__( 'Built-in Contact Form', 'boxwp' ) . '</li>' .
                '<li><i class="fa fa-check"></i> ' . esc_html__( 'Search Engine Optimized', 'boxwp' ) . '</li>' .
                '<li><i class="fa fa-check"></i> ' . esc_html__( 'More Customizer options', 'boxwp' ) . '</li>' .
                '<li><i class="fa fa-check"></i> ' . esc_html__( 'More Features...', 'boxwp' ) . '</li>' .
            '</ul>'.
            '<strong><a href="'.BOXWP_PROURL.'" class="button button-primary" target="_blank"><i class="fa fa-shopping-cart"></i> ' . esc_html__( 'Upgrade To BoxWP PRO', 'boxwp' ) . '</a></strong>'
    ) ) ); 

}