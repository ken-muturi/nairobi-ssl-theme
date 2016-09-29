<?php
/**
 * Adds support for a custom header image.
 */
require( get_template_directory() . '/inc/util.php' );
require( get_template_directory() . '/inc/jw_custom_post_type.php' );
require( get_template_directory() . '/inc/nairobiwide_shortcodes.php' );

add_theme_support('post-thumbnails');

register_nav_menu('primary', __('Primary Menus'));

function register_theme_stylesheets()
{
	wp_enqueue_style('bootstrap', get_stylesheet_directory_uri() . '/assets/css/bootstrap.css');
	wp_enqueue_style('animate', get_stylesheet_directory_uri() . '/assets/css/animate.css');
	wp_enqueue_style('responsive', get_stylesheet_directory_uri() . '/assets/css/responsive.css');
	wp_enqueue_style('style', get_stylesheet_directory_uri() . '/style.css');
	wp_enqueue_style('font-awesome', get_stylesheet_directory_uri() . '/assets/font-awesome-4.3.0/css/font-awesome.min.css');
}
add_action('wp_enqueue_scripts','register_theme_stylesheets');

function register_theme_jquery_scripts()
{
	// Register the script like this for our theme:
	wp_deregister_script('jquery');
	wp_enqueue_script( 'jquery', get_template_directory_uri() . '/assets/js/jquery.js');
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array( 'jquery' ) );
	wp_enqueue_script( 'smoothscroll', get_template_directory_uri() . '/assets/js/smoothscroll.js', array( 'jquery' ) );
	wp_enqueue_script( 'scrollTo', get_template_directory_uri() . '/assets/js/jquery.scrollTo.min.js', array( 'jquery' ) );
	wp_enqueue_script( 'localScroll', get_template_directory_uri() . '/assets/js/jquery.localScroll.min.js', array( 'jquery' ) );
	wp_enqueue_script( 'nav', get_template_directory_uri() . '/assets/js/jquery.nav.js', array( 'jquery' ) );
	wp_enqueue_script( 'flexslider', get_template_directory_uri() . '/assets/js/jquery.flexslider-min.js', array( 'jquery' ) );
	wp_enqueue_script( 'mixitup', get_template_directory_uri() . '/assets/js/jquery.mixitup.min.js', array( 'jquery' ) );
	wp_enqueue_script( 'magnific', get_template_directory_uri() . '/assets/js/jquery.magnific-popup.js', array( 'jquery' ) );
	wp_enqueue_script( 'TimeCircles', get_template_directory_uri() . '/assets/js/TimeCircles.js', array( 'jquery' ));
	wp_enqueue_script( 'waypoints', get_template_directory_uri() . '/assets/js/waypoints.min.js', array( 'jquery' ));
	wp_enqueue_script( 'counterup', get_template_directory_uri() . '/assets/js/jquery.counterup.min.js', array( 'jquery' ));
	wp_enqueue_script( 'countdown', get_template_directory_uri() . '/assets/js/jquery.countdown.min.js', array( 'jquery' ));
	wp_enqueue_script( 'ajaxchimp', get_template_directory_uri() . '/assets/js/jquery.ajaxchimp.min.js', array( 'jquery' ));
	wp_enqueue_script( 'holder', get_template_directory_uri() . '/assets/js/holder.js', array( 'jquery' ));
	wp_enqueue_script( 'placeholder', get_template_directory_uri() . '/assets/js/jquery.placeholder.js', array( 'jquery' ));
	wp_enqueue_script( 'velocity', get_template_directory_uri() . '/assets/js/jquery.velocity.min.js', array( 'jquery' ));
	wp_enqueue_script( 'matchMedia', get_template_directory_uri() . '/assets/js/matchMedia.js', array( 'jquery' ));
	wp_enqueue_script( 'stellar', get_template_directory_uri() . '/assets/js/jquery.stellar.min.js', array( 'jquery' ));
	wp_enqueue_script( 'kenburnsy', get_template_directory_uri() . '/assets/js/jquery.kenburnsy.min.js', array( 'jquery' ));
	wp_enqueue_script( 'wow', get_template_directory_uri() . '/assets/js/wow.js', array( 'jquery' ));
	wp_enqueue_script( 'script', get_template_directory_uri() . '/assets/js/script.js', array( 'jquery' ) );
}
add_action( 'wp_enqueue_scripts', 'register_theme_jquery_scripts');

/*
---------------------------------------------------------------------------------------
	Custom Post Types
---------------------------------------------------------------------------------------
*/
$pressnews = new JW_Post_Type("sidrapressnews", array(
	'supports' => array('title', 'editor' ,'thumbnail'),
	'labels' => array(
			'name' => __('SIDRA News'),
			'singular_name' => __('SIDRA Article'),
			'all_items' => __('SIDRA News'),
	        'add_new_item' => __('Add New Article'),
	        'edit_item' => __('Edit Article'),
	        'new_item' => __('New Article'),
	        'view_item' => __('View Article'),
	        'search_items' => __('Search Articles'),
	        'not_found' => __('No articles found'),
	        'not_found_in_trash' => __('No articles found in Trash')
		),
	'menu_icon' => admin_url().'/images/media-button-image.gif',
	'taxonomies' => array('post_tag'),
	'query_var' => 'sidrapressnews'
));
$pressnews->add_taxonomy(
    'Press Category',
    array("hierarchical" => true),
    array(
        'name' => _x('Press Category', 'taxonomy general name'),
        'search_items' => __('Search Press Category'),
        'all_items' => __('All Press Categories')
    )
);
$pressnews->add_meta_box('Sidra Press News', array(
	'Release Date' => 'text',
	'Upload File' => 'file',
));

$reports = new JW_Post_Type("sidrareports", array(
	'supports' => array('title', 'editor' ,'thumbnail'),
	'labels' => array(
			'name' => __('SIDRA Reports'),
			'singular_name' => __('SIDRA Report'),
			'all_items' => __('SIDRA Reports'),
	        'add_new_item' => __('Add New Item'),
	        'edit_item' => __('Edit Item'),
	        'new_item' => __('New Item'),
	        'view_item' => __('View Item'),
	        'search_items' => __('Search Item'),
	        'not_found' => __('No items found'),
	        'not_found_in_trash' => __('No items found in Trash')
		),
	'menu_icon' => admin_url().'/images/media-button-image.gif',
	'taxonomies' => array('post_tag'),
	'query_var' => 'sidrareports'
));
$reports->add_taxonomy('Type', array("hierarchical" => true));
$reports->add_meta_box('Sidra Reports', array(
	'Release Date' => 'text',
	// 'country' => array('type' => 'checkbox', 'options' => util::countries_options() ),
	'Upload File' => 'file',
));

$gallery = new JW_Post_Type("sidragallery", array(
	'supports' => array('title', 'editor' ,'thumbnail'),
	'labels' => array(
			'name' => __('SIDRA Gallery'),
			'singular_name' => __('SIDRA Gallery Image'),
			'all_items' => __('SIDRA Gallery'),
	        'add_new_item' => __('Add New Image'),
	        'edit_item' => __('Edit Image'),
	        'new_item' => __('New Image'),
	        'view_item' => __('View Image'),
	        'search_items' => __('Search Image'),
	        'not_found' => __('No images found'),
	        'not_found_in_trash' => __('No images found in Trash')
		),
	'menu_icon' => admin_url().'/images/media-button-image.gif',
	'taxonomies' => array('post_tag'),
	'query_var' => 'sidragallery'
));
$gallery->add_taxonomy('Type', array("hierarchical" => true));

/**
 * Register our sidebars and widgetized areas.
 *
 */
function register_this_theme_widgets()
{
	register_sidebar( array(
		'name' => 'Theme Footer Widget',
		'id' => 'theme_footer_widget',
		'before_widget' => '',
        'after_widget' => '',
		'before_title' => '<h6>',
		'after_title' => '</h6>',
	) );

	register_sidebar( array(
		'name' => 'Contact Information Widget',
		'id' => 'theme_contact_info_widget',
		'before_widget' => '',
        'after_widget' => '',
		'before_title' => '<h6>',
		'after_title' => '</h6>',
	) );

	register_sidebar( array(
		'name' => 'Theme Sidebar Widget',
		'id' => 'theme_sidebar_widget',
		'before_widget' => '',
        'after_widget' => '',
		'before_title' => '<h6 class="title-divider">',
		'after_title' => '<span></span></h6>',
	) );

	register_sidebar( array(
		'name' => 'Theme Search Widget',
		'id' => 'theme_search_widget',
		'before_widget' => ' <div class="input-append">',
        'after_widget' => '</div>',
		'before_title' => '<h6 class="title-divider">',
		'after_title' => '<span></span></h6>',
	) );

	register_sidebar( array(
		'name' => 'Home page right',
		'id' => 'theme_home_page_right',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '',
		'after_title' => ''
	) );
}
add_action( 'widgets_init', 'register_this_theme_widgets' );


add_filter('request', 'this_theme_feed_request');
function this_theme_feed_request($feeds)
{
	if (isset($feeds['feed']))
	{
		$feeds['post_type'] = get_post_types();
	}
	return $feeds;
}

/**
 * Attach a class to linked images' parent anchors
 * e.g. a img => a.img img
 */
add_filter('the_content','give_linked_images_class');
function give_linked_images_class($html)
{
	$classes = ' pull-right quote_sections_img '; // separated by spaces, e.g. 'img image-link'
	$rel = 'rel="prettyPhoto"';
	// check if there are already classes assigned to the anchor
	if ( preg_match('#<img.*? class=.+?>#', $html) )
	{
		$html = preg_replace('#(<img.+)(class\=[\".+\"|\'.+\'])(.*>)#', '$1 class="' . $classes .'$3', $html);
	}
	else
	{
		$html = preg_replace('#(<img.*?)>#', '$1 class="' . $classes .'" '. $rel.' >', $html);
	}
	return $html;
}

add_filter('the_content','style_youtube_vedios');
function style_youtube_vedios($html)
{
	$classes = ' pull-right '; // separated by spaces, e.g. 'img image-link'
	// check if there are already classes assigned to the anchor
	if ( preg_match('#<p><iframe.+></p>#', $html) )
	{
		$html = preg_replace('#<p>(<iframe.*?)></p>#', '$1 class="' . $classes.'">', $html);
	}
	return $html;
}

// add_filter( 'excerpt_more', 'this_theme_excerpt_more' );
// function this_theme_excerpt_more( $more )
// {
// 	return '&nbsp;&nbsp; <a class="more-link" href="'. get_permalink( get_the_ID() ) . '"> ...continue reading &rarr;</a>';
// }

add_filter( 'excerpt_length', 'this_theme_excerpt_length', 999);
function this_theme_excerpt_length( $length = null )
{
	return (is_front_page()) ? 30 : 50;
}

add_filter( 'pre_get_posts', 'this_theme_add_custom_types' );
function this_theme_add_custom_types( $query )
{
    if( is_tag() )
    {
        // this gets all post types:
        $post_types = get_post_types();

        // alternately, you can add just specific post types using this line instead of the above:
        // $post_types = array( 'post', 'your_custom_type' );
        $query->set( 'post_type', $post_types );
        return $query;
    }
}

function login_styles()
{
	echo '<style type="text/css"> h1 a { background:#fbfbfb url('. get_template_directory_uri().'/images/logo.png) !important ;  width: 203px !important; height: 106px;  }</style>';
}
add_action('login_head', 'login_styles');

// function remove_menus ()
// {
// 	global $menu;
// 	$restricted = ! WP_DEBUG ?  array( __('Links') ) : array(__('Tools'), __('Plugins'), __('Settings'), __('Appearance'), __('Posts'), __('Links'));
// 	end ($menu);
// 	while (prev($menu))
// 	{
// 		$value = explode(' ', $menu[key($menu)][0]);
// 		if(in_array($value[0] != NULL ? $value[0]:"" , $restricted)){ unset($menu[key($menu)]); }
// 	}
// }
// add_action('admin_menu', 'remove_menus');

// function disable_default_dashboard_widgets()
// {
// 	remove_meta_box('dashboard_right_now', 'dashboard', 'core');
// 	remove_meta_box('dashboard_recent_comments', 'dashboard', 'core');
// 	remove_meta_box('dashboard_incoming_links', 'dashboard', 'core');
// 	remove_meta_box('dashboard_plugins', 'dashboard', 'core');
// 	remove_meta_box('dashboard_quick_press', 'dashboard', 'core');
// 	//remove_meta_box('dashboard_recent_drafts', 'dashboard', 'core');
// 	remove_meta_box('dashboard_primary', 'dashboard', 'core');
// 	remove_meta_box('dashboard_secondary', 'dashboard', 'core');
// }
// add_action('admin_menu', 'disable_default_dashboard_widgets');

/**
 * Displays navigation to next/previous pages when applicable.
 */
function this_theme_content_nav( $html_id )
{
	global $wp_query;

	$html_id = esc_attr( $html_id );

	if ( $wp_query->max_num_pages > 1 )
	{ ?>
		<nav id="<?php echo $html_id; ?>" class="navigation" role="navigation">
			<div class="nav-previous"><?php  get_next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts') ); ?></div>
			<div class="nav-next"><?php  get_previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>' ) ); ?></div>
		</nav><!-- #<?php echo $html_id; ?> .navigation -->
	<?php
	}
}
