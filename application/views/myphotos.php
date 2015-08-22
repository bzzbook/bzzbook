<?php 

$upload_path = "uploads/";		
$thumb_width = "150";						
$thumb_height = "150";
$current_user = $this->session->userdata('logged_in')['account_id'];
if(!isset($user_id))	
$id = $current_user;
else{
$id = $user_id;
$myfrnd = $this->friendsmodel->user_frnds($user_id);

}


$data = $this->profile_set->get_my_pics($id);
$videos = $this->profile_set->get_my_videos($id);
$profiledata = $this->customermodel->profiledata($id);
?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>cropimage/css/cropimage.css" />
<link type="text/css" href="<?php echo base_url(); ?>cropimage/css/imgareaselect-default.css" rel="stylesheet" />

<section class="col-lg-9 col-md-9 nopad">
      <div class="col-xs-12 ProfileView">
        <section class="visitorBox">
          <div class="visitiBoxInner">
            <figure class="compCover"><img alt="" src="<?php echo base_url(); ?>images/about_banner.jpg" class="img-responsive"></figure>
            <div class="profileLogo">
              <figure class="cmplogo"><img src="<?php echo base_url().'uploads/';if(!empty($profiledata[0]->user_img_thumb)) echo $profiledata[0]->user_img_thumb; else echo 'default_profile_pic.png';?>"></figure>
              
              <?php 
			$searchblock = '';
			 if(isset($myfrnd)){
			//print_r($myfrnd);
			 if($myfrnd[0]['request_status'] == 'Y') 
				   {
               $searchblock .= "<div class='addfrdbtn'><a href='javascript:void(0);'>Friends</a></div>";
				   }elseif( $myfrnd[0]['request_status'] == 'W'){
			 $searchblock .= "<div class='addfrdbtn'><a href='javascript:void(0);'>Pending</a></div>";
				   }else{
			 $searchblock .= "<div class='addfrdbtn'><a id='addFrnd".$user_id."'
			  href='javascript:void(0);' onclick='addSearchFrnd(" .$user_id. ");'>Add Friend</a></div>";
				   }
			  
			 }
			echo $searchblock;
			?>
              <!-- <span class="inside glyphicon glyphicon-camera" ></span>--> 
            </div>
            <h4 class="profile-name"><?php echo $profiledata[0]->user_firstname.' '.$profiledata[0]->user_lastname; ?></h4>
            <div class="ProfileViewNav"></div>
          </div>
        </section>
        <section>
<div class="container">
<?php if(isset($user_id) && $user_id==$current_user || !isset($user_id)){ ?>
	<div class="crop_box">
<form class="uploadform" method="post" enctype="multipart/form-data" action='' name="photo">	
	<div class="crop_set_upload">
		<div class="crop_upload_label">Upload files: </div>
		<div class="crop_select_image"><div class="file_browser"><input type="file" name="imagefile" id="imagefile" class="hide_broswe" /></div></div>
		<div class="crop_select_image"><input type="submit" value="Upload" class="upload_button" name="submitbtn" id="myphotos_submitbtn" /></div><div id="loadingimage" style="padding-top:15px;"></div>
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
	<?php } ?>
</div>
</section>
      </div>
      
      <section class="about-user-details">
        <h4><span aria-hidden="true" class="glyphicon glyphicon-picture"></span> My Photos (<?php if($data) echo count($data); else echo " Photos not uploaded ";  ?>)</h4>
         	<div class="userPhotos">
             <?php if($data){  foreach($data as $image){ $fileimage = $image['image_thumb']; 
			

			 ?>
            	  <div class="fbphotobox photoThumb col-md-3" id="fbphotobox-all">
                	<?php /*?><a href="<?php  echo base_url();?>uploads/<?php echo $image['image_thumb']; ?>" class="mpView" data-lightbox="example-1" data-lightbox="my_photos"><img src="<?php echo base_url(); ?>images/mp_view.png" alt=""></a><?php */?>
                	<figure><img id="<?php echo $image['post_id'] ?>" class="photo" fbphotobox-src="<?php echo base_url();?>uploads/<?php echo $fileimage; ?>" src="<?php echo base_url();?>uploads/<?php echo $fileimage; ?>" width="100%" height="100%" alt=""></figure>
                    <div class="phOptions">
                   <?php /*?> <span class="mpImg"><a href="#"><img src="<?php echo base_url(); ?>images/bzz_icon.png" alt=""></a></span><?php */?>
                    <span class="mpLike"><a href="javascript:void(0)"><img src="<?php echo base_url(); ?>images/like_myphotos.png" alt=""><em><?php echo $image['like_count'];?></em></a></span>
                    <span class="mpComment"><a href="javascript:void(0)"><img src="<?php echo base_url(); ?>images/comments_myphotos.png" alt=""><em><?php echo $image['comment_count'];?></em></a></span>
                   
                    </div>
                </div>
                 <?php  } } ?>
                <div class="clear"></div>
            </div>
      </section>
      <section class="about-user-details">
        <h4><span aria-hidden="true" class="glyphicon glyphicon-facetime-video"></span>My Videos ( <?php if($videos) echo count($videos); else echo " Videos not uploaded "; ?> )<?php if(isset($user_id) && $user_id==$current_user || !isset($user_id)){ ?>
<div class="myphotos-uploadbtn1 btn-black fileinput-button"> <span>Upload Video</span> 
                <!-- The file input field used as target for the file upload widget -->
              <form action="" class="uploadvideoform" method="post" enctype="multipart/form-data">
             <input name="userfile" id="userfile" size="20" required="" type="file" >
             </form>    
                </div><?php } ?></h4>
         	<div class="userPhotos">
           	
                <?php  if($videos){ foreach($videos as $video){ ?>

            	<div class="photoThumb col-md-3">
                <a class="mpViewvid video_play" data-toggle="modal" data-target="#videoModal" data-theVideo="<?php  echo base_url();?>uploads/<?php  echo $video['video_name']; ?>">
<img alt="" src="<?php echo base_url(); ?>images/play_myphotos.png">
</a>
<?php /*?>                	<a href="#" class="mpViewvid"><img src="<?php echo base_url(); ?>images/play_myphotos.png" alt=""></a>
<?php */?>               <a href="#" class="video_play" data-toggle="modal" data-target="#videoModal" data-theVideo="<?php  echo base_url();?>uploads/<?php  echo $video['video_name']; ?>">
<figure style="height:105px !important;"><video width="185" class="remove_video_controls">

  <source src="<?php  echo base_url();?>uploads/<?php  echo $video['video_name']; ?>" type="video/mp4" >
   <!-- <source type="video/mp4" src="http://bzzbook.com/videos/intro.mp4"></source>
<source type="video/ogg" src="http://bzzbook.com/videos/intro.ogv"></source> -->
</video></figure></a>
                    <!--<div class="phOptions">
                    <span class="mpImg"><a href="#"><img src="<?php echo base_url(); ?>images/bzz_icon.png" alt=""></a></span>
                    <span class="mpLike"><a href="#"><img src="<?php echo base_url(); ?>images/like_myphotos.png" alt=""><em>67</em></a></span>
                    <span class="mpComment"><a href="#"><img src="<?php echo base_url(); ?>images/comments_myphotos.png" alt=""><em>56</em></a></span>
                    </div>-->
                </div>
               
               <?php } }?>
                <div class="clear"></div>
            </div>
      </section>
    </section>
          <div class="modal fade" id="videoModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Modal title</h4>
      </div>
      <div class="modal-body">
        <iframe width="100%" height="350" src=""></iframe>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
