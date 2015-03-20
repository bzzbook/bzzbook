<?php 
//$this->load->model('friendsmodel'); 
$cmp_reqs = $this->companies->other_companies();

?> 
 
 <div class="pendingRequest">
          <h3> Companies to follow </h3>
          <ul id="pendingReqUl">
          <?php if($cmp_reqs) { foreach($cmp_reqs as $req){ ?>
            <li>
              <figure><img src="<?php echo base_url()?>uploads/<?php echo $req->company_image ?>" alt="<?php echo base_url()?>uploads/<?php echo $req->company_image ?>"></figure>
              <div class="disc">
                <h4><?php echo $req->cmp_name; ?></h4>
                <div class="dcBtn"><a href="javascript:void(0);"> View </a><a href="javascript:void(0);"> Follow </a> <!--<a href="javascript:void(0);" onclick="blockFrnd(<?php // echo $req['id']; ?>);"> </a> --></div>
                </div>
            </li>
            <?php } }else echo "No Companies Available"; ?>
           <?php /*?> <li>
              <figure><img src="<?php echo base_url(); ?>images/f2.jpg" alt=""></figure>
              <div class="disc">
                <h4>Nicholos smith</h4>
                <a href="#">Confirm</a><a href="#">Deny</a> </div>
            </li><?php */?>
          </ul>
          <a href="#" class="link">View all</a> 
          
 </div>