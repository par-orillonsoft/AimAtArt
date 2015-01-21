<?php
    register_sidebar();
?>


<?php
	function page_ancestry() { 
		//generating an array with page ids 
		//with the top most page in array element $page_tree[0]
		global $post;
		$this_page = $post;
		$test = true;
		$page_lineage = array();
		$page_lineage[] = $this_page->ID; 
			while( $test ) :
				if($this_page->post_parent) :
					$page_lineage[] = $this_page->post_parent;
					$this_page = get_page($this_page->post_parent);
					else :
						$test = false;
				endif;
			endwhile;
		$page_tree = array_reverse($page_lineage);
		return $page_tree;
	}


	
	// function creating 2nd level navigation (sub)
	function sub_navigation() {
		global $post;
		$pages_tree = page_ancestry();
		if($pages_tree[0]) : 
			$this_page = $pages_tree[0]; 
			$subsubpages = get_pages('title_li=&child_of=' . $this_page .'&depth=1&sort_column=menu_order&echo=0');
			$pages_total = count($subsubpages);
			$counter = 1;
			$subnav = '<div id="sub-sub-navigation" class="span-2">';
			$subnav .= '<ul>';
			foreach ($subsubpages as $subsubpage) {
				$li = '<li class="page_item page-item-';
				$li .= $subsubpage->ID;
				if($subsubpage->ID == $parent || $subsubpage->ID == $post->ID ){ $li .= ' current_page_item'; };
				$li .= '"><a href="';
				$li .= get_page_link($subsubpage->ID);
				$li .= '" title="';
				$li .= $subsubpage->post_title;
				$li .= '">'; 
				$li .= $subsubpage->post_title;
				$li .= '</a></li>';
				$subnav .=  $li;
					if($pages_total!= $counter){
						$subnav .= '&mdash;<br />';
					}
				$counter++;
				}
			$subnav .=  '</ul>';
			$subnav .=  '</div>';
			if($pages_total){
				return $subnav;
				}else{
					return false;
					}
		endif;
	}



	// function creating 3rd level navigation (sub_sub)
	function sub_sub_navigation() {
		global $post;
		$pages_tree = page_ancestry(); 
		if($pages_tree[1]) : 
			$this_page = $pages_tree[1]; 
			$subsubpages = get_pages('title_li=&child_of=' . $this_page .'&depth=1&sort_column=menu_order&echo=0');
			$pages_total = count($subsubpages);
			$counter = 1;
			$subnav = '<div id="sub-sub-navigation" class="span-2">';
			$subnav .= '<ul>';
			foreach ($subsubpages as $subsubpage) {
				$li = '<li class="page_item page-item-';
				$li .= $subsubpage->ID;
				if($subsubpage->ID == $parent || $subsubpage->ID == $post->ID ){ $li .= ' current_page_item'; };
				$li .= '"><a href="';
				$li .= get_page_link($subsubpage->ID);
				$li .= '" title="';
				$li .= $subsubpage->post_title;
				$li .= '">'; 
				$li .= $subsubpage->post_title;
				$li .= '</a></li>';
				$subnav .=  $li;
					if($pages_total!= $counter){
						$subnav .= '&mdash;<br />';
					}
				$counter++;
				}
			$subnav .=  '</ul>';
			$subnav .=  '</div>';
			if($pages_total){
				return $subnav;
				}else{
					return false;
					}
		endif;
	}
	
	
	
	
	// function to get the page styling
	function getcolours(){
		global $post;
		$ancestors = get_post_ancestors( $post->ID );
		$grandparent = end($ancestors);
		if(is_home() || is_single()){
			$pagecolour = get_post_meta(11, 'colour', true);
			$background  = get_post_meta(11, 'background', true);
			}elseif(!$grandparent){
				$pagecolour = get_post_meta($post->ID, 'colour', true);
				$background  = get_post_meta($post->ID, 'background', true);
				}else{
					$pagecolour = get_post_meta($grandparent, 'colour', true);
					$background  = get_post_meta($grandparent, 'background', true);
					}
		//echo $pagecolour;
		if(!$pagecolour) {
			$pagecolour = 'f66';
			}
		if(!$background) {
			$background = '1';
			}
		return array ($pagecolour, $background);
	}
	
	
	
	// set page-dependend colours
	function page_styling(){
	
		list($colour,$background) = getcolours();
		$pagecolour = '#'.$colour;
		if($pagecolour && $background) :
		?>
		<style type="text/css">
		<!--
		body {
			background-color: <?php echo $pagecolour; ?>;
			background-image: url(<?php bloginfo('template_url'); ?>/images/aimatart-background-0<?php echo $background;?>.png);
			background-position: top center;
			background-repeat: no-repeat;
			}
		#outerImageContainer,
		#imageDataContainer,
		#overlay {
			background-color: <?php echo $pagecolour; ?> !important;
			}
		#logo {
			background-image: url(<?php bloginfo('template_url'); ?>/images/aimatart-logo-0<?php echo $background;?>.png);
			/*background-image: url(<?php bloginfo('template_url'); ?>/images/aimatart-logo.png);*/
			background-repeat: no-repeat;
			}
		a,
		#main-navigation li.current_page_item a,
		#sub-navigation li.current_page_item a,
		#sub-sub-navigation li.current_page_item a,
		.post h1,
		.post h1 a,
		.post h2,
		.post h3,
		.post h4,
		.home .excerpt a p,
		.excerpt a:hover p,
		.featured,
		.caption {
			color: <?php echo $pagecolour; ?>;
			}
		-->
		</style>
		<?php 
		endif; 
	}
	/*add_action('wp_head', 'page_styling');*/

	
	
	/* function to translate postdate */
	function FormatPostDate($date, $echo = true){
		$months = array('Januari',
						'Februari',
						'Maart', 
						'April',
						'Mei',
						'Juni',
						'Juli',
						'Augustus',
						'September',
						'Oktober',
						'November',
						'December'
						  );
		$newDate = explode('-', $date);
		$year = $newDate[0];
		$month = $newDate[1]-1;
		$newDate2 = explode(' ', $newDate[2]);
		$day = $newDate2[0]*1;
			if($echo){
				echo '<div class="date">';
				echo $day.' '.$months[$month].', '.$year;
				echo '</div>';
			}else {
				return ($day.' '.$months[$month].', '.$year);
			}
	}
	
	
	
	
	/* Modifying TinyMCE editor */
	function customformatTinyMCE($init) {
		// Add block format elements you want to show in dropdown
		$init['theme_advanced_blockformats'] = 'h2,h3,h4';
		return $init;
		}
	// Modify Tiny_MCE init
	add_filter('tiny_mce_before_init', 'customformatTinyMCE' );
	
	
	
	
	/* highlight underlying pages */
	// shortcode = [highlight]
	function highlightFunction() {
		global $post;
		$highlight = false;
		$subpages = get_pages("title_li=&sort_column=menu_order&child_of=".$post->ID."&echo=0&parent=".$post->ID);
		if($subpages){
			$highlight = '<div class="highlight">';
			$highlight .= '<ul>';
			foreach ($subpages as $subpage) {
				$li = '<li class="page_item page-item-';
				$li .= $subpage->ID;
				$li .= '"><a href="';
				$li .= get_page_link($subpage->ID);
				$li .= '" title="';
				$li .= $subpage->post_title;
				$li .= '">'; 
				$li .= $subpage->post_title;
				$li .= '</a></li>';
				$highlight .= $li;
				$counter++;
				}
			$highlight .= '</ul>';
			$highlight .= '</div>';
			}
		if($highlight) {
			return $highlight;
			}
		}
	add_shortcode('highlight', 'highlightFunction');



	// get the attached images
	function the_image($size, $what, $imagesW){
		global $post;
		$logoTop = 0;
		$logoLeft = 150;
		
		switch ($imagesW) {
			case 4:
				$span = '300';
				break;
			case 5:
				$span = '380';
				break;
			case 6:
				$span = '460';
				break;
		}
		
		if($what!='logo'){
			//setup the attachment array
			$att_array = array(
				'post_parent' => $post->ID,
				'post_type' => 'attachment',
				'post_mime_type' => 'image',
				'order_by' => 'menu_order'
			);
			
			//get the post attachments
			$attachments = get_children($att_array);
			if(count($attachments)!=0){ $logoTop -= 130; }
			
			//make sure there are attachments
			if (is_array($attachments)){
				//loop through them
				shuffle($attachments);
				foreach($attachments as $att){
					//find the one we want based on its characteristics
					if ( $att->menu_order == 0){
						$image_src_array = wp_get_attachment_image_src($att->ID, $size);
						
						//get url – 1 and 2 are the x and y dimensions
						$url = $image_src_array[0];
						$caption = $att->post_excerpt;
						$description = $att->post_content;
						if(!$caption){
							$caption = $description;
							}
						$width =  $image_src_array[1];
						$height = $image_src_array[2];
						$logoTop += ($height-10);
						?>
						<div class="image" style="margin-left:<?php echo rand(0,($span-$width))?>px;width:<?php echo $width;?>px">
						<?php
							//list($pagecolour,$background) = getcolours();
							$pagecolour = '0E005F'; // all images in one colour
							echo '<img src="'.get_bloginfo('template_url').'/scripts/duothumb.php?src='.$url.'&hex='.$pagecolour.'&w='.$width.'&q=100" />';
							if($caption){
							echo '<div class="caption">';
							echo $caption;
							echo '</div>';
							}
						?>
						</div>
						<?php
						}
					}
				}
		}
		set_logo($logoTop, $logoLeft, $imagesW);
		}



	// function to place the logo
	function set_logo( $top2=50, $left2=150, $span=4){
		$left1 = 0;
		$top1 = 0;
		switch ($span) {
			case 5:
				$left2 += 70;
				break;
			case 6:
				$left2 += 150;
				break;
			case 12:
				$top1 = -150;
				$top2 = -180;
				$left1 = 600;
				$left2 += 600;
				break;
		}
		$logo_top = rand($top1, $top2);
		$logo_left = rand($left1, $left2);
		echo '<div id="logo" style="left:'.$logo_left.'px;top:'.$logo_top.'px"><a href="/home/"></a></div>';
		}




	// get the attached pdf
	function getpdf(){
		global $post;
		
		//setup the attachment array
		$att_array = array(
			'post_parent' => $post->ID,
			'post_type' => 'attachment',
			'order_by' => 'menu_order'
		);
		
		//get the post attachments
		$attachments = get_children($att_array);
		
		//make sure there are attachments
		if (is_array($attachments)){
			//loop through them
			foreach($attachments as $att){
				//find the one we want based on its characteristics
				if ( $att->menu_order == 0){
					$url = get_attached_file($att->ID);
					$trimmedurl = trim($url, "/public/sites/");
					return 'http://'.$trimmedurl;
					}
				}
			}
		}
	
	
	
	// generate reference
	function reference($post_id){
		if($post_id){
			$queried_post = get_post($post_id);
			echo '<p>'.$queried_post->post_excerpt.'</p>';
			echo '&mdash; '.$queried_post->post_title;
			}
		}
	
	
	
	// media  attachment functionality
	add_filter("manage_upload_columns", 'upload_columns');
	add_action("manage_media_custom_column", 'media_custom_columns', 0, 2);
	
	function upload_columns($columns) {
		unset($columns['parent']);
		$columns['better_parent'] = "Parent";
		return $columns;
	}
	
	
	// get image size
	function get_image_size($img_url, $wh){
		$size = getimagesize($img_url); 
		if ($wh == 0){
			return $size[0];
			}
		}
	
	
	// add media functionality
	function media_custom_columns($column_name, $id) {
	
		$post = get_post($id);
	
		if($column_name != 'better_parent')
			return;
	
			if ( $post->post_parent > 0 ) {
				if ( get_post($post->post_parent) ) {
					$title =_draft_or_post_title($post->post_parent);
				}
				?>
				<strong><a href="<?php echo get_edit_post_link( $post->post_parent ); ?>"><?php echo $title ?></a></strong>, <?php echo get_the_time(__('Y/m/d')); ?>
				<br />
				<a class="hide-if-no-js" onclick="findPosts.open('media[]','<?php echo $post->ID ?>');return false;" href="#the-list"><?php _e('Re-Attach'); ?></a></td>
	
				<?php
			} else {
				?>
				<?php _e('(Unattached)'); ?><br />
				<a class="hide-if-no-js" onclick="findPosts.open('media[]','<?php echo $post->ID ?>');return false;" href="#the-list"><?php _e('Attach'); ?></a>
				<?php
			}
	}

// change read more behind excerpt of references
function new_excerpt_more($more) {
       global $post;
	return ' <a href="'. get_permalink($post->ID) . '">Lees meer...</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');
	
function custom_excerpt_length( $length ) {
	return 20;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );
	
?>

<?php


function inherit_template() {
if (is_category()) {
$catid = get_query_var('cat');
if ( file_exists(TEMPLATEPATH . '/category-' . $catid . '.php') ) {
include( TEMPLATEPATH . '/category-' . $catid . '.php');
exit;
}


$cat = &get_category($catid);
$parent = $cat->category_parent;
while ($parent) {
$cat = &get_category($parent);
if ( file_exists(TEMPLATEPATH . '/category-' . $cat->cat_ID . '.php') ) {
include (TEMPLATEPATH . '/category-' . $cat->cat_ID . '.php');
exit;
}


$parent = $cat->category_parent;
}
}
}


add_action('template_redirect', 'inherit_template', 112);
?>

<?php if ( function_exists( 'add_theme_support' ) ) {
add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 150, 150, true ); // default Post Thumbnail dimensions (cropped)

// additional image sizes
// delete the next line if you do not need additional image sizes
add_image_size( 'category-thumb', 300, 9999 ); //300 pixels wide (and unlimited height)
}
?>

<?php // add category nicenames in body and post class
function category_id_class($classes) {
	global $post;
	foreach((get_the_category($post->ID)) as $category)
		$classes[] = $category->category_nicename;
	return $classes;
}
add_filter('body_class', 'category_id_class');
?>