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
public function send_msg($msg_id ='')
{
		if(isset($_POST['submit'])){
		//$data['group_ig'] = $this->input->post('group_id');
		$data['sent_by'] = $this->session->userdata('logged_in')['account_id'];
		$data['recieved_by'] = $this->input->post('addedusers');
		$data['message'] = $this->input->post('message_content');
		$data['subject'] = $this->input->post('subject');
		$data['uploaded_files'] = $this->doupload('',$this->input->post('removefiles'));
		if(empty($data['recieved_by']) && empty($data['message']))
		{
			 $this->session->set_flashdata('send_msg', 'Please input recipients and message');
			 redirect('/profile/compose');
		}
		$this->load->model('messages');
		$this->messages->insert_msg($data);
		$this->session->set_flashdata('send_msg', 'Message Send Successfully');
		if(!empty($msg_id))
		redirect('/profile/messageview/'.$msg_id);
		else
	    redirect('/profile/message');
		}
		else{
			$this->session->set_flashdata('send_msg', 'Please input to field');
			redirect('/profile/messageview/'.$msg_id);
		}
		
}
function doupload($filename='',$notrequired='') {
					if(!empty($notrequired)){
					$dontmove = explode(',',$notrequired);
					}
					else
					$dontmove =array();;
					$name_array = array();
					if($filename=='')
					$count = count($_FILES['upload']['size']);
					else
					$count = count($_FILES[$filename]['size']);
					foreach($_FILES as $key=>$value)
					for($s=0; $s<=$count-1; $s++) {
					if(!in_array($value['name'][$s],$dontmove)){
					$_FILES['userfile']['name']=$value['name'][$s];
					$_FILES['userfile']['type']    = $value['type'][$s];
					$_FILES['userfile']['tmp_name'] = $value['tmp_name'][$s];
					$_FILES['userfile']['error']       = $value['error'][$s];
					$_FILES['userfile']['size']    = $value['size'][$s];  
						$config['upload_path'] = './uploads/';
						$type = $_FILES['userfile']['type'];
						$config['allowed_types'] = 'gif|jpg|png|csv|psd|xls|pdf|ppd|zip|xlsx|doc|docx|mpeg|mov|avi|mpg|txt|word';
						
						//switch ($type) {
//						   case 'gif':
//						   case 'jpg':
//						   case 'png':
//						     // do img config setup
//							  					$config['allowed_types'] = 'gif|jpg|png';
//
//							  break;
//						   case 'avi':
//						   case 'flv':
//						   case 'wmv':
//						   case 'mp3':
//						   case 'wma':
//							  // do video config
//							  					$config['allowed_types'] = 'mp4';
//
//							  break;
//						}
						
						
					$config['max_size']	= '';
					$config['max_width']  = '';
					$config['max_height']  = '';
					$this->load->library('upload', $config);
					
					if ( ! $this->upload->do_upload())
					{
						
						$error = array('error' => $this->upload->display_errors());
					
						//$this->load->view('uploadform', $error);
					}
					else
					{
						
						$data = $this->upload->data();
						$name_array[] = $data['file_name'];
					}
					
					
					
					//$this->upload->do_upload();
//					$data = $this->upload->data();
//					$name_array[] = $data['file_name'];
					}
					}
					$names= implode(',', $name_array);
					/* $this->load->database();
					$db_data = array('id'=> NULL,
					'name'=> $names);
					$this->db->insert('testtable',$db_data);
					
					*/ return $names;
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
public function deletethismsgs($values)
{
	$this->load->model('messages');
	$ids = explode('-',$values);
	foreach($ids as $id)
	{
		if($id!='')
		$this->messages->deletemsg($id);
	}
	redirect('/profile/message');
	
}
public function markasreadselectedmsgs($values)
{
	$this->load->model('messages');
	$ids = explode('-',$values);
	foreach($ids as $id)
	{
		if($id!='')
		$this->messages->markasread($id);
	}
	echo "Success";
	
}
public function markasunreadselectedmsgs($values)
{
	$this->load->model('messages');
	$ids = explode('-',$values);
	foreach($ids as $id)
	{
		if($id!='')
		$this->messages->markasunread($id);
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
public function get_msgs_count()
{

	$data = $this->messages->getUnReadMessages();
	if($data)
	{
		echo count($data);
	}else
	
	echo "0";
}

}
?>