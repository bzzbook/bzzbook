<?php $cmp_info = $cmp_info[0]; $job_info = $job[0];?>
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
<div class="btn3 btn-green">Apply Jobs</div>
          </li>
          
        </ul>
      </div>
    </section>