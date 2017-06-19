<?php
/*
Plugin Name: Manufacturer Forms Binder
Plugin URI: http://my-awesomeness-emporium.com
Description: a plugin to bind  manufacturer post types with Forms
Version: 1.0
License: GPL2
*/

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

class ManufacturerForms{

    const ENABLED_FORM_ID   = '1';
    const DISABLED_FORM_ID  = '2';
    const PENDING_FORM_ID   = '3';
    const STATUS_ENABLED    = 'enabled';
    const STATUS_DISABLED   = 'disabled';
    const STATUS_PENDING    = 'pending';

    public function __construct(){


        add_action('init', array($this,'createPostTypeManufacturer'));

        add_filter ('the_content', array($this,'insertManufacturerForms'));

        register_activation_hook(__FILE__, array($this,'plugin_activate')); //activate hook
        register_deactivation_hook(__FILE__, array($this,'plugin_deactivate')); //deactivate hook

    }

    //register the manufacturer content type
    public function createPostTypeManufacturer(){
        //Labels for post type
        $labels = array(
            'name'               => 'Manufacturer',
            'singular_name'      => 'Manufacturer',
            'menu_name'          => 'Manufacturers',
            'name_admin_bar'     => 'Manufacturer',
            'add_new'            => 'Add New',
            'add_new_item'       => 'Add New Manufacturer',
            'new_item'           => 'New Manufacturer',
            'edit_item'          => 'Edit Manufacturer',
            'view_item'          => 'View Manufacturer',
            'all_items'          => 'All Manufacturers',
            'search_items'       => 'Search Manufacturers',
            'parent_item_colon'  => 'Parent Manufacturer:',
            'not_found'          => 'No Manufacturers found.',
            'not_found_in_trash' => 'No Manufacturers found in Trash.',
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
            'rewrite'            => array('slug' => 'manufacturers', 'with_front' => 'true')
        );
        //register post type
        register_post_type('manufacturer', $args);
    }

   public function insertManufacturerForms($content) {

       $args = array(
           'post_type' => 'manufacturer',
       );

       $manufacturers = get_posts($args);

       foreach($manufacturers as $manufacturer){
           $fields = get_fields($manufacturer->ID);
           $formId = 0;
           if($fields['status'] === Self::STATUS_ENABLED){
               $formId = Self::ENABLED_FORM_ID;
           }
           elseif($fields['status'] === Self::STATUS_DISABLED){
               $formId = Self::DISABLED_FORM_ID;
           }
           elseif($fields['status'] === Self::STATUS_PENDING){
               $formId = Self::PENDING_FORM_ID;
           }

            $content.= gravity_form( $formId, $display_title = true, $display_description = true, $display_inactive = false, $field_values = null, $ajax = false, $tabindex = 0, $echo = true );
       }

        return $content;
    }

}

new ManufacturerForms();
