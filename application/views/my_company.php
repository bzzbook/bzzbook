<?php $result = $this->companies->companies_list($limit=2); ?>
<div class="companies">
          <h3>My Companies </h3>
            <ul>
            <?php if($result) { foreach($result as $company): ?>
         
            <li>
              <figure><img src="<?php echo base_url();?>uploads/<?php echo $company->company_image ?>" alt=""></figure>
              <div class="content">
              
                  <div class="clear"></div>
                <h4><?php echo $company->cmp_name;?></h4>
                <p><span><?php echo $company->cmp_industry; ?></span> <span>Established in: <?php echo substr($company->cmp_estb,'0','-6') ?></span> <span>Employees: <?php echo $company->cmp_colleagues; ?></span> </p>
                <a href="#">Like <span>(2)</span></a> <a href="#">Follow <span>(20)</span></a>
                 </div>
            </li>
          
                            <?php endforeach; } else echo "No Details Found";?>
</ul>
        </div>