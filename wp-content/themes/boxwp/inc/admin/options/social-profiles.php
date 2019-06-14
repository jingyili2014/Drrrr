<?php
/**
* Social profiles options
*
* @package BoxWP WordPress Theme
* @copyright Copyright (C) 2018 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

function boxwp_social_profiles($wp_customize) {

    $wp_customize->add_section( 'sc_boxwp_sociallinks', array( 'title' => esc_html__( 'Social Links', 'boxwp' ), 'panel' => 'boxwp_main_options_panel', 'priority' => 400, ));

    $wp_customize->add_setting( 'boxwp_options[hide_header_social_buttons]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'boxwp_sanitize_checkbox', ) );

    $wp_customize->add_control( 'boxwp_hide_header_social_buttons_control', array( 'label' => esc_html__( 'Hide Header Social Buttons', 'boxwp' ), 'section' => 'sc_boxwp_sociallinks', 'settings' => 'boxwp_options[hide_header_social_buttons]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'boxwp_options[show_footer_social_buttons]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'boxwp_sanitize_checkbox', ) );

    $wp_customize->add_control( 'boxwp_show_footer_social_buttons_control', array( 'label' => esc_html__( 'Show Footer Social Buttons', 'boxwp' ), 'section' => 'sc_boxwp_sociallinks', 'settings' => 'boxwp_options[show_footer_social_buttons]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'boxwp_options[twitterlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'boxwp_twitterlink_control', array( 'label' => esc_html__( 'Twitter URL', 'boxwp' ), 'section' => 'sc_boxwp_sociallinks', 'settings' => 'boxwp_options[twitterlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'boxwp_options[facebooklink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'boxwp_facebooklink_control', array( 'label' => esc_html__( 'Facebook URL', 'boxwp' ), 'section' => 'sc_boxwp_sociallinks', 'settings' => 'boxwp_options[facebooklink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'boxwp_options[googlelink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) ); 

    $wp_customize->add_control( 'boxwp_googlelink_control', array( 'label' => esc_html__( 'Google Plus URL', 'boxwp' ), 'section' => 'sc_boxwp_sociallinks', 'settings' => 'boxwp_options[googlelink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'boxwp_options[pinterestlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'boxwp_pinterestlink_control', array( 'label' => esc_html__( 'Pinterest URL', 'boxwp' ), 'section' => 'sc_boxwp_sociallinks', 'settings' => 'boxwp_options[pinterestlink]', 'type' => 'text' ) );
    
    $wp_customize->add_setting( 'boxwp_options[linkedinlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'boxwp_linkedinlink_control', array( 'label' => esc_html__( 'Linkedin Link', 'boxwp' ), 'section' => 'sc_boxwp_sociallinks', 'settings' => 'boxwp_options[linkedinlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'boxwp_options[instagramlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'boxwp_instagramlink_control', array( 'label' => esc_html__( 'Instagram Link', 'boxwp' ), 'section' => 'sc_boxwp_sociallinks', 'settings' => 'boxwp_options[instagramlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'boxwp_options[vklink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'boxwp_vklink_control', array( 'label' => esc_html__( 'VK Link', 'boxwp' ), 'section' => 'sc_boxwp_sociallinks', 'settings' => 'boxwp_options[vklink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'boxwp_options[flickrlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'boxwp_flickrlink_control', array( 'label' => esc_html__( 'Flickr Link', 'boxwp' ), 'section' => 'sc_boxwp_sociallinks', 'settings' => 'boxwp_options[flickrlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'boxwp_options[youtubelink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'boxwp_youtubelink_control', array( 'label' => esc_html__( 'Youtube URL', 'boxwp' ), 'section' => 'sc_boxwp_sociallinks', 'settings' => 'boxwp_options[youtubelink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'boxwp_options[vimeolink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'boxwp_vimeolink_control', array( 'label' => esc_html__( 'Vimeo URL', 'boxwp' ), 'section' => 'sc_boxwp_sociallinks', 'settings' => 'boxwp_options[vimeolink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'boxwp_options[soundcloudlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'boxwp_soundcloudlink_control', array( 'label' => esc_html__( 'Soundcloud URL', 'boxwp' ), 'section' => 'sc_boxwp_sociallinks', 'settings' => 'boxwp_options[soundcloudlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'boxwp_options[lastfmlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'boxwp_lastfmlink_control', array( 'label' => esc_html__( 'Lastfm URL', 'boxwp' ), 'section' => 'sc_boxwp_sociallinks', 'settings' => 'boxwp_options[lastfmlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'boxwp_options[githublink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'boxwp_githublink_control', array( 'label' => esc_html__( 'Github URL', 'boxwp' ), 'section' => 'sc_boxwp_sociallinks', 'settings' => 'boxwp_options[githublink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'boxwp_options[bitbucketlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'boxwp_bitbucketlink_control', array( 'label' => esc_html__( 'Bitbucket URL', 'boxwp' ), 'section' => 'sc_boxwp_sociallinks', 'settings' => 'boxwp_options[bitbucketlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'boxwp_options[tumblrlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'boxwp_tumblrlink_control', array( 'label' => esc_html__( 'Tumblr URL', 'boxwp' ), 'section' => 'sc_boxwp_sociallinks', 'settings' => 'boxwp_options[tumblrlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'boxwp_options[digglink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'boxwp_digglink_control', array( 'label' => esc_html__( 'Digg URL', 'boxwp' ), 'section' => 'sc_boxwp_sociallinks', 'settings' => 'boxwp_options[digglink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'boxwp_options[deliciouslink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'boxwp_deliciouslink_control', array( 'label' => esc_html__( 'Delicious URL', 'boxwp' ), 'section' => 'sc_boxwp_sociallinks', 'settings' => 'boxwp_options[deliciouslink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'boxwp_options[stumblelink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'boxwp_stumblelink_control', array( 'label' => esc_html__( 'Stumbleupon Link', 'boxwp' ), 'section' => 'sc_boxwp_sociallinks', 'settings' => 'boxwp_options[stumblelink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'boxwp_options[redditlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'boxwp_redditlink_control', array( 'label' => esc_html__( 'Reddit Link', 'boxwp' ), 'section' => 'sc_boxwp_sociallinks', 'settings' => 'boxwp_options[redditlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'boxwp_options[dribbblelink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'boxwp_dribbblelink_control', array( 'label' => esc_html__( 'Dribbble Link', 'boxwp' ), 'section' => 'sc_boxwp_sociallinks', 'settings' => 'boxwp_options[dribbblelink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'boxwp_options[behancelink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'boxwp_behancelink_control', array( 'label' => esc_html__( 'Behance Link', 'boxwp' ), 'section' => 'sc_boxwp_sociallinks', 'settings' => 'boxwp_options[behancelink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'boxwp_options[codepenlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'boxwp_codepenlink_control', array( 'label' => esc_html__( 'Codepen Link', 'boxwp' ), 'section' => 'sc_boxwp_sociallinks', 'settings' => 'boxwp_options[codepenlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'boxwp_options[jsfiddlelink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'boxwp_jsfiddlelink_control', array( 'label' => esc_html__( 'JSFiddle Link', 'boxwp' ), 'section' => 'sc_boxwp_sociallinks', 'settings' => 'boxwp_options[jsfiddlelink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'boxwp_options[stackoverflowlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'boxwp_stackoverflowlink_control', array( 'label' => esc_html__( 'Stack Overflow Link', 'boxwp' ), 'section' => 'sc_boxwp_sociallinks', 'settings' => 'boxwp_options[stackoverflowlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'boxwp_options[stackexchangelink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'boxwp_stackexchangelink_control', array( 'label' => esc_html__( 'Stack Exchange Link', 'boxwp' ), 'section' => 'sc_boxwp_sociallinks', 'settings' => 'boxwp_options[stackexchangelink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'boxwp_options[bsalink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'boxwp_bsalink_control', array( 'label' => esc_html__( 'BuySellAds Link', 'boxwp' ), 'section' => 'sc_boxwp_sociallinks', 'settings' => 'boxwp_options[bsalink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'boxwp_options[slidesharelink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'boxwp_slidesharelink_control', array( 'label' => esc_html__( 'SlideShare Link', 'boxwp' ), 'section' => 'sc_boxwp_sociallinks', 'settings' => 'boxwp_options[slidesharelink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'boxwp_options[skypeusername]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'sanitize_text_field' ) );

    $wp_customize->add_control( 'boxwp_skypeusername_control', array( 'label' => esc_html__( 'Skype Username', 'boxwp' ), 'section' => 'sc_boxwp_sociallinks', 'settings' => 'boxwp_options[skypeusername]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'boxwp_options[emailaddress]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'boxwp_sanitize_email' ) );

    $wp_customize->add_control( 'boxwp_emailaddress_control', array( 'label' => esc_html__( 'Email Address', 'boxwp' ), 'section' => 'sc_boxwp_sociallinks', 'settings' => 'boxwp_options[emailaddress]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'boxwp_options[rsslink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'boxwp_rsslink_control', array( 'label' => esc_html__( 'RSS Feed URL', 'boxwp' ), 'section' => 'sc_boxwp_sociallinks', 'settings' => 'boxwp_options[rsslink]', 'type' => 'text' ) );

}