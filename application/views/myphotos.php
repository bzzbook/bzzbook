<?php 

$upload_path = "uploads/";		
$thumb_width = "150";						
$thumb_height = "150";	
$data = $this->profile_set->get_my_pics(); 

$videos = $this->profile_set->get_my_videos();
$user_id = $this->session->userdata('logged_in')['account_id'];
$profiledata = $this->customermodel->profiledata($user_id);
?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>cropimage/css/cropimage.css" />
<link type="text/css" href="<?php echo base_url(); ?>cropimage/css/imgareaselect-default.css" rel="stylesheet" />

<section class="col-lg-9 col-md-9 nopad">
      <div class="col-xs-12 ProfileView">
        <section class="visitorBox">
          <div class="visitiBoxInner">
            <figure class="compCover"><img alt="" src="<?php echo base_url(); ?>images/about_banner.jpg" class="img-responsive"></figure>
            <div class="profileLogo">
              <figure class="cmplogo"><img src="<?php echo base_url().'uploads/'.$profiledata[0]->user_img_thumb; ?>"></figure>
              <!-- <span class="inside glyphicon glyphicon-camera" ></span>--> 
            </div>
            <h4 class="profile-name"><?php echo $profiledata[0]->user_firstname.' '.$profiledata[0]->user_lastname; ?></h4>
            <div class="ProfileViewNav"></div>
          </div>
        </section>
        <section>
<div class="container">

	<div class="crop_box">
<form class="uploadform" method="post" enctype="multipart/form-data" action='' name="photo">	
	<div class="crop_set_upload">
		<div class="crop_upload_label">Upload files: </div>
		<div class="crop_select_image"><div class="file_browser"><input type="file" name="imagefile" id="imagefile" class="hide_broswe" /></div></div>
		<div class="crop_select_image"><input type="submit" value="Upload" class="upload_button" name="submitbtn" id="submitbtn" /></div><div id="loadingimage" style="padding-top:15px;"></div>
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
                       <textarea cols="" rows="" name="posts" id="posts" class="form-control" placeholder="Say something..."></textarea>
					<select name="post_group" id="post_group"><option value="0">Public</option> <?php $groups = $this->profile_set->get_user_groups(); if($groups) { 
		foreach($groups as $group)
		{
			echo "<option value='".$group['group_id']."'>".$group['group_name']."</option>";
		}
		
		
		} ?></select> <div class="crop_preview_submit"><input type="submit" name="upload_thumbnail" value="Save Thumbnail" id="save_thumb" class="submit_button" /> </div>
				</form>
				
			</div>
		</div>
	</div>
	
</div>
</section>
      </div>
      
      <section class="about-user-details">
        <h4><span aria-hidden="true" class="glyphicon glyphicon-picture"></span> My Photos (<?php if($data) echo count($data); else echo " Photos not uploaded ";  ?>)</h4>
         	<div class="userPhotos">
             <?php if($data){  foreach($data as $image){ ?>
            	  <div class="photoThumb col-md-3">
                	<a href="<?php  echo base_url();?>uploads/<?php echo $image['image_thumb']; ?>" class="mpView" data-lightbox="example-1" data-lightbox="my_photos"><img src="<?php echo base_url(); ?>images/mp_view.png" alt=""></a>
                	<figure><img src="<?php echo base_url();?>uploads/<?php echo $image['image_thumb']; ?>" width="100%" height="100%" alt=""></figure>
                    <div class="phOptions">
                    <span class="mpImg"><a href="#"><img src="<?php echo base_url(); ?>images/bzz_icon.png" alt=""></a></span>
                    <span class="mpLike"><a href="javascript:void(0)"><img src="<?php echo base_url(); ?>images/like_myphotos.png" alt=""><em><?php echo $image['like_count'];?></em></a></span>
                    <span class="mpComment"><a href="javascript:void(0)"><img src="<?php echo base_url(); ?>images/comments_myphotos.png" alt=""><em><?php echo $image['comment_count'];?></em></a></span>
                   
                    </div>
                </div>
                 <?php  } } ?>
                <div class="clear"></div>
            </div>
      </section>
      <section class="about-user-details">
        <h4><span aria-hidden="true" class="glyphicon glyphicon-facetime-video"></span>My Videos ( <?php if($videos) echo count($videos); else echo " Videos not uploaded "; ?> )<div class="myphotos-uploadbtn1 btn-black fileinput-button"> <span>Upload Video</span> 
                <!-- The file input field used as target for the file upload widget -->
              <form action="" class="uploadvideoform" method="post" enctype="multipart/form-data">
             <input name="userfile" id="userfile" size="20" required="" type="file">
             </form>    
                </div></h4>
         	<div class="userPhotos">
                <?php  if($videos){ foreach($videos as $video){ ?>

            	<div class="photoThumb col-md-3">
<?php /*?>                	<a href="#" class="mpViewvid"><img src="<?php echo base_url(); ?>images/play_myphotos.png" alt=""></a>
<?php */?>                	<figure><video width="185" controls="">
  <source src="<?php  echo base_url();?>uploads/<?php  echo $video['video_name']; ?>" type="video/mp4" >
   <!-- <source type="video/mp4" src="http://bzzbook.com/videos/intro.mp4"></source>
<source type="video/ogg" src="http://bzzbook.com/videos/intro.ogv"></source> -->
</video></figure>
                    <div class="phOptions">
                    <span class="mpImg"><a href="#"><img src="<?php echo base_url(); ?>images/bzz_icon.png" alt=""></a></span>
                    <span class="mpLike"><a href="#"><img src="<?php echo base_url(); ?>images/like_myphotos.png" alt=""><em>67</em></a></span>
                    <span class="mpComment"><a href="#"><img src="<?php echo base_url(); ?>images/comments_myphotos.png" alt=""><em>56</em></a></span>
                    </div>
                </div>
               
               <?php } }?>
                <div class="clear"></div>
            </div>
      </section>
    </section>
