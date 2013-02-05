<?php
/**************************************************************
 *          All theme Paths 
 ***************************************************************/
            //theme Directory and URI
		define('O2_DIR', get_template_directory());
		define('O2_URI', get_template_directory_uri());
	    //Momizat Framework
		define('O2_FW', O2_DIR . '/framework');
            //post types
         define('O2_TYPE', O2_FW . '/posttype');

            //assest
                define('O2_JS', O2_URI . '/js');
                define('O2_CSS', O2_URI . '/css');
                define('O2_IMG', O2_URI . '/images');
                define('O2_SCRIPTS', O2_URI. '/framework/scripts');
                define('O2_FUN', O2_FW . '/functions');
                define('O2_ADMIN', O2_FW . '/admin');
                define('O2_CUSTOMPOST', O2_FW . '/custom-post');
				define('O2_META', O2_FW . '/metaboxes');
                define('O2_SC', O2_FW . '/shortcodes');
                define('O2_WIDGET', O2_FW . '/widgets');
		define('OPTIONS_FRAMEWORK_URL', O2_URI . '/framework/admin/');
		define('OPTIONS_FRAMEWORK_DIRECTORY', O2_ADMIN);	
		
		
		//Admin Option
        require O2_ADMIN . '/options-framework.php';
		
		//Custom Post type
        require O2_CUSTOMPOST . '/custom-post-type.php';
		
		//Metaboxes
        require O2_META . '/meta-box.php';
		require O2_META . '/theme_metaboxes.php';
		   
		
		// Custom widgets
		require O2_WIDGET . '/posts-widget.php';
		require O2_WIDGET . '/video-widget.php';
		require O2_WIDGET . '/projects-widget.php';
		
		
		//unlimited sidebars
	   	require O2_FUN . '/sidebar_generator.php';
		
		//mom functions
	   	require O2_FUN . '/o2_functions.php';
		require O2_FUN . '/news-box.php';
		require O2_FUN . '/pagination.php';
		
		//ShortCodes
        require O2_SC . '/shortcodes.php';

		//Tinymce Buttons
		/*require O2_FW . '/tinymce/dropcap.php';
		require O2_FW . '/tinymce/highlight.php';
		require O2_FW . '/tinymce/divide.php';
		require O2_FW . '/tinymce/clear.php';
		require O2_FW . '/tinymce/tooltip.php';
		require O2_FW . '/tinymce/buttons.php';
		require O2_FW . '/tinymce/box.php';
		require O2_FW . '/tinymce/tabs.php';
		require O2_FW . '/tinymce/accordion.php';
		require O2_FW . '/tinymce/toggle.php';
		require O2_FW . '/tinymce/columns.php';
		require O2_FW . '/tinymce/imageb.php';
		require O2_FW . '/tinymce/gmap.php';
		require O2_FW . '/tinymce/videosc.php';
		require O2_FW . '/tinymce/twitterbt.php';
		require O2_FW . '/tinymce/flickrbt.php';*/
		
		require O2_FW . '/tinymce/divide.php';
		require O2_FW . '/tinymce/columns.php';
		require O2_FW . '/tinymce/clear.php';
		require O2_FW . '/tinymce/videosc.php';
		

/**************************************************************
 *          Menus
 ***************************************************************/
if ( function_exists( 'register_nav_menu' ) ) {
  register_nav_menus(
   array(
    'main'   => __('Main'),
   )
  );
  register_nav_menus(
   array(
    'footer'   => __('Footer'),
   )
  );

 }	
 
 
 /**************************************************************
 *          Tumbnails
 ***************************************************************/

if ( function_exists( 'add_theme_support' ) ) {
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 56, 56, true ); // Normal thumbnails
	add_image_size( 'full', 2000, '', true ); // Full thumbnails
	add_image_size( 'large', 598, '', true ); // Large thumbnails
	add_image_size( 'medium', 200, '', true ); // Medium thumbnails
	add_image_size( 'small', 125, '', true ); // Small thumbnails
}


/**********************************************************************
 * 			Comments Template
 ********************************************************************/
 function custom_comments($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
   <li id="li-comment-<?php comment_ID() ?>" class="single_comment">
     <div id="comment-<?php comment_ID(); ?>" class="comment_wrapper">
      <div class="comment-author vcard user_avatar">
         <?php echo get_avatar($comment,$size='37',$default='<path_to_url>' ); ?>
      </div>
      <?php if ($comment->comment_approved == '0') : ?>
         <em class="wait_mod"><?php _e('Your comment is awaiting moderation.'); ?></em>
      <?php endif; ?>
  	<h4 class="comment_author_name"><?php printf(__('%s '), get_comment_author_link()) ?></h4>
            <div class="comment-meta commentmetadata "><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php printf(__('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?></a><?php edit_comment_link(__('(Edit)'),'  ','') ?></div>
	  <div class="comment_content">
	  <?php comment_text() ?>
	  </div>
	  <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
     </div>
<?php
        }
		

/**********************************************************************
 * 			Sidebars
 ********************************************************************/
 if ( function_exists('register_sidebar') ) {

      register_sidebar(array(
	'name' => 'Main sidebar',
	'description' => 'main sidebar.',
	'before_widget' => '<div class="box_outer"><div class="widget">',
	'after_widget' => '</div></div>',
	'before_title' => '<h3 class="widget_title">',
	'after_title' => '</h3>'
      ));

      register_sidebar(array(
	'name' => 'footer',
	'description' => 'Footer 1',
	'before_widget' => '<div class="widget">',
	'after_widget' => '</div>',
	'before_title' => '<h3 class="widget_title">',
	'after_title' => '</h3>'
      ));
	  
	/*Homepage Sidebar*/
	  register_sidebar(array(
	'name' => 'Home - Important Links',
	'description' => 'Important Links widget for homepage',
	'before_widget' => '<div class="widget">',
	'after_widget' => '</div>',
	'before_title' => '<h2>',
	'after_title' => '</h3>'
      ));
	  
	  register_sidebar(array(
	'name' => 'Home Sidebar',
	'description' => 'Can put more widgets on homepage sidebar',
	'before_widget' => '<div class="box_outer"><div class="widget">',
	'after_widget' => '</div></div>',
	'before_title' => '<h3 class="widget_title">',
	'after_title' => '</h3>'
      ));
 }	
 
 
 // Empty Pragraph Fix
  /*
    Plugin Name: Shortcode empty Paragraph fix
    Plugin URI: http://www.johannheyne.de/wordpress/shortcode-empty-paragraph-fix/
    Description: Fix issues when shortcodes are embedded in a block of content that is filtered by wpautop.
    Author URI: http://www.johannheyne.de
    Version: 0.1
    Put this in /wp-content/plugins/ of your Wordpress installation
    */


    add_filter('the_content', 'shortcode_empty_paragraph_fix');
    function shortcode_empty_paragraph_fix($content)
    {   
        $array = array (
            '<p>[' => '[', 
            ']</p>' => ']', 
            ']<br />' => ']'
        );

        $content = strtr($content, $array);

		return $content;
    }

//shortcodes in widgets
add_filter('widget_text', 'do_shortcode');

/* parent Category */
function post_is_in_descendant_category( $cats, $_post )
{
	foreach ( (array) $cats as $cat ) {
		// get_term_children() accepts integer ID only
		$descendants = get_term_children( (int) $cat, 'category');
		array_push($descendants,$cat);
		if ( $descendants && in_category( $descendants, $_post ) )
			return true;
	}
	return false;
}

/* Category And Child */
//force child template
function load_cat_parent_template()
{
    global $wp_query;

    if (!$wp_query->is_category)
        return true; // saves a bit of nesting

    // get current category object
    $cat = $wp_query->get_queried_object();

    // trace back the parent hierarchy and locate a template
    while ($cat && !is_wp_error($cat)) {
        $template = TEMPLATEPATH . "/category-{$cat->cat_ID}.php";

        if (file_exists($template)) {
            load_template($template);
            exit;
        }

        $cat = $cat->parent ? get_category($cat->parent) : false;
    }
}
add_action('template_redirect', 'load_cat_parent_template');

// If is category or subcategory of $cat_id
if (!function_exists('is_category_or_sub')) {
	function is_category_or_sub($cat_id = 0) {
	    foreach (get_the_category() as $cat) {
	    	if ($cat_id == $cat->cat_ID || cat_is_ancestor_of($cat_id, $cat)) return true;
	    }
	    return false;
	}
}
add_action('init', 'my_rewrite');
function my_rewrite() {
    global $wp_rewrite;
    $wp_rewrite->add_permastruct('typename', 'typename/%year%/%postname%/', true, 1);
    add_rewrite_rule('typename/([0-9]{4})/(.+)/?$', 'index.php?typename=$matches[2]', 'top');
    $wp_rewrite->flush_rules(); // !!!
}

//custom editor style
add_action('admin_enqueue_scripts', 'momizat_admin_init');

/**
 * Load the CSS and JavaScript files needed for formatting the elements.
 */
function momizat_admin_init(){
	global $current_screen;
	
	//enqueue the script and CSS files for the TinyMCE editor formatting buttons
	if($current_screen->base=='post'){
		wp_enqueue_script('jquery');
		wp_enqueue_script('jquery-ui-dialog');
		add_editor_style('framework/shortcodes/sc.css');
	}
}

// Quick Tags
add_action('admin_print_scripts', 'my_custom_quicktags');
function my_custom_quicktags() {
	wp_enqueue_script(
		'my_custom_quicktags',
		MOM_URI . '/framework/quicktags.js',
		array('quicktags')
	);
}


///
add_filter( 'manage_edit-post_columns', 'add_type' );
function add_type($columns) {
    $columns['type'] = 'Type';
    return $columns;
}

add_action( 'manage_posts_custom_column', 'art_type' );
function art_type($column) {
    global $post;
    switch($column) {
        case 'type' :
                echo get_post_meta($post->ID, 'mom_article_type', true);
        break;
    }
}
		
?>