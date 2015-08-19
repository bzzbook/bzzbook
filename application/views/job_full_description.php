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