<div id="home-minor">
                <h2>What's New</h2>
                <ul>
                <?php 
                $hp_minors = new WP_Query( array('showposts' => 3, 'order'=>'ASC', 'orderby'=>'menu_order','post_type'=>'ivlab_hp_whats_new' ) );
                if( $hp_minors->have_posts() ) :
                    while( $hp_minors->have_posts() ) :
                        $hp_minors->the_post();
                    ?>
                        <li>
                            <h4><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h4>
                            <div class="hp_minor_content">
                                <?php the_content() ?>
                            </div>
                        </li>
                    <?php
                    endwhile;
                endif;
                ?>
                </ul>
            </div>



<div class="left-col">
                <div class="sub-nav">
                    
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
                        <h4><!--<a href="<?php echo $permalink; ?>" title="<?php echo $parentPageTitle; ?>">--><?php echo $parentPageTitle; ?><!--</a>--></h4>
                    <?php } else { ?>
                        <h4><!--<a href="<?php echo get_permalink(); ?>" title="<?php echo $pageTitle; ?>">--><?php echo $pageTitle ?><!--</a>--></h4>
                    <?php } ?>
                    <?php wp_nav_menu( array('menu' => 'About' )); ?>
                </div> <!-- .sub-nav -->
                <?php get_sidebar('aboutleft'); ?>
            </div> <!-- .left-col -->