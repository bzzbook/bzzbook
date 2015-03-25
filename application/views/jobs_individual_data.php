
<div class="groupMainBlock">
<?php foreach($jobs as $job): ?>
          <div class="jobProperty">
            <div class="col-md-4 col-sm-12 col-xs-5" style="width:auto"><img src="<?php echo base_url().'uploads/'.$job['company_image']; ?>" class="img-responsive"  alt=""  width="120"></div>
            <div class="col-md-8 col-sm-12 col-xs-12 createjob">
              <span><samp>Title: </samp><?php echo $job['job_title']; ?></span>
                <span><samp>Location: </samp><?php echo $job['company_country'].', '.$job['company_state'].', '.$job['company_city']; ?> </span>
                <span>
                <samp>Posted by: </samp>
                <?php echo $job['cmp_name']; ?>
                <samp>| Date: </samp>
                <?php $unixTimestamp = strtotime($job['post_date']); echo date('F',$unixTimestamp)." ".date('d',$unixTimestamp).", ".date('Y',$unixTimestamp); ?></span>
               <span><samp>Description: </samp><?php echo $job['job_description']; ?></span>
            </div>
            <div class="clearfix"></div>
          </div>
    <?php endforeach; ?>      
        </div>