 <?php 
	
	  $curr_user_id = $this->session->userdata('logged_in')['account_id'];
	  
	  $products = $this->customermodel->individual_Page_Posts($post_id);
	  $posts_count = count($products);
	  if($products){
	  foreach( $products as $row):
	  
	  $last_id = $row->post_id;
	  	
	  $hrsago = $this->customermodel->get_time_difference_php($row->posted_on);
      $posted_id=$row->posted_by;
	  $get_profiledata = $this->customermodel->profiledata($posted_id);
	 
	  if(empty($user_id))
	  $user_id=$this->session->userdata('logged_in')['account_id'];
	  else
	  $user_id = $user_id;
	  ?>
 <?php   
			       $comments_details = $this->customermodel->page_comments_data_desc($post_id);
				
			       for($i=0;$i<count($comments_details);$i++){
				   // foreach($comments_details as $row_comment):
			       //if($i<=1){ 
				    if($comments_details[$i]->cmt_as=='page'){
				   $com_user_data = $this->customermodel->page_profiledata($comments_details[$i]->cmt_by); 
				    if(!empty($com_user_data[0]->page_image)) 
				   $u_p_pic = $com_user_data[0]->page_image; 
				   else 
				   $u_p_pic = 'main_cat_'.$com_user_data[0]->main_category.'.png';
				   $u_p_name =  ucfirst($com_user_data[0]->page_name);
				  
				   }
				   else{  
				   $com_user_data = $this->customermodel->profiledata($comments_details[$i]->cmt_by); 
				   if(!empty($com_user_data[0]->user_img_thumb)) 
				   $u_p_pic = $com_user_data[0]->user_img_thumb; 
				   else 
				   $u_p_pic = 'default_profile_pic.png';
				   $u_p_name =  ucfirst($com_user_data[0]->user_firstname)."&nbsp;".ucfirst($com_user_data[0]->user_lastname);
				   }
	  $cmt_hrsago = $this->customermodel->get_time_difference_php($comments_details[$i]->cmt_timestamp);


?>
<div class="moreLinks usercomment">
              <figure><img src="<?php echo base_url(); ?>uploads/<?php echo $u_p_pic; ?>" width="37" height="36"  alt=""/></figure>
              <div class="content">
                <h5><?php echo $u_p_name ; ?></h5>
                <span><?php echo $comments_details[$i]->cmt_content; ?></span>
                <p><?php $comment_likes = $this->customermodel->page_comment_likes($comments_details[$i]->cmt_id);
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
            </span> . <?php echo $cmt_hrsago; ?></p>
              </div>
              <div class="clearfix"></div>
            </div>
          <?php } 
		  //}
		  
		  endforeach;
				   }
		   ?>