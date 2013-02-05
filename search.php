<?php get_header(); ?>
<div class="inner">
    <div class="container">
    <div class="main">
<?php if ( have_posts() ) : ?>
         <div id="crumbs"><?php _e('Search results for', 'theme'); ?> "<?php echo $s; ?>" </div>
         
<?php while ( have_posts() ) : the_post(); ?>
<?php cat_article(); ?>
<?php endwhile; ?>
<?php  else:  ?>
	<div id="crumbs"><?php _e('Your search for', 'theme'); ?> "<?php echo $s; ?>" <?php _e('did not match', 'theme'); ?></div>
<?php  endif; ?>
<?php o2_pagination(); ?>
<?php wp_reset_query(); ?>
    </div> <!--End Main-->
    <?php get_sidebar(); ?>
    </div> <!--End Container-->
 <?php get_footer(); ?>