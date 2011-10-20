<?php
/*
Plugin Name: Bookmarkify
Plugin URI: http://www.bookmarkify.com/
Version: 1.1.3
Description: The Social Media Marketing Plugin that lets you put social bookmarking links in your posts and other pages.  Help your readers promote your blog!
Author: Gary Keorkunian
Author URI: http://www.gara.com/

Additional Contributors: ThaNerd

Copyright 2008-2010 GARA Systems, Inc.

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

HISTORY

Version		Date		Author		Description
--------	--------	-----------	------------------------------------------
0.1			20080222	Gary		Initial version

0.2			20080223	Gary		Added more Bookmarking Sites:
									Alphabatized the buttons by service name
									Added Email via FeedBurner
									
0.3			20080224	Gary		Create the getBookmarkifyLinks function
									to generate an array of supported 
									bookmarking sites.  Modified createBookmarkify
									to use the new links array.
									
0.4			20080225	Gary		Created the bookmarkifyCopyHTML class and cooresponding
									style
									Created the links class and cooresponding
									style
				
0.5			20080226	Gary		Created the ability to place the widget
									at the beginning (top) or end (bottom)
									of a the post content
									
									Create the title class and cooresponding
									style, replacing the h4 previously used.
									
0.6			20080305	Gary		Added Admin Options page
									modified code to use new option settings
									when Bookmarkify is in a WordPress Blog.
									
									Added ability to select which sites
									are included in the widget's icon list.
									
									Added configuration for FeedBurner links.
									
									Made the bookmarkifyCopyHTML box read only
								
0.7			20080306	Gary		Added more Bookmark sites.

0.8			20080310	Gary		Created bookmarkifySelectedLinks variable.
									The variable holds a seperated list of
									sites to be included in the widget.
									This is for use in PHP pages outside 
									of WordPress.
									
									Created the "More" box that contains
									all supported links, plus the Copy HTML box.
									This box appears when the user clicks "More >>";
									
									Added more Bookmark sites.
									
									Added PHP code snippets to the Options page.
									
									0.8.1 Added additional comments on Options page.
									
0.8.2		20080310	Gary		Added a few more Bookmark sites.

									Corrected a cosmetic issue with the More box.
									
									Added "Save to Browser Favorites" link
									
0.8.3		20080311	Gary		Added "nofollow" tags to Bookmark links

									Fixed a bug and other style issues
									associate with the "More" box.
									
									Improved the handling of Feeds
									
									Added the HideBrand option.
									
									Removed deprecated code for bookmarkifyCopyHTML box
									
									Changed RSS to use icon from feedicon.com
									
									Modified bool settings to store 0 on false.
									
									Other optimizations.
									
0.8.4		20080312	Gary		Fixed bug issue with PHP5.  

0.8.5		20080312	Gary		Made adjustments to "More" styles

									General code tidy

0.8.6		20080312	Gary		Removed a invalid call to require_once.

0.8.7		20080313	Gary		Additional adjustments to the More Box

									Added Blogsvine

									Modified code to exclude More box from
									RSS feeds.
									
0.8.8		20080314	Gary		Additional styling for More box.

									Added "Center and Fade" option for "More" box.
									
									Created DocType variable and made 
									changes necessary for XHTML 1.0 Strict
									or HTML 4.01 Strict validation based
									on that setting.
									
0.8.9		20080318	Gary		More Box style refinements.
									
									Change from 4 to 5 columns for better fix 
									in 800x600 screens
									
									Moved "Email This to a Friend" link
									to its own line in the More Box.

									Updated Blinklist favicon location.
									
									Added CiteULike, folkd.com
									
0.9.0		20080320	Gary		Created ListView option for use
									in the Sidebar, however, it has
									not yet been implemented within
									the plugin yet.
									
0.9.1		20080327	Gary		Fixed issue that caused the More box 
									to show up in feed.

									Created option to exclude widget from
									the feed as well.
									
0.9.2		20080418	Gary		Additional styling to images in More Box

									Fixed W3C validation issue that occurred
									in Feed and FeedBurner Email links.
									
0.9.3		20080501	Gary		Moved plugin to it's own directory

									Added icons to plugin directory
									
0.9.4		20080502	Gary		Fixes to icon directory setting

0.9.5		20080510	Gary		Converted all .ico to .png 

									Added BlogBookmark to list of sites
									
0.9.51		20080511	Gary		Additional styling to More Box
0.9.52		20080513	Gary		Additional styling to More Box

0.9.6		20080519	Gary		Removed the ghost link in the Widget title
									that opened the More Box.
									
									To help support i18n, display strings
									have been extracted for easy replacement.
									
0.9.61		20080520	Gary		Fixed call to getBookmarkifyLinks and
									icon path used in the Options page.
									
0.9.62		20080521	Gary		Added loc variable to support i18n.

0.9.63		20080523	Gary		Changed sk*rt to kirtsy

									Implement _("") for i18n

									Added a space to widget icon alt tags to allow
									line wrap when icons are not available or the widget
									is appearing in the_excerpt.
									
0.9.7		20080608	Gary		Added HTML tag for excluding Bookmarkify
									adding <!--no-bookmarkify--> to a post or page
									will cause it to exclude the widget.

									Created default settings that will be used
									when the plugin is initially activated, preventing
									an "empty" widget from appearing in posts.
									
0.9.8		20080613	Gary		Added a filter to exclude Bookmarkify from 
									the_excerpt.  This eliminates the raw text
									that appears at the end of excerpts generated
									from content of less 120 characters.
									
0.9.81		20080626	Gary		Added BuddyMarks.com

0.9.9		20080630	Gary		Broke out More Window style sheet for better performance
									Reduces size of first instance by 20K and 25K for each
									subsequent instance.
									
0.9.91		20080701	Gary		Corrected issue with location of more.css on some servers.
0.9.92		20080701	Gary		Corrected issue with doc type in PHP pages outside WordPress.

0.9.93		20080702	Gary		Migrated links to http://www.bookmarkify.com/
									Created CSS Sprite (imagecol.png) for icons used in More Window,
									significantly reducing HTTP requests and download size.
									
0.9.94		20080703	Gary		Added oneview and OnlyWire
									Fixed icons / column issue
									Removed .com from dropjack and .net from Spurl
									Updated Google icon
									Removed PopCurrent
									
1.0.0		20080704	Gary		Promotion to Full Release Version 1.0

1.0.1		20080826	Gary		Added Twitter, Jamespot

1.0.2		20080910	Gary		Added Worlds Movies

1.1.0		20081009	Gary		Added $inBlog parameter to bookmarkifyIt() to support calls
									from the blog template files.
									
									Created $bookmarkifyHide setting to exclude the widget 
									from specific template pages.
									
1.1.1		20081109	Gary		Modified the manner in which more.css is linked in.
									Added LinkedIn to the list of bookmark sites.
									Added support for a "Bookmarkify It" button
									
1.1.2		20081111	Gary		Changed get_setting('home') to get_bloginfo('wpurl')
									This should correct the issue with displaying images.
									
									Added notes on the settings page for creating a 
									BookmarkifyIt button.

1.1.3		20100215	Gary		Added Permalink box
						Removed co.mments.com, Feed Me Links, Hugg.com, rojo, Worlds Movies due to lack of service
						Removed MyWeb as it has been combined with Yahoo! Bookmarks
						Updated icon for Propeller
						Renamed Sphere to Surphace
						
									
SEE THE README.TXT FOR INSTRUCTIONS

*/

/* SETTINGS - The following are default settings for PHP pages outside of WordPress */
$bookmarkifyWidgetTitle="Bookmark and Share";
$bookmarkifySelectedLinks="del.icio.us;Digg;Google;LinkedIn;StumbleUpon;Windows Live;Yahoo!;Email;";
$bookmarkifyListView=0;
$bookmarkifyButton=0;
$bookmarkifyFeedURL="";
$bookmarkifyFeedBurnerID="";
$bookmarkifyMoreLink=1;
$bookmarkifyHideBrand=0;
$bookmarkifyCenterFade=1;
$bookmarkifyExcludeFromFeed=0;
$bookmarkifyDocType="XHTML";
$bookmarkifyIconDir="http://".$_SERVER['SERVER_NAME'].dirname(__FILE__);
/* END SETTINGS */

// This variable is set to true once the more.css file has been linked in.
$bookmarkifyMoreStyleWritten=false;

// Initialize the counter of bookmark widgets
if(!isset($bookmarkifyCount))
	$bookmarkifyCount=0;

// Creates and returns the HTML for the Bookmarkify Widget
function createBookmarkify($title, $url, $inBlog=false)
{
	global $bookmarkifyCount;
	global $bookmarkifyWidgetTitle;
	global $bookmarkifySelectedLinks;
	global $bookmarkifyListView;
	global $bookmarkifyButton;
	global $bookmarkifyFeedURL;
	global $bookmarkifyFeedBurnerID;
	global $bookmarkifyMoreLink;
	global $bookmarkifyHideBrand;
	global $bookmarkifyCenterFade;
	global $bookmarkifyDocType;
	global $bookmarkifyIconDir;

	global $bookmarkifyMoreStyleWritten;

	global $doing_rss;
	
	// Strings for I18n
	// Replace the assigned string values with your target translation.
	if($inBlog)
	{
		load_plugin_textdomain('bookmarkify', 'wp-content/plugins/bookmarkify');

		$loc=__("en_US", 'bookmarkify');
		$more=__("More", 'bookmarkify');
		$bookmarkAndShare=__("Bookmark and Share This Page", 'bookmarkify');
		$closeThisWindow=__("Close", 'bookmarkify');
		$bookmarkifySaveToBrowserFavorites=__("Save to Browser Favorites / Bookmarks", 'bookmarkify');
		$emailThisToAFriend=__("Email This to a Friend", 'bookmarkify');
		$bookmarkifyCopyHTML=__("Link HTML", 'bookmarkify');
		$bookmarkifyPermalink=__("Permalink", 'bookmarkify');
		$copyThisHTML=__("Copy this HTML to create a link to this page", 'bookmarkify');
		$copyThisPermalink=__("Copy this Permalink", 'bookmarkify');
		$IfYouLIke=__("If you like this then please subscribe to the", 'bookmarkify');
		$RSSFeed=__("RSS Feed", 'bookmarkify');
		$or=__("or", 'bookmarkify');
		$emailFeed=__("Email Feed", 'bookmarkify');
		$poweredBy=__("Powered by", 'bookmarkify');
	}
	else
	{
		$loc=_("en_US");
		$more=_("More");
		$bookmarkAndShare=_("Bookmark and Share This Page");
		$closeThisWindow=_("Close");
		$bookmarkifySaveToBrowserFavorites=_("Save to Browser Favorites");
		$emailThisToAFriend=_("Email This to a Friend");
		$bookmarkifyCopyHTML=_("Link HTML");
		$bookmarkifyPermalink=_("Permalink");
		$copyThisHTML=_("Copy this HTML to create a link to this page");
		$copyThisPermalink=_("Copy this Permalink");
		$IfYouLIke=_("If you like this then please subscribe to the");
		$RSSFeed=_("RSS Feed");
		$or=_("or");
		$emailFeed=_("Email Feed");
		$poweredBy=_("Powered by");
	}
	// End I18n

	// Create Links array with Title and URL of current Post
	$bookmarkifyLinks=getBookmarkifyLinks($title, $url, $loc);

	// Keep a count of the number of widgets created on a page	
	$bookmarkifyCount++;

	// Set the default site link target to open in a new window
	$bookmarkifyLinkTarget="_blank";

	// Get the List View setting
	$listView = $bookmarkifyListView;

	// If we are in the Blog get these settings from the WordPress options table	
	if($inBlog)
	{
		$inFeed=(is_feed() || $doing_rss);
		$useDefaults=!(get_option('bookmarkify_IsSetup')==="1");
		
		if(!$useDefaults)
		{		
			$widgetTitle = get_option('bookmarkify_WidgetTitle');
			$feedBurnerID = get_option('bookmarkify_FeedBurnerID');
			$feedBurnerAddress = get_option('bookmarkify_FeedBurnerAddress');
			$moreLink = get_option('bookmarkify_MoreLink');
			$hideBrand = get_option('bookmarkify_HideBrand');
			$centerFade = get_option('bookmarkify_CenterFade');
			$docType = get_option('bookmarkify_DocType');
		}
		else // Use Default Settings
		{		
			$widgetTitle = $bookmarkifyWidgetTitle;
			$feedBurnerID = $bookmarkifyFeedBurnerID;
			$feedBurnerAddress = "";
			$moreLink = $bookmarkifyMoreLink;
			$hideBrand = $bookmarkifyHideBrand;
			$centerFade = $bookmarkifyCenterFade;
			$docType = $bookmarkifyDocType;
		}
		
		// Determine Feed Address		
		if($feedBurnerAddress=="")
			$feedURL=get_bloginfo_rss('rss2_url');
		else
			$feedURL="http://feeds.feedburner.com/".$feedBurnerAddress;

		// Icons should located in the same folder as the plugin PHP file	
		$iconFolder = get_bloginfo('wpurl')."/wp-content/plugins/bookmarkify";

	}
	// If we're not in the Blog get the settings from the global variables
	else
	{
		$inFeed=false;
		
		$widgetTitle = $bookmarkifyWidgetTitle;
		$feedBurnerID = $bookmarkifyFeedBurnerID;
		$feedBurnerAddress = "";
		$moreLink = $bookmarkifyMoreLink;
		$hideBrand = $bookmarkifyHideBrand;
		$centerFade = $bookmarkifyCenterFade;
		$docType = $bookmarkifyDocType;
		$feedURL = $bookmarkifyFeedURL;
		$iconFolder = $bookmarkifyIconDir;
	}


	// Create decoded versions of the title and url	
	$title=urldecode($title);
	$url=urldecode($url);
	
	// Create encoded versions
	$enctitle=urlencode($title);
	$encurl=urlencode($url);

	// Customizations for specific DocTypes
	if($docType=="HTML")
	{
		$endTag="";
	}
	else
	{
		$endTag="/";
	}

	// Begin Bookmarkify Widget
	if($listView==1 || $bookmarkifyButton==1)
		$d.="";
	else
		$d="<div class='bookmarkify'><a name='bookmarkify'></a>";

	// Widget Title
	if($bookmarkifyButton==1)	
	{
		$d.="<a title='Bookmark or Share This Page ...' href='".$url."#bookmarkify' onclick='document.getElementById(\"bookmarkifyMore".$bookmarkifyCount."\").style.display=\"block\"; return false;' rel='nofollow'><img src='$iconFolder/bookmarkify-it.png' $endTag></a>";	
	}
	else if($widgetTitle!='')
	{
		if($listView==1)
			$d.="<h2>".$widgetTitle."</h2>";
		else
			$d.="<div class='title' title='Use these links to share this page with others'>".$widgetTitle."</div>";
	}

	// Build the "More Window"
	// The more screen remains hidden (display:none) until the user clicks "More >>"
	if(($moreLink & !$inFeed) | ($bookmarkifyButton==1 & !$inFeed))
	{
		if(!$bookmarkifyMoreStyleWritten)
		{
			// Link in more.css if it hasn't been already
			$d.="<link rel='stylesheet' type='text/css' href='$iconFolder/more.css' $endTag>";
			$bookmarkifyMoreStyleWritten=true;
		}
		
		if($centerFade)	// Center Screen with Fade
		{
			// The outer container for the More Window
			$d.="<div class='bookmarkifyMore' id='bookmarkifyMore".$bookmarkifyCount."'>";
			$d.="<div class='bookmarkifyMoreWindow' style='position:relative;top:2%;margin:auto;opacity:1;'>";
		}
		else
		{
			// Styles in the More Window are currently hardcoded using the style attribute of the various tags
			$d.="<div class='bookmarkifyMoreWindow' id='bookmarkifyMore".$bookmarkifyCount."' style='display:none;position:absolute;'>";
		}
		
		// More Box Header (Title and Close link)
		$d.="<div class='bookmarkifyMoreWindowHeader'>";
		$d.="<a rel='nofollow' href='".$url."#bookmarkify' onclick='document.getElementById(\"bookmarkifyMore".$bookmarkifyCount."\").style.display=\"none\"; return false;'>$closeThisWindow<span class='bookmarkifyCloseIcon' style='background-image: url($iconFolder/imagecol.png); background-position:0px -1037px;'>&nbsp;</span></a>"; 
		$d.="$bookmarkAndShare ";
		$d.="</div>";
		
		// Save to Browser
		$d.="<div class='bookmarkifySaveToBrowser'>";
		$d.="<a rel='nofollow' href='".$url."#bookmarkify' onclick='javascript:if(document.all){window.external.AddFavorite(\"$url\", \"$title\");} else if(window.sidebar){window.sidebar.addPanel(\"$title\", \"$url\", \"\");}return false;' style='background-image: url($iconFolder/imagecol.png); background-position:0px -986px;'>$bookmarkifySaveToBrowserFavorites</a>"; 
		$d.="</div>";

		// Bookmark Site Links		
		$d.="<div class='bookmarkifySiteLinks'>";
		$d.="<table cellspacing='3'><tr><td>";
		$linkX=0;
		$colLimit=ceil((count($bookmarkifyLinks)-1)/5);	// Set a column limit appropriate for 5 columns
		foreach($bookmarkifyLinks as $link)
		{
			// Skip Email link
			if($link[0]=="Email")
				continue;
		
			// Create a column break at the limit
			if($linkX == $colLimit)
			{
				$d.="</td><td>";
				$linkX=1;
			}
			else
				$linkX++;
	
			// Create the site link
			if($link[5]==0)
			{
				$d.= "<div class='bookmarkifySiteLink'>"
						."<a onclick='target=\"".$bookmarkifyLinkTarget."\";' href='".$link[2]."' title='".$link[1]."' rel='nofollow' style='background-image: url($iconFolder/imagecol.png); background-position:0px -".$link[4]."px'>"
						.$link[0]."</a></div>";
			}
			else if($link[5]==1)
			{
				$d.= "<div class='bookmarkifySiteLink' style='margin-left:-20px !important;'>".$link[6]."</div>";
			}
	
		}
		$d.="</td></tr></table>";
		$d.="</div>";

		// Email This to a Friend
		$d.="<div class='bookmarkifyEmail'>";
		$d.="<a rel='nofollow' href='http://www.feedburner.com/fb/a/emailFlare?loc=$loc&amp;itemTitle=$title&amp;uri=$url' style='background-image: url($iconFolder/imagecol.png); background-position:0px -1003px;'>$emailThisToAFriend</a>"; 
		$d.="</div>";


		// Copy HTML Box	
		$d.="<div class='bookmarkifyCopyHTML'>"
				. "&nbsp;&nbsp;$bookmarkifyCopyHTML:&nbsp;<input readonly='readonly' onclick='this.select();' type='text' value='&lt;a href=\"".$url."\"&gt;".$title."&lt;/a&gt;' size='84' title='$copyThisHTML' $endTag>"
			. "</div>";

		// Permalink Box	
		$d.="<div class='bookmarkifyCopyHTML'>"
				. "&nbsp;$bookmarkifyPermalink:&nbsp;<input readonly='readonly' onclick='this.select();' type='text' value='".$url."' size='84' title='$copyThisPermalink' $endTag>"
			. "</div>";

		// Links for RSS and Email Subscriptions
		if($feedURL!="")
		{
			$d.="<div class='bookmarkifySubscribe'><span class='bookmarkifySubscribeIcon' style='background-image: url($iconFolder/imagecol.png); background-position:0px -1020px;'>&nbsp;</span>"
					. "$IfYouLIke <a href='".$feedURL."' onclick='target=\"_blank\";' rel='nofollow'>$RSSFeed</a>";
	
			// Only offer the Email Subscription if the FeedBurnerID is set.
			if($feedBurnerID !='')
				$d.= " $or <a href='http://www.feedburner.com/fb/a/emailverifySubmit?feedId=".$feedBurnerID."&amp;loc=$loc' onclick='target=\"_blank\";' rel='nofollow'>$emailFeed</a>.";
			else
				$d.= ".";			
				
			$d.="</div>";
		}
	
		// Powered by Bookmarkify Link
		$d.="<div class='bookmarkifyPoweredBy'><a href='http://www.bookmarkify.com/'>$poweredBy Bookmarkify&trade;</a></div>";

		$d.="</div>"; // End "More" Box

		if($centerFade)	// Center Screen with Fade
		{
			// Styles in the More screen/box are currently hardcoded using the style attribute of the various tags
			$d.="<div class='bookmarkifyFadeBackground'></div>";
			$d.="</div>"; // End "More" Screen Outer Container
		}

	}
	
	if($bookmarkifyButton==0)	
	{
		// Bookmark and Sharing Links	
		if($listView==1)
			$d.="<ul>";
		else
			$d.="<div class='linkbuttons'>";	
			
		foreach($bookmarkifyLinks as $link)
		{
			// Strip periods and spaces to create the Site Key
			$linkKey=str_replace(".", "", str_replace(" ", "", $link[0]));
			
			// If we're in the Blog get the include setting from WordPress		
			if($inBlog)
			{
				if($useDefaults)
				{
					if(strpos($bookmarkifySelectedLinks,$link[0])===false)
						$linkOn=0;
					else
						$linkOn=1;
				}
				else
					$linkOn=get_option('bookmarkify_Include'.$linkKey);
			}
			// If we're outside the Blog get it from the global variable.
			else
			{
				if(strpos($bookmarkifySelectedLinks,$link[0])===false)
					$linkOn=0;
				else
					$linkOn=1;
			}
	
			// If the include setting is on create the submit button for the site.
			if($linkOn==1)
			{
				if($listView==1)
				{
					$d.="<li>";
					$d.= "<a style='padding-left:20px; padding-bottom:5px; background:url(\"".$iconFolder."/".$link[3]."\") no-repeat;' href='".$link[2]."' title='".$link[1]."' onclick='target=\"".$bookmarkifyLinkTarget."\";' rel='nofollow'>";
					if($listView==1)
						$d.="".$link[0];
					$d.= "</a> ";
					$d.="</li>";
				}
				
				else
				{
					$d.= "<a href='".$link[2]."' title='".$link[1]."' onclick='target=\"".$bookmarkifyLinkTarget."\";' rel='nofollow'>"
							. "<img src='".$iconFolder."/".$link[3]."' style='width:16px; height:16px;' alt='[".$link[0]."] ' $endTag>"
							. "</a> ";
				}
			}
		}
	
		// Show the "More>>" link only if the setting is on
		if($moreLink)
		{
			if($listView==1)
				$d.="<li>";
	
			if($inFeed)
				$d.=" <a title='See more bookmark and sharing options...' href='".$url."#bookmarkify' rel='nofollow'><small>$more&nbsp;&raquo;</small></a>";
			else
				$d.=" <a title='See more bookmark and sharing options...' href='".$url."#bookmarkify' onclick='document.getElementById(\"bookmarkifyMore".$bookmarkifyCount."\").style.display=\"block\"; return false;' rel='nofollow'><small>$more&nbsp;&raquo;</small></a>";
	
			if($listView==1)
				$d.="</li>";
		}
	
		if($listView==1)
			$d.="</ul>";
		else
			$d.="</div>";	
	
		// Links for RSS and Email Subscriptions '!!WORK IN PROGRESS
		if($feedURL!="" && false)
		{
			$d.="<div class='subscribe' style='padding: 2px 0px;'><span class='subscribeIcon' style='margin: 2px 0px; padding: 0px 0px 0px 12px !important; background-image: url($iconFolder/rssfeed.png);'>&nbsp;</span>"
					. "$IfYouLIke <a href='".$feedURL."' onclick='target=\"_blank\";' rel='nofollow'>$RSSFeed</a>";
	
			// Only offer the Email Subscription if the FeedBurnerID is set.
			if($feedBurnerID !='')
				$d.= " $or <a href='http://www.feedburner.com/fb/a/emailverifySubmit?feedId=".$feedBurnerID."&amp;loc=$loc' onclick='target=\"_blank\";' rel='nofollow'>$emailFeed</a>.";
			else
				$d.= ".";			
				
			$d.="</div>";
		}
	
		// Show the Branding only if the HideBrand setting is off
		if($hideBrand!=1 & $listView!=1)
			$d.="<div class='brand'><small><a href='http://www.bookmarkify.com/'>$poweredBy Bookmarkify&trade;</a></small></div>";
	
	}

	if($listView!=1 & $bookmarkifyButton!=1)
		$d.="</div>"; // End Bookmarkify Widget
	
	return $d;
}

// Writes the style sheet settings for the More Window
// This function is hooked into wp_head 
function writeBookmarkifyMoreStyle()
{
	global $bookmarkifyDocType;
	global $bookmarkifyIconDir;
	global $bookmarkifyMoreStyleWritten;
	
	if(function_exists('get_option'))
	{
		$docType = get_option('bookmarkify_DocType');
		$iconFolder = get_bloginfo('wpurl')."/wp-content/plugins/bookmarkify";
	}
	else
	{
		$docType = $bookmarkifyDocType;
		$iconFolder= $bookmarkifyIconDir;
	}


	// These styles only need to be written once
	if($bookmarkifyMoreStyleWritten)
		return;

	if($bookmarkifyDocType=="HTML")
	{
		echo "<link rel='stylesheet' type='text/css' href='$iconFolder/more.css'>";
	}
	else
	{
		echo "<link rel='stylesheet' type='text/css' href='$iconFolder/more.css' />";
	}

	$bookmarkifyMoreStyleWritten=true;

}

// Creates the widget and outputs it to the browser
function bookmarkifyIt($title, $url, $inBlog=false)
{
	global $bookmarkifyListView;
	$bookmarkifyListView=0;
	echo createBookmarkify($title, $url, $inBlog);
}

function bookmarkifyItList($title, $url, $inBlog=false)
{
	global $bookmarkifyListView;
	$bookmarkifyListView=1;
	echo createBookmarkify($title, $url, $inBlog);
}

function bookmarkifyItButton($title, $url, $inBlog=false)
{
	global $bookmarkifyButton;
	$bookmarkifyButton=1;
	echo createBookmarkify($title, $url, $inBlog);
}

// Creates the Social Bookmark Site Database as a two-dimensional array
function getBookmarkifyLinks($t, $u, $loc)
{
/**
  This function generates an array of all supported bookmarking sites.
  Each element of the array is an array of properties for the site.
  0 - Name of the site to be used in the title
  1 - Long name used in link Title
  2 - The encoded URL or JavaScript to the site's bookmark submission page
  3 - Name of the site's stand-alone favicon file
  4 - The y-position of the favicon with the imagecol.png file
  5 - The type of HTML in position 2 (0-URL, 1-SCRIPT)
  
  To add a new site, create a new site element with the appropriate properties.
**/

	$i=0;
	
	$links[$i++] = array("Ask", "Save to Ask", "http://myjeeves.ask.com/mysearch/BookmarkIt?v=1.2&amp;t=webpages&amp;url=$u&amp;title=$t", "ask.png", 0, 0);
	$links[$i++] = array("backflip", "Save to backflip", "http://www.backflip.com/add_page_pop.ihtml?url=$u&amp;title=$t", "backflip.png", 17, 0);
	$links[$i++] = array("blinklist", "Save to blinklist", "http://blinklist.com/index.php?Action=Blink/addblink.php&amp;Url=$u&amp;Title=$t", "blinklist.png", 34, 0);
	$links[$i++] = array("BlogBookmark", "Save to BlogBookmark", "http://www.blogbookmark.com/submit.php?url=$u", "blogbookmark.png", 51, 0);
	$links[$i++] = array("Bloglines", "Save to Bloglines", "http://www.bloglines.com/sub/$u", "bloglines.png", 68, 0);
	$links[$i++] = array("BlogMarks", "Save to BlogMarks", "http://blogmarks.net/my/new.php?mini=1&amp;simple=1&amp;url=$u&amp;title=$t", "blogmarks.png", 85, 0);
	$links[$i++] = array("Blogsvine", "Save to Blogsvine", "http://www.blogsvine.com/submit.php?url=$u", "blogsvine.png", 102, 0);
	$links[$i++] = array("BuddyMarks", "BuddyMark It", "http://www.buddymarks.com/add_bookmark.php?bookmark_title=$t&amp;bookmark_url=$u", "buddymarks.png", 119, 0);
	$links[$i++] = array("BUMPzee!", "Save to BUMPzee!", "http://www.bumpzee.com/bump.php?u=$u", "bumpzee.png", 136, 0);
	$links[$i++] = array("CiteULike", "Save to CiteULike", "http://www.citeulike.org/posturl?url=$u&amp;title=$t", "citeulike.png", 153, 0);
//	$links[$i++] = array("co.mments", "Save to co.mments.com", "http://co.mments.com/track?url=$u&amp;title=$t", "comments.png", 170, 0);
	$links[$i++] = array("Connotea", "Save to Connotea", "http://www.connotea.org/addpopup?continue=confirm&amp;uri=$u&amp;title=$t", "connotea.png", 187, 0);
	$links[$i++] = array("del.icio.us", "Save to del.icio.us", "http://del.icio.us/post?url=$u&amp;title=$t", "delicious.png", 204, 0);
	$links[$i++] = array("Digg", "Digg It!", "http://digg.com/submit?phase=2&amp;url=$u&amp;title=$t", "digg.png", 221, 0);
	$links[$i++] = array("diigo", "Save to diigo", "http://www.diigo.com/post?url=$u&amp;title=$t", "diigo.png", 238, 0);
	$links[$i++] = array("DotNetKicks", "Save to DotNetKicks", "http://www.dotnetkicks.com/kick/?url=$u&amp;title=$t", "dotnetkicks.png", 255, 0);
	$links[$i++] = array("DropJack", "Save to DropJack", "http://www.dropjack.com/submit.php?url=$u", "dropjack.png", 272, 0);
	$links[$i++] = array("dzone", "Save to dzone", "http://www.dzone.com/links/add.html?description=$t&amp;url=$u&amp;title=$t", "dzone.png", 289, 0);
	$links[$i++] = array("Facebook", "Save to Facebook", "http://www.facebook.com/share.php?u=$u", "facebook.png", 306, 0);
	$links[$i++] = array("Fark", "FarkIt!", "http://cgi.fark.com/cgi/fark/farkit.pl?u=$u&amp;h=$t", "fark.png", 323, 0);
	$links[$i++] = array("Faves", "Save to Faves", "http://faves.com/Authoring.aspx?u=$u&amp;t=$t", "faves.png", 340, 0);
//	$links[$i++] = array("Feed Me Links", "Save to Feed Me Links", "http://feedmelinks.com/categorize?from=toolbar&amp;op=submit&amp;name=$t&amp;url=$u", "feedmelinks.png", 357, 0);
	$links[$i++] = array("Friendsite", "Save to Friendsite", "http://friendsite.com/users/bookmark/?u=$u&amp;t=$t", "friendsite.png", 391, 0);
	$links[$i++] = array("folkd.com", "Save to folkd.com", "http://www.folkd.com/submit/$u", "folkd.png", 374, 0);
	$links[$i++] = array("Furl", "Save to Furl", "http://www.furl.net/storeIt.jsp?u=$u&amp;t=$t", "furl.png", 408, 0);
	$links[$i++] = array("Google", "Save to Google Bookmarks", "http://www.google.com/bookmarks/mark?op=edit&amp;output=popup&amp;bkmk=$u&amp;title=$t", "google.png", 425, 0);
//	$links[$i++] = array("Hugg", "Save to Hugg", "http://www.hugg.com/node/add/storylink?edit[title]=$t&amp;edit[url]=$u", "hugg.png", 442, 0);
	$links[$i++] = array("Jamespot", "Spot It!", "http://www.jamespot.com/?action=spotit&url=$u", "jamespot.png", 1122, 0);
	$links[$i++] = array("Jeqq", "Save to Jeqq", "http://www.jeqq.com/submit.php?url==$u&amp;title=$t", "jeqq.png", 459, 0);
	$links[$i++] = array("Kaboodle", "Save to Kaboodle", "http://www.kaboodle.com/za/selectpage?p_pop=false&amp;pa=url&amp;u=$u", "kaboodle.png", 476, 0);
	$links[$i++] = array("kirtsy", "Save to kirtsy", "http://www.kirtsy.com/submit.php?url=$u", "kirtsy.png", 493, 0);
	$links[$i++] = array("linkaGoGo", "Save to linkaGoGo", "http://www.linkagogo.com/go/AddNoPopup?url=$u&amp;title=$t", "linkagogo.png", 510, 0);
	$links[$i++] = array("LinkedIn", "Share on LinkedIn", "http://www.linkedin.com/shareArticle?mini=true&url=$u&title=$t", "linkedin.png", 1155, 0);
//	$links[$i++] = array("LinksMarker", "Save to LinksMarker", "http://www.linksmarker.com/submit.php?url=$u&amp;title=$t", "linksmarker.png", 527, 0);
	$links[$i++] = array("Ma.gnolia", "Save to Ma.gnolia", "http://ma.gnolia.com/bookmarklet/add?url=$u&amp;title=$t", "magnolia.png", 544, 0);
	$links[$i++] = array("Mister Wong", "Save to Mister Wong", "http://www.mister-wong.com/index.php?action=addurl&amp;bm_url=$u&amp;bm_description=$t", "misterwong.png", 561, 0);
	$links[$i++] = array("Mixx", "Save to Mixx", "http://www.mixx.com/submit?page_url=$u", "mixx.png", 578, 0);
	$links[$i++] = array("MySpace", "Save to MySpace", "http://www.myspace.com/Modules/PostTo/Pages/?c=$u&amp;t=$t", "myspace.png", 595, 0);
//	$links[$i++] = array("MyWeb", "Save to My Web", "http://myweb.yahoo.com/myweb/save?t=$t&amp;u=$u", "myweb.png", 612, 0);
	$links[$i++] = array("Netvouz", "Save to Netvouz", "http://www.netvouz.com/action/submitBookmark?url=$u&amp;title=$t&amp;popup=no", "netvouz.png", 629, 0);
	$links[$i++] = array("Newsvine", "Seed Newsvine", "http://www.newsvine.com/_tools/seed?popoff=0&amp;u=$u", "newsvine.png", 646, 0);
	$links[$i++] = array("oneview", "Save to oneview", "http://www.oneview.com/quickadd/neu/addBookmark.jsf?URL=$u&amp;title=$t", "oneview.png", 1054, 0);
	$links[$i++] = array("OnlyWire", "Save to OnlyWire", "http://www.onlywire.com/submit?u=$u&amp;t=$t", "onlywire.png", 1071, 0);
	$links[$i++] = array("PlugIM", "Promote on PlugIM", "http://www.plugim.com/submit?url=$u&amp;title=$t", "plugim.png", 663, 0);
//	$links[$i++] = array("popcurrent", "Save to popcurrent.com", "http://popcurrent.com/submit?url=$u&amp;title=$t", "popcurrent.png", 680, 0);
	$links[$i++] = array("Propeller", "Submit to Propeller", "http://www.propeller.com/submit/?U=$u&amp;T=$t", "propeller.png", 697, 0);
	$links[$i++] = array("Reddit", "Reddit", "http://reddit.com/submit?url=$u&amp;title=$t", "reddit.png", 714, 0);
//	$links[$i++] = array("Rojo", "Save to Rojo", "http://www.rojo.com/add-subscription/?resource=$u", "rojo.png", 731, 0);
	$links[$i++] = array("Segnalo", "Save to Segnalo", "http://segnalo.com/post.html.php?url=$u&amp;title=$t", "segnalo.png", 748, 0);
	$links[$i++] = array("Shoutwire", "Shout It!", "http://www.shoutwire.com/?p=submit&amp;link=$u", "shoutwire.png", 765, 0);
	$links[$i++] = array("Simpy", "Save to Simpy", "http://www.simpy.com/simpy/LinkAdd.do?href=$u&amp;title=$t", "simpy.png", 782, 0);
	$links[$i++] = array("Slashdot", "Slashdot It!", "http://slashdot.org/bookmark.pl?url=$u&amp;title=$t", "slashdot.png", 799, 0);
	$links[$i++] = array("Surphace", "Save to Surphace", "http://www.surphace.com/search?q=sphereit:$u&amp;title=$t", "surphace.png", 816, 0);
	$links[$i++] = array("Sphinn", "Sphinn", "http://sphinn.com/submit.php?url=$u&amp;title=$t", "sphinn.png", 833, 0);
	$links[$i++] = array("Spurl", "Save to Spurl", "http://www.spurl.net/spurl.php?url=$u&amp;title=$t", "spurl.png", 850, 0);
	$links[$i++] = array("Squidoo", "Save to Squidoo", "http://www.squidoo.com/lensmaster/bookmark?$u", "squidoo.png", 867, 0);
	$links[$i++] = array("StumbleUpon", "Stumble It!", "http://www.stumbleupon.com/submit?url=$u&amp;title=$t", "stumbleupon.png", 884, 0);
	$links[$i++] = array("Technorati", "Add to my Technorati Favorites", "http://technorati.com/faves?add=$u", "technorati.png", 901, 0);
	$links[$i++] = array("ThisNext", "Save to ThisNext", "http://www.thisnext.com/pick/new/submit/sociable/?url=$u&amp;name=$t", "thisnext.png", 918, 0);
	$links[$i++] = array("Twitter", "Save to Twitter", "http://twitter.com/home/?status=$t+$u", "twitter.png", 1105, 0);
	$links[$i++] = array("Webride", "Discuss on Webride", "http://webride.org/discuss/split.php?uri=$u&amp;title=$t", "webride.png", 935, 0);
	$links[$i++] = array("Windows Live", "Save to Windows Live", "https://favorites.live.com/quickadd.aspx?mkt=en-us&amp;url=$u&amp;title=$t", "windowslive.png", 952, 0);
//	$links[$i++] = array("Worlds Movies", "Save to Worlds Movies", "http://www.worldsmovies.net/member/uservideo.php?url=$u", "worldsmovies.png", 1138, 0);
	$links[$i++] = array("Yahoo!", "Save to Yahoo! Bookmarks", "http://bookmarks.yahoo.com/toolbar/savebm?opener=tb&amp;u=$u&amp;t=$t", "yahoo.png", 969, 0);

// 	$links[$i++] = array("Buzz", "Buzz Up!", "http://buzz.yahoo.com/submit", "buzz.png", 1088, 1, "<script>yahooBuzzArticleHeadline='$t';</script><script type='text/javascript' src='http://d.yimg.com/ds/badge2.js' badgetype='text'></script>");

	$links[$i++] = array("Email", "Email this to a friend", "http://www.feedburner.com/fb/a/emailFlare?itemTitle=$t&amp;uri=$u&amp;loc=$loc", "email.png", 1003, 0);

	return $links;	
}

// Action functon that adds the widget to the post's content
function bookmarkifyPost($content)
{
	// If were in the feed and the blogger doesn't want the 
	// the widget in the full feed, just return the content.
	global $doing_rss;
	global $bookmarkifyListView;
	global $bookmarkifyHide;

	$bookmarkifyListView=0;

	// If the no-bookmarkify HTML comment is present, do not insert the widget	
	if(strpos($content, '<!--no-bookmarkify-->') > 0 || $bookmarkifyHide)
		return $content;

	$excludeFromFeed = get_option('bookmarkify_ExcludeFromFeed');

	if($excludeFromFeed & (is_feed() || $doing_rss))
		return $content;
	
	$location = get_option('bookmarkify_Location');
	
	if($location=="toc")
		return createBookmarkify(the_title('','',false), get_permalink(), true) . $content;
	else if($location=="boc")
		return $content . createBookmarkify(the_title('','',false), get_permalink(), true);
	else if($location=="other")
		return $content;

}

// Admin Options Page
function bookmarkifyOptionsPage()
{
	$bookmarkifyLinks=getBookmarkifyLinks('','','');

	if(isset($_POST['BookmarkifyUpdate']))
	{
		// Save Options
		$widgetTitle = $_POST['WidgetTitle'];
		$location = $_POST['Location'];
		$moreLink = $_POST['MoreLink']=="1" ? "1" : "0";
		$centerFade = $_POST['CenterFade']=="1" ? "1" : "0";
		$feedBurnerID = $_POST['FeedBurnerID'];
		$feedBurnerAddress = $_POST['FeedBurnerAddress'];
		$hideBrand = $_POST['HideBrand']=="1" ? "1" : "0";
		$excludeFromFeed = $_POST['ExcludeFromFeed']=="1" ? "1" : "0";
		$docType = $_POST['DocType'];
		
		update_option('bookmarkify_WidgetTitle', $widgetTitle);
		update_option('bookmarkify_Location', $location);
		
		foreach($bookmarkifyLinks as $link)
		{
			$linkKey=str_replace(".", "", str_replace(" ", "", $link[0]));
			$linkOn=$_POST['Include'.$linkKey]=="1" ? "1" : "0";
			update_option('bookmarkify_Include'.$linkKey, $linkOn);
		}

		update_option('bookmarkify_MoreLink', $moreLink);
		update_option('bookmarkify_CenterFade', $centerFade);
		update_option('bookmarkify_FeedBurnerID', $feedBurnerID);
		update_option('bookmarkify_FeedBurnerAddress', $feedBurnerAddress);
		update_option('bookmarkify_HideBrand', $hideBrand);
		update_option('bookmarkify_ExcludeFromFeed', $excludeFromFeed);
		update_option('bookmarkify_DocType', $docType);
		update_option('bookmarkify_IsSetup', "1");
		
?>

<div class="updated fade" id="message" style="background-color:rgb(207, 235, 247);"><p><strong>Options saved.</strong></p></div>
<?php
	}
	else
	{
		// Retrieve Options
		$widgetTitle = get_option('bookmarkify_WidgetTitle');
		$location = get_option('bookmarkify_Location');
		$moreLink = get_option('bookmarkify_MoreLink');
		$centerFade = get_option('bookmarkify_CenterFade');
		$feedBurnerID = get_option('bookmarkify_FeedBurnerID');
		$feedBurnerAddress = get_option('bookmarkify_FeedBurnerAddress');
		$hideBrand = get_option('bookmarkify_HideBrand');
		$excludeFromFeed= get_option('bookmarkify_ExcludeFromFeed');
		$docType = get_option('bookmarkify_DocType');
	}

	if($feedBurnerAddress=="")
		$feedURL=get_bloginfo_rss('rss2_url');
	else
		$feedURL="http://feeds.feedburner.com/".$feedBurnerAddress;

?>
	<div class="wrap">
		<h2>Bookmarkify</h2>
		<form method="POST">
			<table class="optiontable">
				<tr valign="top">
					<th>Widget Title:</th>
					<td><input id="WidgetTitle" name="WidgetTitle" type="text" value="<?php echo $widgetTitle; ?>" size="35"><br>
					The text appears in the title bar at the top of the Bookmarkify widget.<br>When left blank, the title bar will NOT appear.</td>
				</tr>
				<tr valign="top">
					<th>Widget Location:</th>
					<td>
						<select id="Location" name="Location">
							<option value="boc" <?php echo $location=="boc" ? "selected" : ""; ?>>Bottom of Content</option>
							<option value="toc" <?php echo $location=="toc" ? "selected" : ""; ?>>Top of Content</option>
							<option value="other" <?php echo $location=="other" ? "selected" : ""; ?>>Other (requires template modification)</option>
						</select>
					</td>
				</tr>
				<tr valign="top">
					<th>Include the Following Sites:</th>
					<td>The selected links will appears in the widget on your blog.<br>
						Select as few or as many as you like.<br>
						If you select "Include the More Link" below, visitors can use it to access all of the site links.
						<table cellpadding="0" cellspacing="0"><tr>
							<td valign="top">
<?php
	$linkX=0;
	$colLimit=ceil(count($bookmarkifyLinks)/3);
	$siteList="";
	foreach($bookmarkifyLinks as $link)
	{
		$linkKey=str_replace(".", "", str_replace(" ", "", $link[0]));
		$linkOn=get_option('bookmarkify_Include'.$linkKey);
?>
								<div style="vertical-align:middle;"><input type="checkbox" name="Include<?php echo $linkKey; ?>" value="1" <?php echo $linkOn==1 ? 'checked' : ''; ?>> 
									<img title="<?php echo $link[1]; ?>" src="<?php echo get_bloginfo('wpurl')."/wp-content/plugins/bookmarkify/".$link[3]; ?>" style="width:16px; height:16px; border:none;"> <?php echo $link[0]; ?></div>
<?php
		if($linkOn)
			$siteList.=$link[0].";";
			
		$linkX++;
		if($linkX==$colLimit)
		{
?>
							</td><td valign="top">
<?php
			$linkX=0;
		}
	}
?>
							</td>
						</tr></table>
					</td>
				</tr>
				<tr valign="top">
					<th>Include More Link:</th>
					<td>
					<input type="checkbox" id="MoreLink" name="MoreLink" value="1" <?php echo $moreLink ? 'checked' : ''; ?>> Include the "<span style="color:blue;">More &raquo;</span>" link at the end of list<br>
					<i>NOTE - Without this option users will only be able to use the sites you have selected above.</i>
					</td>
				</tr>
				<tr valign="top">
					<th>Center and Fade More Box:</th>
					<td>
					<input type="checkbox" id="CenterFade" name="CenterFade" value="1" <?php echo $centerFade ? 'checked' : ''; ?>> When set the current page will become subdued and the More 
					Box will be centered on the screen.<br>
					When unchecked the More Box will drop down below the Widget Title
					</td>
				</tr>
				<tr valign="top">
					<th>FeedBurner Address:</th>
					<td>http://feeds.feedburner.com/<input id="FeedBurnerAddress" name="FeedBurnerAddress" type="text" value="<?php echo $feedBurnerAddress; ?>" size="35"><br>
					If you use FeedBurner to distribute your feed, enter the address here.<br>
					When left blank, Bookmarkify will use your blog's default feed URL.</td>
				</tr>
				<tr valign="top">
					<th>FeedBurner ID:</th>
					<td><input id="FeedBurnerID" name="FeedBurnerID" type="text" value="<?php echo $feedBurnerID; ?>"><br>
					If you use FeedBurner to distribute your feed, enter the Feed ID here (<i>the Feed ID is a number</i>)<br>
					When set, Bookmarkify will display a link for subscribing to your blog via FeedBurner's Email service.</td>
				</tr>
				<tr valign="top">
					<th>Exclude Widget From Feed:</th>
					<td>
					<input type="checkbox" id="ExcludeFromFeed" name="ExcludeFromFeed" value="1" <?php echo $excludeFromFeed ? 'checked' : ''; ?>> Do not include the Widget in the full content RSS 
					feed.
					</td>
				</tr>
				<tr valign="top">
					<th>Hide Branding on Widget:</th>
					<td>
					<input type="checkbox" id="HideBrand" name="HideBrand" value="1" <?php echo $hideBrand ? 'checked' : ''; ?>> Hide the "Powered by Bookmarkify" link at the bottom of the widget.<br>
					<i>NOTE - The link will still appear in the "More" box.</i>
					</td>
				</tr>
				<tr valign="top">
					<th>Doc Type:</th>
					<td>
						<select id="DocType" name="DocType">
							<option value="XHTML" <?php echo $docType=="XHTML" ? "selected" : ""; ?>>XHTML 1.0 Strict</option>
							<option value="HTML" <?php echo $docType=="HTML" ? "selected" : ""; ?>>HTML 4.01 Strict</option>
						</select><br>
						The Widget and More Box can be valid <strong>XHTML 1.0</strong> OR <strong>HTML 4.01</strong>.<br>
						It is best to select the option used by your current theme.
					</td>
				</tr>
			</table>
			<p class="submit"><input name="BookmarkifyUpdate" type="submit" value="Update Options &raquo;"></p>
		</form>
		<h3>Style Settings</h3>
		<p>In addition to the settings above, you can control the look and feel of your Bookmarkify widget using a variety of style sheet classes.</p>
		<p>The default style sheet definitions can be found in the bookmarkify.css file that was included with the Bookmarkify download.</p>
		<p>Copy these styles definitions to your blog or site's stylesheet and modify them as necessary.</p>
			<h4>Style Classes</h4>
			<p><b>div.bookmarkify</b> is the overall container of the Bookmarkify widget.&nbsp; All of the other elements are inside of this one.</p>
			<p><b>div.bookmarkify div.title</b> contains Widget Title.</p>
			<p><b>div.bookmarkify div.linkbuttons</b> contains the bookmark site link buttons.</p>
			<p><b>div.bookmarkify div.brand</b> contains the &quot;Powered by Bookmarkify&quot; link.&nbsp; To hide this link use the &quot;Hide Branding&quot; 
			option above.&nbsp;</p>
		<h3>Settings for PHP Pages Outside of WordPress</h3>
		<h4>Think Outside the Blog!</h4>
		<p><i>NOTE - This section is only relevant for PHP pages outside of the WordPress system.&nbsp; If you only use WordPress you need NOT concern 
		yourself with this information.</i></p>
		<p>If wish to use Bookmarkify in PHP pages outside your blog you will need to include the following code in the page.<br>
		<textarea onclick="this.select();" name="phpCode" cols="75" rows="10">require_once("<?php echo realpath('../wp-content/plugins/bookmarkify/bookmarkify.php'); ?>");
$bookmarkifyWidgetTitle="<?php echo $widgetTitle; ?>";
$bookmarkifySelectedLinks="<?php echo $siteList; ?>";
$bookmarkifyFeedURL="<?php echo $feedURL; ?>";
$bookmarkifyFeedBurnerID="<?php echo $feedBurnerID; ?>";
$bookmarkifyMoreLink=<?php echo $moreLink ? "1" : "0"; ?>;
$bookmarkifyCenterFade=<?php echo $centerFade ? "1" : "0"; ?>;
$bookmarkifyHideBrand=<?php echo $hideBrand ? "1" : "0"; ?>;
$bookmarkifyDocType="<?php echo $docType; ?>";
$bookmarkifyIconDir="<? echo get_bloginfo('wpurl'); ?>/wp-content/plugins/bookmarkify";</textarea></p>
		<p>To simplify this, you can add this code within a PHP file that you already include throughout your site, like a header.&nbsp; Remember to copy this code to that location any time you change the options above.  This will ensure that the Bookmarkify widget is consistent 
		across your entire site.</p>
		<p>If your blog is in a different location, adjust the parameter of the 'require_once' function call accordingly.</p>
		<p>To insert the widget simply add the following PHP function call at the place on your page that you want the Bookmarkify widget to appear:</p>
		<pre>bookmarkifyIt($title, $url);</pre>
		<p>Replace $title with the your page's title and $url with the URL of the page.&nbsp; </p>
		<p>Here is the code using the GARA home page as an example:</p>
		<pre>bookmarkifyIt(&quot;GARA Systems&quot;, &quot;http://www.gara.com/&quot;);</pre>
		<h3>Use it in the Sidebar</h3>
		<p>To use the sidebar version of the widget add the following PHP function call at the place in your sidebar that you want it to appear:</p>
		<pre>bookmarkifyItList($title, $url);</pre>
		<p>Replace $title with your blog's title and $url with your blog's URL.</p>
		<p>Here is the code using the GARA Blog as an example:</p>
		<pre>bookmarkifyItList(&quot;The GARA Blog&quot;, &quot;http://www.gara.com/blog/&quot;);</pre>
		<h3>Create a BookmarkifyIt Button</h3>
		<p>The BookmarkifyIt Button is a single image link that opens the More Box when clicked.  To add the Bookmarkify Button add the following PHP function call at the place that you want it to appear:</p>
		<pre>bookmarkifyItButton($title, $url);</pre>
		<p>Replace $title with your blog's title and $url with your blog's URL.</p>
		<p>Here is the code using the GARA Systems home page as an example:</p>
		<pre>bookmarkifyItButton("GARA Systems", "http://www.gara.com");</pre>
	</div>
	<div class="wrap">
		<h2>More Information</h2>
		<p>Check for the latest information on Bookmarkify here:  <a href="http://www.bookmarkify.com/">http://www.bookmarkify.com/</a></p>
		<p>Subscribe to Bookmarkify Updates via RSS or Email here:  <a href="http://feeds.feedburner.com/Bookmarkify">http://feeds.feedburner.com/Bookmarkify</a></p>
		<p>If you like Bookmarkify, then you might also like <a href="http://www.amazonify.net/">Amazonify</a> and <a href="http://www.googmonify.com/">Googmonify</a>, also by <a href="http://www.gara.com/">GARA Systems</a>.</p>
	</div>
<?php
}

// Add Options Page
function bookmarkifyAdminSetup()
{
	add_options_page('Bookmarkify', 'Bookmarkify', 8, basename(__FILE__), 'bookmarkifyOptionsPage');	
}

// Clean the Excerpt
function bookmarkifyPostNOT($excerpt)
{
	remove_filter('the_content', 'bookmarkifyPost');
	return $excerpt;
}

// Add Bookmarkify Actions
if(function_exists('add_action'))
{
	add_action('admin_menu', 'bookmarkifyAdminSetup');
	add_action('wp_head', 'writeBookmarkifyMoreStyle');
}

if(function_exists('add_filter'))
{
	add_filter('the_content', 'bookmarkifyPost');
	add_filter('the_excerpt', 'bookmarkifyPostNOT');
}

?>