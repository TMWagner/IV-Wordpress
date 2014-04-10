<?php
	/** 
	 * Template Name: Team Page 
	 * This is a template for the team page and its children.
	 * Update: 2014-04-10 (tmw)
	 */
    // calling the header.php
    get_header();

    // action hook for placing content above #container
    thematic_abovecontainer();

?>
	<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet"></link>
	<script type="text/javascript" src="<?php bloginfo('wpurl'); ?>/wp-includes/js/jquery/jquery.js"></script>
	<script type="text/javascript">
		
		$(function() {
				$("div.tease").not("nameTitle").click(fnClick);
		});
		
		function fnClick() {
				$(this).find("i.arrow").toggleClass("fa-caret-down fa-caret-right");
				$(this).find("img.mugPic").toggleClass("smallpic largepic");
				//$("img.mugPic").toggleClass("smallpic largepic");
	
				$(this).next("div").slideToggle("slow");
		}
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