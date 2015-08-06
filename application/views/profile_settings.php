 <?php  $sidebardata = $this->profile_set->editSideBarSettings(); ?>
<section class="col-lg-6 col-md-6 col-sm-5 col-xs-12 coloumn2 pfSettings">
      <h2>My Settings</h2>
      <div class="posts">
        <div role="tabpanel">
          <!-- Nav tabs -->
          <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#post_board" aria-controls="profile" role="tab" data-toggle="tab">Post Board</a></li>
            <li role="presentation"><a href="#about_me" aria-controls="messages" role="tab" data-toggle="tab">About Me</a></li>
            <li role="presentation"><a href="#business_details" aria-controls="settings" role="tab" data-toggle="tab">Business Details</a></li>
            <li role="presentation"><a href="#privacy" aria-controls="messages" role="tab" data-toggle="tab">Privacy</a></li>
            <li role="presentation"><a href="#notifications" aria-controls="settings" role="tab" data-toggle="tab">Notification</a></li>
          </ul>
         

          <!-- Tab panes -->
          <div class="tab-content">
           
            <div role="tabpanel" class="tab-pane active" id="post_board">
             <?php $image = $this->profile_set->get_profile_pic(); 	?>
			            <!-- <?php //echo base_url(); ?>images/pf_pic.png -->
              <figure class="pfpic"><span>Profile Pic</span><img src="<?php echo base_url();?>uploads/<?php if(!empty($image[0]->user_img_fav)) echo $image[0]->user_img_fav; else echo 'default_profile_pic.png';  ?>" alt="" height="159" width="146"></figure>
              
              <div class="crop_set_preview" style="display:none; width:100%; padding:0;">
			<div class="crop_preview_left" style="width:100%; padding:0;"> 
				<div class="crop_preview_box_big" id='viewimage' style="width:100%; height:auto; text-align:center;"> 
					
				</div>
			</div>
			<div class="crop_preview_right" style="margin:0 auto; float:none;">
				
				<div style="display:none;" class="crop_preview_box_small" id='thumbviewimage' style="position:relative; overflow:hidden;"> </div>
				
				<form name="thumbnail" action="<?php echo base_url();?>profile/do_upload" method="post">
					<input type="hidden" name="x1" value="" id="x1" />
					<input type="hidden" name="y1" value="" id="y1" />
					<input type="hidden" name="x2" value="" id="x2" />
					<input type="hidden" name="y2" value="" id="y2" />
					<input type="hidden" name="w" value="" id="w" />
					<input type="hidden" name="h" value="" id="h" />
					<input type="hidden" name="wr" value="" id="wr" />
					
					<input type="hidden" name="filename" value="" id="filename" />
                       <div class="crop_preview_submit"><input type="submit" name="upload_thumbnail" value="Save Thumbnail" id="save_thumb" class="submit_button" /><input type="button" class="cancel_button" onclick="location.href = '<?php echo base_url(); ?>profile/profile_setting';" value="Cancel" /> </div>
				</form>
				
			</div>
		</div>
               <?php //$attr = array('id' => 'upload_file', 'name' => 'upload_file'); ?> 
              <?php //echo form_open_multipart('profile/do_upload',$attr);?>
              <form class="uploadform" method="post" enctype="multipart/form-data" action='' name="photo">	

           <div class="upload"> <span class="btn btn-success fileinput-button"> <span>Change Picture</span> 
                <!-- The file input field used as target for the file upload widget -->
             <input type="file" name="imagefile" id="imagefile" size="20" required/>
                 
                </span> 
               <!-- <input type="hidden" value="" name="status" id="status"/> -->
                 <input type="submit" name="submitbtn" id="submitbtn"  class="btn btn-success" value="Upload"></div>
                 </form>
                 
         <?php /*?><section>
            <div class="container">
            
                <div class="crop_box">
            <form class="ppuploadform" method="post" enctype="multipart/form-data" action='' name="photo">	
                <div class="crop_set_upload">
                    <div class="crop_upload_label">Upload files: </div>
                    <div class="crop_select_image"><div class="file_browser"><input type="file" name="imagefile" id="imagefile" class="hide_broswe" /></div></div>
                    <div class="crop_select_image"><input type="submit" value="Upload" class="upload_button" name="userpropicbtn" id="submitbtn" /></div><div id="loadingimage" style="padding-top:15px;"></div>
                </div>
            </form>			
                    <div class="crop_set_preview" style="display:none;">
                        <div class="crop_preview_left"> 
                            <div class="crop_preview_box_big" id='viewimage'> 
                                
                            </div>
                        </div>
                        <div class="crop_preview_right">
                            Preview (150x150 px)
                            <div class="crop_preview_box_small" id='thumbviewimage' style="position:relative; overflow:hidden;"> </div>
                            
                            <form name="thumbnail" action="<?php echo base_url();?>profile/profile_pic_thumb" method="post">
                                <input type="hidden" name="x1" value="" id="x1" />
                                <input type="hidden" name="y1" value="" id="y1" />
                                <input type="hidden" name="x2" value="" id="x2" />
                                <input type="hidden" name="y2" value="" id="y2" />
                                <input type="hidden" name="w" value="" id="w" />
                                <input type="hidden" name="h" value="" id="h" />
                                <input type="hidden" name="wr" value="" id="wr" />
                                
                                <input type="hidden" name="filename" value="" id="filename" />
                                <div class="crop_preview_submit"><input type="submit" name="upload_thumbnail" value="Save Thumbnail" id="save_thumb" class="submit_button" /> </div>
                            </form>
                            
                        </div>
                    </div>
                </div>
                
            </div>
</section><?php */?>
       
                 <h4>Location Info</h4>
               <form name="postboard" id="postboard" method="POST" action="">
             <div class="field col-md-6 ">
           	<select class="form-control" name="country"  onchange="print_state('state',this.selectedIndex);"  id="country">
			<option value=""></option>
			</select> 
         	</div> 
          	<div class="field col-md-6 ">
           <select name="state" id="state" class="form-control">
           <option value=""></option>
           </select>
         	</div>
             <div class="filed col-md-6">
                <input type="text" class="form-control" placeholder="City" value="<?php echo $user[0]->user_city ?>" name="city" >
              </div> 
              
              <div class="filed col-md-6">
                 <input type="text" class="form-control" placeholder="Zip Code" value="<?php echo $user[0]->user_postalcode ?>" name="postal_code">
              </div>
              <h4 class="clear">Username Info</h4>
              <div class="filed col-md-6">
                 <input type="text" class="form-control" placeholder="Username" value="<?php echo $user[0]->username ?>" name="user_name" readonly >
              </div>
              <div class="filed col-md-6">
                 <input type="text" class="form-control" placeholder="First Name" value="<?php echo $user_info[0]->user_firstname ?>" name="firstname" >
              </div>
              <div class="filed col-md-6">
                <input type="text" class="form-control" placeholder="Last Name" value="<?php echo $user_info[0]->user_lastname ?>" name="lastname" >
              </div>
              <div class="filed col-md-6">
                <input type="text" class="form-control" placeholder="Email" value="<?php echo $user[0]->user_email ?>" name="email" readonly>
              </div>
             
              <h4 class="clear">Job Info</h4>
              <div class="filed col-md-6">
                  <input type="text" class="form-control" placeholder="Job Title" value="<?php echo $user_info[0]->user_jobtype ?>" name="position" >
              </div>
              <div class="filed col-md-6 select">
                <select class="form-control" name="industry">
                   <?php foreach($industry as $industries):?>
                 <option value="<?php echo $industries->lookup_value;?>"
				 <?php if($user_info[0]->user_industry == $industries->lookup_value){
					 echo "selected=selected";
				 }?>><?php echo $industries->lookup_value ?></option>
                 <?php endforeach;?> 
                </select>
              </div>
              <div class="filed col-md-6">
               <input type="text" class="form-control" placeholder="Other Industry" value="" name="oth_industry" >
              </div>
              <div class="filed col-md-6">
                <input type="text" class="form-control" placeholder="Company Name" value="<?php echo $user_info[0]->user_cmpname ?>" name="companyname" >
              </div>
              <div class="filed col-md-12">
               <input type="submit" class="fmbtn" value="Update Settings">
              </div>
              <div class="clear"></div>
              </form>
               <h4 class="clear">Password Info</h4>
             <form name="pf_pwd_change" id="pf_pwd_change" method="post">
                 <div class="filed col-md-12">
               <input type="button" class="fmbtn" id="pwd_change_btn" value="Change Password">
              </div>
              <div class="clear"></div>
              <div id="change_pwd">
               <div class="filed col-md-6">
                 <input type="password" class="form-control"  placeholder="Enter Old Password" id="pwd" onblur="pwdchange()" name="password" data-rule-required="true" data-msg-required="please enter current password">
              </div>
              <div class="clear"></div>
              <div class="filed col-md-6">
                  <input type="password" class="form-control" placeholder="New Password" id="npwd"  name="new_password"   data-rule-required="true" data-msg-required="please enter your password">
              </div>
              <div class="filed col-md-6">
               <input type="password" class="form-control" placeholder="Confirm Password" id="cnpwd"  name="con_new_password"  data-rule-required="true" 				 	
            data-msg-required="please Enter Confirm password" data-rule-equalto="#npwd" 
            data-msg-equalto="Confirm password should match with password">
              </div>
              <div id="change_pwd_error">
              </div>
              <div class="filed col-md-12">
               <input type="submit" class="fmbtn" value="Update Password">
              </div>
              </div>
              </form>
            </div>
            <div role="tabpanel" class="tab-pane" id="about_me">
              <h4 class="clear">About Me Info</h4>
             <form action="" name="formabout_me">
                	 <div class="filed col-md-12">
                <textarea cols="" rows="" class="form-control" name="about_me_info" ><?php echo $user_info[0]->user_about ?></textarea>
                <input type="submit" class="smbtn" value="Save">
              </div>
                 <h4 class="clear">Your Interests</h4>
              <div class="filed col-md-12">
                <textarea cols="" rows="" class="form-control" name="about_me_intrests"><?php echo $user_info[0]->user_intrests ?></textarea>
                <input type="submit" class="smbtn" value="Save">
              </div>
                 <h4 class="clear">Your Skills</h4>
              <div class="filed col-md-12">
                <textarea cols="" rows="" class="form-control" name="about_me_skills"><?php echo $user_info[0]->user_skills;?></textarea>
                <input type="submit" class="smbtn" value="Save">
              </div>
              
              <h4 class="clear">Educational Background</h4>
              <div class="posts">
        		<div class="groupMainBlock">
        			<?php if($education_details) $this->load->view('education_field'); else echo "Please add education details";?>
        		</div>
			  </div>
              <div class="filed col-md-12">
               <input type="button" class="add" data-toggle="modal" data-target="#eduModal" value="Add Education" onclick="addeducation();"/>
              </div>
              <h4 class="clear">Contact Details</h4>
             <div class="filed col-md-6">
                <input type="text" class="form-control" placeholder="Email" value="<?php echo $user[0]->user_email ?>" readonly>
              </div>
              <div class="filed col-md-6">
                <input type="text" class="form-control" placeholder="Phone" value="<?php echo $user_info[0]->user_phoneno ?>">
              </div>
              <div class="filed col-md-6">
                <input type="text" class="form-control" placeholder="Office"  value="<?php echo $user_info[0]->user_officephone ?>">
              </div>
              <div class="filed col-md-6">
                <input type="text" class="form-control" placeholder="Fax"  value="<?php echo $user_info[0]->user_fax ?>">
                <input type="submit" class="smbtn" value="Save">
              </div>
              </form>
              <!--<div class="filed col-md-6">
                <input type="submit" class="fmbtn" value="Upload Settings">
              </div>-->
              <div class="clear"></div>
            </div>
            <div role="tabpanel" class="tab-pane" id="business_details">
              <h4 class="clear">Professional Experience</h4>
              <div class="posts">
        		<div class="groupMainBlock1">
        			<?php  if($profession_details) $this->load->view('profession_field'); else echo "Please add experience"; ?>  	
        		</div>
        		</div>
              <div class="filed col-md-12">
                <input type="submit" class="add" data-toggle="modal" data-target="#profModal"  value="add experience" onclick="addexp();">
              </div>
              <h4 class="clear">Organizations</h4>
              <div class="posts">
        		<div class="groupMainBlock2">
        			<?php if($organization_details) $this->load->view('organization_field'); else echo "Please add organization details  ";?>  	
        		</div>
        		</div>
              <div class="filed col-md-12">
                <input type="submit" class="add" data-toggle="modal" data-target="#orgModal" value="add Organizations" onclick="addorg();">
              </div>
              <h4 class="clear">Groups</h4>
              <div class="posts">
               <div class="groupMainBlock3">
        			<?php  if($group_details) $this->load->view('group_field'); else echo "Please Add Groups";?> 
       			 </div>
       			 </div>
              <div class="filed col-md-12">
                <input type="submit" class="add" data-toggle="modal" data-target="#grpModal" value="add Groups" onclick="addgroup()">
              </div>
              <div class="clear"></div>
            </div>
            <div role="tabpanel" class="tab-pane" id="privacy">
             	<h4 class="clear">Visibility Settings</h4>
                <form method="post" name="privacy_form" id="privacy_form" >
              <div class="radio">
                <label for="notifications">Make my Profile visible to non friends:</label>
                <div class="pull-right">
                <label class="radio-inline">
                	<?php
						if($user_set[0]->profile_visible == 'Y')
							$profileyes_check = "checked";
						else
							$profileno_check = "checked";
					?>
                  <input type="radio" id="inlineRadio1" value="Y" name="profile_visible" <?php echo @$profileyes_check?>>
                  Yes </label>
                <label class="radio-inline">
                  <input type="radio" id="inlineRadio2" value="N" name="profile_visible" <?php echo @$profileno_check?>>
                  No </label>
                  </div>
              </div>
              <div class="radio">
              <?php
						if($user_set[0]->comments_visible == 'Y')
							$commentsyes_check = "checked";
						else
							$commentsno_check = "checked";
					?>
                <label for="notifications">Make my comments visible to non friends:</label>
                <div class="pull-right">
                <label class="radio-inline">
                  <input type="radio" id="inlineRadio1" value="Y" name="comments_visible" <?php echo @$commentsyes_check?>>
                  Yes </label>
                <label class="radio-inline">
                  <input type="radio" id="inlineRadio2" value="N" name="comments_visible" <?php echo @$commentsno_check?>>
                  No </label>
                  </div>
              </div>
              <div class="radio">
              <?php
			  
						if($user_set[0]->companies_visible == 'Y')
							$companiesyes_check = "checked";
						else
							$companiesno_check = "checked";
					?>
                <label for="notifications">Show my companies that I follow to non friends:</label>
                <div class="pull-right">
                <label class="radio-inline">
                  <input type="radio" value="Y" name="companies_visible" <?php echo @$companiesyes_check?>>
                  Yes </label>
                <label class="radio-inline">
                  <input type="radio" value="N" name="companies_visible" <?php echo @$companiesno_check?>>
                  No </label>
                  </div>

              </div>
             <div class="filed col-md-12">
                <input type="submit" value="Update" class="fmbtn">
              </div>
              </form>
              <div class="clear"></div>
            </div>
            <div role="tabpanel" class="tab-pane" id="notifications">
             <h4 class="clear">Notification Settings</h4>
             <form method="post" name="privacy_form" id="emailnotification" >
              <div class="radio">
               <?php
			  
						if($user_set[0]->email_notification == 'Y')
							$notificationsyes_check = "checked";
						else
							$notificationsno_check = "checked";
					?>
              
                <label for="notifications">Send Notifications To My email:</label>
                <div class="pull-right">
                <label class="radio-inline">
                  <input type="radio"  value="Y" name="email_notofication" <?php echo @$notificationsyes_check?>>
                  Yes </label>
                <label class="radio-inline">
                  <input type="radio"  value="N" name="email_notofication" <?php echo @$notificationsno_check?>>
                  No </label>
                  </div>
                <div class="filed col-md-12">
                <input type="submit" class="fmbtn" value="Upload Settings">
              </div>
              </div>
              </form>
              <div class="clear"></div>
              
              
              
              <h4 class="clear">SideBar Visible Settings</h4>
             
       <form method="post" id="newone" name="newone" >
             
             <?php if($sidebardata){ //foreach($sidebardata as $sidebardata) { ?>
             <div class="radio">
                <label for="notifications">Pending friend Requests:</label>
                <div class="pull-right">
                <label class="radio-inline">
                	<?php
						if($sidebardata[0]->pend_frnd_requests == 'Y')
							$pend_frnd_requests_yes = "checked";
						else
							$pend_frnd_requests_no = "checked";
					?>
                  <input type="radio" id="inlineRadio1" value="Y" name="pend_frnd_req" <?php echo @$pend_frnd_requests_yes?>>
                  Yes </label>
                <label class="radio-inline">
                  <input type="radio" id="inlineRadio2" value="N" name="pend_frnd_req" <?php echo @$pend_frnd_requests_no?>>
                  No </label>
                  </div>
              </div>
                 
             <div class="radio">
                <label for="notifications">Latest friends:</label>
                <div class="pull-right">
                <label class="radio-inline">
                	<?php
						if($sidebardata[0]->latest_frnds == 'Y')
							$latest_frnds_yes_check = "checked";
						else
							$latest_frnds_no_check = "checked";
					?>
                  <input type="radio" id="inlineRadio1" value="Y" name="latest_frnds" <?php echo @$latest_frnds_yes_check?>>
                  Yes </label>
                <label class="radio-inline">
                  <input type="radio" id="inlineRadio2" value="N" name="latest_frnds" <?php echo @$latest_frnds_no_check?>>
                  No </label>
                  </div>
              </div>
             
              <div class="radio">
                <label for="notifications">Your Add One:</label>
                <div class="pull-right">
                <label class="radio-inline">
                	<?php
						if($sidebardata[0]->your_add_one == 'Y')
							$add_one_yes_check = "checked";
						else
							$add_one_no_check = "checked";
					?>
                  <input type="radio" id="inlineRadio1" value="Y" name="your_add_one" <?php echo @$add_one_yes_check?>>
                  Yes </label>
                <label class="radio-inline">
                  <input type="radio" id="inlineRadio2" value="N" name="your_add_one" <?php echo @$add_one_no_check?>>
                  No </label>
                  </div>
              </div>
             
                 
              <div class="radio">
                <label for="notifications">Add Friends :</label>
                <div class="pull-right">
                <label class="radio-inline">
                	<?php
						if($sidebardata[0]->add_friends == 'Y')
							$add_friends_yes_check = "checked";
						else
							$add_friends_no_check = "checked";
					?>
                  <input type="radio" id="inlineRadio1" value="Y" name="add_frnds" <?php echo @$add_friends_yes_check?>>
                  Yes </label>
                <label class="radio-inline">
                  <input type="radio" id="inlineRadio2" value="N" name="add_frnds" <?php echo @$add_friends_no_check?>>
                  No </label>
                  </div>
              </div>
              
               <div class="radio">
                <label for="notifications"> Companies to Follow :</label>
                <div class="pull-right">
                <label class="radio-inline">
                	<?php
						if($sidebardata[0]->companies_to_follow == 'Y')
							$companies_to_follow_yes_check = "checked";
						else
							$companies_to_follow_no_check = "checked";
					?>
                  <input type="radio" id="inlineRadio1" value="Y" name="cmps_to_follow" <?php echo @$companies_to_follow_yes_check?>>
                  Yes </label>
                <label class="radio-inline">
                  <input type="radio" id="inlineRadio2" value="N" name="cmps_to_follow" <?php echo @$companies_to_follow_no_check?>>
                  No </label>
                  </div>
              </div>
              
              
               <div class="radio">
                <label for="notifications">Companies I'm Following:</label>
                <div class="pull-right">
                <label class="radio-inline">
                	<?php
						if($sidebardata[0]->companies_im_following == 'Y')
							$cmp_im_following_yes_check = "checked";
						else
							$cmp_im_following_no_check = "checked";
					?>
                  <input type="radio" id="inlineRadio1" value="Y" name="user_following_cmps" <?php echo @$cmp_im_following_yes_check?>>
                  Yes </label>
                <label class="radio-inline">
                  <input type="radio" id="inlineRadio2" value="N" name="user_following_cmps" <?php echo @$cmp_im_following_no_check?>>
                  No </label>
                  </div>
              </div>
              
              
               <div class="radio">
                <label for="notifications">Your Add Two:</label>
                <div class="pull-right">
                <label class="radio-inline">
                	<?php
						if($sidebardata[0]->your_add_two == 'Y')
							$add_two_yes_check = "checked";
						else
							$add_two_no_check = "checked";
					?>
                  <input type="radio" id="inlineRadio1" value="Y" name="your_add_two" <?php echo @$add_two_yes_check?>>
                  Yes </label>
                <label class="radio-inline">
                  <input type="radio" id="inlineRadio2" value="N" name="your_add_two" <?php echo @$add_two_no_check?>>
                  No </label>
                  </div>
              </div>
              
              
              
               <div class="radio">
                <label for="notifications">My Companies:</label>
                <div class="pull-right">
                <label class="radio-inline">
                	<?php
						if($sidebardata[0]->my_companies == 'Y')
							$my_cmps_yes_check = "checked";
						else
							$my_cmps_no_check = "checked";
					?>
                  <input type="radio" id="inlineRadio1" value="Y" name="my_cmps" <?php echo @$my_cmps_yes_check?>>
                  Yes </label>
                <label class="radio-inline">
                  <input type="radio" id="inlineRadio2" value="N" name="my_cmps" <?php echo @$my_cmps_no_check?>>
                  No </label>
                  </div>
              </div>
              
              
              <div class="radio">
                <label for="notifications">Profile Visited Users:</label>
                <div class="pull-right">
                <label class="radio-inline">
                	<?php
						if($sidebardata[0]->recent_viewers  == 'Y')
							$user_visits_check = "checked";
						else
							$user_visits_check = "checked";
					?>
                  <input type="radio" id="inlineRadio1" value="Y" name="visited_users" <?php echo @$user_visits_check?>>
                  Yes </label>
                <label class="radio-inline">
                  <input type="radio" id="inlineRadio2" value="N" name="visited_users" <?php echo @$user_visits_check?>>
                  No </label>
                  </div>
              </div>
              
              <div class="filed col-md-12">
                <input type="submit" class="fmbtn" value="Save Changes">
              </div>
              <?php }// } ?>
             
</form>
   
              </div>
          </div>
        </div>
      </div>
    </section>
    
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>cropimage/css/cropimage.css" />
<link type="text/css" href="<?php echo base_url(); ?>cropimage/css/imgareaselect-default.css" rel="stylesheet" />
