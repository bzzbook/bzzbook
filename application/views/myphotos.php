<?php 
 $data = $this->profile_set->get_my_pics(); 
//$media = $this->profile_set->get_my_videos();
?>

<section class="col-lg-6 col-md-6 col-sm-5 col-xs-12 coloumn2 groupsSt">
      <h2>My Photos & Videos</h2>
      <div class="posts">
        <div class="tabBar form-group" style="padding-bottom:10px">
        	<div class="col-md-6">
<span>My Photos ( <?php  echo count($data); ?> ) </span> 
</div>  
 <?php $attr = array('id' => 'upload_pics', 'name' => 'upload_pics'); ?> 
 <?php echo form_open_multipart('customer/do_upload',$attr);?>
<div class="">
<div id="mulitplefileuploader">Upload</div>
<div class="clear"></div>
<div id="status"></div>

</div>
</form>
<div class="clearfix"></div>
        </div>
        
    <div class="groupEditBlock">
     
     
       <?php foreach($data as $image){ ?>
        <div class="view second-effect" >
        <img src="<?php echo base_url();?>uploads/<?php echo $image->user_img_name; ?>" />
        <div class="mask">
        <a href="<?php  echo base_url();?>uploads/<?php echo $image->user_img_name; ?>" class="info" data-lightbox="example-1" data-lightbox="my_photos">Read More</a>
        </div>
        </div>
        <?php  } ?>
     
     
			<?php /*?><?php foreach($data as $image){ ?>
    <figure class="pfpic"><a class="example-image-link" href="<?php echo base_url();?>uploads/<?php echo $image->filename; ?>" data-lightbox="example-1">
    <img alt="" data-lightbox="my_photos" src="<?php echo base_url();?>uploads/<?php echo $image->filename; ?>" ></a></figure>
    <?php } ?><?php */?>
    <div class="clear"></div>
 
    </div>      
      </div>
      
      <div class="posts">
        <div class="tabBar form-group"  style="padding-bottom:10px">
        	<div class="col-md-6">
<span>My Videos ( <?php // echo count($media); ?> 3 ) </span> 
</div>  
<div class="">
                <!-- The file input field used as target for the file upload widget -->
              <div id="mulitplefileuploader1">Upload</div>
<div class="clear"></div>
<div id="status1"></div>

</div>
<div class="clearfix"></div> 

        </div>
        
    <div class="groupEditBlock">
    <?php //  foreach($media as $video){ ?>
    <video width="150" height="150" controls="" style="margin-left:20px">
  <source src="<?php  //echo base_url();?>videos/<?php // echo $video->videos; ?>" type="video/mp4" >
 <!-- <source type="video/mp4" src="http://bzzbook.com/videos/intro.mp4"></source>
<source type="video/ogg" src="http://bzzbook.com/videos/intro.ogv"></source> -->
</video>
<!-- <img alt="" src="images/pf_pic.png" width="125" height="135" style="margin-left:20px"></figure><span></span> -->
    
    <?php // } ?>
    <div class="clear"></div>
    </div>
      </div>
    </section>