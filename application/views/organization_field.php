<?php 
	$organization_details = $this->profile_set->getorganizationDetails();
?>

      	<?php 
				if(sizeof($organization_details)>0):
				foreach($organization_details as $orgdetails):
			?>
            <div class="EduProperty" id="edu_total_row<?php echo $orgdetails->orginfo_id ?>">
                <div class="EduBlock">
                <h3>Organization Name</h3>
                <p><?php echo $orgdetails->org_name;?></p>
                </div>
                <div class="EduBlock">
                <h3>Position</h3>
                <p><?php echo $orgdetails->position;?></p>
                </div>
                <div class="EduBlock">
                <h3>Years Worked</h3>
                <p><?php echo explode('-',$orgdetails->start_date)[0];?> - <?php echo explode('-',$orgdetails->end_date)[0];?></p>
                </div>
                <div class="EduBlock">
                <h3>Status</h3>
                <p><?php echo $orgdetails->emp_status;?></p>
                </div>
                 <div class="EduBlock pull-right">
           <a class="link glyphicon glyphicon-pencil org_edit" href="javascript:void(0);" id="org_edit_modal<?php echo $orgdetails->orginfo_id ?>"></a>
                <a class="link glyphicon glyphicon-remove" id="edu_row<?php echo $orgdetails->orginfo_id;?>" 
                href="<?php echo base_url("profile/orgDelete/".$orgdetails->orginfo_id); ?>" ></a>
                </div>
                <div class="clearfix"></div>
            </div>
            
            <?php endforeach;?>
            <?php endif;?>