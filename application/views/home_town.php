<?php 
	 $result = $this->profile_set->save_settings($user_id='');
?>
     <div class="tophead">Hometown</div>
   
    <div class="iner_lefts" id="hme_town" style="display:none;"><i class="fa fa-plus"></i></div>
                        <div class="inner_rights boxs"  id="hme_town1" style="display:none;">
                          
 <a href="javascript:void(0)" id="hometown"><h3>Add your hometown</h3></a>      
   
   </div>
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
                          
                          
                           
                          <div id="hometown_val_disp">
                     
                        <div class="sm_leftbox"></div>
                        <div class="sm_rightbox"><h3><a href="#"><?php echo $result[0]->hometown; ?></a></h3>
                        <p>Home Town</p>
                        </div>
                        <div class="sm_rightside">
                        <div class="col-md-3 com_le" style="display:none;"><i class="fa fa-globe"></i></div>
                        <div class="col-md-6 com_mid"><a href="javascript:void(0)" onclick="home_town_edit()"><i class="fa fa-pencil"></i></a></div>
                        <div class="col-md-3 com_rig"><a href="javascript:void(0)" onclick="delete_hometown()"><i class="fa fa-times"></i></a></div>
                        </div>
                        </div>
                                       
                      
                      
                      