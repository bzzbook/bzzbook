<?php 
	 $result = $this->profile_set->save_settings();
?>
  
  
                       
                       <div id="political_val_disp">
                        <div class="sm_leftbox"></div>
                        <div class="sm_rightbox"><h3><a href="#">
						<?php  
						$data = explode('|@|',$result[0]->political);
						echo $data[0];
						 ?></a></h3>
                        <p><?php echo $data[1]; ?></p>
                        </div>
                        <div class="sm_rightside">
                        <div class="col-md-3 com_le"><i class="fa fa-globe"></i></div>
                        <div class="col-md-6 com_mid"><a href="javascript:void(0)" onclick="political_edit()"><i class="fa fa-pencil"></i> Edit</a></div>
                        <div class="col-md-3 com_rig"><a href="#"><i class="fa fa-times"></i></a></div>
                        </div>
                        </div>
                        
                        
                        <div class="clearfix"></div>
                        
                        
                        <div class="birth birt_bottom col-md-12" id="political_disp" style="display:none;">
                            <form class="form-inline">
                              <div class="form-group birth_ins">
                                <label for="exampleInputName2">Political Views</label>
                                <input type="text" placeholder="What are your political beliefs?" id="political_belief" value="<?php if($data[0]) { echo $data[0]; }?>">
                              </div>
                              <div class="clearfix"></div>
                              <div class="form-group birth_ins">
                                <label for="exampleInputName2" >Description</label>
                                <textarea rows="4" id="pol_description"><?php if($data[1]) { echo $data[1]; }?></textarea>
                              </div>
                              <div class="clearfix"></div>
                            </form>
                         
                          <div class="box_bottom">
                            <div class="publics col-md-3">
                              <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Friends of Friends <span class="caret"></span></button>
                            </div>
                            <div class="col-md-8 skil_box">
                              
                              <div class="btn3 btn-green" onclick="add_political()">Save Changes</div>
							  <?php if($result[0]->political) { ?>
                              <div class="btn3 btn-black" onclick="close_political_belief()">Cancel</div>
                              <?php } else { ?>
                              <div class="btn3 btn-black" onclick="close_political()">Cancel</div>
                              <?php } ?>
                            </div>
                            <div class="clearfix"></div>
                          </div>
                        </div>