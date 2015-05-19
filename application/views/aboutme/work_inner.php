<?php 
	$organization_details = $this->profile_set->getorganizationDetails();
?>
 <div class="tophead">Work</div>
                         
                        <div class="iner_lefts" id="work_head1"><a href="#"><i class="fa fa-plus"></i></a></div>
                        <div class="inner_rights boxs" id="work_head2">
                          <h3><a href="javascript:void(0)" id="add_workplace">Add a workplace</a></h3>
                          
                          <div class="clearfix"></div>
                        </div>
  <div id="work_val_disp">
   	<?php 
				if(sizeof($organization_details)>0):
				foreach($organization_details as $orgdetails):
			?>
                      
                        <div class="sm_rightbox"><h3><a href="#"><?php echo $orgdetails->org_name;?></a></h3>
                        <p><?php echo $orgdetails->position;?></p>
                        </div>
                        <div class="sm_rightside">
                        <div class="col-md-3 com_le"><i class="fa fa-globe"></i></div>
                        <div class="col-md-6 com_mid"><a href="javascript:void(0)" id="work_edit<?php echo $orgdetails->organization_id; ?>" onclick="work_edit()"><i class="fa fa-pencil"></i> Edit</a></div>
                        <div class="col-md-3 com_rig"><a href="#"><i class="fa fa-times"></i></a></div>
                        </div>
                         <?php endforeach;?>
            <?php endif;?>
                        </div>
                        
                        
  
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
                                    <input type="checkbox" class="outside" name="curent_status">
                                    I currently work </div>
                                  <div class="col-md-12">
                                    <div class="col-md-6 yearadd" id="add_years"><a href="javascript:void(0)" onclick="add_year()" ><i class="fa fa-plus"></i>Add year</a></div>
                                  <select id="frm_years" style="display:none">
                                  <option value=""> --- </option>
                                   <?php for($i=1950;$i<=date(Y);$i++){?>
                                	<option value="<?php echo $i;?>"><?php echo $i;?></option>
                              	  <?php }?>
                                  </select>
                                    
                                    <div class="col-md-6">to present</div>
                                  </div>
                                  <div class="clearfix"></div>
                                  <div class="box_bottom">
                                    <div class="publics col-md-4">
                                      <button aria-expanded="false" data-toggle="dropdown" class="btn btn-default dropdown-toggle" type="button">Public <span class="caret"></span></button>
                                    </div>
                                    <div class="col-md-8">
                                      <div class="btn3 btn-black" onclick="close_work()">Cancel</div>
                                      <input type="submit" class="btn3 btn-green" value="save Changes" />
                                    </div>
                                    <div class="clearfix"></div>
                                  </div>
                                </form>
                              </div>
                              <div class="col-md-3 rightblock"><a href="javascript:void(0)" onclick="close_work()"><i class="fa fa-times"></i>close</a></div>
                            </div>