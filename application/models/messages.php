<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Messages extends CI_Model {

	function __construct()
    { 
   		parent::__construct(); 
  		$this->load->database("bzzbook"); 
    } 

   
   public function insert_msg($data)
   {
	   	 $rec_ids = explode(',',$data['recieved_by']);
		 $count_id = count($rec_ids);
		 $i = 0;
		 foreach($rec_ids as $id)
		 {
			 $content['message'] = $data['message'];
			 $content['recieved_by'] = $id;
			 $content['sent_by'] = $data['sent_by'];
			 $content['subject'] = $data['subject'];
			 $content['uploaded_files'] = $data['uploaded_files'];
			 if($this->db->insert('bzz_messages',$content))
			 $i++;
		 }
		 if($count_id==$i)
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
			$message_data['subject'] = $message['subject'];

			$message_data['sent_by'] = $message['sent_by'];
			$message_data['sent_date'] = $message['sent_date'];
			$message_data['read_status'] = $message['read_status'];
			$condition = "user_id = '".$message['sent_by']."'";
			$this->db->select('*');
			$this->db->from('bzz_user_images');
			$this->db->where($condition);
			$query = $this->db->get();
			if($query->num_rows()>0)
			{			
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
			else
			{
				$this->db->select('*');
				$this->db->from('bzz_userinfo');
				$this->db->where($condition);
				$query = $this->db->get();
				if($query->num_rows()>0)
				{
					$userinfo = $query->result_array();
					$message_data['name'] = $userinfo[0]['user_firstname'].' '.$userinfo[0]['user_lastname'];
					$message_data['user_image'] ='default_profile_pic.png';
				}
				$messages_data[] = $message_data;
			}
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
			$message_data['subject'] = $message['subject'];
			$message_data['recieved_by'] = $message['recieved_by'];
			$message_data['sent_date'] = $message['sent_date'];
			$condition = "user_id ='".$message['sent_by']."'";
			$this->db->select('*');
			$this->db->from('bzz_user_images');
			$this->db->where($condition);
			$query = $this->db->get();
			if($query->num_rows()>0)
			{
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
			else
			{
				$this->db->select('*');
			$this->db->from('bzz_userinfo');
			$query = $this->db->get();
			if($query->num_rows()>0)
			{
				$userinfo = $query->result_array();
				$message_data['name'] = $userinfo[0]['user_firstname'].' '.$userinfo[0]['user_lastname'];
				$message_data['user_image'] = 'default_profile_pic.png';
			}
			$messages_data[] = $message_data;
			}
		}
		return $messages_data;
	}
   }
   public function getTrashMessages(){
    $reciever_id = $this->session->userdata('logged_in')['account_id'];  
	$condition = "( recieved_by =" . "'" . $reciever_id .  "'AND rec_move_to_trash ='Y' ) OR (sent_by =".$reciever_id." AND sent_move_to_trash='Y' )";
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
			$message_data['subject'] = $message['subject'];
			$message_data['sent_by'] = $message['sent_by'];
			$message_data['sent_date'] = $message['sent_date'];
			$condition = "user_id = '".$message['sent_by']."'";
			$this->db->select('*');
			$this->db->from('bzz_user_images');
			$this->db->where($condition);
			$query = $this->db->get();
			if($query->num_rows()>0)
			{
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
			else{
				$this->db->select('*');
			$this->db->from('bzz_userinfo');
			$query = $this->db->get();
			if($query->num_rows()>0)
			{
				$userinfo = $query->result_array();
				$message_data['name'] = $userinfo[0]['user_firstname'].' '.$userinfo[0]['user_lastname'];
				$message_data['user_image'] = 'default_profile_pic.png';
			}
			$messages_data[] = $message_data;
			}
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
    public function markasread($msg_id)
   {
	   $data = array(
               'read_status' => 'Y'              
            );
		$this->db->where('msg_id', $msg_id);
		if($this->db->update('bzz_messages', $data))
		return true;
		else 
		return false; 
   }
    public function markasunread($msg_id)
   {
	   $data = array(
               'read_status' => 'N'              
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
			$condition = "user_id = '".$message['sent_by']."'";
			$this->db->select('*');
			$this->db->from('bzz_user_images');
			$query = $this->db->get();
			$this->db->where($condition);
			if($query->num_rows()>0)
			{
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
			else{
				$this->db->select('*');
			$this->db->from('bzz_userinfo');
			$query = $this->db->get();
			if($query->num_rows()>0)
			{
				$userinfo = $query->result_array();
				$message_data['name'] = $userinfo[0]['user_firstname'].' '.$userinfo[0]['user_lastname'];
				$message_data['user_image'] = 'default_profile_pic.png';
			}
			$messages_data[] = $message_data;
			}
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
   
   public function disp_msg_by_id($msgid)
   {
	   if($msgid!=''){
	   $data = array(
               'read_status' => 'Y',
            );
		$this->db->where('msg_id', $msgid);
		$this->db->update('bzz_messages', $data); 
	   }
	   $this->db->select('*');
	   $this->db->from('bzz_messages');
	   $this->db->where('msg_id',$msgid);
	   $query = $this->db->get();
	   if($query->num_rows() == 1)
	   {		   
		$messages = $query->result_array();
	    $data['message'] = $messages;
	   }
	  	   
       $this->db->select('*');
	   $this->db->from('bzz_users');
	   $this->db->join('bzz_userinfo','bzz_users.user_id=bzz_userinfo.user_id AND bzz_users.user_id='.$messages[0]['sent_by']);
	   //$this->db->where('user_id',$messages[0]['sent_by']);
	   $query = $this->db->get();
	   if($query->num_rows() == 1)
	   {		   
		$user_data = $query->result_array();
	    $data['user'] = $user_data;
	   }
	   return $data;
	    print_r($data);
	  // exit;
	 //  else
	//   return false;
	   	   
   }

 public function getUnReadMessages(){
    $reciever_id = $this->session->userdata('logged_in')['account_id'];  
	$condition = "recieved_by =" . "'" . $reciever_id .  "'AND read_status ='N'";
	$this->db->select('*');
	$this->db->from('bzz_messages');
	$this->db->where($condition);
	$this->db->order_by('sent_date','desc');
	$query = $this->db->get();
	if ($query->num_rows() >0){					
				return $query->num_rows();
			}
			return false;
 }


}




?>
