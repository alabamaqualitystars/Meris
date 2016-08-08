<?php
// global $wp_registered_sidebars;
#########################################
function meris_widgets_init() {
		register_sidebar(array(
			'name' => 'Default Sidebar',
			'id'   => 'displayed_everywhere',
			'before_widget' => '<div id="%1$s" class="widget widget-box %2$s">',
			'after_widget' => '<span class="seperator extralight-border"></span></div>',
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>'
			));
		register_sidebar(array(
			'name' => 'Post Left Sidebar',
			'id'   => 'post_left_sidebar',
			'before_widget' => '<div id="%1$s" class="widget widget-box %2$s">',
			'after_widget' => '<span class="seperator extralight-border"></span></div>',
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>'
			));
		register_sidebar(array(
			'name' => 'Post Right Sidebar',
			'id'   => 'post_right_sidebar',
			'before_widget' => '<div id="%1$s" class="widget widget-box %2$s">',
			'after_widget' => '<span class="seperator extralight-border"></span></div>',
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>'
			));
		register_sidebar(array(
			'name' => 'Page Left Sidebar',
			'id'   => 'page_left_sidebar',
			'before_widget' => '<div id="%1$s" class="widget widget-box %2$s">',
			'after_widget' => '<span class="seperator extralight-border"></span></div>',
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>'
			));
		register_sidebar(array(
			'name' => 'Page Right Sidebar',
			'id'   => 'page_right_sidebar',
			'before_widget' => '<div id="%1$s" class="widget widget-box %2$s">',
			'after_widget' => '<span class="seperator extralight-border"></span></div>',
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>'
			));
		register_sidebar(array(
			'name' => 'Category Sidebar',
			'id'   => 'category_sidebar',
			'before_widget' => '<div id="%1$s" class="widget widget-box %2$s">',
			'after_widget' => '<span class="seperator extralight-border"></span></div>',
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>'
			));
		register_sidebar(array(
			'name' => 'Tag Sidebar',
			'id'   => 'tag_sidebar',
			'before_widget' => '<div id="%1$s" class="widget widget-box %2$s">',
			'after_widget' => '<span class="seperator extralight-border"></span></div>',
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>'
			));
		register_sidebar(array(
			'name' => 'Archive Sidebar',
			'id'   => 'archive_sidebar',
			'before_widget' => '<div id="%1$s" class="widget widget-box %2$s">',
			'after_widget' => '<span class="seperator extralight-border"></span></div>',
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>'
			));
		register_sidebar(array(
			'name' => 'Search Sidebar',
			'id'   => 'search_sidebar',
			'before_widget' => '<div id="%1$s" class="widget widget-box %2$s">',
			'after_widget' => '<span class="seperator extralight-border"></span></div>',
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>'
			));
		register_sidebar(array(
			'name' => 'Page 404 Left Sidebar',
			'id'   => 'page_404_left_sidebar',
			'before_widget' => '<div id="%1$s" class="widget widget-box %2$s">',
			'after_widget' => '<span class="seperator extralight-border"></span></div>',
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>'
			));
		register_sidebar(array(
			'name' => 'Page 404 Right Sidebar',
			'id'   => 'page_404_right_sidebar',
			'before_widget' => '<div id="%1$s" class="widget widget-box %2$s">',
			'after_widget' => '<span class="seperator extralight-border"></span></div>',
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>'
			));


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
	$columns           = isset($home_sections_array['widget-area-column-item'][$sanitize_areaname ])?$home_sections_array['widget-area-column-item'][$sanitize_areaname ]:array("12");


	$j                = 1;
	$column_num       = count($columns);
		 foreach($columns as $widget){
			 if($column_num > 1){
				 $widget_name = $areaname." Column ".$j;
				 }else{
				 $widget_name = $areaname;
				 }

			register_sidebar(array(
			'name' => $widget_name,
			'id'   => sanitize_title($widget_name),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '<span class="seperator extralight-border"></span></div>',
			'before_title' => '<h3 class="widgettitle">',
			'after_title' => '</h3>'
			));

			$j++;

		   }

	   }
	  }
	}

	//register_widget('meris_home_service');
	register_widget('meris_home_service_block');

	register_widget('meris_home_divider');
	register_widget('meris_home_slogan');
	register_widget('meris_home_portfolio_block');
	//register_widget('meris_home_portfolio');
	//register_widget('meris_home_about');
	register_widget('meris_home_contact');
	register_widget('meris_home_title');
	register_widget('meris_sidebar_slider');
	register_widget('meris_sidebar_social');
	register_widget('meris_post_tabs');
	register_widget('meris_testimonial');
	register_widget('meris_blog_list');
	register_widget('meris_carousel');
	register_widget('meris_team');
	register_widget('meris_progress_bar');

}
add_action( 'widgets_init', 'meris_widgets_init' );



/**
 * Home page service widget
 */
 // service structure 1
class meris_home_service_block extends WP_Widget {
 	function meris_home_service_block() {
 		$widget_ops = array( 'classname' => 'home_widget_service', 'description' => __( 'Display pages as service.', 'meris' ) );
		$control_ops = array( 'width' => 350, 'height' =>250 );
		parent::WP_Widget( false, $name = __( 'Meris: Service', 'meris' ), $widget_ops, $control_ops);
 	}

 	function form( $instance ) {

	for($i=0;$i<4;$i++){
		$defaults['service_'.$i] = '';
		$defaults['icon_'.$i] = '';
		$defaults['color_'.$i] = '';
	}
	$instance = wp_parse_args( (array) $instance, $defaults );

	for($i=0;$i<4;$i++){
	?>

    <p>
               <label for="<?php echo $this->get_field_id( 'color_'.$i  ); ?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php printf(__('Color %s', 'meris'),($i+1)); ?>:</label>
			<input id="<?php echo $this->get_field_id( 'color_'.$i  ); ?>" name="<?php echo $this->get_field_name( 'color_'.$i ); ?>" value="<?php echo esc_attr($instance['color_'.$i]); ?>" class="" placeholder="<?php _e('Font Awesome Icon Color', 'meris'); ?>" style="width:240px;"/>
            </p>

           <p>
               <label for="<?php echo $this->get_field_id( 'icon_'.$i  ); ?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php printf(__('Icon %s', 'meris'),($i+1)); ?>:</label>
			<input id="<?php echo $this->get_field_id( 'icon_'.$i  ); ?>" name="<?php echo $this->get_field_name( 'icon_'.$i ); ?>" value="<?php echo esc_attr($instance['icon_'.$i]); ?>" class="" placeholder="<?php _e('Font Awesome Icon or Image Url', 'meris'); ?>" style="width:240px;"/>
            </p>

		 <p><label for="<?php echo $this->get_field_id( 'service_'.$i ); ?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php printf(__( 'Page  %s', 'meris' ),($i+1)); ?>:</label>
				<?php wp_dropdown_pages( array( 'show_option_none' =>' ','name' => $this->get_field_name( 'service_'.$i ), 'selected' => absint($instance[ 'service_'.$i] )) ); ?></p>


		<?php
	}

	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		for($i=0;$i<4;$i++){
		$instance['service_'.$i] = absint( $new_instance['service_'.$i] );
		$instance['icon_'.$i]    =  esc_attr($new_instance['icon_'.$i]);
		$instance['color_'.$i]   =  esc_attr($new_instance['color_'.$i]);
	   }



		return $instance;
	}

	function widget( $args, $instance ) {
 		extract( $args );
 		extract( $instance );

 		global $post;
 		$page_array = array();
		$icon_array = array();
		$color_array = array();
 		for( $i=0; $i<4; $i++ ) {
 			$var = 'service_'.$i;
 			$page_id = isset( $instance[ $var ] ) ? absint($instance[ $var ]) : '';
			$icon_array[$i] = esc_attr($instance[ 'icon_'.$i ]);
			$color_array[$i] = esc_attr($instance[ 'color_'.$i ]);

 			if( !empty( $page_id ) )
 				array_push( $page_array, $page_id );// Push the page id in the array
 		}
		$get_service_pages = new WP_Query( array(
			'posts_per_page' 			=> -1,
			'post_type'					=>  array( 'page' ),
			'post__in'		 			=> $page_array,
			'orderby' 		 			=> 'post__in'
		) );
		echo $before_widget;
		$j        = 0;
		$list_num = count($page_array);
		switch($list_num){
			case 1:
			$column = "12";
			break;
			case 2:
			$column = "6";
			break;
			case 3:
			$column = "4";
			break;
			case 4:
			$column = "3";
			break;

			}
		if(count($page_array)>0){
	    while( $get_service_pages->have_posts() ):$get_service_pages->the_post();
		  $icon  = $icon_array[$j];
		  $color = $color_array[$j];
		  if($icon != ""){
		  if(strstr($icon,"http")){
		  $icon = '<img src="'.$icon.'" alt="" />';
		  }else{
			  if($color != "") $icon_style = 'color:'.$color.';';else $icon_style = "";
		  $icon = '<i class="'.$icon.'" style="'.$icon_style.'"></i>';
		  }
		  }

 		echo '<div class="col-sm-6 col-md-'.$column.'"><div class="service-box text-center">
									'.$icon.'
									<h3>'.get_the_title().'</h3>
									<p>'.get_the_excerpt().'</p>
									 
								</div></div>';
			$j++;
				endwhile;
				wp_reset_postdata();
		}
		echo $after_widget;

 }
}
   // service structure 2

   class meris_home_service extends WP_Widget {
 	function meris_home_service() {
 		$widget_ops = array( 'classname' => 'home_widget_service', 'description' => __( 'Display page as service.', 'meris' ) );
		$control_ops = array( 'width' => 350, 'height' =>250 );
		parent::WP_Widget( false, $name = __( 'Meris: Service', 'meris' ), $widget_ops, $control_ops);
 	}

 	function form( $instance ) {

 	$defaults = array('page_id'=>'','icon'=>'','color'=>'');
 	$instance = wp_parse_args( (array) $instance, $defaults ); ?>




            <p>
               <label for="<?php echo $this->get_field_id( 'icon'  ); ?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php _e('Icon', 'meris'); ?>:</label>
			<input id="<?php echo $this->get_field_id( 'icon'  ); ?>" name="<?php echo $this->get_field_name( 'icon'  ); ?>" value="<?php echo esc_attr($instance['icon']); ?>" class="" placeholder="<?php _e('Font Awesome Icon or Image Url', 'meris'); ?>" style="width:240px;"/>
            </p>

            <p>
				<label for="<?php echo $this->get_field_id( 'page_id' ); ?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php _e( 'Page', 'meris' ); ?>:</label>
				<?php wp_dropdown_pages( array( 'show_option_none' =>' ','name' => $this->get_field_name(  'page_id' ), 'selected' => absint($instance[ 'page_id']) ) ); ?>
                </p>

		<?php

	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

			$instance[ 'page_id'] =  absint( $new_instance['page_id' ] );
			$instance[ 'icon']    =  esc_attr($new_instance['icon' ]) ;


		return $instance;
	}

	function widget( $args, $instance ) {
 		extract( $args );
 		extract( $instance );

		echo $before_widget;
		if(is_numeric($page_id)){
	    $query = new WP_Query( 'page_id='.absint($page_id) );
		while ($query->have_posts()) : $query->the_post();
		  if($icon != ""){
		  if(strstr($icon,"http")){
		  $icon = '<img src="'.esc_url($icon).'" alt="" />';
		  }else{
		  $icon = '<i class="'.esc_attr($icon).'"></i>';
		  }
		  }

 		echo '<div class="service-box text-center">
									'.$icon.'
									<h3>'.get_the_title().'</h3>
									<p>'.get_the_excerpt().'</p>
									<a href="'.get_permalink().'">'.__("Read More>>","meris").'</a>
								</div>';
				endwhile;
				wp_reset_postdata();
		}
		echo $after_widget;
 	}
 }

/**************************************************************************************/

/**
 * Home page divider widget
 */
 class meris_home_divider extends WP_Widget {
 	function meris_home_divider() {
 		$widget_ops = array( 'classname' => 'home_widget_divider', 'description' => __( 'Divider for each row.', 'meris' ) );
		$control_ops = array( 'width' => 350, 'height' =>250 );
		parent::WP_Widget( false, $name = __( 'Meris: Divider', 'meris' ), $widget_ops, $control_ops);
 	}

 	function form( $instance ) {

 	$defaults = array('height' => '10');
	$instance = wp_parse_args( (array) $instance, $defaults ); ?>


            <p>
               <label for="<?php echo $this->get_field_id( 'height'  ); ?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php _e('Height', 'meris'); ?>:</label>
			<input id="<?php echo $this->get_field_id( 'height'  ); ?>" name="<?php echo $this->get_field_name( 'height'  ); ?>" value="<?php echo absint($instance['height']); ?>" class="" placeholder="Divider height"/> px
            </p>


		<?php

	}

 function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
        $instance[ 'height']  = absint( $new_instance['height' ] );

		return $instance;
	}

	function widget( $args, $instance ) {
 		extract( $args );
 		extract( $instance );

		echo $before_widget;
		echo '<div class="divider" style="height:'.absint($height).'px"></div>';
		echo $after_widget;
 	}
 }
/**************************************************************************************/

/**
 * Home page slogan widget
 */
class meris_home_slogan extends WP_Widget {
 	function meris_home_slogan() {
 		$widget_ops  = array( 'classname' => 'home_widget_slogan', 'description' =>  __('slogan widget', 'meris') );
		$control_ops = array( 'width' => 350, 'height' =>250 );
		parent::WP_Widget( false, $name = __( 'Meris: Slogan', 'meris' ), $widget_ops, $control_ops);
 	}

 	function form( $instance ) {

    $defaults = array('color' => '#FED136','title'=>'','slogan_content'=>'');

	$instance = wp_parse_args( (array) $instance, $defaults ); ?>

            <p><label for="<?php echo $this->get_field_id( 'color'  ); ?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php _e('Color', 'meris'); ?>:</label>
			<input id="<?php echo $this->get_field_id( 'color'  ); ?>" name="<?php echo $this->get_field_name( 'color'  ); ?>" value="<?php echo esc_attr($instance['color']); ?>" class="" type="text" />
            </p>
            <p>
             <label for="<?php echo $this->get_field_id( 'title'  ); ?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php _e('Title', 'meris'); ?>:</label>
            <input id="<?php echo $this->get_field_id( 'title'  ); ?>" type="text" name="<?php echo $this->get_field_name( 'title'  ); ?>" value="<?php echo esc_attr($instance['title']); ?>" class="" />
            </p>
            <p>
            <label for="<?php echo $this->get_field_id( 'slogan_content'  ); ?>"><?php _e('Content', 'meris'); ?>:</label>
            <textarea id="<?php echo $this->get_field_id( 'slogan_content'  ); ?>"  name="<?php echo $this->get_field_name( 'slogan_content'  ); ?>" class=""><?php echo esc_textarea($instance['slogan_content']); ?></textarea>
            </p>

		<?php

	}

	function update( $new_instance, $old_instance ) {
		$instance                     =  $old_instance;
        $instance[ 'title']           =  esc_attr($new_instance['title']) ;
		$instance[ 'slogan_content']  =  esc_html($new_instance['slogan_content']) ;
		$instance[ 'color']           =  esc_attr($new_instance['color']) ;

		return $instance;
	}

	function widget( $args, $instance ) {
 		extract( $args );
 		extract( $instance );
		echo $before_widget;
		$background  = "";
		$quote_color = "";
		if(isset($color))
		{
			$background  = 'background-color:'.esc_attr($color).';';
			$quote_color = 'color:'.esc_attr($color).';';
		}
		echo '<div class="slogan"><div class="slogan-wrapper" style="'.$background.'">
						<div class="container">
							<div class="slogan-box text-center">
								<h3>'.esc_attr($title).'</h3>
								<p>'.do_shortcode(esc_textarea($slogan_content)).'</p>
							</div>
							<!--<div class="quote left">
								<i class="fa fa-quote-left" style="'.$quote_color.'"></i>
								<div class="quote-slit">
									<i class="fa fa-quote-left"></i>
								</div>
							</div>
							<div class="quote right">
								<i class="fa fa-quote-right" style="'.$quote_color.'"></i>
								<div class="quote-slit">
									<i class="fa fa-quote-right"></i>
								</div>--!>
							</div>
						</div>
					</div>
					</div>';
		echo $after_widget;
 	}
 }
/**************************************************************************************/

/**
 * Home page portfolio widget
 */

 // portfolio structure 1
class meris_home_portfolio_block extends WP_Widget {
 	function meris_home_portfolio_block() {
 		$widget_ops = array( 'classname' => 'home_widget_service', 'description' => __( 'Display pages as portfolio. Best for homepage section three ', 'meris' ) );
		$control_ops = array( 'width' => 350, 'height' =>250 );
		parent::WP_Widget( false, $name = __( 'Meris: Portfolio', 'meris' ), $widget_ops, $control_ops);
 	}

 	function form( $instance ) {

	for($i=0;$i<4;$i++){
		$defaults['portfolio_'.$i] = '';
	}
	$instance = wp_parse_args( (array) $instance, $defaults );

	for($i=0;$i<4;$i++){
	?>


		 <p><label for="<?php echo $this->get_field_id( 'portfolio_'.$i ); ?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php printf(__( 'Page  %s', 'meris' ),($i+1)); ?>:</label>
				<?php wp_dropdown_pages( array( 'show_option_none' =>' ','name' => $this->get_field_name( 'portfolio_'.$i ), 'selected' => absint($instance[ 'portfolio_'.$i] )) ); ?></p>


		<?php
	}

	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		for($i=0;$i<4;$i++){
		$instance['portfolio_'.$i] = absint( $new_instance['portfolio_'.$i] );
	   }



		return $instance;
	}

	function widget( $args, $instance ) {
 		extract( $args );
 		extract( $instance );

 		global $post;
 		$page_array = array();
		$icon_array = array();
 		for( $i=0; $i<4; $i++ ) {
 			$var = 'portfolio_'.$i;
 			$page_id = isset( $instance[ $var ] ) ? absint($instance[ $var ]) : '';

 			if( !empty( $page_id ) )
 				array_push( $page_array, $page_id );// Push the page id in the array
 		}
		$get_service_pages = new WP_Query( array(
			'posts_per_page' 			=> -1,
			'post_type'					=>  array( 'page' ),
			'post__in'		 			=> $page_array,
			'orderby' 		 			=> 'post__in'
		) );
		echo $before_widget;
		$j        = 0;
		$list_num = count($page_array);
		switch($list_num){
			case 1:
			$column = "12";
			break;
			case 2:
			$column = "6";
			break;
			case 3:
			$column = "4";
			break;
			case 4:
			$column = "3";
			break;

			}
		if(count($page_array)>0){
	    while( $get_service_pages->have_posts() ):$get_service_pages->the_post();

 		$tags = get_the_tags(get_the_ID());
	   $tags_list = '<ul>';
	   if(is_array($tags)){
	   foreach ( $tags as $tag ) {
		  $tag_link   = get_tag_link( $tag->term_id );
		  $tags_list .= "<li><a href='{$tag_link}' title='{$tag->name} Tag' class='{$tag->slug}'>";
		  $tags_list .= "{$tag->name}</a></li>";
	   }
	   }
	  $tags_list .= '</ul>';


	 echo '<div class="col-sm-6 col-md-'.$column.'"><div class="portfolio-box text-center">';
	  if ( has_post_thumbnail() ) {
	   echo '<a href="'.get_permalink().'">';
		the_post_thumbnail("portfolio");
	   echo '</a>';
	  }
	 echo '<a href="'.get_permalink().'"><h3>'.get_the_title().'</h3></a>'.$tags_list.'</div>';
	 echo '</div>';
				endwhile;
				wp_reset_postdata();
		}
		echo $after_widget;

 }
}
 // portfolio structure 2
class meris_home_portfolio extends WP_Widget {
 	function meris_home_portfolio() {
 		$widget_ops = array( 'classname' => 'home_widget_portfolio', 'description' => __( 'Display page as portfolio.', 'meris' ) );
		$control_ops = array( 'width' => 350, 'height' =>250 );
		parent::WP_Widget( false, $name = __( 'Meris: Portfolio', 'meris' ), $widget_ops, $control_ops);
 	}

 	function form( $instance ) {

 	 $defaults = array('page_id'=>'');

	$instance = wp_parse_args( (array) $instance, $defaults ); ?>


            <p><label for="<?php echo $this->get_field_id( 'page_id' ); ?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php _e( 'Page', 'meris' ); ?>:</label>
				<?php wp_dropdown_pages( array( 'show_option_none' =>' ','name' => $this->get_field_name(  'page_id' ), 'selected' => absint($instance[ 'page_id']) ) ); ?></p>

		<?php
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

			$instance[ 'page_id'] = absint( $new_instance['page_id' ] );

		return $instance;
	}

	function widget( $args, $instance ) {
 		extract( $args );
 		extract( $instance );

		echo $before_widget;
		if(is_numeric($page_id)){
	    $query = new WP_Query( 'page_id='.absint($page_id ));
		while ($query->have_posts()) : $query->the_post();


	   $tags = get_the_tags($page_id);
	   $tags_list = '<ul>';
	   if(is_array($tags)){
	   foreach ( $tags as $tag ) {
		  $tag_link   = get_tag_link( $tag->term_id );
		  $tags_list .= "<li><a href='{$tag_link}' title='{$tag->name} Tag' class='{$tag->slug}'>";
		  $tags_list .= "{$tag->name}</a></li>";
	   }
	   }
	  $tags_list .= '</ul>';


	 echo '<div class="portfolio-box text-center">';
	  if ( has_post_thumbnail() ) {
	   echo '<a href="'.get_permalink().'">';
		the_post_thumbnail("portfolio");
	   echo '</a>';
	  }
	 echo '<a href="'.get_permalink().'"><h3>'.get_the_title().'</h3></a>'.$tags_list.'</div>';

				endwhile;
				wp_reset_postdata();
		}
		echo $after_widget;
 	}
 }
/**************************************************************************************/


/**
 * Home page about widget
 */
 class meris_home_about extends WP_Widget {
 function meris_home_about() {
 		$widget_ops = array( 'classname' => 'home_widget_about', 'description' =>'' );
		$control_ops = array( 'width' => 350, 'height' =>250 );
		parent::WP_Widget( false, $name = __( 'Meris: About Us', 'meris' ), $widget_ops, $control_ops);
 	}

 function form( $instance ) {

 	$defaults = array('title' => '','sub_title' => '','description' => '');
	$instance = wp_parse_args( (array) $instance, $defaults ); ?>


            <p>
               <label for="<?php echo $this->get_field_id( 'title'  ); ?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php _e('Title', 'meris'); ?>:</label>
			<input id="<?php echo $this->get_field_id( 'title'  ); ?>" name="<?php echo $this->get_field_name( 'title'  ); ?>" value="<?php echo esc_attr($instance['title']); ?>" class="" />
            </p>

             <p>
               <label for="<?php echo $this->get_field_id( 'sub_title'  ); ?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php _e('Sub-Title', 'meris'); ?>:</label>
			<input id="<?php echo $this->get_field_id( 'sub_title'  ); ?>" name="<?php echo $this->get_field_name( 'sub_title'  ); ?>" value="<?php echo esc_attr($instance['sub_title']); ?>" class="" />
            </p>

             <p>
            <label for="<?php echo $this->get_field_id( 'description'  ); ?>"><?php _e('Description', 'meris'); ?>:</label>
            <textarea id="<?php echo $this->get_field_id( 'description'  ); ?>"  name="<?php echo $this->get_field_name( 'description'  ); ?>" class=""><?php echo esc_textarea($instance['description']); ?></textarea>
            </p>
		<?php

	}

 function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
        $instance[ 'title']       =  esc_attr( $new_instance['title' ] );
		$instance[ 'sub_title']   =  esc_attr( $new_instance['sub_title' ] );
		$instance[ 'description'] =  esc_html( $new_instance['description' ] );


		return $instance;
	}

 function widget( $args, $instance ) {
 		extract( $args );
 		extract( $instance );

		echo $before_widget;
		echo '<div class="about">
				 <div class="title-wrapper">
					 <h2 class="module-title">'.esc_attr($title).'</h2>
						 <p class="module-description">'.esc_attr($sub_title).'</p>
				</div>
					     <p class="about-info">'.do_shortcode(esc_textarea($description)).'</p>
				</div>';
		echo $after_widget;
 	}
 }
/**************************************************************************************/

/**
 * Home page contact form widget
 */
 class meris_home_contact extends WP_Widget {
 	function meris_home_contact() {
 		$widget_ops = array( 'classname' => 'home_widget_contact', 'description' => __( 'Contact form', 'meris' ) );
		$control_ops = array( 'width' => 350, 'height' =>250 );
		parent::WP_Widget( false, $name = __( 'Meris: Contact Form', 'meris' ), $widget_ops, $control_ops);
 	}

 	function form( $instance ) {
	$admin_email = get_option( 'admin_email' );
 	$defaults = array('contact_email' => $admin_email);
	$instance = wp_parse_args( (array) $instance, $defaults ); ?>




            <p>
            <label for="<?php echo $this->get_field_id( 'contact_email'  ); ?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php _e('Email', 'meris'); ?>:</label>
			<input id="<?php echo $this->get_field_id( 'contact_email'  ); ?>" name="<?php echo $this->get_field_name( 'contact_email'  ); ?>" value="<?php echo sanitize_email($instance['contact_email']); ?>" class="" />


            </p>
            <p><?php _e("Your email address which use to receive email.","meris");?></p>

		<?php

	}

 function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
        $instance[ 'contact_email']  =  sanitize_email($new_instance['contact_email']) ;

		return $instance;
	}

	function widget( $args, $instance ) {
 		extract( $args );
 		extract( $instance );

		echo $before_widget;
		echo '<div class="contact">

									<form action="'.esc_url(home_url('/')).'" class="contact-form" method="post">
			                        	<fieldset>
											<section>
												<label for="contact-name" class="sr-only">'.__("Name","meris").'</label>
												<input type="text" name="contact-name" id="contact-name" placeholder="'.__("YOUR NAME","meris").'*" tabindex="1" required="" aria-required="true">
											</section>
											<section>
												<label for="contact-email" class="sr-only">'.__("Email","meris").'</label>
												<input type="email" name="contact-email" id="contact-email" placeholder="'.__("YOUR E-MAIL","meris").'*" tabindex="2" required="" aria-required="true">
											</section>
											<section>
												<label for="contact-msg" class="sr-only">'.__("Message","meris").'</label>
												<textarea name="contact-msg" id="contact-msg" cols="39" rows="5" tabindex="3" placeholder="'.__("YOUR MESSAGE","meris").'*"></textarea>
											</section>
										</fieldset>
										<section>
											<span><div id="loading"></div></span><input type="submit" value="'.__("SEND MESSAGE","meris").'">
										</section>
									</form>
								</div>';
		echo $after_widget;
 	}
 }
/**************************************************************************************/


/**
 * Home page title widget
 */
 class meris_home_title extends WP_Widget {
 	function meris_home_title() {
 		$widget_ops = array( 'classname' => 'home_widget_title', 'description' => __( 'Display section title.', 'meris' ) );
		$control_ops = array( 'width' => 350, 'height' =>250 );
		parent::WP_Widget( false, $name = __( 'Meris: Section Title', 'meris' ), $widget_ops, $control_ops);
 	}

 	function form( $instance ) {

 	$defaults = array('title' => '','sub_title'=>'');
	$instance = wp_parse_args( (array) $instance, $defaults ); ?>


             <p>
               <label for="<?php echo $this->get_field_id( 'title'  ); ?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php _e('Title', 'meris'); ?>:</label>
			<input id="<?php echo $this->get_field_id( 'title'  ); ?>" name="<?php echo $this->get_field_name( 'title'  ); ?>" value="<?php echo esc_attr( $instance['title'] ); ?>" class="" />
            </p>

             <p>
               <label for="<?php echo $this->get_field_id( 'sub_title'  ); ?>"><?php _e('Sub-Title', 'meris'); ?>:</label>
			<input id="<?php echo $this->get_field_id( 'sub_title'  ); ?>" name="<?php echo $this->get_field_name( 'sub_title'  ); ?>" value="<?php echo esc_attr( $instance['sub_title'] ); ?>" class="" />
            </p>


		<?php

	}

 function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
        $instance[ 'title']       =  esc_attr( $new_instance['title' ] );
		$instance[ 'sub_title']   =  esc_attr( $new_instance['sub_title' ] );

		return $instance;
	}

	function widget( $args, $instance ) {
 		extract( $args );
 		extract( $instance );

		echo $before_widget;
		echo '<div class="title-wrapper">
							<h2 class="module-title">'.esc_attr($title).'</h2>
							<p class="module-description">'.esc_attr($sub_title).'</p>
						</div>';
		echo $after_widget;
 	}
 }
/**************************************************************************************/
/**
 * Sidebar slider.
 */
class meris_sidebar_slider extends WP_Widget {
 	function meris_sidebar_slider() {
 		$widget_ops = array( 'classname' => 'page_widget_slider', 'description' => __( 'Display some pages as slider.', 'meris' ) );
		$control_ops = array( 'width' => 250, 'height' =>250 );
		parent::WP_Widget( false, $name = __( 'Meris: Widget Slider', 'meris' ), $widget_ops, $control_ops);
 	}

 	function form( $instance ) {
 		for ( $i=0; $i<6; $i++ ) {
 			$var = 'page_id'.$i;
 			$defaults[$var] = '';
 		}
 		$instance = wp_parse_args( (array) $instance, $defaults );
 		for ( $i=0; $i<6; $i++ ) {
 			$var = 'page_id'.$i;
 			$var = absint( $instance[ $var ] );
		}
	?>
		<?php for( $i=0; $i<6; $i++) { ?>
			<p>
				<label for="<?php echo $this->get_field_id( key($defaults) ); ?>"><?php _e( 'Page', 'meris' ); ?>:</label>
				<?php wp_dropdown_pages( array( 'show_option_none' =>' ','name' => $this->get_field_name( key($defaults) ), 'selected' => absint($instance[key($defaults)]) ) ); ?>
			</p>
		<?php
		next( $defaults );
		}
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		for( $i=0; $i<6; $i++ ) {
			$var = 'page_id'.$i;
			$instance[ $var] = absint( $new_instance[ $var ] );
		}

		return $instance;
	}

	function widget( $args, $instance ) {
 		extract( $args );
 		extract( $instance );

 		global $post;
 		$page_array = array();
 		for( $i=0; $i<6; $i++ ) {
 			$var = 'page_id'.$i;
 			$page_id = isset( $instance[ $var ] ) ? absint($instance[ $var ]): '';

 			if( !empty( $page_id ) )
 				array_push( $page_array, $page_id );
 		}
		$get_featured_pages = new WP_Query( array(
			'posts_per_page' 			=> -1,
			'post_type'					=>  array( 'page' ),
			'post__in'		 			=> $page_array,
			'orderby' 		 			=> 'post__in'
		) );
		echo $before_widget; ?>
			<?php
			$i = 0;
			$controller = '';
			$images     = '';
 			while( $get_featured_pages->have_posts() ):$get_featured_pages->the_post();
				$page_title = get_the_title();
				$active     = '';
				if($i==0) $active = 'active';

				if (has_post_thumbnail( get_the_ID() ) ):
				$image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID()), 'side-slider' );

				$controller .= '<li data-target="#carousel-slider-generic" data-slide-to="'.$i.'" class="'.$active.'"></li>';
				$images     .= '<div class="item '.$active.'"><a href="'.get_permalink().'"><img src="'.$image[0].'" alt="'.get_the_title().'"></a></div>';
				endif;
				$i++;
				endwhile;
				?>
				<div class="widget-slider">
										<div id="carousel-slider-generic" class="carousel slide" data-ride="carousel">
											<!-- Indicators -->
											<ol class="carousel-indicators">
												<?php echo $controller;?>
											</ol>
											<!-- Wrapper for slides -->
											<div class="carousel-inner">
												<?php echo $images;?>
											</div>
										</div>
										<div class="carousel-bg"></div>
									</div>
			<?php
	 		wp_reset_postdata();
 			?>
		<?php
		echo $after_widget;
 	}
 }
/**************************************************************************************/


/**
 * Sidebar social network widget
 */
 class meris_sidebar_social extends WP_Widget {
 	function meris_sidebar_social() {
 		$widget_ops = array( 'classname' => 'meris_sidebar_social', 'description' => __( 'Display sidebar social network.', 'meris' ) );
		$control_ops = array( 'width' => 350, 'height' =>250 );
		parent::WP_Widget( false, $name = __( 'Meris: Social Network', 'meris' ), $widget_ops, $control_ops);
 	}

 	function form( $instance ) {
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

	for($i=0;$i<9;$i++){
		$defaults['social_icon_'.$i] = '';
		$defaults['social_link_'.$i] = '';
	}
	$instance = wp_parse_args( (array) $instance, $defaults );

	for($i=0;$i<9;$i++){
	?>

		<p>
         <label for="<?php echo $this->get_field_id( 'social_icon_'.$i  ); ?>"><?php _e('Social Icon', 'meris'); ?>:</label>
             <select id="<?php echo $this->get_field_id( 'social_icon_'.$i ); ?>" name="<?php echo $this->get_field_name( 'social_icon_'.$i  ); ?>">
           <?php

		   foreach($social_icons as $key=>$val){
			   $selected = '';
			  if( $instance[ 'social_icon_'.$i ] == $key) $selected = 'selected="selected"';
			   ?>
           <option   value="<?php echo $key;?>" <?php echo $selected ;?>><?php echo esc_attr($val);?></option>
           <?php }?>
            </select>
            </p>
             <p>
               <label for="<?php echo $this->get_field_id( 'social_link_'.$i  ); ?>"><?php _e('Social Link', 'meris'); ?>:</label>
			<input id="<?php echo $this->get_field_id( 'social_link_'.$i   ); ?>" name="<?php echo $this->get_field_name(  'social_link_'.$i   ); ?>" value="<?php echo esc_url($instance[ 'social_link_'.$i ]); ?>" class="" />
            </p>


		<?php
	}
	}

 function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		for($i=0;$i<9;$i++){
		 $instance[ 'social_icon_'.$i] =  esc_attr($new_instance['social_icon_'.$i]) ;
		 $instance[ 'social_link_'.$i] =  esc_url_raw($new_instance['social_link_'.$i ]) ;
	}

		return $instance;
	}

	function widget( $args, $instance ) {
 		extract( $args );

		echo $before_widget;
		echo '<div class="widget-sns">';
		for($i=0;$i<9; $i++){
					$social_icon = esc_attr($instance['social_icon_'.$i]);
					$social_link = esc_url($instance['social_link_'.$i]);
					if($social_link !=""){
					echo '<a href="'.$social_link.'" target="_blank"><i class="'.$social_icon.'"></i></a>';
					}
					}

        echo '</div>';
		echo $after_widget;
 	}
 }
/**************************************************************************************/



/**
 * Popular posts and latest posts tabs
 */
 class meris_post_tabs extends WP_Widget {
 	function meris_post_tabs () {
 		$widget_ops = array( 'classname' => 'home_widget_title', 'description' => __( 'Display popular posts and latest posts tabs.', 'meris' ) );
		$control_ops = array( 'width' => 250, 'height' =>250 );
		parent::WP_Widget( false, $name = __( 'Meris: Posts Tabs', 'meris' ), $widget_ops, $control_ops);
 	}

 	function form( $instance ) {

 	$defaults = array('popular_num' => '5','recent_num'=>'5');
	$instance = wp_parse_args( (array) $instance, $defaults ); ?>


             <p>
               <label for="<?php echo $this->get_field_id( 'popular_num'  ); ?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php _e('Popular Posts List Num', 'meris'); ?>:</label>
			<input id="<?php echo $this->get_field_id( 'popular_num'  ); ?>" name="<?php echo $this->get_field_name( 'popular_num'  ); ?>" value="<?php echo absint($instance['popular_num']); ?>" class="" />
            </p>

             <p>
               <label for="<?php echo $this->get_field_id( 'recent_num'  ); ?>"><?php _e('Resent Post List Num', 'meris'); ?>:</label>
			<input id="<?php echo $this->get_field_id( 'recent_num'  ); ?>" name="<?php echo $this->get_field_name( 'recent_num'  ); ?>" value="<?php echo absint($instance['recent_num']); ?>" class="" />
            </p>


		<?php

	}

   function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
        $instance[ 'popular_num']  =  absint($new_instance['popular_num']) ;
		$instance[ 'recent_num']   =  absint($new_instance['recent_num']) ;

		return $instance;
	}

	function widget( $args, $instance ) {
 		extract( $args );
 		extract( $instance );

		echo $before_widget;
		echo '<div class="widget-posts-tabs">
									<div class="widget-post">
										<ul class="nav nav-tabs">
  											<li class="active"><a href="#pop" data-toggle="tab">'.__('Popular Posts', 'meris').'</a></li>
  											<li class=""><a href="#rec" data-toggle="tab">'.__('Recent Posts', 'meris').'</a></li>
  										</ul>
  										<!-- Tab panes -->
  										<div class="tab-content">
  											<div class="tab-pane active" id="pop">
  												<ul>';
										$this->tabs_popular_posts($instance);

  			echo '</ul>
  											</div>
  											<div class="tab-pane" id="rec">
  												<ul>';
										$this->tabs_latest_posts($instance);

            echo '</ul>
  											</div>
  										</div>
									</div>
								</div>';
		echo $after_widget;
 	}



/*Method to load popular posts*/
 function tabs_popular_posts($instance)
 {
	extract( $instance );
	$popular = new WP_Query('orderby=comment_count&posts_per_page='.absint($popular_num));

	while ($popular->have_posts()) : $popular->the_post();
	?>
    <li>
      <?php
         if ( has_post_thumbnail() ) {
              the_post_thumbnail("side-slider");
               }
      ?>
       <div class="tab-inner-box">
         <div><a title="<?php the_title(); ?>" href="<?php the_permalink() ?>"><?php the_title(); ?></a></div>
          <div><i class="fa fa-comments"></i>&nbsp;&nbsp;<?php the_date("M d.Y")?></div>
          </div>
    </li>
	<?php
	endwhile;
	wp_reset_postdata();
}

/*Method to load latest posts*/
 function tabs_latest_posts( $instance )
  {
	extract( $instance );
	$the_query = new WP_Query('showposts='. absint($recent_num) .'&orderby=post_date&order=desc');

	while ($the_query->have_posts()) : $the_query->the_post();
	?>
	<li>
      <?php
         if ( has_post_thumbnail() ) {
              the_post_thumbnail("side-slider");
               }
      ?>
       <div class="tab-inner-box">
         <div><a title="<?php the_title(); ?>" href="<?php the_permalink() ?>"><?php the_title(); ?></a></div>
          <div><i class="fa fa-comments"></i>&nbsp;&nbsp;<?php the_date("M d.Y")?></div>
          </div>
    </li>
	<?php
	endwhile;
	wp_reset_postdata();
   }
 }
//**************************************************************************************/

/**
 * Testimonial
 */

 class meris_testimonial extends WP_Widget {
 	function meris_testimonial() {
 		$widget_ops = array( 'classname' => 'page_widget_testimonial', 'description' =>  __( 'Testimonial', 'meris' ) );
		$control_ops = array( 'width' => 300, 'height' =>250 );
		parent::WP_Widget( false, $name = __( 'Meris: Testimonial', 'meris' ), $widget_ops, $control_ops);
 	}

 	function form( $instance ) {
 		for ( $i=0; $i<5; $i++ ) {
 			$defaults['author_'.$i]  = '';
			$defaults['avatar_'.$i]  = '';
			$defaults['rating_'.$i]  = '5';
			$defaults['content_'.$i] = '';
 		}
 		$instance = wp_parse_args( (array) $instance, $defaults );

	?>
		<?php for( $i=0; $i<5; $i++) { ?>
			 <p>
            <label for="<?php echo $this->get_field_id( 'author_'.$i  ); ?>"><?php _e('Author', 'meris'); ?>:</label>
			<input id="<?php echo $this->get_field_id( 'author_'.$i ); ?>" name="<?php echo $this->get_field_name( 'author_'.$i ); ?>" value="<?php echo esc_attr( $instance['author_'.$i] ); ?>" class="" />
            </p>
             <p>
            <label for="<?php echo $this->get_field_id( 'avatar_'.$i  ); ?>">&nbsp;&nbsp;<?php _e('Avatar', 'meris'); ?>:</label>
			<input id="<?php echo $this->get_field_id( 'avatar_'.$i ); ?>" placeholder="Avatar URL" name="<?php echo $this->get_field_name( 'avatar_'.$i ); ?>" value="<?php echo esc_url( $instance['avatar_'.$i] ); ?>" class="" />
            </p>
            <p>
         <label for="<?php echo $this->get_field_id( 'rating_'.$i  ); ?>">&nbsp;&nbsp;<?php _e('Rating', 'meris'); ?>:</label>
         <select id="<?php echo $this->get_field_id( 'rating_'.$i  ); ?>" name="<?php echo $this->get_field_name( 'rating_'.$i  ); ?>">
          <option <?php if($instance['rating_'.$i] == "50"){?> selected="selected" <?php }?> value="50">5 </option>
          <option <?php if($instance['rating_'.$i] == "45"){?> selected="selected" <?php }?> value="45"> 4.5</option>
          <option <?php if($instance['rating_'.$i] == "40"){?> selected="selected" <?php }?> value="40"> 4</option>
          <option <?php if($instance['rating_'.$i] == "35"){?> selected="selected" <?php }?> value="35">3.5 </option>
          <option <?php if($instance['rating_'.$i] == "30"){?> selected="selected" <?php }?> value="30">3 </option>
          <option <?php if($instance['rating_'.$i] == "25"){?> selected="selected" <?php }?> value="25"> 2.5</option>
          <option <?php if($instance['rating_'.$i] == "20"){?> selected="selected" <?php }?> value="20"> 2</option>
          <option <?php if($instance['rating_'.$i] == "15"){?> selected="selected" <?php }?> value="15"> 1.5</option>
          <option <?php if($instance['rating_'.$i] == "10"){?> selected="selected" <?php }?> value="10">1 </option>
         </select>
 </p>

             <p>
            <label for="<?php echo $this->get_field_id( 'content_'.$i  ); ?>"><?php _e('Content', 'meris'); ?>:</label>
            <textarea id="<?php echo $this->get_field_id( 'content_'.$i ); ?>"  name="<?php echo $this->get_field_name( 'content_'.$i ); ?>" class=""><?php echo esc_textarea( $instance['content_'.$i] ); ?></textarea>
            </p>

		<?php

		}
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		for( $i=0; $i<5; $i++ ) {
			$instance['author_'.$i]  = esc_attr( $new_instance['author_'.$i])  ;
			$instance['avatar_'.$i]  = esc_url_raw($new_instance['avatar_'.$i])  ;
			$instance['rating_'.$i]  = esc_attr($new_instance['rating_'.$i])  ;
			$instance['content_'.$i] = esc_html($new_instance['content_'.$i]) ;

		}

		return $instance;
	}

	function widget( $args, $instance ) {
 		extract( $args );

		echo $before_widget;
		?>
<div class="testimonial-wrapper cycle-slideshow">
<?php

	for( $i=0; $i<5; $i++ ) {

		    $author  = esc_attr($instance['author_'.$i] ) ;
			$avatar  = esc_url($instance['avatar_'.$i])  ;
			$rating  = esc_attr($instance['rating_'.$i] ) ;
			$content = esc_textarea($instance['content_'.$i]) ;

			if($content !=""){
			$star     = '';

            $rating_i = intval($rating/10);
			$rating_c = 5 - $rating/10;

			for($j=0; $j<$rating_i; $j++)
			{
				$star    .= '<i class="fa fa-star"></i>';

				}
			if($rating%10 != 0){
				$star    .= '<i class="fa fa-star-half-o"></i>';
				}
			if($rating_c >= 1){
				for($k=0;$k<intval($rating_c);$k++){
				$star    .= '<i class="fa fa-star-o"></i>';
					}
				}
			$active = "";
			if($i==0) $active = "active";
				?>
		<div class="testimonial item <?php echo $active;?>">
						<div class="testimonial-content-wrapper">
							<div class="testimonial-content">
								<?php echo $content; ?>
										</div>
									</div>
									<div class="testimonial-author">
                                    <?php if($avatar != ""){?>
										<img alt="" src="<?php echo $avatar; ?>" />
                                      <?php }?>
										<p><?php echo $author; ?></p>
										<p><?php echo $star ; ?></p>
									</div>
								</div>
			<?php
			  }
			}
			?>
              </div>
		<?php
		echo $after_widget;
 	}
 }

 //**************************************************************************************/

/**
 * Blog List
 */

 class meris_blog_list extends WP_Widget {
 	function meris_blog_list() {
 		$widget_ops = array( 'classname' => 'page_widget_blog_list', 'description' =>  __( 'Blog List', 'meris' ) );
		$control_ops = array( 'width' => 300, 'height' =>250 );
		parent::WP_Widget( false, $name = __( 'Meris: Blog List', 'meris' ), $widget_ops, $control_ops);
 	}

 	function form( $instance ) {
 	    $defaults = array("list_num"=>"2");
 		$instance = wp_parse_args( (array) $instance, $defaults );

	?>
		<p>
         <label for="<?php echo $this->get_field_id( 'list_num' ); ?>">&nbsp;&nbsp;<?php _e('List Num', 'meris'); ?>:</label>
         <select id="<?php echo $this->get_field_id( 'list_num'  ); ?>" name="<?php echo $this->get_field_name( 'list_num'  ); ?>">
          <option <?php if( absint($instance['list_num']) == "2"){?> selected="selected" <?php }?> value="2"> 2 </option>
          <option <?php if( absint($instance['list_num']) == "3"){?> selected="selected" <?php }?> value="3"> 3 </option>
          <option <?php if( absint($instance['list_num']) == "4"){?> selected="selected" <?php }?> value="4"> 4 </option>
         </select>
 </p>



		<?php

	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

			$instance['list_num']  = absint($new_instance['list_num'])  ;

		return $instance;
	}

	function widget( $args, $instance ) {
 		extract( $args );

		echo $before_widget;
		?>
<div class="bloglist">
<div class="row">
<?php
	$the_query = new WP_Query( 'showposts='.absint($instance['list_num']).'&ignore_sticky_posts=1');
	switch($instance['list_num']){
		case "2":
		$column = "6";
		break;
		case "3":
		$column = "4";
		break;
		case "4":
		$column = "3";
		break;
		default:
		$column = "6";
		break;
		}
	while ( $the_query->have_posts() ) :  $the_query->the_post();

?>
									<div class="col-sm-<?php echo $column;?>">
										<div class="bloglist-box">
											<?php
												if ( has_post_thumbnail() ) {
												  the_post_thumbnail();
												}
												?>
											<div class="bloglist-content">
												<div class="entry-header">
													<a href="<?php the_permalink();?>"><h1 class="entry-title"><?php the_title();?></h1></a>
														<div class="entry-meta">
															<div class="entry-author"><i class="fa fa-user fa-fw"></i><?php echo get_the_author_link();?></div>
															<div class="entry-category"><i class="fa fa-file-o fa-fw"></i><?php the_category(', '); ?></div>
															<div class="entry-comments"><i class="fa fa-comments fa-fw"></i><?php  comments_popup_link( 'No comments yet', '1 comment', '% comments', 'comments-link', 'No comment');?></div>
														</div>
													</div>
													<div class="entry-summary">
														<?php the_excerpt();?>
													</div>
													<div class="entry-footer">
														<a href="<?php the_permalink();?>"><div class="entry-more"><?php _e("Read More","meris");?>&gt;&gt;</div></a>
													</div>
												</div>
											</div>
										</div>
									<?php endwhile;wp_reset_postdata();?>
									</div>
								</div>
		<?php
		echo $after_widget;
 	}
 }

 //**************************************************************************************/

 /**
 * Carousel
 */

 class meris_carousel extends WP_Widget {
 	function meris_carousel() {
 		$widget_ops = array( 'classname' => 'page_widget_carousel', 'description' => __( 'Carousel', 'meris' ) );
		$control_ops = array( 'width' => 300, 'height' =>250 );
		parent::WP_Widget( false, $name = __( 'Meris: Carousel', 'meris' ), $widget_ops, $control_ops);
 	}

 	function form( $instance ) {
 		for ( $i=0; $i<10; $i++ ) {
 			$defaults['image_'.$i]  = '';
 		}
		$defaults['list_num']  = '6';
 		$instance = wp_parse_args( (array) $instance, $defaults );

	?>

          <p>
         <label for="<?php echo $this->get_field_id( 'list_num' ); ?>">&nbsp;&nbsp;<?php _e('Display Num', 'meris'); ?>:</label>
         <select id="<?php echo $this->get_field_id( 'list_num'  ); ?>" name="<?php echo $this->get_field_name( 'list_num'  ); ?>">
         <option <?php if($instance['list_num'] == "1"){?> selected="selected" <?php }?> value="1"> 1 </option>
          <option <?php if($instance['list_num'] == "2"){?> selected="selected" <?php }?> value="2"> 2 </option>
          <option <?php if($instance['list_num'] == "3"){?> selected="selected" <?php }?> value="3"> 3 </option>
          <option <?php if($instance['list_num'] == "4"){?> selected="selected" <?php }?> value="4"> 4 </option>
          <option <?php if($instance['list_num'] == "5"){?> selected="selected" <?php }?> value="5"> 5 </option>
          <option <?php if($instance['list_num'] == "6"){?> selected="selected" <?php }?> value="6"> 6 </option>
          <option <?php if($instance['list_num'] == "7"){?> selected="selected" <?php }?> value="7"> 7 </option>
          <option <?php if($instance['list_num'] == "8"){?> selected="selected" <?php }?> value="8"> 8 </option>
          <option <?php if($instance['list_num'] == "9"){?> selected="selected" <?php }?> value="9"> 9 </option>
          <option <?php if($instance['list_num'] == "10"){?> selected="selected" <?php }?> value="10"> 10 </option>
         </select>
 </p>

		<?php for( $i=0; $i<10; $i++) { ?>
			 <p>
            <label for="<?php echo $this->get_field_id( 'image_'.$i  ); ?>"><?php _e('Image URL', 'meris'); ?>:</label>
			<input id="<?php echo $this->get_field_id( 'image_'.$i ); ?>" name="<?php echo $this->get_field_name( 'image_'.$i ); ?>" value="<?php echo esc_url($instance['image_'.$i]); ?>" class="" />
            </p>


		<?php

		}
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		for( $i=0; $i<10; $i++ ) {
			$instance['image_'.$i]  = esc_url_raw($new_instance['image_'.$i])  ;

		}
        $instance['list_num']  = absint($new_instance['list_num'])  ;
		return $instance;
	}

	function widget( $args, $instance ) {
 		extract( $args );

		echo $before_widget;
		?>
<div id="meris-carousel" class="owl-carousel" data-num="<?php echo $instance['list_num'];?>">
<?php
for( $i=0; $i<10; $i++ ) {
			if($instance['image_'.$i]  != ''){
				echo ' <div class="item"><img src="'.esc_url($instance['image_'.$i]).'"></div>';
				}

		}
?>
</div>
		<?php
		echo $after_widget;
 	}
 }

 //**************************************************************************************/


/**
 * team widget
 */
 class meris_team extends WP_Widget {
 	function meris_team() {
 		$widget_ops = array( 'classname' => 'meris-team', 'description' => __( 'Team', 'meris' ) );
		$control_ops = array( 'width' => 350, 'height' =>250 );
		parent::WP_Widget( false, $name = __( 'Meris: Team', 'meris' ), $widget_ops, $control_ops);
 	}

 	function form( $instance ) {

 	$defaults = array(
   'name' => '',
   'avatar' => '',
   'byline'   => '',
   'social_icon_1'   => '',
   'social_link_1'   => '',
   'social_icon_2'   => '',
   'social_link_2'   => '',
   'social_icon_3'   => '',
   'social_link_3'   => '',
   'social_icon_4'   => '',
   'social_link_4'   => '',
   'short_description' => '');
	$instance = wp_parse_args( (array) $instance, $defaults ); ?>

            <p>
            <label for="<?php echo $this->get_field_id( 'name'  ); ?>"><?php _e('Member Name', 'meris'); ?>:</label>
			<input id="<?php echo $this->get_field_id( 'name'  ); ?>" name="<?php echo $this->get_field_name( 'name'  ); ?>" value="<?php echo esc_attr( $instance['name'] ); ?>" class="" />
            </p>

             <p>
            <label for="<?php echo $this->get_field_id( 'avatar'  ); ?>"><?php _e('Avatar', 'meris'); ?>:</label>
			<input id="<?php echo $this->get_field_id( 'avatar'  ); ?>" name="<?php echo $this->get_field_name( 'avatar'  ); ?>" value="<?php echo esc_url( $instance['avatar'] ); ?>" class="" />
            </p>
              <p>
            <label for="<?php echo $this->get_field_id( 'byline'  ); ?>"><?php _e('Byline', 'meris'); ?>:</label>
			<input id="<?php echo $this->get_field_id( 'byline'  ); ?>" name="<?php echo $this->get_field_name( 'byline'  ); ?>" value="<?php echo esc_attr( $instance['byline'] ); ?>" class="" />
            </p>

   <?php
   for($i = 1; $i<=4 ; $i++){
   ?>

   <p>
            <label for="<?php echo $this->get_field_id( 'social_icon_'.$i  ); ?>"><?php _e('Social Icon', 'meris'); ?>:</label>
			<input id="<?php echo $this->get_field_id( 'social_icon_'.$i ); ?>" name="<?php echo $this->get_field_name( 'social_icon_'.$i ); ?>" value="<?php echo esc_attr( $instance['social_icon_'.$i] ); ?>" placeholder="<?php _e('Font Awesome Icon', 'meris'); ?>" class="" />
            </p>
     <p>
            <label for="<?php echo $this->get_field_id( 'social_link_'.$i ); ?>"><?php _e('Icon Link', 'meris'); ?>:</label>
			<input id="<?php echo $this->get_field_id( 'social_link_'.$i  ); ?>" name="<?php echo $this->get_field_name( 'social_link_'.$i ); ?>" value="<?php echo esc_url( $instance['social_link_'.$i] ); ?>" class="" />
            </p>


   <?php
   }
   ?>

     <p>
            <label for="<?php echo $this->get_field_id( 'short_description'  ); ?>"><?php _e('Short Description', 'meris'); ?>:</label>
            <textarea id="<?php echo $this->get_field_id( 'short_description'  ); ?>"  name="<?php echo $this->get_field_name( 'short_description'  ); ?>" class=""><?php echo esc_textarea($instance['short_description']); ?></textarea>
            </p>
   <?php

	}


 function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

        $instance[ 'name']               =  esc_attr($new_instance['name'] );
		$instance[ 'avatar']             =  esc_url_raw($new_instance['avatar'] );
		$instance[ 'byline']             =  esc_attr($new_instance['byline'] );
		$instance[ 'short_description']  =  esc_html($new_instance['short_description'] );

         for($i = 1; $i<=4 ; $i++){
			 $instance['social_icon_'.$i]    =  esc_attr($new_instance['social_icon_'.$i] );
		     $instance['social_link_'.$i]    =  esc_url_raw($new_instance['social_link_'.$i] );
		 }


		return $instance;
	}

	function widget( $args, $instance ) {
 		extract( $args );
 		extract( $instance );

		echo $before_widget;
		echo '<div class="widget-team team-box">
								<div class="team-img-box">
									<img src="'.esc_url($avatar).'">
									<div class="team-info">
										<h4>'.esc_attr($name).'</h4>
										<h5>'.esc_attr($byline).'</h5>
										<img src="'.esc_url($avatar).'">
										<div>
											<div class="team-sns">';
											for($i = 1; $i<=4 ; $i++){
												if(${"social_icon_".$i} != "" && ${"social_link_".$i} != ""){
												echo '<a href="'.esc_url(${"social_link_".$i}).'"><i class="fa '.esc_attr(${"social_icon_".$i}).'"></i></a>';
												}
											}

	echo  '</div>
         </div>  </div>
 </div><p>'.do_shortcode( esc_textarea($short_description) ).'</p></div>';
		echo $after_widget;
 	}
 }
/**************************************************************************************/

/**
 * progress widget
 */
 class meris_progress_bar extends WP_Widget {
 	function meris_progress_bar() {
 		$widget_ops = array( 'classname' => 'meris-progress-bar', 'description' => __( 'Progress bar.', 'meris' ) );
		$control_ops = array( 'width' => 350, 'height' =>250 );
		parent::WP_Widget( false, $name = __( 'Meris: Progress Bar', 'meris' ), $widget_ops, $control_ops);
 	}

 	function form( $instance ) {

 	$defaults = array();
	 for($i = 1; $i<=9 ; $i++){
		$defaults["title_".$i]    = "";
		$defaults["progress_".$i] = "";
	 }
	$instance = wp_parse_args( (array) $instance, $defaults ); ?>


   <?php
   for($i = 1; $i<=9 ; $i++){
   ?>
   <p><label for="<?php echo $this->get_field_id( 'title_'.$i  ); ?>"><?php printf(__('Title %s', 'meris'),$i); ?>:</label>
			<input id="<?php echo $this->get_field_id( 'title_'.$i ); ?>" name="<?php echo $this->get_field_name( 'title_'.$i ); ?>" value="<?php echo esc_attr( $instance['title_'.$i] ); ?>" class="" /></p>

   <p><label for="<?php echo $this->get_field_id( 'progress_'.$i  ); ?>"><?php printf(__('Pogress %i', 'meris'),$i); ?>:</label>
			<input id="<?php echo $this->get_field_id( 'progress_'.$i ); ?>" name="<?php echo $this->get_field_name( 'progress_'.$i ); ?>" value="<?php echo absint( $instance['progress_'.$i] ); ?>" placeholder="<?php _e('Number ( 1 - 100 )', 'meris'); ?>" class="" /></p>


   <?php
   }
   ?>

   <?php
	}

 function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

         for($i = 1; $i<=9 ; $i++){
			 $instance['title_'.$i]       =  esc_attr($new_instance['title_'.$i] );
		     $instance['progress_'.$i]    =  absint($new_instance['progress_'.$i] );
		 }


		return $instance;
	}

	function widget( $args, $instance ) {
 		extract( $args );
 		extract( $instance );
		echo $before_widget;
		echo '<div class="skills">';

		for($i = 1; $i<=9 ; $i++){

			if( ${'title_'.$i} != "" && is_numeric(${'progress_'.$i} )){
				if( ${'progress_'.$i} < 0) ${'progress_'.$i}   = 0;
				if( ${'progress_'.$i} > 100) ${'progress_'.$i} = 100;
			echo '<div class="skill-box clearfix">
    <h4 class="skill-title">'.esc_attr(${'title_'.$i}).'</h4>
    <div class="progress">
      <div class="progress-bar  progress-bar-striped" role="progressbar" aria-valuenow="'.esc_attr(${'title_'.$i}).'" aria-valuemin="0" aria-valuemax="100" style="width: '.absint(${'progress_'.$i}).'%;">'.absint(${'progress_'.$i}).'%</div></div></div>';
			}
		}

        echo '</div>';
		echo $after_widget;
 	}
 }
/**************************************************************************************/
