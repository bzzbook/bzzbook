<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class profile extends CI_Controller {
	 
	  public function __construct() {
        parent::__construct();
		$is_logged = $this->session->userdata('logged_in');	
		if(!$is_logged)
		redirect(base_url());
    }

public function index()
{  
	  $this->load->view('posts');	
}

public function profile_set()
{
	$this->load->model('profile_set');
	$this->load->model('lookup');
	$data['industry'] = $this->lookup->get_lookup_industry();
	$data['result'] = $this->profile_set->save_settings();
	$this->load->view('profile_settings',$data);	
}

public function about_me()
{      
	$this->load->view('about_me');
}

public function post()
  {
	 $this->load->view('posts');
}
public function message()
  { 
   $this->load->view('messages');
}
  
}

?>