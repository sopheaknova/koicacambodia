<div id="footer">
    <div class="inner">	
    	<div class="box_outer">
        	<div class="guideline-wrap">
              	<?php if  (function_exists('dynamic_sidebar') && dynamic_sidebar('footer')){ }else { ?>
              	there no link widget for footer widget
                <?php } ?>  
              	<div class="clear"></div>
            </div><!--Guidline Wrap-->
        </div><!--Box Outer-->
        
        <div class="bottom-bar">
        	<div class="footer-links">
        	<?php if ( has_nav_menu( 'main' ) ) { ?>
					 <?php  wp_nav_menu ( array( 'container'=> 'ul', 'theme_location' => 'footer', 'after' => ' -' )); ?>
            <?php } ?>
            <span class="copy-right"><?php echo of_get_option('copyrights'); ?></span>
            </div>
            <div class="powered-by">
            	<span><?php echo of_get_option('powered_by'); ?></span>
                <a href="http://www.koica.go.kr" target="_blank" title="Korea International Cooperation Agency">
                <?php if(of_get_option('koica_logo_img')){ ?>
                <img src="<?php echo of_get_option('koica_logo_img'); ?>" alt="Korea International Cooperation Agency" />
                <?php } else { ?>
                <img src="<?php echo O2_IMG; ?>/koica-logo.png" width="93" height="36" alt="KOICA" />
                <?php } ?>
                </a>
                <a href="http://www.worldfriendskorea.or.kr" target="_blank" title="World Friends Korea">
                <?php if(of_get_option('wdf_logo_img')){ ?>
                <img src="<?php echo of_get_option('wdf_logo_img'); ?>" alt="World Friends Korea" />
                <?php } else { ?>
                <img src="<?php echo O2_IMG; ?>/world-friend-logo.png" width="102" height="36" alt="World Friends Korea" />
                <?php } ?>
                </a>
            </div>
            <div class="clear"></div>
        </div><!--Bottom Bar-->
        
    </div><!--Inner-->
</div><!--footer-->

<?php wp_footer(); ?>
<?php if(of_get_option('scroll_top_bt') != false) { ?>
<div class="scrollTo_top">
    <a title="<?php _e('Scroll to top', 'theme'); ?>" href="#">
    	<?php if(of_get_option('scroll_top_bt_img')){ ?>
	<img src="<?php echo of_get_option('scroll_top_bt_img'); ?>" alt="<?php _e('Scroll to top', 'theme'); ?>" />
	<?php } else { ?>
    <img src="<?php echo O2_IMG; ?>/up.png" alt="<?php _e('Scroll to top', 'theme'); ?>">
    <?php } ?>
    </a>
</div>
<?php } ?>

<?php echo of_get_option('footer_script'); ?>
</body>

</html>