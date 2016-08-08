<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 *
 */

function optionsframework_option_name() {

	$optionsframework_settings = get_option('optionsframework');
	
	// Edit 'options-theme-customizer' and set your own theme name instead
	$optionsframework_settings['id'] = 'options_theme_customizer';
	update_option('optionsframework', $optionsframework_settings);
}


/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 */

function optionsframework_options() {

	// Background Defaults
	
	$page_background = array(
		'color' => '',
		'image' => '',
		'repeat' => 'no-repeat',
		'position' => 'top left',
		'attachment'=>'fixed' );

	$options      = array();
	$social_icons = array('fa fa-facebook'=>'facebook',
						  'fa fa-flickr'=>'flickr',
						  'fa fa-google-plus'=>'google plus',
						  'fa fa-linkedin'=>'linkedin',
						  'fa fa-pinterest'=>'pinterest',
						  'fa fa-twitter'=>'twitter',
						  'fa fa-tumblr'=>'tumblr',
						  'fa fa-digg'=>'digg',
						  'fa fa-rss'=>'rss',
						 
						  );
   // HEADER
	$options[] = array(
		'name' => __('General Options', 'meris'),
		'type' => 'heading');

	$options[] = array(
		'name' => __('Upload Logo', 'meris'),
		'id' => 'logo',
		'std' => '',
		'type' => 'upload');
		
	$options[] = array(
		'name' => __('Favicon', 'meris'),
		'desc' => __('An icon associated with a URL that is variously displayed, as in a browser\'s address bar or next to the site name in a bookmark list. Learn more about <a href="'.esc_url("http://en.wikipedia.org/wiki/Favicon").'" target="_blank">Favicon</a>', 'meris'),
		'id' => 'favicon',
		'type' => 'upload');
	
	$options[] = array(
		'name' => __('Global Color', 'meris'),
		'id' => 'global_color',
		'std' => '#FED136',
		'type' => 'color');
	
	$options[] = array(
		'name' => __('404 Page Content', 'meris'),
		'id' => 'page_404_content',
		'std' => '<i class="fa fa-frown-o"></i>
		<p><strong>OOPS!</strong> Can\'t find the page.</p>',
		'type' => 'editor');
		
	$options[] = array(
		'name' => __('Custom CSS', 'meris'),
		'desc' => __('The following css code will add to the header before the closing &lt;/head&gt; tag.', 'meris'),
		'id' => 'custom_css',
		'std' => '
.homepage-video-background .video-background-content {
	bottom: 40%;
	right: 15%;
	left: 15%;
	color: #fff;
	z-index: 3;
}

.homepage-video-background .video-background-content h1 {
	color: #fff;
	font-size: 6em;
	text-transform: uppercase;
	font-weight: normal;
}

.homepage-video-background .video-background-content strong {
	font-weight: bold;
}

.homepage-video-background .video-background-content s {
	color: #fed136;
	text-decoration: none;
}

.homepage-video-background .video-background-content button {
	border: none;
	background-color: #fed136;
	color: #fff;
	width: 220px;
	height: 50px;
	font-size: 18px;
	text-transform: uppercase;
	margin-top: 40px;
	font-weight: bold;
}

.homepage-video-background .carousel-indicators li {
	border-width: 3px;
	height: 18px;
	width: 18px;
	border-radius: 18px;
	margin: 5px;
}

.homepage-video-background .carousel-indicators li.active {
	background-color: #fed136;
	margin: 5px;
}

.homepage-video-background .carousel-control .fa {
	position: absolute;
	top: 50%;
	z-index: 5;
	display: inline-block;
	font-size: 50px;
}

.homepage-video-background .carousel-control .fa-angle-left {
	left: 50%;
}

.homepage-video-background .carousel-control .fa-angle-right {
	right: 50%;
}

@media screen and (max-width: 1100px) {
	.homepage-video-background .video-background-content h1 {
		font-size: 4em;
	}
	.homepage-video-background .video-background-content {
		bottom: 20%;
	}
	.carousel-indicators {
		display: none;
	}
	.homepage-video-background .video-background-content button {
		width: 180px;
		height: 40px;
		font-size: 18px;
		margin-top: 30px;
	}
}
@media screen and (max-width: 919px) {
	.site-nav .sub-menu,
	.site-nav .children{
		display:block;
		}
	.site-nav li ul li a{
		color:#fff;
		}
	.site-nav ul{
		float:none;
		}
}
@media screen and (max-width: 767px) {
	.homepage-video-background .video-background-content h1 {
		font-size: 3em;
	}
	.homepage-video-background .video-background-content {
		bottom: 5%;
	}
	.homepage-video-background .video-background-content button {
		width: 150px;
		height: 34px;
		font-size: 16px;
		margin-top: 20px;
	}
}',
		'type' => 'textarea');

		////widget items
		//free version
		$options[] = array(
		'name' => __('Home Page', 'meris'),
		'type' => 'heading');
	
		$options[] = array(
		'name' => __('Enable Home Page Layout', 'meris'),
		'desc' => __('Active custom home page layout. ', 'meris'),
		'id' => 'enable_home_page',
		'std'=>'',
		'type' => 'checkbox');
		
		$options[] = array('name' => __('Background Video', 'meris'),'id' => 'background_video_title','type' => 'title');
		
		$options[] = array('name' => __('HTML5 Video Background Options', 'meris'),'id' => 'background_video_group_start','type' => 'start_group','class'=>'group_close');
		
		$options[] = array('name' => __('Mp4 Video Url', 'meris'),'id' => 'background_mp4_url', 'std' => '','desc'=>__('For Android devices, Internet Explorer 9, Safari','meris'),'type' => 'text');
		$options[] = array('name' => __('Ogv Video Url', 'meris'),'id' => 'background_ogv_url', 'std' => '','desc'=>__('For Google Chrome, Mozilla Firefox, Opera ','meris'),'type' => 'text');
		$options[] = array('name' => __('Webm Video Url', 'meris'),'id' => 'background_webm_url', 'std' => '','desc'=>__('For Google Chrome, Mozilla Firefox, Opera ','meris'),'type' => 'text');
		$options[] = array('name' => __('Poster', 'meris'),'id' => 'background_poster', 'std' => '','desc'=>__('Displaying the image for browsers that don\'t support the HTML5 video element.','meris'),'type' => 'upload');
		$options[] = array('name' => __('Text', 'meris'),'id' => 'background_text',	'std' => '','type' => 'editor');
		$options[] = array('name' => __('Video Loop', 'meris'),'id' => 'background_loop','class'=>'mini','std' => 'true','type' => 'select','options' => array("true"=>"yes","false"=>"no") );
		$options[] = array('name' => __('Content Padding', 'meris'),'id' => 'background_content_padding', 'std' => '100px 0','type' => 'text');
		
		$options[] = array('name' => '','id' => 'background_video_group_end','type' => 'end_group');
		
		
	/*	$options[] = array(
		'name' => __('Enable Top Slider', 'meris'),
		'id' => 'enable_top_slider',
		'std'=>'1',
		'desc' => __('Display top slider. ', 'meris'),
		'type' => 'checkbox');
		*/
			
	    $options[] = array(
		"name" => __('Home Page Banner', 'meris'),
		"id" => "home_banner",
		"std" => "1",
		"type" => "select",
		'class'=>'mini',
		"options" => array("0"=>"no banner",
						   "1"=>"slider",
						   "2"=>"background video"
						   ) );
		
		
		
		$options[] = array(
		'name' => __('Home Page Sections', 'meris'),
		'id' => 'home_page_sections',
		'std' => '{"section-widget-area-name":["Home Page Secion One","Home Page Secion Two","Home Page Secion Three","Home Page Secion Four"],"list-item-color":["","","",""],"list-item-image":["","","","'.MERIS_THEME_BASE_URL.'/images/background-1.jpg"],"list-item-repeat":["","","","no-repeat"],"list-item-position":["","","",""],"list-item-attachment":["","","",""],"widget-area-layout":["boxed","full","boxed","boxed"],"widget-area-column":["1","1","1","2"],"widget-area-column-item":{"home-page-secion-one":["12"],"home-page-secion-two":["12"],"home-page-secion-three":["12"],"home-page-secion-four":["6","6"]}}',
		'type' => 'widget-area');
		
		
		
		
        //
		// HEADER
	    $options[] = array(
		'name' => __('Header', 'meris'),
		'type' => 'heading');
		
		
		$options[] = array(
		'name' => __('Enable Header Search Form', 'meris'),
		'desc' => __('Display search form in header.', 'meris'),
		'id' => 'enable_search_form',
		'std'=>'1',
		'type' => 'checkbox');
	
		$options[] = array(
		'name' => __('Enable Sticky Header', 'meris'),
		'desc' => __('Active Sticky Header', 'meris'),
		'id' => 'enable_sticky_header',
		'std'=>'1',
		'type' => 'checkbox');
		
		$options[] = array(
		'name' => __('Upload Sticky Logo', 'meris'),
		'id' => 'sticky_logo',
		'std' => '',
		'type' => 'upload');
		
		$options[] = array(
		'name' => __('Display Site Name', 'meris'),
		'desc' => __('Display site name in sticky header', 'meris'),
		'id' => 'display_site_name',
		'std'=>'1',
		'type' => 'checkbox');
		
		// FOOTER
	    $options[] = array(
		'name' => __('Footer', 'meris'),
		'type' => 'heading');
	
        for($i=0;$i<9;$i++){
			
	    $options[] = array(
		"name" => sprintf(__('Social Icon #%s', 'meris'),($i+1)),
		"id" => "social_icon_".$i,
		"std" => "",
		"type" => "select",
		"options" => $social_icons );
		
		$options[] = array('name' => sprintf(__('Social Link #%s', 'meris'),($i+1)),'id' => 'social_link_'.$i,'type' => 'text');	
		}
		
		$options[] = array(
		'name' => __('Copyright', 'meris'),
		'id' => 'copyright',
		'std' => 'Designed by <a href="'.esc_url('http://www.mageewp.com/').'">MageeWP Themes</a>',
		'type' => 'editor');
		
		// Slider
		$options[] = array(
		'name' => __('Slider', 'meris'),
		'type' => 'heading');
		
		//HOME PAGE SLIDER
		$options[] = array('name' => __('Slideshow', 'meris'),'id' => 'group_title','type' => 'title');
		
		$options[] = array('name' => __('Slide 1', 'meris'),'id' => 'slide_group_start_1','type' => 'start_group','class'=>'group_close');
		$options[] = array('name' => __('Image', 'meris'),'id' => 'meris_slide_image_1','type' => 'upload','std'=>MERIS_THEME_BASE_URL.'/images/banner-1.jpg');
		//$options[] = array('name' => __('Title', 'meris'),'id' => 'meris_slide_title_1','type' => 'text','std'=>'Title 1');
		

		
		$options[] = array('name' => __('Text', 'meris'),'id' => 'meris_slide_text_1','type' => 'editor','std'=>'<h1>It<s>\'</s>s Nice <strong>to meet y<s>o</s>u</strong></h1><button>Tell Me More</button>');
		$options[] = array('name' => __('Link', 'meris'),'id' => 'meris_slide_link_1','type' => 'text');
		$options[] = array('name' => '','id' => 'slide_group_end_1','type' => 'end_group');
		
		$options[] = array('name' => __('Slide 2', 'meris'),'id' => 'slide_group_start_2','type' => 'start_group','class'=>'group_close');
		$options[] = array('name' => __('Image', 'meris'),'id' => 'meris_slide_image_2','type' => 'upload','std'=>MERIS_THEME_BASE_URL.'/images/banner-2.jpg');
		//$options[] = array('name' => __('Title', 'meris'),'id' => 'meris_slide_title_2','type' => 'text','std'=>'Title 2');
		$options[] = array('name' => __('Text', 'meris'),'id' => 'meris_slide_text_2','type' => 'editor','std'=>'<h1>It<s>\'</s>s Nice <strong>to meet y<s>o</s>u</strong></h1><button>Tell Me More</button>');
		$options[] = array('name' => __('Link', 'meris'),'id' => 'meris_slide_link_2','type' => 'text');
		$options[] = array('name' => '','id' => 'slide_group_end_2','type' => 'end_group');
		
		$options[] = array('name' => __('Slide 3', 'meris'),'id' => 'slide_group_start_3','type' => 'start_group','class'=>'group_close');
		$options[] = array('name' => __('Image', 'meris'),'id' => 'meris_slide_image_3','type' => 'upload','std'=>MERIS_THEME_BASE_URL.'/images/banner-3.jpg');
		//$options[] = array('name' => __('Title', 'meris'),'id' => 'meris_slide_title_3','type' => 'text');
		$options[] = array('name' => __('Text', 'meris'),'id' => 'meris_slide_text_3','type' => 'editor','std'=>'<h1>It<s>\'</s>s Nice <strong>to meet y<s>o</s>u</strong></h1><button>Tell Me More</button>');
		$options[] = array('name' => __('Link', 'meris'),'id' => 'meris_slide_link_3','type' => 'text');
		$options[] = array('name' => '','id' => 'slide_group_end_3','type' => 'end_group');
		
		$options[] = array('name' => __('Slide 4', 'meris'),'id' => 'slide_group_start_4','type' => 'start_group','class'=>'group_close');
		$options[] = array('name' => __('Image', 'meris'),'id' => 'meris_slide_image_4','type' => 'upload','std'=>MERIS_THEME_BASE_URL.'/images/banner-4.jpg');
		//$options[] = array('name' => __('Title', 'meris'),'id' => 'meris_slide_title_4','type' => 'text');
		$options[] = array('name' => __('Text', 'meris'),'id' => 'meris_slide_text_4','type' => 'editor','std'=>'<h1>It<s>\'</s>s Nice <strong>to meet y<s>o</s>u</strong></h1><button>Tell Me More</button>');
		$options[] = array('name' => __('Link', 'meris'),'id' => 'meris_slide_link_4','type' => 'text');
		$options[] = array('name' => '','id' => 'slide_group_end_4','type' => 'end_group');
		
		$options[] = array('name' => __('Slide 5', 'meris'),'id' => 'slide_group_start_5','type' => 'start_group','class'=>'group_close');
		$options[] = array('name' => __('Image', 'meris'),'id' => 'meris_slide_image_5','type' => 'upload');
	  //$options[] = array('name' => __('Title', 'meris'),'id' => 'meris_slide_title_5','type' => 'text');
		$options[] = array('name' => __('Text', 'meris'),'id' => 'meris_slide_text_5','type' => 'editor');
		$options[] = array('name' => __('Link', 'meris'),'id' => 'meris_slide_link_5','type' => 'text');
		$options[] = array('name' => '','id' => 'slide_group_end_5','type' => 'end_group');
		

	/*	$options[] = array(
		'name' => __('Slide Height', 'meris'),
		'id' => 'slide_height',
		'std' => '30%',
		'desc'=>__('Both formats: Percentage or Pixel(e.g. "30%" or "400px").','meris'),
		'type' => 'text');	*/
		
		$options[] = array(
		'name' => __('Slide Time', 'meris'),
		'id' => 'slide_time',
		'std' => '5000',
		'desc'=>__('Milliseconds between the end of the sliding effect and the start of the nex one.','meris'),
		'type' => 'text');		
		
		//END HOME PAGE SLIDER
		
	
		
		
	return $options;
}

