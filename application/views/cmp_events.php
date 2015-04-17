<section class="events col-lg-9 col-md-9 nopad">
      <section class="about-user-details">
        <h4><span aria-hidden="true" class="glyphicon glyphicon-calendar"></span> Events
          <div class="right_event">
            <div class="btn2 btn-black">Add Event</div>
          </div>
        </h4>
        <div class="events" >
          <section class="events col-lg-12 col-md-12 col-sm-5 col-xs-12 coloumn2 aboutme">
            <ul>
            <?php if(!empty($event_info)) { foreach($event_info as $event) { ?>
              <li> <img src="<?php echo base_url(); ?>uploads/<?php if(!empty($event['event_image'])) echo $event['event_image']; else echo "event1.jpg"; ?>" alt="">
                <h3><span><?php echo $event['event_name']; ?></span></h3>
                <div class="dates"><span class="glyphicon glyphicon-calendar"> </span><?php $unixTimestamp = strtotime($event['event_date']);
				 echo date('d',$unixTimestamp).", ".date('F',$unixTimestamp).", ".date('Y',$unixTimestamp); ?></div>
                 <div class="dates"><span class="glyphicon glyphicon-map-marker"> </span><?php echo $event['event_location']; ?></div>
                <div class="dates"><span class="glyphicon glyphicon-heart"> </span>Hits: 09 </div>
                
                <div class="clearfix"></div>
                <p><?php echo $event['event_description']; ?></p>
         <div class="btn2 btn-black"><a href="<?php echo base_url("events/get_event_byid/".$event['event_id']."/".$event['event_cr_cmp']); ?>">Read More</a></div>
                <div class="clearfix"></div>
              </li>
              <?php } } else echo "No Events Created By This Company!..";?>
            </ul>
          </section>
          <div class="clearfix"></div>
        </div>
      </section>
    </section>
