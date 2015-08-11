<?php 

$jobs = $this->jobmodel->get_jobs_by_industries();
//print_r($jobs);
?>

<div class="col-md-9">
            <div class="jobSearchBar">
                <div class="top-block">
                    <div class="iconJob">
                        <span class="fa  fa-group"></span>
                        <p>Jobs</p>
                    </div>
                    <div class="field-Holder"><input placeholder="Search by Job title, keyword, or Company Name" class="SearchJob" /></div>
                    <div class="search"><button>Search</button></div>
                </div>
                <div class="advancedSearch-block">
                    <div class="inner-Block">
                        <div class="advanced-search-fields" id="advanced-search-fields" style="display: block;">
                            <div class="country field col-md-6">
                                <label class="field-label" for="countryCode">Country</label>
                                <div class="select-wrapper">
                                     <select class="country-code" name="country" id="country">
			<option value="">Select Country</option>
			</select> 
                                    <span aria-hidden="true" class="fa fa-angle-down"></span>
                                </div>
                            </div>
                            <div class="zip field col-md-6">
                                <label class="field-label" for="postalCode">Zip code</label><br />
                                <input type="text" value="530016" maxlength="10" size="9" id="postalCode" name="postalCode">
                            </div>
                            <div class="clearfix"></div>
                            <div class="industry field col-md-6">
                                <label class="field-label">Industry</label>
                                <div class="list-wrapper">
                                    <ul class="industries li-scroll-content" id="control_gen_3">
                                    
                                     <?php 
									 $industry = $this->lookup->get_lookup_industry();
									 foreach($industry as $industries):?>
                                                
                                        <li>
                                          <input type="checkbox" name="job_search_industries[]" value="<?php echo $industries->lookup_id; ?>" ><span style="margin-left:5px; font-size:14px;"><?php echo $industries->lookup_value; ?></span>
                
                                        </li>
                                        
                                         <?php endforeach;?>   
                                        
                                    </ul><div class="li-scroll-track"><div class="li-scroll-thumb" style="height: 12px;"><div class="li-scroll-scrollbar"></div></div></div>
                                    <script class="li-control" type="text/javascript+initialized" id="controlinit-1">LI.Controls.addControl('control-1','CheckboxList',{});</script>
                                </div>
                            </div>
                            <div class="function field col-md-6">
                                <label class="field-label">Functions</label>
                                <div class="list-wrapper" id="control_gen_4">
                                    <div class="scrollbar"><div class="track"><div class="thumb"><div class="end"></div></div></div></div>
                                    <div class="viewport">
                                        <ul class="functions full li-scroll-content">
                                        
                                        <?php
										$jobtype = $this->lookup->get_lookup_jobtype();
										
										 foreach($jobtype as $job):?>
                
              
                                            <li>
                                                 <input type="checkbox" name="job_search_job_type[]" value="<?php echo $job->lookup_id; ?>" ><span style="margin-left:5px; font-size:14px;"><?php echo $job->lookup_value; ?></span>
                                            </li>
                                             <?php endforeach;?> 
                                        </ul>
                                    </div>

                                </div>
                                <div class="search"><button>Search</button> <a class="more-options" href="#">More options</a></div>
                            </div>


                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>

                <div class="advancedSearchControl"><span>Advanced Search <i class="fa fa-angle-double-down"></i></span></div>
            </div>
        </div>
        <?php 
		$jobs = $this->jobmodel->get_jobs_by_industries();
		//print_r($jobs);
		if(!empty($jobs)) { ?>
        <div class="col-md-9">
            <div class="searchBlocks">
                <h3>Jobs you may be interested in </h3>
                <p>Your job Search is Private</p>
                <?php 
                foreach($jobs as $job)
                { ?>
                <div class="searchBlock col-md-3">
                   
                    <div class="originalBlock">
                        <a href="#" id="job_list<?php echo $job['job_id'];?>"  class="fa fa-close"></a>
                        <img src="<?php echo base_url();?>uploads/<?php if(!empty($job['company_image'])) echo $job['company_image']; else echo 'default_profile_pic.png'?>" />
                        <h2><a href="#"><?php echo $job['job_title']; ?></a></h2>
                        <p>
                        <?php if(!empty($job['country'])) 
						{
							echo $job['country'];
						}else{
							 if(!empty($job['company_country']))
						{
							echo $job['company_country'];
							if(!empty($job['company_state']))
							{
								echo ", ".$job['company_state'];
							}
						}} ?>
                        </p>
                    </div>
                    <div class="overlayBlock">
                        <span>You won't see this job anymore •  <a href="#">Undo</a></span>
                    </div>
                </div>

          <?php } ?>
                <div class="clearfix"></div>
            </div>
        </div>
        <?php } ?>