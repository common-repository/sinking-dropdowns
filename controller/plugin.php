<?php

	function sinking_dropdowns_activate() {
	
		update_option('sinkdropdowns_version',SINKDROPDOWNS_version);
		
		//default options
		update_option('sinkdropdowns_menushow',SINKDROPDOWNS_DEFAULT_reveal);
		update_option('sinkdropdowns_responsive_break',SINKDROPDOWNS_DEFAULT_responsive_break);		
		update_option('sinkdropdowns_prevent_top_clicks',SINKDROPDOWNS_DEFAULT_prevent_top_clicks);		
		
		//default colors
		update_option('sinkdropdowns_sink_dropdown_themeoverwrite',SINKDROPDOWNS_DEFAULT_overwrite_theme);
		update_option('sinkdropdowns_sink_dropdown_top',get_bloginfo('sinkdropdowns_sink_dropdown_top'));
		update_option('sinkdropdowns_sink_dropdown_top_link',get_bloginfo('sinkdropdowns_sink_dropdown_top_link'));
		update_option('sinkdropdowns_sink_dropdown_mid',get_bloginfo('sinkdropdowns_sink_dropdown_mid'));
		update_option('sinkdropdowns_sink_dropdown_mid_link',get_bloginfo('sinkdropdowns_sink_dropdown_mid_link'));
		update_option('sinkdropdowns_sink_dropdown_bottom',get_bloginfo('sinkdropdowns_sink_dropdown_bottom'));
		update_option('sinkdropdowns_sink_dropdown_bottom_link',get_bloginfo('sinkdropdowns_sink_dropdown_bottom_link'));
	}
			
	
?>