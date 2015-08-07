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
<link href="<?php echo base_url(); ?>css/style.css" rel="stylesheet">
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
<header class="home">
  <section class="container">
    <figure class="col-lg-3 col-md-3 col-sm-4 col-xs-12 animate-plus" data-animations="pulse"  data-animation-when-visible="true"  data-animation-reset-offscreen="true"><a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>images/logo.png" alt=""></a></figure>
    <section  class="col-lg-7 col-md-7 col-sm-7 col-xs-12 pull-right">
      <div class="userLogin">
<?php
if (isset($logout_message)) {
echo "<div class='message'>";
echo $logout_message;
echo "</div>";
}
?>
<?php
if (isset($activation_success)) {
echo "<div class='message'>";
echo $activation_success;
echo "</div>";
}
?>

<?php
if (isset($message_display)) {
echo "<div class='message'>";
echo $message_display;
echo "</div>";
}
?>
<?php 
	   echo "<div class='message'>";
	   echo $this->session->flashdata('cust_success');
	   echo "</div>";
?> 
<?php 
	   echo "<div class='message'>";
	   echo $this->session->flashdata('email_status');
	   echo "</div>";
?> 
<?php 
	   echo "<div class='message'>";
	   echo $this->session->flashdata('resest_pwd_success');
	   echo "</div>";
?> 
<?php 
	   echo "<div class='message'>";
	   echo $this->session->flashdata('resest_pwd_failure');
	   echo "</div>";
?> 


        <form action="<?php echo base_url(); ?>signg_in/db_check_login" method="post">
          <div class="field">
            <label>Email</label>
            <input type="text" class="form-control"   id="user_email" data-rule-required="true" data-msg-required=" please enter your email"  data-rule-email="true" data-msg-email="please enter a vallid email" placeholder="Enter email Here" name="email" >
            <?php echo form_error('email'); ?>
          </div>
          <div class="field" id="pwd_hide">
            <label>Password</label>
            <input type="password" class="form-control" data-rule-required="true" data-msg-required="please enter password"  placeholder="Password" name="password">
            <?php echo form_error('password'); ?>
          </div>
          <div class="submit">
            <input type="submit" id="sign_in_btn" value="Login" >
          </div>
          
        </form>
        
           <div class="submit" id="getmail" style="display:none">
            <input type="submit" id="forgot_pwd_req" value="Submit" >
          </div>
      
      </div>
      <div id="error_data">
      </div>
       <?php 
	   echo "<div class='message'>";
	   echo $this->session->flashdata('error');
	   echo "</div>";
	    ?> 
           <?php 
	   echo "<div class='message'>";
	   echo $this->session->flashdata('reset_success');
	   echo "</div>";
	    ?> 
        
     
        <a id="forgotpwd" style="font-size:13px; padding-left:412px;" >Forgot Password</a>
        <a id="sign_in" style="font-size:13px; padding-left:205px; display:none;" >Sign in</a>
    </section>
  </section>
</header>
<section class="banner">
  <div class="container">
    <div class="col-md-6 col-sm-8 col-xs-12 pull-right rightCol">
      <div class="title">
        <h2>Create a <span>Buzz</span> </h2>
        <h3>with Your <span>Business</span></h3>
        <h4>with the future of <span>social media!</span></h4>
      </div>
      <div class="signupToday" id="hide_signup">
        <h2>Sign Up Today <span>&amp; See what all the <em>Bzz</em> is about!</span></h2>
        <p>Begin today with a better way to connect with friends, colleagues, and customers. Make Bzzbook your one stop shop for all your social media needs. Sign up today and be a part of the future of social media. </p>
        <div class="rgButtons">
          <div class="button"> <span>Are you a person?</span> <a id="cust_signup" href="javascript:void(0);<?php /*?><?php echo base_url(); ?>customer/sign_up<?php */?>">Sign Up Now</a> </div>
          <div class="button"> <span>Are you a Business?</span> <a href="<?php echo base_url(); ?>company/sign_up">Sign Up Now</a> </div>
        </div>
        <div class="fb"><img src="<?php echo base_url(); ?>images/test_fb.png" alt=""></div>
      </div>
      
      <div class="custsignupToday" id="show_signup" style="display:none">
        <h5>Sign Up Today!</h5>
        <span style="color:#F00; padding:0 0 0 16px">
        	<?php if($this->session->flashdata('success')){ 
				echo $this->session->flashdata('success');
			}else if($this->session->flashdata('signout')){
				echo "<div class='message'>";
				echo $this->session->flashdata('signout');
				echo "</div>";
			}?>
            
        </span>
        <?php echo validation_errors(); ?>
        <div id="signup_validation"></div>
        <form name="sign_up_form" id="sign_up" method="post" action="<?php echo base_url(); ?>customer/cust_sign_up">
          <div class="field col-md-6">
            <input type="text" class="form-control" data-rule-required="true" data-msg-required="please enter your first name"     
            name="firstname" id="firstname" placeholder="First Name" >
          </div>
          <div class="field col-md-6">
            <input type="text" class="form-control" data-rule-required="true"  data-msg-required="please enter your last name" 
            name="lastname" placeholder="Last Name" id="lastname" >
          </div>
          <div class="field col-md-6">
            <input type="tel" class="form-control" data-rule-required="true" data-msg-required="please enter your Username" 
            name="user_name" id="user_name" placeholder="User name" >
            
          </div>
       
         
          <div class="field col-md-6">
            <input type="text" class="form-control"  data-rule-required="true" data-msg-required="please enter your email" 
            data-rule-email="true" data-msg-email="please enter a valid email address" name="email" id="email" placeholder="E-mail" >
          </div>
              <div class="user_unique_error col-md-12"></div>
          <div class="field col-md-6">
            <input type="tel" class="form-control" data-rule-required="true" data-msg-required="please enter your phone number" 
            name="phone_number" id="phone_number" placeholder="Phone Number" >
          </div>
          
          <div class="field col-md-6">
            <input type="password" class="form-control" data-rule-required="true" data-msg-required="please enter your password" 
            name="password" id="password" placeholder="Password" >
          </div>
          <div class="field col-md-6 dob">
            <div data-date-viewmode="years" data-date-format="dd-mm-yyyy" data-date="12-02-2012" id="dateYears" 
            class="input-group-bt date">
              <input type="text" name="dob" placeholder="dd-mm-yyyy" size="16" class="form-control" data-rule-required="true" data-msg-required="please enter your Birth date" >
              <span aria-hidden="true" class="add-on glyphicon glyphicon-calendar"></span> </div>
          </div>
          <!--<p>Why do I need to provide my birthday?</p> -->
          <div class="row"> 
          <div clas="col-md-6">
          <div class="filed rdbtns col-md-6">
            <label class="checkbox-inline">
              <input type="radio" name="gender" id="inlineRadio2" value="m" checked="checked">
              Male </label>
            <label class="checkbox-inline">
              <input type="radio" name="gender" id="inlineRadio3" value="f" >
              Female </label>
          </div>
          </div>
          <div class="col-md-6">
            <div class="sbButtons field col-md-6">
            <input type="submit" value="Sign Up Now">
           </div>
           </div>
          </div>
          <p>Lorem ipsum dolor sit amet, at choro omnium partiendo qui, nec nulla voluptua ex, te homero dissentiunt usu. Et vis latine epicuri voluptaria, <a href="#">posse veniam legimus eu ius</a>. Odio albucius ne vis, nec ad scaevola philosophia. Vide nominavi</p>
        
        </form>
      </div>
      
      
      
    </div>
  </div>
</section>
<section class="aboutBzz container">
  <div class="block1">
    <div class="col-md-6">
      <div id="video_player" class="flowplayer" >
        <video width="" height="" controls>
           <source src="<?php echo base_url(); ?>videos/intro.mp4" type="video/mp4">
          <source src="<?php echo base_url(); ?>videos/intro.ogv" type="video/ogg">
          Your browser does not support HTML5 video. </video>
      </div>
    </div>
    <div class="col-md-6">
      <h3>What is <span>Bzz</span>Book</h3>
    </div>
    <div class="clear"></div>
  </div>
  <div class="block2">
    <h4><span>A Little More About <em>Bzzbook!</em></span></h4>
    <p>Bzzbook has several benefits.  It was created to make relationships between businesses, customers, colleagues, and friends easier than ever before. From a businesses perspective it will allow you to do the three main things that every business wants to do, with ease. 1) Attract customers. 2) Hire 3) Communicate within your business, privately. If you join Bzzbook as a member, whether it be as a colleague, customer or friend you will find that Bzzbook keeps you in the loop.  Here are some of the many things you will be able to do... Follow your favorite businesses, Find a job, Communicate amongst the company you work for, communicate with a company that you recently did business with, quickly find a list of businesses near you that specialize in something you may need.  Join Bzzbook and see… the possibilities are endless.</p>
  </div>
</section>
<section class="howWorks">
  <div class="container">
    <h3>How It <span>Works!</span></h3>
    <div class="col-md-4"><img src="<?php echo base_url(); ?>images/step1.png" alt=""></div>
    <div class="col-md-4"><img src="<?php echo base_url(); ?>images/step2.png" alt=""></div>
    <div class="col-md-4"><img src="<?php echo base_url(); ?>images/step3.png" alt=""></div>
    <div class="col-md-12 step"><img src="<?php echo base_url(); ?>images/step4.png" alt=""></div>
    <div class="col-md-12"><img src="<?php echo base_url(); ?>images/step5.png" alt=""></div>
  </div>
</section>
<section class="whyBzz container">
  <h3>WHY <span>BZZ</span>Book</h3>
  <h4><span>More about why <em>Bzzbook</em> is right for you and your company!</span></h4>
  <p> Over the past decade social media has grown tremendously. Each social media network specialized in something specific that changed the way we communicate with one another. Facebook allowed you to socialize with friends, Google provided a search engine, Twitter made tweeting popular, and Linked in focused more on businesses.  Wouldn't it be nice if you could do all of these things at one place? Now you can! Bzzbook's plan is to be a one stop shop of social media. A way to communicate with business colleagues and friends on the same social media platform without one interfering with the other.  Welcome to the world of Bzzbook. . . the future of social media. </p>
</section>
<footer class="home">
  <h3>Create a “<em>Buzz</em>” with your business...<span>with the future of social media!</span></h3>
  <figure><img src="<?php echo base_url(); ?>images/hm_footer_icons.png" alt=""></figure>
</footer>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
<script src="<?php echo base_url(); ?>js/jquery-1.11.1.min.js"></script> 
<!-- Include all compiled plugins (below), or include individual files as needed --> 
<script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script> 
<script src="<?php echo base_url(); ?>js/animate-plus.min.js"></script> 
<script src="<?php echo base_url(); ?>js/custom.js"></script>
<script src="<?php echo base_url(); ?>js/jquery.validate.min.js"></script>
<script src="<?php echo base_url(); ?>js/additional-methods.js"></script>
<script src="<?php echo base_url(); ?>js/bootstrap-datepicker.js"></script>
<script type="text/javascript">
		$( document ).ready(function() {
			$('#dateYears').datepicker();
		});
	</script>
<script type="text/javascript">

$('#sign_up').validate();
$(function(){
  $(".message").fadeOut(6000);
 
});


$('#forgotpwd').click(function() 
{
$('#pwd_hide').hide();
$('#sign_in_btn').hide();
$('#getmail').show();
$(this).hide();
$('#sign_in').show();
});

$('#cust_signup').click(function()
{
	$('#hide_signup').toggle();
	$('#show_signup').toggle();
	
	});
function getback()
{
	$('#hide_signup').toggle();
	$('#show_signup').toggle();
}

$('#sign_in').click(function()
{
	$(this).hide();
	$('#pwd_hide').toggle();
	$('#sign_in_btn').toggle();
	$('#forgotpwd').toggle();
	$('#getmail').toggle();

});
$('#forgot_pwd_req').click(function(){
	usermail = $('#user_email').val();
	var length = usermail.length;
	var errors = '';
	if(usermail == '') 
	{
		$("#error_data").html("Email Shouldn't be empty").fadeOut(7000);
		//location.reload();
	}

	else {
	url="<?php echo base_url(); ?>signg_in/forgetpwd/"+usermail;
		$.ajax({
        type: "POST",
        url: url,
        success: function(data)
        {   
		if(data == false){
    	alert("Please enter valid email Id");
		$('#user_mail').focusin();
		}else{
			
		 url="<?php echo base_url(); ?>signg_in/reset_pwd_sendmail/"+usermail;
	    
		location.replace(url);
			}
			
		},
		cache: false
		});
		
		
	};

});


$('#user_name').focusout(function() {
var username = $('#user_name').val();
if(username == '')
{
	$('.user_unique_error').find('span').remove();
	$('.user_unique_error').append('<span> User Name Shouldn\'t be empty!.. </span>');
}else
{
	$('.user_unique_error').find('span').remove();
	    url = "<?php echo base_url(); ?>signg_in/username_check/"+username;
		$.ajax({
        type: "POST",
        url: url,
        success: function(data)
        {   
		if(data == true){
    	$('.user_unique_error').append('<span>Username already registered, Please enter another Username</span>');
		$('#user_name').focusin();
		}
			
	},
		cache: false
		});
		
}


});


$('#email').focusout(function() {
var user_email = $('#email').val();
if(user_email == '')
{
	$('.user_unique_error').find('span').remove();
	$('.user_unique_error').append('<span> User email Shouldn\'t be empty!.. </span>');
}else
{
	$('.user_unique_error').find('span').remove();
	    url = "<?php echo base_url(); ?>signg_in/user_email_check/"+user_email;
		$.ajax({
        type: "POST",
        url: url,
        success: function(data)
        {   
		if(data == true){
    	$('.user_unique_error').append('<span>This email  already registered, Please enter another email address</span>');
		$('#user_email').focusin();
		}
			
	},
		cache: false
		});
		
}


});

</script>
<?php 
$data = $this->session->flashdata('email_status');
if(!empty($data))
{
	echo "<script> getback(); </script>";
}
?>
</body>
</html>