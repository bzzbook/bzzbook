<?php 
//$this->load->model('friendsmodel'); 
$frnds = $this->friendsmodel->related_friends();
if(empty($frnds))
{
$add_frnd_reqs = $this->friendsmodel->finding_friends();
}else{
$add_frnd_reqs = $frnds;
}
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
          <a href="<?php echo base_url(); ?>friends/view_all_reqs" class="link">View all</a> 
          
 </div>









<?php /*?><section class="col-lg-9 col-md-9 nopad">
      <div class="col-xs-12 ProfileView">
        <section class="visitorBox">
          <div class="visitiBoxInner">
            <figure class="compCover"><img alt="" src="<?php echo base_url(); ?>images/about_banner.jpg" class="img-responsive"></figure>
              <?php  $image = $this->profile_set->get_profile_pic();
			         $data = $this->profile_set->get_userinfo(); ?>
                      <?php $attr = array('id' => 'upload_pfpic', 'name' => 'upload_file'); ?> 
              <?php echo form_open_multipart('profile/do_upload',$attr);?>
            <div class="profileLogo">
              <figure class="cmplogo"><img src="<?php echo base_url();?>uploads/<?php echo $image[0]->user_img_thumb ?>" alt="<?php echo base_url();?>uploads/<?php echo $image[0]->user_img_thumb ?>"></figure>
              <!-- <span class="inside glyphicon glyphicon-camera" ></span>--> 
            </div>
            <h4 class="profile-name"><?php echo $data[0]['user_firstname']." ".$data[0]['user_lastname'] ?></h4>
            <a href="#"><span class="glyphicon glyphicon-camera change-photo fileinput-button" aria-hidden="true"><em>Change Picture</em> <input type="file" name="userfile" id="pfpic" size="20" required/></span></a></form>
            <div class="ProfileViewNav"></div>
          </div>
        </section>
      </div>
     <?php */?>