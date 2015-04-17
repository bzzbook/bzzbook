   <?php  $image = $cmp_info;	
   //echo $image[0]['user_id'].' '.$this->session->userdata('logged_in')['account_id'];exit;
   ?>
    <section class="col-lg-6 col-md-6 col-sm-5 col-xs-12 coloumn2">
    <?php if($image[0]['user_id']==$this->session->userdata('logged_in')['account_id']) { ?>
      <div class="updateStatus" id="updateStatus">
        <ul>
          <li> <img src="<?php echo base_url();?>uploads/<?php echo $image[0]['company_image'] ?>" alt="<?php echo base_url();?>uploads/<?php echo $image[0]['company_image'] ?>" height="60" width="55"> </li>
          <li><a href="javascript:document.getElementById('posts').focus()" >Create a Post</a></li>
          <li><a href="javascript:document.getElementById('uploadPhotos').click()">Upload Photos/Video</a></li>
          <li><a href="#">Create Photo/Video Album</a></li>
        </ul>
   
        <div id="uploadPhotosdvPreview"></div>
        <?php  $attr = array('name' => 'post_form', 'id' =>'my_form', 'enctype'=>"multipart/form-data") ?>
        <?php 
		echo form_open('signg_in/send_cmp_post/'.$image[0]['companyinfo_id'],$attr) ?>
        <input type="file" name="uploadPhotos[]" id="uploadPhotos" multiple="multiple" style="display:none;" />
        <textarea cols="" rows="" name="posts" id="posts" class="form-control" placeholder="What's Buzzing?"></textarea>
        <div class="updateControls"> <a href="javascript:{}" onclick="document.getElementById('my_form').submit(); return false;">Post</a> <select name="post_group" id="post_group"><option value="0">Public</option><option value="1">Colleagues</option><option value="2">Customers</option></select> </div>
        <?php echo form_close();  ?>
        <div class="clear"></div>
      </div>
      <?php } ?>
     <div class="posts">
     <?php 
	  if(empty($user_id))
	  $curr_user_id = $this->session->userdata('logged_in')['account_id'];
	  else
	  $curr_user_id = $user_id;
	  $products = $this->customermodel->All_Cmp_Posts($image[0]['companyinfo_id']);
	  if($products):
	  foreach( $products as $row):
	  $hrsago = $this->customermodel->get_time_difference_php($row->cmp_posted_date);
      $get_profiledata = $this->customermodel->profiledata($curr_user_id);
	  if(empty($user_id))
	  $user_id=$this->session->userdata('logged_in')['account_id'];
	  else
	  $user_id = $user_id;
	  ?>
      <article>
          <div class="pfInfo"> <a href="<?php echo base_url().'company/company_disp/'.$image[0]['companyinfo_id']; ?>" class="pfImg"><img src="<?php echo base_url(); ?>uploads/<?php echo $image[0]['company_image']; ?>" alt=""></a>
            <div class="pfInfoDetails">
              <h5><span class="pfname"><a href="<?php echo base_url().'company/company_disp/'.$image[0]['companyinfo_id']; ?>"><?php echo $image[0]['cmp_name'];?></a><?php if($row->cmp_shared==1) echo " shared a post "; ?> </span></h5>
              <a class="date"><?php  echo $hrsago; ?></a> </div>
          </div>
          <?php if(!empty($row->cmp_share_post_content)) echo "<div>".$row->cmp_share_post_content."</div>"; ?>
          <div class="userContent"> <?php if(!empty($row->cmp_uploaded_files))
			 {
			 $up_files = explode(',',$row->cmp_uploaded_files);
			 $i = 0;
			 foreach($up_files as $file)
			 {
				 if($i==0)
				 {
					 echo "<img src='".base_url()."uploads/".$file."' style='width:100%'/>";
				 }
				 else
				 	 echo "<img src='".base_url()."uploads/".$file."' style='width:24%;float:left;margin:.5%; height:83px'/>";
				 $i++;
			 }
			 echo "<div style='clear:both'></div>";
			 } ?> </figure>
<?php /*?>            <h3>The Interpreter-TranslatorFree - Android Apps on Google Play</h3>
<?php */?>            <div <?php if($row->cmp_shared==1) echo "class='sharedContentDiv' style='border-left: 2px solid #33A6E7; margin-left:10px; padding-left:3px'" ?>><?php $str_leng=strlen($row->cmp_post_content);
			  if($str_leng>50){
				echo  "<div id='msg".$row->cmp_post_id."'>".$str_des=substr($row->cmp_post_content,0,250)."..."; ?><a href="javascript:void(0)" onclick="myfunc('<?php echo $row->cmp_post_id;?>')">more</a></div><div id='des<?php echo $row->cmp_post_id;?>' style="display:none"><?php echo $row->cmp_post_content ?><a href="javascript:void(0)" onclick="myfunc('<?php echo $row->cmp_post_id;?>')">less</a></div><?php 
			 }else{
				echo  $str_des=substr($row->cmp_post_content,0,250);
			 } ?></div>
          </div>
          <div class="sharingLink"><?php $get_likedetails = $this->customermodel->cmplikedata($row->cmp_post_id);
					
					if(sizeof($get_likedetails)>0){
			       	$user_id=$get_likedetails[0]->liked_by;
					$like=$get_likedetails[0]->like_status;
					}
					else
					$like='';
					 if(@$user_id == $user_id && $like=='Y'){?>
				<a href="javascript:void(0);" onclick="cmplikefun('<?php echo $row->cmp_post_id;?>','<?php echo $row->cmp_posted_by;?>',<?php echo count($get_likedetails); ?>)"  id="link_like<?php echo $row->cmp_post_id;?>" style="padding-right:0px;">Unlike<?php }else{ ?><a href="javascript:void(0);" onclick="cmplikefun('<?php echo $row->cmp_post_id;?>','<?php echo $row->cmp_posted_by;?>',<?php echo count($get_likedetails); ?>)"  id="link_like<?php echo $row->cmp_post_id;?>" style="padding-right:0px;">Like<?php }?></a>(<span id="like_count<?php echo $row->cmp_post_id;?>"><?php echo count($get_likedetails); ?></span>)&nbsp;&nbsp;<a href="javascript:document.getElementById('write_comment<?php echo $row->cmp_post_id; ?>').focus()">Comment</a> <a href="javascript:void(0)" onclick="shareCmpPost(<?php echo $row->cmp_post_id; ?>)" data-toggle="modal" data-target="#myModal">Share</a> </div>
            <div id="res_comments<?php echo $row->cmp_post_id;?>">
            <?php   
			       $comments_details = $this->customermodel->cmp_comments_data($row->cmp_post_id);
			       for($i=0;$i<count($comments_details);$i++){
				   // foreach($comments_details as $row_comment):
			       if($i<=4){ $com_user_data = $this->customermodel->profiledata($comments_details[$i]->commented_by); 	  $hrsago = $this->customermodel->get_time_difference_php($comments_details[$i]->commented_time);
?>
                   <div class="commentBox">
            <figure> <a href="<?php if($image[0]['user_id']==$this->session->userdata('logged_in')['account_id']) { echo base_url().'company/company_disp/'.$image[0]['companyinfo_id']; }else{ echo base_url().'profile/post/'.$com_user_data[0]->user_id; } ?>"><img src="<?php  if($image[0]['user_id']==$this->session->userdata('logged_in')['account_id']) { echo base_url();?>uploads/<?php echo $image[0]['company_image']; } else {echo base_url();?>uploads/<?php if(!empty($com_user_data[0]->user_img_thumb)) echo $com_user_data[0]->user_img_thumb; else echo 'default_profile_pic.png'; } ?>" alt="<?php echo base_url();?>uploads/<?php echo $image[0]['company_image'] ?>"></a></figure>
            <div class="postAComment"> 
            	<div class="postACommentInner"><span class="pfname" style="color:#5A5998;"><a href="<?php if($image[0]['user_id']==$this->session->userdata('logged_in')['account_id']) { echo base_url().'company/company_disp/'.$image[0]['companyinfo_id']; } else { echo base_url().'profile/post/'.$com_user_data[0]->user_id; } ?>"><?php if($image[0]['user_id']==$this->session->userdata('logged_in')['account_id']) { echo ucfirst($image[0]['cmp_name']);} else {  echo ucfirst($com_user_data[0]->user_firstname)."&nbsp;".ucfirst($com_user_data[0]->user_lastname); }?></a></span> <span class="date" style="color:black;">
			<?php /*if($hr_final<24){?><?php echo $hr_final;?>hr<?php }else{
				echo  str_replace("-"," ",$days)."days ago";
			}*/ echo $comments_details[$i]->comment_content; ?></span><br /> <?php  echo $hrsago;
					 $commentfiles = explode(',',$comments_details[$i]->uploadedfiles);
			         ?></div>
                      <?php if(!empty($comments_details[$i]->uploadedfiles)) { ?><div style="padding-left:16px;"><img width="200px" height="200px" src="<?php echo base_url();?>uploads/<?php echo $commentfiles[0]; ?>" /></div> <?php } ?>
              </div>
              <div class="clearfix"></div>
          </div>
			<?php 
				   }
				   }
				   
				   // endforeach;
		    ?>
            <?php if(count($comments_details)>4){ ?>
            <a href="#" onclick="view_comments('<?php echo $row->cmp_post_id;?>')" style="font-size:12px;">View More</a>
            <?php } ?>
          </div>
          <div class="commentBox">
            <figure><img src="<?php if($image[0]['user_id']==$this->session->userdata('logged_in')['account_id']) { echo base_url();?>uploads/<?php echo $image[0]['company_image']; } else { echo base_url();?>uploads/<?php if(!empty($get_profiledata[0]->user_img_thumb)) echo $get_profiledata[0]->user_img_thumb; else echo 'default_profile_pic.png'; } ?>" alt=""></figure>
            <div class="postAComment"> 
            	<div class="postACommentInner">
                           <form action="<?php echo base_url();?>signg_in/write_cmp_comment/<?php echo $row->cmp_post_id."/".$image[0]['companyinfo_id']; ?>" method="post" style="width:100% !important;" enctype="multipart/form-data">
            <a href="javascript:document.getElementById('CmpCommentPhotos<?php echo $row->cmp_post_id;?>').click();javascript:document.getElementById('write_comment<?php echo $row->cmp_post_id;?>').focus(); " class="upload"><span aria-hidden="true" class="glyphicon glyphicon-camera"></span></a>
 <input type="text" class="form-control comment" placeholder="Write a Comment..." name="write_comment" id="write_comment<?php echo $row->cmp_post_id;?>">                             <input type="hidden" name="post_id" value="<?php echo $row->cmp_post_id;?>">
               <input type="hidden" name="posted_by" value="<?php echo $curr_user_id;?>">
                <input type="file" name="CmpCommentPhotos<?php echo $row->cmp_post_id;?>[]" id="CmpCommentPhotos<?php echo $row->cmp_post_id;?>" style="display:none;" />
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