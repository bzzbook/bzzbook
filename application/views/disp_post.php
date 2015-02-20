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
        <a href="#" role="button"  class="dropdown-toggle userName" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Logged in as:<span>John Smith</span></a>
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
            <li> <a  href="#">Profile</a></li>
            <li> <a  href="#">About Me</a></li>
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
              <option data-to-profile-type="Company"> Ayatas technologies </option>
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
          <div class="details">Jhon Smith....<a href="#">Edit Profile</a><span>Sr. UI Developer at Company</span></div>
          <div class="clear"></div>
        </div>
        <div class="sideNav">
          <ul>
            <li><a href="#">Messages <span>5</span></a></li>
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
          <p>Invite your friends to Bzzbook!</p>
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
    <section class="col-lg-6 col-md-6 col-sm-5 col-xs-12 coloumn2">
      <div class="updateStatus">
        <ul>
          <li><img src="<?php echo base_url(); ?>images/user.png" alt=""></li>
          <li><a href="#">Create a Post</a></li>
          <li><a href="#">Upload Photos/Video</a></li>
          <li><a href="#">Create Photo/Video Album</a></li>
        </ul>
        <?php $attr = array('name' => 'post_form', 'id' =>'my_form') ?>
        <?php echo form_open('signg_in/send_post',$attr) ?>
        <textarea cols="" rows="" name="posts" class="form-control" placeholder="What's Buzzing?"></textarea>
        <div class="updateControls"> <a href="javascript:{}" onclick="document.getElementById('my_form').submit(); return false;">Post</a> <a href="#">Public</a> </div>
        <?php echo form_close(); ?>
        <div class="clear"></div>
      </div>
      <div class="posts">
        <article>
          <figure><img src="<?php echo base_url(); ?>images/post_writer.png" alt=""></figure>
          <div class="content">
            <h3 class="pw">James Smith<span>2hr</span></h3>
            <p><?php foreach($result as $res) {
            echo $res->posted_by;
			echo $res->post_content;
			}?>
            It has been a privilege working with Jhon Smithat PayPal. His keen eye for detail, problem solving skills and excellent communication were an asset to the entire engineering team. He has been excellent at ensuring projects roll out not only on time...<a href="#">more</a></p>
            <div class="links"> <a href="#">Like<span>&nbsp;(15)</span></a> <a href="#">Comment</a> <a href="#">Share</a> <a href="#">Save As Favorite</a> </div>
            <div class="clear"></div>
          </div>
          <div class="postComment">
            <div class="img"><img src="<?php echo base_url(); ?>images/user.png" alt=""></div>
            <textarea cols="" rows="" class="form-control" placeholder="Write a Comment..."></textarea>
          </div>
        </article>
        <article>
          <figure><img src="<?php echo base_url(); ?>images/post_writer.png" alt=""></figure>
          <div class="content">
            <h3 class="pw">James Smith<span>2hr</span></h3>
            <p>It has been a privilege working with Jhon Smithat PayPal. His keen eye for detail, problem solving skills and excellent communication were an asset to the entire engineering team. He has been excellent at ensuring projects roll out not only on time...<a href="#">more</a></p>
            <div class="links"> <a href="#">Like<span>&nbsp;(15)</span></a> <a href="#">Comment</a> <a href="#">Share</a> <a href="#">Save As Favorite</a></div>
            <div class="clear"></div>
          </div>
          <div class="postComment">
            <div class="img"><img src="<?php echo base_url(); ?>images/user.png" alt=""></div>
            <textarea cols="" rows="" class="form-control" placeholder="Write a Comment..."></textarea>
          </div>
        </article>
        <article>
          <figure><img src="<?php echo base_url(); ?>images/post_writer.png" alt=""></figure>
          <div class="content">
            <h3 class="pw">James Smith<span>2hr</span></h3>
            <p>It has been a privilege working with Jhon Smithat PayPal. His keen eye for detail, problem solving skills and excellent communication were an asset to the entire engineering team. He has been excellent at ensuring projects roll out not only on time...<a href="#">more</a></p>
            <div class="links"> <a href="#">Like<span>&nbsp;(15)</span></a> <a href="#">Comment</a> <a href="#">Share</a> <a href="#">Save As Favorite</a></div>
            <div class="clear"></div>
          </div>
          <div class="postComment">
            <div class="img"><img src="<?php echo base_url(); ?>images/user.png" alt=""></div>
            <textarea cols="" rows="" class="form-control" placeholder="Write a Comment..."></textarea>
          </div>
        </article>
        <article>
          <figure><img src="<?php echo base_url(); ?>images/post_writer.png" alt=""></figure>
          <div class="content">
            <h3 class="pw">James Smith<span>2hr</span></h3>
            <p>It has been a privilege working with Jhon Smithat PayPal. His keen eye for detail, problem solving skills and excellent communication were an asset to the entire engineering team. He has been excellent at ensuring projects roll out not only on time...<a href="#">more</a></p>
            <div class="links"> <a href="#">Like<span>&nbsp;(15)</span></a> <a href="#">Comment</a> <a href="#">Share</a> <a href="#">Save As Favorite</a></div>
            <div class="clear"></div>
          </div>
          <div class="postComment">
            <div class="img"><img src="<?php echo base_url(); ?>images/user.png" alt=""></div>
            <textarea cols="" rows="" class="form-control" placeholder="Write a Comment..."></textarea>
          </div>
        </article>
        <article>
          <figure><img src="<?php echo base_url(); ?>images/post_writer.png" alt=""></figure>
          <div class="content">
            <h3 class="pw">James Smith<span>2hr</span></h3>
            <p>It has been a privilege working with Jhon Smithat PayPal. His keen eye for detail, problem solving skills and excellent communication were an asset to the entire engineering team. He has been excellent at ensuring projects roll out not only on time...<a href="#">more</a></p>
            <div class="links"> <a href="#">Like<span>&nbsp;(15)</span></a> <a href="#">Comment</a> <a href="#">Share</a> <a href="#">Save As Favorite</a></div>
            <div class="clear"></div>
          </div>
          <div class="postComment">
            <div class="img"><img src="<?php echo base_url(); ?>images/user.png" alt=""></div>
            <textarea cols="" rows="" class="form-control" placeholder="Write a Comment..."></textarea>
          </div>
        </article>
        <article>
          <figure><img src="<?php echo base_url(); ?>images/post_writer.png" alt=""></figure>
          <div class="content">
            <h3 class="pw">James Smith<span>2hr</span></h3>
            <p>It has been a privilege working with Jhon Smithat PayPal. His keen eye for detail, problem solving skills and excellent communication were an asset to the entire engineering team. He has been excellent at ensuring projects roll out not only on time...<a href="#">more</a></p>
            <div class="links"> <a href="#">Like<span>&nbsp;(15)</span></a> <a href="#">Comment</a> <a href="#">Share</a> <a href="#">Save As Favorite</a></div>
            <div class="clear"></div>
          </div>
          <div class="postComment">
            <div class="img"><img src="<?php echo base_url(); ?>images/user.png" alt=""></div>
            <textarea cols="" rows="" class="form-control" placeholder="Write a Comment..."></textarea>
          </div>
        </article>
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