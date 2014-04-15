<?php
	/** 
	 * Template Name: Download Page 
	 * This is a template for the download page and its children. 
	 */
    // calling the header.php
    get_header();

    // action hook for placing content above #container
    thematic_abovecontainer();

?>

  <link href="<?php bloginfo('wpurl'); ?>/wp-content/themes/thematic-emod-child/styles/button.css" rel="stylesheet" type="text/css" />

	<div id="container">
		<div id="content">
            <div class="mid-col">
                
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