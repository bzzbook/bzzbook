<!DOCTYPE html>
<?php
$session_data = $this->session->userdata('logged_in');
?>
<html lang="en"><head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>BzzBook CREATE A BUZZ WITH YOUR BZZINESS</title>

<!-- Bootstrap -->

<link href="<?php echo base_url(); ?>css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>css/animate.min.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>css/style.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>css/responsive.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>css/lightbox.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>css/uploadfile.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>css/datepicker.css" rel="stylesheet">
<link rel="stylesheet" href="<?php echo base_url(); ?>css/jqtransform.css" type="text/css" media="all"/>
<link rel="stylesheet" href="<?php echo base_url(); ?>css/fbphotobox.css" type="text/css"/>
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.3/themes/smoothness/jquery-ui.css" />
<link href="<?php echo base_url(); ?>css/font-awesome.min.css" rel="stylesheet">
<link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">

<style type='text/css'>
a.previous { display: none; }



#inbox-message tr { display: none; }

#inbox-message tr:nth-child(-n+2) { display: table-row; }
</style>
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="js/html5shiv.min.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<header>
  <section class="container">
    <figure class="col-lg-3 col-md-3 col-sm-4 col-xs-12 animate-plus" data-animations="pulse"  data-animation-when-visible="true"  data-animation-reset-offscreen="true"><a href="<?php echo base_url();?>" ><img src="<?php echo base_url(); ?>images/logo.png" alt="" /></a></figure>
    <div class="col-lg-6 col-md-6 col-sm-4 col-xs-12 search">
      <div class="menuSearch">
	<div class="menuComponent" id="mainTopSearchBar">
	<a href="#" class="menuBtn" id="dropBtn" onClick="document.getElementById('suggesstion-box').style.display='none'"><span><i></i></span></a>
    <div class="dropBlock" id="dropBlock">
    	<ul>
        	<li class="all active" onClick="changeSearchPlaceholder('Search jobs,companies,event,members here...')"><span><i></i>All</span></li>
            <li class="jobs" onClick="changeSearchPlaceholder('Search jobs here...','jobs')"><span><i></i>Jobs</span></li>
            <li class="companies" onClick="changeSearchPlaceholder('Search companies here...','companies')"><span><i></i>Companies</span></li>
            <li class="events" onClick="changeSearchPlaceholder('Search Events here...','events')"><span><i></i>Events</span></li>
            <li class="members" onClick="changeSearchPlaceholder('Search Members here...','members')"><span><i></i>Members</span></li>
        </ul>
    </div>
    <div class="searchBar"><input id="header-search" type="search" placeholder="Search jobs,companies,event,members here..."  /> <input type="hidden" id="specific-search" /><div id="suggesstion-box"></div></div>
    <button class="searchBtnNew" id="sidebar_settings">FIND</button>
    </div>
</div>

<!--This is old search drop down
-->
<!--<div class="input-group"> <span class="input-group-btn align-top">
        <input type="button" value="" role="button"  class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" id="drop2" onClick="document.getElementById('suggesstion-box').style.display='none'">
       <?php /*?> <ul aria-labelledby="drop2" role="menu" class="dropdown-menu">
          <li><a href="<?php echo base_url(); ?>customer/search_job" tabindex="-1" role="menuitem">Jobs</a></li>
          <li><a href="<?php echo base_url(); ?>customer/search_company" tabindex="-1" role="menuitem">Companies</a></li>
          <li><a href="<?php echo base_url(); ?>customer/search_event" tabindex="-1" role="menuitem">Events</a></li>
          <li><a href="<?php echo base_url(); ?>customer/search_member" tabindex="-1" role="menuitem">Members</a></li>
        </ul><?php */?>
         <ul aria-labelledby="drop2" role="menu" class="dropdown-menu">
          <li><a href="javascript:void(0)" onClick="changeSearchPlaceholder('Search jobs here...','jobs')" tabindex="-1" role="menuitem">Jobs</a></li>
          <li><a href="javascript:void(0)" onClick="changeSearchPlaceholder('Search companies here...','companies')" tabindex="-1" role="menuitem">Companies</a></li>
          <li><a href="javascript:void(0)" onClick="changeSearchPlaceholder('Search Events here...','events')" tabindex="-1" role="menuitem">Events</a></li>
          <li><a href="javascript:void(0)" onClick="changeSearchPlaceholder('Search Members here...','members')" tabindex="-1" role="menuitem">Members</a></li>
        </ul>
        </span>
        <input id="header-search" type="search" placeholder="Search jobs,companies,event,members here......" class="form-control">
        <input type="hidden" id="specific-search" />
        <div id="suggesstion-box"></div>
        <div class="find"><a id="sidebar_settings">Find</a></div>
      </div>-->


    </div>
    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
      <div class="curentUser">
      <?php  $image = $this->profile_set->get_profile_pic(); ?>
        <div class="userImg">
         <img class="headeruserimg" src="<?php echo base_url();?>uploads/<?php if(!empty($image[0]->user_img_thumb)) echo $image[0]->user_img_thumb; else echo 'default_profile_pic.png'; ?>" alt=""> 
        </div>
        <a href="#" role="button"  class="dropdown-toggle userName" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Logged in as:<span><?php echo  $session_data['email']; ?></span></a>
        <ul  role="menu" class="dropdown-menu">
          <li><a href="<?php echo base_url(); ?>signg_in/sign_out" tabindex="-1" role="menuitem">Logout</a></li>
        </ul>
      </div>
    </div>
  </section>
</header>