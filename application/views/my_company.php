<?php $result = $this->companies->companies_list(); ?>
<div class="companies">
          <h3>My Companies </h3>
          <ul>
            <li>
              <figure><img src="<?php echo base_url(); ?>images/cp2.png" alt=""></figure>
              <div class="content">
                <?php if($result) { foreach($result as $company): ?>
                  <div class="clear"></div>
                <h4><?php echo $company->company_name;?></h4>
                <p><span><?php echo $company->industry; ?></span> <span>Established in: <?php echo substr($company->established_year,'0','-6') ?></span> <span>Employees: <?php echo $company->collegues; ?></span> </p>
                <a href="#">Like <span>(2)</span></a> <a href="#">Follow <span>(20)</span></a>
                  <?php endforeach; } else echo "No Details Found";?>
                 </div>
            </li>
          </ul>
        </div>