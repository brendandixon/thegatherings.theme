<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package thegatherings
 */


if ( have_posts() ) :
?>

<section class="container px-md-4">
    <?php
        $one_column = '';
        $two_columns = array( '', '' );
        $three_columns = array( '', '', '' );

        the_post();
        ?>

        <?php
            if ( is_archive() ) :
                $type = thegatherings_get_post_type();
        ?>
                <header class="row d-md-none"><div class="col-12">
                    <h1><?php echo $type['title']; ?></h1>
                </div></header>
        <?php
            endif;
        ?>

        <div class="row">
            <div class="col-12 col-xl-8 offset-xl-2">
                <?php echo thegatherings_get_post_card(); ?>
            </div>
        </div>

        <?php

        for ($n=0; have_posts() ; $n++) :
            the_post();

            $card = thegatherings_get_post_card();

            $one_column .= $card;
            $two_columns[$n % 2] .= $card;
            $three_columns[$n % 3] .= $card;

        endfor;

        echo '<div class="row">';

        echo '<section class="col-12 d-block d-md-none">';
        echo $one_column;
        echo '</section>';

        foreach ( $two_columns as $column ) {
            echo '<section class="col-md-6 d-none d-md-block d-xl-none">';
            echo $column;
            echo '</section>';
        }

        foreach ( $three_columns as $column ) {
            echo '<section class="col-xl-4 d-none d-xl-block">';
            echo $column;
            echo '</section>';
        }

        echo '</div>';

        thegatherings_the_posts_navigation();
    ?>
        
</section>

<?php
else :

    get_template_part( 'template-parts/content', 'none' );

endif;
?>
