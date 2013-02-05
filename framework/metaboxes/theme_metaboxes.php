<?php
/**
 * Registering meta boxes
 *
 * In this file, I'll show you how to extend the class to add more field type (in this case, the 'taxonomy' type)
 * All the definitions of meta boxes are listed below with comments, please read them carefully.
 * Note that each validation method of the Validation Class MUST return value instead of boolean as before
 *
 * You also should read the changelog to know what has been changed
 *
 * For more information, please visit: http://www.deluxeblogtips.com/2010/04/how-to-create-meta-box-wordpress-post.html
 *
 */

/********************* BEGIN EXTENDING CLASS ***********************/

/**
 * Extend RW_Meta_Box class
 * Add field type: 'taxonomy'
 */
class RW_Meta_Box_Taxonomy extends RW_Meta_Box {
	
	function add_missed_values() {
		parent::add_missed_values();
		
		// add 'multiple' option to taxonomy field with checkbox_list type
		foreach ($this->_meta_box['fields'] as $key => $field) {
			if ('taxonomy' == $field['type'] && 'checkbox_list' == $field['options']['type']) {
				$this->_meta_box['fields'][$key]['multiple'] = true;
			}
		}
	}
	
	// show taxonomy list
	function show_field_taxonomy($field, $meta) {
		global $post;
		
		if (!is_array($meta)) $meta = (array) $meta;
		
		$this->show_field_begin($field, $meta);
		
		$options = $field['options'];
		$terms = get_terms($options['taxonomy'], $options['args']);
		
		// checkbox_list
		if ('checkbox_list' == $options['type']) {
			foreach ($terms as $term) {
				echo "<input type='checkbox' name='{$field['id']}[]' value='$term->slug'" . checked(in_array($term->slug, $meta), true, false) . " /> $term->name<br/>";
			}
		}
		// select
		else {
			echo "<select name='{$field['id']}" . ($field['multiple'] ? "[]' multiple='multiple' style='height:auto'" : "'") . ">";
		
			foreach ($terms as $term) {
				echo "<option value='$term->slug'" . selected(in_array($term->slug, $meta), true, false) . ">$term->name</option>";
			}
			echo "</select>";
		}
		
		$this->show_field_end($field, $meta);
	}
}

/********************* END EXTENDING CLASS ***********************/

/********************* BEGIN DEFINITION OF META BOXES ***********************/

// prefix of meta keys, optional
// use underscore (_) at the beginning to make keys hidden, for example $prefix = '_rw_';
// you also can make prefix empty to disable it
$prefix = 'mom_';

$meta_boxes = array();


// residences meta box
$meta_boxes[] = array(
	'id' => 'article_setting',
	'title' => 'Article Setup',
	'pages' => array('post'),
	'priority' => 'high',


	'fields' => array(
		array(
			'name' => __('Article Type', 'theme'),
			'id' => $prefix . 'article_type',
			'type' => 'select',
			'std' => '',
			'options' => array (
				'article' => __('Article', 'theme'),
				'slideshow' => __('Slideshow', 'theme')
			)

		),
	)
);

$meta_boxes[] = array(
	'id' => 'images_setting',
	'title' => 'The Slideshow',
	'pages' => array('post'),
	'priority' => 'default',
	'fields' => array(
		array(
			'name' => __('Upload The Images', 'theme'),
			'id' => $prefix . 'slideshow_imgs',
			'type' => 'image',
			'std' => ''

		),

		//array(
		//	'name' => __('Show bullets', 'theme'),
		//	'id' => $prefix . 'slide_bull',
		//	'type' => 'checkbox',
		//	'std' => true
		//
		//),
		//
	)
);


$meta_boxes[] = array(
	'id' => 'project_items',
	'title' => 'Project Information',
	'pages' => array('project'),
	'priority' => 'default',

	'fields' => array(

		array(
			'name' => __('Partner Ministry/Institution', 'theme'),
			'id' => $prefix . 'partner',
			'type' => 'text',
			'std' => ''

		),
		array(
			'name' => __('Location', 'theme'),
			'id' => $prefix . 'location',
			'type' => 'text',
			'std' => ''

		),
		array(
			'name' => __('Duration', 'theme'),
			'id' => $prefix . 'duration',
			'type' => 'text',
			'std' => ''
		),
		array(
			'name' => __('Budget', 'theme'),
			'id' => $prefix . 'budget',
			'type' => 'text',
			'std' => ''
		),
		/*array(
			'name' => __('Map coordinate', 'theme'),
			'id' => $prefix . 'map_coordinate',
			'type' => 'map',
			'std' => ''
		),*/
		array(
			'name' => __('Map Latitude', 'theme'),
			'id' => $prefix . 'map_latitude',
			'desc' => 'Get value of Latitude from this website: <a href="http://www.getlatlon.com/" target="_blank">www.getlatlon.com</a>',
			'type' => 'text',
			'std' => ''
		),
		array(
			'name' => __('Map Longitude', 'theme'),
			'id' => $prefix . 'map_longitude',
			'desc' => 'Get value of Longitude from this website: <a href="http://www.getlatlon.com/" target="_blank">www.getlatlon.com</a>',
			'type' => 'text',
			'std' => ''
		),
		array(
			'name' => __('Project Article Type', 'theme'),
			'id' => $prefix . 'project_article_type',
			'desc' => 'Select "Article", if this project have only one picture. - Select "Slideshow", if this project have multiple pictures and Click button "Add more images" to upload picture',
			'type' => 'select',
			'std' => '',
			'options' => array (
				'single' => __('Article', 'theme'),
				'slideshow' => __('Slideshow', 'theme')
				)
			),
		array(
			'name' => __('Upload The Images', 'theme'),
			'id' => $prefix . 'project_slideshow_imgs',
			'type' => 'image',
			'std' => ''
		),

	)
);

$meta_boxes[] = array(
	'id' => 'download_items',
	'title' => 'Upload file',
	'pages' => array('download'),
	'priority' => 'default',
	'fields' => array(
		array(
			'name' => __('Link of Korean version file', 'theme'),
			'id' => $prefix . 'dl_kr_file',
			'type' => 'text',
			'std' => ''
		),
		array(
			'name' => __('Link of Khmer version file', 'theme'),
			'id' => $prefix . 'dl_kh_file',
			'type' => 'text',
			'class' => 'test',
			'std' => ''
		),
		array(
			'name' => __('Link of English version file', 'theme'),
			'id' => $prefix . 'dl_en_file',
			'type' => 'text',
			'std' => ''
		),
	)
);


foreach ($meta_boxes as $meta_box) {
	new RW_Meta_Box_Taxonomy($meta_box);
}

/********************* END DEFINITION OF META BOXES ***********************/

/********************* BEGIN VALIDATION ***********************/

/**
 * Validation class
 * Define ALL validation methods inside this class
 * Use the names of these methods in the definition of meta boxes (key 'validate_func' of each field)
 */
class RW_Meta_Box_Validate {
	function check_name($text) {
		if ($text == 'Anh Tran') {
			return 'He is Rilwis';
		}
		return $text;
	}
}

/********************* END VALIDATION ***********************/
?>
