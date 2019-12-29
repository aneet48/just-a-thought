<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

function understrap_remove_scripts() {
    wp_dequeue_style( 'understrap-styles' );
    wp_deregister_style( 'understrap-styles' );

    wp_dequeue_script( 'understrap-scripts' );
    wp_deregister_script( 'understrap-scripts' );

    // Removes the parent themes stylesheet and scripts from inc/enqueue.php
}
add_action( 'wp_enqueue_scripts', 'understrap_remove_scripts', 20 );

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {

	// Get the theme data
    $the_theme = wp_get_theme();
    wp_enqueue_style( 'owl-css', get_stylesheet_directory_uri() . '/css/owl.carousel.min.css', array(), $the_theme->get( 'Version' ) );
    wp_enqueue_style( 'child-understrap-styles', get_stylesheet_directory_uri() . '/css/child-theme.min.css', array(), $the_theme->get( 'Version' ) );
    wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', array(), $the_theme->get( 'Version' ) );
    wp_enqueue_script( 'jquery');
    wp_enqueue_script( 'child-understrap-scripts', get_stylesheet_directory_uri() . '/js/child-theme.min.js', array(), $the_theme->get( 'Version' ), true );
    wp_enqueue_script( 'plugin', get_stylesheet_directory_uri() . '/js/plugin.js', array(), $the_theme->get( 'Version' ), true );
    wp_enqueue_script( 'main', get_stylesheet_directory_uri() . '/js/main.js', array(), $the_theme->get( 'Version' ), true );
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}

function add_child_theme_textdomain() {
    load_child_theme_textdomain( 'understrap-child', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'add_child_theme_textdomain' );


function quotes_post_types()
{
    $postTypes = [
        // to create the custom taxonomy duplicate the below array and change its value accordingly
        [
            'name' => 'quotes',
            'singular_name' => 'Quote',
            'plural_name' => 'Quotes',
            'menu_name' => 'dashicons-format-quote',
            //if you want a category of the post type
            'category' => 'quotes_category',
            'category_singular' => 'Quote Category',
            'category_plural' => 'Quote Categories',
        ],
        [
            'name' => 'q_author',
            'singular_name' => 'Author',
            'plural_name' => 'Authors',
            'menu_name' => 'dashicons-buddicons-buddypress-logo',
            //if you want a category of the post type
            // 'category' => 'author_category',
            // 'category_singular' => 'author Category',
            // 'category_plural' => 'author Categories',
        ],
    ];
    foreach ($postTypes as $key => $postType) {
        register_post_type(
            $postType['name'],
            [
                'labels' => [
                    'name' => __(" {$postType['plural_name']}"),
                    'singular_name' => __("{$postType['singular_name']}"),
                    'search_items' => __("Search {$postType['plural_name']}"),
                    'all_items' => __("All {$postType['plural_name']}"),
                    'parent_item' => __("Parent {$postType['singular_name']}"),
                    'parent_item_colon' => __("Parent {$postType['singular_name']}:"),
                    'edit_item' => __("Edit {$postType['singular_name']}"),
                    'update_item' => __("Update {$postType['singular_name']}"),
                    'add_new_item' => __("Add New {$postType['singular_name']}"),
                    'new_item_name' => __("New {$postType['singular_name']} Name"),
                    'menu_name' => __("{$postType['plural_name']}"),
                ],
                'public' => true,
                'has_archive' => true,
                'rewrite' => true,
                'supports' => array(
                    'title',
                    'editor',
                    'excerpt',
                    'author',
                    'thumbnail',
                    'comments',
                    'revisions',
                    'custom-fields',
                ),
                'exclude_from_search' => false,
                'menu_icon' => $postType['menu_name'],
                'taxonomies' => array('post_tag'),
                'show_in_rest' => true,
                // 'rest_base'    => 'quotes_category',
                // 'rest_controller_class' => 'WP_REST_Terms_Controller'
            ]
        );
    }
    foreach ($postTypes as $key => $postType) {
        if ($postType['category']) {
            register_taxonomy($postType['category'], $postType['name'], array(
                // Hierarchical taxonomy (like categories)
                'hierarchical' => true,
                // This array of options controls the labels displayed in the WordPress Admin UI
                'labels' => array(
                    'name' => _x($postType['category_plural'], 'taxonomy general name'),
                    'singular_name' => _x($postType['category_singular'], 'taxonomy singular name'),
                    'search_items' => __('Search ' . $postType['category_plural']),
                    'all_items' => __('All ' . $postType['category_plural']),
                    'parent_item' => __('Parent ' . $postType['category_singular']),
                    'parent_item_colon' => __('Parent ' . $postType['category_singular']),
                    'edit_item' => __('Edit ' . $postType['category_singular']),
                    'update_item' => __('Update ' . $postType['category_singular']),
                    'add_new_item' => __('Add ' . $postType['category_singular']),
                    'new_item_name' => __('New ' . $postType['category_singular']),
                    'menu_name' => __($postType['category_plural']
                    ),
                ),
                'show_in_rest' => true,
                // Control the slugs used for this taxonomy
                'rewrite' => array(
                    'slug' => $postType['category'], // This controls the base slug that will display before each term
                    'with_front' => false, // Don't display the category base before "/locations/"
                    'hierarchical' => true, // This will allow URL's like "/locations/boston/cambridge/"
                ),
            ));
        }
    }
}
add_action('init', 'quotes_post_types');
add_action('rest_api_init', 'register_rest_images');
function register_rest_images()
{
    register_rest_field(array('quotes', 'q_author'),
        'fimg_url',
        array(
            'get_callback' => 'get_rest_featured_image',
            'update_callback' => null,
            'schema' => null,
        )
    );
    register_rest_field(array('quotes'),
        'categories',
        array(
            'get_callback' => 'get_rest_quote_category',
            'update_callback' => null,
            'schema' => null,
        )
    );
    register_rest_field(array('q_author'),
        'quotes',
        array(
            'get_callback' => 'get_rest_author_quotes',
            'update_callback' => null,
            'schema' => null,
        )
    );
}
function get_rest_featured_image($object, $field_name, $request)
{
    if ($object['featured_media']) {
        $img = wp_get_attachment_image_src($object['featured_media'], 'app-thumb');
        return $img[0];
    }
    return false;
}
function get_rest_quote_category($object, $field_name, $request)
{
    if ($object['quotes_category']) {
        $arr = [];
        foreach ($object['quotes_category'] as $cat) {
            $arr[] = get_term($cat, 'quotes_category');
        }
        return $arr;
    }
    return false;
}
function get_rest_author_quotes($object, $field_name, $request)
{
    $args = [
        'post_type' => 'quotes',
        'meta_key' => 'q_author',
        'meta_value' => $object['id']
    ];
    $query = new WP_Query($args);
    return $query->post_count;
}
add_action('rest_api_init', function () {
    register_rest_route('wp/v2', '/likes/add/(?P<id>\d+)', array(
        'methods' => array('GET', 'POST'),
        'callback' => 'add__like',
    ));
    register_rest_route('wp/v2', '/likes/remove/(?P<id>\d+)', array(
        'methods' => array('GET', 'POST'),
        'callback' => 'remove__like',
    ));
});
function add__like(WP_REST_Request $request)
{
    // Custom field slug
    $field_name = 'likes';
    // Get the current like number for the post
    $current_likes = get_field($field_name, $request['id']);
    // Add 1 to the existing number
    $updated_likes = $current_likes + 1;
    // Update the field with a new value on this post
    $likes = update_field($field_name, $updated_likes, $request['id']);
    return $likes;
}
function remove__like(WP_REST_Request $request)
{
    // Custom field slug
    $field_name = 'likes';
    // Get the current like number for the post
    $current_likes = get_field($field_name, $request['id']);
    // Add 1 to the existing number
    
    $updated_likes = $current_likes ? $current_likes - 1 : $current_likes;
    // Update the field with a new value on this post
    $likes = update_field($field_name, $updated_likes, $request['id']);
    return $likes;
}