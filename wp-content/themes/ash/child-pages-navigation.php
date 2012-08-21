<?php
global $post;
if ( $post->post_parent > 0 ) {
	$parent_id = $post->post_parent;
} else {
	$parent_id = $post->ID;
}
$children = get_pages( array( 
	'child_of' 		=> $parent_id,
	'sort_column'	=> 'menu_order',
 ) );
$output = '<ul class="list7">';
$i=0;
if ( ! empty( $children ) ) {
	
	foreach ( $children as $child ) {
		
		$class = "";
		if ( $post->ID == $child->ID )
			$class .= 'active';
			
		if ( $i > 13 )
			$class .= ' hide';

		$output .= '<li class="' . $class . '"><a href="' . get_permalink( $child->ID ) . '">' . $child->post_title . "</a></li>\n";
		$i++;
		
	}
	
	$output .= "</ul>";
	
	if ( $i > 13 )
		$output .= '<a href="#" class="button4 more-option">More Option</a>';
}
echo $output;
?>