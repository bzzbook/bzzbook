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
    <div class="col-md-12 col-sm-12 col-xs-12 rightCol pull-right">
      <div class="signupToday">
        <h5>Customer Sign Up..</h5>
        <form>
          <div class="field col-md-6">
            <input type="text" class="form-control" placeholder="First Name">
          </div>
          <div class="field col-md-6">
            <input type="text" class="form-control" placeholder="Last Name">
          </div>
          <div class="field col-md-6">
            <input type="email" class="form-control" placeholder="E-mail">
          </div>
          <div class="field col-md-6">
            <input type="tel" class="form-control" placeholder="Phone Number">
          </div>
           <div class="field col-md-6">
            <input type="text" class="form-control" placeholder="User Name">
          </div>
          <div class="field col-md-6">
            <input type="password" class="form-control" placeholder="Password">
          </div>
          <div class="field col-md-6">
            <input type="password" class="form-control" placeholder="Re-enter Password">
          </div>
          <div class="field col-md-6">
          <select name="state" class="form-control" required="required">
                 <option value="" selected="selected">State</option>
                 <?php foreach($records as $record):?>
                 <option value="<?php echo $record->lookup_value ?>"><?php echo $record->lookup_value ?></option>
                 <?php endforeach;?> 
                 </select>  
          </div>
          <div class="field col-md-6">
          <input type="text" class="form-control" placeholder="City">
          </div>
          <div class="field col-md-6">
          <input type="text" class="form-control" placeholder="Zip Code"/>
          </div>
          <div class="field col-md-6 dob">
            <label>Birthday</label>
            <div data-date-viewmode="years" data-date-format="dd-mm-yyyy" data-date="12-02-2012" id="dpYears" 
            class="input-group-bt date">
              <input type="text" readonly value="12-02-2012" size="16" class="form-control">
              <span aria-hidden="true" class="add-on glyphicon glyphicon-calendar"></span> </div>
         
          <p>Why do I need to provide my birthday?</p>
           </div>
          <div class="filed rdbtns  col-md-6">
            <label class="checkbox-inline">
              <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
              Male </label>
            <label class="checkbox-inline">
              <input type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3">
              Female </label>
          </div>
          <div class="field col-md-6">
          <select name="position" class="form-control">
                <option value="none" selected="selected">Job Type</option>
				<?php foreach($jobtype as $job):?>
                <option value="<?php echo $job->lookup_value ?>"><?php echo $job->lookup_value ?></option>
                <?php endforeach;?> 
                </select> 
          </div>  
          <div class="field col-md-6">
          <select name="industry" class="form-control">
                 <option value="none" selected="selected">Industry</option>
				 <?php foreach($industry as $industries):?>
                 <option value="<?php echo $industries->lookup_value ?>"><?php echo $industries->lookup_value ?></option>
                 <?php endforeach;?> 
                 </select>  
         </div> 
         <div class="field col-md-6">
             <input type="text" name="companyname" class="form-control" placeholder="Company Name" /> 
         </div>
         <div class="field col-md-6">                       
             <textarea class="form-control" name="aboutme" placeholder="About You.."></textarea>
         </div>
         <div class="filed col-md-6">
       
         <input type="checkbox" class="form-control" name="agree" value="agree" />
         
          <div>By joining Bzzbook, you agree to Bzzbook&#39;s 
                User Agreement, Privacy Policy and Cookie Policy.
              
           </div>
         
           </div>
           <br/>
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
<script type="text/javascript">
		$( document ).ready(function() {
			$('#dpYears').datepicker();
		});
	</script>
</body>
</html>