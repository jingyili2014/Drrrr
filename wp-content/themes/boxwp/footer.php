<?php
/**
* The template for displaying the footer
*
* @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
*
* @package BoxWP WordPress Theme
* @copyright Copyright (C) 2018 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/
?>

</div><!--/#boxwp-content-wrapper -->
</div><!--/#boxwp-wrapper -->

<?php if ( (boxwp_get_option('show_footer_social_buttons')) ) { ?><?php boxwp_footer_social_buttons(); ?><?php } ?>


<?php if ( !(boxwp_get_option('hide_footer_widgets')) ) { ?>
<?php if ( is_active_sidebar( 'boxwp-footer-1' ) || is_active_sidebar( 'boxwp-footer-2' ) || is_active_sidebar( 'boxwp-footer-3' ) || is_active_sidebar( 'boxwp-footer-4' ) || is_active_sidebar( 'boxwp-top-footer' ) || is_active_sidebar( 'boxwp-bottom-footer' ) ) : ?>
<div class='boxwp-footer-blocks clearfix' id='boxwp-footer-blocks' itemscope='itemscope' itemtype='http://schema.org/WPFooter' role='contentinfo'>

<?php if ( is_active_sidebar( 'boxwp-top-footer' ) ) : ?>
<div class='clearfix'>
<div class='boxwp-top-footer-block'>
<?php dynamic_sidebar( 'boxwp-top-footer' ); ?>
</div>
</div>
<?php endif; ?>

<?php if ( is_active_sidebar( 'boxwp-footer-1' ) || is_active_sidebar( 'boxwp-footer-2' ) || is_active_sidebar( 'boxwp-footer-3' ) || is_active_sidebar( 'boxwp-footer-4' ) ) : ?>
<div class='boxwp-footer-block-cols clearfix'>

<div class="boxwp-footer-block-col <?php echo esc_attr( boxwp_footer_grid_cols() ); ?>" id="boxwp-footer-block-1">
<?php dynamic_sidebar( 'boxwp-footer-1' ); ?>
</div>

<div class="boxwp-footer-block-col <?php echo esc_attr( boxwp_footer_grid_cols() ); ?>" id="boxwp-footer-block-2">
<?php dynamic_sidebar( 'boxwp-footer-2' ); ?>
</div>

<div class="boxwp-footer-block-col <?php echo esc_attr( boxwp_footer_grid_cols() ); ?>" id="boxwp-footer-block-3">
<?php dynamic_sidebar( 'boxwp-footer-3' ); ?>
</div>

<div class="boxwp-footer-block-col <?php echo esc_attr( boxwp_footer_grid_cols() ); ?>" id="boxwp-footer-block-4">
<?php dynamic_sidebar( 'boxwp-footer-4' ); ?>
</div>

</div>
<?php endif; ?>

<?php if ( is_active_sidebar( 'boxwp-bottom-footer' ) ) : ?>
<div class='clearfix'>
<div class='boxwp-bottom-footer-block'>
<?php dynamic_sidebar( 'boxwp-bottom-footer' ); ?>
</div>
</div>
<?php endif; ?>

</div><!--/#boxwp-footer-blocks-->
<?php endif; ?>
<?php } ?>


<div class='boxwp-footer clearfix' id='boxwp-footer'>
<div class='boxwp-foot-wrap clearfix'>
<?php if ( boxwp_get_option('footer_text') ) : ?>
  <p class='boxwp-copyright'><?php echo esc_html(boxwp_get_option('footer_text')); ?></p>
<?php else : ?>
  <p class='boxwp-copyright'><?php /* translators: %s: Year and site name. */ printf( esc_html__( 'Copyright &copy; %s', 'boxwp' ), esc_html(date_i18n(__('Y','boxwp'))) . ' ' . esc_html(get_bloginfo( 'name' ))  ); ?></p>
<?php endif; ?>
<p class='boxwp-credit'><a href="<?php echo esc_url( 'https://themesdna.com/' ); ?>"><?php /* translators: %s: Theme author. */ printf( esc_html__( 'Design by %s', 'boxwp' ), 'ThemesDNA.com' ); ?></a></p>
</div>
</div><!--/#boxwp-footer -->

</div>
</div>

<?php wp_footer(); ?>
</body>
</html>