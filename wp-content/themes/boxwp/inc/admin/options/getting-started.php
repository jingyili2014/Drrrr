<?php
/**
* Getting started options
*
* @package BoxWP WordPress Theme
* @copyright Copyright (C) 2018 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

function boxwp_getting_started($wp_customize) {

    $wp_customize->add_section( 'sc_boxwp_getting_started', array( 'title' => esc_html__( 'Getting Started', 'boxwp' ), 'description' => esc_html__( 'Thanks for your interest in BoxWP! If you have any questions or run into any trouble, please visit us the following links. We will get you fixed up!', 'boxwp' ), 'panel' => 'boxwp_main_options_panel', 'priority' => 5, ) );

    $wp_customize->add_setting( 'boxwp_options[documentation]', array( 'default' => '', 'sanitize_callback' => '__return_false', ) );

    $wp_customize->add_control( new BoxWP_Customize_Button_Control( $wp_customize, 'boxwp_documentation_control', array( 'label' => esc_html__( 'Documentation', 'boxwp' ), 'section' => 'sc_boxwp_getting_started', 'settings' => 'boxwp_options[documentation]', 'type' => 'button', 'button_tag' => 'a', 'button_class' => 'button button-primary', 'button_href' => 'https://themesdna.com/boxwp-wordpress-theme/', 'button_target' => '_blank', ) ) );

    $wp_customize->add_setting( 'boxwp_options[contact]', array( 'default' => '', 'sanitize_callback' => '__return_false', ) );

    $wp_customize->add_control( new BoxWP_Customize_Button_Control( $wp_customize, 'boxwp_contact_control', array( 'label' => esc_html__( 'Contact Us', 'boxwp' ), 'section' => 'sc_boxwp_getting_started', 'settings' => 'boxwp_options[contact]', 'type' => 'button', 'button_tag' => 'a', 'button_class' => 'button button-primary', 'button_href' => 'https://themesdna.com/contact/', 'button_target' => '_blank', ) ) );

}