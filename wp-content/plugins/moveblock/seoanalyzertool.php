<?php
/*
Plugin Name: Move block
Plugin URI: http://my-awesomeness-emporium.com
Description: a plugin to bind  manufacturer post types with Forms
Version: 1.0
License: GPL2
*/

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

class moveblock{

	public function __construct(){


		add_action('init', array($this,'createPostTypemoveblock'));

		add_filter( 'page_template', array($this, 'fw_reserve_page_template'));

		add_action('admin_post_submit-form', array($this, '_handle_form_action')); // If the user is logged in
		add_action('admin_post_nopriv_submit-form', array($this, '_handle_form_action')); // If the user in not logged in

		register_activation_hook(__FILE__, array($this,'movable_block_plugin_activate')); //activate hook
		register_deactivation_hook(__FILE__, array($this,'movable_block_plugin_deactivate')); //deactivate hook

	}

	//register the manufacturer content type
	public function createPostTypemoveblock(){
		//Labels for post type
		$labels = array(
			'name'               => 'moveblocks',
			'singular_name'      => 'moveblocks',
			'menu_name'          => 'moveblocks',
			'name_admin_bar'     => 'moveblocks',
			'add_new'            => 'Add New',
			'add_new_item'       => 'Add New movable_block',
			'new_item'           => 'New movable_block',
			'edit_item'          => 'Edit movable_block',
			'view_item'          => 'View movable_block',
			'all_items'          => 'All Analyzers',
			'search_items'       => 'Search movable_block',
			'parent_item_colon'  => 'Parent movable_block:',
			'not_found'          => 'No movable_block found.',
			'not_found_in_trash' => 'No movable_block found in Trash.',
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
			'rewrite'            => array('slug' => 'movableblock', 'with_front' => 'true')
		);
		//register post type
		register_post_type('moveblock', $args);
	}


//add_filter( 'page_template', 'fw_reserve_page_template' );
	public function fw_reserve_page_template( $page_template )
	{
		if ( is_page( 'Movable block' ) ) {

			$page_template = dirname( __FILE__ ) . '/views/movable-block.php';
		}

		return $page_template;
	}




	public function movable_block_plugin_activate() {
		global $wpdb;

		$the_page_title = 'Movable block';
		$the_page_name = 'Movable block';

		// the menu entry...
		delete_option("movable_block_plugin_page_title");
		add_option("movable_block_plugin_page_title", $the_page_title, '', 'yes');
		delete_option("movable_block_plugin_page_title");
		add_option("movable_block_plugin_page_title", $the_page_title, '', 'yes');
		// the slug...
		delete_option("movable_block_plugin_page_name");
		add_option("movable_block_plugin_page_name", $the_page_name, '', 'yes');
		delete_option("movable_block_plugin_page_name");
		add_option("movable_block_plugin_page_name", $the_page_name, '', 'yes');
		// the id...
		delete_option("movable_block_plugin_page_id");
		add_option("movable_block_plugin_page_id", '0', '', 'yes');
		delete_option("movable_block_plugin_page_id");
		add_option("movable_block_plugin_page_id", '0', '', 'yes');

		$the_page = get_page_by_title( $the_page_title );

		if ( ! $the_page ) {

			// Create post object
			$_p = array();
			$_p['post_title'] = $the_page_title;
			$_p['post_content'] = "";
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

		delete_option( 'movable_block_plugin_page_id' );
		add_option( 'movable_block_plugin_page_id', $the_page_id );

	}


	public function movable_block_plugin_deactivate() {

		global $wpdb;

		$the_page_title = get_option( "movable_block_plugin_page_title" );
		$the_page_name = get_option( "movable_block_plugin_page_name" );

		//  the id of our page...
		$the_page_id = get_option( 'movable_block_plugin_page_id' );
		$the_page_report_id = get_option( 'movable_block_plugin_page_id' );
		if( $the_page_id ) {

			wp_delete_post( $the_page_id, true); // this will trash, not delete

		}


		delete_option("movable_block_plugin_page_title");
		delete_option("movable_block_plugin_page_name");
		delete_option("movable_block_plugin_page_id");

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
				$_p['post_type']      = 'moveblock';
				$_p['comment_status'] = 'closed';
				$_p['ping_status']    = 'closed';
				$_p['post_category']  = array( 1 ); // the default 'Uncatrgorised'

				// Insert the post into the database
				$the_page_report_id = wp_insert_post( $_p );
				$report_post        = get_post($the_page_report_id);
			}else{
				$report_post        = get_post($report_ID);
			}
			require_once(dirname( __FILE__ ) . '/views/movable-block.php');
		}
	}



}

new moveblock();
