<?php 
	$job_details = $this->jobmodel->get_user_cmp_jobs();
	
?>

<section class="col-lg-6 col-md-6 col-sm-5 col-xs-12 coloumn2 jobsSt">
      <h2>My Jobs</h2>
      <div class="posts">
        
    <div class="groupMainBlock">
    <div class="EduProperty">

                <div class="EduBlock">
                <h3>Job Title</h3>
               
                </div>
                
                <div class="EduBlock">
                <h3>Job Type</h3>
                
                </div>
                <div class="EduBlock">
                <h3>Posted Date</h3>
               
                </div>
                <div class="EduBlock pull-right">
                <h3>Options</h3>
                </div>
                <div class="clearfix"></div>
            </div>
        	<?php 
				if(!$job_details) echo "No Jobs Found!.."; else
				foreach($job_details as $jobs):
			?>
            <div class="EduProperty">
                <div class="EduBlock">
               
                <p><?php echo $jobs['job_title'];?></p>
                </div>
                
                <div class="EduBlock">
                
                <p><?php echo $jobs['job_type']?></p>
                </div>
                <div class="EduBlock">
               
               <p><?php $unixTimestamp = strtotime($jobs['post_date']); echo date('F',$unixTimestamp).", ".date('Y',$unixTimestamp); ?></p>
                </div>
                <div class="EduBlock pull-right">
                <a class="link glyphicon glyphicon-pencil job_edit" href="javascript:void(0);" id="edu_edit_modal<?php echo $jobs['job_id'] ?>" >
                </a>
                <a class="link glyphicon glyphicon-remove" id="edu_row<?php echo $jobs['job_id'];?>" 
                href="<?php echo base_url("jobs/jobDelete/".$jobs['job_id']); ?>" ></a>
                </div>
                <div class="clearfix"></div>
            </div>
            
            <?php endforeach; ?>
           
          
    </div>
</div>
    </section>