    <?php 
	 if(empty($user_id))
	  $curr_user_id = $this->session->userdata('logged_in')['account_id'];
	  else
	  $curr_user_id = $user_id; 
	  
	  
	 
	  
	  $posts_count = count($products);
	
	
	  if($products){
	  foreach( $products as $row):
	  
	  $last_id = $row->post_id;
	  	
	  $hrsago = $this->customermodel->get_time_difference_php($row->posted_on);
      $posted_id=$row->posted_by;
	  $get_profiledata = $this->customermodel->profiledata($posted_id);
	  if($row->tagged_friends!='')
	  {
		  $tags = array();
		  $taggedusers = explode(',',$row->tagged_friends);
		  foreach($taggedusers as $taggeduser){
		  $tagusers = $this->customermodel->profiledata($taggeduser);
		  $tags[] = $tagusers[0];
		  }
		  $s=1;
		  $ltags = $tags;
		  foreach($ltags as $ltag){
		  $tagslist ='';
		  if($s<3){
		  }
		  else{
			  $tagslist .='<label>'.ucfirst($ltag->user_firstname)."&nbsp;".ucfirst($ltag->user_lastname).'</label>';
		  }
		  $s++;
		  }
		 
	  }
	  if(empty($user_id))
	  $user_id=$this->session->userdata('logged_in')['account_id'];
	  else
	  $user_id = $user_id;
	  
	  
	$current_user_id_for_post_comment_box = $this->session->userdata('logged_in')['account_id'];
    $user_imge_pbox = $this->profile_set->get_profile_pic($current_user_id_for_post_comment_box);
	  
	  ?>
     
    <article id="post<?php echo $row->post_id; ?>" <?php if($row->isGhostpost==1) echo 'class="ghostpost"' ?> >
          <div class="pfInfo"> <a href="<?php echo base_url().'profile/user/'.$get_profiledata[0]->user_id; ?>" class="pfImg"><img src="<?php echo base_url(); ?>uploads/<?php if(!empty($get_profiledata[0]->user_img_thumb)) echo $get_profiledata[0]->user_img_thumb; else echo 'default_profile_pic.png'; ?>" alt=""></a>
            <div class="pfInfoDetails">
              <h5><span class="pfname"><a href="<?php echo base_url().'profile/user/'.$get_profiledata[0]->user_id; ?>"><?php echo ucfirst($get_profiledata[0]->user_firstname)."&nbsp;".ucfirst($get_profiledata[0]->user_lastname);?></a>
              
              <?php
              $get_profiledata = $this->customermodel->profiledata($row->posted_by);
			  if($get_profiledata[0]->user_gender == 'm')
				$gender = 'his';
										else
				$gender = 'her';
			 ?> 
			  <?php if($row->tagged_friends!='') { 
			  
			  
			  if(!empty($row->uploaded_files)) 
			  {
				  
				 $uploded_img_files = explode(',',$row->uploaded_files);
				
				 $tot_images_count = count($uploded_img_files);
				
				 if($tot_images_count == 1)
				 {
					 
					 $file_parts = explode('.',$row->uploaded_files);
					 $file_ext = $file_parts[1];
					 $validvideoextensions = array('webm','mp4','ogg','ogv','wmv','3gp','3g2','3gpp','avi','mov','flv'); 
					  if(isset($file_ext) && $file_ext!='' && in_array($file_ext,$validvideoextensions))
					  {
						
						    echo "<span style='text-transform: lowercase; font-size:13px; font-weight:400;'> posted a video to his timeline.</span>";
					  }else
					 
					 
					 echo "<span style='text-transform: lowercase; font-size:13px; font-weight:400;'> added a new photo. </span>";
				 }else
				 {
					 echo "<span style='text-transform: lowercase; font-size:13px; font-weight:400;'> added ".$tot_images_count." new photos. </span>";
				 }
				  
			  
			  }
			  
			  
			  
			  echo '<span style="font-weight:400;"> -- with </span>'; $tagcount=1; $totTags = count($tags);
			  foreach($tags as $tag){ 
			  if($totTags==$tagcount && $totTags!=1)
			  { ?>
				  <span class="taggednames"> and <a href="<?php echo base_url().'profile/user/'.$tag->user_id; ?>"><?php echo ucfirst($tag->user_firstname)."&nbsp;".ucfirst($tag->user_lastname);?></a> </span>
			  <?php break; }
			  if($tagcount>2){ 
			  echo ' <span style="font-weight:400;">and</span> '.(count($tags)-2).' <div id="links"><a href="#" class="taggednames">others<span>'.$tagslist.'</span></a></div>';
			  break;
			  }
			  ?>
            <?php if($tagcount>1) echo ', ';  ?>
            <span class="taggednames"><a href="<?php echo base_url().'profile/user/'.$tag->user_id; ?>"><?php echo ucfirst($tag->user_firstname)."&nbsp;".ucfirst($tag->user_lastname);?></a> </span>
			  <?php  
			  $tagcount++; 
			  } 
			  }?> 
              
              
              <?php 
			  
			  if(!empty($row->uploaded_files) && empty($row->tagged_friends) && $row->profile_pic != "Y")
			  {
				 $uploded_img_files = explode(',',$row->uploaded_files);
				
				 $tot_images_count = count($uploded_img_files);
				
				 if($tot_images_count == 1)
				 {
					 
					 $file_parts = explode('.',$row->uploaded_files);
					 $file_ext = $file_parts[1];
					 $validvideoextensions = array('webm','mp4','ogg','ogv','wmv','3gp','3g2','3gpp','avi','mov','flv'); 
					  if(isset($file_ext) && $file_ext!='' && in_array($file_ext,$validvideoextensions))
					  {
						
						    echo "<span style='text-transform: lowercase; font-size:13px; font-weight:400;'> posted a video to his timeline.</span>";
					  }else
					 
					 
					 echo "<span style='text-transform: lowercase; font-size:13px; font-weight:400;'> added a new photo. </span>";
				 }else
				 {
					 echo "<span style='text-transform: lowercase; font-size:13px; font-weight:400;'> added ".$tot_images_count." new photos. </span>";
				 }
				  
			  }
			  
			  ?>
              <?php if(!empty($row->uploaded_files) && $row->profile_pic == 'Y')
			  {
				   echo "<span style='text-transform: lowercase; font-size:13px; font-weight:400;'> updated ".$gender." profile picture. </span>";
			  }
              ?>
                           
              
			  <?php if($row->shared==1) echo " shared a post "; ?> </span></h5>
              <a href="#" class="date"><?php  echo $hrsago; ?></a> </div>
              
              
              <div class="dropdown posts_dropdown_main_div">
  
   <a class="post_hide_or_del dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
    <span class="caret"></span>
    </a>

  <ul class="dropdown-menu posts_dropdown " aria-labelledby="dropdownMenu1">
   
   <?php if($row->posted_by == $user_id){?><li><a onclick="delete_post(<?php echo $row->post_id; ?>)"><i class="fa fa-ban"></i>Delete Post</a></li><li><a onclick="hide_post(<?php echo $row->post_id; ?>,<?php echo $user_id; ?>)"><i class="fa fa-eye-slash"></i>Hide Post</a></li><?php }else{ ?><li><a onclick="hide_post(<?php echo $row->post_id; ?>,<?php echo $user_id; ?>)"><i class="fa fa-eye-slash"></i> Hide Post</a></li><?php } ?>
   
  </ul>
</div>
              
  
              
              
          </div>
          <?php if(!empty($row->share_post_content)) echo "<div>".$row->share_post_content."</div>"; ?>
          <?php $morePics = '';  $file_ext ='';		
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
             <video width="100%"  poster="<?php echo base_url().'uploads/'.$file_parts[0].'.png'; ?>"  >
              <source src="<?php echo base_url().'uploads/'.$row->uploaded_files; ?>" type="video/mp4">
            Your browser does not support the video tag.
            </video>  
<?php  }else{ ?>
          <div class="userContent  <?php echo $morePics.' '; if($row->isGhostpost==1) echo 'hidethis'; ?>"  > <?php if(!empty($row->uploaded_files))
			 {
			 $up_files = explode(',',$row->uploaded_files);
			 $i = 0;
			 $tot_images = count($up_files);
			 if($tot_images>5)
			 $tot_images = 5;
			 echo "<div class='fbphotobox postImages post-data-".$tot_images."' id='fbphotobox".$row->post_id."'>";
			 foreach($up_files as $file)
			 {
				 $file1 = explode('.',$file);
				  echo " 
    <a onclick='getPostComments(".$row->post_id.",&#39;".$file."&#39;)'><span class='photo' style='background:url(".base_url()."uploads/".$file1[0].'_default.'.$file1[1].") center center no-repeat' fbphotobox-src='".base_url()."uploads/".$file1[0].'_extended.'.$file1[1]."' ><i>+ ".(count($up_files)-5)."</i></span</a>";
				/* if($i==0)
				 {
					 echo " 
    <a onclick='getPostComments(".$row->post_id.",&#39;".$file."&#39;)'><img class='photo' fbphotobox-src='".base_url()."uploads/".$file1[0].'_extended.'.$file1[1]."' src='".base_url()."uploads/".$file1[0].'_default.'.$file1[1]."' /></a>";
				 }
				 else
				 	 echo "<a onclick='getPostComments(".$row->post_id.",&#39;".$file."&#39;)'><img class='photo' fbphotobox-src='".base_url()."uploads/".$file1[0].'_extended.'.$file1[1]."' src='".base_url()."uploads/".$file1[0].'_default.'.$file1[1]."' style='width:24%;float:left;margin:.5%; height:83px'/></a>";
				 $i++;*/
			 }
			 echo '<div class="clearfix"></div>';
			 echo "</div>";
			 echo "<div style='clear:both'></div>";
			 } ?> 
<?php /*?>            <h3>The Interpreter-TranslatorFree - Android Apps on Google Play</h3>
<?php */?>            <div <?php if($row->shared==1) echo "class='sharedContentDiv' style='border-left: 2px solid #33A6E7; margin-left:10px; padding-left:3px'" ?>><?php $str_leng=strlen($row->post_content);
			  if($str_leng>50){
				echo  "<div id='msg".$row->post_id."' style='word-break:break-all;'>".$str_des=substr($row->post_content,0,250)."..."; ?><a href="javascript:void(0)" onclick="myfunc('<?php echo $row->post_id;?>')">more</a></div><div id='des<?php echo $row->post_id;?>' style="display:none; word-break:break-all;"><?php echo $row->post_content ?><a href="javascript:void(0)" onclick="myfunc('<?php echo $row->post_id;?>')">less</a></div><?php 
			 }else{
				echo  $str_des=substr($row->post_content,0,250);
			 } ?></div>
             
          </div><?php } ?>
          <?php if($row->isGhostpost==1){ ?>
          <div class="ghostpostBtn" id="ghostpostBtn<?php echo $row->post_id; ?>" onclick="showghostpost(<?php echo $row->post_id.",".$curr_user_id.",'".$row->posted_to."',".$row->posted_by;?>)"></div>
          <?php } ?>
          <div class="sharingLink <?php if($row->isGhostpost==1) echo 'hidethis'; ?>" ><?php 
					$get_likedetails = $this->customermodel->likedata($row->post_id);
					$get_comment_details = $this->customermodel->comment_count_data($row->post_id);
					
					
					$current_user_like_data = $this->customermodel->currentuserlikedata($row->post_id);
					if($current_user_like_data){
			       //	$user_id=$current_user_like_data[0]->liked_by;
//					$like=$get_likedetails[0]->like_status;
//					}
//					else
//					$like='';
//					 if(@$user_id == $user_id && $like=='Y'){
	?>
				<a href="javascript:void(0);" onclick="likefun('<?php echo $row->post_id;?>','<?php echo $curr_user_id;?>',<?php echo count($get_likedetails); ?>)"  id="link_like<?php echo $row->post_id;?>" style="padding-right:0px;">Unlike
            <?php    
			}else{?>
				<a href="javascript:void(0);" onclick="likefun('<?php echo $row->post_id;?>','<?php echo $curr_user_id;?>',<?php echo count($get_likedetails); ?>)"  id="link_like<?php echo $row->post_id;?>" style="padding-right:0px;">Like
			<?php }?></a><span id="like_count<?php echo $row->post_id;?>"><?php  $like_count = count($get_likedetails); if($like_count>0) echo '<img src="'.base_url().'images/like_myphotos.png" alt="">'.$like_count.'&nbsp;&nbsp;'; ?></span><a href="javascript:document.getElementById('write_comment<?php echo $row->post_id; ?>').focus()" id="link_comment<?php echo $row->post_id;?>">Comment</a><span class="comment_count" id="post_comment_count<?php echo $row->post_id;?>"><?php  $comment_count = count($get_comment_details); if($comment_count>0) echo "(".$comment_count.")" ; ?></span><a href="javascript:void(0)" onclick="sharePost(<?php echo $row->post_id; ?>)" data-toggle="modal" data-target="#myModal">Share</a> <?php if(!empty($row->uploaded_files)) { ?><a href="javascript:void(0)" onclick="saveAsFav('<?php echo $row->post_id;?>')" data-toggle="modal" data-target="#save_as_fav_modal"><span>Save As Favorite</span></a><?php } ?></div>
            <div id="res_comments<?php echo $row->post_id;?>">
            <?php   
			       $comments_details = $this->customermodel->comments_data($row->post_id);
			       for($i=0;$i<count($comments_details);$i++){
				   // foreach($comments_details as $row_comment):
			       if($i<=4){ $com_user_data = $this->customermodel->profiledata($comments_details[$i]->commented_by); 	  
				   $hrsago = $this->customermodel->get_time_difference_php($comments_details[$i]->commented_time);
?>
                   <div class="commentBox <?php if($row->isGhostpost==1) echo 'hidethis'; ?>" id="post_comments_id<?php echo $comments_details[$i]->postcomments_id; ?>">
            <figure> <a href="<?php echo base_url().'profile/user/'.$com_user_data[0]->user_id; ?>"><img src="<?php echo base_url();?>uploads/<?php if(!empty($com_user_data[0]->user_img_thumb))echo $com_user_data[0]->user_img_thumb; else echo 'default_profile_pic.png'; ?>" alt="<?php echo base_url();?>uploads/<?php if(!empty($image[0]->user_img_thumb)) echo $image[0]->user_img_thumb; else echo 'default_profile_pic.png'; ?>"></a></figure>
            <div class="postAComment"> 
            	<div class="postACommentInner"><span class="pfname" style="color:#5A5998;"><a href="<?php echo base_url().'profile/user/'.$com_user_data[0]->user_id; ?>"><?php echo ucfirst($com_user_data[0]->user_firstname)."&nbsp;".ucfirst($com_user_data[0]->user_lastname);?></a></span> <span class="date" style="color:black;">
			<?php /*if($hr_final<24){?><?php echo $hr_final;?>hr<?php }else{
				echo  str_replace("-"," ",$days)."days ago";
			}*/ echo $comments_details[$i]->comment_content; ?></span><br /> <?php  $commentfiles = explode(',',$comments_details[$i]->uploadedfiles); if(!empty($comments_details[$i]->uploadedfiles)) { ?><div style="padding-top:15px;"><img width="200px" height="200px" src="<?php echo base_url();?>uploads/<?php echo $commentfiles[0]; ?>" /></div> <?php } ?><?php  echo $hrsago; 
			
					
			         ?> <?php $comment_likes = $this->customermodel->commentlikedata($comments_details[$i]->postcomments_id);
					$current_user_com_like_data = $this->customermodel->currentusercommentlikedata($comments_details[$i]->postcomments_id);
					if($current_user_com_like_data){
					//if(sizeof($comment_likes)>0){
//			       	$user_id=$comment_likes[0]->liked_by;
//					$like=$comment_likes[0]->like_status;
//					}
//					else
//					$like='';
//					 if(@$user_id == $user_id && $like=='Y'){
						 
						 ?>
				<a href="javascript:void(0);" onclick="commentlikefun('<?php echo $comments_details[$i]->postcomments_id;?>','<?php echo $curr_user_id;?>',<?php echo count($comment_likes); ?>)"  id="cmt_link_like<?php echo $comments_details[$i]->postcomments_id;?>" style="padding-right:0px;">Unlike
            <?php    
			}else{?>
				<a href="javascript:void(0);" onclick="commentlikefun('<?php echo $comments_details[$i]->postcomments_id;?>','<?php echo $curr_user_id;?>',<?php echo count($comment_likes); ?>)"  id="cmt_link_like<?php echo $comments_details[$i]->postcomments_id;?>" style="padding-right:0px;">Like
			<?php }?></a>&nbsp;<span id="cmt_like_count<?php echo $comments_details[$i]->postcomments_id;?>"><?php  $like_count = count($comment_likes); if($like_count>0) echo '<img src="'.base_url().'images/like_myphotos.png" alt="">'.$like_count.'&nbsp;&nbsp;'; ?></span></div>
                    
              </div>
              <div class="clearfix"></div>
          </div>
			<?php 
				   }
				   }
				   
				   // endforeach;
		    ?>
            <?php if(count($comments_details)>4){ ?>
            <a href="javascript:void(0);" id="view_more_link<?php echo $row->post_id;?>" onclick="view_more_comments(<?php echo $row->post_id;?>)" style="font-size:12px;">View More</a>
            <?php } ?>
          </div>
          <div class="commentBox <?php if($row->isGhostpost==1) echo ' hidethis'; ?>" id="commentBox<?php echo $row->post_id;?>">
            <figure><img src="<?php echo base_url();?>uploads/<?php if(!empty($user_imge_pbox[0]->user_img_thumb)) echo $user_imge_pbox[0]->user_img_thumb; else echo 'default_profile_pic.png'; ?>" alt=""></figure>
            <div class="postAComment"> 
            	<div class="postACommentInner">
                           <form method="post" style="width:100% !important;" enctype="multipart/form-data" autocomplete="off" class="send_comment_ajax" id="send_comment_ajax<?php echo $row->post_id;?>" >
            <a href="javascript:document.getElementById('uploadCommentPhotos<?php echo $row->post_id;?>').click();javascript:document.getElementById('write_comment<?php echo $row->post_id;?>').focus(); " class="upload"><span aria-hidden="true" class="glyphicon glyphicon-camera"></span></a>
 <input type="text" class="form-control comment xyzzyx" placeholder="Write a Comment..." name="write_comment" post_id="<?php echo $row->post_id;?>"  id="write_comment<?php echo $row->post_id; ?>" >                             <input type="hidden" name="post_id" value="<?php echo $row->post_id;?>" >
               <input type="hidden" name="posted_by" value="<?php echo $current_user_id_for_post_comment_box; ?>">
               <input type="file" class="abccba" name="uploadCommentPhotos<?php echo $row->post_id;?>[]" id="uploadCommentPhotos<?php echo $row->post_id;?>" style="display:none;" />
</form>
              <em>Press Enter to post.</em> </div>
              </div>
              <div class="clearfix"></div>
          </div>
        </article>         
		<?php  endforeach;  ?>
   
                
                   <input type="hidden" value="<?php echo $last_id; ?>" id="last_id" />
                <?php } else { ?> 
                   <input type="hidden" value="0" id="last_id" />
                   <?php }
	  ?>
      
   
  