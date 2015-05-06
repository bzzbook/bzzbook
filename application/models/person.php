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
		    if($this->db->insert('bzz_userinfo',$user_info))
			return true;
			else
			return false;
	   }
	   
	   
	     public function user_settings($user_id)
	   {
		   $data['profile_visible'] = 'y';
		   $data['email_notification'] = 'y';
		   $data['comments_visible']= 'y';
		   $data['companies_visible'] ='y';
		   $data['user_id'] = $user_id;
		   $this->db->insert('bzz_usersettings',$data);
	   }
	   
	   public function user_sidebar_settings($user_id)
	   {
		$data['pend_frnd_requests']  = 'y';
		$data['latest_frnds'] = 'y';
		$data['your_add_one'] = 'y';
		$data['add_friends'] = 'y';
		$data['companies_to_follow'] = 'y';
		$data['companies_im_following'] = 'y';	
		$data['your_add_two'] = 'y';
		$data['my_companies'] = 'y';
		$data['user_id'] = $user_id;
		$this->db->insert('bzz_sidebar_display_settings',$data);
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
		
		public function get_user_details($user_id)
		{
			$condition = "user_id =" . "'" . $user_id . "'" ;
			$this->db->select('*');
			$this->db->from('bzz_users');
			$this->db->where($condition);
			$query = $this->db->get();
			if($query->num_rows() == 1){
			return $query->result_array();
			}
			return false;
		}
	   		
}
?>
