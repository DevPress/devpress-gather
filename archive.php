<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Gather
 */

get_header(); ?>

	<header class="page-header">
		<h1 class="page-title">
		<?php
		if ( is_category() ) :
			single_cat_title();

		elseif ( is_tag() ) :
			single_tag_title();

		elseif ( is_author() ) :
			printf( __( 'Author: %s', 'gather' ), '<span class="vcard">' . get_the_author() . '</span>' );

		elseif ( is_day() ) :
			printf( __( 'Day: %s', 'gather' ), '<span>' . get_the_date() . '</span>' );

		elseif ( is_month() ) :
			printf( __( 'Month: %s', 'gather' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'gather' ) ) . '</span>' );

		elseif ( is_year() ) :
			printf( __( 'Year: %s', 'gather' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'gather' ) ) . '</span>' );

		elseif ( is_tax( 'post_format', 'post-format-aside' ) ) :
			_e( 'Asides', 'gather' );

		elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) :
			_e( 'Galleries', 'gather' );

		elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
			_e( 'Images', 'gather' );

		elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
			_e( 'Videos', 'gather' );

		elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
			_e( 'Quotes', 'gather' );

		elseif ( is_tax( 'post_format', 'post-format-link' ) ) :
			_e( 'Links', 'gather' );

		elseif ( is_tax( 'post_format', 'post-format-status' ) ) :
			_e( 'Statuses', 'gather' );

		elseif ( is_tax( 'post_format', 'post-format-audio' ) ) :
			_e( 'Audios', 'gather' );

		elseif ( is_tax( 'post_format', 'post-format-chat' ) ) :
			_e( 'Chats', 'gather' );

		else :
			_e( 'Archives', 'gather' );

		endif;
		?>
		</h1>
	</header><!-- .page-header -->

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<div id="posts-wrap" data-columns="<?php echo gather_get_columns(); ?>">
			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php
					$template = '';
					if ( gather_load_masonry() ) {
						$template = 'masonry';
					}
					get_template_part( 'content', $template );
				?>

			<?php endwhile; ?>
			</div>

			<?php gather_paging_nav(); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->

	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
