<?php 
	 $result = $this->profile_set->save_settings($user_id='');
?>
  
   <div class="iner_boxleft" id="add_web_site" style="display:none;">
                        <a href="javascript:void(0)" id="add_website"><i class="fa fa-plus"></i>Add a website</a>
                        </div>
   
                       
                        <div id="website_val_display">
                        <div class="sm_leftbox"></div>
                        <div class="sm_rightbox"><h3><a href="#"><?php echo $result[0]->website; ?></a></h3>
                        <p>WebSite</p>
                        </div>
                        <div class="sm_rightside">
                        <div class="col-md-3 com_le" style="display:none;"><i class="fa fa-globe"></i></div>
                        <div class="col-md-6 com_mid"><a href="javascript:void(0)" onclick="website_edit()"><i class="fa fa-pencil"></i></a></div>
                        <div class="col-md-3 com_rig"><a href="javascript:void(0)" onclick="del_website()"><i class="fa fa-times"></i></a></div>
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