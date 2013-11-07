<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<title><?php wp_title(' - ', true, 'right'); bloginfo('name'); ?></title>
<meta charset="<?php bloginfo( 'charset' ); ?>" />

<?php
//show description
	o2_show_description();
//show robots
	o2_show_robots();
// Creating the canonical URL
	o2_canonical_url();
//Stylesheet
o2_create_stylesheet();
?>

<!-- Single print -->
<link href="<?php bloginfo('template_url'); ?>/css/print.css" rel="stylesheet" media="print" type="text/css" />

<!-- Custom favicon -->
<link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/favicons.ico" />

<!-- feeds, pingback -->
  <link rel="alternate" type="application/rss+xml" title="<?php bloginfo( 'name' ); ?> RSS Feed" href="<?php if (of_get_option('feedburner')!= false) { echo of_get_option('feedburner'); } else { bloginfo( 'rss2_url' ); } ?>" />
  <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
<?php wp_head(); ?>

<!--[if lt IE 9]>
<script src="http://ie7-js.googlecode.com/svn/version/2.1(beta4)/IE9.js"></script>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
    
</head>

<body>
<header id="header">
    <div class="inner clearfix">
    	<div class="logo">
        <h2><a href="<?php echo home_url(); ?>" title="KOICA CAMBODIA">
        <?php if(of_get_option('logo_img')){ ?>
        <img src="<?php echo of_get_option('logo_img'); ?>" alt="<?php bloginfo('name'); ?>" />
        <?php } else { ?>
        <img src="<?php echo O2_IMG; ?>/logo.png" alt="<?php bloginfo('name'); ?>" />
        <?php } ?>
        </a></h2>
        </div>
        
        <div class="slogan">
        <?php if(of_get_option('slogan_img')){ ?>
        <img src="<?php echo of_get_option('slogan_img'); ?>" alt="<?php bloginfo('description'); ?>" />
        <?php } else { ?>
        <img src="<?php echo O2_IMG; ?>/slogan.png" alt="<?php bloginfo('description'); ?>" />
        <?php } ?>        
        </div>
        
        <div class="search_box">
        <?php include TEMPLATEPATH . '/searchform.php'; ?>
	    </div> <!--Search Box-->
        
    </div>
</header><!--/header-->

<nav id="navigation">
    <div class="inner">
    <div class="nav_wrap">
<?php if ( has_nav_menu( 'main' ) ) { ?>
		 <?php  wp_nav_menu ( array( 'menu_class' => 'nav','container'=> 'ul', 'theme_location' => 'main' )); ?>
		 <?php } else { ?>
			<ul class="nav">
				<li class="home"><a href="<?php echo home_url(); ?>"><?php _e('Home', 'theme'); ?></a></li>
			  <?php wp_list_categories(array(
				'title_li' => false,
				'hierarchical' => 1
			  )); ?>
			 </ul> <!--Top Nav-->

<?php } ?>
        
    </div> <!--End Nav Wrap-->
    </div> <!--Inner-->
</nav> <!--End Navigation-->    