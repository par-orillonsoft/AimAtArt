<?php
/*
Template Name: home
*/
?>

<?php get_header(); ?>

	<div id="content" class="span-12">
	<?php if (have_posts()) : ?>
		<div class="post">
		<?php while (have_posts()) : the_post(); ?>
			<?php
				if(sub_sub_navigation()){
					$subnav = true;
					echo sub_sub_navigation();
				}
			?>
				<div class="span-4">
					<?php the_content(); ?>
				</div>
		<?php endwhile; ?>
		
	<?php else : ?>
		
		<h1>Sorry.<br />De pagina die U zoekt bestaat niet (meer).</h1>
		
	<?php endif; ?>

		<?php query_posts('posts_per_page=1'); ?>
			<?php if (have_posts()) : ?>
				<?php while (have_posts()) : the_post(); ?>
					<div class="excerpt span-4">
						<?php FormatPostDate($post->post_date); ?>
						<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>	
						<a href="<?php the_permalink(); ?>"><?php the_excerpt(); ?></a>
					</div>
				<?php endwhile; ?>
			<?php endif; ?>
		<?php wp_reset_query(); ?>

		
		
		</div>
	
	</div>
	
<?php get_footer(); ?>