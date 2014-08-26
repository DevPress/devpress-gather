<?php
/**
 * @package Gather
 */
?>

<?php
$type = get_post_type();

if ( 'download' == $type ) :
	get_template_part( 'content', 'masonry-download' );
else : ?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'module'); ?>>

	<?php if ( has_post_thumbnail() ) { ?>
	<div class="entry-image-section">
		<a href="<?php the_permalink() ?>" class="entry-image-link">
			<figure class="entry-image">
				<?php the_post_thumbnail( 'gather-archive' ); ?>
			</figure>
		</a>
	</div>
	<?php } ?>

	<header class="entry-header">
		<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
	</header><!-- .entry-header -->

	<?php if ( is_search() ) : // Only display Excerpts for Search ?>
	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->
	<?php else : ?>
	<div class="entry-content">
		<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'gather' ) ); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'gather' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
	<?php endif; ?>

	<footer class="entry-meta entry-footer-meta">
		<span class="more-link"><a href="<?php the_permalink(); ?>"><?php _e( 'View More', 'gather' ); ?></a></span>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->

<?php endif; ?>
