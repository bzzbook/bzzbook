<?php $this->load->view('header.php');?>
<section class="mainNav">
  <div class="container">
    <nav class="navbar navbar-static" id="navbar-example">
      <div class="container-fluid">
        <div class="navbar-header">
          <button data-target=".bs-example-js-navbar-collapse" data-toggle="collapse" type="button" class="navbar-toggle collapsed"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
          <a href="#" class="navbar-brand">Menu</a> </div>
        <div class="collapse navbar-collapse bs-example-js-navbar-collapse">
          <ul class="nav navbar-nav">
            <li> <a  href="<?php echo base_url(); ?>profile/post">Profile</a></li>
            <li> <a  href="<?php echo base_url(); ?>profile/about_me">About Me</a></li>
            <li> <a  href="#">My Friends</a></li>
            <li> <a  href="#">My Photos</a></li>
            <li> <a  href="<?php echo base_url(); ?>profile/business_details">My Business Details</a></li>
            <li> <a  href="#">My Companies</a></li>
          </ul>
          <div class="pull-right viewAs">
            <p>Viewing as:</p>
            <select class="form-control" >
              <optgroup label="Your Personal Profile">
              <option>Jhon Smith</option>
              </optgroup>
              <optgroup label="Your Companies">
              <option data-to-proile-type="Company"> Ayatas technologies </option>
              </optgroup>
            </select>
          </div>
        </div>
        <!-- /.nav-collapse --> 
      </div>
      <!-- /.container-fluid --> 
    </nav>
  </div>
</section>
<section class="midbody container">
  <div class="row">
    <section class="col-lg-3 col-md-3 col-sm-4 col-xs-12 coloumn1">
      <aside>
        <div class="profile">
          <div class="img"><img src="<?php echo base_url(); ?>images/user.png" alt=""></div>
          <div class="details">Jhon Smith....<a href="<?php echo base_url(); ?>profile/profile_set">Edit Profile</a><span>Sr. UI Developer at Company</span></div>
          <div class="clear"></div>
        </div>
        <div class="sideNav">
          <ul>
              <li><a href="<?php echo base_url(); ?>profile/message">Messages <span>5</span></a></li>
            <li><a href="#">Buzzers ! <span>20</span></a></li>
            <li><a href="<?php echo base_url(); ?>profile/groups">My Groups</a></li>
            <li><a href="<?php echo base_url(); ?>profile/jobs">My Jobs</a></li>
            <li><a href="<?php echo base_url(); ?>profile/events">My Events</a></li>
            <li><a href="#">My Companies</a></li>
            <li><a href="#">Photos &amp; Videos</a></li>
            <li><a href="#">Favorites</a></li>
          </ul>
        </div>
        <div class="myPhotos">
          <h3>Favorites Board!</h3>
          <ul>
            <li><a href="#"><img src="<?php echo base_url(); ?>images/p1.png" alt=""></a></li>
            <li><a href="#"><img src="<?php echo base_url(); ?>images/p2.png" alt=""></a></li>
            <li><a href="#"><img src="<?php echo base_url(); ?>images/p1.png" alt=""></a></li>
            <li><a href="#"><img src="<?php echo base_url(); ?>images/p2.png" alt=""></a></li>
            <li><a href="#"><img src="<?php echo base_url(); ?>images/p1.png" alt=""></a></li>
            <li><a href="#"><img src="<?php echo base_url(); ?>images/p2.png" alt=""></a></li>
            <li><a href="#"><img src="<?php echo base_url(); ?>images/p1.png" alt=""></a></li>
            <li><a href="#"><img src="<?php echo base_url(); ?>images/p2.png" alt=""></a></li>
            <li><a href="#"><img src="<?php echo base_url(); ?>images/p1.png" alt=""></a></li>
          </ul>
          <div class="clear"></div>
        </div>
        <div class="joinMailList">
          <h3>Invite someone to join!</h3>
          <p>Invite your friends to Bzzbook!</p>
          <?php $attributes = array('class' => 'email', 'id' => 'email_invite', 'name' => 'invite_email'); ?>
          <?php echo form_open('customer/send_invite',$attributes) ?>
          <input type="text" class="form-control" placeholder="Email Address"  name="email" placeholder="E-mail"  
          data-rule-required="true" data-msg-required="please enter your email"  
          data-rule-email="true" data-msg-email="please enter a valid email address">
          <input type="submit" class="submit" name="submit" value="Send" >
          <?php echo form_close() ?>
        </div>
      </aside>
      <div class="ad"><img src="<?php echo base_url(); ?>images/ad1.png"></div>
    </section>
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
    <section class="col-lg-3 col-md-3 col-sm-3 col-xs-12 coloumn3">
      <aside>
        <div class="pendingRequest">
          <h3>Pending Friend Requests </h3>
          <ul>
            <li>
              <figure><img src="<?php echo base_url(); ?>images/f1.jpg" alt=""></figure>
              <div class="disc">
                <h4>Nicholos smith</h4>
                <div class="dcBtn"><a href="#">Confirm</a><a href="#">Deny</a> </div>
                </div>
            </li>
            <li>
              <figure><img src="<?php echo base_url(); ?>images/f2.jpg" alt=""></figure>
              <div class="disc">
                <h4>Nicholos smith</h4>
                <a href="#">Confirm</a><a href="#">Deny</a> </div>
            </li>
          </ul>
          <a href="#" class="link">View all</a> </div>
        <div class="latestFriends">
          <h3>Latest Friends</h3>
          <ul>
            <li><img alt="" src="<?php echo base_url(); ?>images/fd1.png"><a href="#"><img src="<?php echo base_url(); ?>images/like.png" alt=""></a></li>
            <li><img alt="" src="<?php echo base_url(); ?>images/p2.png"><a href="#"><img src="<?php echo base_url(); ?>images/like.png" alt=""></a></li>
            <li><img alt="" src="<?php echo base_url(); ?>images/fd2.png"><a href="#"><img src="<?php echo base_url(); ?>images/like.png" alt=""></a></li>
            <li><img alt="" src="<?php echo base_url(); ?>images/fd3.png"><a href="#"><img src="<?php echo base_url(); ?>images/like.png" alt=""></a></li>
            <li><img alt="" src="<?php echo base_url(); ?>images/p1.png"><a href="#"><img src="<?php echo base_url(); ?>images/like.png" alt=""></a></li>
            <li><img alt="" src="<?php echo base_url(); ?>images/fd4.png"><a href="#"><img src="<?php echo base_url(); ?>images/like.png" alt=""></a></li>
          </ul>
          <div class="clear"></div>
          <a href="#" class="link">More Friends</a> </div>
        <div class="ad"><img src="<?php echo base_url(); ?>images/ad2.png" alt=""></div>
        <div class="companies">
          <h3>Companies I’m Following! </h3>
          <ul>
            <li>
              <figure><img src="<?php echo base_url(); ?>images/cp1.png" alt=""></figure>
              <div class="content">
                <h4>Ayatas technologies</h4>
                <p><span>Computer Software</span> <span>Established in: 2007</span> <span>Employees: 26</span> </p>
                <a href="#">Like <span>(2)</span></a> <a href="#">Follow <span>(20)</span></a> </div>
            </li>
          </ul>
        </div>
        <div class="ad"><img src="<?php echo base_url(); ?>images/ad2.png" alt=""></div>
        <div class="companies">
          <h3>My Companies </h3>
          <ul>
            <li>
              <figure><img src="<?php echo base_url(); ?>images/cp2.png" alt=""></figure>
              <div class="content">
                <h4>Ayatas technologies</h4>
                <p><span>Computer Software</span> <span>Established in: 2007</span> <span>Employees: 26</span> </p>
                <a href="#">Like <span>(2)</span></a> <a href="#">Follow <span>(20)</span></a> </div>
            </li>
          </ul>
        </div>
      </aside>
    </section>
  </div>
</section>
<?php $this->load->view('footer.php');
?>


