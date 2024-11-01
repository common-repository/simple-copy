<?php
/**
* Plugin Name: Simple Copy Backup
* Plugin URI: 
* Description: Super simple backup taker for wp-content folder and the database. Super useful for developers or before plugin/theme update. 
* Version: 1.0
* Author: Ivan Popov
* Author URI: https://www.vipestudio.com
**/

/* Include all */
	foreach ( glob( plugin_dir_path( __FILE__ ) . "*.php" ) as $file ) {
                include_once $file;
}

/**
 * Append CSS
*/

//Admin Css
function sc_load_wp_admin_style(){
    wp_register_style( 'sc_wp_admin_css', plugins_url('admin/css/style.css', __FILE__), false, '1.0.0', 'all');
    wp_enqueue_style( 'sc_wp_admin_css' );
}
add_action('admin_enqueue_scripts', 'sc_load_wp_admin_style');

//add menu element
add_action( 'admin_menu', 'sc_info_menu' );

function sc_info_menu(){

  $page_title = 'Create a backup via Simple Copy';
  $menu_title = 'Simple Copy';
  $capability = 'manage_options';
  $menu_slug  = 'simplecopy';
  $function   = 'sc_admin_page';
  $icon_url   = plugins_url('admin/img/icon.png', __FILE__);
  $position   = 99;

  add_menu_page( $page_title,
                 $menu_title,
                 $capability,
                 $menu_slug,
                 $function,
                 $icon_url,
                 $position );
}

//plugin page
if( !function_exists("sc_admin_page") ) {
function sc_admin_page(){
include('admin/main.php');
}
}

//Backup plugins page
//add menu element
add_action( 'admin_menu', 'sc_backup_menu' );

function sc_backup_menu(){
  $parent_slug = 'simplecopy';
  $page_title = 'Plugin backup is being taken';
  $menu_title = 'Backup Plugins';
  $capability = 'manage_options';
  $menu_slug  = 'sc_backup_pageplugin';
  $function   = 'sc_backup_page';
  $icon_url   = plugins_url('admin/img/icon.png', __FILE__);
  $position   = 2;

  add_submenu_page($parent_slug,
                 $page_title,
                 $menu_title,
                 $capability,
                 $menu_slug,
                 $function,
                 $icon_url,
                 $position );
}

if( !function_exists("sc_backup_page") ) {
function sc_backup_page(){
    
include('admin/backupplugins.php');
}
}

//Backup themes page
//add menu element
add_action( 'admin_menu', 'sc_backup_themes_menu' );

function sc_backup_themes_menu(){
  $parent_slug = 'simplecopy';
  $page_title = 'Themes backup is being taken';
  $menu_title = 'Backup Themes';
  $capability = 'manage_options';
  $menu_slug  = 'sc_backup_themes_page';
  $function   = 'sc_backup_themes_page';
  $icon_url   = 'dashicons-plus-alt';
  $position   = 3;

  add_submenu_page($parent_slug,
                 $page_title,
                 $menu_title,
                 $capability,
                 $menu_slug,
                 $function,
                 $icon_url,
                 $position );
}

if( !function_exists("sc_backup_themes_page") ) {
function sc_backup_themes_page(){
    
include('admin/backupthemes.php');
}
}

//Backup themes page
//add menu element
add_action( 'admin_menu', 'sc_backup_db_menu' );

function sc_backup_db_menu(){
  $parent_slug = 'simplecopy';
  $page_title = 'DB backup is being taken';
  $menu_title = 'Backup Database';
  $capability = 'manage_options';
  $menu_slug  = 'sc_backup_pagedb';
  $function   = 'sc_backup_db_page';
  $icon_url   = 'dashicons-plus-alt';
  $position   = 3;

  add_submenu_page($parent_slug,
                 $page_title,
                 $menu_title,
                 $capability,
                 $menu_slug,
                 $function,
                 $icon_url,
                 $position );
}

if( !function_exists("sc_backup_db_page") ) {
function sc_backup_db_page(){
    
include('admin/backupdb.php');
}
}