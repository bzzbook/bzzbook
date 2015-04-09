<?php $friends = $this->friendsmodel->getfriends();  
?>

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
             <?php 
			 if(isset($_POST['seachgroupsinput']))
				$groups = $this->profile_set->get_user_groups($_POST['seachgroupsinput']);
				else
				$groups = $this->profile_set->get_user_groups();
				$options = '';
				if($groups)
				{
				foreach($groups as $group)
				{
					$options.="<option value='".$group['group_id']."'>".$group['group_name']."</option>";
				}
				}
			 if($friends){
			 foreach($friends as $frnd){ ?>
        <li class="col-md-4">
        	<div class="fdblock">
        	<figure class="myfriendspfpic"><img alt="<?php echo base_url();?>uploads/<?php echo $frnd['image'] ?>" src="<?php echo base_url();?>uploads/<?php echo $frnd['image'] ?>" ></figure>
            <div class="friendInfo">
            	<h3><a href="<?php echo base_url().'profile/friend/'.$frnd['id']; ?>"><?php echo $frnd['name']?></a></h3>
                <span>( <?php $friendscount = $this->friendsmodel->get_frnds_frnds($frnd['id']); if($friendscount) echo count($friendscount); else echo '0' ;?> friends)</span>
                <div class="select">
                	<select onchange="movetogroup(<?php echo $frnd['id']; ?>,this.value)">
                    	<option value="0">Select group</option>
                    	<?php echo $options; ?>
                    </select>
                </div>
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


<?php /*?><section class="col-lg-6 col-md-6 col-sm-5 col-xs-12 coloumn2 aboutme">
      <h2>About Me</h2>
      <div class="posts">
      <div class="col-md-5">
        <ul class="nav-tabs" role="tablist" id="myTab">
        <li role="presentation" class="active"><a href="#About" aria-controls="home" role="tab" data-toggle="tab">About</a></li>
        <li role="presentation"><a href="#educational" aria-controls="profile" role="tab" data-toggle="tab">Educational Background </a></li>
        <li role="presentation"><a href="#Contact" aria-controls="messages" role="tab" data-toggle="tab">Contact Details </a></li>
        </ul>
      </div>  
        <div class="tab-content col-md-7">
        <div role="tabpanel" class="tab-pane active" id="About">
        <h4>Overview</h4>
        <p><?php echo $result[0]->user_about ?></p>
        <h4>Intrest</h4>
        <p><?php echo $result[0]->user_intrests ?> </p>
        </div>
       
        <div role="tabpanel" class="tab-pane" id="educational">
         <?php if($education_details) { foreach($education_details as $edu): ?>
        <h4>Institution:</h4>
        <p><?php echo $edu->college_institution; ?></p>
        <h4>Field of Study:</h4>
        <p><?php echo $edu->field_of_study; ?></p>
        <h4>Degree/Certificate:</h4>
        <p><?php echo $edu->degree_certificate; ?></p>
        <h4>Years Attended:</h4>
        <p><?php echo $edu->attended_from; ?> To <?php echo $edu->attended_upto; ?> </p>
        <h4>Specialized Studies:</h4>
        <p><?php echo $edu->specialised_studies; ?></p>
          <?php endforeach; } else echo "No Details Found";?>
        </div>
      
        <div role="tabpanel" class="tab-pane" id="Contact">
         <h4>Email:</h4>
        <p><?php echo $user[0]->user_email;?></p>
         <h4>Phone:</h4>
        <p><?php echo $result[0]->user_phoneno;?></p>
         <h4>Office:</h4>
        <p><?php echo $result[0]->user_cmpname;?></p>
         <h4>Fax:</h4>
        <p><?php echo $result[0]->user_fax;?></p>
        </div>
        </div>
        <div class="clear"></div>
      </div>
    </section><?php */?>
<?php /*?>

<section class="col-lg-6 col-md-6 col-sm-5 col-xs-12 coloumn2 groupsSt">
  <h2>My friends</h2>
  <div class="posts">
    <div class="tabBar form-group">
      <div class="col-md-6"> <span>Showing All Friends ( <?php  echo count($friends); ?> ) </span> </div>
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
    <div class="groupEditBlock myfriends">
      <ul class="groupEditBlock"> 
             <?php 
			 if(isset($_POST['seachgroupsinput']))
				$groups = $this->profile_set->get_user_groups($_POST['seachgroupsinput']);
				else
				$groups = $this->profile_set->get_user_groups();
				$options = '';
				if($groups)
				{
				foreach($groups as $group)
				{
					$options.="<option value='".$group['group_id']."'>".$group['group_name']."</option>";
				}
				}
			 if($friends){
			 foreach($friends as $frnd){ ?>
        <li class="col-md-6">
        	<div class="fdblock">
        	<figure class="myfriendspfpic"><img alt="<?php echo base_url();?>uploads/<?php echo $frnd['image'] ?>" src="<?php echo base_url();?>uploads/<?php echo $frnd['image'] ?>" ></figure>
            <div class="friendInfo">
            	<h4><a href="<?php echo base_url().'profile/friend/'.$frnd['id']; ?>"><?php echo $frnd['name']?></a></h4>
                <span>( <?php $friendscount = $this->friendsmodel->get_frnds_frnds($frnd['id']); if($friendscount) echo count($friendscount); else echo '0' ;?> friends)</span>
                <div class="select">
                	<select onchange="movetogroup(<?php echo $frnd['id']; ?>,this.value)">
                    	<option value="0">Select group</option>
                    	<?php echo $options; ?>
                    </select>
                </div>
            </div>
            </div>
      	</li>
         <?php } } else echo "No friends found."?>        
        
      </ul>
      <div class="clear"></div>
    </div>
  </div>
</section>
<?php */?>