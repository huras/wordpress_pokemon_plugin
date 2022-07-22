<?php
/**
 * Include and setup custom metaboxes and fields.
 *
 * @package  Taskbook
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://cmb2.io
 * @link     https://github.com/CMB2/CMB2
 */

/**
 * Call the CMB2 plugin from within the Taskbook plugin.
 */

if ( file_exists( dirname( __FILE__ ) . '/cmb2/init.php' ) ) {
	require_once dirname( __FILE__ ) . '/cmb2/init.php';
} elseif ( file_exists( dirname( __FILE__ ) . '/CMB2/init.php' ) ) {
	require_once dirname( __FILE__ ) . '/CMB2/init.php';
}


/**
 * Only show this box in the CMB2 REST API if the user is logged in.
 *
 * @param  bool                 $is_allowed     Whether this box and its fields are allowed to be viewed.
 * @param  CMB2_REST_Controller $cmb_controller The controller object.
 *                                              CMB2 object available via `$cmb_controller->rest_box->cmb`.
 *
 * @return bool                 Whether this box and its fields are allowed to be viewed.
 */
function pokemon_limit_rest_view_to_logged_in_users( $is_allowed, $cmb_controller ) {
	if ( ! is_user_logged_in() ) {
		$is_allowed = false;
	}

	return $is_allowed;
}

add_action( 'cmb2_init', 'pokemon_register_rest_api_box' );
/**
 * Hook in and add a box to be available in the CMB2 REST API. Can only happen on the 'cmb2_init' hook.
 * More info: https://github.com/CMB2/CMB2/wiki/REST-API
 */
function pokemon_register_rest_api_box() {

	$cmb_rest = new_cmb2_box( array(
		'id'            => 'pokemon_rest_metabox',
		'title'         => esc_html__( 'Pokemon Data', 'pokemon' ),
		'object_types'  => array( 'pokemon' ), // Post type
		'show_in_rest'  => WP_REST_Server::ALLMETHODS, // WP_REST_Server::READABLE|WP_REST_Server::EDITABLE, // Determines which HTTP methods the box is visible in.
		// Optional callback to limit box visibility.
		// See: https://github.com/CMB2/CMB2/wiki/REST-API#permissions
		'get_box_permissions_check_cb' => 'pokemon_limit_rest_view_to_logged_in_users',
	) );

	$cmb_rest->add_field( array(
		'name'          => esc_html__( 'Post-task level', 'pokemon' ),
		'id'            => 'pokemon_post_level',
		'type'          => 'radio',
		'options'       => array(
			'5' => esc_html__( 'Very relaxed', 'pokemon' ),
			'4' => esc_html__( 'Somewhat relaxed', 'pokemon' ),
			'3' => esc_html__( 'Neutral', 'pokemon' ),
			'2' => esc_html__( 'Somewhat stressful', 'pokemon' ),
			'1' => esc_html__( 'Very stressful', 'pokemon' ),
		),
		'before'  => '<p>' . esc_html__( 'What was the actual experience of working with the task like?', 'pokemon' ) . '</p>',
	) );

    $cmb_rest->add_field( array(
		'name'    => esc_html__( 'Site Background Color', 'cmb2' ),
		'desc'    => esc_html__( 'field description (optional)', 'cmb2' ),
		'id'      => 'bg_color',
		'type'    => 'colorpicker',
		'default' => '#ffffff',
	) );

    $cmb_rest->add_field( array(
		'name'    => esc_html__( 'Pokédexes', 'cmb2' ),
		'desc'    => esc_html__( 'field description (optional)', 'cmb2' ),
		'id'      => 'yourprefix_demo_podedexes',
		'type'    => 'wysiwyg',
		'options' => array(
			'textarea_rows' => 5,
		),
	) );

	$cmb_rest->add_field( array(
		'name'     => esc_html__( 'Test Taxonomy Multi Checkbox', 'cmb2' ),
		'desc'     => esc_html__( 'field description (optional)', 'cmb2' ),
		'id'       => 'pkmn_primary_type',
		'type'     => 'taxonomy_multicheck', // Or `taxonomy_multicheck_inline`/`taxonomy_multicheck_hierarchical`
		'taxonomy' => 'pokemon_type', // Taxonomy Slug
		// 'inline'  => true, // Toggles display to inline
	) );

}