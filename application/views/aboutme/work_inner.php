<?php 
	$organization_details = $this->profile_set->getorganizationDetails($user_id = '');
?>
 <div class="tophead">Work</div>
                         
                       
  <div id="work_val_disp">
   	<?php 
				if(!empty($organization_details)){
				foreach($organization_details as $orgdetails){
			?>
                       <div class="work_inner_data" id="work_<?php echo $orgdetails->organization_id; ?>">
                        <div class="sm_rightbox"><h3><a href="#"><?php echo $orgdetails->org_name;?></a></h3>
                        <p><?php echo $orgdetails->position;?></p>
                        </div>
                        <div class="sm_rightside">
                        <div class="col-md-3 com_le" style="display:none;"><i class="fa fa-globe"></i></div>
                        <div class="col-md-6 com_mid"><a href="javascript:void(0)" class="work_edit" id="work_edit<?php echo $orgdetails->organization_id; ?>" onclick="work_edit()"><i class="fa fa-pencil"></i></a></div>
                        <div class="col-md-3 com_rig"><a href="javascript:void(0)" class="work_delete" id="work_delete<?php echo $orgdetails->organization_id; ?>" onclick="work_delete()"><i class="fa fa-times"></i></a></div>
                        </div>
                           <div class="clearfix" id="clearfix"></div>
                        </div>
                         <?php } ?> </div><?php }else {?>
           
                         <div class="iner_lefts" id="work_head1"><a href="#"><i class="fa fa-plus"></i></a></div>
                        <div class="inner_rights boxs" id="work_head2">
                          <h3><a href="javascript:void(0)" id="add_workplace">Add a workplace</a></h3>
                          
                          <div class="clearfix"></div>
                        </div>
                        	<div class="clearfix"></div>
                            <?php } ?>
                        
                        
  
  <div id="work_place" class="workplace col-md-12" style="display:none;">
                              <div class="col-md-9">
                                <form class="form-inline" id="work_form">
                                  <div class="form-group">
                                    <label for="exampleInputName2">Company</label>
                                    <input type="text" placeholder="Where have you worked?" name="company">
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputName2">Position</label>
                                    <input type="text" placeholder="What is your job title?" name="position">
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputName2">City/Town</label>
                                    <input type="text" placeholder="" name="city">
                                  </div>
                                  <div class="form-group ">
                                    <label for="exampleInputName2">Description</label>
                                    <textarea rows="4" name="description"></textarea>
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputName2">Time Period</label>
                                    <input type="checkbox" class="outside" name="curent_status" id="curent_status" value="wor">
                                    I currently work </div>
                                  <div class="col-md-12">
                                    <div class="col-md-6 yearadd" id="add_years" ><a href="javascript:void(0)" onclick="add_year()" class="frm_years_link" ><i class="fa fa-plus"></i>Add year</a></div>
                                  <select id="frm_years" style="display:none;" name="frm_years" class="frm_years" >
                               <option value="0">yyyy</option>
                                   <!--   <option value="1950" selected="selected">1950</option> -->
                                   <?php for($i=1950;$i<=date(Y);$i++){?>
                                	<option value="<?php echo $i;?>"><?php echo $i;?></option>
                              	  <?php }?>
                                  </select>
                                  <a href="javascript:void(0)" id="frm_months_link"  style="display:none;" ><i class="fa fa-plus"></i>Add month</a>
                                  <select id="frm_months" style="display:none;" name="frm_months"> 
                                 <option value="0">mm</option> 
                                 
                                   <?php for($i=1;$i<=12;$i++){?>
                                	<option value="<?php echo $i;?>" ><?php echo $i;?></option>
                              	  <?php }?>
                                  </select>
                                  <a href="javascript:void(0)" id="frm_days_link"  style="display:none;"><i class="fa fa-plus"></i>Add day</a>
                                  <select id="frm_days" style="display:none;" name="frm_days">
                                <option value="0">dd</option>
                                <!--  <option value="1" selected="selected">1</option>  -->
                                   <?php for($i=1;$i<=31;$i++){?>
                                	<option value="<?php echo $i;?>" ><?php echo $i;?></option>
                              	  <?php }?>
                                  </select>
                                   <div id="to" style="display:none;" class="to">to </div>
                                    <div id="to_present" style="display:none;">to present</div>
                                  <a href="javascript:void(0)" id="to_years_link"  class="to_years_link"><i class="fa fa-plus"></i>Add year</a>
                                                       
                                   
                                  </div>
                                  
                                  <!---  ---->
                                  <div class="col-md-12 todates_dropdown" id="todates_dropdowns">
                                    
                                  <select id="to_years" style="display:none;" name="to_years" class="to_years">
                                <option value="0">yyyy</option> 
                                  
                                   <?php for($i=1950;$i<=date(Y);$i++){?>
                                	<option value="<?php echo $i;?>"><?php echo $i;?></option>
                              	  <?php }?>
                                  </select>
                                  <a href="javascript:void(0)" id="to_months_link"  style="display:none;" ><i class="fa fa-plus"></i>Add month</a>
                                  <select id="to_months" style="display:none;" name="to_months">
                                  <option value="0">mm</option> 
                                 
                                   <?php for($i=1;$i<=12;$i++){?>
                                	<option value="<?php echo $i;?>"><?php echo $i;?></option>
                              	  <?php }?>
                                  </select>
                                  <a href="javascript:void(0)" id="to_days_link"  style="display:none;"><i class="fa fa-plus"></i>Add day</a>
                                  <select id="to_days" style="display:none;" name="to_days">
                                  <option value="0">dd</option> 
                                
                                   <?php for($i=1;$i<=31;$i++){?>
                                	<option value="<?php echo $i;?>"><?php echo $i;?></option>
                              	  <?php }?>
                                  </select>
                                                      
                                  </div>
                                    <input type="hidden" name="work_action" id="work_action" value="add">
                       				<input type="hidden" value="" name="work_disp_id" >
                                  <!---  ---->
                                  <div class="clearfix"></div>
                                  <div class="box_bottom">
                                    <div class="publics col-md-4" style="display:none;">
                                      <button aria-expanded="false" data-toggle="dropdown" class="btn btn-default dropdown-toggle" type="button">Public <span class="caret"></span></button>
                                    </div>
                                    <div class="col-md-8 add_new">
                                      <div class="btn3 btn-black" id="work_close_btn" onclick="close_work()">Cancel</div>
                                       <div class="btn3 btn-black" id="work_down_close" style="display:none;" onclick="close_work_down()">Cancel</div>
                                      <input type="submit" class="btn3 btn-green " value="Save Changes" />
                                    </div>
                                    <div class="clearfix"></div>
                                  </div>
                                </form>
                              </div>
                              <div class="col-md-3 rightblock"><a href="javascript:void(0)" onclick="close_work()"><i class="fa fa-times"></i>close</a></div>
                            </div>
                            <?php if(!empty($organization_details)){ ?>
                             <a href="javascript:void(0)" id="add_work_link_disp" class="work_edu_side_links">add work details</a>
                              <div id="add_work_place_down">
                         <div class="iner_lefts" id="work_head_down1" style="display:none;"><a href="#"><i class="fa fa-plus"></i></a></div>
                         <div class="inner_rights boxs" id="work_head_down2" style="display:none;">
                          <h3><a href="javascript:void(0)" id="add_workplace_down">Add a workplace</a></h3>
                          
                          <div class="clearfix"></div>
                        </div>
                          </div>
							<?php } ?>