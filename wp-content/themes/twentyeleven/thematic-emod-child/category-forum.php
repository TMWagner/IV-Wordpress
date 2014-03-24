<?php
/**
 * Template Name: Blog
 *
 * This template allows you to display the latest posts on any page of the site.
 *
 */

    // calling the header.php
    get_header();

    // action hook for placing content above #container
    thematic_abovecontainer();

?>

		<div id="container">
	
			<?php thematic_abovecontent(); ?>
	
			<div id="content">
	<div id="forum-note">
<?php
	if (is_user_logged_in()) {
?>
	<!-- gentle reminder to be polite and courteous, and to not 	talk about highly sensitive issues -->
	<p>Please remember to be respectful of others, and also, 		remember, that while the forum is partners-only, highly 	sensitive issues might be better discussed through less 		public communication mediums.</p>
	
<?php
	}
	else {
?>
	<p>Sorry, the forum is only available to partners.  Please see the Partnership Inquiry page (in the sidebar under Research) if you would like to find out more about becoming one of EMOD's partners.</p>
<?php
	}
?> 
	</div> <!-- end of special div section -->

          
            <?php
			$wp_query = new WP_Query();
			$wp_query->query( array( 'category_name' => 'forum', 'posts_per_page' => get_option( 'posts_per_page' ), 'paged' => $paged ) );
			$more = 0;
			?>

				<?php 
            	
            	// create the navigation above the content
            	thematic_navigation_above();
				
            	// calling the widget area 'index-top'
            	get_sidebar('index-top');
				
            	// action hook for placing content above the index loop
            	thematic_above_indexloop();
				
            	// action hook creating the index loop
            	thematic_indexloop();
				
            	// action hook for placing content below the index loop
            	thematic_below_indexloop();
				
            	// calling the widget area 'index-bottom'
            	get_sidebar('index-bottom');
				
            	// create the navigation below the content
            	thematic_navigation_below();
            	
            	?>
				
			</div><!-- #content -->
		
			<?php thematic_belowcontent(); ?> 
		
		</div><!-- #container -->

<?php 

    // action hook for placing content below #container
    thematic_belowcontainer();

    // calling the standard sidebar 
    thematic_sidebar();
    
    // calling footer.php
    get_footer();

?>