<?php
/**
 * SSM Clients
 *
 * @package   SSM_Clients
 * @license   GPL-2.0+
 */

/**
 * Register post types and taxonomies.
 *
 * @package SSM_Clients
 */
class SSM_Clients_Registrations {

	public $post_type = 'client';

	public $taxonomies = array( 'client-category' );

	public function init() {
		// Add the SSM Clients and taxonomies
		add_action( 'init', array( $this, 'register' ) );
	}

	/**
	 * Initiate registrations of post type and taxonomies.
	 *
	 * @uses SSM_Clients_Registrations::register_post_type()
	 * @uses SSM_Clients_Registrations::register_taxonomy_category()
	 */
	public function register() {
		$this->register_post_type();
		$this->register_taxonomy_category();
	}

	/**
	 * Register the custom post type.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/register_post_type
	 */
	protected function register_post_type() {
		$labels = array(
			'name'               => __( 'Clients', 'ssm-clients' ),
			'singular_name'      => __( 'Client', 'ssm-clients' ),
			'add_new'            => __( 'Add Client', 'ssm-clients' ),
			'add_new_item'       => __( 'Add Client', 'ssm-clients' ),
			'edit_item'          => __( 'Edit Client', 'ssm-clients' ),
			'new_item'           => __( 'New Client', 'ssm-clients' ),
			'view_item'          => __( 'View Client', 'ssm-clients' ),
			'search_items'       => __( 'Search Clients', 'ssm-clients' ),
			'not_found'          => __( 'No clients found', 'ssm-clients' ),
			'not_found_in_trash' => __( 'No clients in the trash', 'ssm-clients' ),
		);

		$supports = array(
			'title',
			'thumbnail',
		);

		$args = array(
			'labels'          		=> $labels,
			'supports'        		=> $supports,
			'public'          		=> false,
			'capability_type' 		=> 'page',
			'publicly_queriable'	=> true,
			'show_ui' 						=> true,
			'show_in_nav_menus' 	=> false,
			'rewrite'         		=> false,
			'menu_position'   		=> 30,
			'menu_icon'       		=> 'dashicons-groups',
			'has_archive'					=> false,
			'exclude_from_search'	=> true,
		);

		$args = apply_filters( 'ssm_clients_args', $args );

		register_post_type( $this->post_type, $args );
	}

	/**
	 * Register a taxonomy for Project Categories.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/register_taxonomy
	 */
	protected function register_taxonomy_category() {
		$labels = array(
			'name'                       => __( 'Client Categories', 'ssm-clients' ),
			'singular_name'              => __( 'Client Category', 'ssm-clients' ),
			'menu_name'                  => __( 'Categories', 'ssm-clients' ),
			'edit_item'                  => __( 'Edit Client Category', 'ssm-clients' ),
			'update_item'                => __( 'Update Client Category', 'ssm-clients' ),
			'add_new_item'               => __( 'Add New Client Category', 'ssm-clients' ),
			'new_item_name'              => __( 'New Client Category Name', 'ssm-clients' ),
			'parent_item'                => __( 'Parent Client Category', 'ssm-clients' ),
			'parent_item_colon'          => __( 'Parent Client Category:', 'ssm-clients' ),
			'all_items'                  => __( 'All Client Categories', 'ssm-clients' ),
			'search_items'               => __( 'Search Client Categories', 'ssm-clients' ),
			'popular_items'              => __( 'Popular Client Categories', 'ssm-clients' ),
			'separate_items_with_commas' => __( 'Separate client categories with commas', 'ssm-clients' ),
			'add_or_remove_items'        => __( 'Add or remove client categories', 'ssm-clients' ),
			'choose_from_most_used'      => __( 'Choose from the most used client categories', 'ssm-clients' ),
			'not_found'                  => __( 'No client categories found.', 'ssm-clients' ),
		);

		$args = array(
			'labels'            => $labels,
			'public'            => false,
			'show_in_nav_menus' => false,
			'show_ui'           => true,
			'show_tagcloud'     => false,
			'hierarchical'      => true,
			'rewrite'           => false,
			'show_admin_column' => true,
			'query_var'         => true,
		);

		$args = apply_filters( 'ssm_clients_category_args', $args );

		register_taxonomy( $this->taxonomies[0], $this->post_type, $args );
	}
}