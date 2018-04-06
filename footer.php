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
                <div class="col-7">
                    <div class="d-table h-100">
                        <a class="d-table-cell align-middle" href="<?php printf( home_url() ); ?>">
                            <img class="mr-2 img-fluid hover-hide" src="<?php printf( get_template_directory_uri() . '/assets/images/logo-white.svg'); ?>" />
                            <img class="mr-2 img-fluid hover-show" src="<?php printf( get_template_directory_uri() . '/assets/images/logo-gray.svg'); ?>" />
                        </a>
                        <span class="pt-1 d-table-cell align-middle social">
                            <!-- &mdash;
                            <a href="home.html"><i class="fas fa-envelope-square"></i></a>
                            <a href="home.html"><i class="fab fa-facebook"></i></a>
                            <a href="home.html"><i class="fab fa-pinterest"></i></a>
                            <a href="home.html"><i class="fab fa-twitter-square"></i></a> -->
                        </span>
                    </div>
                </div>
                <div class="col-5">
					<div class="d-table h-100 ml-auto">
						<ul class="mb-0 d-table-cell align-middle text-right">
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
