<?php
$get_profiledata = $this->customermodel->page_profiledata($page_id); 
?>
<div class="col-md-12 ProfileView">
    <div class="row">
      <div class="pageBlock col-md-12">
        <div class="coverPage cover-container">
          <div class="cover-wrapper"> <img src="<?php if($get_profiledata[0]->cover_image) { $cov_img = $get_profiledata[0]->cover_image; $img_parts = explode('.',$cov_img); 
	  
	  $repo_img = $img_parts[0].'_reposition.'.$img_parts[1];
	  if(file_exists(DIR_FILE_PATH.$repo_img))  
	  echo base_url().'uploads/'.$repo_img;
	  else
	  echo base_url().'uploads/'.$cov_img; }
	   ?>"  alt=""/>
            <div class="cover-progress"></div>
          </div>
          <div class="cover-resize-wrapper"> <img src="<?php if($get_profiledata[0]->cover_image) {  echo base_url().'uploads/'.$get_profiledata[0]->cover_image; } ?> " alt="w3lessons.info">
            <div class="drag-div" align="center">Drag to reposition</div>
            <div class="cover-progress"></div>
          </div>
          <div class=" add-cover">
            <div class='coverwrap'> <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa  fa-camera"></i>Add Cover</a>
              <ul class="dropdown-menu">
                <li><a href="javascript:void(0);" data-toggle="modal" data-target="#choose_from_photos">Choose from photos</a></li>
                <li><a href="javascript:void(0);" onclick="document.getElementById('cover_photo').click();cancelReposition();">Upload</a></li>
                <?php if($get_profiledata[0]->cover_image!=''){ ?>
                <li><a href="javascript:void(0);" onclick="repositionCover();">Reposition</a></li>
                
                <li><a href="<?php echo base_url()."profile/delete_cover_photo/".$page_id."/".$get_profiledata[0]->cover_image; ?>" onclick="return confirm('Are you sure you want to remove cover image');">Remove</a></li>
                <?php } ?>
              </ul>
            </div>
          </div>
          <form class="hidden" method="post" enctype="multipart/form-data" id="uploadcoverform">
            <input id="cover_photo" name="cover_photo" type="file" onchange="uploadCoverPhoto(event,<?php echo $page_id; ?>);">
          </form>
          <div class="callToAction"><a href="#" class="call-new">New Action</a> <a href="#" class="createCall">Create Call to Action</a></div>
          <div class="profileDetails">
          <div class="userImage">      
          <img src="<?php echo base_url(); ?>uploads/<?php if($get_profiledata[0]->page_image!='') echo $get_profiledata[0]->page_image; else echo 'main_cat_'.$get_profiledata[0]->main_category.'.png';  ?>" width="87" height="77"  alt=""/>    
          <a aria-expanded="false" aria-haspopup="true" data-toggle="dropdown" class="dropdown-toggle cameraIcon" href="#"><i class="fa  fa-camera"></i></a>
    <ul class="dropdown-menu">
    <li><a data-target="#choose_from_photos" data-toggle="modal" href="javascript:void(0);">Choose from photos</a></li>
    <li><a onclick="document.getElementById('page_logo').click();" href="javascript:void(0);">Upload</a></li>
    <li><a onclick="repositionCover();" href="javascript:void(0);">Reposition</a></li>
    <li><a onclick="return confirm('Are you sure you want to remove cover image');" href="http://localhost/bzzbook/profile/delete_cover_photo/1/1444456878_ghid_secret_santa.jpg">Remove</a></li>
    </ul>
    <form class="hidden" method="post" enctype="multipart/form-data" id="uploadlogoform">
            <input id="page_logo" name="page_logo" type="file" onchange="uploadPageLogo(event,<?php echo $page_id; ?>);">
          </form>
            </div>
          
          
          
         <!--  <a href="#" class="userImage"></a>-->
           
            <div class="details">
              <h3><a href="#"><?php echo $get_profiledata[0]->page_name ?></a></h3>
              <p>Add Category</p>
            </div>
          </div>
        </div>
        <div class="menuBarCover">
          <ul>
            <li><a href="<?php echo base_url().'profile/page/'.$page_id; ?>">Timeline</a></li>
            <li><a href="<?php echo base_url().'profile/about_page/'.$page_id; ?>">About</a></li>
            <li><a href="#">Photos</a></li>
            <li><a href="#">Reviews</a></li>
            <li><a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">More</a>
              <ul class="dropdown-menu">
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="#">Separated link</a></li>
              </ul>
            </li>
          </ul>
          <ul class="pull-right extraBtns">
            <li><a href="#" class="like"><i class="fa fa-thumbs-up"></i>Like</a></li>
            <li> <a href="#" class="messageBtn"><i class="fa  fa-comment"></i>Message</a> <a href="#" class="dropdown-toggle message_sub" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span><i class="fa  fa-circle-thin"></i><i class="fa  fa-circle-thin"></i><i class="fa  fa-circle-thin"></i></span></a>
              <ul class="dropdown-menu">
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li><a href="#">Separated link</a></li>
              </ul>
            </li>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="float-right span35">
          <div class="timeline-buttons cover-resize-buttons"> <br>
            <table border="0" width="100%" cellspacing="0" cellpadding="0">
              <tr>
                <td align="center" valign="middle"><a onclick="saveReposition();">Save Position</a></td>
                <td align="center" valign="middle"><a onclick="cancelReposition();">Cancel</a></td>
              </tr>
            </table>
            <form class="cover-position-form hidden" method="post">
              <input class="cover-position" name="pos" value="0" type="hidden">
              <input name="cover_image" value="<?php echo $get_profiledata[0]->cover_image; ?>" id="cover_image" type="hidden">
            </form>
          </div>
          
          <!--<div class="timeline-buttons default-buttons">
<br><br>
        <table border="0" width="150" cellspacing="0" cellpadding="0">
        <tr>
            <td align="center" valign="middle">
                <a onclick="repositionCover();">Reposition cover</a>
            </td>
        </tr>
        </table>
    </div>--> 
        </div>
      </div>
    </div>
  </div>