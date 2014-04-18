<?php
	/** 
	 * Template Name: About Page 
	 * This is a template for the about page and its children.
	 * Update: 2014-04 (tmw)
	 */
    // calling the header.php
    get_header();

    // action hook for placing content above #container
    thematic_abovecontainer();

?>
	<link href="<?php bloginfo('wpurl'); ?>/wp-content/themes/thematic-emod-child/styles/button.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="<?php bloginfo('wpurl'); ?>/wp-includes/js/jquery/jquery.js"></script>
	<script type="text/javascript">
	$(document).ready(function() {

		$(".block").hover(function() {
			$(this).toggleClass("active");

      //$(this).next("div").toggleClass("hidden");
			//$(this).next("div").stop('true','true').slideToggle("slow");
		});
	});
	</script>

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