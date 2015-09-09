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
if(count($add_frnd_reqs)>0){
?> 
 
 <div id="friendSugBox" class="pendingRequest">
          <h3>Add Friends </h3>
          <div class="addFriend-ul-container" id="nextItemAnim">
          <ul id="add_friends" class="itemControl">
          <?php if(isset($first_list) && $first_list) {
			 
			   foreach($first_list as $req){
				  
				     ?>
            <li>
              <figure><a href="<?php echo base_url('profile/user/'.$req[0]['user_id']); ?>" ><img src="<?php if(!empty($req[0]['user_img_thumb'])) { echo base_url().'uploads/'.$req[0]['user_img_thumb']; }else echo base_url().'uploads/default_profile_pic.png'; ?>" alt="<?php echo $req[0]['user_firstname'] . " " .$req[0]['user_lastname']; ?>"></a></figure>
              <div class="disc">
                <h4><a  class="override_exist_styles" href="<?php echo base_url('profile/user/'.$req[0]['user_id']); ?>" ><?php  $name = $req[0]['user_firstname'] . " " .$req[0]['user_lastname']; echo substr($name,0,12);if(strlen($name)>12) echo '...'; ?></a></h4>
                <h4><?php if(isset($req[0]['org_name']) && isset($req[0]['position']) && $req[0]['org_name']!='' && $req[0]['position']!=''){ echo substr($req[0]['position'].' at '.$req[0]['org_name'],0,20); if(strlen($req[0]['position'].' at '.$req[0]['org_name'])>20) echo '...';}else{ echo '--'; }  ?></h4>
                <div class="dcBtn"><a  class='skip addfrd_accept' id="sidebar_addfrnd<?php echo $req[0]['user_id']; ?>" href="javascript:void(0);" onclick="addFrnd(<?php echo $req[0]['user_id']; ?>);">Add</a>
                <a class="skip addfrd_skip" onclick="skipFrnd(<?php echo $req[0]['user_id']; ?>);">Skip</a></div>
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
          <div style="clear:both"></div>
          <?php if(count($add_frnd_reqs)>2): ?>
          <ul id="add_friends_two" class="itemControl">
          <?php if(isset($second_list) && $second_list) {
			 

			   foreach($second_list as $req){
				   
				      ?>
            <li>
              <figure><a href="<?php echo base_url('profile/user/'.$req[0]['user_id']); ?>" ><img src="<?php if(!empty($req[0]['user_img_thumb'])) { echo base_url().'uploads/'.$req[0]['user_img_thumb']; }else echo base_url().'uploads/default_profile_pic.png'; ?>" alt="<?php echo $req[0]['user_firstname'] . " " .$req[0]['user_lastname']; ?>"></a></figure>
              <div class="disc">
                <h4><a  class="override_exist_styles" href="<?php echo base_url('profile/user/'.$req[0]['user_id']); ?>" ><?php  $name = $req[0]['user_firstname'] . " " .$req[0]['user_lastname']; echo substr($name,0,12); if(strlen($name)>12) echo '...'; ?></a></h4>
                 <h4><?php if($req[0]['org_name']!='' && $req[0]['position']!=''){ echo substr($req[0]['position'].' at '.$req[0]['org_name'],0,20); if(strlen($req[0]['position'].' at '.$req[0]['org_name'])>20) echo '...';}else{ echo '--'; }  ?></h4>
                <div class="dcBtn"><a class='skip addfrd_accept' id="sidebar_addfrnd<?php echo $req[0]['user_id']; ?>" href="javascript:void(0);" onclick="addFrnd(<?php echo $req[0]['user_id']; ?>);">Add</a><a class="skip addfrd_skip" onclick="skipFrnd(<?php echo $req[0]['user_id']; ?>);">Skip</a></div>
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
          
 </div><?php } ?>
