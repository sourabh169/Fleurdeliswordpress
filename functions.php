<?php
/**
 * Fleurdelis functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Fleurdelis
 */

if ( ! function_exists( 'fleurdelis_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function fleurdelis_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Fleurdelis, use a find and replace
		 * to change 'fleurdelis' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'fleurdelis', get_template_directory() . '/languages' );

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
			'primary-menu' => esc_html__( 'Primary Menu', 'fleurdelis' ),
			'secondary-menu' => esc_html__( 'Secondary Menu', 'fleurdelis' ),
			'social-media-menu' => esc_html__( 'Social Media Menu', 'fleurdelis' ),
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
		add_theme_support( 'custom-background', apply_filters( 'fleurdelis_custom_background_args', array(
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
add_action( 'after_setup_theme', 'fleurdelis_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function fleurdelis_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'fleurdelis_content_width', 640 );
}
add_action( 'after_setup_theme', 'fleurdelis_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function fleurdelis_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'fleurdelis' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'fleurdelis' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'fleurdelis_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function fleurdelis_scripts() {
	//wp_enqueue_style( 'fleurdelis-style', get_stylesheet_uri() );

	wp_enqueue_script( 'fleurdelis-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'fleurdelis-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'fleurdelis_scripts' );

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

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}




// Register Custom Post Type Homepage Slider
function create_homepageslider_cpt() {

	$labels = array(
		'name' => _x( 'Homepage Sliders', 'Post Type General Name', 'homepage-slider' ),
		'singular_name' => _x( 'Homepage Slider', 'Post Type Singular Name', 'homepage-slider' ),
		'menu_name' => _x( 'Homepage Sliders', 'Admin Menu text', 'homepage-slider' ),
		'name_admin_bar' => _x( 'Homepage Slider', 'Add New on Toolbar', 'homepage-slider' ),
		'archives' => __( 'Homepage Slider Archives', 'homepage-slider' ),
		'attributes' => __( 'Homepage Slider Attributes', 'homepage-slider' ),
		'parent_item_colon' => __( 'Parent Homepage Slider:', 'homepage-slider' ),
		'all_items' => __( 'All Homepage Sliders', 'homepage-slider' ),
		'add_new_item' => __( 'Add New Homepage Slider', 'homepage-slider' ),
		'add_new' => __( 'Add New', 'homepage-slider' ),
		'new_item' => __( 'New Homepage Slider', 'homepage-slider' ),
		'edit_item' => __( 'Edit Homepage Slider', 'homepage-slider' ),
		'update_item' => __( 'Update Homepage Slider', 'homepage-slider' ),
		'view_item' => __( 'View Homepage Slider', 'homepage-slider' ),
		'view_items' => __( 'View Homepage Sliders', 'homepage-slider' ),
		'search_items' => __( 'Search Homepage Slider', 'homepage-slider' ),
		'not_found' => __( 'Not found', 'homepage-slider' ),
		'not_found_in_trash' => __( 'Not found in Trash', 'homepage-slider' ),
		'featured_image' => __( 'Featured Image', 'homepage-slider' ),
		'set_featured_image' => __( 'Set featured image', 'homepage-slider' ),
		'remove_featured_image' => __( 'Remove featured image', 'homepage-slider' ),
		'use_featured_image' => __( 'Use as featured image', 'homepage-slider' ),
		'insert_into_item' => __( 'Insert into Homepage Slider', 'homepage-slider' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Homepage Slider', 'homepage-slider' ),
		'items_list' => __( 'Homepage Sliders list', 'homepage-slider' ),
		'items_list_navigation' => __( 'Homepage Sliders list navigation', 'homepage-slider' ),
		'filter_items_list' => __( 'Filter Homepage Sliders list', 'homepage-slider' ),
	);
	$args = array(
		'label' => __( 'Homepage Slider', 'homepage-slider' ),
		'description' => __( 'Homepage Slider section on Homepage', 'homepage-slider' ),
		'labels' => $labels,
		'menu_icon' => 'dashicons-desktop',
		'supports' => array('title', 'editor', 'excerpt', 'thumbnail', 'revisions', 'author', 'comments', 'trackbacks', 'page-attributes', 'post-formats', 'custom-fields'),
		'taxonomies' => array(),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 5,
		'show_in_admin_bar' => true,
		'show_in_nav_menus' => true,
		'can_export' => true,
		'has_archive' => false,
		'hierarchical' => false,
		'exclude_from_search' => false,
		'show_in_rest' => true,
		'publicly_queryable' => false,
		'capability_type' => 'post',
	);
	register_post_type( 'homepageslider', $args );

}
add_action( 'init', 'create_homepageslider_cpt', 0 );





// Register Custom Post Type About Post
function create_aboutpost_cpt() {

	$labels = array(
		'name' => _x( 'About Posts', 'Post Type General Name', 'about-post' ),
		'singular_name' => _x( 'About Post', 'Post Type Singular Name', 'about-post' ),
		'menu_name' => _x( 'About Posts', 'Admin Menu text', 'about-post' ),
		'name_admin_bar' => _x( 'About Post', 'Add New on Toolbar', 'about-post' ),
		'archives' => __( 'About Post Archives', 'about-post' ),
		'attributes' => __( 'About Post Attributes', 'about-post' ),
		'parent_item_colon' => __( 'Parent About Post:', 'about-post' ),
		'all_items' => __( 'All About Posts', 'about-post' ),
		'add_new_item' => __( 'Add New About Post', 'about-post' ),
		'add_new' => __( 'Add New', 'about-post' ),
		'new_item' => __( 'New About Post', 'about-post' ),
		'edit_item' => __( 'Edit About Post', 'about-post' ),
		'update_item' => __( 'Update About Post', 'about-post' ),
		'view_item' => __( 'View About Post', 'about-post' ),
		'view_items' => __( 'View About Posts', 'about-post' ),
		'search_items' => __( 'Search About Post', 'about-post' ),
		'not_found' => __( 'Not found', 'about-post' ),
		'not_found_in_trash' => __( 'Not found in Trash', 'about-post' ),
		'featured_image' => __( 'Featured Image', 'about-post' ),
		'set_featured_image' => __( 'Set featured image', 'about-post' ),
		'remove_featured_image' => __( 'Remove featured image', 'about-post' ),
		'use_featured_image' => __( 'Use as featured image', 'about-post' ),
		'insert_into_item' => __( 'Insert into About Post', 'about-post' ),
		'uploaded_to_this_item' => __( 'Uploaded to this About Post', 'about-post' ),
		'items_list' => __( 'About Posts list', 'about-post' ),
		'items_list_navigation' => __( 'About Posts list navigation', 'about-post' ),
		'filter_items_list' => __( 'Filter About Posts list', 'about-post' ),
	);
	$args = array(
		'label' => __( 'About Post', 'about-post' ),
		'description' => __( 'About Post Section', 'about-post' ),
		'labels' => $labels,
		'menu_icon' => 'dashicons-building',
		'supports' => array('title', 'editor', 'excerpt', 'thumbnail', 'page-attributes', 'post-formats', 'custom-fields'),
		'taxonomies' => array(),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 5,
		'show_in_admin_bar' => true,
		'show_in_nav_menus' => true,
		'can_export' => true,
		'has_archive' => false,
		'hierarchical' => false,
		'exclude_from_search' => false,
		'show_in_rest' => true,
		'publicly_queryable' => true,
		'capability_type' => 'post',
	);
	register_post_type( 'aboutpost', $args );

}
add_action( 'init', 'create_aboutpost_cpt', 0 );




// Register Custom Post Type Collection Post
function create_collectionpost_cpt() {

	$labels = array(
		'name' => _x( 'Collection Posts', 'Post Type General Name', 'collection-post' ),
		'singular_name' => _x( 'Collection Post', 'Post Type Singular Name', 'collection-post' ),
		'menu_name' => _x( 'Collection Posts', 'Admin Menu text', 'collection-post' ),
		'name_admin_bar' => _x( 'Collection Post', 'Add New on Toolbar', 'collection-post' ),
		'archives' => __( 'Collection Post Archives', 'collection-post' ),
		'attributes' => __( 'Collection Post Attributes', 'collection-post' ),
		'parent_item_colon' => __( 'Parent Collection Post:', 'collection-post' ),
		'all_items' => __( 'All Collection Posts', 'collection-post' ),
		'add_new_item' => __( 'Add New Collection Post', 'collection-post' ),
		'add_new' => __( 'Add New', 'collection-post' ),
		'new_item' => __( 'New Collection Post', 'collection-post' ),
		'edit_item' => __( 'Edit Collection Post', 'collection-post' ),
		'update_item' => __( 'Update Collection Post', 'collection-post' ),
		'view_item' => __( 'View Collection Post', 'collection-post' ),
		'view_items' => __( 'View Collection Posts', 'collection-post' ),
		'search_items' => __( 'Search Collection Post', 'collection-post' ),
		'not_found' => __( 'Not found', 'collection-post' ),
		'not_found_in_trash' => __( 'Not found in Trash', 'collection-post' ),
		'featured_image' => __( 'Featured Image', 'collection-post' ),
		'set_featured_image' => __( 'Set featured image', 'collection-post' ),
		'remove_featured_image' => __( 'Remove featured image', 'collection-post' ),
		'use_featured_image' => __( 'Use as featured image', 'collection-post' ),
		'insert_into_item' => __( 'Insert into Collection Post', 'collection-post' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Collection Post', 'collection-post' ),
		'items_list' => __( 'Collection Posts list', 'collection-post' ),
		'items_list_navigation' => __( 'Collection Posts list navigation', 'collection-post' ),
		'filter_items_list' => __( 'Filter Collection Posts list', 'collection-post' ),
	);
	$args = array(
		'label' => __( 'Collection Post', 'collection-post' ),
		'description' => __( 'Collection Post Section', 'collection-post' ),
		'labels' => $labels,
		'menu_icon' => 'dashicons-excerpt-view',
		'supports' => array('title', 'editor', 'excerpt', 'thumbnail', 'custom-fields'),
		'taxonomies' => array(),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 5,
		'show_in_admin_bar' => true,
		'show_in_nav_menus' => true,
		'can_export' => true,
		'has_archive' => false,
		'hierarchical' => false,
		'exclude_from_search' => false,
		'show_in_rest' => true,
		'publicly_queryable' => true,
		'capability_type' => 'post',
	);
	register_post_type( 'collectionpost', $args );

}
add_action( 'init', 'create_collectionpost_cpt', 0 );




// Register Custom Post Type Mission Post
function create_missionpost_cpt() {

	$labels = array(
		'name' => _x( 'Mission Posts', 'Post Type General Name', 'mission-post' ),
		'singular_name' => _x( 'Mission Post', 'Post Type Singular Name', 'mission-post' ),
		'menu_name' => _x( 'Mission Posts', 'Admin Menu text', 'mission-post' ),
		'name_admin_bar' => _x( 'Mission Post', 'Add New on Toolbar', 'mission-post' ),
		'archives' => __( 'Mission Post Archives', 'mission-post' ),
		'attributes' => __( 'Mission Post Attributes', 'mission-post' ),
		'parent_item_colon' => __( 'Parent Mission Post:', 'mission-post' ),
		'all_items' => __( 'All Mission Posts', 'mission-post' ),
		'add_new_item' => __( 'Add New Mission Post', 'mission-post' ),
		'add_new' => __( 'Add New', 'mission-post' ),
		'new_item' => __( 'New Mission Post', 'mission-post' ),
		'edit_item' => __( 'Edit Mission Post', 'mission-post' ),
		'update_item' => __( 'Update Mission Post', 'mission-post' ),
		'view_item' => __( 'View Mission Post', 'mission-post' ),
		'view_items' => __( 'View Mission Posts', 'mission-post' ),
		'search_items' => __( 'Search Mission Post', 'mission-post' ),
		'not_found' => __( 'Not found', 'mission-post' ),
		'not_found_in_trash' => __( 'Not found in Trash', 'mission-post' ),
		'featured_image' => __( 'Featured Image', 'mission-post' ),
		'set_featured_image' => __( 'Set featured image', 'mission-post' ),
		'remove_featured_image' => __( 'Remove featured image', 'mission-post' ),
		'use_featured_image' => __( 'Use as featured image', 'mission-post' ),
		'insert_into_item' => __( 'Insert into Mission Post', 'mission-post' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Mission Post', 'mission-post' ),
		'items_list' => __( 'Mission Posts list', 'mission-post' ),
		'items_list_navigation' => __( 'Mission Posts list navigation', 'mission-post' ),
		'filter_items_list' => __( 'Filter Mission Posts list', 'mission-post' ),
	);
	$args = array(
		'label' => __( 'Mission Post', 'mission-post' ),
		'description' => __( 'Mission Post section', 'mission-post' ),
		'labels' => $labels,
		'menu_icon' => 'dashicons-chart-bar',
		'supports' => array('title', 'editor', 'excerpt', 'thumbnail', 'custom-fields'),
		'taxonomies' => array(),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 5,
		'show_in_admin_bar' => true,
		'show_in_nav_menus' => true,
		'can_export' => true,
		'has_archive' => false,
		'hierarchical' => false,
		'exclude_from_search' => false,
		'show_in_rest' => true,
		'publicly_queryable' => true,
		'capability_type' => 'post',
	);
	register_post_type( 'missionpost', $args );

}
add_action( 'init', 'create_missionpost_cpt', 0 );




// Register Custom Post Type Vision Post
function create_visionpost_cpt() {

	$labels = array(
		'name' => _x( 'Vision Posts', 'Post Type General Name', 'vision-post' ),
		'singular_name' => _x( 'Vision Post', 'Post Type Singular Name', 'vision-post' ),
		'menu_name' => _x( 'Vision Posts', 'Admin Menu text', 'vision-post' ),
		'name_admin_bar' => _x( 'Vision Post', 'Add New on Toolbar', 'vision-post' ),
		'archives' => __( 'Vision Post Archives', 'vision-post' ),
		'attributes' => __( 'Vision Post Attributes', 'vision-post' ),
		'parent_item_colon' => __( 'Parent Vision Post:', 'vision-post' ),
		'all_items' => __( 'All Vision Posts', 'vision-post' ),
		'add_new_item' => __( 'Add New Vision Post', 'vision-post' ),
		'add_new' => __( 'Add New', 'vision-post' ),
		'new_item' => __( 'New Vision Post', 'vision-post' ),
		'edit_item' => __( 'Edit Vision Post', 'vision-post' ),
		'update_item' => __( 'Update Vision Post', 'vision-post' ),
		'view_item' => __( 'View Vision Post', 'vision-post' ),
		'view_items' => __( 'View Vision Posts', 'vision-post' ),
		'search_items' => __( 'Search Vision Post', 'vision-post' ),
		'not_found' => __( 'Not found', 'vision-post' ),
		'not_found_in_trash' => __( 'Not found in Trash', 'vision-post' ),
		'featured_image' => __( 'Featured Image', 'vision-post' ),
		'set_featured_image' => __( 'Set featured image', 'vision-post' ),
		'remove_featured_image' => __( 'Remove featured image', 'vision-post' ),
		'use_featured_image' => __( 'Use as featured image', 'vision-post' ),
		'insert_into_item' => __( 'Insert into Vision Post', 'vision-post' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Vision Post', 'vision-post' ),
		'items_list' => __( 'Vision Posts list', 'vision-post' ),
		'items_list_navigation' => __( 'Vision Posts list navigation', 'vision-post' ),
		'filter_items_list' => __( 'Filter Vision Posts list', 'vision-post' ),
	);
	$args = array(
		'label' => __( 'Vision Post', 'vision-post' ),
		'description' => __( 'Vision Post section', 'vision-post' ),
		'labels' => $labels,
		'menu_icon' => 'dashicons-chart-line',
		'supports' => array('title', 'editor', 'excerpt', 'thumbnail', 'custom-fields'),
		'taxonomies' => array(),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 5,
		'show_in_admin_bar' => true,
		'show_in_nav_menus' => true,
		'can_export' => true,
		'has_archive' => false,
		'hierarchical' => false,
		'exclude_from_search' => false,
		'show_in_rest' => true,
		'publicly_queryable' => true,
		'capability_type' => 'post',
	);
	register_post_type( 'visionpost', $args );

}
add_action( 'init', 'create_visionpost_cpt', 0 );




// Register Custom Post Type FAQ Post
function create_faqpost_cpt() {

	$labels = array(
		'name' => _x( 'FAQ Posts', 'Post Type General Name', 'faq-post' ),
		'singular_name' => _x( 'FAQ Post', 'Post Type Singular Name', 'faq-post' ),
		'menu_name' => _x( 'FAQ Posts', 'Admin Menu text', 'faq-post' ),
		'name_admin_bar' => _x( 'FAQ Post', 'Add New on Toolbar', 'faq-post' ),
		'archives' => __( 'FAQ Post Archives', 'faq-post' ),
		'attributes' => __( 'FAQ Post Attributes', 'faq-post' ),
		'parent_item_colon' => __( 'Parent FAQ Post:', 'faq-post' ),
		'all_items' => __( 'All FAQ Posts', 'faq-post' ),
		'add_new_item' => __( 'Add New FAQ Post', 'faq-post' ),
		'add_new' => __( 'Add New', 'faq-post' ),
		'new_item' => __( 'New FAQ Post', 'faq-post' ),
		'edit_item' => __( 'Edit FAQ Post', 'faq-post' ),
		'update_item' => __( 'Update FAQ Post', 'faq-post' ),
		'view_item' => __( 'View FAQ Post', 'faq-post' ),
		'view_items' => __( 'View FAQ Posts', 'faq-post' ),
		'search_items' => __( 'Search FAQ Post', 'faq-post' ),
		'not_found' => __( 'Not found', 'faq-post' ),
		'not_found_in_trash' => __( 'Not found in Trash', 'faq-post' ),
		'featured_image' => __( 'Featured Image', 'faq-post' ),
		'set_featured_image' => __( 'Set featured image', 'faq-post' ),
		'remove_featured_image' => __( 'Remove featured image', 'faq-post' ),
		'use_featured_image' => __( 'Use as featured image', 'faq-post' ),
		'insert_into_item' => __( 'Insert into FAQ Post', 'faq-post' ),
		'uploaded_to_this_item' => __( 'Uploaded to this FAQ Post', 'faq-post' ),
		'items_list' => __( 'FAQ Posts list', 'faq-post' ),
		'items_list_navigation' => __( 'FAQ Posts list navigation', 'faq-post' ),
		'filter_items_list' => __( 'Filter FAQ Posts list', 'faq-post' ),
	);
	$args = array(
		'label' => __( 'FAQ Post', 'faq-post' ),
		'description' => __( 'FAQ Posts section', 'faq-post' ),
		'labels' => $labels,
		'menu_icon' => 'dashicons-admin-comments',
		'supports' => array('title', 'editor', 'excerpt', 'thumbnail', 'custom-fields'),
		'taxonomies' => array(),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 5,
		'show_in_admin_bar' => true,
		'show_in_nav_menus' => true,
		'can_export' => true,
		'has_archive' => false,
		'hierarchical' => false,
		'exclude_from_search' => false,
		'show_in_rest' => true,
		'publicly_queryable' => true,
		'capability_type' => 'post',
	);
	register_post_type( 'faqpost', $args );

}
add_action( 'init', 'create_faqpost_cpt', 0 );




//catch that link from text editor
function catch_that_hyplink() {
  global $post, $posts;
  $first_hyplink = '';
  ob_start();
  ob_end_clean();
  $output = preg_match_all('/<a.+href=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
  $first_hyplink = $matches [1] [0];

  if(empty($first_hyplink)){ //Defines a default image
    $first_hyplink = "#";
  }
  return $first_hyplink;
}


//catch that image
function catch_that_image() {
  global $post, $posts;
  $first_img = '';
  ob_start();
  ob_end_clean();
  $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
  $first_img = $matches [1] [0];

  if(empty($first_img)){ //Defines a default image
    $first_img = "";
  }
  return $first_img;
}






/**
 * @snippet       Add to Cart Quantity drop-down - WooCommerce
 * @how-to        Watch tutorial @ https://businessbloomer.com/?p=19055
 * @author        Rodolfo Melogli
 * @testedwith    WooCommerce 3.7
 * @donate $9     https://businessbloomer.com/bloomer-armada/
 */
  
function woocommerce_quantity_input( $args = array(), $product = null, $echo = true ) {
  
   if ( is_null( $product ) ) {
      $product = $GLOBALS['product'];
   }
 
   $defaults = array(
      'input_id' => uniqid( 'quantity_' ),
      'input_name' => 'quantity',
      'input_value' => '1',
      'classes' => apply_filters( 'woocommerce_quantity_input_classes', array( 'input-text', 'qty', 'text' ), $product ),
      'max_value' => apply_filters( 'woocommerce_quantity_input_max', -1, $product ),
      'min_value' => apply_filters( 'woocommerce_quantity_input_min', 0, $product ),
      'step' => apply_filters( 'woocommerce_quantity_input_step', 1, $product ),
      'pattern' => apply_filters( 'woocommerce_quantity_input_pattern', has_filter( 'woocommerce_stock_amount', 'intval' ) ? '[0-9]*' : '' ),
      'inputmode' => apply_filters( 'woocommerce_quantity_input_inputmode', has_filter( 'woocommerce_stock_amount', 'intval' ) ? 'numeric' : '' ),
      'product_name' => $product ? $product->get_title() : '',
   );
 
   $args = apply_filters( 'woocommerce_quantity_input_args', wp_parse_args( $args, $defaults ), $product );
  
   // Apply sanity to min/max args - min cannot be lower than 0.
   $args['min_value'] = max( $args['min_value'], 0 );
   // Note: change 20 to whatever you like
   $args['max_value'] = 0 < $args['max_value'] ? $args['max_value'] : 5;
 
   // Max cannot be lower than min if defined.
   if ( '' !== $args['max_value'] && $args['max_value'] < $args['min_value'] ) {
      $args['max_value'] = $args['min_value'];
   }
  
   $options = '';
    
   for ( $count = $args['min_value']; $count <= $args['max_value']; $count = $count + $args['step'] ) {
 
      // Cart item quantity defined?
      if ( '' !== $args['input_value'] && $args['input_value'] >= 1 && $count == $args['input_value'] ) {
        $selected = 'selected';      
      } else $selected = '';
 
      $options .= '<option value="' . $count . '"' . $selected . '>' . $count . '</option>';
 
   }
     
   $string = '<div class="quantityDiv"><span>Quantity</span><div class="selectDiv"><div class="angledownIconSelect"></div><select name="' . $args['input_name'] . '">' . $options . '</select></div></div>';
 
   if ( $echo ) {
      echo $string;
   } else {
      return $string;
   }
  
}





// woocomerce support
function mytheme_add_woocommerce_support() {
    add_theme_support( 'woocommerce', array(
        /*'thumbnail_image_width' => 150,
        'single_image_width'    => 300,*/
        /*'product_grid'          => array(
            'default_rows'    => 3,
            'min_rows'        => 2,
            'max_rows'        => 8,
            'default_columns' => 3,
            'min_columns'     => 2,
            'max_columns'     => 3,
        ),*/
    ) );
    add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
}

add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' );




add_filter( 'woocommerce_add_to_cart_fragments', 'header_add_to_cart_fragment', 30, 1 );
function header_add_to_cart_fragment( $fragments ) {
    global $woocommerce;
    ob_start();
    ?>
    <a class="cart-customlocation" href="#" title="<?php _e('View your shopping cart', 'woothemes'); ?>">
    	<img src="<?php bloginfo('template_directory'); ?>/assets/images/cart-icon.svg" alt="">
    	<span><?php echo sprintf(_n('%d ', '%d ', $woocommerce->cart->cart_contents_count, 'woothemes'), $woocommerce->cart->cart_contents_count);?></span>
    </a>
    <?php $fragments['a.cart-customlocation'] = ob_get_clean();  return $fragments;
}






/**
 * Custom login/register form(s) shortcode.
 */
function ace_wc_login_register() {
	ob_start();
	do_action( 'woocommerce_before_customer_login_form' ); ?>

	<div class="container" id="customer_login">
		<div class="loginFormContainer">
			<div class="row">
				<div class="col-md-6">
					<div class="loginFormCols">
						<h3><?php echo sprintf( __( 'Guest Checkout', 'woocommerce' ), get_option( 'blogname' ) ); ?></h3>
						<p>You may checkout without creating an account. You will be able to create an account later if you wish.</p>
						<form method="post" class="woocommerce-form woocommerce-form-register register" <?php do_action( 'woocommerce_register_form_tag' ); ?> ><?php
							do_action( 'woocommerce_register_form_start' );
							?><p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
								<label for="reg_email"><?php esc_html_e( 'Email address', 'woocommerce' ); ?></label>
								<input type="email" class="woocommerce-Input woocommerce-Input--text input-text" placeholder="Email" name="email" id="reg_email" autocomplete="email" value="<?php echo ( ! empty( $_POST['email'] ) ) ? esc_attr( wp_unslash( $_POST['email'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
							</p><?php
							do_action( 'woocommerce_register_form' );
							?><p class="woocommerce-FormRow form-row"><?php
								wp_nonce_field( 'woocommerce-register', 'woocommerce-register-nonce' ); ?>
								<button type="submit" class="btn btn-primary btn-lg" name="register" value="<?php esc_attr_e( 'Register', 'woocommerce' ); ?>"><?php esc_html_e( 'Proceed', 'woocommerce' ); ?></button>
							</p><?php
							do_action( 'woocommerce_register_form_end' );
						?></form>
					</div>
				</div>
				<div class="col-md-6">
					<div class="loginFormCols">
						<h3><?php esc_html_e( 'Returning customer', 'woocommerce' ); ?></h3>
						<p>Please sign in if you already have a FLEURDELIS account. This will speed up the checkout process and save purchase in your order history.</p>
						<form class="woocommerce-form woocommerce-form-login login" method="post"><?php
							do_action( 'woocommerce_login_form_start' );
							?><p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
								<label for="username"><?php esc_html_e( 'Email address', 'woocommerce' ); ?></label>
								<input placeholder="Email" type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="username" id="username" autocomplete="username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
							</p>
							<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
								<label for="password"><?php esc_html_e( 'Password', 'woocommerce' ); ?></label>
								<input placeholder="Password" class="woocommerce-Input woocommerce-Input--text input-text" type="password" name="password" id="password" autocomplete="current-password" />
							</p><?php
							do_action( 'woocommerce_login_form' );
							?><p class="form-row"><?php
								wp_nonce_field( 'woocommerce-login', 'woocommerce-login-nonce' );
								?><button type="submit" class="btn btn-primary btn-lg pull-left" name="login" value="<?php esc_attr_e( 'Login', 'woocommerce' ); ?>"><?php esc_html_e( 'Login', 'woocommerce' ); ?></button>
								<label class="woocommerce-form__label woocommerce-form__label-for-checkbox inline">
									<input class="woocommerce-form__input woocommerce-form__input-checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever" /> <span><?php esc_html_e( 'Remember me', 'woocommerce' ); ?></span>
								</label>
							</p>
							<p class="woocommerce-LostPassword lost_password">
								<a class="btn btn-default2 pull-right" href="<?php echo esc_url( wp_lostpassword_url() ); ?>"><?php esc_html_e( 'Forgot your password?', 'woocommerce' ); ?></a>
							</p><?php
							do_action( 'woocommerce_login_form_end' );
						?></form>
						<div class="space40"></div>
						<h3>New Customer</h3>
						<p>Create an account to speed up checkout., make order tracking easier and save your preference fon your next purchase.</p>
						<a href="<?php echo get_option('home'); ?>/my-account" class="btn btn-primary btn-lg">Register Now</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php
	do_action( 'woocommerce_after_customer_login_form' );
	return ob_get_clean();
}
add_shortcode( 'wc_login_register', 'ace_wc_login_register' );






/**
 * Redirect to login/register pre-checkout.
 *
 * Redirect guest users to login/register before completing a order.
 */
function ace_redirect_pre_checkout() {
	if ( ! function_exists( 'wc' ) ) return;
	$redirect_page_id = 114;
	if ( ! is_user_logged_in() && is_checkout() ) {
		wp_safe_redirect( get_permalink( $redirect_page_id ) );
		die;
	} elseif ( is_user_logged_in() && is_page( $redirect_page_id ) ) {
		wp_safe_redirect( get_permalink( wc_get_page_id( 'checkout' ) ) );
		die;
	}
}
add_action( 'template_redirect', 'ace_redirect_pre_checkout' );





//remove checkout fields
add_filter( 'woocommerce_checkout_fields', 'fleurdelis_remove_fields', 9999 );
 
function fleurdelis_remove_fields( $woo_checkout_fields_array ) {
 
	// she wanted me to leave these fields in checkout
	// unset( $woo_checkout_fields_array['billing']['billing_first_name'] );
	// unset( $woo_checkout_fields_array['billing']['billing_last_name'] );
	// unset( $woo_checkout_fields_array['billing']['billing_phone'] );
	 unset( $woo_checkout_fields_array['billing']['billing_email'] );
	// unset( $woo_checkout_fields_array['order']['order_comments'] ); // remove order notes
 
	// and to remove the billing fields below
	unset( $woo_checkout_fields_array['billing']['billing_company'] ); // remove company field
	//unset( $woo_checkout_fields_array['billing']['billing_country'] );
	//unset( $woo_checkout_fields_array['billing']['billing_address_1'] );
	//unset( $woo_checkout_fields_array['billing']['billing_address_2'] );
	//unset( $woo_checkout_fields_array['billing']['billing_city'] );
	unset( $woo_checkout_fields_array['billing']['billing_state'] ); // remove state field
	unset( $woo_checkout_fields_array['billing']['billing_postcode'] ); // remove zip code field

	unset( $woo_checkout_fields_array['shipping']['shipping_last_name'] );
	unset( $woo_checkout_fields_array['shipping']['shipping_company'] );
	unset( $woo_checkout_fields_array['shipping']['shipping_country'] );
	unset( $woo_checkout_fields_array['shipping']['shipping_address_1'] );
	//unset( $woo_checkout_fields_array['shipping']['shipping_address_2'] );
	unset( $woo_checkout_fields_array['shipping']['shipping_city'] );
	unset( $woo_checkout_fields_array['shipping']['shipping_state'] );
	unset( $woo_checkout_fields_array['shipping']['shipping_postcode'] ); 
	return $woo_checkout_fields_array;
}


// Hook in
add_filter( 'woocommerce_checkout_fields' , 'my_override_checkout_fields' );

// Our hooked in function - $fields is passed via the filter!
function my_override_checkout_fields( $fields ) {
     $fields['billing']['billing_first_name']['placeholder'] = 'First Name';
     $fields['billing']['billing_last_name']['placeholder'] = 'Last Name';
     $fields['billing']['billing_address_1']['placeholder'] = 'Address Lane 1';
     $fields['billing']['billing_address_2']['placeholder'] = 'Address Lane 2';
     $fields['billing']['billing_city']['placeholder'] = 'Emirate';
     $fields['billing']['billing_phone']['placeholder'] = 'Phone';
     $fields['shipping']['shipping_address_1']['placeholder'] = 'Personal Message (Optional)';
     return $fields;
}




//moving & reordering checkout fields
// REORDERING CHECKOUT BILLING FIELDS (WOOCOMMERCE 3+)
add_filter( "woocommerce_checkout_fields", "reordering_checkout_fields", 15, 1 );
function reordering_checkout_fields( $fields ) {

    ## ---- 1. REORDERING BILLING FIELDS ---- ##

    // Set the order of the fields
    $billing_order = array(
        'billing_first_name',
        'billing_last_name',
        'billing_address_1',
        'billing_address_2',        
        'billing_city',
        'billing_country',
        'billing_phone',
    );

    $count = 0;
    $priority = 10;

    // Updating the 'priority' argument
    foreach($billing_order as $field_name){
        $count++;
        $fields['billing'][$field_name]['priority'] = $count * $priority;
    }

    ## ---- 2. CHANGING SOME CLASSES FOR BILLING FIELDS ---- ##

    $fields['billing']['billing_email']['class'] = array('form-row-first');
    $fields['billing']['billing_phone']['class'] = array('form-row-last');

    $fields['billing']['billing_postcode']['class'] = array('form-row-first');
    $fields['billing']['billing_city']['class'] = array('form-row-last');

    ## ---- RETURN THE BILLING FIELDS CUSTOMIZED ---- ##

    return $fields;
}




//enabling SVG
function add_file_types_to_uploads($file_types){
$new_filetypes = array();
$new_filetypes['svg'] = 'image/svg+xml';
$file_types = array_merge($file_types, $new_filetypes );
return $file_types;
}
add_filter('upload_mimes', 'add_file_types_to_uploads');
