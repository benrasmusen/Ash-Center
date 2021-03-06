<?php
/*
Template Name: Reference Library
*/
?>
<?php get_header(); ?>

	<!-- Content-->
	<div id="content">
		<div class="wrapper clearfix">
			<div class="inner-content clearfix"> 
				
			<?php while ( have_posts() ) : the_post(); ?>
				
				<!-- Breadcrumb -->
				<div id="breadcrumbs">
					<?php if( function_exists( 'custom_page_breadcrumbs' ) ) {
						echo custom_page_breadcrumbs( array( 'skip_home' => true ) );
					} ?>
				</div>
				<!-- Breadcrumb --> 
				<!-- Title-->
				<section class="title">
					<h1><?php echo get_the_title( $post->post_parent ); ?></h1>
					<?php if ( $byline = get_post_meta( $post->post_parent, 'byline', true ) ): ?>
						<p><?php echo $byline ?></p>
					<?php endif ?>
				</section>
				<!-- /Title--> 
				<!-- Main-->
				<div id="main" class="layout1 clearfix">
					<article class="post">
						<?php the_content() ?>
					</article>
				</div>
				<!-- /Main--> 
				
			<?php endwhile; // end of the loop. ?>
				
			<!-- Sidebar-->
			<aside class="layout1">
				<section id="sidebar-nav" class="box2">
					<?php get_template_part( 'child-pages-navigation' ) ?>
				</section>
			</aside>
			<!-- /Sidebar-->
			
		</div>

	<?php get_footer(); ?>