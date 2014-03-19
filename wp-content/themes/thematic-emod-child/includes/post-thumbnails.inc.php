<?php

/**
 * Add support for theme thumbnails
 * Refer to @http://markjaquith.wordpress.com/2009/12/23/new-in-wordpress-2-9-post-thumbnail-images/
 * for a good reference on how to use post thumbnails
 */
add_theme_support( 'post-thumbnails' );							// Enable thumbnails for posts and pages
// add_theme_support( 'post-thumbnails', array( 'post' ) );		// Add support for just posts
// add_theme_support( 'post-thumbnails', array( 'page' ) );		// Add support for just pages

/**
 * Add some default thumbnail sizes
 * Change these at your discretion
 */
set_post_thumbnail_size( 50, 50, true );
add_image_size( 'small', 100, 100 );
add_image_size( 'medium', 250, 250, true );
add_image_size( 'large', 400, 400 );
?>