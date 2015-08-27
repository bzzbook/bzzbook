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


$data = $this->profile_set->get_my_albums($id);
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
<form class="uploadform" method="post" enctype="multipart/form-data" action="<?php echo base_url(); ?>signg_in/save_albums" name="photo">	
	<div class="crop_set_upload">
		<div class="crop_upload_label">Upload files: </div>
		<div class="crop_select_image"><div class="file_browser"><input type="file" name="imagefile[]" id="imagefile" class="hide_broswe" multiple="multiple" /></div></div>
		<div class="crop_select_image"><input type="submit" value="Upload" class="upload_button" name="submitbtn" id="myphotos_submitbtn" /></div><div id="loadingimage" style="padding-top:15px;"></div>
	</div>
		<input type="hidden" id="album_id" value="" name="album_id" style="border:none;"/>
		<div class="crop_set_preview" style="display:block;">
				
                   
            <div class="pin-categories-pinit">
                        <div class="pinBoard">
           <label for"search"><i class="fa fa-search"></i><input type="text" id="album_search"  onkeyup="existed_album_search(this.value);" placeholder="Search Albums" /></label> 
           </div>
             <div class="clearfix"></div>
                <div class="user-option-block" id="albums">
                            <div class="scroll-pane"> 
                            </div>
                            </div>
            
           </div>
            <div class="clearfix"></div>
		</div>
          <span id="album_name" style="display:none;"> The Image Will be Saved In  </span>
        </form>	
        <div class="clearfix"></div>
	</div>
	<?php } ?>
</div>
</section>

      </div>
      
      <section class="about-user-details">
        <h4><span aria-hidden="true" class="glyphicon glyphicon-picture"></span> My Albums</h4>
         	<div class="userPhotos">
            
            <?php 
			$timeline_photos = $this->profile_set->get_time_line_images();
		
			$complete_timeline_pics =  array();
		//	print_r($timeline_photos);
			foreach($timeline_photos as $timeline)
			{
				$timelinedata = explode(',',$timeline['uploaded_files']);
				
					foreach($timelinedata as $d)
				{
					$complete_timeline_pics[] = $d;
				}
			}
			
			//print_r($complete_timeline_pics);
			if($complete_timeline_pics)
			{ ?>
			
                   <div class="main col-md-3">
                	<figure>
                    
                    	<a href="<?php echo base_url('profile/get_my_timeline_pics'); ?>" data-images="<?php echo implode('|', array_slice($complete_timeline_pics,1))?>" class="album">
                    <img class="photo" src="<?php echo base_url();?>uploads/<?php echo $complete_timeline_pics[0]; ?>" width="60%" height="60%" alt="">
                    </a>
                    <span class="preloader"></span>
                    
                    </figure>
                    <h2><?php echo "Time Line Photos"; ?></h2>
                    </div>
                <!-- </div> -->
                 
            
            
            <?php } ?>
            
            <?php 
			$profile_images = $this->profile_set->get_profile_images();
				$complete_profile_pics = array();
				
				
				foreach($profile_images as $pf_img)
				{
					$complete_profile_pics[] = $pf_img['user_img_name'];
				}
				
				//print_r($complete_profile_pics);	
				if($complete_profile_pics)
			{ ?>
			
                   <div class="main col-md-3">
                	<figure>
                    
                    	<a href="<?php echo base_url('profile/get_my_profile_pics'); ?>" data-images="<?php echo implode('|', array_slice($complete_profile_pics,1))?>" class="album">
                    <img class="photo" src="<?php echo base_url();?>uploads/<?php echo $complete_profile_pics[0]; ?>" width="60%" height="60%" alt="">
                    </a>
                    <span class="preloader"></span>
                    
                    </figure>
                    <h2><?php echo "Profile Photos"; ?></h2>
                    </div>
                <!-- </div> -->
                 
            
            
            <?php } ?>	
			
            
             <?php if($data){  foreach($data as $album){ 
			 
			 if($album->album_id != '')
			 {
			 
			 $photos = $this->profile_set->get_album_photos($album->album_id);
			 
			// print_r($photos);
			// exit;
			$album_photos = array();
			$album_imgs = array();
			 if($photos)
			 {
			 foreach($photos as $photo)
			 {
				 
				 $album_photos[] = explode(',',$photo['uploaded_files']);
				 
			for($i=0; $i<count($album_photos);$i++)
			{
				$complete_albums['album_images'] = $album_photos[$i];
			 
			}
			 
			 $complete_albums['album_name'] = $album->album_name;
						 }
			$album_imgs[] = $complete_albums;
			 
			 
			  }			 
			 }
			 ?>
             <?php // if($data){  foreach($data as $image){ $fileimage = $image['image_thumb'];  ?>
            	 <!-- <div class="fbphotobox photoThumb col-md-3" id="fbphotobox-all">-->
                 <?php foreach($album_imgs as $name => $a){ ?>
                   <div class="main col-md-3">
                	<figure>
                    
                    	<a href="<?php echo base_url('profile/my_photos/'.$album->album_id);?>" data-images="<?php echo implode('|', array_slice($a['album_images'],1))?>" class="album">
                    <img class="photo" src="<?php echo base_url();?>uploads/<?php echo $a['album_images'][0]; ?>" width="60%" height="60%" alt="">
                    </a>
                    <span class="preloader"></span>
                    
                    </figure>
                    <h2><?php echo $a['album_name']; ?></h2>
                    </div>
                <!-- </div> -->
                 <?php  } } } ?>
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
