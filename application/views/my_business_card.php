<section class="col-lg-9 col-md-9 nopad">
      <div class="col-xs-12 ProfileView">
        <section class="visitorBox">
          <div class="visitiBoxInner">
            <figure class="compCover"><img alt="" src="<?php echo base_url(); ?>images/about_banner.jpg" class="img-responsive"></figure>
             <?php  $image = $this->profile_set->get_profile_pic();
			         $data = $this->profile_set->get_userinfo(); ?>
                         <?php $attr = array('id' => 'upload_pfpic', 'name' => 'upload_file'); ?> 
              <?php echo form_open_multipart('profile/do_upload',$attr);?>
            <div class="profileLogo">
              <figure class="cmplogo"> <img src="<?php echo base_url();?>uploads/<?php if(!empty($image[0]->user_img_thumb)) echo $image[0]->user_img_thumb; else echo 'default_profile_pic.png'; ?>" alt="<?php echo base_url();?>uploads/<?php if(!empty($image[0]->user_img_thumb)) echo $image[0]->user_img_thumb; else echo 'default_profile_pic.png'; ?>"></figure>
              <!-- <span class="inside glyphicon glyphicon-camera" ></span>--> 
            </div>
            <h4 class="profile-name"><?php echo $data[0]['user_firstname']." ".$data[0]['user_lastname'] ?></h4>
            <a href="#"><span class="glyphicon glyphicon-camera change-photo fileinput-button" aria-hidden="true"><em>Change Picture</em> <input type="file" name="userfile" id="pfpic" size="20" required/></span></a></form>
            <div class="ProfileViewNav"></div>
          </div>
        </section>
      </div>
<section class="about-user-details business_card">
        <h4><span><img src="<?php echo base_url(); ?>images/business_card.png" alt=""></span>My Business Card</h4>
          <section class="col-lg-12 col-md-12 col-sm-5 col-xs-12 coloumn2 business_card_inner">
           <div class="col-md-10 card_box">
           <h3>
		   <?php 		  
		  if(!empty($profile_info[0]['user_firstname']) && !empty($profile_info[0]['user_lastname']))
		  {
		  echo  $profile_info[0]['user_firstname']." ".$profile_info[0]['user_lastname'];
		  }else
		  echo "Not Available";
		  ?>
		   
		   </h3>
           <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
           </div>
            <div class="col-md-2 photos"><img src="<?php echo base_url();?>uploads/<?php if(!empty($profile_info[0]['user_img_thumb'])) echo $profile_info[0]['user_img_thumb']; else echo 'default_profile_pic.png'; ?>" alt=""></div>
          </section>
          <div class="clearfix"></div>
          
          <div class="card_icons col-md-12">
          
          <div class="card_iconsbox">
          <div class="card_left"><i class="fa fa-fw"></i></div>
          <div class="card_right">
          <h5>Website:</h5>
          <h6>
          <?php 		  
		  if(!empty($profile_info[0]['user_cmpname']))
		  {
		  echo $profile_info[0]['user_cmpname'];
		  }else
		  echo "Not Available";
		  ?></h6>
          </div>
          <div class="clear"></div>
          </div>
          
          <div class="card_box_right">
          <div class="right_cards"><i class="fa fa-mobile"></i></div>
          <div class="card_right">
          <h5>Phone number:</h5>
          <h6><?php 		  
		  if(!empty($profile_info[0]['user_phoneno']))
		  {
		  echo $profile_info[0]['user_phoneno'];
		  }else
		  echo "Not Available";
		  ?></h6>
          </div>
          <div class="clear"></div>
          </div>
          
          <div class="card_iconsbox2">
          <div class="card_left2"><i class="fa fa-map-marker" ></i></div>
          <div class="card_right">
          <h5>Location:</h5>
          <h6><?php 		  
		  if(!empty($profile_info[0]['user_country']) && !empty($profile_info[0]['user_state']))
		  {
		  echo  $profile_info[0]['user_state'].", ".$profile_info[0]['user_country'];
		  }else
		  echo "Not Available";
		  ?></h6> 
          </div>
          <div class="clear"></div>
          </div>
          
          <div class="card_box_right2">
          <div class="right_cards2"><i class="fa fa-envelope-o"></i></div>
          <div class="card_right">
          <h5>Email:</h5>
          <h6><?php 
		  
		  if(!empty($profile_info[0]['user_email']))
		  {
		  echo $profile_info[0]['user_email'];
		  }else
		  echo "Not Available";
		  ?></h6>
          </div>
          <div class="clear"></div>
          </div>
          
          <div class="card_iconsbox3">
          <div class="card_left3"><i class="fa fa-twitter"></i></div>
          <div class="card_right">
          <h5>Twitter:</h5>
          <h6>Aaliyah@twitter</h6>
          </div>
          <div class="clear"></div>
          </div>
          
          <div class="card_box_right3">
          <div class="right_cards3"><i class="fa fa-facebook"></i></div>
          <div class="card_right">
          <h5>Facebook:</h5>
          <h6>Aaliyah@facebook</h6>
          </div>
          <div class="clear"></div>
          </div>
          
          <div class="card_iconsbox4">
          <div class="card_left4"><i class="fa fa-pinterest-p"></i></div>
          <div class="card_right">
          <h5>Pinterest:</h5>
          <h6>aaliyah@gmail.com</h6>
          </div>
          <div class="clear"></div>
          </div>
          
          <div class="card_box_right4">
          <div class="right_cards4"><i class="fa fa-linkedin"></i></div>
          <div class="card_right">
          <h5>linkedin:</h5>
          <h6>Aaliyah@linkedin</h6>
          </div>
          <div class="clear"></div>
          </div>
         
          </div>
          <div class="btn2 btn-black"  data-toggle="modal" data-target="#share_business_card">Send My Friends</div>
          <div class="btn2 btn-green">Share</div>
            </section>
      </section>