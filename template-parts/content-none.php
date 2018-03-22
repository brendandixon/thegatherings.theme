<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package thegatherings
 */


$active = thegatherings_get_active_post_type();
$types = thegatherings_get_post_types( true );

$type_links = array();
foreach ( $types as $name => $value ) {
	$type_links[] = '<em><a href="' . get_post_type_archive_link( $name ) . '">' . $value->label . '</a></em>';
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
