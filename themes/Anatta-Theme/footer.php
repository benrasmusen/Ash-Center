<footer class="sitefooter">
		<div class="body">
        <div class="footer-navigation left">
        <div class="footer-search">
        <div class="footer-search-form">
       <div id="cse-search-form2">Loading</div>
<script src="//www.google.com/jsapi" type="text/javascript"></script>
<script type="text/javascript"> 
 google.load('search', '1', {language : 'en'});
 google.setOnLoadCallback(function() {
   var customSearchControl = new google.search.CustomSearchControl('009712716464247912388:zmtpp-vfuss');
   customSearchControl.setResultSetSize(google.search.Search.FILTERED_CSE_RESULTSET);
   var options = new google.search.DrawOptions();
   options.enableSearchboxOnly("http://ashcenter.wordpressprojects.com/", "s");
   customSearchControl.draw('cse-search-form2', options);
 }, true);
</script>
<style type="text/css">
  .sitefooter input.gsc-input {
    border:none;
	padding:5px 10px;
	border:none;
	background-image:none!important;
	width:276px!important;
	height:35px!important;
	outline:none;
	background-repeat:repeat!important;
	background-color:transparent!important;
  }
</style>
</div>
<div class="cnt-detail">
</div>
        </div>
        	<div class="footer-links">
             <dl>
                <dt>Dr. Ash:</dt>
                <dd>
                <a href="<?php bloginfo('url');?>/photo-gallery-3/">Photo Gallery</a><span>|</span>
                <a href="<?php bloginfo('url');?>/testimonials/">Testimonials</a><span>|</span>
                <a href="<?php bloginfo('url');?>/story/">Story</a><span>|</span>
                <a href="<?php bloginfo('url');?>/radio-show/">Radio Show</a><span>|</span>
                <a href="<?php bloginfo('url');?>/media-listing/">Media</a>
                </dd>
             </dl>
             <dl>
                <dt>Blog:</dt>
                <dd>
					
					<?php echo str_replace("<br \>"," ",wp_list_categories('style=0&title_li=0')); ?>

                </dd>
             </dl>
              <dl>
                <dt>Store:</dt>
                <dd>
               <a href="http://ws1713-1151.staging.nitrosell.com/store/department/4/Ash-Theraputic-Modulator-/">Ash Theraputic Modulator</a><span>|</span>
                <a href="http://ws1713-1151.staging.nitrosell.com/store/department/2/Books/">Books</a><span>|</span>
                <a href="http://ws1713-1151.staging.nitrosell.com/store/department/6/Skin-Care/">Skin Care</a><span>|</span>
                <a href="http://ws1713-1151.staging.nitrosell.com/store/department/13/Solution-Paks./">Solution Paks</a><span>|</span>
                <a href="http://ws1713-1151.staging.nitrosell.com/store/department/1/Vitamins-%26-Supplements/">Vitamins & Supplements:</a><span>|</span>
                <a href="http://ws1713-1151.staging.nitrosell.com/store/department/11/WELLNEST/">Wellnest</a><span>|</span>

                </dd>
             </dl>
             <dl>
                <dt>WellNest:</dt>
                <dd>
                <a href="<?php bloginfo('url');?>/about/">About</a><span>|</span>
                <a href="<?php bloginfo('url');?>/location/">Location</a><span>|</span>
                <a href="<?php bloginfo('url');?>/class-schedule/">Schedule</a><span>|</span>
                <a href="<?php bloginfo('url');?>/trainer-listing/">Trainers</a><span>|</span>
                <a href="<?php bloginfo('url');?>/event-listing/">Events</a><span>|</span>
                <a href="<?php bloginfo('url');?>/photo-gallery-2/">Photo Gallery</a>
                </dd>
             </dl>
             <dl>
              <dt>Ash Center:</dt>
                <dd>
                <a href="<?php bloginfo('url');?>/location-ash-center/">Location</a><span>|</span>
                <a href="<?php bloginfo('url');?>/patient-information/">Patient's Information</a><span>|</span>
                <a href="<?php bloginfo('url');?>/specialities/">Specialities</a><span>|</span>
                <a href="<?php bloginfo('url');?>/treatment-options/">Treatments</a><span>|</span>
                <a href="<?php bloginfo('url');?>/photo-gallery-1/">Photo Gallery</a>
                
                </dd>
             </dl>
         </div>    
        </div>
        <div class="footer-networks right">
        	<ul>
        		<li class="item-1">212-758-3200</li>
                <a href="http://www.twitter.com/RichardAshMD/" target="_blank"><li class="item-2">#RichardAshMD</li></a>
                <a href="http://www.facebook.com/pages/Richard-N-Ash-MD/113457665369741" target="_blank"><li class="item-3">DoctorAsh</li></a>
                <a href="<?php bloginfo('url'); ?>/contact/" ><li class="item-4">Dr Ash</li></a>
                <li class="item-5">
                <small>Newsletter</small>
                <?php include_once(TEMPLATEPATH.'/ashmailchimp.php'); //mailchimp code?>

                </li>
            </ul>
        </div>
         <div class="clear"></div>
 
        </div>
        <div class="bottom-nav">
        	<p class="left">
            <a href="#">©<?php the_time('Y');?>. Dr. Ash Center</a>
            </p>
           
        </div>
       
		<!-- <p>
			<span>Copyright</span> &copy; <?php echo date("Y"); echo " "; bloginfo('name'); ?> |
			<a href="http://ajy.co/"><span>Website Designed by</span> Aaron James Young</a>
		</p> -->
	</footer>
    <!--code for facebook button-->
 <div id="fb-root"></div>

 <script>
      window.fbAsyncInit = function() {
        FB.init({appId: '200309989981391', status: true, cookie: true, xfbml: true});
      };
      (function() {
        var e = document.createElement('script');
        e.type = 'text/javascript';
        e.src = document.location.protocol + '//connect.facebook.net/en_US/all.js';
        e.async = true;
        document.getElementById('fb-root').appendChild(e);
      }());
    </script>
	<!-- analytics -->
	<?php wp_footer(); ?>
    <script src="<?php bloginfo('template_directory'); ?>/scripts/custom.js"></script>
    </div>
</body>
</html>
