<?php
/*
Template Name: Gallery Page
*/
?>
<?php get_header() ?>

	<div id="container">
		<div id="content">

<?php the_post() ?>

			<div id="post-<?php the_ID() ?>" class="<?php sandbox_post_class() ?>">
				<h2 class="entry-title"><?php the_title() ?></h2>
				<div class="entry-content">

					<?php 

						if( function_exists( 'attachments_get_attachments' ) ){
							$attachments = attachments_get_attachments();
							$total_attachments = count( $attachments );

							do_supersized($attachments);

						} ?>
					

					<?php the_content() ?>

				</div>
			</div><!-- .post -->


		</div><!-- #content -->
	</div><!-- #container -->

<?php // get_sidebar() ?>
<?php get_footer() ?>