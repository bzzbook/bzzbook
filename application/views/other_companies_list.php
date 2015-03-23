<?php 
$cmp_reqs = $this->companies->get_companies_to_follow();

?> 
 
 <div class="pendingRequest">
          <h3> Companies to follow </h3>
          <ul id="pendingReqUl">
          <?php if($cmp_reqs) { foreach($cmp_reqs as $req){ ?>
            <li>
              <figure><img src="<?php echo base_url()?>uploads/<?php echo $req['company_image'] ?>" alt="<?php echo base_url()?>uploads/<?php echo $req['company_image'] ?>"></figure>
              <div class="disc">
                <h4><?php echo $req['cmp_name'] ?></h4>
                <div class="dcBtn"><a href="javascript:void(0);"> View </a>
                <a href="<?php echo base_url("company/cmp_follow/".$req['companyinfo_id']); ?>"> Follow </a>
                 <!--<a href="javascript:void(0);" onclick="blockFrnd(<?php // echo $req['id']; ?>);"> </a> --></div>
                </div>
            </li>
            <?php } }else echo "No Companies Available"; ?>
          </ul>
          <a href="#" class="link">View all</a> 
          
 </div>