<?php
/*
Template Name: Radio Show
*/
?>
<?php get_header(); ?>
	<section class="body blog">
<div id="blog-inner" class="left-column">	

     	<header><h2><?php the_title(); ?></h2></header>
        <?php include_once(ABSPATH.WPINC.'/feed.php');
		 $rss = fetch_feed('http://www.wor710.com/pages/podcast/549.rss');
		 $max = $rss->get_item_quantity(50);
		 $rss_items = $rss->get_items(0, $max);
		 ?>
		 <article class="cat-post" id="post-<?php the_ID(); ?>">
		 	<section class="posts">
		 	<ul class="all-radio-show">
		 	<?php
		 	 foreach ( $rss_items as $item ) : ?>
		 	 <li>
		 	<?php $title_feeds = $item->get_title();
		 	$feeds = explode('-',$title_feeds); ?>
		 	 <a href='<?php echo $item->get_permalink(); ?>'
		 	 title='<?php echo 'Posted '.$item->get_date('j F Y | g:i a'); ?>' target="_blank">
		 	 <?php echo $feeds[0]; ?></a><br/>
		 	<?php echo $feeds[1]." - ".$feeds[2]; ?>
		 	<br/>
		 	<?php  $play =  $item->get_permalink();
		 	insert_audio_player("[audio:$play]");  ?>
		 	 </li>
		 	 <?php endforeach; ?>
		 	 </ul>
		 	
		 	</section>
		 
		 
					
		</article>
		 <div class="clear"></div>
			</div>
		<div class="right-column">
        <div id="sidebar">
    <?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar('page-sidebar') ) : else : // Sidebar for wp pages ?>
    <?php endif; ?>
  </div>
        </div>
  <div class="clear"></div>
</section>
<?php get_footer(); ?>
