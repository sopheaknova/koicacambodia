<script type="text/javascript">
	  jQuery.noConflict();
	  jQuery(document).ready(function ($){

// main slider
   $('.slider').cycle({
    fx: '<?php echo of_get_option('cycle_effect'); ?>',
    easing: '<?php echo of_get_option('cycle_ease'); ?>',
    speed: <?php echo of_get_option('cycle_speed'); ?>,
     timeout:<?php echo of_get_option('cycle_timeout'); ?>,
            pause: 1,
	    <?php if(of_get_option('cycle_effect') == 'fade') {?> 
	    speedIn:  1000, 
	    speedOut: 1000,
	    <?php } ?>
            cleartype: true,
            cleartypeNoBg: true,
            pager: 'ul.slider_nav',
	    after: feature_after,
	    before: onbefore,
            pagerAnchorBuilder: function(idx, slide) {
                return 'ul.slider_nav li:eq(' + (idx) + ')';
            }
        });
  $('ul.slider_nav li').hover(function() { 
            $('.slider').cycle('pause'); 
        }, function () {
            $('.slider').cycle('resume'); 
	  });


  function feature_after() {
$('.slider_items .slider_caption').stop().animate({opacity:1, bottom:0},{queue:false,duration:300 });
	   }
   
  function onbefore() {
   $('.slider_items .slider_caption').stop().animate({opacity:1, bottom:'-120px'},{queue:false,duration:300});
   }  
  
//slider nav
jQuery('.slider_nav li:not(.activeSlide) a').click( 
		function () {
			jQuery('.slider_nav li a').css('opacity', 0.5);
			jQuery(this).css('opacity', 1);
		}
	);
	

jQuery('.slider_nav li:not(.activeSlide) a').hover( 
		function () {
			jQuery(this).stop(true, true).animate({opacity: 1}, 300);
		}, function () {
			jQuery(this).stop(true, true).animate({opacity: 0.5}, 300);
		}
	);

  });
</script>

<div class="inner" id="news-home">

<div class="box_outer" id="feature_outer">
<div class="feature_news">
<div class="feature_title">Latest News</div>
<div class="slider_wrap">
			<div class="slider_items">
				<div class="slider">
				
                <?php $f_cat = of_get_option('feature_category'); ?>
                    <?php query_posts(array('showposts' => 3, 'cat' => $f_cat )); ?>
				
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                
				<div class="slider_item">
					<div style="position:relative; overflow:hidden;">
						<?php if (has_post_thumbnail( $post->ID )): ?>
				<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>
                    <a href="<?php the_permalink(); ?>">
                    	<img src="<?php echo O2_SCRIPTS ?>/timthumb.php?src=<?php echo $image[0]; ?>&amp;h=342&amp;w=476&amp;zc=1" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
                        <?php
                    global $post;
                    $type = get_post_meta($post->ID, 'mom_article_type', true);
                    if ($type == 'video') {
                    echo "<span class='feature_video_icon'></span>";
                    } elseif ($type == 'slideshow') {
                    echo "<span class='feature_slide_icon'></span>";
                    } elseif ($type == 'article') {
                    echo "<span class='feature_article_icon'></span>";
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
                            <img src="<?php echo O2_SCRIPTS ?>/timthumb.php?src=http://img.youtube.com/vi/<?php echo $vId; ?>/0.jpg&amp;h=342&amp;w=476&amp;zc=1" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
                        <?php } elseif ($vtype == 'vimeo') { ?>
                        <?php
                            $imgid = $vId;
                        $hash = unserialize(file_get_contents("http://vimeo.com/api/v2/video/$imgid.php"));
                        ?>
                            <img src="<?php echo O2_SCRIPTS ?>/timthumb.php?src=<?php echo $hash[0]['thumbnail_large']; ?>&amp;h=342&amp;w=476&amp;zc=1" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
            
                        <?php } elseif ($vtype == 'daily') { ?>
                        <img src="<?php echo O2_SCRIPTS ?>/timthumb.php?src=http://www.dailymotion.com/thumbnail/video/<?php echo $vId; ?>&amp;h=342&amp;w=476&amp;zc=1" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
                        <?php } else { ?>
                                        <img src="<?php echo O2_SCRIPTS ?>/timthumb.php?src=<?php echo catch_that_image(); ?>&amp;h=342&amp;w=476&amp;zc=1" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
                        <?php } ?>
                    <?php } else { ?>
                            <img src="<?php echo O2_SCRIPTS ?>/timthumb.php?src=<?php echo catch_that_image(); ?>&amp;h=342&amp;w=476&amp;zc=1" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
                    <?php } ?>
                        <?php
                    global $post;
                    $type = get_post_meta($post->ID, 'mom_article_type', true);
                    if ($type == 'video') {
                    echo "<span class='feature_video_icon'></span>";
                    } elseif ($type == 'slideshow') {
                    echo "<span class='feature_slide_icon'></span>";
                    } elseif ($type == 'article') {
                    echo "<span class='feature_article_icon'></span>";
                    }
                    ?>
                    </a>
                <?php endif; ?>
                
						<div class="slider_caption">
                            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                            <p>
                                        <?php global $post;
                            $excerpt = $post->post_excerpt;
                            if($excerpt==''){
                            $excerpt = get_the_content('');
                            }
                            echo wp_html_excerpt($excerpt,140);
                                        ?> ... 
                            </p>						
                        </div><!--slider_caption-->
					</div>
				</div><!--slider_item-->
                <?php endwhile; ?>
				<?php  else:  ?>
                <!-- Else in here -->
                <?php  endif; ?>
                <?php wp_reset_query(); ?>
				
				</div><!--slider-->
			</div><!--slider_items-->    
            
			<ul class="slider_nav">
        <?php query_posts(array('showposts' => 3 , 'cat' => $f_cat )); ?>
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<li>
                	<a href="#" title="<?php the_title(); ?>"><?php echo limitLength(get_the_title(), $lenght=40); ?></a>
                    <p><span class="date">post on: <?php the_time('F d, Y'); ?></span>
                    <?php global $post;
                            $excerpt = $post->post_excerpt;
                            if($excerpt==''){
                            $excerpt = get_the_content('');
                            }
                            echo wp_html_excerpt($excerpt,82);
                    ?> ... 
                    </p>
                </li>
        <?php endwhile; ?>
        <?php  else:  ?>
        <!-- Else in here -->
        <?php  endif; ?>
        <?php wp_reset_query(); ?>        
			</ul>
			<div class="clear"></div>
</div> <!--Slider_wrap-->
</div> <!--End Feature news-->
</div> <!--End Feature Outer-->

<div class="box_outer" id="project-aside">
	<h2><?php echo of_get_option('project_title_sidebar'); ?></h2>
	<?php query_posts(array('showposts' => 1, 'post_type' => 'project' )); ?>
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <?php if (has_post_thumbnail( $post->ID )): ?>
	<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>
        <a href="<?php the_permalink(); ?>">
            <img src="<?php echo O2_SCRIPTS ?>/timthumb.php?src=<?php echo $image[0]; ?>&amp;h=120&amp;w=205&amp;zc=1" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
            <?php
        global $post;
        $type = get_post_meta($post->ID, 'mom_article_type', true);
        if ($type == 'video') {
        echo "<span class='feature_video_icon'></span>";
        } elseif ($type == 'slideshow') {
        echo "<span class='feature_slide_icon'></span>";
        } elseif ($type == 'article') {
        echo "<span class='feature_article_icon'></span>";
        }
        ?>
        </a>
    <?php endif; ?>    
    
    <a href="<?php the_permalink(); ?>" class="title"><?php echo limitLength(get_the_title(), $lenght=62); ?></a>
    <p><span class="date">post on: <?php the_time('F d, Y'); ?></span>
    <?php global $post;
			$excerpt = $post->post_excerpt;
			if($excerpt==''){
			$excerpt = get_the_content('');
			}
			echo wp_html_excerpt($excerpt,152);
	?> ...
    </p>
    <a class="archives" href="<?php echo home_url(); ?>/?page_id=<?php echo of_get_option('project_landing_page'); ?>"><?php echo of_get_option('more_projects_sidebar'); ?></a>
    <?php endwhile; ?>
	<?php  else:  ?>
    <!-- Else in here -->
    <?php  endif; ?>
    <?php wp_reset_query(); ?>
    
</div><!--End Project supportr-->

<div class="clear"></div>

</div> <!--End News Home-->