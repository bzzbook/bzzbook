<?php 
	 $result = $this->profile_set->save_settings();
	  if(!empty($result[0]->address))
	 {
	 	$data = explode('|++|',$result[0]->address);
	 }else
	 {
		 $data ='';
	 }
?>
  
  
   <div class="tophead">Add your address</div>
    <div class="iner_boxleft" id="address1" style="display:none;"><a href="javascript:void(0)" id="add_address"><i class="fa fa-plus"></i>Add your address</a></div> 
                       
                                               
                        <div id="address_val_display">
                        <div class="sm_leftbox"></div>
                        <div class="sm_rightbox"><h3><a href="#">Address</a></h3>
                        <p><?php if($data) { if($data[0]) {  echo $data[0]; } } ?></p>
                        <p><?php if($data) { if($data[1]) {  echo $data[1]; } } ?></p>
						<p><?php if($data) { if($data[2]) {  echo $data[2]; } } ?></p>
                        <p><?php if($data) { if($data[3]) {  echo $data[3]; } } ?></p>
                        </div>
                        <div class="sm_rightside">
                        <div class="col-md-3 com_le"><i class="fa fa-globe"></i></div>
                        <div class="col-md-6 com_mid"><a href="javascript:void(0)" onclick="address_edit()"><i class="fa fa-pencil"></i> Edit</a></div>
                        <div class="col-md-3 com_rig"><a  href="javascript:void(0)" onclick="del_address()"><i class="fa fa-times"></i></a></div>
                        </div>
                        </div>
                        <div class="clearfix"></div>
                        
                        
                        <div class="inner_rights boxs" id="address_disp" style="display:none;">
                          <div id="Address" class="col-md-12">
                            <form class="form-inline Address">
                              <label for="exampleInputName2">Address</label>
                              <input type="text" placeholder="" id="address" value="<?php if($data) { if($data[0]) {  echo $data[0]; } } ?>">
                              <div class="clearfix"></div>
                              <label for="exampleInputName2">City/Town</label>
                              <input type="text" placeholder="" id="ad_city" value="<?php if($data) { if($data[1]) {  echo $data[1]; } } ?>">
                              <div class="clearfix"></div>
                              <label for="exampleInputName2">Zip</label>
                              <input type="text" placeholder="" id="zip_code" value="<?php if($data) { if($data[2]) {  echo $data[2]; } } ?>">
                              <div class="clearfix"></div>
                              <label for="exampleInputName2">Neighborhood</label>
                              <input type="text" placeholder="" id="neighborhood" value="<?php if($data) { if($data[3]) {  echo $data[3]; } } ?>">
                              <div class="clearfix"></div>
                            
                            <div class="clearfix"></div>
                            <div class="box_bottom">
                              <div class="publics col-md-3">
                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Friends <span class="caret"></span></button>
                              </div>
                              <div class="col-md-9 skil_box">
                                        <div class="btn3 btn-green" onclick="add_address()">Save Changes</div>
                                        <?php if($result[0]->address) { ?>
                                <div class="btn3 btn-black" onclick="close_address_block()">Cancel</div>
                      			<?php }else{  ?>
                                <div class="btn3 btn-black" onclick="close_address()">Cancel</div>
                                <?php } ?>
                              </div>
                              <div class="clearfix"></div>
                            </div>
                            </form>
                          </div>
                        </div>