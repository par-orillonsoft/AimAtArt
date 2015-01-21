<?php get_header(); ?>

	<div id="content">
	
	<?php if (have_posts()) : ?>

		<?php while (have_posts()) : the_post(); ?>

		<div class="post">
			<div class="excerpt span-8 prepend-1">
				<?php FormatPostDate($post->post_date); ?>
				<h1><?php the_title(); ?></h1>
				<?php the_content(); ?>
						
				<?php 
				$post_type = get_post_type( $post );
				$categories = get_the_category($post->ID);

				if ($post_type == 'reference' or  $categories[0] ->term_id == '3') 
					{}
				else
					  echo do_shortcode('[fbcomments title="Commentaren" linklove="0"]');		
					{?>
					<div class="terug_overzicht_nieuws"><a href="/laatste-nieuws/">terug naar overzicht</a></div>
					<div class="terug_overzicht_blog"><a href="http://www.aimatart.nl/category/blog/">terug naar overzicht</a></div>
					<?php }
				?>
			</div>
			</div>
			<div class="span-4 last">
				<?php get_sidebar(); ?>
			</div>
		</div>
		
		<?php endwhile; ?>

		

	<?php else : ?>

		<h1>Sorry.<br />De pagina die U zoekt bestaat niet (meer).</h1>

	<?php endif; ?>

	</div>

<?php get_footer(); ?>