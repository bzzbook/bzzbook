<?php $this->load->view('header');?>
<?php if(isset($user_profile_id)) $this->load->view('friend-navigation'); else $this->load->view('main-navigation');?>
<?php $this->load->view('full_content'); ?>
<?php $this->load->view('footer'); ?>


