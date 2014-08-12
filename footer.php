<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Gather
 */
?>
		</div><!-- .col-width -->
	</div><!-- #content -->

	<?php if ( is_active_sidebar( 'footer' ) ) : ?>
	<div class="footer-widgets <?php echo gather_footer_class(); ?> clearfix">
		<div class="col-width">
			<?php dynamic_sidebar( 'footer' ); ?>
		</div>
	</div><!-- .footer-widgets -->
	<?php endif; ?>

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="col-width">
			<?php if ( get_theme_mod( 'footer-text', gather_get_default( 'footer-text' ) ) != '' ) : ?>
			<div class="site-info">
				<?php echo get_theme_mod( 'footer-text', gather_get_default( 'footer-text' ) ); ?>
			</div><!-- .site-info -->
			<?php endif; ?>
		</div><!-- .col-width -->
	</footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
