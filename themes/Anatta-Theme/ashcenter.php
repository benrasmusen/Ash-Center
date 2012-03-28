<?php
/*
Template Name: Ash Center

*/
?>
<?php get_header(); ?>
<section class="body dr-ash" id="ash-center">
	 <?php
	    $pageid = 97; //What makes you sick and tired
		$page_data = get_page( $pageid );
		$content = apply_filters('the_content', $page_data->post_content); // Get Content 
		$title = $page_data->post_title; //get post title
		echo "<article>";
		echo "<section>".$content."</section></article>"; // Output Content
	 ?>
	 <div class="clear"></div>
	<?php
	   $pageid =13; //Patient Information Page
		$page_data = get_page( $pageid );
		$content = apply_filters('the_content', $page_data->post_content); // Get Content 
		$title = $page_data->post_title; //get post title
		echo "<article>";
		echo "<section>".$content."</section></article>"; // Output Content
	?>
	<?php
	    $pageid = 91; // Photo Gallery Ash Center Page
		$page_data = get_page( $pageid );
		$content = apply_filters('the_content', $page_data->post_content); // Get Content and retain Wordpress filters such as paragraph tags. 
		echo "<div class='separator'></div><article class='gallery-map'><article class='left'>";
		echo "<section>".$content."</section></article>"; // Output Content
	 ?> 
	<?php
	    $pageid = 820; // Location Ash Center Page
		$page_data = get_page( $pageid );
		$content = apply_filters('the_content', $page_data->post_content); // Get Content and retain Wordpress filters such as paragraph tags. 
		echo "<article class='right'>";
		echo "<section><div class='ash-center-map'>".$content."</div></section></article></article><div class='separator'></div>"; // Output Content
	 ?>
     <div class="clear"></div>
	
	 
	 <div class="bottom-column">
     <?php
	    $pageid = 100; //specialities page
		$page_data = get_page( $pageid );
		$content = apply_filters('the_content', $page_data->post_content); // Get Content 
		$title = $page_data->post_title; //get post title
		echo "<article>";
		echo "<h3 class='content-heading'>".strtoupper($title)."</h3>";
		echo "<section>".$content."</section>"; // Output Content
	 ?>
		<form name="form1" id="form1" action="" method="get">
		<?php $select = wp_dropdown_pages('show_option_none=Select%20a%20Page&depth=0&sort_column=menu_order&echo=0&child_of=195');
		$select = preg_replace("#<select([^>]*)>#", "<select$1 onchange='return this.form.submit()'>", $select);
		echo $select;
		?>
		<noscript><input type="submit" name="submit" value="view" /></noscript>
		</form>
	    </article>
        <?php
	    $pageid = 632; //Treatment Options Page
		$page_data = get_page( $pageid );
		$content = apply_filters('the_content', $page_data->post_content); // Get Content 
		$title = $page_data->post_title; //get post title
		echo "<article>";
		echo "<h3 class='content-heading'>".strtoupper($title)."</h3>";
		echo "<section>".$content."</section>"; // Output Content
	 ?>
     <form name="form_treatment" id="form_treatment" action="" method="get">
	<?php $select = wp_dropdown_pages('show_option_none=Select%20a%20Page&depth=0&sort_column=menu_order&echo=0&child_of=632');
	$select = preg_replace("#<select([^>]*)>#", "<select$1 onchange='return this.form.submit()'>", $select);
	echo $select;
	?>
	<noscript><input type="submit" name="submit" value="view" /></noscript>
	</form>
	</article>
	 <?php
	    $pageid = 852; //Forms Page
		$page_data = get_page( $pageid );
		$content = apply_filters('the_content', $page_data->post_content); // Get Content 
		$title = $page_data->post_title; //get post title
		echo "<article>";
		echo "<h3 class='content-heading'>".strtoupper($title)."</h3>";
		echo "<section>".$content."</section>"; // Output Content
	 ?>
     <form name="pform" id="pform" action="" method="get">
	<?php $select = wp_dropdown_pages('show_option_none=Select%20a%20Page&depth=0&sort_column=menu_order&echo=0&child_of=852');
	$select = preg_replace("#<select([^>]*)>#", "<select$1 onchange='return this.form.submit()'>", $select);
	echo $select;
	?>
	<noscript><input type="submit" name="submit" value="view" /></noscript>
	</form>
	</article>
     </div>
</section>
<?php get_footer(); ?>