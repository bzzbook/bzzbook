<?php 
//$this->load->model('friendsmodel'); 
$visited_users = $this->profile_set->visited_users($user_id='');

if($visited_users)
{
?> 
 
 <div class="pendingRequest">
          <h3>Recent Viewers</h3>
          <ul id="add_friends">
          <?php if($visited_users) { foreach($visited_users as $req){ ?>
            <li>
              <figure><img src="<?php if(!empty($req[0]['user_img_thumb'])) { echo base_url().'uploads/'.$req[0]['user_img_thumb']; }else echo base_url().'uploads/default_profile_pic.png'; ?>" alt="<?php echo $req[0]['user_firstname'] . " " .$req[0]['user_lastname']; ?>"></figure>
              <div class="disc">
                <h4><?php  $name = $req[0]['user_firstname'] . " " .$req[0]['user_lastname']; echo character_limiter($name, 10); ?></h4>
                
                
                   <?php 
			 $myfrnd = $this->friendsmodel->user_frnds($req[0]['user_id']);
			 if($myfrnd){
			//print_r($myfrnd);
			 if($myfrnd[0]['request_status'] == 'Y') 
				   { ?>
					   		      <div class="dcBtn"><a id="sidebar_addfrnd<?php echo $req[0]['user_id']; ?>" href="javascript:void(0);" >Friends</a></div>
                </div>
             
				<?php   }elseif( $myfrnd[0]['request_status'] == 'W'){ ?>
					   		      <div class="dcBtn"><a id="sidebar_addfrnd<?php echo $req[0]['user_id']; ?>" href="javascript:void(0);" >Request Send</a></div>
                </div>
		
				<?php } else {?>
	  <div class="dcBtn"><a id="sidebar_addfrnd<?php echo $req[0]['user_id']; ?>" href="javascript:void(0);" onclick="addFrnd(<?php echo $req[0]['user_id']; ?>);">Add Friend</a></div>
                </div>
				   <?php  }} ?>
                
                
                
                
                
              
                
                
                
                
                
            </li>
            <?php } }else echo "No Viewers Found!.."; ?>
           <?php /*?> <li>
              <figure><img src="<?php echo base_url(); ?>images/f2.jpg" alt=""></figure>
              <div class="disc">
                <h4>Nicholos smith</h4>
                <a href="#">Confirm</a><a href="#">Deny</a> </div>
            </li><?php */?>
          </ul>
          <?php if(!empty($visited_users)) { ?>
          <a href="<?php echo base_url('friends/view_all_recent_users'); ?>" class="link">View all</a> 
          <?php } ?>
          
 </div>
 <?php } ?>