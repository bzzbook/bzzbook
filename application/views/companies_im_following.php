<?php 
$result =  $this->companies->following_companies_list($limit=1);
if($result)
{
?>
<div class="companies">
          <h3>Companies I’m Following! </h3>
          <ul>
           <?php if($result) { foreach($result as $company): ?>
            <li>
              <figure><a href="<?php echo base_url("company/company_disp/".$company['companyinfo_id']); ?>"><img src="<?php echo base_url(); ?>uploads/<?php echo $company['company_image']  ?>" alt=""></a></figure>
              <div class="content">
                <h4><a href="<?php echo base_url("company/company_disp/".$company['companyinfo_id']); ?>"><?php echo character_limiter($company['cmp_name'], 15); ?></a></h4>
                <p><span><?php echo $company['cmp_industry'] ?></span> <span>Established in: <?php echo $company['cmp_estb'] ?></span> 
                <span>Employees: <?php echo $company['cmp_colleagues'] ?></span> </p>
              <!--  <a href="#">Like <span>(2)</span></a> <a href="#">Follow <span>(20)</span></a> -->
              </div>
            </li>
               <?php endforeach; } else echo "No Details Found";?>      
          </ul>
        </div>
        <?php } ?>