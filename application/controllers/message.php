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
		$data['sent_by'] = $this->session->userdata('logged_in')['account_id'];
		$data['recieved_by'] = $this->input->post('friendsList');
		$data['message'] = $this->input->post('message_content');
		$this->load->model('messages');
		$this->messages->insert_msg($data);
	    $this->session->set_flashdata('send_msg', 'Message Send Successfully');
	    redirect('/profile/message');
}
public function replymessage()
{

		//$data['group_ig'] = $this->input->post('group_id');
		$data['sent_by'] = $this->session->userdata('logged_in')['account_id'];
		$data['recieved_by'] = $this->input->post('recieved_by');
		$data['message'] = $this->input->post('message_content');
		$this->load->model('messages');
		$this->messages->insert_msg($data);
	    $this->session->set_flashdata('send_msg', 'Message Send Successfully');
	    redirect('/profile/message');
}
public function deletemsg($msg_id)
{
	$this->load->model('messages');
	if($this->messages->deletemsg($msg_id))
	{
	$this->session->set_flashdata('send_msg', 'Message moved to trash');
	redirect('/profile/message');
	}
}
public function deletesentmsg($msg_id)
{
	$this->load->model('messages');
	if($this->messages->deletesentmsg($msg_id))
	{
	$this->session->set_flashdata('send_msg', 'Message moved to trash');
	redirect('/profile/message');
	}
}
public function deletefromtrash($msg_id)
{
	$this->load->model('messages');
	if($this->messages->deletefromtrash($msg_id))
	{
	$this->session->set_flashdata('send_msg', 'Deleted from trash');
	redirect('/profile/message');
	}
}

public function getconversations($msg_id,$sent_by)
{
	$this->load->model('messages');
	if($this->messages->getconversations($msg_id,$sent_by))
	{
	$this->session->set_flashdata('send_msg', 'Deleted from trash');
	redirect('/profile/message');
	}
}
public function deleteselectedmsgs($values)
{
	$this->load->model('messages');
	$ids = explode('-',$values);
	foreach($ids as $id)
	{
		if($id!='')
		$this->messages->deletemsg($id);
	}
	echo "Success";
	
}
public function deletesentselectedmsgs($values)
{
	$this->load->model('messages');
	$ids = explode('-',$values);
	foreach($ids as $id)
	{
		if($id!='')
		$this->messages->deletesentmsg($id);
	}
	echo "Success";
	
}

public function deletetrashmsgs($values)
{
	$this->load->model('messages');
	$ids = explode('-',$values);
	foreach($ids as $id)
	{
		if($id!='')
		$this->messages->deletefromtrash($id);
	}
	echo "Success";
	
}



}
?>