    <?php  $image = $this->profile_set->get_profile_pic();	?>
    <section class="col-lg-6 col-md-6 col-sm-5 col-xs-12 coloumn2">
      <div class="updateStatus" id="updateStatus">
        <ul>
          <li> <img src="<?php echo base_url();?>uploads/<?php echo $image[0]->user_img_thumb ?>" alt="<?php echo base_url();?>uploads/<?php echo $image[0]->user_img_thumb ?>" height="60" width="55"> </li>
          <li><a href="javascript:document.getElementById('posts').focus()" >Create a Post</a></li>
          <li><a href="javascript:document.getElementById('uploadPhotos').click()">Upload Photos/Video</a></li>
          <li><a href="#">Create Photo/Video Album</a></li>
        </ul>
   
        <div id="uploadPhotosdvPreview"></div>
        <?php $attr = array('name' => 'post_form', 'id' =>'my_form', 'enctype'=>"multipart/form-data") ?>
        <?php 
		echo form_open('signg_in/send_post',$attr) ?>
        <input type="file" name="uploadPhotos[]" id="uploadPhotos" multiple="multiple" style="display:none;" />
        <textarea cols="" rows="" name="posts" id="posts" class="form-control" placeholder="What's Buzzing?"></textarea>
        <div class="updateControls"> <a href="javascript:{}" onclick="document.getElementById('my_form').submit(); return false;">Post</a> <select name="post_group" id="post_group"><option value="0">Public</option> <?php $groups = $this->profile_set->get_user_groups(); if($groups) { 
		foreach($groups as $group)
		{
			echo "<option value='".$group['group_id']."'>".$group['group_name']."</option>";
		}
		
		
		} ?></select> </div>
        <?php echo form_close(); ?>
        <div class="clear"></div>
      </div>
      
      
       <div class="posts">
      <article>
          <div class="pfInfo"> <a href="#" class="pfImg"><img src="<?php echo base_url();?>images/ph.jpg" alt=""></a>
            <div class="pfInfoDetails">
              <h5><span class="pfname"><a href="#">Dunga Suresh</a></span> shared a <a href="#">link</a></h5>
              <a href="#" class="date">October 2, 2013</a> </div>
          </div>
          <div class="userContent"> <figure><img src="<?php echo base_url();?>images/safe_image.png" alt=""></figure>
            <h3>The Interpreter-TranslatorFree - Android Apps on Google Play</h3>
            <p>"The interpreter" acquires text by your voice or by the keyboard in real time, translates it and reads it for you into one the 60 available languages."The interpreter" acquires text by your voice or by the keyboard in real time, translates it and reads it for you into one the 60 available languages.</p>
          </div>
          <div class="sharingLink"><a href="#">Like</a><a href="#">Comment</a><a href="#">Share</a></div>
          <div class="commentBox">
            <figure><img src="<?php echo base_url();?>images/ph.jpg" alt=""></figure>
            <div class="postAComment"> 
            	<div class="postACommentInner">
            <a href="#" class="upload"><span aria-hidden="true" class="glyphicon glyphicon-camera"></span></a>
              <textarea placeholder="Write a Comment..."></textarea>
              <em>Press Enter to post.</em> </div>
              </div>
              <div class="clearfix"></div>
          </div>
        </article>
      
      </div>
      
      
      
      
      
      
      
      
     <div class="posts">
      
      <!-- code added by 23-02-2015-->
      <?php 
	  
	  $products = $this->customermodel->All_Posts();
	  if($products):
	  foreach( $products as $row):
	 /* $hrs=$row->posted_on;
	  $currt_hrs=date('Y-m-d H:i:s');
      $timestamp1 = strtotime($hrs);
      $timestamp2 = strtotime($currt_hrs);*/
	  $hrsago = $this->customermodel->get_time_difference_php($row->posted_on);
      /*$hour = abs($timestamp2 - $timestamp1)/(60*60);
      $hr_final=round($hour);
	  
	  
	  
	  $seconds = $timestamp1 - time();

      $days = floor($seconds / 86400);
      $seconds %= 86400;

      $hours = floor($seconds / 3600);
      $seconds %= 3600;

      $minutes = floor($seconds / 60);
      $seconds %= 60;*/
	  
	  $posted_id=$row->posted_by;
	  $get_profiledata = $this->customermodel->profiledata($posted_id);
	  $user_id=$this->session->userdata('logged_in')['account_id'];
	  	  
	  ?>
	
	   <article>
          <figure><img src="<?php echo base_url(); ?>uploads/<?php echo $get_profiledata[0]->user_img_thumb; ?>" alt=""></figure>
          <div class="content" id="content">
            <h3 class="pw"><?php echo ucfirst($get_profiledata[0]->user_firstname)."&nbsp;".ucfirst($get_profiledata[0]->user_lastname);?><span>
			<?php /*if($hr_final<24){?><?php echo $hr_final;?>hr<?php }else{
				echo  str_replace("-"," ",$days)."days ago";
			}*/ echo $hrsago; ?></span></h3>
            <p id="msg<?php echo $row->post_id;?>"><?php
		     $str_leng=strlen($row->post_content);
			 if($str_leng>50){
				echo  $str_des=substr($row->post_content,0,50)."...";?><a href="#" onclick="myfunc('<?php echo $row->post_id;?>')">more</a><?php 
			 }else{
				echo  $str_des=substr($row->post_content,0,50);
			 }
			 if(!empty($row->uploaded_files))
			 {
			 $up_files = explode(',',$row->uploaded_files);
			 $i = 0;
			 foreach($up_files as $file)
			 {
				 if($i==0)
				 {
					 echo "<img src='".base_url()."uploads/".$file."' style='width:100%'/>";
				 }
				 else
				 	 echo "<img src='".base_url()."uploads/".$file."' style='width:24%;float:left;margin-right:1%'/>";
				 $i++;
			 }
			 echo "<div style='clear:both'></div>";
			 }
			 
			?></p>
             <p id="des<?php echo $row->post_id;?>" style="display:none;"><?php echo $row->post_content;?></p>
            <div class="links">
            <?php   $get_likedetails = $this->customermodel->likedata($row->post_id);
					
					if(sizeof($get_likedetails)>0){
			       	$user_id=$get_likedetails[0]->liked_by;
					$like=$get_likedetails[0]->like_status;
					}
					else
					$like='';
			?>
            
            
             
        <div id="like_ajax<?php echo $row->post_id;?>">
            <?php if(@$user_id == $user_id && $like=='Y'){?>
				<a href="javascript:void(0);" onclick="likefun('<?php echo $row->post_id;?>','<?php echo $row->posted_by;?>',<?php echo count($get_likedetails); ?>)"  id="link_like<?php echo $row->post_id;?>" style="padding-right:0px;">Unlike
            <?php    
			}else{?>
				<a href="javascript:void(0);" onclick="likefun('<?php echo $row->post_id;?>','<?php echo $row->posted_by;?>',<?php echo count($get_likedetails); ?>)"  id="link_like<?php echo $row->post_id;?>" style="padding-right:0px;">Like
			<?php }?></a>(<span id="like_count<?php echo $row->post_id;?>"><?php echo count($get_likedetails); ?></span>)&nbsp;&nbsp;<a href="#">Comment</a> <a href="#">Share</a> <a href="javascript:void(0)" onclick="saveAsFav('<?php echo $row->post_id;?>')"><span>Save As Favorite</span></a>
            </div>
           
          </div>
           
           
           
           
           
          <div class="clear">
          </div>
          </div>
          
          <!-- display all comments -->
          <div id="res_comments<?php echo $row->post_id;?>">
            <?php   
			       $comments_details = $this->customermodel->comments_data($row->post_id);
			       for($i=0;$i<count($comments_details);$i++){
				   // foreach($comments_details as $row_comment):
			       if($i<=4){ $com_user_data = $this->customermodel->profiledata($comments_details[$i]->commented_by); 	  $hrsago = $this->customermodel->get_time_difference_php($comments_details[$i]->commented_time);
?>
                    <div class="postComment">
                    <div class="img"> <img src="<?php echo base_url();?>uploads/<?php echo $com_user_data[0]->user_img_thumb ?>" alt="<?php echo base_url();?>uploads/<?php echo $image[0]->user_img_thumb ?>" height="60" width="55"></div>
                    <div><?php echo ucfirst($com_user_data[0]->user_firstname)."&nbsp;".ucfirst($com_user_data[0]->user_lastname);?><span>
			<?php /*if($hr_final<24){?><?php echo $hr_final;?>hr<?php }else{
				echo  str_replace("-"," ",$days)."days ago";
			}*/ echo $hrsago; ?></span><br /> <?php  echo $comments_details[$i]->comment_content;
			         ?></div>
                   
                   
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
             
           <div id="res_comments_viewmore<?php echo $row->post_id;?>" style="display:none;">
            <?php   
			       $comments_details = $this->customermodel->comments_data($row->post_id);
			       foreach($comments_details as $row_comment):
			?>
                    <div class="postComment">
                    <div class="img"><img src=" <img src="<?php echo base_url();?>uploads/<?php echo $image[0]->user_img_thumb ?>" alt="<?php echo base_url();?>uploads/<?php echo $image[0]->user_img_thumb ?>" height="60" width="55"></div>
            
                    <?php echo $row_comment->comment;
			         ?>
                   
                   </div>
			<?php 
				  endforeach;
		    ?>
          </div>  
             
          <!-- display comments code ends here -->
          
          
          <div class="postComment">
            <div class="img"> <img src="<?php echo base_url();?>uploads/<?php echo $image[0]->user_img_thumb ?>" alt="<?php echo base_url();?>uploads/<?php echo $image[0]->user_img_thumb ?>" height="60" width="55"></div>
           <form action="<?php echo base_url();?>signg_in/write_comment" method="post" style="width:100% !important;">
               <input type="text" class="form-control comment" placeholder="Write a Comment..." name="write_comment" id="write_comment">
               <input type="hidden" name="post_id" value="<?php echo $row->post_id;?>">
               <input type="hidden" name="posted_by" value="<?php echo $row->posted_by;?>">
           </form>
          </div>
          
          
          
          
        </article>
       
	 
	  
	 <?php  endforeach;
	  		endif;
	  ?>
      
      <!-- code ends here by 23-02-2015-->
     
        <!--<article>
          <figure><img src="<?php echo base_url(); ?>images/post_writer.png" alt=""></figure>
          <div class="content">
            <h3 class="pw">James Smith<span>2hr</span></h3>
            <p>It has been a privilege working with Jhon Smithat PayPal. His keen eye for detail, problem solving skills and excellent communication were an asset to the entire engineering team. He has been excellent at ensuring projects roll out not only on time...<a href="#">more</a></p>
            <div class="links"> <a href="#">Like<span>&nbsp;(15)</span></a> <a href="#">Comment</a> <a href="#">Share</a> <a href="#">Save As Favorite</a> </div>
            <div class="clear"></div>
          </div>
          <div class="postComment">
            <div class="img"><img src="<?php echo base_url(); ?>images/user.png" alt=""></div>
            <textarea cols="" rows="" class="form-control" placeholder="Write a Comment..."></textarea>
          </div>
        </article>
        <article>
          <figure><img src="<?php echo base_url(); ?>images/post_writer.png" alt=""></figure>
          <div class="content">
            <h3 class="pw">James Smith<span>2hr</span></h3>
            <p>It has been a privilege working with Jhon Smithat PayPal. His keen eye for detail, problem solving skills and excellent communication were an asset to the entire engineering team. He has been excellent at ensuring projects roll out not only on time...<a href="#">more</a></p>
            <div class="links"> <a href="#">Like<span>&nbsp;(15)</span></a> <a href="#">Comment</a> <a href="#">Share</a> <a href="#">Save As Favorite</a></div>
            <div class="clear"></div>
          </div>
          <div class="postComment">
            <div class="img"><img src="<?php echo base_url(); ?>images/user.png" alt=""></div>
            <textarea cols="" rows="" class="form-control" placeholder="Write a Comment..."></textarea>
          </div>
        </article>
        <article>
          <figure><img src="<?php echo base_url(); ?>images/post_writer.png" alt=""></figure>
          <div class="content">
            <h3 class="pw">James Smith<span>2hr</span></h3>
            <p>It has been a privilege working with Jhon Smithat PayPal. His keen eye for detail, problem solving skills and excellent communication were an asset to the entire engineering team. He has been excellent at ensuring projects roll out not only on time...<a href="#">more</a></p>
            <div class="links"> <a href="#">Like<span>&nbsp;(15)</span></a> <a href="#">Comment</a> <a href="#">Share</a> <a href="#">Save As Favorite</a></div>
            <div class="clear"></div>
          </div>
          <div class="postComment">
            <div class="img"><img src="<?php echo base_url(); ?>images/user.png" alt=""></div>
            <textarea cols="" rows="" class="form-control" placeholder="Write a Comment..."></textarea>
          </div>
        </article>
        <article>
          <figure><img src="<?php echo base_url(); ?>images/post_writer.png" alt=""></figure>
          <div class="content">
            <h3 class="pw">James Smith<span>2hr</span></h3>
            <p>It has been a privilege working with Jhon Smithat PayPal. His keen eye for detail, problem solving skills and excellent communication were an asset to the entire engineering team. He has been excellent at ensuring projects roll out not only on time...<a href="#">more</a></p>
            <div class="links"> <a href="#">Like<span>&nbsp;(15)</span></a> <a href="#">Comment</a> <a href="#">Share</a> <a href="#">Save As Favorite</a></div>
            <div class="clear"></div>
          </div>
          <div class="postComment">
            <div class="img"><img src="<?php echo base_url(); ?>images/user.png" alt=""></div>
            <textarea cols="" rows="" class="form-control" placeholder="Write a Comment..."></textarea>
          </div>
        </article>
        <article>
          <figure><img src="<?php echo base_url(); ?>images/post_writer.png" alt=""></figure>
          <div class="content">
            <h3 class="pw">James Smith<span>2hr</span></h3>
            <p>It has been a privilege working with Jhon Smithat PayPal. His keen eye for detail, problem solving skills and excellent communication were an asset to the entire engineering team. He has been excellent at ensuring projects roll out not only on time...<a href="#">more</a></p>
            <div class="links"> <a href="#">Like<span>&nbsp;(15)</span></a> <a href="#">Comment</a> <a href="#">Share</a> <a href="#">Save As Favorite</a></div>
            <div class="clear"></div>
          </div>
          <div class="postComment">
            <div class="img"><img src="<?php echo base_url(); ?>images/user.png" alt=""></div>
            <textarea cols="" rows="" class="form-control" placeholder="Write a Comment..."></textarea>
          </div>
        </article>
        <article>
          <figure><img src="<?php echo base_url(); ?>images/post_writer.png" alt=""></figure>
          <div class="content">
            <h3 class="pw">James Smith<span>2hr</span></h3>
            <p>It has been a privilege working with Jhon Smithat PayPal. His keen eye for detail, problem solving skills and excellent communication were an asset to the entire engineering team. He has been excellent at ensuring projects roll out not only on time...<a href="#">more</a></p>
            <div class="links"> <a href="#">Like<span>&nbsp;(15)</span></a> <a href="#">Comment</a> <a href="#">Share</a> <a href="#">Save As Favorite</a></div>
            <div class="clear"></div>
          </div>
          <div class="postComment">
            <div class="img"><img src="<?php echo base_url(); ?>images/user.png" alt=""></div>
            <textarea cols="" rows="" class="form-control" placeholder="Write a Comment..."></textarea>
          </div>
        </article>-->
      </div>
    </section>
