<?php
/*
Template Name: Wellnest
*/
?>
<?php get_header(); ?>

<!--css and js files used for gallery slider-->
<script type="text/javascript" src="<?php bloginfo('template_url') ?>/slideshow/js/jquery.pikachoose.js"></script>
<script language="javascript">

	$(document).ready(
		function (){			
			$("#pikame").PikaChoose({carousel:true});
		});
</script>
<!--css and js files used for gallery slider-->

<div class="clear"></div>
<section class="body dr-ash" id="wellnest-content">
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); 
	
		$gallery_id =  get_post_meta( $post->ID, 'gallery_id', true );//getting the gallery id custom field value
		global $wpdb; 
		$results = $wpdb->get_results("SELECT path,	filename FROM {$wpdb->prefix}ngg_gallery ng, {$wpdb->prefix}ngg_pictures np WHERE ng.gid = np.galleryid AND np.galleryid = $gallery_id ");					
	?>
		<section class="posts">
			<?php the_content(); //getting wellnest page content ?>			
		</section>
		<div class="upcoming-class-schedule">
		<!--gallery slider-->
		<div class="pikachoose">
			<ul id="pikame" class="jcarousel-skin-pika">
				<?php foreach ( $results as $result ) {	?>
					<li><a href=""><img src="<?php bloginfo('url') ?>/<?php echo $result->path; ?>/<?php echo $result->filename; ?>"/></a></li>
				<?php } ?>
			</ul>
		</div>
		
		<!--gallery slider ends here-->
		
	<?php endwhile; endif; ?>
	<?php
	    $page_id = 105; // About Wellnest page
		$page_data = get_page( $page_id );
		$content = apply_filters('the_content', $page_data->post_content); // Get Content
		$content = preg_replace('/<img[^>]+./','',$content);//for removing images from post content		
		echo "<article class='upcoming-class-schedule-top'>";
		echo "<section>".$content."</section></article>"; // Output Content
	 ?>
	 </div>
	 <div class="clear"></div>
<div>
	
      <?php
	    $page_id = 766; // Upcoming Class schedule Page
		$page_data = get_page( $page_id );
		$content = apply_filters('the_content', $page_data->post_content); // Get Content
		$title = $page_data->post_title; //get post title
		echo "<article id='schedule' class='upcoming-class-schedule'>";
		echo "<h3 class='content-heading'>".strtoupper($title)."</h3>";
		echo "<section>".$content."</section></article>"; // Output Content
	 ?>
	<?php
		$pages = get_pages('child_of=71&sort_column=post_date&sort_order=desc&showposts=1'); //getting subpages of Events page
		foreach($pages as $page) {
			$event_date = get_post_meta($page->ID,'event_date', true);
			$content = apply_filters('the_content', $page->post_content); // Get Content
			echo "<article id='event' class='upcoming-class-schedule'>";
			echo "<h3 class='content-heading'>".strtoupper( $page->post_title)."</h3>";
			echo "<section>".$content."</section></article>"; // Output Content
 		} ?>
	
			<section id="video" class="body block-4">
				<h3 class="content-heading">Videos</h3>
			<ul class="gallery-videos">
				<li>
					<a href="http://www.youtube.com/watch?v=vtXyEKd_x_0&feature=youtu.be" rel="prettyPhoto" class="play-video"><img src="<?php bloginfo('template_url') ?>/images/play-video.png" alt="" /></a>
					<a href="http://www.youtube.com/watch?v=vtXyEKd_x_0&feature=youtu.be" rel="prettyPhoto" ><img src="<?php bloginfo('template_url') ?>/images/video-1.jpg" alt="" title="" /></a>
					<p>Competitive cyclist with back pain – RT therapy cured that, plus improved performance due to Nutritious Delicious and Pure Essentials vitamins.</p>
				</li>
				<li>
					<a href="http://www.youtube.com/watch?v=DaGmIM4INTQ&feature=youtu.be" rel="prettyPhoto" class="play-video"><img src="<?php bloginfo('template_url') ?>/images/play-video.png" alt="" /></a>
					<a href="http://www.youtube.com/watch?v=DaGmIM4INTQ&feature=youtu.be" rel="prettyPhoto"><img src="<?php bloginfo('template_url') ?>/images/video-2.jpg" alt="" title="" /></a>
					<p>This young woman’s son suffered from asthma for 11 years, and was constantly in pain and in and out of hospitals. He took Dr Ash’s Pure Essentials and made some small dietary changes, and in just 16 days was significantly better.</p>

				</li>
				<li class="last-item">
					<a href="http://www.youtube.com/watch?v=gLeknZEiNds&feature=youtu.be" rel="prettyPhoto" class="play-video"><img src="<?php bloginfo('template_url') ?>/images/play-video.png" alt="" /></a>
					<a href="http://www.youtube.com/watch?v=gLeknZEiNds&feature=youtu.be" rel="prettyPhoto" ><img src="<?php bloginfo('template_url') ?>/images/video-3.jpg" alt="" title="" /></a>
					<p>This older woman had uncontrollable diarrhea for 20 years, but showed up fine on standard medical examinations. No one could find out what the problem was. Dr Ash put her on Pure Essentials and within 2 weeks she was improved.</p>
				</li>
			</ul>
		</section>
		
		<?php
		    $page_id = 47; // Maureen Daud Trainer page
			$page_data = get_page( $page_id );
			$content = apply_filters('the_content', $page_data->post_content); // Get Content	
			echo "<article id='about' class='upcoming-class-schedule'>";
			echo "<h3 class='content-heading'>THE TRAINER</h3>";
			echo "<section>".$content."</section></article>"; // Output Content
		 ?>
		
		<?php
		    $page_id = 68; // Location page
			$page_data = get_page( $page_id );
			$content = apply_filters('the_content', $page_data->post_content); // Get Content	
			echo "<article id='locations' class='upcoming-class-schedule'>";
			echo "<h3 class='content-heading'>Location</h3>";
			echo "<section>".$content."</section></article>"; // Output Content
		 ?>
   
		 <div class="clear"></div>
			</div>
		<div class="" id="wellnest-sidebar">
			<h3 id="connect">CONNECT & SHARE</h3>
			<div id="sidebar">
				<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar('wellnest-page-sidebar') ) : else : // Sidebar for Wellnest ?>
				<?php endif; ?>
			</div>
  		</div>
  <article id="products" class="upcoming-class-schedule">		
		<h3 class="content-heading">wellNEST PRODUCTS</h3>
		<p>The PURE ESSENTIALS Health Maintenance System represents a new breakthrough in nutrition, and is a unique resource for those interested in attaining or maintaining health. <a href="http://ws1713-1151.staging.nitrosell.com/store/department/11/WELLNEST/" target="_blank">View All Products</a></p>
		</article>
		
  <div class="clear"></div>
</section>
<?php get_footer(); ?>