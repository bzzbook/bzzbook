<?php 
$industry= $this->lookup->get_lookup_industry();
$jobtype  = $this->lookup->get_lookup_jobtype();
?>
<div class="col-md-9">
            <div class="JobsSearchLayout">
                <h2 class="mainHead"><span class="pull-left" style="margin-top:7px;">Jobs</span> 
                
                         <?php 	
				 $data  = $this->jobmodel->check_btn();		
				$companies_data = array();
				if(!empty($data))
				{
				foreach($data as $data){
				$companies_data[] = $data['companyinfo_id'];
				}
				
					if(in_array($cmp_info[0]['companyinfo_id'],$companies_data))
					{
              ?>
		<button type="button" class="btn btn-primary createbutton fright" data-toggle="modal" data-target="#cr_jobs_modal">Create Job</button>
        <?php } } ?>
                
                
                  <!--<span class="pull-right searchColumn"><input type="text" placeholder="Search" /><button><i class="fa fa-search"></i></button></span>--></h2>
                <div class="jobSearchListing">
                   
                   
             <?php
			
				   if($jobs)
				   { 
				   foreach($jobs as $job) 
                  
                   { ?>
                    <div class="job_search">
                        <div class="optionBox" style="width:35px;"></div>
                        <div class="aboutJob"><a href="<?php echo base_url('jobs/cmp_job_description/'.$job['job_id'].'/'.$job['company_posted_by']) ?>">
                            <h2><?php echo $job['job_title']; ?></h2>
                            <h3><?php 
							$data = $this->jobmodel->get_job_type($job['job_category']);
							if($data)
							{
								echo $data[0]['lookup_value'].',  ';
							}
							echo  $job['cmp_name'];
							
							?></h3>
                           <h3><?php echo $job['country'].",".$job['experience']; ?></h3>
                            <div class="excrept"><p><?php echo character_limiter($job['job_description'],250); ?></p></div>
                            <h3>Keyskills: <?php echo $job['job_keyword']; ?></h3>
                            <span class="dated"><?php $unixTimestamp = strtotime($job['post_date']);
				 echo date('d',$unixTimestamp).", ".date('F',$unixTimestamp).", ".date('Y',$unixTimestamp); ?></span>
                        </a></div>
                        <div class="moreOptions">
                            <ul>
                                <li><a href="#" data-target="#Apply_for_Job" data-toggle="modal"><i class="fa fa-hand-o-up"></i> Apply</a></li>
                                <li>
                               
                            <a href="<?php echo base_url('jobs/similarjobs?job_id='.$job['job_id'].'&company_id='.$job["company_posted_by"].'&job_title='.$job['job_title'].'&job_keyword='.$job['job_keyword'].'&country='.$job['country'].'&company_country='. $job['company_country'].'&company_name='. $job['cmp_name'].''); ?>"><i class="fa fa-search"></i> Similar jobs</a></li>
                                <li><a href="#"><i class="fa fa-share-square-o"></i> Share </a></li>
                               <?php /*?> <li><a href="<?php echo base_url('jobs/disp_all_cmp_jobs/'.$job['company_posted_by'].'/'.$job['job_id'])?>"><i class="fa fa-briefcase"></i> All Jobs by this Company</a></li><?php */?>
                                <li><a href="<?php echo base_url('company/company_disp/'.$job['company_posted_by'])?>"><i class="fa fa-building"></i> Company Profile</a></li>
                            </ul>
                        </div>
                        
                        
                        <!----------------job_apply_modal --------------------------->


<div class="modal fade" id="Apply_for_Job" tabindex="-1" role="dialog" aria-labelledby="myModalLabe" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div id="comperrormsg"></div>
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabe">Apply Jobs</h4>
      </div>
      <div class="modal-body">
        <form name="company_form" id="company_form" action="<?php echo base_url()."company/applyjob/".$job['company_posted_by']."/".$job['job_id']; ?>" onsubmit="return validateJobForm();" enctype="multipart/form-data" method="post">
          
          <div class="form-group">
            <label for="exampleInputEmail1">Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Name">
          </div>
          <div class="apply form-group">
            <label for="exampleInputEmail1">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Phone</label>
            <input type="Phone" class="form-control" id="phone" name="phone" placeholder="phone">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Skills</label>
            <input type="Phone" class="form-control" id="skills" name="skills" placeholder="Skills">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Message</label>
            <textarea rows="4" class="form-control" id="message" name="message" placeholder="Your Cover letter/message sent to the employer"></textarea>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Upload to CV</label>
        <div class="row">
										<div class="upload_cv col-md-12">
											<input type="file" data-buttontext="Find file" class="form-control" id="filestyle-2" name="userfile" style="position: absolute; clip: rect(0px, 0px, 0px, 0px);" tabindex="-1" onchange="getFileData(this);"><div class="bootstrap-filestyle input-group"><input readonly="readonly" type="text" id="txtUserfile" class="form-control " /> <span class="group-span-filestyle input-group-btn" tabindex="0">
                                            <label class="btn btn-default " for="filestyle-2"><span class="glyphicon glyphicon-folder-open"></span> Browse</label></span></div>
										</div>
									</div>
                                    
          </div>
          <div class="boxunderline">Maximum upload file size: 2 MB</div>
        
        
         <input class="btn3 btn-yellow" type="submit" value="Send application" name="submit"/></form>
        </div>
        <div class="clearfix"></div>
      </div>
    </div>
  </div>
<!----------------------------------------------------------->
                        
                        
                    </div>

<?php } }else {?><div style="margin:0px 10px; padding-top:15px;"> <p>No Jobs Found Based On Your Search...</p></div><?php } ?>








                </div>
            </div>
        </div>
        
        
        <div class="modal fade bs-example-modal-lg" id="cr_jobs_modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg"> 
        
          <div class="col-md-12 col-sm-6  modal-content">
          
        <div class="modal-body">
        
        
        
            <div id="job-create-popup">
            
            
            
              <div id="job-create-popup-black">
               <button aria-label="Close" data-dismiss="modal" class="close" type="button"><span aria-hidden="true">×</span></button>
                <p> Create a new Job </p>
              </div>
              <span id="jobformerrors"></span>
              <p class="job-popup-headers">Job Details</p>
              <form action="" name="addJobForm" id="addJobForm">
              <div class="col-md-12 row fleft">
              
                <div class="forms col-md-4">
                
                  <label>Job Title:*</label>
                  <span>
                  <input type="text" class="medium" name="job_title" id="job_title" />
                  </span> 
                  </div>
                <div class="forms col-md-4">
                  <label>Job Type:*</label>
                  <span>
                   <select class="medium" name="job_type" id="job_type">
                    <option value="">Job Type</option>
				<?php foreach($jobtype as $job):?>
                <option value="<?php echo $job->lookup_id ?>"><?php echo $job->lookup_value ?></option>
                <?php endforeach;?> 
                </select>
                </span> 
                </div>
                <div class="forms col-md-4">
                  <label>Category:*</label>
                  <span>
                  <select class="medium" name="job_category" id="job_category">
                    <option value="">Industry</option>
				 <?php foreach($industry as $industries):?>
                 <option value="<?php echo $industries->lookup_id; ?>"><?php echo $industries->lookup_value; ?></option>
                 <?php endforeach;?> 
                 </select> 
                  </span> </div>
              </div>
              <div class="clearfix"></div>
              <div  class="col-md-12 row ">
              <div class="col-md-4 forms">
                  <label>Compensation:*</label>
                  <span>
                  <input type="text" class="medium" name="job_salary" id="job_salary">
                  </span> </div>
                <div class="col-md-4 forms">
                  <label>Duration:*</label>
                  <span>
                  <select  class="large" name="salary_basis" id="salary_basis">
                    <option selected="selected" value="">-- Please Select -- </option>
                    <option value="D">Per Day</option>
                    <option value="W">Per Week</option>
                    <option value="M">Per Month</option>
                    <option value="Y">per Year</option>
                   
                  </select>
                  </span> </div>
                
                   <div class="col-md-4 forms">
                  <label>Company:*</label>
                  <span>
                  <select class="medium" name="job_company_name" id="job_company_name">
				  <?php 
				  			
				  			$companies = $this->jobmodel->getCompanies();	
							foreach($companies as $company)
							{
								echo "<option value='".$company['companyinfo_id']."'>".$company['cmp_name']."</option>";
							}
				   ?></select>
                  </span> </div>
                  <div class="col-md-4 forms">
                  <label>Country:*</label>
                  <span>
                <select class="medium" name="country" onchange="print_state('state',this.selectedIndex);" id="country">
			<option value="">Select Country</option>
			</select> 
                  </span> </div>
                  <div class="col-md-4 forms">
                  <label>State:*</label>
                  <span>
                <select class="medium" name="state" id="state">
           <option value="">Select State</option>
           </select>
                  </span> </div>
                  <div class="col-md-4 forms">
                  <label>City:*</label>
                  <span>
                  <input type="text" class="medium"  name="job_city" id="job_exp" >  
                  </span> </div>
                  
                  <div class="col-md-4 forms">
                  <label>Experience:*</label>
                  <span>
                  <input type="text"  class="large" name="job_exp" id="job_exp" placeholder="example 0-1 years"> 
                  </span> </div>
                  
                  
                  
                  <div class="col-md-8 forms">
                  <label>keywords:*</label>
                  <span>
                  <input type="text" class="large" name="job_keywords" id="job_keywords">
                  </span> </div>
                  
                  
                  
              </div>
              <div class="forms col-md-10">
                <p>* You may enter up to 6 keywords. Keywords are terms used to search for your job posting.</p>
                <p>* Keywords must be separated by a comma. e.g.(Construction, framing, carpentry, power, tools) </p>
              </div>
              <div class="clearfix"></div>
              
              <p class="job-popup-headers">Contact Information</p>
              
              <div class="col-md-12 row">
              <div class="col-md-4 forms">
                <label> Name:*</label>
                <span><input type="text" class="medium" name="cont_name" id="cont_name"></span>
              </div>
              
              <div class="col-md-4 forms">
                <label >phone:</label>
                <span><input type="text" class="medium" name="cont_phone" id="cont_phone"></span>
              </div>
              <div  class=" col-md-4 forms">
                <label>Email:*</label>
                <span><input  type="text"  class="medium" name="cont_email" id="cont_email" ></span></div>
                </div>
                
              <div class="clearfix"> </div>
              
              <div  class="col-md-12 row forms">
                <label>How To apply:</label>
                <span><textarea cols="2" rows="2" class="textarea" name="how_to_apply" id="how_to_apply"></textarea></span>
              </div>
              <div class="clearfix"> </div>
              
              <p class="job-popup-headers">Job Description</p>
              
              <div class="col-md-12 row forms">
                <label>Detailed Description:*</label>
               <span><textarea cols="2" rows="2" class="textarea" name="job_desc" id="job_desc"></textarea></span>
              </div>
              <div class="clearfix"> </div>
              
              <p class="job-popup-headers">Job Requirments</p>
              
              <div class="col-md-12 row forms">
                <label>Requirment Skills:*<span class="form-form-mandatory"></span></label>
                <span><textarea cols="2" rows="2" class="textarea" name="req_skills" id="req_skills"></textarea></span>
              </div>
              <div class="clearfix"> </div>
              
              <input type="hidden" name="posted_for_company" value="0000000043">
              <p id="create-cancel-buttons">
                <button class="createbutton newbutton" data-target="#addjobModal">Create New Job</button>
                <button class="createbutton cancelbutton" data-dismiss="modal" id="canceladdjob">Cancel</button>
              </p>
               </form> 
            </div>
            </div>
          </div>
        </div>
      </div>