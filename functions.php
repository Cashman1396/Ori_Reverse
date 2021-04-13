<?php

function mortal_theme() {
    
    wp_enqueue_style('bootstrap5', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css');
    wp_enqueue_script( 'boot5-js','https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js','','',true );
    wp_enqueue_style( 'style', get_template_directory_uri() . '/style.css' );
}
     add_action( 'wp_enqueue_scripts', 'mortal_theme' );

function setup_projects_cpt(){
    $labels = array(
        'name' => _x('Projects', 'post type general name'),
        'singular_name' => _x('Project', 'post type singular name'),
        'add_new' => _x('Add New', 'Project'),
        'add_new_item' => __('Add New Project'),
        'edit_item' => __('Edit Project'),
        'new_item' => __('New Project'),
        'all_items' => __('All Projects'),
        'view_item' => __('View Project'),
        'search_items' => __('Search Projects'),
        'not_found' => __('No Projects Found'),
        'not_found_in_trash' => __('No Projects found in the trash'),
        'parent_item_colon' => '',
        'menu_name' => 'Projects'
        );
    $args = array(
        'labels' => $labels,
        'description' => 'My Projects',
        'rewrite' => array('slug' => 'projects'),
        'public' => true,
        'menu_position' => 5,
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
        'has_archive' => true,
        'taxonomies' => array(''),
        'menu_icon' => 'dashicons-admin-multisite', //Find the appropriate dashicon here: https://developer.wordpress.org/resource/dashicons/
        );
    register_post_type('projects', $args);
}
add_action('init', 'setup_projects_cpt');


add_theme_support( 'post-thumbnails', array( 'projects' ) ); // adds thumbnail support for the Projects CPT


function get_relative_thumb( $size ) {
    global $post;
    if ( has_post_thumbnail()) {
      $absolute_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), $size);
     $domain = get_site_url(); // returns something like http://domain.com
     $relative_url = str_replace( $domain, '', $absolute_url[0] );
     return $relative_url;
    }
 }


 function register_my_menus() {
    register_nav_menus(
      array(
        'header-menu' => __( 'Header Menu' )
       )
     );
   }
   add_action( 'init', 'register_my_menus' );
  
 


?>