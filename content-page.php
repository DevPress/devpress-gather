<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Gather
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'gather' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<?php if ( current_user_can( 'edit_post', get_the_ID() ) ) : ?>
	<footer class="entry-meta entry-footer-meta">
		<?php echo edit_post_link( __( 'Edit', 'gather' ), '<span class="meta-group"><i class="fa fa-pencil"></i><span class="edit-link">', '</span></span></span>' ); ?>
	</footer><!-- .entry-footer -->
	<?php endif; ?>

</article><!-- #post-## -->
