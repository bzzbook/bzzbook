<?php 

$frnds = $this->friendsmodel->related_friends($limit = 2);
if(empty($frnds))
{
$add_frnd_reqs = $this->friendsmodel->finding_friends($limit = 2);
}else{
$add_frnd_reqs = $frnds;
}
//print_r($jobs);
if($add_frnd_reqs){

shuffle($add_frnd_reqs);

?>
        <div class="col-md-12 jobUrIntrested">   
        	<h3>Friends you may be interested in</h3>
            <span id="notFoundSug"></span>
             <?php 
			 	$showlistcount = 1;
                foreach($add_frnd_reqs as $frnd)
                { 
				if($showlistcount<4)
				{
				?>
        	<div id="jobsInner<?php echo $frnd[0]['user_id'];?>" class="col-md-4">
            	<div class="jobsInner" >
               
                	<figure>
                    	<img src="<?php echo base_url();?>uploads/<?php if(!empty($frnd[0]['user_img_thumb'])) echo $frnd[0]['user_img_thumb']; else echo 'default_profile_pic.png'?>" width="67" height="87"  alt=""/>
                    </figure>
                    <h3><?php  $name = $frnd[0]['user_firstname'] . " " .$frnd[0]['user_lastname']; echo substr($name,0,15);if(strlen($name)>15) echo '...'; ?></h3>
                    <p><?php if(isset($frnd[0]['org_name']) && isset($frnd[0]['position']) && $frnd[0]['org_name']!='' && $frnd[0]['position']!=''){ echo substr($frnd[0]['position'].' at '.$frnd[0]['org_name'],0,20); if(strlen($frnd[0]['position'].' at '.$frnd[0]['org_name'])>20) echo '...';}else{ echo '--'; }  ?></p>
					<a onclick="addFrnd(<?php echo $frnd[0]['user_id']; ?>);$(this).html('Request sent');" class="btns btns-green">Add</a>
                </div>
          </div>
          <?php } $showlistcount++; } ?>
         
                     <div class="clearfix"></div>
             <a href="<?php echo base_url().'friends/view_all_reqs/';?>" class="pull-right seeMore">See More Friend Suggestions  <i class="fa fa-caret-right"></i></a> 
                          <div class="clearfix"></div>
        </div>
       
<div class="clearfix"></div>
 <?php }else{ ?>
<?php 

$jobs = $this->jobmodel->get_jobs_by_industries();
//print_r($jobs);
if($jobs):

shuffle($jobs);

?>
        <div class="col-md-12 jobUrIntrested">   
        	<h3>Jobs you may be interested in</h3>
            <span id="notFoundSug"></span>
             <?php 
			 	$showlistcount = 1;
                foreach($jobs as $job)
                { 
				if($showlistcount<4)
				{
				?>
        	<div id="jobsInner<?php echo $job['job_id'];?>" class="col-md-4">
            	<div class="jobsInner" >
                <?php /*?><a href="javascript:void(0);" onclick="hideJobSug(<?php echo $job['job_id'];?>);" id="job_list<?php echo $job['job_id'];?>"  class="fa fa-close"></a><?php */?>
                	<figure>
                    	<img src="<?php echo base_url();?>uploads/<?php if(!empty($job['company_image'])) echo $job['company_image']; else echo 'default_profile_pic.png'?>" width="67" height="87"  alt=""/>
                    </figure>
                    <h3><?php if(strlen($job['job_title'])>15) echo substr($job['job_title'],0,15).'..'; else echo $job['job_title']; ?></h3>
                    <p><?php if(strlen($job['cmp_name'])>15) echo substr($job['cmp_name'],0,15).'..'; else echo $job['cmp_name']; ?></p>
					<a href="<?php echo base_url().'jobs/job_description/'.$job['job_id'].'/'.$job['companyinfo_id']; ?>" class="btns btns-green">View Job</a>
                </div>
          </div>
          <?php } $showlistcount++; } ?>
         
                     <div class="clearfix"></div>
             <a href="<?php echo base_url().'profile/jobs';?>" class="pull-right seeMore">See More jobs  <i class="fa fa-caret-right"></i></a> 
                          <div class="clearfix"></div>
        </div>
        <?php endif; ?>
<div class="clearfix"></div>
<?php } ?>