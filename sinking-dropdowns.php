<?php
/* 
Plugin Name: sinking dropdowns
Plugin URI: http://www.social-ink.net
Author URI: http://www.social-ink.net
Version: 1.25
Author: Yonatan Reinberg of Social Ink
Description: Responsive Dropdown Plugin
 
If you like this or need support, visit us at http://social-ink.net
 
Copyright 2014  Yonatan Reinberg (email : yoni [a t ] s o cia l-ink DOT net) - http://social-ink.net
**** some code from Tessa Thornton @ https://github.com/tessa-lt/dropdowns
*/


// 	*****************
//	init scripts & css

	define('SINKDROPDOWNS_PATH_EXT', plugins_url() . '/' . plugin_basename(dirname(__FILE__)));
	define('SINKDROPDOWNS_PATH_INT', plugin_dir_path( __FILE__ ));
	
	//constants
	require_once('controller/constants.php');
	require_once('controller/plugin.php');
	
	//activation
	register_activation_hook(__FILE__,'sinking_dropdowns_activate');	
	

	if (!is_admin()) {				
		//enqueue jquery 
		add_action('init', 'sinking_dropdowns_enqueue');			
	
		//enqueue header scripts, etc
		add_action('wp_head', 'sinking_dropdowns_scripting');	
	}	
			
		function sinking_dropdowns_scripting() { 	
			$plugin_url = plugins_url() . '/' . plugin_basename(dirname(__FILE__)); 
			
			$sinkdropdowns_menushow = get_option('sinkdropdowns_menushow');
			$sinkdropdowns_responsive_break = get_option('sinkdropdowns_responsive_break');
			$sinkdropdowns_prevent_top_clicks = get_option('sinkdropdowns_prevent_top_clicks');
			
			//custom colors
			$sinkdropdowns_sink_dropdown_themeoverwrite = get_option('sinkdropdowns_sink_dropdown_themeoverwrite');

			if($sinkdropdowns_sink_dropdown_themeoverwrite) {
			
				$impt_class = get_option('sinkdropdowns_sink_dropdown_colorsimportant')? '!important' : '';
				
				$sinkdropdowns_sink_dropdown_top = get_option('sinkdropdowns_sink_dropdown_top');
				$sinkdropdowns_sink_dropdown_top_link = get_option('sinkdropdowns_sink_dropdown_top_link');
				$sinkdropdowns_sink_dropdown_top_link_anchor = get_option('sinkdropdowns_sink_dropdown_top_link');

				$sinkdropdowns_sink_dropdown_mid = get_option('sinkdropdowns_sink_dropdown_mid');
				$sinkdropdowns_sink_dropdown_mid_link = get_option('sinkdropdowns_sink_dropdown_mid_link');

				$sinkdropdowns_sink_dropdown_bottom = get_option('sinkdropdowns_sink_dropdown_bottom');
				$sinkdropdowns_sink_dropdown_bottom_link = get_option('sinkdropdowns_sink_dropdown_bottom_link');		
			}
			
				?>		
					<!-- start sinking dropdowns by yonatan reinberg/social ink (c) 2014 - http://social-ink.net; yoni@social-ink.net -->
						<script type="text/javascript">
							/* <![CDATA[ */
							var sinkingdropdowns = {	"reveal_action":'<?php echo $sinkdropdowns_menushow ?>',
														"prevent_top_clicks":'<?php echo $sinkdropdowns_prevent_top_clicks ?>',
														"responsive_break":'<?php echo $sinkdropdowns_responsive_break ?>'	};
							/* ]]> */				
						</script>

						<!--[if IE 7]>
							<script type="text/javascript" src="<?php echo $plugin_url ?>/js/sinking_dropdowns.ie7fix.js"></script>
						<![endif]-->
						
						<script type="text/javascript" src="<?php echo $plugin_url ?>/js/sinking_dropdowns.min.js"></script>
						<link rel="stylesheet" type="text/css" href="<?php echo $plugin_url ?>/css/sinking_dropdowns.css" media="screen" />

						 <style type="text/css">
							<?php if($sinkdropdowns_sink_dropdown_themeoverwrite) { ?>
								li.sink_dropdown_top, .sink_dropdown li, .sink_dropdown_top ul.sub-menu {background:<? echo $sinkdropdowns_sink_dropdown_top ?> <? echo $impt_class ?>;}
								.dropdown_triangle { border-top: 4px solid <? echo $sinkdropdowns_sink_dropdown_top_link_anchor ?>;}
								li.sink_dropdown_top a, .sink_dropdown li a {color:<? echo $sinkdropdowns_sink_dropdown_top_link ?> <? echo $impt_class ?>;}
								li.sink_dropdown_mid a, .sink_dropdown li li a {background:<? echo $sinkdropdowns_sink_dropdown_mid ?> <? echo $impt_class ?>; color:<? echo $sinkdropdowns_sink_dropdown_mid_link ?> <? echo $impt_class ?>;}
								li.sink_dropdown_bottom a, .sink_dropdown li li li a {background:<? echo $sinkdropdowns_sink_dropdown_bottom ?> <? echo $impt_class ?>; color:<? echo $sinkdropdowns_sink_dropdown_bottom_link ?> <? echo $impt_class ?>;}
							<? } ?>
						 </style>
						
					<!-- end sinking dropdowns by yonatan reinberg/social ink (c) 2014 - http://social-ink.net; yoni@social-ink.net -->					
				<?php 
		}

		function sinking_dropdowns_enqueue() { 
			wp_enqueue_script('jquery');
		}	
		
// 	*****************
//	init backends	

	add_action('admin_menu', 'sinkdropdowns_add_menus');
	add_action('admin_head', 'sinkdropdowns_add_menu_register_head');	
	add_action('init', 'sinkdropdowns_wp_backend_js');

	function sinkdropdowns_add_menus() {  
		add_management_page( 'Dropdowns', 'Dropdowns', "manage_options","sinkdropdownsConfig", "sinkdropdowns_backend_setup");
	}	
		function sinkdropdowns_backend_setup() { 
			include('views/config.php');  
		 }  		 
		 
	function sinkdropdowns_add_menu_register_head() {
		echo "<link rel='stylesheet' type='text/css' href='" . plugins_url('sinking-dropdowns/css/spectrum.css') ."' />\n";
		echo "<link rel='stylesheet' type='text/css' href='" . plugins_url('sinking-dropdowns/css/backend.css') ."' />\n";
		echo "<link rel='stylesheet' type='text/css' href='" . plugins_url('sinking-dropdowns/css/fontello.css') ."' />\n";
	}	

	function sinkdropdowns_wp_backend_js() {
		if(is_admin()){       
			wp_enqueue_script('spectrum', plugins_url('sinking-dropdowns/js/spectrum.js'), array('jquery'));
			wp_enqueue_script('sinkdropdowns_admin', plugins_url('sinking-dropdowns/js/admin.js'), array('jquery'));
		} 
	}	
	
	
	
// 	*****************
//	plugin menu functions

	function sinking_dropwdown($menu) {
		echo get_sink_dropdown($menu);
	}

	function get_sink_dropdown($menu) {
	
		$mymenu = wp_nav_menu(array(
			'menu' => $menu,
			'menu_class' => 'sink_dropdown',
			'container' => 'div',
			'container_class' => 'sink_dropdown_container no-js',
			'echo' => false
			)
		); 		
	
		echo $mymenu;			
	}

		
?>