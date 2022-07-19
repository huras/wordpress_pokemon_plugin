<?php

function Pokeplugin_add_new_fields() {
    register_rest_field( 
        'pokemon',     // Object(s) the filed is being registered to
        'xaxax', // Attribute (field) name
         array(     // Array of arguments
            'get_callback'    => 'Pokeplugin_get_category_links', // Retrieves the field value.
            'update_callback' => null,                 // Updates the field value.
            'schema'          => null,                 // Creates schema for the field.
        ) 
    );
}

function Pokeplugin_get_category_links() {
    $categories = get_the_category();
    $separator = ', ';
    $output = '';
    if ( ! empty( $categories ) ) {
        foreach( $categories as $category ) {
            $output .= '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '">' . esc_html( $category->name ) . '</a>' . $separator;
        }
        $output = trim( $output, $separator );
    }
    return $output;
}