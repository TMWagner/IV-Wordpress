<?php
	/** 
	 * Template Name: IDMHome 
	 * This is a template for a homepage.  Customize it as needed.
	 * Mod: (tmw) 2/24/2014
	 */
    // calling the header.php
    get_header();

    // action hook for placing content above #container
    thematic_abovecontainer();

?>
	<div id="container">
		<div id="content">
            <div id="home-left" class="cf">
							<div class="page-slideshow">   <!--Begin Slide Show region-->
								<script type="text/javascript">
										function modulecarousel_initCallback (carousel) {                		
										jQuery('.mycarousel-next').bind('click', function() {
												carousel.next();
												return false;
										});
								
										jQuery('.mycarousel-prev').bind('click', function() {
												carousel.prev();
												return false;
										});
								}
										jQuery(document).ready(function() {
												jQuery('#ivl-carousel').jcarousel({
														wrap:'circular',
														auto: 5,
														scroll: 1,
														initCallback: modulecarousel_initCallback,
														// This tells jCarousel NOT to autobuild prev/next buttons
												buttonNextHTML: null,
												buttonPrevHTML: null
												});
												jQuery('.page-slideshow').mouseover(function(e) {
														e.stopPropagation();
														jQuery('.jcarousel-scroll').fadeIn('fast');
												});
												jQuery('body').mouseover(function(e) {
														e.stopPropagation();
														jQuery('.jcarousel-scroll').fadeOut('fast');
												});
										});
								</script>
						<div id="ivl-carousel" class="jcarousel-skin-ivl">
								<ul>
										<li>
											<img src="<?php echo get_stylesheet_directory_uri() ?>/images/gallery/r4.png" />
											<!--<p class="gallery_caption">960 Test Picture - 1</p>   Caption in upper right-->
										</li>
									
										<li>
											<img src="<?php echo get_stylesheet_directory_uri() ?>/images/gallery/r3.png" />
											<!--<p class="gallery_caption">960 Test Picture - 1</p>   Caption in upper right-->
										</li>
										
										<li>
											<img src="<?php echo get_stylesheet_directory_uri() ?>/images/gallery/r2.png" />

										</li>										
										
										
										<li>
												<img src="<?php echo get_stylesheet_directory_uri() ?>/images/gallery/r1.png" />

										</li>


								</ul>
						</div>
						<div class="jcarousel-scroll">
							<a href="#prev" class="mycarousel-prev hide-text reverse-fade">Prev</a>
							<a href="#next" class="mycarousel-next hide-text reverse-fade">Next</a>
						</div>
          </div>
								

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
					<h1><?php the_title() ?> </h1>       
          <?php the_content() ?>
          <div class="entry-meta"><?php edit_post_link(); ?></div>
						
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