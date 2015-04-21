<section class="col-lg-9 col-md-9 nopad">
      <div class="col-xs-12 ProfileView">
        <section class="visitorBox">
          <div class="visitiBoxInner">
            <figure class="compCover"><img alt="" src="<?php echo base_url(); ?>images/about_banner.jpg" class="img-responsive"></figure>
             <?php  $image = $this->profile_set->get_profile_pic();
			         $data = $this->profile_set->get_userinfo(); ?>
                         <?php $attr = array('id' => 'upload_pfpic', 'name' => 'upload_file'); ?> 
              <?php echo form_open_multipart('profile/do_upload',$attr);?>
            <div class="profileLogo">
              <figure class="cmplogo"> <img src="<?php echo base_url();?>uploads/<?php if(!empty($image[0]->user_img_thumb)) echo $image[0]->user_img_thumb; else echo 'default_profile_pic.png'; ?>" alt="<?php echo base_url();?>uploads/<?php if(!empty($image[0]->user_img_thumb)) echo $image[0]->user_img_thumb; else echo 'default_profile_pic.png'; ?>"></figure>
              <!-- <span class="inside glyphicon glyphicon-camera" ></span>--> 
            </div>
            <h4 class="profile-name"><?php echo $data[0]['user_firstname']." ".$data[0]['user_lastname'] ?></h4>
            <a href="#"><span class="glyphicon glyphicon-camera change-photo fileinput-button" aria-hidden="true"><em>Change Picture</em> <input type="file" name="userfile" id="pfpic" size="20" required/></span></a></form>
            <div class="ProfileViewNav"></div>
          </div>
        </section>
      </div>
      <section class="about-user-details">
      <div class="cmpsearch">

<div class="clearfix"></div>
<form id="search_job" name="search_job" action="<?php echo base_url(); ?>company/search_companies" method="post">
<div class="row">
<div class="field col-md-1">
<span aria-hidden="true" class="glyphicon glyphicon-briefcase"></span>
</div>
<div class="field col-md-4">
<?php $industry = $this->lookup->get_lookup_industry(); ?>
          <select name="industry" class="form-control" data-rule-required="true" 
    						        data-msg-required="please select Industry" >
                 <option value="">Select Industry</option>
				 <?php foreach($industry as $industries):?>
                 <option value="<?php echo $industries->lookup_value ?>"><?php echo $industries->lookup_value ?></option>
                 <?php endforeach;?> 
                 </select>  
              </div>
<div class="field col-md-4">
                     <select name="usa_states" id="usa_states" class="form-control" data-rule-required="true" 
    						        data-msg-required="please select State">
          				 <option value="">Select State</option>
          				 </select>
                        </div>


<div class="field col-md-2">

<button class="btn btn-success" type="submit">Search Companies</button>          
</div>
</div>
</form>
   </div>

     
      
       <?php
	  if(isset($search_result_companies))
	  {
	   $this->load->view('company_search',$search_result_companies);
}          ?> 
 </section>
      </section>

     

