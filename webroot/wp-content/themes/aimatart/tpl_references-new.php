<?php
/*
Template Name: references-new
*/
?>

<?php get_header(); ?>

	<div id="content">
		
		<?php
			$temp = $wp_query;
			$wp_query= null;
			$wp_query = new WP_Query();
			$args = array( 
				'paged' => $paged,
				'post_type' => 'reference'
				);
			$wp_query->query($args);
			
			$split = 12;//round($count_posts_half);
			$counter = 0;
		?>
		<p><h2>Referenties</h2></p>	
		<br><div class="reference-intro">Bekijk hier een overzicht van de bedrijven waarvoor AimAtArt opdrachten heeft verzorgd. <br>Onderstaand zijn enkele referenties te lezen en bijbehorende foto's te bekijken.
</div>
		<?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
		
			<?php if($counter==0 || $counter == $split){ echo '<div class="span-4">'; }?>			
				<div class="post">
					<div class="reference span-4">
						<p><strong><?php the_title();echo':'; ?></strong><p>
						<?php the_excerpt(); ?><div class="leesmeer"><a href="<?php echo get_permalink($post->ID);?>">Lees meer...</a></div>

					</div>
				</div>
			<?php $counter++; ?>
			<?php if($counter==$split){ echo '</div>'; }?>
		
		<?php endwhile; ?>
		
	
			<div class="navigation">
				<div class="alignleft"><?php next_posts_link('volgende pagina') ?></div>
				<div class="alignright"><?php previous_posts_link('vorige pagina') ?></div>
			</div>

		</div>
		<div class="span-4 last">
			<?php get_sidebar(); ?>
		</div>	
			
			<?php $wp_query = null; $wp_query = $temp;?>

		
	</div>

<?php get_footer(); ?>