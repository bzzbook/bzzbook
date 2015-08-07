    <?php $data  = $this->profile_set->editSideBarSettings(); 
   //print_r($data);
   if($data)
   {
   foreach($data as $data){
 // exit; ?>
    <section class="col-lg-3 col-md-3 col-sm-3 col-xs-12 coloumn3" id="right_bar">
      
       <aside> 
       <?php if($data->pend_frnd_requests == 'Y') {$this->load->view('pending-frnd-req'); }?>
	   <?php if($data->latest_frnds == 'Y') {$this->load->view('latest-frnds');  }?>
       <?php if($data->your_add_one == 'Y') {$this->load->view('right-bar-add1'); } ?>
       <?php if($data->add_friends == 'Y') {$this->load->view('add_friend_requests'); }?>
       <?php if($data->companies_to_follow == 'Y') {$this->load->view('other_companies_list'); }?>
       <?php if($data->companies_im_following == 'Y') {$this->load->view('companies_im_following'); }?>
	   <?php if($data->your_add_two == 'Y') {$this->load->view('right-bar-add2'); }?>
       <?php if($data->my_companies == 'Y') {$this->load->view('my_company'); }?>
       <?php if($data->recent_viewers == 'Y') {$this->load->view('recent_profile_viewers'); }?>
       
      </aside>
    </section>
    <?php } } ?>
