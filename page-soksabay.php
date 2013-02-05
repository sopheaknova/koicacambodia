<?php
/*
    Template Name: Sok Sabay
*/
?>

<?php get_header(); ?>
<div class="inner">
    <div class="container">
    <div class="main">
	<?php the_breadcrumb(); ?>
    <div class="box_outer">
	<article class="cat_article">
	        <h1 class="cat_article_title page_title"><?php the_title(); ?></h1>
    <div class="single_article_content">
        <?php the_content(); ?>
        
        <div class="brdr3"></div>
        
        <h4 class="related_box_title"><?php _e('Stories wroted by volunteers', 'theme'); ?></h4>
        <div class="related_box">
        <ul>
        <?php
            global $post;
            
            
                $args=array(
                'cat' => '6',
                'post__not_in' => array($post->ID),
                'showposts'=> 6,
                'ignore_sticky_posts'=>1
                );
            query_posts($args);
            ?>
                   <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <li class="related_item">
        <div class="related_image">
            <?php if (has_post_thumbnail( $post->ID )): ?>
        <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>
            <a href="<?php the_permalink(); ?>">
                    <img src="<?php echo O2_SCRIPTS ?>/timthumb.php?src=<?php echo $image[0]; ?>&amp;h=91&amp;w=126&amp;zc=1" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
            </a>
            <?php else: ?>
            <a href="<?php the_permalink(); ?>">
                    <img src="<?php echo O2_SCRIPTS ?>/timthumb.php?src=<?php echo catch_that_image(); ?>&amp;h=91&amp;w=126&amp;zc=1" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
            </a>
            <?php endif; ?>
        </div> <!--Related Image-->
        
                 <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
    
        </li>
		<!--End Related Style-->
        <?php endwhile; ?>
        <?php  else:  ?>
        <!-- Else in here -->
        <?php  endif; ?>
        <?php wp_reset_query(); ?>
          <?php //endif;?>
        </ul>
        </div> <!--Related Box-->
        
    </div> <!--Single Article content-->
    
    </article> <!--End Single Article-->
    </div> <!--Box Outer-->
    </div> <!--End Main-->
        <aside class="sidebar">
	 <?php global $wp_query; $postid = $wp_query->post->ID; $cus = get_post_meta($postid, 'sbg_selected_sidebar_replacement', true);?>
	<?php if ($cus != '') { ?>
        <?php if ($cus[0] != '0') { ?>
             <?php if  (function_exists('dynamic_sidebar') && dynamic_sidebar($cus[0])){ }else { ?>
        	<p class="noside"><?php _e('There Is No Sidebar Widgets Yet', 'theme'); ?></p>
         <?php } ?>
	<?php } else { ?>
         <?php if  (function_exists('dynamic_sidebar') && dynamic_sidebar('Main sidebar')){ }else { ?>
        	<p class="noside"><?php _e('There Is No Sidebar Widgets Yet', 'theme'); ?></p>
         <?php } ?>
	<?php } ?>
        <?php } else { ?>
         <?php if  (function_exists('dynamic_sidebar') && dynamic_sidebar('Main sidebar')){ }else { ?>
        	<p class="noside"><?php _e('There Is No Sidebar Widgets Yet', 'theme'); ?></p>
         <?php } ?>
    <?php } ?>
    </aside> <!--End Sidebar-->
    </div> <!--End Container-->
 </div><!--End Inner-->   
 <?php get_footer(); ?>