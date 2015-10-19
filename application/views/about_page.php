<?php $data = $this->pagemodel->get_page_about_details($page_id); 
	  $page_cat = $this->pagemodel->get_page_categories();
	  $cat_name = $this->pagemodel->get_category_name($data[0]['page_cat_id']);
	  $sub_cat_name = $this->pagemodel->get_subcategory_name($data[0]['page_sub_cat_id']);
	  $page_details = $this->pagemodel->get_page_details($page_id); 
	
	
	

?>
<div class="col-md-12" style="padding-right:0px;">
     <div class="page-option-container">   
        <h3>About this page</h3>
        <div class="tableMain">
            <div class="col-md-3 tableChild">
                <ul>
                    <li><a href="#">Overview</a></li>
                    <li><a href="#" class="active">Page Info</a></li>
                </ul>
            </div>        
            <div class="col-md-9 tableChild" id="togglerBlock">
            	<div class="infoBox"><h4>Page Info</h4></div>
                
                    <div class="infoBox" id="category_block">
                    <?php if(!empty($cat_name[0]['main_cat_name']) && !empty($sub_cat_name[0]['sub_cat_name'])) { ?>
                    <h5 class="headBlock"><span class="title">Category</span> <span class="value"><?php echo $cat_name[0]['main_cat_name']." : ".$sub_cat_name[0]['sub_cat_name']; ?></span><span class="editIt" data-toggle="category"><i class="fa fa-pencil"></i> Edit</span></h5>
                    <?php }else{ ?>
                     <h5 class="headBlock"><span class="title">Category</span> <span class="value">Local Businesses : Landmark</span><span class="editIt" data-toggle="category"><i class="fa fa-pencil"></i> Edit</span></h5>
                    <?php } ?> 
                       
                        <div class="toggler" id="category">
                           		<div class="tabular">
                                    <div class="title">Category</div>
                                    <div class="formBlock">
                                            <select class="form-control" onchange="page_subcategory_change(this.value);" id="page_cat_data">
                                            <?php foreach($page_cat as $cat) { ?>
                                            <option value="<?php echo $cat['main_cat_id']; ?>"><?php echo $cat['main_cat_name']; ?></option>
                                        <?php } ?>
                                            </select>
                                            
                                            <select class="form-control" id="page_sub_cat_data">
                                            
                                            </select>
    									<div class="clearfix"></div>
                                    <button class="save" onclick="change_cat_and_scat(<?php echo $page_id; ?>);">Save changes</button> <button class="cancelEdits">Cancel</button>
                                    </div>       
                                </div>                    
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    
                    
                    <div class="infoBox" id="page_name_block">
                        <h5 class="headBlock"><span class="title">page name</span> <span class="value"><?php if($page_details[0]['page_name']) { echo $page_details[0]['page_name']; } else echo "edit your page name"; ?></span><span class="editIt" data-toggle="category"><i class="fa fa-pencil"></i> Edit</span></h5>
                        <div class="toggler" id="category">
                           		<div class="tabular">
                                    <div class="title">page name</div>
                                    <div class="formBlock">
                                            <input type="text" class="form-control" placeholder="" id="page_name_value" value="<?php echo $page_details[0]['page_name'];?>">
    									<div class="clearfix"></div>
                                    <button class="save" onclick="change_page_name(<?php echo $page_id; ?>)">Save changes</button> <button class="cancelEdits">Cancel</button>
                                    </div>       
                                </div>                    
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    
                    
                    
                    
                              
                    
                           <div class="infoBox">
                        <h5 class="headBlock"><span class="title">Start Date</span> <span class="value editIt" data-toggle="category">Enter your start Date</span></h5>
                        <div class="toggler" id="category">
                           		<div class="tabular">
                                    <div class="title">Start Date</div>
                                    <div class="formBlock form-inline">
                                            <select class="specific form-control">
                                                <option value="0">Unspecified</option>
                                                <option selected="1" value="1">Born</option>
                                                <option value="2">Founded</option>
                                                <option value="5">Started</option>
                                                <option value="6">Opened</option>
                                                <option value="7">Created</option>
                                                <option value="8">Launched</option>
                                            </select>
                                            <span>On</span>
                                            <select class="year form-control">
                                             <option value="0">yyyy</option>
                                   
                                   <?php for($i=1950;$i<=date(Y);$i++){?>
                                	<option value="<?php echo $i;?>"><?php echo $i;?></option>
                              	  <?php }?>
                                            </select>
                                            <div class="clearfix"></div>
    
                                    <button class="save">Save changes</button> <button class="cancelEdits">Cancel</button>
                                    </div>       
                                </div>                    
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    
                  <div class="infoBox">
                        <h5 class="headBlock"><span class="title">Release Date</span> <span class="value editIt" data-toggle="category">+ Enter your Release Date</span></h5>
                        <div class="toggler" id="category">
                           		<div class="tabular">
                                    <div class="title">Release Date</div>
                                    <div class="formBlock form-inline">
                                          
                                            <select class="year form-control">
                                                   <option value="0">yyyy</option>
                                   
                                   <?php for($i=1950;$i<=date(Y);$i++){?>
                                	<option value="<?php echo $i;?>"><?php echo $i;?></option>
                              	  <?php }?>
                                            </select>
                                              <a href="javascript:void(0)" id="frm_months_link"  style="display:none;" ><i class="fa fa-plus"></i>Add month</a>
                                  <select id="frm_months" style="display:none;" name="frm_months"> 
                                  <option value="0">mm</option>
                                   <option value="1" selected="selected">1</option>
                                   <?php for($i=2;$i<=12;$i++){?>
                                	<option value="<?php echo $i;?>" ><?php echo $i;?></option>
                              	  <?php }?>
                                  </select>
                                  <a href="javascript:void(0)" id="frm_days_link"  style="display:none;"><i class="fa fa-plus"></i>Add day</a>
                                  <select id="frm_days" style="display:none;" name="frm_days">
                                  <option value="0">dd</option>
                                  <option value="1" selected="selected">1</option>
                                   <?php for($i=2;$i<=31;$i++){?>
                                	<option value="<?php echo $i;?>" ><?php echo $i;?></option>
                              	  <?php }?>
                                  </select>
                                            <div class="clearfix"></div>
    
                                    <button class="save">Save changes</button> <button class="cancelEdits">Cancel</button>
                                    </div>       
                                </div>                    
                        </div>
                        <div class="clearfix"></div>
                    </div>
                  
                  
                    
                       
                    <div class="infoBox" id="genre_block">
                    <?php if($data[0]['genre']) { ?>
                        <h5 class="headBlock"><span class="title">Genre</span> <span class="value" data-toggle="category"><?php echo $data[0]['genre']; ?></span><span class="editIt" data-toggle="category"><i class="fa fa-pencil"></i> Edit</span></h5>
                        
                      <?php }else { ?>
                        <h5 class="headBlock"><span class="title">Genre</span> <span class="value editIt" data-toggle="category">+ Enter Genre</span></h5>
                        <?php } ?>
                        <div class="toggler" id="category">
                           		<div class="tabular">
                                    <div class="title">Genre</div>
                                    <div class="formBlock">
                                              <textarea class="form-control" id="page_genre"><?php if($data[0]['genre']) { echo $data[0]['genre']; }else { echo "Genre" ;} ?></textarea>  
                                            <div class="clearfix"></div>
    
                                    <button class="save" onclick="add_page_genre(<?php echo $page_id; ?>);">Save changes</button> <button class="cancelEdits">Cancel</button>
                                    </div>       
                                </div>                    
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    
                    <div class="infoBox" id="band_members_block">
                    
                      <?php if($data[0]['band_members']) { ?>
                        <h5 class="headBlock"><span class="title">Band Members</span> <span class="value" data-toggle="category"><?php echo $data[0]['band_members']; ?></span><span class="editIt" data-toggle="category"><i class="fa fa-pencil"></i> Edit</span></h5>
                        
                      <?php }else { ?>
                         <h5 class="headBlock"><span class="title">Band Members</span> <span class="value editIt" data-toggle="category">+ Enter Names Of Band Members</span></h5>
                        <?php } ?>
                    
                    
                       
                        <div class="toggler" id="category">
                           		<div class="tabular">
                                    <div class="title">Band Members</div>
                                    <div class="formBlock">
                                              <textarea class="form-control" id="band_members"><?php if($data[0]['band_members']) { echo $data[0]['band_members']; } ?></textarea>  
                                            <div class="clearfix"></div>
    
                                    <button class="save" onclick="add_band_members(<?php echo $page_id; ?>)">Save changes</button> <button class="cancelEdits">Cancel</button>
                                    </div>       
                                </div>                    
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    
                    <div class="infoBox" id="record_label_block">
                    
                    
                     <?php if($data[0]['record_label']) { ?>
                         <h5 class="headBlock"><span class="title">Record Label</span> <span class="value" data-toggle="category"><?php echo $data[0]['record_label']; ?></span><span class="editIt" data-toggle="category"><i class="fa fa-pencil"></i> Edit</span></h5>
                       
                      <?php }else { ?>
                         <h5 class="headBlock"><span class="title">Record Label</span> <span class="value editIt" data-toggle="category">+ Enter Record Label</span></h5>
					  
					  <?php } ?>
                      
                        <div class="toggler" id="category">
                           		<div class="tabular">
                                    <div class="title">Record Label</div>
                                    <div class="formBlock">
                                              <textarea class="form-control" id="record_label"> <?php if($data[0]['record_label']) { echo $data[0]['record_label']; } ?></textarea>  
                                            <div class="clearfix"></div>
    
                                    <button class="save" onclick="add_page_record_label(<?php echo $page_id; ?>);">Save changes</button> <button class="cancelEdits">Cancel</button>
                                    </div>       
                                </div>                    
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    
                    <div class="infoBox" id="short_desc_block">
                    
                     <?php if($data[0]['short_desc']) { ?>
                         <h5 class="headBlock"><span class="title">Short Description</span> <span class="value" data-toggle="category"><?php echo $data[0]['short_desc']; ?></span><span class="editIt" data-toggle="category"><i class="fa fa-pencil"></i> Edit</span></h5>
                       
                      <?php }else { ?>
                       <h5 class="headBlock"><span class="title">Short Description</span> <span class="value editIt" data-toggle="category">Write a short description of your page</span></h5>
					  
					  <?php } ?>
                       
                        <div class="toggler" id="category">
                           		<div class="tabular">
                                    <div class="title">Short Description</div>
                                    <div class="formBlock">
                                              <textarea class="form-control" id="short_desc"> <?php if($data[0]['short_desc']) { echo $data[0]['short_desc']; }else echo "short description"; ?></textarea>  
                                            <div class="clearfix"></div>
    
                                    <button class="save" onclick="add_short_description(<?php echo $page_id; ?>);">Save changes</button> <button class="cancelEdits">Cancel</button>
                                    </div>       
                                </div>                    
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    
                    
                    
                    
                    
                    <div class="infoBox" id="impressum_block">
                    
                       <?php if($data[0]['impressum']) { ?>
                         <h5 class="headBlock"><span class="title">Impressum</span> <span class="value" data-toggle="category"><?php echo $data[0]['impressum']; ?></span><span class="editIt" data-toggle="category"><i class="fa fa-pencil"></i> Edit</span></h5>
                       
                      <?php }else { ?>
                      <h5 class="headBlock"><span class="title">Impressum</span> <span class="value editIt" data-toggle="category">Input Impressum for your Page</span></h5>
					  
					  <?php } ?>
                    
                    
                        <div class="toggler" id="category">
                           		<div class="tabular">
                                    <div class="title">Impressum</div>
                                    <div class="formBlock">
                                              <textarea class="form-control" id="impressum"> <?php if($data[0]['impressum']) { echo $data[0]['impressum']; } else echo "Impressum for your Page" ; ?></textarea>  
                                            <div class="clearfix"></div>
    
                                    <button class="save" onclick="add_impressum(<?php echo $page_id; ?>);">Save changes</button> <button class="cancelEdits">Cancel</button>
                                    </div>       
                                </div>                    
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    
                    <div class="infoBox" id="long_desc_block">
                         <?php if($data[0]['long_desc']) { ?>
                         <h5 class="headBlock"><span class="title">Long Description</span> <span class="value" data-toggle="category"><?php echo $data[0]['short_desc']; ?></span><span class="editIt" data-toggle="category"><i class="fa fa-pencil"></i> Edit</span></h5>
                       
                      <?php }else { ?>
                       <h5 class="headBlock"><span class="title">Long Description</span> <span class="value editIt" data-toggle="category">Write a Long description of your page</span></h5>
					  
					  <?php } ?>
                        <div class="toggler" id="category">
                           		<div class="tabular">
                                    <div class="title">Long Description</div>
                                    <div class="formBlock">
                                              <textarea class="form-control" id="long_desc"><?php if($data[0]['long_desc']) { echo $data[0]['long_desc']; }else echo "long description"; ?></textarea>  
                                            <div class="clearfix"></div>
    
                                    <button class="save" onclick="add_long_description(<?php echo $page_id; ?>);">Save changes</button> <button class="cancelEdits">Cancel</button>
                                    </div>       
                                </div>                    
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    
                       <?php if($data[0]['page_cat_id'] == 2 ) {?>
                       <div class="infoBox" id="page_mission_block">
                     
                        <?php if($data[0]['mission']) { ?>
                         <h5 class="headBlock"><span class="title">mission</span> <span class="value" data-toggle="category"><?php echo $data[0]['mission']; ?></span><span class="editIt" data-toggle="category"><i class="fa fa-pencil"></i>Edit</span></h5>
                       
                      <?php }else { ?>
                         <h5 class="headBlock"><span class="title">mission</span> <span class="value editIt" data-toggle="category">+ Enter mission</span></h5>
                        <?php } ?>
                     
                   
                        <div class="toggler" id="category">
                           		<div class="tabular">
                                    <div class="title">mission</div>
                                    <div class="formBlock">
                                              <textarea class="form-control" id="page_mission"><?php if($data[0]['mission']) {echo $data[0]['mission']; }?></textarea>  
                                            <div class="clearfix"></div>
    
                                    <button class="save" onclick="add_page_mission(<?php echo $page_id; ?>)">Save changes</button> <button class="cancelEdits">Cancel</button>
                                    </div>       
                                </div>                    
                        </div>
                        <div class="clearfix"></div>
                    </div> 
                        
                       <?php } ?>     
                    
                    
                    
                    
                    <div class="infoBox" id="page_phone_block">
                     
                        <?php if($data[0]['phone']) { ?>
                         <h5 class="headBlock"><span class="title">phone</span> <span class="value" data-toggle="category"><?php echo $data[0]['phone']; ?></span><span class="editIt" data-toggle="category"><i class="fa fa-pencil"></i>Edit</span></h5>
                       
                      <?php }else { ?>
                         <h5 class="headBlock"><span class="title">phone</span> <span class="value editIt" data-toggle="category">+ Enter phone</span></h5>
                        <?php } ?>
                     
                   
                        <div class="toggler" id="category">
                           		<div class="tabular">
                                    <div class="title">phone</div>
                                    <div class="formBlock">
                                              <textarea class="form-control" id="page_phone"><?php if($data[0]['phone']) {echo $data[0]['phone']; }?></textarea>  
                                            <div class="clearfix"></div>
    
                                    <button class="save" onclick="add_page_phone(<?php echo $page_id; ?>)">Save changes</button> <button class="cancelEdits">Cancel</button>
                                    </div>       
                                </div>                    
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    
                    
                    
                    
                    
                    
                    
                    
                        <?php if($data[0]['page_cat_id'] == 3 ) {?>       
                    
                    
                     <div class="infoBox" id="page_found_block">
                     
                        <?php if($data[0]['founded_date']) { ?>
                         <h5 class="headBlock"><span class="title">Founded</span> <span class="value" data-toggle="category"><?php echo $data[0]['founded_date']; ?></span><span class="editIt" data-toggle="category"><i class="fa fa-pencil"></i>Edit</span></h5>
                       
                      <?php }else { ?>
                         <h5 class="headBlock"><span class="title">Founded</span> <span class="value editIt" data-toggle="category">+ Enter Founded Date</span></h5>
                        <?php } ?>
                     
                   
                        <div class="toggler" id="category">
                           		<div class="tabular">
                                    <div class="title">Founded</div>
                                    <div class="formBlock">
                                              <textarea class="form-control" id="page_founder"><?php if($data[0]['founded_date']) {echo $data[0]['founded_date']; }?></textarea>  
                                            <div class="clearfix"></div>
    
                                    <button class="save" onclick="add_page_found(<?php echo $page_id; ?>)">Save changes</button> <button class="cancelEdits">Cancel</button>
                                    </div>       
                                </div>                    
                        </div>
                        <div class="clearfix"></div>
                    </div>
                     <div class="infoBox" id="page_awards_block">
                     
                      <?php if($data[0]['awards']) { ?>
                         <h5 class="headBlock"><span class="title">Awards</span> <span class="value" data-toggle="category"><?php echo $data[0]['awards']; ?></span><span class="editIt" data-toggle="category"><i class="fa fa-pencil"></i>Edit</span></h5>
                       
                      <?php }else { ?>
                         <h5 class="headBlock"><span class="title">Awards</span> <span class="value editIt" data-toggle="category">+ Enter Awards</span></h5>
                        <?php } ?>
                        
                        <div class="toggler" id="category">
                           		<div class="tabular">
                                    <div class="title">Awards</div>
                                    <div class="formBlock">
                                              <textarea class="form-control" id="page_awards">  <?php if($data[0]['awards']) { echo $data[0]['awards']; } else echo "Enter Awards"; ?> </textarea>  
                                            <div class="clearfix"></div>
    
                                    <button class="save" onclick="add_awards(<?php echo $page_id; ?>)">Save changes</button> <button class="cancelEdits">Cancel</button>
                                    </div>       
                                </div>                    
                        </div>
                        <div class="clearfix"></div>
                    </div>
                     <div class="infoBox" id="page_products_block">
                       <?php if($data[0]['products']) { ?>
                         <h5 class="headBlock"><span class="title">Products</span> <span class="value" data-toggle="category"><?php echo $data[0]['products']; ?></span><span class="editIt" data-toggle="category"><i class="fa fa-pencil"></i>Edit</span></h5>
                       
                      <?php }else { ?>
                          <h5 class="headBlock"><span class="title">Products</span> <span class="value editIt" data-toggle="category"><?php if($data[0]['products']) { echo $data[0]['products']; } else echo " + Enter Products"; ?></span></h5>
                        <?php } ?>
                      
                        <div class="toggler" id="category">
                           		<div class="tabular">
                                    <div class="title">Products</div>
                                    <div class="formBlock">
                                              <textarea class="form-control" id="page_products"><?php if($data[0]['awards']) { echo $data[0]['products']; } else echo "Enter Products Offered"; ?></textarea>  
                                            <div class="clearfix"></div>
    
                                    <button class="save" onclick="add_products(<?php echo $page_id; ?>);">Save changes</button> <button class="cancelEdits">Cancel</button>
                                    </div>       
                                </div>                    
                        </div>
                        <div class="clearfix"></div>
                    </div>
<?php } ?>
                                
                    
                    
                    
                    
                    <div class="infoBox" id="page_web_site_block">
                    
                    
                    <?php if($data[0]['web_site']) { ?>
                         <h5 class="headBlock"><span class="title">Website</span> <span class="value" data-toggle="category"><?php echo $data[0]['web_site']; ?></span><span class="editIt" data-toggle="category"><i class="fa fa-pencil"></i> Edit</span></h5>
                       
                      <?php }else { ?>
                        <h5 class="headBlock"><span class="title">Website</span> <span class="value editIt" data-toggle="category">Enter Your Website</span></h5>
                        <?php } ?>
                        <div class="toggler" id="category">
                           		<div class="tabular">
                                    <div class="title">Website</div>
                                    <div class="formBlock">
                                              <textarea class="form-control" id="page_web_site"><?php if($data[0]['web_site']) { echo $data[0]['web_site']; } ?></textarea>  
                                            <div class="clearfix"></div>
    
                                    <button class="save" onclick="add_page_web_site(<?php echo $page_id; ?>);">Save changes</button> <button class="cancelEdits">Cancel</button>
                                    </div>       
                                </div>                    
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    
                    <div class="infoBox" id="official_page_block">
                    
                      <?php if($data[0]['official_page']) { ?>
                         <h5 class="headBlock"><span class="title">Official Page</span> <span class="value" data-toggle="category"><?php echo $data[0]['official_page']; ?></span><span class="editIt" data-toggle="category"><i class="fa fa-pencil"></i> Edit</span></h5>
                       
                      <?php }else { ?>
                         <h5 class="headBlock"><span class="title">Official Page</span> <span class="value editIt" data-toggle="category">Enter the official brand, celebrity or organization your Page is about</span></h5>
                        <?php } ?>
                       
                        <div class="toggler" id="category">
                           		<div class="tabular">
                                    <div class="title">Official Page</div>
                                    <div class="formBlock">
                                              <textarea class="form-control" id="official_page"><?php if($data[0]['official_page']) { $data[0]['official_page']; } ?></textarea>  
                                            <div class="clearfix"></div>
    
                                    <button class="save" onclick="add_official_page(<?php echo $page_id; ?>);">Save changes</button> <button class="cancelEdits">Cancel</button>
                                    </div>       
                                </div>                    
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    
                    <!-- -- for 2nd category brand and products 
                    
                    
                    <div class="infoBox">
                        <h5 class="headBlock"><span class="title">Address</span> <span class="value editIt" data-toggle="category">Enter your Address</span></h5>
                        <div class="toggler" id="category">
                           		<div class="tabular">
                                    <div class="title">Address</div>
                                    <div class="formBlock">
                                                <div class="form-group">
                                                <label for="inputEmail3" class="col-sm-3 control-label">Address</label>
                                                <div class="col-sm-9">
                                                <input type="text" class="form-control" id="inputEmail3" placeholder="">
                                                </div>
                                                </div>
                                                
                                                <div class="form-group">
                                                <label for="inputEmail3" class="col-sm-3 control-label">City/Town</label>
                                                <div class="col-sm-9">
                                                <input type="text" class="form-control" id="inputEmail3" placeholder="">
                                                </div>
                                                </div>
                                                
                                                <div class="form-group">
                                                <label for="inputEmail3" class="col-sm-3 control-label">Zip Code</label>
                                                <div class="col-sm-9">
                                                <input type="text" class="form-control" id="inputEmail3" placeholder="">
                                                </div>
                                                </div>
                                                
                                                
                                                <div class="note">Note: If you add a valid address, people will be able to see and check in to your Page using Facebook Places.</div>
                                            <div class="clearfix"></div>
    
                                    <button class="save">Save changes</button> <button class="cancelEdits">Cancel</button>
                                    </div>       
                                </div>                    
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    
                    -->
                    
         
                                       
                                       
                    
            </div>
        </div>
    </div>
    
    </div>