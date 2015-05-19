

 <?php /* ?><section class="about-user-details">
        <h4><span aria-hidden="true" class="glyphicon glyphicon-user"></span> About</h4>
        <div class="about-user-details-inner" >
          <section class="col-lg-12 col-md-12 col-sm-5 col-xs-12 coloumn2 aboutme">
            <div class="posts">
              <div class="col-md-4">
                <ul class="nav-tabs" role="tablist" id="myTab">
                  <li role="presentation" class="active"><a href="#overview" aria-controls="home" role="tab" data-toggle="tab">Overview</a></li>
                  <!--<li role="presentation"><a href="#education" aria-controls="profile" role="tab" data-toggle="tab">Work and Education </a></li>-->
                  <li role="presentation"><a href="#place" aria-controls="messages" role="tab" data-toggle="tab">Places You've Lived </a></li>
                  <li role="presentation"><a href="#contact" aria-controls="messages" role="tab" data-toggle="tab">Contact and Basic Info</a></li>
                  <li role="presentation"><a href="#family" aria-controls="profile" role="tab" data-toggle="tab">Family and Relationships </a></li>
                  <li role="presentation"><a href="#details" aria-controls="profile" role="tab" data-toggle="tab">Details About You </a></li>
                  <li role="presentation"><a href="#life" aria-controls="profile" role="tab" data-toggle="tab">Life Events</a></li>
                </ul>
              </div>
              <div class="tab-content col-md-8">
                <div role="tabpanel" class="tab-pane active" id="overview">
                  <div class="smallboxes">
                    <ul>
                      <li id="aboutme-li">
                        
                        <div class="inner_rights">
                          <h3>About Myself</h3>
                          <p><?php if(empty($result[0]->aboutme)) { ?><a href="javascript:void(0)" onclick="addField('aboutme')" id="aboutme">+ Add Details About Yourself</a><?php }else { echo $result[0]->aboutme; ?><a href="javascript:void(0)" onclick="addField('aboutme')"> edit</a>  <?php } ?></p>
                        </div>
                        <div class="clearfix"></div>
                      </li>
                      <li id="profession-li">
                        
                        <div class="inner_rights">
                         <h3>Work</h3>
                          <div class="data_fileds">
                          <?php $profession_details = $this->profile_set->getorganizationDetails(); if(empty($profession_details)) { ?><p><a href="javascript:void(0)" onclick="addProfession('profession')" id="profession">+ Add Work Place</a></p> <?php }else {  
						  foreach($profession_details as $prof){
								echo '<p id="paragraph'.$prof->organization_id.'">'.$prof->position.' at '.$prof->org_name.'<a href="javascript:void(0)" onclick="editWorkPlace('.$prof->organization_id.')"> edit</a></p>';
						  } 
						  } ?></div><p><a href="javascript:void(0)" onclick="addWork('profession')"> Add Work Place</a></p>
                          <div class="graphic" style="padding-top:10px; display:none;"><form action="javascript:void(0)" method="post"><div class="filed col-md-6">
                <input class="form-control" placeholder="Company" name="org_name" id="org_name" type="text" onkeyup="keyupevent_cmp();" autocomplete="off">
              </div><div id="auto_suggest_company"> </div><div class="filed col-md-6">
                <input class="form-control" placeholder="Positon Held" name="position" id="position" type="text">
              </div>
              <div class="filed col-md-6">
               <input class="fmbtn" style=" border-radius: 2px;
border: medium none;
background: none repeat scroll 0% 0% #609B34;
color: #FFF;
font-size: 12px;
font-weight: 700;
height: 34px;
padding: 0px 10px;
margin-bottom: 20px; float:left; margin-top:5px;" value="Save" type="submit"  onclick="addWorkPlace();"><input class="fmbtn" style=" border-radius: 2px;
border: medium none;
background: none repeat scroll 0% 0% #609B34;
color: #FFF;
font-size: 12px;
font-weight: 700;
height: 34px;
padding: 0px 10px;
margin-bottom: 20px; margin-left:5px; float:left; margin-top:5px;" value="cancle" type="button" onclick="canceladdWork()">
              </div>
 
  </form>

</div>
                        </div>
                        <div class="clearfix"></div>
                      </li>
                      <li id="schooling-li">
                        
                        <div class="inner_rights">
                          <h3>Schooling</h3>
                          <p><?php if(empty($result[0]->schooling)) { ?><a href="javascript:void(0)" onclick="addField('schooling')" id="schooling">+ Add Schooling</a><?php }else { echo $result[0]->schooling; ?><a href="javascript:void(0)" onclick="addField('schooling')"> edit</a>  <?php } ?></p>
                        </div>
                        <div class="clearfix"></div>
                      </li>
                      <li id="location-li">
                        
                        <div class="inner_rights">
                          <h3>Current Location</h3>
                          <p><?php if(empty($result[0]->location)) { ?><a href="javascript:void(0)" onclick="addField('location')" id="location">+ Add current location</a><?php }else { echo $result[0]->location; ?><a href="javascript:void(0)" onclick="addField('location')"> edit</a>  <?php } ?></p>
                        </div>
                        <div class="clearfix"></div>
                      </li>
                      <li id="relationship-li">
                        
                        <div class="inner_rights">
                          <h3>Relationship</h3> 
                          <p><?php if(empty($result[0]->relationship)) { ?><a href="javascript:void(0)" onclick="addField('relationship')" id="relationship">+ Add a relationship</a><?php }else { echo $result[0]->relationship; ?><a href="javascript:void(0)" onclick="addField('relationship')"> edit</a>  <?php } ?></p>
                        </div>
                        <div class="clearfix"></div>
                      </li>
                      <li>
                      
                          <h3>Contact Details</h3>
                          <div style="  margin-top: 15px;
  margin-left: 18px;">
                            <div>
                                <span class="boxicon"><img src="<?php echo base_url(); ?>images/phoneicon.png" alt=""></span>
                                <span class="boxicon_text"><?php echo $result[0]->user_phoneno;?></span>
                            </div>
                            <div>
                                <span class="boxicon"><img src="<?php echo base_url(); ?>images/mailicon.png" alt=""></span>
                                <span class="boxicon_text"><?php echo $user[0]->user_email;?><br>
                                  .com</span>
                            </div>
                            <div>
                                <span class="boxicon"><img src="<?php echo base_url(); ?>images/printicon.png" alt=""></span>
                                <span class="boxicon_text"><?php $unixTimestamp = strtotime($user_info[0]['user_dob']); 
                                echo date('d',$unixTimestamp).", ".date('F',$unixTimestamp).", ".date('Y',$unixTimestamp); ?></span>							</div>
                                </div>
                      </li>
                    </ul>
                  </div>
                
  
                </div>
                <div role="tabpanel" class="tab-pane" id="education">
                  <div class="smallboxes col-md-6">
                    <ul>
                     <?php if($education_details) { foreach($education_details as $edu): ?>
                      <li>
                        
                        <div class="inner_rights">
                          <h3>Institution:</h3>
                          <p><?php echo $edu->college_institution; ?></p>
                        </div>
                        <div class="clearfix"></div>
                      </li>
                      <li>
                        
                        <div class="inner_rights">
                          <h3>Field of Study:</h3>
                          <p><?php echo $edu->field_of_study; ?></p>
                        </div>
                        <div class="clearfix"></div>
                      </li>
                      <li>
                        
                        <div class="inner_rights">
                          <h3>Degree/Certificate:</h3>
                          <p><?php echo $edu->degree_certificate; ?></p>
                        </div>
                        <div class="clearfix"></div>
                      </li>
                      <li>
                        
                        <div class="inner_rights">
                          <h3>Years Attended:</h3>
                          <p><?php echo $edu->attended_from; ?> To <?php echo $edu->attended_upto; ?></p>
                        </div>
                        <div class="clearfix"></div>
                      </li>
                      <li>
                        
                        <div class="inner_rights">
                          <h3>Specialized Studies:</h3>
                          <p><?php echo $edu->specialised_studies; ?></p>
                        </div>
                        <div class="clearfix"></div>
                      </li>
                        <?php endforeach; } else echo "No Details Found";?>
                    </ul>
                  </div>
                </div>
                <div role="tabpanel" class="tab-pane" id="place">
                  <div class="smallboxes">
                    <ul class="home">
                      <li id="location-li">
                        
                        
                    
                          <p><?php if(empty($result[0]->location)) { ?>
                          <a href="javascript:void(0)" id="add_currentcity">+ Add a current location</a>
						  <?php }else { ?>
                           <div id="currentcity_val_disp" style="background-color:#FC9;" class="inner_rights">
                        <h4 style="color:white;"><?php echo $result[0]->location ; ?>
                        <i class='fa fa-pencil'></i> <a id='currentcityedit' href='javascript:void(0)' onclick="current_city_edit()">edit</a></h4>
                        </div>
						  <?php } ?></p>
                      
                        <div class="clearfix"></div>
                        
                        
                    
                        
                      </li>
                      
                      <div id="currentcity_disp" style="display:none" class="inner_rights">
                    <input type="text" name="current_location" id="current_location" value="<?php if($result[0]->location) { echo $result[0]->location ; } ?>"/>
                        <input type="button" id="add_current_city" value="submit" onclick="add_current_city()"/>
                        <?php if($result[0]->location) { ?>
                        <input type="button" id="close_currentcity" onclick="close_currentcity();" value="cancel"/>
                        <?php }else{ ?>
                          <input type="button" id="close_current_city" onclick="close_current_city()" value="cancel"/>
                          <?php } ?>
                        </div>
                      
                      
                      
                                  
                      
                      
                      
                      
                      <li id="hometown-li">
                      
                      <?php if(!empty($result[0]->hometown)) { ?>
                       <div id="hometown_val_disp" style="background-color:#FC9;" class="inner_rights">
                        <h4 style="color:white;"><?php echo $result[0]->hometown ; ?>
                        <i class='fa fa-pencil'></i> <a id='hometownedit' href='javascript:void(0)' onclick="home_town_edit()">edit</a></h4>
                        </div>
                        <?php } else { ?>
                        <div id="hme_town" class="inner_rights">
                          <h3>Home Town</h3>
                           <a href="javascript:void(0)" id="hometown">Add a home town</a>
                            </div>
                           <?php } ?>
                        <?php /*?>  <p><?php if(empty($result[0]->hometown)) { ?> 
                          <a href="javascript:void(0)" onclick="addField('hometown')" id="hometown_sign"> + </a>
                          <a href="javascript:void(0)" onclick="addField('hometown')" id="hometown">Add a home town</a>
						  <?php }else { echo $result[0]->hometown; ?>
                          <i class="fa fa-pencil"></i>
                          <a href="javascript:void(0)" onclick="addField('hometown')">edit</a>  <?php } ?></p>//<?php 
                       
                     /*
                     
                        
                        <div class="clearfix"></div>
                      </li>
                    
                    
                    
                      <div id="hometown_disp" style="display:none" class="inner_rights">
                        <input type="text" name="home_town" id="home_town" value="<?php if($result[0]->hometown) { echo $result[0]->hometown ; } ?>"/>
                        <input type="button" id="add_hometown" value="submit" onclick="add_home_town()"/>
                        <?php if($result[0]->hometown) { ?>
                        <input type="button" id="close_hometown" onclick="close_home();" value="cancel"/>
                        <?php }else{ ?>
                          <input type="button" id="close_hmetown" onclick="close_home_town()" value="canhyhcel"/>
                          <?php } ?>
                        </div>
              
                     </ul>
                    
                  </div>
                </div>
                <div role="tabpanel" class="tab-pane" id="contact">
                  <div class="smallboxes">
                    <ul>
                      <li id="email-li">
                        
                        <div class="inner_rights">
                        	<h3>Email</h3>
                          <p><?php if(empty($result[0]->email)) { ?><a href="javascript:void(0)" onclick="addField('email')" id="email">+ Add Email</a><?php }else { echo $result[0]->email; ?><a href="javascript:void(0)" onclick="addField('email')"> edit</a>  <?php } ?></p> 
                        </div>
                        <div class="clearfix"></div>
                      </li>
                      <li id="mobile-li">
                        
                        <div class="inner_rights">
                          <h3>Mobile</h3>
                          <p><?php if(empty($result[0]->mobile)) { ?><a href="javascript:void(0)" onclick="addField('mobile')" id="mobile">+ Add Mobile No</a><?php }else { echo $result[0]->mobile; ?><a href="javascript:void(0)" onclick="addField('mobile')"> edit</a>  <?php } ?></p>
                        </div>
                        <div class="clearfix"></div>
                      </li>
                      <li id="address-li">
                        
                        <div class="inner_rights">
                          <h3>Address</h3>
                          <p><?php if(empty($result[0]->address)) { ?><a href="javascript:void(0)" onclick="addField('address')" id="address">+ Add Address</a><?php }else { echo $result[0]->address; ?><a href="javascript:void(0)" onclick="addField('address')"> edit</a>  <?php } ?></p>
                        </div>
                        <div class="clearfix"></div>
                      </li>
                      <li id="website-li">
                        
                        <div class="inner_rights">
                          <h3>Website</h3>
                          <p><?php if(empty($result[0]->website)) { ?><a href="javascript:void(0)" onclick="addField('website')" id="website">+ Add website</a><?php }else { echo $result[0]->website; ?><a href="javascript:void(0)" onclick="addField('website')"> edit</a>  <?php } ?></p>
                        </div>
                        <div class="clearfix"></div>
                      </li>
                      <li id="basicinfo-li">
                        
                        <div class="inner_rights">
                          <h3>Basic Information</h3>
                          <p><?php if(empty($result[0]->basicinfo)) { ?><a href="javascript:void(0)" onclick="addField('basicinfo')" id="basicinfo">+ Add Basic Info</a><?php }else { echo $result[0]->basicinfo; ?><a href="javascript:void(0)" onclick="addField('basicinfo')"> edit</a>  <?php } ?></p>
                        </div>
                        <div class="clearfix"></div>
                      </li>
                      <li id="interests-li">
                        
                        <div class="inner_rights">
                          <h3>Interests</h3>
                          <p><?php if(empty($result[0]->interests)) { ?><a href="javascript:void(0)" onclick="addField('interests')" id="interests">+ Add Your Interests</a><?php }else { echo $result[0]->interests; ?><a href="javascript:void(0)" onclick="addField('interests')"> edit</a>  <?php } ?></p>
                        </div>
                        <div class="clearfix"></div>
                      </li>
                      <li id="languages-li">
                        
                        <div class="inner_rights">
                          <h3>languages known</h3>
                           <p><?php if(empty($result[0]->languages)) { ?><a href="javascript:void(0)" onclick="addField('languages')" id="languages">+ Add Languages Known</a><?php }else { echo $result[0]->languages; ?><a href="javascript:void(0)" onclick="addField('languages')"> edit</a>  <?php } ?></p>
                        </div>
                        <div class="clearfix"></div>
                      </li>
                      <li id="religious-li">
                        
                        <div class="inner_rights">
                          <h3>Religious Views</h3>
                          <p><?php if(empty($result[0]->religious)) { ?><a href="javascript:void(0)" onclick="addField('religious')" id="religious">+ Add Religious Views</a><?php }else { echo $result[0]->religious; ?><a href="javascript:void(0)" onclick="addField('religious')"> edit</a>  <?php } ?></p>
                        </div>
                        <div class="clearfix"></div>
                      </li>
                      <li id="political-li">
                        
                        <div class="inner_rights">
                          <h3>Political Views</h3>
                          <p><?php if(empty($result[0]->political)) { ?><a href="javascript:void(0)" onclick="addField('political')" id="political">+ Add Political Views</a><?php }else { echo $result[0]->political; ?><a href="javascript:void(0)" onclick="addField('political')"> edit</a>  <?php } ?></p>
                        </div>
                        <div class="clearfix"></div>
                      </li>
                    </ul>
                  </div>
                </div>
                <div role="tabpanel" class="tab-pane" id="family">
                  <div class="smallboxes">
                    <ul>
                      <li id="relationshipstatus-li">
                        
                        <div class="inner_rights">
                          <h3>Relationship Status</h3>
                          <p><?php if(empty($result[0]->relationshipstatus)) { ?><a href="javascript:void(0)" onclick="addField('relationshipstatus')" id="relationshipstatus">+ Add Relationship Status</a><?php }else { echo $result[0]->relationshipstatus; ?><a href="javascript:void(0)" onclick="addField('relationshipstatus')"> edit</a>  <?php } ?></p>
                        </div>
                        <div class="clearfix"></div>
                      </li>
                      <li id="familymembers-li">
                   <?php /*?>    
                     
                          <h3>Family Member</h3>
                          <p><?php if(empty($result[0]->familymembers)) { ?><a href="javascript:void(0)" onclick="addField('familymembers')" id="familymembers">+ Add Family Members</a><?php }else { echo $result[0]->familymembers; ?><a href="javascript:void(0)" onclick="addField('familymembers')"> edit</a>  <?php } ?></p>
                       <?php *
                      
                       <?php if(empty($result[0]->familymembers)) { ?>
                       <a href="javascript:void(0)" id="add_f_member">+ Add Family member</a>
					   <?php }else { ?>
                        <a href="javascript:void(0)" id="add_f_member">+ Add Family member</a>
                       
                        <div id="family_member_disp"  class="hometown_val_disp inner_rights" style="background-color:#FC9;">
                        <h4 style="color:white;"><?php echo $result[0]->familymembers ; ?>
                        <i class='fa fa-pencil'></i> <a id='hometownedit' href='javascript:void(0)' onclick="home_town_edit()">edit</a></h4>
                        </div>
                        <?php } ?>
                                                     <div class="inner_rights" id="add_fam_member" style="display:none;">
                                <h3>Family Member</h3>
                          <input type="text" name="family_member" id="family_member" />
                          <select name="family_member_type" id="family_member_type">
                          <option value="relation,">relation</option>
                          <option value="lover,">lover</option>
                          <option value="frnd,">frnd</option>
                          </select>
                          <input type="button" onclick="add_fam_member()" value="submit" />
                          <input type="button" value="cancel"/>
                         </div>
                          
                        <div class="clearfix"></div>
                      </li>
                    </ul>
                  </div>
                </div>
                <div role="tabpanel" class="tab-pane" id="details">
                  <div class="smallboxes">
                    <ul class="details_about">
                      <li id="aboutme-li">
                        
                        
                        
                        
                        <div class="inner_rights">
                          <h3>Details About Yourself</h3>
                          <p><?php if(empty($result[0]->aboutme)) { ?>
                          <a href="javascript:void(0)" id="aboutme_a">+ Add Details About Yourself</a>
						  <?php }else { echo $result[0]->aboutme; ?>
                           <div id="aboutme_val_disp"  class="hometown_val_disp inner_rights" style="background-color:#FC9;">
                        <h4 style="color:white;"><?php echo $result[0]->aboutme ; ?>
                        <i class='fa fa-pencil'></i> <a id='aboutme_edit' href='javascript:void(0)' onclick="about_me_edit()">edit</a></h4>
                        </div>
                           
						  <?php } ?></p>
                        </div>
                        <div class="clearfix"></div>
                      </li>
                      
                      
                       <div id="aboutme_disp" style="display:none" class="inner_rights">
          	<textarea name="about_me_data" id="about_me_data"><?php if($result[0]->aboutme) { echo $result[0]->aboutme ; } ?></textarea>
                        <input type="button" id="add_aboutme" value="submit" onclick="add_aboutme()"/>
                        <?php if($result[0]->aboutme) { ?>
                        <input type="button" id="close_aboutme" onclick="close_aboutme();" value="cancel"/>
                        <?php }else{ ?>
                          <input type="button" id="close_about_me" onclick="close_about_me()" value="canhyhcel"/>
                          <?php } ?>
                        </div>
                      
                      
                      
                      
                      
                      <li id="nickname-li">
                        
                        <div class="inner_rights">
                          <h3>Nickname</h3>
                          <p><?php if(empty($result[0]->nickname)) { ?><a href="javascript:void(0)" onclick="addField('nickname')" id="nickname">+ Add Nickname</a><?php }else { echo $result[0]->nickname; ?><a href="javascript:void(0)" onclick="addField('nickname')"> edit</a>  <?php } ?></p>
                        </div>
                        <div class="clearfix"></div>
                      </li>
                      <li id="favquotes-li">
                        
                        <div class="inner_rights">
                          <h3>Favorite Quotations</h3>
                           <p><?php if(empty($result[0]->favquotes)) { ?>
                           <a href="javascript:void(0)" onclick="addField('favquotes')" id="favquotes">+ Add Favorite Quotations</a>
						   <?php }else { echo $result[0]->favquotes; ?>
                           <a href="javascript:void(0)" onclick="addField('favquotes')"> edit</a> 
                            <?php } ?></p>
                        </div>
                        <div class="clearfix"></div>
                      </li>
                    </ul>
                  </div>
                </div>
                <div role="tabpanel" class="tab-pane" id="life">
                  <div class="smallboxes">
                    <ul>
                      <li id="lifeevent-li">
                        
                        <div class="inner_rights">
                          <h3>Life Events</h3>
                          <p><?php if(empty($result[0]->lifeevent)) { ?><a href="javascript:void(0)" onclick="addField('lifeevent')" id="lifeevent">+ Add Life Event</a><?php }else { echo $result[0]->lifeevent; ?><a href="javascript:void(0)" onclick="addField('lifeevent')"> edit</a>  <?php } ?></p>
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
      </section><?php *

 /*?><section class="col-lg-6 col-md-6 col-sm-5 col-xs-12 coloumn2 aboutme">
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
    </section><?php */ ?>