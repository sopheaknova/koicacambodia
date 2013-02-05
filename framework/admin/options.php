<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 * 
 */

function optionsframework_option_name() {

	// This gets the theme name from the stylesheet (lowercase and without spaces)
	$themename = get_theme_data(STYLESHEETPATH . '/style.css');
	$themename = $themename['Name'];
	$themename = preg_replace("/\W/", "", strtolower($themename) );
	
	$optionsframework_settings = get_option('optionsframework');
	$optionsframework_settings['id'] = $themename;
	update_option('optionsframework', $optionsframework_settings);
	
	// echo $themename;
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the "id" fields, make sure to use all lowercase and no spaces.
 *  
 */

function optionsframework_options() {
	
	$yesno = array('no' => 'No', 'yes' =>'Yes' );
	$float = array('left' => 'left', 'right' =>'right');
	// Test data
	$test_array = array("one" => "One","two" => "Two","three" => "Three","four" => "Four","five" => "Five");
	// Multicheck Array
	$multicheck_array = array("one" => "French Toast", "two" => "Pancake", "three" => "Omelette", "four" => "Crepe", "five" => "Waffle");
	// Multicheck Defaults
	$multicheck_defaults = array("one" => "true","five" => "true");
	// Background Defaults
	$bodytypo = array('size' => '12px');
	$background = array('repeat' => 'repeat');
//H typo
$h1 = array('size' => '36px', 'face' =>'' );
$h2 = array('size' => '30px', 'face' =>'' );
$h3 = array('size' => '24px', 'face' =>'' );
$h4 = array('size' => '18px', 'face' =>'' );
$h5 = array('size' => '14px', 'face' =>'' );
$h6 = array('size' => '12px', 'face' =>'' );

//nivo slider
	$nivo_effects = array('random' => 'random', 'sliceDown' => 'sliceDown', 'sliceDownLeft' => 'sliceDownLeft', 'sliceUp' => 'sliceUp', 'sliceUpLeft' => 'sliceUpLeft','sliceUpDown' => 'sliceUpDown', 'sliceUpDownLeft' => 'sliceUpDownLeft', 'fold' => 'fold', 'fade' => 'fade', 'random' => 'random', 
	 'slideInRight' => 'slideInRight', 'slideInLeft' => 'slideInLeft', 'boxRandom' => 'boxRandom', 'boxRain' => 'boxRain', 
	 'boxRainReverse' => 'boxRainReverse', 'boxRainGrow' => 'boxRainGrow', 'boxRainGrowReverse' => 'boxRainGrowReverse', );

//cycle Slider
	$cycle_effects = array('blindX' => 'blindX', 'blindY' => 'blindY', 'blindZ' => 'blindZ', 'cover' => 'cover', 'curtainX' => 'curtainX','curtainY' => 'curtainY', 'fade' => 'fade', 'fadeZoom' => 'fadeZoom', 'growX' => 'growX', 'growY' => 'growY', 
	 'none' => 'none', 'scrollUp' => 'scrollUp', 'scrollDown' => 'scrollDown', 'scrollLeft' => 'scrollLeft', 
	 'scrollRight' => 'scrollRight', 'scrollHorz' => 'scrollHorz', 'scrollVert' => 'scrollVert',
	'shuffle' => 'shuffle', 'slideX' => 'slideX', 'slideY' => 'slideY', 'toss' => 'toss', 
	 'turnUp' => 'turnUp', 'turnDown' => 'turnDown', 'turnLeft' => 'turnLeft', 'turnRight' => 'turnRight', 'uncover' => 'uncover', 'wipe' => 'wipe', 'zoom' => 	'zoom');

	// Pull all the categories into an array
	$options_categories = array();  
	$options_categories_obj = get_categories('hide_empty=0');
	foreach ($options_categories_obj as $category) {
    	$options_categories[$category->cat_ID] = $category->cat_name;
	}

	// Pull all the categories into an array
	$options_tags = array();  
	$options_tags_obj = get_tags();
	foreach ($options_tags_obj as $tag) {
    	$options_tags[$tag->tag_ID] = $tag->tag_name;
	}
		
	// Pull all the pages into an array
	$options_pages = array();  
	$options_pages_obj = get_pages('sort_column=post_parent,menu_order');
	$options_pages['false'] = 'Select a page:';
	foreach ($options_pages_obj as $page) {
    	$options_pages[$page->ID] = $page->post_title;
	}
		
	//apps category
	$res_categories = array();  
	$res_categories_obj = get_categories('taxonomy=residences_categories&hide_empty=0');
	foreach ($res_categories_obj as $rescategory) {
    	$res_categories[$rescategory->cat_ID] = $rescategory->cat_name;
	}

	// If using image radio buttons, define a directory path
	$imagepath =  get_stylesheet_directory_uri() . '/framework/admin/images/';
	$srcpath =  get_stylesheet_directory_uri() . '/framework/src/';
		
	$options = array();

// General Setting 
		$options[] = array( "name" => __('general Settings', 'framework'),
						"type" => "heading",
						"slug" => "general"
						);

	$options[] = array( "name" => __('Breadcrumb', 'framework'),
						"id" => "breadcrumb",
						"desc" => __('Enable or disable breadcrumb', 'framework'),
						"std" => true,
						"type" => "checkbox",
						);

	$options[] = array( "name" => __('Scroll to top button', 'framework'),
						"id" => "scroll_top_bt",
						"desc" => __('Enable or disable Scroll to top button', 'framework'),
						"std" => true,
						"type" => "checkbox",
						);

	$options[] = array( "name" => __('Scroll To Top Image', 'framework'),
						"id" => "scroll_top_bt_img",
						"desc" => __('upload custom Scroll to top image', 'framework'),
						"type" => "upload",
						);


	$options[] = array( "name" => __('the logo', 'framework'),
						"id" => "logo_img",
						"desc" => __('upload custom logo, it would be .png file', 'framework'),
						"type" => "upload",
						);
	
	$options[] = array(	"name" => __('the slogan', 'framework'),
						"id" => "slogan_img",
						"desc" => __('upload custom slogan image, it would be .png file', 'framework'),
						"type" => "upload",
						);					


		$options[] = array( "name" => __('favicon', 'framework'),
						"desc" => __('upload your favicon', 'framework'),
						"id" => "custom_favicon",
						"type" => "upload",
						);

		$options[] = array( "name" => __('Google analytics', 'framework'),
						"desc" => __('google analytics or any Script, it will be add before closing of body tag', 'framework'),
						"id" => "footer_script",
						"type" => "textarea"
						);

// End General


// Article Elements

		$options[] = array( "name" => __('Post settings', 'framework'),
						"type" => "heading",
						"slug" => "post"
						);

		$options[] = array( "name" => __('Article Elements', 'framework'),
						"type" => "info",
						"desc" => __('Show/Hide any article Element, in home/category/article', 'framework')
						);

		$options[] = array( "name" => __('The Meta', 'framework'),
						"id" => "post_meta",
						"std" => true,
						"desc" => __('show/hide all Meta (date, comments count, posted by)', 'framework'),
						"type" => "checkbox"
						);

		$options[] = array( "name" => __('Author name', 'framework'),
						"id" => "post_an",
						"std" => true,
						"type" => "checkbox"
						);

		$options[] = array( "name" => __('The Date', 'framework'),
						"id" => "post_date",
						"std" => true,
						"type" => "checkbox"
						);

		$options[] = array( "name" => __('The Category', 'framework'),
						"id" => "post_cat",
						"std" => true,
						"type" => "checkbox"
						);

		$options[] = array( "name" => __('Comments Count', 'framework'),
						"id" => "post_cc",
						"std" => true,
						"type" => "checkbox"
						);

		$options[] = array( "name" => __('Author Box', 'framework'),
						"id" => "post_ab",
						"std" => true,
						"type" => "checkbox"
						);


		$options[] = array( "name" => __('Next/prev Article', 'framework'),
						"id" => "post_np",
						"std" => true,
						"type" => "checkbox"
						);


		$options[] = array( "name" => __('Related Posts', 'framework'),
						"type" => "info",
						"desc" => __('Control In related Posts, show/hide, Count of posts, Type: Tags/category, select style', 'framework')
						);

		$options[] = array( "name" => __('Enable', 'framework'),
						"id" => "related_enable",
						"std" => true,
						"type" => "checkbox"
						);

		$options[] = array( "name" => __('Number Of Posts', 'framework'),
						"id" => "related_count",
						"std" => 4,
						"type" => "text"
						);


		$options[] = array( "name" => __('Related posts By:', 'framework'),
						"id" => "related_type",
						"std" => 'category',
						"type" => "select",
						"options" => array(
							'category' => __('Category', 'framework'),
							'tags' =>  __('Tags', 'framework')
						)
						);


		$options[] = array( "name" => __('Related posts Style:', 'framework'),
						"id" => "related_style",
						"std" => 'default',
						"type" => "select",
						"options" => array(
							'default' =>  __('Default (image/title)', 'framework'),
							'list' =>  __('List', 'framework')
						)
						);



// Article Elements
//share
		$options[] = array( "name" => __('Article Share', 'framework'),
						"type" => "heading",
						"slug" => "share"
						);

		$options[] = array( "name" => __('Article Share', 'framework'),
						"type" => "info",
						"desc" => __('Enable/disable the share networks under every article', 'framework')
						);

		$options[] = array( "name" => __('Disable Share', 'framework'),
						"id" => "disable_share",
						"std" => false,
						"type" => "checkbox"
						);

		$options[] = array( "name" => __('Twitter', 'framework'),
						"id" => "share_twitter",
						"std" => true,
						"type" => "checkbox"
						);

		$options[] = array( "name" => __('Google+', 'framework'),
						"id" => "share_gplus",
						"std" => true,
						"type" => "checkbox"
						);

		$options[] = array( "name" => __('Facebook', 'framework'),
						"id" => "share_facebook",
						"std" => true,
						"type" => "checkbox"
						);

		$options[] = array( "name" => __('Linkedin', 'framework'),
						"id" => "share_linkedin",
						"std" => true,
						"type" => "checkbox"
						);

		$options[] = array( "name" => __('Stumble Upon', 'framework'),
						"id" => "share_su",
						"std" => true,
						"type" => "checkbox"
						);

		$options[] = array( "name" => __('Digg', 'framework'),
						"id" => "share_digg",
						"std" => false,
						"type" => "checkbox"
						);

		$options[] = array( "name" => __('Evernote', 'framework'),
						"id" => "share_evernote",
						"std" => false,
						"type" => "checkbox"
						);

		$options[] = array( "name" => __('Reddit', 'framework'),
						"id" => "share_reddit",
						"std" => false,
						"type" => "checkbox"
						);


//share

//Feature Slide

$options[] = array( "name" => __('Feature Slider', 'framework'),
						"type" => "heading",
						"slug" => "feature"
						);

		
	$options[] = array( "name" => __('Feature Category', 'framework'),
						"id" => "feature_category",
						"type" => "select",
						"options" => $options_categories
						);

	$options[] = array( "name" => __('Effect', 'framework'),
						"desc" => __('name of transition effect', 'framework'),
						"id" => "cycle_effect",
						"std" => "fade",
						"type" => "select",
						"options" => $cycle_effects
						);

	$options[] = array( "name" => __('easing', 'framework'),
						"desc" => __('easing method for transitions <a href="http://ralphwhitbeck.com/demos/jqueryui/effects/easing/">more info</a>', 'framework'),
						"id" => "cycle_ease",
						"std" => "easeInOutBack",
						"type" => "text"
						);

	$options[] = array( "name" => __('Speed', 'framework'),
						"desc" => __('speed of the transition', 'framework'),
						"id" => "cycle_speed",
						"std" => "300",
						"step" => "1",
						"min" => "200",
						"max" => "5000",
						"suffix" => "ms",
						"type" => "range",
						);

	$options[] = array( "name" => __('timeout', 'framework'),
						"desc" => __('milliseconds between slide transitions', 'framework'),
						"id" => "cycle_timeout",
						"std" => "5000",
						"step" => "1",
						"min" => "500",
						"max" => "20000",
						"suffix" => "ms",
						"type" => "range",
						);


// End Feature


// Footer
$options[] = array( "name" => __('Footer', 'framework'),
						"type" => "heading",
						"slug" => "footer"
						);
						
$options[] = array( "name" => __('copyrights', 'framework'),
						"desc" => __('footer copyrights text', 'framework'),
						"id" => "copyrights",
						"std" => __('© 2011 Powered By Wordpress, Goodnews Theme By Momizat Team', 'theme'),
						"type" => "textarea"
						);
						
$options[] = array( "name" => __('powered by', 'framework'),
						"desc" => __('footer powered by text', 'framework'),
						"id" => "powered_by",
						"std" => __('Powered by:', 'theme'),
						"type" => "text"
						);
						
$options[] = array( "name" => __('Official KOICA logo', 'framework'),
						"id" => "koica_logo_img",
						"desc" => __('upload custom logo, it would be .png file', 'framework'),
						"type" => "upload",
						);

$options[] = array( "name" => __('WORLD FRIEND logo', 'framework'),
						"id" => "wdf_logo_img",
						"desc" => __('upload custom logo, it would be .png file', 'framework'),
						"type" => "upload",
						);																		
						
// End Footer						
						
// Other Element
$options[] = array( "name" => __('Other Element', 'framework'),
						"type" => "heading",
						"slug" => "other"
						);						

$options[] = array( "name" => __('Headline of Project sidebar homepage', 'framework'),
						"id" => "project_title_sidebar",
						"type" => "text",
						);
						
$options[] = array( "name" => __('See more projects sidebar', 'framework'),
						"id" => "more_projects_sidebar",
						"type" => "text",
						);						
						
$options[] = array( "name" => __('All Projects Support Page', 'framework'),
						"id" => "project_landing_page",
						"type" => "select",
						"options" => $options_pages,
						);


	return $options;
}
// End Element