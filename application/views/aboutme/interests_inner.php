<?php 
	 $result = $this->profile_set->save_settings($user_id='');
?>
  
  
   						<div class="iner_boxleft" id="interest" style="display:none;">
                        <a href="javascript:void(0)" id="add_interest"><i class="fa fa-plus"></i>Add who you're interested in</a></div>
  
                       <div id="interest_val_disp">
                        <div class="sm_leftbox"></div>
                        <div class="sm_rightbox"><h3><a href="#">
						<?php
						
						if(!empty($result[0]->interests))
						
						{
						//echo $result[0]->interests;
							//echo "wqefw";
						 $data = explode(",",$result[0]->interests); 
						
						$i = 1;
						foreach($data as $data)
						{
							if($i == 2)
						{
							echo " and ";
						}
						
						echo $data;
						
						$i++;
					
						}
						 
						?></a></h3>
                        
                        </div>
                        <div class="sm_rightside">
                        <div class="col-md-3 com_le" style="display:none;"><i class="fa fa-globe"></i></div>
                        <div class="col-md-6 com_mid"><a href="javascript:void(0)" onclick="interests_edit()"><i class="fa fa-pencil"></i></a></div>
                        <div class="col-md-3 com_rig"><a href="javascript:void(0)" onclick="del_interestedin()"><i class="fa fa-times"></i></a></div>
                        </div>
                        </div>
                        
                        <?php } else { ?>
                               <div class="iner_boxleft" id="interest">
                        <a href="javascript:void(0)" id="add_interest"><i class="fa fa-plus"></i>Add who you're interested in</a></div>
                        
                        <?php } ?>
                        <div class="clearfix"></div>
                        
                        
                        <div class="birth birt_bottom col-md-12" id="interest_disp" style="display:none;">
                            <div class="interested col-md-3">Interested In</div>
                            <div class="col-md-4 ">
                              <input type="checkbox" name="interest[]" class="boxsmal" value="women" checked="" >
                              women</div>
                            <div class="col-md-4">
                              <input type="checkbox" name="interest[]" class="boxsmal" value="men">
                              Men</div>
                         
                          <div class="box_bottom">
                            <div class="publics col-md-3" style="display:none;">
                              <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Public <span class="caret"></span></button>
                            </div>
                            <div class="col-md-8 skil_box">
                              
                              <div class="btn3 btn-green" onclick="add_interest()">Save Changes</div>
                              <?php if($result[0]->interests) { ?>
                              <div class="btn3 btn-black" onclick="close_interested_in()">Cancel</div>
                              <?php } else { ?>
                              <div class="btn3 btn-black" onclick="close_interest()">Cancel</div>
                              <?php } ?>
                            </div>
                            <div class="clearfix"></div>
                             </div>
                          </div>