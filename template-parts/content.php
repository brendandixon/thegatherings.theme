<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package thegatherings
 */


?>

<article id="post-<?php the_ID(); ?>" class="container post px-md-3 <?php echo get_the_category()[0]->slug; ?>">
	<?php  get_template_part( 'template-parts/content-header' ); ?>

	<?php if ( is_singular() ) : ?>
		<div class="entry-content">
			<?php
			echo thegatherings_get_ratings();

			the_content( sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'thegatherings' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			), true );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'thegatherings' ),
				'after'  => '</div>',
			) );
			?>
		</div><!-- .entry-content -->
	<?php endif; ?>

</article><!-- #post-<?php the_ID(); ?> -->
