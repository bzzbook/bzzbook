<?php $frnds = $this->friendsmodel->latest_frnds(); 
?>
<div class="latestFriends">
          <h3>Latest Friends</h3>
          <ul>
          <?php if(!$frnds) { echo "No Latest Friends Found"; }else { foreach($frnds as $frnd) { ?>
            <li><a href="#" class="latestfrnds"><img alt="" src="<?php echo base_url(); ?>uploads/<?php echo $frnd['image'] ?>"></a><a href="#"><img style="width:auto; height:auto; padding-left:6px;" src="<?php echo base_url(); ?>images/like.png" alt=""></a></li>
            <?php } }?>
          </ul>
          <div class="clear"></div>
          <a href="#" class="link">More Friends</a> </div>