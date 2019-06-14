<?php
/**
* The header for BoxWP theme.
*
* @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
*
* @package BoxWP WordPress Theme
* @copyright Copyright (C) 2018 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
</head>

<body <?php body_class('boxwp-animated boxwp-fadein'); ?> id="boxwp-site-body" itemscope="itemscope" itemtype="http://schema.org/WebPage">

<div class="boxwp-outer-wrapper-full">
<div class="boxwp-outer-wrapper">

<?php if ( !(boxwp_get_option('disable_secondary_menu')) ) { ?>
<div class="boxwp-container boxwp-secondary-menu-container clearfix">
<div class="boxwp-secondary-menu-container-inside clearfix">

<nav class="boxwp-nav-secondary" id="boxwp-secondary-navigation" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement" role="navigation">
<?php wp_nav_menu( array( 'theme_location' => 'secondary', 'menu_id' => 'boxwp-menu-secondary-navigation', 'menu_class' => 'boxwp-secondary-nav-menu boxwp-menu-secondary', 'fallback_cb' => 'boxwp_top_fallback_menu', ) ); ?>
</nav>

</div>
</div>
<?php } ?>

<div class="boxwp-header clearfix" id="boxwp-header" itemscope="itemscope" itemtype="http://schema.org/WPHeader" role="banner">
<div class="boxwp-head-content clearfix" id="boxwp-head-content">

<?php if ( get_header_image() ) : ?>
<div class="boxwp-header-image clearfix">
<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="boxwp-header-img-link">
    <img src="<?php header_image(); ?>" width="<?php echo esc_attr(get_custom_header()->width); ?>" height="<?php echo esc_attr(get_custom_header()->height); ?>" alt="" class="boxwp-header-img"/>
</a>
</div>
<?php endif; ?>

<?php if ( !(boxwp_get_option('hide_header_content')) ) { ?>
<div class="boxwp-header-inside clearfix">
<div class="boxwp-logo" id="boxwp-logo">
<?php if ( has_custom_logo() ) : ?>
    <div class="site-branding">
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="boxwp-logo-img-link">
        <img src="<?php echo esc_url( boxwp_custom_logo() ); ?>" alt="" class="boxwp-logo-img"/>
    </a>
    </div>
<?php else: ?>
    <div class="site-branding">
      <h1 class="boxwp-site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
      <p class="boxwp-site-description"><?php bloginfo( 'description' ); ?></p>
    </div>
<?php endif; ?>
</div><!--/#boxwp-logo -->

<div class="boxwp-header-banner" id="boxwp-header-banner">
<?php dynamic_sidebar( 'boxwp-header-banner' ); ?>
</div><!--/#boxwp-header-banner -->
</div>
<?php } ?>

</div><!--/#boxwp-head-content -->
</div><!--/#boxwp-header -->

<?php if ( !(boxwp_get_option('disable_primary_menu')) ) { ?>
<div class="boxwp-container boxwp-primary-menu-container clearfix">
<div class="boxwp-primary-menu-container-inside clearfix">

<nav class="boxwp-nav-primary" id="boxwp-primary-navigation" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement" role="navigation">
<div class="boxwp-outer-wrapper">
<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'boxwp-menu-primary-navigation', 'menu_class' => 'boxwp-nav-primary-menu boxwp-menu-primary', 'fallback_cb' => 'boxwp_fallback_menu', ) ); ?>

<?php if ( !(boxwp_get_option('hide_header_social_buttons')) ) { boxwp_header_social_buttons(); } ?>
</div>
</nav>

<div id="boxwp-search-overlay-wrap" class="boxwp-search-overlay">
  <span class="boxwp-search-closebtn" title="<?php esc_attr_e('Close Search','boxwp'); ?>">&#xD7;</span>
  <div class="boxwp-search-overlay-content">
    <?php get_search_form(); ?>
  </div>
</div>

</div>
</div>
<?php } ?>

<?php boxwp_top_wide_widgets(); ?>

<div class="boxwp-wrapper clearfix" id="boxwp-wrapper">
<div class="boxwp-content-wrapper clearfix" id="boxwp-content-wrapper">