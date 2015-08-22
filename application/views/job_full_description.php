<div class="col-md-9">
            <div class="aboutJobDescription">
                <div class="headTag">
                    <div class="logo">
                        <img src="<?php echo base_url(); ?>uploads/<?php echo $job_desc[0]['company_image']; ?>" alt="" />
                    </div>
                    <div class="data">
                        <h3><?php echo $job_desc[0]['job_title']; ?></h3>
                        <p class="area"><span><?php echo $job_desc[0]['cmp_name']; ?></span> - <?php echo $job_desc[0]['company_city']; ?></p>
                        <span>
                        <?php 
						  $hrsago = $this->customermodel->get_time_difference_php($job_desc[0]['post_date']);
						echo $hrsago;
						?>
                        
                      </span>
                    </div>
                    <?php if($job_applicants) { ?>
                    <div class="totalApplicants">
                        <span><?php echo count($job_applicants); ?></span>
                        <p><?php if(count($job_applicants) == 1) echo "Applicant"; else "Applicants;"?></p>
                    </div>
                    <?php } ?>
                    <div class="clearfix"></div>
                </div>
                <div class="DescriptionTag aboutBlock">
                    <h2>About this Job</h2>
                    <div class="clearfix"></div>
                    <div class="jobSection">
                        <h3><i class="fa fa-file-text"></i> Job description</h3>
                      <!--  <p>Web Designer (4 vacant) only for chennai & Tamil Nadu Candidates</p>-->
                        <p class="exp">Experience : <?php echo $job_desc[0]['experience']; ?></p>
                        <ul>
                        <?php 
						$data = explode('.',$job_desc[0]['job_description']);
						
						foreach($data as $data) { ?>
                        <?php if(!empty($data))
						{?>
                            <li><i class="fa fa-angle-right"></i><?php  echo $data; ?></li>
                         
                          <!--  <li><i class="fa fa-angle-right"></i> Donec sit amet nisl ut risus imperdiet sodales.</li>
                            <li><i class="fa fa-angle-right"></i> Nulla sed nibh non lectus faucibus bibendum nec placerat nibh.</li>
                            <li><i class="fa fa-angle-right"></i> Curabitur placerat diam eget elementum vehicula.</li>
                            <li><i class="fa fa-angle-right"></i> Quisque id mi et neque interdum imperdiet ut non enim.</li>-->
                            <?php }  } ?>
                        </ul>
                        <!--<p>Expected Salary: 1500-2500</p>-->
                    </div>
             
                    <div class="jobSection">
                        <h3><i class="fa fa-mortar-board"></i> Desired Skills and Experience</h3>
                        <p>Skills required</p>                       
                        <ul>
                           <?php 
						$requirements = explode('.',$job_desc[0]['job_requirements']);
						
						foreach($requirements as $req) { ?>
                         <?php if(!empty($req))
						{?>
                            <li><i class="fa fa-angle-right"></i><?php echo $req; ?></li>
                           <!-- <li><i class="fa fa-angle-right"></i> Donec sit amet nisl ut risus imperdiet sodales.</li>
                            <li><i class="fa fa-angle-right"></i> Nulla sed nibh non lectus faucibus bibendum nec placerat nibh.</li>
                            <li><i class="fa fa-angle-right"></i> Curabitur placerat diam eget elementum vehicula.</li>
                            <li><i class="fa fa-angle-right"></i> Quisque id mi et neque interdum imperdiet ut non enim.</li>-->
                       <?php } } ?>
                        </ul>
                        
                    </div>
                           <button class="apply_job_btn" value="Apply_Job" data-toggle="modal" data-target="#Apply_for_Job">Apply Job</button>
                </div>
                <div class="DescriptionTag aboutBlock">
                    <h2>About this company</h2>
                    <div class="clearfix"></div>
                    <div class="companySection">                       
                        <p><?php echo $job_desc[0]['cmp_about']; ?></p>  
                        <?php if($company_jobs) { ?>                    

                        <div class="otherJobs">
                            <h4>Other jobs at <?php echo $job_desc[0]['cmp_name']?></h4>
                            
                            
                            <?php 
							$i = 0;
							foreach($company_jobs as $cmp_job) { 
							
				
							
							if($i == 6)
							break;
							?>
                            <div class="jobMore col-md-4">
                                <h3><a href="<?php echo base_url('jobs/job_description/'.$cmp_job['job_id'].'/'.$cmp_job['company_posted_by']) ?>"><?php echo $cmp_job['job_title']; ?></a></h3>
                                <p><?php echo $cmp_job['country']."-".$cmp_job['job_state']."-".$cmp_job['job_city']; ?></p>
                            </div>
                          <?php $i++; } ?>
                            <div class="clearfix"></div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
<?php if($similar_jobs) { ?>
                <div class="DescriptionTag aboutBlock">
                    <h2>Similar Jobs</h2>
                    <div class="clearfix"></div>
                   <div class="similarJob">
                       
<?php
$j = 0;
 foreach($similar_jobs as $job) {
	 if($j == 4)
	 break;
	 
	 
	  ?>
                       

                       <div class="col-md-6">
                           <div class="img">
                               <div class="imgHolder"><img src="<?php echo base_url(); ?>uploads/<?php echo $job['company_image']; ?>" /></div>
                           </div>
                           <div class="content">
                               <h3><a href="<?php echo base_url('jobs/job_description/'.$job['job_id'].'/'.$job['company_posted_by']) ?>"><?php echo $job['job_title']; ?></a></h3>
                               <p><?php echo $job['country']."-".$job['job_state']."-".$job['job_city']; ?></p>
                               <p class="postTime"> <?php 
						  $hrsago = $this->customermodel->get_time_difference_php($job['post_date']);
						echo $hrsago;
						?></p>
                           </div>
                       </div>

<?php $j++; } ?>
                       <div class="clearfix"></div>
                   </div>
                </div>
                <?php } ?>
            </div>
        </div>
        
                        <!----------------job_apply_modal --------------------------->


<div class="modal fade" id="Apply_for_Job" tabindex="-1" role="dialog" aria-labelledby="myModalLabe" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div id="comperrormsg"></div>
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabe">Apply Jobs</h4>
      </div>
      <div class="modal-body">
        <form name="company_form" id="company_form" action="<?php echo base_url()."company/applyjob/".$job_desc[0]['company_posted_by']."/".$job_desc[0]['job_id']; ?>" onsubmit="return validateJobForm();" enctype="multipart/form-data" method="post">
          
          <div class="form-group">
            <label for="exampleInputEmail1">Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Name">
          </div>
          <div class="apply form-group">
            <label for="exampleInputEmail1">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Phone</label>
            <input type="Phone" class="form-control" id="phone" name="phone" placeholder="phone">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Skills</label>
            <input type="Phone" class="form-control" id="skills" name="skills" placeholder="Skills">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Message</label>
            <textarea rows="4" class="form-control" id="message" name="message" placeholder="Your Cover letter/message sent to the employer"></textarea>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Upload to CV</label>
        <div class="row">
										<div class="upload_cv col-md-12">
											<input type="file" data-buttontext="Find file" class="form-control" id="filestyle-2" name="userfile" style="position: absolute; clip: rect(0px, 0px, 0px, 0px);" tabindex="-1" onchange="getFileData(this);"><div class="bootstrap-filestyle input-group"><input readonly="readonly" type="text" id="txtUserfile" class="form-control " /> <span class="group-span-filestyle input-group-btn" tabindex="0">
                                            <label class="btn btn-default " for="filestyle-2"><span class="glyphicon glyphicon-folder-open"></span> Browse</label></span></div>
										</div>
									</div>
                                    
          </div>
          <div class="boxunderline">Maximum upload file size: 2 MB</div>
        
        
         <input class="btn3 btn-yellow" type="submit" value="Send application" name="submit"/></form>
        </div>
        <div class="clearfix"></div>
      </div>
    </div>
  </div>
<!----------------------------------------------------------->