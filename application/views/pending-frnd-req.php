<?php 
//$this->load->model('friendsmodel'); 
$frnd_reqs = $this->friendsmodel->getPendingRequests();

?> 
 
 <div class="pendingRequest">
          <h3>Pending Friend Requests </h3>
          <ul id="pendingReqUl">
          <?php if($frnd_reqs) { foreach($frnd_reqs as $req){ ?>
            <li>
              <figure><img src="<?php echo base_url().'uploads/'.$req['image']; ?>" alt="<?php echo $req['image']; ?>"></figure>
              <div class="disc">
                <h4><?php echo $req['name']; ?></h4>
                <div class="dcBtn"><a href="javascript:void(0);" onclick="acceptFrnd(<?php echo $req['id']; ?>);">Confirm</a><a href="javascript:void(0);" onclick="denyFrnd(<?php echo $req['id']; ?>);">Deny</a> <a href="javascript:void(0);" onclick="blockFrnd(<?php echo $req['id']; ?>);">Block</a></div>
                </div>
            </li>
            <?php } }else echo "No Requests Pending"; ?>
           <?php /*?> <li>
              <figure><img src="<?php echo base_url(); ?>images/f2.jpg" alt=""></figure>
              <div class="disc">
                <h4>Nicholos smith</h4>
                <a href="#">Confirm</a><a href="#">Deny</a> </div>
            </li><?php */?>
          </ul>
          <a href="<?php echo base_url('friends/view_all_pending_reqs'); ?>" class="link">View all</a> 
          
 </div>