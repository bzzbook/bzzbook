<?php 
$result = $this->companies->companies_list(); 
$result1 = $this->companies->following_companies_list();
?>

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
<a href="<?php echo base_url("company/company_disp/".$company->companyinfo_id) ?>"><img src="<?php echo base_url(); ?>uploads/<?php echo $company->company_image  ?>" width="127" height="127" alt=""></a>
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
<a href="<?php echo base_url("company/company_disp/".$company['companyinfo_id']) ?>"><img src="<?php echo base_url(); ?>uploads/<?php echo $company['company_image'] ?>"  width="127" height="127" alt=""></a>
</div>
                    <div class="col-md-7">
                      <h4 class="clear"><?php echo $company['cmp_name'] ?></h4>
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
    </section>