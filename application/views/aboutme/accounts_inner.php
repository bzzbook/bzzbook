<?php 

	
						  $cur_user_id ='';
						 if(isset($user_id))
						{
						
						$cur_user_id = $user_id;
						}else
						{
							
						$cur_user_id = $this->session->userdata('logged_in')['account_id'];
							}
	  $accounts_data = $this->profile_set->get_other_accounts_by_id($cur_user_id); 
	// print_r($mobile_data);
	
	 
?>
   
     <!-- <div class="tophead">Contact Information</div> -->
         <?php if(empty($accounts_data)) { ?>
                   <div class="iner_boxleft"  id="add_oth_acc1"><a href="javascript:void(0)" id="add_oth_acc"><i class="fa fa-plus"></i>Add other accounts</a></div>
                        <?php } else { ?>
                             <div id="accounts_val_display">
						
					<?php foreach($accounts_data as $data) {?>
                   
                           <div class="latest_works" id="accounts_<?php echo $data['account_id']; ?>"> 
                      <div class="sm_leftbox"></div>
                        <div class="sm_rightbox"><h3><a href="#"><?php echo $data['account_name']; ?></a></h3>
                        <p><?php echo $data['account_type']; ?></p>
                        </div>
                        <div class="sm_rightside">
                        <div class="col-md-3 com_le" style="display:none;"><i class="fa fa-globe"></i></div>
                       <div class="col-md-6 com_mid"><a href="javascript:void(0)" onclick="accounts_edit()"  class="account_edit" id="account_edit<?php echo $data['account_id']; ?>"><i class="fa fa-pencil"></i></a></div>
                        <div class="col-md-3 com_rig"><a  href="javascript:void(0)" onclick="account_delete()" class="account_delete" id="account_delete<?php echo $data['account_id']; ?>"><i class="fa fa-times"></i></a></div>
                        </div>
                        </div>
                      
                        <div class="clearfix"></div>
                        
                        
                        <?php } }?>
                        </div>
                        <div class="clearfix"></div>
                        
                     
                        <div class="inner_rights boxs" id="other_accounts" style="display:none;">
                          <div id="account" class="col-md-12">
                            <form class="form-inline  account">
                            <div class="other_acc_default account_values_div">
                              <div class="form-group col-md-4">
                                <label for="exampleInputName2">Other Accounts</label>
                              </div>
                              <div class="col-md-4">
                                <input type="text" id="account_name0" >
                              </div>
                              <div class="col-md-3">
                                <select id="account_type0">
                                  <option value="facebook">facebook</option>
                                  <option value="twitter">twitter</option>
                                  <option value="pinterest">pinterest</option>
                                  <option value="linked_in">LinkedIn</option>
                                </select>
                              </div>
                              </div>
                              
                              <div class="clearfix"></div>
                              <div class="iner_boxleft_bottom"><a href="javascript:void(0)" id="add_another_link"><i class="fa fa-plus"></i> Add another account</a></div>
                              <div class="clearfix"></div>
                              <div class="box_bottom">
                                <div class="publics col-md-3" style="display:none;"> </div>
                                <div class="col-md-9 skil_box">
                                  <div class="btn3 btn-black" onclick="close_other_accounts()">Cancel</div>
                                  <div class="btn3 btn-green" onclick="add_other_accounts()">Save Changes</div>
                                </div>
                                <div class="clearfix"></div>
                              </div>
                            </form>
                          </div>
                        </div>
                       <div class="inner_rights boxs" id="accounts_disp_edit" style="display:none;">
                          <div id="account" class="col-md-12">
                            <form class="form-inline  account">
                            <div class="other_acc_default account_values_div">
                              <div class="form-group col-md-4">
                                <label for="exampleInputName2">Other Accounts</label>
                              </div>
                              <div class="col-md-4">
                                <input type="text" id="account_name" name="account_name">
                              </div>
                              <div class="col-md-3">
                                <select id="account_type" name="account_type">
                                  <option value="facebook">facebook</option>
                                  <option value="twitter">twitter</option>
                                  <option value="pinterest">pinterest</option>
                                  <option value="linked_in">LinkedIn</option>
                                </select>
                              </div>
                              </div>
                               <input type="hidden" name="account_action" id="account_action" value="add">
                       		  <input type="hidden" value="" name="account_disp_id" id="account_no_id"> 
                              <div class="clearfix"></div>
                             
                              <div class="clearfix"></div>
                              <div class="box_bottom">
                                <div class="publics col-md-3" style="display:none;"> </div>
                                <div class="col-md-9 skil_box">
                                  <div class="btn3 btn-black" onclick="close_account_edit()">Cancel</div>
                                  <div class="btn3 btn-green" onclick="edit_account_values()">Save Changes</div>
                                </div>
                                <div class="clearfix"></div>
                              </div>
                            </form>
                          </div>
                        </div>
                         <div class="clearfix"></div>