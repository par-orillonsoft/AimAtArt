<?php
/*
Template Name: two column
*/
?>

<?php get_header(); ?>

	<div id="content" class="span-12">
	<?php if (have_posts()) : ?>

		<?php while (have_posts()) : the_post(); ?>
			<?php
				if(sub_sub_navigation()){
					$subnav = true;
					echo sub_sub_navigation();
				}
			?>
			<div class="post">
				<div class="span-<?php if($subnav){ echo '3 narrow';}else{echo '4';} ?>">
					<?php the_content(); ?>
				</div>
				<div class="span-<?php if($subnav){ echo '3 narrow';}else{echo '4';} ?>">
					<?php the_block("column2"); ?>
				</div>

			</div>
		
		<?php endwhile; ?>

	<?php else : ?>

		<h1>Sorry.<br />De pagina die U zoekt bestaat niet (meer).</h1>
		
	<?php endif; ?>

	</div>
	
<?php get_footer(); ?>