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
        /*
            Set up the following:

            -- For viewports less than Medium, put all posts in a single column
            -- For Medium / Large viewports, one post full width in the first row, the remaining posts in two columns
            -- For Extra Large viewports, three posts (one large left, one right) in the first row, the remaining posts in three columns
        */
        $one_column = '';

        $two_columns_first = array();
        $two_columns = array( '', '' );

        $three_columns_first = array();
        $three_columns = array( '', '' );

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

        <?php

        for ($n=0; have_posts() ; $n++) :
            the_post();

            $card = thegatherings_get_post_card();

            $one_column .= $card;

            if ( count( $two_columns_first ) < 1 ) {
                array_push( $two_columns_first, $card );
            }
            else {
                $two_columns[($n - count( $two_columns_first ) ) % 2] .= $card;
            }

            if ( count( $three_columns_first ) < 2 ) {
                array_push( $three_columns_first, $card );
            }
            else {
                $three_columns[($n - count( $three_columns_first ) ) % 3] .= $card;
            }


        endfor;

        echo '<div class="row">';

        echo '<section class="col-md-12 d-none d-md-block d-xl-none">';
        echo array_shift( $two_columns_first );
        echo '</section>';

        echo '<section class="col-xl-8 d-none d-xl-block">';
        echo array_shift( $three_columns_first );
        echo '</section>';

        echo '<section class="col-xl-4 d-none d-xl-block">';
        echo '<div class="d-table h-100"><div class="d-table-cell align-middle">';
        while ( ! empty( $three_columns_first ) ) {
            echo array_shift( $three_columns_first );
        }
        echo '</div></div>';
        echo '</section>';

        echo '</div>';

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
