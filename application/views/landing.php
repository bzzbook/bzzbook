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
  <figure class=" animate-plus" data-animations="pulse"  data-animation-when-visible="true"  data-animation-reset-offscreen="true"><a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>images/lp+logo.png" alt=""></a></figure>
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
        <span style="color:#F00; padding:0 0 0 16px">
        	<?php if($this->session->flashdata('success')){ 
				echo $this->session->flashdata('success');
			}else if($this->session->flashdata('logout')){
				echo $this->session->flashdata('logout');
			}?>
            
        </span>
        <?php echo validation_errors(); ?>
        <form name="sign_up_form" id="sign_up" method="post" action="<?php echo base_url(); ?>sign_up/sign_up">
          <div class="field col-md-6">
            <input type="text" class="form-control" data-rule-required="true" data-msg-required="please enter your first name"     
            name="firstname" placeholder="First Name" >
          </div>
          <div class="field col-md-6">
            <input type="text" class="form-control" data-rule-required="true"  data-msg-required="please enter your last name" 
            name="lastname" placeholder="Last Name" >
          </div>
          <div class="field col-md-12">
            <input type="text" class="form-control"  data-rule-required="true" data-msg-required="please enter your email" 
            data-rule-email="true" data-msg-email="please enter a valid email address" name="email" placeholder="E-mail" >
          </div>
          <div class="field col-md-12">
            <input type="tel" class="form-control" data-rule-required="true" data-msg-required="please enter your phone number" 
            name="phone_number" placeholder="Phone Number" >
          </div>
          <div class="field col-md-12">
            <input type="password" class="form-control" data-rule-required="true" data-msg-required="please enter your password" 
            name="new_password" placeholder="New Password" >
          </div>
          <div class="field col-md-12 dob">
            <label>Birthday</label>
            <div data-date-viewmode="years" data-date-format="dd-mm-yyyy" data-date="12-02-2012" id="dpYears" 
            class="input-group-bt date">
              <input type="text" readonly name="birthdate" value="12-02-2012" size="16" class="form-control">
              <span aria-hidden="true" class="add-on glyphicon glyphicon-calendar"></span> </div>
          </div>
          <p>Why do I need to provide my birthday?</p>
          <div class="filed rdbtns">
            <label class="checkbox-inline">
              <input type="radio" name="gender" id="inlineRadio2" value="male" checked="checked">
              Male </label>
            <label class="checkbox-inline">
              <input type="radio" name="gender" id="inlineRadio3" value="female" >
              Female </label>
          </div>
          <p>Lorem ipsum dolor sit amet, at choro omnium partiendo qui, nec nulla voluptua ex, te homero dissentiunt usu. Et vis latine epicuri voluptaria, <a href="#">posse veniam legimus eu ius</a>. Odio albucius ne vis, nec ad scaevola philosophia. Vide nominavi</p>
          <div class="sbButtons">
            <input type="submit" value="Sign Up Now">
            <br>
            <br>
            <div
 				 class="fb-like"
 				 data-share="true"
 				 data-width="450"
  				 data-show-faces="true">
			</div>
          </div>
        </form>
      </div>
    </div>
  </div>
  </div>
</section>
<footer>Bzzbook &copy; 2015 English (US)</footer>
<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '941215722569031',
      xfbml      : true,
      version    : 'v2.2'
    });
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&appId=941144209242849&version=v2.0";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>
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