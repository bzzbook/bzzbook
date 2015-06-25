<?php 
$curr_user_id = $this->session->userdata('logged_in')['account_id'];

 if($event){ $get_profiledata = $this->customermodel->profiledata($event->event_created_by);
 			 $no_of_invites = $this->eventmodel->get_noofinvites($event->event_id);
			 $no_of_going = $this->eventmodel->get_noofgoing($event->event_id);
			 $no_of_maybe = $this->eventmodel->get_noofmaybe($event->event_id);
  ?>
<section class="col-lg-9 col-md-9 nopad">
      <div class="col-xs-12 ProfileView inr_baner">
        <section class="visitorBox">
          <div class="visitiBoxInner">
          <div class="change_event">
           <?php if($curr_user_id!=$event->event_created_by) ?> <a href="#"><span aria-hidden="true" class="glyphicon glyphicon-camera change-photo"><em>Change Event Photo</em></span></a>
            </div>
            <figure class="compCover_innside"><img class="img-responsive" src="<?php echo base_url(); ?>images/about_banner.jpg" alt=""></figure>
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
                  <div data-target="#events_upcoming" data-toggle="modal" class="invitebtn"><i class="fa fa-envelope-o "></i>  Invite</div><div data-target="" data-toggle="modal" class="invitebtn"><i class="fa fa-pencil-square-o "></i>  Edit</div>
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
<li role="presentation" class=""><a data-toggle="tab" role="tab" aria-controls="messages" href="#addphoto" aria-expanded="false"><i class="fa fa-file-photo-o"></i>Add Photo / Video</a></li>
       <li role="presentation" class=""><a data-toggle="tab" role="tab" aria-controls="settings" href="#ask" aria-expanded="false"><i class="fa fa-file-text-o"></i>Ask Question</a></li>
          </ul>
          
          <!-- Tab panes -->
          <div class="tab-content">
            <div id="write" class="tab-pane active" role="tabpanel">
             <div class="alltabboxes_events">
            <form action="events">
            <textarea rows="4" cols="63" placeholder="Write Something"></textarea>
            </form>
             <div class="bottom_fields">
             <div class="col-md-4">
             <div class="col-md-1"><i class="fa fa-camera"></i></div>
             <div class="col-md-1"><i class="fa fa-user-plus"></i></div>
             <div class="col-md-1"><i class="fa  fa-meh-o"></i></div>
             <div class="col-md-1"><i class="fa  fa-map-marker"></i></div>
             
             </div>
             <div class="">
             <div class="col-md-6 meeting"><i class="fa fa-calendar"></i>Piligrims meet</div>
              <div class="col-md-2"><div class="btn3 btn-yellow ad_ing">Post</div></div>
             </div>
             <div class="clearfix"></div>
             </div>
              
            </div>
            </div>
            
            <div id="addphoto" class="tab-pane" role="tabpanel">
             <div class="alltabboxes_events">
            <form action="events">
            <textarea rows="4" cols="63" placeholder="say Something about this"></textarea>
            <div class="event_tab">
            <a href=""><i class="fa  fa-plus"></i></a>
            </div>
            </form>
             <div class="bottom_fields">
             <div class="col-md-4">
             <div class="col-md-1"><i class="fa fa-camera"></i></div>
             <div class="col-md-1"><i class="fa fa-user-plus"></i></div>
             <div class="col-md-1"><i class="fa  fa-meh-o"></i></div>
             <div class="col-md-1"><i class="fa  fa-map-marker"></i></div>
             
             </div>
             <div class="">
             <div class="col-md-6 meeting"><i class="fa fa-calendar"></i>Piligrims meet</div>
              <div class="col-md-2"><div class="btn3 btn-yellow ad_ing">Post</div></div>
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
        
        <h6>RECENT ACTIVITY</h6>
        <div class="new_events">
            <div class="col-md-2 leftimg"><a href=""><img alt="" src="<?php echo base_url(); ?>images/fd1.png"></a></div>
            <div class="col-md-8"><p><a href="">Siva Prasad</a><span> updated the event photo.</span></p></div>
            <div class="col-md-2 events_dropdown"><button id="btnGroupVerticalDrop2" type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> <span class="caret"></span> </button>
            <ul class="dropdown-menu" role="menu" aria-labelledby="btnGroupVerticalDrop4">
                            <li><a href="#">Turn off notifications</a></li>
                            <li><a href="#">Pin Post</a></li>
                            <li><a href="#">Edit Post</a></li>
                            <li><a href="#">Delet Post</a></li>
                            <li><a href="#">Hide Post</a></li>
                          </ul>
            </div>
          <div class="col-md-6">
         <p> <em>18 hrs ·</em> </p>
          </div>
          <div class="col-md-12 neweventimage">
             <img src="<?php echo base_url(); ?>images/f1.jpg" alt="">
             </div>
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
          </div>
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
                <input type="text" id="exampleInputAmount" class="form-control" placeholder="Add friends to this events">
              </div>
                <div class="friendslist">
                <ul>
                <li>
                <div class="col-md-3 friendsimg">
                <img alt="" src="<?php echo base_url(); ?>images/f1.jpg">
                </div>
                <div class="col-md-8 names"><a href="">Manikanta Rocky b</a></div>
                <div class="col-md-2 names"><button class="btn btn-primary btn-xs" type="button">Invite</button></div>
                </li>
                 <li>
                <div class="col-md-3 friendsimg">
                <img alt="" src="<?php echo base_url(); ?>images/f1.jpg">
                </div>
                <div class="col-md-8 names"><a href="">anil kumar samanta</a></div>
                <div class="col-md-2 names"><button class="btn btn-primary btn-xs" type="button">Invite</button></div>
                </li>
                 <li>
                <div class="col-md-3 friendsimg">
                <img alt="" src="<?php echo base_url(); ?>images/f1.jpg">
                </div>
                <div class="col-md-8 names"><a href="">Hari Krishna Vijju</a></div>
                <div class="col-md-2 names"><button class="btn btn-primary btn-xs" type="button">Invite</button></div>
                </li>
                
                </ul>
                <p><a href="">show more friends</a></p>
                 </div>
           </div>
           
          <!----------anil------>
        
        
        
        
      </aside>
    </section>
    </section>
    <?php } ?> 	