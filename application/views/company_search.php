   <div class="about-user-details-inner" >
          <section class="my_companys col-lg-12 col-md-12 col-sm-5 col-xs-12 coloumn2 aboutme">
            <ul>  
            <?php if($search_result_companies) { foreach($search_result_companies as $company): ?>
              <li>
                <div class="company_box col-lg-3 col-md-3 col-sm-5"><a href="<?php echo base_url("company/company_disp/".$company['companyinfo_id']) ?>"><img src="<?php echo base_url(); ?>uploads/<?php echo$company['company_image'] ?>" width="135" height="145" alt=""></a></div>
                <div class="company_box_right col-lg-9 col-md-9 col-sm-5">
                  <h3><span><?php echo ucfirst($company['cmp_name']) ?></span></h3>
                  <p>Industry: <?php echo $company['cmp_industry']; ?></p>
                  <p>Established in: <?php $unixTimestamp = strtotime($company['cmp_estb']); echo date('F',$unixTimestamp).", ".date('Y',$unixTimestamp); ?></p>
                  <p>No of Employees: <?php echo $company['cmp_colleagues'] ?></p>
                </div>        
                <div class="clearfix"></div>
              </li>
               <?php endforeach; } else echo "No Details Found";?>     
            </ul>
          </section>
          <div class="clearfix"></div>
        </div>

