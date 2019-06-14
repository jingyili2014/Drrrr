<?php
/**
* Footer options
*
* @package BoxWP WordPress Theme
* @copyright Copyright (C) 2018 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

function boxwp_footer_options($wp_customize) {

    $wp_customize->add_section( 'sc_boxwp_footer', array( 'title' => esc_html__( 'Footer', 'boxwp' ), 'panel' => 'boxwp_main_options_panel', 'priority' => 440 ) );

    $wp_customize->add_setting( 'boxwp_options[footer_text]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'boxwp_sanitize_html', ) );

    $wp_customize->add_control( 'boxwp_footer_text_control', array( 'label' => esc_html__( 'Footer copyright notice', 'boxwp' ), 'section' => 'sc_boxwp_footer', 'settings' => 'boxwp_options[footer_text]', 'type' => 'text', ) );

    $wp_customize->add_setting( 'boxwp_options[hide_footer_widgets]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'boxwp_sanitize_checkbox', ) );

    $wp_customize->add_control( 'boxwp_hide_footer_widgets_control', array( 'label' => esc_html__( 'Hide Footer Widgets', 'boxwp' ), 'section' => 'sc_boxwp_footer', 'settings' => 'boxwp_options[hide_footer_widgets]', 'type' => 'checkbox', ) );

}