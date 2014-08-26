<?php
/**
 * @package Gather
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		<div class="entry-meta entry-header-meta">
			<?php gather_posted_on(); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<?php if ( has_post_thumbnail() ) { ?>
	<figure class="entry-image">
		<?php the_post_thumbnail(); ?>
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

	<footer class="entry-meta entry-footer-meta">
		<?php
			/* translators: used between list items, there is a space after the comma */
			$category_list = get_the_category_list( __( ', ', 'gather' ) );

			if ( $category_list ) {
				echo '<span class="category-meta meta-group">';
				echo '<i class="fa fa-folder-open"></i>';
				echo '<span class="category-meta-list">' . $category_list . '</span>';
				echo '</span>';
			}

			/* translators: used between list items, there is a space after the comma */
			$tag_list = get_the_tag_list( '', __( ', ', 'gather' ) );

			if ( $tag_list ) {
				echo '<span class="tag-meta meta-group">';
				echo '<i class="fa fa-tags"></i>';
				echo '<span class="tag-meta-list">' . $tag_list . '</span>';
				echo '</span>';
			}

			echo edit_post_link( __( 'Edit', 'gather' ), '<span class="meta-group"><i class="fa fa-pencil"></i><span class="edit-link">', '</span></span></span>' );
		?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
