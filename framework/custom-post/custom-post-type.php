<?php

add_action('init', 'o_register_project_support_type');
add_action('init', 'o_register_download');

## ADD PROJECT SUPPORT POST TYPE

function o_register_project_support_type () {

$labels = array(

    'name' => _x('Project Items', 'post type general name'),
    'singular_name' => _x('Project Item', 'post type singular name'),
    'add_new' => _x('Add New', 'project'),
    'add_new_item' => __('Add A New Project Item'),
    'edit_item' => __('Edit Project Item'),
    'new_item' => __('New Project Item'),
    'view_item' => __('View Project Item'),
    'search_items' => __('Search Project Items'),
    'not_found' =>  __('No project items found'),
    'not_found_in_trash' => __('No project items found in Trash'), 
    'parent_item_colon' => '',
    'menu_name' => 'Projects'

);

$args = array (
'labels' => $labels,
'public' => true,
'show_ui' => true,
'publicly_queryable' => true,
'capability_type' => 'post',
'supports' => array ('thumbnail', 'editor', 'title', 'custom-fields', 'author'),
'menu_position' => 20, 
'menu_icon' => get_stylesheet_directory_uri() . '/images/koica_ico_16.png',
'query_var' => true,
'rewrite' => true
);

register_post_type('project', $args);

$g_labels = array(
    'name' => _x( 'Projects Location', 'taxonomy general name' ),
    'singular_name' => _x( 'Project Location', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Project Location' ),
    'popular_items' => __( 'Popular Project Location' ),
    'all_items' => __( 'All Project Location' ),
    'parent_item' => null,
    'parent_item_colon' => null,
    'edit_item' => __( 'Edit Projects Location' ), 
    'update_item' => __( 'Update Projects Location' ),
    'add_new_item' => __( 'Add New Project Location' ),
    'new_item_name' => __( 'New Project Location Name' ),
    'separate_items_with_commas' => __( 'Separate Project Location with commas' ),
    'add_or_remove_items' => __( 'Add or remove Project Location' ),
    'choose_from_most_used' => __( 'Choose from the most used Project Location' ),
    'menu_name' => __( 'Categories' ),
);
  
register_taxonomy("projects-categories", array("project"), array("hierarchical" => true, "label" => "Projects", "singular_label" => "Projects Category", "labels" => $g_labels, 'query_var' => true, "rewrite" => true, "show_in_nav_menus" => true));

add_post_type_support('projects', 'thumbnail'); 

}

## ADD DOWNLOAD CUSTOM POST TYPE

function o_register_download () {

$labels = array(

    'name' => _x('Download Items', 'post type general name'),
    'singular_name' => _x('Download Item', 'post type singular name'),
    'add_new' => _x('Add New', 'Download'),
    'add_new_item' => __('Add A New Download Item'),
    'edit_item' => __('Edit Download Item'),
    'new_item' => __('New Download Item'),
    'view_item' => __('View Download Item'),
    'search_items' => __('Search Download Items'),
    'not_found' =>  __('No Download items found'),
    'not_found_in_trash' => __('No Download items found in Trash'), 
    'parent_item_colon' => '',
    'menu_name' => 'Downloads'

);

$args = array (
'labels' => $labels,
'public' => true,
'show_ui' => true,
'publicly_queryable' => true,
'capability_type' => 'post',
'supports' => array ('thumbnail', 'title', 'author'),
'menu_position' => 21,
'menu_icon' => get_stylesheet_directory_uri() . '/images/koica_ico_16.png', 
'query_var' => true,
'rewrite' => true
);

register_post_type('download', $args);

$g_labels = array(
    'name' => _x( 'Downloads Category', 'taxonomy general name' ),
    'singular_name' => _x( 'Download Category', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Download Category' ),
    'popular_items' => __( 'Popular Download Category' ),
    'all_items' => __( 'All Download Category' ),
    'parent_item' => null,
    'parent_item_colon' => null,
    'edit_item' => __( 'Edit Downloads Category' ), 
    'update_item' => __( 'Update Downloads Category' ),
    'add_new_item' => __( 'Add New Download Category' ),
    'new_item_name' => __( 'New Download Category Name' ),
    'separate_items_with_commas' => __( 'Separate Download Category with commas' ),
    'add_or_remove_items' => __( 'Add or remove Download Category' ),
    'choose_from_most_used' => __( 'Choose from the most used Download Category' ),
    'menu_name' => __( 'Categories' ),
);
  
register_taxonomy("downloads-categories", array("download"), array("hierarchical" => true, "label" => "Downloads", "singular_label" => "Downloads Category", "labels" => $g_labels, 'query_var' => true, "rewrite" => true, "show_in_nav_menus" => true));

add_post_type_support('downloads', 'thumbnail'); 

}

?>