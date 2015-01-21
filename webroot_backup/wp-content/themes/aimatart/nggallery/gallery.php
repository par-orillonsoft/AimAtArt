<?php 
/**
Template Page for the gallery overview

Follow variables are useable :

	$gallery     : Contain all about the gallery
	$images      : Contain all images, path, title
	$pagination  : Contain the pagination content

 You can check the content when you insert the tag <?php var_dump($variable) ?>
 If you would like to show the timestamp of the image ,you can use <?php echo $exif['created_timestamp'] ?>
**/
?>
<?php if (!defined ('ABSPATH')) die ('No direct access allowed'); ?><?php if (!empty ($gallery)) : ?>
<?php 
	list($pagecolour,$background) = getcolours();
	$pagecolour = '0E005F';
?>

<div class="gallery">
	<div class="span-12">
		<div class="span-3 narrow">
			<h1><?php echo $gallery->title; ?></h1>
			<p><?php echo $gallery->description; ?></p>
			<a href="/fotos">terug naar overzicht</a>
		</div>	
		
		<div class="span-9 last">
			<!-- Thumbnails -->
			<?php foreach ( $images as $image ) : ?>
			<?php
			$imgS = $image->size; 
			$imgS2 = explode('"', $imgS);
			//var_dump($imgS2);
			$imgW = $imgS2[1];
			$row = false;
			?>
			<div class="span-3 thumbnail <?php if ( $gallery->columns > 0 && ++$i % $gallery->columns == 0 ) { echo 'last'; $row = true; }?>">
				<a href="<?php echo $image->imageURL ?>" title="<?php echo $image->description ?>" <?php echo $image->thumbcode ?> >
					<?php if ( !$image->hidden ) { ?>
					<img src="<?php bloginfo('template_url'); ?>/scripts/duothumb.php?src=<?php echo $image->thumbnailURL ?>&w=<?php echo $imgW; ?>&q=100" title="<?php echo $image->alttext ?>" alt="<?php echo $image->alttext ?>" />
					<?php } ?>
				</a>
			</div>
			<?php if ( $image->hidden ) continue; ?>
			<?php if ( $row == true) { $row = false; ?>
				<br style="clear: both" />
			<?php } ?>
			<?php endforeach; ?>		
		</div>
	</div>
</div>

<?php endif; ?>