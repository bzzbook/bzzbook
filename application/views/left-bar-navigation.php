<div class="sideNav">
          <ul>
            <li><a href="<?php echo base_url(); ?>profile/message">Messages <span id="un_read_msg_count">
			<?php 
			$unreadmesages = $this->messages->getUnReadMessages(); 
			if($unreadmesages)
			{
			$count_msgs = count($unreadmesages);
			echo $count_msgs;
			}else
			echo "0";
			
			?></span></a></li>
            <li><a href="#">Buzzers ! <span>20</span></a></li>
            <li><a href="<?php echo base_url(); ?>profile/groups">My Groups</a></li>
            <li><a href="<?php echo base_url(); ?>profile/jobs">My Jobs</a></li>
            <li><a href="<?php echo base_url(); ?>profile/events">My Events</a></li>
            <li><a href="<?php echo base_url(); ?>company/my_companies">My Companies</a></li>
            <li><a href="<?php echo base_url(); ?>profile/my_photos">Photos &amp; Videos</a></li>
            <li><a href="<?php echo base_url(); ?>profile/showfavs">Favorites</a></li>
          </ul>
        </div>