<?php get_header(); ?>

	<div id="content" class="span-12">
	<?php if (have_posts()) : ?>

		<?php while (have_posts()) : the_post(); ?>

			<div class="post span-4 prepend-1">
				<?php the_content(); ?>
			</div>

		<?php endwhile; ?>

	<?php else : ?>
	
		<h1>Sorry.<br />De pagina die U zoekt bestaat niet (meer).</h1>
	<?php endif; ?>

	</div>