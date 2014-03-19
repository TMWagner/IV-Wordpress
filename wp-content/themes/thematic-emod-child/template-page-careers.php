<?php
	/** 
	 * Template Name: Career Page 
	 * This is a template for the career page and its children. 
	 */
    // calling the header.php
    get_header();

    // action hook for placing content above #container
    thematic_abovecontainer();

    // We'll process this feed with all of the default options.
    $feed = new SimplePie();
     
    // Set which feed to process.
    $feed->set_feed_url('http://tbe.taleo.net/NA11/ats/servlet/Rss?org=INTELLECTUALVENTURES&cws=1&WebPage=SRCHR&WebVersion=0&_rss_version=2&location=1&department=65');
     
    // Run SimplePie.
    $feed->init();
     
    // This makes sure that the content is sent to the browser as text/html and the UTF-8 character set (since we didn't change it).
    $feed->handle_content_type();

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
                    <ul class="unstyled_loop_list">
                        <?php foreach ($feed->get_items() as $item): ?>
                        <li>
                            <h4><a href="<?php echo $item->get_permalink() ?>" target="_new"><?php echo $item->get_title() ?></a></h4>
                        </li>
                        <?php endforeach; ?>
                    </ul>
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