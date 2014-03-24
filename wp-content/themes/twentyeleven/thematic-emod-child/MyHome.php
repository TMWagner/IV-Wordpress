<?php
	/** 
	 * Template Name: MyHome 
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
            	

                <img align="middle" src="<?php bloginfo('stylesheet_directory'); ?>/images/banner.png" alt="<?php bloginfo('name'); ?>" > <!-- -->
                <!-- <p class="hp_post_date"> <span>this paragraph in left is hp post date</span> </p> -->
            </div> <!-- #home-left -->
            <!--
            
            <div id="home-about">
                <?php the_content(); ?>  <!--this is the area for the vision verbage which, in our case, comes the content of the page named Home-->
            <!-- </div> --->
            <div id="home-right" class="cf">
                
            	<?php //keeping this code snippet separate from the next one, just for easier maintainence
					//$homepage=get_page_by_title('Home');                
					//$homePage=get_page_by_path('home'); //passing in slug name, very likely slug is unique - can't say same about general title names                
					//$homeTitle = get_post_meta($homePage->ID, 'hp_title', true);
	                //$homeDescription = get_post_meta($homePage->ID, 'hp_descrip', true);
	                
	                //$emodPost = get_page_by_path('welcome-to-the-emod-website');
	                $emodPostSlug = 'what-is-emod-123456789unique';
	                $emodPostID = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_name = '$emodPostSlug'"); //$emodPost = get_post($emodPostID);
	                $emodPostTitle = get_post_meta($emodPostID, 'hp_title', true);
	                $emodPostDescription = get_post_meta($emodPostID, 'hp_descrip', true);
					
					$newsPosts_cat_ID = get_cat_ID('news');
					$newsPosts_cat_link = get_category_link($newsPosts_cat_ID);
					
					$forumPosts_cat_ID = get_cat_ID('forum');
					$forumPosts_cat_link = get_category_link($forumPosts_cat_ID);
					
	                $contactPage=get_page_by_path('about'); //passing in slug name, very likely slug is unique - can't say same about general title names                
					$contactTitle = get_post_meta($contactPage->ID, 'hp_title', true);
	                $contactDescription = get_post_meta($contactPage->ID, 'hp_descrip', true);
	                
					$downloadPage=get_page_by_path('download'); //passing in slug name, very likely slug is unique - can't say same about general title names                
					$downloadTitle = get_post_meta($downloadPage->ID, 'hp_title', true);
	                $downloadDescription = get_post_meta($downloadPage->ID, 'hp_descrip', true);

					$registrationPage=get_page_by_path('registration'); //passing in slug name, very likely slug is unique - can't say same about general title names                
					$registrationTitle = get_post_meta($registrationPage->ID, 'hp_title', true);
	                $registrationDescription = get_post_meta($registrationPage->ID, 'hp_descrip', true);

					$publicationPage=get_page_by_path('publications'); //passing in slug name, very likely slug is unique - can't say same about general title names                
					$publicationTitle = get_post_meta($publicationPage->ID, 'hp_title', true);
	                $publicationDescription = get_post_meta($publicationPage->ID, 'hp_descrip', true);

					$teamPage=get_page_by_path('our-team'); //passing in slug name, very likely slug is unique - can't say same about general title names                
					$teamTitle = get_post_meta($teamPage->ID, 'hp_title', true);
	                $teamDescription = get_post_meta($teamPage->ID, 'hp_descrip', true);

	                
            	?>
         
            	<?php
					$loggedinBool = 0; 			//do this check once, and use for each of the sub-divs in this div, home-right
					//if (empty($user_ID)) {
					if (is_user_logged_in()) {
						$loggedinBool = 1;
					}
					else {
						$loggedinBool = 0;
					}
				?>
				
				<!-- each home square button now has own personality in the gradient and 
				fit together as a whole gradient...these buttons have rollover to give some
				fun interaction/engagement factors to the site, we want them to play and 
				hang around, get comfortable -->
				<?php 
					if ($loggedinBool)
					{
					?>
					
					<div class="home-square square-one">
                		<a href="<?php echo get_permalink($contactPage->ID); ?>" title="about us">
                        	<?php echo $contactTitle ?><br />
							<span><?php echo $contactDescription ?></span>
                    	</a>
                	</div>                	
                	<div class="home-square square-two">
                    	<a href="<?php echo esc_url( $newsPosts_cat_link ); ?>" title="news">NEWS
                    		<br />
                    		<span>Current IDM news</span>
                    	</a>
                	</div>
                	
                	<div class="home-square square-three">
                		<a href="<?php echo get_permalink($downloadPage->ID); ?>" title="download">
			                  <?php echo $downloadTitle ?><br />
			                  <span>Software, data,<br/>and more</span><!--forcing line breaks for all browsers-->
<!-- <?php echo $downloadDescription ?></span> -->
			            </a>
                	</div>
                	
                	<div class="home-square square-four">
                		<a href="/idmdoc/" target="blank" title="documentation">
		                      DOCUMENTATION<br />
		                      <span>Will open in<br/> a new window</span>
		                </a>
                	</div>
                	
                	<div class="home-square square-five last">
                		<a href="<?php echo esc_url( $forumPosts_cat_link ); ?>" title="forum">FORUM
                    		<br />
                    		<span>IDM user's forum</span>
                    	</a>
                	</div>

                	
                	

				<?php
					}
					else //not logged in, only show three buttons that are much wider
					{
					?>
					
					<div class="home-square square-one">
                		<a href="<?php echo get_permalink($contactPage->ID); ?>" title="about us">
                        	<?php echo $contactTitle ?><br />
							<span><?php echo $contactDescription ?></span>
                    	</a>
                	</div>                	
                	<div class="home-square square-two">
                    	<a href="<?php echo esc_url( $newsPosts_cat_link ); ?>" title="news">NEWS
                    		<br />
                    		<span>Current EMOD news</span>
                    	</a>
                	</div>
                	
                	<div class="home-square square-three">
                		<div class="fakeLink">
                		<a href="<?php echo get_permalink($registrationPage->ID); ?>" title="go to inquiry form">
			                  <?php echo $downloadTitle ?><br />
			                  <span>(Partners Only)</span>
			            </a>
			            </div>
                	</div>
                	
                	<div class="home-square square-four">
                		<div class="fakeLink">
                		<a href="<?php echo get_permalink($registrationPage->ID); ?>" title="go to inquiry form">
		                      DOCUMENTATION<br />
		                      <span>(Partners Only)</span>
		                </a>
		                </div>

                	</div>
                	
                	<div class="home-square square-five last">
                		<div class="fakeLink">
                		<a href="<?php echo get_permalink($registrationPage->ID); ?>" title="go to inquiry form">
                			FORUM<br />
                    		<span>(Partners Only)</span>
                    	</a>
                    	</div>

                	</div>

                	
                	

				<?php
					}
					?>
			</div>
            <div id="home-featured">
                
                <ul>
                <?php 
                $loop = new WP_Query( array('showposts' => 4, 'category_name' => 'news' ) ); //will pick up news category and all subchildren including members only news UP to 4 posts total in that category
                //check if we are dealing with a member or not to show all news versus public news
                if (is_user_logged_in()) {
                	$newsitems = array('news', 'news-membersonly');
                } else {
                	$newsitems = array('news');
                }
							
                if( $loop->have_posts() ) :
                    while( $loop->have_posts() ) :
												
                        $loop->the_post();
                        
                        if (in_category($newsitems) && (has_post_thumbnail() )) {
                          
//above: look for public news, i.e. category news but not
// news-membersonly, check and be sure to exclude the members
// only as it is a subcategory of news
                        ?>
                        
                        <li>
                            <div class="hp_post_thumbnail">
                                
                                <a href="<?php the_permalink() ?>"><?php the_post_thumbnail('thumbnail') ?></a>
                            </div>
                            <div class="hp_post_text">
                                <p class="hp_post_date"><?php the_date() ?></p>
                                <h3><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h3>
                                <div class="hp_post_excerpt"><?php the_excerpt() ?></div>
                            </div>
                        </li>
                        <?php
                        }
                    endwhile;
                    wp_reset_postdata();
                endif;
                ?>
                </ul>
            </div>
            <?php thematic_sidebar(); ?>
            
            
		</div><!-- #content -->
	</div><!-- #container -->

<?php 

    // action hook for placing content below #container
    thematic_belowcontainer();
    
    // calling footer.php
    get_footer();

?>