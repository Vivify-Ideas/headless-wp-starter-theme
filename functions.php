<?php
add_theme_support( 'custom-logo' );
add_theme_support( 'menus' );

// wordpress api for logo extension
add_action( 'rest_api_init', 'add_logo_to_JSON' );
function add_logo_to_JSON() {
register_rest_field( 'page', 'page_logo_src', array( // post for where to register - page_logo_src is the name for api
    'get_callback'    => 'get_logo_src',
    'update_callback' => null,
    'schema'          => null,
    )
  );
}

function get_logo_src( $object, $field_name, $request ) {
  $size = 'full';
  $custom_logo_id = get_theme_mod( 'custom_logo' );
  $feat_img_array = wp_get_attachment_image_src($custom_logo_id, $size, true);
  return $feat_img_array[0];
}