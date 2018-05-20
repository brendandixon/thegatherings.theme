<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package thegatherings
 */

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function thegatherings_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'thegatherings_pingback_header' );

function thegatherings_has_more_posts() {
	global $wp_query;
	return $wp_query->current_post + 1 < $wp_query->post_count;
}

function thegatherings_get_meta_field( $field, $default, $meta = null ) {
	if ( ! $meta )
		$meta = get_post_meta( get_the_ID() );

	$value = $meta[ $field ];
	return is_array( $value ) && count( $value ) > 0 ? $value[0] : $default;
}

function thegatherings_number_to_symbol( $count, $symbol, $empty = '') {
	if ( $count <= 0 )
		return $empty;

	$s = '';
	for ($i = 0; $i < $count; $i++) {
		$s .= $symbol;
	}

	return $s;
}

function thegatherings_join( $values = array(), $between = ', ', $last = ' or ' ) {
	$n = count( $values );
	
	switch ( $n ) {
		case 0:
			return '';
		
		case 1:
			return $values[0];
		
		case 2:
			return join( $last, $values );

		default:
			return
				join( $between, array_slice( $values, 0, $n - 1 ) ) .
				$last .
				$values[$n - 1];
	}
}

function singularize($term) {
	// Make this handle localized text
	return ends_with($term, 'ies')
		? substr($term, 0, -strlen('ies')) . 'y'
		: substr($term, 0, -1);
}

function mb_is_same($a, $b) {
	return	mb_strtolower($a) === mb_strtolower($b)
		&&	mb_strtoupper($a) === mb_strtoupper($b);
}

function is_article( $post = null ) {
	return has_category( 'articles', $post );
}

function is_guide( $post = null ) {
	return has_category( 'guides', $post );
}

function is_plan( $post = null ) {
	return has_category( 'plans', $post );
}

function is_study( $post = null ) {
	return has_category( 'studies', $post );
}

function about_uri() {
	return get_permalink( get_page_by_path( 'about' ) );
}

function faq_uri() {
	return get_permalink( get_page_by_path( 'faq' ) );
}

function get_involved_uri() {
	return get_permalink( get_page_by_path( 'get-involved' ) );
}

function get_principles_uri() {
	return get_permalink( get_page_by_path( 'principles' ) );
}

function starts_with($haystack, $needle) {
     $length = strlen($needle);
     return (substr($haystack, 0, $length) === $needle);
}

function ends_with($haystack, $needle) {
    $length = strlen($needle);

    return $length === 0 || (substr($haystack, -$length) === $needle);
}