<?php 
$uid = '';
if(!empty($user_id)){
$uid = $user_id;	
}
$result = $this->companies->companies_list(0,$uid); 
$result1 = $this->companies->following_companies_list(0,$uid);
?>
<section class="col-lg-9 col-md-9 nopad">
      <div class="col-xs-12 ProfileView">
        <section class="visitorBox">
          <div class="visitiBoxInner">
            <figure class="compCover"><img alt="" src="<?php echo base_url(); ?>images/about_banner.jpg" class="img-responsive"></figure>
             <?php  $image = $this->profile_set->get_profile_pic($uid);
			         $data = $this->profile_set->get_userinfo($uid); ?>
                         <?php $attr = array('id' => 'upload_pfpic', 'name' => 'upload_file'); ?> 
              <?php echo form_open_multipart('profile/do_upload',$attr);?>
            <div class="profileLogo">
              <figure class="cmplogo"> <img src="<?php echo base_url();?>uploads/<?php if(!empty($image[0]->user_img_thumb)) echo $image[0]->user_img_thumb; else echo 'default_profile_pic.png'; ?>" alt="<?php echo base_url();?>uploads/<?php if(!empty($image[0]->user_img_thumb)) echo $image[0]->user_img_thumb; else echo 'default_profile_pic.png'; ?>"></figure>
              <!-- <span class="inside glyphicon glyphicon-camera" ></span>--> 
            </div>
            <h4 class="profile-name"><?php echo $data[0]['user_firstname']." ".$data[0]['user_lastname'] ?></h4>
           <?php if(empty($user_id)){ ?><a href="#"><span class="glyphicon glyphicon-camera change-photo fileinput-button" aria-hidden="true"><em>Change Picture</em> <input type="file" name="userfile" id="pfpic" size="20" required/></span></a><?php } ?></form>
            <div class="ProfileViewNav"></div>
          </div>
        </section>
      </div>
      <section class="about-user-details">
        <h4><span aria-hidden="true" class="glyphicon glyphicon-user"></span> My Companies
         <?php if(empty($user_id)) { ?> <button data-toggle="modal" data-target="#AddCompany" class="btn2 btn-black" type="button">Add Company</button><?php } ?>
        </h4>
        <div class="about-user-details-inner" >
          <section class="my_companys col-lg-12 col-md-12 col-sm-5 col-xs-12 coloumn2 aboutme">
            <ul>  
            <?php if($result) { foreach($result as $company): ?>
              <li>
                <div class="company_box col-lg-3 col-md-3 col-sm-5"><a href="<?php echo base_url("company/company_disp/".$company->companyinfo_id) ?>"><img src="<?php echo base_url(); ?>uploads/<?php echo $company->company_image  ?>" width="135" height="145" alt=""></a></div>
                <div class="company_box_right col-lg-9 col-md-9 col-sm-5">
                  <h3><span><?php echo ucfirst($company->cmp_name) ?></span></h3>
                  <p>Industry: <?php echo $company->cmp_industry; ?></p>
                  <p>Established in: <?php echo $company->cmp_estb; ?></p>
                  <p>No of Employees: <?php echo $company->cmp_colleagues; ?></p>
                </div>        
                <div class="clearfix"></div>
              </li>
               <?php endforeach; } else echo "No Details Found";?>     
            </ul>
          </section>
          <div class="clearfix"></div>
        </div>
      </section>
      <section class="about-user-details">
        <h4><span aria-hidden="true" class="glyphicon glyphicon-user"></span> Companies I'm Following </h4>
        <div class="about-user-details-inner" >
          <section class="my_companys col-lg-12 col-md-12 col-sm-5 col-xs-12 coloumn2 aboutme">
            <ul>
              <?php if($result1) { foreach($result1 as $company): ?>
              <li>
                <div class="company_box col-lg-3 col-md-3 col-sm-5"><a href="<?php echo base_url("company/company_disp/".$company['companyinfo_id']) ?>"><img src="<?php echo base_url(); ?>uploads/<?php echo $company['company_image'] ?>"  width="135" height="145" alt="<?php echo ucfirst($company['cmp_name']) ?>"></a></div>
                <div class="company_box_right col-lg-9 col-md-9 col-sm-5">
                  <h3><span><?php echo ucfirst($company['cmp_name']) ?></span></h3>
                  <p>Industry: <?php echo $company['cmp_industry'] ?></p>
                  <p>Established in: <?php $unixTimestamp = strtotime($company['cmp_estb']); echo date('F',$unixTimestamp).", ".date('Y',$unixTimestamp); ?></p>
                  <p>No of Employees: <?php echo $company['cmp_colleagues'] ?></p>
               <div class="btn3 btn-black"><a href="<?php echo base_url("company/cmp_unfollow/".$company['companyinfo_id']) ?>">Unfollow</a></div>
           <div class="btn3 btn-green"><a href="<?php echo  base_url("company/company_disp/".$company['companyinfo_id']) ?>">View Profile</a></div>
                </div>
                
                <div class="clearfix"></div>
              </li>
              <?php endforeach; } else echo "No Details Found";?> 
            </ul>
          </section>
          <div class="clearfix"></div>
        </div>
      </section>
    </section>
<?php /*?>
<section class="col-lg-6 col-md-6 col-sm-5 col-xs-12 coloumn2 pfSettings">
      <h2>My Companies <button data-toggle="modal" data-target="#AddCompany" class="btn btn-primary createbutton fright" type="button">Add Company</button></h2>
      <div class="posts">
        <div role="tabpanel"> 
          <!-- Nav tabs -->
          <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#my_companies" aria-controls="profile" role="tab" data-toggle="tab">My Companies</a></li>
            <li role="presentation"><a href="#companies_following" aria-controls="messages" role="tab" data-toggle="tab">Companies I'm Following</a></li>
          
          </ul>
          
          <!-- Tab panes -->
          <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="my_companies">
             <?php if($result) { foreach($result as $company): ?>
             <div class="companyFollow col-md-12">
             
               <div class="col-md-4 im">
<a href="<?php echo base_url("company/company_disp/".$company->companyinfo_id) ?>"><img src="<?php echo base_url(); ?><?php echo base_url(); ?>uploads/<?php echo $company->company_image  ?>" width="127" height="127" alt=""></a>
</div>
                    <div class="col-md-7">
                      <h4 class="clear"><?php echo ucfirst($company->cmp_name) ?></h4>
                      <p>Industry: <?php echo $company->cmp_industry ?></p>
                      <p>Established in: <?php $unixTimestamp = strtotime($company->cmp_estb); echo date('F',$unixTimestamp).", ".date('Y',$unixTimestamp); ?></p>
                      <p>No of Employees: <?php echo $company->cmp_colleagues ?></p>
                    </div>
                             
              </div>
               <div class="clear"></div> 
               <?php endforeach; } else echo "No Details Found";?>      
            </div>
            <div role="tabpanel" class="tab-pane" id="companies_following">
               <?php if($result1) { foreach($result1 as $company): ?>
              <div class="companyFollow col-md-12">
               <div class="col-md-4 im">
<a href="<?php echo base_url("company/company_disp/".$company['companyinfo_id']) ?>"><img src="<?php echo base_url(); ?><?php echo base_url(); ?>uploads/<?php echo $company['company_image'] ?>"  width="127" height="127" alt=""></a>
</div>
                    <div class="col-md-7">
                      <h4 class="clear"><?php echo ucfirst($company['cmp_name']) ?></h4>
                      <p>Industry: <?php echo $company['cmp_industry'] ?></p>
                      <p>Established in: <?php $unixTimestamp = strtotime($company['cmp_estb']); echo date('F',$unixTimestamp).", ".date('Y',$unixTimestamp); ?></p>
                      <p>Employes on Bzzbook: <?php echo $company['cmp_colleagues'] ?></p>
                    </div>
                    <div class="clear"></div>
                <div class="col-md-6 col-md-push-7"> <a class="btn btn-info black" href="<?php echo base_url("company/company_disp/".$company['companyinfo_id']) ?>">view Profile</a>
                 <a class="btn btn-info gray" href="<?php echo base_url("company/cmp_unfollow/".$company['companyinfo_id']) ?>">unfollow</a> </div>
              </div>
              
              
              <div class="clear"></div>
               <?php endforeach; } else echo "No Details Found";?>  
            </div>
          </div>
        </div>
      </div>
    </section><?php */?>