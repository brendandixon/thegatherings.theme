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

function thegatherings_get_active_post_type() {
	return is_archive() ? get_queried_object() : NULL;
}

function thegatherings_get_post_types( $hide_empty = false ) {
	$all_types = get_post_types(
		array( 'capability_type' => 'post', 'has_archive' => true ),
		false
	);
	ksort($all_types);

	if ( ! $hide_empty )
		return $all_types;

	$types = array();
	foreach ( $all_types as $key => $value ) {
		if ( wp_count_posts( $value->name )->publish > 0 ) {
			$types[$key] = $value;
		}
	}
	return $types;
}

function thegatherings_get_meta_field( $field, $default, $meta = null ) {
	if ( ! $meta )
		$meta = get_post_meta( get_the_ID() );

	$value = $meta[ $field ];
	return is_array( $value ) && count( $value ) > 0 ? $value[0] : $default;
}

function thegatherings_get_post_type() {
	$post_type = get_post_type();
	$post_type_object = get_post_type_object( $post_type );
	return array(
		'name' => $post_type_object->labels->singular_name,
		'slug' => $post_type_object->rewrite['slug'], 
		'title' => $post_type_object->labels->name );
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
	return is_post_type( 'articles', $post );
}

function is_guide( $post = null ) {
	return is_post_type( 'guides', $post );
}

function is_plan( $post = null ) {
	return is_post_type( 'plans', $post );
}

function is_study( $post = null ) {
	return is_post_type( 'studies', $post );
}

function is_post_type( $post_type, $post = null ) {
	return get_post_type( $post ) == $post_type;
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

function get_pillars_uri() {
	return get_permalink( get_page_by_path( 'pillars' ) );
}

function starts_with($haystack, $needle) {
     $length = strlen($needle);
     return (substr($haystack, 0, $length) === $needle);
}

function ends_with($haystack, $needle) {
    $length = strlen($needle);

    return $length === 0 || (substr($haystack, -$length) === $needle);
}