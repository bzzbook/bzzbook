<?php 
	$user_school_info = $this->profile_set->get_school_details();
?>

 <div class="tophead"> High School</div>
                        <div class="iner_lefts" id="school1"><a href="#"><i class="fa fa-plus"></i></a></div>
                        <div class="inner_rights boxs" id="school2">
                          <h3><a href="javascript:void(0)" id="add_school">Add a High School</a></h3>
                          </div>

  <div id="school_val_disp">
   	<?php 
				if(!empty($user_school_info)){
				foreach($user_school_info as $schdetails){
			?>
                      
                        <div class="sm_rightbox"><h3><a href="#"><?php echo $schdetails->school_name;?></a></h3>
                        <p></p>
                        </div>
                        <div class="sm_rightside">
                        <div class="col-md-3 com_le"><i class="fa fa-globe"></i></div>
                        <div class="col-md-6 com_mid"><a href="javascript:void(0)" class="school_edit" id="school_edit<?php echo $schdetails->school_id; ?>" onclick="school_edit()"><i class="fa fa-pencil"></i>Edit</a></div>
                        <div class="col-md-3 com_rig"><a href="#"><i class="fa fa-times"></i></a></div>
                        </div>
                         <?php } }?>
           
                        </div>
                        
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
                                    <span class="to" id="sch_to">to</span>
                                  <div class="col-md-12">
                                    <div class="col-md-4"></div>
                                    <div class="col-md-8 yearto"><a href="javascript:void(0)" id="to_years_sch"> <i class="fa fa-plus"></i>Add year</a></div>
                                  </div>
                                   <select id="frm_years_school" style="display:none;" name="frm_years" >
                                  <option value="0"> --- </option>
                                   <option value="1950" selected="selected">1950</option>
                                   <?php for($i=1951;$i<=date(Y);$i++){?>
                                	<option value="<?php echo $i;?>"><?php echo $i;?></option>
                              	  <?php }?>
                                  </select>
                        
                          <a href="javascript:void(0)" id="frm_months_sch" style="display:none;"> <i class="fa fa-plus"></i>Add Month</a>
                         
                          <select id="frm_months_school" style="display:none;" name="frm_months"> 
                                  <option value="0"> --- </option>
                                   <option value="1" selected="selected">1</option>
                                   <?php for($i=2;$i<=12;$i++){?>
                                	<option value="<?php echo $i;?>" ><?php echo $i;?></option>
                              	  <?php }?>
                                  </select>
                              <a href="javascript:void(0)" id="frm_days_sch" style="display:none;"> <i class="fa fa-plus"></i>Add Day</a>
                                  <select id="frm_days_school" style="display:none;" name="frm_days">
                                  <option value="0"> --- </option>
                                  <option value="1" selected="selected">1</option>
                                   <?php for($i=2;$i<=31;$i++){?>
                                	<option value="<?php echo $i;?>" ><?php echo $i;?></option>
                              	  <?php }?>
                                  </select>
                         
                        
                    
                                    
                                  <select id="to_years_school" style="display:none;" name="to_years">
                                  <option value="0"> --- </option>
                                   <?php for($i=1950;$i<=date(Y);$i++){?>
                                	<option value="<?php echo $i;?>"><?php echo $i;?></option>
                              	  <?php }?>
                                  </select>
                                  <a href="javascript:void(0)" id="to_months_sch" style="display:none;"> <i class="fa fa-plus"></i>Add Month</a>
                                  <select id="to_months_school" style="display:none;" name="to_months">
                                  <option value="0"> --- </option>
                                   <?php for($i=1;$i<=12;$i++){?>
                                	<option value="<?php echo $i;?>" selected="selected"><?php echo $i;?></option>
                              	  <?php }?>
                                  </select>
                                 <a href="javascript:void(0)" id="to_days_sch" style="display:none;"> <i class="fa fa-plus"></i>Add Day</a>
                                  <select id="to_days_school" style="display:none;" name="to_days">
                                  <option value="0"> --- </option>
                                   <?php for($i=1;$i<=31;$i++){?>
                                	<option value="<?php echo $i;?>" selected="selected"><?php echo $i;?></option>
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
                                    <div class="publics col-md-4">
                                      <button aria-expanded="false" data-toggle="dropdown" class="btn btn-default dropdown-toggle" type="button">Public <span class="caret"></span></button>
                                    </div>
                                    <div class="col-md-8">
                                      <div class="btn3 btn-black" onclick="close_school()">Cancel</div>
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