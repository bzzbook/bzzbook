<?php $data = $this->profile_set->get_my_pics(); ?>
<section class="col-lg-6 col-md-6 col-sm-5 col-xs-12 coloumn2 groupsSt">
      <h2>My Photos & Videos</h2>
      <div class="posts">
        <div class="tabBar form-group" style="padding-bottom:10px">
        	<div class="col-md-6">
<span>My Photos ( <?php echo count($data); ?> ) </span> 
</div>  
<div class="col-md-6">
<span class="btn btn-success fileinput-button "> <span>Add Picture</span> 
                <!-- The file input field used as target for the file upload widget -->
                <input type="file" multiple="" name="files[]" id="fileupload">
                </span>
 <input class="btn btn-success pull-right" type="button" id="manage" value="save">
</div>
<div class="clearfix"></div>
        </div>
        
    <div class="groupEditBlock">
     
			<?php foreach($data as $image){ ?>
    <figure class="pfpic">
    <img alt="" src="<?php echo base_url();?>uploads/profile/<?php echo $image->filename; ?>" width="125" height="135" style="margin-left:20px"></figure>
    <?php } ?>
    <div class="clear"></div>
 
    </div>      
      </div>
      
      <div class="posts">
        <div class="tabBar form-group"  style="padding-bottom:10px">
        	<div class="col-md-6">
<span>My Videos ( 3 ) </span> 
</div>  
<div class="col-md-6">
<span class="btn btn-success fileinput-button"> <span>Add Picture</span> 
                <!-- The file input field used as target for the file upload widget -->
                <input type="file" multiple="" name="files[]" id="fileupload">
                </span>
 <input class="pull-right btn btn-success" type="submit" value="save">
</div>
<div class="clearfix"></div> 

        </div>
        
    <div class="groupEditBlock">
    <figure class="pfpic"><img alt="" src="images/pf_pic.png" width="125" height="135" style="margin-left:20px"></figure><span></span>
     <figure class="pfpic"><img alt="" src="images/pf_pic.png" width="125" height="135" style="margin-left:15px"></figure>
      <figure class="pfpic"><img alt="" src="images/pf_pic.png" width="125" height="135" style="margin-left:15px"></figure>
       <figure class="pfpic"><img alt="" src="images/pf_pic.png" width="125" height="135" style="margin-left:15px"></figure>         
    <div class="clear"></div>
    
    </div>
      </div>
    </section>