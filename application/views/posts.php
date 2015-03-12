    <section class="col-lg-6 col-md-6 col-sm-5 col-xs-12 coloumn2">
      <div class="updateStatus" id="updateStatus">
        <ul>
          <li><img src="<?php echo base_url(); ?>images/user.png" alt=""></li>
          <li><a href="#">Create a Post</a></li>
          <li><a href="#">Upload Photos/Video</a></li>
          <li><a href="#">Create Photo/Video Album</a></li>
        </ul>
        <?php $attr = array('name' => 'post_form', 'id' =>'my_form') ?>
        <?php 
		echo form_open('signg_in/send_post',$attr) ?>
        <textarea cols="" rows="" name="posts" class="form-control" placeholder="What's Buzzing?"></textarea>
        <div class="updateControls"> <a href="javascript:{}" onclick="document.getElementById('my_form').submit(); return false;">Post</a> <a href="#">Public</a> </div>
        <?php echo form_close(); ?>
        <div class="clear"></div>
      </div>
     <div class="posts">
      
      <!-- code added by 23-02-2015-->
      <?php 
	  
	  $products = $this->customermodel->All_Posts();
	  foreach( $products as $row):
	  $hrs=$row->post_date;
	  $currt_hrs=date('Y-m-d H:i:s');
      $timestamp1 = strtotime($hrs);
      $timestamp2 = strtotime($currt_hrs);
      $hour = abs($timestamp2 - $timestamp1)/(60*60);
      $hr_final=round($hour);
	  
	  
	  
	  $seconds = $timestamp1 - time();

      $days = floor($seconds / 86400);
      $seconds %= 86400;

      $hours = floor($seconds / 3600);
      $seconds %= 3600;

      $minutes = floor($seconds / 60);
      $seconds %= 60;
	  
	  $posted_id=$row->posted_by;
	  $get_profiledata = $this->customermodel->profiledata($posted_id);
	  
	  $user_id=$this->session->userdata['logged_in']['account_id'];
	  	  
	  ?>
	
	   <article>
          <figure><img src="<?php echo base_url(); ?>images/post_writer.png" alt=""></figure>
          <div class="content" id="content">
            <h3 class="pw"><?php echo ucfirst($get_profiledata[0]->firstname)."&nbsp;".ucfirst($get_profiledata[0]->lastname);?><span>
			<?php if($hr_final<24){?><?php echo $hr_final;?>hr<?php }else{
				echo  str_replace("-"," ",$days)."days ago";
			}?></span></h3>
            <p id="msg<?php echo $row->id;?>"><?php
		     $str_leng=strlen($row->post_content);
			 if($str_leng>50){
				echo  $str_des=substr($row->post_content,0,50)."...";?><a href="#" onclick="myfunc('<?php echo $row->id;?>')">more</a><?php 
			 }else{
				echo  $str_des=substr($row->post_content,0,50);
			 }
			?></p>
             <p id="des<?php echo $row->id;?>" style="display:none;"><?php echo $row->post_content;?></p>
            <div class="links">
            <?php   $get_likedetails = $this->customermodel->likedata($row->id);
					if(sizeof($get_likedetails)>0):
			       	$account_id=$get_likedetails[0]->account_id;
					$like=$get_likedetails[0]->like;
					endif;
			?>
            
            
             
        <div id="like_ajax<?php echo $row->id;?>">
            <?php if(@$account_id == $user_id && $like=='yes'){?>
				<a href="javascript:void(0);" onclick="likefun('<?php echo $row->id;?>','<?php echo $row->posted_by;?>','unlike')"  id="link_like<?php echo $row->id;?>" style="padding-right:0px;">Unlike
            <?php    
			}else{?>
				<a href="javascript:void(0);" onclick="likefun('<?php echo $row->id;?>','<?php echo $row->posted_by;?>','like')"  id="link_like<?php echo $row->id;?>" style="padding-right:0px;">Like
			<?php }?></a><span>(<?php echo count($get_likedetails); ?>)</span>&nbsp;&nbsp;<a href="#">Comment</a> <a href="#">Share</a> <a href="#">Save As Favorite</a>
            </div>
           
          </div>
           
           
           
           
           
          <div class="clear">
          </div>
          </div>
          
          <!-- display all comments -->
          <div id="res_comments<?php echo $row->id;?>">
            <?php   
			       $comments_details = $this->customermodel->comments_data($row->id);
			       for($i=0;$i<count($comments_details);$i++){
				   // foreach($comments_details as $row_comment):
			       if($i<=4){?>
                    <div class="postComment">
                    <div class="img"><img src="<?php echo base_url(); ?>images/user.png" alt=""></div>
                    <?php  echo $comments_details[$i]->comment;
			         ?>
                   
                   </div>
			<?php 
				   }
				   }
				   
				   // endforeach;
		    ?>
            <?php if(count($comments_details)>4){ ?>
            <a href="#" onclick="view_comments('<?php echo $row->id;?>')" style="font-size:12px;">View More</a>
            <?php } ?>
          </div>
             
           <div id="res_comments_viewmore<?php echo $row->id;?>" style="display:none;">
            <?php   
			       $comments_details = $this->customermodel->comments_data($row->id);
			       foreach($comments_details as $row_comment):
			?>
                    <div class="postComment">
                    <div class="img"><img src="<?php echo base_url(); ?>images/user.png" alt=""></div>
            
                    <?php echo $row_comment->comment;
			         ?>
                   
                   </div>
			<?php 
				  endforeach;
		    ?>
          </div>  
             
          <!-- display comments code ends here -->
          
          
          <div class="postComment">
            <div class="img"><img src="<?php echo base_url(); ?>images/user.png" alt=""></div>
           <form action="<?php echo base_url();?>signg_in/write_comment" method="post" style="width:100% !important;">
               <input type="text" class="form-control comment" placeholder="Write a Comment..." name="write_comment" id="write_comment">
               <input type="hidden" name="post_id" value="<?php echo $row->id;?>">
               <input type="hidden" name="posted_by" value="<?php echo $row->posted_by;?>">
           </form>
          </div>
          
          
          
          
        </article>
       
	 
	  
	 <?php  endforeach;
	  
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
