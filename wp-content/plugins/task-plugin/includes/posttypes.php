<?php

/**
 * Register a custom post type called "task".
 *
 * @see get_post_type_labels() for label keys.
 */
function taskplugin_cpt_init() {
    $labels = array(
        'name'                  => _x( 'Tasks', 'Post type general name', TaskPlugin_DOMAIN ),
        'singular_name'         => _x( 'Task', 'Post type singular name', TaskPlugin_DOMAIN ),
        'menu_name'             => _x( 'Tasks', 'Admin Menu text', TaskPlugin_DOMAIN ),
        'name_admin_bar'        => _x( 'Task', 'Add New on Toolbar', TaskPlugin_DOMAIN ),
        'add_new'               => __( 'Add New', TaskPlugin_DOMAIN ),
        'add_new_item'          => __( 'Add New Task', TaskPlugin_DOMAIN ),
        'new_item'              => __( 'New Task', TaskPlugin_DOMAIN ),
        'edit_item'             => __( 'Edit Task', TaskPlugin_DOMAIN ),
        'view_item'             => __( 'View Task', TaskPlugin_DOMAIN ),
        'all_items'             => __( 'All Tasks', TaskPlugin_DOMAIN ),
        'search_items'          => __( 'Search Tasks', TaskPlugin_DOMAIN ),
        'parent_item_colon'     => __( 'Parent Tasks:', TaskPlugin_DOMAIN ),
        'not_found'             => __( 'No tasks found.', TaskPlugin_DOMAIN ),
        'not_found_in_trash'    => __( 'No tasks found in Trash.', TaskPlugin_DOMAIN ),
        'featured_image'        => _x( 'Task Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', TaskPlugin_DOMAIN ),
        'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', TaskPlugin_DOMAIN ),
        'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', TaskPlugin_DOMAIN ),
        'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', TaskPlugin_DOMAIN ),
        'archives'              => _x( 'Task archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', TaskPlugin_DOMAIN ),
        'insert_into_item'      => _x( 'Insert into task', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', TaskPlugin_DOMAIN ),
        'uploaded_to_this_item' => _x( 'Uploaded to this task', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', TaskPlugin_DOMAIN ),
        'filter_items_list'     => _x( 'Filter tasks list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', TaskPlugin_DOMAIN ),
        'items_list_navigation' => _x( 'Tasks list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', TaskPlugin_DOMAIN ),
        'items_list'            => _x( 'Tasks list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', TaskPlugin_DOMAIN ),
    );
 
    $args = array(
        'labels'             => $labels,
        'public'             => false,
        'publicly_queryable' => false,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'tasks' ),
        'capability_type'    => 'task',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'menu_icon'          => 'dashicons-exerpt-view',
        'supports'           => array( 'title', 'editor', 'author'),
        'show_in_rest'       => true,
        'rest_base'          => 'tasks',
        'map_meta_cap'       => true,
    );
 
    register_post_type( 'task', $args );
}
 
add_action( 'init', 'taskplugin_cpt_init' );


function taskbook_rewrite_flush() {
    // First, we "add" the custom post type via the above written function.
    // Note: "add" is written with quotes, as CPTs don't get added to the DB,
    // They are only referenced in the post_type column with a post entry, 
    // when you add a post of this CPT.
    taskplugin_cpt_init();
 
    // ATTENTION: This is *only* done during plugin activation hook in this example!
    // You should *NEVER EVER* do this on every page load!!
    flush_rewrite_rules();
}
