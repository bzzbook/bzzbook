<section class="col-lg-6 col-md-6 col-sm-5 col-xs-12 coloumn2 jobsSt">
<h2>Applicants</h2>
<div class="joblisting">
<?php if(!$applicants){ echo "No Applicants Found For This Company !.."; } else { foreach($applicants as $applicant): $profile_pic = $this->profile_set->get_profile_pic($applicant['user_id']); if(empty($profile_pic)) $profile_pic='default_profile_pic.png'; else $profile_pic = $profile_pic[0]->user_img_thumb; ?>

  <div class="groupMainBlock">
  <div class="jobProperty">
    <div class="col-md-4 col-sm-12 col-xs-5" style="width:auto"><img src="<?php echo base_url().'uploads/'.$profile_pic; ?>" class="img-responsive"  alt=""  width="120"></div>
    <div class="col-md-8 col-sm-12 col-xs-12 createjob"> <span><samp>Name : </samp><?php echo $applicant['name']; ?></span> <span><samp>Email : </samp><?php echo $applicant['email']; ?> </span> <span> <samp>Phone : </samp> <?php echo $applicant['phone']; ?> </span><span><samp>skills : </samp>
      <?php  echo $applicant['skills']; ?>
      </span> 
         <span><samp>About : </samp><?php echo $applicant['message']; ?></span> 
     <?php /*?> <div class="collapse applicantDetails" id="<?php echo $applicant['applicant_id'] ?>">
        <div class="createapplicant"> 
        <span><samp>Description : </samp><?php echo $applicant['applicant_description']; ?></span>
         <span><samp>Requirements : </samp><?php echo $applicant['applicant_requirements']; ?></span>
         <span><samp>Category : </samp><?php echo $applicant['applicant_category']; ?></span> 
         <span><samp>Contact Person : </samp><?php echo $applicant['applicant_contact_name']; ?></span> 
         <span><samp>Contact Mail : </samp><?php echo $applicant['applicant_contact_email']; ?></span> </div>
      </div><?php */?>
      <a class="jobDetailsBtn" href="<?php echo base_url().'uploads/'.$applicant['resume']; ?>" target="new" aria-expanded="false" aria-controls="collapseExample">Download Resume</a>
    </div>
    <div class="clearfix"></div>
    </div>
</div>

  <?php  endforeach;  } ?>
</div>
</section>
   
