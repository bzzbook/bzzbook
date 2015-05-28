<?php 
	$user_college_info = $this->profile_set->get_college_details();
?>

<div class="tophead"> College</div>
                        <div class="iner_lefts" id="college1"><a href="#"><i class="fa fa-plus"></i></a></div>
                        <div class="inner_rights boxs" id="college2">
                          <h3><a href="javascript:void(0)" id="add_college">Add a college</a></h3>
                          </div>


  <div id="college_val_disp">
   	<?php 
				if(!empty($user_college_info)){
				foreach($user_college_info as $clgdetails){
			?>
                      
                        <div class="sm_rightbox"><h3><a href="#"><?php echo $clgdetails->college_name;?></a></h3>
                        <p><?php echo $clgdetails->concentration1;?> <?php echo $clgdetails->concentration2;?> <?php echo $clgdetails->concentration3;?></p>
                        </div>
                        <div class="sm_rightside">
                        <div class="col-md-3 com_le"><i class="fa fa-globe"></i></div>
                        <div class="col-md-6 com_mid"><a href="javascript:void(0)" class="college_edit" id="college_edit<?php echo $clgdetails->college_id; ?>" onclick="college_edit()"><i class="fa fa-pencil"></i>Edit</a></div>
                        <div class="col-md-3 com_rig"><a href="javascript:void(0)" class="college_delete" id="college_delete<?php echo $clgdetails->college_id; ?>" onclick="college_delete()"><i class="fa fa-times"></i></a></div>
                        </div>
                         <?php } }?>
          
                        </div>
                        
  <div id="college_disp" style="display:none;">
                            <div class="College_box col-md-12">
                              <div class="col-md-9">
                                <form class="form-inline" id="college_form">
                                  <div class="form-group">
                                    <label for="exampleInputName2">School</label>
                                    <input type="text" placeholder="What school did you attend?" name="college_name">
                                  </div>
                                  <div class="form-group period">
                                    <label for="exampleInputName2">Time Period</label>
                                     <a href="javascript:void(0)" id="clg_add_year"><i class="fa fa-plus"></i>Add year</a>
                                     </div>
                                     
                                   <select id="frm_years_college" style="display:none;" name="frm_years" class="frm_clg_years">
                                  <option value="0"> --- </option>
                                   <option value="1950" selected="selected">1950</option>
                                   <?php for($i=1951;$i<=date(Y);$i++){?>
                                	<option value="<?php echo $i;?>"><?php echo $i;?></option>
                              	  <?php }?>
                                  </select>
                        
                          <a href="javascript:void(0)" id="frm_months_clg" style="display:none;"> <i class="fa fa-plus"></i>Add Month</a>
                         
                          <select id="frm_months_college" style="display:none;" name="frm_months"> 
                                  <option value="0"> --- </option>
                                   <option value="1" selected="selected">1</option>
                                   <?php for($i=2;$i<=12;$i++){?>
                                	<option value="<?php echo $i;?>" ><?php echo $i;?></option>
                              	  <?php }?>
                                  </select>
                              <a href="javascript:void(0)" id="frm_days_clg" style="display:none;"> <i class="fa fa-plus"></i>Add Day</a>
                                  <select id="frm_days_college" style="display:none;" name="frm_days">
                                  <option value="0"> --- </option>
                                  <option value="1" selected="selected">1</option>
                                   <?php for($i=2;$i<=31;$i++){?>
                                	<option value="<?php echo $i;?>" ><?php echo $i;?></option>
                              	  <?php }?>
                                  </select>
                                          <div id="clg_to">to</div>
                                  <div class="col-md-12">
                                    <div class="col-md-4"></div>
                                    <div class="col-md-8 yearto"><a href="javascript:void(0)" id="to_years_clg" class="to_years_clg"><i class="fa fa-plus"></i>Add year</a></div>
                                  </div>
                                  
                                  <div class="col-md-12" id="clg_todates_dropdowns">
                                    
                                  <select id="to_years_college" style="display:none;" name="to_years" class="to_clg_years">
                                  <option value="0"> --- </option>
                                   <?php for($i=1950;$i<=date(Y);$i++){?>
                                	<option value="<?php echo $i;?>"><?php echo $i;?></option>
                              	  <?php }?>
                                  </select>
                                  <a href="javascript:void(0)" id="to_months_clg" style="display:none;"> <i class="fa fa-plus"></i>Add Month</a>
                                  <select id="to_months_college" style="display:none;" name="to_months">
                                  <option value="0"> --- </option>
                                   <?php for($i=1;$i<=12;$i++){?>
                                	<option value="<?php echo $i;?>" selected="selected"><?php echo $i;?></option>
                              	  <?php }?>
                                  </select>
                                 <a href="javascript:void(0)" id="to_days_clg" style="display:none;"> <i class="fa fa-plus"></i>Add Day</a>
                                  <select id="to_days_college" style="display:none;" name="to_days">
                                  <option value="0"> --- </option>
                                   <?php for($i=1;$i<=31;$i++){?>
                                	<option value="<?php echo $i;?>" selected="selected"><?php echo $i;?></option>
                              	  <?php }?>
                                  </select>
                                                      
                                  </div>
                        
                                  <div class="clearfix"></div>
                                  <div class="form-group">
                                    <label for="exampleInputName2">Graduated</label>
                                    <input class="boxsmal" type="checkbox" name="edu_status" id="edu_status" value="graduate">
                                  </div>
                                  <div class="clearfix"></div>
                                  <div class="form-group description">
                                    <label for="exampleInputName2">Description</label>
                                    <textarea rows="3" name="description"></textarea>
                                  </div>
                                  <div class="clearfix"></div>
                                  <div class="form-group">
                                    <label for="exampleInputName2">conentration1</label>
                                    <input type="text" name="concentration1">
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputName2">conentration2</label>
                                    <input type="text" name="concentration2">
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputName2">conentration3</label>
                                    <input type="text" name="concentration3">
                                  </div>
                                  <div class="form-group newone11">
                                  
                                    <label for="exampleInputName2">Attended for</label>
                                   
                                      <input type="radio" checked="" value="college" id="optionsRadios1" name="optionsRadios" class="college_radio" />
                                      college 
                                    
                                  </div>
                                  <div class="clearfix"></div>
                                  <div class="form-group newone11">
                                   
                                    <label for="exampleInputName2"></label>
                                    
                                     <input type="radio" checked="" value="graduate" id="optionsRadios1" name="optionsRadios">
                                     
                                      Graduate School 
                            
                                  </div>
                                  <div class="clearfix"></div>
                                  <div class="box_bottom">
                                    <div class="publics col-md-4">
                                      <button aria-expanded="false" data-toggle="dropdown" class="btn btn-default dropdown-toggle" type="button">Public <span class="caret"></span></button>
                                    </div>
                                      <input type="hidden" name="clg_action" id="clg_action" value="add">
                       				  <input type="hidden" value="" name="college_disp_id" >
                                    <div class="col-md-8">
                                      <div class="btn3 btn-black" onclick="close_college()">Cancel</div>
                                      <input type="submit"  class="btn3 btn-green" value="Save Changes" />
                                    </div>
                                    <div class="clearfix"></div>
                                  </div>
                                </form>
                              </div>
                              <div class="col-md-3 rightblock "><a href="javascript:void(0)" onclick="close_college()"><i class="fa fa-times"></i>close</a></div>
                            </div>
                            <div class="graphic"></div>
                          </div>