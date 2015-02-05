<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>BzzBook CREATE A BUZZ WITH YOUR BZZINESS</title>

<!-- Bootstrap -->
<link href="<?php echo base_url(); ?>css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>css/animate.min.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>css/landing.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>css/responsive.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>css/datepicker.css" rel="stylesheet">
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="js/html5shiv.min.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<header>
  <figure class=" animate-plus" data-animations="pulse"  data-animation-when-visible="true"  data-animation-reset-offscreen="true"><a href="#"><img src="<?php echo base_url(); ?>images/lp+logo.png" alt=""></a></figure>
</header>
<section class="midbody">
  <div class="container">
    <h2>Create a <em>Buzz</em> <span>with Your</span></h2>
    <h3>Bussiness <span>with the future of</span> <em>social media!</em></h3>
    <div class="col-md-5 col-sm-5 col-xs-12 leftCol">
      <div class="lp_video">
        <video width="" height="" controls >
          <source src="http://bzzbook.com/videos/intro.mp4" type="video/mp4">
          <source src="http://bzzbook.com/videos/intro.ogv" type="video/ogg">
          Your browser does not support HTML5 video. </video>
      </div>
      <p>Begin today with a better way to connect with friends, colleagues, and customers. Make Bzzbook your one stop shop for all your social media needs. Sign up today and be a part of the future of social media.</p>
      <figure><img src="<?php echo base_url(); ?>images/comingsoon.png" alt=""></figure>
    </div>
    <div class="col-md-6 col-sm-6 col-xs-12 rightCol pull-right">
      <div class="signupToday">
        <h5>Sign Up Today!</h5>
        <?php
  			
  		    echo validation_errors();
 			
		?>
        <form name="sign_up_form" id="sign_up" method="post" action="<?php echo base_url(); ?>index.php/sign_up_controller/sign_up">
          <div class="field col-md-6">
            <input type="text" class="form-control" data-rule-required="true" data-msg-required="pleas enter your first name"     
            name="firstname" placeholder="First Name" >
          </div>
          <div class="field col-md-6">
            <input type="text" class="form-control" data-rule-required="true"  data-msg-required="pleas enter your last name" 
            name="lastname" placeholder="Last Name" >
          </div>
          <div class="field col-md-12">
            <input type="text" class="form-control"  data-rule-required="true" data-msg-required="pleas enter your email" 
            data-rule-email="true" data-msg-email="Please enter a valid email address" name="email" placeholder="E-mail" >
          </div>
          <div class="field col-md-12">
            <input type="tel" class="form-control" data-rule-required="true" data-msg-required="pleas enter your phone number" 
            name="phone_number" placeholder="Phone Number" >
          </div>
          <div class="field col-md-12">
            <input type="password" class="form-control" data-rule-required="true" data-msg-required="pleas enter your password" 
            name="new_password" placeholder="New Password" >
          </div>
          <div class="field col-md-12 dob">
            <label>Birthday</label>
            <div data-date-viewmode="years" data-date-format="dd-mm-yyyy" data-date="12-02-2012" id="dpYears" 
            class="input-group-bt date">
              <input type="text" name="birthdate" value="12-02-2012" size="16" class="form-control">
              <span aria-hidden="true" class="add-on glyphicon glyphicon-calendar"></span> </div>
          </div>
          <p>Why do I need to provide my birthday?</p>
          <div class="filed rdbtns">
            <label class="checkbox-inline">
              <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="male" checked="checked">
              Male </label>
            <label class="checkbox-inline">
              <input type="radio" name="inlineRadioOptions" id="inlineRadio3" value="female" >
              Female </label>
          </div>
          <p>By clicking Sign Up, you agree to our Terms and that you have read our Data Use Policy</p>
          <div class="sbButtons">
            <input type="submit" value="Sign Up Now">
          </div>
        </form>
      </div>
    </div>
  </div>
  </div>
</section>
<footer>Bzzbook &copy; 2015 English (US)</footer>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
<script src="<?php echo base_url(); ?>js/jquery-1.11.1.min.js"></script> 
<!-- Include all compiled plugins (below), or include individual files as needed --> 
<script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script> 
<script src="<?php echo base_url(); ?>js/animate-plus.min.js"></script> 
<script src="<?php echo base_url(); ?>js/bootstrap-datepicker.js"></script> 
<script src="<?php echo base_url(); ?>js/jquery.validate.min.js"></script>
<script src="<?php echo base_url(); ?>js/additional-methods.js"></script> 
<!--<script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script> -->
<script type="text/javascript">
		$( document ).ready(function() {
			$('#dpYears').datepicker();
		});
	</script>
 <script type="text/javascript">
   $('#sign_up').validate();
	</script>
</body>
</html>