<?php
/*
Template Name: Nieuws-2Col-Test
*/
?>

<?php get_header(); ?>

	<div id="content">
		<h1>
		<a href="http://www.aimatart.nl/laatste-nieuws/"<span style="color: #faa34a;">Nieuws</span></a>
		</h1>
		<div class="span-12">
			<div class="ether-wp">
			<br>Wilt u ge&iuml;nspireerd blijven door AimAtArt? U kunt zich <span style="color:#29b4e0;"><a href="http://www.aimatart.nl/nieuws/nieuwsbrief/">hier</a></span> aanmelden voor onze nieuwsbrief.<br><br>
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
			
			$split = 2;//round($count_posts_half);
			$counter = 0;
		?>
			
		
		<?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
		
			<?php if($counter==0 || $counter == $split){ echo '<div class="span-4">'; }?>			
				<div class="post">
					<div class="reference span-4">
						<?php FormatPostDate($post->post_date); ?>					
						<a href="<?php echo get_permalink($post->ID);?>"><h1><?php the_title(); ?></h1></a>
						<?php the_post_thumbnail('medium');
						the_excerpt(); ?>	<div class="leesmeer"><a href="<?php echo get_permalink($post->ID);?>">Lees meer...</a></div>				
						<br>
					</div>
				</div>
			<?php $counter++; ?>
			<?php if($counter==$split){ echo '</div>'; }?>
		
		<?php endwhile; ?>
			<div class="span-4 navigation">
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