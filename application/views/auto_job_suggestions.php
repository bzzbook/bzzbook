<?php 

$add_frnd_reqs = $this->friendsmodel->related_friends($limit = 2);
/*if(empty($frnds))
{
$add_frnd_reqs = $this->friendsmodel->finding_friends($limit = 2);
}else{
$add_frnd_reqs = $frnds;
}
*///print_r($jobs);
if($add_frnd_reqs){

shuffle($add_frnd_reqs);

?>
        <div id="autoSugfrdContainer" class="col-md-12 jobUrIntrested">   
        	<h3>Friends you may be interested in</h3>
            <span id="notFoundSug"></span>
            <div id="auto-suggest-friends">
            <div class="itemControl">
             <?php 
			 	
                foreach($add_frnd_reqs as $frnd)
                { 
				
				?>
        	<div class="floatleft" id="jobsInner<?php echo $frnd[0]['user_id'];?>">
            	<div class="jobsInner" >
               <a href="javascript:void(0);" onclick="skipFrnd(<?php echo $frnd[0]['user_id'];?>);autoSugAddFrd()" class="skip fa fa-close"></a>
                	<figure>
                    	<img src="<?php echo base_url();?>uploads/<?php if(!empty($frnd[0]['user_img_thumb'])) echo $frnd[0]['user_img_thumb']; else echo 'default_profile_pic.png'?>" width="67" height="87"  alt=""/>
                    </figure>
                    <h3><?php  $name = $frnd[0]['user_firstname'] . " " .$frnd[0]['user_lastname']; echo substr($name,0,15);if(strlen($name)>15) echo '...'; ?></h3>
                    <p><?php if(isset($frnd[0]['org_name']) && isset($frnd[0]['position']) && $frnd[0]['org_name']!='' && $frnd[0]['position']!=''){ echo substr($frnd[0]['position'].' at '.$frnd[0]['org_name'],0,20); if(strlen($frnd[0]['position'].' at '.$frnd[0]['org_name'])>20) echo '...';}else{ echo '--'; }  ?></p>
					<a class="skip" onclick="addFrnd(<?php echo $frnd[0]['user_id']; ?>);$(this).html('Request sent');autoSugAddFrd();" class="btns btns-green">Add</a>
                </div>
          </div>
          <?php  } ?></div></div>
         
                     <div class="clearfix"></div>
             <a href="<?php echo base_url().'friends/view_all_reqs/';?>" class="pull-right seeMore">See More Friend Suggestions  <i class="fa fa-caret-right"></i></a> 
                          <div class="clearfix"></div>
        </div>
       
<div class="clearfix"></div>
 <?php } ?>
<?php 

$jobs = $this->jobmodel->get_jobs_by_industries();
//print_r($jobs);
if($jobs):

shuffle($jobs);

?>
        <div id="autoSugJobContainer" class="col-md-12 jobUrIntrested">   
        	<h3>Jobs you may be interested in</h3>
            <span id="notFoundSug"></span>
             <div id="auto-suggest-jobs">
            <div class="itemControl">
             <?php 
			 
                foreach($jobs as $job)
                { 
				
				?>
        	<div class="floatleft" id="jobsInner<?php echo $job['job_id'];?>" >
            	<div class="jobsInner" >
                <a href="javascript:void(0);" onclick="autoSughideJob(<?php echo $job['job_id'];?>);" class="skip fa fa-close"></a>
                	<figure>
                    	<img src="<?php echo base_url();?>uploads/<?php if(!empty($job['company_image'])) echo $job['company_image']; else echo 'default_profile_pic.png'?>" width="67" height="87"  alt=""/>
                    </figure>
                    <h3><?php if(strlen($job['job_title'])>15) echo substr($job['job_title'],0,15).'..'; else echo $job['job_title']; ?></h3>
                    <p><?php if(strlen($job['cmp_name'])>15) echo substr($job['cmp_name'],0,15).'..'; else echo $job['cmp_name']; ?></p>
					<a onclick="autoSughideJobSug(<?php echo $job['job_id'].','.$job['companyinfo_id'] ; ?>)" href="javascript:void(0);" class="btns btns-green">View Job</a>
                </div>
          </div>
          <?php } ?></div></div>
         
                     <div class="clearfix"></div>
             <a href="<?php echo base_url().'profile/jobs';?>" class="pull-right seeMore">See More jobs  <i class="fa fa-caret-right"></i></a> 
                          <div class="clearfix"></div>
        </div>
        <?php endif; ?>
<div class="clearfix"></div>
