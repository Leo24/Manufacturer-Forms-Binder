<?php
/*
Plugin Name: SEO Analyzer Tool
Plugin URI: http://my-awesomeness-emporium.com
Description: a plugin to bind  manufacturer post types with Forms
Version: 1.0
License: GPL2
*/

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

class SeoAnalyzerTool{

	public function __construct(){


		add_action('init', array($this,'createPostTypeSeoAnalyzerTool'));

		add_filter( 'page_template', array($this, 'fw_reserve_page_template'));

		register_activation_hook(__FILE__, array($this,'seo_analyze_tools_plugin_activate')); //activate hook
		register_deactivation_hook(__FILE__, array($this,'seo_analyze_tools_plugin_deactivate')); //deactivate hook

	}

	//register the manufacturer content type
	public function createPostTypeSeoAnalyzerTool(){
		//Labels for post type
		$labels = array(
			'name'               => 'SeoAnalyzerTools',
			'singular_name'      => 'SeoAnalyzerTools',
			'menu_name'          => 'SeoAnalyzerTools',
			'name_admin_bar'     => 'SeoAnalyzerTools',
			'add_new'            => 'Add New',
			'add_new_item'       => 'Add New SeoAnalyzer',
			'new_item'           => 'New SeoAnalyzer',
			'edit_item'          => 'Edit SeoAnalyzer',
			'view_item'          => 'View SeoAnalyzer',
			'all_items'          => 'All Analyzers',
			'search_items'       => 'Search SeoAnalyzer',
			'parent_item_colon'  => 'Parent SeoAnalyzer:',
			'not_found'          => 'No SeoAnalyzers found.',
			'not_found_in_trash' => 'No SeoAnalyzers found in Trash.',
		);
		//arguments for post type
		$args = array(
			'labels'            => $labels,
			'public'            => true,
			'publicly_queryable'=> true,
			'show_ui'           => true,
			'show_in_nav'       => true,
			'query_var'         => true,
			'hierarchical'      => false,
			'supports'          => array('title','thumbnail','editor'),
			'has_archive'       => true,
			'menu_position'     => 20,
			'show_in_admin_bar' => true,
			'menu_icon'         => 'dashicons-location-alt',
			'rewrite'            => array('slug' => 'seoanalyzers', 'with_front' => 'true')
		);
		//register post type
		register_post_type('seoanalyzertool', $args);
	}


//add_filter( 'page_template', 'fw_reserve_page_template' );
	public function fw_reserve_page_template( $page_template )
	{
		if ( is_page( 'SEO Analyze Tools' ) ) {

			$page_template = dirname( __FILE__ ) . '/views/single-seo-analyze-tools.php';
		}
		return $page_template;
	}




	public function seo_analyze_tools_plugin_activate() {
		global $wpdb;

		$the_page_title = 'SEO Analyze Tools';
		$the_page_name = 'SEO Analyze Tools';

		// the menu entry...
		delete_option("seo_analyze_tools_plugin_page_title");
		add_option("seo_analyze_tools_plugin_page_title", $the_page_title, '', 'yes');
		// the slug...
		delete_option("seo_analyze_tools_plugin_page_name");
		add_option("seo_analyze_tools_plugin_page_name", $the_page_name, '', 'yes');
		// the id...
		delete_option("seo_analyze_tools_plugin_page_id");
		add_option("seo_analyze_tools_plugin_page_id", '0', '', 'yes');

		$the_page = get_page_by_title( $the_page_title );

		if ( ! $the_page ) {

			// Create post object
			$_p = array();
			$_p['post_title'] = $the_page_title;
			$_p['post_content'] = "[seo_analyze_tools]";
			$_p['post_status'] = 'publish';
			$_p['post_type'] = 'page';
			$_p['comment_status'] = 'closed';
			$_p['ping_status'] = 'closed';
			$_p['post_category'] = array(1); // the default 'Uncatrgorised'

			// Insert the post into the database
			$the_page_id = wp_insert_post( $_p );

		}
		else {
			// the plugin may have been previously active and the page may just be trashed...

			$the_page_id = $the_page->ID;

			//make sure the page is not trashed...
			$the_page->post_status = 'publish';
			$the_page_id = wp_update_post( $the_page );

		}

		delete_option( 'seo_analyze_tools_plugin_page_id' );
		add_option( 'seo_analyze_tools_plugin_page_id', $the_page_id );

	}


	public function seo_analyze_tools_plugin_deactivate() {

		global $wpdb;

		$the_page_title = get_option( "seo_analyze_tools_plugin_page_title" );
		$the_page_name = get_option( "seo_analyze_tools_plugin_page_name" );

		//  the id of our page...
		$the_page_id = get_option( 'seo_analyze_tools_plugin_page_id' );
		if( $the_page_id ) {

			wp_delete_post( $the_page_id, true); // this will trash, not delete

		}

		delete_option("seo_analyze_tools_plugin_page_title");
		delete_option("seo_analyze_tools_plugin_page_name");
		delete_option("seo_analyze_tools_plugin_page_id");

	}



}

new SeoAnalyzerTool();
