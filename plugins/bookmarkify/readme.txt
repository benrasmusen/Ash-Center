=== Bookmarkify ===
Contributors: GaryKeorkunian
Donate link: http://www.bookmarkify.com/
Tags: social bookmark, bookmark, bookmarks, bookmarking, share, social network, network, networking, social media, media, marketing, widget, sidebar, links, submit, favorites, del.icio.us, Digg, Facebook, Google, MySpace, Newsvine, StumbleUpon, Twitter, Windows Live, Yahoo!, feedburner, email
Requires at least: 2.0.0
Tested up to: 2.9.2
Stable tag: trunk

The Social Media Marketing Plugin that lets you put social bookmarking links in your posts and other pages.

== Description ==

**The Social Media Marketing Plugin that lets you put social bookmarking links in your posts and other pages.  Help your readers promote your blog!**

Bookmarkify supports the following features:

* Includes over 50 social bookmark sites including an "Email This" link.
* Includes a Link for saving to the Browser Favorites. 
* Includes an HTML Copy option that makes creating links to your site easy for other publishers.
* Includes a links for subscribing to your direct or FeedBurner RSS Feed
* Includes a link for subscribing to your blog via the FeedBurner Email service (requires a FeedBurner account).
* Customize it to include only the sites you want.  Users can access the rest via the "More>>" button.
* Customize it to match your site design using standard CSS.
* The Widget - including your selected site links - is distributed with your RSS feed when using a full content feed.
* The "More Box" - a screen that gives the user access to all of the bookmark and sharing options - can drop down in place or popover over the subdued current page.
* Use it in the sidebar with a small template change.
* Valid XHTML 1.0 or Valid HTML 4.01 markup.
* WordPress NOT REQUIRED!  Works as a WordPress plugin and as a stand-alone include script for any PHP page.
* No Fee Charged.  No Account Required.  No Strings Attached.

Check out the screenshots or see it live in action at [GARA Systems](http://www.gara.com/projects/bookmarkify/).

== Installation ==

1.  Upload the contents 'bookmarkify.zip' to the '/wp-content/plugins/bookmarkify/' directory
2.  Activate the plugin through the 'Plugins' menu in WordPress
3.  Go to the Bookmarkify Options page and select your desired settings.
4.  Copy and modify the style sheet definitions to integrate Bookmarkify into the look and feel of your site.

For help with your style sheet visit the Bookmarkify [Widget Viewer](http://www.gara.com/projects/bookmarkify/widget-viewer).

= Upgrading =

If you are upgrading from a version prior to 0.9.3 please you must first uninstall Bookmarkify

1.  Deactivate the Bookmarkify Plugin
2.  Remove the bookmarkify.php file from the '/wp-content/plugins' directory
3.  Follow the steps above to install the new version.

If you are upgrading from a version prior to 0.9.7 you may see the widget revert to it's default settings.  Your settings are not lost.  You only need to go to the options page and click "Update Options >>". This will not need to be done again when upgrading in the future.


== Frequently Asked Questions ==

= I installed and activated the plugin, but I don't see the widget. =
After activating the plugin you need to go to the Bookmarkify options page to select the icons you wish to see in the widget.

= The widget appears on my site, but the links are displaying as text.  Where are the icons? =
In order for the widget to display site icons properly the plugin must be installed in the wp-content/plugins/bookmarkify directory.  If you are using Bookmarkify in normal PHP file make sure the $bookmarkifyIconDir parameter is set to the proper location of the image files.

= Why do parts of my page - such as the sidebar or post title - cover up the "More Box" when it is opened? =
This is usually because these elements have the CSS setting "overflow: hidden" applied to them.  To correct this problem you can disable this setting by either removing the line from your style sheet or by enclosing it in the comment markers (i.e.  "/* overflow: hidden; */").  This should correct the problem with the More Box and in most cases will not affect the presentation of these elements.

= Where is the icon for the _________ site? =
Bookmarkify currently includes about 50 bookmarking sites.  If you would like to add or remove one you can do so by modifying the getBookmarkifyLinks function in the bookmarkify.php file or you can [contact me](http://www.gara.com/contact/) to request that be added.

= How can I exclude the widget from certain pages or posts? =
Simply insert the following HTML comment anywhere inside of the page's or post's content:

	<!--no-bookmarkify-->
	
If you wish to exclude the widget from specific template pages, e.g. the index page, insert the following PHP code near the top of the template:

	<?php $bookmarkifyHide=true; ?>
	
= How can I place the widget in a location other than the top or bottom of the content? =
First, go to the Bookmarkify Options page and select "Other" for Widget Location.

Next, insert the following PHP code into your template at the desired location inside the Loop:

	<?php bookmarkifyIt(the_title('','',false), get_permalink(), true); ?>

If the widget is for the blog in general (outside the Loop) use the following code instead:

	<?php bookmarkifyIt('GARA Systems', 'http://www.gara.com/blog', true); ?>
	
Remember to replace the first and second parameters with your blog name and URL respectively.

If you choose to go back to using the top or bottom of the content remember to remove the code from the template to prevent multiple widgets from appearing.

== Screenshots ==

1. The Bookmarkify Options Page.  Set the title, primary bookmark sites and other options.
2. A Bookmarkify Widget Example.  Leave the widget plain (lower image) or completely customize it using a series of style sheet definitions (upper image).
3. The Bookmarkify "More" Box.  A full compliment of bookmark and sharing options appears when the user clicks the "More >>" link in the main widget.

== Widget Viewer ==

Visit the Bookmarkify [Widget Viewer](http://www.gara.com/projects/bookmarkify/widget-viewer) to try out different options and themes.

== Think Outside the Blog ==

NOTE - If you are only using Bookmarkify within your WordPress blog, you don't need to read this.

Bookmarkify also works outside of WordPress.  Use it on any PHP page on your web site.  To do so include the bookmarkify.php file and set your options with the following code:

	require_once("/blog/wp-content/plugins/bookmarkify.php");
	$bookmarkifyWidgetTitle="Bookmark and Share";
	$bookmarkifySelectedLinks="Digg;Facebook;Google;MySpace;StumbleUpon;Yahoo!;Email;";
	$bookmarkifyFeedURL="http://www.myblog.com/feed";
	$bookmarkifyFeedBurnerID="1234567";
	$bookmarkifyMoreLink=1;
	$bookmarkifyHideBrand=1;
	$bookmarkifyCenterFade=1;
	$bookmarkifyDocType="XHTML";
	$bookmarkifyIconDir="http://www.myblog.com/wp-content/plugins/bookmarkify";	
	
To simplify this, you can add this code within a PHP file that you already include throughout your site, like a header.

If your blog is in a different location, adjust the parameter of the 'require_once' function call accordingly. If you don't use WordPress, just upload the bookmarkify folder (with PHP, CSS and image files) to your website and reference the bookmarkify.php there.

If you use WordPress and PHP, the Bookmarkify options page in WordPress will generate the code above for you so that you can make sure the Bookmarkify widget is consistent across your entire site.

To insert the widget simply add the following PHP function call at the place on your page that you want the Bookmarkify widget to appear.

	bookmarkifyIt($title, $url);

Replace $title with the your page's title and $url with the URL of the page.

Here is the code using the GARA home page as an example.

	bookmarkifyIt("GARA Systems", "http://www.gara.com/");
	
== Use it in the Sidebar ==

To use the sidebar version of the widget add the following PHP function call at the place in your sidebar that you want it to appear:

	bookmarkifyItList($title, $url);

Replace $title with your blog's title and $url with your blog's URL.

Here is the code using the GARA Blog as an example:

	bookmarkifyItList("The GARA Blog", "http://www.gara.com/blog/");
	
== Create a BookmarkifyIt Button ==

The BookmarkifyIt Button is a single image link that opens the More Box when clicked.  To add the Bookmarkify Button add the following PHP function call at the place that you want it to appear:

	bookmarkifyItButton($title, $url);
	
Replace $title with your blog's title and $url with your blog's URL.

Here is the code using the GARA Systems home page as an example:

	bookmarkifyItButton("GARA Systems", "http://www.gara.com");

Please [contact me](http://www.gara.com/contact/) with your comments, questions and suggestions.

== License ==

Copyright 2008-2010 [GARA Systems, Inc](http://www.gara.com/)

Bookmarkify is released under the GNU General Public License.  You are free to download, use, modify and redistribute this code.

Additional Contributors: [ThaNerd](http://www.thanerd.net/)