<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class profile extends CI_Controller {
	 
	  public function __construct() {
        parent::__construct();
		
    }

public function index()
{    
 $this->load->view('posts');
}

public function profile_set()
{
	 $is_logged = $this->session->userdata('logged_in');	
	if($is_logged)
		{
			 $this->load->view('profile_settings');
		}else{
		redirect(base_url());
		}
	
}

public function about_me()
{       $is_logged = $this->session->userdata('logged_in');	
		if($is_logged)
		{
			 $this->load->view('about_me');
		}else{
		redirect(base_url());
		}
	
	
}

public function post()
  {      $is_logged = $this->session->userdata('logged_in');	
		if($is_logged)
		{
			 $this->load->view('posts');
		}else{
		redirect(base_url());
		}
	
	
}
public function message()
  {      $is_logged = $this->session->userdata('logged_in');	
		if($is_logged)
		{
			 $this->load->view('messages');
		}else{
		redirect(base_url());
		}
	
	
}
  
}
		
		

?>