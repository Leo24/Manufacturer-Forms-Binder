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

		add_action('admin_post_submit-form', array($this, '_handle_form_action')); // If the user is logged in
		add_action('admin_post_nopriv_submit-form', array($this, '_handle_form_action')); // If the user in not logged in

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
		if ( is_page( 'SEO Analyze Report' ) ) {

			$page_template = dirname( __FILE__ ) . '/views/single-seo-analyze-report.php';
		}
		return $page_template;
	}




	public function seo_analyze_tools_plugin_activate() {
		global $wpdb;

		$the_page_title = 'SEO Analyze Tools';
		$the_page_name = 'SEO Analyze Tools';
		$the_page_title_report = 'SEO Analyze Report';
		$the_page_name_report = 'SEO Analyze Report';
		// the menu entry...
		delete_option("seo_analyze_tools_plugin_page_title");
		add_option("seo_analyze_tools_plugin_page_title", $the_page_title_report, '', 'yes');
		delete_option("seo_analyze_report_plugin_page_title");
		add_option("seo_analyze_report_plugin_page_title", $the_page_title_report, '', 'yes');
		// the slug...
		delete_option("seo_analyze_tools_plugin_page_name");
		add_option("seo_analyze_tools_plugin_page_name", $the_page_name_report, '', 'yes');
		delete_option("seo_analyze_report_plugin_page_name");
		add_option("seo_analyze_report_plugin_page_name", $the_page_name_report, '', 'yes');
		// the id...
		delete_option("seo_analyze_tools_plugin_page_id");
		add_option("seo_analyze_tools_plugin_page_id", '0', '', 'yes');
		delete_option("seo_analyze_report_plugin_page_id");
		add_option("seo_analyze_report_plugin_page_id", '0', '', 'yes');

		$the_page = get_page_by_title( $the_page_title );
		$the_page_report = get_page_by_title( $the_page_title_report );

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

		}else {
			// the plugin may have been previously active and the page may just be trashed...

			$the_page_id = $the_page->ID;

			//make sure the page is not trashed...
			$the_page->post_status = 'publish';
			$the_page_id = wp_update_post( $the_page );

		}

		if( ! $the_page_report ){
			// Create post object
			$_p = array();
			$_p['post_title'] = $the_page_title_report;
			$_p['post_content'] = "[seo_analyze_report]";
			$_p['post_status'] = 'publish';
			$_p['post_type'] = 'page';
			$_p['comment_status'] = 'closed';
			$_p['ping_status'] = 'closed';
			$_p['post_category'] = array(1); // the default 'Uncatrgorised'

			// Insert the post into the database
			$the_page_report_id = wp_insert_post( $_p );
		}else {
			// the plugin may have been previously active and the page may just be trashed...

			$the_page_report_id = $the_page->ID;

			//make sure the page is not trashed...
			$the_page->post_status = 'publish';
			$the_page_report_id = wp_update_post( $the_page_report );

		}

		delete_option( 'seo_analyze_tools_plugin_page_id' );
		delete_option( 'seo_analyze_report_plugin_page_id' );
		add_option( 'seo_analyze_tools_plugin_page_id', $the_page_id );
		add_option( 'seo_analyze_report_plugin_page_id', $the_page_report_id );

	}


	public function seo_analyze_tools_plugin_deactivate() {

		global $wpdb;

		$the_page_title = get_option( "seo_analyze_tools_plugin_page_title" );
		$the_page_name = get_option( "seo_analyze_tools_plugin_page_name" );

		$the_page_title_report = get_option( "seo_analyze_report_plugin_page_title" );
		$the_page_name_report = get_option( "seo_analyze_report_plugin_page_name" );

		//  the id of our page...
		$the_page_id = get_option( 'seo_analyze_tools_plugin_page_id' );
		$the_page_report_id = get_option( 'seo_analyze_report_plugin_page_id' );
		if( $the_page_id ) {

			wp_delete_post( $the_page_id, true); // this will trash, not delete

		}

		if( $the_page_report_id ) {

			wp_delete_post( $the_page_report_id, true); // this will trash, not delete

		}

		delete_option("seo_analyze_tools_plugin_page_title");
		delete_option("seo_analyze_tools_plugin_page_name");
		delete_option("seo_analyze_tools_plugin_page_id");

		delete_option("seo_analyze_report_plugin_page_title");
		delete_option("seo_analyze_report_plugin_page_name");
		delete_option("seo_analyze_report_plugin_page_id");

	}

	public function get_title($url){
		$str = file_get_contents($url);
		if(strlen($str)>0){
			$str = trim(preg_replace('/\s+/', ' ', $str)); // supports line breaks inside <title>
			preg_match("/\<title\>(.*)\<\/title\>/i",$str,$title); // ignore case
			return $title[1];
		}
	}

	public function get_meta_description($url){
		$tags = get_meta_tags($url);
		foreach ($tags as $k => $tag){
			if($k == 'description'){
				return $tag;
			}else{
				return false;
			}

		}
	}

	public function get_content($url){
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		$data = curl_exec($ch);
		curl_close($ch);

		$content = array();
//parsing begins here:
		$doc = new DOMDocument();
		@$doc->loadHTML($data);
		$nodes = $doc->getElementsByTagName('title');

		$content['title'] = $nodes->item(0)->nodeValue;
		$metas = $doc->getElementsByTagName('meta');

		for ($i = 0; $i < $metas->length; $i++)
		{
			$meta = $metas->item($i);
			if($meta->getAttribute('name') == 'description')
				$content['description'] = $meta->getAttribute('content');
			if($meta->getAttribute('name') == 'keywords')
				$content['keywords'] = $meta->getAttribute('content');
		}

		for($i = 1; $i < 6; $i++){
			$headings = $doc->getElementsByTagName('h'.$i);
			for ($j = 0; $j < $headings->length; $j++)
			{
				$heading = $headings->item($j);
				$content['headings']['h'.$i][] = $heading->nodeValue;
			}
		}

		foreach($content['headings'] as $tag => $heading){
			if($tag !== 'h1'){
				foreach($heading as $k => $string ){

					$headingLength = strlen($string);
					if($headingLength >= 15 && $headingLength <= 65){
						$content['headings'][$tag]['pass'][$k][] = $string;
						$content['headings'][$tag]['pass'][$k]['length'] = $headingLength;
					}elseif ($headingLength < 15 ) {
						//too short
						$content['headings'][$tag]['warning']['short'][$k][] = $string;
						$content['headings'][$tag]['warning']['short'][$k]['extra_length'] = 15 - $headingLength;
					}elseif ($headingLength > 65 ) {
						//too long
						$content['headings'][$tag]['warning']['long'][$k][] = $string;
						$content['headings'][$tag]['warning']['long'][$k]['extra_length'] = $headingLength - 65;
					}
				}
			}
		}

		return $content;
	}

	public function _handle_form_action(){
		if(isset($_POST) && !empty($_POST['url'])){
			$url = $_POST['url'];

			$title = $this->get_title($url);
			$description = $this->get_meta_description($url);

			$content = $this->get_content($url);
			$report_ID = post_exists($url);


			if($report_ID == 0) {
				$_p                   = array();
				$_p['post_title']     = $url;
				$_p['post_content']   = "[seo_analyze_report]";
				$_p['post_status']    = 'publish';
				$_p['post_type']      = 'seoanalyzertool';
				$_p['comment_status'] = 'closed';
				$_p['ping_status']    = 'closed';
				$_p['post_category']  = array( 1 ); // the default 'Uncatrgorised'

				// Insert the post into the database
				$the_page_report_id = wp_insert_post( $_p );
				$report_post        = get_post($the_page_report_id);
			}else{
				$report_post        = get_post($report_ID);
			}
			require_once(dirname( __FILE__ ) . '/views/single-seo-analyze-report.php');
		}
	}



}

new SeoAnalyzerTool();
