<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package thegatherings
 */

?>

	</div><!-- #content -->

    <footer class="py-3">
        <div class="container">
            <div class="row">
                <div class="col-4">
                    <div class="d-table h-100 w-100">
                        <a class="d-table-cell align-middle" href="<?php printf( home_url() ); ?>">
                            <img class="img-fluid pr-2" src="<?php printf( get_template_directory_uri() . '/assets/images/logo-white.svg'); ?>" />
                        </a>
                    </div>
                </div>
                <div class="col-4">
                    <div class="w-100 text-center subheading">follow us</div>
					<div class="d-table w-100 ml-auto text-center">
						<ul class="m-0 p-0 d-table-cell align-top">
                            <li><div>
                            <a href="mailto:info@thegatherings.place" class="d-inline-block p-1"><i class="fas fa-envelope-square"></i></a>
                            <!-- <a href="home.html" class="d-inline-block p-1"><i class="fab fa-facebook"></i></a>
                            <a href="home.html" class="d-inline-block p-1"><i class="fab fa-pinterest"></i></a> -->
                            <a href="https://twitter.com/gatheringsplace" target="_blank" class="d-inline-block p-1"><i class="fab fa-twitter-square"></i></a>
                            </div></li>
                            <li><a href="http://eepurl.com/dtfgPf" target="_blank">subscribe</a></li>
						</ul>
					</div>
                </div>
                <div class="col-4">
                    <div class="w-100 text-right subheading">learn about us</div>
					<div class="d-table w-100 ml-auto">
						<ul class="mb-0 p-0 d-table-cell align-top text-right">
							<li><a href="<?php printf( about_uri() ); ?>">about</a></li>
                            <li><a href="<?php printf( faq_uri() ); ?>">faq</a></li>
                            <li><a href="<?php printf ( get_principles_uri() ); ?>">principles</a></li>
                            <li><a href="<?php printf( get_involved_uri() ); ?>">get involved</a></li>
							<!-- <li><a href="home.html">privacy policy</a></li> -->
						</ul>
					</div>
                </div>
            </div>
        </div>
    </footer>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
