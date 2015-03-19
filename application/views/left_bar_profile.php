<div class="profile">
          <?php $image = $this->profile_set->get_profile_pic(); 	?>
          <div class="img">
       <img src="<?php echo base_url();?>uploads/<?php echo $image[0]->user_img_thumb ?>" alt="">
          </div>
          <div class="details">Jhon Smith....<a href="<?php echo base_url(); ?>profile/profile_setting">Edit Profile</a><span>Sr. UI Developer at Company</span></div>
          <div class="clear"></div>
        </div>