<section class="col-lg-6 col-md-6 col-sm-5 col-xs-12 coloumn2 groupsSt">
      <h2>Jobs</h2>
      <div class="posts">
        <div class="tabBar form-group">
            <div class="col-md-6 pull-right">
<div class="input-group">
          <input type="text" placeholder="Search Jobs" id="exampleInputAmount" class="form-control">
          <div class="input-group-addon glyphicon glyphicon-search"></div>
        </div>
</div>  
<div class="clearfix"></div>
<div class="row">
<div class="col-md-6">
<?php $industry = $this->lookup->get_lookup_industry(); ?>
          <select name="industry" class="form-control" >
                 <option value="">Industry</option>
				 <?php foreach($industry as $industries):?>
                 <option value="<?php echo $industries->lookup_value ?>"><?php echo $industries->lookup_value ?></option>
                 <?php endforeach;?> 
                 </select>  
              </div>
<div class="col-md-6">
                     <select name="usa_states" id="usa_states" class="form-control" data-rule-required="true" 
    						        data-msg-required="please select State">
          				 <option value="">Select State</option>
          				 </select>
                        </div>
</div>
        </div>  
      </div>
    </section>