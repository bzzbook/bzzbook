<div class="profile">
          <?php $image = $this->profile_set->get_profile_pic(); 
				$result = $this->profile_set->get_userinfo();
				 $name = $result[0]['user_firstname']." ".$result[0]['user_lastname'];		  
		  
		  	?>
          <div class="img">
       <a href="<?php echo base_url().'profile/about_me'; ?>"><img class="profsettings" src="<?php echo base_url();?>uploads/<?php if(!empty($image[0]->user_img_thumb)) echo $image[0]->user_img_thumb; else echo 'default_profile_pic.png'; ?>" alt=""></a>
          </div>
          <div class="details"><?php echo $name ?> <a href="<?php echo base_url(); ?>profile/profile_setting">Edit Profile</a><span><?php echo $result[0]['user_jobtype']?></span></div>
          <div class="clear"></div>
        </div>