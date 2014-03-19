<?php
	/** 
	 * Template Name: hp_bk1 
	 * This is a template for a homepage.  Customize it as needed. 
	 */
    // calling the header.php
    get_header();

    // action hook for placing content above #container
    thematic_abovecontainer();

?>
    
	<div id="container">
		<div id="content">
            <div id="home-left" class="cf">
            
            
            <?php
            $sticky = get_option( 'sticky_posts');
            $loop = new WP_Query( array('p' => $sticky[0] ) );
            if( $loop->have_posts() ) :
                while( $loop->have_posts() ) :
                    $loop->the_post();
                    ?>
                    <div id="hero">
                        <?php 
                        if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
                            ?><a href="<?php echo get_permalink(); ?>"> <?php the_post_thumbnail('full'); ?></a>
                            <?php
                        } 
                        ?>
                        
                    </div> <!-- #hero -->
                    <div id="hero-description">
                        <h1><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h1>
                        <p class="hp-author"><?php the_date('j F Y'); ?> | <?php the_author(); ?></p>
                        <div class="hp-excerpt"><?php the_excerpt(); ?></div>
                        <div class="hp-more-link"><a class="continue-reading" href="<?php echo get_permalink(); ?>">Continue reading</a></div>
                    </div> <!-- hero-description -->
                    <?php
                endwhile;
            endif;
            ?>
            </div> <!-- #home-left -->
            lkd';lfk';ls;lsf
            <div id="home-right">
            <?php
                $aboutTitle = get_post_meta(2, 'hp_title', true);
                $aboutDescription = get_post_meta(2, 'hp_descrip', true);

                $blogTitle = get_post_meta(3258, 'hp_title', true);
                $blogDescription = get_post_meta(3258, 'hp_descrip', true);
                
                $joinTitle = get_post_meta(1715, 'hp_title', true);
                $joinDescription = get_post_meta(1715, 'hp_descrip', true);
                
                $meetTitle = get_post_meta(8, 'hp_title', true);
                $meetDescription = get_post_meta(8, 'hp_descrip', true);
                
                $contactTitle = get_post_meta(4, 'hp_title', true);
            ?>
                <div class="home-square square-read">
                    <a href="<?php echo get_permalink(3258); ?>">
                        <?php echo $blogTitle ?><br />
                        <span><?php echo $blogDescription ?></span>
                    </a>
                </div>
                <div class="home-square square-learn">
                    <a href="<?php echo get_permalink(2); ?>">
                        <?php echo $aboutTitle ?><br />
                        <span><?php echo $aboutDescription ?></span>
                    </a>
                </div>
                <div class="home-square square-join">
                    <a href="<?php echo get_permalink(1715); ?>" class="">
                        <?php echo $joinTitle ?><br />
                        <span><?php echo $joinDescription ?></span>
                    </a>
                </div>
                <div class="home-square square-meet">
                    <a href="<?php echo get_permalink(8); ?>">
                        <?php echo $meetTitle ?><br />
                        <span><?php echo $meetDescription ?></span>
                    </a>
                </div>
                <div class="home-square-2x1 square-contact">
                    <a class="square-link" href="<?php echo get_permalink(4); ?>"><?php echo $contactTitle ?></a>
                    <div class="contact-left">
                        <a href="http://www.twitter.com/ivinvents" target="_new" class="contact-twitter reverse-fade">Follow us on Twitter</a>
                        <a href="http://www.facebook.com/intven" target="_new" class="contact-fb reverse-fade">Join us on Facebook</a>
                    </div>
                    <div class="contact-right">
                        <p>
                            <span>Partner Inquiries</span><br />
                            <a href="mailto:lab@intven.com">lab@intven.com</a>
                        </p>
                        <p>
                            <span>Media Inquiries</span><br />
                            <a href="mailto:press@intven.com">press@intven.com</a>
                        </p>
                    </div>
                </div>
            </div>
            
		</div><!-- #content -->
	</div><!-- #container -->

<?php 

    // action hook for placing content below #container
    thematic_belowcontainer();
    
    // calling footer.php
    get_footer();

?>