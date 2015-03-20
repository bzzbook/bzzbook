<section class="col-lg-6 col-md-6 col-sm-5 col-xs-12 coloumn2 jobsSt">
      <button type="button" class="btn btn-primary createbutton fright" data-toggle="modal" data-target=".bs-example-modal-lg">Create Job</button>
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
                  <input type="text" class="medium" name="job_type" id="job_type">
                </div>
                <div class="forms col-md-4">
                  <label>Catagory:*</label>
                  <span>
                  <select class="medium" name="job_category" id="job_category">
                    <option selected="selected"  value="0">-- Please Select -- </option>
                    <option value="Accounting/Finance/Banking">Accounting/Finance/Banking</option>
                    <option>Admin/Office</option>
                    <option>Advertising/PR/Marketing</option>
                    <option>Airline/Aviation</option>
                    <option>Arts/Entertainment/Creative</option>
                    <option>Automotive</option>
                    <option>Bio-Pharmaceutical/Science</option>
                    <option>Clerical/Adminstrative</option>
                    <option>Computer/Tech/Internet</option>
                    <option>Construction/Real Estate/Facilities</option>
                    <option>Customer Service/Call Center</option>
                    <option>Education/Training</option>
                    <option>Engineering/Architecture</option>
                    <option>Hospitality/Tourism/Casino</option>
                    <option>Human Resource</option>
                    <option>Installation/Maintenance/Repair</option>
                    <option>Insurance</option>
                    <option>Law Enforcement</option>
                    <option>Legal</option>
                    <option>Management/Executive</option>
                    <option>Manufacturing/Operations</option>
                    <option>Media</option>
                    <option>Medical Staffing</option>
                    <option>Medical/All Positions</option>
                    <option>Medical/Nursing</option>
                    <option>Medical/Physicians</option>
                    <option>Other/General/Entry-Level</option>
                    <option>Public Sector</option>
                    <option>Restaurant/Food Service</option>
                    <option>Retail/Wholesale</option>
                    <option>Sales/Telemarketing</option>
                    <option>Salon/Spa/Fitness</option>
                    <option>Telecommunications</option>
                    <option>Trades/Electronics/Plumbing</option>
                    <option>Transportation/Logistics/Warehouse</option>
                  </select>
                  </span> </div>
              </div>
              <div class="clearfix"></div>
              <div  class="col-md-12 row ">
                <div class="col-md-6 forms">
                  <label>Approx. Salary:*</label>
                  <span>
                  <select  class="large" name="job_salary" id="job_salary">
                    <option selected="selected" value="">-- Please Select -- </option>
                    <option value="$10,000 to $30,000">$10,000 to $30,000</option>
                    <option>$30,000 to $50,000</option>
                    <option>$50,000 to $80,000</option>
                    <option>$80,000 to $100,000</option>
                    <option>$100,000 +</option>
                  </select>
                  </span> </div>
                <div class="col-md-6 forms">
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
								echo "<option value='".$company['comp_id']."'>".$company['company_name']."</option>";
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
                <label>Requirment Skills:*<span class="form-form-mandatory">*</span></label>
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