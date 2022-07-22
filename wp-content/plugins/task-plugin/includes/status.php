<?php

add_action('rest_after_insert_task', 'taskbook_change_status', 10, 2);
function taskbook_change_status($post, $request) {
    $outcome = get_post_meta( $post->ID, 'taskbook_outcome', true);

    if ( 0 == strlen($outcome) ) {
        update_post_meta( $post->ID, 'task_status', 'In progress');
    } else {
        update_post_meta( $post->ID, 'task_status', 'Completed');
    }
}



add_action( 'rest_api_init', 'create_api_posts_meta_field' );
 
function create_api_posts_meta_field() { 
    
    register_rest_field( 
        'task', 
        'task_status', 
        array(
            'get_callback'    => 'taskbook_get_task_status',
            'schema'          => null,
        )
    );
}

function taskbook_get_task_status( $object, $field_name, $request ) {
    //get the id of the post object array
    $post_id = $object['id'];
 
    //return the post meta
    return get_post_meta( $post_id, $field_name, true );
}