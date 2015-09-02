<section class="col-lg-6 col-md-6 col-sm-5 col-xs-12 coloumn2 pfSettings">
      <h2>My Settings</h2>
      <div class="posts">
        <div role="tabpanel"> 
          <!-- Nav tabs -->
          <ul class="nav nav-tabs" role="tablist">
       <li role="presentation" class="active"><a href="#post_board" aria-controls="profile" role="tab" data-toggle="tab">Profile settings</a></li>
            <li role="presentation"><a href="#about_me" aria-controls="messages" role="tab" data-toggle="tab">Info Setting</a></li>
            <li role="presentation"><a href="#privacy" aria-controls="messages" role="tab" data-toggle="tab">Privacy</a></li>
            <li role="presentation"><a href="#notifications" aria-controls="settings" role="tab" data-toggle="tab">Notification</a></li>
          </ul>
         

          <!-- Tab panes -->
          <div class="tab-content">
          <?php $user_cmps = $this->companies->user_cr_companies(); 
		  $cmp = array();
		  foreach($user_cmps as $cmps)
		  {
			  $cmp[] = $cmps['companyinfo_id'];
		  }
	//	print_r($cmp);
		  
		$currentcmp = $cmp_info[0]['companyinfo_id'];
		  
		  $data = in_array($currentcmp,$cmp);
		  
		//  print_r($data);
		  ?>
           
            <div role="tabpanel" class="tab-pane active" id="post_board">
             <?php $image = $this->profile_set->get_profile_pic(); 	?>
			            <!-- <?php //echo base_url(); ?>images/pf_pic.png -->
              <figure class="pfpic"><span>Profile Pic</span><img src="<?php echo base_url();?>uploads/<?php echo $cmp_info[0]['company_image']  ?>" alt="" height="159" width="146"></figure>
               <?php $attr = array('id' => 'upload_file', 'name' => 'upload_file'); ?> 
              <?php echo form_open_multipart('company/pic_upload',$attr);?>
              <?php if(!empty($data)) { ?>
           <div class="upload"> <span class="btn btn-success fileinput-button"> <span>Change Picture</span> 
                <!-- The file input field used as target for the file upload widget -->
             <input type="file" name="userfile" id="userfile" size="20" required/>
                 
                </span> 
                <input type="hidden" value="<?php echo $cmp_info[0]['companyinfo_id'] ?>" name="cmp_id" id="cmp_id"/>
                 <input type="submit" class="btn btn-success" value="upload"></div>
                 </form>
                 <?php } ?>
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
                 
            
                 <h4>Company Info</h4>
               <form name="cmp_postboard" id="cmp_postboard" method="POST" action="">
               <div class="filed col-md-6">
                <input type="text" class="form-control" placeholder="Company Name" value="<?php echo $cmp_info[0]['cmp_name'] ?>" name="companyname"   readonly="readonly">
              </div>
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
                <input type="text" class="form-control" placeholder="City" value="<?php echo $cmp_info[0]['company_city'] ?>" name="city"  readonly="<?php if(empty($data)) { echo "readonly"; } ?>" >
              </div> 
              
              <div class="filed col-md-6">
                 <input type="text" class="form-control" placeholder="Zip Code" value="<?php echo $cmp_info[0]['company_postalcode'] ?>" name="postal_code"  readonly="<?php if(!empty($data)) { echo "readonly"; } ?>">
              </div>
           
              <div class="filed col-md-6">
                <select class="form-control" name="industry"  readonly="<?php if(!empty($data)) { echo "readonly"; } ?>">
                   <?php foreach($industry as $industries):?>
                 <option value="<?php echo $industries->lookup_value;?>"
				 <?php if($cmp_info[0]['cmp_industry'] == $industries->lookup_value){
					 echo "selected=selected";
				 }?>><?php echo $industries->lookup_value ?></option>
                 <?php endforeach;?> 
                </select>
              </div>
              
              <div class="filed col-md-6">
                <select class="form-control" name="estb"  readonly="<?php if(!empty($data)) { echo "readonly"; } ?>"> 
                 <option value="1956">1956</option>
                 <?php for($i=1950;$i<=date(Y);$i++){?>
                                	<option value="<?php echo $i;?>"<?php if($cmp_info[0]['cmp_estb'] == $i) { 
									echo "selected=selected"; 
									} ?>><?php echo $i ?></option>
                                <?php }?>    
                </select>
              </div>
              <div class="filed col-md-12">
                <textarea cols="" rows="" class="form-control" name="about_me_info"  readonly="<?php if(!empty($data)) { echo "readonly"; } ?>" ><?php echo $cmp_info[0]['cmp_about'] ?></textarea>
              </div>
              <div class="filed col-md-6">
               <?php if(!empty($data)) { ?>
               <input type="submit" class="fmbtn" value="Update Settings">
               <?php } ?>
              </div>
              <div class="clear"></div>
              </form>
            </div>
            <div role="tabpanel" class="tab-pane" id="about_me">
              <h4 class="clear">About Us</h4>
              <form id="about_cmp" name="about_cmp" >
               <div class="filed col-md-6">
                <input type="text" class="form-control" name="cmp_colleagues"  placeholder="Employee" value="<?php echo $cmp_info[0]['cmp_colleagues'] ?>"   readonly="<?php if(!empty($data)) { echo "readonly"; } ?>">
              </div>
         
            
              <h4 class="clear">Contact Information</h4>
             <div class="filed col-md-6">
                <input type="text" class="form-control" name="cmp_email" placeholder="Email" value="<?php echo $cmp_info[0]['company_email'] ?>"   readonly="<?php if(!empty($data)) { echo "readonly"; } ?>">
              </div>
              <div class="filed col-md-6">
                <input type="text" class="form-control" name="cmp_phone" placeholder="Phone" value="<?php echo $cmp_info[0]['company_phone'] ?>"   readonly="<?php if(!empty($data)) { echo "readonly"; } ?>">
              </div>
              <div class="filed col-md-6">
                <input type="text" class="form-control" name="cmp_office" placeholder="Office"  value="<?php echo $cmp_info[0]['company_office'] ?>"   readonly="<?php if(!empty($data)) { echo "readonly"; } ?>">
              </div>
              <div class="filed col-md-6">
                <input type="text" class="form-control" name="cmp_fax" placeholder="Fax"  value="<?php echo $cmp_info[0]['company_fax'] ?>"   readonly="<?php if(!empty($data)) { echo "readonly"; } ?>">
            
              </div>
              <div class="filed col-md-6">
                 <?php if(!empty($data)) { ?>
                <input type="submit" class="fmbtn" value="Update Settings">
                <?php } ?>
              </div>
              </form>
              <div class="clear"></div>
            </div>
            
            <div role="tabpanel" class="tab-pane" id="privacy">
             	<h4 class="clear">Visibility Settings</h4>
                <form method="post" name="cmp_privacy_form" id="cmp_privacy_form" >
              <div class="radio">
                <label for="notifications">Make my profile visible to non colleagues:</label>
                <div class="pull-right">
                <label class="radio-inline">
                	<?php
						if($cmp_info[0]['profile_visible'] == 'Y')
							$profileyes_check = "checked";
						else
							$profileno_check = "checked";
					?>
                  <input type="radio" id="inlineRadio1" value="Y"   disabled="<?php if(!empty($data)) { echo "disabled"; } ?>" name="profile_visible" <?php echo @$profileyes_check?>>
                  Yes </label>
                <label class="radio-inline">
                  <input type="radio" id="inlineRadio2" value="N"  disabled="<?php if(!empty($data)) { echo "disabled"; } ?>" name="profile_visible" <?php echo @$profileno_check?>>
                  No </label>
                  </div>
              </div>
              <div class="radio">
              <?php
						if($cmp_info[0]['comments_visible'] == 'Y')
							$commentsyes_check = "checked";
						else
							$commentsno_check = "checked";
					?>
                <label for="notifications">Make my comments visible to non friends:</label>
                <div class="pull-right">
                <label class="radio-inline">
                  <input type="radio" id="inlineRadio1" value="Y"  disabled="<?php if(!empty($data)) { echo "disabled"; } ?>"  name="comments_visible" <?php echo @$commentsyes_check?>>
                  Yes </label>
                <label class="radio-inline">
                  <input type="radio" id="inlineRadio2" value="N"  disabled="<?php if(!empty($data)) { echo "disabled"; } ?>"  name="comments_visible" <?php echo @$commentsno_check?>>
                  No </label>
                  </div>
              </div>
              
             <div class="filed col-md-12">
                <?php if(!empty($data)) { ?>
                <input type="submit" value="Update" class="fmbtn">
                <?php }?>
              </div>
              </form>
              <div class="clear"></div>
            </div>
            <div role="tabpanel" class="tab-pane" id="notifications">
             <h4 class="clear">Notification Settings</h4>
             <form method="post" name="cmp_emailnotification" id="cmp_emailnotification" >
              <div class="radio">
               <?php
			  
						if($cmp_info[0]['email_notification'] == 'Y')
							$notificationsyes_check = "checked";
						else
							$notificationsno_check = "checked";
					?>
              
                <label for="notifications">Send Notifications To My email:</label>
                <div class="pull-right">
                <label class="radio-inline">
                  <input type="radio"  value="Y"  disabled="<?php if(!empty($data)) { echo "disabled"; } ?>"  name="email_notofication" <?php echo @$notificationsyes_check?>>
                  Yes </label>
                <label class="radio-inline">
                  <input type="radio"  value="N"  disabled="<?php if(!empty($data)) { echo "disabled"; } ?>"  name="email_notofication" <?php echo @$notificationsno_check?>>
                  No </label>
                  </div>
                <div class="filed col-md-12">
                   <?php if(!empty($data)) { ?>
                <input type="submit" class="fmbtn" value="Upload Settings">
                <?php } ?>
              </div>
              </div>
              </form>
              <div class="clear"></div>
              </div>
          </div>
        </div>
      </div>
    </section>
    
