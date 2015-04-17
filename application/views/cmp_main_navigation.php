<?php 
 $result = $this->profile_set->get_userinfo();
 $name = $result[0]['user_firstname']." ".$result[0]['user_lastname'];
 $companies = $this->companies->get_mn_cmp_list();
// $id = $this->session->userdata('cmp_id');
 ?> 
<section class="mainNav">
  <div class="container">
    <nav class="navbar navbar-static" id="navbar-example">
      <div class="container-fluid">
        <div class="navbar-header">
          <button data-target=".bs-example-js-navbar-collapse" data-toggle="collapse" type="button" class="navbar-toggle collapsed"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
          <a href="#" class="navbar-brand">Menu</a> </div>
        <div class="collapse navbar-collapse bs-example-js-navbar-collapse">
          <ul class="nav navbar-nav">
            <li> <a  href="<?php echo base_url("company/get_company_byid/".$cmp_info[0]['companyinfo_id']); ?>">Company Profile</a></li>
            <li> <a  href="<?php echo base_url("company/get_company_info_byid/".$cmp_info[0]['companyinfo_id']); ?>">Company Info</a></li>
            <li> <a  href="#">Post Board</a></li>
            <li> <a  href="<?php echo base_url("jobs/disp_jobs/".$cmp_info[0]['companyinfo_id']); ?>">Applicants</a></li>
            <li> <a  href="<?php echo base_url("events/disp_events/".$cmp_info[0]['companyinfo_id']); ?>">Events</a></li>
            <li> <a  href="<?php echo base_url("company/get_my_followers/".$cmp_info[0]['companyinfo_id']); ?>">Followers</a></li>
          </ul>
          <div class="pull-right viewAs">
            <p>Viewing as:</p>
            <select class="form-control" id="profile_interchange" >
              <optgroup label="Your Personal profile">
              <option value="user"><?php echo $name ?></option>
              </optgroup>
              <optgroup label="Your Companies">
              <?php foreach($companies as $cmp):?>
                 <option  data-to-profile-type="Company" value="<?php echo $cmp->companyinfo_id ?>" 
                 <?php if($cmp_info[0]['companyinfo_id'] == $cmp->companyinfo_id){
					 echo "selected=selected";
				 }?>><?php echo $cmp->cmp_name ?></option>
                 <?php endforeach;?>
              </optgroup>
            </select>
          </div>
        </div>
        <!-- /.nav-collapse --> 
      </div>
      <!-- /.container-fluid --> 
    </nav>
  </div>
</section>