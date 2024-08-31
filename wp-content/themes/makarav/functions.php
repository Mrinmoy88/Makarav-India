<?php


if (!defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.0');
}

function makarav_setup()
{
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on makarav, use a find and replace
		* to change 'makarav' to the name of your theme in all the template files.
		*/
	//load_theme_textdomain('makarav', get_template_directory() . '/languages');

	// Add default posts and comments RSS feed links to head.
	//add_theme_support('automatic-feed-links');

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support('title-tag');

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support('post-thumbnails');

	// This theme uses wp_nav_menu() in one location.
	function register_my_menus() {
        register_nav_menus(
            array(
                'header-menu'    => __('Header Menu'),
                'footer-menu'    => __('Footer Menu'),
                'custom-menu'    => __('Custom Menu'),
                'footer-secondary-menu' => __('Footer Secondary Menu')  // Register a custom menu location
            )
        );
    }
    add_action('init', 'register_my_menus');
    
    
	

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);


}
add_action('after_setup_theme', 'makarav_setup');


function makarav_widgets_init()
{
	register_sidebar(
		array(
			'name'          => esc_html__('Sidebar', 'makarav'),
			'id'            => 'sidebar-1',
			'description'   => esc_html__('Add widgets here.', 'makarav'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action('widgets_init', 'makarav_widgets_init');



if(function_exists('acf_add_options_page')){
    acf_add_options_page();

    acf_add_options_page(array(
        'page_title' => 'Admin Logo Settings',
        'menu_title' => 'Admin Logo',
        'menu_slug'  => 'admin-logo-settings',
        'capability' => 'manage_options',
        'redirect'   => false

    ));
}



function add_class_to_menu_item_anchor($item_output, $item, $depth, $args) {
    // Check if the current menu item ID is 22
    if ($item->ID == 22) {
        // Add the custom class to the anchor tag
        $item_output = str_replace('<a ', '<a class="primary-btn" ', $item_output);
    }
    return $item_output;
}
add_filter('walker_nav_menu_start_el', 'add_class_to_menu_item_anchor', 10, 4);


// add_action('init', 'flush_rewrite_rules');





// Register Custom Taxonomy
function create_project_taxonomy() {
    $labels = array(
        'name' => _x('Categories', 'taxonomy general name'),
        'singular_name' => _x('Category', 'taxonomy singular name'),
        'search_items' => __('Search Categories'),
        'all_items' => __('All Categories'),
        'parent_item' => __('Parent Category'),
        'parent_item_colon' => __('Parent Category:'),
        'edit_item' => __('Edit Category'),
        'update_item' => __('Update Category'),
        'add_new_item' => __('Add New Category'),
        'new_item_name' => __('New Category Name'),
        'menu_name' => __('Categories'),
    );
}
add_action('init', 'create_project_taxonomy', 0);
// Register Custom Post Type: Projects
function projects() {
    $labels = array(
        'name' => _x('Projects', 'post type general name'),
        'singular_name' => _x('Project Item', 'post type singular name'),
        'add_new' => _x('Add New', 'project item'),
        'add_new_item' => __('Add New Project Item'),
        'edit_item' => __('Edit Project Item'),
        'new_item' => __('New Project Item'),
        'view_item' => __('View Project Item'),
        'search_items' => __('Search Project'),
        'not_found' => __('Nothing found'),
        'not_found_in_trash' => __('Nothing found in Trash'),
        'parent_item_colon' => '',
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'query_var' => true,
        'menu_icon' => 'dashicons-portfolio',
        'rewrite' => array('slug' => 'project', 'with_front' => false),
        'capability_type' => 'post',
        'hierarchical' => true,
        'menu_position' => null,
        'supports' => array('title', 'editor', 'thumbnail'),
        'taxonomies' => array('project_categories')
    );

    register_post_type('project', $args);
}
add_action('init', 'projects');

// Register Custom Taxonomy: Project Categories
function project_taxonomy() {
    $labels = array(
        'name' => _x('Project Categories', 'taxonomy general name'),
        'singular_name' => _x('Project Category', 'taxonomy singular name'),
        'search_items' => __('Search Project Categories'),
        'all_items' => __('All Project Categories'),
        'parent_item' => __('Parent Project Category'),
        'parent_item_colon' => __('Parent Project Category:'),
        'edit_item' => __('Edit Project Category'),
        'update_item' => __('Update Project Category'),
        'add_new_item' => __('Add New Project Category'),
        'new_item_name' => __('New Project Category Name'),
        'menu_name' => __('Project Categories'),
    );

    $args = array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'project-category'),
    );

    register_taxonomy('project_categories', array('project'), $args);
}
add_action('init', 'project_taxonomy');


function create_ongoing_projects_cpt() {
    $labels = array(
        'name'                  => _x('Ongoing Projects', 'Post Type General Name', 'textdomain'),
        'singular_name'         => _x('Ongoing Project', 'Post Type Singular Name', 'textdomain'),
        'menu_name'             => __('Ongoing Projects', 'textdomain'),
        'name_admin_bar'        => __('Ongoing Project', 'textdomain'),
        'archives'              => __('Project Archives', 'textdomain'),
        'attributes'            => __('Project Attributes', 'textdomain'),
        'parent_item_colon'     => __('Parent Project:', 'textdomain'),
        'all_items'             => __('All Projects', 'textdomain'),
        'add_new_item'          => __('Add New Project', 'textdomain'),
        'add_new'               => __('Add New', 'textdomain'),
        'new_item'              => __('New Project', 'textdomain'),
        'edit_item'             => __('Edit Project', 'textdomain'),
        'update_item'           => __('Update Project', 'textdomain'),
        'view_item'             => __('View Project', 'textdomain'),
        'view_items'            => __('View Projects', 'textdomain'),
        'search_items'          => __('Search Project', 'textdomain'),
        'not_found'             => __('Not found', 'textdomain'),
        'not_found_in_trash'    => __('Not found in Trash', 'textdomain'),
        'featured_image'        => __('Featured Image', 'textdomain'),
        'set_featured_image'    => __('Set featured image', 'textdomain'),
        'remove_featured_image' => __('Remove featured image', 'textdomain'),
        'use_featured_image'    => __('Use as featured image', 'textdomain'),
        'insert_into_item'      => __('Insert into project', 'textdomain'),
        'uploaded_to_this_item' => __('Uploaded to this project', 'textdomain'),
        'items_list'            => __('Projects list', 'textdomain'),
        'items_list_navigation' => __('Projects list navigation', 'textdomain'),
        'filter_items_list'     => __('Filter projects list', 'textdomain'),
    );

    $args = array(
        'label'                 => __('Ongoing Project', 'textdomain'),
        'description'           => __('Ongoing Projects Description', 'textdomain'),
        'labels'                => $labels,
        'supports'              => array('title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields',),
        'taxonomies'            => array('project_type'),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'menu_icon'             => 'dashicons-admin-tools', // Tools icon
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'post',
    );

    register_post_type('ongoing-project', $args);
}

add_action('init', 'create_ongoing_projects_cpt', 0);

function create_project_type_taxonomy() {
    $labels = array(
        'name'                       => _x('Project Types', 'Taxonomy General Name', 'textdomain'),
        'singular_name'              => _x('Project Type', 'Taxonomy Singular Name', 'textdomain'),
        'menu_name'                  => __('Project Type', 'textdomain'),
        'all_items'                  => __('All Project Types', 'textdomain'),
        'parent_item'                => __('Parent Project Type', 'textdomain'),
        'parent_item_colon'          => __('Parent Project Type:', 'textdomain'),
        'new_item_name'              => __('New Project Type Name', 'textdomain'),
        'add_new_item'               => __('Add New Project Type', 'textdomain'),
        'edit_item'                  => __('Edit Project Type', 'textdomain'),
        'update_item'                => __('Update Project Type', 'textdomain'),
        'view_item'                  => __('View Project Type', 'textdomain'),
        'separate_items_with_commas' => __('Separate project types with commas', 'textdomain'),
        'add_or_remove_items'        => __('Add or remove project types', 'textdomain'),
        'choose_from_most_used'      => __('Choose from the most used', 'textdomain'),
        'popular_items'              => __('Popular Project Types', 'textdomain'),
        'search_items'               => __('Search Project Types', 'textdomain'),
        'not_found'                  => __('Not Found', 'textdomain'),
        'no_terms'                   => __('No project types', 'textdomain'),
        'items_list'                 => __('Project types list', 'textdomain'),
        'items_list_navigation'      => __('Project types list navigation', 'textdomain'),
    );

    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
    );

    register_taxonomy('project_type', array('ongoing-project'), $args);
}

add_action('init', 'create_project_type_taxonomy', 0);







