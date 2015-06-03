<?php 
	 $result = $this->profile_set->save_settings();
?>
    <div class="tophead">About You</div>
     <div class="iner_boxleft" id="about_me_add" style="display:none;"><a href="javascript:void(0)" id="aboutme_a"><i class="fa fa-plus"></i>Write some details about yourself</a></div>
     <div class="clearfix"></div>
   <div id="aboutme_val_disp">
                      
                        <div class="sm_rightbox"><h3><a href="#"><?php echo $result[0]->aboutme ; ?></a></h3>
                       
                        </div>
                        <div class="sm_rightside">
                        <div class="col-md-3 com_le" style="display:none;"><i class="fa fa-globe"></i></div>
                        <div class="col-md-6 com_mid"><a href="javascript:void(0)" onclick="about_me_edit()"><i class="fa fa-pencil"></i></a></div>
                        <div class="col-md-3 com_rig"><a href="javascript:void(0)" onclick="del_about_me()"><i class="fa fa-times"></i></a></div>
                        </div>
                        <div class="clearfix"></div>
                        </div>
                        
                        
                        
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