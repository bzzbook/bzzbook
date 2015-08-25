<div class="col-md-9">
            <div class="JobsSearchLayout">
                <h2 class="mainHead"><span class="pull-left" style="margin-top:7px;">Jobs</span> 
                
                         <?php 	
				 $data  = $this->jobmodel->check_btn();		
				$companies_data = array();
				if(!empty($data))
				{
				foreach($data as $data){
				$companies_data[] = $data['companyinfo_id'];
				}
				
					if(in_array($cmp_info[0]['companyinfo_id'],$companies_data))
					{
              ?>
		<button type="button" class="btn btn-primary createbutton fright" data-toggle="modal" data-target="#cr_jobs_modal">Create Job</button>
        <?php } } ?>
                
                
                
        
          
                
                  <!--<span class="pull-right searchColumn"><input type="text" placeholder="Search" /><button><i class="fa fa-search"></i></button></span>--></h2>
                <div class="jobSearchListing">
                   
                   
             <?php
			
				   if($jobs)
				   { 
				   foreach($jobs as $job) 
                  
                   { ?>
                    <div class="job_search">
                        <div class="optionBox"></div>
                        <div class="aboutJob"><a href="<?php echo base_url('jobs/cmp_job_description/'.$job['job_id'].'/'.$job['company_posted_by']) ?>">
                            <h2><?php echo $job['job_title']; ?></h2>
                            <h3><?php 
							$data = $this->jobmodel->get_job_type($job['job_category']);
							if($data)
							{
								echo $data[0]['lookup_value'].',  ';
							}
							echo  $job['cmp_name'];
							
							?></h3>
                           <h3><?php echo $job['country'].",".$job['experience']; ?></h3>
                            <div class="excrept"><p><?php echo character_limiter($job['job_description'],250); ?></p></div>
                            <h3>Keyskills: <?php echo $job['job_keyword']; ?></h3>
                            <span class="dated"><?php $unixTimestamp = strtotime($job['post_date']);
				 echo date('d',$unixTimestamp).", ".date('F',$unixTimestamp).", ".date('Y',$unixTimestamp); ?></span>
                        </a></div>
                        <div class="moreOptions">
                            <ul>
                                <li><a href="#" data-target="#Apply_for_Job" data-toggle="modal"><i class="fa fa-hand-o-up"></i> Apply</a></li>
                                <li>
                               
                            <a href="<?php echo base_url('jobs/similarjobs?job_id='.$job['job_id'].'&company_id='.$job["company_posted_by"].'&job_title='.$job['job_title'].'&job_keyword='.$job['job_keyword'].'&country='.$job['country'].'&company_country='. $job['company_country'].'&company_name='. $job['cmp_name'].''); ?>"><i class="fa fa-search"></i> Similar jobs</a></li>
                                <li><a href="#"><i class="fa fa-share-square-o"></i> Share </a></li>
                               <?php /*?> <li><a href="<?php echo base_url('jobs/disp_all_cmp_jobs/'.$job['company_posted_by'].'/'.$job['job_id'])?>"><i class="fa fa-briefcase"></i> All Jobs by this Company</a></li><?php */?>
                                <li><a href="<?php echo base_url('company/company_disp/'.$job['company_posted_by'])?>"><i class="fa fa-building"></i> Company Profile</a></li>
                            </ul>
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
        <form name="company_form" id="company_form" action="<?php echo base_url()."company/applyjob/".$job['company_posted_by']."/".$job['job_id']; ?>" onsubmit="return validateJobForm();" enctype="multipart/form-data" method="post">
          
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
                        
                        
                    </div>

<?php } }else {?><div style="margin:0px 10px; padding-top:15px;"> <p>No Jobs Found Based On Your Search...</p></div><?php } ?>








                </div>
            </div>
        </div>
        