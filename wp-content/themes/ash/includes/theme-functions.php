<?php
/**
 * Theme specific custom functions
 */


/**
 * Control the excerpt length and 'more' functionality
 *
 * @param int	$length
 * @param bool	$show_more 
 * @return void
 * @author Ben Rasmusen <mail@benrasmusen.com>
 */
function custom_home_excerpt($length=40, $show_more=false) {
	$excerpt = get_the_excerpt();
	$excerpt = preg_replace(" (\[.*?\])",'',$excerpt);
	$excerpt = strip_shortcodes($excerpt);
	$excerpt = strip_tags($excerpt);
	$excerpt = substr($excerpt, 0, $length);
	$excerpt = substr($excerpt, 0, strripos($excerpt, " "));
	$excerpt = trim(preg_replace( '/\s+/', ' ', $excerpt));
	$excerpt .= '...';
	if ($show_more) {
		$excerpt = $excerpt.' <a href="'.get_permalink().'">more</a>';
	} else {
		return $excerpt;
	}
	return $excerpt;
}