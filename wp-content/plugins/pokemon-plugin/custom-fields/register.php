<?php

function Pokeplugin_add_new_fields() {
    register_rest_field( 
        'pokemon',     // Object(s) the filed is being registered to
        'html_pkmn_types', // Attribute (field) name
         array(     // Array of arguments
            'get_callback'    => 'Pokeplugin_get_category_links', // Retrieves the field value.
            'update_callback' => null,                 // Updates the field value.
            'schema'          => null,                 // Creates schema for the field.
        ) 
    );

    register_rest_field( 
        'pokemon',     // Object(s) the filed is being registered to
        'previous_post', // Attribute (field) name
         array(     // Array of arguments
            'get_callback'    => 'Pokeplugin_get_previous_post', // Retrieves the field value.
            'update_callback' => null,                 // Updates the field value.
            'schema'          => null,                 // Creates schema for the field.
        ) 
    );
}

function Pokeplugin_get_category_links() {
    $terms = get_the_terms(get_post(), 'pokemon_type');
    $separator = ', ';
    $output = '';
    if ( ! empty( $terms ) ) {
        foreach( $terms as $term ) {
            $output .= '<a href="'.get_term_link($term, 'pokemon_type').'">' . esc_html( $term->name ) . '</a>' . $separator;
        }
        $output = trim( $output, $separator );
    }
    return $output;
}

function Pokeplugin_get_previous_post() {
    $previous_post = get_previous_post();
    return [
        'id' => $previous_post->ID,
        'title' => $previous_post->post_title,
        'link' => get_permalink($previous_post)
    ];
}