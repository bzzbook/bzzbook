<section class="col-lg-9 col-md-9 nopad">
      <div class="col-xs-12 ProfileView">
        <section class="visitorBox">
          <div class="visitiBoxInner">
            <figure class="compCover"><img alt="" src="<?php echo base_url(); ?>images/about_banner.jpg" class="img-responsive"></figure>
              <?php  $image = $this->profile_set->get_profile_pic();
			         $data = $this->profile_set->get_userinfo(); 
					 $result = $this->profile_set->save_settings();
					 $organization_details = $this->profile_set->getorganizationDetails();
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
                  <li role="presentation" class="active"><a href="#overview" aria-controls="home" role="tab" data-toggle="tab">Overview</a></li>
                  <li role="presentation"><a href="#education" aria-controls="profile" role="tab" data-toggle="tab">Work and Education </a></li>
                  <li role="presentation"><a href="#place" aria-controls="messages" role="tab" data-toggle="tab">Places You've Lived </a></li>
                  <li role="presentation"><a href="#contact" aria-controls="messages" role="tab" data-toggle="tab">Contact and Basic Info</a></li>
                  <li role="presentation"><a href="#family" aria-controls="profile" role="tab" data-toggle="tab">Family and Relationships </a></li>
                  <li role="presentation"><a href="#details" aria-controls="profile" role="tab" data-toggle="tab">Details About You </a></li>
                  <li role="presentation"><a href="#life" aria-controls="profile" role="tab" data-toggle="tab">Life Events</a></li>
                </ul>
              </div>
              <div class="tab-content col-md-8">
                <div role="tabpanel" class="tab-pane active" id="overview">
                  <div class="smallboxes col-lg-7">
                    <ul>
                      <li>
                        <div class="iner_lefts"><i class="fa fa-plus"></i></div>
                        <div class="inner_rights boxs">
                          <h3><a href="#">Add a workplace</a></h3>
                          <div class="graphic"></div>
                        </div>
                        <div class="clearfix"></div>
                      </li>
                      <li>
                        <div class="iner_lefts"></div>
                        <div class="inner_rights boxs">
                          <h5>Studied at <a href="#">Göteborgs Universitet</a></h5>
                          <p><span>Past:</span><a href="#">ZPH School</a></p>
                          <div class="edu_cation"><a href="#">Edit your education</a></div>
                        </div>
                        <div class="clearfix"></div>
                      </li>
                      <li>
                        <div class="iner_lefts"></div>
                        <div class="inner_rights boxs">
                          <h5>Lives in <a href="#"> Vizag</a></h5>
                          <p><span>From </span><a href="#">Visakhapatnam</a></p>
                          <div class="edu_cation"><a href="#">Edit the places you've lived</a></div>
                        </div>
                        <div class="clearfix"></div>
                      </li>
                      <li>
                        <div class="iner_lefts"><i class="fa fa-plus"></i></div>
                        <div class="inner_rights boxs">
                          <h3><a href="#">Add a relationship</a></h3>
                          <div class="graphic"></div>
                        </div>
                        <div class="clearfix"></div>
                      </li>
                    </ul>
                  </div>
                  <div class="addresbox col-lg-5 col-md-5 ">
                    <ul>
                      <li>
                        <div class="boxicon"><img src="images/phoneicon.png" alt=""></div>
                        <div class="boxicon_text">9876543210</div>
                      </li>
                      <li>
                        <div class="boxicon"><img src="images/mailicon.png" alt=""></div>
                        <div class="boxicon_text">987654321@bzzbook<br>
                          .com</div>
                      </li>
                      <li>
                        <div class="boxicon"><img src="images/printicon.png" alt=""></div>
                        <div class="boxicon_text">December 13, 1994</div>
                        <br>
                        <a href="#">Edit your basic info</a> </li>
                    </ul>
                  </div>
                </div>
                <div role="tabpanel" class="tab-pane" id="education">
                  <div class="small_boxes col-md-12">
                    <ul class="backgrounds">
                      <li id="workplace-li">
                        <div class="tophead">Work</div>
                         
                        <div class="iner_lefts" id="work_head1"><a href="#"><i class="fa fa-plus"></i></a></div>
                        <div class="inner_rights boxs" id="work_head2">
                          <h3><a href="javascript:void(0)" id="add_workplace">Add a workplace</a></h3>
                          
                          <div class="clearfix"></div>
                        </div>
                       
						
						 <div id="work_val_disp">
   	<?php 
				if(sizeof($organization_details)>0):
				foreach($organization_details as $orgdetails):
			?>
                      
                        <div class="sm_rightbox"><h3><a href="#"><?php echo $orgdetails->org_name;?></a></h3>
                        <p><?php echo $orgdetails->position;?></p>
                        </div>
                        <div class="sm_rightside">
                        <div class="col-md-3 com_le"><i class="fa fa-globe"></i></div>
                        <div class="col-md-6 com_mid"><a class="work_edit" href="javascript:void(0)" onclick="work_edit()" id="work_edit<?php echo $orgdetails->organization_id; ?>"><i class="fa fa-pencil"></i> Edit</a></div>
                        <div class="col-md-3 com_rig"><a href="#"><i class="fa fa-times"></i></a></div>
                        </div>
                         <?php endforeach;?>
            <?php endif;?>
            <div class="clearfix"></div>
                        </div>
                        
                   
                    <!-- $this->load->view('aboutme/work_inner'); -->
                       
                        <div id="allbox" >
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
                                    <input type="checkbox" class="outside" name="curent_status" id="curent_status">
                                    I currently work </div>
                                  <div class="col-md-12">
                                    <div class="col-md-6 yearadd" id="add_years" style="display:none;"><a href="javascript:void(0)" onclick="add_year()" ><i class="fa fa-plus"></i>Add year</a></div>
                                  <select id="frm_years" style="display:none;" name="frm_years" >
                                  <option value="0"> --- </option>
                                   <option value="1950" selected="selected">1950</option>
                                   <?php for($i=1951;$i<=date(Y);$i++){?>
                                	<option value="<?php echo $i;?>"><?php echo $i;?></option>
                              	  <?php }?>
                                  </select>
                                  <a href="javascript:void(0)" id="frm_months_link"  style="display:none;" ><i class="fa fa-plus"></i>Add month</a>
                                  <select id="frm_months" style="display:none;" name="frm_months"> 
                                  <option value="0"> --- </option>
                                   <option value="1" selected="selected">1</option>
                                   <?php for($i=2;$i<=12;$i++){?>
                                	<option value="<?php echo $i;?>" ><?php echo $i;?></option>
                              	  <?php }?>
                                  </select>
                                  <a href="javascript:void(0)" id="frm_days_link"  style="display:none;"><i class="fa fa-plus"></i>Add day</a>
                                  <select id="frm_days" style="display:none;" name="frm_days">
                                  <option value="0"> --- </option>
                                  <option value="1" selected="selected">1</option>
                                   <?php for($i=2;$i<=31;$i++){?>
                                	<option value="<?php echo $i;?>" ><?php echo $i;?></option>
                              	  <?php }?>
                                  </select>
                                   <div id="to" style="display:none;">to </div>
                                    <div id="to_present" style="display:none;">to present</div>
                                  <a href="javascript:void(0)" id="to_years_link"  style="display:none;" ><i class="fa fa-plus"></i>Add years</a>
                                                       
                                   
                                  </div>
                                  
                                  <!---  ---->
                                  <div class="col-md-12" id="todates_dropdowns">
                                    
                                  <select id="to_years" style="display:none;" name="to_years">
                                  <option value="0"> --- </option>
                                   <?php for($i=1950;$i<=date(Y);$i++){?>
                                	<option value="<?php echo $i;?>" selected="selected"><?php echo $i;?></option>
                              	  <?php }?>
                                  </select>
                                  <a href="javascript:void(0)" id="to_months_link"  style="display:none;" ><i class="fa fa-plus"></i>Add month</a>
                                  <select id="to_months" style="display:none;" name="to_months">
                                  <option value="0"> --- </option>
                                   <?php for($i=1;$i<=12;$i++){?>
                                	<option value="<?php echo $i;?>" selected="selected"><?php echo $i;?></option>
                              	  <?php }?>
                                  </select>
                                  <a href="javascript:void(0)" id="to_days_link"  style="display:none;"><i class="fa fa-plus"></i>Add day</a>
                                  <select id="to_days" style="display:none;" name="to_days">
                                  <option value="0"> --- </option>
                                   <?php for($i=1;$i<=31;$i++){?>
                                	<option value="<?php echo $i;?>" selected="selected"><?php echo $i;?></option>
                              	  <?php }?>
                                  </select>
                                                      
                                  </div>
                                  <!---  ---->
                                  <div class="clearfix"></div>
                                  <div class="box_bottom">
                                    <div class="publics col-md-4">
                                      <button aria-expanded="false" data-toggle="dropdown" class="btn btn-default dropdown-toggle" type="button">Public <span class="caret"></span></button>
                                    </div>
                                    <div class="col-md-8">
                                      <div class="btn3 btn-black" onclick="close_work()">Cancel</div>
                                      <input type="submit" class="btn3 btn-green" value="save Changes" />
                                    </div>
                                    <div class="clearfix"></div>
                                  </div>
                                </form>
                              </div>
                              <div class="col-md-3 rightblock"><a href="javascript:void(0)" onclick="close_work()"><i class="fa fa-times"></i>close</a></div>
                            </div>
                            <div class="graphic"></div>
                          </div>
                      </li>
                      <div class="clearfix"></div>
                      <li>
                        <div class="tophead">Professional Skills</div>
                        <div class="iner_lefts"><a href="#"><i class="fa fa-plus"></i></a></div>
                        <div class="inner_rights boxs">
                          <h3><a href="#">Add a professional skill</a></h3>
                          <div id="skills" >
                            <div id="skil_place" class="workplace col-md-12">
                              <form class="form-inline ">
                                <div class="form-group skils">
                                  <label for="exampleInputName2">Professional Skills</label>
                                  <input type="text"placeholder="">
                                </div>
                                <div class="clearfix"></div>
                              </form>
                              <div class="box_bottom">
                                <div class="publics col-md-4">
                                  <button aria-expanded="false" data-toggle="dropdown" class="btn btn-default dropdown-toggle" type="button">Public <span class="caret"></span></button>
                                </div>
                                <div class="col-md-8 skil_box">
                                  <div class="btn3 btn-black">Cancel</div>
                                  <div data-target="#AddCompany" data-toggle="modal" class="btn3 btn-green">Save Changes</div>
                                </div>
                                <div class="clearfix"></div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </li>
                      <div class="clearfix"></div>
                      <li>
                        <div class="tophead"> College</div>
                        <div class="iner_lefts"><a href="#"><i class="fa fa-plus"></i></a></div>
                        <div class="inner_rights boxs">
                          <h3><a href="#">Add a college</a></h3>
                          <div id="College" >
                            <div class="College_box col-md-12">
                              <div class="col-md-9">
                                <form class="form-inline">
                                  <div class="form-group">
                                    <label for="exampleInputName2">School</label>
                                    <input type="text"placeholder="What school did you attend?">
                                  </div>
                                  <div class="form-group period">
                                    <label for="exampleInputName2">Time Period</label>
                                    <a href="#"> <i class="fa fa-plus"></i></a><a href="#">Add year</a><span class="to">to</span></div>
                                  <div class="col-md-12">
                                    <div class="col-md-4"></div>
                                    <div class="col-md-8 yearto"><a href="#">Add year</a></div>
                                  </div>
                                  <div class="clearfix"></div>
                                  <div class="form-group">
                                    <label for="exampleInputName2">Graduated</label>
                                    <input class="boxsmal" type="checkbox">
                                  </div>
                                  <div class="clearfix"></div>
                                  <div class="form-group description">
                                    <label for="exampleInputName2">Description</label>
                                    <textarea rows="3"></textarea>
                                  </div>
                                  <div class="clearfix"></div>
                                  <div class="form-group">
                                    <label for="exampleInputName2">School</label>
                                    <input type="text">
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputName2"></label>
                                    <input type="text">
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputName2"></label>
                                    <input type="text">
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputName2">Attended for</label>
                                    <label class="add_new">
                                      <input type="radio" checked="" value="option1" id="optionsRadios1" name="optionsRadios">
                                      Option </label>
                                  </div>
                                  <div class="clearfix"></div>
                                  <div class="form-group">
                                    <label for="exampleInputName2"></label>
                                    <label class="add_new">
                                      <input type="radio" checked="" value="option1" id="optionsRadios1" name="optionsRadios">
                                      Graduate School </label>
                                  </div>
                                  <div class="clearfix"></div>
                                  <div class="box_bottom">
                                    <div class="publics col-md-4">
                                      <button aria-expanded="false" data-toggle="dropdown" class="btn btn-default dropdown-toggle" type="button">Public <span class="caret"></span></button>
                                    </div>
                                    <div class="col-md-8">
                                      <div class="btn3 btn-black">Cancel</div>
                                      <div data-target="#AddCompany" data-toggle="modal" class="btn3 btn-green">Save Changes</div>
                                    </div>
                                    <div class="clearfix"></div>
                                  </div>
                                </form>
                              </div>
                              <div class="col-md-3 rightblock "><a href="#"><i class="fa fa-times"></i></a><a href="#">close</a></div>
                            </div>
                            <div class="graphic"></div>
                          </div>
                        </div>
                      </li>
                      <div class="clearfix"></div>
                      <li>
                        <div class="tophead"> High School</div>
                        <div class="iner_lefts"><a href="#"><i class="fa fa-plus"></i></a></div>
                        <div class="inner_rights boxs">
                          <h3><a href="#">Add a High School</a></h3>
                          <div id="highschool" >
                            <div class="College_box col-md-12">
                              <div class="col-md-9">
                                <form class="form-inline">
                                  <div class="form-group">
                                    <label for="exampleInputName2">School</label>
                                    <input type="text"placeholder="What school did you attend?">
                                  </div>
                                  <div class="form-group period">
                                    <label for="exampleInputName2">Time Period</label>
                                    <a href="#"> <i class="fa fa-plus"></i></a><a href="#">Add year</a><span class="to">to</span></div>
                                  <div class="col-md-12">
                                    <div class="col-md-4"></div>
                                    <div class="col-md-8 yearto"><a href="#">Add year</a></div>
                                  </div>
                                  <div class="clearfix"></div>
                                  <div class="form-group">
                                    <label for="exampleInputName2">Graduated</label>
                                    <input class="boxsmal" type="checkbox">
                                  </div>
                                  <div class="clearfix"></div>
                                  <div class="form-group description">
                                    <label for="exampleInputName2">Description</label>
                                    <textarea rows="3"></textarea>
                                  </div>
                                  <div class="clearfix"></div>
                                  <div class="clearfix"></div>
                                  <div class="box_bottom">
                                    <div class="publics col-md-4">
                                      <button aria-expanded="false" data-toggle="dropdown" class="btn btn-default dropdown-toggle" type="button">Public <span class="caret"></span></button>
                                    </div>
                                    <div class="col-md-8">
                                      <div class="btn3 btn-black">Cancel</div>
                                      <div data-target="#AddCompany" data-toggle="modal" class="btn3 btn-green">Save Changes</div>
                                    </div>
                                    <div class="clearfix"></div>
                                  </div>
                                </form>
                              </div>
                              <div class="col-md-3 rightblock "><a href="#"><i class="fa fa-times"></i></a><a href="#">close</a></div>
                            </div>
                            <div class="graphic"></div>
                          </div>
                        </div>
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
                        <div class="sm_leftbox"></div>
                        <div class="sm_rightbox"><h3><a href="#"><?php echo $result[0]->location; ?></a></h3>
                        <p>Current city</p>
                        </div>
                        <div class="sm_rightside">
                        <div class="col-md-3 com_le"><i class="fa fa-globe"></i></div>
                        <div class="col-md-6 com_mid"><a href="javascript:void(0)" onclick="current_city_edit()"><i class="fa fa-pencil"></i> Edit</a></div>
                        <div class="col-md-3 com_rig"><a href="#"><i class="fa fa-times"></i></a></div>
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
                                <div class="publics col-md-4">
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
                        <div class="sm_leftbox"></div>
                        <div class="sm_rightbox"><h3><a href="#"><?php echo $result[0]->hometown; ?></a></h3>
                        <p>Home Town</p>
                        </div>
                        <div class="sm_rightside">
                        <div class="col-md-3 com_le"><i class="fa fa-globe"></i></div>
                        <div class="col-md-6 com_mid"><a href="javascript:void(0)" onclick="home_town_edit()"><i class="fa fa-pencil"></i> Edit</a></div>
                        <div class="col-md-3 com_rig"><a href="#"><i class="fa fa-times"></i></a></div>
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
                              <div class="box_bottom">
                                <div class="publics col-md-4">
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
                        <div class="tophead">Contact Information</div>
                        <?php if(empty($result[0]->mobile)) { ?>
                        <div class="iner_boxleft" id="add_mbl_block"><a href="javascript:void(0)" id="add_mbl"><i class="fa fa-plus"></i>Add a mobile phone</a></div>
                        <?php } else { ?>
                        
                        <div id="mobile_val_display">
                        <div class="sm_leftbox"></div>
                        <div class="sm_rightbox"><h3><a href="#"><?php echo $result[0]->mobile; ?></a></h3>
                        <p>mobile</p>
                        </div>
                        <div class="sm_rightside">
                        <div class="col-md-3 com_le"><i class="fa fa-globe"></i></div>
                        <div class="col-md-6 com_mid"><a href="javascript:void(0)" onclick="mbl_edit()"><i class="fa fa-pencil"></i> Edit</a></div>
                        <div class="col-md-3 com_rig"><a href="#"><i class="fa fa-times"></i></a></div>
                        </div>
                        </div>
                        <div class="clearfix"></div>
                        
                        
                        <?php } ?>
                        <div class="inner_rights boxs" id="add_mbl_disp" style="display:none;"> 
                          <div id="mobile" class="col-md-12">
                            <form class="form-inline ">
                              <div class="form-group mobile col-md-3">
                                <label for="exampleInputName2">Mobile Phones</label>
                              </div>
                              <div class="col-md-3">
                                <select>
                                  <option>india(+91)</option>
                                </select>
                              </div>
                              <div class="col-md-3 box-rig_box">
                                <input type="text" id="mbl_no" value="<?php if($result[0]->mobile) { echo $result[0]->mobile; } ?>">
                              </div>
                              <div class="col-md-3 inside_drop"> <a aria-expanded="false" role="button" data-toggle="dropdown" class="dropdown-toggle" href="#"> <i class="fa fa-fw"></i> <span class="fa fa-angle-down"></span></a> </div>
                              <div class="clearfix"></div>
                              <div class="iner_boxleft_bottom"><a href="#"><i class="fa fa-plus"></i>Add a mobile phone</a></div>
                              <div class="clearfix"></div>
                              <div class="box_bottom">
                                <div class="publics col-md-3"> </div>
                                <div class="col-md-9 skil_box">
                                  
                                  <div class="btn3 btn-green" onclick="add_mbl()">Save Changes</div>
                                  <?php if($result[0]->mobile) { ?>
                                  <div class="btn3 btn-black" onclick="close_mbl()">Cancel</div>
                                  <?php } else { ?>
                                  <div class="btn3 btn-black" onclick="close_mobile()">Cancel</div>
                                <?php } ?>
                                </div>
                                <div class="clearfix"></div>
                              </div>
                            </form>
                          </div>
                        </div>
                        <div class="clearfix"></div>
                      </li>
                      <li> 
                        <!--<div class="tophead">Add your address</div>-->
                        <div class="iner_boxleft"><a href="#"><i class="fa fa-plus"></i>Add your address</a></div>
                        <div class="inner_rights boxs" id="address_disp" style="display:none;">
                          <div id="Address" class="col-md-12">
                            <form class="form-inline Address">
                              <label for="exampleInputName2">Address</label>
                              <input type="text" placeholder="">
                              <div class="clearfix"></div>
                              <label for="exampleInputName2">City/Town</label>
                              <input type="text" placeholder="">
                              <div class="clearfix"></div>
                              <label for="exampleInputName2">Zip</label>
                              <input type="text" placeholder="">
                              <div class="clearfix"></div>
                              <label for="exampleInputName2">Neighborhood</label>
                              <input type="text" placeholder="">
                              <div class="clearfix"></div>
                            
                            <div class="clearfix"></div>
                            <div class="box_bottom">
                              <div class="publics col-md-3">
                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Friends <span class="caret"></span></button>
                              </div>
                              <div class="col-md-9 skil_box">
                                <div class="btn3 btn-black">Cancel</div>
                                <div data-target="#AddCompany" data-toggle="modal" class="btn3 btn-green">Save Changes</div>
                              </div>
                              <div class="clearfix"></div>
                            </div>
                            </form>
                          </div>
                        </div>
                        <div class="clearfix"></div>
                      </li>
                      <li> 
                        <!--<div class="tophead">Add other accounts</div>-->
                        <div class="iner_boxleft"><a href="#"><i class="fa fa-plus"></i>Add other accounts</a></div>
                        <div class="inner_rights boxs" id="other_accounts" style="display:none;">
                          <div id="account" class="col-md-12">
                            <form class="form-inline  account">
                              <div class="form-group col-md-4">
                                <label for="exampleInputName2">Other Accounts</label>
                              </div>
                              <div class="col-md-4">
                                <input type="text">
                              </div>
                              <div class="col-md-3">
                                <select>
                                  <option>Instagram</option>
                                </select>
                              </div>
                              <div class="clearfix"></div>
                              <div class="iner_boxleft_bottom"><a href="#"><i class="fa fa-plus"></i> Add another account</a></div>
                              <div class="clearfix"></div>
                              <div class="box_bottom">
                                <div class="publics col-md-3"> </div>
                                <div class="col-md-9 skil_box">
                                  <div class="btn3 btn-black">Cancel</div>
                                  <div data-target="#AddCompany" data-toggle="modal" class="btn3 btn-green">Save Changes</div>
                                </div>
                                <div class="clearfix"></div>
                              </div>
                            </form>
                          </div>
                        </div>
                        <div class="clearfix"></div>
                      </li>
                      <li> 
                        <!--<div class="tophead">Add a website</div>-->
                        <div class="iner_boxleft" id="add_web_site"><a href="javascript:void(0)" id="add_website"><i class="fa fa-plus"></i>Add a website</a></div>
                        <div class="inner_rights boxs" id="website_disp" style="display:none;">
                          <div id="Website" class="col-md-12">
                            <form class="form-inline  Website">
                              <div class="form-group Website">
                                <label for="exampleInputName2">Website</label>
                                <textarea rows="4" placeholder="Enter your website"></textarea>
                              </div>
                              <div class="clearfix"></div>
                              <div class="box_bottom">
                                <div class="publics col-md-3"> </div>
                                <div class="col-md-9 skil_box">
                                  <div class="btn3 btn-black">Cancel</div>
                                  <div data-target="#AddCompany" data-toggle="modal" class="btn3 btn-green">Save Changes</div>
                                </div>
                                <div class="clearfix"></div>
                              </div>
                            </form>
                          </div>
                        </div>
                        <div class="clearfix"></div>
                      </li>
                      <li> 
                        <!--<div class="tophead">Basic Information</div>-->
                        <div class="iner_boxleft"><a href="#"><i class="fa fa-plus"></i>Add who you're interested in</a></div>
                        <div class="inner_rights boxs">
                          <div class="birth col-md-12">
                            <div class="birth_left col-md-6">Birth Date</div>
                            <div class="birth_right col-md-6">June 15</div>
                          </div>
                          <div class="birth col-md-12">
                            <div class="birth_left col-md-6">Birth Year</div>
                            <div class="birth_right col-md-6">1979</div>
                          </div>
                          <div class="birth col-md-12">
                            <div class="birth_left col-md-6">Gender</div>
                            <div class="birth_right col-md-6">Male</div>
                          </div>
                          <div class="birth birt_bottom col-md-12">
                            <div class="interested col-md-3">Interested In</div>
                            <div class="col-md-4 ">
                              <input type="checkbox" class="boxsmal">
                              women</div>
                            <div class="col-md-4">
                              <input type="checkbox" class="boxsmal">
                              Men</div>
                          </div>
                          <div class="box_bottom">
                            <div class="publics col-md-3">
                              <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Public <span class="caret"></span></button>
                            </div>
                            <div class="col-md-8 skil_box">
                              <div class="btn3 btn-black">Cancel</div>
                              <div class="btn3 btn-green" data-toggle="modal" data-target="#AddCompany">Save Changes</div>
                            </div>
                            <div class="clearfix"></div>
                          </div>
                        </div>
                        <div class="clearfix"></div>
                      </li>
                      <li> 
                        <!--<div class="tophead">Basic Information</div>-->
                        <div class="iner_boxleft"><a href="#"><i class="fa fa-plus"></i>Add a language</a></div>
                        <div class="inner_rights boxs">
                         
                          <div class="birth birt_bottom col-md-12">
                            <form class="form-inline ">
                              <div class="form-group birth_ins">
                                <label for="exampleInputName2">Languages</label>
                                <input type="text">
                              </div>
                              <div class="clearfix"></div>
                            </form>
                          </div>
                          <div class="box_bottom">
                            <div class="publics col-md-3">
                              <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Public <span class="caret"></span></button>
                            </div>
                            <div class="col-md-8 skil_box">
                              <div class="btn3 btn-black">Cancel</div>
                              <div class="btn3 btn-green" data-toggle="modal" data-target="#AddCompany">Save Changes</div>
                            </div>
                            <div class="clearfix"></div>
                          </div>
                        </div>
                        <div class="clearfix"></div>
                      </li>
                      <li> 
                        <!--<div class="tophead">Basic Information</div>-->
                        <div class="iner_boxleft"><a href="#"><i class="fa fa-plus"></i>Add your religious views</a></div>
                        <div class="inner_rights boxs">
                          
                          
                          
                          <div class="birth birt_bottom col-md-12">
                            <form class="form-inline ">
                              <div class="form-group birth_ins">
                                <label for="exampleInputName2">Religious Views</label>
                                <input type="text" placeholder="What are your religious beliefs?">
                              </div>
                              <div class="clearfix"></div>
                              <div class="form-group birth_ins">
                                <label for="exampleInputName2">Description</label>
                                <textarea rows="4"></textarea>
                              </div>
                              <div class="clearfix"></div>
                            </form>
                          </div>
                          <div class="box_bottom">
                            <div class="publics col-md-3">
                              <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Friends of Friends <span class="caret"></span></button>
                            </div>
                            <div class="col-md-8 skil_box">
                              <div class="btn3 btn-black">Cancel</div>
                              <div class="btn3 btn-green" data-toggle="modal" data-target="#AddCompany">Save Changes</div>
                            </div>
                            <div class="clearfix"></div>
                          </div>
                        </div>
                        <div class="clearfix"></div>
                      </li>
                      <li> 
                        <!--<div class="tophead">Basic Information</div>-->
                        <div class="iner_boxleft"><a href="#"><i class="fa fa-plus"></i>Add your political views</a></div>
                        <div class="inner_rights boxs">
                          
                          
                          
                          <div class="birth birt_bottom col-md-12">
                            <form class="form-inline ">
                              <div class="form-group birth_ins">
                                <label for="exampleInputName2">Political Views</label>
                                <input type="text" placeholder="What are your political beliefs?">
                              </div>
                              <div class="clearfix"></div>
                              <div class="form-group birth_ins">
                                <label for="exampleInputName2">Description</label>
                                <textarea rows="4"></textarea>
                              </div>
                              <div class="clearfix"></div>
                            </form>
                          </div>
                          <div class="box_bottom">
                            <div class="publics col-md-3">
                              <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Friends of Friends <span class="caret"></span></button>
                            </div>
                            <div class="col-md-8 skil_box">
                              <div class="btn3 btn-black">Cancel</div>
                              <div class="btn3 btn-green" data-toggle="modal" data-target="#AddCompany">Save Changes</div>
                            </div>
                            <div class="clearfix"></div>
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
                              <div class="col-md-8">
                                <div class="col-md-2 relationss"> <i class="fa fa-heart"></i></div>
                                <div class="col-md-10">
                                  <h3><?php echo $result[0]->relationshipstatus; ?></h3>
                                </div>
                              </div>
                              <div class="col-md-4 rightblock ">
                                <div class="col-md-3 family"><a href="#"><i class="fa fa-globe"></i></a></div>
                                <div class="col-md-9"> <a href="javascript:void(0)"><i class="fa fa-pencil"></i></a><a href="javascript:void(0)"  onclick="edit_relation()">Edit</a> </div>
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
                                    <div class="publics col-md-4">
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
                       <?php if(empty($result[0]->familymembers)) { ?>
                        <div class="tophead">Family Members</div>
                        <div class="iner_lefts" id="add_f_member1"><i class="fa fa-plus"></i></div>
                        <div class="inner_rights boxs" id="add_f_member">
                          <a href="javascript:void(0)"  id="familymembers"> <h3>Add a family member</h3></a>
                        </div>
                          <?php }else { ?>
                           <div class="tophead">Family Members</div>
                        <div class="iner_lefts" id="add_f_member1"><i class="fa fa-plus"></i></div>
                        <div class="inner_rights boxs" id="add_f_member">
                          <a href="javascript:void(0)"  id="familymembers"> <h3>Add a family member</h3></a>
                        </div>
                        
                   <?php    $trimmed = rtrim($result[0]->familymembers,',');
	//echo $result;
	 //echo $result[0]->familymembers;
	$devided_names = explode(',',$trimmed);
	$data = array();
	foreach($devided_names as $name)
	{
		$cat_names = explode('-',$name);
		$data[] = $cat_names;
	}
	//print_r($data);

	foreach($data as $data)
	{
		//print_r($data);
		//echo '<br>';
	//	echo $data[0] ." is ". $data[1];
	?> 
                   
                     
                     <li>
                        <!--<div class="tophead">All comman Headings styles</div>-->
                        <div class="sm_leftbox"></div>
                        <div class="sm_rightbox"><h3><a href="#"><?php echo $data[0]; ?> </a></h3>
                        <p><?php echo $data[1]; ?></p>
                        </div>
                        <div class="sm_rightside">
                        <div class="col-md-3 com_le"><i class="fa fa-globe"></i></div>
                        <div class="col-md-6 com_mid"><a href="#"><i class="fa fa-pencil"></i> Edit</a></div>
                        <div class="col-md-3 com_rig"><a href="#"><i class="fa fa-times"></i></a></div>
                        </div>
                        
                        <div class="clearfix"></div>
                      </li>
                      <?php } }?>
                     
                       
                        <div class="clearfix"></div>
                      </li>
                
                     
                      
                      <!-------------    family members div start    -------------------->
                      
                      
                      
                      <div id="family_relation" style="display:none;">
                            <div class="relation_box col-md-12">
                              <div class="col-md-9">
                                <form class="form-inline">
                                  <div class="form-group Familys">
                                    <label for="exampleInputName2">Family Member</label>
                                    <input class="boderbox" type="text" name="family_member" id="family_member">
                                  </div>
                                  <div class="form-group Familys">
                                  <div class="col-md-6 col-md-offset-3">
                                  <select name="family_member_type" id="family_member_type">
                                      <option value="relation,">relation</option>
                                      <option value="lover,">lover</option>
                                      <option value="frnd,">frnd</option>
                                  </select>
                                  </div>
                                  </div>
                                  <div class="box_bottom">
                                    <div class="publics col-md-4">
                                      <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Public <span class="caret"></span></button>
                                    </div>
                                    <div class="col-md-8">
                                      
                                      <div class="btn3 btn-green" onclick="add_fam_member()">Save Changes</div>
                                      <?php if($result[0]->familymembers) { ?>
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
                        <div class="col-md-3 com_le"><i class="fa fa-globe"></i></div>
                        <div class="col-md-6 com_mid"><a href="javascript:void(0)" onclick="about_me_edit()"><i class="fa fa-pencil"></i> Edit</a></div>
                        <div class="col-md-3 com_rig"><a href="#"><i class="fa fa-times"></i></a></div>
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
                                  <div class="publics col-md-2">
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
                        
                        <?php if(empty($result[0]->nickname)) { ?>
                        <div class="tophead">Other Names</div>
         <div class="iner_boxleft" ><a href="javascript:void(0)" id="oth_name"><i class="fa fa-plus"></i>Add a nickname, a birth name...</a></div>
                  <?php } else { ?>
                      <div class="tophead">Other Names</div>   
      <div class="iner_boxleft" ><a href="javascript:void(0)" id="oth_name"><i class="fa fa-plus"></i>Add a nickname, a birth name...</a></div>
      <div class="clearfix"></div>


				<?php 
	 


 $result1 = rtrim($result[0]->nickname,' ');
	//echo $result;
	 //echo $result[0]->familymembers;
	$result2 = explode(' ',$result1);
	$data = array();
	foreach($result2 as $res)
	{
		$result3 = explode('-',$res);
		$data[] = $result3;
	}
	//print_r($data);
	if($data)
	{
	foreach($data as $data)
	{
	?>
		
        
     
                     <li>   <!--<div class="tophead">All comman Headings styles</div>-->
                        <div class="sm_leftbox"></div>
                        <div class="sm_rightbox"><h3><a href="#"><?php echo $data[0]; ?> </a></h3>
                        <p><?php echo $data[1]; ?></p>
                        </div>
                        <div class="sm_rightside">
                        <div class="col-md-3 com_le"><i class="fa fa-globe"></i></div>
                        <div class="col-md-6 com_mid"><a href="javascript:void(0)"><i class="fa fa-pencil"></i> Edit</a></div>
                        <div class="col-md-3 com_rig"><a href="#"><i class="fa fa-times"></i></a></div>
                        </div>
                        
                        <div class="clearfix"></div>
                     </li>
        
        
        <?php }} }?>
        
        

                        <div class="inner_rights boxs" id="other_names" style="display:none;">
                          <div id="others">
                            <div id="others_place" class="col-md-12">
                              <form class="form-inline ">
                                <div class="form-group others">
                                  <label for="exampleInputName2">Name Type</label>
                                  <select id="nic_oth_names">
                                    <option value="nickname ">Nickname</option>
                                    <option value="firstname ">firstname</option>
                                    <option value="lastname ">lastname</option>
                                    <option value="middlename ">middlename</option>
                                    
                                  </select>
                                </div>
                                <div class="form-group others">
                                  <label for="exampleInputName2">Name</label>
                                  <input type="text" placeholder="" id="nic_name">
                                </div>
                                <div class="clearfix"></div>
                                <div class="form-group show_prof">
                                  <label for="exampleInputName2"></label>
                                  <input type="checkbox" class="outside">
                                  Show at top of profile </div>
                                <div class="col-md-9 col-md-offset-3 profil_sho">
                                  <p>Other names are always public and help people find you on Facebook.</p>
                                </div>
                                <div class="clearfix"></div>
                                <div class="box_bottom">
                                  <div class="publics col-md-2">
                                    <button aria-expanded="false" data-toggle="dropdown" class="btn btn-default dropdown-toggle" type="button">Public <span class="caret"></span></button>
                                  </div>
                                  <div class="col-md-10 skil_box">
                              
                                    <div class="btn3 btn-green" onclick="add_othernames()">Save Changes</div>
                                          <div class="btn3 btn-black" onclick="close_othernames()">Cancel</div>
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
                        <div class="col-md-3 com_le"><i class="fa fa-globe"></i></div>
                        <div class="col-md-6 com_mid"><a href="javascript:void(0)" onclick="fav_quotes_edit()"><i class="fa fa-pencil"></i> Edit</a></div>
                        <div class="col-md-3 com_rig"><a href="#"><i class="fa fa-times"></i></a></div>
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
                                  <div class="publics col-md-2">
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
