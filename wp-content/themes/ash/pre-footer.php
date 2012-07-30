<!-- Two-column-layout1-->
<section class="two-column-layout1 clearfix">
	<section id="testimonials" class="column flL">
		<section class="title">
			<h2>They got better - and so can you </h2>
			<p>Testimonials from patient who have experienced Dr Ash's program</p>
		</section>
		<ul class="list1">
			<li class="clearfix">
				<div class="description">
					<p>Competitive cyclist with back pain – RT therapy cured that...</p>
					<a rel="prettyPhoto" href="http://www.youtube.com/watch?v=vtXyEKd_x_0&feature=youtu.be" class="button1">play video</a>
				</div>
				<img src="<?php bloginfo('template_url'); ?>/images/testimonials/image1.jpg" alt="image1" />
			</li>
			<li class="clearfix">
				<div class="description">
					<p>This young woman’s son suffered from asthma for 11 years...</p>
					<a rel="prettyPhoto" href="http://www.youtube.com/watch?v=vtXyEKd_x_0&feature=youtu.be" class="button1">play video</a>
				</div>
				<img src="<?php bloginfo('template_url'); ?>/images/testimonials/image2.jpg" alt="image2" />
			</li>
			<li class="clearfix">
				<div class="description">
					<p>This older woman had uncontrollable diarrhea for 20 years...</p>
					<a rel="prettyPhoto" href="http://www.youtube.com/watch?v=vtXyEKd_x_0&feature=youtu.be" class="button1">play video</a>
				</div>
				<img src="<?php bloginfo('template_url'); ?>/images/testimonials/image3.jpg" alt="image3" />
			</li>
		</ul>
		<a href="<?php home_url('/') ?>testimonials/" class="button1">More success stories</a>
	</section>
	<section id="blog" class="column flR">
		<section class="title">
			<h2>Latest from The Ash Center BLOG</h2>
			<p>News, treatments and products for better </p>
		</section>
		<ul class="list1">
			<?php $my_query = new WP_Query('posts_per_page=3'); ?>
			<?php if ($my_query->have_posts()): ?>
				<?php while ($my_query->have_posts()) : $my_query->the_post(); ?>
					<li class="clearfix">
						<div class="description">
							<h3><a href="<?php echo get_permalink() ?>"><?php the_title(); ?></a></h3>
							<p><?php echo custom_home_excerpt(120); ?></p>
						</div>
						<?php if (has_post_thumbnail()): ?>
							<a href="<?php echo get_permalink() ?>"><?php the_post_thumbnail(); ?></a>
						<?php else: ?>
							<!-- TODO: Replace with placeholder image if no featured image exists -->
							<img src="<?php bloginfo('template_url'); ?>/images/blog/image1.jpg" alt="image1" />
						<?php endif ?>
					</li>
				<?php endwhile; ?>
			<?php else: ?>
				<li class="clearfix">
					<div class="description">
						<h3>No posts found...</h3>
						<p>Please add some blog posts to replace this message.</p>
					</div>
					<img src="<?php bloginfo('template_url'); ?>/images/blog/image1.jpg" alt="image1" />
				</li>
			<?php endif ?>
		</ul>
		<?php if ($my_query->have_posts()): ?>
			<a href="<?php home_url('/') ?>blog/" class="button1">more blog posts</a>
		<?php endif; ?>
	</section>
</section>
<!-- /Two-column-layout1-->