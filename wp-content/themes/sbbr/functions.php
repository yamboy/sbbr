<?php

function sbbr_scripts_styles() {
  wp_enqueue_script ('main-js', get_template_directory_uri() . '/js/main.js', array('colorbox','jquery'), '1.1', true);
}
add_action ('wp_enqueue_scripts', 'sbbr_scripts_styles');

register_nav_menu ('primary', 'Main Menu');
register_nav_menu ('footer', 'Footer Links');
add_theme_support ( 'post-thumbnails' );

function custom_post_type_init() {
    $post_types = array(

        array(
	  'slug' => 'recipe',
	  'plural' => 'Recipes',
	  'singular' => 'Recipe',
	  'rewrite' => 'recipe',
	  'public' => true,
	  'archive' => true,
	  'supports' => array('title', 'revisions'),
	  'taxonomies' => array('category')),

        array(
	  'slug' => 'location',
	  'plural' => 'Locations',
	  'singular' => 'Location',
	  //'rewrite' => 'location',
	  'public' => false,
	  'archive' => false,
	  'supports' => array('title')),

    );

    foreach ($post_types as $pt) {
        $supports = array('title', 'editor', 'post_tags', 'thumbnail', 'excerpt', "comments");
        $public = isset($pt['public']) ? $pt['public'] : false;
        register_post_type($pt["slug"], array(
                'labels' => array(
                    'name' => $pt["plural"],
                    'singular_name' => $pt["singular"]
                ),
                'show_ui' => true,
                'publicly_queryable' => isset($pt["publicly_queryable"]) ? $pt["publicly_queryable"] : $public,
                'public' => isset($pt['public']) ? $pt['public'] : false,
                'has_archive' => isset($pt['archive']) ? $pt['archive'] : true,
                'rewrite' => array('hierarchical' => true, 'with_front' => true, 'slug' => isset($pt["rewrite"]) ? $pt["rewrite"] : $pt["slug"]),
                'supports' => isset($pt['supports']) ? $pt['supports'] : $supports,
                'taxonomies' => isset($pt['taxonomies']) ? $pt['taxonomies'] : false,
                'hierarchical' => false
            )
        );
    }
}
add_action('init', 'custom_post_type_init');


//Define custom image sizes here
//REFERENCE: https://codex.wordpress.org/Function_Reference/add_image_size
/*
function sbbr_image_sizes() {
    ///add_image_size('slider', 1300, 1000, true);
    //add_image_size('magnified', 1300, 1000, false);
    //add_image_size('detail', 600, 500, false);
    //add_image_size('list-grid', 400, 400, false);
}
add_action('init', 'sbbr_image_sizes', 0);
*/

/*
function sbbr_query_vars ($vars) {
  $vars[] = "by";
  return $vars;
}
add_filter( 'query_vars', 'sbbr_query_vars' );
*/

## add a custom body class
function sbbr_body_class ($classes) {
  global $post;
  $post_type = $post->post_type;
  if ($post_type == 'post') $post_type = 'news';
  $classes[] = 'type-'.$post_type;
  $classes[] = 'post-'.$post->post_name;
  return $classes;
}
add_action( 'body_class', 'sbbr_body_class');

## custom body id
function sbbr_body_id() {
  global $post;
  $id = preg_replace("#\s+#", " ", $post->post_name);
  $id = str_replace(' ', '-', strtolower($id) );
  echo ( '' != $id ) ? 'id="'.$id. '"': '' ;
}

//global $HUPSO_SHOW;
//$HUPSO_SHOW = false;
