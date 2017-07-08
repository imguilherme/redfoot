<?php
/*
Plugin Name: Redfoot Startups
Description:
Version: 1
Author: Redfoot
Author URI: http://redfootbrasil.org
*/
// function to create the DB / Options / Defaults					
function ss_options_install() {

    global $wpdb;

    $table_name = $wpdb->prefix . "startup";
    $charset_collate = $wpdb->get_charset_collate();
    $sql = "CREATE TABLE $table_name (
            `id` INT(11) AUTO_INCREMENT NOT NULL,
            `name` varchar(50) CHARACTER SET utf8 NOT NULL,
			`site` varchar(50) CHARACTER SET utf8 NOT NULL,
			`city` varchar(50) CHARACTER SET utf8 NOT NULL,
			`email` varchar(50) CHARACTER SET utf8 NOT NULL,
			`description` TEXT  SET utf8 NOT NULL,
            PRIMARY KEY (`id`)
          ) $charset_collate; ";

    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta($sql);
}

// run the install scripts upon plugin activation
register_activation_hook(__FILE__, 'ss_options_install');

//menu items
add_action('admin_menu','redfoot_startups_modifymenu');
function redfoot_startups_modifymenu() {
	
	//this is the main item for the menu
	add_menu_page('Startup', //page title
	'Startups', //menu title
	'manage_options', //capabilities
	'redfoot_startups_list', //menu slug
	'redfoot_startups_list' //function
	);
	
	//this is a submenu
	add_submenu_page('redfoot_startups_list', //parent slug
	'Adicionar nova Startup', //page title
	'Adicionar nova', //menu title
	'manage_options', //capability
	'redfoot_startups_create', //menu slug
	'redfoot_startups_create'); //function
	
	//this submenu is HIDDEN, however, we need to add it anyways
	add_submenu_page(null, //parent slug
	'Atualizar startup', //page title
	'Atualizar', //menu title
	'manage_options', //capability
	'redfoot_startups_update', //menu slug
	'redfoot_startups_update'); //function
}
define('ROOTDIR', plugin_dir_path(__FILE__));
require_once(ROOTDIR . 'startups-list.php');
require_once(ROOTDIR . 'startups-create.php');
require_once(ROOTDIR . 'startups-update.php');
