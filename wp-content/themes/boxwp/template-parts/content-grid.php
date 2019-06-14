<?php
/**
* Template part for displaying posts.
*
* @link https://developer.wordpress.org/themes/basics/template-hierarchy/
*
* @package BoxWP WordPress Theme
* @copyright Copyright (C) 2018 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/
?>

<div id="post-<?php the_ID(); ?>" class="boxwp-grid-post <?php echo esc_attr( boxwp_post_grid_cols() ); ?>">

    <?php if ( has_post_thumbnail() ) { ?>
    <?php if ( !(boxwp_get_option('hide_thumbnail')) ) { ?>
    <div class="boxwp-grid-post-thumbnail">
        <a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php /* translators: %s: post title. */ echo esc_attr( sprintf( __( 'Permanent Link to %s', 'boxwp' ), the_title_attribute( 'echo=0' ) ) ); ?>"><?php the_post_thumbnail(boxwp_grid_thumb_style(), array('class' => 'boxwp-grid-post-thumbnail-img')); ?></a>
        <?php boxwp_grid_postmeta(); ?>
        <?php if ( !(boxwp_get_option('hide_post_categories')) ) { ?><?php boxwp_grid_cats(); ?><?php } ?>
        <?php if ( !(boxwp_get_option('hide_post_snippet')) ) { ?>
        <div class="boxwp-grid-snippet-mask">
            <div class="boxwp-grid-snippet-mask-inside">
                <div class="boxwp-grid-post-snippet"><?php the_excerpt(); ?></div>
            </div>
        </div>
        <?php } ?>
        <?php if ( !(boxwp_get_option('hide_read_more_button')) ) { ?>
        <div class="boxwp-grid-post-mask">
            <div class="boxwp-grid-post-mask-inside">
                <div class='boxwp-grid-post-read-more'><a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_html( boxwp_read_more_text() ); ?></a></div>
            </div>
        </div>
        <?php } ?>
    </div>
    <?php } else { ?>
    <div class="boxwp-grid-post-thumbnail">
        <a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php /* translators: %s: post title. */ echo esc_attr( sprintf( __( 'Permanent Link to %s', 'boxwp' ), the_title_attribute( 'echo=0' ) ) ); ?>"><img src="<?php echo esc_url( boxwp_grid_no_thumb_url() ); ?>" class="boxwp-grid-post-thumbnail-img"/></a>
        <?php boxwp_grid_postmeta(); ?>
        <?php if ( !(boxwp_get_option('hide_post_categories')) ) { ?><?php boxwp_grid_cats(); ?><?php } ?>
        <?php if ( !(boxwp_get_option('hide_post_snippet')) ) { ?>
        <div class="boxwp-grid-snippet-mask">
            <div class="boxwp-grid-snippet-mask-inside">
                <div class="boxwp-grid-post-snippet"><?php the_excerpt(); ?></div>
            </div>
        </div>
        <?php } ?>
        <?php if ( !(boxwp_get_option('hide_read_more_button')) ) { ?>
        <div class="boxwp-grid-post-mask">
            <div class="boxwp-grid-post-mask-inside">
                <div class='boxwp-grid-post-read-more'><a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_html( boxwp_read_more_text() ); ?></a></div>
            </div>
        </div>
        <?php } ?>
    </div>
    <?php } ?>
    <?php } else { ?>
    <div class="boxwp-grid-post-thumbnail">
        <a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php /* translators: %s: post title. */ echo esc_attr( sprintf( __( 'Permanent Link to %s', 'boxwp' ), the_title_attribute( 'echo=0' ) ) ); ?>"><img src="<?php echo esc_url( boxwp_grid_no_thumb_url() ); ?>" class="boxwp-grid-post-thumbnail-img"/></a>
        <?php boxwp_grid_postmeta(); ?>
        <?php if ( !(boxwp_get_option('hide_post_categories')) ) { ?><?php boxwp_grid_cats(); ?><?php } ?>
        <?php if ( !(boxwp_get_option('hide_post_snippet')) ) { ?>
        <div class="boxwp-grid-snippet-mask">
            <div class="boxwp-grid-snippet-mask-inside">
                <div class="boxwp-grid-post-snippet"><?php the_excerpt(); ?></div>
            </div>
        </div>
        <?php } ?>
        <?php if ( !(boxwp_get_option('hide_read_more_button')) ) { ?>
        <div class="boxwp-grid-post-mask">
            <div class="boxwp-grid-post-mask-inside">
                <div class='boxwp-grid-post-read-more'><a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_html( boxwp_read_more_text() ); ?></a></div>
            </div>
        </div>
        <?php } ?>
    </div>
    <?php } ?>

    <?php if((has_post_thumbnail()) && !(boxwp_get_option('hide_thumbnail'))) { ?><div class="boxwp-grid-post-details"><?php } ?>
    <?php if(!(has_post_thumbnail()) || (boxwp_get_option('hide_thumbnail'))) { ?><div class="boxwp-grid-post-details-full"><?php } ?>

    <?php the_title( sprintf( '<h3 class="boxwp-grid-post-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>

    <?php if(!(has_post_thumbnail()) || (boxwp_get_option('hide_thumbnail'))) { ?></div><?php } ?>
    <?php if((has_post_thumbnail()) && !(boxwp_get_option('hide_thumbnail'))) { ?></div><?php } ?>

</div>