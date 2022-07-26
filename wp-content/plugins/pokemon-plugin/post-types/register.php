<?php

function PokePlugin_register_pokemon_type() {
    $labels = [
        'name' => __('Pokemons', PokePlugin_DOMAIN),
        'singular_name' => __('Pokemon', PokePlugin_DOMAIN),
        
        'featured_image' => __('Pokemon Picture', PokePlugin_DOMAIN),
        'set_featured_image' => __('Set Pokemon Picture', PokePlugin_DOMAIN),
        'remove_featured_image' => __('Remove Pokemon Picture', PokePlugin_DOMAIN),
        'use_featured_image' => __('Use Pokemon Picture', PokePlugin_DOMAIN),

        'archives' => __('Pokemon Directory', PokePlugin_DOMAIN),

        'add_new' => __('New Pokemon', PokePlugin_DOMAIN),
        'add_new_item' => __('Add new Pokemon', PokePlugin_DOMAIN),
    ];

    $args = [
        'labels' => $labels,
        'public' => true,

        'has_archive' => 'pokemons',
        'rewrite' => ['has_front' => true],
        'menu_icon' => 'dashicons-buddicons-activity',
        'supports' => ['title', 'editor', 'thumbnail', 'custom-fields'],

        'show_in_rest' => true,

        'taxonomies' => ['pokemon_type'],
    ];

    register_post_type('pokemon', $args);
}

function PokePlugin_register_pokemon_event() {
    $labels = [
        'name' => __('Pokemon Events', PokePlugin_DOMAIN),
        'singular_name' => __('Pokemon Event', PokePlugin_DOMAIN),
        
        'featured_image' => __('Event Picture', PokePlugin_DOMAIN),
        'set_featured_image' => __('Set Event Picture', PokePlugin_DOMAIN),
        'remove_featured_image' => __('Remove Event Picture', PokePlugin_DOMAIN),
        'use_featured_image' => __('Use Event Picture', PokePlugin_DOMAIN),

        'archives' => __('Event Directory', PokePlugin_DOMAIN),

        'add_new' => __('New Event', PokePlugin_DOMAIN),
        'add_new_item' => __('Add new Event', PokePlugin_DOMAIN),
    ];

    $args = [
        'labels' => $labels,
        'public' => true,

        'has_archive' => 'pokemon_events',
        'rewrite' => ['has_front' => true],
        'menu_icon' => 'dashicons-buddicons-activity',
        'supports' => ['title', 'editor', 'thumbnail', 'custom-fields'],

        'show_in_rest' => true,
    ];

    register_post_type('pokemon_event', $args);
}