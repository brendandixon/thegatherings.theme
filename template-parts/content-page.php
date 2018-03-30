<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package thegatherings
 */

?>

<article id="post-<?php the_ID(); ?>" class="container px-md-3">
	<header class="entry-header row mb-0 mb-lg-3">
		<div class="col-12">
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		</div>
	</header>

	<div class="entry-content row">
		<div class="col-12">
			<?php
			the_content();

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'thegatherings' ),
				'after'  => '</div>',
			) );
			?>
		</div>
	</div>
</article>
