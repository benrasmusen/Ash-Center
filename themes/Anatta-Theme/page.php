<?php get_header(); ?>
	<section class="body blog">
      		<div id="blog-inner" class="left-column">	
            <header>
     <?php 
	 $url = explode('/',$_SERVER['REQUEST_URI']);
			$req_url = $url[1];
			$req_url2 = $url[2];
	 if($req_url == 'trainer-listing' ) {
     $pages = get_pages('child_of=39&sort_column=post_date&sort_order=asc&parent=39'); //showing subpages of trainer listing page ?>
     	<h2>Trainer</h2>
     <?php } else if ($req_url == 'event-listing' ) {
	 $pages = get_pages('child_of=71&sort_column=post_date&sort_order=asc&parent=71'); //showing subpages of event listing page
	 ?>
     	 <h2>Event</h2>
     <?php } 
	  else if ($req_url == 'testimonials' ) {
	 $pages = get_pages('child_of=26&sort_column=post_date&sort_order=asc&parent=26'); //showing subpages of testimonials page?>
	 <h2>Testimonials</h2>
	<?php  }
	 
	 
	 if((($req_url == 'trainer-listing' ) && ($req_url2 == '' )) || (($req_url == 'event-listing' ) && ($req_url2 == '' )) || (($req_url == 'testimonials' ) && ($req_url2 == '' ))) { //for showing trainer listing , Event listing, testimonial page contents
	foreach($pages as $page) {
		
		?>
        </header>
			<div class="section" id="<?php echo $page->post_name; ?>">
				<h2><a href="<?php echo get_page_link($page->ID) ?>"><?php echo $page->post_title ?></a></h2>
				 <?php echo get_the_post_thumbnail($page->ID, 'thumbnail'); ?><?php echo apply_filters('the_excerpt', $page->post_excerpt); ?>
			</div>
	
		<?php } ?>	
     
     <?php } else { //showing all other pages ?>
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<header>
				<h2><?php the_title(); ?></h2>
				
			</header>
			<section class="posts">
				<?php the_content(); ?>
			</section>
			
		</article>
		<?php endwhile; ?>
		<?php else : ?>
		<article>
			<header>
				<h2>Not Found</h2>
			</header>
		</article>
		<?php endif; ?>
        
        <?php } ?>
	        </div>
            <div class="right-column">
        <div id="sidebar">
    <?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar('page-sidebar') ) : else : // Sidebar for wp pages ?>
    <?php endif; ?>
  </div>
        </div>
        <div class="clear"></div></section>
<?php get_footer(); ?>
