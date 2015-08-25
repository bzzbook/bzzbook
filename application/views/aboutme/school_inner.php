<?php 
	$user_school_info = $this->profile_set->get_school_details($user_id = '');
?>

 <div class="tophead"> High School</div>
                       

  <div id="school_val_disp">
   	<?php 
				if(!empty($user_school_info)){
				foreach($user_school_info as $schdetails){
			?>
            
                      <div class="latest_works">
                        <div class="sm_rightbox"><h3><a href="#"><?php echo $schdetails->school_name;?></a></h3>
                        <p></p>
                        </div>
                        <div class="sm_rightside">
                        <div class="col-md-3 com_le" style="display:none;"><i class="fa fa-globe"></i></div>
                        <div class="col-md-6 com_mid"><a href="javascript:void(0)" class="school_edit" id="school_edit<?php echo $schdetails->school_id; ?>" onclick="school_edit()"><i class="fa fa-pencil"></i></a></div>
                        <div class="col-md-3 com_rig"><a href="javascript:void(0)" class="school_delete" id="school_delete<?php echo $schdetails->school_id; ?>" onclick="school_delete()"><i class="fa fa-times"></i></a></div>
                        </div>
                        </div>
                        <div class="clearfix"></div>
                         <?php } ?>
						 
                        </div>
						<?php }else { ?> <div class="iner_lefts" id="school1"><a href="#"><i class="fa fa-plus"></i></a></div>
                        <div class="inner_rights boxs" id="school2">
                          <h3><a href="javascript:void(0)" id="add_school">Add a High School</a></h3>
                          </div>
           				<?php } ?>
                        
  <div id="highschool" style="display:none;">
                            <div class="College_box col-md-12">
                              <div class="col-md-9">
                                <form class="form-inline" name="school_form" id="school_form">
                                  <div class="form-group">
                                    <label for="exampleInputName2">School</label>
                                    <input type="text" name="school_name" placeholder="What school did you attend?">
                                  </div>
                                  <div class="form-group period">
                                    <label for="exampleInputName2">Time Period</label>
                                <a href="javascript:void(0)" id="frm_years_sch"> <i class="fa fa-plus"></i>Add year</a></div>
                                 <select id="frm_years_school" style="display:none;" name="frm_sch_years" class="frm_sch_years">
                                  <option value="0">yyyy</option>
                                  
                                   <?php for($i=1950;$i<=date(Y);$i++){?>
                                	<option value="<?php echo $i;?>"><?php echo $i;?></option>
                              	  <?php }?>
                                  </select>
                        
                          <a href="javascript:void(0)" id="frm_months_sch" style="display:none;"> <i class="fa fa-plus"></i>Add Month</a>
                         
                          <select id="frm_months_school" style="display:none;" name="frm_sch_months"> 
                                  <option value="0">mm</option>
                                   
                                   <?php for($i=1;$i<=12;$i++){?>
                                	<option value="<?php echo $i;?>"><?php echo $i;?></option>
                              	  <?php }?>
                                  </select>
                              <a href="javascript:void(0)" id="frm_days_sch" style="display:none;"> <i class="fa fa-plus"></i>Add Day</a>
                                  <select id="frm_days_school" style="display:none;" name="frm_sch_days">
                                  <option value="0">dd</option>
                                
                                   <?php for($i=1;$i<=31;$i++){?>
                                	<option value="<?php echo $i;?>" ><?php echo $i;?></option>
                              	  <?php }?>
                                  </select>
                         
                        
                    
                                    <div id="sch_to">TO</div>
                                  <div class="col-md-12">
                                    <div class="col-md-4"></div>
                                    <div class="col-md-8 yearto"><a href="javascript:void(0)" id="to_years_sch"> <i class="fa fa-plus"></i>Add year</a></div>
                                  </div>
                                  
                                    
                                  <select id="to_years_school" style="display:none;" name="to_sch_years" class="to_sch_years">
                                  <option value="0">yyyy</option>
                                   <?php for($i=1950;$i<=date(Y);$i++){?>
                                	<option value="<?php echo $i;?>"><?php echo $i;?></option>
                              	  <?php }?>
                                  </select>
                                  <a href="javascript:void(0)" id="to_months_sch" style="display:none;"> <i class="fa fa-plus"></i>Add Month</a>
                                  <select id="to_months_school" style="display:none;" name="to_sch_months">
                                  <option value="0">mm</option>
                                   <?php for($i=1;$i<=12;$i++){?>
                                	<option value="<?php echo $i;?>"><?php echo $i;?></option>
                              	  <?php }?>
                                  </select>
                                 <a href="javascript:void(0)" id="to_days_sch" style="display:none;"> <i class="fa fa-plus"></i>Add Day</a>
                                  <select id="to_days_school" style="display:none;" name="to_sch_days">
                                  <option value="0">dd</option>
                                   <?php for($i=1;$i<=31;$i++){?>
                                	<option value="<?php echo $i;?>" ><?php echo $i;?></option>
                              	  <?php }?>
                                  </select>
                                                      
                                    <input type="hidden" name="sch_action" id="sch_action" value="add">
                       				  <input type="hidden" value="" name="school_disp_id" >
                                  
                                  <div class="clearfix"></div>
                                  <div class="form-group">
                                    <label for="exampleInputName2">Graduated</label>
                                    <input class="boxsmal" type="checkbox" name="sch_status" value="graduate">
                                  </div>
                                  <div class="clearfix"></div>
                                  <div class="form-group description">
                                    <label for="exampleInputName2">Description</label>
                                    <textarea rows="3" name="description"></textarea>
                                  </div>
                                  <div class="clearfix"></div>
                                  <div class="clearfix"></div>
                                  <div class="box_bottom">
                                    <div class="publics col-md-4" style="display:none;">
                                      <button aria-expanded="false" data-toggle="dropdown" class="btn btn-default dropdown-toggle" type="button">Public <span class="caret"></span></button>
                                    </div>
                                    <div class="col-md-8 add_new">
                                      <div class="btn3 btn-black" id="school_close"  onclick="close_school()">Cancel</div>
                                       <div class="btn3 btn-black" id="school_down_close" style="display:none;" onclick="close_school_down()">Cancel</div>
                                      <input type="submit" class="btn3 btn-green" value="Save Changes" />
                                    </div>
                                    <div class="clearfix"></div>
                                  </div>
                                </form>
                              </div>
                              <div class="col-md-3 rightblock "><a href="javascript:void(0)" onclick="close_school()"><i class="fa fa-times"></i>close</a></div>
                            </div>
                            <div class="graphic"></div>
                          </div>
                              <?php  if(!empty($user_school_info)){ ?>
                           <a href="javascript:void(0)" id="add_school_link_disp" class="work_edu_side_links">add school details</a>
                             <div id="school_down_block">
                          <div class="iner_lefts" id="school_down1" style="display:none;"><a href="#"><i class="fa fa-plus"></i></a></div>
                          <div class="inner_rights boxs" id="school_down2" style="display:none;">
                          <h3><a href="javascript:void(0)" id="add_school_down">Add a High School</a></h3>
                          </div>
                          </div>
                           <?php } ?>