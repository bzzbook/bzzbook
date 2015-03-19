<?php 
	$group_details = $this->profile_set->getgroupDetails();
?>

 <div class="EduProperty">
                <div class="EduBlock">
                <h3>Group Name</h3>
            
                </div>
                <div class="EduBlock">
                <h3>Website Url</h3>
  
                </div>
                <div class="EduBlock">
                <h3>Additional Information</h3>
     
                </div>
                 <div class="EduBlock pull-right">
                <h3>Options</h3>
                </div>
                <div class="clearfix"></div>
            </div>

<?php 
				if(sizeof($group_details)>0):
				foreach($group_details as $grpdetails):
			?>
            <div class="EduProperty" id="edu_total_row<?php echo $grpdetails->groupinfo_id ?>">
                <div class="EduBlock">
               
                <p><?php echo $grpdetails->group_name ?></p>
                </div>
                <div class="EduBlock">
                
                <p><?php echo $grpdetails->group_web_url ?></p>
                </div>
                <div class="EduBlock">
            
                <p><?php echo $grpdetails->group_about ?></p>
                </div>
                 <div class="EduBlock pull-right">
                <a class="link glyphicon glyphicon-pencil grp_edit" href="javascript:void(0);" id="grp_edit_modal<?php echo $grpdetails->groupinfo_id ?>" ></a>
                <a class="link glyphicon glyphicon-remove" id="edu_row<?php echo $grpdetails->groupinfo_id ?>" 
                href="<?php echo base_url("profile/grpDelete/".$grpdetails->groupinfo_id); ?>" ></a>
                </div>
                <div class="clearfix"></div>
            </div>
            
            <?php endforeach;?>
            <?php endif;?>