<?php
if($comments)
{
	foreach($comments as $data)
{

  $curr_user_id = $this->session->userdata('logged_in')['account_id'];
  $com_user_data = $this->customermodel->profiledata($data['commented_by']);
  $hrsago = $this->customermodel->get_time_difference_php($data['commented_time']); 
?>

<div class="commentBox" id="post_comments_id<?php echo $data['postcomments_id']; ?>">
            <figure> <a href="<?php echo base_url().'profile/user/'.$com_user_data[0]->user_id; ?>"><img src="<?php echo base_url();?>uploads/<?php if(!empty($com_user_data[0]->user_img_thumb))echo $com_user_data[0]->user_img_thumb; else echo 'default_profile_pic.png'; ?>" alt="<?php echo base_url();?>uploads/<?php if(!empty($image[0]->user_img_thumb)) echo $image[0]->user_img_thumb; else echo 'default_profile_pic.png'; ?>"></a></figure>
            <div class="postAComment"> 
            	<div class="postACommentInner"><span class="pfname" style="color:#5A5998;"><a href="<?php echo base_url().'profile/user/'.$com_user_data[0]->user_id; ?>"><?php echo ucfirst($com_user_data[0]->user_firstname)."&nbsp;".ucfirst($com_user_data[0]->user_lastname);?></a></span> <span class="date" style="color:black;">
			<?php  echo $data['comment_content'] ; ?></span><br /> <?php  if(!empty($data['uploadedfiles'])) { $commentfiles = explode(',',$data['uploadedfiles']);  ?><div style="padding-top:15px;"><img width="200px" height="200px" src="<?php echo base_url();?>uploads/<?php echo $commentfiles[0]; ?>" /></div> <?php } ?><?php  echo $hrsago; ?> <?php $comment_likes = $this->customermodel->commentlikedata($data['postcomments_id']);
					$current_user_com_like_data = $this->customermodel->currentusercommentlikedata($data['postcomments_id']);
					if($current_user_com_like_data){
		 
						 ?>
				<a href="javascript:void(0);" onclick="commentlikefun('<?php echo $data['postcomments_id'] ;?>','<?php echo $curr_user_id;?>',<?php echo count($comment_likes); ?>)"  id="cmt_link_like<?php echo $data['postcomments_id'];?>" style="padding-right:0px;">Unlike
            <?php    
			}else{?>
				<a href="javascript:void(0);" onclick="commentlikefun('<?php echo $data['postcomments_id'];?>','<?php echo $curr_user_id;?>',<?php echo count($comment_likes); ?>)"  id="cmt_link_like<?php echo $data['postcomments_id'];?>" style="padding-right:0px;">Like
			<?php }?></a>&nbsp;<span id="cmt_like_count<?php echo $data['postcomments_id'];?>"><?php  $like_count = count($comment_likes); if($like_count>0) echo '<img src="'.base_url().'images/like_myphotos.png" alt="">'.$like_count.'&nbsp;&nbsp;'; ?></span></div>
                    
              </div>
              <div class="clearfix"></div>
          </div>
      <?php } } ?> 