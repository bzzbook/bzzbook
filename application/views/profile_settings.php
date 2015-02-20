<!DOCTYPE html>
<?php
$session_data = $this->session->userdata('logged_in');
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
    <figure class="col-lg-3 col-md-3 col-sm-4 col-xs-12 animate-plus" data-animations="pulse"  data-animation-when-visible="true"  data-animation-reset-offscreen="true"><a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>images/logo.png" alt=""></a></figure>
    <div class="col-lg-6 col-md-6 col-sm-4 col-xs-12 search">
      <div class="input-group"> <span class="input-group-btn">
        <input type="button" value="" role="button"  class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" id="drop2">
        <ul aria-labelledby="drop2" role="menu" class="dropdown-menu">
          <li><a href="file:///E|/code/Bzzbook-html/h#" tabindex="-1" role="menuitem">Jobs</a></li>
          <li><a href="file:///E|/code/Bzzbook-html/h#" tabindex="-1" role="menuitem">Companies</a></li>
          <li><a href="file:///E|/code/Bzzbook-html/h#" tabindex="-1" role="menuitem">Events</a></li>
          <li><a href="file:///E|/code/Bzzbook-html/h#" tabindex="-1" role="menuitem">Members</a></li>
        </ul>
        </span>
        <input type="search" placeholder="Search Here......" class="form-control">
        <div class="find"><a href="#">Find</a></div>
      </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
      <div class="curentUser">
        <div class="userImg"><img src="<?php echo base_url(); ?>images/user.png" alt=""></div>
        <a href="#" role="button"  class="dropdown-toggle userName" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Logged in as:<span><?php echo  $session_data['email']; ?></span></a>
        <ul  role="menu" class="dropdown-menu">
          <li><a href="<?php echo base_url(); ?>signg_in/sign_out" tabindex="-1" role="menuitem">Logout</a></li>
        </ul>
      </div>
    </div>
  </section>
</header>
<section class="mainNav">
  <div class="container">
    <nav class="navbar navbar-static" id="navbar-example">
      <div class="container-fluid">
        <div class="navbar-header">
          <button data-target=".bs-example-js-navbar-collapse" data-toggle="collapse" type="button" class="navbar-toggle collapsed"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
          <a href="#" class="navbar-brand">Menu</a> </div>
        <div class="collapse navbar-collapse bs-example-js-navbar-collapse">
          <ul class="nav navbar-nav">
            <li> <a  href="<?php echo base_url(); ?>profile/post">Profile</a></li>
            <li> <a  href="<?php echo base_url(); ?>profile/about_me">About Me</a></li>
            <li> <a  href="#">My Friends</a></li>
            <li> <a  href="#">My Photos</a></li>
            <li> <a  href="#">My Business Details</a></li>
            <li> <a  href="#">My Companies</a></li>
          </ul>
          <div class="pull-right viewAs">
            <p>Viewing as:</p>
            <select class="form-control" >
              <optgroup label="Your Personal Profile">
              <option>Jhon Smith</option>
              </optgroup>
              <optgroup label="Your Companies">
              <option data-to-profile-type="Company">Ayatas technologies</option>
              </optgroup>
            </select>
          </div>
        </div>
        <!-- /.nav-collapse --> 
      </div>
      <!-- /.container-fluid --> 
    </nav>
  </div>
</section>
<section class="midbody container">
  <div class="row">
    <section class="col-lg-3 col-md-3 col-sm-4 col-xs-12 coloumn1">
      <aside>
        <div class="profile">
          <div class="img"><img src="<?php echo base_url(); ?>images/user.png" alt=""></div>
          <div class="details">Jhon Smith....<a href="<?php echo base_url(); ?>profile/profile_set">Edit Profile</a><span>Sr. UI Developer at Company</span></div>
          <div class="clear"></div>
        </div>
        <div class="sideNav">
          <ul>
            <li><a href="<?php echo base_url(); ?>profile/message">Messages <span>5</span></a></li>
            <li><a href="#">Buzzers ! <span>20</span></a></li>
            <li><a href="#">My Groups</a></li>
            <li><a href="#">My Jobs</a></li>
            <li><a href="#">My Events</a></li>
            <li><a href="#">My Companies</a></li>
            <li><a href="#">Photos &amp; Videos</a></li>
            <li><a href="#">Favorites</a></li>
          </ul>
        </div>
        <div class="myPhotos">
          <h3>Favorites Board!</h3>
          <ul>
            <li><a href="#"><img src="<?php echo base_url(); ?>images/p1.png" alt=""></a></li>
            <li><a href="#"><img src="<?php echo base_url(); ?>images/p2.png" alt=""></a></li>
            <li><a href="#"><img src="<?php echo base_url(); ?>images/p1.png" alt=""></a></li>
            <li><a href="#"><img src="<?php echo base_url(); ?>images/p2.png" alt=""></a></li>
            <li><a href="#"><img src="<?php echo base_url(); ?>images/p1.png" alt=""></a></li>
            <li><a href="#"><img src="<?php echo base_url(); ?>images/p2.png" alt=""></a></li>
            <li><a href="#"><img src="<?php echo base_url(); ?>images/p1.png" alt=""></a></li>
            <li><a href="#"><img src="<?php echo base_url(); ?>images/p2.png" alt=""></a></li>
            <li><a href="#"><img src="<?php echo base_url(); ?>images/p1.png" alt=""></a></li>
          </ul>
          <div class="clear"></div>
        </div>
        <div class="joinMailList">
          <h3>Invite someone to join!</h3>
         <?php $attributes = array('class' => 'email', 'id' => 'email_invite', 'name' => 'invite_email'); ?>
          <?php echo form_open('customer/send_invite',$attributes) ?>
          <input type="text" class="form-control" placeholder="Email Address"  name="email" placeholder="E-mail"  
          data-rule-required="true" data-msg-required="please enter your email"  
          data-rule-email="true" data-msg-email="please enter a valid email address">
          <input type="submit" class="submit" name="submit" value="Send" >
          <?php echo form_close() ?>
        </div>
      </aside>
      <div class="ad"><img src="<?php echo base_url(); ?>images/ad1.png"></div>
    </section>
    <section class="col-lg-6 col-md-6 col-sm-5 col-xs-12 coloumn2 pfSettings">
      <h2>My Settings</h2>
      <div class="posts">
        <div role="tabpanel"> 
          <!-- Nav tabs -->
          <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#post_board" aria-controls="profile" role="tab" data-toggle="tab">Post Board</a></li>
            <li role="presentation"><a href="#about_me" aria-controls="messages" role="tab" data-toggle="tab">About Me</a></li>
            <li role="presentation"><a href="#business_details" aria-controls="settings" role="tab" data-toggle="tab">Business Details</a></li>
            <li role="presentation"><a href="#privacy" aria-controls="messages" role="tab" data-toggle="tab">Privacy</a></li>
            <li role="presentation"><a href="#notifications" aria-controls="settings" role="tab" data-toggle="tab">Notification</a></li>
          </ul>
          
          <!-- Tab panes -->
          <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="post_board">
              <figure class="pfpic"><span>Profile Pic</span><img src="<?php echo base_url(); ?>images/pf_pic.png" alt=""></figure>
              <div class="upload">
                  <span class="btn btn-success fileinput-button"> <span>Change Picture</span> 
                  <!-- The file input field used as target for the file upload widget -->
                  <input id="fileupload" type="file" name="files[]" multiple>
                  </span>
              </div>
              <h4>Location Info</h4>
              <div class="filed col-md-6">
                <input type="text" class="form-control" placeholder="City">
              </div>
              <div class="filed col-md-6">
                <select class="form-control">
                  <option>test1</option>
                  <option>test2</option>
                  <option>test3</option>
                  <option>test4</option>
                </select>
              </div>
              <div class="filed col-md-6">
                <input type="text" class="form-control" placeholder="Zip Code">
              </div>
              <h4 class="clear">Username Info</h4>
              <div class="filed col-md-6">
                <input type="text" class="form-control" placeholder="Username">
              </div>
              <div class="filed col-md-6">
                <input type="text" class="form-control" placeholder="First Name">
              </div>
              <div class="filed col-md-6">
                <input type="text" class="form-control" placeholder="Last Name">
              </div>
              <div class="filed col-md-6">
                <input type="text" class="form-control" placeholder="Email">
              </div>
              <h4 class="clear">Password Info</h4>
              <div class="filed col-md-6">
                <input type="text" class="form-control" placeholder="Password">
              </div>
              <div class="clear"></div>
              <div class="filed col-md-6">
                <input type="text" class="form-control" placeholder="New Password">
              </div>
              <div class="filed col-md-6">
                <input type="text" class="form-control" placeholder="Confirm">
              </div>
              <h4 class="clear">Job Info</h4>
              <div class="filed col-md-6">
                <input type="text" class="form-control" placeholder="Job Title">
              </div>
              <div class="filed col-md-6">
                <select class="form-control">
                  <option>Industry</option>
                  <option>test2</option>
                  <option>test3</option>
                  <option>test4</option>
                </select>
              </div>
              <div class="filed col-md-6">
                <input type="text" class="form-control" placeholder="Other Industry">
              </div>
              <div class="filed col-md-6">
                <input type="text" class="form-control" placeholder="Company Name">
              </div>
              <div class="filed col-md-6">
                <input type="submit" class="fmbtn" value="Upload Settings">
              </div>
              <div class="clear"></div>
            </div>
            <div role="tabpanel" class="tab-pane" id="about_me">
            	 <h4 class="clear">About Me Info</h4>
              <div class="filed col-md-12">
                <textarea cols="" rows="" class="form-control"></textarea>
                <input type="submit" class="smbtn" value="Save">
              </div>
              <div class="filed col-md-12">
                <textarea cols="" rows="" class="form-control"></textarea>
                <input type="submit" class="smbtn" value="Save">
              </div>
              <div class="filed col-md-12">
                <textarea cols="" rows="" class="form-control"></textarea>
                <input type="submit" class="smbtn" value="Save">
              </div>
               <h4 class="clear">Educational Background</h4>
              <div class="filed col-md-12">
                <input type="submit" class="add" value="add education">
              </div>
              <h4 class="clear">Contact Details</h4>
              <div class="filed col-md-6">
                <input type="text" class="form-control" placeholder="Email">
              </div>
              <div class="filed col-md-6">
                <input type="text" class="form-control" placeholder="Phone">
              </div>
              <div class="filed col-md-6">
                <input type="text" class="form-control" placeholder="Office">
              </div>
              <div class="filed col-md-6">
                <input type="text" class="form-control" placeholder="Fax">
                <input type="submit" class="smbtn" value="Save">
              </div>
              <div class="filed col-md-6">
                <input type="submit" class="fmbtn" value="Upload Settings">
              </div>
              <div class="clear"></div>
            </div>
            <div role="tabpanel" class="tab-pane" id="business_details">
            	 <h4 class="clear">Professional Experience</h4>
              <div class="filed col-md-12">
                <input type="submit" class="add" value="add experience">
              </div>
               <h4 class="clear">Organizations</h4>
              <div class="filed col-md-12">
                <input type="submit" class="add" value="add Organizations">
              </div>
               <h4 class="clear">Groups</h4>
              <div class="filed col-md-12">
                <input type="submit" class="add" value="add Groups">
              </div>
              <div class="clear"></div>
            </div>
            <div role="tabpanel" class="tab-pane" id="privacy">
             	<h4 class="clear">Visibility Settings</h4>
              <div class="radio">
                <label for="notifications">Make my profile visible to non friends:</label>
                <div class="pull-right">
                <label class="radio-inline">
                  <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                  Yes </label>
                <label class="radio-inline">
                  <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                  No </label>
                  </div>
              </div>
              <div class="radio">
                <label for="notifications">Make my comments visible to non friends:</label>
                <div class="pull-right">
                <label class="radio-inline">
                  <input type="radio" name="inlineRadioOptions1" id="inlineRadio1" value="option1">
                  Yes </label>
                <label class="radio-inline">
                  <input type="radio" name="inlineRadioOptions1" id="inlineRadio2" value="option2">
                  No </label>
                  </div>
              </div>
              <div class="radio">
                <label for="notifications">Show my companies that I follow to non friends:</label>
                <div class="pull-right">
                <label class="radio-inline">
                  <input type="radio" name="inlineRadioOptions2" id="inlineRadio1" value="option1">
                  Yes </label>
                <label class="radio-inline">
                  <input type="radio" name="inlineRadioOptions2" id="inlineRadio2" value="option2">
                  No </label>
                  </div>
              </div>
             <div class="filed col-md-12">
                <input type="submit" value="Upload Settings" class="fmbtn">
              </div>
              <div class="clear"></div>
            </div>
            <div role="tabpanel" class="tab-pane" id="notifications">
             <h4 class="clear">Notification Settings</h4>
              <div class="radio">
                <label for="notifications">Send Notifications To My email:</label>
                <div class="pull-right">
                <label class="radio-inline">
                  <input type="radio" name="inlineRadioOptions3" id="inlineRadio1" value="option1">
                  Yes </label>
                <label class="radio-inline">
                  <input type="radio" name="inlineRadioOptions3" id="inlineRadio2" value="option2">
                  No </label>
                  </div>
                <div class="filed col-md-12">
                <input type="submit" class="fmbtn" value="Upload Settings">
              </div>
              <div class="clear"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="col-lg-3 col-md-3 col-sm-3 col-xs-12 coloumn3">
      <aside>
        <div class="pendingRequest">
          <h3>Pending Friend Requests </h3>
          <ul>
            <li>
              <figure><img src="<?php echo base_url(); ?>images/f1.jpg" alt=""></figure>
              <div class="disc">
                <h4>Nicholos smith</h4>
                <div class="dcBtn"><a href="#">Confirm</a><a href="#">Deny</a> </div>
              </div>
            </li>
            <li>
              <figure><img src="<?php echo base_url(); ?>images/f2.jpg" alt=""></figure>
              <div class="disc">
                <h4>Nicholos smith</h4>
                <a href="#">Confirm</a><a href="#">Deny</a> </div>
            </li>
          </ul>
          <a href="#" class="link">View all</a> </div>
        <div class="latestFriends">
          <h3>Latest Friends</h3>
          <ul>
            <li><img alt="" src="<?php echo base_url(); ?>images/fd1.png"><a href="#"><img src="<?php echo base_url(); ?>images/like.png" alt=""></a></li>
            <li><img alt="" src="<?php echo base_url(); ?>images/p2.png"><a href="#"><img src="<?php echo base_url(); ?>images/like.png" alt=""></a></li>
            <li><img alt="" src="<?php echo base_url(); ?>images/fd2.png"><a href="#"><img src="<?php echo base_url(); ?>images/like.png" alt=""></a></li>
            <li><img alt="" src="<?php echo base_url(); ?>images/fd3.png"><a href="#"><img src="<?php echo base_url(); ?>images/like.png" alt=""></a></li>
            <li><img alt="" src="<?php echo base_url(); ?>images/p1.png"><a href="#"><img src="<?php echo base_url(); ?>images/like.png" alt=""></a></li>
            <li><img alt="" src="<?php echo base_url(); ?>images/fd4.png"><a href="#"><img src="<?php echo base_url(); ?>images/like.png" alt=""></a></li>
          </ul>
          <div class="clear"></div>
          <a href="#" class="link">More Friends</a> </div>
        <div class="ad"><img src="<?php echo base_url(); ?>images/ad2.png" alt=""></div>
        <div class="companies">
          <h3>Companies I’m Following! </h3>
          <ul>
            <li>
              <figure><img src="<?php echo base_url(); ?>images/cp1.png" alt=""></figure>
              <div class="content">
                <h4>Ayatas technologies</h4>
                <p><span>Computer Software</span> <span>Established in: 2007</span> <span>Employees: 26</span> </p>
                <a href="#">Like <span>(2)</span></a> <a href="#">Follow <span>(20)</span></a> </div>
            </li>
          </ul>
        </div>
        <div class="ad"><img src="<?php echo base_url(); ?>images/ad2.png" alt=""></div>
        <div class="companies">
          <h3>My Companies </h3>
          <ul>
            <li>
              <figure><img src="<?php echo base_url(); ?>images/cp2.png" alt=""></figure>
              <div class="content">
                <h4>Ayatas technologies</h4>
                <p><span>Computer Software</span> <span>Established in: 2007</span> <span>Employees: 26</span> </p>
                <a href="#">Like <span>(2)</span></a> <a href="#">Follow <span>(20)</span></a> </div>
            </li>
          </ul>
        </div>
      </aside>
    </section>
  </div>
</section>
<footer class="post">
  <ul>
    <li><a hrte>ABOUT US</a></li>
    <li><a href="#">PRIVACY POLICY</a></li>
    <li><a href="#">TERMS OF USE</a></li>
  </ul>
  <p>Bzzbook &copy; 2015 English (US)</p>
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
   $('#email_invite').validate();
	</script>
</body>
</html>