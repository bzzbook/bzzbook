<?php $this->load->view('header.php');?>
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
              <li> <a  href="<?php echo base_url(); ?>profile/business_details">My Business Details</a></li>
            <li> <a  href="#">My Companies</a></li>
          </ul>
          <div class="pull-right viewAs">
            <p>Viewing as:</p>
            <select class="form-control" >
              <optgroup label="Your Personal profile">
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
            <li><a href="<?php echo base_url(); ?>profile/groups">My Groups</a></li>
            <li><a href="<?php echo base_url(); ?>profile/jobs">My Jobs</a></li>
            <li><a href="<?php echo base_url(); ?>profile/events">My Events</a></li>
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
    <section class="col-lg-6 col-md-6 col-sm-5 col-xs-12 coloumn2 aboutme">
      <h2>About Me</h2>
      <?php foreach($result as $info):?>
      <div class="posts">
      <div class="col-md-5">
        <ul class="nav-tabs" role="tablist" id="myTab">
        <li role="presentation" class="active"><a href="#About" aria-controls="home" role="tab" data-toggle="tab">About</a></li>
        <li role="presentation"><a href="#educational" aria-controls="profile" role="tab" data-toggle="tab">Educational Background </a></li>
        <li role="presentation"><a href="#Contact" aria-controls="messages" role="tab" data-toggle="tab">Contact Details </a></li>
        </ul>
      </div>  
        <div class="tab-content col-md-7">
        <div role="tabpanel" class="tab-pane active" id="About">
        <h4>Overview</h4>
        <p><?php echo $info->about?></p>
        <h4>Interest</h4>
        <p><?php echo $info->intrests;?> </p>
        </div>
        <?php foreach($education_details as $edu): ?>
        <div role="tabpanel" class="tab-pane" id="educational">
        <h4>Institution:</h4>
        <p><?php echo $edu->college_institution; ?></p>
        <h4>Field of Study:</h4>
        <p><?php echo $edu->field_of_study; ?></p>
        <h4>Degree/Certificate:</h4>
        <p><?php echo $edu->degree_certificate; ?></p>
        <h4>Years Attended:</h4>
        <p><?php echo $edu->attended_from; ?> To <?php echo $edu->attended_upto; ?> </p>
        <h4>Specialized Studies:</h4>
        <p><?php echo $edu->specialised_studies; ?></p>
        </div>
        <?php endforeach;?>
        <div role="tabpanel" class="tab-pane" id="Contact">
         <h4>Email:</h4>
        <p><?php echo $info->email;?></p>
         <h4>Phone:</h4>
        <p><?php echo $info->phone_number;?></p>
         <h4>Office:</h4>
        <p><?php echo $info->company_name;?></p>
         <h4>Fax:</h4>
        <p>9696969696</p>
        </div>
        </div>
        <div class="clear"></div>
      </div>
      <?php endforeach;?>
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
<?php $this->load->view('footer.php');?>