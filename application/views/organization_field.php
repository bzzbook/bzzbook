<?php 
	$organization_details = $this->profile_set->getorganizationDetails($user_id='');
?>
<div class="EduProperty">
                <div class="EduBlock">
                <h3>Organization Name</h3>

                </div>
                <div class="EduBlock">
                <h3>Position</h3>

                </div>
                <div class="EduBlock">
                <h3>Years Worked</h3>

                </div>
                
               <!-- <div class="EduBlock">
                <h3>Status</h3>
             
                </div>-->
                 <div class="EduBlock pull-right">
           			<h3>Options</h3>
                </div>
                <div class="clearfix"></div>
            </div>
      	<?php 
				if(sizeof($organization_details)>0):
				foreach($organization_details as $orgdetails):
			?>
            <div class="EduProperty" id="edu_total_row<?php echo $orgdetails->organization_id ?>">
                <div class="EduBlock">
          
                <p><?php echo $orgdetails->org_name;?></p>
                </div>
             <div class="EduBlock">
                <p><?php echo $orgdetails->position;?></p>
                </div>
                 <div class="EduBlock">
                <p><?php echo explode('-',$orgdetails->start_date)[0];?> - <?php echo explode('-',$orgdetails->end_date)[0];?></p>
                </div>
              
                
               <!-- <p><?php /*?><?php if($orgdetails->emp_status == 'wor')
							{ echo "working";
							}elseif($orgdetails->emp_status == 'res'){
								echo "resigned";
							}else
							{
								echo "freelancer";
							}
								
				?><?php */?></p>-->
          
                 <div class="EduBlock pull-right">
           <a class="link glyphicon glyphicon-pencil org_edit" href="javascript:void(0);" id="org_edit_modal<?php echo $orgdetails->organization_id ?>"></a>
                <a class="link glyphicon glyphicon-remove" id="edu_row<?php echo $orgdetails->organization_id;?>" 
                href="<?php echo base_url("profile/orgDelete/".$orgdetails->organization_id); ?>" ></a>
                </div>
                <div class="clearfix"></div>
            </div>
            
            <?php endforeach;?>
            <?php endif;?>