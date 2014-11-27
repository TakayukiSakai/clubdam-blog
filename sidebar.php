<?php
/**
 * The sidebar containing the main widget area
 *
 * If no active widgets are in the sidebar, hide it completely.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>

<?php if (is_front_page()): ?>
	<?php if ( is_active_sidebar( 'top-sidebar' ) ) : ?>
		<div id="secondary" class="widget-area" role="complementary">
			<?php dynamic_sidebar( 'top-sidebar' ); ?>
		</div><!-- #secondary -->
	<?php endif; ?>
<?php elseif(is_page()): ?>
	<?php if ( is_active_sidebar( 'page-sidebar' ) ) : ?>
		<div id="secondary" class="widget-area" role="complementary">
			<?php dynamic_sidebar( 'page-sidebar' ); ?>
		</div><!-- #secondary -->
	<?php endif; ?>
<?php elseif(is_home()): ?>
	<?php if ( is_active_sidebar( 'post-sidebar' ) ) : ?>
		<div id="secondary" class="widget-area" role="complementary">
			<?php dynamic_sidebar( 'post-sidebar' ); ?>
		</div><!-- #secondary -->
	<?php endif; ?>
<?php else: ?>
	<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
		<div id="secondary" class="widget-area" role="complementary">
			<?php dynamic_sidebar( 'sidebar-1' ); ?>
		</div><!-- #secondary -->
	<?php endif; ?>
<?php endif; ?>

