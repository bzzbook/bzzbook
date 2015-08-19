<?php 
//$this->load->model('friendsmodel'); 
$frnds = $this->friendsmodel->related_friends($limit = 0);
if(empty($frnds))
{
$add_frnd_reqs = $this->friendsmodel->finding_friends($limit = 0);
}else{
$add_frnd_reqs = $frnds;
}
?> 
<section class="col-lg-9 col-md-9 nopad">
      <div class="col-xs-12 ProfileView">
        <section class="visitorBox">
          <div class="visitiBoxInner">
            <figure class="compCover" ><img alt="" src="<?php echo base_url(); ?>images/about_banner.jpg" class="img-responsive"></figure>
              <?php  $image = $this->profile_set->get_profile_pic();
			         $data = $this->profile_set->get_userinfo($user_id = ''); ?>
                      <?php $attr = array('id' => 'upload_pfpic', 'name' => 'upload_file'); ?> 
              <?php echo form_open_multipart('profile/do_upload',$attr);?>
            <div class="profileLogo">
              <figure class="cmplogo"><img src="<?php echo base_url();?>uploads/<?php if(!empty($image[0]->user_img_thumb)) echo $image[0]->user_img_thumb; else echo 'default_profile_pic.png'; ?>" alt="<?php echo base_url();?>uploads/<?php if(!empty($image[0]->user_img_thumb)) echo $image[0]->user_img_thumb; else echo 'default_profile_pic.png'; ?>"></figure>
              <!-- <span class="inside glyphicon glyphicon-camera" ></span>--> 
            </div>
            <h4 class="profile-name"><?php echo $data[0]['user_firstname']." ".$data[0]['user_lastname'] ?></h4>
            <a href="#"><span class="glyphicon glyphicon-camera change-photo fileinput-button" aria-hidden="true"><em>Change Picture</em> <input type="file" name="userfile" id="pfpic" size="20" required/></span></a></form>
            <div class="ProfileViewNav"></div>
          </div>
        </section>
     </div>
      <section class="about-user-details">
        <div class="mfSearch">
        <h4 class="col-md-6"><span aria-hidden="true" class="glyphicon glyphicon-user"></span>Add Friends <?php /*?><?php if($add_frnd_reqs) { ?>(<?php  echo count($add_frnd_reqs); ?>) <?php } ?><?php */?></h4>
        <div class="col-md-6 pull-right">
        <div class="input-group">
          <input type="text" placeholder="Search for..." class="form-control">
          <p class="input-group-btn">
            <button type="button" class="btn btn-default glyphicon glyphicon-search">&nbsp;</button>
          </p>
        </div>
      </div>
      <div class="clearfix"></div>
        </div>
        <div class="about-user-details-inner" >
          <section class="col-lg-12 col-md-12 col-sm-5 col-xs-12 coloumn2 myfriends">
            <div class="posts">
    <div class="tabBar form-group">
      
      <div class="clearfix"></div>
    </div>
    <div class="groupEditBlock myfriends">
      <ul class="groupEditBlock"> 
           <?php if($add_frnd_reqs) { foreach($add_frnd_reqs as $req){ ?>    
        <li class="col-md-4">
        	<div class="fdblock">
        	<figure class="myfriendspfpic"><img  src="<?php if(!empty($req[0]['user_img_thumb'])) { echo base_url().'uploads/'.$req[0]['user_img_thumb']; }else echo base_url().'uploads/default_profile_pic.png'; ?>" alt="<?php echo $req[0]['user_firstname'] . " " .$req[0]['user_lastname']; ?>"></figure>
            <div class="friendInfo">
            	<h3><a href="<?php echo base_url().'profile/friend/'.$req[0]['user_id']; ?>"><?php echo character_limiter($req[0]['user_firstname'] . " " .$req[0]['user_lastname'],10); ?></a></h3>
                <span>( <?php $friendscount = $this->friendsmodel->get_frnds_frnds($req[0]['user_id']); if($friendscount) echo count($friendscount); else echo '0' ;?> friends)</span>
                 <div class="disc"><div class="dcBtn"><a href="javascript:void(0);" id="addFrnd<?php echo $req[0]['user_id']; ?>" onclick="addFollowerFrnd(<?php echo $req[0]['user_id']; ?>);">Add Friend</a></div></div>
            </div>
            </div>
      	</li>
         <?php } } else echo "No friends found."?>        
        
      </ul>
      <div class="clear"></div>
    </div>
  </div>
          </section>
          <div class="clearfix"></div>
        </div>
      </section>
    </section>
















<?php /*?><?php 
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
              <figure><img src="<?php if(!empty($req[0]['user_img_thumb'])) { echo base_url().'uploads/'.$req[0]['user_img_thumb']; }else echo base_url().'uploads/default_profile_pic.png'; ?>" alt="<?php echo $req[0]['user_firstname'] . " " .$req[0]['user_lastname']; ?>"></figure>
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
            </li>
          </ul>
          <a href="<?php echo base_url(); ?>" class="link">View all</a> 
          
 </div><?php */?>