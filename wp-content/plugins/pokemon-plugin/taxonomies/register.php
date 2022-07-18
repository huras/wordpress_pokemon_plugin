<?php

function PokePlugin_register_type_taxonomy() {
    $labels = [
        'name' => __('Elemental Types', PokePlugin_DOMAIN),
        'singular_name' => __('Elemental Type', PokePlugin_DOMAIN),
        'add_new_item' => __('Add new Elemental Type', PokePlugin_DOMAIN),
    ];

    $args = [
        'labels' => $labels,
        'public' => true,
        'show_admin_column' => true,
        'show_in_quick-edit' => true,

        'show_in_rest' => true
    ];

    $post_types = [
        'pokemon'
    ];

    register_taxonomy('pokemon_type', $post_types, $args);
}