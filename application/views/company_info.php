<section class="col-lg-9 col-md-9 nopad">
      <section class="about-user-details">
        <h4><span aria-hidden="true" class="glyphicon glyphicon-briefcase"></span>About Us</h4>
        <div class="about-user-details-inner" >
          <section class="col-lg-12 col-md-12 col-sm-5 col-xs-12 coloumn2 aboutme">
            <div class="posts">
              <div class="col-md-4">
                <ul class="nav-tabs" role="tablist" id="myTab">
                  <li role="presentation" class="active"><a href="#proffesional" aria-controls="home" role="tab" data-toggle="tab">Company Information</a></li>
                </ul>
              </div>
              <div class="tab-content col-md-8">
                <div role="tabpanel" class="tab-pane active" id="proffesional">
                  <div class="iner_business col-lg-12">
                    <ul>
                     <?php if(!empty($company_info)) { ?>
                      <li>
                        <div class="iner_business"></div>
                        <div class="inner_rights">
                          
                          <p><h3>Company Name</h3><?php if($company_info[0]['cmp_name']) echo ucfirst($company_info[0]['cmp_name']); else echo "Information Not Available"; ?></p>
                        </div>
                        <div class="clearfix"></div>
                      </li>
                      <li>
                        <div class="inner_rights">
                          
                          <p><h3>Established Since</h3><?php $unixTimestamp = strtotime($company_info[0]['cmp_estb']); echo date('F',$unixTimestamp).", ".date('Y',$unixTimestamp); ?></p>
                        </div>
                        <div class="clearfix"></div>
                      </li>
                      <li>
                        <div class="inner_rights">
                          
                          <p><h3>About Company</h3><?php if($company_info[0]['cmp_about']) echo $company_info[0]['cmp_about']; else echo "Information Not Available"; ?></p>
                        </div>
                        <div class="clearfix"></div>
                      </li><li>
                        <div class="inner_rights">
                          <h3>Contact Information</h3>
                          <p><h3>Email:</h3><?php if($company_info[0]['company_email']) echo $company_info[0]['company_email']; else echo "Information Not Available";?></p>
                           <p><h3>Phone:</h3><?php if($company_info[0]['company_phone']) echo $company_info[0]['company_phone']; else echo "Information Not Available";?></p>
                            <p><h3>Office:</h3><?php if($company_info[0]['company_office']) echo $company_info[0]['company_office']; else echo "Information Not Available"; ?></p>
                             <p><h3>Fax:</h3><?php if($company_info[0]['company_fax']) echo $company_info[0]['company_fax']; else echo "Information Not Available"; ?></p>
                        </div>
                        <div class="clearfix"></div>
                      </li>
                       <?php } else echo "No Information Found"; ?>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="clear"></div>
            </div>
          </section>
          <div class="clearfix"></div>
        </div>
      </section>
    </section>