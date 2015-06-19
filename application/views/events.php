<?php $curr_user_id = $this->session->userdata('logged_in')['account_id']; ?>
<section class="col-lg-3 col-md-3 col-sm-4 col-xs-12 coloumn1">
      <aside>
        <?php $this->load->view('left_bar_profile'); ?>
        <div class="sideNav_inside">
    
          <ul>
            <li><a href="#"><i class="fa fa-calendar-o"></i>Upcoming</a></li>
            <li><a href="#"><i class="fa fa-calendar"></i>Calendar</i></a></li>
            <li><a href=""><i class="fa  fa-rss-square"></i>Subscribe</a></li>
            <li><a href=""><i class="fa fa-clock-o"></i>Past</a></li>
             <li><a href=""><i class="fa fa-plus-circle"></i>Create</a></li>
          </ul>
     
     
        </div>
      </aside>
    </section>
    <section class="col-lg-6 col-md-6 col-sm-5 col-xs-12 coloumn2 pfSettings">
      <div class="upcoming">
        <div role="tabpanel"> 
          <!-- Nav tabs -->
          <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#all" aria-controls="profile" role="tab" data-toggle="tab">All</a></li>
            <li role="presentation"><a href="#invites" aria-controls="messages" role="tab" data-toggle="tab">Invites</a></li>
<!--            <li role="presentation"><a href="#saved" aria-controls="settings" role="tab" data-toggle="tab">Saved</a></li>
-->           <li role="presentation"><a href="#hosting" aria-controls="settings" role="tab" data-toggle="tab">Hosting</a></li>
          <div class="right_event">
          <!--<input type="button" onclick="testclick()" />-->
            <div data-target="#events_upcoming" data-toggle="modal" class="btn2 btn-black2"><i class="fa fa-plus"></i>Create</div>
          </div>
          </ul>
          
          <!-- Tab panes -->
          <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="all">
             <!--<h4 class="clear">This Week</h4>-->
            <?php if($events):
				foreach($events as $event){ 
				
				$image = $this->profile_set->get_profile_pic($event->event_created_by);
				if(empty($image))
				$image = "default_profile_pic.png";
				$get_profiledata = $this->customermodel->profiledata($event->event_created_by);
				
			 ?>  
            <div class="thisweek">
              <div class="col-md-3"><img class="event_img" alt="" src="<?php echo base_url()."uploads/".$image[0]->user_img_thumb; ?>">
              <div class="coming_date">
              <p class="event_month"><?php echo date('M',strtotime($event->event_date)); ?></p>
             <p class="event_date"><?php echo date('d',strtotime($event->event_date)); ?></p>
              </div>
              </div>
              <div class="col-md-9 thisweek_right">
              <h5><a href=""><?php echo $event->event_name; ?></a></h5>
              <span><?php echo date('l',strtotime($event->event_date)); ?>, <?php echo date('M',strtotime($event->event_date)); ?> <?php echo date('d',strtotime($event->event_date)); ?></span>
              <p><a href=""><?php echo $event->event_location; ?></a></p>
             <div class="event-btns event-btns<?php echo $event->event_id; ?>" id="eventBtns<?php echo $event->event_id; ?>"> 
             	  <?php if($event->event_created_by==$curr_user_id) {?>
                  <p></p><div data-target="#events_upcoming" data-toggle="modal" class="invitebtn"><i class="fa fa-envelope-o "></i>  Invite</div><input type="submit" value="Hosting" class="hostbtn adings nocursor">
                  <?php }else{ if(!$event->invitation_status){ ?>
                  <p></p>
                  <input type="button" value="Decline" class="gngSts adings" onclick="updateGoingStatus(<?php echo $event->event_id; ?>,3)"><input type="button" value="Maybe" class="gngSts adings" onclick="updateGoingStatus(<?php echo $event->event_id; ?>,2)"><input type="button" value="Join" class="gngSts adings" onclick="updateGoingStatus(<?php echo $event->event_id; ?>,1)">
                  
                  <?php }else{ ?> <p></p><label><select id="goingsts<?php echo $event->event_id; ?>" name="goingsts<?php echo $event->event_id; ?>" onchange="updateGoingStatus(<?php echo $event->event_id; ?>)" ><option value="1" <?php if($event->invitation_status==1) echo "selected='selected'"; ?>>Going</option><option value="2" <?php if($event->invitation_status==2) echo "selected='selected'"; ?>>Maybe</option><option value="3" <?php if($event->invitation_status==3) echo "selected='selected'"; ?>>Not going</option></select></label> <?php } } ?>
                  </div>
                  
              </div>
               <div class="clear"></div>
             </div>
             <?php }
			  	   endif;
			   ?>
            
             
            </div>
            <div role="tabpanel" class="tab-pane" id="invites">
              <!--<div class="alltabboxes">        
              <div class="alltabimages"><img src="images/pf_pic.png" alt=""></div>
              <p>You're all caught up.</p>
             </div>-->
             
             <!--<h4 class="clear">This Week</h4>-->
            <?php if($invites):
				foreach($invites as $invite){ 
				
				$image = $this->profile_set->get_profile_pic($invite->event_created_by);
				if(empty($image))
				$image = "default_profile_pic.png";
				$get_profiledata = $this->customermodel->profiledata($invite->event_created_by);
				
			 ?>  
            <div class="thisweek">
              <div class="col-md-3"><img class="event_img" alt="" src="<?php echo base_url()."uploads/".$image[0]->user_img_thumb; ?>">
              <div class="coming_date">
              <p class="event_month"><?php echo date('M',strtotime($invite->event_date)); ?></p>
             <p class="event_date"><?php echo date('d',strtotime($invite->event_date)); ?></p>
              </div>
              </div>
              <div class="col-md-9 thisweek_right">
              <h5><a href=""><?php echo $invite->event_name ?></a></h5>
              <span><?php echo date('l',strtotime($invite->event_date)); ?>, <?php echo date('M',strtotime($invite->event_date)); ?> <?php echo date('d',strtotime($invite->event_date)); ?></span>
              <p><a href=""><?php echo $invite->event_location; ?></a></p>
             <div class="event-btns event-btns<?php echo $invite->event_id; ?>" id="eventBtns<?php echo $invite->event_id; ?>"> 
             <?php if($invite->event_created_by==$curr_user_id) {?>
                  <div data-target="#events_upcoming" data-toggle="modal" class="btn2 invitebtn"><i class="fa fa-envelope-o "></i>  Invite</div><input type="submit" value="Hosting" class="hostbtn adings">
                  <?php }else{ if(!$invite->invitation_status){  ?>
                  <p></p><input type="button" value="Decline" class="gngSts adings" onclick="updateGoingStatus(<?php echo $invite->event_id; ?>,3)"><input type="button" value="Maybe" class="gngSts adings" onclick="updateGoingStatus(<?php echo $invite->event_id; ?>,2)"><input type="button" value="Join" class="gngSts adings" onclick="updateGoingStatus(<?php echo $invite->event_id; ?>,1)">
                  
                  <?php  }else{ ?> <p></p><label><select id="goingsts<?php echo $invite->event_id; ?>" name="goingsts<?php echo $invite->event_id; ?>" onchange="updateGoingStatus(<?php echo $invite->event_id; ?>,this.value)" ><option value="1" <?php if($invite->invitation_status==1) echo "selected='selected'"; ?>>Going</option><option value="2" <?php if($invite->invitation_status==2) echo "selected='selected'"; ?>>Maybe</option><option value="3" <?php if($invite->invitation_status==3) echo "selected='selected'"; ?>>Not going</option></select></label> <?php } } ?>
                  </div>
                  
              </div>
               <div class="clear"></div>
             </div>
             <?php }
			  	   endif;
			   ?>
              
            </div>
            <div role="tabpanel" class="tab-pane" id="saved">
            <div class="alltabboxes">        
              <div class="alltabimages"><img src="images/pf_pic.png" alt=""></div>
              <p>Save events and decide if you want to go later.</p>
             </div>
              
            </div>
            <div role="tabpanel" class="tab-pane" id="hosting">
              <!--<div class="alltabboxes">        
              <div class="alltabimages"><img src="images/pf_pic.png" alt=""></div>
              <p>Have friends over or plan a night out. </p>
              <p><a href="">Create an Event.</a></p>
             </div>-->
             
            <?php if($hosts):
				foreach($hosts as $host){ 
				
				$image = $this->profile_set->get_profile_pic($host->event_created_by);
				if(empty($image))
				$image = "default_profile_pic.png";
				$get_profiledata = $this->customermodel->profiledata($host->event_created_by);
				
			 ?>  
            <div class="thisweek">
              <div class="col-md-3"><img class="event_img" alt="" src="<?php echo base_url()."uploads/".$image[0]->user_img_thumb; ?>">
              <div class="coming_date">
              <p class="event_month"><?php echo date('M',strtotime($host->event_date)); ?></p>
             <p class="event_date"><?php echo date('d',strtotime($host->event_date)); ?></p>
              </div>
              </div>
              <div class="col-md-9 thisweek_right">
              <h5><a href=""><?php echo $host->event_name; ?></a></h5>
              <span><?php echo date('l',strtotime($host->event_date)); ?>, <?php echo date('M',strtotime($host->event_date)); ?> <?php echo date('d',strtotime($host->event_date)); ?></span>
              <p><a href=""><?php echo $host->event_location; ?></a></p>
             <div class="event-btns" id="eventBtns<?php echo $host->event_id; ?>"> 
             <?php if($host->event_created_by==$curr_user_id) {?>
                  <div data-target="#events_upcoming" data-toggle="modal" class="btn2 invitebtn"><i class="fa fa-envelope-o "></i>  Invite</div><input type="submit" value="Hosting" class="hostbtn adings">
                  <?php }else{ ?>
                  <input type="button" value="Decline" class="gngSts adings" onclick="updateGoingStatus(<?php echo $host->event_id; ?>,3)"><input type="button" value="Maybe" class="gngSts adings" onclick="updateGoingStatus(<?php echo $host->event_id; ?>,2)"><input type="button" value="Join" class="gngSts adings" onclick="updateGoingStatus(<?php echo $host->event_id; ?>,1)">
                  
                  <?php } ?>
                  </div>
                  
              </div>
               <div class="clear"></div>
             </div>
             <?php }
			  	   endif;
			   ?>

            </div>
            
          </div>
        </div>
      </div>
    </section>
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
          
       
        </form>
        <div class="publics col-md-12">
            <div class="btn3 btn-black" onclick="document.getElementById('event_form').submit();">Create</div>
            <div class="btn3 btn-green" data-toggle="modal" data-target="#AddCompany">cancel</div>
          </div>
           </form>
        <div class="clearfix"></div>
      </div>
    </div>
  </div>
</div>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css"><script>
  $(function() {
    $( "#datepicker" ).datepicker({ dateFormat: 'yy-mm-dd', });
	$('#datepicker').css("z-index","0");
	
  });
</script>
<!--<section class="col-lg-6 col-md-6 col-sm-5 col-xs-12 coloumn2 jobsSt">
      <h2>My Events</h2>
      <div class="posts">
        
    <div class="groupMainBlock">
    <div class="EventProperty">
    <div class="EventBlock">
        <h3>Event Date</h3>
        
        </div>
        <div class="EventBlock">
        <h3>Event Name</h3>
      
        </div>
        <div class="EventBlock">
        <h3>Attending</h3>
       
        </div>        
         <div class="EventBlock pull-right">
        <h3>Options</h3>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="jobProperty">
        <div class="jobBlock">
       
        <p>Social</p>
        </div>
        <div class="jobBlock">
     
        <p>2</p>
        </div>
        <div class="jobBlock">
      
        <p>18/02/2015</p>
        </div>
         <div class="jobBlock pull-right">
        <a href="#" class="link glyphicon glyphicon-pencil"></a>
        <a href="#" class="link glyphicon glyphicon-remove"></a>
        </div>
        <div class="clearfix"></div>
       </div>
    </div>
</div>
    </section>-->
    