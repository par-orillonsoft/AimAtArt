<?php 
/**
Template Page for the album overview

Follow variables are useable :

	$album     	 : Contain information about the album
	$galleries   : Contain all galleries inside this album
	$pagination  : Contain the pagination content

 You can check the content when you insert the tag <?php var_dump($variable) ?>
 If you would like to show the timestamp of the image ,you can use <?php echo $exif['created_timestamp'] ?>
**/
?>
<?php if (!defined ('ABSPATH')) die ('No direct access allowed'); ?><?php if (!empty ($galleries)) : ?>
<?php 
	list($pagecolour,$background) = getcolours();
	$pagecolour = '0E005F';
?>
<div class="span-9 album last">
	<!-- List of galleries -->
	<?php foreach ($galleries as $gallery) : ?>
	
	<?php
		$prevImgW = get_image_size($gallery->previewurl, 0); 
		$row = false;
		//echo $gallery->previewurl;
		//echo $prevImgW;
	?>
	
	<div class="span-3 gallery <?php if ( (++$i % 3) == 0 ) { echo 'last'; $row = true; }?>">
		<h1><a title="<?php echo $gallery->title ?>" href="<?php echo $gallery->pagelink ?>" ><?php echo $gallery->title ?></a></h1>
		<a href="<?php echo $gallery->pagelink ?>">
			<!--<img alt="<?php echo $gallery->title ?>" src="<?php echo $gallery->previewurl ?>"/>-->
			<img class="mouseover" data-oversrc="<?php echo $gallery->previewurl ?>" src="<?php bloginfo('template_url'); ?>/scripts/duothumb.php?src=<?php echo $gallery->previewurl ?>&hex=<?php echo $pagecolour; ?>&w=<?php echo $prevImgW; ?>&q=100" />
		</a>
	</div>
	<?php if ( $row == true) { $row = false; ?>
		<br style="clear: both" />
	<?php } ?>
 	<?php endforeach; ?>

 	<!-- Pagination -->
 	<?php echo $pagination ?>

</div>

<?php endif; ?>