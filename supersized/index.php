<?php get_header() ?>

<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_directory') ?>/css/supersized.core.css" media="screen" />

<script type="text/javascript" src="<?php bloginfo('stylesheet_directory') ?>/js/supersized.core.3.2.1.min.js"></script>

	<div id="container">
		<div id="content">
<?php 

	$args = array(
		'posts_per_page'	=>	1,
		'post_type'			=>	'project',
		'orderby'		 => 'rand'
	);

	query_posts( $args ); 
?>
<?php while ( have_posts() ) : the_post() ?>

<?php 
	$attachments = attachments_get_attachments(); 
	$total_attachments = count( $attachments );

	$random = rand( 0, $total_attachments-1 );

?>

<script type="text/javascript">
	
	jQuery(function($){
		
		$.supersized({
			slides  :  	[ {image : "<?php echo $attachments[$random]['location']; ?>", title : "Image Credit: <?php echo $attachments[$random]['title']; ?>"} ]
		});
    });
    
</script>
			
<?php endwhile; ?>

<?php 
	// Reset Query
	wp_reset_query();
?>
		</div><!-- #content -->
	</div><!-- #container -->

<?php get_footer() ?>