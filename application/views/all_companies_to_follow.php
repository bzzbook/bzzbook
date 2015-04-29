<?php 
$cmps = $this->companies->get_companies_to_follow($limit = 0);
if(!empty($cmps))
{
$cmp_reqs =$cmps;
}else{
$cmp_reqs = $this->companies->get_initial_companies($limit = 0);
}
?> 
<section class="col-lg-9 col-md-9 nopad">
      <div class="col-xs-12 ProfileView">
        <section class="visitorBox">
          <div class="visitiBoxInner">
            <figure class="compCover"><img alt="" src="<?php echo base_url(); ?>images/about_banner.jpg" class="img-responsive"></figure>
             <?php  $image = $this->profile_set->get_profile_pic();
			         $data = $this->profile_set->get_userinfo(); ?>
                         <?php $attr = array('id' => 'upload_pfpic', 'name' => 'upload_file'); ?> 
              <?php echo form_open_multipart('profile/do_upload',$attr);?>
            <div class="profileLogo">
              <figure class="cmplogo"> <img src="<?php echo base_url();?>uploads/<?php if(!empty($image[0]->user_img_thumb)) echo $image[0]->user_img_thumb; else echo 'default_profile_pic.png'; ?>" alt="<?php echo base_url();?>uploads/<?php if(!empty($image[0]->user_img_thumb)) echo $image[0]->user_img_thumb; else echo 'default_profile_pic.png'; ?>"></figure>
              <!-- <span class="inside glyphicon glyphicon-camera" ></span>--> 
            </div>
            <h4 class="profile-name"><?php echo $data[0]['user_firstname']." ".$data[0]['user_lastname'] ?></h4>
            <a href="#"><span class="glyphicon glyphicon-camera change-photo fileinput-button" aria-hidden="true"><em>Change Picture</em> <input type="file" name="userfile" id="pfpic" size="20" required/></span></a></form>
            <div class="ProfileViewNav"></div>
          </div>
        </section>
      </div>
      <section class="about-user-details">
        <h4><span aria-hidden="true" class="glyphicon glyphicon-user"></span>Other Companies To Follow
        </h4>
        <div class="about-user-details-inner" >
          <section class="my_companys col-lg-12 col-md-12 col-sm-5 col-xs-12 coloumn2 aboutme">
            <ul>  
           <?php if($cmp_reqs) {  foreach($cmp_reqs as $req) { ?>
           
              <li>
                <div class="company_box col-lg-3 col-md-3 col-sm-5"><a href="<?php echo base_url("company/company_disp/".$req['companyinfo_id']) ?>"><img src="<?php echo base_url()?>uploads/<?php echo $req['company_image'] ?>" alt="<?php echo base_url()?>uploads/<?php echo $req['company_image'] ?>" width="135" height="145"></a></div>
                <div class="company_box_right col-lg-9 col-md-9 col-sm-5">
                  <h3><span><?php echo ucfirst($req['cmp_name']) ?></span></h3>
                  <p>Industry: <?php echo $req['cmp_industry']; ?></p>
        <p>Established in:<?php echo $req['cmp_estb']; ?></p>
                  <p>No of Employees: <?php echo $req['cmp_estb']; ?></p>
        <div class="btn3 btn-yellow" ><a href="javascript:void(0)" onclick="cmpFollow(<?php echo $req['companyinfo_id']; ?>);";>Follow</a></div>
          <div class="btn3 btn-green"><a href="<?php echo  base_url("company/company_disp/".$req['companyinfo_id']) ?>">View Profile</a></div>
         
                </div>        
                <div class="clearfix"></div>
              </li>
              <?php }  } else echo "No Companies Available"; ?>
            </ul>
          </section>
          <div class="clearfix"></div>
        </div>
      </section>
    </section>
