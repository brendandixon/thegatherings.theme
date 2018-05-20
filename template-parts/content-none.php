<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package thegatherings
 */


$active = get_the_category();
$types = get_categories( array( 
	'orderby' => 'name',
	'parent' => 0,
	'hide_empty' => 1
));

$type_links = array();
foreach ( $types as $type ) {
	$type_links[] = '<em><a href="' . get_category_link( $type ) . '">' . $type->slug . '</a></em>';
}
$type_links = thegatherings_join( $type_links );
?>

<section class="container px-md-4">
	<section class="no-results not-found">
		
		<?php if ( is_archive() ) : ?>
			<div class="row">
				<div class="col-12">
					<?php echo get_the_archive_description(); ?>
				</div>
			</div>

			<div class="row">

				<div class="col-12">
					<p>
						There are no <em><?php echo $active->label; ?></em> yet &mdash; check back soon!
						In the mean time, you may find something interestings in <?php echo $type_links ?>.
					</p>
				</div>

			</div>

		<?php else : ?>

			<div class="row">
				<div class="col-12">
					<p>
						Hmm, there seem to be no matching posts.
						In the mean time, you may find something interestings in <?php echo $type_links ?>.
					</p>
				</div>

		<?php endif; ?>

	</section>
</section>
