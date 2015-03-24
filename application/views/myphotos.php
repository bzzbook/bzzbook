<?php

//error_reporting (E_ALL ^ E_NOTICE);

$upload_path = "uploads/";				
						
$thumb_width = "150";						
$thumb_height = "150";						


?>



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
<?php /*?> <?php $attr = array('id' => 'upload_pics', 'name' => 'upload_pics'); ?> 
 <?php echo form_open_multipart('customer/do_upload',$attr);?>
<div class="">
<div id="mulitplefileuploader">Upload</div>
<div class="clear"></div>
<div id="status"></div>

</div>
</form><?php */?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>cropimage/css/cropimage.css" />
<link type="text/css" href="<?php echo base_url(); ?>cropimage/css/imgareaselect-default.css" rel="stylesheet" />


<div class="clearfix"></div>
        </div>
        
        <section>
<div class="container">

	<div class="crop_box">
<form class="uploadform" method="post" enctype="multipart/form-data" action='' name="photo">	
	<div class="crop_set_upload">
		<div class="crop_upload_label">Upload files: </div>
		<div class="crop_select_image"><div class="file_browser"><input type="file" name="imagefile" id="imagefile" class="hide_broswe" /></div></div>
		<div class="crop_select_image"><input type="submit" value="Upload" class="upload_button" name="submitbtn" id="submitbtn" /></div>
	</div>
</form>			
		<div class="crop_set_preview" style="display:none;">
			<div class="crop_preview_left"> 
				<div class="crop_preview_box_big" id='viewimage'> 
					
				</div>
			</div>
			<div class="crop_preview_right">
				Preview (150x150 px)
				<div class="crop_preview_box_small" id='thumbviewimage' style="position:relative; overflow:hidden;"> </div>
				
				<form name="thumbnail" action="<?php echo base_url();?>profile/upload_profile_thumb" method="post">
					<input type="hidden" name="x1" value="" id="x1" />
					<input type="hidden" name="y1" value="" id="y1" />
					<input type="hidden" name="x2" value="" id="x2" />
					<input type="hidden" name="y2" value="" id="y2" />
					<input type="hidden" name="w" value="" id="w" />
					<input type="hidden" name="h" value="" id="h" />
					<input type="hidden" name="wr" value="" id="wr" />
					
					<input type="hidden" name="filename" value="" id="filename" />
					<div class="crop_preview_submit"><input type="submit" name="upload_thumbnail" value="Save Thumbnail" id="save_thumb" class="submit_button" /> </div>
				</form>
				
			</div>
		</div>
	</div>
	
</div>
</section>
        
        
    <div class="groupEditBlock">
     
     
       <?php if($data){  foreach($data as $image){ ?>
        <div class="view second-effect" >
        <img src="<?php echo base_url();?>uploads/<?php echo $image->image_thumb; ?>" width="137px" />
        <div class="mask">
        <a href="<?php  echo base_url();?>uploads/<?php echo $image->image_thumb; ?>" class="info" data-lightbox="example-1" data-lightbox="my_photos">Read More</a>
        </div>
        </div>
        <?php  } } ?>
     
     
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
<div class="btn1 btn-black fileinput-button"> <span>Change Picture</span> 
                <!-- The file input field used as target for the file upload widget -->
             <input name="userfile" id="userfile" size="20" required="" type="file">
                 
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