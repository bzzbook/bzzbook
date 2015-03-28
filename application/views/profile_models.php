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
                  <option value="2008">2008</option>
	<option value="2007">2007</option>
	<option value="2006">2006</option>
	<option value="2005">2005</option>
	<option value="2004">2004</option>
	<option value="2003">2003</option>
	<option value="2002">2002</option>
	<option value="2001">2001</option>
	<option value="2000">2000</option>
	<option value="1999">1999</option>
	<option value="1998">1998</option>
	<option value="1997">1997</option>
	<option value="1996">1996</option>
	<option value="1995">1995</option>
	<option value="1994">1994</option>
	<option value="1993">1993</option>
	<option value="1992">1992</option>
	<option value="1991">1991</option>
	<option value="1990">1990</option>
	<option value="1989">1989</option>
	<option value="1988">1988</option>
	<option value="1987">1987</option>
	<option value="1986">1986</option>
	<option value="1985">1985</option>
	<option value="1984">1984</option>
	<option value="1983">1983</option>
	<option value="1982">1982</option>
	<option value="1981">1981</option>
	<option value="1980">1980</option>
	<option value="1979">1979</option>
	<option value="1978">1978</option>
	<option value="1977">1977</option>
	<option value="1976">1976</option>
	<option value="1975">1975</option>
	<option value="1974">1974</option>
	<option value="1973">1973</option>
	<option value="1972">1972</option>
	<option value="1971">1971</option>
	<option value="1970">1970</option>
	<option value="1969">1969</option>
	<option value="1968">1968</option>
	<option value="1967">1967</option>
	<option value="1966">1966</option>
	<option value="1965">1965</option>
	<option value="1964">1964</option>
	<option value="1963">1963</option>
	<option value="1962">1962</option>
	<option value="1961">1961</option>
	<option value="1960">1960</option>
	<option value="1959">1959</option>
	<option value="1958">1958</option>
	<option value="1957">1957</option>
	<option value="1956">1956</option>
	<option value="1955">1955</option>
	<option value="1954">1954</option>
	<option value="1953">1953</option>
	<option value="1952">1952</option>
	<option value="1951">1951</option>
	<option value="1950">1950</option>
	<option value="1949">1949</option>
	<option value="1948">1948</option>
	<option value="1947">1947</option>
	<option value="1946">1946</option>
	<option value="1945">1945</option>
	<option value="1944">1944</option>
	<option value="1943">1943</option>
	<option value="1942">1942</option>
	<option value="1941">1941</option>
	<option value="1940">1940</option>
	<option value="1939">1939</option>
	<option value="1938">1938</option>
	<option value="1937">1937</option>
	<option value="1936">1936</option>
	<option value="1935">1935</option>
	<option value="1934">1934</option>
	<option value="1933">1933</option>
	<option value="1932">1932</option>
	<option value="1931">1931</option>
	<option value="1930">1930</option>
	<option value="1929">1929</option>
	<option value="1928">1928</option>
	<option value="1927">1927</option>
	<option value="1926">1926</option>
	<option value="1925">1925</option>
	<option value="1924">1924</option>
	<option value="1923">1923</option>
	<option value="1922">1922</option>
	<option value="1921">1921</option>
	<option value="1920">1920</option>
	<option value="1919">1919</option>
	<option value="1918">1918</option>
	<option value="1917">1917</option>
	<option value="1916">1916</option>
	<option value="1915">1915</option>
	<option value="1914">1914</option>
	<option value="1913">1913</option>
	<option value="1912">1912</option>
	<option value="1911">1911</option>
	<option value="1910">1910</option>
	<option value="1909">1909</option>
	<option value="1908">1908</option>
	<option value="1907">1907</option>
	<option value="1906">1906</option>
	<option value="1905">1905</option>
	<option value="1904">1904</option>
	<option value="1903">1903</option>
	<option value="1902">1902</option>
	<option value="1901">1901</option>
	<option value="1900">1900</option>
             
                </select>
              </div>
               <div class="filed col-md-6">
                <input type="text" class="form-control" required="required" name="cmp_colleagues" id="cmp_colleagues" placeholder="Employee">
              </div>
             <h4 class="clear">Address</h4>
              <div class="filed col-md-12">
                <textarea class="form-control" name="company_address" id="company_address"></textarea>
              </div>
              <div class="filed col-md-6">
                <select required="required" name="company_state" id="company_state" class="form-control" onchange="print_state('state',this.selectedIndex);">
                            <option selected="selected" value="0">------- Select State --------</option>
                                                                <option value="Alabama">Alabama</option>
                                                                <option value="Alaska">Alaska</option>
                                                                <option value="Arizona">Arizona</option>
                                                                <option value="Arkansas">Arkansas</option>
                                                                <option value="California">California</option>
                                                                <option value="Colorado">Colorado</option>
                                                                <option value="Connecticut">Connecticut</option>
                                                                <option value="Delaware">Delaware</option>
                                                                <option value="Florida">Florida</option>
                                                                <option value="Georgia">Georgia</option>
                                                                <option value="Hawaii">Hawaii</option>
                                                                <option value="Idaho">Idaho</option>
                                                                <option value="Illinois">Illinois</option>
                                                                <option value="Indiana">Indiana</option>
                                                                <option value="Iowa">Iowa</option>
                                                                <option value="Kansas">Kansas</option>
                                                                <option value="Kentucky">Kentucky</option>
                                                                <option value="Louisiana">Louisiana</option>
                                                                <option value="Maine">Maine</option>
                                                                <option value="Maryland">Maryland</option>
                                                                <option value="Massachusetts">Massachusetts</option>
                                                                <option value="Michigan">Michigan</option>
                                                                <option value="Minnesota">Minnesota</option>
                                                                <option value="Mississippi">Mississippi</option>
                                                                <option value="Missouri">Missouri</option>
                                                                <option value="Montana">Montana</option>
                                                                <option value="Nebraska">Nebraska</option>
                                                                <option value="Nevada">Nevada</option>
                                                                <option value="New Hampshire">New Hampshire</option>
                                                                <option value="New Jersey">New Jersey</option>
                                                                <option value="New Mexico">New Mexico</option>
                                                                <option value="New York">New York</option>
                                                                <option value="North Carolina">North Carolina</option>
                                                                <option value="North Dakota">North Dakota</option>
                                                                <option value="Ohio">Ohio</option>
                                                                <option value="Oklahoma">Oklahoma</option>
                                                                <option value="Oregon">Oregon</option>
                                                                <option value="Pennsylvania">Pennsylvania</option>
                                                                <option value="Rhode Island">Rhode Island</option>
                                                                <option value="South Carolina">South Carolina</option>
                                                                <option value="South Dakota">South Dakota</option>
                                                                <option value="Tennessee">Tennessee</option>
                                                                <option value="Texas">Texas</option>
                                                                <option value="Utah">Utah</option>
                                                                <option value="Vermont">Vermont</option>
                                                                <option value="Virginia">Virginia</option>
                                                                <option value="Washington">Washington</option>
                                                                <option value="West Virginia">West Virginia</option>
                                                                <option value="Wisconsin">Wisconsin</option>
                                                                <option value="Wyoming">Wyoming</option>
                             
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
<script language="javascript">print_country("con");</script>    

 <!---------------------- MESSAGES CONVERSATION MODEL END -------------->
 