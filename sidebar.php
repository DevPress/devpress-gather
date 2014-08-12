<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package Gather
 */
?>

<?php if ( gather_show_sidebar() ) : ?>

	<div id="secondary" class="secondary" role="complementary">
		<?php if ( ! dynamic_sidebar( 'primary' ) ) : ?>

			<aside id="search" class="widget widget_search module">
				<?php get_search_form(); ?>
			</aside>

			<aside id="archives" class="widget module">
				<h3 class="widget-title"><?php _e( 'Archives', 'gather' ); ?></h3>
				<ul>
					<?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
				</ul>
			</aside>

			<aside id="meta" class="widget module">
				<h3 class="widget-title"><?php _e( 'Meta', 'gather' ); ?></h3>
				<ul>
					<?php wp_register(); ?>
					<li><?php wp_loginout(); ?></li>
					<?php wp_meta(); ?>
				</ul>
			</aside>

		<?php endif; // end sidebar widget area ?>
	</div><!-- #secondary -->

<?php endif; ?>
