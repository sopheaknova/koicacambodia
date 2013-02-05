<?php
/*
    Template Name: Download
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
            
            	             
			
          <?php 
		  	$i = 1;
		  	while ($i <= 2) :		
				// Query 5 post for each Newsletter and Report
				if ($i == 1) :
					$categories=  get_categories('taxonomy=downloads-categories&hide_empty=0&include=29'); // include category in local test is 22  
				else:	
					$categories=  get_categories('taxonomy=downloads-categories&hierarchical=0&hide_empty=1&exclude=29&parent=0');  // exclude category in local test is 22
				endif;
					
				foreach ($categories as $category) {
					$download_category = $category->category_nicename;
					$groupfilename = $category->cat_name;							
		  ?>
          <div class="post-type">
          		<h4><a href="<?php bloginfo('url'); ?>/downloads-categories/<?php echo $category->slug; ?>"><?php echo $groupfilename; ?></a></h4>
               <ul>
                <?php 
                    query_posts("posts_per_page=50&post_type=download&downloads-categories=$download_category&order=desc");  
                    
                    if (have_posts()) : while(have_posts()) : the_post();
                ?>
                <li>
                <div class="post-type-items">
                	<div class="download-info">
                    <span class="name"><?php the_title(); ?></span><br />
                    <span class="date">post on: <?php the_time('F d, Y'); ?> <?php _e('In', 'theme'); ?>:  <?php echo get_the_term_list( $post->ID, 'downloads-categories', '', ', ', '' ); ?></span>
                    </div>
                    <div class="download"><strong>Download</strong> <br /> 
                    <?php if (get_post_meta($post->ID, "mom_dl_kr_file", true)) : ?>
                        <a href="<?php echo get_post_meta($post->ID, "mom_dl_kr_file", true); ?>">Korean</a> - 
                    <?php else : ?>
                        <!-- some statement -->
                    <?php endif; ?> 
					
					<?php if (get_post_meta($post->ID, "mom_dl_kh_file", true)) : ?>
                        <a href="<?php echo get_post_meta($post->ID, "mom_dl_kh_file", true); ?>">Khmer</a> - 
                    <?php else : ?>
                        <!-- some statement -->
                    <?php endif; ?> 
                    
                    <?php if (get_post_meta($post->ID, "mom_dl_en_file", true)) : ?>
                        <a href="<?php echo get_post_meta($post->ID, "mom_dl_en_file", true); ?>">English</a>
                    <?php else : ?>
                        <!-- some statement -->
                    <?php endif; ?>
                    </div>
                </div>
                <!--/post type items-->
                </li>
                
                <?php endwhile; endif; wp_reset_query(); ?>
                </ul>                
            </div><!--/post type--> 
            <?php 
					} 
				$i++;
				endwhile;?>   
            
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