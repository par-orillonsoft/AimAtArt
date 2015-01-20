<?php
/*
Template Name: references
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
			
			$split = 5;//round($count_posts_half);
			$counter = 0;
		?>
			
		
		<?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
		
			<?php if($counter==0 || $counter == $split){ echo '<div class="span-4">'; }?>			
				<div class="post">
					<div class="reference span-4 last">
						<?php the_excerpt(); ?>
						<p><strong>&mdash; <?php the_title(); ?></strong><p>
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
			
			<?php $wp_query = null; $wp_query = $temp;?>

		
	</div>

<?php get_footer(); ?>