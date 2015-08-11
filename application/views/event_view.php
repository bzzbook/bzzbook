<?php //session_start();
	  if(empty($user_id))
	  $curr_user_id = $this->session->userdata('logged_in')['account_id'];
	  else
	  $curr_user_id = $user_id; 
	  $curr_user_data= $this->customermodel->profiledata($curr_user_id);
	  $_SESSION['username'] = $curr_user_data[0]->username; // Must be already set
	 // echo $curr_user_data[0]->username;
     $image = $this->profile_set->get_profile_pic($curr_user_id);	
	
 if($event){ $get_profiledata = $this->customermodel->profiledata($event->event_created_by);
 			 $no_of_invites = $this->eventmodel->get_noofinvites($event->event_id);
			 $no_of_going = $this->eventmodel->get_noofgoing($event->event_id);
			 $no_of_maybe = $this->eventmodel->get_noofmaybe($event->event_id);
		
			  $event_suggestions = $this->eventmodel->user_event_suggestions();
			

  ?>
<section class="col-lg-9 col-md-9 nopad">
      <div class="col-xs-12 ProfileView inr_baner">
        <section class="visitorBox">
          <div class="visitiBoxInner">
          <div class="change_event">
           <?php if($curr_user_id!=$event->event_created_by) ?> <a href="javascript:void(0);" onclick="javascript:document.getElementById('event_banner').click()"><span aria-hidden="true" class="glyphicon glyphicon-camera change-photo"><em>Change Event Photo</em></span></a>
           
           
           
            </div>
             <?php $attr = array('id' => 'upload_event_banner', 'name' => 'upload_event_banner'); ?> 
              <?php echo form_open_multipart('events/event_banner_upload',$attr);?>
              
              <input type="hidden" name="event_id" value="<?php echo $event->event_id; ?>" />
              <input type="file" name="userfile"  id="event_banner" style="display:none;" />
            
              
              
              </form>
            <figure class="compCover_innside"><img class="img-responsive" src="<?php echo base_url(); ?>uploads/<?php if(!empty($event->event_banner)) echo $event->event_banner; else echo 'about_banner.jpg'; ?>" alt=""></figure>
            <div class="textbox_banner"><p><?php echo date('M',strtotime($event->event_date)); ?></p><span><?php echo date('d',strtotime($event->event_date)); ?></span>
            <h3><?php echo $event->event_name; ?></h3>
            </div>
            
            <div class="ProfileViewNav">
            <div class="banner_inerfields ">
      <div class="col-md-6 colorbox">
        <p> <i class="fa fa-envelope-o"></i>Private · Hosted by <a href="<?php echo base_url().'profile/user/'.$get_profiledata[0]->user_id; ?>"><?php echo ucfirst($get_profiledata[0]->user_firstname)."&nbsp;".ucfirst($get_profiledata[0]->user_lastname);?></a></p>
      </div>
      <div class="col-md-6 colorbox">
       <div class="col-md-6 hostings"><div class="event-btns event-btns<?php echo $event->event_id; ?> event-btns-right" id="eventBtns<?php echo $event->event_id; ?>"> 
             	  <?php if($event->event_created_by==$curr_user_id) {?>
                  <div  class="invitebtn  invite_friends_modal" id="user_events<?php  echo $event->event_id;  ?>"><i class="fa fa-envelope-o "></i>  Invite</div><div id="event_edit<?php echo $event->event_id; ?>" class="invitebtn user_event_edit"><i class="fa fa-pencil-square-o "></i>  Edit</div>
                  <?php }else{ if(!$event->invitation_status){ ?>
                  
                  <input type="button" value="Decline" class="gngSts adings" onclick="updateGoingStatus(<?php echo $event->event_id; ?>,3)"><input type="button" value="Maybe" class="gngSts adings" onclick="updateGoingStatus(<?php echo $event->event_id; ?>,2)"><input type="button" value="Join" class="gngSts adings" onclick="updateGoingStatus(<?php echo $event->event_id; ?>,1)">
                  
                  <?php }else{ ?> <label><select id="goingsts<?php echo $event->event_id; ?>" name="goingsts<?php echo $event->event_id; ?>" onchange="updateGoingStatus(<?php echo $event->event_id; ?>)" ><option value="1" <?php if($event->invitation_status==1) echo "selected='selected'"; ?>>Going</option><option value="2" <?php if($event->invitation_status==2) echo "selected='selected'"; ?>>Maybe</option><option value="3" <?php if($event->invitation_status==3) echo "selected='selected'"; ?>>Not going</option></select></label> <?php } } ?>
                  </div></div>
        
        
        
      </div>
      </div>
            </div>
          </div>
        </section>
      </div>
      
      <div class="clearfix"></div>
      <section class="col-lg-8 col-md-6 col-sm-5 col-xs-12 coloumn2">
      
      <div class="posts">
          <!--<div class="new_events">
            <div class="col-md-1"> <i class="fa fa-clock-o"></i></div>
            <div class="col-md-10"><p><a href="">Today</a><span> <a href="">. Add a Time?</a></span></p></div>
          <div class="col-md-10">
         <p> <em>Happening Now</em>
         <a href=""> · 85°F Thunderstorm</a></p>
          </div>
            <div class="clearfix"></div>
          </div>-->
          <div class="new_events">
            <div class="col-md-1"> <i class="fa fa-map-marker"></i></div>
            <div class="col-md-8"><p><?php echo $event->event_location; ?></p></div>
            <div class="col-md-3"><p></p></div>
           <div class="clearfix"></div>
          </div>
          
          <div class="new_events">
            <div class="col-md-10"><p><?php echo $event->event_details; ?></p></div>
            <div class="clearfix"></div>
          </div>
          <h6>POSTS</h6>
          <div role="tabpanel"> 
          <!-- Nav tabs -->
 <ul role="tablist" class="nav nav-tabs">
 <li class="active" role="presentation"><a data-toggle="tab" role="tab" aria-controls="profile" href="#write" aria-expanded="true"><i class="fa fa-envelope-o"></i>Write Post</a></li>
<li role="presentation" class=""><a href="javascript:document.getElementById('uploaduserevent_Photos').click()"><i class="fa fa-file-photo-o"></i>Add Photo / Video</a></li>
     <!--  <li role="presentation" class=""><a data-toggle="tab" role="tab" aria-controls="settings" href="#ask" aria-expanded="false"><i class="fa fa-file-text-o"></i>Ask Question</a></li> -->
          </ul>
          <div id="uploadPhotoseventPreview" style=" margin:5px 5px 5px 5px;"></div><div id="tetsdiv" ></div>
          <!-- Tab panes -->
          <div class="tab-content">
            <div id="write" class="tab-pane active" role="tabpanel">	
             <div class="alltabboxes_events">
             
               <?php $attr = array('name' => 'event_post_form', 'id' =>'event_post_one', 'enctype'=>"multipart/form-data") ?>
        <?php echo form_open('events/send_event_post',$attr) ?>
            <textarea rows="4" cols="62" placeholder="Write Something" name="post_content"></textarea>
            <input type="hidden" name="event_id" value="<?php  echo $event->event_id;  ?>" />
              <div id="added_tag_frnds" >
            <div id="tag_frnd_wrapper_one">
          
             <input type="text" name="tag_search" id="tag_search"   
             onkeyup="tagkeyupeventone();" />
            
            <input type="hidden" id="added_tag_users" name="added_tag_users"  />	 
            <div id="tag_auto_suggest">
            </div>
            </div>
          </div>
            <input type="file" name="uploaduserevent_Photos[]" id="uploaduserevent_Photos" multiple="multiple" style="display:none;"/>
            <input type="hidden" name="uploaduserevent_Photos" value="uploaduserevent_Photos" />
            </form>
             
             <div class="bottom_fields">
             <div class="col-md-4">
             <div class="col-md-1"><a href="javascript:document.getElementById('uploaduserevent_Photos').click()" ><i class="fa fa-camera"></i></a></div>
             <div class="col-md-1"><a href="javascript:void(0);" onclick="showeventtaginput('added_tag_frnds','tag_search');"><i class="fa fa-user-plus"></i></a></div>
            <!-- <div class="col-md-1"><i class="fa  fa-meh-o"></i></div>
             <div class="col-md-1"><i class="fa  fa-map-marker"></i></div>
             -->
             </div>
             <div class="">
             <div class="col-md-6 meeting"><i class="fa fa-calendar"></i><?php echo $event->event_name; ?></div>
              <div class="col-md-2"><div class="btn3 btn-yellow ad_ing "><a href="javascript:{}" onclick="document.getElementById('event_post_one').submit(); return false;">Post</a></div></div>
             </div>
             <div class="clearfix"></div>
             </div>
              
            </div>
            </div>
            
            <div id="addphoto" class="tab-pane" role="tabpanel">
             <div class="alltabboxes_events">
             <textarea rows="4" cols="63" placeholder="say Something about this" name="posted_content_two"></textarea>
             
             <?php /*?>  <?php $attr = array('name' => 'event_post_form', 'id' =>'event_post_two', 'enctype'=>"multipart/form-data") ?>
        <?php echo form_open('events/send_event_post_two',$attr) ?>
           
            
            
            <input type="hidden" name="event_tagged_users" id="event_tagged_users" />
               <input type="hidden" name="event_id" value="<?php  echo $event->event_id;  ?>" />
            <div id="taggedfriends2" class="taggedfriends1">
             <input type="text" name="tagsearch2" id="tagsearchfriends2"  class="tagsearchfriends1" onkeyup="tagkeyupevent1('tagsearchfriends2','tagaddedusers2','tagautosuggest2');" />
             
             <input type="file" name="uploaduserevent_Photos1[]" id="uploaduserevent_Photos1" multiple="multiple" style="display:none;"/>
            <input type="hidden" name="uploaduserevent_Photos1" value="uploaduserevent_Photos1" />
             
            <div id="tag_frnd_wrapper2">
            <input type="hidden" id="tagaddedusers2" name="tagaddedusers2" class="tagaddedusers1"/>
            <div id="tagautosuggest2" class="tagautosuggest1">
            </div>
            </div>
          </div>
          <!--  <div class="event_tab">
            <a href=""><i class="fa  fa-plus"></i></a>
            </div>-->
            </form><?php */?>
             <div class="bottom_fields">
             <div class="col-md-4">
             <div class="col-md-1"><i class="fa fa-camera"></i></div>
             <div class="col-md-1"><i class="fa fa-user-plus"></i></div>
             <div class="col-md-1"><i class="fa  fa-meh-o"></i></div>
             <div class="col-md-1"><i class="fa  fa-map-marker"></i></div>
             
             </div>
             <div class="">
             <div class="col-md-6 meeting"><i class="fa fa-calendar"></i>Piligrims meet</div>
              <div class="col-md-2"><div class="btn3 btn-yellow ad_ing"></div></div>
             </div>
             <div class="clearfix"></div>
             </div>
              
            </div>
            </div>
            
            <div id="ask" class="tab-pane" role="tabpanel">
              <div class="alltabboxes_events">
                <form action="events">
            <textarea rows="4" cols="63" placeholder="Ask Something"></textarea>
                        </form>
                        <div class="bottom_fields">
             <div class="col-md-4 poll">
            <p><a href="">Add Poll Options</a></p>
             
             </div>
             <div class="">
             <div class="col-md-6 meeting"><i class="fa fa-calendar"></i>godavari pushkaralu</div>
              <div class="col-md-2"><div class="btn3 btn-yellow ad_ing">Post</div></div>
             </div>
             <div class="clearfix"></div>
             </div>
              </div>
            </div>
            
       
            <div id="hosting" class="tab-pane" role="tabpanel">
              <div class="alltabboxes">
                <div class="alltabimages"><img alt="" src="<?php echo base_url(); ?>images/pf_pic.png"></div>
                <p>Have friends over or plan a night out. </p>
                <p><a href="">Create an Event.</a></p>
              </div>
            </div>
          </div>
        </div>
        
        
        <div class="posts">
        
          <?php 
		    $user_id = $this->session->userdata('logged_in')['account_id'];
	  $products = $this->customermodel->All_event_posts($event->event_id);
	  if($products): ?>
      <h6>RECENT ACTIVITY</h6>
      <?php 
	  foreach( $products as $row):
	  $hrsago = $this->customermodel->get_time_difference_php($row->posted_time);
      $posted_id=$row->posted_by;
	  $get_profiledata = $this->customermodel->profiledata($posted_id);
	  if($row->tagged_users!='')
	  {
		  $tags = array();
		  $taggedusers = explode(',',$row->tagged_users);
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
         <article id="post<?php echo $row->event_post_id; ?>">
          <div class="pfInfo"> <a href="<?php echo base_url().'profile/user/'.$get_profiledata[0]->user_id; ?>" class="pfImg"><img src="<?php echo base_url(); ?>uploads/<?php if(!empty($get_profiledata[0]->user_img_thumb)) echo $get_profiledata[0]->user_img_thumb; else echo 'default_profile_pic.png'; ?>" alt=""></a>
            <div class="pfInfoDetails">
              <h5><span class="pfname"><a href="<?php echo base_url().'profile/user/'.$get_profiledata[0]->user_id; ?>"><?php echo ucfirst($get_profiledata[0]->user_firstname)."&nbsp;".ucfirst($get_profiledata[0]->user_lastname);?></a>
			  
			  <?php if($row->tagged_users!='') { 
			  echo ' with '; $tagcount=1; $totTags = count($tags);
			  foreach($tags as $tag){ 
			  if($totTags==$tagcount && $totTags!=1)
			  { ?>
				  <span class="taggednames"> and <a href="<?php echo base_url().'profile/user/'.$tag->user_id; ?>"><?php echo ucfirst($tag->user_firstname)."&nbsp;".ucfirst($tag->user_lastname);?></a> </span>
			  <?php break; }
			  if($tagcount>2){ 
			  echo ' and '.(count($tags)-2).' <div id="links"><a href="#" class="taggednames">others<span>'.$tagslist.'</span></a></div>';
			  break;
			  }
			  ?>
            <?php if($tagcount>1) echo ', ';  ?>
            <span class="taggednames"><a href="<?php echo base_url().'profile/user/'.$tag->user_id; ?>"><?php echo ucfirst($tag->user_firstname)."&nbsp;".ucfirst($tag->user_lastname);?></a> </span>
			  <?php  
			  $tagcount++; 
			  } 
			  }?> 
			 </span></h5>
              <a href="#" class="date"><?php  echo $hrsago; ?></a> </div>
          </div>
        
          <?php if(!empty($row->uploaded_files))
			 {
			 $up_files = explode(',',$row->uploaded_files);
			 $i = 0;
			 echo "<div class='fbphotobox'>";
			 foreach($up_files as $file)
			 {
				 if($i==0)
				 {
					 echo " 
    <a onclick='getPostComments(".$row->event_post_id.")'><img class='photo' fbphotobox-src='".base_url()."uploads/".$file."' src='".base_url()."uploads/".$file."' /></a>";
				 }
				 else
				 	 echo "<a onclick='getPostComments(".$row->event_post_id.")'><img class='photo' fbphotobox-src='".base_url()."uploads/".$file."' src='".base_url()."uploads/".$file."' style='width:24%;float:left;margin:.5%; height:83px'/></a>";
				 $i++;
			 }
			 echo "</div>";
			 echo "<div style='clear:both'></div>";
			 } ?> </figure>
<?php /*?>            <h3>The Interpreter-TranslatorFree - Android Apps on Google Play</h3>
<?php */?>            <div><?php $str_leng=strlen($row->posted_content);
			  if($str_leng>50){
				echo  "<div id='msg".$row->event_post_id."'>".$str_des=substr($row->post_content,0,250)."..."; ?><a href="javascript:void(0)" onclick="myfunc('<?php echo $row->event_post_id;?>')">more</a></div><div id='des<?php echo $row->event_post_id;?>' style="display:none"><?php echo $row->posted_content ?><a href="javascript:void(0)" onclick="myfunc('<?php echo $row->event_post_id;?>')">less</a></div><?php 
			 }else{
				echo  $str_des=substr($row->posted_content,0,250);
			 } ?></div>
             
          
        
          <div class="sharingLink" ><?php 
					$get_likedetails = $this->customermodel->eventlikedata($row->event_post_id);
					$current_user_like_data = $this->customermodel->currentusereventlikedata($row->event_post_id);
					if($current_user_like_data){
			       //	$user_id=$current_user_like_data[0]->liked_by;
//					$like=$get_likedetails[0]->like_status;
//					}
//					else
//					$like='';
//					 if(@$user_id == $user_id && $like=='Y'){
	?>
				<a href="javascript:void(0);" onclick="like_event_fun('<?php echo $row->event_post_id;?>','<?php echo $curr_user_id;?>',<?php echo count($get_likedetails); ?>)"  id="link_like<?php echo $row->event_post_id;?>" style="padding-right:0px;">Unlike
            <?php    
			}else{ ?>
				<a href="javascript:void(0);" onclick="like_event_fun('<?php echo $row->event_post_id;?>','<?php echo $curr_user_id;?>',<?php echo count($get_likedetails); ?>)"  id="link_like<?php echo $row->event_post_id;?>" style="padding-right:0px;">Like
			<?php }?></a><span id="like_count<?php echo $row->event_post_id;?>"><?php  $like_count = count($get_likedetails); if($like_count>0) echo '<img src="'.base_url().'images/like_myphotos.png" alt="">'.$like_count.'&nbsp;&nbsp;'; ?></span><a href="javascript:document.getElementById('write_comment<?php echo $row->event_post_id; ?>').focus()">Comment</a></div>
            <div id="res_comments<?php echo $row->event_post_id;?>">
            <?php   
			       $comments_details = $this->customermodel->event_comments_data($row->event_post_id);
				   
			       for($i=0;$i<count($comments_details);$i++){
				   // foreach($comments_details as $row_comment):
			       if($i<=4){ $com_user_data = $this->customermodel->profiledata($comments_details[$i]->commented_by);  $hrsago = $this->customermodel->get_time_difference_php($comments_details[$i]->commented_time);
?>
                   <div class="commentBox">
            <figure> <a href="<?php echo base_url().'profile/user/'.$com_user_data[0]->user_id; ?>"><img src="<?php echo base_url();?>uploads/<?php if(!empty($com_user_data[0]->user_img_thumb))echo $com_user_data[0]->user_img_thumb; else echo 'default_profile_pic.png'; ?>" alt="<?php echo base_url();?>uploads/<?php if(!empty($image[0]->user_img_thumb)) echo $image[0]->user_img_thumb; else echo 'default_profile_pic.png'; ?>"></a></figure>
            <div class="postAComment"> 
            	<div class="postACommentInner"><span class="pfname" style="color:#5A5998;"><a href="<?php echo base_url().'profile/user/'.$com_user_data[0]->user_id; ?>"><?php echo ucfirst($com_user_data[0]->user_firstname)."&nbsp;".ucfirst($com_user_data[0]->user_lastname);?></a></span> <span class="date" style="color:black;">
			<?php /*if($hr_final<24){?><?php echo $hr_final;?>hr<?php }else{
				echo  str_replace("-"," ",$days)."days ago";
			}*/ echo $comments_details[$i]->comment_content; ?></span><br /> <?php  $commentfiles = explode(',',$comments_details[$i]->uploadedfiles); if(!empty($comments_details[$i]->uploadedfiles)) { ?><div style="padding-top:15px;"><img width="200px" height="200px" src="<?php echo base_url();?>uploads/<?php echo $commentfiles[0]; ?>" /></div> <?php } ?><?php  echo $hrsago; 
			
					
			         ?> <?php $comment_likes = $this->customermodel->eventcommentlikedata($comments_details[$i]->postcomments_id);
					$current_user_com_like_data = $this->customermodel->currentusereventcommentlikedata($comments_details[$i]->postcomments_id);
					if($current_user_com_like_data){
		 
						 ?>
				<a href="javascript:void(0);" onclick="events_commentlikefun('<?php echo $comments_details[$i]->postcomments_id;?>','<?php echo $curr_user_id;?>',<?php echo count($comment_likes); ?>)"  id="cmt_link_like<?php echo $comments_details[$i]->postcomments_id;?>" style="padding-right:0px;">Unlike
            <?php    
			}else{?>
				<a href="javascript:void(0);" onclick="events_commentlikefun('<?php echo $comments_details[$i]->postcomments_id;?>','<?php echo $curr_user_id;?>',<?php echo count($comment_likes); ?>)"  id="cmt_link_like<?php echo $comments_details[$i]->postcomments_id;?>" style="padding-right:0px;">Like
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
            <a href="#" onclick="view_comments('<?php echo $row->event_post_id;?>')" style="font-size:12px;">View More</a>
            <?php } ?>
          </div>
          <div class="commentBox">
            <figure><img src="<?php echo base_url();?>uploads/<?php if(!empty($image[0]->user_img_thumb)) echo $image[0]->user_img_thumb; else echo 'default_profile_pic.png'; ?>" alt=""></figure>
            <div class="postAComment"> 
            	<div class="postACommentInner">
                           <form action="<?php echo base_url();?>signg_in/write_event_comment/<?php echo $row->event_post_id;?>" method="post" style="width:100% !important;" enctype="multipart/form-data" autocomplete="off">
            <a href="javascript:document.getElementById('uploadCommentPhotos<?php echo $row->event_post_id;?>').click();javascript:document.getElementById('write_comment<?php echo $row->event_post_id;?>').focus(); " class="upload"><span aria-hidden="true" class="glyphicon glyphicon-camera"></span></a>
 <input type="text" class="form-control comment" placeholder="Write a Comment..." name="write_comment" id="write_comment<?php echo $row->event_post_id; ?>">                             <input type="hidden" name="post_id" value="<?php echo $row->event_post_id;?>">
 												<input type="hidden" name="event_id" value="<?php echo $event->event_id;?>">
               <input type="hidden" name="posted_by" value="<?php echo $curr_user_id;?>">
               <input type="file" name="uploadCommentPhotos<?php echo $row->event_post_id;?>[]" id="uploadCommentPhotos<?php echo $row->event_post_id;?>" style="display:none;" />
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
          <!-- <div class="new_events">
            <div class="col-md-2 leftimg"><a href=""><img alt="" src="<?php echo base_url(); ?>images/fd1.png"></a></div>
            <div class="col-md-8"><textarea rows="2" cols="35" placeholder="Write a comment..."></textarea></div>
            <div class="col-md-2"><i class="fa fa-camera" data-toggle="tooltip" data-placement="top" title="test on top"></i> <i class="fa  fa-meh-o"></i></div>
            <div class="clearfix"></div>
          </div>
          
          <div class="new_events">
            <div class="col-md-2 leftimg"><a href=""><img alt="" src="<?php echo base_url(); ?>images/fd1.png"></a></div>
            <div class="col-md-8"><p><a href="">Siva Prasad</a><span> Created the event.</span></p></div>
            <div class="col-md-2 events_dropdown"><button id="btnGroupVerticalDrop2" type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> <span class="caret"></span> </button>
            <ul class="dropdown-menu" role="menu" aria-labelledby="btnGroupVerticalDrop4">
                            <li><a href="#">Turn off notifications</a></li>
                            <li><a href="#">Pin Post</a></li>
                          </ul>
            </div>
          <div class="col-md-6">
         <p> <em>18 hrs ·</em> </p>
          </div>
         <div class="clearfix"></div>
             <div class="bottom_textfelds">
             <div class="col-md-1"><a href="">Like</a></div>
             <div class="col-md-2"><a href="">Comment</a></div>
             </div>
            <div class="clearfix"></div>
          </div>
          <div class="new_events">
            <div class="col-md-2 leftimg"><a href=""><img alt="" src="<?php echo base_url(); ?>images/fd1.png"></a></div>
            <div class="col-md-8"><textarea rows="2" cols="35" placeholder="Write a comment..."></textarea></div>
            <div class="col-md-2"><i class="fa fa-camera" data-toggle="tooltip" data-placement="top" title="test on top"></i> <i class="fa  fa-meh-o"></i></div>
            <div class="clearfix"></div>
          </div> -->
      </div>
    </section>
    <section class="col-lg-4 col-md-3 col-sm-3 col-xs-12 coloumn3 nopad-right">
      <aside>
           <div class="pendingRequest tabnumbers">
             <figure class="going-pic"><a href="<?php echo base_url(); ?>profile/user/<?php echo $event->event_created_by; ?>"><img alt="" src="<?php echo base_url(); ?>uploads/<?php if(!empty($get_profiledata[0]->user_img_thumb)) echo $get_profiledata[0]->user_img_thumb; else echo 'default_profile_pic.png'; ?>"></a></figure><?php  if($no_of_going){$pic_count =1; foreach($no_of_going as $going){ if($pic_count>7) break; $frnd_image = $this->customermodel->profiledata($going->frnd_id);?> <figure class="going-pic"><a href="<?php echo base_url(); ?>profile/user/<?php echo $going->frnd_id; ?>"><img alt="" src="<?php echo base_url(); ?>uploads/<?php if(!empty($frnd_image[0]->user_img_thumb)) echo $frnd_image[0]->user_img_thumb; else echo 'default_profile_pic.png'; ?>"></a></figure><?php $pic_count++; } }?><div style="clear:both"></div>
             <div  class="going">
          <div class="col-md-4"><a href=""><?php if($no_of_going) echo count($no_of_going)+1; else{ echo '1'; } ?><p></p>Going</a></div>
             <div class="col-md-4"><a href=""><?php if($no_of_maybe) echo count($no_of_maybe); else{ echo '0'; } ?><p></p>Maybe</a></div>
                <div class="col-md-4"><a href=""><?php if($no_of_invites) echo count($no_of_invites); else { echo '0';} ?><p></p>invited</a></div>
                <div class="clearfix"></div>
                </div>
                <!--<div class="message">
                 <a href=""><i class="fa   fa-weixin"></i>Message Guests</a>
                 </div>-->
           </div>
        <div class="pendingRequest tabnumbers">
        <h3>Invite Friends</h3>
          <div class="input-group">
                <div class="input-group-addon"><i class="fa fa-plus"></i></div>
              
                <input type="text" id="invite_eve_friends_main" class="form-control" placeholder="Add friends to this events"  onkeyup="invite_event_frnds_main_search('invite_eve_friends_main','autosuggest_invite_frnds_main',<?php echo $event->event_id; ?>)">
                  <div id="autosuggest_invite_frnds_main">
                <input type="hidden" name="event_id" id="event_id"/>
         
       <!--   <input type="hidden" id="event_id_main" name="event_id_main" value="<?php echo $event->event_id; ?>"/>
       -->  <input type="hidden" id="invited_users_main" name="invited_users_main" />
                </div>
                <div id="send_invite_success" class="message"></div>
              </div>
              
                            
                <div class="friendslist">
                <ul id="invite_frnds">
               <?php $invite_frnds = $this->friendsmodel->user_frnds_by_id($limit = '4',$event->event_id);
			   //	print_r($invite_frnds);
			
                 if($invite_frnds) {
				
					foreach($invite_frnds as $in_frnds)
					{ ?>
                
                <li id="invites_list">
                <div class="col-md-3 friendsimg">
                <img alt="" src="<?php echo base_url(); ?>uploads/<?php echo $in_frnds[0]['user_img_thumb']; ?>"  style="width:32px; height:32px;">
                </div>
                <div class="col-md-8 names"><a href=""><?php echo $in_frnds[0]['user_firstname']." ".$in_frnds[0]['user_lastname']; ?></a></div>
                <div class="col-md-2 names"><button class="btn btn-primary btn-xs" id="invite_btn" onclick="send_invite(<?php echo $in_frnds[0]['user_id']; ?>,<?php echo $event->event_id; ?>);" type="button">Invite</button>
               
                </div>
                </li>
                
                <?php } } ?>
                               
                </ul>
                <p><a href="">show more friends</a></p>
                 </div>
           </div>
            <div class="pendingRequest tabnumbers" id="event_sugg_div">
         
             <?php
			 if($event_suggestions)
			 {
			  foreach($event_suggestions as $suggestion)
			 {
				 if($suggestion[0]['event_id'] != $this->uri->segment(3,0))
				 {
				 ?>
                 
          
                     <div class="thisweek" >
              <div class="col-md-2 event_pic">
              
              <a href="<?php echo base_url(); ?>profile/eventview/<?php echo $suggestion[0]['event_id']; ?>"><img alt="" class="event_sug_img" src="<?php echo base_url(); ?>uploads/<?php if(!empty($suggestion[0]['event_banner'])) echo $suggestion[0]['event_banner']; else echo 'default_profile_pic.png'; ?>"></a>
            
              </div>
              <div class="col-md-10 thisweek_sug_right">
              <h5><a href="<?php echo base_url('profile/eventview/'.$suggestion[0]['event_id']); ?>"><?php if($suggestion[0]['event_name'])  $name = character_limiter($suggestion[0]['event_name'],15); echo $name ; ?></a></h5>
 
              <p><a href=""><?php echo $suggestion[0]['event_location']; ?></a></p>
             <p> <?php $event_guests = $this->eventmodel->get_count_of_people($suggestion[0]['event_id']); if($event_guests) { echo " guests ".count($event_guests); } else echo "guests 0"?> </p>
             <div class="col-md-3" style="margin-left:-13px;"><p><a onclick="updateGoingStatus_frm_suggestions(<?php echo $suggestion[0]['event_id']; ?>,<?php echo $suggestion[0]['event_created_by']; ?>,1);">join</a></p></div><div class="col-md-3"><p style="width:50px!important;"><a onclick="updateGoingStatus_frm_suggestions(<?php echo $suggestion[0]['event_id']; ?>,<?php echo $suggestion[0]['event_created_by']; ?>,2)";> May be</a></p></div>
                  
              </div>
               <div class="clear"></div>
             </div>
            

            
            <?php }} }else { echo "No Event Suggestions are Available!..."; } ?>
            </div>
           
          <!----------anil------>
        
        
        
        
      </aside>
    </section>
    </section>
    <?php } ?> 	
  
    <div class="modal fade" id="event_invite_friends" tabindex="-1" role="dialog" aria-labelledby="myModalLabe" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div id="comperrormsg"></div>
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabe">
          Invite
        </h4>
      </div>
      <div class="modal-body">
        
        <form >
        
          
        
                   
           <div id="search_invited_frnd_wrapper" class="form-group">
         
         <input type="text" name="txtsearch" id="invite_eve_friends" class="form-control" onkeyup="invite_event_frnds('invite_eve_friends','invitedusers','autosuggest_invite_frnds');" />
          <input type="hidden" name="event_id" id="event_id"/>
         
         <input type="hidden" id="invitedusers" name="invitedusers" />
         
         <div id="autosuggest_invite_frnds">
         
         </div>
       </div>
        </form>
         <div class="invited col-md-7">
   
        <div class="invitebox" id="all_friends_invites" >
       <!-- <div class="col-md-2 invite_imge"><img src="<?php echo base_url(); ?>images/logo.png" alt=""></div>
        <div class="col-md-8">
        <h6>your name</h6>
        <p>visakhapatnam</p>
        </div>
        <div class="col-md-2"><img src="<?php echo base_url(); ?>images/round1.png" alt=""></div>
        <div class="clearfix"></div>-->
       </div>
        
     
       </div> 
      
        
           <div class="col-md-5 invites_right">
           <div class="col-md-10"><h5>Selected</h5></div>
            <div class="col-md-2">5</div>
            <div class="clearfix"></div>
            
             <div class="invite_right_small" id="invited_friends">
           
            </div>
         
            
           </div>
           <div class="clearfix"></div>
        <div class="publics col-md-12">
          <div class="btn3 btn-black" id="send_event_invitations">Send Invites</div>
          <div class="btn3 btn-green" data-dismiss="modal">Cancel</div>
        </div>
        <div class="clearfix"></div>
      </div>
    </div>
  </div>
</div>



<div class="modal fade" id="events_upcoming" tabindex="-1" role="dialog" aria-labelledby="myModalLabe" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div id="comperrormsg"></div>
      <div class="modal-header">
       <form name="event_form" id="event_form" action="<?php echo base_url(); ?>events/create_user_event" onsubmit="return validateCompanyForm();" method="post">
          
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabe"><select name="event_type"><option value="1">Create Private Event</option><option value="2">Create Public Event</option></select></h4>
      </div>
      <div class="modal-body">
       
          
          <div class="form-group">
            <label for="exampleInputEmail1">Name</label>
            <input type="text" class="form-control" name="event_name" id="event_name" placeholder="ex: Birthday Party">
          </div>
          <div class="form-group">
          <label fo"exampleInputEmail">Details</label>
          <input type="text" class="form-control" placeholder="Add more info" name="event_details" id="event_details">
          </div>
          <div class="located">
              <label for="exampleInputEmail1">Where</label>
              <div class="input-group">
                <div class="input-group-addon"><i class="fa fa-fw"></i></div>
                <input type="text" id="event_location" name="event_location" class="form-control" placeholder="Add a place?">
                <input type="hidden" name="user_event_action" id="user_event_action" value="add">
                 <input type="hidden" value="" name="event_form_id" id="user_event_form_id">
              </div>
            </div>
            
             <div class="located">
             
              <div class="col-md-4 upcalender">
               <label for="exampleInputEmail1">When</label>
               <div class="input-group">
                <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                <input type="text" class="form-control" id="datepicker" name="event_date" placeholder="6-15-2015">
              </div>
              </div>
                <div class="col-md-4">
                <label for="exampleInputEmail1">&nbsp;</label>
                <?php /*?><input type="text" class="form-control" placeholder="Add a time"><?php */?> 
                <select name="event_time" id="timepicker" class="form-control" style="border:1px solid #ccc !important; color: #909090 !important;"><option value="-1">Pick a time</option><?php for($i=0;$i<24;$i++) echo "<option value='".$i.":00'>".$i.":00</option>" ?></select>
                </div>
           
            </div>
            <div class="clearfix"></div>
         <!-- <div class="Works">
              <input type="checkbox" class="outside">
              <span>Guests can invite friends</span> </div>
         
          <div class="col-md-1"><i class="fa fa-calendar"></i></div>
          <div class="col-md-11 coming_even">
          <p>You're creating a private event.</p>
          <span>Only people invited by hosts or guests can see this.</span>
          </div>-->
          
       
      
        <div class="publics col-md-12">
        <a class="event_delete_link" href="javascript:void(0);" onclick="delete_user_event();">Cancel Event</a>
            <div class="btn3 btn-black" id="event_cr_btn" onclick="document.getElementById('event_form').submit();">Create</div>
              <div class="btn3 btn-black" id="event_edit_btn" onclick="document.getElementById('event_form').submit();" style="display:none">Update</div>
            <div class="btn3 btn-green" data-dismiss="modal">cancel</div>
          </div>
          </div>
           </form>
        <div class="clearfix"></div>
      </div>
    </div>
  </div>

 <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
 <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script>
  $(function() {
    $( "#datepicker" ).datepicker({ dateFormat: 'yy-mm-dd', });
	$('#datepicker').css("z-index","0");
	
  });
</script>