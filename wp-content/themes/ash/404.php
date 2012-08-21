<?php get_header(); ?>

	<!-- Content-->
	<div id="content">
		<div class="wrapper clearfix">
			<div class="inner-content clearfix"> 
				
				<!-- Title-->
				<section class="title">
					<h1><?php _e( 'This is somewhat embarrassing, isn&rsquo;t it?' ); ?></h1>
					<p></p>
				</section>
				<!-- /Title--> 
				<!-- Main-->
				<div id="main">
					<article class="post clearfix">
						<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.' ); ?></p>

						<?php get_search_form(); ?>
					</article>
				</div>
				<!-- /Main--> 
				
			<?php if ( function_exists( 'dynamic_sidebar' ) ): ?>
				<!-- Sidebar-->
				<aside>
					<?php dynamic_sidebar( 'learning-more' ) ?>
				</aside>
				<!-- /Sidebar--> 
			<?php endif ?>
			
		</div>

	<?php get_footer(); ?>