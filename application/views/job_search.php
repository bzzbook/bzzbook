  <?php if(!$jobs){ echo "No Jobs Found Based On Your Search Please Try With Other Details!.."; } else { foreach($jobs as $job): ?>
  <div class="groupMainBlock">
  <div class="jobProperty">
    <div class="col-md-4 col-sm-12 col-xs-5" style="width:auto"><img src="<?php echo base_url().'uploads/'.$job[0]['company_image']; ?>" class="img-responsive"  alt=""  width="120"></div>
    <div class="col-md-8 col-sm-12 col-xs-12 createjob"> <span><samp>Title : </samp><?php echo $job[0]['job_title']; ?></span> <span><samp>Location : </samp><?php echo $job[0]['company_country'].', '.$job[0]['company_state'].', '.$job[0]['company_city']; ?> </span> <span> <samp>Posted by : </samp> <?php echo $job[0]['cmp_name']; ?> <samp>| Date : </samp>
      <?php $unixTimestamp = strtotime($job[0]['post_date']); echo date('F',$unixTimestamp)." ".date('d',$unixTimestamp).", ".date('Y',$unixTimestamp); ?>
      </span> 
         <span><samp>Category : </samp><?php echo $job[0]['job_category']; ?></span> 
      <div class="collapse jobDetails" id="<?php echo $job[0]['job_id'] ?>">
        <div class="createjob"> 
        <span><samp>Description : </samp><?php echo $job[0]['job_description']; ?></span>
         <span><samp>Requirements : </samp><?php echo $job[0]['job_requirements']; ?></span>
         <span><samp>Category : </samp><?php echo $job[0]['job_category']; ?></span> 
         <span><samp>Contact Person : </samp><?php echo $job[0]['job_contact_name']; ?></span> 
         <span><samp>Contact Mail : </samp><?php echo $job[0]['job_contact_email']; ?></span> </div>
      </div>
      <a class="jobDetailsBtn" data-toggle="collapse" href="#<?php echo $job[0]['job_id'] ?>" aria-expanded="false" aria-controls="collapseExample">Read More</a>
    </div>
    <div class="clearfix"></div>
    </div>
</div>
 <?php  endforeach;  } ?>

 
   
