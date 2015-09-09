<?php 
//$this->load->model('friendsmodel'); 
$frnd_reqs = $this->friendsmodel->getPendingRequests($limit = 0);
if($frnd_reqs)
{
//print_r($frnd_reqs);
?> 
 
 <div class="pendingRequest">
          <h3>Pending Friend Requests </h3>
          <div id="nextItemAnim" class="pendFrnd-ul-container">
          <ul id="pendingReqUl"  class="itemControl">
          <?php if($frnd_reqs) { foreach($frnd_reqs as $req){ ?>
            <li>
              <figure><a href="<?php echo base_url('profile/user/'.$req['id']); ?>" ><img src="<?php echo base_url().'uploads/'.$req['image']; ?>" alt="<?php echo $req['image']; ?>"></a></figure>
              <div class="disc">
                <h4><a  class="override_exist_styles"  href="<?php echo base_url('profile/user/'.$req['id']); ?>" ><?php echo character_limiter($req['name'],15); ?></a></h4>
                <div class="dcBtn"><a class="skip" href="javascript:void(0);" id="pend_frnd_accept<?php echo $req['id']; ?>" onclick="acceptFrnd(<?php echo $req['id']; ?>);">Confirm</a><a class="skip" id="pend_frnd_deny<?php echo $req['id']; ?>" href="javascript:void(0);" onclick="denyFrnd(<?php echo $req['id']; ?>);">Deny</a> <a class="skip" id="pend_frnd_block<?php echo $req['id']; ?>" href="javascript:void(0);" onclick="blockFrnd(<?php echo $req['id']; ?>);">Block</a></div>
                </div>
            </li>
            <?php } }else echo "No Requests Pending!.."; ?>
           <?php /*?> <li>
              <figure><img src="<?php echo base_url(); ?>images/f2.jpg" alt=""></figure>
              <div class="disc">
                <h4>Nicholos smith</h4>
                <a href="#">Confirm</a><a href="#">Deny</a> </div>
            </li><?php */?>
          </ul>
          </div>
          <?php if(!empty($frnd_reqs)) { ?>
          <a href="<?php echo base_url('friends/view_all_pending_reqs'); ?>" class="link">View all</a> 
          <?php } ?>
 </div>
 <?php } ?>