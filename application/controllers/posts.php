<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Posts extends CI_Controller {
	 
	public function __construct() {
        parent::__construct();
		$is_logged = $this->session->userdata('logged_in');	
		if(!$is_logged)
		redirect(base_url());
    }
	
	public function index()
	{
			redirect(base_url());
		//$this->load->model('notifications');
		//$this->mdlnotifications->post_notifications();
	}

public function getpost($post_id)
{
	
		$data['products'] = $this->customermodel->individualPost($post_id);
		$data['user_id'] = $this->session->userdata('logged_in')['account_id'];
	    $data['content']='notification_post';
	    $this->load->view('template-view',$data);
	// $this->load->view('posts');
}
	
}

?>