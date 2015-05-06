 <?php $profile_info = $this->profile_set->get_user_profileinfo(); ?>
<section class="about-user-details business_card">
        <h4><span><img src="<?php echo base_url(); ?>images/business_card.png" alt=""></span>My Business Card</h4>
          <section class="col-lg-12 col-md-12 col-sm-5 col-xs-12 coloumn2 business_card_inner">
           <div class="col-md-10 card_box">
           <h3><?php echo $profile_info[0]['user_firstname'] ." ".$profile_info[0]['user_lastname']; ?></h3>
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
          <h6><?php echo $profile_info[0]['user_cmpname']; ?></h6>
          </div>
          <div class="clear"></div>
          </div>
          
          <div class="card_box_right">
          <div class="right_cards"><i class="fa fa-mobile"></i></div>
          <div class="card_right">
          <h5>Phone number:</h5>
          <h6><?php echo $profile_info[0]['user_phoneno']; ?></h6>
          </div>
          <div class="clear"></div>
          </div>
          
          <div class="card_iconsbox2">
          <div class="card_left2"><i class="fa fa-map-marker" ></i></div>
          <div class="card_right">
          <h5>Location:</h5>
          <h6><?php echo $profile_info[0]['user_state'].", ".$profile_info[0]['user_country']; ?></h6>
          </div>
          <div class="clear"></div>
          </div>
          
          <div class="card_box_right2">
          <div class="right_cards2"><i class="fa fa-envelope-o"></i></div>
          <div class="card_right">
          <h5>Email:</h5>
          <h6><?php echo $profile_info[0]['user_email']; ?></h6>
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
          <div class="btn2 btn-black">Send My Friends</div>
          <div class="btn2 btn-green" data-toggle="modal" data-target="#share_business_card">Share</div>
            </section>
      </section>