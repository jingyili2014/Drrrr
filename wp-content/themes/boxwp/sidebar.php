<?php
/**
* The file for displaying the sidebars.
*
* @package BoxWP WordPress Theme
* @copyright Copyright (C) 2018 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/
?>

<div class="boxwp-sidebar-wrapper clearfix" id="boxwp-sidebar-wrapper" itemscope="itemscope" itemtype="http://schema.org/WPSideBar" role="complementary">
<div class="theiaStickySidebar">

<?php dynamic_sidebar( 'boxwp-main-sidebar' ); ?>

</div>
</div><!-- /#boxwp-sidebar-wrapper-->