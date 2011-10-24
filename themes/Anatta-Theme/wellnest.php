<?php
/*
Template Name: Wellnest
*/
?>

<?php get_header(); ?>
<section class="body blog">
<div class="" style="float:left; width:600px;">

      <?php
	    $pageid = 88; // Photo Gallery wellnest Page
		$page_data = get_page( $pageid );
		$content = apply_filters('the_content', $page_data->post_content); // Get Content and retain Wordpress filters such as paragraph tags. 
		echo "<article>";
		echo "<section>".$content."</section></article><hr/>"; // Output Content
	 ?> 
      <?php
	    $page_id = 766; // Upcoming Class schedule Page
		$page_data = get_page( $page_id );
		$content = apply_filters('the_content', $page_data->post_content); // Get Content
		$link = $page_data->post_name; // Get post name
		$title = $page_data->post_title; //get post title
		echo "<article>";
		echo "<h3>".strtoupper($title)."</h3>";
		echo "<section>".$content."</section></article><hr/>"; // Output Content
	 ?>
     <article>
        <header>
            <h3>TRAINERS</h3>		
        </header>
        <?php
		$pages = get_pages('child_of=39&sort_column=post_date&sort_order=asc&parent=39'); //showing subpages of trainer listing page
		foreach($pages as $page) {
		
		?>
	
			<div class="section" id="<?php echo $page->post_name; ?>">
				<h4><a href="<?php echo get_page_link($page->ID) ?>"><?php echo $page->post_title ?></a></h4>
				 <?php echo get_the_post_thumbnail($page->ID, 'thumbnail'); ?><?php echo apply_filters('the_excerpt', $page->post_excerpt); ?>
			</div>
	
		<?php } ?>	
		</article>
		 <div class="clear"></div>
			</div>
		<div class="right-column">
		<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar('wellnest-page-sidebar') ) : else : // Sidebar for Wellnest ?>
		<?php endif; ?>
  </div>
  <div class="clear"></div>
</section>
<?php get_footer(); ?>