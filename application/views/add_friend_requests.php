<?php 
//$this->load->model('friendsmodel'); 
$frnds = $this->friendsmodel->related_friends($limit = 2);

if(empty($frnds))
{
$add_frnd_reqs = $this->friendsmodel->finding_friends($limit = 2);
}else{
$add_frnd_reqs = $frnds;
}
if(count($add_frnd_reqs)>2){
list($first_list,$second_list) = array_chunk( $add_frnd_reqs, ceil(count($add_frnd_reqs) / 2) );
}
else
$first_list = $add_frnd_reqs;

?> 
 
 <div class="pendingRequest">
          <h3>Add Friends </h3>
          <div class="" id="nextItemAnim">
          <ul id="add_friends" class="itemControl">
          <?php if(isset($first_list) && $first_list) {
			 
			   foreach($first_list as $req){
				   
				     ?>
            <li>
              <figure><a href="<?php echo base_url('profile/user/'.$req[0]['user_id']); ?>" ><img src="<?php if(!empty($req[0]['user_img_thumb'])) { echo base_url().'uploads/'.$req[0]['user_img_thumb']; }else echo base_url().'uploads/default_profile_pic.png'; ?>" alt="<?php echo $req[0]['user_firstname'] . " " .$req[0]['user_lastname']; ?>"></a></figure>
              <div class="disc">
                <h4><a  class="override_exist_styles" href="<?php echo base_url('profile/user/'.$req[0]['user_id']); ?>" ><?php  $name = $req[0]['user_firstname'] . " " .$req[0]['user_lastname']; echo character_limiter($name, 10); ?></a></h4>
                <div class="dcBtn"><a id="sidebar_addfrnd<?php echo $req[0]['user_id']; ?>" href="javascript:void(0);" onclick="addFrnd(<?php echo $req[0]['user_id']; ?>);">Add Friend</a></div>
                <span class="skip">Skip</span>
                </div>
            </li>
            
            <?php 
			} } 
			/*?> <li>
              <figure><img src="<?php echo base_url(); ?>images/f2.jpg" alt=""></figure>
              <div class="disc">
                <h4>Nicholos smith</h4>
                <a href="#">Confirm</a><a href="#">Deny</a> </div>
            </li><?php */?>
          </ul>
          <?php if(count($add_frnd_reqs)>2): ?>
          <ul id="add_friends_two" class="itemControl">
          <?php if(isset($second_list) && $second_list) {
			 

			   foreach($second_list as $req){
				   
				      ?>
            <li>
              <figure><a href="<?php echo base_url('profile/user/'.$req[0]['user_id']); ?>" ><img src="<?php if(!empty($req[0]['user_img_thumb'])) { echo base_url().'uploads/'.$req[0]['user_img_thumb']; }else echo base_url().'uploads/default_profile_pic.png'; ?>" alt="<?php echo $req[0]['user_firstname'] . " " .$req[0]['user_lastname']; ?>"></a></figure>
              <div class="disc">
                <h4><a  class="override_exist_styles" href="<?php echo base_url('profile/user/'.$req[0]['user_id']); ?>" ><?php  $name = $req[0]['user_firstname'] . " " .$req[0]['user_lastname']; echo character_limiter($name, 10); ?></a></h4>
                <div class="dcBtn"><a id="sidebar_addfrnd<?php echo $req[0]['user_id']; ?>" href="javascript:void(0);" onclick="addFrnd_two(<?php echo $req[0]['user_id']; ?>);">Add Friend</a></div>
                <span class="skip">Skip</span>
                </div>
            </li>
            
            <?php 
			} }
			/*?> <li>
              <figure><img src="<?php echo base_url(); ?>images/f2.jpg" alt=""></figure>
              <div class="disc">
                <h4>Nicholos smith</h4>
                <a href="#">Confirm</a><a href="#">Deny</a> </div>
            </li><?php */?>
          </ul>
          <?php endif;  ?>
          </div>
          <?php if(!empty($add_frnd_reqs)) { ?>
          <a href="<?php echo base_url('friends/view_all_reqs'); ?>" class="link">View all</a> 
          <?php } ?>
          
 </div>
