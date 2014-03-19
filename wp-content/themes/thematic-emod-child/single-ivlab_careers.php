<?php
	/** 
	 * Template Name: Single Post Career
	 * This is a template for the career page and its children. 
	 */
    // calling the header.php
    get_header();

    // action hook for placing content above #container
    thematic_abovecontainer();

?>

	<div id="container">
		<div id="content">
            
            <div class="mid-col">
                
                <div class="page-content">
                    <?php
                    $postid = get_the_ID();
                    $pageTitle = get_post_meta($postid, 'short_name', true);
                    if($post->post_parent) { ?>
                        <?php
                        $ancestors = get_post_ancestors($postid);
                        $root = count($ancestors)-1;
                        $parentPostId = $ancestors[$root];
                        $parentPageTitle = get_post_meta($parentPostId, 'short_name', true); ?>
                        <?php $permalink = get_permalink($post->post_parent); ?>
                        <p><a href="<?php echo $permalink; ?>" title="<?php echo $parentPageTitle; ?>">&laquo; Back to All Current Openings</a></p>
                    <?php } ?>
                    <h1><?php the_title() ?></h1>
                    <?php the_content() ?>
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