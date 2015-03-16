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
           <?php foreach($result as $r) { ?>
            <div role="tabpanel" class="tab-pane active" id="post_board">
             <?php $data = $this->profile_set->get_profile_pic(); 	?>
			<?php	foreach($data as $image){
			?>
            <!-- <?php //echo base_url(); ?>images/pf_pic.png -->
              <figure class="pfpic"><span>Profile Pic</span><img src="<?php echo base_url();?>uploads/<?php echo $image->filename; ?>" alt="" height="159" width="146"></figure>
               <?php $attr = array('id' => 'upload_file', 'name' => 'upload_file'); ?> 
              <?php echo form_open_multipart('profile/do_upload',$attr);?>
              <?php } ?>
           <div class="upload"> <span class="btn btn-success fileinput-button"> <span>Change Picture</span> 
                <!-- The file input field used as target for the file upload widget -->
             <input type="file" name="userfile" id="userfile" size="20" required/>
                 
                </span> 
               <!-- <input type="hidden" value="" name="status" id="status"/> -->
                 <input type="submit" class="btn btn-success" value="upload"></div>
                 </form>
                 <h4>Location Info</h4>
               <form name="postboard" id="postboard" method="POST" action="">
             <div class="field col-md-6">
           	<select class="form-control" name="country"  onchange="print_state('state',this.selectedIndex);"  id="country">
			<option value=""></option>
			</select> 
         	</div> 
          	<div class="field col-md-6">
           <select name="state" id="state" class="form-control">
           <option value=""></option>
           </select>
         	</div>
             <div class="filed col-md-6">
                <input type="text" class="form-control" placeholder="City" value="<?php echo $r->city ?>" name="city" >
              </div> 
              
              <div class="filed col-md-6">
                 <input type="text" class="form-control" placeholder="Zip Code" value="<?php echo $r->postal_code ?>" name="postal_code">
              </div>
              <h4 class="clear">Username Info</h4>
              <div class="filed col-md-6">
                 <input type="text" class="form-control" placeholder="Username" value="<?php echo $r->user_name ?>" name="user_name" readonly >
              </div>
              <div class="filed col-md-6">
                 <input type="text" class="form-control" placeholder="First Name" value="<?php echo $r->first_name ?>" name="firstname" >
              </div>
              <div class="filed col-md-6">
                <input type="text" class="form-control" placeholder="Last Name" value="<?php echo $r->last_name ?>" name="lastname" >
              </div>
              <div class="filed col-md-6">
                <input type="text" class="form-control" placeholder="Email" value="<?php echo $r->email ?>" name="email" >
              </div>
              <h4 class="clear">Password Info</h4>
              <div class="filed col-md-6">
                 <input type="password" class="form-control" placeholder="Password" id="pwd" onBlur="pwdchange()" name="password">
              </div>
              <div class="clear"></div>
              <div class="filed col-md-6">
                  <input type="password" class="form-control" placeholder="New Password" id="npwd"  name="password">
              </div>
              <div class="filed col-md-6">
               <input type="password" class="form-control" placeholder="Confirm Password" id="cnpwd"  name="con_password">
              </div>
              <h4 class="clear">Job Info</h4>
              <div class="filed col-md-6">
                  <input type="text" class="form-control" placeholder="Job Title" value="<?php echo $r->job_type ?>" name="position" >
              </div>
              <div class="filed col-md-6">
                <select class="form-control" name="industry">
                   <?php foreach($industry as $industries):?>
                 <option value="<?php echo $industries->lookup_value;?>"
				 <?php if($r->industry == $industries->lookup_value){
					 echo "selected=selected";
				 }?>><?php echo $industries->lookup_value ?></option>
                 <?php endforeach;?> 
                </select>
              </div>
              <div class="filed col-md-6">
               <input type="text" class="form-control" placeholder="Other Industry" value="" name="oth_industry" >
              </div>
              <div class="filed col-md-6">
                <input type="text" class="form-control" placeholder="Company Name" value="<?php echo $r->company_name ?>" name="companyname" >
              </div>
              <div class="filed col-md-6">
               <input type="submit" class="fmbtn" value="Update Settings">
              </div>
              <div class="clear"></div>
              </form>
            </div>
            <div role="tabpanel" class="tab-pane" id="about_me">
              <h4 class="clear">About Me Info</h4>
             <form action="" name="formabout_me">
                	 <div class="filed col-md-12">
                <textarea cols="" rows="" class="form-control" name="about_me_info" ><?php echo $r->about ?></textarea>
                <input type="submit" class="smbtn" value="Save">
              </div>
              <div class="filed col-md-12">
                <textarea cols="" rows="" class="form-control" name="about_me_intrests"><?php echo $r->intrests?></textarea>
                <input type="submit" class="smbtn" value="Save">
              </div>
              <div class="filed col-md-12">
                <textarea cols="" rows="" class="form-control" name="about_me_skills"><?php echo $r->skills;?></textarea>
                <input type="submit" class="smbtn" value="Save">
              </div>
              </form>
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
                <input type="text" class="form-control" placeholder="Email" value="<?php echo $r->email ?>" >
              </div>
              <div class="filed col-md-6">
                <input type="text" class="form-control" placeholder="Phone" value="<?php echo $r->phone_number ?>">
              </div>
              <div class="filed col-md-6">
                <input type="text" class="form-control" placeholder="Office">
              </div>
              <div class="filed col-md-6">
                <input type="text" class="form-control" placeholder="Fax">
                <input type="submit" class="smbtn" value="Save">
              </div>
              <div class="filed col-md-6">
                <input type="submit" class="fmbtn" value="Upload Settings">
              </div>
              <div class="clear"></div>
            </div>
            <div role="tabpanel" class="tab-pane" id="business_details">
              <h4 class="clear">Professional Experience</h4>
              <div class="posts">
        		<div class="groupMainBlock2">
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
						if($r->profile_visible == 'yes')
							$profileyes_check = "checked";
						else
							$profileno_check = "checked";
					?>
                  <input type="radio" id="inlineRadio1" value="yes" name="profile_visible" <?php echo @$profileyes_check?>>
                  Yes </label>
                <label class="radio-inline">
                  <input type="radio" id="inlineRadio2" value="no" name="profile_visible" <?php echo @$profileno_check?>>
                  No </label>
                  </div>
              </div>
              <div class="radio">
              <?php
						if($r->comments_visible == 'yes')
							$commentsyes_check = "checked";
						else
							$commentsno_check = "checked";
					?>
                <label for="notifications">Make my comments visible to non friends:</label>
                <div class="pull-right">
                <label class="radio-inline">
                  <input type="radio" id="inlineRadio1" value="yes" name="comments_visible" <?php echo @$commentsyes_check?>>
                  Yes </label>
                <label class="radio-inline">
                  <input type="radio" id="inlineRadio2" value="no" name="comments_visible" <?php echo @$commentsno_check?>>
                  No </label>
                  </div>
              </div>
              <div class="radio">
              <?php
			  
						if($r->companies_visible == 'yes')
							$companiesyes_check = "checked";
						else
							$companiesno_check = "checked";
					?>
                <label for="notifications">Show my companies that I follow to non friends:</label>
                <div class="pull-right">
                <label class="radio-inline">
                  <input type="radio" value="yes" name="companies_visible" <?php echo @$companiesyes_check?>>
                  Yes </label>
                <label class="radio-inline">
                  <input type="radio" value="no" name="companies_visible" <?php echo @$companiesno_check?>>
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
			  
						if($r->email_notification == 'yes')
							$notificationsyes_check = "checked";
						else
							$notificationsno_check = "checked";
					?>
              
                <label for="notifications">Send Notifications To My email:</label>
                <div class="pull-right">
                <label class="radio-inline">
                  <input type="radio"  value="yes" name="email_notofication" <?php echo @$notificationsyes_check?>>
                  Yes </label>
                <label class="radio-inline">
                  <input type="radio"  value="no" name="email_notofication" <?php echo @$notificationsno_check?>>
                  No </label>
                  </div>
                <div class="filed col-md-12">
                <input type="submit" class="fmbtn" value="Upload Settings">
              </div>
              </form>
              <div class="clear"></div>
              </div>
              <?php } ?>
          </div>
        </div>
      </div>
    </section>
    
