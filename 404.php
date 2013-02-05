<?php get_header(); ?>

<div class="inner page_404">
<p style="font-weight:bold;"><?php _e('404 - Page not found!', 'theme'); ?></p>
<p><?php _e("Please try to navigation again or go to the", 'theme'); ?> <a href="<?php echo home_url(); ?>"><?php _e('homepage?', 'theme'); ?></a></p>
</div>

<?php get_footer(); ?>