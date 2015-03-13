<section class="col-lg-6 col-md-6 col-sm-5 col-xs-12 coloumn2 aboutme">
      <h2>Business Details</h2>
     
      <div class="posts">
      <div class="col-md-5">
        <ul class="nav-tabs" role="tablist" id="myTab">
        <li role="presentation" class="active"><a href="#prof_exp" aria-controls="home" role="tab" data-toggle="tab">Proffesional Experience</a></li>
        <li role="presentation"><a href="#organization" aria-controls="profile" role="tab" data-toggle="tab">Organizations</a></li>
        <li role="presentation"><a href="#group" aria-controls="messages" role="tab" data-toggle="tab">Groups</a></li>
        </ul>
      </div>  
        <div class="tab-content col-md-7">

        <div role="tabpanel" class="tab-pane active" id="prof_exp">
        <?php if($profession_details) { foreach($profession_details as $profdetails):?> 

        <h4>Job Title</h4>
        <p><?php echo $profdetails->job_title?></p>
        <h4>Worked Duration</h4>
        <p><?php echo explode('-',$profdetails->start_date)[0];?> - <?php echo explode('-',$profdetails->end_date)[0];?></p>
         <h4>Job Description</h4>
        <p><?php echo $profdetails->job_description?></p>
         <h4>Employement Status</h4>
        <p><?php echo $profdetails->current_job?></p>
         <?php endforeach; } else echo "No Details Found"; ?>
        </div>
 
        <div role="tabpanel" class="tab-pane" id="organization">
        <?php if($organization_details) { foreach($organization_details as $orgdetails): ?>
        <h4>Organization Name</h4>
        <p><?php echo $orgdetails->org_name; ?></p>
        <h4>Positiion</h4>
        <p><?php echo $orgdetails->position; ?></p>
        <h4>Organization Description</h4>
        <p><?php echo $orgdetails->org_desc; ?></p>
        <h4>Worked Duration</h4>
        <p><?php echo $orgdetails->start_date; ?> To <?php echo $orgdetails->end_date; ?> </p>
        <h4>Employement Status</h4>
        <p><?php echo $orgdetails->emp_status; ?></p>
         <?php endforeach; } else echo "No Details Found";?>
        </div>
       
        <div role="tabpanel" class="tab-pane" id="group">
        <?php if($group_details) { foreach($group_details as $groupdetails): ?>

         <h4>Group Name</h4>
        <p><?php echo $groupdetails->grp_name;?></p>
         <h4>Group Type</h4>
        <p><?php echo $groupdetails->grp_type;?></p>
         <h4>Website Address</h4>
        <p><?php echo $groupdetails->web_url;?></p>
         <h4>Location</h4>
        <p><?php echo $groupdetails->state;?>,
        <?php echo $groupdetails->city;?>,
        <?php echo $groupdetails->postal_code;?></p>
         <h4>Additional Information</h4>
        <p><?php echo $groupdetails->additional_info;?></p>
                  <?php endforeach; } else echo "No Details Found";?>

         </div>
        </div>
        <div class="clear"></div>
      </div>
     
    </section>