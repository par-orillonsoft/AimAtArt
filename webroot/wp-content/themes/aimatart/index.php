<?php get_header(); ?>

	<div id="content">
	<div class="span-6">
		<div class="ether-wp"><a href="nieuwsbrief">Abonneer je op onze Nieuwsbrief</a></div>
		<br>
	</div>
	<?php if (have_posts()) : ?>
		<div class="span-12">
			<?php query_posts('cat=3'); ?>
			<?php while (have_posts()) : the_post(); ?>
			
			<div class="post">
				<div class="excerpt span-9">
					<small><?php FormatPostDate($post->post_date); ?></small>
					<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
					<a href="<?php the_permalink(); ?>"><?php the_excerpt(); ?></a>
				</div>
			</div>
			
			<?php endwhile; ?>
			
		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('oudere artikelen') ?></div>
			<div class="alignright"><?php previous_posts_link('nieuwere artikelen') ?></div>
		</div>

		</div>


	<?php else : ?>

		<h1>Sorry.<br />De pagina die U zoekt bestaat niet (meer).</h1>

	<?php endif; ?>

	</div>

<?php get_footer(); ?>