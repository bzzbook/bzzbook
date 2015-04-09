 <?php  $image = $this->profile_set->get_profile_pic();
			         $data = $this->profile_set->get_userinfo(); ?>
<section class="col-lg-9 col-md-9 nopad">
      <div class="col-xs-12 ProfileView">
        <section class="visitorBox">
 <?php $attr = array('id' => 'upload_pfpic', 'name' => 'upload_file'); ?> 
              <?php echo form_open_multipart('profile/do_upload',$attr);?>
          <div class="visitiBoxInner">
            <figure class="compCover"><img alt="" src="<?php echo base_url(); ?>images/about_banner.jpg" class="img-responsive"></figure>
              <?php  $image = $this->profile_set->get_profile_pic();
			         $data = $this->profile_set->get_userinfo(); ?>
            <div class="profileLogo">
              <figure class="cmplogo"><img src="<?php echo base_url();?>uploads/<?php echo $image[0]->user_img_thumb ?>" alt="<?php echo base_url();?>uploads/<?php echo $image[0]->user_img_thumb ?>"></figure>
              <!-- <span class="inside glyphicon glyphicon-camera" ></span>--> 
            </div>
            <h4 class="profile-name"><?php echo $data[0]['user_firstname']." ".$data[0]['user_lastname'] ?></h4>
  <a href="#"><span class="glyphicon glyphicon-camera change-photo fileinput-button" aria-hidden="true"><em>Change Picture</em> <input type="file" name="userfile" id="pfpic" size="20" required/></span></a>
            
	    <div class="ProfileViewNav"></div>

          </div>
    </form>
        </section>
      </div>
      <section class="about-user-details">
        <h4><span aria-hidden="true" class="glyphicon glyphicon-user"></span> About</h4>
        <div class="about-user-details-inner" >
          <section class="col-lg-12 col-md-12 col-sm-5 col-xs-12 coloumn2 aboutme">
            <div class="posts">
              <div class="col-md-4">
                <ul class="nav-tabs" role="tablist" id="myTab">
                  <li role="presentation" class="active"><a href="#overview" aria-controls="home" role="tab" data-toggle="tab">Overview</a></li>
                  <li role="presentation"><a href="#education" aria-controls="profile" role="tab" data-toggle="tab">Work and Education </a></li>
                  <li role="presentation"><a href="#place" aria-controls="messages" role="tab" data-toggle="tab">Places You've Lived </a></li>
                  <li role="presentation"><a href="#contact" aria-controls="messages" role="tab" data-toggle="tab">Contact and Basic Info</a></li>
                  <li role="presentation"><a href="#family" aria-controls="profile" role="tab" data-toggle="tab">Family and Relationships </a></li>
                  <li role="presentation"><a href="#details" aria-controls="profile" role="tab" data-toggle="tab">Details About You </a></li>
                  <li role="presentation"><a href="#life" aria-controls="profile" role="tab" data-toggle="tab">Life Events</a></li>
                </ul>
              </div>
              <div class="tab-content col-md-8">
                <div role="tabpanel" class="tab-pane active" id="overview">
                  <div class="smallboxes col-lg-7">
                    <ul>
                      <li id="profession-li">
                        <div class="iner_lefts"></div>
                        <div class="inner_rights">
                          <h3>Designation</h3>
                          <p><?php if(empty($result[0]->profession)) { ?><a href="javascript:void(0)" onclick="addField('profession')" id="profession">+ Add profession</a> <?php }else { echo $result[0]->profession; } ?></p>
                          <div class="graphic"></div>
                        </div>
                        <div class="clearfix"></div>
                      </li>
                      <li id="schooling-li">
                        <div class="iner_lefts"></div>
                        <div class="inner_rights">
                          <h3>Schooling</h3>
                          <p><?php if(empty($result[0]->schooling)) { ?><a href="javascript:void(0)" onclick="addField('schooling')" id="schooling">+ Add Schooling</a><?php }else { echo $result[0]->schooling; } ?></p>
                        </div>
                        <div class="clearfix"></div>
                      </li>
                      <li id="location-li">
                        <div class="iner_lefts"></div>
                        <div class="inner_rights">
                          <h3>Current Location</h3>
                          <p><?php if(empty($result[0]->location)) { ?><a href="javascript:void(0)" onclick="addField('location')" id="location">+ Add current location</a><?php }else { echo $result[0]->location; } ?></p>
                        </div>
                        <div class="clearfix"></div>
                      </li>
                      <li id="relationship-li">
                        <div class="iner_lefts"></div>
                        <div class="inner_rights">
                          <h3>Relationship</h3> 
                          <p><?php if(empty($result[0]->relationship)) { ?><a href="javascript:void(0)" onclick="addField('relationship')" id="relationship">+ Add a relationship</a><?php }else { echo $result[0]->relationship; } ?></p>
                        </div>
                        <div class="clearfix"></div>
                      </li>
                    </ul>
                  </div>
                  <div class="addresbox col-lg-5 col-md-5 ">
                    <ul>
                      <li>
                        <div class="boxicon"><img src="<?php echo base_url(); ?>images/phoneicon.png" alt=""></div>
                        <div class="boxicon_text"><?php echo $result[0]->user_phoneno;?></div>
                      </li>
                      <li>
                        <div class="boxicon"><img src="<?php echo base_url(); ?>images/mailicon.png" alt=""></div>
                        <div class="boxicon_text"><?php echo $user[0]->user_email;?><br>
                          .com</div>
                      </li>
                      <li>
                        <div class="boxicon"><img src="<?php echo base_url(); ?>images/printicon.png" alt=""></div>
                        <div class="boxicon_text"><?php $unixTimestamp = strtotime($user_info[0]['user_dob']); 
						echo date('d',$unixTimestamp).", ".date('F',$unixTimestamp).", ".date('Y',$unixTimestamp); ?></div>
                      </li>
                    </ul>
                  </div>
                </div>
                <div role="tabpanel" class="tab-pane" id="education">
                  <div class="smallboxes col-md-6">
                    <ul>
                     <?php if($education_details) { foreach($education_details as $edu): ?>
                      <li>
                        <div class="iner_lefts"></div>
                        <div class="inner_rights">
                          <h3>Institution:</h3>
                          <p><?php echo $edu->college_institution; ?></p>
                        </div>
                        <div class="clearfix"></div>
                      </li>
                      <li>
                        <div class="iner_lefts"></div>
                        <div class="inner_rights">
                          <h3>Field of Study:</h3>
                          <p><?php echo $edu->field_of_study; ?></p>
                        </div>
                        <div class="clearfix"></div>
                      </li>
                      <li>
                        <div class="iner_lefts"></div>
                        <div class="inner_rights">
                          <h3>Degree/Certificate:</h3>
                          <p><?php echo $edu->degree_certificate; ?></p>
                        </div>
                        <div class="clearfix"></div>
                      </li>
                      <li>
                        <div class="iner_lefts"></div>
                        <div class="inner_rights">
                          <h3>Years Attended:</h3>
                          <p><?php echo $edu->attended_from; ?> To <?php echo $edu->attended_upto; ?></p>
                        </div>
                        <div class="clearfix"></div>
                      </li>
                      <li>
                        <div class="iner_lefts"></div>
                        <div class="inner_rights">
                          <h3>Specialized Studies:</h3>
                          <p><?php echo $edu->specialised_studies; ?></p>
                        </div>
                        <div class="clearfix"></div>
                      </li>
                        <?php endforeach; } else echo "No Details Found";?>
                    </ul>
                  </div>
                </div>
                <div role="tabpanel" class="tab-pane" id="place">
                  <div class="smallboxes">
                    <ul>
                      <li>
                        <div class="iner_lefts"></div>
                        <div class="inner_rights">
                          <h3>Vizag</h3>
                          <p>Current city</p>
                        </div>
                        <div class="clearfix"></div>
                      </li>
                      <li>
                        <div class="iner_lefts"></div>
                        <div class="inner_rights">
                          <h3>visakhapatnam</h3>
                          <p>Hometown</p>
                        </div>
                        <div class="clearfix"></div>
                      </li>
                      <li>
                        <div class="iner_lefts"><img alt="" src="<?php echo base_url(); ?>images/addicon.png"></div>
                        <div class="inner_rights">
                          <h3>Add a relationship</h3>
                        </div>
                        <div class="clearfix"></div>
                      </li>
                    </ul>
                  </div>
                </div>
                <div role="tabpanel" class="tab-pane" id="contact">
                  <div class="smallboxes">
                    <ul>
                      <li>
                        <div class="iner_mail">Email</div>
                        <div class="inner_rights">
                          <p>98765@bzzbook.com 
                        </div>
                        <div class="clearfix"></div>
                      </li>
                      <li>
                        <div class="iner_lefts"><img alt="" src="<?php echo base_url(); ?>images/addicon.png"></div>
                        <div class="inner_rights">
                          <h3>Add a mobile phone</h3>
                        </div>
                        <div class="clearfix"></div>
                      </li>
                      <li>
                        <div class="iner_lefts"><img alt="" src="<?php echo base_url(); ?>images/addicon.png"></div>
                        <div class="inner_rights">
                          <h3>Add your address</h3>
                        </div>
                        <div class="clearfix"></div>
                      </li>
                      <li>
                        <div class="iner_lefts"><img alt="" src="<?php echo base_url(); ?>images/addicon.png"></div>
                        <div class="inner_rights">
                          <h3>Add a website</h3>
                        </div>
                        <div class="clearfix"></div>
                      </li>
                      <li>
                        <div class="iner_lefts"><img alt="" src="<?php echo base_url(); ?>images/addicon.png"></div>
                        <div class="inner_rights">
                          <h3>Basic Information</h3>
                        </div>
                        <div class="clearfix"></div>
                      </li>
                      <li>
                        <div class="iner_lefts"><img alt="" src="<?php echo base_url(); ?>images/addicon.png"></div>
                        <div class="inner_rights">
                          <h3>Add who you're interested in</h3>
                        </div>
                        <div class="clearfix"></div>
                      </li>
                      <li>
                        <div class="iner_lefts"><img alt="" src="<?php echo base_url(); ?>images/addicon.png"></div>
                        <div class="inner_rights">
                          <h3>Add a language</h3>
                        </div>
                        <div class="clearfix"></div>
                      </li>
                      <li>
                        <div class="iner_lefts"><img alt="" src="<?php echo base_url(); ?>images/addicon.png"></div>
                        <div class="inner_rights">
                          <h3>Add your religious views</h3>
                        </div>
                        <div class="clearfix"></div>
                      </li>
                      <li>
                        <div class="iner_lefts"><img alt="" src="<?php echo base_url(); ?>images/addicon.png"></div>
                        <div class="inner_rights">
                          <h3>Add your political views</h3>
                        </div>
                        <div class="clearfix"></div>
                      </li>
                    </ul>
                  </div>
                </div>
                <div role="tabpanel" class="tab-pane" id="family">
                  <div class="smallboxes">
                    <ul>
                      <li>
                        <div class="iner_lefts"><img alt="" src="<?php echo base_url(); ?>images/addicon.png"></div>
                        <div class="inner_rights">
                          <h3>Add your relationship status</h3>
                        </div>
                        <div class="clearfix"></div>
                      </li>
                      <li>
                        <div class="iner_lefts"><img alt="" src="<?php echo base_url(); ?>images/addicon.png"></div>
                        <div class="inner_rights">
                          <h3>Add a family member</h3>
                        </div>
                        <div class="clearfix"></div>
                      </li>
                    </ul>
                  </div>
                </div>
                <div role="tabpanel" class="tab-pane" id="details">
                  <div class="smallboxes">
                    <ul>
                      <li>
                        <div class="iner_lefts"><img alt="" src="<?php echo base_url(); ?>images/addicon.png"></div>
                        <div class="inner_rights">
                          <h3>Write some details about yourself</h3>
                        </div>
                        <div class="clearfix"></div>
                      </li>
                      <li>
                        <div class="iner_lefts"><img alt="" src="<?php echo base_url(); ?>images/addicon.png"></div>
                        <div class="inner_rights">
                          <h3>Add a nickname, a birth name..</h3>
                        </div>
                        <div class="clearfix"></div>
                      </li>
                      <li>
                        <div class="iner_lefts"><img alt="" src="<?php echo base_url(); ?>images/addicon.png"></div>
                        <div class="inner_rights">
                          <h3>Add your favorite quotations</h3>
                        </div>
                        <div class="clearfix"></div>
                      </li>
                    </ul>
                  </div>
                </div>
                <div role="tabpanel" class="tab-pane" id="life">
                  <div class="smallboxes">
                    <ul>
                      <li>
                        <div class="iner_lefts"><img alt="" src="<?php echo base_url(); ?>images/addicon.png"></div>
                        <div class="inner_rights">
                          <h3>Life Events</h3>
                        </div>
                        <div class="clearfix"></div>
                      </li>
                      <li>
                        <div class="iner_lefts"><img alt="" src="<?php echo base_url(); ?>images/addicon.png"></div>
                        <div class="inner_rights">
                          <h3>Add a life event</h3>
                        </div>
                        <div class="clearfix"></div>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="clear"></div>
            </div>
          </section>
          <div class="clearfix"></div>
        </div>
      </section>
    </section>


<?php /*?><section class="col-lg-6 col-md-6 col-sm-5 col-xs-12 coloumn2 aboutme">
      <h2>About Me</h2>
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
        <p><?php echo $result[0]->user_about ?></p>
        <h4>Intrest</h4>
        <p><?php echo $result[0]->user_intrests ?> </p>
        </div>
       
        <div role="tabpanel" class="tab-pane" id="educational">
         <?php if($education_details) { foreach($education_details as $edu): ?>
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
          <?php endforeach; } else echo "No Details Found";?>
        </div>
      
        <div role="tabpanel" class="tab-pane" id="Contact">
         <h4>Email:</h4>
        <p><?php echo $user[0]->user_email;?></p>
         <h4>Phone:</h4>
        <p><?php echo $result[0]->user_phoneno;?></p>
         <h4>Office:</h4>
        <p><?php echo $result[0]->user_cmpname;?></p>
         <h4>Fax:</h4>
        <p><?php echo $result[0]->user_fax;?></p>
        </div>
        </div>
        <div class="clear"></div>
      </div>
    </section><?php */?>