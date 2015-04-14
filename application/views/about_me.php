<section class="col-lg-9 col-md-9 nopad">
      <div class="col-xs-12 ProfileView">
        <section class="visitorBox">
          <div class="visitiBoxInner">
            <figure class="compCover"><img alt="" src="<?php echo base_url(); ?>images/about_banner.jpg" class="img-responsive"></figure>
              <?php  $image = $this->profile_set->get_profile_pic();
			         $data = $this->profile_set->get_userinfo(); ?>
            <div class="profileLogo">
              <figure class="cmplogo"><a href="#"><span class="glyphicon glyphicon-camera change-photo fileinput-button" aria-hidden="true"><em>Change Picture</em> <input type="file" name="userfile" id="userfile" size="20" required/></span></a><img src="<?php echo base_url();?>uploads/<?php if(!empty($image[0]->user_img_thumb)) echo $image[0]->user_img_thumb; else echo 'default_profile_pic.png'; ?>" alt="<?php echo base_url();?>uploads/<?php echo $image[0]->user_img_thumb ?>"></figure>
              <!-- <span class="inside glyphicon glyphicon-camera" ></span>--> 
            </div>
            <h4 class="profile-name"><?php echo $data[0]['user_firstname']." ".$data[0]['user_lastname'] ?></h4>
            <div class="ProfileViewNav"></div>
          </div>
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
                  <!--<li role="presentation"><a href="#education" aria-controls="profile" role="tab" data-toggle="tab">Work and Education </a></li>-->
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
                          <p><?php if(empty($result[0]->profession)) { ?><a href="javascript:void(0)" onclick="addField('profession')" id="profession">+ Add profession</a> <?php }else { echo $result[0]->profession;?><a href="javascript:void(0)" onclick="addField('profession')"> edit</a>  <?php  } ?></p>
                          <div class="graphic"></div>
                        </div>
                        <div class="clearfix"></div>
                      </li>
                      <li id="schooling-li">
                        <div class="iner_lefts"></div>
                        <div class="inner_rights">
                          <h3>Schooling</h3>
                          <p><?php if(empty($result[0]->schooling)) { ?><a href="javascript:void(0)" onclick="addField('schooling')" id="schooling">+ Add Schooling</a><?php }else { echo $result[0]->schooling; ?><a href="javascript:void(0)" onclick="addField('schooling')"> edit</a>  <?php } ?></p>
                        </div>
                        <div class="clearfix"></div>
                      </li>
                      <li id="location-li">
                        <div class="iner_lefts"></div>
                        <div class="inner_rights">
                          <h3>Current Location</h3>
                          <p><?php if(empty($result[0]->location)) { ?><a href="javascript:void(0)" onclick="addField('location')" id="location">+ Add current location</a><?php }else { echo $result[0]->location; ?><a href="javascript:void(0)" onclick="addField('location')"> edit</a>  <?php } ?></p>
                        </div>
                        <div class="clearfix"></div>
                      </li>
                      <li id="relationship-li">
                        <div class="iner_lefts"></div>
                        <div class="inner_rights">
                          <h3>Relationship</h3> 
                          <p><?php if(empty($result[0]->relationship)) { ?><a href="javascript:void(0)" onclick="addField('relationship')" id="relationship">+ Add a relationship</a><?php }else { echo $result[0]->relationship; ?><a href="javascript:void(0)" onclick="addField('relationship')"> edit</a>  <?php } ?></p>
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
                      <li id="location-li">
                        <div class="iner_lefts"></div>
                        <div class="inner_rights">
                          <h3>Current city</h3>
                          <p><?php if(empty($result[0]->location)) { ?><a href="javascript:void(0)" onclick="addField('location')" id="location">+ Add a current location</a><?php }else { echo $result[0]->location; ?><a href="javascript:void(0)" onclick="addField('location')"> edit</a>  <?php } ?></p>
                        </div>
                        <div class="clearfix"></div>
                      </li>
                      <li id="hometown-li">
                        <div class="iner_lefts"></div>
                        <div class="inner_rights">
                          <h3>Home Town</h3>
                          <p><?php if(empty($result[0]->hometown)) { ?><a href="javascript:void(0)" onclick="addField('hometown')" id="hometown">+ Add a home town</a><?php }else { echo $result[0]->hometown; ?><a href="javascript:void(0)" onclick="addField('hometown')"> edit</a>  <?php } ?></p>
                        </div>
                        <div class="clearfix"></div>
                      </li>
                     </ul>
                  </div>
                </div>
                <div role="tabpanel" class="tab-pane" id="contact">
                  <div class="smallboxes">
                    <ul>
                      <li id="email-li">
                        <div class="iner_lefts"></div>
                        <div class="inner_rights">
                        	<h3>Email</h3>
                          <p><?php if(empty($result[0]->email)) { ?><a href="javascript:void(0)" onclick="addField('email')" id="email">+ Add Email</a><?php }else { echo $result[0]->email; ?><a href="javascript:void(0)" onclick="addField('email')"> edit</a>  <?php } ?></p> 
                        </div>
                        <div class="clearfix"></div>
                      </li>
                      <li id="mobile-li">
                        <div class="iner_lefts"></div>
                        <div class="inner_rights">
                          <h3>Mobile</h3>
                          <p><?php if(empty($result[0]->mobile)) { ?><a href="javascript:void(0)" onclick="addField('mobile')" id="mobile">+ Add Mobile No</a><?php }else { echo $result[0]->mobile; ?><a href="javascript:void(0)" onclick="addField('mobile')"> edit</a>  <?php } ?></p>
                        </div>
                        <div class="clearfix"></div>
                      </li>
                      <li id="address-li">
                        <div class="iner_lefts"></div>
                        <div class="inner_rights">
                          <h3>Address</h3>
                          <p><?php if(empty($result[0]->address)) { ?><a href="javascript:void(0)" onclick="addField('address')" id="address">+ Add Address</a><?php }else { echo $result[0]->address; ?><a href="javascript:void(0)" onclick="addField('address')"> edit</a>  <?php } ?></p>
                        </div>
                        <div class="clearfix"></div>
                      </li>
                      <li id="website-li">
                        <div class="iner_lefts"></div>
                        <div class="inner_rights">
                          <h3>Website</h3>
                          <p><?php if(empty($result[0]->website)) { ?><a href="javascript:void(0)" onclick="addField('website')" id="website">+ Add website</a><?php }else { echo $result[0]->website; ?><a href="javascript:void(0)" onclick="addField('website')"> edit</a>  <?php } ?></p>
                        </div>
                        <div class="clearfix"></div>
                      </li>
                      <li id="basicinfo-li">
                        <div class="iner_lefts"></div>
                        <div class="inner_rights">
                          <h3>Basic Information</h3>
                          <p><?php if(empty($result[0]->basicinfo)) { ?><a href="javascript:void(0)" onclick="addField('basicinfo')" id="basicinfo">+ Add Basic Info</a><?php }else { echo $result[0]->basicinfo; ?><a href="javascript:void(0)" onclick="addField('basicinfo')"> edit</a>  <?php } ?></p>
                        </div>
                        <div class="clearfix"></div>
                      </li>
                      <li id="interests-li">
                        <div class="iner_lefts"></div>
                        <div class="inner_rights">
                          <h3>Interests</h3>
                          <p><?php if(empty($result[0]->interests)) { ?><a href="javascript:void(0)" onclick="addField('interests')" id="interests">+ Add Your Interests</a><?php }else { echo $result[0]->interests; ?><a href="javascript:void(0)" onclick="addField('interests')"> edit</a>  <?php } ?></p>
                        </div>
                        <div class="clearfix"></div>
                      </li>
                      <li id="languages-li">
                        <div class="iner_lefts"></div>
                        <div class="inner_rights">
                          <h3>languages known</h3>
                           <p><?php if(empty($result[0]->languages)) { ?><a href="javascript:void(0)" onclick="addField('languages')" id="languages">+ Add Languages Known</a><?php }else { echo $result[0]->languages; ?><a href="javascript:void(0)" onclick="addField('languages')"> edit</a>  <?php } ?></p>
                        </div>
                        <div class="clearfix"></div>
                      </li>
                      <li id="religious-li">
                        <div class="iner_lefts"></div>
                        <div class="inner_rights">
                          <h3>Religious Views</h3>
                          <p><?php if(empty($result[0]->religious)) { ?><a href="javascript:void(0)" onclick="addField('religious')" id="religious">+ Add Religious Views</a><?php }else { echo $result[0]->religious; ?><a href="javascript:void(0)" onclick="addField('religious')"> edit</a>  <?php } ?></p>
                        </div>
                        <div class="clearfix"></div>
                      </li>
                      <li id="political-li">
                        <div class="iner_lefts"></div>
                        <div class="inner_rights">
                          <h3>Political Views</h3>
                          <p><?php if(empty($result[0]->political)) { ?><a href="javascript:void(0)" onclick="addField('political')" id="political">+ Add Political Views</a><?php }else { echo $result[0]->political; ?><a href="javascript:void(0)" onclick="addField('political')"> edit</a>  <?php } ?></p>
                        </div>
                        <div class="clearfix"></div>
                      </li>
                    </ul>
                  </div>
                </div>
                <div role="tabpanel" class="tab-pane" id="family">
                  <div class="smallboxes">
                    <ul>
                      <li id="relationshipstatus-li">
                        <div class="iner_lefts"></div>
                        <div class="inner_rights">
                          <h3>Relationship Status</h3>
                          <p><?php if(empty($result[0]->relationshipstatus)) { ?><a href="javascript:void(0)" onclick="addField('relationshipstatus')" id="relationshipstatus">+ Add Relationship Status</a><?php }else { echo $result[0]->relationshipstatus; ?><a href="javascript:void(0)" onclick="addField('relationshipstatus')"> edit</a>  <?php } ?></p>
                        </div>
                        <div class="clearfix"></div>
                      </li>
                      <li id="familymembers-li">
                        <div class="iner_lefts"></div>
                        <div class="inner_rights">
                          <h3>Family Member</h3>
                          <p><?php if(empty($result[0]->familymembers)) { ?><a href="javascript:void(0)" onclick="addField('familymembers')" id="familymembers">+ Add Family Members</a><?php }else { echo $result[0]->familymembers; ?><a href="javascript:void(0)" onclick="addField('familymembers')"> edit</a>  <?php } ?></p>
                        </div>
                        <div class="clearfix"></div>
                      </li>
                    </ul>
                  </div>
                </div>
                <div role="tabpanel" class="tab-pane" id="details">
                  <div class="smallboxes">
                    <ul>
                      <li id="aboutme-li">
                        <div class="iner_lefts"></div>
                        <div class="inner_rights">
                          <h3>Details About Yourself</h3>
                          <p><?php if(empty($result[0]->aboutme)) { ?><a href="javascript:void(0)" onclick="addField('aboutme')" id="aboutme">+ Add Details About Yourself</a><?php }else { echo $result[0]->aboutme; ?><a href="javascript:void(0)" onclick="addField('aboutme')"> edit</a>  <?php } ?></p>
                        </div>
                        <div class="clearfix"></div>
                      </li>
                      <li id="nickname-li">
                        <div class="iner_lefts"></div>
                        <div class="inner_rights">
                          <h3>Nickname</h3>
                          <p><?php if(empty($result[0]->nickname)) { ?><a href="javascript:void(0)" onclick="addField('nickname')" id="nickname">+ Add Nickname</a><?php }else { echo $result[0]->nickname; ?><a href="javascript:void(0)" onclick="addField('nickname')"> edit</a>  <?php } ?></p>
                        </div>
                        <div class="clearfix"></div>
                      </li>
                      <li id="favquotes-li">
                        <div class="iner_lefts"></div>
                        <div class="inner_rights">
                          <h3>Favorite Quotations</h3>
                           <p><?php if(empty($result[0]->favquotes)) { ?><a href="javascript:void(0)" onclick="addField('favquotes')" id="favquotes">+ Add Favorite Quotations</a><?php }else { echo $result[0]->favquotes; ?><a href="javascript:void(0)" onclick="addField('favquotes')"> edit</a>  <?php } ?></p>
                        </div>
                        <div class="clearfix"></div>
                      </li>
                    </ul>
                  </div>
                </div>
                <div role="tabpanel" class="tab-pane" id="life">
                  <div class="smallboxes">
                    <ul>
                      <li id="lifeevent-li">
                        <div class="iner_lefts"></div>
                        <div class="inner_rights">
                          <h3>Life Events</h3>
                          <p><?php if(empty($result[0]->lifeevent)) { ?><a href="javascript:void(0)" onclick="addField('lifeevent')" id="lifeevent">+ Add Life Event</a><?php }else { echo $result[0]->lifeevent; ?><a href="javascript:void(0)" onclick="addField('lifeevent')"> edit</a>  <?php } ?></p>
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