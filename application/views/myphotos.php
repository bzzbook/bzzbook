<?php 
$data = $this->profile_set->get_my_pics(); 
$media = $this->profile_set->get_my_videos();
?>

<section class="col-lg-6 col-md-6 col-sm-5 col-xs-12 coloumn2 groupsSt">
      <h2>My Photos & Videos</h2>
      <div class="posts">
        <div class="tabBar form-group" style="padding-bottom:10px">
        	<div class="col-md-6">
<span>My Photos ( <?php echo count($data); ?> ) </span> 
</div>  
 <?php $attr = array('id' => 'upload_pics', 'name' => 'upload_pics'); ?> 
 <?php echo form_open_multipart('customer/do_upload',$attr);?>
<div class="col-md-6">
<span class="btn btn-success fileinput-button "> <span>Add Picture</span> 
                <!-- The file input field used as target for the file upload widget -->
                <input type="file" name="userfile" id="userfile" size="20" required/>
                </span>
 <input class="btn btn-success pull-right" type="submit"  value="save">

</div>
</form>
<div class="clearfix"></div>
        </div>
        
    <div class="groupEditBlock">
     
			<?php foreach($data as $image){ ?>
    <figure class="pfpic"><a class="example-image-link" href="<?php echo base_url();?>uploads/<?php echo $image->filename; ?>" data-lightbox="example-1">
    <img alt="" data-lightbox="my_photos" src="<?php echo base_url();?>uploads/<?php echo $image->filename; ?>" width="125" height="135" style="margin-left:20px"></a></figure>
    <?php } ?>
    <div class="clear"></div>
 
    </div>      
      </div>
      
      <div class="posts">
        <div class="tabBar form-group"  style="padding-bottom:10px">
        	<div class="col-md-6">
<span>My Videos ( <?php echo count($media); ?>  ) </span> 
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
    <?php foreach($media as $video){ ?>
    <video width="150" height="150" controls="" style="margin-left:20px">
  <source src="<?php echo base_url();?>videos/<?php echo $video->videos; ?>" type="video/mp4" >
 <!-- <source type="video/mp4" src="http://bzzbook.com/videos/intro.mp4"></source>
<source type="video/ogg" src="http://bzzbook.com/videos/intro.ogv"></source> -->
</video>
<!-- <img alt="" src="images/pf_pic.png" width="125" height="135" style="margin-left:20px"></figure><span></span> -->
    
    <div class="clear"></div>
    <?php } ?>
    </div>
      </div>
    </section>