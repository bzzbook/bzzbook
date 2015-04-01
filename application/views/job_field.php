<?php 
$id = $this->uri->segment(3);

$jobs = $this->jobmodel->getJobs($id);

?>
  <?php if(!$jobs){ echo "No Jobs Found From This Company !.."; } else { foreach($jobs as $job): ?>
  <div class="groupMainBlock">
  <div class="jobProperty">
    <div class="col-md-4 col-sm-12 col-xs-5" style="width:auto"><img src="<?php echo base_url().'uploads/'.$job['company_image']; ?>" class="img-responsive"  alt=""  width="120"></div>
    <div class="col-md-8 col-sm-12 col-xs-12 createjob"> <span><samp>Title : </samp><?php echo $job['job_title']; ?></span> <span><samp>Location : </samp><?php echo $job['company_country'].', '.$job['company_state'].', '.$job['company_city']; ?> </span> <span> <samp>Posted by : </samp> <?php echo $job['cmp_name']; ?> <samp>| Date : </samp>
      <?php $unixTimestamp = strtotime($job['post_date']); echo date('F',$unixTimestamp)." ".date('d',$unixTimestamp).", ".date('Y',$unixTimestamp); ?>
      </span> 
         <span><samp>Category : </samp><?php echo $job['job_category']; ?></span> 
      <div class="collapse jobDetails" id="<?php echo $job['job_id'] ?>">
        <div class="createjob"> 
        <span><samp>Description : </samp><?php echo $job['job_description']; ?></span>
         <span><samp>Requirements : </samp><?php echo $job['job_requirements']; ?></span>
         <span><samp>Category : </samp><?php echo $job['job_category']; ?></span> 
         <span><samp>Contact Person : </samp><?php echo $job['job_contact_name']; ?></span> 
         <span><samp>Contact Mail : </samp><?php echo $job['job_contact_email']; ?></span> </div>
      </div>
      <a class="jobDetailsBtn" data-toggle="collapse" href="#<?php echo $job['job_id'] ?>" aria-expanded="false" aria-controls="collapseExample">Read More</a>
    </div>
    <div class="clearfix"></div>
    </div>
</div>
  <?php  endforeach;  } ?>
   
