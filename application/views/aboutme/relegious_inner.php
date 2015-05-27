<?php 
	 $result = $this->profile_set->save_settings();
	  if(!empty($result[0]->religious))
	 {
	 	$data = explode('|@|',$result[0]->religious);
	 }else
	 {
		 $data ='';
	 }
?>
    <div class="iner_boxleft" id="relegious" style="display:none;"><a href="javascript:void(0)" id="add_relegious"><i class="fa fa-plus"></i>Add your religious views</a></div>
                        
  
                       
                       <div id="relegious_val_disp">
                        <div class="sm_leftbox"></div>
                        <div class="sm_rightbox"><h3><a href="#">
						<?php if($data) { echo $data[0]; } ?></a></h3>
                        <p><?php if($data) { echo $data[1]; } ?></p>
                        </div>
                        <div class="sm_rightside">
                        <div class="col-md-3 com_le"><i class="fa fa-globe"></i></div>
                        <div class="col-md-6 com_mid"><a href="javascript:void(0)" onclick="relegious_edit()"><i class="fa fa-pencil"></i> Edit</a></div>
                        <div class="col-md-3 com_rig"><a href="javascript:void(0)" onclick="del_relegion_belief()"><i class="fa fa-times"></i></a></div>
                        </div>
                        </div>
                        
                        
                        <div class="clearfix"></div>
                        
                        
                        <div class="birth birt_bottom col-md-12" id="relegious_disp" style="display:none;">
                            <form class="form-inline ">
                              <div class="form-group birth_ins">
                                <label for="exampleInputName2">Religious Views</label>
                                <input type="text" placeholder="What are your religious beliefs?" id="rel_belief" value="<?php if($data) { if($data[0])  { echo $data[0]; }} ?>">
                              </div>
                              <div class="clearfix"></div>
                              <div class="form-group birth_ins">
                                <label for="exampleInputName2">Description</label>
                                <textarea rows="4" id="rel_description"><?php if($data) { if($data[1])  { echo $data[1]; } }?></textarea>
                              </div>
                              <div class="clearfix"></div>
                            </form>
                          
                          <div class="box_bottom">
                            <div class="publics col-md-3">
                              <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Friends of Friends <span class="caret"></span></button>
                            </div>
                            <div class="col-md-8 skil_box">
                              
                              <div class="btn3 btn-green" onclick="add_relegious_belief()">Save Changes</div>
                              <?php if($result[0]->religious) { ?>
                              <div class="btn3 btn-black" onclick="close_relegious()">Cancel</div>
                              <?php }else { ?>
                              <div class="btn3 btn-black" onclick="close_relegious_belief()">Cancel</div>
                              <?php } ?>
                            </div>
                            <div class="clearfix"></div>
                          </div>
                          </div>