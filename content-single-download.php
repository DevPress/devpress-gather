<?php
/**
 * @package Gather
 */
?>

<?php
	$classes = array();
	if ( get_theme_mod( 'full-bleed-images', gather_get_default( 'full-bleed-images' ) ) ) {
		$classes = array( 'full-bleed' );
	}
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( $classes ); ?>>

	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<?php if ( has_post_thumbnail() ) { ?>
	<figure class="entry-image">
		<?php the_post_thumbnail( 'gather-post' ); ?>
	</figure>
	<?php } ?>

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'gather' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

</article><!-- #post-## -->
