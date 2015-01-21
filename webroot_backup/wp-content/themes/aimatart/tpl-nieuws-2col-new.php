<?php
/*
Template Name: Nieuws-2Col-Nieuw
*/
?>

<?php get_header(); ?>

	<div id="content">
		<h1>
		<a href="http://www.aimatart.nl/laatste-nieuws/"<span style="color: #faa34a;">Nieuws</span></a>
		</h1>
		<div class="span-12">
			<div class="ether-wp">
			<br>Wilt u ge&iuml;nspireerd blijven door AimAtArt? U kunt zich <span class="hier"><a href="http://www.aimatart.nl/nieuwsbrief/">hier</a></span> aanmelden voor onze nieuwsbrief.<br><br>
			</div>
		<br>
		</div>		
		<?php
			$temp = $wp_query;
			$wp_query= null;
			$wp_query = new WP_Query();
			$args = array( 
				'paged' => $paged,
				'cat' => 3,
				'posts_per_page' => 4
				);
			$wp_query->query($args);
		?>


		<div class="reference span-4">
			<?php if (have_posts()) : while($wp_query->have_posts()) : $i++; if(($i % 2) == 0) : $wp_query->next_post(); else : the_post(); ?>


					<div class="post">					
						<?php FormatPostDate($post->post_date); ?>					
						<a href="<?php echo get_permalink($post->ID);?>"><h1><?php the_title(); ?></h1></a>
						<?php the_post_thumbnail('medium');
						the_excerpt(); ?>	<div class="leesmeer"><a href="<?php echo get_permalink($post->ID);?>">Lees meer...</a></div>				
						<br>
					</div>


				<?php endif; endwhile; else: ?>
				<div>Alternate content</div>
			<?php endif; ?>
		</div>

		<?php $i = 0; rewind_posts(); ?>

		<div class="reference span-4">				
			<?php if (have_posts()) : while(have_posts()) : $i++; if(($i % 2) !== 0) : $wp_query->next_post(); else : the_post(); ?>

					<div class="post">
						<?php FormatPostDate($post->post_date); ?>					
						<a href="<?php echo get_permalink($post->ID);?>"><h1><?php the_title(); ?></h1></a>
						<?php the_post_thumbnail('medium');
						the_excerpt(); ?>	<div class="leesmeer"><a href="<?php echo get_permalink($post->ID);?>">Lees meer...</a></div>				
						<br>
					</div>


				<?php endif; endwhile; else: ?>
				<div>Alternate content</div>
			<?php endif; ?>
			<div class="navigation">
				<div class="alignleft"><?php next_posts_link('oudere artikelen') ?></div>
				<div class="alignright"><?php previous_posts_link('nieuwere artikelen') ?></div>
			</div>				
		</div>					

		<div class="span-4 last">
		<?php dynamic_sidebar('sidebar-nieuws'); ?>
		</div>	

		<?php $wp_query = null; $wp_query = $temp;?>		
	</div>


	
<?php get_footer(); ?>