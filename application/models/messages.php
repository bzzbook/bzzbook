<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Messages extends CI_Model {

	function __construct()
    { 
   		parent::__construct(); 
  		$this->load->database("bzzbook"); 
    } 

   
   public function insert_msg($data)
   {
		 if($this->db->insert('bzz_messages',$data))
		 return true;
		 else 
		 return false;	
   }
   public function getRecievedMessages(){
    $reciever_id = $this->session->userdata('logged_in')['account_id'];  
	$condition = "recieved_by =" . "'" . $reciever_id .  "'AND rec_move_to_trash !='Y'";
	$this->db->select('*');
	$this->db->from('bzz_messages');
	$this->db->where($condition);
	$this->db->order_by('sent_date','desc');
	$query = $this->db->get();
	if($query->num_rows()>0)
	{
		$messages = $query->result_array();
		$messages_data = array();
		
		foreach($messages as $message)
		{
			$message_data['msg_id'] = $message['msg_id'];
			$message_data['content'] = $message['message'];
			$message_data['sent_by'] = $message['sent_by'];
			$message_data['sent_date'] = $message['sent_date'];
			$this->db->select('*');
			$this->db->from('bzz_userinfo');
			$this->db->join('bzz_user_images','bzz_userinfo.user_id=bzz_user_images.user_id AND bzz_userinfo.user_id='.$message['sent_by']);
			$query = $this->db->get();
			if($query->num_rows()>0)
			{
				$userinfo = $query->result_array();
				$message_data['name'] = $userinfo[0]['user_firstname'].' '.$userinfo[0]['user_lastname'];
				$message_data['user_image'] = $userinfo[0]['user_img_fav'];
			}
			$messages_data[] = $message_data;
		}
		return $messages_data;
	}
   }
   
   public function getSentMessages(){
    $sent_id= $this->session->userdata('logged_in')['account_id'];  
	$condition = "sent_by =" . "'" . $sent_id .  "' AND sent_move_to_trash !='Y'";
	$this->db->select('*');
	$this->db->from('bzz_messages');
	$this->db->where($condition);
	$this->db->order_by('sent_date','desc');
	$query = $this->db->get();
	if($query->num_rows()>0)
	{
		$messages = $query->result_array();
		$messages_data = array();
		
		foreach($messages as $message)
		{
			$message_data['msg_id'] = $message['msg_id'];
			$message_data['content'] = $message['message'];
			$message_data['recieved_by'] = $message['recieved_by'];
			$message_data['sent_date'] = $message['sent_date'];
			$this->db->select('*');
			$this->db->from('bzz_userinfo');
			$this->db->join('bzz_user_images','bzz_userinfo.user_id=bzz_user_images.user_id AND bzz_userinfo.user_id='.$message['sent_by']);
			$query = $this->db->get();
			if($query->num_rows()>0)
			{
				$userinfo = $query->result_array();
				$message_data['name'] = $userinfo[0]['user_firstname'].' '.$userinfo[0]['user_lastname'];
				$message_data['user_image'] = $userinfo[0]['user_img_fav'];
			}
			$messages_data[] = $message_data;
		}
		return $messages_data;
	}
   }
   public function getTrashMessages(){
    $reciever_id = $this->session->userdata('logged_in')['account_id'];  
	$condition = "recieved_by =" . "'" . $reciever_id .  "'AND rec_move_to_trash ='Y'";
	$this->db->select('*');
	$this->db->from('bzz_messages');
	$this->db->where($condition);
	$this->db->order_by('sent_date','desc');
	$query = $this->db->get();
	if($query->num_rows()>0)
	{
		$messages = $query->result_array();
		$messages_data = array();
		
		foreach($messages as $message)
		{
			$message_data['msg_id'] = $message['msg_id'];
			$message_data['content'] = $message['message'];
			$message_data['sent_by'] = $message['sent_by'];
			$message_data['sent_date'] = $message['sent_date'];
			$this->db->select('*');
			$this->db->from('bzz_userinfo');
			$this->db->join('bzz_user_images','bzz_userinfo.user_id=bzz_user_images.user_id AND bzz_userinfo.user_id='.$message['sent_by']);
			$query = $this->db->get();
			if($query->num_rows()>0)
			{
				$userinfo = $query->result_array();
				$message_data['name'] = $userinfo[0]['user_firstname'].' '.$userinfo[0]['user_lastname'];
				$message_data['user_image'] = $userinfo[0]['user_img_fav'];
			}
			$messages_data[] = $message_data;
		}
		return $messages_data;
	}
   }
   public function deletemsg($msg_id)
   {
	   $data = array(
               'rec_move_to_trash' => 'Y'              
            );
		$this->db->where('msg_id', $msg_id);
		if($this->db->update('bzz_messages', $data))
		return true;
		else 
		return false; 
   }
    public function deleteselectedmsgs($values)
   {
	   $data = array(
               'rec_move_to_trash' => 'Y'              
            );
		$this->db->where('msg_id', $msg_id);
		if($this->db->update('bzz_messages', $data))
		return true;
		else 
		return false; 
   }
   public function deletesentmsg($msg_id)
   {
	   $data = array(
               'sent_move_to_trash' => 'Y'              
            );
		$this->db->where('msg_id', $msg_id);
		if($this->db->update('bzz_messages', $data))
		return true;
		else 
		return false; 
   }
    public function deletefromtrash($msg_id)
   {
	  	if($this->db->delete('bzz_messages', array('msg_id' => $msg_id)))
		return true;
		else 
		return false; 
   }
   public function getconversations($msg_id,$sent_by)
   {
	$reciever_id = $this->session->userdata('logged_in')['account_id'];  
	$condition = "sent_by IN(".$sent_by.','.$reciever_id.") AND recieved_by IN(".$sent_by.','.$reciever_id.") AND msg_id>='".$msg_id."'";
	$this->db->select('*');
	$this->db->from('bzz_messages');
	$this->db->where($condition);
	$this->db->order_by('msg_id','asc');
	$query = $this->db->get();
	if($query->num_rows()>0)
	{
		$messages = $query->result_array();
		$messages_data = array();
		
		foreach($messages as $message)
		{
			$message_data['msg_id'] = $message['msg_id'];
			$message_data['content'] = $message['message'];
			$message_data['sent_by'] = $message['sent_by'];
			$message_data['sent_date'] = $message['sent_date'];
			$this->db->select('*');
			$this->db->from('bzz_userinfo');
			$this->db->join('bzz_user_images','bzz_userinfo.user_id=bzz_user_images.user_id AND bzz_userinfo.user_id='.$message['sent_by']);
			$query = $this->db->get();
			if($query->num_rows()>0)
			{
				$userinfo = $query->result_array();
				$message_data['name'] = $userinfo[0]['user_firstname'].' '.$userinfo[0]['user_lastname'];
				$message_data['user_image'] = $userinfo[0]['user_img_fav'];
			}
			$messages_data[] = $message_data;
		}
		foreach($messages_data as $message)
		{
			if($message['sent_by']==$sent_by)
			{
				echo "<div class='reply convBox'>
        <img src='".base_url()."uploads/".$message['user_image']."' width='55' height='60' alt=''>                	
                	<span class='sub'>
                    <h5>".$message['name']."</h5>
                    <span>".$message['content']."</span> 
                    </span>
        <div class='clear'></div>
        </div>";
			}
			else
			{
				echo "<div class='recieve convBox'>
         <img src='".base_url()."uploads/".$message['user_image']."' width='55' height='60' alt=''>                	
                	<span class='sub'>
                    <h5>".$message['name']."</h5>
                    <span>".$message['content']."</span> 
                    </span>
        <div class='clear'></div></div>";
			}
		}
	}
	
   }
}
?>
