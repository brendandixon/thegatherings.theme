<?php
/**
 * thegatherings functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package thegatherings
 */

if ( ! function_exists( 'thegatherings_init' ) ) :
/**
 * Register a custom post types.
 *
 * @see get_post_type_labels() for label keys.
 */
function thegatherings_init() {

   $labels = array(
        'name'                  => _x( 'Articles', 'Post type general name', 'textdomain' ),
        'singular_name'         => _x( 'Article', 'Post type singular name', 'textdomain' ),
        'add_new'               => __( 'Add Article', 'textdomain' ),
        'add_new_item'          => __( 'Add New Article', 'textdomain' ),
        'edit_item'             => __( 'Edit Article', 'textdomain' ),
        'new_item'              => __( 'New Article', 'textdomain' ),
        'view_item'             => __( 'View Article', 'textdomain' ),
        'view_items'            => __( 'View Articles', 'textdomain' ),
        'search_items'          => __( 'Search Articles', 'textdomain' ),
        'not_found'             => __( 'No articles found.', 'textdomain' ),
        'not_found_in_trash'    => __( 'No articles found in Trash.', 'textdomain' ),
        'parent_item_colon'     => __( 'Parent Articles:', 'textdomain' ),
        'all_items'             => __( 'All Articles', 'textdomain' ),
        'archives'              => _x( 'Article archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'textdomain' ),
		'attributes'			=> __( 'Article attributes', 'textdomain' ),
        'insert_into_item'      => _x( 'Insert into articles', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'textdomain' ),
        'uploaded_to_this_item' => _x( 'Uploaded to this articles', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'textdomain' ),
        'featured_image'        => _x( 'Article Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
		'menu_name'             => _x( 'Articles', 'Admin Menu text', 'textdomain' ),
        'filter_items_list'     => _x( 'Filter articles list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'textdomain' ),
        'items_list_navigation' => _x( 'Articles list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'textdomain' ),
        'items_list'            => _x( 'Articles list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'textdomain' ),
    );
 
    $args = array(
		'labels'				=> $labels,
		'description'			=> __( 'Articles and features', 'textdomain' ),
        'public'				=> true,
        'hierarchical'			=> false,
		'exclude_from_search'	=> false,
		'publicly_queryable'	=> true,
        'show_ui'				=> true,
		'show_in_menu'			=> true,
		'show_in_nav_menus'		=> true,
		'show_in_admin_bar'		=> true,
		'show_in_rest'			=> true,
        'menu_position'			=> null,
        'capability_type'		=> 'post',
		'supports'				=> array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments', 'wpcom-markdown' ),
		'taxonomies'			=> array(),
        'has_archive'			=> true,
        'rewrite'				=> array( 'slug' => 'articles' ),
        'query_var'				=> true,
    );
 
    register_post_type( 'articles', $args );

   $labels = array(
        'name'                  => _x( 'Guides', 'Post type general name', 'textdomain' ),
        'singular_name'         => _x( 'Guide', 'Post type singular name', 'textdomain' ),
        'add_new'               => __( 'Add Guide', 'textdomain' ),
        'add_new_item'          => __( 'Add New Guide', 'textdomain' ),
        'edit_item'             => __( 'Edit Guide', 'textdomain' ),
        'new_item'              => __( 'New Guide', 'textdomain' ),
        'view_item'             => __( 'View Guide', 'textdomain' ),
        'view_items'            => __( 'View Guides', 'textdomain' ),
        'search_items'          => __( 'Search Guides', 'textdomain' ),
        'not_found'             => __( 'No guides found.', 'textdomain' ),
        'not_found_in_trash'    => __( 'No guides found in Trash.', 'textdomain' ),
        'parent_item_colon'     => __( 'Parent Guides:', 'textdomain' ),
        'all_items'             => __( 'All Guides', 'textdomain' ),
        'archives'              => _x( 'Guide archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'textdomain' ),
		'attributes'			=> __( 'Guide attributes', 'textdomain' ),
        'insert_into_item'      => _x( 'Insert into guides', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'textdomain' ),
        'uploaded_to_this_item' => _x( 'Uploaded to this guides', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'textdomain' ),
        'featured_image'        => _x( 'Guide Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
		'menu_name'             => _x( 'Guides', 'Admin Menu text', 'textdomain' ),
        'filter_items_list'     => _x( 'Filter guides list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'textdomain' ),
        'items_list_navigation' => _x( 'Guides list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'textdomain' ),
        'items_list'            => _x( 'Guides list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'textdomain' ),
    );
 
    $args = array(
		'labels'				=> $labels,
		'description'			=> __( 'Advice, ideas, and how-to guides', 'textdomain' ),
        'public'				=> true,
        'hierarchical'			=> false,
		'exclude_from_search'	=> false,
		'publicly_queryable'	=> true,
        'show_ui'				=> true,
		'show_in_menu'			=> true,
		'show_in_nav_menus'		=> true,
		'show_in_admin_bar'		=> true,
		'show_in_rest'			=> true,
        'menu_position'			=> null,
        'capability_type'		=> 'post',
		'supports'				=> array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments', 'wpcom-markdown' ),
		'taxonomies'			=> array(),
        'has_archive'			=> true,
        'rewrite'				=> array( 'slug' => 'guides' ),
        'query_var'				=> true,
    );
 
    register_post_type( 'guides', $args );

	$labels = array(
        'name'                  => _x( 'Plans', 'Post type general name', 'textdomain' ),
        'singular_name'         => _x( 'Plan', 'Post type singular name', 'textdomain' ),
        'add_new'               => __( 'Add Plan', 'textdomain' ),
        'add_new_item'          => __( 'Add New Plan', 'textdomain' ),
        'edit_item'             => __( 'Edit Plan', 'textdomain' ),
        'new_item'              => __( 'New Plan', 'textdomain' ),
        'view_item'             => __( 'View Plan', 'textdomain' ),
        'view_items'            => __( 'View Plans', 'textdomain' ),
        'search_items'          => __( 'Search Plans', 'textdomain' ),
        'not_found'             => __( 'No plans found.', 'textdomain' ),
        'not_found_in_trash'    => __( 'No plans found in Trash.', 'textdomain' ),
        'parent_item_colon'     => __( 'Parent Plans:', 'textdomain' ),
        'all_items'             => __( 'All Plans', 'textdomain' ),
        'archives'              => _x( 'Plan archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'textdomain' ),
		'attributes'			=> __( 'Plan attributes', 'textdomain' ),
        'insert_into_item'      => _x( 'Insert into plans', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'textdomain' ),
        'uploaded_to_this_item' => _x( 'Uploaded to this plans', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'textdomain' ),
        'featured_image'        => _x( 'Plan Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
		'menu_name'             => _x( 'Plans', 'Admin Menu text', 'textdomain' ),
        'filter_items_list'     => _x( 'Filter plans list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'textdomain' ),
        'items_list_navigation' => _x( 'Plans list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'textdomain' ),
        'items_list'            => _x( 'Plans list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'textdomain' ),
    );
 
    $args = array(
		'labels'				=> $labels,
		'description'			=> __( 'Topical plans', 'textdomain' ),
        'public'				=> true,
        'hierarchical'			=> false,
		'exclude_from_search'	=> false,
		'publicly_queryable'	=> true,
        'show_ui'				=> true,
		'show_in_menu'			=> true,
		'show_in_nav_menus'		=> true,
		'show_in_admin_bar'		=> true,
		'show_in_rest'			=> true,
        'menu_position'			=> null,
        'capability_type'		=> 'post',
		'supports'				=> array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments', 'wpcom-markdown' ),
		'taxonomies'			=> array(),
        'has_archive'			=> true,
        'rewrite'				=> array( 'slug' => 'plans' ),
        'query_var'				=> true,
    );
 
    register_post_type( 'plans', $args );

	$labels = array(
        'name'                  => _x( 'Studies', 'Post type general name', 'textdomain' ),
        'singular_name'         => _x( 'Study', 'Post type singular name', 'textdomain' ),
        'add_new'               => __( 'Add Study', 'textdomain' ),
        'add_new_item'          => __( 'Add New Study', 'textdomain' ),
        'edit_item'             => __( 'Edit Study', 'textdomain' ),
        'new_item'              => __( 'New Study', 'textdomain' ),
        'view_item'             => __( 'View Study', 'textdomain' ),
        'view_items'            => __( 'View Studies', 'textdomain' ),
        'search_items'          => __( 'Search Studies', 'textdomain' ),
        'not_found'             => __( 'No studies found.', 'textdomain' ),
        'not_found_in_trash'    => __( 'No studies found in Trash.', 'textdomain' ),
        'parent_item_colon'     => __( 'Parent Studies:', 'textdomain' ),
        'all_items'             => __( 'All Studies', 'textdomain' ),
        'archives'              => _x( 'Study archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'textdomain' ),
		'attributes'			=> __( 'Study attributes', 'textdomain' ),
        'insert_into_item'      => _x( 'Insert into studies', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'textdomain' ),
        'uploaded_to_this_item' => _x( 'Uploaded to this studies', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'textdomain' ),
        'featured_image'        => _x( 'Study Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
		'menu_name'             => _x( 'Studies', 'Admin Menu text', 'textdomain' ),
        'filter_items_list'     => _x( 'Filter studies list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'textdomain' ),
        'items_list_navigation' => _x( 'Studies list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'textdomain' ),
        'items_list'            => _x( 'Studies list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'textdomain' ),
    );
 
    $args = array(
		'labels'				=> $labels,
		'description'			=> __( 'Study and book reviews', 'textdomain' ),
        'public'				=> true,
        'hierarchical'			=> false,
		'exclude_from_search'	=> false,
		'publicly_queryable'	=> true,
        'show_ui'				=> true,
		'show_in_menu'			=> true,
		'show_in_nav_menus'		=> true,
		'show_in_admin_bar'		=> true,
		'show_in_rest'			=> true,
        'menu_position'			=> null,
        'capability_type'		=> 'post',
		'supports'				=> array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments', 'wpcom-markdown' ),
		'taxonomies'			=> array(),
        'has_archive'			=> true,
        'rewrite'				=> array( 'slug' => 'studies' ),
        'query_var'				=> true,
    );
 
    register_post_type( 'studies', $args );

    $args = array(
        'hierarchical' => true,
        'label' => 'Ages',
        'show_in_menu' => false
    );
    register_taxonomy( 'ages', array( 'articles', 'guides', 'plans', 'studies' ), $args );
    wp_insert_term( 'All Adults', 'ages', array(
        'description' => 'Appropriate for adults any age',
        'slug' => 'all-adults'
    ));
    wp_insert_term( 'Young Adults', 'ages', array(
        'description' => 'Appropriate for adults in their 20s and 30s',
        'slug' => 'young-adults'
    ));
    wp_insert_term( 'Midlife Adults', 'ages', array(
        'description' => 'Appropriate for adults in their 40s, 50s, and early 60s',
        'slug' => 'midlife-adults'
    ));
    wp_insert_term( 'Older Adults', 'ages', array(
        'description' => 'Appropriate for adults in their mid-60s and over',
        'slug' => 'Older Adults'
    ));

    $args = array(
        'hierarchical' => true,
        'label' => 'Attributes',
        'show_in_menu' => false
    );
    register_taxonomy( 'attributes', array( 'articles', 'guides', 'plans', 'studies' ), $args );
    wp_insert_term( 'Book', 'attributes', array(
        'description' => 'Includes or requires a book',
        'slug' => 'book'
    ));
    wp_insert_term( 'Video', 'attributes', array(
        'description' => 'Includes a video',
        'slug' => 'video'
    ));
    wp_insert_term( 'Internet', 'attributes', array(
        'description' => 'Requires Internet access',
        'slug' => 'internet'
    ));

    $args = array(
        'hierarchical' => true,
        'label' => 'Focus',
        'show_in_menu' => false
    );
    register_taxonomy( 'focus', array( 'articles', 'guides', 'plans', 'studies' ), $args );
    wp_insert_term( 'Gather', 'focus', array(
        'description' => 'Relates or contributes to the Gather pillar',
        'slug' => 'gather'
    ));
    wp_insert_term( 'Adopt', 'focus', array(
        'description' => 'Relates or contributes to the Adopt pillar',
        'slug' => 'adopt'
    ));
    wp_insert_term( 'Shape', 'focus', array(
        'description' => 'Relates or contributes to the Shape pillar',
        'slug' => 'shape'
    ));
    wp_insert_term( 'Reflect', 'focus', array(
        'description' => 'Relates or contributes to the Reflect pillar',
        'slug' => 'reflect'
    ));

    $args = array(
        'hierarchical' => true,
        'label' => 'Gender',
        'show_in_menu' => false
    );
    register_taxonomy( 'gender', array( 'articles', 'guides', 'plans', 'studies' ), $args );
    wp_insert_term( 'Women', 'gender', array(
        'description' => 'Designed for or suited to women',
        'slug' => 'women'
    ));
    wp_insert_term( 'Men', 'gender', array(
        'description' => 'Designed for or suited to men',
        'slug' => 'men'
    ));
    wp_insert_term( 'Neutral', 'gender', array(
        'description' => 'Not specific to either women or men',
        'slug' => 'neutral'
    ));

    $args = array(
        'hierarchical' => true,
        'label' => 'Relationship',
        'show_in_menu' => false
    );
    register_taxonomy( 'relationship', array( 'articles', 'guides', 'plans', 'studies' ), $args );
    wp_insert_term( 'All Relationships', 'relationship', array(
        'description' => 'Designed for or suited to adults in any relationship',
        'slug' => 'all-relationships'
    ));
    wp_insert_term( 'Singles', 'relationship', array(
        'description' => 'Designed for or suited to single adults',
        'slug' => 'singles'
    ));
    wp_insert_term( 'Single Parents', 'relationship', array(
        'description' => 'Designed for or suited to single-parents adults',
        'slug' => 'single-parents'
    ));
    wp_insert_term( 'Recently Married', 'relationship', array(
        'description' => 'Designed for or suited to recently married adults',
        'slug' => 'recently-married'
    ));
    wp_insert_term( 'Married', 'relationship', array(
        'description' => 'Designed for or suited to married adults',
        'slug' => 'married'
    ));
    wp_insert_term( 'Early Family', 'relationship', array(
        'description' => 'Designed for or suited to early family life',
        'slug' => 'early-familiy'
    ));
    wp_insert_term( 'Established Family', 'relationship', array(
        'description' => 'Designed for or suited to established family life',
        'slug' => 'established-familiy'
    ));
    wp_insert_term( 'Post Family', 'relationship', array(
        'description' => 'Designed for or suited to families with adult children',
        'slug' => 'post-familiy'
    ));
    wp_insert_term( 'Divorced', 'relationship', array(
        'description' => 'Designed for or suited to divorced adults',
        'slug' => 'divorced'
    ));

    $args = array(
        'hierarchical' => true,
        'label' => 'Topic',
        'show_in_menu' => false
    );
    register_taxonomy( 'topic', array( 'articles', 'guides', 'plans', 'studies' ), $args );
    wp_insert_term( 'Bible &amp; Theology', 'topic', array(
        'description' => 'Covers the Bible or Theology',
        'slug' => 'bible-theology'
    ));
    wp_insert_term( 'Current Issues', 'topic', array(
        'description' => 'Covers current issues',
        'slug' => 'current-issues'
    ));
    wp_insert_term( 'Devotional &amp; Prayer', 'topic', array(
        'description' => 'Covers Devotional or Prayer',
        'slug' => 'devotional-prayer'
    ));
    wp_insert_term( 'Family &amp; Relationships', 'topic', array(
        'description' => 'Covers the Family or Relationships',
        'slug' => 'family-relationships'
    ));
    wp_insert_term( 'Work &amp; Vocation', 'topic', array(
        'description' => 'Covers work and vocation',
        'slug' => 'work-vocation'
    ));

    $args = array(
        'hierarchical' => true,
        'label' => 'Vocation',
        'show_in_menu' => false
    );
    register_taxonomy( 'vocation', array( 'articles', 'guides', 'plans', 'studies' ), $args );
    wp_insert_term( 'All Vocations', 'vocation', array(
        'description' => 'Designed for or suited to adults in any vocational state',
        'slug' => 'all-vocations'
    ));
    wp_insert_term( 'College', 'vocation', array(
        'description' => 'Designed for or suited to a College vocational status',
        'slug' => 'college'
    ));
    wp_insert_term( 'Early Career', 'vocation', array(
        'description' => 'Designed for or suited to a Early Career vocational status',
        'slug' => 'early-career'
    ));
    wp_insert_term( 'Established Career', 'vocation', array(
        'description' => 'Designed for or suited to a Established Career vocational status',
        'slug' => 'established-career'
    ));
    wp_insert_term( 'Post Career', 'vocation', array(
        'description' => 'Designed for or suited to a Post Career vocational status',
        'slug' => 'post-career'
    ));
}
endif;
add_action( 'init', 'thegatherings_init' );

if ( ! function_exists( 'thegatherings_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function thegatherings_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on thegatherings, use a find and replace
		 * to change 'thegatherings' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'thegatherings', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'thegatherings' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'thegatherings_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'thegatherings_setup' );

/**
 * Modify main query
 */
function thegatherings_main_query( $query ) {
	if ( $query->is_home() && $query->is_main_query() ) {
		$post_type = $query->get( 'post_type' );
		if ( ! $post_type ) {
			$post_type = array( 'articles', 'guides', 'plans', 'studies' );
		}
		$query->set( 'post_type', $post_type );
	}
}
add_action( 'pre_get_posts', 'thegatherings_main_query' );

/**
 * Add Custom Post Types to the default feed
 *
 * See http://www.wpbeginner.com/wp-tutorials/how-to-add-custom-post-types-to-your-main-wordpress-rss-feed/
 *
 */
function thegatherings_inject_post_types( $qv ) {
    if ( isset( $qv['feed'] ) && !isset( $qv['post_type'] ) ) {
        $qv['post_type'] = array( 'articles', 'guides', 'plans', 'studies' );
    }
    return $qv;
}
add_filter( 'request', 'thegatherings_inject_post_types' );

/**
 * Add custom feed templates
 *
 * See https://codex.wordpress.org/Customizing_Feeds
 */
function thegatherings_custom_rdf() {
    get_template_part( 'template-parts/feed', 'rdf' );
}
remove_all_actions( 'do_feed_rdf' );
add_action( 'do_feed_rdf', 'thegatherings_custom_rdf', 10, 1);

function thegatherings_custom_rss() {
    get_template_part( 'template-parts/feed', 'rss' );
}
remove_all_actions( 'do_feed_rss' );
add_action( 'do_feed_rss', 'thegatherings_custom_rss', 10, 1);

function thegatherings_custom_rss2( $for_comments ) {
    if ( $for_comments )
        get_template_part( 'template-parts/feed', 'rss2-comments' );
    else
        get_template_part( 'template-parts/feed', 'rss2' );
}
remove_all_actions( 'do_feed_rss2' );
add_action( 'do_feed_rss2', 'thegatherings_custom_rss2', 10, 1);

function thegatherings_custom_atom() {
    if ( $for_comments )
        get_template_part( 'template-parts/feed', 'atom-comments' );
    else
        get_template_part( 'template-parts/feed', 'atom' );
}
remove_all_actions( 'do_feed_atom' );
add_action( 'do_feed_atom', 'thegatherings_custom_atom', 10, 1);

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function thegatherings_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'thegatherings_content_width', 640 );
}
add_action( 'after_setup_theme', 'thegatherings_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
// function thegatherings_widgets_init() {
// 	register_sidebar( array(
// 		'name'          => esc_html__( 'Sidebar', 'thegatherings' ),
// 		'id'            => 'sidebar-1',
// 		'description'   => esc_html__( 'Add widgets here.', 'thegatherings' ),
// 		'before_widget' => '<section id="%1$s" class="widget %2$s">',
// 		'after_widget'  => '</section>',
// 		'before_title'  => '<h2 class="widget-title">',
// 		'after_title'   => '</h2>',
// 	) );
// }
// add_action( 'widgets_init', 'thegatherings_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function thegatherings_scripts() {
	wp_enqueue_style( 'bootstrap-cdn', '//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css');
	wp_enqueue_style( 'thegatherings-style', get_stylesheet_uri() );

	// Deregister default jQuery and add the Bootstrap scripts
	wp_deregister_script('jquery');
	wp_enqueue_script('jquery', '//ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js', array(), '', true);
	wp_enqueue_script('bootstrap-min', '//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js', array('jquery'), '', true);
	wp_enqueue_script('popper', '//cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js', array('jquery'), '', true);

	// Add FontAwesome
	wp_enqueue_script('fontawesome', '//use.fontawesome.com/releases/v5.0.8/js/all.js', array(), '', true);

	wp_enqueue_script( 'thegatherings-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
	wp_enqueue_script( 'thegatherings-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'thegatherings_scripts' );

/**
 * Remove excerpt more text
 */
function thegatherings_excerpt_more($default = '') {
    return '';
}
add_filter( 'excerpt_more', 'thegatherings_excerpt_more' );

/**
 * Remove the Admin bar display from the site
 */
add_filter( 'show_admin_bar', '__return_false' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}
