<?php
/*
Template Name: Dr Ash

*/
?>
<?php get_header(); ?>
<section class="body blog">
<div class="" style="float:left; width:600px;">

<?php query_posts('p=36'); //Tracy Anderson Post ?>
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<header>
				<h3><?php the_title(); ?></h3>		
			</header>
			<section>
				<?php the_content(); ?>
			</section>	
		</article>
		<?php endwhile;endif; ?>	
		<?php wp_reset_query(); ?>
       <?php
	    $pageid = 709; //Dr. Ash Story Page
		$page_data = get_page( $pageid );
		$content = apply_filters('the_content', $page_data->post_content); // Get Content 
		$link = $page_data->post_name; // Get post name
		$title = $page_data->post_title; //get post title
		echo "<article>";
		echo "<h3>".strtoupper($title)."</h3>";
		echo "<section>".$content."</section></article>"; // Output Content
	 ?>
     
     <?php
	    $page_id = 741; // Media/Press Page
		$page_data = get_page( $page_id );
		$content = apply_filters('the_content', $page_data->post_content); // Get Content
		$link = $page_data->post_name; // Get post name
		$title = $page_data->post_title; //get post title
		echo "<article>";
		echo "<h3>".strtoupper($title)."</h3>";
		echo "<section>".$content."</section></article>"; // Output Content
	 ?>
     
     <?php
	    $pageids = 85; // Photo Gallery Dr Ash Page
		$page_data = get_page( $pageids );
		$content = apply_filters('the_content', $page_data->post_content); // Get Content and retain Wordpress filters such as paragraph tags. 
		$link = $page_data->post_name; // Get post name
		$title = $page_data->post_title; //get post title
		echo "<article>";
		echo "<h3>".strtoupper($title)."</h3>";
		echo "<section>".$content."</section></article>"; // Output Content
	 ?>
     <div class="clear"></div>
        </div>
	<div class="right-column">
    <?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar('ash-page-sidebar') ) : else : // Sidebar for Dr. Ash ?>
    <?php endif; ?>
  </div>
  <div class="clear"></div>
</section>
<?php get_footer(); ?>