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


//$data = $this->profile_set->get_my_pics($id);
//$videos = $this->profile_set->get_my_videos($id);
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

      </div>
      
      <section class="about-user-details">
        <h4><span aria-hidden="true" class="glyphicon glyphicon-picture"></span><?php if(isset($photos) && $photos){ echo "My Photos ( ".count($photos)." )"; }
		else if(isset($profile_pics) && $profile_pics) echo "Profile Photos ( ".count($profile_pics)." )"; else if(isset($timeline_pics) && $timeline_pics) echo "Time Line Photos ( ".count($timeline_pics)." )"; else
		echo " Photos not uploaded ";  ?></h4>
         	<div class="userPhotos">
             <?php if(isset($photos) && $photos){ $i=1;  foreach($photos as $image){ $fileimage = $image['image_thumb']; 
			 	
			 
					$image_file = explode('.',$fileimage);
					
				

			 ?> <div id="containerid<?php echo $i; ?>">
            	  <div class="fbphotobox photoThumb col-md-3 hover_close" id="fbphotobox-all" ><button class="close_item" onclick="del_album_image(<?php echo $album_id.',&#39;'.$fileimage.'&#39;,'.$i; ?>);"><i class="fa  fa-times"></i></button>
                	<?php /*?><a href="<?php  echo base_url();?>uploads/<?php echo $image['image_thumb']; ?>" class="mpView" data-lightbox="example-1" data-lightbox="my_photos"><img src="<?php echo base_url(); ?>images/mp_view.png" alt=""></a><?php */?>
                    <a onclick="getPostComments(<?php echo $image['post_id']; ?>,'<?php echo $fileimage; ?>')">
                		<figure ><img id="<?php echo $image['post_id']; ?>" class="photo" fbphotobox-src="<?php echo base_url();?>uploads/<?php echo $image_file[0]."_default.".$image_file[1]; ?>" src="<?php echo base_url();?>uploads/<?php echo $image_file[0]."_extended.".$image_file[1]; ?>" width="100%" height="100%" alt=""></figure>
                    </a>
                    <div class="phOptions">
                   <?php /*?> <span class="mpImg"><a href="#"><img src="<?php echo base_url(); ?>images/bzz_icon.png" alt=""></a></span><?php */?>
                    <span class="mpLike"><a href="javascript:void(0)"><img src="<?php echo base_url(); ?>images/like_myphotos.png" alt=""><em><?php echo $image['like_count'];?></em></a></span>
                    <span class="mpComment"><a href="javascript:void(0)"><img src="<?php echo base_url(); ?>images/comments_myphotos.png" alt=""><em><?php echo $image['comment_count'];?></em></a></span>
                   
                    </div>
                </div>
                </div>
                 <?php $i++;  } } else if(isset($profile_pics) && $profile_pics){ $i=1; foreach($profile_pics as $image){  $fileimage = $image['image_thumb']; 
				 	$image_file = explode('.',$fileimage);
				  ?>
                   <div id="containerid<?php echo $i; ?>">
                 <div class="fbphotobox photoThumb col-md-3 hover_close" id="fbphotobox-all">
                 <button class="close_item" onclick="del_profile_image(<?php echo '&#39;'.$fileimage.'&#39;,'.$i; ?>)"><i class="fa  fa-times"></i></button>
                	<?php /*?><a href="<?php  echo base_url();?>uploads/<?php echo $image['image_thumb']; ?>" class="mpView" data-lightbox="example-1" data-lightbox="my_photos"><img src="<?php echo base_url(); ?>images/mp_view.png" alt=""></a><?php */?>
                	  <a onclick="getPostComments(<?php echo $image['post_id']; ?>,'<?php echo $fileimage; ?>')">
                   <figure><img id="<?php echo $image['post_id']; ?>" class="photo" fbphotobox-src="<?php echo base_url();?>uploads/<?php echo $image_file[0]."_default.".$image_file[1]; ?>" src="<?php echo base_url();?>uploads/<?php echo $image_file[0]."_extended.".$image_file[1]; ?>" width="100%" height="100%" alt=""></figure>
                    </a>
                    <div class="phOptions">
                   <?php /*?> <span class="mpImg"><a href="#"><img src="<?php echo base_url(); ?>images/bzz_icon.png" alt=""></a></span><?php */?>
                    <span class="mpLike"><a href="javascript:void(0)"><img src="<?php echo base_url(); ?>images/like_myphotos.png" alt=""><em><?php echo $image['like_count'];?></em></a></span>
                    <span class="mpComment"><a href="javascript:void(0)"><img src="<?php echo base_url(); ?>images/comments_myphotos.png" alt=""><em><?php echo $image['comment_count'];?></em></a></span>
                   
                    </div>
                </div>
                </div>
                <?php $i++; } }  else if(isset($timeline_pics) && $timeline_pics){ $i =1; foreach($timeline_pics as $image){ $fileimage = $image['image_thumb']; ?>
                <div id="containerid<?php echo $i; ?>">
                <div class="fbphotobox photoThumb col-md-3 hover_close" id="fbphotobox-all">
                <button class="close_item" onclick="del_timeline_image(<?php echo '&#39;'.$fileimage.'&#39;,'.$i; ?>)"><i class="fa  fa-times"></i></button>
                	<?php /*?><a href="<?php  echo base_url();?>uploads/<?php echo $image['image_thumb']; ?>" class="mpView" data-lightbox="example-1" data-lightbox="my_photos"><img src="<?php echo base_url(); ?>images/mp_view.png" alt=""></a><?php */?>
                    <?php 
					$image_file = explode('.',$fileimage);
					
					
					?>
                    
                    <a onclick="getPostComments(<?php echo $image['post_id']; ?>,'<?php echo $fileimage; ?>')">
                	<figure><img id="<?php echo $image['post_id']; ?>" class="photo" fbphotobox-src="<?php echo base_url();?>uploads/<?php echo $image_file[0]."_default.".$image_file[1]; ?>" src="<?php echo base_url();?>uploads/<?php echo $image_file[0]."_extended.".$image_file[1]; ?>" width="100%" height="100%" alt=""></figure>
                    </a>
                    <div class="phOptions">
                   <?php /*?> <span class="mpImg"><a href="#"><img src="<?php echo base_url(); ?>images/bzz_icon.png" alt=""></a></span><?php */?>
                    <span class="mpLike"><a href="javascript:void(0)"><img src="<?php echo base_url(); ?>images/like_myphotos.png" alt=""><em><?php echo $image['like_count'];?></em></a></span>
                    <span class="mpComment"><a href="javascript:void(0)"><img src="<?php echo base_url(); ?>images/comments_myphotos.png" alt=""><em><?php echo $image['comment_count'];?></em></a></span>
                   
                    </div>
                </div>
                </div>
                <?php $i++;} } ?>
                <div class="clear"></div>
            </div>
      </section>
      
    </section>
         
