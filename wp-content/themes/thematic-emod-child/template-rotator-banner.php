<?php
	/** 
	 * Template Name: Rotator Banner
	 * This is a template dirived from the About page
	 */
    // calling the header.php
    get_header();

    // action hook for placing content above #container
    thematic_abovecontainer();

?>

	<div id="container">
		<div id="content">
            <div class="mid-col">
                <?php if(is_page(2)) { ?>
								
								
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
                                <img src="<?php echo get_stylesheet_directory_uri() ?>/images/gallery/chem_684.jpg" />
                                <p class="gallery_caption">The Chemistry Lab</p>
                            </li>
                            <li>
                                <img src="<?php echo get_stylesheet_directory_uri() ?>/images/gallery/machine_684.jpg" />
                                <p class="gallery_caption">The Machine Shop</p>
                            </li>
                            <li>
                                <img src="<?php echo get_stylesheet_directory_uri() ?>/images/gallery/warehouse_684.jpg" />
                                <p class="gallery_caption">Our Warehouse</p>
                            </li>
                            <li>
                                <img src="<?php echo get_stylesheet_directory_uri() ?>/images/gallery/supercomp_684.jpg" />
                                <p class="gallery_caption">Our Supercomputer</p>
                            </li>
                            <li>
                                <img src="<?php echo get_stylesheet_directory_uri() ?>/images/gallery/photonic_684.jpg" />
                                <p class="gallery_caption">Photonic Fence </p>
                            </li>
                        </ul>
                    </div>
                    <div class="jcarousel-scroll">
						<a href="#prev" class="mycarousel-prev hide-text reverse-fade">Prev</a>
						<a href="#next" class="mycarousel-next hide-text reverse-fade">Next</a>
					</div>
                </div>
                <?php } ?>   <!--End Slide Show-->
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