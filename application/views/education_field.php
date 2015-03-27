<?php 
	$education_details = $this->profile_set->geteducationDetails();
?>

			<div class="EduProperty">
                <div class="EduBlock">
                <h3>Field Of Study</h3>
               
                </div>
                
                <div class="EduBlock">
                <h3>Degree</h3>
                
                </div>
                <div class="EduBlock">
                <h3>Years Attended</h3>
               
                </div>
                <div class="EduBlock pull-right">
                <h3>Options</h3>
                </div>
                <div class="clearfix"></div>
            </div>
        	<?php 
				if(sizeof($education_details)>0):
				foreach($education_details as $edudetails):
			?>
            <div class="EduProperty">
                <div class="EduBlock">
               
                <p><?php echo $edudetails->field_of_study;?></p>
                </div>
                
                <div class="EduBlock">
                
                <p><?php echo $edudetails->degree_certificate;?></p>
                </div>
                <div class="EduBlock">
               
                <p><?php echo explode('-',$edudetails->attended_from)[0];?> - <?php echo explode('-',$edudetails->attended_upto)[0];?></p>
                </div>
                <div class="EduBlock pull-right">
                <a class="link glyphicon glyphicon-pencil edu_edit" href="javascript:void(0);" id="edu_edit_modal<?php echo $edudetails->educationinfo_id ?>" ></a>
                <a class="link glyphicon glyphicon-remove" id="edu_row<?php echo $edudetails->educationinfo_id;?>" 
                href="<?php echo base_url("profile/eduDelete/".$edudetails->educationinfo_id); ?>" ></a>
                </div>
                <div class="clearfix"></div>
            </div>
            
            <?php endforeach;?>
            <?php endif;?>
     