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
  <figure class=" animate-plus" data-animations="pulse"  data-animation-when-visible="true" data-animation-reset-offscreen="true"><a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>images/lp+logo.png" alt=""></a></figure>
</header>
<section class="midbody">
  <div class="container">
    <h2>Create a <em>Buzz</em> <span>with Your</span></h2>
    <h3>Bussiness <span>with the future of</span> <em>social media!</em></h3>
    <div class="col-md-12 col-sm-12 col-xs-12 rightCol pull-right">
      <div class="signupToday">
        <h5>Company Sign Up..</h5>
        <?php echo validation_errors(); ?>
        <?php if($this->session->flashdata('comp_success')){ 
				echo $this->session->flashdata('comp_success');
			}?>
        <form method="post" name="comp_sign_up" id="comp_sign_up" 
        action="<?php echo base_url(); ?>company/comp_sign_up" autocomplete="on">
          <div class="field col-md-6">
            <input type="text" name="company_name" class="form-control" placeholder="Company Name" 
             data-rule-required="true"  data-msg-required="please enter your company name">
          </div>
         <div class="field col-md-6">
          <select name="industry" class="form-control"  data-rule-required="true" 
          data-msg-required="please enter your industry name">
                 <option value="">Industry</option>
				 <?php foreach($industry as $industries):?>
                 <option value="<?php echo $industries->lookup_value ?>"><?php echo $industries->lookup_value ?></option>
                 <?php endforeach;?> 
                 </select>  
         </div> 
          <div class="field col-md-6 dob">
            <div data-date-viewmode="years" data-date-format="yyyy-mm-dd" data-date="2012-02-12" id="dpYears" 
                class="input-group-bt date">
              <input type="text" name="established_year" size="16" class="form-control" 
              placeholder="Established Since" data-rule-required="true" 
              data-msg-required="please enter established Year">
              <span aria-hidden="true" class="add-on glyphicon glyphicon-calendar"></span> 
              </div>
          </div>
         <div class="field col-md-6">
             <select name="collegues" class="form-control" data-rule-required="true" 
              data-msg-required="please select collegues">
                     <option value="">Collegues</option>
                     <option value="10">1 - 10</option>
                     <option value="25">10 - 25</option>
                     <option value="50">25 - 50</option>
                     <option value="100">50 - 100</option>
                     <option value="125">100+</option>
             </select>
         </div> 
          <div class="field col-md-6">
            <input type="email" name="email" class="form-control" placeholder="E-mail" data-rule-required="true" 
            data-msg-required="please enter your E-mail"  data-rule-email="true" 
            data-msg-email="please enter a valid email address">
          </div>
           <div class="field col-md-6">
            <input type="text" name="user_name" class="form-control" placeholder="User Name" data-rule-required="true" 
            data-msg-required="please enter your user name">
          </div>
          <div class="field col-md-6">
            <input type="password" name="password" id="password" class="form-control" placeholder="Password"  
            data-rule-required="true" 
            data-msg-required="please enter your password">
          </div>
          <div class="field col-md-6">
            <input type="password"  name="conf_password" class="form-control" placeholder="Re-enter Password"  
            data-rule-required="true" 				 	
            data-msg-required="please Re-enter password" data-rule-equalto="#password" 
            data-msg-equalto="Re-entered password should match with password">
          </div>
          <div class="field col-md-6">
           <select class="form-control" onchange="print_state('state',this.selectedIndex);" id="country" name ="country">
			<option value="">Select Country</option>
			</select> 
         </div> 
          <div class="field col-md-6">
           <select name="state" id="state" class="form-control" data-rule-required="true" 
           data-msg-required="please enter state">
           <option value="">Select State</option>
           </select>
         </div> 
          <div class="field col-md-6">
          <input type="text" name="city" class="form-control" placeholder="City" data-rule-required="true" 
          data-msg-required="please enter city">
          </div>
          <div class="field col-md-6">
          <input type="text"  name="postal_code" class="form-control" placeholder="Postal Code" data-rule-required="true" 
          data-msg-required="please enter postal code"/>
          </div>
        
         <div class="field col-md-12">                       
             <textarea class="form-control" name="about_company" placeholder="About Company.."
             data-rule-required="true" data-msg-required="please enter about company"></textarea>
         </div>
         
         <div class="field col-md-6">
         <input type="checkbox" name="agree" value="agree" data-rule-required="true" 
             data-msg-required="please accept terms & conditions"/> By joining Bzzbook, you agree to Bzzbook&#39;s 
                User Agreement, Privacy Policy and Cookie Policy.
           </div>
           <br/>
             <div class="field col-md-12">
          <div class="sbButtons">
            <input type="submit" value="Sign Up Now">
          </div>
          <div class="sbButtons">
          <a href="javascript:window.history.go(-1);">
            <input type="button" value="Back">
            </a>
          </div>
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
<script src ="<?php echo base_url(); ?>js/countries.js"></script>
<script type="text/javascript">
		$( document ).ready(function() {
			$('#dpYears').datepicker();
		});
	</script>
<script language="javascript">print_country("country");</script>  
<script type="text/javascript">
   $('#comp_sign_up').validate();
</script>
</body>
</html>