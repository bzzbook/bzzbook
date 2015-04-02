<?php 	
		$data  = $this->jobmodel->check_btn();
		$user_id = $this->session->userdata('logged_in')['account_id']; 
		//$cmp_id = $this->session->userdata('cmp_id');
		$industry= $this->lookup->get_lookup_industry();
        $jobtype  = $this->lookup->get_lookup_jobtype();
		
		
?>
<section class="col-lg-6 col-md-6 col-sm-5 col-xs-12 coloumn2 jobsSt">
 <?php 			
				$jobs = array();
				foreach($data as $data){
				$jobs[] = $data['companyinfo_id'];
				}
				
					if(in_array($cmp_info[0]['companyinfo_id'],$jobs))
					{
              ?>
		<button type="button" class="btn btn-primary createbutton fright" data-toggle="modal" data-target=".bs-example-modal-lg">Create Job</button>
        <?php } ?>
		
      <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
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
              <div class="col-md-12 row fleft">
                <div class="forms col-md-4">
                <form action="" name="addJobForm" id="addJobForm">
                  <label>Job Title:*</label>
                  <span>
                  <input type="text" class="medium" name="job_title" id="job_title">
                  </span> 
                  </div>
                <div class="forms col-md-4">
                  <label>Job Type:*</label>
                  <span>
                   <select class="medium" name="job_type" id="job_type">
                    <option value="">Job Type</option>
				<?php foreach($jobtype as $job):?>
                <option value="<?php echo $job->lookup_value ?>"><?php echo $job->lookup_value ?></option>
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
                 <option value="<?php echo $industries->lookup_value ?>"><?php echo $industries->lookup_value ?></option>
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
                <div class="col-md-3 forms">
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
                <div class="col-md-5 forms">
                  <label>keywords:*</label>
                  <span>
                  <input type="text" class="large" name="job_keywords" id="job_keywords">
                  </span> </div>
                   <div class="col-md-6 forms">
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
                <button class="createbutton cancelbutton" data-dismiss="modal" id="canceladdjob">Cancel</button></p>
            </div>
            </div>
          </div>
        </div>
      </div>
      <h2>Jobs</h2>
      <div class="joblisting">
        <?php $this->load->view('job_field'); ?>
      </div>
    </section>