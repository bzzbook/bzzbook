<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Message extends CI_Controller {
	 
	  public function __construct() {
        parent::__construct();
		$this->load->model('friendsmodel');
		$is_logged = $this->session->userdata('logged_in');	
		if(!$is_logged)
		redirect(base_url());
    }

public function index()
{  
    	
}
public function send_msg()
{
	
		//$data['group_ig'] = $this->input->post('group_id');
		$data['send_by'] = $this->session->userdata('logged_in')['account_id'];
		$data['send_to'] = $this->input->post('select-from');
		$data['message'] = $this->input->post('message_content');
		$this->load->model('messages');
		$this->messages->insert_msg($data);
	    $this->session->set_flashdata('send_msg', 'Message Send Successfully');
	    redirect('/profile/message');
}
}
?>