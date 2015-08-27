<?php /*$result = $this->profile_set->get_userinfo();
 $name = $result[0]['user_firstname']." ".$result[0]['user_lastname'];
 $companies = $this->companies->get_mn_cmp_list();*/
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
           <li> <a  href="<?php echo base_url(); ?>profile/post/<?php echo $user_profile_id; ?>">Profile</a></li>
            <li> <a  href="<?php echo base_url(); ?>profile/about_me/<?php echo $user_profile_id; ?>">About Me</a></li>
            <li> <a  href="<?php echo base_url(); ?>profile/friends/<?php echo $user_profile_id; ?>">Friends</a></li>
            <li> <a  href="<?php echo base_url(); ?>profile/my_albums/<?php echo $user_profile_id; ?>">Photos</a></li>
             <li> <a  href="<?php echo base_url(); ?>profile/business_details/<?php echo $user_profile_id; ?>">Business Details</a></li>
            <li> <a  href="<?php echo base_url(); ?>company/my_companies/<?php echo $user_profile_id; ?>">Companies</a></li>
          </ul>
          <?php /*?><div class="pull-right viewAs">
            <p>Viewing as:</p>
            <select class="form-control" id="profile_interchange" >
              <optgroup label="Your Personal profile">
              <option value="<?php echo $result[0]['user_id']?>"><?php echo $name ?></option>
              </optgroup>
              <optgroup label="Your Companies">
              <?php foreach($companies as $cmp):?>
                 <option  data-to-profile-type="Company" value="<?php echo $cmp->companyinfo_id ?>"><?php echo $cmp->cmp_name ?></option>
                 <?php endforeach;?> 
       
              </optgroup>
            </select>
          </div><?php */?>
        </div>
        <!-- /.nav-collapse --> 
      </div>
      <!-- /.container-fluid --> 
    </nav>
  </div>
</section>
