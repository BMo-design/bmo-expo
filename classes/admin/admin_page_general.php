<?php
/*
The Admin Interface - general page
BMo Expo - a  Wordpress and NextGEN Gallery Plugin by B. Morschheuser
Copyright 2012-2013 by Benedikt Morschheuser (http://bmo-design.de/kontakt/)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA

http://wordpress.org/about/gpl/
#################################################################
*/

class bmoExpoAdmin_general_page {
		private $theExpo_AdminObjcet = ""; 

		function __construct($theExpo_AdminObjcet) {
	     	$this->theExpo_AdminObjcet=$theExpo_AdminObjcet;
	  	}

		public function BMo_Expo_registerPageComponents (){
			//register all page Components:

			//meta boxes - more infos http://www.wproots.com/ultimate-guide-to-meta-boxes-in-wordpress/
			add_meta_box('BMo_Exp_intro_box', 'Features', array($this, 'BMo_Expo_intro_MetaBox'), BMO_EXPO_PLUGINNAME, 'normal', 'core');
			
			add_meta_box('BMo_Exp_help_box', 'Usage', array($this, 'BMo_Expo_help_MetaBox'), BMO_EXPO_PLUGINNAME, 'normal', 'default');
			
			//advanced
			add_meta_box('BMo_Exp_demo_box', 'Demonstration example', array($this, 'BMo_Expo_demo_MetaBox'), BMO_EXPO_PLUGINNAME, 'advanced', 'core');

			//side
			//--
			
		}


		public function BMo_Expo_Admin_show_page() {

			//--- build page html and output html:

			?>    
			<div class="wrap">
	          <div class="icon32" id="icon-options-general"></div>  
			  <h2>BMo Expo</h2>  
	          <div id="poststuff">
	           	<div id="post-body" class="metabox-holder columns-2">
					<div id="post-body-content">
						<?php do_meta_boxes(BMO_EXPO_PLUGINNAME,'normal', NULL); ?>
					</div>
					<div id="postbox-container-1" class="postbox-container">
	          			<?php  do_meta_boxes(BMO_EXPO_PLUGINNAME, 'side', NULL); ?>
	                </div>
	                <div id="postbox-container-2" class="postbox-container" >
						 <?php do_meta_boxes(BMO_EXPO_PLUGINNAME,'advanced',NULL); ?>
	                </div>
				</div>	
	          </div>
	
			</div>
	        <div class="clear"></div>
			<?php
		}   
		
		public function BMo_Expo_intro_MetaBox(){
			if($this->theExpo_AdminObjcet->hasNGG()){//ngg
			?>
			<iframe width="100%" height="380" src="http://www.youtube-nocookie.com/embed/ORAfzykvEIY" frameborder="0" allowfullscreen></iframe>
			<?php
			}else{//ohne ngg
			?>
			<iframe width="100%" height="380" src="http://www.youtube-nocookie.com/embed/MJBv_OXzJ_A" frameborder="0" allowfullscreen></iframe>
			<?php
			}
		 }
		
		 public function BMo_Expo_demo_MetaBox(){
			?>
			<ul>
				<li class="alignleft" style="margin-right:10px"><h4>Use the Plugin with the default WP Gallery</h4>
					<iframe width="400" height="320" src="http://www.youtube-nocookie.com/embed/MJBv_OXzJ_A" frameborder="0" allowfullscreen></iframe>
				</li>
				<li class="alignleft" style="margin-right:10px"><h4>Use the Plugin together with the NextGen Gallery</h4>
					<iframe width="400" height="320" src="http://www.youtube-nocookie.com/embed/ORAfzykvEIY" frameborder="0" allowfullscreen></iframe>
				</li>
			</ul>
			<div class="clear"></div>
			<?php
		 }

	

		 public function BMo_Expo_help_MetaBox(){
			if($this->theExpo_AdminObjcet->hasNGG()){
			?>
			  <p>It's very easy to enter a new BMo Expo Gallery into your post or page.</p>
			  <p> Just click the "BMoExpo" <img src="<?php echo BMO_EXPO_URL; ?>/js/admin/tinyMCEButton/BMoExpo.png" style="border: 2px solid #999; vertical-align:middle; padding:1px; margin:1px;" /> editor button and select one of your NextGen Galleries.</p>
			  <hr/>
			  <p>Otherwise, you can use one of the following shortcodes. Replace xxx with the id of one of your NextGen Galleries.</p>
	            <ul>
					<li><h4>Scroll Gallery</h4>
						<ul>
							<li class="alignleft"><p><img src="<?php echo BMO_EXPO_URL?>/css/admin/img/BMoIcons_scrollGallery_bottom.png" alt="bottom" width="80px" align="left" style="margin-right:5px"/>Code:<br/><code>[BMo_scrollGallery id=xxx sG_thumbPosition=bottom]</code></p><div class="clear">&nbsp;</div></li>
							<li class="alignleft"><p><img src="<?php echo BMO_EXPO_URL?>/css/admin/img/BMoIcons_scrollGallery_top.png" alt="top" width="80px" align="left" style="margin-right:5px"/>Code:<br/><code>[BMo_scrollGallery id=xxx sG_thumbPosition=top]</code></p><div class="clear">&nbsp;</div></li>
							<li class="alignleft"><p><img src="<?php echo BMO_EXPO_URL?>/css/admin/img/BMoIcons_scrollGallery_left.png" alt="left" width="80px" align="left" style="margin-right:5px"/>Code:<br/><code>[BMo_scrollGallery id=xxx sG_thumbPosition=left]</code></p><div class="clear">&nbsp;</div></li>
							<li class="alignleft"><p><img src="<?php echo BMO_EXPO_URL?>/css/admin/img/BMoIcons_scrollGallery_right.png" alt="right" width="80px" align="left" style="margin-right:5px"/>Code:<br/><code>[BMo_scrollGallery id=xxx sG_thumbPosition=right]</code></p><div class="clear">&nbsp;</div></li>
							<li class="alignleft"><p><img src="<?php echo BMO_EXPO_URL?>/css/admin/img/BMoIcons_scrollGallery_none.png" alt="none" width="80px" align="left" style="margin-right:5px"/>Code:<br/><code>[BMo_scrollGallery id=xxx sG_thumbPosition=none]</code></p><div class="clear">&nbsp;</div></li>
						</ul>
						<div class="clear">&nbsp;</div>
					</li>
					<li><h4>Scroll Lightbox Gallery</h4>
							<ul>
								<li class="alignleft"><p><img src="<?php echo BMO_EXPO_URL?>/css/admin/img/BMoIcons_scrollLightboxGallery_h.png" alt="horizontal" width="80px" align="left" style="margin-right:5px"/>Code:<br/><code>[BMo_scrollLightboxGallery id=xxx slG_vertical=0]</code></p><div class="clear">&nbsp;</div></li>
								<li class="alignleft"><p><img src="<?php echo BMO_EXPO_URL?>/css/admin/img/BMoIcons_scrollLightboxGallery_v.png" alt="vertical" width="80px" align="left" style="margin-right:5px"/>Code:<br/><code>[BMo_scrollLightboxGallery id=xxx slG_vertical=1]</code></p><div class="clear">&nbsp;</div></li>
							</ul>
							<div class="clear">&nbsp;</div>
					</li>
				</ul>
	        <?php
			}else{
			?>
				<p>The plugin will automatically replace the default wordpress gallery shortcode [gallery]. You can change the visualisation by changing the global options at the options page.</p>
				<p>The options can be overridden in the post/page tag. For example: <code>[gallery ids="1,2,3" duration=slow gallery_width=600 slG_vertical=0]</code></p>
			<?php
			}
			?>
			<p>That's it ... Have fun!</p> 
			
	        <?php
		 }

}

?>