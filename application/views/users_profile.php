<?php  
       $image = $this->profile_set->get_profile_pic($user_id);
	   $data = $this->profile_set->get_userinfo($user_id); 
	   $friends = $this->friendsmodel->getfriends('','',$user_id,9);
	   $myfrnd = $this->friendsmodel->user_frnds($user_id);
	   $organization_details = $this->profile_set->getorganizationDetails($user_id);
	   $emp_working = $this->profile_set->get_org_details_by_status_work($user_id);
	   $emp_work_ended = $this->profile_set->get_org_details_by_status_all($user_id);
	   $college_details = $this->profile_set->get_clg_details_all($user_id);
	   $result = $this->profile_set->save_settings($user_id);
	      ?>
<section class="col-lg-9 col-md-9 nopad">
      <div class="col-xs-12 ProfileView">
        <section class="visitorBox">
          <div class="visitiBoxInner">
            <figure class="compCover"><img alt="" src="<?php echo base_url(); ?>images/about_banner.jpg" class="img-responsive"></figure>
             
            <div class="profileLogo">
              <figure class="cmplogo"><a href="#"><span class="glyphicon glyphicon-camera change-photo fileinput-button" aria-hidden="true"><em>Change Picture</em> <input type="file" name="userfile" id="userfile" size="20" required/></span></a><img src="<?php echo base_url();?>uploads/<?php if(!empty($image[0]->user_img_thumb)) echo $image[0]->user_img_thumb; else echo 'default_profile_pic.png'; ?>" alt="<?php echo base_url();?>uploads/<?php if(!empty($image[0]->user_img_thumb)) echo $image[0]->user_img_thumb; else echo 'default_profile_pic.png'; ?>"></figure>
               <?php 
			$searchblock = '';
			 if($myfrnd){
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
			  
			 }else{
 $searchblock .= "<div class='addfrdbtn'><a id='addFrnd".$user_id."' href='javascript:void(0);' onclick='addSearchFrnd(" .$user_id. ");'>Add Friend</a></div>";
			 }
			echo $searchblock;
			?>


              <!-- <span class="inside glyphicon glyphicon-camera" ></span>--> 
            </div>
            <h4 class="profile-name"><?php echo substr($data[0]['user_firstname']." ".$data[0]['user_lastname'],0,20); ?></h4>
            
            <div class="ProfileViewNav"></div>
          </div>
                 </section>
      </div>
     
     <!-- <section class="about-user-details">
        
        <div class="about-user-details-inner" >
          <section class="col-lg-12 col-md-12 col-sm-5 col-xs-12 coloumn2 aboutme">
            <div class="posts">
              <div class="col-md-4">
                
              </div>
              <div class="tab-content col-md-8">
                           
              </div>
              <div class="clear"></div>
            </div>
          </section>
          <div class="clearfix"></div>
        </div>
      </section>-->
        <section class="col-lg-4 col-md-4 col-sm-4 col-xs-12 coloumn1" style="padding-right:0; padding-top:0;margin-top:-15px; "><aside>
       <?php if($organization_details && $college_details && $result ){ ?>
        <div class="myPhotos basicInfo"> <?php if(!empty($organization_details)){ ?>
        				<div class="specific_block">
        				<div class="in_left"> <i class="fa fa-briefcase"></i></div>
                        <div class="in_right boxs" style="">
                       
                        <?php 	
						if(!empty($emp_working))
						{
							foreach($emp_working as $working)
							{
						?>		
						
                          <span><?php echo $working['position']; ?> at <a href="#"><?php echo $working['org_name']; ?></a></span>
                          
                          <?php } } ?>
                          <?php 	
						  if(!empty($emp_work_ended))
						{
							 $i = 0;
							 ?>
                             <span class="aboutme_clg_bi">Past:</span>
                             <?php
							foreach($emp_work_ended as $worked)
							{
							
						?>
                         <a href="#" class="aboutme_clg_bi"><?php echo $worked['org_name']; ?></a>
                          
						  <?php 
						  
						  if($i < count($emp_work_ended))
						  
						  { 
						  
						  if($i == count($emp_work_ended)-1)
						  {
						  break;
						  }
						  elseif($i == count($emp_work_ended)-2)
						  {
							  
						  ?>
                          <span class="aboutme_clg_bi">and</span>
                          <?php }else{ ?>
                          <span class="aboutme_clg_bi">,</span>
                          
					<?php
							}
						  } $i++;} ?>
                       <!--   <div class="edu_cation"><a href="javascript:void(0)" onclick="mov_to_work_edu()">Edit your education</a></div> -->
                        </div>
                        <div class="clearfix"></div></div>
        <?php } }?>
        
        
       
                      
                        <?php  if(!empty($college_details)) { $j=1; ?> <div class="specific_block">  
						<div class="in_left"><i class="fa fa-graduation-cap"></i></div><div class="in_right boxs"><?php foreach($college_details as $college) {  ?>
						
                        
                        <?php if($j == 1) { ?>
                          <span>Studied at <a href="#"><?php echo $college['college_name']; ?></a></span>
                          <?php }else { ?>
                        
                          <?php if($j==2) { ?><span class="aboutme_clg_bi">Past:</span><?php } ?><a href="#" class="aboutme_clg_bi"><?php echo $college['college_name']; ?></a>
                          <?php if($j < count($college_details)) { 
						  
						    if($i == count($college_details)-1)
						  {
						  break;
						  }
						   elseif($j < count($college_details) - 2){ ?>
                             
                          <span class="aboutme_clg_bi">and</span>
                          <?php }else{ ?>
                          <span class="aboutme_clg_bi">,</span>
                            
                            <?php  }} } $j++; ?>
                      
                        <!--  <div class="edu_cation"><a href="javascript:void(0)" onclick="mov_to_work_edu()">Edit your education</a></div> -->
                       
                        <?php  } ?>  </div><div class="clearfix"></div></div> <?php } ?>
                        
                         <?php if(!empty($result[0]->location) && !empty($result[0]->hometown)) { ?>
                        <div class="specific_block">
                        <div class="in_left"><i class="fa fa-globe"></i></div>
                        <div class="in_right boxs">
                          <span>Lives in <a href="#"><?php if($result[0]->location){ echo $result[0]->location; } else echo "Not Available"; ?></a></span>
                          <span></i><span>, From </span><a href="#"><?php  if($result[0]->hometown){ echo $result[0]->hometown; } else echo "Not Available"; ?></a></span></div>
                          
                        <div class="clearfix"></div>
                        </div>
                        
                        
                        <?php } ?>
        
        
        </div>
        <?php } ?>
        <div class="myPhotos userProfilemyPhotos">
          <h3>Friends</h3>
          <ul>
          <?php if($friends)
		  { 
		  foreach($friends as $frnd): ?>
            <li><a href="<?php echo base_url(); ?>profile/user/<?php echo $frnd['id']; ?>"><img src="<?php echo base_url(); ?>uploads/<?php echo $frnd['image']; ?>" alt=""><div class="name-overlap"><?php echo $frnd['name']; ?></div></a></li>
          <?php  endforeach; } else echo "No friends Are Available"?>
          </ul>
          <div class="clear"></div>
        </div></aside></section>
       <?php $image = $this->profile_set->get_profile_pic($user_id);	?>
    <section class="col-lg-8 col-md-8 col-sm-5 col-xs-12 coloumn2" style="padding-right:0;">
      <div class="updateStatus" id="updateStatus">
        <ul>
          <li> <img src="<?php echo base_url();?>uploads/<?php if(!empty($image[0]->user_img_thumb)) echo $image[0]->user_img_thumb; else echo 'default_profile_pic.png'; ?>" alt="<?php echo base_url();?>uploads/<?php if(!empty($image[0]->user_img_thumb)) echo $image[0]->user_img_thumb; else echo 'default_profile_pic.png'; ?>" height="60" width="60"> </li>
          <li><a href="javascript:document.getElementById('posts').focus()" >Create a Post</a></li>
          <li><a href="javascript:document.getElementById('uploadPhotos').click()">Upload Photos/Video</a></li>
          <li><a href="#">Create Photo/Video Album</a></li>
        </ul>
   
        <div id="uploadPhotosdvPreview"></div>
        <?php $attr = array('name' => 'post_form', 'id' =>'my_form', 'enctype'=>"multipart/form-data") ?>
        <?php 
		echo form_open('signg_in/send_post',$attr) ?>
        <input type="file" name="uploadPhotos[]" id="uploadPhotos" multiple="multiple" style="display:none;" />
        
<!--        <textarea cols="" rows="" name="posts" id="posts" class="form-control" placeholder="What's Buzzing?"></textarea>
-->       
		<div class="post-content" style="width:100%; min-height:75px;" onclick="document.getElementById('dummypost').focus();"><div contenteditable="true" style="min-height:20px; min-width:10px; padding:8px; float:left;" id="dummypost" onkeyup="takeInputToPost()"></div><div id="withTokens" style="display:none; padding:8px; float:left">--With </div><div style="clear:both;"></div></div>
        <input type="hidden" id="posts" name="posts" />
		<div id="hiddentokens" style="display:none;"></div>
        <div id="selectedfriends"><div id="search_frnd_wrapper"><input type="text" name="txtsearch" id="searchfriends" onkeyup="keyupevent();" /><input type="hidden" id="addedusers" name="addedusers" /><div id="autosuggest"></div></div></div>
        <div id="taggedfriends"><div id="tag_frnd_wrapper"><input type="text" name="tagsearch" id="tagsearchfriends" onkeyup="tagkeyupevent();" /><input type="hidden" id="tagaddedusers" name="tagaddedusers" /><div id="tagautosuggest"></div></div></div>
        <div class="updateControls" id="updateControls"><img class="tagging" onclick="showtaginput();" src='<?php echo base_url().'images/person-tagging.png';?>' /><img class="ghost" onclick="showghostinput();" src='<?php echo base_url().'images/haunted.png';?>' /> <select name="post_group" id="post_group"><option value="0">Public</option> <?php $groups = $this->profile_set->get_user_groups(); if($groups) { 
		foreach($groups as $group)
		{
			echo "<option value='".$group['group_id']."'>".$group['group_name']."</option>";
		}
		
		
		} ?></select> <a href="javascript:{}" onclick="document.getElementById('my_form').submit(); return false;">Post</a> </div>
        <?php echo form_close(); ?>
        <div class="clear"></div>
      </div>
     <div class="posts">
     <?php 
	  if(empty($user_id))
	  $curr_user_id = $this->session->userdata('logged_in')['account_id'];
	  else
	  $curr_user_id = $user_id;
	  $products = $this->customermodel->All_Posts($user_id);
	  if($products):
	  foreach( $products as $row):
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
	  ?>
      <article <?php if($row->isGhostpost==1) echo 'class="ghostpost"' ?> >
          <div class="pfInfo"> <a href="<?php echo base_url().'profile/user/'.$get_profiledata[0]->user_id; ?>" class="pfImg"><img src="<?php echo base_url(); ?>uploads/<?php if(!empty($get_profiledata[0]->user_img_thumb)) echo $get_profiledata[0]->user_img_thumb; else echo 'default_profile_pic.png'; ?>" alt=""></a>
            <div class="pfInfoDetails">
              <span><span class="pfname"><a href="<?php echo base_url().'profile/user/'.$get_profiledata[0]->user_id; ?>"><?php echo ucfirst($get_profiledata[0]->user_firstname)."&nbsp;".ucfirst($get_profiledata[0]->user_lastname);?></a>
			  
			  <?php if($row->tagged_friends!='') { 
			  echo ' with '; $tagcount=1;
			  foreach($tags as $tag){ 
			  
			  if($tagcount>2){ 
			  echo ' and '.(count($tags)-2).' <div id="links"><a href="#" class="taggednames">others<span>'.$tagslist.'</span></a></div>';
			  break;
			  }
			  ?>
            <span class="taggednames"><a href="<?php echo base_url().'profile/user/'.$tag->user_id; ?>"><?php echo ucfirst($tag->user_firstname)."&nbsp;".ucfirst($tag->user_lastname);?></a> </span>
			  <?php if($tagcount<2) echo ', ';  
			  $tagcount++; 
			  } 
			  }?> 
			  <?php if($row->shared==1) echo " shared a post "; ?> </span></span>
              <a href="#" class="date"><?php  echo $hrsago; ?></a> </div>
          </div>
          <?php if(!empty($row->share_post_content)) echo "<div>".$row->share_post_content."</div>"; ?>
          <div class="userContent"> <?php if(!empty($row->uploaded_files))
			 {
			 $up_files = explode(',',$row->uploaded_files);
			 $i = 0;
			 echo "<div class='fbphotobox'>";
			 foreach($up_files as $file)
			 {
				 if($i==0)
				 {
					 echo " 
    <a onclick='getPostComments(".$row->post_id.")'><img class='photo' fbphotobox-src='".base_url()."uploads/".$file."' src='".base_url()."uploads/".$file."' style='width:100%'/></a>";
				 }
				 else
				 	 echo "<a onclick='getPostComments(".$row->post_id.")'><img class='photo' fbphotobox-src='".base_url()."uploads/".$file."' src='".base_url()."uploads/".$file."' style='width:24%;float:left;margin:.5%; height:83px'/></a>";
				 $i++;
			 }
			 echo "</div>";
			 echo "<div style='clear:both'></div>";
			 } ?> </figure>
<?php /*?>            <h3>The Interpreter-TranslatorFree - Android Apps on Google Play</h3>
<?php */?>            <div <?php if($row->shared==1) echo "class='sharedContentDiv' style='border-left: 2px solid #33A6E7; margin-left:10px; padding-left:3px'" ?>><?php $str_leng=strlen($row->post_content);
			  if($str_leng>50){
				echo  "<div id='msg".$row->post_id."'>".$str_des=substr($row->post_content,0,250)."..."; ?><a href="javascript:void(0)" onclick="myfunc('<?php echo $row->post_id;?>')">more</a></div><div id='des<?php echo $row->post_id;?>' style="display:none"><?php echo $row->post_content ?><a href="javascript:void(0)" onclick="myfunc('<?php echo $row->post_id;?>')">less</a></div><?php 
			 }else{
				echo  $str_des=substr($row->post_content,0,250);
			 } ?></div>
          </div>
          <div class="sharingLink"><?php 
					$get_likedetails = $this->customermodel->likedata($row->post_id);
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
			<?php }?></a><span id="like_count<?php echo $row->post_id;?>"><?php  $like_count = count($get_likedetails); if($like_count>0) echo '<img src="'.base_url().'images/like_myphotos.png" alt="">'.$like_count.'&nbsp;&nbsp;'; ?></span><a href="javascript:document.getElementById('write_comment<?php echo $row->post_id; ?>').focus()">Comment</a> <a href="javascript:void(0)" onclick="sharePost(<?php echo $row->post_id; ?>)" data-toggle="modal" data-target="#myModal">Share</a> <a href="javascript:void(0)" onclick="saveAsFav('<?php echo $row->post_id;?>')"><span>Save As Favorite</span></a></div>
            <div id="res_comments<?php echo $row->post_id;?>">
            <?php   
			       $comments_details = $this->customermodel->comments_data($row->post_id);
			       for($i=0;$i<count($comments_details);$i++){
				   // foreach($comments_details as $row_comment):
			       if($i<=4){ $com_user_data = $this->customermodel->profiledata($comments_details[$i]->commented_by); 	  $hrsago = $this->customermodel->get_time_difference_php($comments_details[$i]->commented_time);
?>
                   <div class="commentBox">
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
            <a href="#" onclick="view_comments('<?php echo $row->post_id;?>')" style="font-size:12px;">View More</a>
            <?php } ?>
          </div>
          <div class="commentBox">
            <figure><img src="<?php echo base_url();?>uploads/<?php if(!empty($image[0]->user_img_thumb)) echo $image[0]->user_img_thumb; else echo 'default_profile_pic.png';; ?>" alt=""></figure>
            <div class="postAComment"> 
            	<div class="postACommentInner">
                           <form action="<?php echo base_url();?>signg_in/write_comment/<?php echo $row->post_id;?>" method="post" style="width:100% !important;" enctype="multipart/form-data" autocomplete="off">
            <a href="javascript:document.getElementById('uploadCommentPhotos<?php echo $row->post_id;?>').click();javascript:document.getElementById('write_comment<?php echo $row->post_id;?>').focus(); " class="upload"><span aria-hidden="true" class="glyphicon glyphicon-camera"></span></a>
 <input type="text" class="form-control comment" placeholder="Write a Comment..." name="write_comment" id="write_comment<?php echo $row->post_id; ?>">                             <input type="hidden" name="post_id" value="<?php echo $row->post_id;?>">
               <input type="hidden" name="posted_by" value="<?php echo $curr_user_id;?>">
               <input type="file" name="uploadCommentPhotos<?php echo $row->post_id;?>[]" id="uploadCommentPhotos<?php echo $row->post_id;?>" style="display:none;" />
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
      <div class="modal-body" id="sharePostPopup">
        ...
      </div>
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
      