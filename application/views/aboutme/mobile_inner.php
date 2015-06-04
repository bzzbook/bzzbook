<?php 
	  $mobile_data = $this->profile_set->get_mbl_nos();
	// print_r($mobile_data);
	
	 
?>
   
     <!-- <div class="tophead">Contact Information</div> -->
         <?php if(empty($mobile_data)) { ?>
                        <div class="iner_boxleft" id="add_mbl_block"><a href="javascript:void(0)" id="add_mbl"><i class="fa fa-plus"></i>Add a mobile phone</a></div>
                        <?php } else { ?>
                             <div id="mobile_val_display">
						
					<?php foreach($mobile_data as $data) {?>
                   
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
                        
                        
                        <?php } }?>
                        </div>
                        <div class="clearfix"></div>
                        
                        
                       
                       
                       
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
                            <div class="add_mbl_append">
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
                              <div class="col-md-3 inside_drop"> <a aria-expanded="false" role="button" data-toggle="dropdown" class="dropdown-toggle" href="#"> <i class="fa fa-fw"></i> <span class="fa fa-angle-down"></span></a> </div>
                              </div>
                              <div class="clearfix"></div>
                             
                              <div class="clearfix"></div>
                              <div class="box_bottom">
                                <div class="publics col-md-3"> </div>
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