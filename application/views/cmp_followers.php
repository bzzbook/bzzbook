
<section class="events col-lg-9 col-md-9 nopad">
      <section class="about-user-details">
        <h4><span aria-hidden="true" class="glyphicon glyphicon-star-empty"></span> Followers </h4>
        <?php if(!empty($followers)) { foreach($followers as $follower){ ?>
        <div class="following col-md-4">
          <div class="fallow_left"><img src="<?php echo base_url(); ?>uploads/<?php if(!empty($follower[0]['user_img_thumb'])) echo $follower[0]['user_img_thumb']; else echo"default_profile_pic.png"; ?>" alt="<?php echo $follower[0]['user_firstname'] ." ". $follower[0]['user_lastname'];?>"></div>
          <div class="fallow_right">
            <h5><?php echo $follower[0]['user_firstname'] ." ". $follower[0]['user_lastname'];?></h5>
            <h6><?php echo $follower[0]['user_jobtype']; ?></h6>
            <p><?php echo $follower[0]['user_state'] ." , ". $follower[0]['user_country']; ?></p>
            <button type="button" class="btn btn-primary btn-xs" id="addFrnd"
			  href="javascript:void(0);" onclick="addFollowerFrnd(<?php echo $follower[0]['user_id']; ?>);">Add Friend</button>
          </div>
          
        </div>
        <?php } }else echo "No Followers Found!.."; ?>
      </section>
    </section>
