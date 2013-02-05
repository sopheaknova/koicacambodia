<?php
/*
    Template Name: Contact Us
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
                
                <div class="contact-map">
                        <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
                        <script language="javascript">					
                          jQuery(document).ready(function ($)
                            {
                                var myLatlng = new google.maps.LatLng(11.5351,104.9178  );
                                var myOptions = {							  
                                  zoom: 12,
                                  center: myLatlng,
                                  mapTypeId: google.maps.MapTypeId.ROADMAP
                                }
                                var map = new google.maps.Map(document.getElementById("c-map"), myOptions);
                                
                                var marker = new google.maps.Marker({
                                    position: myLatlng, 
                                    map: map,
                                    animation: google.maps.Animation.DROP,
                                    title:"KOICA Cambodia"
                                });
                            });
                        </script>
                <div id="c-map"></div>
                </div><!--/contact-map-->
                
                <!--Make Anquiry-->
                <!--<div class="anquiry">            
                    <h4>For any question or enquiry:</h4>
                    <p>Feel free to contact me or please fill up below in the following details and we will be in touch shortly.</p>
                    <div>
                    <form id="myform">
                        <div>
                        <label for="name">Name / Company:</label>
                        <label for="email">Email:</label>
                        <label for="subject" class="last">Subject:</label>
                        </div>
                        <div>
                        <input type="text" name="name" class="txt-box is_required" />
                        <input type="text" name="email" class="txt-box is_required" />
                        <input type="text" name="subject" class="txt-box is_required" />                    
                        <label for="message">Message:</label>
                        <textarea name="message" class="txt-area is_required" rows="8"></textarea>                    
                        </div>
                        <p align="center"><input type="submit" value="Send" class="submit_btn" /></p>
                    </form>
                    </div>
                </div>-->
                <!--/Make Anquiry-->
                
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
 </div> <!--End Container-->
 <?php get_footer(); ?>