<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package The_Hand_Space
 */

?>
	</div><!-- #content -->
	<div class="push"></div>
</div><!-- #page -->

<footer>
	<div class="footer-wrap">
		<div id="email-signup">
			<!-- Begin MailChimp Signup Form -->
			<div id="mc_embed_signup">
				<form action="//space.us14.list-manage.com/subscribe/post?u=3649aa57f0b88d16dabadd2bf&amp;id=c0ee0b7456" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
					<div class="mc-field-group">
						<label for="mce-EMAIL">Email Address</label>
						<input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL" placeholder="Enter your email to get updates.">
					</div>
				    <div style="position: absolute; left: -5000px;" aria-hidden="true">
				    	<input type="text" name="b_3649aa57f0b88d16dabadd2bf_1e38725547" tabindex="-1" value="">
				    </div>
				    <div class="group" style="display: none;">
				    	<label class="checkbox" for="group_16">
					    	<input type="checkbox" data-dojo-type="dijit/form/CheckBox" id="group_16" name="group[299][16]" value="1" class="av-checkbox" checked="checked"><span>Web Signup</span>
				    	</label>
				    </div>
				    <div class="clear">
				    	<input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button">
				    </div>
					<div id="mce-responses" class="clear">
						<div class="response" id="mce-error-response" style="display:none"></div>
						<div class="response" id="mce-success-response" style="display:none"></div>
					</div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
				</form>
			</div>
			<script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script><script type='text/javascript'>(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';fnames[1]='FNAME';ftypes[1]='text';fnames[2]='LNAME';ftypes[2]='text';}(jQuery));var $mcj = jQuery.noConflict(true);</script>
			<!--End mc_embed_signup-->
		</div>
		<p id="copy">The Hand &copy; 2018</p>
	</div>
</footer><!-- footer -->

<?php wp_footer(); ?>

</body>
</html>
