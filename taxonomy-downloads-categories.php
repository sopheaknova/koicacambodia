<?php get_header(); ?>
<?php $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) ); ?>
<div class="inner">
    <div class="container">
    <div class="main">
	<?php the_breadcrumb(); ?>
    <div class="box_outer">
	<article class="cat_article">
	        <h1 class="cat_article_title page_title"><?php echo $term->name ?></h1>
    <div class="single_article_content">
    	<div class="post-type">
        <ul>            
            <?php 
				$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
				$post_per_page = 30; // -1 shows all posts
				$do_not_show_stickies = 1; // 0 to show stickies														
				$today = getdate();
				//$this_year = $today["year"];				
				
				$args=array(					
					'post_type' => 'download',
					'downloads-categories'=> $term->name,
					'order' => 'desc',
					//'year' => $this_year,
					'post_status' => 'publish',
					'posts_per_page' => $post_per_page,
					'paged' => $paged,
					'caller_get_posts' => $do_not_show_stickies
				);
				
				$temp = $wp_query;  // assign orginal query to temp variable for later use
				$wp_query = null;
				$wp_query = new WP_Query($args);
				if( $wp_query->have_posts() ) :
					while ($wp_query->have_posts()) : $wp_query->the_post(); 
			?>			            
            
            <li>
                <div class="post-type-items">
                	<div class="download-info">
                    <span class="name"><?php the_title(); ?></span><br />
                    <span class="date">post on: <?php the_time('F d, Y'); ?> <?php if ($term->term_id == 29) echo get_the_term_list( $post->ID, 'downloads-categories', '', ', ', '' ); ?></span>
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
            
            <?php endwhile; ?>
            </ul>
            </div><!--/post type-->
            <!--<a href="javascript:history.back()" class="archives">All download file</a> -->
            
            <?php o2_pagination(); ?>
             
            <?php else : ?>
            
             <h5>Not Found</h5>
             <p>Try using the search form on the top</p>
            
            <?php endif; 
				$wp_query = $temp;  //reset back to original query
			?>
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