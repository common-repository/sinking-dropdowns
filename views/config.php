<?php

if(isset($_POST['submit_form_fields'])&&($_POST['submit_form_fields']=='Y')) {
	foreach($_POST as $key => $value) {
		if($key!="[submit_form_fields]")
			update_option($key, urldecode($value));
	}
	echo '<div class="updated"><p><strong>Configuration Updated.</strong></p></div>'; 
}

$sinkdropdowns_menushow = get_option('sinkdropdowns_menushow');
$sinkdropdowns_responsive_break = get_option('sinkdropdowns_responsive_break');
$sinkdropdowns_prevent_top_clicks = get_option('sinkdropdowns_prevent_top_clicks');

//colors
$sinkdropdowns_sink_dropdown_themeoverwrite = get_option('sinkdropdowns_sink_dropdown_themeoverwrite');
$sinkdropdowns_sink_dropdown_colorsimportant = get_option('sinkdropdowns_sink_dropdown_colorsimportant');

$sinkdropdowns_sink_dropdown_top = get_option('sinkdropdowns_sink_dropdown_top');
$sinkdropdowns_sink_dropdown_top_link = get_option('sinkdropdowns_sink_dropdown_top_link');

$sinkdropdowns_sink_dropdown_mid = get_option('sinkdropdowns_sink_dropdown_mid');
$sinkdropdowns_sink_dropdown_mid_link = get_option('sinkdropdowns_sink_dropdown_mid_link');

$sinkdropdowns_sink_dropdown_bottom = get_option('sinkdropdowns_sink_dropdown_bottom');
$sinkdropdowns_sink_dropdown_bottom_link = get_option('sinkdropdowns_sink_dropdown_bottom_link');

?>
	

	<div class="wrap sinking_dropdowns">
			 
		<div class="metabox-holder">  
				
				<div id="post-body">

						<div class="welcomescreen">
							<h1 class="icon-network"><?php echo SINKDROPDOWNS_title ?></h1>
								
							<div id="post-body-content" class="has-sidebar-content">
							
								<div class="section">
									<h3>Usage:</h3>
									<ul>
										<li>Use template tag <code>&lt;?php sinking_dropwdown($menu) ?&gt;</code> in your php wherever you want your menu to appear, with $menu being the <i>slug</i>, eg <code>&lt;?php sinking_dropwdown('main') ?&gt;</code>.</li>
										<li>You can also retrieve the code into a variable by using <code>&lt;?php get_sink_dropdown($menu) ?&gt;</code>, eg <code>&lt;?php $mymenu = get_sink_dropdown('main') ?&gt;</code></li>
									</ul>
								
								</div>
								
								<form method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
									<div class="section introsection clearfix">
										<h3>Configuration</h3>
										
										<div class="field">
											<p><b>Click or hover to reveal dropdown:</b></p>
											<p>
												<input id="menushow_click" type="radio" name="sinkdropdowns_menushow" <?php if($sinkdropdowns_menushow=='click') echo 'checked="checked"' ?> value="click"><label for="menushow_click">Click</label>
												<input id="menushow_hover" type="radio" name="sinkdropdowns_menushow" <?php if($sinkdropdowns_menushow=='hover') echo 'checked="checked"' ?>  value="hover"><label for="menushow_hover">Hover</label>
											</p>
										</div>										
										
										<div class="field">
											<p><b>Prevent click-through of the top links.</b> This will only work in click mode; use when your top links are just placeholders and aren't actually destinations.  <i>Tip: add the class "nonclicking" manually to menu items on a one-by-one basis if you don't want the setting below to apply site-wide.</i></p>
											<p>
												<input id="prevent_allow" type="radio" name="sinkdropdowns_prevent_top_clicks" <?php if($sinkdropdowns_prevent_top_clicks=='allow') echo 'checked="checked"' ?> value="allow"><label for="prevent_allow">Allow</label>
												<input id="prevent_prevent" type="radio" name="sinkdropdowns_prevent_top_clicks" <?php if($sinkdropdowns_prevent_top_clicks=='prevent') echo 'checked="checked"' ?>  value="prevent"><label for="prevent_prevent">Prevent</label>
											</p>
										</div>
										
										<div class="field">
											<p>
												<label for="sinkdropdowns_responsive_break"><strong>Pixel # at which to invoke responsive break (switch to full bleed buttons and auto-click) (enter only a numeral).</strong></label>
												<input id="sinkdropdowns_responsive_break" name="sinkdropdowns_responsive_break" value="<?php echo $sinkdropdowns_responsive_break ?>" type="text" />
											</p>	
										
										</div>
										
										<div class="field">
											<p>
												
												<input type="hidden" name="sinkdropdowns_sink_dropdown_themeoverwrite" value="" />	
												<input type="checkbox" name="sinkdropdowns_sink_dropdown_themeoverwrite" id="sinkdropdowns_sink_dropdown_themeoverwrite" value="true" <?php if ($sinkdropdowns_sink_dropdown_themeoverwrite) { echo 'checked=checked'; } ?> /><label for="sinkdropdowns_sink_dropdown_themeoverwrite" class="checkbox_label"><strong>Overwrite CSS colors with custom colors:</strong></label>
											</p>
											<p>
												
												<input type="hidden" name="sinkdropdowns_sink_dropdown_colorsimportant" value="" />	
												<input type="checkbox" name="sinkdropdowns_sink_dropdown_colorsimportant" id="sinkdropdowns_sink_dropdown_colorsimportant" value="true" <?php if ($sinkdropdowns_sink_dropdown_colorsimportant) { echo 'checked=checked'; } ?> /><label for="sinkdropdowns_sink_dropdown_colorsimportant" class="checkbox_label"><strong>Mark colors "important" to overwrite native theme.</strong></label>
											</p>
											
											<div class="color_selection_section <?php if (!$sinkdropdowns_sink_dropdown_themeoverwrite)  { echo 'hidden_section'; } ?>" >
												<div class="color_top color_section">
													<p>Top Level</p>
													<p>
														<label for="sinkdropdowns_sink_dropdown_top"><strong>Top level Background</strong></label>
														<input id="sinkdropdowns_sink_dropdown_top" class="colorchooser" name="sinkdropdowns_sink_dropdown_top" value="<?php echo $sinkdropdowns_sink_dropdown_top ?>" type="text" />
														
													</p>										
													<p>
														<label for="sinkdropdowns_sink_dropdown_top_link"><strong>Top level link</strong></label>
														<input id="sinkdropdowns_sink_dropdown_top_link" name="sinkdropdowns_sink_dropdown_top_link"  value="<?php echo $sinkdropdowns_sink_dropdown_top_link ?>" type="text" />
													</p>
												</div>										
												
												<div class="color_mid color_section">
													<p class="">Mid Level</p>
													<p>
														<label for="sinkdropdowns_sink_dropdown_mid"><strong>Mid level Background</strong></label>
														<input id="sinkdropdowns_sink_dropdown_mid" name="sinkdropdowns_sink_dropdown_mid"  value="<?php echo $sinkdropdowns_sink_dropdown_mid ?>" type="text" />
													</p>										
													<p>
														<label for="sinkdropdowns_sink_dropdown_mid_link"><strong>Mid level link</strong></label>
														<input id="sinkdropdowns_sink_dropdown_mid_link" name="sinkdropdowns_sink_dropdown_mid_link"  value="<?php echo $sinkdropdowns_sink_dropdown_mid_link ?>" type="text" />
													</p>
												</div>										
												
												<div class="color_bottom color_section">
													<p class="">Bottom Level</p>
													<p>
														<label for="sinkdropdowns_sink_dropdown_bottom"><strong>Bottom level Background</strong></label>
														<input id="sinkdropdowns_sink_dropdown_bottom" name="sinkdropdowns_sink_dropdown_bottom"  value="<?php echo $sinkdropdowns_sink_dropdown_bottom ?>" type="text" />
													</p>										
													<p>
														<label for="sinkdropdowns_sink_dropdown_bottom_link"><strong>Bottom level link</strong></label>
														<input id="sinkdropdowns_sink_dropdown_bottom_link" name="sinkdropdowns_sink_dropdown_bottom_link"  value="<?php echo $sinkdropdowns_sink_dropdown_bottom_link ?>" type="text" />
													</p>
												</div>
											
												<div class="clearfix"></div>
											</div>
										</div>

											
										<div class="field">
											<p>
												<input type="hidden" name="submit_form_fields" value="Y">
												<input type="submit" class="button" name="Submit" value="Save Config" />										
												
											</p>
										</div>
									</div>
								</form>
							
								<?php include('backend_credits.php') ?>
							</div>
						
						
						</div>
			

					</div>
				
				</div>
				
				

		</div>
	