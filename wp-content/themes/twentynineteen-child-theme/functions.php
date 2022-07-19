<?php

function PokePlugin_child_enqueue_styles(){
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style('child-style', get_stylesheet_directory_uri() . '/style.css', ['parent-style'] );
}
add_action('wp_enqueue_scripts', 'PokePlugin_child_enqueue_styles');



function PokePlugin_add_pokemon_to_query($query){

    if($query->is_home() && $query->is_main_query()){
        $query->set( 'post_type', ['post', 'pokemon'] );
    }
}
add_action('pre_get_posts', 'PokePlugin_add_pokemon_to_query');

function PokePlugin_show_events(){
    $args = [
        'post_type' => 'pokemon_event',
        'posts_per_page' => 3
    ];

    $events = new WP_Query($args); //return a wp query object, containing funcitons and the result of the query

    if ($events->have_posts()){
        echo '<ul class="events-list>';        

        while($events->have_posts()) {
            $events->the_post(); //assign the post            

            $post = get_post();

            echo '<li class="event">';
                echo '<a href="'.get_post_permalink().'" title="'.$post->post_title.'"> '.$post->post_title.'</a>';
                echo ' : '.apply_filters('the_content', $post->post_date.' - '.$post->post_content);
            echo '</li>';
            
        }

        echo '</ul>';
    }

    wp_reset_query();
}