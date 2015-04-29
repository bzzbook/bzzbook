    <section class="events col-lg-9 col-md-9 nopad">
      <section class="about-user-details">
        <h4><span aria-hidden="true" class="glyphicon glyphicon-calendar"></span> Events
          
        </h4>
        <div class="events" >
          <section class="events col-lg-12 col-md-12 col-sm-5 col-xs-12 coloumn2 aboutme">
           <ul>
            <?php if(!empty($event_info)) { ?>
              <li> <img src="<?php echo base_url(); ?>uploads/<?php if(!empty($event_info[0]['event_image'])) echo $event_info[0]['event_image']; else echo "event1.jpg"; ?>" alt="">
                <h3><span><?php echo $event_info[0]['event_name']; ?></span></h3>
                <div class="dates"><span class="glyphicon glyphicon-calendar"> </span><?php $unixTimestamp = strtotime($event_info[0]['event_date']);
				 echo date('d',$unixTimestamp).", ".date('F',$unixTimestamp).", ".date('Y',$unixTimestamp); ?></div>
                 <div class="dates"><span class="glyphicon glyphicon-map-marker"> </span><?php echo $event_info[0]['event_location']; ?></div>
                <div class="dates"><span class="glyphicon glyphicon-heart"> </span>Hits: <?php echo $event_info[0]['event_hits']; ?> </div>
                
                <div class="clearfix"></div>
                <p><?php echo $event_info[0]['event_description']; ?></p>
                
                <div class="clearfix"></div>
              </li>
              <?php } else echo "No Events Created By This Company!..";?>
            </ul>
             </section>
          </div>
      </section>
        <section class="about-user-details">
         <div class="newcomments">
              <h3><img src="<?php echo base_url(); ?>images/comment.png" alt="">Comments</h3>
              <div class="commentboxes">
              <ul>
                <?php $event_discussions = $this->eventmodel->get_event_discussion($event_info[0]['event_id']); 
				
				if(!empty($event_discussions))
				{
					foreach($event_discussions as $discussion)
					{
						$user_info = $this->eventmodel->getuserdetails($discussion['discussion_by']);
					
						
						
				?>
                 <li>
                  <div class="comment_imgbox"><img src="<?php echo base_url(); ?>uploads/<?php if(!empty($user_info[0]['user_img_thumb'])) echo $user_info[0]['user_img_thumb']; else echo "default_profile_pic.png"; ?>" alt="<?php echo base_url(); ?>uploads/<?php echo 'default_profile_pic.png'; ?> "></div>
                  <div class="comment_text">
                    <h5><span class="headers"><?php echo $user_info[0]['user_firstname'] ." " .$user_info[0]['user_lastname'] ?><small><span aria-hidden="true" class="glyphicon glyphicon-time">
                    </span>
                    <?php 
					$hrs = $this->customermodel->get_time_difference_php($discussion['discussion_time']);
					echo $hrs;
					?> 
                    
                  </small></span></h5>
                    <p><?php echo $discussion['discussion_content']; ?></p>
                  </div>
                </li>
                <?php } } ?>
              </ul>
                  <div class="newcomments">
              <h3><img src="<?php echo base_url(); ?>images/single_comment.png" alt="">Leave a Reply</h3>
      <form class="coment" id="event_discussion" name="event_discussion" method="post" action="<?php echo base_url(); ?>events/write_discussion/<?php echo $event_info[0]['event_id']; ?>/<?php echo $event_info[0]['event_cr_cmp']; ?>">
              <textarea placeholder="Comment" rows="4" class="form-control" name="discussion_content"  data-rule-required="true" data-msg-required="Please Enter Your Comment!..."></textarea>
              <!--<input type="hidden" name="cmp_id" value="<?php // echo $this->uri->segment(4,0);?>" />-->
               <div class="postes">
             
         		 <button type="submit" class="btn2 btn-yellow">Post Comment</button>
              </div>
              </form>
             
              </div>
             
            </div>
            </div>
          </section>
          <div class="clearfix"></div>
    </section>

