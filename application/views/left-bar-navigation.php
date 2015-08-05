	<?php 
			$unreadmesages = $this->messages->getUnReadMessages(); 
		?>
<div class="sideNav">
          <ul>
            <li><a href="<?php echo base_url(); ?>profile/message">Messages 
		<?php if($unreadmesages) { ?>
            <span id="un_read_msg_count" class="un_read_msg_count"><?php echo $unreadmesages; ?></span>
			<?php } ?>
           </a></li>
<!--            <li><a href="#">Buzzers ! <span>20</span></a></li>
-->            <li><a href="<?php echo base_url(); ?>profile/groups">My Groups</a></li>
            <li><a href="<?php echo base_url(); ?>profile/jobs">My Jobs</a></li>
            <li><a href="<?php echo base_url(); ?>profile/events">My Events</a></li>
            <li><a href="<?php echo base_url(); ?>company/my_companies">My Companies</a></li>
            <li><a href="<?php echo base_url(); ?>profile/my_photos">Photos &amp; Videos</a></li>
            <li><a href="<?php echo base_url(); ?>profile/showfavs">Favorites</a></li>
          </ul>
        </div>