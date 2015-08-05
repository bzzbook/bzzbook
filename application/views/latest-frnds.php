<?php $frnds = $this->friendsmodel->latest_frnds($limit = 3); 
if($frnds){
?>
<div class="latestFriends">
          <h3>Latest Friends</h3>
          <ul>
          <?php if(!$frnds) { echo "No Latest Friends Found"; }else { foreach($frnds as $frnd) { ?>
            <li><a href="<?php echo base_url(); ?>profile/user/<?php echo $frnd[0]['user_id']; ?>" class="latestfrnds"><img src="<?php if(!empty($frnd[0]['user_img_thumb'])) { echo base_url().'uploads/'.$frnd[0]['user_img_thumb']; }else echo base_url().'uploads/default_profile_pic.png'; ?>" alt="<?php echo $frnd[0]['user_firstname'] . " " .$frnd[0]['user_lastname']; ?>"></a><a href="#"><img style="width:auto; height:auto; padding-left:6px;" src="<?php echo base_url(); ?>images/like.png" alt=""></a></li>
            <?php } }?>
          </ul>
          <div class="clear"></div>
          <?php if(!empty($frnds)) { ?>
          <a href="<?php echo base_url('friends/view_all_latest_frnds'); ?>" class="link">More Friends</a> 
          <?php } ?>
          </div>
          <?php } ?>