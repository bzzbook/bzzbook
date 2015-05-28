<?php 
	 $result = $this->profile_set->save_settings();
?>
  
  
     <!-- <div class="tophead">Contact Information</div> -->
     
     <div class="iner_boxleft" id="add_mbl_block" style="display:none;"><a href="javascript:void(0)" id="add_mbl"><i class="fa fa-plus"></i>Add a mobile phone</a></div>
                       
                       
                       
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
                                <input type="text"  placeholder="" id="mbl_no" value="<?php if($result[0]->mobile) { echo $result[0]->mobile ; } ?>">
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
                       
                       
                        <div id="mobile_val_display">
                        <div class="sm_leftbox"></div>
                        <div class="sm_rightbox"><h3><a href="#"><?php echo $result[0]->mobile; ?></a></h3>
                        <p>mobile</p>
                        </div>
                        <div class="sm_rightside">
                        <div class="col-md-3 com_le"><i class="fa fa-globe"></i></div>
                       <div class="col-md-6 com_mid"><a href="javascript:void(0)" onclick="mbl_edit()"><i class="fa fa-pencil"></i> Edit</a></div>
                        <div class="col-md-3 com_rig"><a  href="javascript:void(0)" onclick="del_mobile()"><i class="fa fa-times"></i></a></div>
                        </div>
                        </div>
                        <div class="clearfix"></div>
                        
                        