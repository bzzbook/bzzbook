<!-------------------------- Education Modal Start --------------->

  <div class="filed col-md-12 col-lg-12">
               <div class="modal fade" id="eduModal" tabindex="-1" role="dialog" aria-labelledby="eduModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div id="eduformerrors" style="color:red; font-weight:bold;padding-left:15px;"></div>
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h3 class="modal-title" id="myModalLabel">Add Education Background</h3>
                  </div>
                  <form action="" name="education_form" id="education_form">
                  <div class="modal-body">
                  <div class="row">
                  	 <div class="form-group col-md-4">
                        	<label class="control-label">Field of Study:<span class="form-mandatory">*</span></label>
			                <input type="text" class="form-control" placeholder="" value="" id="field_of_study" name="field_of_study">
            		  </div>
                      <div class="form-group col-md-4">
                        	<label>College / Institution:<span class="form-mandatory">*</span></label>
			                <input type="text" class="form-control" placeholder="" value="" name="college_institution" id="college_institution">
            		  </div>
                      <div class="form-group col-md-4">
                        	<label>Degree / Certificate:<span class="form-mandatory">*</span></label>
			                <input type="text" class="form-control" placeholder="" value="" name="degree_certificate" id="degree_certificate">
            		  </div>
                      </div>
                      <div class="row">
                    
                      &nbsp;&nbsp;&nbsp;&nbsp;<label>Years Attended:<span class="form-mandatory">*</span></label><br />
                      	<div class="form-group col-md-3">  	
                            <select name="year_attended_from" id="year_attended_from" class="form-control">
                            	<option value="0">YYYY</option>
                                <?php for($i=1950;$i<=date(Y);$i++){?>
                                	<option value="<?php echo $i;?>"><?php echo $i;?></option>
                                <?php }?>
                            </select>
                        </div>
                        <div class="form-group col-md-2">  	
                            <select name="month_attended_from" id="month_attended_from" class="form-control" >
                            	<option value="0">MM</option>
                                <?php for($i=1;$i<=12;$i++){?>
                                	<option value="<?php echo $i;?>"><?php echo $i;?></option>
                                <?php }?>
                            </select>
                        </div>
                        <div class="form-group col-md-2" style="text-align:center;">
                        	To
                        </div>
                        <div class="form-group col-md-3">  	
                            <select name="year_attended_to" id="year_attended_to" class="form-control" >
                            	<option value="0">YYYY</option>
                                <?php for($i=1950;$i<=date(Y);$i++){?>
                                	<option value="<?php echo $i;?>"><?php echo $i;?></option>
                                <?php }?>
                            </select>
                        </div>
                        <div class="form-group col-md-2">  	
                            <select name="month_attended_to" id="month_attended_to" class="form-control">
                            	<option value="0">MM</option>
                                <?php for($i=1;$i<=12;$i++){?>
                                	<option value="<?php echo $i;?>"><?php echo $i;?></option>
                                <?php }?>
                            </select>
                        </div>
                      </div>
                      <div class="row">
                        <div class="form-group col-md-12">
                        	<label>Specialized Studies:</label>
	                        <textarea name="special_studies" class="form-control" ></textarea>	
                            <input type="hidden" name="edu_action" id="edu_action" value="add">
                            <input type="hidden" value="" name="edu_form_id" >
                        </div>
                      </div>
                      
                      <div class="clear"></div>
                 
                  </div>
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Add Educational Background</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                  
                  </div>
                  </form>
                </div>
              </div>
            </div>
            </div>
<!-------------------------- Education Modal end --------------->
    
    
     <!-----   Professional modal begin   ----->         
            
            <div class="filed col-md-12 col-lg-12">
               <div class="modal fade" id="profModal" tabindex="-1" role="dialog" aria-labelledby="profModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                <div id="proformerrors" style="color:red; font-weight:bold;padding-left:15px;"></div>
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h3 class="modal-title" id="myModalLabel">Add Professional Experience</h3>
                    </div>
                  <form action="" name="profession_form" id="profession_form">
                  <div class="modal-body">
                  <div class="row">
                  	 <div class="form-group col-md-4">
                        	<label class="control-label">Job Title:<span class="form-mandatory">*</span></label>
			                <input type="text" class="form-control" placeholder="" value="" id="job_title" name="job_title" data-rule-required="true" 
    						        data-msg-required="please enter Job Title">
            		  </div>                     
                      </div>
                      <div class="row">
                      <div class="col-md-6">
                      &nbsp;&nbsp;&nbsp;&nbsp;<label>Start Date:<span class="form-mandatory">*</span></label>
                      </div>
                      <div class="col-md-6">
                      &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;<label>End Date:<span class="form-mandatory">*</span></label>
                      </div>
                      </div>
                      <div class="row">
                      	<div class="form-group col-md-3">  	
                            <select name="year_attended_from" id="pro_year_attended_from" class="form-control" data-rule-required="true" 
    						        data-msg-required="please select Year">
                            	<option value="0">YYYY</option>
                                <?php for($i=1950;$i<=date(Y);$i++){?>
                                	<option value="<?php echo $i;?>"><?php echo $i;?></option>
                                <?php }?>
                            </select>
                        </div>
                        <div class="form-group col-md-2">  	
                            <select name="month_attended_from" id="pro_month_attended_from" class="form-control" data-rule-required="true" 
    						        data-msg-required="please select Month">
                            	<option value="0">MM</option>
                                <?php for($i=1;$i<=12;$i++){?>
                                	<option value="<?php echo $i;?>"><?php echo $i;?></option>
                                <?php }?>
                            </select>
                        </div>
                        <div class="form-group col-md-2" style="text-align:center;">
                        	To
                        </div>
                        <div class="form-group col-md-3">  	
                            <select name="year_attended_to" id="pro_year_attended_to" class="form-control" data-rule-required="true" 
    						        data-msg-required="please select Year">
                            	<option value="0">YYYY</option>
                                <?php for($i=1950;$i<=date(Y);$i++){?>
                                	<option value="<?php echo $i;?>"><?php echo $i;?></option>
                                <?php }?>
                            </select>
                        </div>
                        <div class="form-group col-md-2">  	
                            <select name="month_attended_to" id="pro_month_attended_to" class="form-control" data-rule-required="true" 
    						        data-msg-required="please select Month">
                            	<option value="0">MM</option>
                                <?php for($i=1;$i<=12;$i++){?>
                                	<option value="<?php echo $i;?>"><?php echo $i;?></option>
                                <?php }?>
                            </select>
                        </div>
                      </div>
                      <div class="row">
                        <div class="form-group col-md-12">
                        	<label>Job Description:<span class="form-mandatory">*</span></label>
	                        <textarea name="job_description" id="job_description" class="form-control" data-rule-required="true" 
    						        data-msg-required="please enter Job Description"></textarea>	
                        </div>
                      </div>
                        <div class="checkbox">
    					<label>
      							<input type="checkbox" name="current" value="1" data-rule-required="true" 
    						        data-msg-required="please select current job"> Current
    					</label>
                        <input type="hidden" name="prof_action" id="prof_action" value="add">
                            <input type="hidden" value="" name="prof_form_id" >
  					</div>
                        <div class="clear"></div>
                  </div>
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Add Professional Experience</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                  
                  </div>
                  </form>
                </div>
              </div>
            </div>
            </div>
            
            
            <!-----   Professional modal end   ----->  
    
     <!--------------- Organization modal begin -------------->
     
     
        
            <div class="filed col-md-12 col-lg-12">
               <div class="modal fade" id="orgModal" tabindex="-1" role="dialog" aria-labelledby="orgModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                <div id="orgformerrors" style="color:red; font-weight:bold;padding-left:15px;"></div>
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h3 class="modal-title" id="myModalLabel">Add Organization</h3>
                  </div>
                  <form action="" name="organization_form" id="organization_form">
                  <div class="modal-body">
                  <div class="row">
                  	 <div class="form-group col-md-4">
                        	<label class="control-label">Name Of Organization:<span class="form-mandatory">*</span></label>
			                <input type="text" class="form-control" placeholder="" value="" id="org_name" name="org_name" data-rule-required="true" 
    						        data-msg-required="please enter Organization Name">
            		  </div>  
                       <div class="clear"></div>    
                       <div class="form-group col-md-4">
                        	<label class="control-label">Position Held:<span class="form-mandatory">*</span></label>
			                <input type="text" class="form-control" placeholder="" value="" id="position" name="position" data-rule-required="true" 
    						        data-msg-required="please enter job Position">
            		  </div>                 
                      </div>
                      <div class="row">
                        <div class="form-group col-md-12">
                        	<label>Organization Description:</label>
	                        <textarea name="org_description" id="org_description" class="form-control" data-rule-required="true" 
    						        data-msg-required="please enetr about Organization"></textarea>	
                        </div>
                      </div>
                      <div class="row">
                      <div class="col-md-6">
                      &nbsp;&nbsp;&nbsp;&nbsp;<label>Start Date:<span class="form-mandatory">*</span></label>
                      </div>
                      <div class="col-md-6">
                      &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;<label>End Date:<span class="form-mandatory">*</span></label>
                      </div>
                      </div>
                      <div class="row">
                      	<div class="form-group col-md-3">  	
                            <select name="year_attended_from" id="org_year_attended_from" class="form-control" data-rule-required="true" 
    						        data-msg-required="please select Year">
                            	<option value="0">YYYY</option>
                                <?php for($i=1950;$i<=date(Y);$i++){?>
                                	<option value="<?php echo $i;?>"><?php echo $i;?></option>
                                <?php }?>
                            </select>
                        </div>
                        <div class="form-group col-md-2">  	
                            <select name="month_attended_from" id="org_month_attended_from" class="form-control" data-rule-required="true" 
    						        data-msg-required="please select Month">
                            	<option value="0">MM</option>
                                <?php for($i=1;$i<=12;$i++){?>
                                	<option value="<?php echo $i;?>"><?php echo $i;?></option>
                                <?php }?>
                            </select>
                        </div>
                        <div class="form-group col-md-2" style="text-align:center;">
                        	To
                        </div>
                        <div class="form-group col-md-3">  	
                            <select name="year_attended_to" id="org_year_attended_to" class="form-control" data-rule-required="true" 
    						        data-msg-required="please select Year">
                            	<option value="0">YYYY</option>
                                <?php for($i=1950;$i<=date("Y");$i++){?>
                                	<option value="<?php echo $i;?>"><?php echo $i;?></option>
                                <?php }?>
                            </select>
                        </div>
                        <div class="form-group col-md-2">  	
                            <select name="month_attended_to" id="org_month_attended_to" class="form-control" data-rule-required="true" 
    						        data-msg-required="please Select month">
                            	<option value="0">MM</option>
                                <?php for($i=1;$i<=12;$i++){?>
                                	<option value="<?php echo $i;?>"><?php echo $i;?></option>
                                <?php }?>
                            </select>
                        </div>
                      </div>
                      <div class="row">
                       <div class="form-group col-md-12">
                      <label class="control-label">Employee Status:</label>
                     <select class="form-control" name="emp_status" id="emp_status" data-rule-required="true" 
    						        data-msg-required="please Select Employe status">
 						 <option value="wor" selected="selected">Working</option>
 						 <option value="res">Resigned</option>
						 <option value="frla">Free lancer</option>
						</select>
                        </div>
                         <input type="hidden" name="org_action" id="org_action" value="add">
                         <input type="hidden" value="" name="org_form_id" >
                    </div>
                        <div class="clear"></div>
                  </div>
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Add Organization</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                  
                  </div>
                  </form>
                </div>
</div>
            </div>
            </div>
            
     
     
     <!--------------- Organization modal end ----------------->
    
     <!----------------- Group Modal Begin -------------------->
     
     
     <div class="filed col-md-12 col-lg-12">
               <div class="modal fade" id="grpModal" tabindex="-1" role="dialog" aria-labelledby="grpModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                                <div id="grpformerrors" style="color:red; font-weight:bold;padding-left:15px;"></div>

                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h3 class="modal-title" id="myModalLabel">Add Group</h3>
                  </div>
                  <form action="" name="group_form" id="group_form">
                  <div class="modal-body">
                  <div class="row">
                    <div class="form-group col-md-6">
                        	<label class="control-label">Name Of Group:<span class="form-mandatory">*</span></label>
                            
                           
			                <input type="text" class="form-control" placeholder="" value="" id="group_name" name="group_name" data-rule-required="true" 
    						        data-msg-required="please enter Group Name">
                          </div>  
            		  </div>
                  <div class="row">
                        <div class="form-group col-md-6">
                        	<label>Group Type:</label>
	                        <input type="text" class="form-control" placeholder="" value="" name="group_type" id="group_type" data-rule-required="true" 
    						        data-msg-required="please enter Group Type">
                        </div>
                      </div>
                      
                       <div class="row">
                        <div class="form-group col-md-6">
                        	<label>WebSite Url:</label>
	                        <input type="text" class="form-control" placeholder="" value="" name="website_url" data-rule-required="true" 
    						        data-msg-required="please enter Website Address">
                        </div>
                      </div>
                  <div class="row">
                        <div class="form-group col-md-6">
                        <label>Country:</label>
           <select class="form-control" onchange="print_state('st',this.selectedIndex);" id="con" name ="con">
			<option value="">Select Country</option>
			</select> 
         </div> 
         
          <div class="form-group col-md-6">
          <label>State:</label>
           <select name="st" id="st" class="form-control" data-rule-required="true" 
           data-msg-required="please enter state">
           <option value="">Select State</option>
           </select>
         </div> 
                 <div class="form-group col-md-6">
                        	<label class="control-label">City:<span class="form-mandatory">*</span></label>
			                <input type="text" class="form-control" placeholder="" value="" name="city" id="city" data-rule-required="true" 
    						        data-msg-required="please enter City">
            		  </div>
                      <div class="form-group col-md-6">
                        	<label>Zip / Postal:<span class="form-mandatory">*</span></label>
			                <input type="text" class="form-control" placeholder="" value="" name="postal_code" id="postal_code" data-rule-required="true" 
    						        data-msg-required="please enter Postal Code">
            		  </div>
                      </div>
                      
                      <div class="row">
                        <div class="form-group col-md-12">
                        	<label>Additional Information:</label>
	                        <textarea name="additional_info" class="form-control" data-rule-required="true" 
    						        data-msg-required="please enter Any Additional Information"></textarea>	
                            <input type="hidden" name="grp_action" id="grp_action" value="add">
                            <input type="hidden" value="" name="grp_form_id" >
                        </div>
                      </div>
                      
                      <div class="clear"></div>
                 
                  </div>
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Add Group</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                  
                  </div>
                  </form>
                </div>
              </div>
            </div>
            </div>
     

     <!----------------- Group Modal end  --------------------->   
     
   <!---------------------  ADD COMPANY MODEL BEGIN  --------------------->
     
     <div class="modal fade" id="AddCompany" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    <div id="comperrormsg"></div>
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add Company</h4>
      </div>
      <div class="modal-body">
         <form name="company_form" id="company_form" action="<?php echo base_url(); ?>company/addcompany" onsubmit="return validateCompanyForm();" enctype="multipart/form-data" method="post">
              <figure class="pfpic"><span>Company Logo</span><div id="dvPreview" ><img width="146" height="159" id="blah" src="<?php echo base_url(); ?>images/cl_pic.png" alt=""></div></figure>
              <div class="upload"> <span class="btn btn-success fileinput-button"> <span>Add Logo</span> 
                <!-- The file input field used as target for the file upload widget -->
                
                <input type="file" name="userfile" id="fileupload"/>
                </span> </div>
                 
        <h4 class="clear">Company Info</h4>
    
              <div class="filed col-md-6">
                <input type="text" class="form-control" required="required" name="cmp_name" id="cmp_name" placeholder="Company Name">
              </div>
              <div class="filed col-md-6">
                <select class="form-control" name="cmp_industry" id="cmp_industry">
                  <option value="0">Industry</option>
                  <?php $industries = $this->lookup->get_lookup_industry(); ?>
                  <?php foreach($industries as $industry):?>
                 <option value="<?php echo $industry->lookup_value ?>"><?php echo $industry->lookup_value ?></option>
                 <?php endforeach;?> 
                </select>
              </div>

              <h4 class="clear">About Company</h4>
              <div class="filed col-md-12">
                <textarea id="cmp_about" name="cmp_about" class="form-control"></textarea>
              </div>
              <div class="filed col-md-6">
                <select class="form-control" id="cmp_estb" name="cmp_estb">
                  <option value="0">Established in</option>
                     <?php for($i=1800;$i<=date(Y);$i++){?>
                                	<option value="<?php echo $i;?>"><?php echo $i;?></option>
                                <?php }?>             
                </select>
              </div>
               <div class="filed col-md-6">
                <input type="text" class="form-control" required="required" name="cmp_colleagues" id="cmp_colleagues" placeholder="Employee">
              </div>
             <h4 class="clear">Address</h4>
              <div class="filed col-md-12">
                <textarea class="form-control" name="company_address" id="company_address"></textarea>
              </div>
              <div class="form-group col-md-6">
           <select class="form-control" onchange="print_state('states',this.selectedIndex);" id="contries" name ="contries">
			<option value="">Select Country</option>
			</select> 
         </div> 
         
          <div class="form-group col-md-6">
         
           <select name="states" id="states" class="form-control" data-rule-required="true" 
           data-msg-required="please enter state">
           <option value="">Select State</option>
           </select>
         </div> 
              <div class="filed col-md-6">
                <input type="text" class="form-control" name="company_city" id="company_city" placeholder="City">
              </div>
               <div class="filed col-md-6">
                <input type="text" class="form-control" name="company_postalcode" id="company_postalcode" placeholder="Postal Code">
              </div>
              <h4 class="clear">Contact Info</h4>
              
              <div class="clear"></div>
              
               <div class="filed col-md-6">
                <input type="text" class="form-control" placeholder="Email" name="company_email" id="company_email">
              </div>
               <div class="filed col-md-6">
                <input type="text" class="form-control" placeholder="Phone" name="company_phone" id="company_phone">
              </div>
               <div class="filed col-md-6">
                <input type="text" class="form-control" placeholder="Office" name="company_office" id="company_office">
              </div>
               <div class="filed col-md-6">
                <input type="text" class="form-control" placeholder="Fax" name="company_fax" id="company_fax">
              </div>
       <div class="clear"></div>
              <div class="filed col-md-6">
                <input type="submit" class="fmbtn" value="Save">
              </div>
              <div class="clear"></div>
              </form>
            </div>
            
</div>
</div>
</div>   

  <!---------------------  ADD COMPANY MODEL END  --------------------->
   <!---------------------- MESSAGES CONVERSATION MODEL BEGIN -------------->
  <div class="modal fade" id="msg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Conversations</h4>
      </div>
      <div class="modal-body" id="message_conversation_content">
      
            
      </div>
           
    
    </div>
  </div>
</div>

 <!---------------------- MESSAGES CONVERSATION MODEL END -------------->
 <!----------------------- Follow PopUp Stat  --------------------------->


<div class="modal fade" id="followModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Follow This Company </h4>
      </div>
      <div class="modal-body">
        <form>
        <div class="row">
          <div class="form-group col-md-12">
            <label for="recipient-name" class="control-label">How Can You Follow This Company As:</label>
            </div>
            <div class="form-group col-md-6 ">
            <select class="form-control" id="follow_option">
                  <option value="colleague">Colleague</option>
                  <option value="customer">Customer</option>
                  <option value="other">Other</option>
                 
                </select>
          </div>
    
          </div>
        </form>
      </div>
      <div class="modal-footer">
       
        <button type="button" class="btn btn-primary" onclick="cmpFollowPage(<?php echo $cmp_info[0]['companyinfo_id'] ?>)";>Follow</button>
         <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
 <!----------------------- Follow PopUp End  ---------------------------->
 <!----------------------- Follow PopUp1 Stat (right bar follow) --------------------------->


<div class="modal fade" id="followModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Follow This Company </h4>
      </div>
      
      <div class="modal-body">
        
        <div class="row">
          <div class="form-group col-md-12">
            <label for="recipient-name" class="control-label">How Can You Follow This Company As:</label>
            </div>
            <div class="form-group col-md-6 ">
            <select class="form-control" id="follow_as" name="follow_as">
                  <option value="colleague">Colleague</option>
                  <option value="customer">Customer</option>
                  <option value="other">Other</option>
                 
                </select>
                 <input type="hidden" name="cmp_id" id="cmp_id" value=""/>
          </div>
    
          </div>
        
      </div>
      <div class="modal-footer">
       
        <button type="button" class="btn btn-primary" id="follow_modal_btn">Follow</button>
         <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    
    </div>
  </div>
</div>
 <!----------------------- Follow PopUp1 End  ---------------------------->
<!------------------------- Event Modal Start ----------------------------->

<div class="modal fade" id="cr_event" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div id="comperrormsg"></div>
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Create New Event</h4>
      </div>
      <div class="modal-body">
        <form class="latest_pop" action="<?php echo base_url(); ?>events/create_event" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="exampleInputEmail1">Name</label>
            <input type="text" class="form-control" id="" placeholder="ex: Birthday Party" name="event_name">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Details</label>
            <input type="text" class="form-control" id="" placeholder="Add More Info" name="event_description">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Where</label>
            <input type="text" class="form-control" id="" placeholder="Add A Place?" name="event_location">
          </div>
         
           <div class="form-group dob adding col-md-6 col-sm-6">
           <label for="exampleInputEmail1">When</label>
            <div data-date-viewmode="years" data-date-format="dd-mm-yyyy" data-date="12-02-2012" id="calYears" 
            class="input-group-bt date">
              <input type="text" readonly name="birthdate" value="12-02-2012" size="16" class="form-control">
              <span aria-hidden="true" class="add-on glyphicon glyphicon-calendar"></span> </div>
          </div>
            <!--<input type='text' class="form-control"  name="event_date"/>
            <span class="input-group-addon"> <span class="glyphicon glyphicon-calendar"> </span> </span>-->
            <div class="form-group ad_right col-md-6 col-sm-6">
             <label for="exampleInputEmail1"></label>
              <input type="text" class="form-control" id="" placeholder="Add A Time?" name="event_time">
              <input type="hidden"  name="cmp_id" value="<?php echo $this->uri->segment(3,0); ?>" />
            </div>
          
          <div class="clearfix"></div>
           <div class="form-group">
          <label>Photo</label>
          <input type="file" name="userfile" id="fileupload"/>
          </div>
          <div class="clearfix"></div>
          
          <div class="btn-group">
  		<button class="btn btn-default btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
  		  <span aria-hidden="true" class="add-on glyphicon glyphicon-user"></span> &nbsp Event Privacy &nbsp <span class="caret"></span>
		  </button>
 		 <ul class="dropdown-menu" role="menu">
  				<li>Guests and Friends</li>
                <li>Friends</li>
                <li>Guests</li>
 		 </ul>
		</div>
         <!-- 
           <div class="form-group">
          <select name="event_privacy">
            <option>Guests and Friends</option>
          </select>
          </div>-->
          <div class="clearfix"></div>
         
          <div class="newevent form-group">
          <div><input type="submit" value="Create" class="btn3 btn-yellow" /></div>
          <div><input type="button" class="btn3 btn-black" value="cancel"/></div>
        
        </div>
         <div class="clearfix"></div>
          
        </form>
       
      </div>
    </div>
  </div>
</div>

<!------------------------- Event Modal End ------------------------------->
<!------------countrys and states scripts ------------>

<!------------countrys and states scripts ------------>
<!------------Company Send Message Start------------>
<div class="modal fade" id="cmp_sendmsg">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Send Message</h4>
      </div>
      <div class="modal-body">
        <textarea class="form-control" rows="3" cols="15"></textarea>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!------------Company Send Message End ------------>

<!-------------Sidebar Settings---------------------->


<!-- Modal -->
 <?php $profile_info = $this->profile_set->get_user_profileinfo(); ?>
<div class="modal fade bs-example-modal-lg" id="send_bc_to_friends" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
          <?php $attr = array('name' => 'business_card', 'id' =>'business_card', 'enctype'=>"multipart/form-data") ?>
        <?php 
		echo form_open('profile/send_business_card',$attr) ?>
      <div class="modal-header">
 
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Send Busines card</h4>
       <div id="selected_bc_friends"><div id="search_bc_frnd_wrapper"><input type="text" name="txtsearch" id="search_bc_friends" onkeyup="keyupevent_bc();" autocomplete="off" /><input type="hidden" id="added_bc_users" name="added_bc_users" /><div id="auto_bc_suggest"></div></div></div>
      </div>
      <div class="modal-body">
    <section class="about-user-details business_card">
        <h4><span><img src="<?php echo base_url(); ?>images/business_card.png" alt=""></span>My Business Card</h4>
          <section class="col-lg-12 col-md-12 col-sm-5 col-xs-12 coloumn2 business_card_inner">
           <div class="col-md-10 card_box">
           <h3><?php echo $profile_info[0]['user_firstname'] ." ".$profile_info[0]['user_lastname']; ?></h3>
           <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
           </div>
            <div class="col-md-2 photos"><img src="<?php echo base_url();?>uploads/<?php if(!empty($profile_info[0]['user_img_thumb'])) echo $profile_info[0]['user_img_thumb']; else echo 'default_profile_pic.png'; ?>" alt=""></div>
          </section>
          
          
          <div class="card_icons col-md-12">
          
          <div class="card_iconsbox">
          <div class="card_left"><i class="fa fa-fw"></i></div>
          <div class="card_right">
          <h5>Website:</h5>
          <h6><?php echo $profile_info[0]['user_cmpname']; ?></h6>
          </div>
          <div class="clear"></div>
          </div>
          
          <div class="card_box_right">
          <div class="right_cards"><i class="fa fa-mobile"></i></div>
          <div class="card_right">
          <h5>Phone number:</h5>
          <h6><?php echo $profile_info[0]['user_phoneno']; ?></h6>
          </div>
          <div class="clear"></div>
          </div>
          
          <div class="card_iconsbox2">
          <div class="card_left2"><i class="fa fa-map-marker" ></i></div>
          <div class="card_right">
          <h5>Location:</h5>
          <h6><?php echo $profile_info[0]['user_state'].", ".$profile_info[0]['user_country']; ?></h6>
          </div>
          <div class="clear"></div>
          </div>
          
          <div class="card_box_right2">
          <div class="right_cards2"><i class="fa fa-envelope-o"></i></div>
          <div class="card_right">
          <h5>Email:</h5>
          <h6><?php echo $profile_info[0]['user_email']; ?></h6>
          </div>
          <div class="clear"></div>
          </div>
          
          <div class="card_iconsbox3">
          <div class="card_left3"><i class="fa fa-twitter"></i></div>
          <div class="card_right">
          <h5>Twitter:</h5>
          <h6>Aaliyah@twitter</h6>
          </div>
          <div class="clear"></div>
          </div>
          
          <div class="card_box_right3">
          <div class="right_cards3"><i class="fa fa-facebook"></i></div>
          <div class="card_right">
          <h5>Facebook:</h5>
          <h6>Aaliyah@facebook</h6>
          </div>
          <div class="clear"></div>
          </div>
          
          <div class="card_iconsbox4" id="one">
          <div class="card_left4"><i class="fa fa-pinterest-p"></i></div>
          <div class="card_right">
          <h5>Pinterest:</h5>
          <h6>aaliyah@gmail.com</h6>
          </div>
          <div class="clear"></div>
          </div>
          
          <div class="card_box_right4">
          <div class="right_cards4"><i class="fa fa-linkedin"></i></div>
          <div class="card_right">
          <h5>linkedin:</h5>
          <h6>Aaliyah@linkedin</h6>
          </div>
          <div class="clear"></div>
          </div>
         
          </div>
        
            </section>
      </div>
      <div class="clearfix"></div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Send</button>
      </div>
           </form>
    </div>
  </div>
</div>

<!-------------Sidebar Settings---------------------->
<!----------------  business card share Start--------------->
<div class="modal fade bs-example-modal-lg" id="share_business_card" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
          <?php $attr = array('name' => 'business_card', 'id' =>'business_card', 'enctype'=>"multipart/form-data") ?>
        <?php 
		echo form_open('profile/send_business_card',$attr) ?>
      <div class="modal-header">
 
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Share Busines card</h4>
    
       <div id="selected_emails"></div><input type="text" name="share_business_card_frnds" id="share_business_card_frnds" /><input type="hidden" id="addedmails" name="addedmails" />
     
       </div>
      
      <div class="modal-body">
    <section class="about-user-details business_card">
        <h4><span><img src="<?php echo base_url(); ?>images/business_card.png" alt=""></span>My Business Card</h4>
          <section class="col-lg-12 col-md-12 col-sm-5 col-xs-12 coloumn2 business_card_inner">
           <div class="col-md-10 card_box">
           <h3><?php echo $profile_info[0]['user_firstname'] ." ".$profile_info[0]['user_lastname']; ?></h3>
           <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
           </div>
            <div class="col-md-2 photos"><img src="<?php echo base_url();?>uploads/<?php if(!empty($profile_info[0]['user_img_thumb'])) echo $profile_info[0]['user_img_thumb']; else echo 'default_profile_pic.png'; ?>" alt=""></div>
          </section>
          
          
          <div class="card_icons col-md-12">
          
          <div class="card_iconsbox">
          <div class="card_left"><i class="fa fa-fw"></i></div>
          <div class="card_right">
          <h5>Website:</h5>
          <h6><?php echo $profile_info[0]['user_cmpname']; ?></h6>
          </div>
          <div class="clear"></div>
          </div>
          
          <div class="card_box_right">
          <div class="right_cards"><i class="fa fa-mobile"></i></div>
          <div class="card_right">
          <h5>Phone number:</h5>
          <h6><?php echo $profile_info[0]['user_phoneno']; ?></h6>
          </div>
          <div class="clear"></div>
          </div>
          
          <div class="card_iconsbox2">
          <div class="card_left2"><i class="fa fa-map-marker" ></i></div>
          <div class="card_right">
          <h5>Location:</h5>
          <h6><?php echo $profile_info[0]['user_state'].", ".$profile_info[0]['user_country']; ?></h6>
          </div>
          <div class="clear"></div>
          </div>
          
          <div class="card_box_right2">
          <div class="right_cards2"><i class="fa fa-envelope-o"></i></div>
          <div class="card_right">
          <h5>Email:</h5>
          <h6><?php echo $profile_info[0]['user_email']; ?></h6>
          </div>
          <div class="clear"></div>
          </div>
          
          <div class="card_iconsbox3">
          <div class="card_left3"><i class="fa fa-twitter"></i></div>
          <div class="card_right">
          <h5>Twitter:</h5>
          <h6>Aaliyah@twitter</h6>
          </div>
          <div class="clear"></div>
          </div>
          
          <div class="card_box_right3">
          <div class="right_cards3"><i class="fa fa-facebook"></i></div>
          <div class="card_right">
          <h5>Facebook:</h5>
          <h6>Aaliyah@facebook</h6>
          </div>
          <div class="clear"></div>
          </div>
          
          <div class="card_iconsbox4" id="one">
          <div class="card_left4"><i class="fa fa-pinterest-p"></i></div>
          <div class="card_right">
          <h5>Pinterest:</h5>
          <h6>aaliyah@gmail.com</h6>
          </div>
          <div class="clear"></div>
          </div>
          
          <div class="card_box_right4">
          <div class="right_cards4"><i class="fa fa-linkedin"></i></div>
          <div class="card_right">
          <h5>linkedin:</h5>
          <h6>Aaliyah@linkedin</h6>
          </div>
          <div class="clear"></div>
          </div>
         
          </div>
        
            </section>
      </div>
      <div class="clearfix"></div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Send</button>
      </div>
           </form>
    </div>
  </div>
</div>

<!----------------  business card share end ---------------->

<!----------  new job begin -------------------->

<div class="modal fade" id="AddCompanys" tabindex="-1" role="dialog" aria-labelledby="myModalLabe" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div id="comperrormsg"></div>
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <div class="start"><i class="fa fa-fw"></i></div>
        <h4 class="modal-title" id="new_job_label">Starts Work at <span id="employer_data"></span></h4>
        <div class="subheads">May 18, 2015</div>
      </div>
      <div class="modal-body">
        <form name="new_job_form"  action="<?php echo base_url(); ?>Life_Events/add_new_job/" method="post" enctype="multipart/form-data">
          <div class="col-md-6 Works" >
            <div class="form-group">
              <label for="exampleInputEmail1">Employer</label>
              <input type="text" class="form-control" id="n_j_employer" name="n_j_employer" placeholder="">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Position</label>
              <input type="text" class="form-control" name="n_j_position" placeholder="optional">
            </div>
            <div class="located">
              <label for="exampleInputEmail1">Location</label>
              <div class="input-group">
                <div class="input-group-addon"><i class="fa fa-fw"></i></div>
                <input type="text" class="form-control" id="exampleInputAmount" name="n_j_location">
              </div>
            </div>
            <div class="Works">
              <input type="checkbox" class="outside" name="n_j_status" value="Y" id="n_j_status" onclick="status_change('n_j_status','all_n_j_to_dates_dropdown','n_j_to','n_j_to_presant','add_to_year_link_m','n_j_to_years')">
              <span>I currently work here</span> </div>
            <div class="form-group">
              <label for="">When</label>
              <div class="clearfix"></div>
              <div class="work_botom"><a href="#" onclick="from_year_disp('add_year_link_m','n_j_frm_years','add_month_link_m');" id="add_year_link_m"><i class="fa fa-plus"></i>&nbsp;Add Year</a></div>
              <div class="col-md-4">
              
                <select style="display:none;"  name="n_j_frm_years" id="n_j_frm_years" onchange="frm_years_change('n_j_frm_years','add_month_link_m','n_j_frm_months','add_day_link_m','n_j_frm_days','add_year_link_m')">
                  <option value="0">years</option>
                    <option>1983</option>  
                    <option>1984</option>  
                    <option>1985</option>  
                    <option>1986</option> 
                     <option>1987</option>  
                     <option>1988</option>
                </select>
              </div>
              <div class="work_botom"><a href="#" onclick="from_month_disp('add_month_link_m','n_j_frm_months','add_day_link_m');" style="display:none;" id="add_month_link_m"><i class="fa fa-plus"></i>&nbsp;Add Month</a></div>
              <div class="col-md-4">
               <select style="display:none;" name="n_j_frm_months"  id="n_j_frm_months" onchange="frm_months_change('add_month_link_m','n_j_frm_months','add_day_link_m','n_j_frm_days','add_year_link_m')">
                  <option value="0">months</option>
                    <option>1</option>  
                    <option>2</option>  
                    <option>3</option>  
                    <option>4</option> 
                    <option>5</option>  
                    <option>6</option>
                </select>
              </div>
              <div class="work_botom"><a href="#" onclick="from_day_disp('add_day_link_m','n_j_frm_days','n_j_status','n_j_to','n_j_to_presant','n_j_to_years','add_to_year_link_m');" style="display:none;" id="add_day_link_m"><i class="fa fa-plus"></i>&nbsp;Add Day</a></div>
              <div class="col-md-4">
                <select style="display:none;" name="n_j_frm_days" id="n_j_frm_days" onchange="frm_days_change('n_j_frm_days','add_day_link_m','add_to_year_link_m','n_j_to','n_j_to_presant','n_j_status','all_n_j_to_dates_dropdown','add_to_year_link_m')">
                  <option value="0">Days</option>
                   <option>1</option>  
                    <option>2</option>  
                    <option>3</option>  
                    <option>4</option> 
                    <option>5</option> 
                </select>
              </div>
              <div class="clearfix"></div>
               <div class="work_botom" id="n_j_to">To</div>
               <div class="work_botom" id="n_j_to_presant" style="display:none;">To Presant</div>
              <div class="work_botom"><a href="#" id="add_to_year_link_m" onclick="to_year_disp('add_to_year_link_m','n_j_to_years','add_to_month_link_m');"><i class="fa fa-plus"></i>&nbsp;Add Year</a></div>
            </div>
            
            <div class="form-group" id="all_n_j_to_dates_dropdown">
             
              <div class="clearfix"></div>
              <div class="col-md-4">
                <select style="display:none;" name="n_j_to_years" id="n_j_to_years" onchange="to_years_change('add_to_year_link_m','n_j_to_years','add_to_month_link_m','n_j_to_months','n_j_to_days')">
                 <option value="0">years</option>
                    <option>1983</option>  
                    <option>1984</option>  
                    <option>1985</option>  
                    <option>1986</option> 
                     <option>1987</option>  
                     <option>1988</option>
                </select>
              </div>
               <div class="work_botom"><a href="#" onclick="to_month_disp('add_to_month_link_m','n_j_to_months','add_to_day_link_m');" style="display:none;" id="add_to_month_link_m"><i class="fa fa-plus"></i>&nbsp;Add Month</a></div>
              <div class="col-md-4">
                <select style="display:none;" id="n_j_to_months"  name="n_j_to_months" onchange="to_months_change('n_j_to_months','add_to_month_link_m','add_to_day_link_m','n_j_to_days')">
                   <option value="0">Months</option>
                    <option>1</option>  
                    <option>2</option>  
                    <option>3</option>  
                    <option>4</option> 
                    <option>5</option> 
                </select>
              </div>
              <div class="work_botom"><a href="#" onclick="to_day_disp('add_to_day_link_m','n_j_to_days');" style="display:none;" id="add_to_day_link_m"><i class="fa fa-plus"></i>&nbsp;Add Day</a></div>
              <div class="col-md-4">
                <select style="display:none;" name="n_j_to_days" id="n_j_to_days" onchange="to_days_change('add_to_day_link_m','n_j_to_days')">
                  <option value="0">Days</option>
                   <option>1</option>  
                    <option>2</option>  
                    <option>3</option>  
                    <option>4</option> 
                    <option>5</option> 
                </select>
              </div>
              <div class="clearfix"></div>
              
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Story</label>
              <div class="clearfix"></div>
              <textarea rows="4" placeholder="Optional" name="n_j_story"></textarea>
              <input type="hidden" name="n_j_images" value="uploadjobphotos" />
              <input type="hidden" name="n_j_type" value="new_job" />
            </div>
          </div>
          <div class="col-md-6 chos_photos" id="testingg" >
           <!-- <button type="button" class="btn btn-default btn-lg btn-block pho_box">Choose From Photos...</button> -->
           <button type="button" class="btn btn-default btn-lg btn-block pho_box" onclick="document.getElementById('uploadjobphotos').click()">Upload Photos...</button>
             <input class="btn btn-default btn-lg btn-block pho_box" type="file" name="uploadjobphotos[]" id="uploadjobphotos" multiple="multiple" style="display:none;" />
          </div>
         <div class="col-md-6 chos_photos" id="uploadPhotosnewjob"></div>
          <div class="clearfix"></div>
      
        <div class="box_bottom">
          <div class="publics col-md-3" style="float:right">
           <input type="submit" class="btn3 btn-green" value="Save" />
            <div class="btn3 btn-black"  data-dismiss="modal" >Cancel</div>
           
          </div>
          <div class="clearfix"></div>
        </div>
          </form>
        <div class="clearfix"></div>
      </div>
    </div>
  </div>
</div>
<!----------  new job end   -------------------->

<!-----Published book or paper------->

<div class="modal fade" id="AddCompanys_book" tabindex="-1" role="dialog" aria-labelledby="myModalLabe" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div id="comperrormsg"></div>
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <div class="paper"><i class="fa fa-fw"></i></div>
        <h4 class="modal-title" id="myModalLabe">Published a Paper</h4>
        <div class="subheads">Today</div>
      </div>
      <div class="modal-body">
        <form name="company_form" id="company_form" action="<?php echo base_url(); ?>company/addcompanys" onsubmit="return validateCompanyForm();" enctype="multipart/form-data" method="post">
          <div class="col-md-6 books" >
            <div class="form-group">
              <label for="exampleInputName2">Title</label>
              <input type="text" class="form-control" id="" placeholder="Optional">
            </div>
            <div class="form-group">
              <label for="exampleInputName2">Type</label>
              <div class="clearfix"></div>
              <select>
                <option>Paper</option>
              </select>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Full Citation</label>
              <div class="clearfix"></div>
              <textarea rows="4" placeholder="Optional"></textarea>
            </div>
            <div class="located">
              <label for="exampleInputEmail1">Location</label>
              <div class="input-group">
                <div class="input-group-addon"><i class="fa fa-fw"></i></div>
                <input type="text" class="form-control" id="exampleInputAmount" placeholder="Optional">
              </div>
            </div>
            <div class="located">
              <label for="exampleInputEmail1">With</label>
              <div class="input-group">
                <div class="input-group-addon"> <i class="fa fa-fw"></i></div>
                <input type="text" class="form-control" id="exampleInputAmount" placeholder="">
              </div>
            </div>
            <div class="form-group">
              <label for="">When</label>
              <div class="clearfix"></div>
              <div class="col-md-4">
                <select>
                  <option>1982</option>
                </select>
              </div>
              <div class="col-md-4">
                <select>
                  <option>May</option>
                </select>
              </div>
              <div class="col-md-4">
                <select>
                  <option>13</option>
                </select>
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Story</label>
                <div class="clearfix"></div>
                <textarea rows="4" placeholder="Optional"></textarea>
              </div>
              <div class="clearfix"></div>
            </div>
          </div>
          <div class="col-md-6 chos_photos" >
           <!-- <button type="button" class="btn btn-default btn-lg btn-block pho_box">Choose From Photos...</button> -->
            <button type="button" class="btn btn-default btn-lg btn-block pho_box">Upload Photos...</button>
          </div>
          <div class="clearfix"></div>
        </form>
        <div class="box_bottom">
          <div class="publics col-md-3" style="float:right">
           <div data-target="#AddCompany" data-toggle="modal" data-dismiss="modal" class="btn3 btn-green">Save</div>
            <div class="btn3 btn-black">Cancel</div>
           
          </div>
          <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
      </div>
    </div>
  </div>
</div>

<!-----retired------>
<div class="modal fade" id="AddCompanys_Retired" tabindex="-1" role="dialog" aria-labelledby="myModalLabe" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div id="comperrormsg"></div>
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <div class="paper"><i class="fa fa-apple"></i></div>
        <h4 class="modal-title" id="myModalLabe">Retired</h4>
        <div class="subheads">Today</div>
      </div>
      <div class="modal-body">
        <form name="add_retirement" id="add_retirement" action="<?php echo base_url(); ?>Life_Events/add_retirement/" method="post" enctype="multipart/form-data">
          <div class="col-md-6 Retired" >
            <div class="form-group">
              <label for="exampleInputName2">Title</label>
              <input type="text" class="form-control" id="" placeholder="Optional" name="r_title">
            </div>
            <div class="form-group">
              <label for="">When</label>
              <div class="clearfix"></div>
              <div class="col-md-4">
                <select name="r_year">
                  <option>1982</option>
                </select>
              </div>
              <div class="col-md-4">
                <select name="r_month">
                  <option>May</option>
                </select>
              </div>
              <div class="col-md-4">
                <select name="r_date">
                  <option >13</option>
                </select>
              </div>
              <div class="clearfix"></div>
            </div>
            <div class="form-group">
              <label for="exampleInputName2">Profession</label>
              <input type="text" class="form-control" id="" placeholder="Optional" name="r_profession">
            </div>
            <div class="located">
              <label for="exampleInputEmail1">Location</label>
              <div class="input-group">
                <div class="input-group-addon"><i class="fa fa-fw"></i></div>
                <input type="text" placeholder="Optional" id="exampleInputAmount" class="form-control" name="r_location">
              </div>
            </div>
            <div class="located">
              <label for="exampleInputEmail1">With</label>
              <div class="input-group">
                <div class="input-group-addon"> <i class="fa fa-fw"></i></div>
                <input type="text" placeholder="" id="exampleInputAmount" class="form-control" name="r_with">
                 <input type="hidden" name="r_images" value="uploadretirementphotos" />
                 <input type="hidden" name="r_type" value="retirement" />
              </div>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Story</label>
              <div class="clearfix"></div>
              <textarea placeholder="Optional" rows="4" name="r_story"></textarea>
            </div>
          </div>
          <div class="col-md-6 chos_photos" id="retirement_pics">
           <!-- <button type="button" class="btn btn-default btn-lg btn-block pho_box">Choose From Photos...</button> -->
            <button type="button" class="btn btn-default btn-lg btn-block pho_box"  onclick="document.getElementById('uploadretirementphotos').click()">Upload Photos...</button>
              
             <input class="btn btn-default btn-lg btn-block pho_box" type="file" name="uploadretirementphotos[]" id="uploadretirementphotos" multiple="multiple" style="display:none;" />
          </div>
           <div class="col-md-6 chos_photos" id="uploadPhotosretirement"></div>
          <div class="clearfix"></div>
          <div class="box_bottom">
         
          <div class="publics col-md-3" style="float:right">
           <input type="submit" class="btn3 btn-green" value="Save">
            <div class="btn3 btn-black"  data-dismiss="modal">Cancel</div>
           
          </div>
          <div class="clearfix"></div>
    
          <div class="clearfix"></div>
        </div>
        </form>
        
        <div class="clearfix"></div>
      </div>
    </div>
  </div>
</div>

<!-----Started School------>
<div class="modal fade" id="AddCompanys_New_school" tabindex="-1" role="dialog" aria-labelledby="myModalLabe" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div id="comperrormsg"></div>
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <div class="paper"><i class="fa fa-fw"></i></div>
        <h4 class="modal-title" id="myModalLabe">Started School</h4>
        <div class="subheads">May 25, 2015</div>
      </div>
      <div class="modal-body">
        <form name="company_form" id="company_form" action="<?php echo base_url(); ?>company/addcompanys" onsubmit="return validateCompanyForm();" enctype="multipart/form-data" method="post">
          <div class="col-md-6 New_school" >
            <div class="form-group">
              <label for="exampleInputName2">Type of School</label>
              <br>
              <div class="schools">
                <select>
                  <option>High School </option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label for="exampleInputName2">School</label>
              <input type="text" class="form-control" id="" >
            </div>
            <div class="Works">
              <input type="checkbox" class="outside">
              <span>I currently study here</span> </div>
            <div class="form-group">
              <label for="">When</label>
              <div class="clearfix"></div>
              <div class="col-md-4">
                <select>
                  <option>1982</option>
                </select>
              </div>
              <div class="col-md-4">
                <select>
                  <option>May</option>
                </select>
              </div>
              <div class="col-md-4">
                <select>
                  <option>13</option>
                </select>
              </div>
              <div class="clearfix"></div>
              <div class="work_botom"><a href="#"><i class="fa fa-plus"></i>&nbsp;Add Year</a></div>
            </div>
            <div class="form-group">
              <label for="exampleInputName2">Graduated</label>
              <br>
              <input type="checkbox" class="outside">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Story</label>
              <div class="clearfix"></div>
              <textarea placeholder="Optional" rows="4"></textarea>
            </div>
          </div>
          <div class="col-md-6 chos_photos" >
           <!-- <button type="button" class="btn btn-default btn-lg btn-block pho_box">Choose From Photos...</button> -->
            <button type="button" class="btn btn-default btn-lg btn-block pho_box">Upload Photos...</button>
          </div>
           <div class="col-md-6 chos_photos" id="uploadPhotosnewjob"></div>
          <div class="clearfix"></div>
        </form>
        <div class="box_bottom">
          <div class="box_bottom">
          <div class="publics col-md-3" style="float:right">
           <div data-target="#AddCompany" data-toggle="modal" class="btn3 btn-green">Save</div>
            <div class="btn3 btn-black">Cancel</div>
           
          </div>
          <div class="clearfix"></div>
        </div>
          <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
      </div>
    </div>
  </div>
</div>

<!-----Study abroad------>
<div class="modal fade" id="AddCompanys_Study_abroad" tabindex="-1" role="dialog" aria-labelledby="myModalLabe" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div id="comperrormsg"></div>
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <div class="paper"><i class="fa fa-pagelines"></i></div>
        <h4 class="modal-title" id="myModalLabe">Studied Abroad</h4>
        <div class="subheads">Today</div>
      </div>
      <div class="modal-body">
        <form name="company_form" id="company_form" action="<?php echo base_url(); ?>Life_Events/add_study_abroad"  enctype="multipart/form-data" method="post">
          <div class="col-md-6 Study_abroad" >
            <div class="form-group">
              <label for="exampleInputName2">Title</label>
              <input type="text" class="form-control" id="" placeholder="Optional"  name="s_a_title">
            </div>
            <div class="located">
              <label for="exampleInputEmail1">Location</label>
              <div class="input-group">
                <div class="input-group-addon"><i class="fa fa-fw"></i></div>
                <input type="text" id="exampleInputAmount" class="form-control" placeholder="Optional" name="s_a_location">
              </div>
            </div>
            <div class="form-group">
              <label for="exampleInputName2">School</label>
              <input type="text" class="form-control" id="" placeholder="Optional" name="s_a_school">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Studying</label>
              <div class="clearfix"></div>
              <textarea placeholder="Optional" rows="4" name="s_a_studying"></textarea>
               <input type="hidden" name="s_a_images" value="uploadstudyabroadpics" />
               <input type="hidden" name="s_a_type" value="study_abroad" />
            </div>
            <div class="located">
              <label for="exampleInputEmail1">With</label>
              <div class="input-group">
                <div class="input-group-addon"> <i class="fa fa-fw"></i></div>
                <input type="text" placeholder="" id="exampleInputAmount" class="form-control" name="s_a_with">
              </div>
            </div>
            
            
            
            
            
            
            <div class="form-group">
              <label for="">From</label>
              <div class="clearfix"></div>
              <div class="work_botom"><a href="#" onclick="from_year_disp('add_year_link_s_a','s_a_frm_years','add_month_link_s_a');" id="add_year_link_s_a"><i class="fa fa-plus"></i>&nbsp;Add Year</a></div>
              <div class="col-md-4">
              
                <select style="display:none;" name="s_a_frmyear" id="s_a_frm_years" onchange="frm_years_change('s_a_frm_years','add_month_link_s_a','s_a_frm_months','add_day_link_s_a','s_a_frm_days','add_year_link_s_a')">
                  <option value="0">years</option>
                    <option>1983</option>  
                    <option>1984</option>  
                    <option>1985</option>  
                    <option>1986</option> 
                     <option>1987</option>  
                     <option>1988</option>
                </select>
              </div>
              <div class="work_botom"><a href="#" onclick="from_month_disp('add_month_link_s_a','s_a_frm_months','add_day_link_s_a');" style="display:none;" id="add_month_link_s_a"><i class="fa fa-plus"></i>&nbsp;Add Month</a></div>
              <div class="col-md-4">
               <select style="display:none;"  name="s_a_frmmonth" id="s_a_frm_months" onchange="frm_months_change('add_month_link_s_a','s_a_frm_months','add_day_link_s_a','s_a_frm_days','add_year_link_s_a')">
                  <option value="0">months</option>
                    <option>1</option>  
                    <option>2</option>  
                    <option>3</option>  
                    <option>4</option> 
                    <option>5</option>  
                    <option>6</option>
                </select>
              </div>
              <div class="work_botom"><a href="#" onclick="from_day_disp('add_day_link_s_a','s_a_frm_days','n_j_status','s_a_to','s_a_to_presant','s_a_to_years','add_year_link_s_a');" style="display:none;" id="add_day_link_s_a"><i class="fa fa-plus"></i>&nbsp;Add Day</a></div>
              <div class="col-md-4">
                <select style="display:none;" name="s_a_frmdate" id="s_a_frm_days" onchange="frm_days_change('s_a_frm_days','add_day_link_s_a','add_year_link_s_a','s_a_to','s_a_to_presant','n_j_status','all_s_a_to_dates_dropdown','add_to_year_link_s_a')">
                  <option value="0">Days</option>
                   <option>1</option>  
                    <option>2</option>  
                    <option>3</option>  
                    <option>4</option> 
                    <option>5</option> 
                </select>
              </div>
              <div class="clearfix"></div>
               <div class="work_botom" id="s_a_to">To</div>
               <div class="work_botom" id="s_a_to_presant" style="display:none;">To Presant</div>
              <div class="work_botom"><a href="#" id="add_to_year_link_s_a" onclick="to_year_disp('add_to_year_link_s_a','s_a_to_years','add_to_month_link_s_a');"><i class="fa fa-plus"></i>&nbsp;Add Year</a></div>
            </div>
            
            
            
            
            
            
            
            
            
            
            
            
            <!--<div class="form-group">
              <label for="">From</label>
              <div class="clearfix"></div>
              <div class="col-md-4">
                <select name="s_a_frmyear">
                  <option>1982</option>
                </select>
              </div>
              <div class="col-md-4">
                <select name="s_a_frmmonth">
                  <option>May</option>
                </select>
              </div>
              <div class="col-md-4">
                <select name="s_a_frmdate">
                  <option>13</option>
                </select>
              </div>
              <div class="clearfix"></div>
              <label for="exampleInputName2">To</label>
              <br>
              <div class="work_botom"><a href="#"><i class="fa fa-plus"></i>&nbsp;Add Year</a></div>
            </div>-->
            
            
            
            <div class="form-group" id="all_s_a_to_dates_dropdown">
             
              <div class="clearfix"></div>
              <div class="col-md-4">
                <select style="display:none;"  name="s_a_to_years" id="s_a_to_years" onchange="to_years_change('add_to_year_link_s_a','s_a_to_years','add_to_month_link_s_a','s_a_to_months','s_a_to_days')">
                 <option value="0">years</option>
                    <option>1983</option>  
                    <option>1984</option>  
                    <option>1985</option>  
                    <option>1986</option> 
                     <option>1987</option>  
                     <option>1988</option>
                </select>
              </div>
               <div class="work_botom"><a href="#" onclick="to_month_disp('add_to_month_link_s_a','s_a_to_months','add_to_day_link_s_a');" style="display:none;" id="add_to_month_link_s_a"><i class="fa fa-plus"></i>&nbsp;Add Month</a></div>
              <div class="col-md-4">
                <select style="display:none;" id="s_a_to_months" name="s_a_to_months" onchange="to_months_change('s_a_to_months','add_to_month_link_s_a','add_to_day_link_s_a','s_a_to_days')">
                   <option value="0">Months</option>
                    <option>1</option>  
                    <option>2</option>  
                    <option>3</option>  
                    <option>4</option> 
                    <option>5</option> 
                </select>
              </div>
              <div class="work_botom"><a href="#" onclick="to_day_disp('add_to_day_link_s_a','s_a_to_days');" style="display:none;" id="add_to_day_link_s_a"><i class="fa fa-plus"></i>&nbsp;Add Day</a></div>
              <div class="col-md-4">
                <select style="display:none;" id="s_a_to_days" name="s_a_to_days" onchange="to_days_change('add_to_day_link_s_a','s_a_to_days')">
                  <option value="0">Days</option>
                   <option>1</option>  
                    <option>2</option>  
                    <option>3</option>  
                    <option>4</option> 
                    <option>5</option> 
                </select>
              </div>
              <div class="clearfix"></div>
              
            </div>
            
            
            
            <div class="form-group">
              <label for="exampleInputEmail1">Story</label>
              <div class="clearfix"></div>
              <textarea placeholder="Optional" rows="4" name="s_a_story"></textarea>
            </div>
          </div>
          <div class="col-md-6 chos_photos" id="study_abroad_pics">
           <!-- <button type="button" class="btn btn-default btn-lg btn-block pho_box">Choose From Photos...</button> -->
             <button type="button" class="btn btn-default btn-lg btn-block pho_box"  onclick="document.getElementById('uploadstudyabroadpics').click()">Upload Photos...</button>
              
             <input class="btn btn-default btn-lg btn-block pho_box" type="file" name="uploadstudyabroadpics[]" id="uploadstudyabroadpics" multiple="multiple" style="display:none;" />
          </div>
           <div class="col-md-6 chos_photos" id="upload_study_abroad_pics"></div>
          <div class="clearfix"></div>
                  <div class="box_bottom">
         
          <div class="publics col-md-3" style="float:right">
           <input type="submit" class="btn3 btn-green" value="Save" />
            <div class="btn3 btn-black" data-dismiss="modal">Cancel</div>
           
          </div>
  
          <div class="clearfix"></div>
        </div>
        </form>

        <div class="clearfix"></div>
      </div>
    </div>
  </div>
</div>

<!-----Volunteer Work------>
<div class="modal fade" id="AddCompanys_Volunteer_Work" tabindex="-1" role="dialog" aria-labelledby="myModalLabe" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div id="comperrormsg"></div>
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <div class="paper"><i class="fa fa-fw"></i></div>
        <h4 class="modal-title" id="myModalLabe">Started Volunteering</h4>
        <div class="subheads">Today</div>
      </div>
      <div class="modal-body">
        <form name="company_form" id="company_form" action="<?php echo base_url(); ?>company/addcompanys" onsubmit="return validateCompanyForm();" enctype="multipart/form-data" method="post">
          <div class="col-md-6 Volunteer_Work" >
            <div class="form-group">
              <label for="exampleInputName2">Title</label>
              <input type="text" class="form-control" id="" placeholder="Optional" >
            </div>
            <div class="form-group">
              <label for="exampleInputName2">Organization</label>
              <input type="text" class="form-control" id="" placeholder="Optional" >
            </div>
            <div class="located">
              <label for="exampleInputEmail1">Location</label>
              <div class="input-group">
                <div class="input-group-addon"><i class="fa fa-fw"></i></div>
                <input type="text" id="exampleInputAmount" class="form-control" placeholder="Optional">
              </div>
            </div>
            <div class="located">
              <label for="exampleInputEmail1">With</label>
              <div class="input-group">
                <div class="input-group-addon"><i class="fa fa-fw"></i></div>
                <input type="text" id="exampleInputAmount" class="form-control" placeholder="">
              </div>
            </div>
            <div class="form-group">
              <label for="">When</label>
              <div class="clearfix"></div>
              <div class="col-md-4">
                <select>
                  <option>1982</option>
                </select>
              </div>
              <div class="col-md-4">
                <select>
                  <option>May</option>
                </select>
              </div>
              <div class="col-md-4">
                <select>
                  <option>13</option>
                </select>
              </div>
              <div class="clearfix"></div>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Story</label>
              <div class="clearfix"></div>
              <textarea placeholder="Optional" rows="4"></textarea>
            </div>
          </div>
          <div class="col-md-6 chos_photos" >
           <!-- <button type="button" class="btn btn-default btn-lg btn-block pho_box">Choose From Photos...</button> -->
            <button type="button" class="btn btn-default btn-lg btn-block pho_box">Upload Photos...</button>
          </div>
          <div class="clearfix"></div>
        </form>
        <div class="box_bottom">
          <div class="box_bottom">
          <div class="publics col-md-3" style="float:right">
           <div data-target="#AddCompany" data-toggle="modal" class="btn3 btn-green">Save</div>
            <div class="btn3 btn-black">Cancel</div>
           
          </div>
          <div class="clearfix"></div>
        </div>
          <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
      </div>
    </div>
  </div>
</div>

<!-----Military Service------>
<div class="modal fade" id="AddCompanys_Military_Service" tabindex="-1" role="dialog" aria-labelledby="myModalLabe" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div id="comperrormsg"></div>
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <div class="paper"><i class="fa fa-fw"></i></div>
        <h4 class="modal-title" id="myModalLabe">Military Service</h4>
        <div class="subheads">Today</div>
      </div>
      <div class="modal-body">
        <form name="company_form" id="company_form" action="<?php echo base_url(); ?>company/addcompanys" onsubmit="return validateCompanyForm();" enctype="multipart/form-data" method="post">

          <div class="col-md-6 Military_Service" >
            <div class="form-group">
              <label for="exampleInputName2">Title</label>
              <input type="text" class="form-control" id="" placeholder="Optional" >
            </div>
            <div class="form-group">
              <label for="exampleInputName2">Branch</label>
              <input type="text" class="form-control" id="" placeholder="Optional" >
            </div>
            <div class="form-group">
              <label for="exampleInputName2">Division</label>
              <input type="text" class="form-control" id="" placeholder="Optional" >
            </div>
            <div class="located">
              <label for="exampleInputEmail1">Country</label>
              <div class="input-group">
                <div class="input-group-addon"><i class="fa fa-fw"></i></div>
                <input type="text" id="exampleInputAmount" class="form-control" placeholder="Optional">
              </div>
            </div>
            <div class="located">
              <label for="exampleInputEmail1">With</label>
              <div class="input-group">
                <div class="input-group-addon"><i class="fa fa-fw"></i></div>
                <input type="text" id="exampleInputAmount" class="form-control" placeholder="">
              </div>
            </div>
            <div class="form-group">
              <label for="">From</label>
              <div class="clearfix"></div>
              <div class="col-md-4">
                <select>
                  <option>1982</option>
                </select>
              </div>
              <div class="col-md-4">
                <select>
                  <option>May</option>
                </select>
              </div>
              <div class="col-md-4">
                <select>
                  <option>13</option>
                </select>
              </div>
              <div class="clearfix"></div>
              <label for="exampleInputName2">To</label>
              <div class="work_botom"><a href="#"><i class="fa fa-plus"></i>&nbsp;Add Year</a></div>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Story</label>
              <div class="clearfix"></div>
              <textarea placeholder="Optional" rows="4"></textarea>
            </div>
          </div>
          <div class="col-md-6 chos_photos" >
           <!-- <button type="button" class="btn btn-default btn-lg btn-block pho_box">Choose From Photos...</button> -->
            <button type="button" class="btn btn-default btn-lg btn-block pho_box">Upload Photos...</button>
          </div>
          <div class="clearfix"></div>
        </form>
        <div class="box_bottom">
          <div class="publics col-md-3" style="float:right">
           <div data-target="#AddCompany" data-toggle="modal" class="btn3 btn-green">Save</div>
            <div class="btn3 btn-black">Cancel</div>
           
          </div>
          <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
      </div>
    </div>
  </div>
</div>

<!-----Military Service------>
<div class="modal fade" id="AddCompanys_Create_own" tabindex="-1" role="dialog" aria-labelledby="myModalLabe" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div id="comperrormsg"></div>
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <div class="paper"><i class="fa fa-fw"></i></div>
        <h4 class="modal-title" id="myModalLabe">Other Life Event</h4>
        <div class="subheads">Today</div>
      </div>
      <div class="modal-body">
        <form name="company_form" id="company_form" action="<?php echo base_url(); ?>company/addcompanys" onsubmit="return validateCompanyForm();" enctype="multipart/form-data" method="post">
          <div class="col-md-6 Create_own" >
            <div class="form-group">
              <label for="exampleInputName2">Title</label>
              <input type="text" class="form-control" id="" placeholder="Optional" >
            </div>
            <div class="located">
              <label for="exampleInputEmail1">Location</label>
              <div class="input-group">
                <div class="input-group-addon"><i class="fa fa-fw"></i></div>
                <input type="text" id="exampleInputAmount" class="form-control" placeholder="Optional">
              </div>
            </div>
            <div class="located">
              <label for="exampleInputEmail1">With</label>
              <div class="input-group">
                <div class="input-group-addon"><i class="fa fa-fw"></i></div>
                <input type="text" id="exampleInputAmount" class="form-control" placeholder="">
              </div>
            </div>
            <div class="form-group">
              <label for="">When</label>
              <div class="clearfix"></div>
              <div class="col-md-4">
                <select>
                  <option>1982</option>
                </select>
              </div>
              <div class="col-md-4">
                <select>
                  <option>May</option>
                </select>
              </div>
              <div class="col-md-4">
                <select>
                  <option>13</option>
                </select>
              </div>
              <div class="clearfix"></div>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Story</label>
              <div class="clearfix"></div>
              <textarea placeholder="Optional" rows="4"></textarea>
            </div>
          </div>
          <div class="col-md-6 chos_photos" >
           <!-- <button type="button" class="btn btn-default btn-lg btn-block pho_box">Choose From Photos...</button> -->
            <button type="button" class="btn btn-default btn-lg btn-block pho_box">Upload Photos...</button>
          </div>
          <div class="clearfix"></div>
        </form>
        <div class="box_bottom">
          <div class="publics col-md-3" style="float:right">
           <div data-target="#AddCompany" data-toggle="modal" class="btn3 btn-green">Save</div>
            <div class="btn3 btn-black">Cancel</div>
           
          </div>
          <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
      </div>
    </div>
  </div>
</div>

<!-----Family & Relationships second tab open--------------> 
<!-----First Met------>
<div class="modal fade" id="AddCompanys_First_Met" tabindex="-1" role="dialog" aria-labelledby="myModalLabe" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div id="comperrormsg"></div>
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <div class="paper"><i class="fa fa-fw"></i></div>
        <h4 class="modal-title" id="myModalLabe">First Met Someone</h4>
        <div class="subheads">Today</div>
      </div>
      <div class="modal-body">
        <form name="company_form" id="company_form" action="<?php echo base_url(); ?>company/addcompanys" onsubmit="return validateCompanyForm();" enctype="multipart/form-data" method="post">
          <div class="col-md-6 First_Met" >
            <div class="form-group">
              <label for="exampleInputName2">Title</label>
              <input type="text" class="form-control" id="" placeholder="Optional" >
            </div>
            <div class="located">
              <label for="exampleInputEmail1">Who</label>
              <div class="input-group">
                <div class="input-group-addon"><i class="fa fa-fw"></i></div>
                <input type="text" id="exampleInputAmount" class="form-control" placeholder="">
              </div>
              <div class="form-group">
                <label for="">When</label>
                <div class="clearfix"></div>
                <div class="col-md-4">
                  <select>
                    <option>1982</option>
                  </select>
                </div>
                <div class="col-md-4">
                  <select>
                    <option>May</option>
                  </select>
                </div>
                <div class="col-md-4">
                  <select>
                    <option>13</option>
                  </select>
                </div>
                <div class="clearfix"></div>
              </div>
            </div>
            <div class="located">
              <label for="exampleInputEmail1">Where</label>
              <div class="input-group">
                <div class="input-group-addon"><i class="fa fa-fw"></i></div>
                <input type="text" placeholder="Optional" class="form-control" id="exampleInputAmount">
              </div>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Story</label>
              <div class="clearfix"></div>
              <textarea placeholder="Optional" rows="4"></textarea>
            </div>
          </div>
          <div class="col-md-6 chos_photos" >
           <!-- <button type="button" class="btn btn-default btn-lg btn-block pho_box">Choose From Photos...</button> -->
            <button type="button" class="btn btn-default btn-lg btn-block pho_box">Upload Photos...</button>
          </div>
          <div class="clearfix"></div>
        </form>
        <div class="box_bottom">
          <div class="publics col-md-3" style="float:right">
           <div data-target="#AddCompany" data-toggle="modal" class="btn3 btn-green">Save</div>
            <div class="btn3 btn-black">Cancel</div>
           
          </div>
          <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
      </div>
    </div>
  </div>
</div>

<!-----New Relationship------>
<div class="modal fade" id="AddCompanys_New_Relationship" tabindex="-1" role="dialog" aria-labelledby="myModalLabe" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div id="comperrormsg"></div>
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <div class="paper"><i class="fa fa-fw"></i></div>
        <h4 class="modal-title" id="myModalLabe">In a Relationship</h4>
        <div class="subheads">Today</div>
      </div>
      <div class="modal-body">
        <form name="company_form" id="company_form" action="<?php echo base_url(); ?>company/addcompanys" onsubmit="return validateCompanyForm();" enctype="multipart/form-data" method="post">
          <div class="col-md-6 New_Relationship" >
            <div class="form-group">
              <label for="exampleInputName2">Title</label>
              <input type="text" class="form-control" id="" placeholder="Optional" >
            </div>
            <div class="form-group">
              <label for="exampleInputName2">Relationship</label>
              <br>
              <div class="schools">
                <select>
                  <option>In a Relationship </option>
                </select>
              </div>
            </div>
            <div class="located">
              <label for="exampleInputEmail1">Location</label>
              <div class="input-group">
                <div class="input-group-addon"><i class="fa fa-fw"></i></div>
                <input type="text" placeholder="Optional" class="form-control" id="exampleInputAmount">
              </div>
            </div>
            <div class="located">
              <label for="exampleInputEmail1">Who</label>
              <div class="input-group">
                <div class="input-group-addon"><i class="fa fa-fw"></i></div>
                <input type="text" id="exampleInputAmount" class="form-control" placeholder="">
              </div>
              <div class="form-group">
                <label for="">When</label>
                <div class="clearfix"></div>
                <div class="col-md-4">
                  <select>
                    <option>1982</option>
                  </select>
                </div>
                <div class="col-md-4">
                  <select>
                    <option>May</option>
                  </select>
                </div>
                <div class="col-md-4">
                  <select>
                    <option>13</option>
                  </select>
                </div>
                <div class="clearfix"></div>
              </div>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Story</label>
              <div class="clearfix"></div>
              <textarea placeholder="Optional" rows="4"></textarea>
            </div>
          </div>
          <div class="col-md-6 chos_photos" >
           <!-- <button type="button" class="btn btn-default btn-lg btn-block pho_box">Choose From Photos...</button> -->
            <button type="button" class="btn btn-default btn-lg btn-block pho_box">Upload Photos...</button>
          </div>
          <div class="clearfix"></div>
        </form>
        <div class="box_bottom">
          <div class="publics col-md-3" style="float:right">
           <div data-target="#AddCompany" data-toggle="modal" class="btn3 btn-green">Save</div>
            <div class="btn3 btn-black">Cancel</div>
           
          </div>
          <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
      </div>
    </div>
  </div>
</div>

<!-----Engagement------>
<div class="modal fade" id="AddCompanys_Engagement" tabindex="-1" role="dialog" aria-labelledby="myModalLabe" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div id="comperrormsg"></div>
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <div class="paper"><i class="fa fa-heart-o"></i></div>
        <h4 class="modal-title" id="myModalLabe">Got Engaged</h4>
        <div class="subheads">Today</div>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url(); ?>Life_Events/add_engagement" enctype="multipart/form-data" method="post">
          <div class="col-md-6 Engagement" >
            <div class="form-group">
              <label for="exampleInputName2">Title</label>
              <input type="text" class="form-control" id="" placeholder="Optional"  name="engage_title">
            </div>
            <div class="located">
              <label for="exampleInputEmail1">Engaged To</label>
              <div class="input-group">
                <div class="input-group-addon"><i class="fa fa-fw"></i></div>
                <input type="text" id="exampleInputAmount" class="form-control" placeholder="" name="engage_with">
              </div>
              <div class="located">
                <label for="exampleInputEmail1">Location</label>
                <div class="input-group">
                  <div class="input-group-addon"><i class="fa fa-fw"></i></div>
                  <input type="text" placeholder="Optional" class="form-control" id="exampleInputAmount" name="engage_location">
                  <input type="hidden" name="engage_images" value="uploadengagementpics" />
                  <input type="hidden" name="engage_type" value="engagement" />
                </div>
              </div>
              <div class="form-group">
                <label for="">When</label>
                <div class="clearfix"></div>
                <div class="col-md-4">
                  <select name="engage_year">
                    <option>1982</option>
                  </select>
                </div>
                <div class="col-md-4">
                  <select name="engage_month">
                    <option>May</option>
                  </select>
                </div>
                <div class="col-md-4">
                  <select name="engage_date">
                    <option>13</option>
                  </select>
                </div>
                <div class="clearfix"></div>
              </div>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Story</label>
              <div class="clearfix"></div>
              <textarea placeholder="Optional" rows="4" name="engage_story"></textarea>
            </div>
            <div class="Works" style="display:none;">
              <input type="checkbox" class="outside">
              <span>Update relationship status</span> </div>
          </div>
          <div class="col-md-6 chos_photos" id="engagement_pics" >
           <!-- <button type="button" class="btn btn-default btn-lg btn-block pho_box">Choose From Photos...</button> -->
           <button type="button" class="btn btn-default btn-lg btn-block pho_box"  onclick="document.getElementById('uploadengagementpics').click()">Upload Photos...</button>
              
             <input class="btn btn-default btn-lg btn-block pho_box" type="file" name="uploadengagementpics[]" id="uploadengagementpics" multiple="multiple" style="display:none;" />
          </div>
             <div class="col-md-6 chos_photos" id="upload_engagement_pics"></div>
          <div class="clearfix"></div>
          <div class="box_bottom">
          <div class="publics col-md-3" style="float:right">
           <input type="submit" class="btn3 btn-green" value="Save" / >
            <div class="btn3 btn-black" data-dismiss="modal" >Cancel</div>
           
          </div>
          <div class="clearfix"></div>
        </div>
        </form>
        
        <div class="clearfix"></div>
      </div>
    </div>
  </div>
</div>

<!-----
iage------>
<div class="modal fade" id="AddCompanys_iage" tabindex="-1" role="dialog" aria-labelledby="myModalLabe" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div id="comperrormsg"></div>
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <div class="paper"><i class="fa fa-heart-o"></i></div>
        <h4 class="modal-title" id="myModalLabe">Got ied</h4>
        <div class="subheads">Today</div>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url(); ?>Life_Events/add_iage" enctype="multipart/form-data" method="post">
          <div class="col-md-6 iage" >
            <div class="form-group">
              <label for="exampleInputName2">Title</label>
              <input type="text" class="form-control" id="" placeholder="Optional" name="mrg_title">
            </div>
            <div class="located">
              <label for="exampleInputEmail1">ied To</label>
              <div class="input-group">
                <div class="input-group-addon"><i class="fa fa-fw"></i></div>
                <input type="text" id="exampleInputAmount" class="form-control" placeholder="" name="mrg_with">
              </div>
              <div class="located">
                <label for="exampleInputEmail1">Location</label>
                <div class="input-group">
                  <div class="input-group-addon"><i class="fa fa-fw"></i></div>
                  <input type="text" placeholder="Optional" class="form-control" id="exampleInputAmount" name="mrg_location">
                </div>
              </div>
              <div class="form-group">
                <label for="">When</label>
                <div class="clearfix"></div>
                <div class="col-md-4">
                  <select name="mrg_year">
                    <option>1982</option>
                  </select>
                </div>
                <div class="col-md-4">
                  <select name="mrg_month">
                    <option>May</option>
                  </select>
                </div>
                <div class="col-md-4">
                  <select name="mrg_date">
                    <option>13</option>
                  </select>
                </div>
                <div class="clearfix"></div>
              </div>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Story</label>
              <div class="clearfix"></div>
              <textarea placeholder="Optional" rows="4" name="mrg_story"></textarea>
               <input type="hidden" name="iage_images" value="uploadiagepics" />
               <input type="hidden" name="mrg_type" value="iage" />
            </div>
            <div class="Works" style="display:none;">
              <input type="checkbox" class="outside">
              
              <span>Update relationship status</span> </div>
          </div>
          <div class="col-md-6 chos_photos" id="iage_pics">
           <!-- <button type="button" class="btn btn-default btn-lg btn-block pho_box">Choose From Photos...</button> -->
             <button type="button" class="btn btn-default btn-lg btn-block pho_box"  onclick="document.getElementById('uploadiagepics').click()">Upload Photos...</button>
              
             <input class="btn btn-default btn-lg btn-block pho_box" type="file" name="uploadiagepics[]" id="uploadiagepics" multiple="multiple" style="display:none;" />   
          </div>
           <div class="col-md-6 chos_photos" id="upload_iage_pics"></div>
          <div class="clearfix"></div>
          <div class="box_bottom">
          <div class="publics col-md-3" style="float:right">
           <input type="submit" class="btn3 btn-green" value="Save" />
            <div class="btn3 btn-black" data-dismiss="modal">Cancel</div>
           
          </div>
          <div class="clearfix"></div>
        </div>
        </form>
        
        <div class="clearfix"></div>
      </div>
    </div>
  </div>
</div>

<!-----Anniversary------>
<div class="modal fade" id="AddCompanys_Anniversary" tabindex="-1" role="dialog" aria-labelledby="myModalLabe" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div id="comperrormsg"></div>
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <div class="paper"><i class="fa fa-gift"></i></div>
        <h4 class="modal-title" id="myModalLabe">Anniversary</h4>
        <div class="subheads"></div>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url(); ?>Life_Events/add_anniversary"  enctype="multipart/form-data" method="post">
          <div class="col-md-6 Anniversary" >
            <div class="form-group">
              <label for="exampleInputName2">Title</label>
              <input type="text" class="form-control" id="" placeholder="Optional" name="ann_title" >
            </div>
            <div class="located">
              <label for="exampleInputEmail1">Partner</label>
              <div class="input-group">
                <div class="input-group-addon"><i class="fa fa-fw"></i></div>
                <input type="text" id="exampleInputAmount" class="form-control" placeholder="" name="ann_partner" >
              </div>
              <div class="form-group">
                <label for="exampleInputName2">Relationship</label>
                <br>
                <div class="schools">
                  <select name="ann_relationship">
                    <option>Love</option>
                     <option>marriage</option>
                      <option>Friendship</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label for="exampleInputName2">Number of Years</label>
                <br>
                <div class="schools">
                  <select name="ann_no_of_years">
                    <option>1 </option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label for="">Celebration Date</label>
                <div class="clearfix"></div>
                <div class="col-md-4">
                  <select name="ann_year">
                    <option>1982</option>
                  </select>
                </div>
                <div class="col-md-4">
                  <select name="ann_month">
                    <option>May</option>
                  </select>
                </div>
                <div class="col-md-4">
                  <select name="ann_date">
                    <option>13</option>
                  </select>
                </div>
                <div class="clearfix"></div>
              </div>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Story</label>
              <div class="clearfix"></div>
              <textarea placeholder="Optional" rows="4" name="ann_story"></textarea>
              <input type="hidden" name="anniversary_images" value="uploadanniversarypics" />
               <input type="hidden" name="ann_type" value="anniversary" />
            </div>
          </div>
          <div class="col-md-6 chos_photos"  id="anniversary_pics">
           <!-- <button type="button" class="btn btn-default btn-lg btn-block pho_box">Choose From Photos...</button> -->
            <button type="button" class="btn btn-default btn-lg btn-block pho_box"  onclick="document.getElementById('uploadanniversarypics').click()">Upload Photos...</button>
              
             <input class="btn btn-default btn-lg btn-block pho_box" type="file" name="uploadanniversarypics[]" id="uploadanniversarypics" multiple="multiple" style="display:none;" />
          </div>
          <div class="col-md-6 chos_photos" id="upload_anniversary_pics"></div>
          <div class="clearfix"></div>
         
        <div class="box_bottom">
          <div class="publics col-md-3" style="float:right">
           <input type="submit" class="btn3 btn-green" value="Save" />
            <div class="btn3 btn-black" data-dismiss="modal">Cancel</div>
          
          </div>
          <div class="clearfix"></div>
        </div>
         </form>
        <div class="clearfix"></div>
      </div>
    </div>
  </div>
</div>

<!-----Expecting a baby------>
<div class="modal fade" id="AddCompanys_Expecting_baby" tabindex="-1" role="dialog" aria-labelledby="myModalLabe" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div id="comperrormsg"></div>
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <div class="paper"><i class="fa fa-fw"></i></div>
        <h4 class="modal-title" id="myModalLabe">Expecting a Baby</h4>
        <div class="subheads">Announced Today</div>
      </div>
      <div class="modal-body">
        <form name="company_form" id="company_form" action="<?php echo base_url(); ?>company/addcompanys" onsubmit="return validateCompanyForm();" enctype="multipart/form-data" method="post">
          <div class="col-md-6 Expecting_baby" >
            <div class="form-group">
              <label for="exampleInputName2">Title</label>
              <input type="text" class="form-control" id="" placeholder="Optional" >
            </div>
            <div class="form-group">
              <label for="exampleInputName2">Gender</label>
              <br>
              <div class="schools">
                <select>
                  <option>In </option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label for="exampleInputName2">Due Date</label>
              <br>
              <div class="work_botom"><a href="#"><i class="fa fa-plus"></i>&nbsp;Add Year</a></div>
            </div>
            <div class="form-group">
              <label for="">Shared the News On</label>
              <div class="clearfix"></div>
              <div class="col-md-4">
                <select>
                  <option>1982</option>
                </select>
              </div>
              <div class="col-md-4">
                <select>
                  <option>May</option>
                </select>
              </div>
              <div class="col-md-4">
                <select>
                  <option>13</option>
                </select>
              </div>
              <div class="clearfix"></div>
            </div>
            <div class="located">
              <label for="exampleInputEmail1">With</label>
              <div class="input-group">
                <div class="input-group-addon"><i class="fa fa-fw"></i></div>
                <input type="text" placeholder="" class="form-control" id="exampleInputAmount">
              </div>
            </div>
            <div class="located">
              <label for="exampleInputEmail1">Location</label>
              <div class="input-group">
                <div class="input-group-addon"><i class="fa fa-fw"></i></div>
                <input type="text" placeholder="Optional" class="form-control" id="exampleInputAmount">
              </div>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Story</label>
              <div class="clearfix"></div>
              <textarea rows="4" placeholder="Optional"></textarea>
            </div>
          </div>
          <div class="col-md-6 chos_photos" >
           <!-- <button type="button" class="btn btn-default btn-lg btn-block pho_box">Choose From Photos...</button> -->
            <button type="button" class="btn btn-default btn-lg btn-block pho_box">Upload Photos...</button>
          </div>
          <div class="clearfix"></div>
        </form>
        <div class="box_bottom">
          <div class="publics col-md-3" style="float:right">
           <div data-target="#AddCompany" data-toggle="modal" class="btn3 btn-green">Save</div>
            <div class="btn3 btn-black">Cancel</div>
           
          </div>
          <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
      </div>
    </div>
  </div>
</div>

<!-----New Child------>
<div class="modal fade" id="AddCompanys_New_Child" tabindex="-1" role="dialog" aria-labelledby="myModalLabe" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div id="comperrormsg"></div>
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <div class="paper"><i class="fa fa-fw"></i></div>
        <h4 class="modal-title" id="myModalLabe">Had a Child</h4>
        <div class="subheads"> Today</div>
      </div>
      <div class="modal-body">
        <form  action="<?php echo base_url(); ?>life_Events/add_child" enctype="multipart/form-data" method="post">
          <div class="col-md-6 New_Child" >
            <div class="form-group">
              <label for="exampleInputName2">Title</label>
              <input type="text" class="form-control" id="" placeholder="Optional"  name="ch_title">
            </div>
            <div class="form-group">
              <label for="exampleInputName2">Name of Child</label>
              <input type="text" class="form-control" id="" placeholder="Optional"  name="ch_name">
            </div>
            <div class="form-group">
              <label for="">Born On</label>
              <div class="clearfix"></div>
              <div class="col-md-4">
                <select name="ch_year">
                  <option>1982</option>
                </select>
              </div>
              <div class="col-md-4">
                <select name="ch_month">
                  <option>May</option>
                </select>
              </div>
              <div class="col-md-4">
                <select name="ch_date">
                  <option>13</option>
                </select>
              </div>
              <div class="clearfix"></div>
            </div>
            <div class="located">
              <label for="exampleInputEmail1">With</label>
              <div class="input-group">
                <div class="input-group-addon"><i class="fa fa-fw"></i></div>
                <input type="text" placeholder="" class="form-control" id="exampleInputAmount" name="ch_with">
              </div>
            </div>
            <div class="form-group">
              <label for="exampleInputName2">Gender</label>
              <br>
              <div class="schools">
                <select name="ch_gender">
                  <option>male </option>
                  <option>female</option>
                </select>
              </div>
            </div>
            <div class="located">
              <label for="exampleInputEmail1">Location</label>
              <div class="input-group">
                <div class="input-group-addon"><i class="fa fa-fw"></i></div>
                <input type="text" placeholder="Optional" class="form-control" id="exampleInputAmount" name="ch_location">
              </div>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Story</label>
              <div class="clearfix"></div>
              <textarea rows="4" placeholder="Optional" name="ch_story"></textarea>
              <input type="hidden" name="child_images" value="uploadchildpics" />
               <input type="hidden" name="ch_type" value="new_child" />
            </div>
          </div>
          <div class="col-md-6 chos_photos" id="child_pics">
           <!-- <button type="button" class="btn btn-default btn-lg btn-block pho_box">Choose From Photos...</button> -->
            <button type="button" class="btn btn-default btn-lg btn-block pho_box"  onclick="document.getElementById('uploadchildpics').click()">Upload Photos...</button>
              
             <input class="btn btn-default btn-lg btn-block pho_box" type="file" name="uploadchildpics[]" id="uploadchildpics" multiple="multiple" style="display:none;" />
          </div>
          <div class="col-md-6 chos_photos" id="upload_child_pics"></div>
          <div class="clearfix"></div>
       
        <div class="box_bottom">
          <div class="publics col-md-3" style="float:right">
           <input type="submit" class="btn3 btn-green" value="Save" />
            <div class="btn3 btn-black">Cancel</div>
           
          </div>
          <div class="clearfix"></div>
        </div>
         </form>
        <div class="clearfix"></div>
      </div>
    </div>
  </div>
</div>

<!-----New Family Member------>
<div class="modal fade" id="AddCompanys_Family_Member" tabindex="-1" role="dialog" aria-labelledby="myModalLabe" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div id="comperrormsg"></div>
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <div class="paper"><i class="fa fa-fw"></i></div>
        <h4 class="modal-title" id="myModalLabe">Added a Family Member</h4>
        <div class="subheads"> Today</div>
      </div>
      <div class="modal-body">
        <form name="company_form" id="company_form" action="<?php echo base_url(); ?>Life_Events/add_familymember" onsubmit="return validateCompanyForm();" enctype="multipart/form-data" method="post">
          <div class="col-md-6 Family_Member" >
            <div class="form-group">
              <label for="exampleInputName2">Title</label>
              <input type="text" class="form-control" id="" placeholder="Optional" >
            </div>
            <div class="located">
              <label for="exampleInputEmail1">Who</label>
              <div class="input-group">
                <div class="input-group-addon"><i class="fa fa-fw"></i></div>
                <input type="text" placeholder="" class="form-control" id="exampleInputAmount">
              </div>
            </div>
            <div class="form-group">
              <label for="exampleInputName2">Relationship</label>
              <br>
              <div class="schools">
                <select>
                  <option>In </option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label for="">When</label>
              <div class="clearfix"></div>
              <div class="col-md-4">
                <select>
                  <option>1982</option>
                </select>
              </div>
              <div class="col-md-4">
                <select>
                  <option>May</option>
                </select>
              </div>
              <div class="col-md-4">
                <select>
                  <option>13</option>
                </select>
              </div>
              <div class="clearfix"></div>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Story</label>
              <div class="clearfix"></div>
              <textarea rows="4" placeholder="Optional"></textarea>
            </div>
          </div>
          <div class="col-md-6 chos_photos" >
           <!-- <button type="button" class="btn btn-default btn-lg btn-block pho_box">Choose From Photos...</button> -->
            <button type="button" class="btn btn-default btn-lg btn-block pho_box">Upload Photos...</button>
          </div>
          <div class="clearfix"></div>
        </form>
        <div class="box_bottom">
          <div class="publics col-md-3" style="float:right">
           <div data-target="#AddCompany" data-toggle="modal" class="btn3 btn-green">Save</div>
            <div class="btn3 btn-black">Cancel</div>
           
          </div>
          <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
      </div>
    </div>
  </div>
</div>

<!-----New Pet------>
<div class="modal fade" id="AddCompanys_New_Pet" tabindex="-1" role="dialog" aria-labelledby="myModalLabe" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div id="comperrormsg"></div>
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <div class="paper"><i class="fa fa-fw"></i></div>
        <h4 class="modal-title" id="myModalLabe">Got a Pet</h4>
        <div class="subheads"> Today</div>
      </div>
      <div class="modal-body">
        <form name="company_form" id="company_form" action="<?php echo base_url(); ?>company/addcompanys" onsubmit="return validateCompanyForm();" enctype="multipart/form-data" method="post">
          <div class="col-md-6 New_Pet" >
            <div class="form-group">
              <label for="exampleInputName2">Title</label>
              <input type="text" class="form-control" id="" placeholder="Optional" >
            </div>
            <div class="form-group">
              <label for="exampleInputName2">Name of Pet</label>
              <input type="text" class="form-control" id="" placeholder="Optional" >
            </div>
            <div class="form-group">
              <label for="exampleInputName2">Title</label>
              <input type="text" class="form-control" id="" placeholder="Optional" >
            </div>
            <div class="form-group">
              <label for="exampleInputName2">Breed</label>
              <input type="text" class="form-control" id="" placeholder="Optional" >
            </div>
            <div class="form-group">
              <label for="exampleInputName2">Gender</label>
              <br>
              <div class="schools">
                <select>
                  <option> </option>
                </select>
              </div>
            </div>
            <div class="located">
              <label for="exampleInputEmail1">With</label>
              <div class="input-group">
                <div class="input-group-addon"><i class="fa fa-fw"></i></div>
                <input type="text" placeholder="" class="form-control" id="exampleInputAmount">
              </div>
            </div>
            <div class="located">
              <label for="exampleInputEmail1">Location</label>
              <div class="input-group">
                <div class="input-group-addon"><i class="fa fa-fw"></i></div>
                <input type="text" id="exampleInputAmount" class="form-control" placeholder="Optional">
              </div>
            </div>
            <div class="form-group">
              <label for="">When</label>
              <div class="clearfix"></div>
              <div class="col-md-4">
                <select>
                  <option>1982</option>
                </select>
              </div>
              <div class="col-md-4">
                <select>
                  <option>May</option>
                </select>
              </div>
              <div class="col-md-4">
                <select>
                  <option>13</option>
                </select>
              </div>
              <div class="clearfix"></div>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Story</label>
              <div class="clearfix"></div>
              <textarea rows="4" placeholder="Optional"></textarea>
            </div>
          </div>
          <div class="col-md-6 chos_photos" >
           <!-- <button type="button" class="btn btn-default btn-lg btn-block pho_box">Choose From Photos...</button> -->
            <button type="button" class="btn btn-default btn-lg btn-block pho_box">Upload Photos...</button>
          </div>
          <div class="clearfix"></div>
        </form>
        <div class="box_bottom">
          <div class="publics col-md-3" style="float:right">
           <div data-target="#AddCompany" data-toggle="modal" class="btn3 btn-green">Save</div>
            <div class="btn3 btn-black">Cancel</div>
           
          </div>
          <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
      </div>
    </div>
  </div>
</div>

<!-----End of Relationship------>
<div class="modal fade" id="AddCompanys_End_Relationship" tabindex="-1" role="dialog" aria-labelledby="myModalLabe" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div id="comperrormsg"></div>
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <div class="paper"><i class="fa fa-fw"></i></div>
        <h4 class="modal-title" id="myModalLabe">End of Relationship</h4>
        <div class="subheads"> Today</div>
      </div>
      <div class="modal-body">
        <form name="company_form" id="company_form" action="<?php echo base_url(); ?>company/addcompanys" onsubmit="return validateCompanyForm();" enctype="multipart/form-data" method="post">
          <div class="col-md-6 End_Relationship" >
            <div class="form-group">
              <label for="exampleInputName2">Title</label>
              <input type="text" class="form-control" id="" placeholder="Optional" >
            </div>
            <div class="form-group">
              <label for="exampleInputName2">Type</label>
              <br>
              <div class="schools">
                <select>
                  <option>Ended relationship </option>
                </select>
              </div>
            </div>
            <div class="located">
              <label for="exampleInputEmail1">Who</label>
              <div class="input-group">
                <div class="input-group-addon"><i class="fa fa-fw"></i></div>
                <input type="text" placeholder="" class="form-control" id="exampleInputAmount">
              </div>
            </div>
            <div class="located">
              <label for="exampleInputEmail1">Location</label>
              <div class="input-group">
                <div class="input-group-addon"><i class="fa fa-fw"></i></div>
                <input type="text" id="exampleInputAmount" class="form-control" placeholder="Optional">
              </div>
            </div>
            <div class="form-group">
              <label for="">When</label>
              <div class="clearfix"></div>
              <div class="col-md-4">
                <select>
                  <option>1982</option>
                </select>
              </div>
              <div class="col-md-4">
                <select>
                  <option>May</option>
                </select>
              </div>
              <div class="col-md-4">
                <select>
                  <option>13</option>
                </select>
              </div>
              <div class="clearfix"></div>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Story</label>
              <div class="clearfix"></div>
              <textarea rows="4" placeholder="Optional"></textarea>
            </div>
          </div>
          <div class="col-md-6 chos_photos" >
           <!-- <button type="button" class="btn btn-default btn-lg btn-block pho_box">Choose From Photos...</button> -->
            <button type="button" class="btn btn-default btn-lg btn-block pho_box">Upload Photos...</button>
          </div>
          <div class="clearfix"></div>
        </form>
        <div class="box_bottom">
          <div class="publics col-md-3" style="float:right">
           <div data-target="#AddCompany" data-toggle="modal" class="btn3 btn-green">Save</div>
            <div class="btn3 btn-black">Cancel</div>
           
          </div>
          <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
      </div>
    </div>
  </div>
</div>

<!-----Loss of a Loved One------>
<div class="modal fade" id="AddCompanys_Loss_One" tabindex="-1" role="dialog" aria-labelledby="myModalLabe" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div id="comperrormsg"></div>
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <div class="paper"><i class="fa fa-fw"></i></div>
        <h4 class="modal-title" id="myModalLabe">Lost a Loved One</h4>
        <div class="subheads"> Today</div>
      </div>
      <div class="modal-body">
        <form name="company_form" id="company_form" action="<?php echo base_url(); ?>company/addcompanys" onsubmit="return validateCompanyForm();" enctype="multipart/form-data" method="post">
          <div class="col-md-6 Loss_One" >
            <div class="form-group">
              <label for="exampleInputName2">Title</label>
              <input type="text" class="form-control" id="" placeholder="Optional" >
            </div>
            <div class="located">
              <label for="exampleInputEmail1">Name</label>
              <div class="input-group">
                <div class="input-group-addon"><i class="fa fa-fw"></i></div>
                <input type="text" placeholder="" class="form-control" id="exampleInputAmount">
              </div>
            </div>
            <div class="form-group">
              <label for="exampleInputName2">Relationship</label>
              <br>
              <div class="schools">
                <select>
                  <option>Loved One </option>
                </select>
              </div>
            </div>
            <div class="located">
              <label for="exampleInputEmail1">Location</label>
              <div class="input-group">
                <div class="input-group-addon"><i class="fa fa-fw"></i></div>
                <input type="text" id="exampleInputAmount" class="form-control" placeholder="Optional">
              </div>
            </div>
            <div class="form-group">
              <label for="">Passed On</label>
              <div class="clearfix"></div>
              <div class="col-md-4">
                <select>
                  <option>1982</option>
                </select>
              </div>
              <div class="col-md-4">
                <select>
                  <option>May</option>
                </select>
              </div>
              <div class="col-md-4">
                <select>
                  <option>13</option>
                </select>
              </div>
              <div class="clearfix"></div>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Story</label>
              <div class="clearfix"></div>
              <textarea rows="4" placeholder="Optional"></textarea>
            </div>
          </div>
          <div class="col-md-6 chos_photos" >
           <!-- <button type="button" class="btn btn-default btn-lg btn-block pho_box">Choose From Photos...</button> -->
            <button type="button" class="btn btn-default btn-lg btn-block pho_box">Upload Photos...</button>
          </div>
          <div class="clearfix"></div>
        </form>
        <div class="box_bottom">
          <div class="publics col-md-3" style="float:right">
           <div data-target="#AddCompany" data-toggle="modal" class="btn3 btn-green">Save</div>
            <div class="btn3 btn-black">Cancel</div>
           
          </div>
          <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
      </div>
    </div>
  </div>
</div>

<!-----Loss of a Loved One------>
<div class="modal fade" id="AddCompanys_Loss_One" tabindex="-1" role="dialog" aria-labelledby="myModalLabe" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div id="comperrormsg"></div>
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <div class="paper"><i class="fa fa-fw"></i></div>
        <h4 class="modal-title" id="myModalLabe">Lost a Loved One</h4>
        <div class="subheads"> Today</div>
      </div>
      <div class="modal-body">
        <form name="company_form" id="company_form" action="<?php echo base_url(); ?>company/addcompanys" onsubmit="return validateCompanyForm();" enctype="multipart/form-data" method="post">
          <div class="col-md-6 Loss_One" >
            <div class="form-group">
              <label for="exampleInputName2">Title</label>
              <input type="text" class="form-control" id="" placeholder="Optional" >
            </div>
            <div class="located">
              <label for="exampleInputEmail1">Name</label>
              <div class="input-group">
                <div class="input-group-addon"><i class="fa fa-fw"></i></div>
                <input type="text" placeholder="" class="form-control" id="exampleInputAmount">
              </div>
            </div>
            <div class="form-group">
              <label for="exampleInputName2">Relationship</label>
              <br>
              <div class="schools">
                <select>
                  <option>Loved One </option>
                </select>
              </div>
            </div>
            <div class="located">
              <label for="exampleInputEmail1">Location</label>
              <div class="input-group">
                <div class="input-group-addon"><i class="fa fa-fw"></i></div>
                <input type="text" id="exampleInputAmount" class="form-control" placeholder="Optional">
              </div>
            </div>
            <div class="form-group">
              <label for="">Passed On</label>
              <div class="clearfix"></div>
              <div class="col-md-4">
                <select>
                  <option>1982</option>
                </select>
              </div>
              <div class="col-md-4">
                <select>
                  <option>May</option>
                </select>
              </div>
              <div class="col-md-4">
                <select>
                  <option>13</option>
                </select>
              </div>
              <div class="clearfix"></div>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Story</label>
              <div class="clearfix"></div>
              <textarea rows="4" placeholder="Optional"></textarea>
            </div>
          </div>
          <div class="col-md-6 chos_photos" >
           <!-- <button type="button" class="btn btn-default btn-lg btn-block pho_box">Choose From Photos...</button> -->
            <button type="button" class="btn btn-default btn-lg btn-block pho_box">Upload Photos...</button>
          </div>
          <div class="clearfix"></div>
        </form>
        <div class="box_bottom">
          <div class="publics col-md-3" style="float:right">
           <div data-target="#AddCompany" data-toggle="modal" class="btn3 btn-green">Save</div>
            <div class="btn3 btn-black">Cancel</div>
           
          </div>
          <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
      </div>
    </div>
  </div>
</div>

<!-----Home & Leving tab3------>
<div class="modal fade" id="AddCompanys_moved" tabindex="-1" role="dialog" aria-labelledby="myModalLabe" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div id="comperrormsg"></div>
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <div class="paper"><i class="fa fa-fw"></i></div>
        <h4 class="modal-title" id="myModalLabe">Moved</h4>
        <div class="subheads"> Today</div>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url(); ?>Life_Events/add_movedlocation" enctype="multipart/form-data" method="post">
          <div class="col-md-6 moved" >
            <div class="form-group">
              <label for="exampleInputName2">Title</label>
              <input type="text" class="form-control" id="" placeholder="Optional"  name="mov_title">
            </div>
            <div class="located">
              <label for="exampleInputEmail1">Where To</label>
              <div class="input-group">
                <div class="input-group-addon"><i class="fa fa-fw"></i></div>
                <input type="text" id="exampleInputAmount" class="form-control" placeholder="" name="mov_where_to">
              </div>
            </div>
            <div class="form-group">
              <label for="exampleInputName2">Address</label>
              <input type="text" class="form-control" id="" placeholder="Optional"  name="mov_address">
            </div>
            <div class="form-group">
              <label for="exampleInputName2">From</label>
              <input type="text" class="form-control" id="" placeholder="Optional" name="mov_from" >
            </div>
            <div class="located">
              <label for="exampleInputEmail1">With</label>
              <div class="input-group">
                <div class="input-group-addon"><i class="fa fa-fw"></i></div>
                <input type="text" placeholder="" class="form-control" id="exampleInputAmount" name="mov_with">
              </div>
            </div>
            <div class="form-group">
              <label for="">When</label>
              <div class="clearfix"></div>
              <div class="col-md-4">
                <select name="mov_year">
                  <option>1982</option>
                </select>
              </div>
              <div class="col-md-4">
                <select name="mov_month">
                  <option>May</option>
                </select>
              </div>
              <div class="col-md-4">
                <select name="mov_date">
                  <option>13</option>
                </select>
              </div>
              <div class="clearfix"></div>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Story</label>
              <div class="clearfix"></div>
              <textarea rows="4" placeholder="Optional" name="mov_story"></textarea>
               <input type="hidden" name="moved_images" value="uploadmovedphotos" />
                <input type="hidden" name="mov_type" value="moved" />
            </div>
          </div>
          <div class="col-md-6 chos_photos" id="moved_pics" >
           <!-- <button type="button" class="btn btn-default btn-lg btn-block pho_box">Choose From Photos...</button> -->
            <button type="button" class="btn btn-default btn-lg btn-block pho_box" onclick="document.getElementById('uploadmovedphotos').click()">Upload Photos...</button>
             <input class="btn btn-default btn-lg btn-block pho_box" type="file" name="uploadmovedphotos[]" id="uploadmovedphotos" multiple="multiple" style="display:none;" />
          </div>
         <div class="col-md-6 chos_photos" id="upload_moved_photos"></div>
          <div class="clearfix"></div>
          <div class="box_bottom">
          <div class="publics col-md-3" style="float:right">
           <input type="submit" class="btn3 btn-green" value="Save" />
            <div class="btn3 btn-black" data-dismiss="modal">Cancel</div>
           
          </div>
          <div class="clearfix"></div>
        </div>
        </form>
        
        <div class="clearfix"></div>
      </div>
    </div>
  </div>
</div>

<!-----Bought a home------>
<div class="modal fade" id="AddCompanys_Bought_House" tabindex="-1" role="dialog" aria-labelledby="myModalLabe" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div id="comperrormsg"></div>
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <div class="paper"><i class="fa fa-fw"></i></div>
        <h4 class="modal-title" id="myModalLabe">Bought a House</h4>
        <div class="subheads"> Today</div>
      </div>
      <div class="modal-body">
        <form  action="<?php echo base_url(); ?>Life_Events/add_bought_home" enctype="multipart/form-data" method="post">
          <div class="col-md-6 Bought_House" >
            <div class="form-group">
              <label for="exampleInputName2">Title</label>
              <input type="text" class="form-control" id="" placeholder="Optional" name="bt_hme_title" >
            </div>
            <div class="form-group">
              <label for="exampleInputName2">Type</label>
              <br>
              <div class="schools">
                <select name="bt_hme_type">
                  <option>House </option>
                </select>
              </div>
            </div>
            <div class="located">
              <label for="exampleInputEmail1">Location</label>
              <div class="input-group">
                <div class="input-group-addon"><i class="fa fa-fw"></i></div>
                <input type="text" id="exampleInputAmount" class="form-control" placeholder="Optional" name="bt_hme_location">
              </div>
            </div>
            <div class="located">
              <label for="exampleInputEmail1">With</label>
              <div class="input-group">
                <div class="input-group-addon"><i class="fa fa-fw"></i></div>
                <input type="text" placeholder="" class="form-control" id="exampleInputAmount" name="bt_hme_with">
              </div>
            </div>
            <div class="form-group">
              <label for="">When</label>
              <div class="clearfix"></div>
              <div class="col-md-4">
                <select name="bt_hme_year">
                  <option>1982</option>
                </select>
              </div>
              <div class="col-md-4">
                <select name="bt_hme_month">
                  <option>May</option>
                </select>
              </div>
              <div class="col-md-4">
                <select name="bt_hme_date">
                  <option>13</option>
                </select>
              </div>
              <div class="clearfix"></div>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Story</label>
              <div class="clearfix"></div>
              <textarea rows="4" placeholder="Optional" name="bt_hme_story"></textarea>
               <input type="hidden" name="bought_home_images" value="uploadboughthomephotos" />
               <input type="hidden" name="bt_hme_type" value="bought_home" />
            </div>
          </div>
          <div class="col-md-6 chos_photos" id="bought_home_pics" >
           <!-- <button type="button" class="btn btn-default btn-lg btn-block pho_box">Choose From Photos...</button> -->
          <button type="button" class="btn btn-default btn-lg btn-block pho_box" onclick="document.getElementById('uploadboughthomephotos').click()">Upload Photos...</button>
             <input class="btn btn-default btn-lg btn-block pho_box" type="file" name="uploadboughthomephotos[]" id="uploadboughthomephotos" multiple="multiple" style="display:none;" />
          </div>
         <div class="col-md-6 chos_photos" id="upload_bought_home_photos"></div>
          <div class="clearfix"></div>
          <div class="box_bottom">
          <div class="publics col-md-3" style="float:right">
           <input type="submit" class="btn3 btn-green" value="Save" />
            <div class="btn3 btn-black" data-dismiss="modal">Cancel</div>
           
          </div>
          <div class="clearfix"></div>
        </div>
        </form>
        
        <div class="clearfix"></div>
      </div>
    </div>
  </div>
</div>

<!-----Home_improvement----->
<div class="modal fade" id="AddCompanys_Home_improvement" tabindex="-1" role="dialog" aria-labelledby="myModalLabe" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div id="comperrormsg"></div>
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <div class="paper"><i class="fa fa-fw"></i></div>
        <h4 class="modal-title" id="myModalLabe">Made a Home Improvement</h4>
        <div class="subheads"> Today</div>
      </div>
      <div class="modal-body">
        <form name="company_form" id="company_form" action="<?php echo base_url(); ?>company/addcompanys" onsubmit="return validateCompanyForm();" enctype="multipart/form-data" method="post">
          <div class="col-md-6 Home_improvement" >
            <div class="form-group">
              <label for="exampleInputName2">Title</label>
              <input type="text" class="form-control" id="" placeholder="Optional" >
            </div>
            <div class="form-group">
              <label for="exampleInputName2">Improvement Made</label>
              <input type="text" class="form-control" id="" placeholder="Optional" >
            </div>
            <div class="located">
              <label for="exampleInputEmail1">Location</label>
              <div class="input-group">
                <div class="input-group-addon"><i class="fa fa-fw"></i></div>
                <input type="text" id="exampleInputAmount" class="form-control" placeholder="Optional">
              </div>
            </div>
            <div class="located">
              <label for="exampleInputEmail1">With</label>
              <div class="input-group">
                <div class="input-group-addon"><i class="fa fa-fw"></i></div>
                <input type="text" placeholder="" class="form-control" id="exampleInputAmount">
              </div>
            </div>
            <div class="form-group">
              <label for="">When</label>
              <div class="clearfix"></div>
              <div class="col-md-4">
                <select>
                  <option>1982</option>
                </select>
              </div>
              <div class="col-md-4">
                <select>
                  <option>May</option>
                </select>
              </div>
              <div class="col-md-4">
                <select>
                  <option>13</option>
                </select>
              </div>
              <div class="clearfix"></div>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Story</label>
              <div class="clearfix"></div>
              <textarea rows="4" placeholder="Optional"></textarea>
            </div>
          </div>
          <div class="col-md-6 chos_photos" >
           <!-- <button type="button" class="btn btn-default btn-lg btn-block pho_box">Choose From Photos...</button> -->
            <button type="button" class="btn btn-default btn-lg btn-block pho_box">Upload Photos...</button>
          </div>
          <div class="clearfix"></div>
        </form>
        <div class="box_bottom">
          <div class="publics col-md-3" style="float:right">
           <div data-target="#AddCompany" data-toggle="modal" class="btn3 btn-green">Save</div>
            <div class="btn3 btn-black">Cancel</div>
           
          </div>
          <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
      </div>
    </div>
  </div>
</div>

<!-----New Roommate----->
<div class="modal fade" id="AddCompanys_New_Roommate" tabindex="-1" role="dialog" aria-labelledby="myModalLabe" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div id="comperrormsg"></div>
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <div class="paper"><i class="fa fa-fw"></i></div>
        <h4 class="modal-title" id="myModalLabe">Got a Roommate</h4>
        <div class="subheads"> Today</div>
      </div>
      <div class="modal-body">
        <form name="company_form" id="company_form" action="<?php echo base_url(); ?>company/addcompanys" onsubmit="return validateCompanyForm();" enctype="multipart/form-data" method="post">
          <div class="col-md-6 New_Roommate" >
            <div class="form-group">
              <label for="exampleInputName2">Title</label>
              <input type="text" class="form-control" id="" placeholder="Optional" >
            </div>
            <div class="located">
              <label for="exampleInputEmail1">Roommate</label>
              <div class="input-group">
                <div class="input-group-addon"><i class="fa fa-fw"></i></div>
                <input type="text" placeholder="" class="form-control" id="exampleInputAmount">
              </div>
            </div>
            <div class="located">
              <label for="exampleInputEmail1">Location</label>
              <div class="input-group">
                <div class="input-group-addon"><i class="fa fa-fw"></i></div>
                <input type="text" id="exampleInputAmount" class="form-control" placeholder="Optional">
              </div>
            </div>
            <div class="form-group">
              <label for="">From</label>
              <div class="clearfix"></div>
              <div class="col-md-4">
                <select>
                  <option>1982</option>
                </select>
              </div>
              <div class="col-md-4">
                <select>
                  <option>May</option>
                </select>
              </div>
              <div class="col-md-4">
                <select>
                  <option>13</option>
                </select>
              </div>
              <div class="clearfix"></div>
            </div>
            <div class="form-group">
              <label for="exampleInputName2">To</label>
              <br>
              <div class="work_botom"><a href="#"><i class="fa fa-plus"></i>&nbsp;Add Year</a></div>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Story</label>
              <div class="clearfix"></div>
              <textarea rows="4" placeholder="Optional"></textarea>
            </div>
          </div>
          <div class="col-md-6 chos_photos" >
           <!-- <button type="button" class="btn btn-default btn-lg btn-block pho_box">Choose From Photos...</button> -->
            <button type="button" class="btn btn-default btn-lg btn-block pho_box">Upload Photos...</button>
          </div>
          <div class="clearfix"></div>
        </form>
        <div class="box_bottom">
          <div class="publics col-md-3" style="float:right">
           <div data-target="#AddCompany" data-toggle="modal" class="btn3 btn-green">Save</div>
            <div class="btn3 btn-black">Cancel</div>
           
          </div>
          <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
      </div>
    </div>
  </div>
</div>

<!-----New vehicle----->
<div class="modal fade" id="AddCompanys_New_vehicle" tabindex="-1" role="dialog" aria-labelledby="myModalLabe" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div id="comperrormsg"></div>
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <div class="paper"><i class="fa fa-fw"></i></div>
        <h4 class="modal-title" id="myModalLabe">Got a Car</h4>
        <div class="subheads"> Today</div>
        <div class="subheads">Model Year: 2015.</div>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url(); ?>Life_Events/add_newvehicle" enctype="multipart/form-data" method="post">
          <div class="col-md-6 New_vehicle" >
            <div class="form-group">
              <label for="exampleInputName2">Title</label>
              <input type="text" class="form-control" id="" placeholder="Optional" name="n_v_title" >
            </div>
            <div class="form-group">
              <label for="exampleInputName2">Type</label>
              <br>
              <div class="schools">
                <select name="n_v_type">
                  <option>Car </option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label for="exampleInputName2">Make/Model</label>
              <input type="text" class="form-control" id="" placeholder="Optional"  name="n_v_model">
            </div>
            <div class="form-group">
              <label for="exampleInputName2">Model Year</label>
              <br>
              <div class="schools">
                <select name="n_v_model_year">
                  <option>2015 </option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label for="">When</label>
              <div class="clearfix"></div>
              <div class="col-md-4">
                <select name="n_v_year">
                  <option>1982</option>
                </select>
              </div>
              <div class="col-md-4">
                <select name="n_v_month">
                  <option>May</option>
                </select>
              </div>
              <div class="col-md-4">
                <select name="n_v_date">
                  <option>13</option>
                </select>
              </div>
              <div class="clearfix"></div>
            </div>
            <div class="located">
              <label for="exampleInputEmail1">With</label>
              <div class="input-group">
                <div class="input-group-addon"><i class="fa fa-fw"></i></div>
                <input type="text" id="exampleInputAmount" class="form-control" placeholder="" name="n_v_with">
              </div>
            </div>
            <div class="located">
              <label for="exampleInputEmail1">Location</label>
              <div class="input-group">
                <div class="input-group-addon"><i class="fa fa-fw"></i></div>
                <input type="text" placeholder="Optional" class="form-control" id="exampleInputAmount" name="n_v_location">
              </div>
            </div>
            
            <div class="form-group">

              <label for="exampleInputEmail1">Story</label>
              <div class="clearfix"></div>
              <textarea rows="4" placeholder="Optional" name="n_v_story"></textarea>
               <input type="hidden" name="n_v_images" value="uploadvehiclephotos" />
               <input type="hidden" name="n_v_type" value="new_vehicle" />
            </div>
          </div>
          <div class="col-md-6 chos_photos" id="vehicle_pics">
           <!-- <button type="button" class="btn btn-default btn-lg btn-block pho_box">Choose From Photos...</button> -->
             <button type="button" class="btn btn-default btn-lg btn-block pho_box" onclick="document.getElementById('uploadvehiclephotos').click()">Upload Photos...</button>
             <input class="btn btn-default btn-lg btn-block pho_box" type="file" name="uploadvehiclephotos[]" id="uploadvehiclephotos" multiple="multiple" style="display:none;" />
          </div>
         <div class="col-md-6 chos_photos" id="uploadPhotosnewvehicle"></div>
          <div class="clearfix"></div>
          <div class="box_bottom">
          <div class="publics col-md-3" style="float:right">
           <input type="submit" class="btn3 btn-green" value="Save" />
            <div class="btn3 btn-black" data-dismiss="modal">Cancel</div>
           
          </div>
          <div class="clearfix"></div>
        </div>
        </form>
        
        <div class="clearfix"></div>
      </div>
    </div>
  </div>
</div>

<!-----Health & Wellness----->
<div class="modal fade" id="AddCompanys_Health_Wellness" tabindex="-1" role="dialog" aria-labelledby="myModalLabe" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div id="comperrormsg"></div>
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <div class="paper"> <i class="fa fa-heartbeat"></i></div>
        <h4 class="modal-title" id="myModalLabe">Registered as an Organ Donor</h4>
        <div class="subheads">May 27, 2015</div>
             </div>
      <div class="modal-body">
        <form  action="<?php echo base_url(); ?>Life_Events/add_organ_donor" enctype="multipart/form-data" method="post">
          <div class="col-md-6 Health_Wellness" >
            <div class="form-group">
              <label for="exampleInputName2">Title</label>
              <input type="text" class="form-control" id="" placeholder="Optional" name="o_d_title" >
            </div>
            
            <div class="located">
              <label for="exampleInputEmail1">Location</label>
              <div class="input-group">
                <div class="input-group-addon"><i class="fa fa-fw"></i></div>
                <input type="text" id="exampleInputAmount" class="form-control" placeholder="Optional" name="o_d_location">
              </div>
            </div>
            
            <div class="form-group">
              <label for="">When</label>
              <div class="clearfix"></div>
              <div class="col-md-4">
                <select  name="o_d_year">
                  <option>1982</option>
                </select>
              </div>
              <div class="col-md-4">
                <select name="o_d_month">
                  <option>May</option>
                </select>
              </div>
              <div class="col-md-4">
                <select name="o_d_date">
                  <option>13</option>
                </select>
              </div>
              <div class="clearfix"></div>
            </div>
            
            <div class="form-group">
              <label for="exampleInputEmail1">Story</label>
              <div class="clearfix"></div>
              <textarea rows="4" placeholder="Optional" name="o_d_story"></textarea>
              <input type="hidden" name="o_d_type" value="organ_donor" />
            </div>
        
            
          </div>
          <div class="col-md-6 chos_photos" >
        <p>If you are not officially registered as an organ donor, it is easy to <a href="#">sign up with the appropriate registry.</a> </p>
        <p><a href="#">Learn More</a></p>
          </div>
          <div class="clearfix"></div>
          <div class="box_bottom">
          <div class="publics col-md-3" style="float:right">
           <input type="submit" class="btn3 btn-green" value="Save" />
            <div  data-dismiss="modal" class="btn3 btn-black">Cancel</div>
           
          </div>
          <div class="clearfix"></div>
        </div>
        </form>
        
        <div class="clearfix"></div>
      </div>
    </div>
  </div>
</div>

<!-----Overcame an illness----->
<div class="modal fade" id="AddCompanys_Overcame_Illness" tabindex="-1" role="dialog" aria-labelledby="myModalLabe" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div id="comperrormsg"></div>
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <div class="paper"><i class="fa fa-fw"></i></div>
        <h4 class="modal-title" id="myModalLabe">Overcame an Illness</h4>
            <div class="subheads">May 27, 2015</div>
      </div>
      <div class="modal-body">
        <form  action="<?php echo base_url(); ?>company/addcompanys" onsubmit="return validateCompanyForm();" enctype="multipart/form-data" method="post">
          <div class="col-md-6 Overcame_Illness" >
            <div class="form-group">
              <label for="exampleInputName2">Title</label>
              <input type="text" class="form-control" id="" placeholder="Optional" >
            </div>
            
            <div class="form-group">
              <label for="exampleInputName2">Illness</label>
              <input type="text" class="form-control" id="" placeholder="Optional" >
            </div>
            
            <div class="located">
              <label for="exampleInputEmail1">Location</label>
              <div class="input-group">
                <div class="input-group-addon"><i class="fa fa-fw"></i></div>
                <input type="text" placeholder="Optional" class="form-control" id="exampleInputAmount">
              </div>
            </div>
            
            <div class="located">
              <label for="exampleInputEmail1">With</label>
              <div class="input-group">
                <div class="input-group-addon"><i class="fa fa-fw"></i></div>
                <input type="text" id="exampleInputAmount" class="form-control" placeholder="">
              </div>
            </div>
            
            <div class="form-group">
              <label for="">When</label>
              <div class="clearfix"></div>
              <div class="col-md-4">
                <select>
                  <option>1982</option>
                </select>
              </div>
              <div class="col-md-4">
                <select>
                  <option>May</option>
                </select>
              </div>
              <div class="col-md-4">
                <select>
                  <option>13</option>
                </select>
              </div>
              <div class="clearfix"></div>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Story</label>
              <div class="clearfix"></div>
              <textarea rows="4" placeholder="Optional"></textarea>
            </div>
            
            
            
            
            
          </div>
          <div class="col-md-6 chos_photos" >
           <!-- <button type="button" class="btn btn-default btn-lg btn-block pho_box">Choose From Photos...</button> -->
            <button type="button" class="btn btn-default btn-lg btn-block pho_box">Upload Photos...</button>
          </div>
          <div class="clearfix"></div>
        </form>
        <div class="box_bottom">
          <div class="publics col-md-3" style="float:right">
           <div data-target="#AddCompany" data-toggle="modal" class="btn3 btn-green">Save</div>
            <div class="btn3 btn-black">Cancel</div>
           
          </div>
          <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
      </div>
    </div>
  </div>
</div>

<!-----Quit a Habit---->
<div class="modal fade" id="AddCompanys_Quit_Habit" tabindex="-1" role="dialog" aria-labelledby="myModalLabe" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div id="comperrormsg"></div>
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <div class="paper"><i class="fa fa-ban"></i></div>
        <h4 class="modal-title" id="myModalLabe">Quit </h4>
            <div class="subheads">May 27, 2015</div>
      </div>
      <div class="modal-body">
        <form  action="<?php echo base_url(); ?>Life_Events/add_quit_habit" enctype="multipart/form-data" method="post">
          <div class="col-md-6 Quit_Habit" >
            <div class="form-group">
              <label for="exampleInputName2">Title</label>
              <input type="text" class="form-control" id="" placeholder="Optional" name="q_h_title" >
            </div>
            <div class="form-group">
              <label for="exampleInputName2">Habit</label>
              <br>
              <div class="schools">
                <select name="q_h_habit">
                  <option>Other</option>
                </select>
              </div>
            </div>
            <div class="form-group">
             
              <input type="text" class="form-control" id="" placeholder="" >
            </div>
            <div class="located">
              <label for="exampleInputEmail1">Location</label>
              <div class="input-group">
                <div class="input-group-addon"><i class="fa fa-fw"></i></div>
                <input type="text" placeholder="Optional" class="form-control" id="exampleInputAmount" name="q_h_location">
              </div>
            </div>
            
            <div class="located">
              <label for="exampleInputEmail1">With</label>
              <div class="input-group">
                <div class="input-group-addon"><i class="fa fa-fw"></i></div>
                <input type="text" id="exampleInputAmount" class="form-control" placeholder="" name="q_h_with">
              </div>
            </div>
            
            <div class="form-group">
              <label for="">When</label>
              <div class="clearfix"></div>
              <div class="col-md-4">
                <select name="q_h_year">
                  <option>1982</option>
                </select>
              </div>
              <div class="col-md-4">
                <select name="q_h_month">
                  <option>May</option>
                </select>
              </div>
              <div class="col-md-4">
                <select name="q_h_date">
                  <option>13</option>
                </select>
              </div>
              <div class="clearfix"></div>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Story</label>
              <div class="clearfix"></div>
              <textarea rows="4" placeholder="Optional" name="q_h_story"></textarea>
                <input type="hidden" name="quit_habit_images" value="uploadquithabitpics" />
                 <input type="hidden" name="q_h_type" value="quit_habit" />
            </div>
            
            
            
            
            
          </div>
          <div class="col-md-6 chos_photos" id="quit_habit_pics" >
           <!-- <button type="button" class="btn btn-default btn-lg btn-block pho_box">Choose From Photos...</button> -->
           <button type="button" class="btn btn-default btn-lg btn-block pho_box"  onclick="document.getElementById('uploadquithabitpics').click()">Upload Photos...</button>
              
             <input class="btn btn-default btn-lg btn-block pho_box" type="file" name="uploadquithabitpics[]" id="uploadquithabitpics" multiple="multiple" style="display:none;" />  <input type="hidden" name="quit_habit_images" value="uploadquithabitpics" />
          </div>
           <div class="col-md-6 chos_photos" id="upload_quit_habit_pics"></div>
          <div class="clearfix"></div>
          <div class="box_bottom">
          <div class="publics col-md-3" style="float:right">
           <input type="submit" class="btn3 btn-green" value="Save" />
            <div data-dismiss="modal" class="btn3 btn-black">Cancel</div>
           
          </div>
          <div class="clearfix"></div>
        </div>
        </form>
        
        <div class="clearfix"></div>
      </div>
    </div>
  </div>
</div>

<!-----New_Habits---->
<div class="modal fade" id="AddCompanys_New_Habits" tabindex="-1" role="dialog" aria-labelledby="myModalLabe" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div id="comperrormsg"></div>
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <div class="paper"><i class="fa fa-paperclip"></i></div>
        <h4 class="modal-title" id="myModalLabe">Became a Vegetarian</h4>
            <div class="subheads">May 27, 2015</div>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url(); ?>Life_Events/add_food_habit" enctype="multipart/form-data" method="post">
          <div class="col-md-6 New_Habits" >
            <div class="form-group">
              <label for="exampleInputName2">Title</label>
              <input type="text" class="form-control" id="" placeholder="Optional"  name="n_h_title">
            </div>
            <div class="form-group">
              <label for="exampleInputName2">Became</label>
              <br>
              <div class="schools">
                <select name="n_h_habit">
                  <option>Vegetarian</option>
                </select>
              </div>
            </div>
            
            <div class="located">
              <label for="exampleInputEmail1">Location</label>
              <div class="input-group">
                <div class="input-group-addon"><i class="fa fa-fw"></i></div>
                <input type="text" placeholder="Optional" class="form-control" id="exampleInputAmount" name="n_h_location">
              </div>
            </div>
            
            <div class="located">
              <label for="exampleInputEmail1">With</label>
              <div class="input-group">
                <div class="input-group-addon"><i class="fa fa-fw"></i></div>
                <input type="text" id="exampleInputAmount" class="form-control" placeholder=""  name="n_h_with">
              </div>
            </div>
            
            <div class="form-group">
              <label for="">When</label>
              <div class="clearfix"></div>
              <div class="col-md-4">
                <select name="n_h_year">
                  <option>1982</option>
                </select>
              </div>
              <div class="col-md-4">
                <select name="n_h_month">
                  <option>May</option>
                </select>
              </div>
              <div class="col-md-4">
                <select name="n_h_date">
                  <option>13</option>
                </select>
              </div>
              <div class="clearfix"></div>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Story</label>
              <div class="clearfix"></div>
              <textarea rows="4" placeholder="Optional" name="n_h_story"></textarea>
               <input type="hidden" name="new_food_habit_images" value="uploadnewhabitpics" />
               <input type="hidden" name="n_h_type" value="new_food_habit" />
            </div>
          </div>
          <div class="col-md-6 chos_photos"  id="new_habit_pics">
           <!-- <button type="button" class="btn btn-default btn-lg btn-block pho_box">Choose From Photos...</button> -->
            <button type="button" class="btn btn-default btn-lg btn-block pho_box"  onclick="document.getElementById('uploadnewhabitpics').click()">Upload Photos...</button>
              
             <input class="btn btn-default btn-lg btn-block pho_box" type="file" name="uploadnewhabitpics[]" id="uploadnewhabitpics" multiple="multiple" style="display:none;" /> 
          </div>
           <div class="col-md-6 chos_photos" id="upload_new_habit_pics"></div>
          <div class="clearfix"></div>
          <div class="box_bottom">
          <div class="publics col-md-3" style="float:right">
           <input type="submit" class="btn3 btn-green" value="Save">
            <div class="btn3 btn-black" data-dismiss="modal">Cancel</div>
           
          </div>
          <div class="clearfix"></div>
        </div>
        </form>
        
        <div class="clearfix"></div>
      </div>
    </div>
  </div>
</div>

<!-----Weight Loss---->
<div class="modal fade" id="AddCompanys_Weight_Loss" tabindex="-1" role="dialog" aria-labelledby="myModalLabe" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div id="comperrormsg"></div>
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <div class="paper"><i class="fa fa-fw"></i></div>
        <h4 class="modal-title" id="myModalLabe">Lost Weight</h4>
            <div class="subheads">May 27, 2015</div>
      </div>
      <div class="modal-body">
        <form name="company_form" id="company_form" action="<?php echo base_url(); ?>company/addcompanys" onsubmit="return validateCompanyForm();" enctype="multipart/form-data" method="post">
          <div class="col-md-6 Weight_Loss" >
            <div class="form-group">
              <label for="exampleInputName2">Title</label>
              <input type="text" class="form-control" id="" placeholder="Optional" >
            </div>
            <div class="form-group">
              <label for="exampleInputName2">Amount</label>
              <input type="text" class="form-control" id="" placeholder="Optional" >
            </div>
            <div class="form-group">
              <label for="exampleInputName2">Units</label>
              <br>
              <div class="schools">
                <select>
                  <option>Pounds</option>
                </select>
              </div>
            </div>
            
            <div class="located">
              <label for="exampleInputEmail1">Location</label>
              <div class="input-group">
                <div class="input-group-addon"><i class="fa fa-fw"></i></div>
                <input type="text" placeholder="Optional" class="form-control" id="exampleInputAmount">
              </div>
            </div>
            
            <div class="located">
              <label for="exampleInputEmail1">With</label>
              <div class="input-group">
                <div class="input-group-addon"><i class="fa fa-fw"></i></div>
                <input type="text" id="exampleInputAmount" class="form-control" placeholder="">
              </div>
            </div>
            
            <div class="form-group">
              <label for="">When</label>
              <div class="clearfix"></div>
              <div class="col-md-4">
                <select>
                  <option>1982</option>
                </select>
              </div>
              <div class="col-md-4">
                <select>
                  <option>May</option>
                </select>
              </div>
              <div class="col-md-4">
                <select>
                  <option>13</option>
                </select>
              </div>
              <div class="clearfix"></div>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Story</label>
              <div class="clearfix"></div>
              <textarea rows="4" placeholder="Optional"></textarea>
            </div>
          </div>
          <div class="col-md-6 chos_photos" >
           <!-- <button type="button" class="btn btn-default btn-lg btn-block pho_box">Choose From Photos...</button> -->
            <button type="button" class="btn btn-default btn-lg btn-block pho_box">Upload Photos...</button>
          </div>
          <div class="clearfix"></div>
        </form>
        <div class="box_bottom">
          <div class="publics col-md-3" style="float:right">
           <div data-target="#AddCompany" data-toggle="modal" class="btn3 btn-green">Save</div>
            <div class="btn3 btn-black">Cancel</div>
           
          </div>
          <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
      </div>
    </div>
  </div>
</div>

<!----Glasses--->
<div class="modal fade" id="AddCompanys_Glasses_Contacts" tabindex="-1" role="dialog" aria-labelledby="myModalLabe" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div id="comperrormsg"></div>
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <div class="paper"><i class='fa  fa-search'></i></div>
        <h4 class="modal-title" id="myModalLabe">Got Glasses</h4>
            <div class="subheads">Today</div>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url(); ?>Life_Events/add_glasses" enctype="multipart/form-data" method="post">
          <div class="col-md-6 Glasses_Contacts" >
            <div class="form-group">
              <label for="exampleInputName2">Title</label>
              <input type="text" class="form-control" id="" placeholder="Optional"  name="glas_title">
            </div>
            
            <div class="form-group">
              <label for="exampleInputName2">Type</label>
              <br>
              <div class="schools">
                <select name="glas_type"> 
                  <option>glasses</option>
                </select>
              </div>
            </div>
            
            <div class="located">
              <label for="exampleInputEmail1">Location</label>
              <div class="input-group">
                <div class="input-group-addon"><i class="fa fa-fw"></i></div>
                <input type="text" placeholder="Optional" class="form-control" id="exampleInputAmount" name="glas_location">
              </div>
            </div>
            
            <div class="located">
              <label for="exampleInputEmail1">With</label>
              <div class="input-group">
                <div class="input-group-addon"><i class="fa fa-fw"></i></div>
                <input type="text" id="exampleInputAmount" class="form-control" placeholder="" name="glas_with">
              </div>
            </div>
            
            <div class="form-group">
              <label for="">When</label>
              <div class="clearfix"></div>
              <div class="col-md-4">
                <select name="glas_year">
                  <option>1982</option>
                </select>
              </div>
              <div class="col-md-4">
                <select name="glas_month">
                  <option>May</option>
                </select>
              </div>
              <div class="col-md-4">
                <select name="glas_date">
                  <option>13</option>
                </select>
              </div>
              <div class="clearfix"></div>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Story</label>
              <div class="clearfix"></div>
              <textarea rows="4" placeholder="Optional" name="glas_story"></textarea>
               <input type="hidden" name="new_glasses_images" value="uploadnewglasespics" />
                 <input type="hidden" name="glas_type" value="new_glasses" />
            </div>
          </div>
          <div class="col-md-6 chos_photos"  id="new_glasses_pics">
           <!-- <button type="button" class="btn btn-default btn-lg btn-block pho_box">Choose From Photos...</button> -->
           <button type="button" class="btn btn-default btn-lg btn-block pho_box"  onclick="document.getElementById('uploadnewglasespics').click()">Upload Photos...</button>
              
             <input class="btn btn-default btn-lg btn-block pho_box" type="file" name="uploadnewglasespics[]" id="uploadnewglasespics" multiple="multiple" style="display:none;" /> 
          </div>
           <div class="col-md-6 chos_photos" id="upload_new_glasses_pics"></div>
          <div class="clearfix"></div>

		<div class="box_bottom">
          <div class="publics col-md-3" style="float:right">
           <input type="submit"  class="btn3 btn-green" value="Save" />
            <div data-dismiss="modal" class="btn3 btn-black">Cancel</div>
           
          </div>
          <div class="clearfix"></div>
        </div>
        </form>
        
        <div class="clearfix"></div>
      </div>
    </div>
  </div>
</div>
<!---------------->

<!----------- new hobby ---------------------->
<div class="modal fade" id="AddCompanys_new_hobby" tabindex="-1" role="dialog" aria-labelledby="myModalLabe" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div id="comperrormsg"></div>
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <div class="paper"><i class='fa  fa-leaf'></i></div>
        <h4 class="modal-title" id="myModalLabe">Started a Hobby</h4>
            <div class="subheads">Today</div>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url(); ?>Life_Events/add_hobby" enctype="multipart/form-data" method="post">
          <div class="col-md-6 Glasses_Contacts" >
            <div class="form-group">
              <label for="exampleInputName2">Title</label>
              <input type="text" class="form-control" id="" placeholder="Optional"  name="n_h_title">
            </div>
            <div class="form-group">
              <label for="exampleInputName2">Hobby</label>
              <input type="text" class="form-control" id="" placeholder="Optional"  name="n_h_hobby">
            </div>
            
            
            <div class="located">
              <label for="exampleInputEmail1">Location</label>
              <div class="input-group">
                <div class="input-group-addon"><i class="fa fa-fw"></i></div>
                <input type="text" placeholder="Optional" class="form-control" id="exampleInputAmount" name="n_h_location">
              </div>
            </div>
            
            <div class="located">
              <label for="exampleInputEmail1">With</label>
              <div class="input-group">
                <div class="input-group-addon"><i class="fa fa-fw"></i></div>
                <input type="text" id="exampleInputAmount" class="form-control" placeholder="" name="n_h_with">
              </div>
            </div>
            
            <div class="form-group">
              <label for="">When</label>
              <div class="clearfix"></div>
              <div class="col-md-4">
                <select name="n_h_year">
                  <option>1982</option>
                </select>
              </div>
              <div class="col-md-4">
                <select name="n_h_month">
                  <option>May</option>
                </select>
              </div>
              <div class="col-md-4">
                <select name="n_h_date">
                  <option>13</option>
                </select>
              </div>
              <div class="clearfix"></div>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Story</label>
              <div class="clearfix"></div>
              <textarea rows="4" placeholder="Optional" name="n_h_story"></textarea>
               <input type="hidden" name="new_hobby_images" value="uploadnewhobbypics" />
               <input type="hidden" name="n_hobby_type" value="new_hobby" />
            </div>
          </div>
          <div class="col-md-6 chos_photos"  id="new_hobby_pics">
           <!-- <button type="button" class="btn btn-default btn-lg btn-block pho_box">Choose From Photos...</button> -->
           <button type="button" class="btn btn-default btn-lg btn-block pho_box"  onclick="document.getElementById('uploadnewhobbypics').click()">Upload Photos...</button>
              
             <input class="btn btn-default btn-lg btn-block pho_box" type="file" name="uploadnewhobbypics[]" id="uploadnewhobbypics" multiple="multiple" style="display:none;" /> 
          </div>
           <div class="col-md-6 chos_photos" id="upload_new_hobby_pics"></div>
          <div class="clearfix"></div>

		<div class="box_bottom">
          <div class="publics col-md-3" style="float:right">
           <input type="submit"  class="btn3 btn-green" value="Save" />
            <div data-dismiss="modal" class="btn3 btn-black">Cancel</div>
           
          </div>
          <div class="clearfix"></div>
        </div>
        </form>
        
        <div class="clearfix"></div>
      </div>
    </div>
  </div>
</div>
<!----------- new hobby ---------------------->
<!-------- voted --------------->


<div class="modal fade" id="AddCompanys_voted" tabindex="-1" role="dialog" aria-labelledby="myModalLabe" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div id="comperrormsg"></div>
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <div class="paper"><i class='fa fa-yelp'></i></div>
        <h4 class="modal-title" id="myModalLabe">Voted</h4>
            <div class="subheads">Today</div>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url(); ?>Life_Events/add_voted" enctype="multipart/form-data" method="post">
          <div class="col-md-6 Glasses_Contacts" >
            <div class="form-group">
              <label for="exampleInputName2">Title</label>
              <input type="text" class="form-control" id="" placeholder="Optional"  name="voted_title">
            </div>
            <div class="form-group">
              <label for="exampleInputName2">Candidate</label>
              <input type="text" class="form-control" id="" placeholder="Optional"  name="voted_candidate">
            </div>
       
            
            <div class="form-group">
              <label for="">When</label>
              <div class="clearfix"></div>
              <div class="col-md-4">
                <select name="voted_year">
                  <option>1982</option>
                </select>
              </div>
              <div class="col-md-4">
                <select name="voted_month">
                  <option>May</option>
                </select>
              </div>
              <div class="col-md-4">
                <select name="voted_date">
                  <option>13</option>
                </select>
              </div>
              <div class="clearfix"></div>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Story</label>
              <div class="clearfix"></div>
              <textarea rows="4" placeholder="Optional" name="voted_story"></textarea>
               <input type="hidden" name="new_voted_images" value="uploadvotedpics" />
                 <input type="hidden" name="voted_type" value="voted" />
            </div>
          </div>
          <div class="col-md-6 chos_photos"  id="new_voted_pics">
           <!-- <button type="button" class="btn btn-default btn-lg btn-block pho_box">Choose From Photos...</button> -->
           <button type="button" class="btn btn-default btn-lg btn-block pho_box"  onclick="document.getElementById('uploadvotedpics').click()">Upload Photos...</button>
              
             <input class="btn btn-default btn-lg btn-block pho_box" type="file" name="uploadvotedpics[]" id="uploadvotedpics" multiple="multiple" style="display:none;" /> 
          </div>
           <div class="col-md-6 chos_photos" id="upload_voted_pics"></div>
          <div class="clearfix"></div>

		<div class="box_bottom">
          <div class="publics col-md-3" style="float:right">
           <input type="submit"  class="btn3 btn-green" value="Save" />
            <div data-dismiss="modal" class="btn3 btn-black">Cancel</div>
           
          </div>
          <div class="clearfix"></div>
        </div>
        </form>
        
        <div class="clearfix"></div>
      </div>
    </div>
  </div>
</div>
<!-------- voted --------------->

<!---------- travelled  ------------->


<div class="modal fade" id="AddCompanys_travelled" tabindex="-1" role="dialog" aria-labelledby="myModalLabe" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div id="comperrormsg"></div>
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <div class="start"><i class='fa fa-suitcase'></i></div>
        <h4 class="modal-title" id="new_job_label">Travelled</h4>
        <div class="subheads">May 18, 2015</div>
      </div>
      <div class="modal-body">
        <form  action="<?php echo base_url(); ?>Life_Events/add_travel" method="post" enctype="multipart/form-data">
          <div class="col-md-6 Works" >
            <div class="form-group">
              <label for="exampleInputEmail1">Title</label>
              <input type="text" class="form-control"  name="travel_title" placeholder="">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Trip Name</label>
              <input type="text" class="form-control" name="travel_tripname" placeholder="optional">
            </div>
            <div class="located">
              <label for="exampleInputEmail1">Places Visited</label>
              <div class="input-group">
                <div class="input-group-addon"><i class="fa fa-fw"></i></div>
                <input type="text" class="form-control" id="exampleInputAmount" name="travel_location">
              </div>
            </div>
            
                   
            <div class="form-group">
              <label for="">From</label>
              <div class="clearfix"></div>
              <div class="work_botom"><a href="#" onclick="from_year_disp('add_year_link_travel','travel_frm_years','add_month_link_travel');" id="add_year_link_travel"><i class="fa fa-plus"></i>&nbsp;Add Year</a></div>
              <div class="col-md-4">
              
                <select style="display:none;" name="travel_year" id="travel_frm_years" onchange="frm_years_change('travel_frm_years','add_month_link_travel','travel_frm_months','add_day_link_travel','travel_frm_days','add_year_link_travel')">
                  <option value="0">years</option>
                    <option>1983</option>  
                    <option>1984</option>  
                    <option>1985</option>  
                    <option>1986</option> 
                     <option>1987</option>  
                     <option>1988</option>
                </select>
              </div>
              <div class="work_botom"><a href="#" onclick="from_month_disp('add_month_link_travel','travel_frm_months','add_day_link_travel');" style="display:none;" id="add_month_link_travel"><i class="fa fa-plus"></i>&nbsp;Add Month</a></div>
              <div class="col-md-4">
               <select style="display:none;"  name="travel_month" id="travel_frm_months" onchange="frm_months_change('add_month_link_travel','travel_frm_months','add_day_link_travel','travel_frm_days','add_year_link_travel')">
                  <option value="0">months</option>
                    <option>1</option>  
                    <option>2</option>  
                    <option>3</option>  
                    <option>4</option> 
                    <option>5</option>  
                    <option>6</option>
                </select>
              </div>
              <div class="work_botom"><a href="#" onclick="from_day_disp('add_day_link_travel','travel_frm_days','n_j_status','travel_to','travel_to_presant','n_j_to_years','add_year_link_travel');" style="display:none;" id="add_day_link_travel"><i class="fa fa-plus"></i>&nbsp;Add Day</a></div>
              <div class="col-md-4">
                <select style="display:none;" name="travel_date" id="travel_frm_days" onchange="frm_days_change('travel_frm_days','add_day_link_travel','add_year_link_travel','travel_to','travel_to_presant','n_j_status','all_travel_to_dates_dropdown','add_to_year_link_travel')">
                  <option value="0">Days</option>
                   <option>1</option>  
                    <option>2</option>  
                    <option>3</option>  
                    <option>4</option> 
                    <option>5</option> 
                </select>
              </div>
              <div class="clearfix"></div>
               <div class="work_botom" id="travel_to">To</div>
               <div class="work_botom" id="travel_to_presant" style="display:none;">To Presant</div>
              <div class="work_botom"><a href="#" id="add_to_year_link_travel" onclick="to_year_disp('add_to_year_link_travel','travel_to_years','add_to_month_link_travel');"><i class="fa fa-plus"></i>&nbsp;Add Year</a></div>
            </div>
            
       
            
            
            <div class="form-group" id="all_travel_to_dates_dropdown">
             
              <div class="clearfix"></div>
              <div class="col-md-4">
                <select style="display:none;" name="travel_to_year" id="travel_to_years" onchange="to_years_change('add_to_year_link_travel','travel_to_years','add_to_month_link_travel','travel_to_months','travel_to_days')">
                 <option value="0">years</option>
                    <option>1983</option>  
                    <option>1984</option>  
                    <option>1985</option>  
                    <option>1986</option> 
                     <option>1987</option>  
                     <option>1988</option>
                </select>
              </div>
               <div class="work_botom"><a href="#" onclick="to_month_disp('add_to_month_link_travel','travel_to_months','add_to_day_link_travel');" style="display:none;" id="add_to_month_link_travel"><i class="fa fa-plus"></i>&nbsp;Add Month</a></div>
              <div class="col-md-4">
                <select style="display:none;" name="travel_to_month" id="travel_to_months"  onchange="to_months_change('travel_to_months','add_to_month_link_travel','add_to_day_link_travel','travel_to_days')">
                   <option value="0">Months</option>
                    <option>1</option>  
                    <option>2</option>  
                    <option>3</option>  
                    <option>4</option> 
                    <option>5</option> 
                </select>
              </div>
              <div class="work_botom"><a href="#" onclick="to_day_disp('add_to_day_link_travel','travel_to_days');" style="display:none;" id="add_to_day_link_travel"><i class="fa fa-plus"></i>&nbsp;Add Day</a></div>
              <div class="col-md-4">
                <select style="display:none;" name="travel_to_day" id="travel_to_days" onchange="to_days_change('add_to_day_link_travel','travel_to_days')">
                  <option value="0">Days</option>
                   <option>1</option>  
                    <option>2</option>  
                    <option>3</option>  
                    <option>4</option> 
                    <option>5</option> 
                </select>
              </div>
              <div class="clearfix"></div>
              
            </div>
    
            <div class="located">
              <label for="exampleInputEmail1">With</label>
              <div class="input-group">
                <div class="input-group-addon"><i class="fa fa-fw"></i></div>
                <input type="text" id="exampleInputAmount" class="form-control" placeholder="" name="travel_with">
              </div>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Story</label>
              <div class="clearfix"></div>
              <textarea rows="4" placeholder="Optional" name="travel_story"></textarea>
              <input type="hidden" name="travel_images" value="uploadtravelpics" />
               <input type="hidden" name="travel_type" value="travel" />
            </div>
          </div>
          <div class="col-md-6 chos_photos" id="new_travel_pics" >
           <!-- <button type="button" class="btn btn-default btn-lg btn-block pho_box">Choose From Photos...</button> -->
           <button type="button" class="btn btn-default btn-lg btn-block pho_box" onclick="document.getElementById('uploadtravelpics').click()">Upload Photos...</button>
             <input class="btn btn-default btn-lg btn-block pho_box" type="file" name="uploadtravelpics[]" id="uploadtravelpics" multiple="multiple" style="display:none;" />
          </div>
         <div class="col-md-6 chos_photos" id="upload_travel_pics"></div>
          <div class="clearfix"></div>
      
        <div class="box_bottom">
          <div class="publics col-md-3" style="float:right">
           <input type="submit" class="btn3 btn-green" value="Save" />
            <div class="btn3 btn-black"  data-dismiss="modal" >Cancel</div>
           
          </div>
          <div class="clearfix"></div>
        </div>
          </form>
        <div class="clearfix"></div>
      </div>
    </div>
  </div>
</div>
<!---------- travelled   ------------>

<!---------------  google maps embedding api ---------------->

<div class="modal fade"  id="google-maps" role="dialog" aria-labelledby="gridSystemModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
      
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="gridSystemModalLabel">Life Events</h4>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
          <div id="life_event_icon"><div class="alignbox"></div></div>
           <div id="life_event_header"><div class="life_event_loc"></div></div>
           <div id="life_event_date"><div class="life_event_text "></div></div>
        
        <!-- <div id="life_event_date"><div class="life_event_text "></div></div> -->
         <div id="life_event_with"><div class="life_event_text "></div></div>
          <div id="life_event_location"><div class="life_event_loc"></div></div>
      
        
          <div id="life_event_story"><div class="life_event_lefts"></div></div>
        <div id="life_event_images"><div class="life_event_lefts_img"></div></div>
        
           
           <div id="map-canvas" class="canvas_maps"></div>

        </div>
    </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>  </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!---------------  end -------------------------------------->