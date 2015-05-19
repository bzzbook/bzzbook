<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>business card</title>
<style>
* { margin:0; padding:0; }
.clear { clear:both; }
a { color: #646464; text-decoration:none; }
a:hover { color: #646464; text-decoration:none; }
@import url(http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900);
</style>
</head>
 <?php $profile_info = $this->profile_set->get_user_profileinfo(); ?>
<body>
<div class="businesscard" style=" width:786px; margin:0 auto;">
  <div class="business_card" style=" width:735px; font-family:Roboto; background:#fbc436; border-bottom: 1px solid #d3d6db; color: #fff;    font-size: 24px; line-height: 48px;padding: 0 16px; border-top-left-radius: 8px;border-top-right-radius:8px;"><img src="<?php echo base_url(); ?>images/cardicon.png" alt="" style="padding:0px 10px 0 0px;;"/>My Business Card</div>
  <div class="business_box" style=" width:733px; height:520px; border:1px solid #ccc;padding:16px;border-bottom-left-radius:8px; border-bottom-right-radius: 8px;">
    <div class="textbox_left" style=" width:570px; height:auto; float:left;">
      <h3 style="color: #646464; line-height: 40px; font-family:Roboto;  font-size: 25px;    font-weight: bold;"><?php echo $profile_info[0]['user_firstname'] ." ".$profile_info[0]['user_lastname']; ?></h3>
      <p class="business" style=" color: #646464;  font-family:Roboto;   font-size: 14px;    font-weight: 300;    line-height: 25px;">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
    </div>
    <div class="box_image" style="float:right; border: 1px solid #606060; height:153px; width:146px; margin-left:10px;"><img height="153" width="146" src="<?php echo base_url();?>uploads/<?php if(!empty($profile_info[0]['user_img_name'])) echo $profile_info[0]['user_img_name']; else echo 'default_profile_pic.png'; ?>" alt="<?php echo $profile_info[0]['user_firstname'] ." ".$profile_info[0]['user_lastname']; ?>"></div>
    <div class="clear"></div>
    <div class="fieldbox" style="width:752px; margin-bottom:10px;">
      <div class="lefttbox" style="width:335px; height:54px; float:left; margin-right:20px; border-bottom:1px solid #fbc436; padding-top:45px;">
        <div class="left_ixonbox" style="width:54px; height:54px; float:left;"><img src="<?php echo base_url(); ?>images/site.png" alt="" /> </div>
        <div class="right_text" style="width:270px; height:54px; float:left; padding-left:10px;">
          <h3 style="font-size:20px; font-weight:bold; color:#646464; font-family: "Roboto",sans-serif;">Website:</h3>
          
          
          <h4 style="font-size:18px; color:#646464; font-weight: normal; font-family: "Roboto",sans-serif;"><a href="#"><?php echo $profile_info[0]['user_cmpname']; ?></a></h4>
        </div>
      </div>
      <div class="righttbox" style="width:355px; height:54px; float:right; margin-bottom:10px;">
        <div class="lefttbox" style="margin-top:2px; width:335px; min-height:54px; margin-right:20px; margin-left:-19px; float:left; border-bottom:1px solid #e27f56;">
          <div class="left_ixonbox" style="width:54px; height:54px; float:left;"><img src="<?php echo base_url(); ?>images/phone.png" alt="" /> </div>
          <div class="right_text" style="width:270px; height:54px; float:left; padding-left:10px;">
            <h3 style="font-size:20px; font-weight:bold; color:#646464; font-family: "Roboto",sans-serif;">Phone number:</h3>       
            
            <h4 style="font-size:18px; color:#646464; font-weight: normal; font-family: "Roboto",sans-serif;"><?php echo $profile_info[0]['user_phoneno']; ?></h4>
          </div>
        </div>
      </div>
      <div class="clear"></div>
    
    <div class="lefttbox" style="width:335px; height:54px; float:left; margin-right:20px; border-bottom:1px solid #da466a;  padding-top:20px">
      <div class="left_ixonbox" style="width:54px; height:54px; float:left;"><img src="<?php echo base_url(); ?>images/location.png" alt="" /> </div>
      <div class="right_text" style="width:270px; height:54px; float:left; padding-left:10px;">
        <h3 style="font-size:20px; font-weight:bold; color:#646464; font-family: "Roboto",sans-serif;">Location:</h3>
        <h4 style="font-size:18px; color:#646464; font-weight: normal; font-family: "Roboto",sans-serif;"><a href="#"><?php 		  
		  if(!empty($profile_info[0]['user_country']) && !empty($profile_info[0]['user_state']))
		  {
		  echo  $profile_info[0]['user_state'].", ".$profile_info[0]['user_country'];
		  }else
		  echo "Not Available";
		  ?></a></h4>
      </div>
    </div>
    <div class="righttbox" style="width:355px; height:54px; float:right;  margin-bottom:20px;">
      <div class="lefttbox" style="width:335px; height:54px; float:left; margin-right:20px; border-bottom:1px solid #d3283b;  padding-top:10px">
        <div class="left_ixonbox" style="width:54px; height:54px; float:left;"><img src="<?php echo base_url(); ?>images/mail.png" alt="" /> </div>
        <div class="right_text" style="width:270px; height:54px; float:left; padding-left:10px;">
          <h3 style="font-size:20px; font-weight:bold; color:#646464; font-family: "Roboto",sans-serif;">Email:</h3>
          <h4 style="font-size:18px; color:#646464; font-weight: normal; font-family: "Roboto" "><a href="#"><?php 
		  
		  if(!empty($profile_info[0]['user_email']))
		  {
		  echo $profile_info[0]['user_email'];
		  }else
		  echo "Not Available";
		  ?></a></h4>
        </div>
      </div>
    </div>
    <div class="clear"></div>
    <div class="lefttbox" style="width:335px; height:54px; float:left; margin-right:20px; border-bottom:1px solid #728aae;  padding-top:20px">
      <div class="left_ixonbox" style="width:54px; height:54px; float:left;"><img src="<?php echo base_url(); ?>images/twitter.png" alt="" /> </div>
      <div class="right_text" style="width:270px; height:54px; float:left; padding-left:10px;">
        <h3 style="font-size:20px; font-weight:bold; color:#646464; font-family: "Roboto",sans-serif;">Twitter:</h3>
        <h4 style="font-size:18px; color:#646464; font-weight: normal; font-family: "Roboto",sans-serif;"><a href="#">Aaliyah</a></h4>
      </div>
    </div>
    <div class="righttbox" style="width:355px; height:54px; float:right;  margin-bottom:20px;">
      <div class="lefttbox" style="width:335px; height:54px; float:left; margin-right:20px; border-bottom:1px solid #73c3e8;">
        <div class="left_ixonbox" style="width:54px; height:54px; float:left;"><img src="<?php echo base_url(); ?>images/face.png" alt="" /> </div>
        <div class="right_text" style="width:270px; height:54px; float:left; padding-left:10px;">
          <h3 style="font-size:20px; font-weight:bold; color:#646464; font-family: "Roboto",sans-serif;">Facebook:</h3>
          <h4 style="font-size:18px; color:#646464; font-weight: normal; font-family: "Roboto",sans-serif;"><a href="#">Aaliyah</a></h4>
        </div>
      </div>
    </div>
    <div class="clear"></div>
    <div class="clear"></div>
    <div class="lefttbox" style="width:335px; height:54px; float:left; margin-right:20px; border-bottom:1px solid #fa191b; padding-top:20px;">
      <div class="left_ixonbox" style="width:54px; height:54px; float:left;"><img src="<?php echo base_url(); ?>images/p.png" alt="" /> </div>
      <div class="right_text" style="width:270px; height:54px; float:left; padding-left:10px;">
        <h3 style="font-size:20px; font-weight:bold; color:#646464; font-family: "Roboto",sans-serif;">Pinterest:</h3>
        <h4 style="font-size:18px; color:#646464; font-weight: normal; font-family: "Roboto",sans-serif;"><a href="#">aaliyah@gmail.com</a></h4>
      </div>
    </div>
    <div class="righttbox" style="width:355px; height:54px; float:right;  margin-bottom:20px;">
      <div class="lefttbox" style="width:335px; height:54px; float:left; margin-right:20px; border-bottom:1px solid #007ab9;">
        <div class="left_ixonbox" style="width:54px; height:54px; float:left;"><img src="<?php echo base_url(); ?>images/in.png" alt="" /> </div>
        <div class="right_text" style="width:270px; height:54px; float:left; padding-left:10px;">
          <h3 style="font-size:20px; font-weight:bold; color:#646464; font-family: "Roboto",sans-serif;">linkedin:</h3>
          <h4 style="font-size:18px; color:#646464; font-weight: normal; font-family: "Roboto",sans-serif;"><a href="#">Aaliyah</a></h4>
        </div>
      </div>
    </div>
    <div class="clear"></div>
  </div>
</div>
<div class="clear"></div>
</div>
</div>
</body>
</html>
