<?php
/**
* The main template file.
*
* This is the most generic template file in a WordPress theme
* and one of the two required files for a theme (the other being style.css).
* It is used to display a page when nothing more specific matches a query.
* E.g., it puts together the home page when no home.php file exists.
*
* @link https://developer.wordpress.org/themes/basics/template-hierarchy/
*
* @package BoxWP WordPress Theme
* @copyright Copyright (C) 2018 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

get_header(); ?>

<div class="boxwp-main-wrapper clearfix" id="boxwp-main-wrapper" itemscope="itemscope" itemtype="http://schema.org/Blog" role="main">
<div class="theiaStickySidebar">

<?php boxwp_top_widgets(); ?>

<div class="boxwp-posts-wrapper" id="boxwp-posts-wrapper">

<div class="boxwp-posts boxwp-box">
<div class="boxwp-box-inside">

<?php if ( !(boxwp_get_option('hide_posts_heading')) ) { ?>
<?php if(is_home() && !is_paged()) { ?>
<?php if ( boxwp_get_option('posts_heading') ) : ?>
<div class="boxwp-posts-heading"><h1 class="boxwp-posts-title"><span><?php echo esc_html( boxwp_get_option('posts_heading') ); ?></span></h1></div>
<?php else : ?>
<div class="boxwp-posts-heading"><h1 class="boxwp-posts-title"><span><?php esc_html_e( 'Recent Posts', 'boxwp' ); ?></span></h1></div>
<?php endif; ?>
<?php } ?>
<?php } ?>

<div class="boxwp-posts-content">

<?php if (have_posts()) : ?>

    <div class="boxwp-posts-container">
    <?php while (have_posts()) : the_post(); ?>

        <?php get_template_part( 'template-parts/content', boxwp_post_style() ); ?>

    <?php endwhile; ?>
    </div>
    <div class="clear"></div>

    <?php boxwp_posts_navigation(); ?>

<?php else : ?>

  <?php get_template_part( 'template-parts/content', 'none' ); ?>

<?php endif; ?>

</div>

</div>
</div>

</div><!--/#boxwp-posts-wrapper -->

<?php boxwp_bottom_widgets(); ?>

</div>
</div><!-- /#boxwp-main-wrapper -->

<?php //get_sidebar(); ?>

<?php get_footer(); ?>