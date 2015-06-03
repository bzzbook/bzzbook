<section class="col-lg-9 col-md-9 nopad">
      <div class="col-xs-12 ProfileView">
        <section class="visitorBox">
          <div class="visitiBoxInner">
            <figure class="compCover"><img alt="" src="<?php echo base_url(); ?>images/about_banner.jpg" class="img-responsive"></figure>
              <?php  $image = $this->profile_set->get_profile_pic();
			         $data = $this->profile_set->get_userinfo(); 
					 $result = $this->profile_set->save_settings();
					 $organization_details = $this->profile_set->getorganizationDetails();
					 $user_college_info = $this->profile_set->get_college_details();
					 $user_school_info = $this->profile_set->get_school_details();
					 $family_members = $this->profile_set->get_family_members();
					 $nick_names = $this->profile_set->get_nick_names();
					 $mobile_data = $this->profile_set->get_mbl_nos();
					 $accounts_data = $this->profile_set->get_other_accounts_by_id(); 
					 $emp_working = $this->profile_set->get_org_details_by_status_work();
					 $emp_work_ended = $this->profile_set->get_org_details_by_status_all();
					 $college_details = $this->profile_set->get_clg_details_all();
					 $user_log_data = $this->person->get_abtme_user();
					 
					 ?>
            <div class="profileLogo">
              <figure class="cmplogo"><a href="#"><span class="glyphicon glyphicon-camera change-photo fileinput-button" aria-hidden="true"><em>Change Picture</em> <input type="file" name="userfile" id="userfile" size="20" required/></span></a><img src="<?php echo base_url();?>uploads/<?php if(!empty($image[0]->user_img_thumb)) echo $image[0]->user_img_thumb; else echo 'default_profile_pic.png'; ?>" alt="<?php echo base_url();?>uploads/<?php if(!empty($image[0]->user_img_thumb)) echo $image[0]->user_img_thumb; else echo 'default_profile_pic.png'; ?>"></figure>

              <!-- <span class="inside glyphicon glyphicon-camera" ></span>--> 
            </div>
            <h4 class="profile-name"><?php echo $data[0]['user_firstname']." ".$data[0]['user_lastname'] ?></h4>
            <div class="ProfileViewNav"></div>
          </div>
        </section>
      </div>
      <section class="about-user-details">
        <h4><span aria-hidden="true" class="glyphicon glyphicon-user"></span> About</h4>
        <div class="about-user-details-inner" >
          <section class="col-lg-12 col-md-12 col-sm-5 col-xs-12 coloumn2 aboutme">
            <div class="posts">
              <div class="col-md-4">
                <ul class="nav-tabs" role="tablist" id="myTab">
                  <li role="presentation" class="active" id="overview_tab"><a href="#overview" aria-controls="home" role="tab" data-toggle="tab">Overview</a></li>
                  <li role="presentation" id="education_tab"><a href="#education" aria-controls="profile" role="tab" data-toggle="tab">Work and Education </a></li>
                  <li role="presentation" id="place_tab"><a href="#place" aria-controls="messages" role="tab" data-toggle="tab">Places You've Lived </a></li>
                  <li role="presentation" id="contact_tab"><a href="#contact" aria-controls="messages" role="tab" data-toggle="tab">Contact and Basic Info</a></li>
                  <li role="presentation" id="family_tab"><a href="#family" aria-controls="profile" role="tab" data-toggle="tab">Family and Relationships </a></li>
                  <li role="presentation" id="details_tab"><a href="#details" aria-controls="profile" role="tab" data-toggle="tab">Details About You </a></li>
                  <li role="presentation" id="life_tab"><a href="#life" aria-controls="profile" role="tab" data-toggle="tab">Life Events</a></li>
                </ul>
              </div>
              <div class="tab-content col-md-8">
                <div role="tabpanel" class="tab-pane active" id="overview">
                  <div class="smallboxes col-lg-12">
                    <ul class="aboutme-overview">
                    
           <li>
                 		  <div class="tophead">Basic Info</div>
                          <div class="col-md-12">
                        <div class="boxicon col-md-1"><i class="fa fa-user overviewicons"></i></div>
                        <div class="boxicon_text col-md-8"><?php echo $result[0]->user_firstname ." " .$result[0]->user_lastname; ?></div>
                       </div>
                   
                   
                		<div class="col-md-12">
                        <div class="boxicon col-md-1"><img src="<?php echo base_url(); ?>images/phoneicon.png" alt=""></div>
                        <div class="boxicon_text col-md-8"><?php if($result[0]->user_phoneno) { echo $result[0]->user_phoneno; }else echo"mobile no not Available"; ?></div>
                       </div>
                       <div class="col-md-12">
                        <div class="boxicon col-md-1"><img src="<?php echo base_url(); ?>images/mailicon.png" alt=""></div>
                        <div class="boxicon_text col-md-8"><?php if($user_log_data) { echo $user_log_data[0]['user_email']; } else echo"email not Available";?>
                         </div>
                    </div>
                     <div class="col-md-12">
                        <div class="boxicon col-md-1"><img src="<?php echo base_url(); ?>images/printicon.png" alt=""></div>
                        <div class="boxicon_text col-md-8"><?php $unixTimestamp = strtotime($result[0]->user_dob);
				 echo date('d',$unixTimestamp)."th ".date('F',$unixTimestamp).", ".date('Y',$unixTimestamp); ?>
                        </div>
                         </div>
                         
                              <div class="col-md-12 basic_address" id="basic_address">
                        <div class="boxicon col-md-1"><i class="fa fa-home overviewicons"></i></div>                      
                           <?php 
							   if(!empty($result[0]->address))
							 {
								$data = explode('|++|',$result[0]->address);
							 }else
							 {
								 $data ='';
							 }
                          ?>      
                          <?php if(!empty($data)) {  ?>
     
                       
                        <div class="boxicon_text col-md-8"> <p><?php if($data) { if($data[0]) {  echo $data[0].','; } }  ; ?>
                         <?php if($data) { if($data[1]) {  echo $data[1].','; } } ; ?>
						 <?php if($data) { if($data[2]) {  echo $data[2].'.'; } } ; ?>
                         </p></div>
                        
                        <?php }else{ ?>
                        <div class="boxicon_text col-md-8"> <p><?php echo "Address Not Available";?></p></div>
                         <?php } ?>
                         <div class="col-md-3">
                           <a  href="javascript:void(0)" id="move_to_contact" style="float:right; display:none;">edit</a> 
                         </div>
                       </div> 
                         
                                                  
                    <!--     <br>
                        <a  href="javascript:void(0)" id="move_to_contact" >Edit your basic info</a> -->
                                          
  
                   
                    </li>
                    
                    
                      <li>
                        <div class="tophead">WORK EXPERIENCE</div>
                      <?php if(empty($organization_details)) { ?>
                        <div class="iner_lefts"><i class="fa fa-plus"></i></div>
                        <div class="inner_rights boxs">
                          <h3><a href="javascript:void(0)" onclick="mov_to_work_edu()">Add a workplace</a></h3>
                          <div class="graphic"></div>
                        </div>
                        <div class="clearfix"></div>
                        <?php } else { 
						?>
                         <div class="iner_lefts"><i class="fa fa-briefcase"></i></div>
                        <div class="inner_rights boxs">
                        <?php 	
						if(!empty($emp_working))
						{
							foreach($emp_working as $working)
							{
						?>		
						
                          <h5><?php echo $working['position']; ?> at <a href="#"><?php echo $working['org_name']; ?></a></h5>
                          
                          <?php } } ?>
                          <?php 	
						  if(!empty($emp_work_ended))
						{
							 $i = 0;
							 ?>
                             <span class="aboutme_clg">Past:</span>
                             <?php
							foreach($emp_work_ended as $worked)
							{
							
						?>
                         <a href="#" class="aboutme_clg"><?php echo $worked['org_name']; ?></a>
                          
						  <?php 
						  
						  if($i < count($emp_work_ended))
						  
						  { 
						  
						  if($i == count($emp_work_ended)-1)
						  {
						  break;
						  }
						  elseif($i == count($emp_work_ended)-2)
						  {
							  
						  ?>
                          <span class="aboutme_clg">and</span>
                          <?php }else{ ?>
                          <span class="aboutme_clg">,</span>
                          
					<?php
							}
						  } $i++;} ?>
                       <!--   <div class="edu_cation"><a href="javascript:void(0)" onclick="mov_to_work_edu()">Edit your education</a></div> -->
                        </div>
                        <div class="clearfix"></div>
                        <?php } } ?>
                      </li>
                      <li>
                      <div class="tophead">EDUCATION DETAILS</div>
                      <?php if(empty($college_details)) { ?>
                       <div class="iner_lefts"><i class="fa fa-plus"></i></div>
                        <div class="inner_rights boxs">
                          <h3><a href="javascript:void(0)" onclick="mov_to_work_edu()">Add a College</a></h3>
                          <div class="graphic"></div>
                        </div>
                        <div class="clearfix"></div>
                        <?php }else{ $j = 1; ?>
						  <div class="iner_lefts"><i class="fa fa-graduation-cap"></i></div>
                      
                        <?php foreach($college_details as $college) {  ?>
						    
							
                        <div class="inner_rights boxs">
                        <?php if($j == 1) { ?>
                          <h5>Studied at <a href="#"><?php echo $college['college_name']; ?></a></h5>
                          <?php }else { ?>
                        
                          <span class="aboutme_clg">Past:</span> <a href="#" class="aboutme_clg"><?php echo $college['college_name']; ?></a>
                          <?php if($j < count($college_details)) { 
						  
						    if($i == count($college_details)-1)
						  {
						  break;
						  }
						   elseif($j < count($college_details) - 2){ ?>
                             
                          <span class="aboutme_clg">and</span>
                          <?php }else{ ?>
                          <span class="aboutme_clg">,</span>
                            
                            <?php  }} } $j++; ?>
                      
                        <!--  <div class="edu_cation"><a href="javascript:void(0)" onclick="mov_to_work_edu()">Edit your education</a></div> -->
                        </div>
                        <?php  } } ?>
                        <div class="clearfix"></div>
                      </li>
                      <li>
                      <div class="tophead">PLACES YOU'VE LIVED</div>
                     <?php  if(empty($result[0]->location) && empty($result[0]->hometown)) { ?>
                     
                     <div class="iner_lefts"><i class="fa fa-plus"></i></div>
                        <div class="inner_rights boxs">
                          <h3><a  href="javascript:void(0)" id="move_to_places">Add a Location</a></h3>
                          <div class="graphic"></div>
                        </div>
                        <div class="clearfix"></div>
                      
                      <?php }else{ ?>
                        <div class="iner_lefts"><i class="fa fa-globe"></i></div>
                        <div class="inner_rights boxs">
                          <h5>Lives in <a href="#"><?php if($result[0]->location){ echo $result[0]->location; } else echo "Not Available"; ?></a></h5>
                          <p><span>From </span><a href="#"><?php  if($result[0]->hometown){ echo $result[0]->hometown; } else echo "Not Available"; ?></a></p>
                          <div class="edu_cation"><a href="javascript:void(0)" id="move_to_places">Edit the places you've lived</a></div>
                        </div>
                        <div class="clearfix"></div>
                        
                        
                        
                        <?php } ?>
                        
                      </li>
                      <li>
                        <div class="tophead">YOUR FAMILY MEMBERS</div>
                      <?php if(empty($family_members)) { ?> 
                        <div class="iner_lefts"><i class="fa fa-plus"></i></div>
                        <div class="inner_rights boxs">
                          <h3><a href="javascript:void(0)" id="move_to_relation">Add a relationship</a></h3>
                          <div class="graphic"></div>
                        </div>
                        <div class="clearfix"></div>
                        <?php }else{ ?>
                         
                         <div class="iner_lefts"><a  href="javascript:void(0)" id="move_to_relation"><i class="fa fa-users"></i></a></div>
                        <div class="inner_rights boxs">
                          <h3><a  href="javascript:void(0)" id="move_to_relation"><?php $count = count($family_members); echo $count; ?> Family Members</a></h3>
                          <div class="graphic"></div>
                        </div>
                        <div class="clearfix"></div>
                        <?php } ?>
                        
                      </li>
                    </ul>
                  </div>
                
                </div>
                <div role="tabpanel" class="tab-pane" id="education">
                  <div class="small_boxes col-md-12">
                    <ul class="backgrounds">
                      <li id="workplace-li">
                        <div class="tophead">Work</div>
                         
						<div class="clearfix"></div>
					<div id="work_val_disp">	
                       
   	<?php 
				if(!empty($organization_details)){
				foreach($organization_details as $orgdetails){
			?> 
           
                        <div class="latest_works" id="work_<?php echo $orgdetails->organization_id; ?>">
                        <div class="sm_rightbox">
                        <h3><a href="#"><?php echo $orgdetails->org_name;?></a></h3>
                        <p><?php echo $orgdetails->position;?></p>
                        </div>
                        <div class="sm_rightside" >
                        <div class="col-md-3 com_le" style="display:none;"><i class="fa fa-globe"></i></div>
                        <div class="col-md-6 com_mid">
                        <a class="work_edit" href="javascript:void(0)" onclick="work_edit()" id="work_edit<?php echo $orgdetails->organization_id; ?>"><i class="fa fa-pencil"></i></a></div>
                        <div class="col-md-3 com_rig"><a href="javascript:void(0)" class="work_delete" id="work_delete<?php echo $orgdetails->organization_id; ?>" onclick="work_delete()"><i class="fa fa-times"></i></a></div>
                        </div>
                        
                        <div class="clearfix" id="clearfix"></div>
                        </div>
                    
                         <?php } ?>
                         </div>
                        <?php } else { ?>
            
             
                      <div class="iner_lefts" id="work_head1"><a href="#"><i class="fa fa-plus"></i></a></div>
                        <div class="inner_rights boxs" id="work_head2">
                          <h3><a href="javascript:void(0)" id="add_workplace">Add a workplace</a></h3>
                          
                          <div class="clearfix"></div>
                        </div>
                        <?php } ?>
                   
                    <!-- $this->load->view('aboutme/work_inner'); -->
                       
                        <div id="allbox">
                            <div id="work_place" class="workplace col-md-12" style="display:none;">
                              <div class="col-md-9">
                                <form class="form-inline" id="work_form">
                                  <div class="form-group">
                                    <label for="exampleInputName2">Company</label>
                                    <input type="text" placeholder="Where have you worked?" name="company">
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputName2">Position</label>
                                    <input type="text" placeholder="What is your job title?" name="position">
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputName2">City/Town</label>
                                    <input type="text" placeholder="" name="city">
                                  </div>
                                  <div class="form-group ">
                                    <label for="exampleInputName2">Description</label>
                                    <textarea rows="4" name="description"></textarea>
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputName2">Time Period</label>
                                    <input type="checkbox" class="outside" name="curent_status" id="curent_status" value="wor">
                                    I currently work </div>
                                  <div class="col-md-12">
                                    <div class="col-md-6 yearadd" id="add_years"><a href="javascript:void(0)" onclick="add_year()" class="frm_years_link" ><i class="fa fa-plus"></i>Add year</a></div>
                                  <select id="frm_years" style="display:none;" name="frm_years" class="frm_years" >
                                  <option value="0">yyyy</option>
                                   
                                   <?php for($i=1950;$i<=date(Y);$i++){?>
                                	<option value="<?php echo $i;?>"><?php echo $i;?></option>
                              	  <?php }?>
                                  </select>
                                  <a href="javascript:void(0)" id="frm_months_link"  style="display:none;" ><i class="fa fa-plus"></i>Add month</a>
                                  <select id="frm_months" style="display:none;" name="frm_months"> 
                                  <option value="0">mm</option>
                                   <option value="1" selected="selected">1</option>
                                   <?php for($i=2;$i<=12;$i++){?>
                                	<option value="<?php echo $i;?>" ><?php echo $i;?></option>
                              	  <?php }?>
                                  </select>
                                  <a href="javascript:void(0)" id="frm_days_link"  style="display:none;"><i class="fa fa-plus"></i>Add day</a>
                                  <select id="frm_days" style="display:none;" name="frm_days">
                                  <option value="0">dd</option>
                                  <option value="1" selected="selected">1</option>
                                   <?php for($i=2;$i<=31;$i++){?>
                                	<option value="<?php echo $i;?>" ><?php echo $i;?></option>
                              	  <?php }?>
                                  </select>
                                   <div id="to" style="display:none;" class="to">to </div>
                                    <div id="to_present" style="display:none;">to present</div>
                                  <a href="javascript:void(0)" id="to_years_link"  class="to_years_link"><i class="fa fa-plus"></i>Add year</a>
                                                       
                                   
                                  </div>
                                  
                                  <!---  ---->
                                  <div class="col-md-12 todates_dropdown" id="todates_dropdowns">
                                    
                                  <select id="to_years" style="display:none;" name="to_years" class="to_years">
                                  <option value="0">yyyy</option> 
                                   <option value="1950" selected="selected">1950</option>
                                   <?php for($i=1951;$i<=date(Y);$i++){?>
                                	<option value="<?php echo $i;?>"><?php echo $i;?></option>
                              	  <?php }?>
                                  </select>
                                  <a href="javascript:void(0)" id="to_months_link"  style="display:none;" ><i class="fa fa-plus"></i>Add month</a>
                                  <select id="to_months" style="display:none;" name="to_months">
                                 <option value="0">mm</option> 
                                   <option value="1" selected="selected">1</option>
                                   <?php for($i=2;$i<=12;$i++){?>
                                	<option value="<?php echo $i;?>"><?php echo $i;?></option>
                              	  <?php }?>
                                  </select>
                                  <a href="javascript:void(0)" id="to_days_link"  style="display:none;"><i class="fa fa-plus"></i>Add day</a>
                                  <select id="to_days" style="display:none;" name="to_days">
                                  <option value="0">dd</option> 
                                    <option value="1" selected="selected">1</option>
                                   <?php for($i=2;$i<=31;$i++){?>
                                	<option value="<?php echo $i;?>"><?php echo $i;?></option>
                              	  <?php }?>
                                  </select>
                                                      
                                  </div>
                                    <input type="hidden" name="work_action" id="work_action" value="add">
                       				<input type="hidden" value="" name="work_disp_id" >
                                  <!---  ---->
                                  <div class="clearfix"></div>
                                  <div class="box_bottom">
                                    <div class="publics col-md-4" style="display:none;">
                                      <button aria-expanded="false" data-toggle="dropdown" class="btn btn-default dropdown-toggle" type="button">Public <span class="caret"></span></button>
                                    </div>
                                    <div class="col-md-8 add_new">
                                      <div class="btn3 btn-black" onclick="close_work()">Cancel</div>
                                      <input type="submit" class="btn3 btn-green " value="Save Changes" />
                                    </div>
                                    <div class="clearfix"></div>
                                  </div>
                                </form>
                              </div>
                              <div class="col-md-3 rightblock"><a href="javascript:void(0)" onclick="close_work()"><i class="fa fa-times"></i>close</a></div>
                            </div>
                            <div class="graphic"></div>
                            <div class="clearfix"></div>
                          </div>
                           <?php if(!empty($organization_details)) { ?>
                          <a href="javascript:void(0)" id="add_work_link_disp" class="work_edu_side_links">add work details</a>
                          <?php } ?>
                      </li>
                      <div class="clearfix"></div>
                      <li id="pfskills-li">
                        <div class="tophead">Professional Skills</div>
                           <?php if(empty($result[0]->professional_skills)) { ?>
                        <div class="iner_lefts" id="prof_skills1"><a href="javascript:void(0)"><i class="fa fa-plus"></i></a></div>
                        <div class="inner_rights boxs" id="prof_skills2">
                          <h3><a href="javascript:void(0)" id="add_pf_skills">Add a professional skill</a></h3>
                          </div>
                          <?php } else { ?>
                          
                          <div id="pf_skills_val_display">
                        <div class="sm_leftbox"></div>
                        <div class="sm_rightbox"><h3><a href="javascript:void(0)">
						<?php 
						$data = explode(',',$result[0]->professional_skills);
						foreach($data as $lang)
						{
						 echo $lang." . ";
						}
						?>
                        </a></h3>
                        </div>
                        <div class="sm_rightside">
                        <div class="col-md-3 com_le" style="display:none;"><i class="fa fa-globe"></i></div>
                        <div class="col-md-6 com_mid"><a href="javascript:void(0)" onclick="pf_skills_edit()"><i class="fa fa-pencil"></i></a></div>
                        <div class="col-md-3 com_rig"><a href="#"><i class="fa fa-times"></i></a></div>
                        </div>
                        </div>
                          <div class="clearfix"></div>
                         <?php } ?> 
                          
                          <div id="skills_disp" style="display:none;">
                            <div id="skil_place" class="workplace col-md-12">
                              <form class="form-inline">
                                <div class="form-group skils">
                                <div id="selected_skills">
							   <?php 
							    if($result[0]->professional_skills){ 
							    $data = explode(',',$result[0]->professional_skills);
								foreach($data as $pf_skill)
								{
								
								?>
								   
								   <span class="bc_mail_ids" id="<?php echo $pf_skill; ?>"><?php echo $pf_skill;?><a onclick="removeskills('<?php echo $pf_skill; ?>')" ><img class="as_close_btn" src="<?php echo base_url('images/close_post.png'); ?>" /></a></span>
								
                                <?php } } ?>   
								  </div>
                                  <label for="exampleInputName2">Professional Skills</label>
                                  <input type="text" placeholder="" id="professional_skils">
                                  <input type="hidden" id="addedskills" name="addedskills" value="<?php if($result[0]->professional_skills){ echo $result[0]->professional_skills; } ?>"></input>
                                </div>
                                <div class="clearfix"></div>
                              </form>
                              <div class="box_bottom">
                                <div class="publics col-md-4">
                                  <button aria-expanded="false" data-toggle="dropdown" class="btn btn-default dropdown-toggle" type="button">Public <span class="caret"></span></button>
                                </div>
                                <div class="col-md-8 skil_box">
                               <div class="btn3 btn-green" onclick="add_all_skills()">Save Changes</div>
                                <?php if($result[0]->professional_skills) { ?>
                              <div class="btn3 btn-black" onclick="close_pf_skills()">Cancel</div>
                              <?php } else { ?>
                              <div class="btn3 btn-black" onclick="close_pfskills()">Cancel</div>
                            <?php } ?>
                                </div>
                                <div class="clearfix"></div>
                              </div>
                            </div>
                          </div>
                        
                      </li>
                      <div class="clearfix"></div>
                      <li id="college-li">
                        <div class="tophead"> College</div>
                      
                          
                          
                          <div id="college_val_disp">
   	<?php 
				if(!empty($user_college_info)){
				foreach($user_college_info as $clgdetails){
			?>
                      <div class="latest_works">
                        <div class="sm_rightbox"><h3><a href="#"><?php echo $clgdetails->college_name;?></a></h3>
                        <p><?php echo $clgdetails->concentration1;?> <?php echo $clgdetails->concentration2;?> <?php echo $clgdetails->concentration3;?></p>
                        </div>
                        <div class="sm_rightside">
                        <div class="col-md-3 com_le" style="display:none;"><i class="fa fa-globe"></i></div>
                        <div class="col-md-6 com_mid"><a href="javascript:void(0)" class="college_edit" id="college_edit<?php echo $clgdetails->college_id; ?>" onclick="college_edit()"><i class="fa fa-pencil"></i></a></div>
                        <div class="col-md-3 com_rig"><a  href="javascript:void(0)" class="college_delete" id="college_delete<?php echo $clgdetails->college_id; ?>" onclick="college_delete()"><i class="fa fa-times"></i></a></div>
                        </div>
                           <div class="clearfix"></div>
                        </div>
                         <?php } ?>
						 </div>
						 <?php }else { ?>
            
                         <div class="iner_lefts" id="college1"><a href="#"><i class="fa fa-plus"></i></a></div>
                        <div class="inner_rights boxs" id="college2">
                          <h3><a href="javascript:void(0)" id="add_college">Add a college</a></h3>
                          </div>
                          
                          <?php } ?>
                         
                          
                          <div id="college_disp" style="display:none;">
                            <div class="College_box col-md-12">
                              <div class="col-md-9">
                                <form class="form-inline" id="college_form">
                                  <div class="form-group">
                                    <label for="exampleInputName2">School</label>
                                    <input type="text" placeholder="What school did you attend?" name="college_name">
                                  </div>
                                  <div class="form-group period">
                                    <label for="exampleInputName2">Time Period</label>
                                     <a href="javascript:void(0)" id="clg_add_year"><i class="fa fa-plus"></i>Add year</a>
                                     </div>
                                     
                                   <select id="frm_years_college" style="display:none;" name="frm_clg_years" class="frm_clg_years">
                                  <option value="0">yyyy</option>
                                   
                                   <?php for($i=1950;$i<=date(Y);$i++){?>
                                	<option value="<?php echo $i;?>"><?php echo $i;?></option>
                              	  <?php }?>
                                  </select>
                        
                          <a href="javascript:void(0)" id="frm_months_clg" style="display:none;"> <i class="fa fa-plus"></i>Add Month</a>
                         
                          <select id="frm_months_college" style="display:none;" name="frm_clg_months"> 
                                  <option value="0">mm</option>
                                   
                                   <?php for($i=1;$i<=12;$i++){?>
                                	<option value="<?php echo $i;?>" ><?php echo $i;?></option>
                              	  <?php }?>
                                  </select>
                              <a href="javascript:void(0)" id="frm_days_clg" style="display:none;"> <i class="fa fa-plus"></i>Add Day</a>
                                  <select id="frm_days_college" style="display:none;" name="frm_clg_days">
                                  <option value="0">dd</option>
                                  
                                   <?php for($i=1;$i<=31;$i++){?>
                                	<option value="<?php echo $i;?>" ><?php echo $i;?></option>
                              	  <?php }?>
                                  </select>
                                          <div id="clg_to">to</div>
                                  <div class="col-md-12">
                                    <div class="col-md-4"></div>
                                    <div class="col-md-8 yearto"><a href="javascript:void(0)" id="to_years_clg" class="to_years_clg"><i class="fa fa-plus"></i>Add year</a></div>
                                  </div>
                                  
                                  <div class="col-md-12" id="clg_todates_dropdowns">
                                    
                                  <select id="to_years_college" style="display:none;" name="to_clg_years" class="to_clg_years">
                                  <option value="0">yyyy</option>
                                   <?php for($i=1950;$i<=date(Y);$i++){?>
                                	<option value="<?php echo $i;?>"><?php echo $i;?></option>
                              	  <?php }?>
                                  </select>
                                  <a href="javascript:void(0)" id="to_months_clg" style="display:none;"> <i class="fa fa-plus"></i>Add Month</a>
                                  <select id="to_months_college" style="display:none;" name="to_clg_months">
                                  <option value="0">mm</option>
                                   <?php for($i=1;$i<=12;$i++){?>
                                	<option value="<?php echo $i;?>" selected="selected"><?php echo $i;?></option>
                              	  <?php }?>
                                  </select>
                                 <a href="javascript:void(0)" id="to_days_clg" style="display:none;"> <i class="fa fa-plus"></i>Add Day</a>
                                  <select id="to_days_college" style="display:none;" name="to_clg_days">
                                  <option value="0">dd</option>
                                   <?php for($i=1;$i<=31;$i++){?>
                                	<option value="<?php echo $i;?>" selected="selected"><?php echo $i;?></option>
                              	  <?php }?>
                                  </select>
                                                      
                                  </div>
                        
                                  <div class="clearfix"></div>
                                  <div class="form-group">
                                    <label for="exampleInputName2">Graduated</label>
                                    <input class="boxsmal" type="checkbox" name="edu_status" id="edu_status" value="graduate">
                                  </div>
                                  <div class="clearfix"></div>
                                  <div class="form-group description">
                                    <label for="exampleInputName2">Description</label>
                                    <textarea rows="3" name="description"></textarea>
                                  </div>
                                  <div class="clearfix"></div>
                                  <div class="form-group">
                                    <label for="exampleInputName2">conentration1</label>
                                    <input type="text" name="concentration1">
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputName2">conentration2</label>
                                    <input type="text" name="concentration2">
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputName2">conentration3</label>
                                    <input type="text" name="concentration3">
                                  </div>
                                  <div class="form-group newone11">
                                  
                                    <label for="exampleInputName2">Attended for</label>
                                   
                                      <input type="radio" checked="" value="college" id="optionsRadios1" name="optionsRadios" class="college_radio" />
                                      college 
                                    
                                  </div>
                                  <div class="clearfix"></div>
                                  <div class="form-group newone11">
                                   
                                    <label for="exampleInputName2"></label>
                                    
                                     <input type="radio" checked="" value="graduate" id="optionsRadios1" name="optionsRadios">
                                     
                                      Graduate School 
                            
                                  </div>
                                  <div class="clearfix"></div>
                                  <div class="box_bottom">
                                    <div class="publics col-md-4" style="display:none;">
                                      <button aria-expanded="false" data-toggle="dropdown" class="btn btn-default dropdown-toggle" type="button">Public <span class="caret"></span></button>
                                    </div>
                                      <input type="hidden" name="clg_action" id="clg_action" value="add">
                       				  <input type="hidden" value="" name="college_disp_id" >
                                    <div class="col-md-8">
                                      <div class="btn3 btn-black" onclick="close_college()">Cancel</div>
                                      <input type="submit"  class="btn3 btn-green" value="Save Changes" />
                                    </div>
                                    <div class="clearfix"></div>
                                  </div>
                                </form>
                              </div>
                              <div class="col-md-3 rightblock "><a href="javascript:void(0)" onclick="close_college()"><i class="fa fa-times"></i>close</a></div>
                            </div>
                            <div class="graphic"></div>
                          </div>
                          <?php if(!empty($user_college_info)) { ?>
                           <a href="javascript:void(0)" id="add_college_link_disp" class="work_edu_side_links">add college details</a>
                           <?php } ?>
                      </li>
                      <div class="clearfix"></div>
                      
                      
                      
                      <li id="school-li">
                        <div class="tophead"> High School</div>
                      
                          
                          <div id="school_val_disp">
   	<?php 
				if(!empty($user_school_info)){
				foreach($user_school_info as $schdetails){
			?>
                      <div class="latest_works">
                        <div class="sm_rightbox"><h3><a href="#"><?php echo $schdetails->school_name;?></a></h3>
                        <p> </p>
                        </div>
                         <div class="sm_rightside">
                        <div class="col-md-3 com_le" style="display:none;"><i class="fa fa-globe"></i></div>
                        <div class="col-md-6 com_mid"><a href="javascript:void(0)" class="school_edit" id="school_edit<?php echo $schdetails->school_id; ?>" onclick="school_edit()"><i class="fa fa-pencil"></i></a></div>
                        <div class="col-md-3 com_rig"><a href="javascript:void(0)" class="school_delete" id="school_delete<?php echo $schdetails->school_id; ?>" onclick="school_delete()"><i class="fa fa-times"></i></a></div>
                        </div>
                        <div class="clearfix"></div>
                        </div>
                         <?php } ?></div><?php }else{ ?>
            
                          <div class="iner_lefts" id="school1"><a href="#"><i class="fa fa-plus"></i></a></div>
                        <div class="inner_rights boxs" id="school2">
                          <h3><a href="javascript:void(0)" id="add_school">Add a High School</a></h3>
                          </div>
                          <?php } ?>
                                                
                          
                           <div id="highschool" style="display:none;">
                            <div class="College_box col-md-12">
                              <div class="col-md-9">
                                <form class="form-inline" name="school_form" id="school_form">
                                  <div class="form-group">
                                    <label for="exampleInputName2">School</label>
                                    <input type="text" name="school_name" placeholder="What school did you attend?">
                                  </div>
                                  <div class="form-group period">
                                    <label for="exampleInputName2">Time Period</label>
                                <a href="javascript:void(0)" id="frm_years_sch"> <i class="fa fa-plus"></i>Add year</a></div>
                                 <select id="frm_years_school" style="display:none;" name="frm_sch_years" class="frm_sch_years">
                                  <option value="0">yyyy</option>
                                   
                                   <?php for($i=1950;$i<=date(Y);$i++){?>
                                	<option value="<?php echo $i;?>"><?php echo $i;?></option>
                              	  <?php }?>
                                  </select>
                        
                          <a href="javascript:void(0)" id="frm_months_sch" style="display:none;"> <i class="fa fa-plus"></i>Add Month</a>
                         
                          <select id="frm_months_school" style="display:none;" name="frm_sch_months"> 
                                  <option value="0">mm</option>
                                   
                                   <?php for($i=1;$i<=12;$i++){?>
                                	<option value="<?php echo $i;?>" ><?php echo $i;?></option>
                              	  <?php }?>
                                  </select>
                              <a href="javascript:void(0)" id="frm_days_sch" style="display:none;"> <i class="fa fa-plus"></i>Add Day</a>
                                  <select id="frm_days_school" style="display:none;" name="frm_sch_days">
                                  <option value="0">dd</option>
                                  
                                   <?php for($i=1;$i<=31;$i++){?>
                                	<option value="<?php echo $i;?>" ><?php echo $i;?></option>
                              	  <?php }?>
                                  </select>
                         
                        
                    
                                    <div id="sch_to">TO</div>
                                  <div class="col-md-12">
                                    <div class="col-md-4"></div>
                                    <div class="col-md-8 yearto"><a href="javascript:void(0)" id="to_years_sch"> <i class="fa fa-plus"></i>Add year</a></div>
                                  </div>
                                  
                                    
                                  <select id="to_years_school" style="display:none;" name="to_sch_years" class="to_sch_years">
                                  <option value="0">yyyy</option>
                                   <?php for($i=1950;$i<=date(Y);$i++){?>
                                	<option value="<?php echo $i;?>"><?php echo $i;?></option>
                              	  <?php }?>
                                  </select>
                                  <a href="javascript:void(0)" id="to_months_sch" style="display:none;"> <i class="fa fa-plus"></i>Add Month</a>
                                  <select id="to_months_school" style="display:none;" name="to_sch_months">
                                  <option value="0">mm</option>
                                   <?php for($i=1;$i<=12;$i++){?>
                                	<option value="<?php echo $i;?>"><?php echo $i;?></option>
                              	  <?php }?>
                                  </select>
                                 <a href="javascript:void(0)" id="to_days_sch" style="display:none;"> <i class="fa fa-plus"></i>Add Day</a>
                                  <select id="to_days_school" style="display:none;" name="to_sch_days">
                                  <option value="0">dd</option>
                                   <?php for($i=1;$i<=31;$i++){?>
                                	<option value="<?php echo $i;?>"><?php echo $i;?></option>
                              	  <?php }?>
                                  </select>
                                                      
                                    <input type="hidden" name="sch_action" id="sch_action" value="add">
                       				  <input type="hidden" value="" name="school_disp_id" >
                                  
                                  <div class="clearfix"></div>
                                  <div class="form-group">
                                    <label for="exampleInputName2">Graduated</label>
                                    <input class="boxsmal" type="checkbox" name="sch_status" value="graduate">
                                  </div>
                                  <div class="clearfix"></div>
                                  <div class="form-group description">
                                    <label for="exampleInputName2">Description</label>
                                    <textarea rows="3" name="description"></textarea>
                                  </div>
                                  <div class="clearfix"></div>
                                  <div class="clearfix"></div>
                                  <div class="box_bottom">
                                    <div class="publics col-md-4" style="display:none;">
                                      <button aria-expanded="false" data-toggle="dropdown" class="btn btn-default dropdown-toggle" type="button">Public <span class="caret"></span></button>
                                    </div>
                                    <div class="col-md-8">
                                      <div class="btn3 btn-black" onclick="close_school()">Cancel</div>
                                      <input type="submit" class="btn3 btn-green" value="Save Changes" />
                                    </div>
                                    <div class="clearfix"></div>
                                  </div>
                                </form>
                              </div>
                              <div class="col-md-3 rightblock "><a href="javascript:void(0)" onclick="close_school()"><i class="fa fa-times"></i>close</a></div>
                            </div>
                            <div class="graphic"></div>
                          </div>
                       <?php  if(!empty($user_school_info)){ ?>
                           <a href="javascript:void(0)" id="add_school_link_disp" class="work_edu_side_links">add school details</a>
                           <?php } ?>
                      </li>
                      <div class="clearfix"></div>
                    </ul>
                  </div>
                </div>
                
                
                <div role="tabpanel" class="tab-pane" id="place">
                  <div class="smallboxes">
                    <ul class="home">
                      <li id="location-li">
                      
                      <div class="tophead">Current City</div>
                      
                      <?php if(empty($result[0]->location)) { ?>
                        <div class="iner_lefts" id="add_currentcity1"><i class="fa fa-plus"></i></div>
                        <div class="inner_rights boxs" id="add_currentcity2">
                        <a href="javascript:void(0)" id="add_currentcity" ><h3>Add your current city</h3> </a>
                          
                        </div>
                          <?php }else { ?>
              			<div id="currentcity_val_disp">
                        <div class="sm_leftbox"><i class="fa fa-globe"></i></div>
                        <div class="sm_rightbox"><h3><a href="#"><?php echo $result[0]->location; ?></a></h3>
                        <p>Current city</p>
                        </div>
                        <div class="sm_rightside">
                        <div class="col-md-3 com_le" style="display:none;"><i class="fa fa-globe"></i></div>
                        <div class="col-md-6 com_mid"><a href="javascript:void(0)" onclick="current_city_edit()"><i class="fa fa-pencil"></i></a></div>
                        <div class="col-md-3 com_rig"><a href="javascript:void(0)" onclick="delete_current_city()"><i class="fa fa-times"></i></a></div>
                        </div>
                        </div>
                        <div class="clearfix"></div>
                   
                          
                            <?php } ?>
                        <div class="clearfix"></div>
                      </li>
                      
                      
                      <!-------------current city ------------->
                      
                      <div id="currentcity_disp" style="display:none;">
                            <div class="col-md-12" id="city_place">
                              <form class="form-inline ">
                                <div class="form-group citys">
                                  <label for="exampleInputName2">Current City</label>
                                  <input type="text" placeholder="" id="current_location" value="<?php if($result[0]->location) { echo $result[0]->location ; } ?>">
                                </div>
                                <div class="clearfix"></div>
                              </form>
                              <div class="box_bottom">
                                <div class="publics col-md-4" style="display:none;">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Public <span class="caret"></span></button>
                                </div>
                                <div class="col-md-8 skil_box">
                                 <div class="btn3 btn-green" onclick="add_current_city()">Save Changes</div>
                                      <?php if($result[0]->location) { ?>
                               <div class="btn3 btn-black" onclick="close_currentcity()">Cancel</div>
                                   <?php }else{ ?>
                                       <div class="btn3 btn-black" onclick="close_current_city()">Cancel</div>
                                       <?php } ?>
                                </div>
                                <div class="clearfix"></div>
                              </div>
                            </div>
                              <div class="clearfix"></div>
                          </div>
                      
                      <!--------------current city ------------->
                      
                     
                      <li id="hometown-li">
                      <div class="tophead">Hometown</div>
                        
                         <?php if(empty($result[0]->hometown)) { ?>
                         <div class="iner_lefts" id="hme_town"><i class="fa fa-plus"></i></div>
                        <div class="inner_rights boxs"  id="hme_town1">
                          
 <a href="javascript:void(0)" id="hometown"><h3>Add your hometown</h3></a>                          
                        </div>
                           <?php }else { ?>
                           <div id="hometown_val_disp">
                        <div class="sm_leftbox" ><i class="fa fa-globe"></i></div>
                        <div class="sm_rightbox"><h3><a href="#"><?php echo $result[0]->hometown; ?></a></h3>
                        <p>Home Town</p>
                        </div>
                        <div class="sm_rightside">
                        <div class="col-md-3 com_le" style="display:none;"><i class="fa fa-globe"></i></div>
                        <div class="col-md-6 com_mid"><a href="javascript:void(0)" onclick="home_town_edit()"><i class="fa fa-pencil"></i></a></div>
                        <div class="col-md-3 com_rig"><a href="javascript:void(0)" onclick="delete_hometown()"><i class="fa fa-times"></i></a></div>
                        </div>
                        </div>
                        <div class="clearfix"></div>
                           
                           <?php } ?>
                           
                        <div class="clearfix"></div>
                      </li>
                      
                      
                      
                      
                   
                      
                      <!----------hometown div begin ----------------->
                      
                      
                      <div id="hometown_disp" style="display:none;">
                          <div class="col-md-12" id="city_place">
                              <form class="form-inline ">
                                <div class="form-group citys">
                                  <label for="exampleInputName2">Home Town</label>
                                  <input type="text" placeholder="" id="home_town" value="<?php if($result[0]->hometown) { echo $result[0]->hometown ; } ?>">
                                </div>
                                <div class="clearfix"></div>
                              </form>
                              <div class="box_bottom" >
                                <div class="publics col-md-4" style="display:none;">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Public <span class="caret"></span></button>
                                </div>
                                <div class="col-md-8 skil_box">
                                 <div class="btn3 btn-green" onclick="add_home_town()">Save Changes</div>
                                      <?php if($result[0]->hometown) { ?>
                               <div class="btn3 btn-black" onclick="close_home()">Cancel</div>
                                   <?php }else{ ?>
                                       <div class="btn3 btn-black" onclick="close_home_town()">Cancel</div>
                                       <?php } ?>
                                </div>
                                <div class="clearfix"></div>
                              </div>
                            </div>
                            <div class="clearfix"></div>
                          </div>
                      
                      <!----------hometown div end ------------------->
                      
                    </ul>
                  </div>
                </div>
                                
                <div role="tabpanel" class="tab-pane" id="contact">
                  <div class="smallboxes">
                    <ul class="basic_info">
                      <li id="mobile-li">
                       <!-- <div class="tophead">Contact Information</div> -->
                        <?php if(empty($mobile_data)) { ?>
                        <div class="iner_boxleft" id="add_mbl_block"><a href="javascript:void(0)" id="add_mbl"><i class="fa fa-plus"></i>Add a mobile phone</a></div>
                        <?php } else {   foreach($mobile_data as $data) { ?>
                        <div id="mobile_val_display">
                       <div class="latest_works" id="mobile_<?php echo $data['mobile_id']; ?>"> 
                        <div class="sm_leftbox"></div>
                        <div class="sm_rightbox"><h3><a href="#"><?php echo $data['mobile_no']; ?></a></h3>
                        <p>mobile</p>
                        </div>
                        <div class="sm_rightside">
                        <div class="col-md-3 com_le" style="display:none;"><i class="fa fa-globe"></i></div>
                       <div class="col-md-6 com_mid"><a href="javascript:void(0)" onclick="mbl_edit()"  class="mobile_edit" id="mobile_edit<?php echo $data['mobile_id']; ?>"><i class="fa fa-pencil"></i></a></div>
                        <div class="col-md-3 com_rig"><a  href="javascript:void(0)" onclick="del_mobile()" class="mobile_delete" id="mobile_delete<?php echo $data['mobile_id']; ?>"><i class="fa fa-times"></i></a></div>
                        </div>
                            
                       </div>
                      <div class="clearfix"></div> 
                      </div>
                        <?php } }?> 
                        <div class="inner_rights boxs" id="add_mbl_disp" style="display:none;"> 
                          <div id="mobile" class="col-md-12 mobileone">
                            <form class="form-inline">
                            <div class="add_mbl_append">
                            <div class="adding_anothe_mbl mobile_values">
                            <div id="individual_mbl_con0" class="get_mbl_divs">
                            
                            
                            <div class="form-group mobile col-md-3">
                                <label for="exampleInputName2">Mobile Phones</label>
                              </div>
                              <div class="col-md-3">
                                <select name="country_codes" id="country_codes0">
                                  <option>india(+91)</option>
                                  <option>pakistan(+92)</option>
                                  <option>srilanka(+93)</option>
                                </select>
                              </div>
                              <div class="col-md-3 box-rig_box">
                                <input type="text" id="mobile0" name="mobile_no" value="">
                                 
                              </div>
                              <div class="col-md-3 inside_drop" style="display:none;"> <a aria-expanded="false" role="button" data-toggle="dropdown" class="dropdown-toggle" href="#"> <i class="fa fa-fw"></i> <span class="fa fa-angle-down"></span></a> </div>
                              </div>
                           </div>
                           </div>
                              <div class="clearfix"></div>
                              <div class="iner_boxleft_bottom"><a href="javascript:void(0)" id="add_mbl_link"><i class="fa fa-plus"></i>Add a mobile phone</a></div>
                              <div class="clearfix"></div>
                              <div class="box_bottom">
                                <div class="publics col-md-3"> </div>
                                <div class="col-md-9 skil_box">
                                  
                                  <div class="btn3 btn-green"  onclick="get_mbl_values()">Save Changes</div>
                                 
                                  <div class="btn3 btn-black" onclick="close_mobile()">Cancel</div>
                                
                                </div>
                                <div class="clearfix"></div>
                              </div>
                            </form>
                          </div>
                        </div>
                        
                        
                        <div class="inner_rights boxs" id="mbl_disp_edit" style="display:none;"> 
                          <div id="mobile" class="col-md-12 mobileone">
                            <form class="form-inline">
                            <div class="add_mbl_appenffd">
                              <div class="form-group mobile col-md-3">
                                <label for="exampleInputName2">Mobile Phones</label>
                              </div>
                              <div class="col-md-3">
                                <select name="country_codes" id="country_code_mbl">
                                  <option>india(+91)</option>
                                  <option>pakistan(+92)</option>
                                  <option>srilanka(+93)</option>
                                </select>
                              </div>
                              <div class="col-md-3 box-rig_box">
                                <input type="text" id="mbl_no" name="mobile_no" value="">
                                 <input type="hidden" name="mobile_action" id="mobile_action" value="add">
                       				<input type="hidden" value="" name="mobile_disp_id" id="mobile_no_id"> 
                              </div>
                              <div class="col-md-3 inside_drop"  style="display:none;"> <a aria-expanded="false" role="button" data-toggle="dropdown" class="dropdown-toggle" href="#"> <i class="fa fa-fw"></i> <span class="fa fa-angle-down"></span></a> </div>
                              </div>
                              <div class="clearfix"></div>
                             
                              <div class="clearfix"></div>
                              <div class="box_bottom">
                                <div class="publics col-md-3" style="display:none;"> </div>
                                <div class="col-md-9 skil_box">
                                  
                                  <div class="btn3 btn-green"  onclick="edit_mobile_value()">Save Changes</div>
                                 
                                  <div class="btn3 btn-black" onclick="close_edit_mobile()">Cancel</div>
                                
                                </div>
                                <div class="clearfix"></div>
                              </div>
                            </form>
                          </div>
                        </div>
                        
                        
                        
                        
                        
                        
                        
                        
                        <div class="clearfix"></div>
                      </li>
                      <li id="address-li"> 
                       <!-- <div class="tophead">Add your address</div> -->
                       
                         <?php 
							   if(!empty($result[0]->address))
							 {
								$data = explode('|++|',$result[0]->address);
							 }else
							 {
								 $data ='';
							 }
                          ?>      
                          <?php if(empty($data)) {  ?>
      <div class="iner_boxleft" id="address1"><a href="javascript:void(0)" id="add_address"><i class="fa fa-plus"></i>Add your address</a></div> 
                        <?php } else { ?>
                        
                        <div id="address_val_display">
                        <div class="sm_leftbox"></div>
                        <div class="sm_rightbox"><h3><a href="#">Address</a></h3>
                        <p><?php if($data) { if($data[0]) {  echo $data[0].','; } } ?>
                        <?php if($data) { if($data[1]) {  echo $data[1].','; } } ?>
						<?php if($data) { if($data[2]) {  echo $data[2].'.'; } } ?></p>
                        </div>
                        <div class="sm_rightside">
                        <div class="col-md-3 com_le" style="display:none;"><i class="fa fa-globe"></i></div>
                        <div class="col-md-6 com_mid"><a href="javascript:void(0)" onclick="address_edit()"><i class="fa fa-pencil"></i></a></div>
                        <div class="col-md-3 com_rig"><a href="javascript:void(0)" onclick="del_address()"><i class="fa fa-times"></i></a></div>
                        </div>
                        </div>
                        <div class="clearfix"></div>
                        
                        
                        <?php } ?>
                        
                        
                        
                        
                        <div class="inner_rights boxs" id="address_disp" style="display:none;">
                          <div id="Address" class="col-md-12">
                            <form class="form-inline Address">
                              <label for="exampleInputName2">Address</label>
                              <input type="text" placeholder="" id="address" value="<?php if($data) { if($data[0]) {  echo $data[0]; } } ?>">
                              <div class="clearfix"></div>
                              <label for="exampleInputName2">City/Town</label>
                              <input type="text" placeholder="" id="ad_city" value="<?php if($data) { if($data[1]) {  echo $data[1]; } } ?>">
                              <div class="clearfix"></div>
                              <label for="exampleInputName2">Zip</label>
                              <input type="text" placeholder="" id="zip_code" value="<?php if($data) { if($data[2]) {  echo $data[2]; } } ?>">
                              <div class="clearfix"></div>
                              <label for="exampleInputName2">Neighborhood</label>
                              <input type="text" placeholder="" id="neighborhood" value="<?php if($data) { if($data[3]) {  echo $data[3]; } } ?>">
                              <div class="clearfix"></div>
                            
                            <div class="clearfix"></div>
                            <div class="box_bottom">
                              <div class="publics col-md-3" style="display:none;">
                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Friends <span class="caret"></span></button>
                              </div>
                              <div class="col-md-9 skil_box">
                                        <div class="btn3 btn-green" onclick="add_address()">Save Changes</div>
                                        <?php if($result[0]->address) { ?>
                                <div class="btn3 btn-black" onclick="close_address_block()">Cancel</div>
                      			<?php }else{  ?>
                                <div class="btn3 btn-black" onclick="close_address()">Cancel</div>
                                <?php } ?>
                              </div>
                              <div class="clearfix"></div>
                            </div>
                            </form>
                          </div>
                        </div>
                        <div class="clearfix"></div>
                      </li>
                      <li id="oth_accounts-li"> 
                        <!--<div class="tophead">Add other accounts</div>-->
                        
                        
                           <?php if(empty($accounts_data)) { ?>
                         <div class="iner_boxleft"  id="add_oth_acc1"><a href="javascript:void(0)" id="add_oth_acc"><i class="fa fa-plus"></i>Add other accounts</a></div>
                        <?php } else { 
						
						 foreach($accounts_data as $data) {?>
                        <div id="accounts_val_display">
                          <div class="latest_works" id="accounts_<?php echo $data['account_id']; ?>"> 
                        <div class="sm_leftbox"></div>
                        <div class="sm_rightbox"><h3><a href="#"><?php echo $data['account_name']; ?></a></h3>
                        <p><?php echo $data['account_type']; ?></p>
                        </div>
                        <div class="sm_rightside">
                        <div class="col-md-3 com_le" style="display:none;"><i class="fa fa-globe"></i></div>
                       <div class="col-md-6 com_mid"><a href="javascript:void(0)" onclick="accounts_edit()"  class="account_edit" id="account_edit<?php echo $data['account_id']; ?>"><i class="fa fa-pencil"></i></a></div>
                        <div class="col-md-3 com_rig"><a  href="javascript:void(0)" onclick="account_delete()" class="account_delete" id="account_delete<?php echo $data['account_id']; ?>"><i class="fa fa-times"></i></a></div>
                        </div>
                        </div>
                      
                        <div class="clearfix"></div>
                        </div>
                        
                        <?php } }?>
                        
                                               
                       
                        <div class="inner_rights boxs" id="other_accounts" style="display:none;">
                          <div id="account" class="col-md-12">
                            <form class="form-inline  account">
                            <div class="other_acc_default account_values_div">
                              <div class="form-group col-md-4">
                                <label for="exampleInputName2">Other Accounts</label>
                              </div>
                              <div class="col-md-4">
                                <input type="text" id="account_name0" >
                              </div>
                              <div class="col-md-3">
                                <select id="account_type0">
                                  <option value="facebook">facebook</option>
                                  <option value="twitter">twitter</option>
                                  <option value="pinterest">pinterest</option>
                                  <option value="linked_in">LinkedIn</option>
                                </select>
                              </div>
                              </div>
                              
                              <div class="clearfix"></div>
                              <div class="iner_boxleft_bottom"><a href="javascript:void(0)" id="add_another_link"><i class="fa fa-plus"></i> Add another account</a></div>
                              <div class="clearfix"></div>
                              <div class="box_bottom">
                                <div class="publics col-md-3" style="display:none;"> </div>
                                <div class="col-md-9 skil_box">
                                  <div class="btn3 btn-black" onclick="close_other_accounts()">Cancel</div>
                                  <div class="btn3 btn-green" onclick="add_other_accounts()">Save Changes</div>
                                </div>
                                <div class="clearfix"></div>
                              </div>
                            </form>
                          </div>
                        </div>
                        
                        <div class="inner_rights boxs" id="accounts_disp_edit" style="display:none;">
                          <div id="account" class="col-md-12">
                            <form class="form-inline  account">
                            <div class="other_acc_default account_values_div">
                              <div class="form-group col-md-4">
                                <label for="exampleInputName2">Other Accounts</label>
                              </div>
                              <div class="col-md-4">
                                <input type="text" id="account_name" name="account_name">
                              </div>
                              <div class="col-md-3">
                                <select id="account_type" name="account_type">
                                  <option value="facebook">facebook</option>
                                  <option value="twitter">twitter</option>
                                  <option value="pinterest">pinterest</option>
                                  <option value="linked_in">LinkedIn</option>
                                </select>
                              </div>
                              </div>
                               <input type="hidden" name="account_action" id="account_action" value="add">
                       		  <input type="hidden" value="" name="account_disp_id" id="account_no_id"> 
                              <div class="clearfix"></div>
                             
                              <div class="clearfix"></div>
                              <div class="box_bottom">
                                <div class="publics col-md-3" style="display:none;"> </div>
                                <div class="col-md-9 skil_box">
                                  <div class="btn3 btn-black" onclick="close_account_edit()">Cancel</div>
                                  <div class="btn3 btn-green" onclick="edit_account_values()">Save Changes</div>
                                </div>
                                <div class="clearfix"></div>
                              </div>
                            </form>
                          </div>
                        </div>
                        <div class="clearfix"></div>
                      </li>
                      <li id="website-li"> 
                        <!--<div class="tophead">Add a website</div>-->
                        
                        <?php if(empty($result[0]->website)) { ?>
                        <div class="iner_boxleft" id="add_web_site">
                        <a href="javascript:void(0)" id="add_website"><i class="fa fa-plus"></i>Add a website</a>
                        </div>
                        
                              <?php } else { ?>
                        
                        <div id="website_val_display">
                        <div class="sm_leftbox"></div>
                        <div class="sm_rightbox"><h3><a href="#"><?php echo $result[0]->website; ?></a></h3>
                        <p>website</p>
                        </div>
                        <div class="sm_rightside">
                        <div class="col-md-3 com_le" style="display:none;"><i class="fa fa-globe"></i></div>
                        <div class="col-md-6 com_mid"><a href="javascript:void(0)" onclick="website_edit()"><i class="fa fa-pencil"></i></a></div>
                        <div class="col-md-3 com_rig"><a  href="javascript:void(0)" onclick="del_website()"><i class="fa fa-times"></i></a></div>
                        </div>
                        </div>
                        <div class="clearfix"></div>
                        
                        
                        <?php } ?>
                        
                        
                        
                        <div class="inner_rights boxs" id="website_disp" style="display:none;">
                          <div id="Website" class="col-md-12">
                            <form class="form-inline  Website">
                              <div class="form-group Website">
                                <label for="exampleInputName2">Website</label>
                                <textarea rows="4" placeholder="Enter your website" id="website_data"><?php if($result[0]->website) { echo $result[0]->website; } ?></textarea>
                              </div>
                              <div class="clearfix"></div>
                              <div class="box_bottom">
                                <div class="publics col-md-3" style="display:none;"> </div>
                                <div class="col-md-9 skil_box">
                                  
                                  <div class="btn3 btn-green" onclick="add_website()">Save Changes</div>
                                   <?php if($result[0]->website) { ?>
                                   <div class="btn3 btn-black" onclick="close_web_site()">Cancel</div>
                                   <?php } else { ?>
                                   <div class="btn3 btn-black" onclick="close_website()">Cancel</div>
                                   <?php } ?>
                                </div>
                                <div class="clearfix"></div>
                              </div>
                            </form>
                          </div>
                        </div>
                        <div class="clearfix"></div>
                      </li>
                      <li id="interest-li"> 
                       <!-- <div class="tophead">Basic Information</div> -->
                       <?php if(empty($result[0]->interests)) { ?>
                        <div class="iner_boxleft" id="interest">
                        <a href="javascript:void(0)" id="add_interest"><i class="fa fa-plus"></i>Add who you're interested in</a></div>
                       <?php } else { ?>
                        <div id="interest_val_disp">
                        <div class="sm_leftbox"></div>
                        <div class="sm_rightbox"><h3><a href="#">
						<?php $data = explode(",",$result[0]->interests); 
						$i = 1;
						foreach($data as $data)
						{
							if($i == 2)
						{
							echo " and ";
						}
						
						echo $data;
						
						$i++;
					
						}
						
						 ?></a></h3>
                        
                        </div>
                        <div class="sm_rightside">
                        <div class="col-md-3 com_le" style="display:none;"><i class="fa fa-globe"></i></div>
                        <div class="col-md-6 com_mid"><a href="javascript:void(0)" onclick="interests_edit()"><i class="fa fa-pencil"></i></a></div>
                        <div class="col-md-3 com_rig"><a href="javascript:void(0)" onclick="del_interestedin()"><i class="fa fa-times"></i></a></div>
                        </div>
                        </div>
                        <div class="clearfix"></div>
                        
                        <?php } ?> 
                        
                        <div class="birth birt_bottom col-md-12" id="interest_disp" style="display:none;">
                            <div class="interested col-md-3">Interested In</div>
                            <div class="col-md-4 ">
                              <input type="checkbox" name="interest[]" class="boxsmal" value="women" >
                              women</div>
                            <div class="col-md-4">
                              <input type="checkbox" name="interest[]" class="boxsmal" value="men">
                              Men</div>
                         
                          <div class="box_bottom">
                            <div class="publics col-md-3" style="display:none;">
                              <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Public <span class="caret"></span></button>
                            </div>
                            <div class="col-md-8 skil_box">
                              
                              <div class="btn3 btn-green" onclick="add_interest()">Save Changes</div>
                              <?php if($result[0]->interests) { ?>
                              <div class="btn3 btn-black" onclick="close_interested_in()">Cancel</div>
                              <?php } else { ?>
                              <div class="btn3 btn-black" onclick="close_interest()">Cancel</div>
                              <?php } ?>
                            </div>
                            <div class="clearfix"></div>
                             </div>
                          </div>
                      
                      </li>
                      <li>
                      <div class="inner_rights boxs">
                          <div class="birth col-md-12">
                            <div class="birth_left col-md-6">Birth Date</div>
                            <div class="birth_right col-md-6"><?php $unixTimestamp = strtotime($result[0]->user_dob);
				 echo date('d',$unixTimestamp).", ".date('F',$unixTimestamp); ?></div>
                          </div>
                          <div class="birth col-md-12">
                            <div class="birth_left col-md-6">Birth Year</div>
                            <div class="birth_right col-md-6"><?php $unixTimestamp = strtotime($result[0]->user_dob);
				 echo date('Y',$unixTimestamp); ?></div>
                          </div>
                          <div class="birth col-md-12">
                            <div class="birth_left col-md-6">Gender</div>
                            <div class="birth_right col-md-6"><?php if($result[0]->user_gender){ if($result[0]->user_gender == 'm'){ echo "male"; } else echo "female";  }?></div>
                          </div>
                          
                        </div>
                      </li>
                      <li id="language-li"> 
                        
 						<!-- <div class="tophead">Languages</div> -->
                        <?php if(empty($result[0]->languages)) { ?>
                        <div class="iner_boxleft" id="lang1"><a href="javascript:void(0)" id="add_language"><i class="fa fa-plus"></i>Add a language</a></div> <?php } else { ?>
                        
                        <div id="language_val_display">
                        <div class="sm_leftbox"></div>
                        <div class="sm_rightbox"><h3><a href="#">
						<?php 
						$data = explode(',',$result[0]->languages);
						foreach($data as $lang)
						{
						 echo $lang." . ";
						}
						?>
                        </a></h3>
                        </div>
                        <div class="sm_rightside">
                        <div class="col-md-3 com_le" style="display:none;"><i class="fa fa-globe"></i></div>
                        <div class="col-md-6 com_mid"><a href="javascript:void(0)" onclick="languages_edit()"><i class="fa fa-pencil"></i></a></div>
                        <div class="col-md-3 com_rig"><a href="javascript:void(0)" onclick="del_language()"><i class="fa fa-times"></i></a></div>
                        </div>
                        </div>
                        <div class="clearfix"></div>
                        
                        
                        
                        <?php } ?>
                        <div class="inner_rights boxs" id="language_disp" style="display:none;">
                         
                          <div class="birth birt_bottom col-md-12">
                            <form class="form-inline ">
                              <div class="form-group birth_ins">
                               <div id="selected_langauges">
							   <?php 
							    if($result[0]->languages){ 
							    $data = explode(',',$result[0]->languages);
								foreach($data as $lang)
								{
								
								?>
								   
								   <span class="bc_mail_ids" id="<?php echo $lang; ?>"><?php echo $lang;?><a onclick="removelanguage('<?php echo $lang; ?>')" ><img class="as_close_btn" src="<?php echo base_url('images/close_post.png'); ?>" /></a></span>
								
                                <?php } } ?>   
								  </div>
                                <label for="exampleInputName2">Languages</label>
                                <input type="text" id="lang_box" />
                                <input type="text" id="addedlangs" name="addedlangs" value="<?php if($result[0]->languages){ echo $result[0]->languages; } ?>"></input>
                              </div>
                              <div class="clearfix"></div>
                            </form>
                          </div>
                          <div class="box_bottom">
                            <div class="publics col-md-3" style="display:none;">
                              <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Public <span class="caret"></span></button>
                            </div>
                            <div class="col-md-8 skil_box">
                              
                              <div class="btn3 btn-green" onclick="add_all_languges()">Save Changes</div>
                                <?php if($result[0]->languages) { ?>
                              <div class="btn3 btn-black" onclick="close_language()">Cancel</div>
                              <?php } else { ?>
                              <div class="btn3 btn-black" onclick="close_lang()">Cancel</div>
                            <?php } ?>
                            </div>
                            <div class="clearfix"></div>
                          </div>
                        </div>
                        <div class="clearfix"></div>
                      </li>
                      <li id="relegion-li"> 
                        <!--<div class="tophead">Basic Information</div>-->
                       
                        <?php if(empty($result[0]->religious)) {?>
                         <div class="iner_boxleft" id="relegious"><a href="javascript:void(0)" id="add_relegious"><i class="fa fa-plus"></i>Add your religious views</a></div>
                        
                        
                        <?php } else { ?>
                        
                          <div id="relegious_val_disp">
                        <div class="sm_leftbox"></div>
                        <div class="sm_rightbox"><h3><a href="#">
						<?php  
						$data = explode('|@|',$result[0]->religious);
						echo $data[0];
						 ?></a></h3>
                        <p><?php echo $data[1]; ?></p>
                        </div>
                        <div class="sm_rightside">
                        <div class="col-md-3 com_le" style="display:none;"><i class="fa fa-globe"></i></div>
                        <div class="col-md-6 com_mid"><a href="javascript:void(0)" onclick="relegious_edit()"><i class="fa fa-pencil"></i></a></div>
                        <div class="col-md-3 com_rig"><a href="javascript:void(0)" onclick="del_relegion_belief()"><i class="fa fa-times"></i></a></div>
                        </div>
                        </div>
                        <div class="clearfix"></div>
                        
                         <?php } ?>
                        
                        <div class="inner_rights boxs">
                        
                          <div class="birth birt_bottom col-md-12" id="relegious_disp" style="display:none;">
                            <form class="form-inline ">
                              <div class="form-group birth_ins">
                                <label for="exampleInputName2">Religious Views</label>
                                <input type="text" placeholder="What are your religious beliefs?" id="rel_belief" value="<?php  if(!empty($result[0]->religious)) {  $data = explode('|@|',$result[0]->religious); if($data[0]) { echo $data[0]; }} ?>">
                              </div>
                              <div class="clearfix"></div>
                              <div class="form-group birth_ins">
                                <label for="exampleInputName2">Description</label>
                                <textarea rows="4" id="rel_description"><?php if(!empty($result[0]->religious)) {  $data = explode('|@|',$result[0]->religious);  if($data[1]) { echo $data[1]; } }?></textarea>
                              </div>
                              <div class="clearfix"></div>
                            </form>
                          
                          <div class="box_bottom">
                            <div class="publics col-md-4" style="display:none;">
                              <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Friends of Friends <span class="caret"></span></button>
                            </div>
                            <div class="col-md-8 skil_box">
                         
                              <div class="btn3 btn-green" onclick="add_relegious_belief()">Save Changes</div>
                              <?php if($result[0]->religious) { ?>
                              <div class="btn3 btn-black" onclick="close_relegious()">Cancel</div>
                              <?php }else { ?>
                              <div class="btn3 btn-black" onclick="close_relegious_belief()">Cancel</div>
                              <?php } ?>
                            </div>
                            <div class="clearfix"></div>
                          </div>
                          </div>
                        </div>
                        <div class="clearfix"></div>
                      </li>
                      <li id="political-li"> 
                        <!--<div class="tophead">Basic Information</div>-->
                               <?php if(empty($result[0]->political)) { ?>
                        <div class="iner_boxleft" id="political"><a href="javascript:void(0)" id="add_political"><i class="fa fa-plus"></i>Add your political views</a></div>
                        
                        <?php } else { ?>
                        
                        <div id="political_val_disp">
                        <div class="sm_leftbox"></div>
                        <div class="sm_rightbox"><h3><a href="#">
						<?php  
						$p_data = explode('|@|',$result[0]->political);
						echo $p_data[0];
						 ?></a></h3>
                        <p><?php echo $p_data[1]; ?></p>
                        </div>
                        <div class="sm_rightside">
                        <div class="col-md-3 com_le" style="display:none;"><i class="fa fa-globe"></i></div>
                        <div class="col-md-6 com_mid"><a href="javascript:void(0)" onclick="political_edit()"><i class="fa fa-pencil"></i></a></div>
                        <div class="col-md-3 com_rig"><a href="javascript:void(0)" onclick="del_political_belief()"><i class="fa fa-times"></i></a></div>
                        </div>
                        </div>
                        <?php } ?>
                        <div class="inner_rights boxs">
                                                     
                          <div class="birth birt_bottom col-md-12" id="political_disp" style="display:none;">
                            <form class="form-inline ">
                              <div class="form-group birth_ins">
                                <label for="exampleInputName2">Political Views</label>
                                <input type="text" placeholder="What are your political beliefs?" id="political_belief" value="<?php   if(!empty($result[0]->political)) { $p_data = explode('|@|',$result[0]->political); if($p_data[0]) { echo $p_data[0]; }}?>">
                              </div>
                              <div class="clearfix"></div>
                              <div class="form-group birth_ins">
                                <label for="exampleInputName2" >Description</label>
                                <textarea rows="4" id="pol_description"><?php  if(!empty($result[0]->political)) { $p_data = explode('|@|',$result[0]->political); if($p_data[1]) { echo $p_data[1]; } }?></textarea>
                              </div>
                              <div class="clearfix"></div>
                            </form>
                          
                          <div class="box_bottom">
                            <div class="publics col-md-4" style="display:none;">
                              <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Friends of Friends <span class="caret"></span></button>
                            </div>
                            <div class="col-md-8 skil_box">
                              
                              <div class="btn3 btn-green" onclick="add_political()">Save Changes</div>
							  <?php if($result[0]->political) { ?>
                              <div class="btn3 btn-black" onclick="close_political_belief()">Cancel</div>
                              <?php  } else { ?>
                              <div class="btn3 btn-black" onclick="close_political()">Cancel</div>
                              <?php } ?>
                            </div>
                            <div class="clearfix"></div>
                          </div>
                        </div>
                        </div>
                        <div class="clearfix"></div>
                      </li>
                    </ul>
                  </div>
                </div>
                <div role="tabpanel" class="tab-pane" id="family">
                  <div class="smallboxes">
                    <ul class="relations">
                      <li id="relation-li">
                        <div class="tophead">Relationship</div>
                        <?php if(empty($result[0]->relationshipstatus)) { ?>
                        <div class="iner_lefts" id="relation1"><i class="fa fa-plus"></i></div>
                        <div class="inner_rights boxs" id="relation2">
                          <a href="javascript:void(0)" id="relation_status"><h3>Add your relationship status</h3></a>
                          
                        </div>
                        <?php } else { ?>
                        <div id="relation">
                            <div class="relation_box col-md-12">
                              <div class="col-md-8" style="margin-left:-40px;">
                                <div class="col-md-2 relationss"> <i class="fa fa-heart"></i></div>
                                <div class="col-md-10">
                                  <h3><?php echo $result[0]->relationshipstatus; ?></h3>
                                </div>
                              </div>
                              <div class="col-md-4 rightblock " >
                                <div class="col-md-3 family" style="display:none;"><a href="#"><i class="fa fa-globe"></i></a></div>
                                <div class="col-md-9 com_rig" ><a href="javascript:void(0)"  onclick="edit_relation()"><i class="fa fa-pencil"></i></a> </div>
                              </div>
                            </div>
                          </div>
							<?php } ?>
                        <div class="clearfix"></div>
                      </li>
                      
                      
                      <!------------  relation ship status start  --------------->
                      
                      <div id="relation_disp" style="display:none;">
                            <div class="relation_box col-md-12">
                              <div class="col-md-9">
                                <form class="form-inline">
                              
                                  <div class="form-group Familys">
                                  <div class="col-md-6 col-md-offset-3">
                                  <label for="exampleInputName2">RelationShip Status</label>
                                  <select name="relation_type" id="relation_type">
                                      <option value="relation">relation</option>
                                      <option value="lover">lover</option>
                                      <option value="frnd">frnd</option>
                                  </select>
                                  
                                  </div>
                                  </div>
                                  <div class="box_bottom">
                                    <div class="publics col-md-4" style="display:none;">
                                      <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Public <span class="caret"></span></button>
                                    </div>
                                    <div class="col-md-8">
                                   
                                      <div class="btn3 btn-green" onclick="add_relation()">Save Changes</div>
                                      <?php if($result[0]->relationshipstatus) { ?>
                                         <div class="btn3 btn-black" onclick="close_relation()">Cancel</div> 
                                         <?php }else { ?>
                                           <div class="btn3 btn-black" onclick="close_relationship()">Cancel</div>
                                    <?php } ?>
                                    </div>
                                    <div class="clearfix"></div>
                                  </div>
                                </form>
                              </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="graphic"></div>
                          </div>
                      <!------------  relation ship status end    --------------->
                      
                      
                      
                                          
                      
                      <li id="familymembers-li">
                      
                         <div id="tpfam" class="tophead">Family Members</div>
                        <div class="iner_lefts" id="add_f_member1"><i class="fa fa-plus"></i></div>
                        <div class="inner_rights boxs" id="add_f_member">
                          <a href="javascript:void(0)"  id="familymembers"> <h3>Add a family member</h3></a>
                        </div>
                      <div class="clearfix"></div>
                      
                      
                      
                      <div id="family_val_disp">
   				
         
                       <?php 
					   
					   if(!empty($family_members))
                    {
                        foreach($family_members as $family)
                        { 
						?>
                   
                      <div class="latest_works" id="family_<?php echo $family['fam_member_id']; ?>">
                          <div class="sm_leftbox"></div>
                        <div class="sm_rightbox"><h3><a href="#"><?php echo $family['member_name']; ?> </a></h3>
                        <p><?php echo $family['member_relation']; ?></p>
                        </div>
                        <div class="sm_rightside">
                        <div class="col-md-3 com_le" style="display:none;"><i class="fa fa-globe"></i></div>
                        <div class="col-md-6 com_mid"><a href="javascript:void(0)" class="family_edit" id="family_edit<?php echo $family['fam_member_id']; ?>"><i class="fa fa-pencil"></i></a></div>
                        <div class="col-md-3 com_rig"><a href="javascript:void(0)" onclick="del_fam_member('<?php echo $family['fam_member_id']; ?>')"><i class="fa fa-times"></i></a></div>
                        </div>
                        </div>
                         <div class="clearfix"></div>
                         <?php } }?>
           
                        </div>
                   
                    
                      </li>
                
                     
                      
                      <!-------------    family members div start    -------------------->
                      
                      
                      
                      <div id="family_relation" style="display:none;">

                            <div class="relation_box col-md-12">
                              <div class="col-md-9">
                                <form class="form-inline" id="add_family_member">
                                  <div class="form-group Familys">
                                    <label for="exampleInputName2">Family Member</label>
                                    <input class="boderbox" type="text" name="family_member" id="family_member">
                                  </div>
                                  <div class="form-group Familys">
                                  <div class="col-md-6 col-md-offset-3">
                                  <select name="family_member_type" id="family_member_type">
                                      <option value="relation">relation</option>
                                      <option value="lover">lover</option>
                                      <option value="frnd">frnd</option>
                                  </select>
                                  <input type="hidden" name="family_action" id="family_action" value="add">
                       			  <input type="hidden" value="" name="family_disp_id" >
                                  </div>
                                  </div>
                                  <div class="box_bottom"> 
                                    <div class="publics col-md-4" style="display:none;">
                                      <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Public <span class="caret"></span></button>
                                    </div>
                                    <div class="col-md-8">
                                      
                                      <input type="submit" class="btn3 btn-green" value="Save Changes" />
                                      <?php if($family_members) { ?>
                                      <div class="btn3 btn-black" onclick="close_family()">Cancel</div>
                                      <?php } else { ?>
                                      <div class="btn3 btn-black" onclick="close_family_member()">Cancel</div>
                                      <?php } ?>
                                    </div>
                                    <div class="clearfix"></div>
                                  </div>
                                </form>
                              </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="graphic"></div>
                          </div>
                      
                      
                      
                      
                      
                      <!-------------    family members div end -------------------------->
                      
                      
                      
                  
                    </ul>
                  </div>
                </div>
                <div role="tabpanel" class="tab-pane" id="details">
                  <div class="smallboxes">
                    <ul class="details_about">
                  
                      <li id="aboutme-li">
                        <div class="tophead">About You</div>
                        <?php if(empty($result[0]->aboutme)) { ?>
                        <div class="iner_boxleft"><a href="javascript:void(0)" id="aboutme_a"><i class="fa fa-plus"></i>Write some details about yourself</a></div>
                         <?php }else { ?>
                        <div id="aboutme_val_disp">
                      
                        <div class="sm_rightbox"><h3><a href="#"><?php echo $result[0]->aboutme ; ?></a></h3>
                       
                        </div>
                        <div class="sm_rightside">
                        <div class="col-md-3 com_le" style="display:none;"><i class="fa fa-globe"></i></div>
                        <div class="col-md-6 com_mid"><a href="javascript:void(0)" onclick="about_me_edit()"><i class="fa fa-pencil"></i></a></div>
                        <div class="col-md-3 com_rig"><a href="javascript:void(0)" onclick="del_about_me()"><i class="fa fa-times"></i></a></div>
                        </div>
                        </div>
                        <div class="clearfix"></div>
                         
                         
                         
                         
                         <?php } ?>
                        <div class="clearfix"></div>
                     
                      </li>
                      
                      
                      <!----------------------   Aboutme start  ------------------------>
                      
                      

                      <div class="inner_rights boxs" id="aboutme_disp" style="display:none;">
                       <div id="aboutyou">
                            <div id="aboutyou_place" class="col-md-12">
                              <form class="form-inline ">
                                <div class="form-group aboutu">
                                  <label for="exampleInputName2">About You</label>
                                  <textarea rows="4" name="about_me_data" id="about_me_data"><?php if($result[0]->aboutme) { echo $result[0]->aboutme; } ?></textarea>
                                </div>
                                <div class="clearfix"></div>
                                <div class="box_bottom">
                                  <div class="publics col-md-2" style="display:none;">
                                    <button aria-expanded="false" data-toggle="dropdown" class="btn btn-default dropdown-toggle" type="button">Public <span class="caret"></span></button>
                                  </div>
                                  <div class="col-md-10 skil_box">
                                    <div class="btn3 btn-green" onclick="add_aboutme()">Save Changes</div>
                                       <?php if($result[0]->aboutme) { ?>
                                    <div class="btn3 btn-black" onclick="close_aboutme()">Cancel</div>
                                        <?php }else{ ?>
                                     <div class="btn3 btn-black" onclick="close_about_me()">Cancel</div>
                                   <?php } ?>
                                  </div>
                                  <div class="clearfix"></div>
                                </div>
                              </form>
                            </div>
                          </div>
                       
                             <div class="clearfix"></div>
                       </div>
                      
                      
                      
                      
                      
                      
                      <!----------------------   Aboutme End    ------------------------>
                      
                      
                      
                      
                      <li id="nic_names-li">
                        <div id="111" class="tophead">Other Names</div>
                                               
         <div class="iner_boxleft othnames" id="other_name"><a href="javascript:void(0)" id="oth_name"><i class="fa fa-plus"></i>Add a nickname, a birth name...</a></div>
            <div class="clearfix"></div>
            
            
            
              <div id="nicnames_val_disp">
   				  <?php 
					   
					   if(!empty($nick_names))
                    {
                        foreach($nick_names as $nicname)
                        { 
						?>
                       <div class="latest_works" id="nick_<?php echo $nicname['nic_name_id']; ?>">
                          <div class="sm_leftbox"></div>
                        <div class="sm_rightbox"><h3><a href="#"><?php echo $nicname['nic_name']; ?></a></h3>
                        <p><?php echo $nicname['nic_name_type']; ?></p>
                        </div>
                        <div class="sm_rightside">
                        <div class="col-md-3 com_le" style="display:none;"><i class="fa fa-globe"></i></div>
                        <div class="col-md-6 com_mid"><a href="javascript:void(0)" onclick="nick_edit()" class="nick_edit" id="nick_edit<?php echo $nicname['nic_name_id']; ?>"><i class="fa fa-pencil"></i></a></div>
                        <div class="col-md-3 com_rig"><a href="javascript:void(0)" onclick="del_nic_name('<?php echo $nicname['nic_name_id'] ?>')"><i class="fa fa-times"></i></a></div>
                        </div>
                        </div>
                         <div class="clearfix"></div>
                         <?php } }?>
           
                        </div>
                        
              
                        <div class="inner_rights boxs" id="other_names" style="display:none;">
                     
                          <div id="others">
                            <div id="others_place" class="col-md-12">
                              <form class="form-inline" id="add_nick_name">
                                <div class="form-group others">
                                  <label for="exampleInputName2">Name Type</label>
                                  <select id="nic_oth_names" name="nic_oth_names">
                                    <option value="nickname ">Nickname</option>
                                    <option value="firstname ">firstname</option>
                                    <option value="lastname ">lastname</option>
                                    <option value="middlename ">middlename</option>
                                    
                                  </select>
                                </div>
                                <div class="form-group others">
                                  <label for="exampleInputName2">Name</label>
                                  <input type="text" placeholder="" id="nic_name" name="nic_name">
                                </div>
                                   <input type="hidden" name="nickname_action" id="nickname_action" value="add">
                       			  <input type="hidden" value="" name="nickname_disp_id" >
                              
                                <div class="clearfix"></div>
                                <div class="box_bottom">
                                  <div class="publics col-md-2" style="display:none;">
                                    <button aria-expanded="false" data-toggle="dropdown" class="btn btn-default dropdown-toggle" type="button">Public <span class="caret"></span></button>
                                  </div>
                                   <div class="col-md-5" style="margin-left:75px;">
                              
                                    <input type="submit" class="btn3 btn-green" value="Save Changes" />
                                        <?php if($nick_names) { ?>  
                                       <div class="btn3 btn-black" onclick="close_othernames()">Cancel</div>
                                      <?php } else { ?>
                                      <div class="btn3 btn-black" onclick="close_other_names()">Cancel</div>
                                      <?php } ?>
                                  </div>
                                  <div class="clearfix"></div>
                                </div>
                              </form>
                            </div>
                              <div class="clearfix"></div>
                          </div>
                        </div>
                        <div class="clearfix"></div>
                      </li>
                      
                      
                      <li id="favquotes-li">
                        <div class="tophead">Favorite Quotes</div>
                        <?php if(empty($result[0]->favquotes)) { ?>
                        <div class="iner_boxleft"><a href="javascript:void(0)" id="fav_quotes"><i class="fa fa-plus"></i>Add your favorite quotations</a></div>
                        
                      <?php } else { ?>  
                        
                        
                        <div id="favquotes_val_disp">
                      
                        <div class="sm_rightbox"><h3><a href="#"><?php echo $result[0]->favquotes ; ?></a></h3>
                       
                        </div>
                        <div class="sm_rightside">
                        <div class="col-md-3 com_le" style="display:none;"><i class="fa fa-globe"></i></div>
                        <div class="col-md-6 com_mid"><a href="javascript:void(0)" onclick="fav_quotes_edit()"><i class="fa fa-pencil"></i></a></div>
                        <div class="col-md-3 com_rig"><a href="javascript:void(0)" onclick="del_fav_quotes()"><i class="fa fa-times"></i></a></div>
                        </div>
                        
                        </div>
                        <div class="clearfix"></div>
                        <?php } ?>
                        <div class="clearfix"></div>
                      </li>
                      
                      <!------------------- favorite quotes start ------------------->
                      
                      
                      <div class="inner_rights boxs" style="display:none" id="fav_quotes_disp">
                          <div id="favorite">
                            <div id="favorite_place" class="col-md-12">
                              <form class="form-inline ">
                                <div class="form-group favorite">
                                  <label for="exampleInputName2">Favorite Quotes</label>
                                  <textarea rows="4" name="fav_quotes_data" id="fav_quotes_data"><?php if($result[0]->favquotes) { echo $result[0]->favquotes; } ?></textarea>
                                </div>
                                <div class="clearfix"></div>
                                <div class="box_bottom">
                                  <div class="publics col-md-2" style="display:none;">
                                    <button aria-expanded="false" data-toggle="dropdown" class="btn btn-default dropdown-toggle" type="button">Public <span class="caret"></span></button>
                                  </div>
                                  <div class="col-md-10 skil_box">
                                     <div class="btn3 btn-green" onclick="add_favquotes()">Save Changes</div>
                               <?php if($result[0]->favquotes) { ?>
                                 
                                    <div class="btn3 btn-black" onclick="close_favquotes()">Cancel</div>
                                    <?php }else { ?>
                                    <div class="btn3 btn-black" onclick="close_fav_quotes()">Cancel</div>
                                    <?php } ?>
                                  </div>
                                  <div class="clearfix"></div>
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>
                      
                      
                      <!-------------------  favorite quotes end  ------------------->
                      
                      
                      
                      
                      
                      
                      
                      
                    </ul>
                  </div>
                </div>
                <div role="tabpanel" class="tab-pane" id="life">
                  <div class="smallboxes">
                    <ul>
                      <li>
                        <div class="iner_lefts"><i class="fa fa-plus"></i></div>
                        <div class="inner_rights">
                          <h3>Life Events</h3>
                        </div>
                        <div class="clearfix"></div>
                      </li>
                      <li>
                        <div class="iner_lefts"><i class="fa fa-plus"></i></div>
                        <div class="inner_rights">
                          <h3>Add a life event</h3>
                        </div>
                        <div class="clearfix"></div>
                      </li>
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
