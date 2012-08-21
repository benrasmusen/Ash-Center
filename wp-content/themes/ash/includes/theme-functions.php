<?php
/**
 * Theme specific custom functions
 */

/**
 * Control the excerpt length and 'more' functionality
 *
 * @param int	$length
 * @param bool	$show_more 
 * @return mixed
 * @author Ben Rasmusen <mail@benrasmusen.com>
 */
function custom_home_excerpt( $length=40, $show_more=false ) {
	$excerpt = get_the_excerpt();
	$excerpt = preg_replace( " ( \[.*?\] )",'',$excerpt );
	$excerpt = strip_shortcodes( $excerpt );
	$excerpt = strip_tags( $excerpt );
	$excerpt = substr( $excerpt, 0, $length );
	$excerpt = substr( $excerpt, 0, strripos( $excerpt, " " ) );
	$excerpt = trim( preg_replace(  '/\s+/', ' ', $excerpt ) );
	$excerpt .= '...';
	if ( $show_more ) {
		$excerpt = $excerpt.' <a href="'.get_permalink().'">more</a>';
	} else {
		return $excerpt;
	}
	return $excerpt;
}

/**
 * Custom Breacrumbs
 *
 * @return mixed
 * @author Ben Rasmusen <mail@benrasmusen.com>
 */
function custom_page_breadcrumbs( $args=array() ) {
	
	global $post;
	
	// Merge default arguments
	$args = array_merge( array( 
		'before_link' => null,
		'after_link' => null,
		'current_el' => 'span',
		'skip_home' => false,
	 ), $args );
	
	$output = "";
	
	if ( ! is_front_page() ) {
		if ( ! $args['skip_home'] ) {
			$output .=  '<a href="' . get_option( 'home' ) . '">' . bloginfo( 'name' ) . "</a>";
		}
		
		if ( $post->post_parent ) {
			$home = get_page_by_title( 'home' );
			for ( $i = count( $post->ancestors )-1; $i >= 0; $i-- ) {
				if ( ( $home->ID ) != ( $post->ancestors[$i] ) ) {
					$output .=  '<a href="' . get_permalink( $post->ancestors[$i] ) . '">' . get_the_title( $post->ancestors[$i] ) . "</a>";
				}
			}
			$output .= "<{$args['current_el']}>" . get_the_title() . "</{$args['current_el']}>";
		} elseif ( is_page() ) {
			$output .=  "<{$args['current_el']}>" . get_the_title() . "</{$args['current_el']}>";
		} elseif ( is_404() ) {
			$output .=  "<{$args['current_el']}>" .  "404" . "</{$args['current_el']}>";
		}
	} else {
		"<{$args['current_el']}>" .  bloginfo( 'name' ) . "</{$args['current_el']}>";
	}
	
	return $output;
}