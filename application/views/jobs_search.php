<section class="col-lg-6 col-md-6 col-sm-5 col-xs-12 coloumn2 groupsSt">
      <h2>Jobs</h2>
      <div class="posts">
        <div class="tabBar form-group">

<div class="clearfix"></div>
<form id="search_job" name="search_job" action="<?php echo base_url(); ?>jobs/search_jobs" method="post">
<div class="row">
<div class="field col-md-4 col-md-offset-1">
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

<button class="btn btn-success" type="submit">Get Jobs</button>          
</div>
</div>
</form>
        </div>  
      </div> 
     
      <?php
	  if(isset($jobs))
	  {
	   $this->load->view('job_search',$jobs);
}          ?> 
    </section>