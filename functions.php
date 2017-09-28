<?php
/**
 * Wildenstein functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link http://codex.wordpress.org/Theme_Development
 * @link http://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * @link http://codex.wordpress.org/Plugin_API
 *
 * @package WordPress
 * @subpackage wildenstein
 * @since Wildenstein 1.0
 */

/**
 * Set up the content width value based on the theme's design.
 *
 * @see twentyfourteen_content_width()
 *
 * @since Wildenstein 1.0
 */

 if ( ! isset( $content_width ) ) {
	$content_width = 474;
}
/**
 * Wildenstein only works in WordPress 3.6 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '3.6', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
}
if ( ! function_exists( 'twentyfourteen_setup' ) ) :
/**
 * Wildenstein setup.
 *
 * Set up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support post thumbnails.
 *
 * @since Wildenstein 1.0
 */
function twentyfourteen_setup() {
	/*
	 * Make Wildenstein available for translation.
	 *
	 * Translations can be added to the /languages/ directory.
	 * If you're building a theme based on Wildenstein, use a find and
	 * replace to change 'twentyfourteen' to the name of your theme in all
	 * template files.
	 */
	load_theme_textdomain( 'twentyfourteen', get_template_directory() . '/languages' );
	// This theme styles the visual editor to resemble the theme style.
	add_editor_style( array( 'css/editor-style.css', twentyfourteen_font_url(), 'genericons/genericons.css' ) );
	// Add RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );
	// Enable support for Post Thumbnails, and declare two sizes.
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 672, 372, true );
	add_image_size( 'twentyfourteen-full-width', 1038, 576, true );
	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary'   => __( 'Top primary menu', 'twentyfourteen' ),
		'secondary' => __( 'Secondary menu in left sidebar', 'twentyfourteen' ),
	) );
	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );
	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'audio', 'quote', 'link', 'gallery',
	) );
	// This theme allows users to set a custom background.
	add_theme_support( 'custom-background', apply_filters( 'twentyfourteen_custom_background_args', array(
		'default-color' => 'f5f5f5',
	) ) );
	// Add support for featured content.
	add_theme_support( 'featured-content', array(
		'featured_content_filter' => 'twentyfourteen_get_featured_posts',
		'max_posts' => 6,
	) );
	// This theme uses its own gallery styles.
	add_filter( 'use_default_gallery_style', '__return_false' );
}
endif; // twentyfourteen_setup
add_action( 'after_setup_theme', 'twentyfourteen_setup' );
/**
 * Adjust content_width value for image attachment template.
 *
 * @since Wildenstein 1.0
 */
function twentyfourteen_content_width() {
	if ( is_attachment() && wp_attachment_is_image() ) {
		$GLOBALS['content_width'] = 810;
	}
}
add_action( 'template_redirect', 'twentyfourteen_content_width' );
/**
 * Getter function for Featured Content Plugin.
 *
 * @since Wildenstein 1.0
 *
 * @return array An array of WP_Post objects.
 */
function twentyfourteen_get_featured_posts() {
	/**
	 * Filter the featured posts to return in Wildenstein.
	 *
	 * @since Wildenstein 1.0
	 *
	 * @param array|bool $posts Array of featured posts, otherwise false.
	 */
	return apply_filters( 'twentyfourteen_get_featured_posts', array() );
}
/**
 * A helper conditional function that returns a boolean value.
 *
 * @since Wildenstein 1.0
 *
 * @return bool Whether there are featured posts.
 */
function twentyfourteen_has_featured_posts() {
	return ! is_paged() && (bool) twentyfourteen_get_featured_posts();
}
/**
 * Register three Wildenstein widget areas.
 *
 * @since Wildenstein 1.0
 */
function twentyfourteen_widgets_init() {
	require get_template_directory() . '/inc/widgets.php';
	register_widget( 'wildenstein_Ephemera_Widget' );
	register_sidebar( array(
		'name'          => __( 'Primary Sidebar', 'twentyfourteen' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Main sidebar that appears on the left.', 'twentyfourteen' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	register_sidebar( array(
		'name'          => __( 'Content Sidebar', 'twentyfourteen' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Additional sidebar that appears on the right.', 'twentyfourteen' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Widget Area', 'twentyfourteen' ),
		'id'            => 'sidebar-3',
		'description'   => __( 'Appears in the footer section of the site.', 'twentyfourteen' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'twentyfourteen_widgets_init' );
/**
 * Register Lato Google font for Wildenstein.
 *
 * @since Wildenstein 1.0
 *
 * @return string
 */
function twentyfourteen_font_url() {
	$font_url = '';
	/*
	 * Translators: If there are characters in your language that are not supported
	 * by Lato, translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'Lato font: on or off', 'twentyfourteen' ) ) {
		$font_url = add_query_arg( 'family', urlencode( 'Lato:300,400,700,900,300italic,400italic,700italic' ), "//fonts.googleapis.com/css" );
	}
	return $font_url;
}
/**
 * Enqueue scripts and styles for the front end.
 *
 * @since Wildenstein 1.0
 */
function twentyfourteen_scripts() {
	// Add Lato font, used in the main stylesheet.
	wp_enqueue_style( 'twentyfourteen-lato', twentyfourteen_font_url(), array(), null );
	// Add Genericons font, used in the main stylesheet.
	wp_enqueue_style( 'genericons', get_template_directory_uri() . '/genericons/genericons.css', array(), '3.0.3' );
	// Load our main stylesheet.
	wp_enqueue_style( 'twentyfourteen-style', get_stylesheet_uri(), array( 'genericons' ) );
	// Load the Internet Explorer specific stylesheet.
	wp_enqueue_style( 'twentyfourteen-ie', get_template_directory_uri() . '/css/ie.css', array( 'twentyfourteen-style', 'genericons' ), '20131205' );
	wp_style_add_data( 'twentyfourteen-ie', 'conditional', 'lt IE 9' );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'twentyfourteen-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20130402' );
	}
	if ( is_active_sidebar( 'sidebar-3' ) ) {
		wp_enqueue_script( 'jquery-masonry' );
	}
	if ( is_front_page() && 'slider' == get_theme_mod( 'featured_content_layout' ) ) {
		wp_enqueue_script( 'twentyfourteen-slider', get_template_directory_uri() . '/js/slider.js', array( 'jquery' ), '20131205', true );
		wp_localize_script( 'twentyfourteen-slider', 'featuredSliderDefaults', array(
			'prevText' => __( 'Previous', 'twentyfourteen' ),
			'nextText' => __( 'Next', 'twentyfourteen' )
		) );
	}
	wp_enqueue_script( 'twentyfourteen-script', get_template_directory_uri() . '/js/functions.js', array( 'jquery' ), '20140616', true );
}
add_action( 'wp_enqueue_scripts', 'twentyfourteen_scripts' );
/**
 * Enqueue Google fonts style to admin screen for custom header display.
 *
 * @since Wildenstein 1.0
 */
function twentyfourteen_admin_fonts() {
	wp_enqueue_style( 'twentyfourteen-lato', twentyfourteen_font_url(), array(), null );
}
add_action( 'admin_print_scripts-appearance_page_custom-header', 'twentyfourteen_admin_fonts' );
if ( ! function_exists( 'twentyfourteen_the_attached_image' ) ) :
/**
 * Print the attached image with a link to the next attached image.
 *
 * @since Wildenstein 1.0
 */
function twentyfourteen_the_attached_image() {
	$post                = get_post();
	/**
	 * Filter the default Wildenstein attachment size.
	 *
	 * @since Wildenstein 1.0
	 *
	 * @param array $dimensions {
	 *     An array of height and width dimensions.
	 *
	 *     @type int $height Height of the image in pixels. Default 810.
	 *     @type int $width  Width of the image in pixels. Default 810.
	 * }
	 */
	$attachment_size     = apply_filters( 'twentyfourteen_attachment_size', array( 810, 810 ) );
	$next_attachment_url = wp_get_attachment_url();
	/*
	 * Grab the IDs of all the image attachments in a gallery so we can get the URL
	 * of the next adjacent image in a gallery, or the first image (if we're
	 * looking at the last image in a gallery), or, in a gallery of one, just the
	 * link to that image file.
	 */
	$attachment_ids = get_posts( array(
		'post_parent'    => $post->post_parent,
		'fields'         => 'ids',
		'numberposts'    => -1,
		'post_status'    => 'inherit',
		'post_type'      => 'attachment',
		'post_mime_type' => 'image',
		'order'          => 'ASC',
		'orderby'        => 'menu_order ID',
	) );
	// If there is more than 1 attachment in a gallery...
	if ( count( $attachment_ids ) > 1 ) {
		foreach ( $attachment_ids as $attachment_id ) {
			if ( $attachment_id == $post->ID ) {
				$next_id = current( $attachment_ids );
				break;
			}
		}
		// get the URL of the next image attachment...
		if ( $next_id ) {
			$next_attachment_url = get_attachment_link( $next_id );
		}
		// or get the URL of the first image attachment.
		else {
			$next_attachment_url = get_attachment_link( array_shift( $attachment_ids ) );
		}
	}
	printf( '<a href="%1$s" rel="attachment">%2$s</a>',
		esc_url( $next_attachment_url ),
		wp_get_attachment_image( $post->ID, $attachment_size )
	);
}
endif;
if ( ! function_exists( 'twentyfourteen_list_authors' ) ) :
/**
 * Print a list of all site contributors who published at least one post.
 *
 * @since Wildenstein 1.0
 */
function twentyfourteen_list_authors() {
	$contributor_ids = get_users( array(
		'fields'  => 'ID',
		'orderby' => 'post_count',
		'order'   => 'DESC',
		'who'     => 'authors',
	) );
	foreach ( $contributor_ids as $contributor_id ) :
		$post_count = count_user_posts( $contributor_id );
		// Move on if user has not published a post (yet).
		if ( ! $post_count ) {
			continue;
		}
	?>

	<div class="contributor">
		<div class="contributor-info">
			<div class="contributor-avatar"><?php echo get_avatar( $contributor_id, 132 ); ?></div>
			<div class="contributor-summary">
				<h2 class="contributor-name"><?php echo get_the_author_meta( 'display_name', $contributor_id ); ?></h2>
				<p class="contributor-bio">
					<?php echo get_the_author_meta( 'description', $contributor_id ); ?>
				</p>
				<a class="button contributor-posts-link" href="<?php echo esc_url( get_author_posts_url( $contributor_id ) ); ?>">
					<?php printf( _n( '%d Article', '%d Articles', $post_count, 'twentyfourteen' ), $post_count ); ?>
				</a>
			</div><!-- .contributor-summary -->
		</div><!-- .contributor-info -->
	</div><!-- .contributor -->

	<?php
	endforeach;
}
endif;
/**
 * Extend the default WordPress body classes.
 *
 * Adds body classes to denote:
 * 1. Single or multiple authors.
 * 2. Presence of header image except in Multisite signup and activate pages.
 * 3. Index views.
 * 4. Full-width content layout.
 * 5. Presence of footer widgets.
 * 6. Single views.
 * 7. Featured content layout.
 *
 * @since Wildenstein 1.0
 *
 * @param array $classes A list of existing body class values.
 * @return array The filtered body class list.
 */
function twentyfourteen_body_classes( $classes ) {
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}
	if ( get_header_image() ) {
		$classes[] = 'header-image';
	} elseif ( ! in_array( $GLOBALS['pagenow'], array( 'wp-activate.php', 'wp-signup.php' ) ) ) {
		$classes[] = 'masthead-fixed';
	}
	if ( is_archive() || is_search() || is_home() ) {
		$classes[] = 'list-view';
	}
	if ( ( ! is_active_sidebar( 'sidebar-2' ) )
		|| is_page_template( 'page-templates/full-width.php' )
		|| is_page_template( 'page-templates/contributors.php' )
		|| is_attachment() ) {
		$classes[] = 'full-width';
	}
	if ( is_active_sidebar( 'sidebar-3' ) ) {
		$classes[] = 'footer-widgets';
	}
	if ( is_singular() && ! is_front_page() ) {
		$classes[] = 'singular';
	}
	if ( is_front_page() && 'slider' == get_theme_mod( 'featured_content_layout' ) ) {
		$classes[] = 'slider';
	} elseif ( is_front_page() ) {
		$classes[] = 'grid';
	}
	return $classes;
}
add_filter( 'body_class', 'twentyfourteen_body_classes' );
/**
 * Extend the default WordPress post classes.
 *
 * Adds a post class to denote:
 * Non-password protected page with a post thumbnail.
 *
 * @since Wildenstein 1.0
 *
 * @param array $classes A list of existing post class values.
 * @return array The filtered post class list.
 */
function twentyfourteen_post_classes( $classes ) {
	if ( ! post_password_required() && ! is_attachment() && has_post_thumbnail() ) {
		$classes[] = 'has-post-thumbnail';
	}
	return $classes;
}
add_filter( 'post_class', 'twentyfourteen_post_classes' );
/**
 * Create a nicely formatted and more specific title element text for output
 * in head of document, based on current view.
 *
 * @since Wildenstein 1.0
 *
 * @global int $paged WordPress archive pagination page count.
 * @global int $page  WordPress paginated post page count.
 *
 * @param string $title Default title text for current view.
 * @param string $sep Optional separator.
 * @return string The filtered title.
 */
function twentyfourteen_wp_title( $title, $sep ) {
	global $paged, $page;
	if ( is_feed() ) {
		return $title;
	}
	// Add the site name.
	$title .= get_bloginfo( 'name', 'display' );
	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) ) {
		$title = "$title $sep $site_description";
	}
	// Add a page number if necessary.
	if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {
		$title = "$title $sep " . sprintf( __( 'Page %s', 'twentyfourteen' ), max( $paged, $page ) );
	}
	return $title;
}
add_filter( 'wp_title', 'twentyfourteen_wp_title', 10, 2 );
// Implement Custom Header features.
require get_template_directory() . '/inc/custom-header.php';
// Custom template tags for this theme.
require get_template_directory() . '/inc/template-tags.php';
// Add Theme Customizer functionality.
require get_template_directory() . '/inc/customizer.php';
/*
 * Add Featured Content functionality.
 *
 * To overwrite in a plugin, define your own Featured_Content class on or
 * before the 'setup_theme' hook.
 */
if ( ! class_exists( 'Featured_Content' ) && 'plugins.php' !== $GLOBALS['pagenow'] ) {
	require get_template_directory() . '/inc/featured-content.php';
}

/*
 * wii - Add a Global Settings page for address, phone, fax, and 'Work With Us' content sections
 *
 * All the API functions can be used with the “Options Page’s” fields.
 * However, a second parameter is required to target the options page.
 * This is similar to passing through a $post_id to target a specific post object.
 * This example demonstrates how to load a value from an options page.
 * the_field('header_title', 'option');
 *
 */
 if(function_exists('acf_add_options_page')) {
	acf_add_options_page([
		'page_title'	=> 'Global Settings',
		'menu_title' 	=> 'Global Settings',
		'menu_slug'		=> 'global-settings',
	]);
}

/**
 * 
 *
 * ---------------  BEGIN CUSTOM POST TYPE FUNCTIONS
 *
 * 
 */



// Register Custom Post Type - Artist
function artist_post_type() {
	
	$labels = array(
		'name'                => _x( 'Artist', 'Post Type General Name', 'text_domain' ),
		'singular_name'       => _x( 'Artist', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'           => __( 'Artist', 'text_domain' ),
		'parent_item_colon'   => __( 'Parent Item:', 'text_domain' ),
		'all_items'           => __( 'All Artist', 'text_domain' ),
		'view_item'           => __( 'View Post', 'text_domain' ),
		'add_new_item'        => __( 'Add New Artist', 'text_domain' ),
		'add_new'             => __( 'Add New', 'text_domain' ),
		'edit_item'           => __( 'Edit Post', 'text_domain' ),
		'update_item'         => __( 'Update Post', 'text_domain' ),
		'search_items'        => __( 'Search Projects', 'text_domain' ),
		'not_found'           => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'text_domain' ),
	);

	$args = array(
		'label'               => __( 'artist', 'text_domain' ),
		'description'         => __( 'Post Type Description', 'text_domain' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'thumbnail', 'revisions'),
		'taxonomies'          => array( 'post_tag' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 4,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
	);

	register_post_type( 'artist', $args );
}
// Hook into the 'init' action
add_action( 'init', 'artist_post_type', 0 );

/**
 * 
 *
 * ---------------  BEGIN CUSTOM TAXONOMIES FOR INDIVIDUAL POST TYPES
 *
 * 
 */


// Register Custom Taxonomy - ARTIST CATEGORIES
function artist_type() {
	
	$labels = array(
		'name'                       => _x( 'Artist Categories', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Artist Category', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Artist Categories', 'text_domain' ),
		'all_items'                  => __( 'All Items', 'text_domain' ),
		'parent_item'                => __( 'Parent Item', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Item:', 'text_domain' ),
		'new_item_name'              => __( 'Category Name', 'text_domain' ),
		'add_new_item'               => __( 'Add New Artist Category', 'text_domain' ),
		'edit_item'                  => __( 'Edit Item', 'text_domain' ),
		'update_item'                => __( 'Update Item', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
		'search_items'               => __( 'Search Items', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used items', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
	);

	$args = array(
		'labels'                    => $labels,
		'hierarchical'              => true,
		'public'                    => true,
		'show_ui'                   => true,
		'show_admin_column'         => true,
		'show_in_nav_menus'         => true,
		'show_tagcloud'             => false,
		'supports'            		=> array( 'title', 'excerpt', 'thumbnail', 'revisions', 'editor', 'custom-fields' ),
		'rewrite'           		=> array( 'slug' => 'artist_type' ),
	);
	register_taxonomy( 'taxonomy', array( 'artist' ), $args );
	
}
// Hook into the 'init' action
add_action( 'init', 'artist_type', 0 );
	

// Register Custom Post Type - Notable Works
function notableworks_post_type() {	
	$labels = array(
		'name'                => _x( 'Notable Works', 'Post Type General Name', 'text_domain' ),
		'singular_name'       => _x( 'Notable Works', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'           => __( 'Notable Works', 'text_domain' ),
		'parent_item_colon'   => __( 'Parent Item:', 'text_domain' ),
		'all_items'           => __( 'All Notable Works', 'text_domain' ),
		'view_item'           => __( 'View Post', 'text_domain' ),
		'add_new_item'        => __( 'Add New Notable Works', 'text_domain' ),
		'add_new'             => __( 'Add New', 'text_domain' ),
		'edit_item'           => __( 'Edit Post', 'text_domain' ),
		'update_item'         => __( 'Update Post', 'text_domain' ),
		'search_items'        => __( 'Search Projects', 'text_domain' ),
		'not_found'           => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'text_domain' ),
	);

	$args = array(
		'label'               => __( 'notableworks', 'text_domain' ),
		'description'         => __( 'Post Type Description', 'text_domain' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'thumbnail', 'revisions'),
		'taxonomies'          => array( 'post_tag' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 4,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
	);
	register_post_type('notableworks', $args);
}
// Hook into the 'init' action
add_action( 'init', 'notableworks_post_type', 0);
	

// Register Custom Post Type - Publications
function publications_post_type() {
	
	$labels = array(
		'name'                => _x( 'Publications', 'Post Type General Name', 'text_domain' ),
		'singular_name'       => _x( 'Publications', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'           => __( 'Publications', 'text_domain' ),
		'parent_item_colon'   => __( 'Parent Item:', 'text_domain' ),
		'all_items'           => __( 'All Publications', 'text_domain' ),
		'view_item'           => __( 'View Post', 'text_domain' ),
		'add_new_item'        => __( 'Add New Publications', 'text_domain' ),
		'add_new'             => __( 'Add New', 'text_domain' ),
		'edit_item'           => __( 'Edit Post', 'text_domain' ),
		'update_item'         => __( 'Update Post', 'text_domain' ),
		'search_items'        => __( 'Search Projects', 'text_domain' ),
		'not_found'           => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'text_domain' ),
	);

	$args = array(
		'label'               => __( 'publications', 'text_domain' ),
		'description'         => __( 'Post Type Description', 'text_domain' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'thumbnail', 'revisions'),
		'taxonomies'          => array( 'post_tag' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 4,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
	);
	register_post_type('publications', $args);
}
// Hook into the 'init' action
add_action('init', 'publications_post_type', 0);


	// Register Custom Post Type - News
	function news_post_type() {
		
		$labels = array(
			'name'                => _x( 'News', 'Post Type General Name', 'text_domain' ),
			'singular_name'       => _x( 'News', 'Post Type Singular Name', 'text_domain' ),
			'menu_name'           => __( 'News', 'text_domain' ),
			'parent_item_colon'   => __( 'Parent Item:', 'text_domain' ),
			'all_items'           => __( 'All News', 'text_domain' ),
			'view_item'           => __( 'View Post', 'text_domain' ),
			'add_new_item'        => __( 'Add New News', 'text_domain' ),
			'add_new'             => __( 'Add New', 'text_domain' ),
			'edit_item'           => __( 'Edit Post', 'text_domain' ),
			'update_item'         => __( 'Update Post', 'text_domain' ),
			'search_items'        => __( 'Search Projects', 'text_domain' ),
			'not_found'           => __( 'Not found', 'text_domain' ),
			'not_found_in_trash'  => __( 'Not found in Trash', 'text_domain' ),
		);
		
		$args = array(
			'label'               => __( 'news', 'text_domain' ),
			'description'         => __( 'Post Type Description', 'text_domain' ),
			'labels'              => $labels,
			'supports'            => array( 'title', 'thumbnail', 'revisions', 'excerpt'),
			'taxonomies'          => array( 'post_tag' ),
			'hierarchical'        => false,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_nav_menus'   => true,
			'show_in_admin_bar'   => true,
			'menu_position'       => 4,
			'can_export'          => true,
			'has_archive'         => false,
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'capability_type'     => 'post',
		);
		
		register_post_type( 'news', $args );
		
		}
	// Hook into the 'init' action
	add_action( 'init', 'news_post_type', 0 );

	
function wildenstein_scripts() {
	wp_deregister_script('jquery');
	wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js', array(), null, false);
	wp_enqueue_script('jquery');

	// wp_enqueue_script( 'masonry', get_template_directory_uri() . '/js/masonry.min.js', array(), null, true );
	wp_enqueue_script( 'modal', get_template_directory_uri() . '/js/modal.js', array(), null, true );	
	wp_enqueue_script( 'slick', get_template_directory_uri() . '/js/slick.min.js', array(), null, true );
	wp_enqueue_script( 'main', get_template_directory_uri() . '/js/main.js', array(), null, true );
}
add_action('wp_enqueue_scripts', 'wildenstein_scripts');


/*
 * Redirect Wordpress styles to come from compiled scss stylesheet.
 */

add_action( 'wp_enqueue_scripts', 'enqueue_theme_css' );

function enqueue_theme_css()
{
    wp_enqueue_style(
        'default',
        get_template_directory_uri() . '/dist/css/styles.css'
    );
}

// Custom ALM Button Loader

function my_custom_alm_before_button() {
	if(is_page('custom-loader')){
	   return '<div id="custom-alm-loader"></div>';
	}
 }
 add_filter( 'alm_before_button', 'my_custom_alm_before_button' );

//  AJAX Load Modal

function get_post_ajax() {
	// get the id you passed in
	$id = $_POST['id'];

	// get the post data
	$post = get_post($id, 'ARRAY_A');


	// if it was successful, then let's get data
	if(!is_wp_error($post)) {

		if($post['post_type'] == 'notableworks') {
			$result = [
				'type' 			=> 'success',
				'post'			=> $post,

				// Notable Works ACF data
				'page_title'				=> get_field('page_title', $id),
				'artist_overview_text'		=> get_field('artist_overview_text', $id),
				'image' 					=> get_field('image', $id),
				'artist_name'				=> get_field('artist_name', $id),	
				'title' 					=> get_field('title', $id),
				'supporting_details' 		=> get_field('supporting_details', $id),
			];
		}

		if($post['post_type'] == 'artist') {
			$result = [
				'type' 			=> 'success',
				'post'			=> $post,

				// use the id to get the ACF data
				// add the rest of the ACF content here
				'artist_name'				=> get_field('artist_name', $id),	
				'nationality' 				=> get_field('nationality', $id),
				'date_of_birth' 			=> get_field('date_of_birth', $id),
				'date_of_death' 			=> get_field('date_of_death', $id),
				'bio'						=> get_field('bio', $id),
			];

			$i = 0;
			if(have_rows('artist_gallery', $id)) {
				while(have_rows('artist_gallery', $id)) {  
					the_row();  
					$result['artist_gallery'][$i] = [
						'image' => get_sub_field('image'),
						'title' => get_sub_field('title'),
					];
					$i++;
				}
			}
		}

		if($post['post_type'] == 'publications') {
			$result = [
				'type' 			=> 'success',
				'post'			=> $post,

				//Publications ACF data
				'page_title'					=> get_field('page_title', $id),
				'publications_overview_text'	=> get_field('publications_overview_text', $id),
				'publication_image'				=> get_field('publication_image',$id),
				'publication_date'				=> get_field('publication_date', $id),
				'publication_title'				=> get_field('publication_title', $id),
				'publication_subtitle'			=> get_field('publication_subtitle', $id),
				'publication_brief'				=> get_field('publication_brief', $id),
				'no_of_pages'					=> get_field('no_of_pages', $id),
			];
		}

	} else {
		$result['type'] = 'error';
	}

	// another option here would be to echo out all of your html
	// then you won't have to parse the response in javascript
	// and could directly assign the html to the modal
	echo json_encode($result);

	die(1);

	// var_dump($post);
}
add_action('wp_ajax_get_post_ajax', 'get_post_ajax');
 
