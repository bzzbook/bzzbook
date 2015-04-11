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
              <figure class="cmplogo"><img src="<?php echo base_url();?>uploads/<?php echo $image[0]->user_img_thumb ?>" alt="<?php echo base_url();?>uploads/<?php echo $image[0]->user_img_thumb ?>"></figure>
              <!-- <span class="inside glyphicon glyphicon-camera" ></span>--> 
            </div>
            <h4 class="profile-name"><?php echo $data[0]['user_firstname']." ".$data[0]['user_lastname'] ?></h4>
            <a href="#"><span class="glyphicon glyphicon-camera change-photo fileinput-button" aria-hidden="true"><em>Change Picture</em> <input type="file" name="userfile" id="pfpic" size="20" required/></span></a></form>
            <div class="ProfileViewNav"></div>
          </div>
        </section>
      </div>
      <section class="about-user-details">
        <div class="memSearch">
        <h4 class="col-md-6"><span aria-hidden="true" class="glyphicon glyphicon-user" ></span>Search Friends</h4>
        <div class="col-md-6 pull-right">
        <div class="input-group">
          <input type="text" placeholder="Search for..." class="form-control" id="search_frnds">
          <p class="input-group-btn">
            <button type="button" class="btn btn-default glyphicon glyphicon-search" id="search_members">&nbsp;</button>
          </p>
        </div>
      </div>
      <div class="clearfix"></div>
        </div>
        <div class="groupEditBlock myfriends">
      <ul class="groupEditBlock"> 
            
        <li class="col-md-4">
        	<div class="fdblock">
        	<figure class="myfriendspfpic"><img alt="<?php echo base_url();?>uploads/<?php echo $frnd['image'] ?>" src="<?php echo base_url();?>uploads/<?php echo $frnd['image'] ?>" ></figure>
            <div class="friendInfo">
            	<h3><a href="<?php echo base_url().'profile/friend/'.$frnd['id']; ?>"><?php echo $frnd['name']?></a></h3>
                <span>( <?php $friendscount = $this->friendsmodel->get_frnds_frnds($frnd['id']); if($friendscount) echo count($friendscount); else echo '0' ;?> friends)</span>
                
            </div>
            </div>
      	</li>   
      </ul>
      <div class="clear"></div>
    </div>
        
      </section>
    </section>