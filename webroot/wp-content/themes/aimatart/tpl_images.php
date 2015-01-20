<?php
/*
Template Name: images
*/
?>

<?php
	/* get the addressbar values */
	$albumID = $_GET["album"];
	//$galleryID = $_GET["gallery"];
?>

<?php get_header(); ?>

	<div id="content" class="span-12">
	<?php if (have_posts()) : ?>

		<?php while (have_posts()) : the_post(); ?>
			<div class="post">
				<div class="span-12">
				<?php if(!$albumID): ?>
					<div class="span-3">
						<?php the_content(); ?>
					</div>
					<div class="span-9 last">				
				<?php else: ?>
					<div class="span-12">
				<?php endif; ?>
						<?php echo do_shortcode('[album id=3 template=aimatart]');?>
					</div>
			</div>
		
		<?php endwhile; ?>

	<?php else : ?>

		<h1>Sorry.<br />De pagina die U zoekt bestaat niet (meer).</h1>

	<?php endif; ?>

	</div>
	
<?php get_footer(); ?>