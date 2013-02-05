<?php get_header(); ?>

<?php include TEMPLATEPATH . '/includes/feature.php'; ?>

<div class="inner">
	<div class="container">
    	<div class="main">
        	
            <div class="box_outer">
            	<div class="important-links">
                <?php if  (function_exists('dynamic_sidebar') && dynamic_sidebar('Home - Important Links')){ }else { ?>
                    <p class="noside"><?php _e('There Is No Important Links Widgets Yet', 'theme'); ?></p>
                <?php } ?>
                </div><!--important links--> 
                
                <div class="message-representor">
                	<div class="news-box">
						<?php $cat = 6; ?>
                        <div class="box-heading">
                            <h2><a href="<?php echo get_category_link( $cat ); ?>"><?php echo get_cat_name( $cat ); ?> </a></h2>
                        </div>
                        
                        <?php query_posts(array('showposts' => 1, 'cat' => $cat )); ?>
                    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                    <?php
            $nbImgw = of_get_option('news_box_img_w');
            $nbImgh = of_get_option('news_box_img_h');
            $nbExl = of_get_option('news_box_ex_l');
            ?>    
                        <div class="news-article-item">
                            <div class="recent-news-img">
                            
                            <?php if (has_post_thumbnail( $post->ID )): ?>
        <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>
            <a href="<?php the_permalink(); ?>">
                    <img src="<?php echo O2_SCRIPTS ?>/timthumb.php?src=<?php echo $image[0]; ?>&amp;h=120&amp;w=170&amp;zc=1" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
            <?php
            global $post;
            $type = get_post_meta($post->ID, 'mom_article_type', true);
            if ($type == 'video') {
            echo "<span class='nb_video_icon'></span>";
            } elseif ($type == 'slideshow') {
            echo "<span class='nb_slide_icon'></span>";
            } elseif ($type == 'article') {
            echo "<span class='nb_article_icon'></span>";
            }
            ?>
            </a>
            <?php else: ?>
            <?php
                global $post;
                $type = get_post_meta($post->ID, 'mom_article_type', true);
                $vtype = get_post_meta($post->ID, 'mom_video_type', true);
                $vId = get_post_meta($post->ID, 'mom_video_id', true);
            ?>
            <a href="<?php the_permalink(); ?>">
            <?php if ($type == 'video') { ?>
                <?php if($vtype == 'youtube') { ?>
                    <img src="<?php echo O2_SCRIPTS ?>/timthumb.php?src=http://img.youtube.com/vi/<?php echo $vId; ?>/0.jpg&amp;h=120&amp;w=170&amp;zc=1" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
                <?php } elseif ($vtype == 'vimeo') { ?>
                <?php
                    $imgid = $vId;
                $hash = unserialize(file_get_contents("http://vimeo.com/api/v2/video/$imgid.php"));
                ?>
                    <img src="<?php echo O2_SCRIPTS ?>/timthumb.php?src=<?php echo $hash[0]['thumbnail_large']; ?>&amp;h=120&amp;w=170&amp;zc=1" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
    
                <?php } elseif ($vtype == 'daily') { ?>
                <img src="<?php echo O2_SCRIPTS ?>/timthumb.php?src=http://www.dailymotion.com/thumbnail/video/<?php echo $vId; ?>&amp;h=120&amp;w=170&amp;zc=1" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
                <?php } else { ?>
                                <img src="<?php echo O2_SCRIPTS ?>/timthumb.php?src=<?php echo catch_that_image(); ?>&amp;h=120&amp;w=170&amp;zc=1" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
                <?php } ?>
            <?php } else { ?>
                    <img src="<?php echo O2_SCRIPTS ?>/timthumb.php?src=<?php echo catch_that_image(); ?>&amp;h=120&amp;w=170&amp;zc=1" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
            <?php } ?>
            <?php
             if ($type == 'video') {
            echo "<span class='nb_video_icon'></span>";
            } elseif ($type == 'slideshow') {
            echo "<span class='nb_slide_icon'></span>";
            } elseif ($type == 'article') {
            echo "<span class='nb_article_icon'></span>";
            }
            ?>
            </a>
            <?php endif; ?>
                            
                            </div>
                            <div class="recent-news-content">
                                <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                <span class="news-date"><?php the_time('F d, Y'); ?></span>
                                <p>
                               <?php global $post;
                                $excerpt = $post->post_excerpt;
                                if($excerpt==''){
                                $excerpt = get_the_content('');
                                }
                                echo wp_html_excerpt($excerpt,140);
                                            ?> <a class="nb_recent_more" href="<?php the_permalink(); ?>"><?php _e('more', 'theme'); ?></a> ... 
                                </p>
                            </div>
                        </div><!--News article item-->
                        <?php endwhile; ?>
                    <?php  else:  ?>
                    <!-- Else in here -->
                    <?php  endif; ?>
                    <?php wp_reset_query(); ?>                     
                  </div><!--News Box for KOV Korean langauge-->
              
                </div><!--message of representative-->
                <div class="clear"></div>
                
                <div class="news-box">
              		<?php 
						$cat = 6; 
						$kov_news_count = 1;
					?>
                    
                    <?php query_posts(array('showposts' => 4, 'cat' => $cat )); ?>
                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <?php
				if ($kov_news_count > 1) :
		$nbImgw = of_get_option('news_box_img_w');
		$nbImgh = of_get_option('news_box_img_h');
		$nbExl = of_get_option('news_box_ex_l');
		?>    
                    <div class="news-article-item">
                    	<div class="recent-news-img">
                        
                        <?php if (has_post_thumbnail( $post->ID )): ?>
    <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>
	    <a href="<?php the_permalink(); ?>">
                <img src="<?php echo O2_SCRIPTS ?>/timthumb.php?src=<?php echo $image[0]; ?>&amp;h=<?php echo $nbImgh; ?>&amp;w=<?php echo $nbImgw; ?>&amp;zc=1" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
	    <?php
	    global $post;
	    $type = get_post_meta($post->ID, 'mom_article_type', true);
	    if ($type == 'video') {
		echo "<span class='nb_video_icon'></span>";
	    } elseif ($type == 'slideshow') {
		echo "<span class='nb_slide_icon'></span>";
	    } elseif ($type == 'article') {
		echo "<span class='nb_article_icon'></span>";
	    }
	    ?>
	    </a>
		<?php else: ?>
		<?php
		    global $post;
		    $type = get_post_meta($post->ID, 'mom_article_type', true);
		    $vtype = get_post_meta($post->ID, 'mom_video_type', true);
		    $vId = get_post_meta($post->ID, 'mom_video_id', true);
		?>
	    <a href="<?php the_permalink(); ?>">
		<?php if ($type == 'video') { ?>
		    <?php if($vtype == 'youtube') { ?>
                <img src="<?php echo O2_SCRIPTS ?>/timthumb.php?src=http://img.youtube.com/vi/<?php echo $vId; ?>/0.jpg&amp;h=<?php echo $nbImgh; ?>&amp;w=<?php echo $nbImgw; ?>&amp;zc=1" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
		    <?php } elseif ($vtype == 'vimeo') { ?>
			<?php
    			$imgid = $vId;
			$hash = unserialize(file_get_contents("http://vimeo.com/api/v2/video/$imgid.php"));
			?>
                <img src="<?php echo O2_SCRIPTS ?>/timthumb.php?src=<?php echo $hash[0]['thumbnail_large']; ?>&amp;h=<?php echo $nbImgh; ?>&amp;w=<?php echo $nbImgw; ?>&amp;zc=1" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />

		    <?php } elseif ($vtype == 'daily') { ?>
		    <img src="<?php echo O2_SCRIPTS ?>/timthumb.php?src=http://www.dailymotion.com/thumbnail/video/<?php echo $vId; ?>&amp;h=<?php echo $nbImgh; ?>&amp;w=<?php echo $nbImgw; ?>&amp;zc=1" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
		    <?php } else { ?>
		                    <img src="<?php echo O2_SCRIPTS ?>/timthumb.php?src=<?php echo catch_that_image(); ?>&amp;h=<?php echo $nbImgh; ?>&amp;w=<?php echo $nbImgw; ?>&amp;zc=1" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
		    <?php } ?>
		<?php } else { ?>
                <img src="<?php echo O2_SCRIPTS ?>/timthumb.php?src=<?php echo catch_that_image(); ?>&amp;h=<?php echo $nbImgh; ?>&amp;w=<?php echo $nbImgw; ?>&amp;zc=1" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
		<?php } ?>
	    <?php
	     if ($type == 'video') {
		echo "<span class='nb_video_icon'></span>";
	    } elseif ($type == 'slideshow') {
		echo "<span class='nb_slide_icon'></span>";
	    } elseif ($type == 'article') {
		echo "<span class='nb_article_icon'></span>";
	    }
	    ?>
	    </a>
		<?php endif; ?>
                        
                        </div>
                        <div class="recent-news-content">
                            <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                            <span class="news-date"><?php the_time('F d, Y'); ?></span>
                            <p>
                           <?php global $post;
                            $excerpt = $post->post_excerpt;
                            if($excerpt==''){
                            $excerpt = get_the_content('');
                            }
                            echo wp_html_excerpt($excerpt,140);
                                        ?> <a class="nb_recent_more" href="<?php the_permalink(); ?>"><?php _e('more', 'theme'); ?></a> ... 
                            </p>
                        </div>
                  	</div><!--News article item-->
                    <?php endif; 
						$kov_news_count++;
					?>
                    
                    <?php endwhile; ?>
                <?php  else:  ?>
                <!-- Else in here -->
                <?php  endif; ?>
                <?php wp_reset_query(); ?>
                <a href="<?php echo get_category_link( $cat ); ?>" class="archives"><?php echo get_cat_name( $cat ); ?></a>  
              </div><!--News Box for KOV Korean langauge-->
                
            </div>
            
        </div><!--main-->
        <div class="sidebar">
        	
            <?php if  (function_exists('dynamic_sidebar') && dynamic_sidebar('Home Sidebar')){ }else { ?>
                <p class="noside"><?php _e('There Is No Widgets Yet for this homepage sidebar', 'theme'); ?></p>
            <?php } ?>
            
        </div><!--sidebar-->
    </div><!--container-->    
</div><!--Inner-->

<?php get_footer(); ?>