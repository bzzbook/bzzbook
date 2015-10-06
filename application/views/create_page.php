<section class="col-lg-9 col-md-9 nopad">
      
      <section class="about-user-details">
        <h4><span aria-hidden="true" class="glyphicon glyphicon-user"></span> About</h4>
        <div class="about-user-details-inner" >
          <section class="col-lg-12 col-md-12 col-sm-5 col-xs-12 coloumn2 aboutme">
            <div class="posts">
              <div class="col-md-4">
                <ul class="nav-tabs" role="tablist" id="myTab">
                  <li role="presentation" class="active" id="overview_tab"><a href="#overview" aria-controls="home" role="tab" data-toggle="tab">Local Bussiness or Place</a></li>
                  <li role="presentation" id="education_tab"><a href="#education" aria-controls="profile" role="tab" data-toggle="tab">Company or Organization </a></li>
                  <li role="presentation" id="place_tab"><a href="#place" aria-controls="messages" role="tab" data-toggle="tab">Brand or Product</a></li>
                  <li role="presentation" id="contact_tab"><a href="#contact" aria-controls="messages" role="tab" data-toggle="tab">Artist, Brand or Public Figure</a></li>
                  <li role="presentation" id="family_tab"><a href="#family" aria-controls="profile" role="tab" data-toggle="tab">Entertainment</a></li>
                  <li role="presentation" id="details_tab"><a href="#details" aria-controls="profile" role="tab" data-toggle="tab">Cause or Community</a></li>
                  
                </ul>
              </div>
              <div class="tab-content col-md-8">
              <input type="hidden" name="post_cur_tab" id="post_cur_tab" value="<?php if(isset($current_tab)) echo $current_tab; ?>" />
                <div role="tabpanel" class="tab-pane active" id="overview">
                  <div class="smallboxes col-md-8 col-md-offset-2">
                    <div class="create_page"> 
                   
                    <form name="bus_form" method="post" enctype="multipart/form-data" action="<?php echo base_url().'profile/add_bus_page'; ?>" > 
                    <?php if(form_error('bus_sub_category')){ ?><label class="error_msg"><?php echo '<p>Please choose sub category</p>'; ?></label><?php } ?>    
                    <select class="selectpicker" name="bus_sub_category">
                    	<option value="0" >Choose a category</option>
                        <option value="1" <?php if(set_value('bus_sub_category')==1) echo "selected='selected'"; ?>>Airport</option>
                        <option value="2" <?php if(set_value('bus_sub_category')==2) echo "selected='selected'"; ?>>Art/Entertainment</option>
                        <option value="3" <?php if(set_value('bus_sub_category')==3) echo "selected='selected'"; ?>>Attractions / Things to do</option>
                    </select>
                    <?php if(form_error('bus_page_name') ){ ?><label class="error_msg"><?php echo form_error('bus_page_name'); ?></label><?php } ?>
                    <input type="text" name="bus_page_name" placeholder="Bussiness or Place Name" value="<?php echo set_value('bus_page_name') ?>" >
                    <?php if(form_error('bus_address') ){ ?><label class="error_msg"><?php echo form_error('bus_address'); ?></label><?php } ?>
                    <input type="text" name="bus_address" placeholder="Street Address"  value="<?php echo set_value('bus_address') ?>">
                     <?php if(form_error('bus_city_state') ){ ?><label class="error_msg"><?php echo form_error('bus_city_state'); ?></label><?php } ?>
                    <input type="text" name="bus_city_state" placeholder="City/State"  value="<?php echo set_value('bus_city_state') ?>">
                     <?php if(form_error('bus_zip_code') ){ ?><label class="error_msg"><?php echo form_error('bus_zip_code'); ?></label><?php } ?>
                    <input type="text" name="bus_zip_code" placeholder="Zip Code"  value="<?php echo set_value('bus_zip_code') ?>">
                     <?php if(form_error('bus_phone') ){ ?><label class="error_msg"><?php echo form_error('bus_phone'); ?></label><?php } ?>
                    <input type="text" name="bus_phone" placeholder="Phone"  value="<?php echo set_value('bus_phone') ?>">
                    <textarea name="bus_description" rows="4" placeholder="Describe your Bussiness or Place"><?php echo set_value('bus_description') ?></textarea>
                     <input type="text" name="bus_website_url" placeholder="Website" value="<?php echo set_value('bus_website_url'); ?>" >
                     <?php if($this->session->userdata('file_error') ){ ?><label class="error_msg"><?php echo $this->session->userdata('file_error'); ?></label><?php } ?>
                     <input type="file" name="bus_page_image" placeholder="Upload a pic">
                     <input type="text" name="bus_places_can_connect" placeholder="Places where people can connect from" value="<?php echo set_value('bus_places_can_connect'); ?>">
                     <input type="text" name="bus_aud_interests" placeholder="Interests" value="<?php echo set_value('bus_aud_interests'); ?>">
                     <label class="small_width">Age</label> 
                     <select class="selectpicker small_width" name="bus_aud_min_age">
                     
                     <?php for($i=13;$i<=64;$i++): ?>                    	
                        <option value="<?php echo $i; ?>" <?php if((!set_value('bus_aud_min_age') && $i==18) || set_value('bus_aud_min_age')==$i) echo "selected='selected'"; ?>><?php echo $i; ?></option>
                    <?php endfor; ?>
                        <option value="65" <?php if(set_value('bus_aud_min_age')==$i) echo "selected='selected'"; ?>>65+</option>
                    </select>
                    <select class="selectpicker small_width" name="bus_aud_max_age">
                     
                     <?php for($i=13;$i<=64;$i++): ?>                    	
                        <option value="<?php echo $i; ?>" <?php if(set_value('bus_aud_max_age')==$i) echo "selected='selected'"; ?>><?php echo $i; ?></option>
                    <?php endfor; ?>
                        <option value="65" <?php if((!set_value('bus_aud_max_age') && $i==65) || set_value('bus_aud_max_age')==$i) echo "selected='selected'"; ?>>65+</option>
                    </select><div class="clearfix"></div>
                    <label class="small_width">For Gender</label>
                    <input type="radio" class="small_width"  name="bus_aud_gender" value="A" checked='checked'><label>All</label> <input type="radio"  class="small_width" name="bus_aud_gender"  value="M"><label>Male</label> <input class="small_width" type="radio"  name="bus_aud_gender" value="F"><label>Female</label>
                    
                    <label>By clicking Get Started, you agree to the <a href="#">bzzbook terms and conditions</a></label>
                    <div class="clearfix"></div>
                    
                    <input class="get_started_btn" type="submit" value="Get Started">
                    </form>
      </div>
                  </div>
                
                </div>
                <div role="tabpanel" class="tab-pane" id="education">
                  <div class="smallboxes col-md-8 col-md-offset-2">
                   <div class="create_page "> 
                   <form name="cmp_form"  method="post" enctype="multipart/form-data" action="<?php echo base_url().'profile/add_cmp_page'; ?>">
                         
                    <?php if(form_error('cmp_sub_category') ){ ?><label class="error_msg"><?php echo '<p>Please choose sub category</p>'; ?></label><?php } ?>    
                    <select class="selectpicker" name="cmp_sub_category">
                    	<option value="0">Choose a category</option>
                        <option value="4" <?php if(set_value('cmp_sub_category')==4) echo "selected='selected'"; ?>>Aerospace/Defence</option>
                        <option value="5" <?php if(set_value('cmp_sub_category')==5) echo "selected='selected'"; ?>>Automobile and Parts</option>
                        <option value="6" <?php if(set_value('cmp_sub_category')==6) echo "selected='selected'"; ?>>Bank/Financial Institution</option>
                    </select>
                    <?php if(form_error('cmp_page_name') ){ ?><label class="error_msg"><?php echo form_error('cmp_page_name'); ?></label><?php } ?>
                    <input type="text" name="cmp_page_name" placeholder="Company Name" required="required" value='<?php echo set_value('cmp_page_name')?>' >
                    <textarea name="cmp_description" rows="4" placeholder="Describe Your Company or Organization"><?php echo set_value('cmp_description')?></textarea>
                     <input type="text" name="cmp_website_url" placeholder="Website" value='<?php echo set_value('cmp_website_url')?>'>
                     <input type="file" name="cmp_page_image" >
                     <input type="text" name="cmp_places_can_connect" placeholder="Places where people can connect from" value='<?php echo set_value('cmp_places_can_connect')?>'>
                     <input type="text" name="cmp_aud_interests" placeholder="Interests" value='<?php echo set_value('cmp_aud_interests')?>'>
                     <label class="small_width">Age</label> 
                     <select class="selectpicker small_width" name="cmp_aud_min_age">
                     
                     <?php for($i=13;$i<=64;$i++): ?>                    	
                        <option value="<?php echo $i; ?>" <?php if((!set_value('cmp_aud_min_age') && $i==18) || set_value('cmp_aud_min_age')==$i) echo "selected='selected'"; ?>><?php echo $i; ?></option>
                    <?php endfor; ?>
                        <option value="65" <?php if(set_value('cmp_aud_min_age')==$i) echo "selected='selected'"; ?>>65+</option>
                    </select>
                    <select class="selectpicker small_width" name="cmp_aud_max_age">
                     
                     <?php for($i=13;$i<=64;$i++): ?>                    	
                        <option value="<?php echo $i; ?>" <?php if(set_value('cmp_aud_max_age')==$i) echo "selected='selected'"; ?>><?php echo $i; ?></option>
                    <?php endfor; ?>
                        <option value="65" <?php if((!set_value('cmp_aud_max_age') && $i==65) || set_value('cmp_aud_max_age')==$i) echo "selected='selected'"; ?>>65+</option>
                    </select><div class="clearfix"></div>
                    <label class="small_width">For Gender</label>
                    <input type="radio" class="small_width" name="cmp_aud_gender" value="A" checked='checked'><label>All</label> <input type="radio" class="small_width" name="cmp_aud_gender"  value="M"><label>Male</label> <input class="small_width" type="radio" name="cmp_aud_gender" value="F"><label>Female</label>
                    <label>By clicking Get Started, you agree to the <a href="#">bzzbook terms and conditions</a></label>
                    <div class="clearfix"></div>
                    <input class="get_started_btn" type="submit"  value="Get Started">
                    </form>
      </div>
                  </div>
                </div>
                
                
                <div role="tabpanel" class="tab-pane" id="place">
                  <div class="smallboxes col-md-8 col-md-offset-2">
                    <div class="create_page "> 
                    <form name="brand_form"  method="post" enctype="multipart/form-data" action="<?php echo base_url().'profile/add_brand_page'; ?>">      
                    <?php if(form_error('brand_sub_category') ){ ?><label class="error_msg"><?php echo '<p>Please choose sub category</p>'; ?></label><?php } ?>    
                    <select class="selectpicker" name="brand_sub_category">
                    	<option value="0" >Choose a category</option>
                        <option value="7" <?php if(set_value('brand_sub_category')==7) echo "selected='selected'"; ?>>App Page</option>
                        <option value="8" <?php if(set_value('brand_sub_category')==8) echo "selected='selected'"; ?>>Appliances</option>
                        <option value="9" <?php if(set_value('brand_sub_category')==9) echo "selected='selected'"; ?>>Baby Goods/Kids Goods</option>
                    </select>
                    <?php if(form_error('brand_page_name') ){ ?><label class="error_msg"><?php echo form_error('brand_page_name'); ?></label><?php } ?>
                    <input type="text" placeholder="Brand or Product Name" required="required" name="brand_page_name" value="<?php echo set_value('brand_page_name') ?>">
                     <textarea name="brand_description" rows="4" placeholder="Describe Your Brand or Product"><?php echo set_value('brand_description') ?></textarea>
                     <input type="text" name="brand_website_url" placeholder="Website" value="<?php echo set_value('brand_website_url') ?>">
                     <input type="file" name="brand_page_image" >
                     <input type="text" name="brand_places_can_connect" placeholder="Places where people can connect from" value="<?php echo set_value('brand_places_can_connect') ?>">
                     <input type="text" name="brand_aud_interests" placeholder="Interests" value="<?php echo set_value('brand_aud_interests') ?>">
                     <label class="small_width">Age</label> 
                    <select class="selectpicker small_width" name="brand_aud_min_age">
                     
                     <?php for($i=13;$i<=64;$i++): ?>                    	
                        <option value="<?php echo $i; ?>" <?php if((!set_value('brand_aud_min_age') && $i==18) || set_value('brand_aud_min_age')==$i) echo "selected='selected'"; ?>><?php echo $i; ?></option>
                    <?php endfor; ?>
                        <option value="65" <?php if(set_value('brand_aud_min_age')==$i) echo "selected='selected'"; ?>>65+</option>
                    </select>
                    <select class="selectpicker small_width" name="brand_aud_max_age">
                     
                     <?php for($i=13;$i<=64;$i++): ?>                    	
                        <option value="<?php echo $i; ?>" <?php if(set_value('brand_aud_max_age')==$i) echo "selected='selected'"; ?>><?php echo $i; ?></option>
                    <?php endfor; ?>
                        <option value="65" <?php if((!set_value('brand_aud_max_age') && $i==65) || set_value('brand_aud_max_age')==$i) echo "selected='selected'"; ?>>65+</option>
                    </select><div class="clearfix"></div>
                    <label class="small_width">For Gender</label>
                    <input type="radio" class="small_width" name="brand_aud_gender" value="A" checked='checked'><label>All</label> <input type="radio" class="small_width" name="brand_aud_gender"  value="M"><label>Male</label> <input class="small_width" type="radio" name="brand_aud_gender" value="F"><label>Female</label>
                    <label>By clicking Get Started, you agree to the <a href="#">bzzbook terms and conditions</a></label>
                    <div class="clearfix"></div>
                  
                    <input class="get_started_btn" type="button" onclick="this.form.submit();" value="Get Started">
                    </form>
      </div>
                  </div>
                </div>
                                
                <div role="tabpanel" class="tab-pane" id="contact">
                  <div class="smallboxes col-md-8 col-md-offset-2">
                   <div class="create_page "> 
                   <form name="art_form"  method="post" enctype="multipart/form-data" action="<?php echo base_url().'profile/add_art_page'; ?>">      
                    <?php if(form_error('art_sub_category')){ ?><label class="error_msg"><?php echo '<p>Please choose sub category</p>'; ?></label><?php } ?>    
                    <select class="selectpicker" name="art_sub_category">
                    	<option value="0">Choose a category</option>
                        <option value="10" <?php if(set_value('art_sub_category')==10) echo "selected='selected'"; ?>>Actor/Director</option>
                        <option value="11" <?php if(set_value('art_sub_category')==11) echo "selected='selected'"; ?>>Artist</option>
                        <option value="12" <?php if(set_value('art_sub_category')==12) echo "selected='selected'"; ?>>Athlete</option>
                    </select>
                    <?php if(form_error('art_page_name')){ ?><label class="error_msg"><?php echo form_error('art_page_name'); ?></label><?php } ?>
                    <input type="text" placeholder="Name" required="required" name="art_page_name" value="<?php echo set_value('art_page_name') ?>">
                     <textarea name="art_description" rows="4" placeholder="Describe Yourself"><?php echo set_value('art_description') ?></textarea>
                     <input type="text" name="art_website_url" placeholder="Website" value="<?php echo set_value('art_website_url') ?>">
                     <input type="file" name="art_page_image" >
                     <input type="text" name="art_places_can_connect" placeholder="Places where people can connect from" value="<?php echo set_value('art_places_can_connect') ?>">
                     <input type="text" name="art_aud_interests" placeholder="Interests" value="<?php echo set_value('art_aud_interests') ?>">
                     <label class="small_width">Age</label> 
                    <select class="selectpicker small_width" name="art_aud_min_age">
                     
                     <?php for($i=13;$i<=64;$i++): ?>                    	
                        <option value="<?php echo $i; ?>" <?php if((!set_value('art_aud_min_age') && $i==18) || set_value('art_aud_min_age')==$i) echo "selected='selected'"; ?>><?php echo $i; ?></option>
                    <?php endfor; ?>
                        <option value="65" <?php if(set_value('art_aud_min_age')==$i) echo "selected='selected'"; ?>>65+</option>
                    </select>
                    <select class="selectpicker small_width" name="art_aud_max_age">
                     
                     <?php for($i=13;$i<=64;$i++): ?>                    	
                        <option value="<?php echo $i; ?>" <?php if(set_value('art_aud_max_age')==$i) echo "selected='selected'"; ?>><?php echo $i; ?></option>
                    <?php endfor; ?>
                        <option value="65" <?php if((!set_value('art_aud_max_age') && $i==65) || set_value('art_aud_max_age')==$i) echo "selected='selected'"; ?>>65+</option>
                    </select><div class="clearfix"></div>
                    <label class="small_width">For Gender</label>
                    <input type="radio" class="small_width" name="art_aud_gender" value="A" checked='checked'><label>All</label> <input type="radio" class="small_width" name="art_aud_gender"  value="M"><label>Male</label> <input class="small_width" type="radio" name="art_aud_gender" value="F"><label>Female</label>
                    <label>By clicking Get Started, you agree to the <a href="#">bzzbook terms and conditions</a></label>
                    <div class="clearfix"></div>
                    <input class="get_started_btn" type="submit"  value="Get Started">
                    </form>
      </div> 
                  </div>
                </div>
                <div role="tabpanel" class="tab-pane" id="family">
                  <div class="smallboxes col-md-8 col-md-offset-2">
                   <div class="create_page "> 
                   <form name="ent_form"  method="post" enctype="multipart/form-data" action="<?php echo base_url().'profile/add_ent_page'; ?>">      
                    <?php if(form_error('ent_sub_category') ){ ?><label class="error_msg"><?php echo '<p>Please choose sub category</p>'; ?></label><?php } ?>    
                    <select class="selectpicker" name="ent_sub_category">
                    	<option value="0" >Choose a category</option>
                        <option value="13" <?php if(set_value('ent_sub_category')==13) echo "selected='selected'"; ?>>Album</option>
                        <option value="14" <?php if(set_value('ent_sub_category')==14) echo "selected='selected'"; ?>>Amateur Sports Team</option>
                        <option value="15" <?php if(set_value('ent_sub_category')==15) echo "selected='selected'"; ?>>Book</option>
                    </select>
                    <?php if(form_error('ent_page_name') ){ ?><label class="error_msg"><?php echo form_error('ent_page_name'); ?></label><?php } ?>
                    <input type="text" placeholder="Name" required="required" name="ent_page_name" value="<?php echo set_value('ent_page_name') ?>">
                     <textarea name="ent_description" rows="4" placeholder="Description" ><?php echo set_value('ent_description') ?></textarea>
                     <input type="text" name="ent_website_url" placeholder="Website" value="<?php echo set_value('ent_website_url') ?>">
                     <input type="file" name="ent_page_image" >
                     <input type="text" name="ent_places_can_connect" placeholder="Places where people can connect from" value="<?php echo set_value('ent_places_can_connect') ?>">
                     <input type="text" name="ent_aud_interests" placeholder="Interests" value="<?php echo set_value('ent_aud_interests'); ?>">
                     <label class="small_width">Age</label> 
                     <select class="selectpicker small_width" name="ent_aud_min_age">
                     
                     <?php for($i=13;$i<=64;$i++): ?>                    	
                        <option value="<?php echo $i; ?>" <?php if((!set_value('ent_aud_min_age') && $i==18) || set_value('ent_aud_min_age')==$i) echo "selected='selected'"; ?>><?php echo $i; ?></option>
                    <?php endfor; ?>
                        <option value="65" <?php if(set_value('ent_aud_min_age')==$i) echo "selected='selected'"; ?>>65+</option>
                    </select>
                    <select class="selectpicker small_width" name="ent_aud_max_age">
                     
                     <?php for($i=13;$i<=64;$i++): ?>                    	
                        <option value="<?php echo $i; ?>" <?php if(set_value('ent_aud_max_age')==$i) echo "selected='selected'"; ?>><?php echo $i; ?></option>
                    <?php endfor; ?>
                        <option value="65" <?php if((!set_value('ent_aud_max_age') && $i==65) || set_value('ent_aud_max_age')==$i) echo "selected='selected'"; ?>>65+</option>
                    </select><div class="clearfix"></div>
                    <label class="small_width">For Gender</label>
                    <input type="radio" class="small_width" name="ent_aud_gender" value="A" checked='checked'><label>All</label> <input type="radio" class="small_width" name="ent_aud_gender"  value="M"><label>Male</label> <input class="small_width" type="radio" name="ent_aud_gender" value="F"><label>Female</label>
                    <label>By clicking Get Started, you agree to the <a href="#">bzzbook terms and conditions</a></label>
                    <div class="clearfix"></div>
                    <input class="get_started_btn" type="button" onclick="this.form.submit();" value="Get Started">
                    </form>
      </div> 
                  </div>
                </div>
                <div role="tabpanel" class="tab-pane" id="details">
                  <div class="smallboxes col-md-8 col-md-offset-2">
                   <div class="create_page ">      
                  <form name="cause_form"  method="post" enctype="multipart/form-data" action="<?php echo base_url().'profile/add_cause_page'; ?>"> 
                  <?php if(form_error('cause_page_name') ){ ?><label class="error_msg"><?php echo form_error('cause_page_name'); ?></label><?php } ?>
                    <input type="text" placeholder="Cause or Community" required="required" name="cause_page_name" value="<?php echo set_value('cause_page_name') ?>">
                     <textarea name="cause_description" rows="4" placeholder="Description"  ><?php echo set_value('cause_description') ?></textarea>
                     <input type="text" name="cause_website_url" placeholder="Website"  value="<?php echo set_value('cause_website_url') ?>">
                     <input type="file" name="cause_page_image"  >
                     <input type="text" name="cause_places_can_connect" placeholder="Places where people can connect from" value="<?php echo set_value('cause_places_can_connect') ?>">
                     <input type="text" name="cause_aud_interests" placeholder="Interests" value="<?php echo set_value('cause_aud_interests') ?>">
                     <label class="small_width">Age</label> 
                     <select class="selectpicker small_width" name="cause_aud_min_age">
                     
                     <?php for($i=13;$i<=64;$i++): ?>                    	
                        <option value="<?php echo $i; ?>" <?php if((!set_value('cause_aud_min_age') && $i==18) || set_value('cause_aud_min_age')==$i) echo "selected='selected'"; ?>><?php echo $i; ?></option>
                    <?php endfor; ?>
                        <option value="65" <?php if(set_value('cause_aud_min_age')==$i) echo "selected='selected'"; ?>>65+</option>
                    </select>
                    <select class="selectpicker small_width" name="cause_aud_max_age">
                     
                     <?php for($i=13;$i<=64;$i++): ?>                    	
                        <option value="<?php echo $i; ?>" <?php if(set_value('cause_aud_max_age')==$i) echo "selected='selected'"; ?>><?php echo $i; ?></option>
                    <?php endfor; ?>
                        <option value="65" <?php if((!set_value('cause_aud_max_age') && $i==65) || set_value('cause_aud_max_age')==$i) echo "selected='selected'"; ?>>65+</option>
                    </select><div class="clearfix"></div>
                    <label class="small_width">For Gender</label>
                    <input type="radio" class=" " name="cause_aud_gender" value="A" checked='checked'><label>All</label> <input type="radio" class="small_width" name="cause_aud_gender"  value="M"><label>Male</label> <input class="small_width" type="radio" name="cause_aud_gender" value="F"><label>Female</label>
                    <label>By clicking Get Started, you agree to the <a href="#">bzzbook terms and conditions</a></label>
                    <div class="clearfix"></div>
                   
                    <input class="get_started_btn" type="submit" value="Get Started">
                    </form>
      </div>
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
    


