<?php
require_once('store-address.php');
if(isset($_POST) && $_POST['subscribe'] != '')
{
	echo storeAddress();
}

?>
<!-- Begin MailChimp Signup Form 
<link href="http://cdn-images.mailchimp.com/embedcode/slim-081711.css" rel="stylesheet" type="text/css"> -->
<style type="text/css">
	#mc_embed_signup{ clear:left; font:14px Helvetica,Arial,sans-serif; }
	/* Add your own MailChimp form style overrides in your site stylesheet or in this style block.
	   We recommend moving this block and the preceding CSS link to the HEAD of your HTML file. */
</style>
<div id="mc_embed_signup">
<form action="<?=$_SERVER['REQUEST_URI']; ?>" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" >
	
	<input type="email" value="" name="EMAIL" class="email" id="mce-EMAIL" placeholder="email address">
	<input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button">
</form>
</div>

<!--End mc_embed_signup-->