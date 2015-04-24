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
                     <?php for($i=1950;$i<=date(Y);$i++){?>
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
       
        <button type="button" class="btn btn-primary" id="follow_modal">Follow</button>
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