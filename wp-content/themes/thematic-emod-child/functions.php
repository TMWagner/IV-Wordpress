<?php
/**
 * DO NOT REMOVE
 *
 * This is where all the REAL magic happens
 * Edit this file to make changes to the called actions below
 */
require_once ( 'includes/functions.inc.php' );

/**
 * Theme Options Page
 * Comment out the statement below to remove the options page
 */
require_once ( 'includes/theme-options.inc.php' );

/**
 * Post Thumbnail 
 * Comment out the statement below to remove
 * post thumbnail support from the theme
 */
require_once ( 'includes/post-thumbnails.inc.php' );

/**
 * RSS Feed Parsing
 * This is used in the careers section to pull the Taleo feed for Lab jobs
 */
require_once ('includes/simplepie.inc');

/**
 * THEMATIC ACTION AND FILTER HOOKS
 * All necessary Thematic based CMS style hooks and actions are found here
 */

/**
 * Initializes the theme -  Use this function to rearrange
 * and/or remove any Thematic actions .
 */
add_action('init','initTheme');

/**
 * Add info insdie the HEAD tag - Use this function to put
 * any necessary includes inside the <head> tag of your site. 
 */
add_action('wp_head', 'initHeader');

/**
 * Adds a custom header -  Use this function to add
 * the necessary code for a custom header in your site.
 */
add_action('thematic_header','customHeader', 3);

/**
 * Adds a custom Hero area -  Use this function to add
 * the necessary code for a Hero area in your site.
 */
add_action('thematic_belowheader','heroArea');


/**
 * Filters through the style sheet part of the theme.
 * This will allow us better performance and eventually
 * the ability to select layout and style options from the
 * theme options page
 */
add_filter('thematic_create_stylesheet', 'initStylesheet');

/**
 * Audit the Thematic <title> output so that
 * the Yoast Wordpress SEO Plugin will function correctly.
 **/

//add_filter('thematic_doctitle','initDoctitle');

