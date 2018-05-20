<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package thegatherings
 */

?>
<!doctype html>
<html <?php language_attributes(); ?> class="h-100">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>

    <?php if ( is_singular() ) : ?>
    <meta property="og:url" content="<?php echo get_permalink(); ?>" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="<?php the_title_attribute(); ?>" />
    <meta property="og:description" content="<?php echo get_bloginfo('description'); ?>" />
    <meta property="og:image" content="<?php echo get_the_post_thumbnail_url(); ?>" />
    <?php endif ?>
</head>

<body class="p-0 m-0">
    <?php if ( is_singular() ) : ?>
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0';
    fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
    <?php endif ?>
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'thegatherings' ); ?></a>

    <header id="masthead" class="container px-md-4">
        <div class="row">
            <div class="col-md-12">
                <nav class="navbar navbar-light navbar-toggeable-md navbar-expand-md mb-1 mt-1 mb-md-3 mt-md-3 px-0">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
        
                    <a class="navbar-brand mr-0" href="<?php printf( home_url() ); ?>">
                        <img class="img-fluid" src="<?php printf( get_template_directory_uri() . '/assets/images/logo-gray.svg'); ?>" />
                    </a>
        
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ml-auto">
                            <?php

                                $types = get_categories( array( 
                                    'orderby' => 'name',
                                    'parent' => 0,
                                    'hide_empty' => 1
                                ));

                                if ( is_archive() || is_singular() ) {
                                    printf(
                                        '<li class="nav-item"><a class="nav-link" href="%s">Home</a></li>',
                                        home_url()
                                    );
                                }

                                foreach ( $types as $type ) {

                                    if ( ( !is_archive() && !is_singular() ) || !has_category( $type->name ) ) {
                                        $classes = $type->slug;
                                        $link = 'href="' . get_category_link( $type ) . '"';
                                    }
                                    else {
                                        $classes = $type->slug . ' active';
                                        $link = '';
                                    }

                                    printf(
                                        '<li class="nav-item"><a class="nav-link %s" %s>%s</a></li>',
                                        $classes,
                                        $link,
                                        $type->slug
                                    );
                                }
                            ?>
                            <!-- <li class="nav-item">
                                <a class="nav-link search" href="home.html">
                                    <i class="fas fa-search"></i>
                                </a>
                            </li> -->
                        </ul>
                    </div>
        
                </nav>
            </div>
        </div>
    </header>

	<div class="content">
