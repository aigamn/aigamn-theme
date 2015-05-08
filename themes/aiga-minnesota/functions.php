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

add_filter( "single_template", "get_custom_cat_template" ) ;


// Events

function isRecurring(){
  return true;
}

function getNextRecurringEventLink(){
  // link or empty
}

function getWrapUpLink(){
  // link or empty
}

function getRegistrationLink(){
  // link or empty
}

function isActive(){
  
}

function getFooter(){
  // this can wait
}


?>
