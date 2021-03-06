<?php
/**
* The template for displaying archive pages.
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

<header class="page-header">
<?php the_archive_title( '<h1 class="page-title">', '</h1>' ); ?>
<?php the_archive_description( '<div class="taxonomy-description">', '</div>' ); ?>
</header>

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