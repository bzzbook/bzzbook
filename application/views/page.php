<?php  
       $image = $this->profile_set->get_profile_pic($user_id);
	   $data = $this->profile_set->get_userinfo($user_id); 
	   $friends = $this->friendsmodel->getfriends('','',$user_id,9);
	   $myfrnd = $this->friendsmodel->user_frnds($user_id);
	   
	   $basic_page_data = $this->pagemodel->get_page_data($page_id);
	   $emp_working = $this->profile_set->get_org_details_by_status_work($user_id);
	   $emp_work_ended = $this->profile_set->get_org_details_by_status_all($user_id);
	   $college_details = $this->profile_set->get_clg_details_all($user_id);
	   $result = $this->profile_set->save_settings($user_id);
	   $current_user_id_for_post_comment_box = $this->session->userdata('logged_in')['account_id'];
	   $get_profiledata = $this->customermodel->page_profiledata($page_id);
	      ?>

<section class="col-lg-9 col-md-9 nopad">
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
          <img src="<?php echo base_url(); ?>images/coverLogo.png" width="87" height="77"  alt=""/>    
          <a aria-expanded="false" aria-haspopup="true" data-toggle="dropdown" class="dropdown-toggle cameraIcon" href="#"><i class="fa  fa-camera"></i></a>
    <ul class="dropdown-menu">
    <li><a data-target="#choose_from_photos" data-toggle="modal" href="javascript:void(0);">Choose from photos</a></li>
    <li><a onclick="document.getElementById('cover_photo').click();cancelReposition();" href="javascript:void(0);">Upload</a></li>
    <li><a onclick="repositionCover();" href="javascript:void(0);">Reposition</a></li>
    <li><a onclick="return confirm('Are you sure you want to remove cover image');" href="http://localhost/bzzbook/profile/delete_cover_photo/1/1444456878_ghid_secret_santa.jpg">Remove</a></li>
    </ul>
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
            <li><a href="#">Timeline</a></li>
            <li><a href="#">About</a></li>
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
  <section class="col-lg-4 col-md-4 col-sm-4 col-xs-12 coloumn1" style="padding-right:0; padding-top:0;">
    <aside>
      <div class="myPhotos basicInfo">
        <?php if(!empty($basic_page_data)){ ?>
        <h3>About</h3>
        <div class="specific_block">
          <div class="in_left"> <i class="fa fa-map-marker"></i></div>
          <div class="in_right boxs" style="">
            <?php 
						if(!empty($basic_page_data['address']) || !empty($basic_page_data['city_state']))	{
						if(!empty($basic_page_data['address']))
						echo $basic_page_data['address']."<br>";
						if(!empty($basic_page_data['city_state']))
						echo $basic_page_data['city_state'];
						}
						else{
						echo "<a href='#'>Add location</a>";
						}
						}
						?>
          </div>
          <div class="clearfix"></div>
        </div>
        <div class="specific_block">
          <div class="in_left"><i class="fa fa-phone"></i></div>
          <div class="in_right boxs">
            <?php if(!empty($basic_page_data['phone'])) { echo $basic_page_data['phone'];} else { echo "<a href='#'>Add phone no</a>"; } ?>
          </div>
          <div class="clearfix"></div>
        </div>
        <div class="specific_block">
          <div class="in_left"><i class="fa fa-info"></i></div>
          <div class="in_right boxs"> <span>About : </span>
            <?php if(!empty($basic_page_data['description'])) { echo $basic_page_data['description'];} else { echo "<a href='#'>Add short description</a>"; } ?>
          </div>
          <div class="clearfix"></div>
        </div>
        <div class="specific_block">
          <div class="in_left"><i class="fa fa-link"></i></div>
          <div class="in_right boxs">
            <?php if(!empty($basic_page_data['website'])) { echo "<span>Website : </span><a href='".$basic_page_data['website']."'>".$basic_page_data['website']."</a>"; } else{ echo "<a href='#'>Add your website</a>"; }  ?>
          </div>
          <div class="clearfix"></div>
        </div>
      </div>
      <div class="col-md-12 no-padding-lr">
        <div class="visitorPost sideBlock">
          <h3>Visitor Post <i class="fa fa-chevron-right"></i></h3>
          <?php $none_page_posts = $this->customermodel->get_none_page_posts($page_id); foreach($none_page_posts as $np_post):  
		$npu_profiledata = $this->customermodel->profiledata($np_post->posted_by);
		$cur_usr_id = $this->session->userdata('logged_in')['account_id'];
		$cur_user_data = $this->customermodel->profiledata($cur_usr_id);
		$my_pages = $this->customermodel->my_pages();
		$npu_hrsago = $this->customermodel->get_time_difference_php($np_post->posted_on);
		 ?>
          <div class="postVisitor">
            <div class="postVisitProfile">
              <figure><img src="<?php echo base_url(); ?>uploads/<?php if(!empty($npu_profiledata[0]->user_img_thumb)) echo $npu_profiledata[0]->user_img_thumb; else echo 'default_profile_pic.png'; ?>" width="37" height="36"  alt=""/></figure>
              <h4> <a href="<?php echo base_url().'profile/user/'.$npu_profiledata[0]->user_id; ?>"><?php echo ucfirst($npu_profiledata[0]->user_firstname)."&nbsp;".ucfirst($npu_profiledata[0]->user_lastname);?></a> <span><?php echo $npu_hrsago; ?></span> </h4>
              <div class="clearfix"></div>
            </div>
            <div class="v-message">
              <p><?php echo $np_post->post_content; ?></p>
            </div>
            <div class="moreLinks"><a href="#">Like </a> <a href="javascript:void(0)" onclick="show_lb_combox(<?php echo $np_post->post_id;  ?>)"  >Comment</a>
              <ul class="pull-right">
                <li><span class="loading"><img style="display:none;" src="<?php echo base_url(); ?>images/loading.gif" width="16" height="11"  alt=""/></span> <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="<?php echo base_url(); ?>uploads/<?php if(!empty($cur_user_data[0]->user_img_thumb)) echo $cur_user_data[0]->user_img_thumb; else echo 'default_profile_pic.png'; ?>" width="15" height="15"  alt=""/><i class="fa fa-caret-down"></i> </a>
                  <ul class="dropdown-menu">
                    <li>
                      <div class="userSelector">
                        <h4><img src="<?php echo base_url(); ?>uploads/<?php if(!empty($cur_user_data[0]->user_img_thumb)) echo $cur_user_data[0]->user_img_thumb; else echo 'default_profile_pic.png'; ?>" width="30" height="30"  alt=""/><span><?php echo ucfirst($cur_user_data[0]->user_firstname)."&nbsp;".ucfirst($cur_user_data[0]->user_lastname);?><span>(you)</span></span></h4>
                        <div class="userList">
                          <h5><i class="fa fa-user"></i> PERSONAL(<?php echo count($my_pages); ?>)</h5>
                          <ul class="userlist">
                            <?php foreach($my_pages as $mpage){ ?>
                            <li><img src="<?php echo base_url().'uploads/'; if($mpage->page_image!='') echo $mpage->page_image; else echo 'main_cat_'.$mpage->main_category.'.png'; ?>" width="30" height="30"  alt=""/><span> <?php echo substr($mpage->page_name,0,20); ?></span> <i class="fa fa-check pull-right"></i></li>
                            <?php } ?>
                          </ul>
                        </div>
                      </div>
                    </li>
                  </ul>
                </li>
              </ul>
            </div>
            
            <!--<div class="moreLinks">
            <a href="#" class="pull-right">Most Recent <i class="fa fa-caret-down"></i></a>
            <div class="clearfix"></div>
            </div>-->
            <?php 
            $np_comments_details = $this->customermodel->page_comments_data($np_post->post_id);
			       for($i=0;$i<count($np_comments_details);$i++){
				   // foreach($comments_details as $row_comment):
			       if($i<=4){ $com_user_data = $this->customermodel->profiledata($np_comments_details[$i]->cmt_by); 	  $cmt_hrsago = $this->customermodel->get_time_difference_php($np_comments_details[$i]->cmt_timestamp); ?>
            <div class="moreLinks usercomment">
              <figure><img src="<?php echo base_url(); ?>uploads/<?php if(!empty($np_comments_details[$i]->user_img_thumb)) echo $np_comments_details[$i]->user_img_thumb; else echo 'default_profile_pic.png'; ?>" width="37" height="36"  alt=""/></figure>
              <div class="content">
                <h5><?php echo ucfirst($np_comments_details[$i]->user_firstname)."&nbsp;".ucfirst($np_comments_details[$i]->user_lastname); ?></h5>
                <span><?php echo $np_comments_details[$i]->cmt_content; ?></span>
                <p><a href="#">Like</a> . <a href="#">Reply</a> . <?php echo $cmt_hrsago; ?></p>
              </div>
              <div class="clearfix"></div>
            </div>
            <?php }else { echo '<div>View more</div>'; } } ?>
            <div id="lb_comment_box<?php echo $np_post->post_id; ?>" class="moreLinks usercomment hidecommentbox">
              <figure><img src="<?php echo base_url(); ?>uploads/<?php if(!empty($cur_user_data[0]->user_img_thumb)) echo $cur_user_data[0]->user_img_thumb; else echo 'default_profile_pic.png'; ?>" width="37" height="36"  alt=""/></figure>
              <div class="content">
                <div class="comment-box">
                  <textarea class="autoExpand" rows='1' data-min-rows='1' placeholder="Write Comment"></textarea>
                  <a href="" class="camera"><i class="fa fa-camera"></i></a> 
                  <!--<a href="" class="emoticons"><i class="fa fa-smile-o"></i></a>-->
                  <div class="clearfix"></div>
                </div>
              </div>
              <div class="clearfix"></div>
            </div>
          </div>
          <?php endforeach; ?>
        </div>
      </div>
    </aside>
  </section>
  <?php $image = $this->profile_set->get_profile_pic($user_id);	?>
  <section class="col-lg-8 col-md-8 col-sm-5 col-xs-12 coloumn2" style="padding-right:0;">
    <div class="updateStatus" id="updateStatus">
      <ul>
        <li>
          <?php /*?><img src="<?php echo base_url();?>uploads/<?php if(!empty($image[0]->user_img_thumb)) echo $image[0]->user_img_thumb; else echo 'default_profile_pic.png'; ?>" alt="<?php echo base_url();?>uploads/<?php if(!empty($image[0]->user_img_thumb)) echo $image[0]->user_img_thumb; else echo 'default_profile_pic.png'; ?>" height="60" width="60"><?php */?>
        </li>
        <li><a href="javascript:document.getElementById('posts').focus()" >Create a Post</a></li>
        <li><a href="javascript:document.getElementById('uploadPhotos').click()">Upload Photos/Video</a></li>
        <li><a href="#">Create Photo/Video Album</a></li>
      </ul>
      <div id="uploadPhotosdvPreview"></div>
      <?php $attr = array('name' => 'post_form', 'id' =>'page_post_form', 'enctype'=>"multipart/form-data") ?>
      <?php 
		echo form_open('signg_in/send_page_post',$attr) ?>
      <input type="file" name="uploadPhotos[]" id="uploadPhotos" multiple="multiple" style="display:none;" />
      
      <!--        <textarea cols="" rows="" name="posts" id="posts" class="form-control" placeholder="What's Buzzing?"></textarea>
-->
      <div class="post-content" style="width:100%; min-height:75px;" onclick="document.getElementById('dummypost').focus();">
        <div contenteditable="true" style="min-height:20px; min-width:10px; padding:8px; float:left;" id="dummypost" onkeyup="takeInputToPost()"></div>
        <div id="withTokens" style="display:none; padding:8px; float:left">--With </div>
        <div style="clear:both;"></div>
      </div>
      <input type="hidden" id="posts" name="posts" />
      <div id="hiddentokens" style="display:none;"></div>
      <div class="updateControls" id="updateControls"><a href="javascript:void(0)" onclick="page_post_submit('page_post_form',<?php echo $page_id; ?>);">Post</a> </div>
      <?php echo form_close(); ?>
      <div class="clear"></div>
    </div>
    <div id="page_posts_content_div" class="posts">
      <?php 
	  if(empty($user_id))
	  $curr_user_id = $this->session->userdata('logged_in')['account_id'];
	  else
	  $curr_user_id = $user_id;
	  $products = $this->customermodel->All_Page_Posts($page_id);
	  
	 // print_r($none_page_posts);
	  if($products):
	  foreach( $products as $row):
	  $hrsago = $this->customermodel->get_time_difference_php($row->posted_on);
     // $posted_id=$row->posted_by;
	  $get_profiledata = $this->customermodel->page_profiledata($page_id);
	 
	  if(empty($user_id))
	  $user_id=$this->session->userdata('logged_in')['account_id'];
	  else
	  $user_id = $user_id;
	  ?>
      <article id="post<?php echo $row->post_id; ?>" >
      <div class="pfInfo"> <a href="<?php echo base_url().'profile/page/'.$get_profiledata[0]->page_id; ?>" class="pfImg"><img src="<?php echo base_url(); ?>uploads/<?php if(!empty($get_profiledata[0]->page_image)) echo $get_profiledata[0]->page_image; else echo "main_cat_".$get_profiledata[0]->main_category.'.png'; ?>" alt=""></a>
        <div class="pfInfoDetails"> <span><span class="pfname"><a href="<?php echo base_url().'profile/page/'.$get_profiledata[0]->page_id; ?>"><?php echo ucfirst($get_profiledata[0]->page_name);?></a>
          <?php if($row->shared==1) echo " shared a post "; ?>
          </span></span> <a href="#" class="date">
          <?php  echo $hrsago; ?>
          </a> </div>
      </div>
      <?php if(!empty($row->share_post_content)) echo "<div>".$row->share_post_content."</div>"; ?>
      <?php 
			 $morePics = ''; $file_ext ='';
			 if(!empty($row->uploaded_files))
			 {
			 $up_files = explode(',',$row->uploaded_files);
			 $i = 0;
			 $tot_images = count($up_files);
			  if($tot_images==1){
				
			 $file_parts = explode('.',$row->uploaded_files);
			 $file_ext = $file_parts[1];
			 $validvideoextensions = array('webm','mp4','ogg','ogv','wmv','3gp','3g2','3gpp','avi','mov','flv'); 
			 }
			 if($tot_images>5)
			 $morePics = 'morePics';
			
			 }
			 ?>
      <?php  if(isset($file_ext) && $file_ext!='' && in_array($file_ext,$validvideoextensions)){?>
      <div class="videoImage" id="videoImage<?php echo $row->post_id; ?>"><img width="100%" src="<?php echo base_url().'uploads/'.$file_parts[0].'.png'; ?>" />
        <div onclick="playVideo(<?php echo $row->post_id; ?>)"></div>
      </div>
      <video id="videotag<?php echo $row->post_id; ?>" width="100%" poster="<?php echo base_url().'uploads/'.$file_parts[0].'.png'; ?>" controls style="display:none">
        <source src="<?php echo base_url().'uploads/'.$row->uploaded_files; ?>" type="video/mp4">
        Your browser does not support the video tag. </video>
      <?php  }else{ ?>
      <div class="userContent <?php  echo $morePics.' '; ?>">
        <?php  if(!empty($row->uploaded_files))
			 {
			 $up_files = explode(',',$row->uploaded_files);
			 $i = 0;
			 $tot_images = count($up_files);
			
			 if($tot_images>5)
			 $tot_images = 5;
			 echo "<div id='pagephotobox".$row->post_id."' class='pagephotobox  postImages post-data-".$tot_images."'>";
			 foreach($up_files as $file)
			 {
				 //if($i==0)
//				 {
//					 echo " 
//    <a onclick='getPostComments(".$row->post_id.")'><img class='photo' pagephotobox-src='".base_url()."uploads/".$file."' src='".base_url()."uploads/".$file."' /></a>";
//				 }
//				 else
//				 	 echo "<a onclick='getPostComments(".$row->post_id.")'><img class='photo' pagephotobox-src='".base_url()."uploads/".$file."' src='".base_url()."uploads/".$file."' style='width:24%;float:left;margin:.5%; height:83px'/></a>";
//				 $i++;
 $file1 = explode('.',$file);
				echo " 
    <a onclick='getPagePostComments(".$row->post_id.",&#39;".$file."&#39;)'><span class='photo' style='background:url(".base_url()."uploads/".$file1[0].'_default.'.$file1[1].") center center no-repeat' pagephotobox-src='".base_url()."uploads/".$file1[0].'_extended.'.$file1[1]."' ><i>+ ".(count($up_files)-5)."</i></span</a>";
			 }
 			 echo '<div class="clearfix"></div>';
			 echo "</div>";
			 echo "<div style='clear:both'></div>";
			 } ?>
        </figure>
        <?php /*?>            <h3>The Interpreter-TranslatorFree - Android Apps on Google Play</h3>
<?php */?>
        <div <?php if($row->shared==1) echo "class='sharedContentDiv' style='border-left: 2px solid #33A6E7; margin-left:10px; padding-left:3px'" ?>>
          <?php $str_leng=strlen($row->post_content);
			  if($str_leng>50){
				echo  "<div id='msg".$row->post_id."'>".$str_des=substr($row->post_content,0,250)."..."; ?>
          <a href="javascript:void(0)" onclick="myfunc('<?php echo $row->post_id;?>')">more</a></div>
        <div id='des<?php echo $row->post_id;?>' style="display:none"><?php echo $row->post_content ?><a href="javascript:void(0)" onclick="myfunc('<?php echo $row->post_id;?>')">less</a></div>
        <?php 
			 }else{
				echo  $str_des=substr($row->post_content,0,250);
			 } ?>
      </div>
    </div>
    <?php } ?>
    <div class="sharingLink">
      <?php 
					$get_likedetails = $this->customermodel->page_likedata($row->post_id);
					$current_user_like_data = $this->customermodel->cur_user_pagelikes($row->post_id);
					if($current_user_like_data){
			       //	$user_id=$current_user_like_data[0]->liked_by;
//					$like=$get_likedetails[0]->like_status;
//					}
//					else
//					$like='';
//					 if(@$user_id == $user_id && $like=='Y'){
	?>
      <a href="javascript:void(0);" onclick="page_likefun('<?php echo $row->post_id;?>','<?php echo $curr_user_id;?>',<?php echo count($get_likedetails); ?>)"  id="link_like<?php echo $row->post_id;?>" style="padding-right:0px;">Unlike
      <?php    
			}else{?>
      <a href="javascript:void(0);" onclick="page_likefun('<?php echo $row->post_id;?>','<?php echo $curr_user_id;?>',<?php echo count($get_likedetails); ?>)"  id="link_like<?php echo $row->post_id;?>" style="padding-right:0px;">Like
      <?php }?>
      </a><span id="like_count<?php echo $row->post_id;?>">
      <?php  $like_count = count($get_likedetails); if($like_count>0) echo '<img src="'.base_url().'images/like_myphotos.png" alt="">'.$like_count.'&nbsp;&nbsp;'; ?>
      </span><a href="javascript:document.getElementById('write_comment<?php echo $row->post_id; ?>').focus()">Comment</a> <a href="javascript:void(0)" onclick="sharePagePost(<?php echo $row->post_id; ?>)" data-toggle="modal" data-target="#myModal">Share</a>
      <?php /*?><a href="javascript:void(0)" onclick="saveAsFav('<?php echo $row->post_id;?>')"><span>Save As Favorite</span></a><?php */?>
    </div>
    <div id="res_comments<?php echo $row->post_id;?>">
      <?php   
			       $comments_details = $this->customermodel->page_comments_data($row->post_id);
			       for($i=0;$i<count($comments_details);$i++){
				   // foreach($comments_details as $row_comment):
			       if($i<=4){ $com_user_data = $this->customermodel->profiledata($comments_details[$i]->cmt_by); 	  $hrsago = $this->customermodel->get_time_difference_php($comments_details[$i]->cmt_timestamp);
?>
      <div class="commentBox">
        <figure> <a href="<?php echo base_url().'profile/user/'.$com_user_data[0]->user_id; ?>"><img src="<?php echo base_url();?>uploads/<?php if(!empty($com_user_data[0]->user_img_thumb))echo $com_user_data[0]->user_img_thumb; else echo 'default_profile_pic.png'; ?>" alt="<?php echo base_url();?>uploads/<?php if(!empty($image[0]->user_img_thumb)) echo $image[0]->user_img_thumb; else echo 'default_profile_pic.png'; ?>"></a></figure>
        <div class="postAComment">
          <div class="postACommentInner"><span class="pfname" style="color:#5A5998;"><a href="<?php echo base_url().'profile/user/'.$com_user_data[0]->user_id; ?>"><?php echo ucfirst($com_user_data[0]->user_firstname)."&nbsp;".ucfirst($com_user_data[0]->user_lastname);?></a></span> <span class="date" style="color:black;">
            <?php /*if($hr_final<24){?><?php echo $hr_final;?>hr<?php }else{
				echo  str_replace("-"," ",$days)."days ago";
			}*/ echo $comments_details[$i]->cmt_content; ?>
            </span><br />
            <?php  $commentfiles = explode(',',$comments_details[$i]->uploadedfiles); if(!empty($comments_details[$i]->uploadedfiles)) { ?>
            <div style="padding-top:15px;"><img width="200px" height="200px" src="<?php echo base_url();?>uploads/<?php echo $commentfiles[0]; ?>" /></div>
            <?php } ?>
            <?php  echo $hrsago; 
			
					
			         ?>
            <?php $comment_likes = $this->customermodel->page_comment_likes($comments_details[$i]->cmt_id);
					$current_user_com_like_data = $this->customermodel->currentuser_page_commentlikes($comments_details[$i]->cmt_id);
					if($current_user_com_like_data){
					//if(sizeof($comment_likes)>0){
//			       	$user_id=$comment_likes[0]->liked_by;
//					$like=$comment_likes[0]->like_status;
//					}
//					else
//					$like='';
//					 if(@$user_id == $user_id && $like=='Y'){
						 
						 ?>
            <a href="javascript:void(0);" onclick="page_commentlikefun('<?php echo $comments_details[$i]->cmt_id;?>','<?php echo $curr_user_id;?>',<?php echo count($comment_likes); ?>)"  id="cmt_link_like<?php echo $comments_details[$i]->cmt_id;?>" style="padding-right:0px;">Unlike
            <?php    
			}else{?>
            <a href="javascript:void(0);" onclick="page_commentlikefun('<?php echo $comments_details[$i]->cmt_id;?>','<?php echo $curr_user_id;?>',<?php echo count($comment_likes); ?>)"  id="cmt_link_like<?php echo $comments_details[$i]->cmt_id;?>" style="padding-right:0px;">Like
            <?php }?>
            </a>&nbsp;<span id="cmt_like_count<?php echo $comments_details[$i]->cmt_id;?>">
            <?php  $like_count = count($comment_likes); if($like_count>0) echo '<img src="'.base_url().'images/like_myphotos.png" alt="">'.$like_count.'&nbsp;&nbsp;'; ?>
            </span></div>
        </div>
        <div class="clearfix"></div>
      </div>
      <?php 
				   }
				   }
				   
				   // endforeach;
		    ?>
      <?php if(count($comments_details)>4){ ?>
      <a href="#" onclick="view_comments('<?php echo $row->post_id;?>')" style="font-size:12px;">View More</a>
      <?php } ?>
    </div>
    <div class="commentBox">
      <figure><img src="<?php echo base_url();?>uploads/<?php if(!empty($image[0]->user_img_thumb)) echo $image[0]->user_img_thumb; else echo 'default_profile_pic.png';; ?>" alt=""></figure>
      <div class="postAComment">
        <div class="postACommentInner">
          <form method="post" style="width:100% !important;" enctype="multipart/form-data" autocomplete="off" class="send_page_comment" id="send_page_comment<?php echo $row->post_id;?>" >
            <a href="javascript:document.getElementById('uploadCommentPhotos<?php echo $row->post_id;?>').click();javascript:document.getElementById('write_comment<?php echo $row->post_id;?>').focus(); " class="upload"><span aria-hidden="true" class="glyphicon glyphicon-camera"></span></a>
            <input type="text" class="form-control comment xyzzyx" placeholder="Write a Comment..." name="write_comment" post_id="<?php echo $row->post_id;?>"  id="write_comment<?php echo $row->post_id; ?>" >
            <input type="hidden" name="post_id" value="<?php echo $row->post_id;?>" >
            <input type="hidden" name="posted_by" value="<?php echo $current_user_id_for_post_comment_box;?>">
            <input type="file" class="abccba" name="uploadCommentPhotos<?php echo $row->post_id;?>[]" id="uploadCommentPhotos<?php echo $row->post_id;?>" style="display:none;" />
          </form>
          <em>Press Enter to post.</em> </div>
      </div>
      <div class="clearfix"></div>
    </div>
    </article>
    <?php  endforeach;
	  		endif;
	  ?>
    </div>
  </section>
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Share this post</h4>
        </div>
        <div class="modal-body" id="sharePostPopup"> ... </div>
        <?php /*?><div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div><?php */?>
      </div>
    </div>
  </div>
  <script>
function takeInputToPost(){
$("#posts").val($("#dummypost").text());
}

</script> 
</section>
<div id="choose_from_photos" class="modal fade" role="dialog">
  <div class="modal-dialog" style="margin-top:10%;"> 
    
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Choose cover photo</h4>
      </div>
      <div class="modal-body">
        <?php $cover_images = $this->pagemodel->get_cover_images($page_id); ?>
        <div class="life_event_lefts_img mg_gal">
          <h3>Cover Photos</h3>
          <div><img data-target="#choose_cover_photos" data-toggle="modal" src="<?php echo base_url()."uploads/".$cover_images[0]->cover_image; ?>" /></div> </div>
        <div class="clearfix"></div>
      </div>
      <div class="modal-footer"> </div>
    </div>
  </div>
</div>
<div id="choose_cover_photos" class="modal fade" role="dialog">
  <div class="modal-dialog" > 
    
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Choose cover photo</h4>
      </div>
      <div class="modal-body">
        <?php foreach($cover_images as $image):?>
        <div class="life_event_lefts_img">
        <span style="width:100px; height:100px; background:url(<?php echo base_url()."uploads/".$image->cover_image; ?>) center center; background-size:cover; display:block;"></span>
        <?php /*?><img data-target="#choose_from_photos" data-toggle="modal" src="<?php echo base_url()."uploads/".$image->cover_image; ?>" onclick="updateCoverPhoto(<?php echo $page_id.','."'".$image->cover_image."'"; ?>);" /><?php */?> </div>
        <?php endforeach; ?>
        <div class="clearfix"></div>
      </div>
      <div class="modal-footer"> </div>
    </div>
  </div>
</div>
