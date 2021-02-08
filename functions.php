<?php

//include files
require_once 'inc/custom-post-types.php';

function register_my_menu()
{
	register_nav_menu('header-menu', __('Header Menu'));
}
add_action('init', 'register_my_menu');

/**
 * Register and Enqueue Styles.
 */
function lidit_register_styles()
{

	$theme_version = wp_get_theme()->get('Version');

	// Add CSS.
	wp_enqueue_style('theme-style', get_stylesheet_uri(), array(), $theme_version);
	wp_enqueue_style('bootstrap-style', get_template_directory_uri() . '/assets/css/bootstrap.min.css', null, $theme_version);
	//wp_enqueue_style('fontawesome-style', get_template_directory_uri() . '/assets/css/font-awesome.css', null, $theme_version);
	wp_enqueue_style('maincss-style', get_template_directory_uri() . '/assets/css/style.css', null, $theme_version);
}

add_action('wp_enqueue_scripts', 'lidit_register_styles'); /* hook to add the style */

/**
 * Register and Enqueue Scripts.
 */
function lidit_register_scripts()
{

	$theme_version = wp_get_theme()->get('Version');
	wp_enqueue_script('theme-jquery', get_template_directory_uri() . '/assets/js/jquery.js', array(), $theme_version, true);
	//wp_enqueue_script('theme-slimjquery', 'https://code.jquery.com/jquery-3.5.1.slim.min.js', array(), $theme_version, true);
	wp_enqueue_script('theme-popperjquery', 'https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js', array(), $theme_version, true);
	wp_enqueue_script('bootstrap-jquery', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array(), $theme_version, true);
	wp_enqueue_script('fontawesome-script', 'https://kit.fontawesome.com/009dd4af3a.js', array(), $theme_version, false);
	wp_enqueue_script('theme-js', get_template_directory_uri() . '/assets/js/script.js', array(), $theme_version, true);

	wp_script_add_data('theme-js', 'async', true);
}

add_action('wp_enqueue_scripts', 'lidit_register_scripts');

/*
 * Let WordPress manage the document title.
 * By adding theme support, we declare that this theme does not use a
 * hard-coded <title> tag in the document head, and expect WordPress to
 * provide it for us.
 */
add_theme_support('title-tag');

/* This feature enables Post Thumbnails support for a theme. */
add_theme_support('post-thumbnails');

/*Add Widgets to WordPress Theme’s Footer and Sidebar */
register_sidebar(array(
	'name' => 'Footer Sidebar 1',
	'id' => 'footer-sidebar-1',
	'description' => 'Appears in the footer area',
	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
	'after_widget' => '</aside>',
	'before_title' => '<h4 class="widget-title">',
	'after_title' => '</h4>',
));
register_sidebar(array(
	'name' => 'Footer Sidebar 2',
	'id' => 'footer-sidebar-2',
	'description' => 'Appears in the footer area',
	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
	'after_widget' => '</aside>',
	'before_title' => '<h4 class="widget-title">',
	'after_title' => '</h4>',
));
register_sidebar(array(
	'name' => 'Footer Sidebar 3',
	'id' => 'footer-sidebar-3',
	'description' => 'Appears in the footer area',
	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
	'after_widget' => '</aside>',
	'before_title' => '<h4 class="widget-title">',
	'after_title' => '</h4>',
));
/* sidebar */
register_sidebar(array(
	'name' => 'Right Sidebar',
	'id' => 'right-sidebar',
	'description' => 'Appears in the right sideber',
	'before_widget' => '<ul id="%1$s" class="widget %2$s"><li>',
	'after_widget' => '</li></ul>',
	'before_title' => '<h4 class="widget-title">',
	'after_title' => '</h4>',
));

/* sidebar */
register_sidebar(array(
	'name' => 'Service Sidebar',
	'id' => 'service-sidebar',
	'description' => 'Appears in the right sideber of Service page',
	'before_widget' => '<ul id="%1$s" class="widget %2$s"><li>',
	'after_widget' => '</li></ul>',
	'before_title' => '<h4 class="widget-title">',
	'after_title' => '</h4>',
));

/* Remove “Category:”, “Tag:”, “Author:” from the_archive_title */
function custom_get_the_archive_title()
{
	//add_filter('get_the_archive_title', function ($title) {
	if (is_category()) {
		$title = single_cat_title('', false);
	} elseif (is_tag()) {
		$title = single_tag_title('', false);
	} elseif (is_author()) {
		$title = '<span class="vcard">' . get_the_author() . '</span>';
	} elseif (is_tax()) { //for custom post types
		$title = sprintf(__('%1$s'), single_term_title('', false));
	} elseif (is_post_type_archive()) {
		$title = post_type_archive_title('', false);
	} elseif (is_search()) {
		$title = "Sökresultat för: " . get_search_query();
	} else {
		$title = "Blogg";
	}
	return $title;
	//});
}

/*
 ** pagination
 ** How to Add Numeric Pagination in Your WordPress Theme
 ** https://www.wpbeginner.com/wp-themes/how-to-add-numeric-pagination-in-your-wordpress-theme/
 */
function wp_numeric_posts_nav()
{

	if (is_singular()) {
		return;
	}

	global $wp_query;

	/** Stop execution if there's only 1 page */
	if ($wp_query->max_num_pages <= 1) {
		return;
	}

	$paged = get_query_var('paged') ? absint(get_query_var('paged')) : 1;
	$max = intval($wp_query->max_num_pages);

	/** Add current page to the array */
	if ($paged >= 1) {
		$links[] = $paged;
	}

	/** Add the pages around the current page to the array */
	if ($paged >= 3) {
		$links[] = $paged - 1;
		$links[] = $paged - 2;
	}

	if (($paged + 2) <= $max) {
		$links[] = $paged + 2;
		$links[] = $paged + 1;
	}

	echo '<nav class="Page navigation"><h2 class="screen-reader-text">Inläggsnavigering</h2>' . "\n" . '<ul class="pagination">';

	/** Previous Post Link */
	if (get_previous_posts_link()) {
		printf('<li class="page-item">%s</li>' . "\n", get_previous_posts_link('Föregående'));
	}

	/** Link to first page, plus ellipses if necessary */
	if (!in_array(1, $links)) {
		$class = 1 == $paged ? ' class="page-numbers page-item active"' : 'class="page-item"';

		printf('<li %s ><a  class="page-link" href="%s">%s</a></li>' . "\n", $class, esc_url(get_pagenum_link(1)), '1');

		if (!in_array(2, $links)) {
			echo '<span>…</span>';
		}
	}

	/** Link to current page, plus 2 pages in either direction if necessary */
	sort($links);
	foreach ((array) $links as $link) {
		$class = $paged == $link ? ' class="page-numbers page-item active"' : 'class="page-item"';
		printf('<li %s ><a  class="page-link" href="%s">%s</a></li>' . "\n", $class, esc_url(get_pagenum_link($link)), $link);
	}

	/** Link to last page, plus ellipses if necessary */
	if (!in_array($max, $links)) {
		if (!in_array($max - 1, $links)) {
			echo '<span>…</span>' . "\n";
		}

		$class = $paged == $max ? ' class="page-numbers page-item active"' : 'class="page-numbers"';
		printf('<li %s ><a  class="page-link" href="%s">%s</a></li>' . "\n", $class, esc_url(get_pagenum_link($max)), $max);
	}

	/** Next Post Link */
	if (get_next_posts_link()) {
		printf('<li class="page-item">%s</li>' . "\n", get_next_posts_link('Nästa'));
	}

	echo '</ul></nav>' . "\n";
}

/*
 ** Add class to links generated by next_posts_link and previous_posts_link
 ** https://css-tricks.com/snippets/wordpress/add-class-to-links-generated-by-next_posts_link-and-previous_posts_link/
 */
add_filter('next_posts_link_attributes', 'posts_link_attributes');
add_filter('previous_posts_link_attributes', 'posts_link_attributes');

function posts_link_attributes()
{
	return 'class="prev page-numbers page-link"';
}

/**
 * Generate breadcrumbs
 */
function get_breadcrumb()
{

	$delimiter = '&raquo;';
	$name = 'Home'; //text for the 'Home' link
	$currentBefore = '<span class="current">';
	$currentAfter = '</span>';

	if (!is_front_page() || is_paged()) {

		echo '<div id="breadcrumbs" class="mt-4">';

		global $post;
		$home = get_bloginfo('url');
		echo '<a href="' . $home . '">' . $name . '</a> ' . $delimiter . ' ';
		if (is_home()) {
			echo "Blogg";
		}

		if (is_category()) {
			global $wp_query;
			$cat_obj = $wp_query->get_queried_object();
			$thisCat = $cat_obj->term_id;
			$thisCat = get_category($thisCat);
			$parentCat = get_category($thisCat->parent);
			if ($thisCat->parent != 0) {
				echo (get_category_parents($parentCat, true, ' ' . $delimiter . ' '));
			}

			echo $currentBefore . 'Archive by category &#39;';
			single_cat_title();
			echo '&#39;' . $currentAfter;
		} elseif (is_day()) {
			echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
			echo '<a href="' . get_month_link(get_the_time('Y'), get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
			echo $currentBefore . get_the_time('d') . $currentAfter;
		} elseif (is_month()) {
			echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
			echo $currentBefore . get_the_time('F') . $currentAfter;
		} elseif (is_year()) {
			echo $currentBefore . get_the_time('Y') . $currentAfter;
		} elseif (is_single() && !is_attachment()) {
			if (is_single() && 'post' == get_post_type()) {
				$cat = get_the_category();
				$cat = $cat[0];
				echo get_category_parents($cat, true, ' ' . $delimiter . ' ');
			}

			echo $currentBefore;
			the_title();
			echo $currentAfter;
		} elseif (is_attachment()) {
			$parent = get_post($post->post_parent);
			$cat = get_the_category($parent->ID);
			$cat = $cat[0];
			echo get_category_parents($cat, true, ' ' . $delimiter . ' ');
			echo '<a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a> ' . $delimiter . ' ';
			echo $currentBefore;
			the_title();
			echo $currentAfter;
		} elseif (is_page() && !$post->post_parent) {
			echo $currentBefore;
			the_title();
			echo $currentAfter;
		} elseif (is_page() && $post->post_parent) {
			$parent_id = $post->post_parent;
			$breadcrumbs = array();
			while ($parent_id) {
				$page = get_page($parent_id);
				$breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
				$parent_id = $page->post_parent;
			}
			$breadcrumbs = array_reverse($breadcrumbs);
			foreach ($breadcrumbs as $crumb) {
				echo $crumb . ' ' . $delimiter . ' ';
			}

			echo $currentBefore;
			the_title();
			echo $currentAfter;
		} elseif (is_search()) {
			echo $currentBefore . 'Search results for &#39;' . get_search_query() . '&#39;' . $currentAfter;
		} elseif (is_tag()) {
			echo $currentBefore . 'Posts tagged &#39;';
			single_tag_title();
			echo '&#39;' . $currentAfter;
		} elseif (is_author()) {
			global $author;
			$userdata = get_userdata($author);
			echo $currentBefore . 'Articles posted by ' . $userdata->display_name . $currentAfter;
		} elseif (is_404()) {
			echo $currentBefore . 'Error 404' . $currentAfter;
		}

		if (get_query_var('paged')) {
			if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author()) {
				echo ' (';
			}

			echo __('Page') . ' ' . get_query_var('paged');
			if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author()) {
				echo ')';
			}
		}

		echo '</div>';
	}
}

/**
 * hide content section for homepage and flexiable content template
 */

add_action('admin_init', 'hide_editor');

function hide_editor()
{
	$post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'];
	if (!isset($post_id)) {
		return;
	}

	$template_file = get_post_meta($post_id, '_wp_page_template', true);

	if ($template_file == 'template-flexible_content.php' || $template_file == 'template-home-page.php') { // edit the template name
		remove_post_type_support('page', 'editor');
	}
}

/* ACF option Page  for theme setting*/
if (function_exists('acf_add_options_page')) {

	acf_add_options_page(array(
		'page_title' => 'Theme General Settings',
		'menu_title' => 'Theme Settings',
		'menu_slug' => 'theme-general-settings',
		'capability' => 'edit_posts',
		'redirect' => false,
	));

	acf_add_options_sub_page(array(
		'page_title' => 'Theme Header Settings',
		'menu_title' => 'Header',
		'parent_slug' => 'theme-general-settings',
	));

	acf_add_options_sub_page(array(
		'page_title' => 'Theme Footer Settings',
		'menu_title' => 'Footer',
		'parent_slug' => 'theme-general-settings',
	));
}

/**
 * WordPress, show admin notices, required plugins for a theme
 */

add_action('admin_notices', 'showAdminMessages');

function showAdminMessages()
{
	$plugin_messages = array();
	$aRequired_plugins = array();

	include_once ABSPATH . 'wp-admin/includes/plugin.php';

	$aRequired_plugins = array(
		array('name' => 'Advanced Custom Fields Pro', 'download' => 'http://wordpress.org/plugins/advanced-custom-fields/', 'path' => 'advanced-custom-fields-pro/acf.php'),
	);

	foreach ($aRequired_plugins as $aPlugin) {
		// Check if plugin exists
		if (!is_plugin_active($aPlugin['path'])) {
			$plugin_messages[] = '!!This theme requires you to install the <b>' . $aPlugin['name'] . '</b> plugin, download it from <a target="_blank" href="' . $aPlugin['download'] . '">here</a>.!!';
		}
	}

	if (count($plugin_messages) > 0) {
		echo '';

		foreach ($plugin_messages as $message) {
			echo ' <div style="background:red; color:#fff; padding:20px; box-sizing:border-box; max-width:90%;">' . $message . ' </div>';
		}

		echo ' ';
	}
}

/*
 *
 * Walker for the main menu
 *
 */
add_filter('walker_nav_menu_start_el', 'add_arrow', 10, 4);
function add_arrow($output, $item, $depth, $args)
{

	//Only add class to 'top level' items on the 'primary' menu.
	if ('header-menu' == $args->theme_location && $depth === 0) {
		if (in_array("menu-item-has-children", $item->classes)) {
			$output .= '<i class="sub-menu-toggle fas fa-plus"></i>';
		}
	}
	return $output;
}

/**
 * Wordpress get URL of the page which the given template is assigned to
 * https://stackoverflow.com/questions/22241959/wordpress-get-url-of-the-page-which-the-given-template-is-assigned-to
 */

function getTplPageURL($TEMPLATE_NAME){
    $url = null;
    $pages = get_pages(array(
        'meta_key' => '_wp_page_template',
        'meta_value' => $TEMPLATE_NAME
    ));
    if(isset($pages[0])) {
        $url = get_page_link($pages[0]->ID);
    }
    return $url;
}