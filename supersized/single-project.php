<?php get_header() ?>

	<div id="container">
		<div id="content">

<?php the_post() ?>

<script type="text/javascript" charset="utf-8">
jQuery(document).ready(function() {
	jQuery('#content #projects-tracker').height( jQuery(document).height()  - 100 );
	jQuery('#content #projects').height( jQuery(document).height() - 100 );
	
	jQuery('#content #projects-tracker').bind( 'mouseenter', function(){
		jQuery('#content #projects').fadeToggle();
	});
	jQuery('#content #projects').bind( 'mouseleave', function(){
		jQuery('#content #projects').fadeToggle();
	});
	
	jQuery(window).resize(function() {
		jQuery('#content #projects-tracker').height( jQuery(document).height()  - 100 );
		jQuery('#content #projects').height( jQuery(document).height() - 100 );
	});
});
</script>

<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_directory') ?>/css/supersized.css" media="screen" />
<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_directory') ?>/theme/supersized.shutter.css" media="screen" />

<script type="text/javascript" src="<?php bloginfo('stylesheet_directory') ?>/js/jquery.easing.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('stylesheet_directory') ?>/js/supersized.3.2.4.js"></script>
<script type="text/javascript" src="<?php bloginfo('stylesheet_directory') ?>/theme/supersized.shutter.js"></script>


			<div id="projects">
					<?php kadg_get_projects_list(); ?>
			</div>

			<div id="projects-tracker">
			</div>


			<div id="post-<?php the_ID() ?>" class="<?php sandbox_post_class() ?>">
				<h2 class="entry-title"><?php the_title() ?></h2>
				<div class="entry-content">
					
					<script type="text/javascript">

						jQuery(function($){

							$.supersized({
								// Functionality
								slide_interval          :   6000,		// Length between transitions
								transition              :   1, 			// 0-None, 1-Fade, 2-Slide Top, 3-Slide Right, 4-Slide Bottom, 5-Slide Left, 6-Carousel Right, 7-Carousel Left
								transition_speed		:	1500,		// Speed of transition
								slideshow				:	1,

								// Components							
								slide_links				:	'blank', 	// Individual links for each slide (Options: false, 'number', 'name', 'blank')
								thumb_links				:	'1',
								thumb_navigation		:	'1',
								progress_bar			:	'0', 

								// Size & Position						   
								min_width		        :   0,			// Min width allowed (in pixels)
								min_height		        :   0,			// Min height allowed (in pixels)
								vertical_center         :   1,			// Vertically center background
								horizontal_center       :   1,			// Horizontally center background
								fit_always				:	0,			// Image will never exceed browser width or height (Ignores min. dimensions)
								fit_portrait         	:   1,			// Portrait images will not exceed browser height
								fit_landscape			:   0,			// Landscape images will not exceed browser width	

								<?php kadg_render_json_attachments(); ?>
							});
					    });

					</script>
					
					<!--Thumbnail Navigation-->
					<div id="prevthumb"></div>
					<div id="nextthumb"></div>
					
					<div id="thumb-tray" class="load-item">
						<div id="thumb-back"></div>
						<div id="thumb-forward"></div>
					</div>

					<!--Control Bar-->
					<div id="controls-wrapper" class="load-item">
						<div id="controls">

							<a id="play-button"><img id="pauseplay" src="<?php bloginfo('stylesheet_directory') ?>/img/pause.png"/></a>

							<!--Slide counter-->
							<div id="slidecounter">
								<span class="slidenumber"></span> / <span class="totalslides"></span>
							</div>

							<!--Slide captions displayed here-->
							<div id="slidecaption"></div>

							<!--Thumb Tray button-->
							<a id="tray-button"><img id="tray-arrow" src="<?php bloginfo('stylesheet_directory') ?>/img/button-tray-up.png"/></a>

							<!--Navigation-->
							<ul id="slide-list"></ul>

						</div>
					</div>
					

				</div>
				<div class="entry-meta">

				</div>
			</div><!-- .post -->

		</div><!-- #content -->
	</div><!-- #container -->



<?php //get_footer() ?>