<?php 

function cat_article () { ?>
    <div class="box_outer">
    <article class="cat_article">
        <h2 class="cat_article_title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        <?php o2_cat_share(); ?>
        <div class="cat_article_warap">
 	<?php if(of_get_option('post_meta') != false) { ?>
    <div class="article_meta">
 	<?php if(of_get_option('post_an') != false) { ?>
       <span class="meta_author"><?php _e('Posted by', 'theme'); ?>: <?php the_author_posts_link(); ?></span>
	<?php } ?>
	<?php if(of_get_option('post_date') != false) { ?>
       <span class="meta_date"><?php _e('Posted date', 'theme'); ?>:  <strong><?php the_time('F d, Y'); ?></strong></span>
       <?php } ?>
	<?php if(of_get_option('post_cc') != false) { ?>
       <span class="meta_sap">|</span> <span class="meta_comments"><?php _e('comment', 'theme'); ?> : <a href="<?php comments_link(); ?>"><?php comments_number(0, 1, '%'); ?></a></span>
       <?php } ?>
    </div> <!--article meta-->
	<?php } else {
	    echo "<div style='height:20px;'></div>";
	    } ?>
        <div class="cat_article_img">
	    <div class="cat_img">
    <?php if (has_post_thumbnail( $post->ID )): ?>
    <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>
	    <a href="<?php the_permalink(); ?>">
                <img src="<?php echo O2_SCRIPTS ?>/timthumb.php?src=<?php echo $image[0]; ?>&amp;h=193&amp;w=215&amp;zc=1" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
            <?php
	    global $post;
	    $type = get_post_meta($post->ID, 'mom_article_type', true);
	    if ($type == 'video') {
		echo "<span class='ca_video_icon'></span>";
	    } elseif ($type == 'slideshow') {
		echo "<span class='ca_slide_icon'></span>";
	    } elseif ($type == 'article') {
		echo "<span class='ca_article_icon'></span>";
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
                <img src="<?php echo O2_SCRIPTS ?>/timthumb.php?src=http://img.youtube.com/vi/<?php echo $vId; ?>/0.jpg&amp;h=193&amp;w=215&amp;zc=1" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
		    <?php } elseif ($vtype == 'vimeo') { ?>
			<?php
    			$imgid = $vId;
			$hash = unserialize(file_get_contents("http://vimeo.com/api/v2/video/$imgid.php"));
			?>
                <img src="<?php echo O2_SCRIPTS ?>/timthumb.php?src=<?php echo $hash[0]['thumbnail_large']; ?>&amp;h=193&amp;w=215&amp;zc=1" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />

		    <?php } elseif ($vtype == 'daily') { ?>
		    <img src="<?php echo O2_SCRIPTS ?>/timthumb.php?src=http://www.dailymotion.com/thumbnail/video/<?php echo $vId; ?>&amp;h=193&amp;w=215&amp;zc=1" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
		    <?php } else { ?>
		                    <img src="<?php echo O2_SCRIPTS ?>/timthumb.php?src=<?php echo catch_that_image(); ?>&amp;h=193&amp;w=215&amp;zc=1" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
		    <?php } ?>
		<?php } else { ?>
                <img src="<?php echo O2_SCRIPTS ?>/timthumb.php?src=<?php echo catch_that_image(); ?>&amp;h=193&amp;w=215&amp;zc=1" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
		<?php } ?>
            <?php
	    if ($type == 'video') {
		echo "<span class='ca_video_icon'></span>";
	    } elseif ($type == 'slideshow') {
		echo "<span class='ca_slide_icon'></span>";
	    } elseif ($type == 'article') {
		echo "<span class='ca_article_icon'></span>";
	    }
	    ?>
	    </a>
    <?php endif; ?>
	    </div>
        </div> <!--Cat article Img-->
        <div class="cat_article_content">
        <p>
            <?php global $post;
            $excerpt = $post->post_excerpt;
            if($excerpt==''){
            $excerpt = get_the_content('');
            }
            echo wp_html_excerpt($excerpt,270);
            ?> ... 
        </p>
        <a class="article_read_more" href="<?php the_permalink(); ?>"><?php _e('Read more', 'theme'); ?> <span><?php _e('&#8250;', 'theme'); ?></span></a>
        </div> <!--Cat article Content-->
        </div>
    </article> <!--End Cat Article-->
    </div> <!--Box Outer-->
<?php
}
?>