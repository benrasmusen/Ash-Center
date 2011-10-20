<?php
/*
Plugin Name:  Twitter Widget
Version: 1
Description: Display your twitter messages in wordpress sidebar
Author: Shweta Sharma

*/
 
define('MAGPIE_CACHE_ON', 1); //2.7 Cache Bug
define('MAGPIE_CACHE_AGE', 180);
define('MAGPIE_INPUT_ENCODING', 'UTF-8');
define('MAGPIE_OUTPUT_ENCODING', 'UTF-8');
 
$twitter_options['widget_fields']['title'] = array('label'=>'Title:', 'type'=>'text', 'default'=>'');
$twitter_options['widget_fields']['username'] = array('label'=>'Username:', 'type'=>'text', 'default'=>'');
$twitter_options['widget_fields']['num'] = array('label'=>'Number of links:', 'type'=>'text', 'default'=>'5');
$twitter_options['widget_fields']['update'] = array('label'=>'Show timestamps:', 'type'=>'checkbox', 'default'=>true);
$twitter_options['widget_fields']['hyperlinks'] = array('label'=>'Discover Hyperlinks:', 'type'=>'checkbox', 'default'=>true);
$twitter_options['widget_fields']['twitter_users'] = array('label'=>'Discover @replies:', 'type'=>'checkbox', 'default'=>true);
$twitter_options['widget_fields']['encode_utf8'] = array('label'=>'UTF8 Encode:', 'type'=>'checkbox', 'default'=>false);
 
$twitter_options['prefix'] = 'twitter';
 
function twitter_messages($username = '', $num = 5, $update = true, $hyperlinks = true, $twitter_users = true, $encode_utf8 = false) {
 
    global $twitter_options;
 
    $transName = 'list-tweets'; // Name of value in database.
    $cacheTime = 10; // Time in minutes between updates.
 
    if(false === ($twitterData = get_transient($transName) ) ){
        // Get the tweets from Twitter.
        $json = wp_remote_get("http://api.twitter.com/1/statuses/user_timeline.json?screen_name=$username&count=$num");
 
        // Get tweets into an array.
        $twitterData = json_decode($json['body'], true);
 
        // Save our new transient.
        set_transient($transName, $twitterData, 60 * $cacheTime);
 
    }
 
    echo '<ul class="twitter">';
 
    if ($username == '') {
        echo '<li>';
        echo 'RSS not configured';
        echo '</li>';
    } else {
 
        if(empty($twitterData) || isset($twitterData['error'])){
            echo '<li class="follow_on_twitter">';
            echo '<a href="http://www.twitter.com/'.$username.'" title="Follow Me On Twitter">Follow Me On Twitter</a>';
            echo '</li>';
        } else {
            $i=0;
 
            foreach($twitterData as $item){
 
                    $msg = $item['text'];
                    $permalink = 'http://twitter.com/#!/'. $username .'/status/'. $item['id_str'];
                    if($encode_utf8) $msg = utf8_encode($msg);
                    $link = $permalink;
 
                     echo '<li class="twitter-item">';
 
                      if ($hyperlinks) {    $msg = hyperlinks($msg); }
                      if ($twitter_users)  { $msg = twitter_users($msg); }
 
                      echo $msg;
 
                    if($update) {
                      $time = strtotime($item['created_at']);
 
                      if ( ( abs( time() - $time) ) < 86400 )
                        $h_time = sprintf( __('%s ago'), human_time_diff( $time ) );
                      else
                        $h_time = date(__('Y/m/d'), $time);
 
                      echo sprintf( __('%s', 'twitter-for-wordpress'),' <span class="twitter-timestamp"><abbr title="' . date(__('Y/m/d H:i:s'), $time) . '">' . $h_time . '</abbr></span>' );
                     }         
 
                    echo '</li>';
 
                    $i++;
                    if ( $i >= $num ) break;
            }
        }
    }
 
    echo '</ul>';
 
}
 
// Find links and create the hyperlinks
function hyperlinks($text) {
    $text = preg_replace('/\b([a-zA-Z]+:\/\/[\w_.\-]+\.[a-zA-Z]{2,6}[\/\w\-~.?=&%#+$*!]*)\b/i',"<a href=\"$1\" class=\"twitter-link\">$1</a>", $text);
    $text = preg_replace('/\b(?<!:\/\/)(www\.[\w_.\-]+\.[a-zA-Z]{2,6}[\/\w\-~.?=&%#+$*!]*)\b/i',"<a href=\"http://$1\" class=\"twitter-link\">$1</a>", $text);   
 
    // match name@address
    $text = preg_replace("/\b([a-zA-Z][a-zA-Z0-9\_\.\-]*[a-zA-Z]*\@[a-zA-Z][a-zA-Z0-9\_\.\-]*[a-zA-Z]{2,6})\b/i","<a href=\"mailto://$1\" class=\"twitter-link\">$1</a>", $text);
        //mach #trendingtopics. Props to Michael Voigt
    $text = preg_replace('/([\.|\,|\:|\¡|\¿|\>|\{|\(]?)#{1}(\w*)([\.|\,|\:|\!|\?|\>|\}|\)]?)\s/i', "$1<a href=\"http://twitter.com/#search?q=$2\" class=\"twitter-link\">#$2</a>$3 ", $text);
    return $text;
}
 
//Find twitter users
function twitter_users($text) {
       $text = preg_replace('/([\.|\,|\:|\¡|\¿|\>|\{|\(]?)@{1}(\w*)([\.|\,|\:|\!|\?|\>|\}|\)]?)\s/i', "$1<a href=\"http://twitter.com/$2\" class=\"twitter-user\">@$2</a>$3 ", $text);
       return $text;
}    
 
// Create the twitter widget
function widget_twitter_init() {
 
    if ( !function_exists('register_sidebar_widget') )
        return;
 
        $check_options = get_option('widget_twitter');
 
          if ($check_options['number']=='') {
                $check_options['number'] = 1;
                update_option('widget_twitter', $check_options);
          }
 
    function widget_twitter($args, $number = 1) {
 
        global $twitter_options;
 
        extract($args);
 
        // Each widget can store its own options. We keep strings here.
        include_once(ABSPATH . WPINC . '/rss.php');
        $options = get_option('widget_twitter');
 
        // fill options with default values if value is not set
        $item = $options[$number];
        foreach($twitter_options['widget_fields'] as $key => $field) {
            if (! isset($item[$key])) {
                $item[$key] = $field['default'];
            }
        }
 
        echo $before_widget . $before_title . '<h3><a href="http://twitter.com/' . $item['username'] . '" class="twitter_title_link">'. $item['title'] . '</a></h3>' . $after_title;
        twitter_messages($item['username'], $item['num'], true, $item['update'], $item['linked'], $item['hyperlinks'], $item['twitter_users'], $item['encode_utf8']);
        echo $after_widget;
 
    }
 
    //Output the user form
    function widget_twitter_control($number) {
 
        global $twitter_options;
 
        $options = get_option('widget_twitter');
        if ( isset($_POST['twitter-submit']) ) {
 
            foreach($twitter_options['widget_fields'] as $key => $field) {
                $options[$number][$key] = $field['default'];
                $field_name = sprintf('%s_%s_%s', $twitter_options['prefix'], $key, $number);
 
                if ($field['type'] == 'text') {
                    $options[$number][$key] = strip_tags(stripslashes($_POST[$field_name]));
                } elseif ($field['type'] == 'checkbox') {
                    $options[$number][$key] = isset($_POST[$field_name]);
                }
            }
 
            update_option('widget_twitter', $options);
        }
 
        foreach($twitter_options['widget_fields'] as $key => $field) {
 
            $field_name = sprintf('%s_%s_%s', $twitter_options['prefix'], $key, $number);
            $field_checked = '';
            if ($field['type'] == 'text') {
                $field_value = htmlspecialchars($options[$number][$key], ENT_QUOTES);
            } elseif ($field['type'] == 'checkbox') {
                $field_value = 1;
                if (! empty($options[$number][$key])) {
                    $field_checked = 'checked="checked"';
                }
            }
 
            printf('<p style="text-align:right;" class="twitter_field"><label for="%s">%s <input id="%s" name="%s" type="%s" value="%s" class="%s" %s /></label></p>',
                $field_name, __($field['label']), $field_name, $field_name, $field['type'], $field_value, $field['type'], $field_checked);
        }
 
        echo '<input type="hidden" id="twitter-submit" name="twitter-submit" value="1" />';
    }
 
    function widget_twitter_setup() {
        $options = $newoptions = get_option('widget_twitter');
 
        if ( $options != $newoptions ) {
            update_option('widget_twitter', $newoptions);
            widget_twitter_register();
        }
    }
 
    function widget_twitter_register() {
 
        $options = get_option('widget_twitter');
        $dims = array('width' => 300, 'height' => 300);
        $class = array('classname' => 'widget_twitter');
 
        $name = 'Twitter Widget';
        $id = "paulund_twitter";
        wp_register_sidebar_widget($id, $name, 'widget_twitter', $class, '');
        wp_register_widget_control($id, $name, 'widget_twitter_control', $dims, '');
 
        add_action('sidebar_admin_setup', 'widget_twitter_setup');
    }
 
    widget_twitter_register();
}
 
add_action('widgets_init', 'widget_twitter_init');
?>