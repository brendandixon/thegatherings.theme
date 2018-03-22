<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package thegatherings
 */

get_header();
?>

<div id="primary" class="post-index">
	<?php get_template_part( 'template-parts/content', 'index'); ?>
</div>

<?php
get_footer();
