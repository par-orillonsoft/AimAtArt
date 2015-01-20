<?php get_header(); ?>

	<div id="content">
	 <?php wp_reset_query();?>
	 
		 <?php
		// 0 is equal to false
		/*$numposts = 0;

		if( is_category(13) ) {
			$numposts = 5;
		}
		elseif( is_category(1) ) {
			$numposts = 3;
		}
		
				// Example setup of paged var
		$paged = ( get_query_var('paged') && get_query_var('paged') > 1 ) ? get_query_var('paged') : 1;
		
	$args =
		// If this
		( $numposts != false )
		// Then this
		? array( 'posts_per_page' => $numposts, 'paged' => $paged )
		// Else this
		: '';
	$args =
		// If this
		( $wp_query->query && !empty( $wp_query->query ) && '' != $numposts )
		// Then this
		? array_merge( $wp_query->query , $args )
		// Else this
		: $args;
		


		query_posts( $args);*/
	?>
	 
	 
	<?php if (have_posts()) : ?>
		<div class="span-8">
			<h1>
			<a href="http://www.aimatart.nl/category/blog/"<span style="color: #d477f7;">Blog</span></a>
			</h1>
			<div class="intro_blog">
			<br />AimAtArt verzorgt teambuilding voor bedrijven met behulp van kunst, maar we doen graag meer voor iedereen die van kunst wilt (kunnen)
			genieten. Op deze pagina vind je allerlei tips, trucs en nieuwtjes van onze enthousiaste <span style="color: D477F7;"><a href=" http://www.aimatart.nl/wiezijnwij/ons-team/" target="_blank"><span style="color: #D477F7;">teamleden</span></a></span>.<br /><br />
			</div>
	
	
			<?php while (have_posts()) : the_post(); ?>
			
			<div class="post">
				<div class="excerpt span-8">
					<?php date_i18n(the_date('j F, Y')); ?>
					<h1><?php the_title(); ?></h1>
					<?php the_content(); ?>
					<?php if(function_exists('kc_add_social_share')) kc_add_social_share(); ?>					
					<?php echo do_shortcode('[fbcomments title="Commentaren" linklove="0"]');			?>
				</div>
			</div>
			<?php  endwhile; wp_reset_query();?>


		
		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('oudere artikelen') ?></div>
			<div class="alignright"><?php previous_posts_link('nieuwere artikelen') ?></div>
		</div>

		</div>


	<?php else : ?>

		<h1>Sorry.<br />De pagina die U zoekt bestaat niet (meer).</h1>

	<?php endif; ?>
	<div class="span-4 last">
		<?php dynamic_sidebar('sidebar-blog'); ?>
	</div>	
	</div>

<?php get_footer(); ?>