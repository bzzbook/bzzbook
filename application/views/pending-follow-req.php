<?php 
$follow_reqs = $this->companies->getPendingFollowRequests();
$cmp_id = $this->uri->segment(3,0);
?> 
 
 <div class="pendingRequest">
          <h3>Pending Follower Requests </h3>
          <ul id="pendingReqUl">
          <?php if($follow_reqs) { foreach($follow_reqs as $req){ ?>
            <li>
              <figure><img src="<?php echo base_url().'uploads/'.$req[0]['user_img_thumb']; ?>" alt="<?php echo $req[0]['user_img_thumb']; ?>"></figure>
              <div class="disc">
                <h4><?php echo $req[0]['user_firstname']." ".$req[0]['user_lastname']; ?></h4>
                <div class="dcBtn"><a href="javascript:void(0);" onclick="acceptFollow('<?php echo $req[0]['user_id']; ?>','<?php echo $cmp_id ?>');">Confirm</a><a href="javascript:void(0);" onclick="denyFollow('<?php echo $req[0]['user_id']; ?>','<?php echo $cmp_id ?>');">Deny</a> </div>
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
          <a href="#" class="link">View all</a> 
          
 </div>