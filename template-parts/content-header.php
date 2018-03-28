<?php
/**
 * Template part for displaying post header
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package thegatherings
 */

?>

<header class="row post-head mb-0 mb-lg-3">
    <div class="col-12 col-lg-7 col-xl-8 mb-3 mb-lg-0">
        <div class="d-table h-100">
            <div class="d-table-cell align-middle">
                <img class="w-100" src="<?php echo get_the_post_thumbnail_url(); ?>">
            </div>
        </div>
    </div>

    <div class="col-12 col-lg-5 col-xl-4">
        <div class="d-table h-100">
            <div class="d-table-cell align-bottom pb-lg-3 pb-xl-5">
                <?php
                    if ( is_singular() ) :
                        the_title( '<h1 class="entry-title">', '</h1>' );
                    else :
                        the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
                    endif;

                    echo thegatherings_get_post_date();

                ?>
                <p class="mb-lg-0 mt-2">
                    <?php
                        echo thegatherings_get_teaser();
                    ?>
                </p>
            </div>
        </div>
    </div>
</header>
