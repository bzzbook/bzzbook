<?php 
//$this->load->model('friendsmodel'); 
$frnds = $this->friendsmodel->related_friends($limit = 2);
if(empty($frnds))
{
$add_frnd_reqs = $this->friendsmodel->finding_friends($limit = 2);
}else{
$add_frnd_reqs = $frnds;
}
?> 
 
 <div class="pendingRequest">
          <h3>Add Friends </h3>
          <ul id="add_friends">
          <?php if($add_frnd_reqs) { foreach($add_frnd_reqs as $req){ ?>
            <li>
              <figure><img src="<?php if(!empty($req[0]['user_img_thumb'])) { echo base_url().'uploads/'.$req[0]['user_img_thumb']; }else echo base_url().'uploads/default_profile_pic.png'; ?>" alt="<?php echo $req[0]['user_firstname'] . " " .$req[0]['user_lastname']; ?>"></figure>
              <div class="disc">
                <h4><?php echo $req[0]['user_firstname'] . " " .$req[0]['user_lastname']; ?></h4>
                <div class="dcBtn"><a id="sidebar_addfrnd<?php echo $req[0]['user_id']; ?>" href="javascript:void(0);" onclick="addFrnd(<?php echo $req[0]['user_id']; ?>);">Add Friend</a></div>
                </div>
            </li>
            <?php } }else echo "No Friends Found!.."; ?>
           <?php /*?> <li>
              <figure><img src="<?php echo base_url(); ?>images/f2.jpg" alt=""></figure>
              <div class="disc">
                <h4>Nicholos smith</h4>
                <a href="#">Confirm</a><a href="#">Deny</a> </div>
            </li><?php */?>
          </ul>
          <?php if(!empty($add_frnd_reqs)) { ?>
          <a href="<?php echo base_url('friends/view_all_reqs'); ?>" class="link">View all</a> 
          <?php } ?>
          
 </div>