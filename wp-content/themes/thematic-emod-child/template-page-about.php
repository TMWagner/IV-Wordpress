<?php
	/** 
	 * Template Name: About Page 
	 * This is a template for the about page and its children. 
	 */
    // calling the header.php
    get_header();

    // action hook for placing content above #container
    thematic_abovecontainer();

?>

	<div id="container">
		<div id="content">
            <div class="mid-col">
                
                <div class="mid-col-banner">
<!--									<img src="idm_bld.png" width="620" height="300" />-->
									<img src="<?php echo get_stylesheet_directory_uri() ?>/images/zambia_edward.png" />

                </div>  <!--End of slideshow-->
                
                <div class="page-content">
                    <h1><?php the_title() ?></h1>
                    
                    <?php the_content() ?>
                    <div class="entry-meta"><?php edit_post_link(); ?></div>
                </div>
            </div> <!-- .mid-col -->
            <?php thematic_sidebar(); ?>
            
            
            
		</div><!-- #content -->
	</div><!-- #container -->

<?php 

    // action hook for placing content below #container
    thematic_belowcontainer();
    
    // calling footer.php
    get_footer();

?>