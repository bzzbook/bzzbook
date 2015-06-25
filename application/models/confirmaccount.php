<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class confirmaccount extends CI_Model {

	function __construct()
    { 
   		parent::__construct(); 
  		$this->load->database("bzzbook"); 
    } 

	   
	   public function confirmUserAccount($conf_code)
	   {
		 $condition = "conf_code =" . "'" . $conf_code . "'";
		 $this->db->select('*');
		 $this->db->from('bzz_users');
		 $this->db->where($condition);
		 $query = $this->db->get();
		 if($query->num_rows() == 1)
		 {
			 $this->db->select('*');
			 $this->db->from('bzz_confirmation');
			 $this->db->where($condition);
			 $query = $this->db->get();
			 if($query->num_rows() == 1)
			 {
			 $conf_data = $query->result_array();
  			 $confirm_status = array('conf_status' => 'Y');
			 $this->db->where($condition);
			 if($this->db->update('bzz_confirmation',$confirm_status))
			 return true;
		 }else
		 return false;
	   }
	   }
	   
	   public function confirmUserAccountByOTP($access_token,$otp)
	   {
		 $condition = "access_token='".$access_token."'";
		 $this->db->select('*');
		 $this->db->from('bzz_users');
		 $this->db->where($condition);
		 $query = $this->db->get();
		 if($query->num_rows() == 1)
		 {
			 $user_data = $query->result_array();
			 if(time()<($user_data[0]['otp_timestamp']+360))
			 {
				 if($user_data[0]['conf_code']==md5($otp))
				 {
					 $this->db->select('*');
					 $this->db->from('bzz_confirmation');
					 $this->db->where($condition);
					 $query = $this->db->get();
					 if($query->num_rows() == 1)
					 {
					 $conf_data = $query->result_array();
					 $confirm_status = array('conf_status' => 'Y');
					 $this->db->where($condition);
					 if($this->db->update('bzz_confirmation',$confirm_status))
					 return true;
					 }
					 else
					 return false;
				 }else{
				 return "Invalid OTP, Please try again...";
				 }
			 }
			 else
			 {
				 return "OTP is expired, please click resend button to get new OTP.";
			 }
	  	 }
		 else
		 return "Invalid access token, please check your credentials.";
	   }
	   
		public function confirmation_insert($confirmation)
		{
			if($confirmation)
			{
				$this->db->insert('bzz_confirmation',$confirmation);
			}
		}
}
?>
