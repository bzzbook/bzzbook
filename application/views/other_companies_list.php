<?php 
$cmps = $this->companies->get_companies_to_follow($limit = 2);
if(!empty($cmps))
{
$cmp_reqs =$cmps;
}else{
$cmp_reqs = $this->companies->get_initial_companies($limit = 2);
}
?> 
 
 <div class="pendingRequest">
          <h3> Companies to follow </h3>
        
          <ul id="cmpfollowers">
          <?php if($cmp_reqs) {  foreach($cmp_reqs as $req) { ?>
           
            <li>
              <figure><img src="<?php echo base_url()?>uploads/<?php echo $req['company_image'] ?>" alt="<?php echo base_url()?>uploads/<?php echo $req['company_image'] ?>"></figure>
              <div class="disc">
                <h4><?php echo $req['cmp_name'] ?></h4>
                <div class="dcBtn"><a href="<?php echo base_url("company/company_disp/".$req['companyinfo_id']); ?>"> View </a>
                  <a href="javascript:void(0);" id="sidebar_follow<?php echo $req['companyinfo_id']; ?>" onclick="cmpFollow(<?php echo $req['companyinfo_id']; ?>);"> Follow </a>
              <!--  <a href="javascript:void(0);"  onclick="cmpFollow(<?php //echo $req['companyinfo_id']; ?>);"> Follow </a>
               data-id="<?php // echo $req['companyinfo_id']; ?>" data-toggle="modal" data-target="#followModal1"
              -->
                 <!--<a href="javascript:void(0);" onclick="blockFrnd(<?php // echo $req['id']; ?>);"> </a> --></div>
                </div>
              <div id="qwer">
				</div>
            </li>
          
            <?php }  } else echo "No Companies Available"; ?>
          </ul>
          <a href="<?php echo base_url('company/view_all_other_cmps'); ?>" class="link">View all</a> 
          
 </div>