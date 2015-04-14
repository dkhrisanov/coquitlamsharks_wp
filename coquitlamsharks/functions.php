<?php

////////////////////////////////////////////////////////////////////
// Theme Information
////////////////////////////////////////////////////////////////////

$themename = "coquitlamsharks";
$developer_uri = "http://coquitlamsharks.org";
$shortname = "sharks";
$version = '1.71';
load_theme_textdomain('coquitlamsharks', get_template_directory() . '/languages');

////////////////////////////////////////////////////////////////////
// include Theme-options.php for Admin Theme settings
////////////////////////////////////////////////////////////////////

include 'theme-options.php';


////////////////////////////////////////////////////////////////////
// Enqueue Styles (normal style.css and bootstrap.css)
////////////////////////////////////////////////////////////////////
function coquitlamsharks_theme_stylesheets(){
    wp_register_style('bootstrap.css', get_template_directory_uri() . '/css/bootstrap.css', array(), '1', 'all');
    wp_enqueue_style('bootstrap.css');
    wp_enqueue_style('stylesheet', get_stylesheet_uri(), array(), '1', 'all');
}

add_action('wp_enqueue_scripts', 'coquitlamsharks_theme_stylesheets');

//Editor Style
add_editor_style('css/editor-style.css');

////////////////////////////////////////////////////////////////////
// Register Bootstrap JS with jquery
////////////////////////////////////////////////////////////////////
function coquitlamsharks_theme_js(){
    global $version;
    wp_enqueue_script('theme-js', get_template_directory_uri() . '/js/bootstrap.js', array('jquery'), $version, true);
}

add_action('wp_enqueue_scripts', 'coquitlamsharks_theme_js');

////////////////////////////////////////////////////////////////////
// Add Title Tag Support with Regular Title Tag injection Fall back.
////////////////////////////////////////////////////////////////////

function coquitlamsharks_title_tag(){
    add_theme_support('title-tag');
}

add_action('after_setup_theme', 'coquitlamsharks_title_tag');

if (!function_exists('_wp_render_title_tag')) {

    function coquitlamsharks_render_title(){
        ?>
        <title><?php wp_title('|', true, 'right'); ?></title>
        <?php
    }

    add_action('wp_head', 'coquitlamsharks_render_title');

}

////////////////////////////////////////////////////////////////////
// Register Custom Navigation Walker include custom menu widget to use walkerclass
////////////////////////////////////////////////////////////////////

require_once('lib/wp_bootstrap_navwalker.php');
require_once('lib/bootstrap-custom-menu-widget.php');

////////////////////////////////////////////////////////////////////
// Register Menus
////////////////////////////////////////////////////////////////////

register_nav_menus(
    array(
        'main_menu' => 'Main Menu',
        'footer_menu' => 'Footer Menu'
    )
);

////////////////////////////////////////////////////////////////////
// Add support for a featured image and the size
////////////////////////////////////////////////////////////////////

add_theme_support('post-thumbnails');
set_post_thumbnail_size(300, 300, true);

////////////////////////////////////////////////////////////////////
// Adds RSS feed links to for posts and comments.
////////////////////////////////////////////////////////////////////

add_theme_support('automatic-feed-links');


////////////////////////////////////////////////////////////////////
// Set Content Width
////////////////////////////////////////////////////////////////////

if (!isset($content_width)) $content_width = 800;

?>