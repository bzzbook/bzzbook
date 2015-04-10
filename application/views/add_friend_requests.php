<?php 
//$this->load->model('friendsmodel'); 
$add_frnd_reqs = $this->friendsmodel->related_friends();
?> 
 
 <div class="pendingRequest">
          <h3>Add Friends </h3>
          <ul id="add_friends">
          <?php if($add_frnd_reqs) { foreach($add_frnd_reqs as $req){ ?>
            <li>
              <figure><img src="<?php echo base_url().'uploads/'.$req[0]['user_img_thumb']; ?>" alt="<?php echo $req[0]['user_firstname'] . " " .$req[0]['user_lastname']; ?>"></figure>
              <div class="disc">
                <h4><?php echo $req[0]['user_firstname'] . " " .$req[0]['user_lastname']; ?></h4>
                <div class="dcBtn"><a href="javascript:void(0);" onclick="addFrnd(<?php echo $req[0]['user_id']; ?>);">Add Friend</a></div>
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
          <a href="#" class="link">View all</a> 
          
 </div>