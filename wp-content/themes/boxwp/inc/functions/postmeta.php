<?php
/**
* Post meta functions
*
* @package BoxWP WordPress Theme
* @copyright Copyright (C) 2018 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

if ( ! function_exists( 'boxwp_post_tags' ) ) :
/**
 * Prints HTML with meta information for the tags.
 */
function boxwp_post_tags() {
    if ( 'post' == get_post_type() ) {
        /* translators: used between list items, there is a space after the comma */
        $tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'boxwp' ) );
        if ( $tags_list ) {
            /* translators: 1: list of tags. */
            printf( '<span class="boxwp-tags-links"><i class="fa fa-tags" aria-hidden="true"></i> ' . esc_html__( 'Tagged %1$s', 'boxwp' ) . '</span>', $tags_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
        }
    }
}
endif;


if ( ! function_exists( 'boxwp_grid_cats' ) ) :
function boxwp_grid_cats() {
    if ( 'post' == get_post_type() ) {
        /* translators: used between list items, there is a space */
        $categories_list = get_the_category_list( esc_html__( '&nbsp;', 'boxwp' ) );
        if ( $categories_list ) {
            /* translators: 1: list of categories. */
            printf( '<div class="boxwp-grid-post-categories">' . __( '<span class="screen-reader-text">Posted in </span>%1$s', 'boxwp' ) . '</div>', $categories_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
        }
    }
}
endif;


if ( ! function_exists( 'boxwp_grid_postmeta' ) ) :
function boxwp_grid_postmeta() { ?>
    <?php if ( !(boxwp_get_option('hide_post_author')) || !(boxwp_get_option('hide_posted_date')) || !(boxwp_get_option('hide_comments_link')) ) { ?>
    <div class="boxwp-grid-post-footer">
    <div class="boxwp-grid-post-footer-inside">
    <?php if ( !(boxwp_get_option('hide_post_author')) ) { ?><span class="boxwp-grid-post-author boxwp-grid-post-meta"><i class="fa fa-user-circle-o"></i>&nbsp;<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php echo esc_html( get_the_author() ); ?></a></span><?php } ?>
    <?php if ( !(boxwp_get_option('hide_posted_date')) ) { ?><span class="boxwp-grid-post-date boxwp-grid-post-meta"><i class="fa fa-clock-o"></i>&nbsp;<?php echo get_the_date(); ?></span><?php } ?>
    <?php if ( !(boxwp_get_option('hide_comments_link')) ) { ?><?php if ( comments_open() ) { ?>
    <span class="boxwp-grid-post-comment boxwp-grid-post-meta"><i class="fa fa-comments-o"></i>&nbsp;<?php comments_popup_link( esc_html__( '0', 'boxwp' ), esc_html__( '1', 'boxwp' ), esc_html__( '%', 'boxwp' ) ); ?></span>
    <?php } ?><?php } ?>
    </div>
    </div>
    <?php } ?>
<?php }
endif;


if ( ! function_exists( 'boxwp_single_cats' ) ) :
function boxwp_single_cats() {
    if ( 'post' == get_post_type() ) {
        /* translators: used between list items, there is a space */
        $categories_list = get_the_category_list( esc_html__( ', ', 'boxwp' ) );
        if ( $categories_list ) {
            /* translators: 1: list of categories. */
            printf( '<div class="boxwp-entry-meta-single boxwp-entry-meta-single-top"><span class="boxwp-entry-meta-single-cats"><i class="fa fa-folder-open-o"></i>&nbsp;' . __( '<span class="screen-reader-text">Posted in </span>%1$s', 'boxwp' ) . '</span></div>', $categories_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
        }
    }
}
endif;


if ( ! function_exists( 'boxwp_single_postmeta' ) ) :
function boxwp_single_postmeta() { ?>
    <?php if ( !(boxwp_get_option('hide_post_author')) || !(boxwp_get_option('hide_posted_date')) || !(boxwp_get_option('hide_comments_link')) || !(boxwp_get_option('hide_post_edit')) ) { ?>
    <div class="boxwp-entry-meta-single">
    <?php if ( !(boxwp_get_option('hide_post_author')) ) { ?><span class="boxwp-entry-meta-single-author"><i class="fa fa-user-circle-o"></i>&nbsp;<span class="author vcard" itemscope="itemscope" itemtype="http://schema.org/Person" itemprop="author"><a class="url fn n" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php echo esc_html( get_the_author() ); ?></a></span></span><?php } ?>
    <?php if ( !(boxwp_get_option('hide_posted_date')) ) { ?><span class="boxwp-entry-meta-single-date"><i class="fa fa-clock-o"></i>&nbsp;<?php echo get_the_date(); ?></span><?php } ?>
    <?php if ( !(boxwp_get_option('hide_comments_link')) ) { ?><?php if ( comments_open() ) { ?>
    <span class="boxwp-entry-meta-single-comments"><i class="fa fa-comments-o"></i>&nbsp;<?php comments_popup_link( esc_html__( 'Leave a comment', 'boxwp' ), esc_html__( '1 Comment', 'boxwp' ), esc_html__( '% Comments', 'boxwp' ) ); ?></span>
    <?php } ?><?php } ?>
    <?php if ( !(boxwp_get_option('hide_post_edit')) ) { ?><?php edit_post_link( esc_html__( 'Edit', 'boxwp' ), '<span class="edit-link">&nbsp;&nbsp;<i class="fa fa-pencil" aria-hidden="true"></i> ', '</span>' ); ?><?php } ?>
    </div>
    <?php } ?>
<?php }
endif;