	<?php 
	$profession_details = $this->profile_set->getprofessionDetails();
?>

	<div class="EduProperty">
                <div class="EduBlock">
                <h3>Job Title</h3>
         
                </div>
                <div class="EduBlock">
                <h3>Years Attended</h3>
          
                </div>
                <div class="EduBlock">
                <h3>Job Description</h3>
 
                </div>
                 <div class="EduBlock pull-right">
          <h3>Options</h3>
                </div>
                <div class="clearfix"></div>
            </div>

        	<?php 
				if(sizeof($profession_details)>0):
				foreach($profession_details as $profdetails):
			?>
               <div class="EduProperty" id="edu_total_row<?php echo $profdetails->professionalinfo_id ?>">
                <div class="EduBlock">
               
                <p><?php echo $profdetails->job_title;?></p>
                </div>
                <div class="EduBlock">
               
                <p><?php echo explode('-',$profdetails->start_date)[0];?> - <?php echo explode('-',$profdetails->end_date)[0];?></p>
                </div>
                <div class="EduBlock">
                
                <p><?php echo $profdetails->job_description;?></p>
                </div>
                 <div class="EduBlock pull-right">
               <a class="link glyphicon glyphicon-pencil prof_edit" href="javascript:void(0);" id="prof_edit_modal<?php echo $profdetails->professionalinfo_id ?>"></a>
                <a class="link glyphicon glyphicon-remove" id="edu_row<?php echo $profdetails->professionalinfo_id;?>" 
                href="<?php echo base_url("profile/profDelete/".$profdetails->professionalinfo_id); ?>" ></a>
                </div>
                <div class="clearfix"></div>
            </div>
            
            <?php endforeach;?>
            <?php endif;?>
