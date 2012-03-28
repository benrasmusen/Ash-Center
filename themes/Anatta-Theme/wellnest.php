<?php
/*
Template Name: Wellnest
*/
?>

<?php get_header(); ?>
<section class="body dr-ash" id="wellnest-content">
<div class="left-column">
      <?php
	    $pageid = 88; // Photo Gallery wellnest Page
		$page_data = get_page( $pageid );
		$content = apply_filters('the_content', $page_data->post_content); // Get Content and retain Wordpress filters such as paragraph tags. 
		echo "<article class='newgallery'>";
		echo "<section>".$content."</section></article>"; // Output Content
	 ?> 
      <?php
	    $page_id = 766; // Upcoming Class schedule Page
		$page_data = get_page( $page_id );
		$content = apply_filters('the_content', $page_data->post_content); // Get Content
		$link = $page_data->post_name; // Get post name
		$title = $page_data->post_title; //get post title
		echo "<article class='upcoming-class-schedule'>";
		echo "<h3 class='content-heading'>".strtoupper($title)."</h3>";
		echo "<section>".$content."</section></article>"; // Output Content
	 ?>
    <?php
	    $page_id = 105; // About Wellnest page
		$page_data = get_page( $page_id );
		$content = apply_filters('the_content', $page_data->post_content); // Get Content
		$content = preg_replace('/<img[^>]+./','',$content);//for removing images from post content		
		$link = $page_data->post_name; // Get post name
		$title = $page_data->post_title; //get post title
		echo "<article class='upcoming-class-schedule'>";
		echo "<h3 class='content-heading'>".strtoupper($title)."</h3>";
		echo "<section>".$content."</section></article>"; // Output Content
	 ?>
		 <div class="clear"></div>
			</div>
		<div class="right-column" id="wellnest-sidebar">
		<div id="sidebar">
		<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar('wellnest-page-sidebar') ) : else : // Sidebar for Wellnest ?>
		<?php endif; ?>
		</div>
  </div>
  <div class="clear"></div>
</section>
<?php get_footer(); ?>