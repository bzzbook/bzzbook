<?php $result = $this->companies->companies_list(); ?>
<div class="companies">
          <h3>My Companies </h3>
            <?php if($result) { foreach($result as $company): ?>
          <ul>
            <li>
              <figure><img src="<?php echo base_url();?>uploads/<?php echo $company->company_image ?>" alt=""></figure>
              <div class="content">
              
                  <div class="clear"></div>
                <h4><?php echo $company->cmp_name;?></h4>
                <p><span><?php echo $company->cmp_industry; ?></span> <span>Established in: <?php echo substr($company->cmp_estb,'0','-6') ?></span> <span>Employees: <?php echo $company->cmp_colleagues; ?></span> </p>
                <a href="#">Like <span>(2)</span></a> <a href="#">Follow <span>(20)</span></a>
                 </div>
            </li>
          </ul>
                            <?php endforeach; } else echo "No Details Found";?>

        </div>