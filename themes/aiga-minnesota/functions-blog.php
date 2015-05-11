<?php

function getBlogPosts() {
  $args = array(
    'post_type' => 'post',
  );
  $query = new WP_Query($args);
  return $query;
}

?>
