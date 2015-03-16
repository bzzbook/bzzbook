<section class="col-lg-6 col-md-6 col-sm-5 col-xs-12 coloumn2 pfSettings">
      <h2>My Companies</h2>
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
              <figure class="col-md-5"><img src="file:///C|/Users/PC/Desktop/images/1425970368.jpg" alt=""></figure>
              <div class="col-md-7 myCompany">
              <?php if($result) { foreach($result as $company): ?>
                <h4><?php echo $company->company_name;?></h4>
                <p><?php echo $company->industry; ?></p>
                <p><?php echo substr($company->established_year,'0','-6') ?></p>
                <p><?php echo $company->collegues; ?></p>
                 <?php endforeach; } else echo "No Details Found";?>
              </div>
              
              <div class="clear"></div>
            </div>
            <div role="tabpanel" class="tab-pane" id="companies_following">
              <h4 class="clear">Palmetto cleaning systems</h4>
              <div class="companyFollow col-md-12">
                <ul>
                  <li><a href="#"><img src="file:///C|/Users/PC/Desktop/images/cp2.png" width="127" height="127" alt=""></a>
                    <?php $comp_follow = $this->companies->following_comp_list(); ?>
                    <div class="col-md-7">
                    <?php if($comp_follow) { foreach($comp_follow as $follow_data): ?>
                      <p>Industry:<?php echo $company->industry; ?></p>
                      <p><?php echo substr($company->established_year,'0','-6') ?></p>
                      <p>Employes on Bzzbook:<?php echo $company->collegues; ?></p>
                      <?php endforeach; } else echo "No Details Found";?>
                    </div>
                  </li>
                </ul>
                <div class="col-md-5 col-xs-push-5"> <a class="btn btn-info black" href="#">view Profile</a> <a class="btn btn-info gray" href="#">unfollow</a> </div>
              </div>
              <div class="clear"></div>
            </div>
          </div>
        </div>
      </div>
    </section>