<?php 

add_action('widgets_init','o2_proejct_widgets');

function o2_proejct_widgets() {
	register_widget('o2_proejct_widgets');
	
	}

class o2_proejct_widgets extends WP_Widget {
	function o2_proejct_widgets() {
			
		$widget_ops = array('classname' => 'koica-proejcts','description' => __('Widget display viddeo support Youtube, vimeo, dailymotion','theme'));
/*		$control_ops = array( 'twitter name' => 'momizat', 'count' => 3, 'avatar_size' => '32' );
*/		
		$this->WP_Widget('koica-proejcts',__('KOICA - proejcts','theme'),$widget_ops);

		}
		
	function widget( $args, $instance ) {
		extract( $args );
		/* User-selected settings. */
		$title = apply_filters('widget_title', $instance['title'] );
		$characters = $instance['characters'];

		/* Before widget (defined by themes). */
		echo $before_widget;

		/* Title of widget (before and after defined by themes). */
		if ( $title )
			echo $before_title . $title . $after_title;
?>
	
    	<?php query_posts(array('showposts' => 1, 'post_type' => 'project' )); ?>
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <?php if (has_post_thumbnail( $post->ID )): ?>
	<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>
        <a href="<?php the_permalink(); ?>">
            <img src="<?php echo O2_SCRIPTS ?>/timthumb.php?src=<?php echo $image[0]; ?>&amp;h=150&amp;w=287&amp;zc=1" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
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
    
    <a href="<?php the_permalink(); ?>" class="title"><?php echo limitLength(get_the_title(), $lenght=70); ?></a>
    <p><span class="date">post on: <?php the_time('F d, Y'); ?></span>
    
    <?php endwhile; ?>
	<?php  else:  ?>
    <!-- Else in here -->
    <?php  endif; ?>
    <?php wp_reset_query(); ?>
    
<?php 
		/* After widget (defined by themes). */
		echo $after_widget;
	}
	
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		/* Strip tags (if needed) and update the widget settings. */
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['characters'] = $new_instance['characters'];

		return $instance;
	}
	
	function form( $instance ) {

		/* Set up some default widget settings. */
		$defaults = array( 'title' => __('proejct','theme'), 
 			);
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>
	
		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'theme') ?></label>
		<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>"  class="widefat" />
		</p>

	<p>
<label for="<?php echo $this->get_field_id( 'characters' ); ?>"><?php _e('Characters length', 'theme') ?></label>
<input id="<?php echo $this->get_field_id( 'characters' ); ?>" name="<?php echo $this->get_field_name( 'characters' ); ?>" value="<?php echo $instance['characters']; ?>" class="widefat" />
	</p>
        
   <?php 
	}
} //end class