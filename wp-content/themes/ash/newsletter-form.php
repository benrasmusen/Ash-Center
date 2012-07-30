<!-- Newsletter-form-->
<section id="newsletter-form">
	<section class="form">
		<p class="clearfix">
			<?php if (function_exists('mailchimpSF_signup_form')): ?>
				<?php mailchimpSF_signup_form(); ?>
			<?php else: ?>
				<span class="notice">Please install the <a href="http://wordpress.org/extend/plugins/mailchimp/" title="WordPress &#8250; MailChimp List Subscribe Form &laquo; WordPress Plugins" target="_blank">MailChimp plugin</a> for this functionality.</spann>
			<?php endif ?>
		</p>
	</section>
	<h2>Sign up for Richard Ash, MD’s Newsletter</h2>
</section>
<!-- /Newsletter-form-->