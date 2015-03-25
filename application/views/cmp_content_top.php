<?php 		
$id = $this->session->userdata('cmp_id');

$cmp_info = $this->companies->get_cmp_by_id($id); 
?>
<section class="midbody container company">
  <div class="row">
    <section class="visitorBox col-xs-12">
      <div class="visitiBoxInner">
        <figure class="compCover"><img class="img-responsive" src="<?php echo base_url(); ?>images/url.jpg" alt=""></figure>
        <div class="companyDetails">
          <div class="col-md-9">
            <div class="cmpContent">
              <h2><span class="glyphicon glyphicon-briefcase"></span><?php echo $cmp_info[0]['cmp_name'] ?></h2>
              <p> <span><?php echo $cmp_info[0]['company_state'] ?>,<?php echo $cmp_info[0]['company_city'] ?></span> <span><?php echo $cmp_info[0]['cmp_industry'] ?></span> <span>Established Since: <span><?php $unixTimestamp = strtotime($cmp_info[0]['cmp_estb']); echo date('F',$unixTimestamp).", ".date('Y',$unixTimestamp); ?></span> <span>Number Of Employees: ( <?php echo $cmp_info[0]['cmp_colleagues'] ?> ) </span> </p>
              <input type="button" class="smg" value="Send Massage">
              <input type="button" class="follow" value="Follow">
            </div>
          </div>
          <div class="col-md-3">
            <figure class="cmplogo"><img src="<?php echo base_url(); ?>uploads/<?php echo $cmp_info[0]['company_image'] ?>" ></figure>
          </div>
        </div>
      </div>
    </section>