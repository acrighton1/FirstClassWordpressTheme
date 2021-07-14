<?php
/**
 * The sidebar containing the main widget area
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<div class="col-md-4 widget-area" id="secondary" role="complementary">

	<?php dynamic_sidebar( 'sidebar-1' ); ?>

</div><!-- #secondary -->

<aside id="sidebar">

	<?php
		/**
		 * Display Widgets dragged in the 'Sidebar' Widget Area
		 */
	?>
	<?php dynamic_sidebar( 'sidebar-widget-area' ); ?>
	
</aside><!-- #sidebar -->

<div id="sidebar-primary" class="sidebar">
    <?php dynamic_sidebar( 'Footer 1' ); ?>
</div>