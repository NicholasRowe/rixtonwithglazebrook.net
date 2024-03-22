<!-- This code outputs contact details -->

<?php if(get_field('display_contacts')): ?>
  

<?php

	$namevar =  get_field('contact_name');
	$numvar = get_field('contact_number');
	$emailvar = get_field('contact_email_address');


	if ($namevar || $numvar || $emailvar):?>

	<h4>Contact:</h4>
	<p>
	<?php if(get_field('contact_name')): ?>
	<?php 
	$name = get_field('contact_name');
	echo $name;
	?><br/>
	<?php endif; ?>



	<?php if(get_field('contact_number')): ?>
	<?php 
	$number = get_field('contact_number');
	echo $number;
	?><br/>
	<?php endif; ?>



	<?php if(get_field('contact_email_address')): ?>
	<?php 
	$email = get_field('contact_email_address');
	?>
	<a href="mailto:<?php echo $email; ?>">E-mail us</a><br/>
	<?php endif; ?>
	</p>

<?php endif; ?>


<?php

	$web =  get_field('contact_web_address');
	$tw = get_field('contact_twitter_page');
	$fb = get_field('contact_facebook_page');


	if ($web || $tw || $fb):?>


	<h4>Connect:</h4>
	<p>
	<?php if(get_field('contact_web_address')): ?>
	<?php $url = get_field('contact_web_address'); ?>
	<a href="http://<?php echo $url; ?>" target="_blank">Visit our website</a><br/>
	<?php endif; ?>         


	<?php if(get_field('contact_facebook_page')): ?>
	<?php $facebook = get_field('contact_facebook_page'); ?>
	<a href="http://<?php echo $facebook; ?>" target="_blank"class="social-link"><img src="<?php echo get_site_url(); ?>/wp-content/themes/hdt/assets/img/facebook-icon.png"/></a>
	 <?php endif; ?>


	<?php if(get_field('contact_twitter_page')): ?>
	<?php $twitter = get_field('contact_twitter_page'); ?>
	<a href="http://<?php echo $twitter; ?>" target="_blank" class="social-link"><img src="<?php echo get_site_url(); ?>/wp-content/themes/hdt/assets/img/twitter-icon.png"/></a>
	<?php endif; ?>

	</p>

<?php endif; ?>

<?php endif; ?>