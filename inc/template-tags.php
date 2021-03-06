<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package thegatherings
 */

if ( ! function_exists( 'thegatherings_get_posted_on' ) ) :
	function thegatherings_posted_on() {
		echo thegatherings_get_posted_on();
	}
endif;

if ( ! function_exists( 'thegatherings_get_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function thegatherings_get_posted_on( $for_rss = false ) {
		$time_string = $for_rss
						? '<time class="entry-date published updated" datetime="%1$s">%2$s</time>'
						: '<time datetime="%1$s">%2$s</time>';
		// if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		// 	$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		// }

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( 'c' ) ),
			esc_html( get_the_modified_date() )
		);

		// $posted_on = sprintf(
		// 	/* translators: %s: post date. */
		// 	esc_html_x( 'Posted on %s', 'post date', 'thegatherings' ),
		// 	'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		// );

		// echo '<span class="posted-on">' . $posted_on . '</span>'; // WPCS: XSS OK.
		// echo $time_string;
		return $time_string;
	}
endif;

if ( ! function_exists( 'thegatherings_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function thegatherings_posted_by() {
		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html_x( 'by %s', 'post author', 'thegatherings' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);

		echo '<span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.

	}
endif;

if ( ! function_exists( 'thegatherings_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function thegatherings_entry_footer() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ', ', 'thegatherings' ) );
			if ( $categories_list ) {
				/* translators: 1: list of categories. */
				printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'thegatherings' ) . '</span>', $categories_list ); // WPCS: XSS OK.
			}

			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'thegatherings' ) );
			if ( $tags_list ) {
				/* translators: 1: list of tags. */
				printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'thegatherings' ) . '</span>', $tags_list ); // WPCS: XSS OK.
			}
		}

		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			comments_popup_link(
				sprintf(
					wp_kses(
						/* translators: %s: post title */
						__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'thegatherings' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				)
			);
			echo '</span>';
		}

		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'thegatherings' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			),
			'<span class="edit-link">',
			'</span>'
		);
	}
endif;

if ( ! function_exists( 'thegatherings_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function thegatherings_post_thumbnail() {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}

		if ( is_singular() ) :
			?>

			<div class="post-thumbnail">
				<?php the_post_thumbnail(); ?>
			</div><!-- .post-thumbnail -->

		<?php else : ?>

		<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true">
			<?php
			the_post_thumbnail( 'post-thumbnail', array(
				'alt' => the_title_attribute( array(
					'echo' => false,
				) ),
			) );
			?>
		</a>

		<?php
		endif; // End is_singular().
	}
endif;

if ( ! function_exists( 'thegatherings_the_post_navigation' ) ) :
	/**
	 * Displays the navigation links for a post
	 */
	function thegatherings_the_post_navigation( $args = array() ) {
		echo thegatherings_get_the_post_navigation( $args );
	}
endif;

if ( ! function_exists( 'thegatherings_get_the_post_navigation' ) ) :
	/**
	 * Retrieves the navigation links for a post
	 */
	function thegatherings_get_the_post_navigation( $args = array() ) {
		$args = wp_parse_args( $args, array(
			'prev_text'          => '%title',
			'next_text'          => '%title',
			'screen_reader_text' => __( 'Post navigation' ),
		) );
	
		$navigation = '';
	
		$previous = get_previous_post_link(
			'<div class="nav-previous text-left">%link</div>',
			'<i class="fas fa-caret-left"></i> ' . $args['prev_text']
		);
	
		$next = get_next_post_link(
			'<div class="nav-next text-right">%link</div>',
			$args['next_text'] . ' <i class="fas fa-caret-right"></i>'
		);
	
		return thegatherings_get_navigation( $previous, $next, $args );
	}
endif;

if ( ! function_exists( 'thegatherings_the_posts_navigation' ) ) :
	/**
	 * Displays the navigation links for a post
	 */
	function thegatherings_the_posts_navigation( $args = array() ) {
		echo thegatherings_get_the_posts_navigation( $args );
	}
endif;

if ( ! function_exists ( 'thegatherings_get_the_posts_navigation' ) ) :
function thegatherings_get_the_posts_navigation( $args = array() ) {
    $navigation = '';
 
    // Don't print empty markup if there's only one page.
    if ( $GLOBALS['wp_query']->max_num_pages > 1 ) {
        $args = wp_parse_args( $args, array(
			'prev_text'          => __( 'Previous' ),
			'next_text'          => __( 'Next' ),
            'screen_reader_text' => __( 'Posts navigation' ),
        ) );
 
        $previous = get_next_posts_link( '<i class="fas fa-caret-left"></i> ' . $args['prev_text'] );
        $next = get_previous_posts_link( $args['next_text'] . ' <i class="fas fa-caret-right"></i>' );
 
        if ( $previous ) {
            $navigation .= '<div class="nav-previous">' . $previous . '</div>';
        }
 
        if ( $next ) {
            $navigation .= '<div class="nav-next">' . $next . '</div>';
        }
 
		$navigation = thegatherings_get_navigation( $previous, $next, $args );
    }
 
    return $navigation;
}
endif;

if ( ! function_exists ( 'thegatherings_get_navigation' ) ) :
function thegatherings_get_navigation( $previous = NULL, $next = NULL, $args = array() ) {
	$args = wp_parse_args( $args, array(
		'screen_reader_text' => __( 'Posts navigation' ),
	) );

	$type = is_archive() || is_singular()
				? get_the_category()[0]->slug
				: '';

	$navigation = '';

	// Only add markup if there's somewhere to navigate to.
	if ( $previous || $next ) {
		$navigation =
			'<nav class="container px-md-3 py-md-2 '. $type . '" role="navigation"><h2 class="screen-reader-text">' .
			$args['screen_reader_text'] .
			'</h2><div class="nav-links row justify-content-between">' .
			'<div class="col-6 text-left">' . $previous . '</div>' .
			'<div class="col-6 text-right">' . $next . '</div>' .
			'</div></nav>';
	}

	return $navigation;
}
endif;

if ( ! function_exists ( 'thegatherings_get_post_card' ) ) :
function thegatherings_get_post_card() {
	$h = is_singular() ? 1 : 2;
	$title = "<h{$h} class=\"card-title\">" . get_the_title() . "</h{$h}>";

	$type = get_the_category()[0];

	$name = $type->name;
	$slug = $type->slug;
	$credits = thegatherings_get_credits();

	return
		'<div class="card credits-container mx-0 mt-0 mb-3 ' . $slug . '">' .
			'<div class="credits">' . $credits . '</div>' .
			'<div class="card-content">' .
				'<a style="display:inline-block;" href="' . get_the_permalink() . '">' .
					'<img class="card-img-top" src="' . get_the_post_thumbnail_url() . '"/>' .
					'<div class="card-body">' .
						'<div class="card-subtitle">' . thegatherings_get_post_date( $name ) . '</div>' .
						$title .
						'<div class="card-text">' . thegatherings_get_teaser( true ) . '</div>' .
					'</div>' .
				'</a>' .
			'</div>' .
		'</div>';
}
endif;

if ( ! function_exists( 'thegatherings_get_rss_card' ) ) :
function thegatherings_get_rss_card( $post = null ) {
	$post = get_post( $post );

	$header_style = 'color:rgba(74, 74, 74, 0.95);font-family: Montserrat, Verdana, Arial, sans-serif;font-size: 1.4rem;padding:0;margin:0;';

	return
		'<img style="display:block; margin-bottom:10px;" src="' . get_the_post_thumbnail_url( $post, 'large' ) . '"/>' .
		thegatherings_get_rss_date() .
		'<h1 style="' . $header_style . '">' . get_the_title() . '</h1>' .
		'<div style="color:rgba(74, 74, 74, 0.75);">' .
		thegatherings_get_teaser( true, $post ) .
		' <a href="' . get_the_permalink() . '" target="_blank">Continue&hellip;</a>' .
		'</div>';
}
endif;

/*
 * Keep RSS styles in-sync with SASS styles
 * 
.post-date {
    border-left: 0.3rem solid transparent;
    font-size: 1rem;
    line-height: 1.3rem;
    padding:0;
    padding-left: 0.4rem;
    text-transform: lowercase;
}

.articles .post-date {
    border-left-color: $blue;
}

.studies .post-date {
    border-left-color: $green;
}

.guides .post-date {
    border-left-color: $orange;
}

.plans .post-date {
    border-left-color: $purple;
}
$blue: rgba(114, 183, 237, 1.0);
$green: rgba(36, 209, 119, 1.0);
$orange: rgba(250, 151, 80, 1.0);
$purple: rgba(144, 19, 254, 1.0);
*/

if ( ! function_exists ( 'thegatherings_get_post_date' ) ) :
function thegatherings_get_post_date( $name = null) {
	if ( ! $name ) {
		$type = get_the_category()[0];
		$name = $type->name;
	}

	return 
		"<div class=\"my-2 text-muted post-date\">{$name} &mdash; " .
		thegatherings_get_posted_on() .
		'</div>';
}
endif;

if ( ! function_exists ( 'thegatherings_get_rss_date' ) ) :
function thegatherings_get_rss_date() {
	$type = get_the_category()[0];
	$name = $type->name;
	$slug = $type->slug;

	switch ( $slug ) {
		case 'guides':
			$color = 'rgba(250, 151, 80, 1.0)';
			break;
		case 'plans':
			$color = 'rgba(144, 19, 254, 1.0)';
			break;
		case 'studies':
			$color = 'rgba(36, 209, 119, 1.0)';
			break;
		default:
			$color = 'rgba(114, 183, 237, 1.0)';
			break;
	}

	$div_style = "border-left: 0.3rem solid {$color};font-size: 1rem;line-height: 1.3rem;padding:0 0 0 0.4rem;text-transform: lowercase;margin:0.4rem 0;";

	return 
		"<div style=\"{$div_style}\">{$name} &mdash; " .
		thegatherings_get_posted_on( true ) .
		'</div>';
}
endif;

if ( ! function_exists ( 'thegatherings_get_ratings' ) ) :
function thegatherings_get_ratings() {
	if ( is_study() )
		return thegatherings_get_study_ratings();
	else
		return '';
}
endif;

if ( ! function_exists ( 'thegatherings_get_study_ratings' ) ) :
function thegatherings_get_study_ratings() {
	$meta = get_post_meta( get_the_ID() );

	$cost = thegatherings_get_meta_field( 'cost', 0, $meta );
	$cost = thegatherings_number_to_symbol( $cost, '<i class="fas fa-dollar-sign"></i>', 'Free' );

	$host = thegatherings_get_meta_field( 'host_effort', 0, $meta );
	$host = thegatherings_number_to_symbol( $host, '<i class="far fa-clock"></i>', 'None' );

	$member = thegatherings_get_meta_field( 'member_effort', 0, $meta );
	$member = thegatherings_number_to_symbol( $member, '<i class="far fa-clock"></i>', 'None' );

	return
		'<table class="ratings">' .
		'<tr>' .
			'<th>' . __( 'Cost', 'textdomain' ) . '</th>' .
			"<td>{$cost}</td>" .
		'</tr>' .
		'<tr>' .
			'<th>' . __( 'Host Effort', 'textdomain' ) . '</th>' .
			"<td>{$host}</td>" .
		'</tr>' .
		'<tr>' .
			'<th>' . __( 'Member Effort', 'textdomain' ) . '</th>' .
			"<td>{$member}</td>" .
		'</tr>' .
		'</table>';
}
endif;

if ( ! function_exists ( 'thegatherings_get_latest_announcement' ) ) :
function thegatherings_get_latest_announcement() {
	$posts = get_posts( array( 'category' => get_cat_ID( 'announcements' ) ) );
	return count( $posts ) > 0 ? $posts[0] : NULL;
	return NULL;
}
endif;

if ( ! function_exists ( 'thegatherings_get_teaser' ) ) :
function thegatherings_get_teaser( $strip_tags = false, $post = null ) {
	$post = get_post( $post );

	$first_paragraph_str = wpautop( $post->post_content );

	$i = strpos($first_paragraph_str, '<!--more-->');
	if ( $i < 0 ) {
		return '';
	}

	$first_paragraph_str = substr( $first_paragraph_str, 0, $i );
	if ( $strip_tags ) {
    	$first_paragraph_str = strip_tags( $first_paragraph_str, '<p>' );
	}

	return $first_paragraph_str;
}
endif;

if ( ! function_exists ( 'thegatherings_get_credits' ) ) :
function thegatherings_get_credits() {
	$image_id = get_post_thumbnail_id();
	$image_post = get_post($image_id);
	$credits = $image_post->post_content;
	if ( ! empty( $credits ) ) {
		$credits = explode( '|', $credits );
		$credits = trim( $credits[0] ) == 'unsplash'
					? thegatherings_unsplash_credit( trim( $credits[1] ), trim( $credits[2] ) )
					: '';
	}
	return $credits;
}
endif;

if ( ! function_exists ( 'thegatherings_unsplash_credit' ) ) :
function thegatherings_unsplash_credit( $name, $id ) {
	return
		'<a class="unsplash-credit"' .
			'href="https://unsplash.com/' . $id . '?utm_medium=referral&amp;utm_campaign=photographer-credit&amp;utm_content=creditBadge" ' .
			'target="_blank" rel="noopener noreferrer" title="Download free do whatever you want high-resolution photos from ' . $name . '">' .
			'<span style="display:inline-block;padding:2px 3px;">' .
				'<svg xmlns="http://www.w3.org/2000/svg" style="height:12px;width:auto;position:relative;vertical-align:middle;top:-1px;fill:white;" viewBox="0 0 32 32">' .
					'<title>unsplash-logo</title>' .
					'<path d="M20.8 18.1c0 2.7-2.2 4.8-4.8 4.8s-4.8-2.1-4.8-4.8c0-2.7 2.2-4.8 4.8-4.8 2.7.1 4.8 2.2 4.8 4.8zm11.2-7.4v14.9c0 2.3-1.9 4.3-4.3 4.3h-23.4c-2.4 0-4.3-1.9-4.3-4.3v-15c0-2.3 1.9-4.3 4.3-4.3h3.7l.8-2.3c.4-1.1 1.7-2 2.9-2h8.6c1.2 0 2.5.9 2.9 2l.8 2.4h3.7c2.4 0 4.3 1.9 4.3 4.3zm-8.6 7.5c0-4.1-3.3-7.5-7.5-7.5-4.1 0-7.5 3.4-7.5 7.5s3.3 7.5 7.5 7.5c4.2-.1 7.5-3.4 7.5-7.5z"></path>' .
				'</svg>' .
			'</span>' .
			'<span class="unsplash-credit-name">' . $name . '</span>' .
		'</a>';
}
endif;
