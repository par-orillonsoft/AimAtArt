<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">

<!--//
============================================
design + code: OK200
============================================

 //////  //   //  //////  //////   //////
//   //  //  //  //   //  //   //  //   //
//   //  /////      //    // / //  // / //
//   //  //  //   //    / //   //  //   //
 /////   //   // ///////  //////   //////

============================================

OK200
Graphic Design Studio Amsterdam

Duintjer CS
Vijzelstraat 72 / Unit 210
1017 HL Amsterdam

studio@ok200.nl
www.ok200.nl

=============================================
//-->

<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<title>
	<?php 
		bloginfo('name');
		if(is_home()){ 
			echo ' / Nieuws';
			}elseif(is_single()){
				echo ' / Nieuws';
				echo ' / ';
				echo get_the_title($page_id);
				}else{
					$pages_tree = page_ancestry();
					foreach ($pages_tree as $page_id) {
						echo ' / ';
						echo get_the_title($page_id);
					}
				}
	?>
</title>

<link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/images/favicon.ico">
<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/reset.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<!--[if IE]><link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/ie.css" type="text/css" media="screen" /><![endif]-->
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/custom.css" type="text/css" media="screen" />

<div>

	<?php wp_head(); ?>
</div>


			
<script type="text/javascript">

 var _gaq = _gaq || [];
 _gaq.push(['_setAccount', 'UA-25212431-1']);
 _gaq.push(['_trackPageview']);

 (function() {
   var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
   ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
   var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
 })();

</script>


</head>

<body <?php body_class(); ?>>

<div id="container">
	<?php
	$logo = get_template_directory_uri() . '/images/AAA-logo-blue.png';
	?>
	<div id="header" class="span-3">
		<div STYLE="float:left; position:absolute; top:3px; "><a id="logo" href="<?php bloginfo( 'url' ); ?>" title="<?php bloginfo( 'description' ); ?>">
			<img src="<?php echo $logo; ?>" alt="<?php bloginfo( 'name' )?>" height=89px width=100px;/></a>
		</div>
	</div>
	<div id="header" class="span-9">
		
		<?php uberMenu_easyIntegrate(); ?>
		
		
	</div>