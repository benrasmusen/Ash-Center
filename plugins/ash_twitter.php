<?php
/*
Plugin Name: AshCenter Twitter widget 
Description: Display your twitter messages in wordpress sidebar
Author: Anatta Design
Version: 0.1
Author URI: http://anattadesign.com/
*/

/**
 * Add function to widgets_init that'll load our widget.
 */
add_action( 'widgets_init', 'ac_twitter_load_widgets' );

/**
 * Register our widget.
 * 'ac_twitter_Widget' is the widget class used below.
 *
 */
function ac_twitter_load_widgets() {
	register_widget( 'ac_twitter_Widget' );
}

/**
 * ac_twitter Widget class.
 * This class handles everything that needs to be handled with the widget:
 * the settings, form, display, and update.  Nice!
 *
 */
class ac_twitter_Widget extends WP_Widget {

	/**
	 * Widget setup.
	 */
	function ac_twitter_Widget() {
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'ac_twitter', 'description' => __('Twitter widget', 'ac_twitter') );

		/* Widget control settings. */
		$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'ac_twitter-widget' );

		/* Create the widget. */
		$this->WP_Widget( 'ac_twitter-widget', __('Ash Center Twitter Widget', 'ac_twitter'), $widget_ops, $control_ops );
	}

	/**
	 * How to display the widget on the screen.
	 */
	function widget( $args, $instance ) {
		extract( $args );

		/* Our variables from the widget settings. */
		$title = apply_filters('widget_title', $instance['title'] );
		$username = $instance['username'];
		$count = $instance['tweets_count'];
		$show_specified_username = isset( $instance['show_specified_username'] ) ? $instance['show_specified_username'] : false;
		$show_timestamps = isset( $instance['show_timestamps'] ) ? $instance['show_timestamps'] : false;
		$discover_hyperlinks = isset( $instance['discover_hyperlinks'] ) ? $instance['discover_hyperlinks'] : false;
		$discover_replies = isset( $instance['discover_replies'] ) ? $instance['discover_replies'] : false;
		$utf8_encode = isset( $instance['utf8_encode'] ) ? $instance['utf8_encode'] : false;
		
		/* Before widget (defined by themes). */
		echo $before_widget;

		/* Display the widget title if one was input (before and after defined by themes). */
		if ( $title )
			echo $before_title . $title . $after_title;
		
		if ( false === ( $twitterData = get_transient( 'ac_twitter_' . $username ) ) ) {
			// Get the tweets from Twitter.
			$json = wp_remote_get( "http://api.twitter.com/1/statuses/user_timeline.json?screen_name=$username&count=$count" );

			// Get tweets into an array.
			$twitterData = json_decode( $json['body'], true );

			// Save our new transient.
			set_transient( 'ac_twitter_' . $username, $twitterData, 60*10 ); // cache for 10minutes
			
		}

		echo '<ul class="twitter">';

		if ( $username == '' ) {
			echo '<li>';
			echo 'RSS not configured';
			echo '</li>';
		} else {

			if( empty( $twitterData ) || isset( $twitterData['error'] ) ) {
				echo '<li class="follow_on_twitter">';
				echo '<a href="http://www.twitter.com/'.$username.'" title="Follow Me On Twitter">Follow Me On Twitter</a>';
				echo '</li>';
			} else {
				$i=0;

				foreach( $twitterData as $item ) {

				        $msg = $item['text'];
				        $permalink = 'http://twitter.com/#!/'. $username .'/status/'. $item['id_str'];
				        if ( $utf8_encode )	
				        	$msg = utf8_encode( $msg );
				        
				        $link = $permalink;

				        echo '<p>';

				        if ( $discover_hyperlinks )
				        	$msg = $this->hyperlinks( $msg );
				        
				        if ( $discover_replies )
				        	$msg = $this->twitter_users( $msg );
				        
				        echo $msg;

						if ( 1 ) {
							$time = strtotime( $item['created_at'] );

							if ( ( abs( time() - $time) ) < 86400 )
								$h_time = sprintf( __('%s ago'), human_time_diff( $time ) );
							else
								$h_time = date(__('Y/m/d'), $time);

							echo sprintf( __( '%s', 'twitter-for-wordpress' ), '</p><div class="twt-foot"><span class="twitter-timestamp"><abbr title="' . date( __( 'Y/m/d H:i:s'), $time ) . '">' . $h_time . '</abbr></span>' );
						}         
						?>
						<a href="http://twitter.com/intent/retweet?related=webdesignfs,thebenhunt&tweet_id=<?php echo $item['id_str']; ?>" class="twitter-retweet" title="Retweet" target="_blank">&bull; Retweet</a> 
						<a href="http://twitter.com/intent/tweet?related=webdesignfs,thebenhunt&in_reply_to=<?php echo $item['id_str']; ?>" class="twitter-reply" title="Reply" target="_blank">&bull; Reply</a> 
						<a href="http://twitter.com/intent/favorite?related=webdesignfs,thebenhunt&tweet_id=<?php echo $item['id_str']; ?>" class="twitter-favourite" title="Favourite" target="_blank">&bull; Favourite</a>
						<?php
						echo '</div>';
						
						$i++;
						if ( $i >= $count )
							break;
				}
			}
		}

		echo '</ul>';

		/* After widget (defined by themes). */
		echo $after_widget;
	}

	/**
	 * Update the widget settings.
	 */
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['username'] = strip_tags( $new_instance['username'] );
		
		$instance['tweets_count'] = absint( $new_instance['tweets_count'] );
		
		$instance['show_specified_username'] = isset( $new_instance['show_specified_username'] ) ? true : false;
		$instance['show_timestamps'] = isset( $new_instance['show_timestamps'] ) ? true : false;
		$instance['discover_hyperlinks'] = isset( $new_instance['discover_hyperlinks'] ) ? true : false;
		$instance['discover_replies'] = isset( $new_instance['discover_replies'] ) ? true : false;
		$instance['utf8_encode'] = isset( $new_instance['utf8_encode'] ) ? true : false;
		
		// remove transient to force a fresh fetch
		$transient_name = 'ac_twitter_'.$old_instance['username'];
		// Append _noshow in the name if one from postmeta will be used so that we can atleast delete transient by the difference in option "show_specified_username"
		if ( !$instance['show_specified_username'] )
			$transient_name.= '_noshow';
		delete_transient( $transient_name );
		
		return $instance;
	}

	/**
	 * Displays the widget settings controls on the widget panel.
	 * Make use of the get_field_id() and get_field_name() function
	 * when creating your form elements. This handles the confusing stuff.
	 */
	function form( $instance ) {

		/* Set up some default widget settings. */
		$defaults = array(
			'title' => __('', 'ac_twitter'),
			'username' => '',
			'tweets_count' => 2,
			'show_specified_username' => false,
			'show_timestamps' => true,
			'discover_hyperlinks' => true,
			'discover_replies' => true,
			'utf8_encode' => false			
		);
		
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<!-- Widget Title: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'ac_twitter'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" style="background-color:#FFF;width:98%;" />
		</p>
		
		<!-- Username: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'username' ); ?>"><?php _e('Username:', 'ac_twitter'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'username' ); ?>" name="<?php echo $this->get_field_name( 'username' ); ?>" value="<?php echo $instance['username']; ?>" style="background-color:#FFF;width:98%;" />
		</p>
		
		<!-- Tweets Count: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'tweets_count' ); ?>"><?php _e('Tweets Count:', 'ac_twitter'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'tweets_count' ); ?>" name="<?php echo $this->get_field_name( 'tweets_count' ); ?>" value="<?php echo $instance['tweets_count']; ?>" style="background-color:#FFF;width:98%;" />
		</p>

		<!-- Show Timestamps? Checkbox -->
		<p>
			<input class="checkbox" type="checkbox" <?php checked( $instance['show_timestamps'], true ); ?> id="<?php echo $this->get_field_id( 'show_timestamps' ); ?>" name="<?php echo $this->get_field_name( 'show_timestamps' ); ?>" /> 
			<label for="<?php echo $this->get_field_id( 'show_timestamps' ); ?>"><?php _e('Show Timestamps?', 'ac_twitter'); ?></label>
		</p>

		<!-- Discover Links? Checkbox -->
		<p>
			<input class="checkbox" type="checkbox" <?php checked( $instance['discover_hyperlinks'], true ); ?> id="<?php echo $this->get_field_id( 'discover_hyperlinks' ); ?>" name="<?php echo $this->get_field_name( 'discover_hyperlinks' ); ?>" />
			<label for="<?php echo $this->get_field_id( 'discover_hyperlinks' ); ?>"><?php _e('Discover Hyperlinks?', 'ac_twitter'); ?></label>
		</p>

		<!-- Discover Replies? Checkbox -->
		<p>
			<input class="checkbox" type="checkbox" <?php checked( $instance['discover_replies'], true ); ?> id="<?php echo $this->get_field_id( 'discover_replies' ); ?>" name="<?php echo $this->get_field_name( 'discover_replies' ); ?>" /> 
			<label for="<?php echo $this->get_field_id( 'discover_replies' ); ?>"><?php _e('Discover Replies?', 'ac_twitter'); ?></label>
		</p>

		<!-- UTF8 Encode? Checkbox -->
		<p>
			<input class="checkbox" type="checkbox" <?php checked( $instance['utf8_encode'], true ); ?> id="<?php echo $this->get_field_id( 'utf8_encode' ); ?>" name="<?php echo $this->get_field_name( 'utf8_encode' ); ?>" />
			<label for="<?php echo $this->get_field_id( 'utf8_encode' ); ?>"><?php _e('UTF8 Encode?', 'ac_twitter'); ?></label>
		</p>

	<?php
	}
	
	// Find links and create the hyperlinks
	function hyperlinks( $text ) {
		$text = preg_replace('/\b([a-zA-Z]+:\/\/[\w_.\-]+\.[a-zA-Z]{2,6}[\/\w\-~.?=&%#+$*!]*)\b/i',"<a href=\"$1\" class=\"twitter-link\">$1</a>", $text );
		$text = preg_replace('/\b(?<!:\/\/)(www\.[\w_.\-]+\.[a-zA-Z]{2,6}[\/\w\-~.?=&%#+$*!]*)\b/i',"<a href=\"http://$1\" class=\"twitter-link\">$1</a>", $text );   

		// match name@address
		$text = preg_replace("/\b([a-zA-Z][a-zA-Z0-9\_\.\-]*[a-zA-Z]*\@[a-zA-Z][a-zA-Z0-9\_\.\-]*[a-zA-Z]{2,6})\b/i","<a href=\"mailto://$1\" class=\"twitter-link\">$1</a>", $text);
		//mach #trendingtopics. Props to Michael Voigt
		$text = preg_replace('/([\.|\,|\:|\¡|\¿|\>|\{|\(]?)#{1}(\w*)([\.|\,|\:|\!|\?|\>|\}|\)]?)\s/i', "$1<a href=\"http://twitter.com/#search?q=$2\" class=\"twitter-link\">#$2</a>$3 ", $text);
		return $text;
	}
	 
	//Find twitter users
	function twitter_users( $text ) {
		$text = preg_replace('/([\.|\,|\:|\¡|\¿|\>|\{|\(]?)@{1}(\w*)([\.|\,|\:|\!|\?|\>|\}|\)]?)\s/i', "$1<a href=\"http://twitter.com/$2\" class=\"twitter-user\">@$2</a>$3 ", $text);
		return $text;
	}  
}

?>
