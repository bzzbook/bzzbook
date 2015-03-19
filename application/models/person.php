<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class person extends CI_Model {

	function __construct()
   { 
   		parent::__construct(); 
  		$this->load->database("bzznew"); 
    } 

	   
	   public function sign_up($user)
	   {
		   
		  if($this->db->insert('bzz_users',$user))
		 {
			  return $this->db->insert_id();
		 }else{
			 return false;
		 }

	   }
	   public function user_info($user_info)
	   {
		    $this->db->insert('bzz_userinfo',$user_info);
	   }
	   
	   
	     public function user_info($user_id)
	   {
		   $data['profile_visible'] = 'y';
		   $data['email_notification'] = 'y';
		   $data['comments_visible']= 'y';
		   $data['companies_visible'] ='y';
		   $data['user_id'] = $user_id;
		   $this->db->insert('bzz_usersettings',$data);
	   }
	   
	   public function post_buzz($data)
	   {
		   
		    $this->db->insert('posts',$data);
	   }
	   
	   public function view_post()
	   {
		  $query =  $this->db->get('posts');
	       return $query->result();
	   }
	   
	   public function postboard_update($data)
		{
		$id=$this->session->userdata('logged_in')['account_id'];
		$this->db->where('cust_id', $id);
		$this->db->update('cust_sign_up', $data);
		}
	   		
}
?>
