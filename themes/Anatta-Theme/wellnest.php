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
		echo "<section>".$content."</section></article>"; // Output Content
	 ?> 
     <div class="clear"></div>
        </div>
	<div class="right-column">
    <?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar('wellnest-page-sidebar') ) : else : // Sidebar for Wellnest ?>
    <?php endif; ?>
  </div>
  <div class="clear"></div>
</section>
<?php get_footer(); ?>