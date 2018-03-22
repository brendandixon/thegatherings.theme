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
</head>

<body class="p-0 m-0">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'thegatherings' ); ?></a>

    <header id="masthead" class="container px-md-4">
        <div class="row">
            <div class="col-md-12">
                <nav class="navbar navbar-light navbar-toggeable-md navbar-expand-md mb-1 mt-1 mb-md-3 mt-md-3 px-0">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
        
                    <a class="navbar-brand" href="<?php printf( home_url() ); ?>">
                        <img class="img-fluid" src="<?php printf( get_template_directory_uri() . '/assets/images/logo-gray.svg'); ?>" />
                    </a>
        
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ml-auto">
                            <?php

                                $active = thegatherings_get_active_post_type();
                                $types = thegatherings_get_post_types( $hide_empty = true );

                                foreach ( $types as $name => $type ) {

                                    if ( ! $active || $type->rewrite['slug'] != $active->rewrite['slug'] ) {
                                        $classes = $type->rewrite['slug'];
                                        $link = 'href="' . get_post_type_archive_link( $name ) . '"';
                                    }
                                    else {
                                        $classes = $type->rewrite['slug'] . ' active';
                                        $link = '';
                                    }

                                    printf(
                                        '<li class="nav-item"><a class="nav-link %s" %s>%s</a></li>',
                                        $classes,
                                        $link,
                                        $name
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
