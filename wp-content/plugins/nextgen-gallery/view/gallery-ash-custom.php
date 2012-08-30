<?php 
/**
 * Custom template for the Ash Center theme
 **/
?>
<?php if (!defined ('ABSPATH')) die ('No direct access allowed'); ?><?php if (!empty ($gallery)) : ?>

<section class="box2">
	<a class="previous-btn disabled"> </a> <a class="next-btn"> </a>
	<div class="inner">
		<ul class="clearfix">
			<?php foreach ( $images as $image ) : ?>
			<li>
				<a href="<?php echo $image->imageURL ?>" title="<?php echo $image->description ?>" rel="prettyPhoto{<?php echo $gallery->name ?>}">
					<img title="<?php echo $image->alttext ?>" alt="<?php echo $image->alttext ?>" src="<?php echo $image->thumbnailURL ?>" <?php echo $image->size ?> />
				</a>
				<?php if (!empty($image->alttext)): ?>
					<h3><?php echo $image->alttext ?></h3>
				<?php endif ?>
			</li>
			<?php endforeach; ?>
		</ul>
	</div>
</section>

<?php endif; ?>