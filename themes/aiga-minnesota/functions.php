<?php

$categoryInfo = array(
  'cocktails-with-creatives' => array (
    'recurring' => true,
    'hasFooter' => true
  ),
  'luncheons' => array(
    'recurring' => true,
    'hasFooter' => true
  ),
  'design-show' => array(
    'recurring' => false,
    'hasFooter' => true
  ),
);

// Hooks

function get_custom_cat_template($single_template) {
  global $post;
  $cat = get_the_category( $post->ID );
  $catSlug = $cat[0]->slug;
  $single_template = dirname( __FILE__ ) . "/single-$catSlug.php";
  return $single_template;
}

add_filter( "single_template", "get_custom_cat_template" );

include 'event-functions.php';
include 'community-functions.php';

?>
