<?php
/*
Template Name: Full Width
*/
?>

<?php get_header(); ?>

	<div id="content" class="span-12">
	<?php if (have_posts()) : ?>

		<?php while (have_posts()) : the_post(); ?>
			<div class="post">
				<div class="span-12">
					<?php the_content(); ?>
				</div>
			</div>
		
		<?php endwhile; ?>

	<?php else : ?>

		<h1>Sorry.<br />De pagina die U zoekt bestaat niet (meer).</h1>
		
	<?php endif; ?>

	</div>
	
<?php get_footer(); ?>