<?php
/**
 * Template part for displaying post header
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package thegatherings
 */

?>

<style>
.fb-like > span[style] {
    vertical-align: top!important;
}
</style>
<header class="row mb-0 mb-lg-3">
    <div class="col-12 col-lg-7 col-xl-8 mb-3 mb-lg-0">
        <div class="d-table h-100">
            <div class="d-table-cell align-middle">
                <div class="credits-container">
                    <div class="credits"><?php echo thegatherings_get_credits(); ?></div>
                    <img class="w-100" src="<?php echo get_the_post_thumbnail_url(); ?>">
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 col-lg-5 col-xl-4">
        <div class="d-table h-100">
            <?php if ( is_singular() ) : ?>
                <div class="d-table-row">
                    <div class="d-table-cell align-top text-right">
                        <table style="display:inline-block;">
                            <tr>
                                <td class="align-top text-right" style="padding-right:4px;">
                                    <a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button invisible" data-text="I found this on theGatherings..." data-via="gatheringsplace" data-show-count="false">Tweet</a>
                                </td>
                                <td class="align-top text-right">
                                    <div class="fb-like" data-href="<?php echo get_permalink(); ?>" data-layout="button_count" data-action="like" data-size="small" data-show-faces="false" data-share="true"></div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            <?php endif ?>
            <div class="d-table-row">
                <div class="d-table-cell align-bottom">
                    <?php
                        if ( is_singular() ) :
                            the_title( '<h1 class="entry-title">', '</h1>' );
                        else :
                            the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
                        endif;

                        echo thegatherings_get_post_date();

                    ?>
                    <div class="mt-2">
                        <?php
                            echo thegatherings_get_teaser();
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
