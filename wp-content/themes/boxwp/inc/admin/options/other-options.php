<?php
/**
* Other options
*
* @package BoxWP WordPress Theme
* @copyright Copyright (C) 2018 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

function boxwp_other_options($wp_customize) {

    $wp_customize->add_section( 'sc_other_options', array( 'title' => esc_html__( 'Other Options', 'boxwp' ), 'panel' => 'boxwp_main_options_panel', 'priority' => 560 ) );

    $wp_customize->add_setting( 'boxwp_options[enable_sticky_mobile_menu]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'boxwp_sanitize_checkbox', ) );

    $wp_customize->add_control( 'boxwp_enable_sticky_mobile_menu_control', array( 'label' => esc_html__( 'Enable Sticky Menu on Small Screen', 'boxwp' ), 'section' => 'sc_other_options', 'settings' => 'boxwp_options[enable_sticky_mobile_menu]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'boxwp_options[disable_primary_menu]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'boxwp_sanitize_checkbox', ) );

    $wp_customize->add_control( 'boxwp_disable_primary_menu_control', array( 'label' => esc_html__( 'Disable Primary Menu', 'boxwp' ), 'section' => 'sc_other_options', 'settings' => 'boxwp_options[disable_primary_menu]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'boxwp_options[disable_secondary_menu]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'boxwp_sanitize_checkbox', ) );

    $wp_customize->add_control( 'boxwp_disable_secondary_menu_control', array( 'label' => esc_html__( 'Disable Secondary Menu', 'boxwp' ), 'section' => 'sc_other_options', 'settings' => 'boxwp_options[disable_secondary_menu]', 'type' => 'checkbox', ) );

}