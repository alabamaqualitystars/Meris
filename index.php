<!DOCTYPE html>
<html lang="en">
<head>
<title>Alabama Quality STARS</title>
</head>


<?php
/**
* The main template file.
*
*/

get_header();
?>
<?php
global $enable_home_page;
if ( ('page' == get_option( 'show_on_front' ) && ( '' != get_option( 'page_for_posts' ) ) && $wp_query->get_queried_object_id() == get_option( 'page_for_posts' )) || $enable_home_page =="" ) {

	    $meris_sidebar          = get_post_meta($wp_query->get_queried_object_id(), '_meris_layout', true );
	
		switch($meris_sidebar){
			case "left":
			get_template_part("roop","left-sidebar");
			break;
			case "right":
			get_template_part("roop","right-sidebar");
			break;
			case "both":
			get_template_part("roop","both-sidebar");
			break;
			case "none":
			get_template_part("roop","no-sidebar");
			break;
			default:
			get_template_part("content","blog-list");
			break;
			}
	  
}else{
?>
<div class="homepage-main" role="main">
        
<?php 
//$top_slider = meris_options_array('enable_top_slider');
$home_banner = meris_options_array('home_banner');
$home_banner = $home_banner==""?1:$home_banner ;
$background_content_padding = meris_options_array('background_content_padding');
$content_padding = "";
if( $background_content_padding != ""){
$content_padding = "padding:".$background_content_padding;	
	}
if($home_banner == 1){
echo meris_get_default_slider();
}
if($home_banner == 2){
echo '<section class="homepage-video-background" ><div class="container"><div class="video-background-content" style="'.$content_padding.'">'.meris_options_array('background_text').'</div></div><div class="clear"></div></section>';
}
?>
<?php 
	$home_sections = get_option('_meris_home_widget_area');
    if($home_sections !=""){
    $home_sections_array = json_decode($home_sections, true);
     if(isset($home_sections_array['section-widget-area-name']) && is_array($home_sections_array['section-widget-area-name']) ){
	  
	   $num = count($home_sections_array['section-widget-area-name']);
	   for($i=0; $i<$num; $i++ ){
 
    $areaname          = isset($home_sections_array['section-widget-area-name'][$i])?$home_sections_array['section-widget-area-name'][$i]:"";
	$sanitize_areaname = sanitize_title($areaname);
	$color             = isset($home_sections_array['list-item-color'][$i])?$home_sections_array['list-item-color'][$i]:"";
	$image             = isset($home_sections_array['list-item-image'][$i])?$home_sections_array['list-item-image'][$i]:"";
	$repeat            = isset($home_sections_array['list-item-repeat'][$i])?$home_sections_array['list-item-repeat'][$i]:"";
	$position          = isset($home_sections_array['list-item-position'][$i])?$home_sections_array['list-item-position'][$i]:"";
	$attachment        = isset($home_sections_array['list-item-attachment'][$i])?$home_sections_array['list-item-attachment'][$i]:"";
	$layout            = isset($home_sections_array['widget-area-layout'][$i])?$home_sections_array['widget-area-layout'][$i]:"";
	$padding           = isset($home_sections_array['widget-area-padding'][$i])?$home_sections_array['widget-area-padding'][$i]:"";
	$column            = isset($home_sections_array['widget-area-column'][$i])?$home_sections_array['widget-area-column'][$i]:"";
	$columns           = isset($home_sections_array['widget-area-column-item'][$sanitize_areaname ])?$home_sections_array['widget-area-column-item'][$sanitize_areaname ]:"";
	$background_style = ""; 
	
	
    if ($image!="") {
	$background_style .= "background-image:url('".$image. "');background-repeat:".$repeat.";background-position:".$position.";background-attachment:".$attachment.";";
	}
	
	if( $color !=""){
	$background_style .= "background-color:".$color.";";
	 }
	if(is_numeric($padding))
	{
		$background_style .= "padding-top:".$padding."px;padding-bottom:".$padding."px;";
		}
	if($layout == "full"){
		$container = 'full-width';
		}else{
	    $container = 'container';
			}
	
	$column_num       = count($columns);
	$j               = 1;
   
		   echo '<section class="home-section '.$sanitize_areaname.'" style="'.$background_style.'"><div class="'.$container.'">';
	
		if(is_array($columns)){		
		   foreach($columns as $columnItem){
			   if($column_num > 1){
				 $widget_name = $areaname." Column ".$j;
				 }else{
				 $widget_name = $areaname;
				 }
			echo '<div class="col-md-'.$columnItem.'">';
		   dynamic_sidebar(sanitize_title($widget_name));
		   echo '</div>';
		   $j++;
		   }
	   }else{
		   echo '<div class="col-md-12">';
		   dynamic_sidebar($sanitize_areaname);
		   echo '</div>';
		   }
		   echo '<div class="clear"></div></div></section>';
	      
	         }
		   }
	   }
?>
</div>
<?php }?>
<?php get_footer();?>

</html>