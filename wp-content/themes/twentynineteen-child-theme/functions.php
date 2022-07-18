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
        'post_type' => 'event',
        'posts_per_page' => 3
    ];

    $events = new WP_Query($args); //return a wp query object, containing funcitons and the result of the query

    if ($events->have_posts()){
        echo '<ul class="events-list>';
        $format = '<li class="event"><a href="%1$s" title="%2$"> %2$s </a> : %3$s </li>';

        while($events->have_posts()) {
            $events->the_post(); //assign the post

            printf($format, 
                get_permalink(),
                get_the_title(),
                apply_filters('the_content', get_the_content()) 
            );
        }

        echo '</ul>';
    }

    wp_reset_query();
}