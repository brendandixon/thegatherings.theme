<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package thegatherings
 */

get_header();
?>

<div id="primary" class="content-area">

	<section class="container px-md-4">
		<header class="page-header row">
			<div class="col-12">
				<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'thegatherings' ); ?></h1>
			</div>
		</header>
	</section>

	<?php echo get_template_part( 'template-parts/content', 'none' ); ?>

</div>

<?php
get_footer();
