<?php $cmp_info = $cmp_info[0]; $job_info = $job[0]; if($this->session->flashdata('application_status')) echo $this->session->flashdata('application_status');?>
<section class="job col-lg-9 col-md-9 nopad">
      <div class="job_in">
        <div class="col-lg-3 col-md-3"><img src="<?php echo base_url().'uploads/'.$cmp_info['company_image']; ?>" alt=""></div>
        <div class="jobtext col-lg-9 col-md-9">
          <h3>Company Profile:</h3>
          <h6><?php echo ucfirst($cmp_info['cmp_name']);  ?></h6>
          <p><?php echo ucfirst($cmp_info['cmp_about']);  ?></p>
        </div>
        <div class="clearfix"></div>
      </div>
      <div class="discription col-lg-12 col-md-12">
        <h3>Job Details:</h3>
        <ul>
          <li class="innertext">
            <p><?php echo $job_info['job_title']; ?></p>
            <p><?php echo $job_info['job_description']; ?></p>
          </li>
          <li>
            <div class="leftsml">Salary: </div>
            <div class="rightsml"><?php if(!empty($job_info['job_salary'])) echo $job_info['job_salary'];  else echo 'Not Disclosed by Recruiter'; ?> </div>
          </li>
          <li>
            <div class="leftsml">Industry: </div>
            <div class="rightsml"><?php if(!empty($job_info['job_type'])) echo $job_info['job_type'];  else echo 'Not Disclosed by Recruiter'; ?></div>
            <div class="clearfix"></div>
          </li>
          <li>
            <div class="leftsml">Functional Area: </div>
            <div class="rightsml"><?php if(!empty($job_info['job_category'])) echo $job_info['job_category'];  else echo 'Not Disclosed by Recruiter'; ?> </div>
            <div class="clearfix"></div>
          </li>
         
          <li class="keyskills">
            <h3>Keyskills</h3>
            <p><?php echo $job_info['job_requirements']; ?></p>
          </li>
          
          
          <div class="education">
           <h3>Contact Details</h3>
          <?php if(!empty($job_info['job_contact_name'])) echo '<p>'.$job_info['job_contact_name'].'</p>'; ?>
          <?php if(!empty($job_info['job_contact_phone'])) echo '<p>'.$job_info['job_contact_phone'].'</p>'; ?></p>
          <?php if(!empty($job_info['job_contact_email'])) echo '<p>'.$job_info['job_contact_email'].'</p>'; ?></p>
          <?php if(!empty($job_info['job_how_to_apply'])) echo '<p>'.$job_info['job_how_to_apply'].'</p>'; ?></p>
 
 </div>
          </li>
         
          <li class="box_button">
          <div class="btn3 btn-black">Back</div>
<div class="btn3 btn-green" data-toggle="modal" data-target="#AddCompany">Apply Jobs</div>
          </li>
          
        </ul>
      </div>
    </section>
    <div class="modal fade" id="AddCompany" tabindex="-1" role="dialog" aria-labelledby="myModalLabe" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div id="comperrormsg"></div>
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabe">Apply Jobs</h4>
      </div>
      <div class="modal-body">
        <form name="company_form" id="company_form" action="<?php echo base_url()."company/applyjob/".$cmp_info['companyinfo_id']."/".$job_info['job_id']; ?>" onsubmit="return validateJobForm();" enctype="multipart/form-data" method="post">
          
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
        
        <div class="addcompany">
         <input class="btn3 btn-yellow" type="submit" value="Send application" name="submit"/></form>
        </div>
        <div class="clearfix"></div>
      </div>
    </div>
  </div>
</div>
<script>
 function getFileData(myFile){
       var file = myFile.files[0];  
       var filename = file.name;
	   $('#txtUserfile').val(filename);
    }
</script>