<?php
global $post;
if ($post->post_parent)	{
	$ancestors=get_post_ancestors($post->ID);
	$root=count($ancestors)-1;
	$parent_id = $ancestors[$root];
} else {
	$parent_id = $post->ID;
}
$children = get_pages(array(
	'child_of' => $parent_id,
	'sort_column' => 'menu_order',
));
$output = '<ul class="list8">';
$i=0;
if (!empty($children)) {
	$last = end($children);
	foreach ($children as $child) {
		$class = "";
		if ($post->ID == $child->ID) {
			$class .= 'active';
		}
		if ($i > 13) {
			$class .= ' hide';
		}
		$output .= '<li class="' . $class . '"><a href="' . get_permalink($child->ID) . '">' . $child->post_title . "</a></li>\n";
		$i++;
		// No child pages, display divider
		$subpages = get_pages(array('child_of' => $child->ID));
		if (empty($subpages) && $last->ID != $child->ID) {
			$output .= '<li><p><span class="divider">&nbsp;</span></p></li>';
		}
	}
	$output .= "</ul>";
	if ($i > 13) {
		$output .= '<a href="#" class="button4 more-option">More Option</a>';
	}
}
echo $output;
?>