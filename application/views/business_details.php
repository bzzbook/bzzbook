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
              <figure class="cmplogo"> <img src="<?php echo base_url();?>uploads/<?php if(!empty($image[0]->user_img_thumb)) echo $image[0]->user_img_thumb; else echo 'default_profile_pic.png'; ?>" alt="<?php echo base_url();?>uploads/<?php if(!empty($image[0]->user_img_thumb)) echo $image[0]->user_img_thumb; else echo 'default_profile_pic.png'; ?>"></figure>
              <!-- <span class="inside glyphicon glyphicon-camera" ></span>--> 
            </div>
            <h4 class="profile-name"><?php echo $data[0]['user_firstname']." ".$data[0]['user_lastname'] ?></h4>
            <a href="#"><span class="glyphicon glyphicon-camera change-photo fileinput-button" aria-hidden="true"><em>Change Picture</em> <input type="file" name="userfile" id="pfpic" size="20" required/></span></a></form>
            <div class="ProfileViewNav"></div>
          </div>
        </section>
      </div>
      <section class="about-user-details">
        <h4><span aria-hidden="true" class="glyphicon glyphicon-briefcase"></span> Business Details</h4>
        <div class="about-user-details-inner" >
          <section class="col-lg-12 col-md-12 col-sm-5 col-xs-12 coloumn2 aboutme">
            <div class="posts">
              <div class="col-md-4">
                <ul class="nav-tabs" role="tablist" id="myTab">
                  <li role="presentation" class="active"><a href="#proffesional" aria-controls="home" role="tab" data-toggle="tab">Proffesional Experience</a></li>
                  <li role="presentation"><a href="#organizations" aria-controls="profile" role="tab" data-toggle="tab">Organizations </a></li>
                  <li role="presentation"><a href="#groups" aria-controls="messages" role="tab" data-toggle="tab">Groups</a></li>
                </ul>
              </div>
              <div class="tab-content col-md-8">
                <div role="tabpanel" class="tab-pane active" id="proffesional">
                  <div class="iner_business col-lg-12">
                    <ul>
                     <?php if($profession_details) { foreach($profession_details as $profdetails):?>
                      <li>
                        <div class="iner_business"></div>
                        <div class="inner_rights">
                          <h3>Job Title</h3>
                          <p><?php echo $profdetails->job_title?></p>
                        </div>
                        <div class="clearfix"></div>
                      </li>
                      <li>
                        <div class="inner_rights">
                          <h3>Worked Duration</h3>
                          <p><?php echo explode('-',$profdetails->start_date)[0];?> - <?php echo explode('-',$profdetails->end_date)[0];?></p>
                        </div>
                        <div class="clearfix"></div>
                      </li>
                      <li>
                        <div class="inner_rights">
                          <h3>Job Description</h3>
                          <p><?php echo $profdetails->job_description?></p>
                        </div>
                        <div class="clearfix"></div>
                      </li>
                      <li>
                        <div class="inner_rights">
                          <h3>Employement Status</h3>
                          <p><?php 
							if($profdetails->current_job == 'y')
							{echo "Currently Working";
							}else{
								echo "Currently Not Working";
									}
							?></p>
                        </div>
                        <div class="clearfix"></div>
                      </li>
                       <?php endforeach; } else echo "No Details Found";?>
                    </ul>
                  </div>
                </div>
                <div role="tabpanel" class="tab-pane" id="organizations">
                  <div class="iner_business col-md-6">
                    <ul>
                      <?php if($organization_details) { foreach($organization_details as $orgdetails): ?>
                      <li>
                        <div class="inner_rights">
                          <h3>Organization Name</h3>
                          <p><?php echo ucfirst($orgdetails->org_name) ?></p>
                        </div>
                        <div class="clearfix"></div>
                      </li>
                      <li>
                        <div class="inner_rights">
                          <h3>Position</h3>
                          <p><?php echo $orgdetails->position; ?></p>
                        </div>
                        <div class="clearfix"></div>
                      </li>
                      <li>
                        <div class="inner_rights">
                          <h3>Organization Description</h3>
                          <p><?php echo $orgdetails->org_desc; ?></p>
                        </div>
                        <div class="clearfix"></div>
                      </li>
                      <li>
                        <div class="inner_rights">
                          <h3>Worked Duration</h3>
                          <p><?php echo $orgdetails->start_date; ?> To <?php echo $orgdetails->end_date; ?> </p>
                        </div>
                        <div class="clearfix"></div>
                      </li>
                      <li>
                        <div class="inner_rights">
                          <h3>Employement Status</h3>
                          <p><?php 
									if($orgdetails->emp_status == 'y')
									{ echo "working";
									}elseif($orgdetails->emp_status == 'res'){
										echo "resigned";
									}else
									{
										echo "freelancer";
									}
							 ?></p>
                        </div>
                        <div class="clearfix"></div>
                      </li>
                       <?php endforeach; } else echo "No Details Found";?>
                    </ul>
                  </div>
                </div>
                <div role="tabpanel" class="tab-pane" id="groups">
                  <div class="iner_business col-md-6">
                    <ul>
                      <?php if($group_details) { foreach($group_details as $groupdetails): ?>
                      <li>
                        <div class="inner_rights">
                          <h3>Group Name</h3>
                          <p><?php echo $groupdetails->group_name;?></p>
                        </div>
                        <div class="clearfix"></div>
                      </li>
                      <li>
                        <div class="inner_rights">
                          <h3>Group Type</h3>
                          <p><?php echo $groupdetails->group_type;?></p>
                        </div>
                        <div class="clearfix"></div>
                      </li>
                      <li>
                        <div class="inner_rights">
                          <h3>Website Address</h3>
                          <p><?php echo $groupdetails->group_web_url;?></p>
                        </div>
                        <div class="clearfix"></div>
                      </li>
                      <li>
                        <div class="inner_rights">
                          <h3>Location</h3>
                          <p><?php echo $groupdetails->group_state;?>,
							<?php echo $groupdetails->group_city;?>,
                            <?php echo $groupdetails->group_postalcode;?>
                            </p>
                        </div>
                        <div class="clearfix"></div>
                      </li>
                      <li>
                        <div class="inner_rights">
                          <h3>Additional Information</h3>
                          <p><?php echo $groupdetails->group_about;?></p>
                        </div>
                        <div class="clearfix"></div>
                      </li>
                      <?php endforeach; } else echo "No Details Found";?>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="clear"></div>
            </div>
          </section>
          <div class="clearfix"></div>
        </div>
      </section>
    </section>

<?php /*?><section class="col-lg-6 col-md-6 col-sm-5 col-xs-12 coloumn2 aboutme">
      <h2>Business Details</h2>
     
      <div class="posts">
      <div class="col-md-5">
        <ul class="nav-tabs" role="tablist" id="myTab">
        <li role="presentation" class="active"><a href="#prof_exp" aria-controls="home" role="tab" data-toggle="tab">Proffesional Experience</a></li>
        <li role="presentation"><a href="#organization" aria-controls="profile" role="tab" data-toggle="tab">Organizations</a></li>
        <li role="presentation"><a href="#group" aria-controls="messages" role="tab" data-toggle="tab">Groups</a></li>
        </ul>
      </div>  
        <div class="tab-content col-md-7">

        <div role="tabpanel" class="tab-pane active" id="prof_exp">
        <?php if($profession_details) { foreach($profession_details as $profdetails):?> 

        <h4>Job Title</h4>
        <p><?php echo $profdetails->job_title?></p>
        <h4>Worked Duration</h4>
        <p><?php echo explode('-',$profdetails->start_date)[0];?> - <?php echo explode('-',$profdetails->end_date)[0];?></p>
         <h4>Job Description</h4>
        <p><?php echo $profdetails->job_description?></p>
         <h4>Employement Status</h4>
        <p><?php 
		if($profdetails->current_job == 'y')
		{echo "Currently Working";
		}else{
			echo "Currently Not Working";
				}
		?></p>
         <?php endforeach; } else echo "No Details Found"; ?>
        </div>
 
        <div role="tabpanel" class="tab-pane" id="organization">
        <?php if($organization_details) { foreach($organization_details as $orgdetails): ?>
        <h4>Organization Name</h4>
        <p><?php echo $orgdetails->org_name; ?></p>
        <h4>Position</h4>
        <p><?php echo $orgdetails->position; ?></p>
        <h4>Organization Description</h4>
        <p><?php echo $orgdetails->org_desc; ?></p>
        <h4>Worked Duration</h4>
        <p><?php echo $orgdetails->start_date; ?> To <?php echo $orgdetails->end_date; ?> </p>
        <h4>Employement Status</h4>
        <p><?php 
		if($orgdetails->emp_status == 'y')
		{ echo "working";
							}elseif($orgdetails->emp_status == 'res'){
								echo "resigned";
							}else
							{
								echo "freelancer";
							}
								 ?></p>
         <?php endforeach; } else echo "No Details Found";?>
        </div>
       
        <div role="tabpanel" class="tab-pane" id="group">
        <?php if($group_details) { foreach($group_details as $groupdetails): ?>

         <h4>Group Name</h4>
        <p><?php echo $groupdetails->group_name;?></p>
         <h4>Group Type</h4>
        <p><?php echo $groupdetails->group_type;?></p>
         <h4>Website Address</h4>
        <p><?php echo $groupdetails->group_web_url;?></p>
         <h4>Location</h4>
        <p><?php echo $groupdetails->group_state;?>,
        <?php echo $groupdetails->group_city;?>,
        <?php echo $groupdetails->group_postalcode;?></p>
         <h4>Additional Information</h4>
        <p><?php echo $groupdetails->group_about;?></p>
                  <?php endforeach; } else echo "No Details Found";?>

         </div>
        </div>
        <div class="clear"></div>
      </div>
     
    </section><?php */?>