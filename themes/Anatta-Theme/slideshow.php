<?php
/*
Template Name: Slideshow

*/
?>
<?php get_header(); ?>
<link rel="stylesheet" href="<?php bloginfo('template_url') ?>/slideshow/css/slideshow_style.css" />
<ul id="slideshow">
<?php
global $wpdb; 
$results = $wpdb->get_results("SELECT path,	filename FROM {$wpdb->prefix}ngg_gallery ng, {$wpdb->prefix}ngg_pictures np WHERE ng.gid = np.galleryid AND np.galleryid = 4 ");
foreach ($results as $result) {
	 ?>
	<li>
		<h3></h3>
		<span><?php bloginfo('url') ?>/<?php echo $result->path; ?>/<?php echo $result->filename; ?></span>
		<p></p>
		<a href="#"><img src="<?php bloginfo('url') ?>/<?php echo $result->path; ?>/thumbs/thumbs_<?php echo $result->filename; ?>" alt="" /></a>
	</li>	
	
<?php
}
?>
</ul>

<div id="wrapper">
	<div id="fullsize">
		<div id="imgprev" class="imgnav" title="Previous Image"></div>
		<div id="imglink"></div>
		<div id="imgnext" class="imgnav" title="Next Image"></div>
		<div id="image"></div>
		<div id="information">
		
		</div>
	</div>
	<div id="thumbnails">
		<div id="slideleft" title="Slide Left"></div>
		<div id="slidearea">
			<div id="slider"></div>
		</div>
		<div id="slideright" title="Slide Right"></div>
	</div>
</div>
<script type="text/javascript" src="<?php bloginfo('template_url') ?>/slideshow/js/compressed.js"></script>
<script type="text/javascript">
$('slideshow').style.display='none';
$('wrapper').style.display='block';
var slideshow=new TINY.slideshow("slideshow");
window.onload=function(){
	slideshow.auto=true;
	slideshow.speed=5;
	slideshow.link="linkhover";
	slideshow.info="information";
	slideshow.thumbs="slider";
	slideshow.left="slideleft";
	slideshow.right="slideright";
	slideshow.scrollSpeed=4;
	slideshow.spacing=5;
	slideshow.active="#fff";
	slideshow.init("slideshow","image","imgprev","imgnext","imglink");
}
</script>
<?php get_footer(); ?>