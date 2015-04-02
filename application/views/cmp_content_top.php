<?php 		
//$cmp_id = $this->session->userdata('cmp_id');
$data  = $this->jobmodel->check_btn();
$user_id = $this->session->userdata('logged_in')['account_id'];
$cmp_following = $this->companies->following_companies_list();

/*print_r($cmp_following);
exit;*/
 
//$cmp_info = $this->companies->get_cmp_by_id($cmp_id); 
/*print_r($data);
print_r($cmp_info);

print_r( $cmp_info[0]['companyinfo_id'] );
print_r( $data[0]['companyinfo_id'] );
print_r( $data[0]['user_id'] );
echo $user_id;
exit;*/
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
     			<?php 
				
				$companies = array();
				foreach($data as $data){
				$companies[] = $data['companyinfo_id'];
				}
				
					if(!in_array($cmp_info[0]['companyinfo_id'],$companies))
					{
				?>
			
              <input type="button" class="smg" value="Send Massage">
              <?php 
				
				$following_cmps = array();
				if(!$cmp_following)
				{ ?>
               
      <input type="button" class="follow" value="Follow"  id="follow-btn" data-toggle="modal" data-target="#followModal"  /> <!--onclick="cmpFollowPage(<?php // echo $cmp_info[0]['companyinfo_id']; ?>);-->
					
			<?php	}
					else{
				foreach($cmp_following as $cmp){
				$following_cmps[] = $cmp['companyinfo_id'];
				}
				
					if(!in_array($cmp_info[0]['companyinfo_id'],$following_cmps))
					{
              ?>
     <input type="button" class="follow" value="Follow"  id="follow-btn" data-toggle="modal" data-target="#followModal"  /> <!--onclick="cmpFollowPage(<?php // echo $cmp_info[0]['companyinfo_id']; ?>);-->
              
			  <?php }else{ ?>
              <input type="button" class="follow" id ="unfollow-btn" value="UnFollow" onclick="cmpFollowPage(<?php echo $cmp_info[0]['companyinfo_id']; ?>);">
			  <?php }  } }?>
            </div>
          </div>
          <div class="col-md-3">
            <figure class="cmplogo"><img src="<?php echo base_url(); ?>uploads/<?php echo $cmp_info[0]['company_image'] ?>" ></figure>
          </div>
        </div>
      </div>
    </section>