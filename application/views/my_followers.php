<section class="col-lg-9 col-md-9 nopad">
      <div class="col-xs-12 ProfileView">
        <section class="visitorBox">
          <div class="visitiBoxInner">
            <figure class="compCover"><img alt="" src="<?php echo base_url(); ?>images/about_banner.jpg" class="img-responsive"></figure>
              <?php  $image = $this->profile_set->get_profile_pic();
			         $data = $this->profile_set->get_userinfo(); ?>
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
        <h4 class="col-md-6"><span aria-hidden="true" class="glyphicon glyphicon-user"></span>Friends<?php if($friends) { ?>( <?php  echo count($friends); ?> ) <?php } ?></h4>
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
             
        <li class="col-md-4">
        	<div class="fdblock">
        	<figure class="myfriendspfpic"><img alt="<?php echo base_url();?>uploads/<?php echo $frnd['image'] ?>" src="<?php echo base_url();?>uploads/<?php echo $frnd['image'] ?>" ></figure>
            <div class="friendInfo">
            	<h3><a href=""></a></h3>
                <span>(friends)</span>
               
            </div>
            </div>
      	</li>
      
        
      </ul>
      <div class="clear"></div>
    </div>
  </div>
          </section>
          <div class="clearfix"></div>
        </div>
      </section>
    </section>