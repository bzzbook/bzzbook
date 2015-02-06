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
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
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
        <h5>Company Sign Up..</h5>
        <form>
          <div class="field col-md-6">
            <input type="text" class="form-control" placeholder="Company Name">
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
          <select name="industry" class="form-control">
                 <option value="none" selected="selected">Established Year</option>
				 <?php foreach($industry as $industries):?>
                 <option value="<?php echo $industries->lookup_value ?>"><?php echo $industries->lookup_value ?></option>
                 <?php endforeach;?> 
                 </select>  
         </div>
         <div class="field col-md-6">
             <select id="select23"  class="form-control">
                     <option selected="selected">Collegues</option>
                     <option value="10">1 - 10</option>
                     <option value="25">10 - 25</option>
                     <option value="50">25 - 50</option>
                     <option value="100">50 - 100</option>
                     <option value="100">100+</option>
             </select>
         </div> 
          <div class="field col-md-6">
            <input type="email" class="form-control" placeholder="E-mail">
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
         <input type="text" id="country" class="form-control"  placeholder="Country" name="country">
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
          <input type="text" class="form-control" placeholder="Postal Code"/>
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
<script src="<?php echo base_url(); ?>js/contryscript.js"></script>

    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<script type="text/javascript">
		$( document ).ready(function() {
			$('#dpYears').datepicker();
		});
	</script>

</body>
</html>