<?php
/**
 * Initalize the Theme
 */
function childtheme_create_stylesheet() {
    $templatedir = get_bloginfo('template_directory');
    $stylesheetdir = get_bloginfo('stylesheet_directory');
    ?>
    <link rel="stylesheet" type="text/css" href="<?php echo $templatedir ?>/library/styles/reset.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo $templatedir ?>/library/styles/typography.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo $templatedir ?>/library/styles/images.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo $templatedir ?>/library/layouts/2c-r-fixed.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo $templatedir ?>/library/styles/18px.css" />
    
    <link rel="stylesheet" type="text/css" href="<?php echo $stylesheetdir ?>/style.css" />
    
    <?php    
}
add_filter('wp_enqueue_scripts', 'childtheme_create_stylesheet');

function initTheme() {
	
	$options = get_option('sample_theme_options');
	
	if ($options['disable_blog_title'])
		remove_action('thematic_header','thematic_blogtitle', 3);
	if ($options['disable_blog_description'])
		remove_action('thematic_header','thematic_blogdescription', 5);
	if ($options['disable_menu'])
		remove_action('thematic_header','thematic_access',9);
}

function initStylesheet() {
	/*
	$options = get_option('sample_theme_options');
	$templatedir = get_bloginfo('template_directory');
	$stylesheetdir = get_bloginfo('stylesheet_directory');
	?>
	<?php if (!$options['disable_css_reset']) : ?>
		<!-- Reset browser defaults -->
		<link rel="stylesheet" type="text/css" href="<?php echo $templatedir ?>/library/styles/reset.css" />
	<?php endif; ?>
	
	<?php if (!$options['disable_css_typography']) : ?>
		<!-- Apply basic typography styles -->
		<link rel="stylesheet" type="text/css" href="<?php echo $templatedir ?>/library/styles/typography.css" />
	<?php endif; ?>
	
	<?php if (!$options['disable_css_images']) : ?>
		<!-- Apply basic image styles -->
		<link rel="stylesheet" type="text/css" href="<?php echo $templatedir ?>/library/styles/images.css" />
	<?php endif; ?>
			
	<!-- Apply a basic layout -->
	<link rel="stylesheet" type="text/css" href="<?php echo $templatedir ?>/library/layouts/2c-r-fixed.css" />
	
	<!-- FontDeck Fonts -->
	<?php 
	$theSiteProtocol = 'http';
	if( isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on' ) { 
    	$theSiteProtocol = 'https';
	} 
	?>
    <!--<link rel="stylesheet" href="<?php echo $theSiteProtocol ?>://f.fontdeck.com/s/css/cHXus6m9x/axZqygd6Hp4JwDbfM/<?php echo $_SERVER['SERVER_NAME']; ?>/14841.css" type="text/css" />
	-->
	<?php if (!$options['disable_css_plugins']) : ?>
		<!-- Prepare theme for plugins -->
		<link rel="stylesheet" type="text/css" href="<?php echo $templatedir ?>/library/styles/plugins.css" />
	<?php endif; ?>
	
	<?php if (!$options['disable_css_suckerfish_menu']) : ?>
		<!-- Apply core suckerfish nav styles -->
		<link rel="stylesheet" type="text/css" href="<?php echo $stylesheetdir ?>/styles/suckerfish-menu.css" />
	<?php endif; ?>
	
	<!-- The rest of the styling -->
	<link rel="stylesheet" type="text/css" href="<?php echo $stylesheetdir ?>/style.css" />
	<?php
*/}


/**
 * Initalize the Header - Add any information inside the HEAD tags
 * This is extremelly important when using 3rd party scripts
 * in your website (which is usually the case in most situations)
 */
function initHeader() { ?>
	<?php if (is_front_page()): ?>
		<!-- Add code to front page -->
	<?php else: ?>
		<!-- Add code to all other pages -->
	<?php endif; ?>

	<title>EMOD Global Health</title>
<!--
	<script type="text/javascript">
        WebFontConfig = {
          custom: { families: ['Din Display Pro Light', 'Din Display Pro Regular', 'Din Display Pro Thin'],
          urls: [ ('https:' == document.location.protocol ? 'https' : 'http') + '://f.fontdeck.com/s/css/cHXus6m9x/axZqygd6Hp4JwDbfM/<?php echo $_SERVER['SERVER_NAME']; ?>/14841.css' ] }
        };
        
        (function() {
          var wf = document.createElement('script');
          wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
          '://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
          wf.type = 'text/javascript';
          wf.async = 'true';
          var s = document.getElementsByTagName('script')[0];
          s.parentNode.insertBefore(wf, s);
        })();

        jQuery(document).ready(function () {
        	
        });
        
    </script>
-->    
<?php }

/**
 * Custom Header Code - I usually find the default thematic header code insufficent
 * in everyday applications. 
 * Note: this is where the logo png file is set!!! logo here!!! 
 */
function customHeader() { ?>
    <div class="header-inner">
<!--        <div class="logo"><a href="<?php bloginfo('url') ?>"><img height="50" align="middle" src="<?php echo get_bloginfo('stylesheet_directory'); ?>/images/EmodWhiteTextPlusIVLABhorizontalSm.png" alt="EMOD Group of Intellectual Ventures Lab" /> </a></div>
-->
        <div class="logo"><a href="http://intellectualventureslab.com" target="new"><img height="70" align="middle" src="<?php echo get_bloginfo('stylesheet_directory'); ?>/images/EMODlogoRedIVLBlue.png" alt="EMOD Global Health of Intellectual Ventures Lab" /> </a></div>
    </div>
<?php }


/**
 * Hero Area - This will be below the Header and will usually 
 * have some sort of call to action or featured content
 */
function heroArea() { ?>
	<?php if (is_front_page()): ?>
		<!-- Hero areas are usually on the front page of a website
			 and usually some sort of media slider -->
	<?php else: ?>
		<!-- But there's always room to be creative -->
	<?php endif ?>
<?php }


/**
 * Yoast Wordpress SEO Plugin Hack
 **/
 
/*function initDoctitle() {
	return wp_title('', 0);
}*/
function childtheme_doctitle() {
 
 // You don't want to change this one.
 $site_name = "EMOD Global Health"; //get_bloginfo('name'); We are using a hack, we put the website main title here, AND DO NOT INCLUDE IT IN THE GENERAL BLOG TITLE INFO IN THE ADMIN PAGE SO THAT IT WONT SHOW UP IN THE HEADER BAR UNDER THE LOGO...for some reason ryan's ivl site doesnt need this hack
 
 // But you like to have a different separator
 $separator = '&raquo;';
 
 // We will keep the original code
 if ( is_single() ) {
 $content = single_post_title('', FALSE);
 }
 elseif ( is_home() || is_front_page() ) {
 $content = get_bloginfo('description');
 }
 elseif ( is_page() ) {
 $content = single_post_title('', FALSE);
 }
 elseif ( is_search() ) {
 $content = __('Search Results for:', 'thematic');
 $content .= ' ' . wp_specialchars(stripslashes(get_search_query()), true);
 }
 elseif ( is_category() ) {
 $content = __('Category Archives:', 'thematic');
 $content .= ' ' . single_cat_title("", false);;
 }
 elseif ( is_tag() ) {
 $content = __('Tag Archives:', 'thematic');
 $content .= ' ' . thematic_tag_query();
 }
 elseif ( is_404() ) {
 $content = __('Not Found', 'thematic');
 }
 else {
 $content = get_bloginfo('description');
 }
 
 if (get_query_var('paged')) {
 $content .= ' ' .$separator. ' ';
 $content .= 'Page';
 $content .= ' ';
 $content .= get_query_var('paged');
 }
 
 // until we reach this point. You want to have the site_name everywhere?
 // Ok .. here it is.
 $my_elements = array(
 'site_name' => $site_name,
 'separator' => $separator,
 'content' => $content
 );
 
 // and now we're reversing the array as long as we're not on home or front_page
 if (!( is_home() || is_front_page() )) {
 $my_elements = array_reverse($my_elements);
 }
 
 // And don't forget to return your new creation
 return $my_elements;
}
 
// Add the filter to the original function
add_filter('thematic_doctitle', 'childtheme_doctitle');

//change menu arguments
function menu_args( $args ) {
    $args = array( 'menu_class' => 'ivl-menu', //default class that will apply default styles
    		'container_class' => 'menu', //default class
    		'depth' => 1, //limit the drop downs to only 2nd level
    		'walker'=> new EMOD_Nav_Walker
    	);
    return $args;
}
add_filter( 'thematic_nav_menu_args', 'menu_args' );

//experimental stuff to see if I can add another menu, but make it look like I'm  just extending the current one
// Register the new menus
function register_my_menus() {
	register_nav_menus(
		array(
			'primary-menu' => __( 'Primary Menu' ),
			'member-menu' => __( 'Member Menu' ),

		)
	);
}
add_action( 'init', 'register_my_menus' );

///pick the menu
function pick_menu() {

if ( is_user_logged_in() ) {
     wp_nav_menu( array( 'theme_location' => 'member-menu', 'container_class'=> 'menu', 'depth' => 1, 'menu_class'=>'ivl-menu', 'fallback_cb'=>'', 'walker'=> new EMOD_Nav_Walker) );
} else {
     wp_nav_menu( array( 'theme_location' => 'primary-menu', 'container_class'=> 'menu', 'depth' => 1, 'menu_class'=>'ivl-menu', 'fallback_cb'=>'', 'walker'=> new EMOD_Nav_Walker ) );
}

}

//add_action('init','pick_menu');
//add_filter( 'thematic_nav_menu_args', 'pick_menu' );

class EMOD_Nav_Walker extends Walker_Nav_Menu {
	/**
	 * @see Walker::start_el()
	 * @since 3.0.0
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param object $item Menu item data object.
	 * @param int $depth Depth of menu item. Used for padding.
	 * @param int $current_page Menu item ID.
	 * @param object $args
	 * 
	 * This function just checks $item against a set array of menu item elements
	 * that should only be shown to logged in users, and hidden from the public
	 */
	function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) 
	{
	
		$members_only_menus = array("download", "EMOD software documentation", "forum", "EMOD software download", "EMOD discussion forum"); //this is case sensitive
		
		//note that news category is public, but it has a subcategory of news-membersonly that is only for
		//logged in users. however, this is dealt with using the Role Scoper plugin...only loggedin users, as a group
		//are given access to the subcategory, but everyone has access to the general news category
		//that is why the menu item News is not in this members only array list
		//Special NOTE: since documentation doesn't have a page, and therefore an 'attribute/SLUG' the attribute that is used is apparently the tooltip
		//ie..  this does not appear to be the same case as with download and forum, as they both still disappeared for non-logged in
		//users even when I changed their menu tooltips, i.e. their Title Attribute in the menus section.
		//PERHAPS WP DEFAULTS TO MENU TITLE ATTRIBUTE IF IT CAN'T FIND A PAGE OR CATEGORY WHICH HAS OTHER ATTRIBUTES LIKE
		//A SLUG???  So I've added the other two menu title attributes also...just to be safe.  it works, so must be careful to not use these same terms for any publicly allowed page/post or menu item.
		
		if (in_array($item->attr_title, $members_only_menus)) {
			if (is_user_logged_in() ) {
				parent::start_el(&$output, $item, $depth, $args, $id);
			} //else don't show since user is not logged in
		} else { 
				parent::start_el(&$output, $item, $depth, $args, $id);
		}
					
	}
}

// add a shortcode for bloginfo so I can easily call up the 
//subdirectory from a theme that I need, as in the downloads page

/** 
 * Shortcode for bloginfo() 
 * 
 * Usage: [bloginfo key="template_url"] 
 * 
 * @see http://codex.wordpress.org/Template_Tags/get_bloginfo 
 * @source http://blue-anvil.com/archives/8-fun-useful-shortcode-functions-for-wordpress 
 * @param array $atts 
 * @return string 
 */ 
function bloginfo_shortcode($atts) 
{ 
    extract( shortcode_atts( array( 'key' => 'name' ), $atts ) ); 
    return get_bloginfo( $key ); 
} 
add_shortcode( 'bloginfo', 'bloginfo_shortcode' ); 


//add code to stop comment template from being used in News category (and sub-category, Member News)
//couldn't find a way to tell WP to allow comments on Forum, but no other blog post category
//EXCEPT by remembering to turn off comments when editing the news post...this will stop commenting from
//working, but will NOT fix the text that wp generates i.e. the 'post a comment' link is still there, but 
//just doesn't work
//so currently this will act as a stopgap against erroneous pages, news/membernews commenting if there is
//a blip

add_filter( 'comments_template', 'remove_comments_template_on_news_posts', 11 );
 
function remove_comments_template_on_news_posts( $file ) {
 if ( is_page() || in_category('news') || in_category('news-membersonly') )
 $file = STYLESHEETPATH . '/news-cat-disable-comments.php';
 return $file;
 }

//end experimental section





// shortening excerpt length for homepage
/*
function new_excerpt_length($length) {
	return 49;
}
add_filter('excerpt_length', 'new_excerpt_length');*/

// Disable the Admin Bar By Default 
add_filter( 'show_admin_bar', '__return_false' );

// Remove the Admin Bar preference in user profile to remove temptationÃƒÆ’Ã†â€™Ãƒâ€ Ã¢â‚¬â„¢ÃƒÆ’Ã¢â‚¬Â ÃƒÂ¢Ã¢â€šÂ¬Ã¢â€žÂ¢ÃƒÆ’Ã†â€™ÃƒÂ¢Ã¢â€šÂ¬Ã…Â¡ÃƒÆ’Ã¢â‚¬Å¡Ãƒâ€šÃ‚Â¢ÃƒÆ’Ã†â€™Ãƒâ€ Ã¢â‚¬â„¢ÃƒÆ’Ã¢â‚¬Å¡Ãƒâ€šÃ‚Â¢ÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Â¢ÃƒÆ’Ã‚Â¢ÃƒÂ¢Ã¢â€šÂ¬Ã…Â¡Ãƒâ€šÃ‚Â¬ÃƒÆ’Ã¢â‚¬Â¦Ãƒâ€šÃ‚Â¡ÃƒÆ’Ã†â€™ÃƒÂ¢Ã¢â€šÂ¬Ã…Â¡ÃƒÆ’Ã¢â‚¬Å¡Ãƒâ€šÃ‚Â¬ÃƒÆ’Ã†â€™Ãƒâ€ Ã¢â‚¬â„¢ÃƒÆ’Ã‚Â¢ÃƒÂ¢Ã¢â‚¬Å¡Ã‚Â¬Ãƒâ€¦Ã‚Â¡ÃƒÆ’Ã†â€™ÃƒÂ¢Ã¢â€šÂ¬Ã…Â¡ÃƒÆ’Ã¢â‚¬Å¡Ãƒâ€šÃ‚Â¦ 
remove_action( 'personal_options', '_admin_bar_preferences' );

function childtheme_override_siteinfoclose() { 
    $stDirectory = get_stylesheet_directory_uri();
?>
   <div class="iv-footer"><a href="http://www.intellectualventures.com"><img src="<?php echo $stDirectory ?>/images/iv_footer.png" alt="ideas by Intellectual Ventures" /></a></div>
</div><!-- #siteinfo -->

<?php
}
add_action('thematic_footer', 'thematic_siteinfoclose', 40);

function add_analytics() {
?>
<script type="text/javascript">

	var _gaq = _gaq || [];
	  _gaq.push(['_setAccount', 'UA-35257653-1']);
	  _gaq.push(['_trackPageview']);
	
	  (function() {
	    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
	    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
	    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	  })();
</script>
<?php
}
add_action('thematic_after','add_analytics');


// adding jCarousel for jQuery
function my_scripts_method() {
// register your script location, dependencies and version
   wp_register_script('jcarousel',
       get_stylesheet_directory_uri() . '/scripts/jquery.jcarousel.js' );
   // enqueue the script
   wp_enqueue_script('jcarousel');            
}    
add_action('wp_enqueue_scripts', 'my_scripts_method');

// adding social networking sidebar box..for eMOD, for now, don't add in social
function blog_social() {
 ?>
 <div class="blog_social">
    <div class="widget_blog_social">
        <h3>Subscribe and Follow</h3>
        <ul>
            <li><a class="sidebar_link_rss hide-text reverse-fade" href="<?php bloginfo('rss_url'); ?>">RSS Feed</a></li>
            <li><a class="sidebar_link_twitter hide-text reverse-fade" href="http://www.twitter.com/ivinvents" target="_new">Twitter</a></li>
            <li><a class="sidebar_link_facebook hide-text reverse-fade" href="http://www.facebook.com/intven" target="_new">Facebook</a></li>
            <li><a class="sidebar_link_email hide-text reverse-fade" href="mailto:lab@intven.com">Email</a></li>
        </ul>
    </div>
 </div>
 <?php   
}
//add_action('thematic_betweenmainasides','blog_social');

// registering custom sidebars for IVL
function my_register_sidebars() {

	/* Register the 'about' sidebar. */
	/*register_sidebar(
		array(
			'id' => 'about',
			'name' => __( 'About' ),
			'description' => __( 'This sidebar is used in the about section of the site.' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		)
	);*/
	
	/* Register the 'about' sidebar. */
	/*register_sidebar(
		array(
			'id' => 'aboutleft',
			'name' => __( 'About Left Sidebar' ),
			'description' => __( 'This sidebar is used in the about section of the site.' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		)
	);*/
	
	/* Register the 'team' sidebar. */
	/*register_sidebar(
		array(
			'id' => 'team',
			'name' => __( 'Team' ),
			'description' => __( 'This sidebar is used in the team section of the site.' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		)
	);*/
	
	/* Register the 'blog' sidebar. */
	/*register_sidebar(
		array(
			'id' => 'blog',
			'name' => __( 'Blog' ),
			'description' => __( 'This sidebar is used in the blog section of the site.' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		)
	);*/

	/* Repeat register_sidebar() code for additional sidebars. */
}
add_action( 'widgets_init', 'my_register_sidebars' );


// making menu widget titles links
function widget_title_link( $title ) {
    if( $title == "Facilities" ) {
        return "<a href=\"/?page_id=3337\">".$title."</a>";
    }
    elseif( $title == "Projects" ) {
        return "<a href=\"/?page_id=6\">".$title."</a>";
    }
    else {
        return $title;
    }
}
add_filter( 'widget_title', 'widget_title_link' );

// Registering Custom Post Type for homepage ads
add_action( 'init', 'ivlab_hp_whats_new_post_type' );
function ivlab_hp_whats_new_post_type() {
    register_post_type('ivlab_hp_whats_new', array(
        'labels' => array('name'=>__('Homepage Minors'),'singular_name'=>__('Homepage Minor')),
        'public' => true,
        'description' => 'These posts show up on the homepage under "What\'s New."',
        'show_ui'=> true,
        'show_in_menu'=> true,
        'menu_position'=> 5, // below posts
        'supports'=> array('title','editor','revisions','page-attributes'),
        'show_in_nav_menus'=> false
        )
    );
}

// Registering Custom Post Type for careers
add_action( 'init', 'ivlab_careers_post_type' );
function ivlab_careers_post_type() {
    register_post_type('ivlab_careers', array(
        'labels' => array('name'=>__('Careers'),'singular_name'=>__('Career')),
        'public' => true,
        'description' => 'This is where you post new careers to the Careers section of the website.',
        'show_ui'=> true,
        'show_in_menu'=> true,
        'menu_position'=> 5, // below posts
		'query_var'=> true,
		'rewrite' => array('slug' => 'careers', 'with_front' => true),
        'supports'=> array('title','editor','revisions','page-attributes','excerpt'),
        'show_in_nav_menus'=> false
        )
    );
}

//Add the meta box callback function
function admin_init(){
add_meta_box("career_parent_id", "Career Parent ID", "set_career_parent_id", "ivlab_careers", "normal", "low");
}
add_action("admin_init", "admin_init");

//Meta box for setting the parent ID
function set_career_parent_id() {
  global $post;
  $custom = get_post_custom($post->ID);
  $parent_id = $custom['parent_id'][0];
  ?>
  <p>Please specify the ID of the page or post to be a parent to this Career.</p>
  <p>Leave blank for no hierarchy.&nbsp; Careers will appear from the server root with no associated parent page or post.</p>
  <input type="text" id="parent_id" name="parent_id" value="<?php echo $post->post_parent; ?>" />
  <?php
  // create a custom nonce for submit verification later
  echo '<input type="hidden" name="parent_id_noncename" value="' . wp_create_nonce(__FILE__) . '" />';
}

// Save the meta data
function save_career_parent_id($post_id) {
  global $post;

  // make sure data came from our meta box
  if (!wp_verify_nonce($_POST['parent_id_noncename'],__FILE__)) return $post_id;
    if(isset($_POST['parent_id']) && ($_POST['post_type'] == "ivlab_careers")) {
      $data = $_POST['parent_id'];
      update_post_meta($post_id, 'parent_id', $data);
    }
}
add_action("save_post", "save_career_parent_id");



?>