<!DOCTYPE html>
<?php
$session_data = $this->session->userdata('logged_in');
$result = $this->profile_set->get_userinfo($user_id = '');
 $name = $result[0]['user_firstname']." ".$result[0]['user_lastname'];
 $companies = $this->companies->get_mn_cmp_list();
?>
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
<link href="<?php echo base_url(); ?>css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="<?php echo base_url(); ?>css/fbphotobox.css" type="text/css" />
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.3/themes/smoothness/jquery-ui.css" />
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="js/html5shiv.min.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
</head>
<body id="companyPf">
<header>
  <section class="container">
    <figure class="col-lg-3 col-md-3 col-sm-4 col-xs-12 animate-plus" data-animations="pulse"  data-animation-when-visible="true"  data-animation-reset-offscreen="true"><a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>images/logo.png" alt=""></a></figure>
    <div class="col-lg-6 col-md-6 col-sm-4 col-xs-12 search">
      <div class="input-group"> <span class="input-group-btn">
        <input type="button" value="" role="button"  class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" id="drop2">
        <ul aria-labelledby="drop2" role="menu" class="dropdown-menu" id="searchbar_category">
          <li id="jobs"><a href="#" tabindex="-1" role="menuitem">Jobs</a></li>
          <li id="companies"><a href="#" tabindex="-1" role="menuitem">Companies</a></li>
          <li id="events"><a href="#" tabindex="-1" role="menuitem">Events</a></li>
          <li id="memberes"><a href="#" tabindex="-1" role="menuitem">Members</a></li>
        </ul>
        </span>
        <input type="search" placeholder="Search Here......" class="form-control" id="cmp_header_searchbar">
        <div class="find"><a href="#">Find</a></div>
      </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
      <div class="curentUser">
         <?php  $image = $this->profile_set->get_profile_pic();	?>
        <div class="userImg"> <img src="<?php echo base_url();?>uploads/<?php if(!empty($image[0]->user_img_thumb)) echo $image[0]->user_img_thumb; else echo 'default_profile_pic.png'; ?>" alt="<?php echo base_url();?>uploads/<?php if(!empty($image[0]->user_img_thumb)) echo $image[0]->user_img_thumb; else echo 'default_profile_pic.png'; ?>"> </div>
        <a href="#" role="button"  class="dropdown-toggle userName" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><span><?php echo $name; ?></span></a>
        <ul  role="menu" class="dropdown-menu">
        <li><a href="<?php echo base_url(); ?>profile" tabindex="-1" role="menuitem" title="user profile"><i class="fa fa-user"> </i> 
<?php echo $name ?></a></li>
        <?php foreach($companies as $cmp):?>
        <li>
<a href="<?php echo base_url(); ?>company/company_disp/<?php echo $cmp->companyinfo_id ?>" tabindex="-1" role="menuitem" title="company profile"><i class="fa fa-building-o"> </i> <?php echo $cmp->cmp_name ?></a></li>
		<?php endforeach;?>
       <?php /*?> <li><a href="<?php echo base_url(); ?>company/create_page/<?php echo $cmp->companyinfo_id ?>" tabindex="-1" role="menuitem"><i class="fa fa-plus"> </i> 
Create Page</a></li><?php */?>
          <li><a href="<?php echo base_url(); ?>signg_in/sign_out" tabindex="-1" role="menuitem">Logout</a></li>
        </ul>
      </div>
    </div>
  </section>
</header>