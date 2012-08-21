<?php
/**
 * Custom PrimaryNavWalker class
 * 	Setup to accommodate custom markup for main sub-header navigation
 *
 * @author Ben Rasmusen <mail@benrasmusen.com>
 */
class PrimaryNavWalker extends Walker_Nav_Menu {
	
	/**
	 * Stores the last child menu order number to output the 'last' class
	 *
	 * @var int
	 */
	private $_last_menu_order = null;
	
	/**
	 * Overwriting start_lvl method
	 *
	 * @param string $output 
	 * @param int $depth 
	 * @param array $args 
	 * @return void
	 * @author Ben Rasmusen <mail@benrasmusen.com>
	 */
	function start_lvl( &$output, $depth = 0, $args = array() ) {
		if ( $depth == 1 ) {
			$output .= "<ul>\n";
		}
	}
	
	/**
	 * Overwriting end_lvl method
	 *
	 * @param string $output 
	 * @param int $depth 
	 * @param array $args 
	 * @return void
	 * @author Ben Rasmusen <mail@benrasmusen.com>
	 */
	function end_lvl( &$output, $depth = 0, $args = array() ) {
		if ( $depth == 1 ) {
			$output .= "</ul>\n";
		}
	}
	
	/**
	 * Overwriting start_el method
	 *
	 * @param string $output 
	 * @param object $item 
	 * @param int $depth 
	 * @param array $args 
	 * @return void
	 * @author Ben Rasmusen <mail@benrasmusen.com>
	 */
	function start_el( &$output, $item, $depth, $args ) {
		
		switch ( $depth ) {
			case 0:
				if ( $item->has_children ) {
					$class = (  $item->last_in_menu  ) ? ' last' : null;
					$output .=  "\n". '<li class="parent' . $class . '">' . "\n";
					$output .= '<a href="' . esc_attr( $item->url ) . '">' . apply_filters( 'the_title', $item->title, $item->ID ) . '</a>';
					$output .= '<section class="dropdown clearfix">' . "\n";
				} else {
					$class = ( $item->last_in_menu ) ? ' class="last"' : null;
					$output .= '<li' . $class . '>' . "\n";
					$output .= '<a href="' . esc_attr( $item->url ) . '">' . apply_filters( 'the_title', $item->title, $item->ID ) . '</a>' . "\n";
				}
				break;
				
			case 1:
				$last_class = ( $this->_last_menu_order == $item->menu_order ) ? ' last' : null;
				if ( $item->has_children ) {
					$output .= '<section class="section' . $last_class . '">' . "\n";
					$output .= '<h2>' . apply_filters( 'the_title', $item->title, $item->ID ) . '</h2>' . "\n";
					$output .= '<p>' . esc_attr( $item->description ) . '</p>';
				} else {
					$output .= '<section class="section' . $last_class . '">';
					$output .= '<h2>' . apply_filters( 'the_title', $item->title, $item->ID ) . '</h2>' . "\n";
					$output .= '<p>' . esc_attr( $item->description ) . '</p>' . "\n";
					$output .= '<ul>';
					$output .= '<li><a href="'.esc_attr( $item->url ).'">Learn more</a> </li>' . "\n";
					$output .= '</ul>' . "\n";
				}
				break;
				
			case 2:
				$output .= '<li><a href="'.esc_attr( $item->url ).'">' . apply_filters( 'the_title', $item->title, $item->ID ) . '</a>';
				break;
		}
		
	}
	
	/**
	 * Overwriting end_el method
	 *
	 * @param string $output 
	 * @param object $item 
	 * @param int $depth 
	 * @param array $args 
	 * @return void
	 * @author Ben Rasmusen <mail@benrasmusen.com>
	 */
	function end_el( &$output, $item, $depth = 0, $args = array() ) {
		switch ( $depth ) {
			case 0:
				if ( $item->has_children ) {
					$output .= "</section>\n</li>\n";
				} else {
					$output .= "</li>\n";
				}
				break;
				
			case 1:
				$output .= "</section>\n";
				break;
				
			case 2:
				$output .= "</li>\n";
				break;
		}
	}
	
	/**
	 * Overwriting display_element method
	 * 	Added some functionality to determine parents (commented below)
	 *
	 * @param object $element 
	 * @param array $children_elements 
	 * @param int $max_depth 
	 * @param int $depth 
	 * @param array $args 
	 * @param string $output 
	 * @return void
	 * @author Ben Rasmusen <mail@benrasmusen.com>
	 */
	function display_element( $element, &$children_elements, $max_depth, $depth=0, $args, &$output ) {
		
		if ( ! $element )
			return;

		$id_field = $this->db_fields['id'];
		$element->has_children = false;
		
		// START CUSTOM: Some massaging to make sure that we can differentiate between parent menu items
		if ( !empty( $children_elements[$element->$id_field] ) ) {
			$element->has_children = true;
			if ( $depth == 0 ) {
				$child_orders = array(  );
				foreach ( $children_elements[$element->$id_field] as $child ) {
					$child_orders[] = $child->menu_order;
				}
				$this->_last_menu_order = end( $child_orders );
			}
		}
		// END CUSTOM
		
		//display this element
		$cb_args = array_merge( array( &$output, $element, $depth ), $args);
		call_user_func_array( array( &$this, 'start_el' ), $cb_args) ;

		$id = $element->$id_field;

		// descend only when the depth is right and there are childrens for this element
		if ( ($max_depth == 0 || $max_depth > $depth+1 ) && isset( $children_elements[$id]) ) {

			foreach( $children_elements[ $id ] as $child ){

				if ( !isset($newlevel) ) {
					$newlevel = true;
					//start the child delimiter
					$cb_args = array_merge( array(&$output, $depth), $args);
					call_user_func_array(array(&$this, 'start_lvl'), $cb_args);
				}
				$this->display_element( $child, $children_elements, $max_depth, $depth + 1, $args, $output );
			}
			unset( $children_elements[ $id ] );
		}

		if ( isset( $newlevel ) && $newlevel ) {
			//end the child delimiter
			//display this element
			$cb_args = array_merge( array( &$output, $depth ), $args );
			call_user_func_array( array( &$this, 'end_lvl' ), $cb_args );
		}

		//end this element
		$cb_args = array_merge( array( &$output, $element, $depth ), $args );
		call_user_func_array( array( &$this, 'end_el' ), $cb_args );
	}
	
	/**
	 * Overwriting walk method
	 * 	Added some functionality to designate last in series (commented below)
	 *
	 * @param array $elements 
	 * @param string $max_depth 
	 * @return string
	 * @author Ben Rasmusen <mail@benrasmusen.com>
	 */
	function walk( $elements, $max_depth ) {

		$args = array_slice( func_get_args(), 2 );
		$output = '';

		if ( $max_depth < -1 ) //invalid parameter
			return $output;

		if ( empty( $elements ) ) //nothing to walk
			return $output;

		$id_field = $this->db_fields['id'];
		$parent_field = $this->db_fields['parent'];

		// flat display
		if ( -1 == $max_depth ) {
			$empty_array = array();
			foreach ( $elements as $e )
				$this->display_element( $e, $empty_array, 1, 0, $args, $output );
			return $output;
		}

		/*
		 * need to display in hierarchical order
		 * separate elements into two buckets: top level and children elements
		 * children_elements is two dimensional array, eg.
		 * children_elements[10][] contains all sub-elements whose parent is 10.
		 */
		$top_level_elements = array();
		$children_elements  = array();
		foreach ( $elements as $e ) {
			if ( 0 == $e->$parent_field )
				$top_level_elements[] = $e;
			else
				$children_elements[ $e->$parent_field ][] = $e;
		}

		/*
		 * when none of the elements is top level
		 * assume the first one must be root of the sub elements
		 */
		if ( empty( $top_level_elements ) ) {

			$first = array_slice( $elements, 0, 1 );
			$root = $first[0];

			$top_level_elements = array();
			$children_elements  = array();
			foreach ( $elements as $e ) {
				if ( $root->$parent_field == $e->$parent_field )
					$top_level_elements[] = $e;
				else
					$children_elements[ $e->$parent_field ][] = $e;
			}
		}
		
		// START CUSTOM: Add a new attribute to determine last in series
		$last_el = end( $top_level_elements );
		foreach ( $top_level_elements as $e ) {
			$e->last_in_menu = false;
			if ( $last_el->ID == $e->ID ) {
				$e->last_in_menu = true;
			}
			$this->display_element( $e, $children_elements, $max_depth, 0, $args, $output );
		}
		// END CUSTOM

		/*
		 * if we are displaying all levels, and remaining children_elements is not empty,
		 * then we got orphans, which should be displayed regardless
		 */
		if ( ( $max_depth == 0 ) && count( $children_elements ) > 0 ) {
			$empty_array = array();
			foreach ( $children_elements as $orphans )
				foreach( $orphans as $op )
					$this->display_element( $op, $empty_array, 1, 0, $args, $output );
		 }

		 return $output;
	}
	
}