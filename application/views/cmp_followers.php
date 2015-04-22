
<section class="events col-lg-9 col-md-9 nopad">
      <section class="about-user-details">
        <h4><span aria-hidden="true" class="glyphicon glyphicon-star-empty"></span> Followers </h4>
        <?php if(!empty($followers)) { foreach($followers as $follower){ 
		$friend_status = $this->friendsmodel->user_frnds($follower[0]['user_id']);
		?>
        <div class="following col-md-4">
          <div class="fallow_left"><img src="<?php echo base_url(); ?>uploads/<?php if(!empty($follower[0]['user_img_thumb'])) echo $follower[0]['user_img_thumb']; else echo"default_profile_pic.png"; ?>" alt="<?php echo $follower[0]['user_firstname'] ." ". $follower[0]['user_lastname'];?>"></div>
          <div class="fallow_right">
            <h5><?php echo $follower[0]['user_firstname'] ." ". $follower[0]['user_lastname'];?></h5>
            <h6><?php echo $follower[0]['user_jobtype']; ?></h6>
            <p><?php echo $follower[0]['user_state'] ." , ". $follower[0]['user_country']; ?></p>
            <?php if($friend_status)
			{
			 if($friend_status[0]['request_status'] == 'Y') 
				   { ?>  <button type="button" class="btn btn-primary btn-xs"
			  href="javascript:void(0);">Friends</button>
              <?php  }elseif( $friend_status[0]['request_status'] == 'W'){ ?>
               <button type="button" class="btn btn-primary btn-xs"
			  href="javascript:void(0);">Requested</button>
              <?php }elseif( $friend_status[0]['request_status'] == 'N' || $friend_status[0]['request_status'] == 'B'){?>
            <button type="button" class="btn btn-primary btn-xs" id="addFrnd"
			  href="javascript:void(0);" onclick="addFollowerFrnd(<?php echo $follower[0]['user_id']; ?>);">Add Friend</button>
              <?php } } ?>
			
          </div>
          
        </div>
        <?php } }else echo "No Followers Found!.."; ?>
      </section>
    </section>
