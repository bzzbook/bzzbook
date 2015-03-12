<div class="profile">
          <?php $data = $this->profile_set->get_profile_pic(); 	?>
          <div class="img">
          <?php	foreach($data as $image){ ?>
          <img src="<?php echo base_url();?>uploads/thumbs/<?php echo $image->thumbnail; ?>" alt="">
          <?php } ?>
          </div>
          <div class="details">Jhon Smith....<a href="<?php echo base_url(); ?>profile/profile_setting">Edit Profile</a><span>Sr. UI Developer at Company</span></div>
          <div class="clear"></div>
        </div>