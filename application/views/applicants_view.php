<div class="col-md-9">
            <div class="JobsSearchLayout">
                <h2 class="mainHead"><span class="pull-left" >Applicants</span>   <!--<span class="pull-right searchColumn"><input type="text" placeholder="Search" /><button><i class="fa fa-search"></i></button></span>--></h2>
                <div class="jobSearchListing">
                   
                   
             <?php
			
				   if($applicants)
				   { 
				  // print_r($applicants);
				  // exit;
				   foreach($applicants as $applicant)
				  $user_data = $this->profile_set->get_user_profileinfo($applicant['user_id']); 
				 //  print_r($user_data);
               //   exit;
                   { ?>
                    <div class="job_search applicant_job_search">
                        <div class="optionBox"><img src="<?php echo base_url().'uploads/'.$user_data[0]['user_img_name']; ?>" class="img-responsive"  alt=""  width="120"></div>
                        <div class="aboutJob"><a href="">
                            <h2><?php if(!empty($applicant['name'])) { echo $applicant['name']; } else echo $user_data[0]['user_firstname']." ".$user_data[0]['user_lastname']; ?></h2>
                            <h3><?php if(!empty($applicant['skills'])) { echo $applicant['skills']; } else echo $user_data[0]['professional_skills']; ?></h3>
                           <h3><?php if(!empty($applicant['job_category'])) $data = $this->jobmodel->get_job_type($applicant['job_category']);
							if($data)
							{
								echo $data[0]['lookup_value'];
							} ?></h3>
                            <div class="excrept"><p><?php echo $applicant['email'];?></p></div>
                            <h3><?php echo $applicant['phone'];?></h3>
                            <span class="dated"><?php  $unixTimestamp = strtotime($applicant['applied_datetime']);
				 echo date('d',$unixTimestamp).", ".date('F',$unixTimestamp).", ".date('Y',$unixTimestamp); ?></span>
                        </a></div>
                        <div class="moreOptions">
                            <ul> 
                           
                                <li><a href="#"><i class="fa fa-user"></i><?php echo $user_data[0]['user_firstname']." ".$user_data[0]['user_lastname']; ?></a></li>
                                <li><a href="#"><i class="fa fa-map-marker"></i><?php echo $user_data[0]['location']; ?></a></li>
                                <li><a href="#"><i class="fa fa-bell-o"></i> <?php echo $user_data[0]['profession'];?> </a></li>
                                <li><a href="#"><i class="fa fa-globe"></i><?php echo $user_data[0]['user_country'];?></a></li>
                                <li><a href="<?php echo base_url().'uploads/'.$applicant['resume']; ?>"><i class="fa fa-download"></i>Download Resume</a></li>
                            </ul>
                        </div>
                                            </div>

<?php } }else {?><div style="margin:0px 10px; padding-top:15px;"> <p>No Applicants Found Based On Your Search...</p></div><?php } ?>








                </div>
            </div>
        </div>
        
                        

<?php /*?><section class="col-lg-6 col-md-6 col-sm-5 col-xs-12 coloumn2 jobsSt">
<h2>Applicants</h2>
<div class="joblisting">
<?php if(!$applicants){ echo "No Applicants Found For This Company !.."; } else { foreach($applicants as $applicant): $profile_pic = $this->profile_set->get_profile_pic($applicant['user_id']); if(empty($profile_pic)) $profile_pic='default_profile_pic.png'; else $profile_pic = $profile_pic[0]->user_img_thumb; ?>

  <div class="groupMainBlock">
  <div class="jobProperty">
    <div class="col-md-4 col-sm-12 col-xs-5" style="width:auto"><img src="<?php echo base_url().'uploads/'.$profile_pic; ?>" class="img-responsive"  alt=""  width="120"></div>
    <div class="col-md-8 col-sm-12 col-xs-12 createjob"> <span><samp>Name : </samp><?php echo $applicant['name']; ?></span> <span><samp>Email : </samp><?php echo $applicant['email']; ?> </span> <span> <samp>Phone : </samp> <?php echo $applicant['phone']; ?> </span><span><samp>skills : </samp>
      <?php  echo $applicant['skills']; ?>
      </span> 
         <span><samp>About : </samp><?php echo $applicant['message']; ?></span> 
 
      <a class="jobDetailsBtn" href="<?php echo base_url().'uploads/'.$applicant['resume']; ?>" target="new" aria-expanded="false" aria-controls="collapseExample">Download Resume</a>
    </div>
    <div class="clearfix"></div>
    </div>
</div>

  <?php  endforeach;  } ?>
</div>
</section>
   
<?php */?>