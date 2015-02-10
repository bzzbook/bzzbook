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
    <figure class="col-lg-3 col-md-3 col-sm-4 col-xs-12 animate-plus" data-animations="pulse"  data-animation-when-visible="true"  data-animation-reset-offscreen="true"><a href="#"><img src="<?php echo base_url(); ?>images/logo.png" alt=""></a></figure>
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
if (isset($message_display)) {
echo "<div class='message'>";
echo $message_display;
echo "</div>";
}
?>
        <form action="<?php echo base_url(); ?>index.php/sign_in_controller/db_check_login" method="post">
          <div class="field">
            <label>Email</label>
            <input type="text" class="form-control" data-rule-required="true" data-msg-required=" please enter your email"  		       			 data-rule-email="true" data-msg-email="please enter a vallid email" placeholder="Enter email Here" name="email" >
            <?php echo form_error('email'); ?>
          </div>
          <div class="field">
            <label>Password</label>
            <input type="password" class="form-control" data-rule-required="true" data-msg-required="please enter password"  			    			   placeholder="Password" name="password">
            <?php echo form_error('password'); ?>
          </div>
          <div class="submit">
            <input type="submit" value="Login" >
          </div>
          
        </form>
       
      </div>
       
    </section>
  </section>
</header>
<section class="banner">
  <div class="container">
    <div class="col-md-6 col-sm-8 col-xs-12 pull-right">
      <div class="title">
        <h2>Create a <span>Buzz</span> </h2>
        <h3>with Your <span>Bussiness</span></h3>
        <h4>with the future of <span>social media!</span></h4>
      </div>
      <div class="signupToday">
        <h2>Sign Up Today <span>&amp; See what all the <em>Bzz</em> is about!</span></h2>
        <p>Begin today with a better way to connect with friends, colleagues, and customers. Make Bzzbook your one stop shop for all your social media needs. Sign up today and be a part of the future of social media. </p>
        <div class="rgButtons">
          <div class="button"> <span>Are you a person?</span> <a href="#">Sign Up Now</a> </div>
          <div class="button"> <span>Are you a Business?</span> <a href="#">Sign Up Now</a> </div>
        </div>
        <div class="fb"><img src="<?php echo base_url(); ?>images/test_fb.png" alt=""></div>
      </div>
    </div>
  </div>
</section>
<section class="aboutBzz container">
  <div class="block1">
    <div class="col-md-6">
      <div id="video_player" class="flowplayer" >
        <video width="" height="" controls>
           <source src="http://bzzbook.com/videos/intro.mp4" type="video/mp4">
          <source src="http://bzzbook.com/videos/intro.ogv" type="video/ogg">
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
<script type="text/javascript">
$(function(){
  $(".message").delay('slow').fadeOut();
});
</script>
</body>
</html>