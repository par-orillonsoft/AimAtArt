<?php
/*
Template Name: newsletter
*/
?>

<?php get_header(); ?>

	<div id="content" class="span-12">
	<?php if (have_posts()) : ?>

		<?php while (have_posts()) : the_post(); ?>
			<?php
				$postID = get_the_ID();
				if(sub_sub_navigation()){
					$subnav = true;
					echo sub_sub_navigation();
				}
			?>
			<div class="post">
				<div class="span-4 <?php if($subnav==true){ echo 'prepend-1';} ?>">
					<h2><?php the_title(); ?></h2>
					<?php the_content(); ?>
					<div class="span-4 last" id="subscribe">
						<h3>Inschrijven voor de AimAtArt Nieuwsbrief</h3>
						<?php echo do_shortcode('[contact-form 1 "newsletter"]'); ?>
					</div>
				</div>
				<div class="newsletter prepend-1 span-3">
					<?php the_block("column2"); ?>
				</div>
		<?php endwhile; ?>

	<?php else : ?>

		<h1>Sorry.<br />De pagina die U zoekt bestaat niet (meer).</h1>

	<?php endif; ?>
	
	<!--
	<?php query_posts('post_type=newsletter'); ?>
		<?php if (have_posts()) : ?>
			<div class="newsletter prepend-1 span-3">
				<h2>Download</h2>
				<?php while (have_posts()) : the_post(); ?>
						<h3><a href="<?php echo getpdf(); ?>"><?php the_title(); ?></a> (pdf)</h3>
						<?php the_excerpt(); ?>
				<?php endwhile; ?>
			</div>
		<?php endif; ?>
	<?php wp_reset_query; ?>
	-->		
			
			

				
			</div>
	</div>

<?php get_footer(); ?>