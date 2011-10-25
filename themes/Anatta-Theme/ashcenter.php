<?php
/*
Template Name: Ash Center

*/
?>
<?php get_header(); ?>
<section class="body ">
<div class="" >
<br/>
	<?php
	    $pageid = 91; // Photo Gallery Ash Center Page
		$page_data = get_page( $pageid );
		$content = apply_filters('the_content', $page_data->post_content); // Get Content and retain Wordpress filters such as paragraph tags. 
		echo "<article style='float:left;'>";
		echo "<section>".$content."</section></article>"; // Output Content
	 ?> 
	<?php
	    $pageid = 820; // Location Ash Center Page
		$page_data = get_page( $pageid );
		$content = apply_filters('the_content', $page_data->post_content); // Get Content and retain Wordpress filters such as paragraph tags. 
		echo "<article style='float:right;'>";
		echo "<section>".$content."</section></article>"; // Output Content
	 ?>
     <div class="clear"></div>
     <?php
	    $pageid = 13; //The Ash Center Page
		$page_data = get_page( $pageid );
		$content = apply_filters('the_content', $page_data->post_content); // Get Content 
		$title = $page_data->post_title; //get post title
		echo "<article>";
		echo "<h3>".strtoupper($title)."</h3>";
		echo "<section>".$content."</section></article>"; // Output Content
	 ?>
     <div class="clear"></div>
     <div class="" style="float:left; width:600px;">
     <?php
	    $pageid = 195; //Conditions We Treat Page
		$page_data = get_page( $pageid );
		$content = apply_filters('the_content', $page_data->post_content); // Get Content 
		$title = $page_data->post_title; //get post title
		echo "<article>";
		echo "<h3>".strtoupper($title)."</h3>";
		echo "<section>".$content."</section></article>"; // Output Content
	 ?>
    	 <?php	
			 $first_letter=array();   
			 $pages = get_pages('child_of=195&sort_column=post_name&sort_order=asc'); //showing subpages of Conditions we treat page
			 foreach($pages as $page) {
			   $caps = ucwords(strtolower($page->post_title)); // Test Name 
			   $first_letter[] = $caps{0}; // first letter of word
			   }
			   $first_letter = array_unique($first_letter); ?>
     <?php
    	 for ($i=65; $i<=71; $i++) //displaying subpages from A to G
			{
			 	$x = chr($i);
			 	if(in_array($x,$first_letter))
			 	{
			 	?>
			 	<ul>
        		<div class="char-heading"  ><?=$x?></div>
			<?php	   
			 $pages = get_pages('child_of=195&sort_column=post_name&sort_order=asc'); //showing subpages of Conditions we treat page
			foreach($pages as $page) {
			             
			$caps = ucwords(strtolower($page->post_title));
			 $first_let = $caps{0};
			 if($first_let==$x) { ?>
			<li><a href="<?php echo get_page_link($page->ID) ?>"><?php echo $caps; ?></a></li>
			<?php
			} }      ?>
        </ul>
        <?php  } } ?>
        <hr/>
     	<?php
    	 for ($i=72; $i<=80; $i++) //displaying subpages from H to P
			{
			 	$x = chr($i);
			 	if(in_array($x,$first_letter))
			 	{
			 	?>
			 	<ul>
        		<div class="char-heading"  ><?=$x?></div>
			<?php	   
			 $pages = get_pages('child_of=195&sort_column=post_name&sort_order=asc'); //showing subpages of Conditions we treat page
			foreach($pages as $page) {
			             
			$caps = ucwords(strtolower($page->post_title));
			 $first_let = $caps{0};
			 if($first_let==$x) { ?>
			<li><a href="<?php echo get_page_link($page->ID) ?>"><?php echo $caps; ?></a></li>
			<?php
			} }      ?>
        </ul>
        <?php  } } ?>
        <hr/>
        <?php
    	 for ($i=81; $i<=90; $i++) //displaying subpages from Q to Z
			{
			 	$x = chr($i);
			 	if(in_array($x,$first_letter))
			 	{
			 	?>
			 	<ul>
        		<div class="char-heading"  ><?=$x?></div>
			<?php	   
			 $pages = get_pages('child_of=195&sort_column=post_name&sort_order=asc'); //showing subpages of Conditions we treat page
			foreach($pages as $page) {
			             
			$caps = ucwords(strtolower($page->post_title));
			 $first_let = $caps{0};
			 if($first_let==$x) { ?>
			<li><a href="<?php echo get_page_link($page->ID) ?>"><?php echo $caps; ?></a></li>
			<?php
			} }      ?>
        </ul>
        <?php }  } ?>
        <?php
	    $pageid = 632; //Treatment Options Page
		$page_data = get_page( $pageid );
		$content = apply_filters('the_content', $page_data->post_content); // Get Content 
		$title = $page_data->post_title; //get post title
		echo "<article>";
		echo "<h3>".strtoupper($title)."</h3>";
		echo "<section>".$content."</section></article>"; // Output Content
	 ?>
       <?php
		$pages = get_pages('child_of=632&sort_column=post_date&sort_order=asc'); //showing subpages of Treatment Options Page
		foreach($pages as $page) {?>
	
			<div class="section" >
				<h5><a href="<?php echo get_page_link($page->ID) ?>"><?php echo $page->post_title ?></a></h5>
				
			</div>
	
		<?php } ?>	 
    
     <div class="clear"></div>
     </div>
     <div class="right-column">
    <?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar('ash-center-sidebar') ) : else : // Sidebar for Ash Center ?>
    <?php endif; ?>
  </div>
  
     <div class="clear"></div>
        </div>
	
  <div class="clear"></div>
</section>
<?php get_footer(); ?>