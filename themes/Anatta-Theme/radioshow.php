<?php
/*
Template Name: Radio Show
*/
?>
<?php get_header(); ?>
	<section class="body blog">
<div id="blog-inner" class="left-column">	
     <article>
        <header>
            <h3>RADIO SHOW</h3>		
        </header>
        <?php include_once(ABSPATH.WPINC.'/feed.php');
		 $rss = fetch_feed('http://www.wor710.com/pages/podcast/549.rss');
		 $max = $rss->get_item_quantity(50);
		 $rss_items = $rss->get_items(0, $max);
		 ?>
		 <ul>
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
