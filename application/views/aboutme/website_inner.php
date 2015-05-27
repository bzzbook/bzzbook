<?php 
	 $result = $this->profile_set->save_settings();
?>
  
  
   
                       
                        <div id="website_val_display">
                        <div class="sm_leftbox"></div>
                        <div class="sm_rightbox"><h3><a href="#"><?php echo $result[0]->website; ?></a></h3>
                        <p>WebSite</p>
                        </div>
                        <div class="sm_rightside">
                        <div class="col-md-3 com_le"><i class="fa fa-globe"></i></div>
                        <div class="col-md-6 com_mid"><a href="javascript:void(0)" onclick="mbl_edit()"><i class="fa fa-pencil"></i> Edit</a></div>
                        <div class="col-md-3 com_rig"><a href="#"><i class="fa fa-times"></i></a></div>
                        </div>
                        </div>
                        <div class="clearfix"></div>
                        
                        <div class="inner_rights boxs" id="website_disp" style="display:none;">
                          <div id="Website" class="col-md-12">
                            <form class="form-inline  Website">
                              <div class="form-group Website">
                                <label for="exampleInputName2">Website</label>
                                <textarea rows="4" placeholder="Enter your website" id="website_data"><?php if($result[0]->website) { echo $result[0]->website; } ?></textarea>
                              </div>
                              <div class="clearfix"></div>
                              <div class="box_bottom">
                                <div class="publics col-md-3"> </div>
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