<?php 
	 $result = $this->profile_set->save_settings();
?>
    <div class="tophead">Current City</div>
  
    <div class="iner_lefts" id="add_currentcity1" style="display:none;"><i class="fa fa-plus"></i></div>
                        <div class="inner_rights boxs" id="add_currentcity2"  style="display:none;">
                        <a href="javascript:void(0)" id="add_currentcity" ><h3>Add your current city</h3> </a>
                          
                        </div>
     
     
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
                          
                          
                           
                          <div id="currentcity_val_disp">
                        <div class="sm_leftbox"></div>
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
                      
                      
                      