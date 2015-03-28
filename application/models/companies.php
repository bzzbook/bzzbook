<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Companies extends CI_Model {

	function __construct()
   { 
   		parent::__construct(); 
  		  $this->load->database("bzzbook"); 
		  $is_logged = $this->session->userdata('logged_in');	
		if(!$is_logged)
		redirect(base_url());
    } 

	   
	   public function sign_up($data)
	   {
		  
		    $this->db->insert('comp_sign_up', $data);

	   }
	   public function companies_list($limit=0)
	   {
		   $id = $this->session->userdata('logged_in')['account_id'];
	       $condition = "user_id =" . "'" . $id .  "'";
		   $this->db->select('*');
		   $this->db->from('bzz_companyinfo');
		   $this->db->where($condition);
		   if($limit!= 0)
		   $this->db->limit($limit);
		   $query = $this->db->get();
		   if($query->num_rows() > 0)
		   {
			   return $query->result();
		}else{
			return false;
		}
	   }  
	   	 public function following_companies_list($limit=0)
	   {
		   $id = $this->session->userdata('logged_in')['account_id'];
	       $condition = "user_id =" . "'" . $id . "'" . " AND " . "follow_status = 'Y' ";
		   $this->db->select('*');
		   $this->db->from('bzz_cmp_follow');
		   $this->db->where($condition);
		   if($limit!= 0)
		   $this->db->limit($limit);
		   $query = $this->db->get();
		   $companies = array();
		   if($query->num_rows() > 0)
		   {
			   $result = $query->result_array();
			  
			   foreach($result as $row):
			   $cmp_id= $row['companyinfo_id'];
			 
				   $condition = "companyinfo_id =". "'" . $cmp_id . "'";
				   $this->db->select('*');
			       $this->db->from('bzz_companyinfo');
				   $this->db->where($condition);
				   
				   $query = $this->db->get();
				   if ($query->num_rows() > 0) {
				   $company = $query->result_array();	
				   $companies[] = $company[0];
		           }
	            	endforeach;
		   return $companies;
		   }
		   
	   }
public function managecompanydata($data)
{
	/*	$company_info = array(
		'cmp_name'=>$data['cmp_name'],
		'cmp_industry'=>$data['cmp_industry'],
		'cmp_estb'=>$data['cmp_estb'],
		'cmp_colleagues'=>$data['cmp_colleagues'],
		'cmp_about'=>$data['cmp_about'],
		'company_address'=>$data['company_address'],
		'company_state'=>$data['company_state'],
		'company_city'=>$data['company_city'],	
		'company_postalcode'=>$data['company_postalcode'],
		'company_email'=>$data['company_email'],
		'company_phone'=>$data['company_phone'],
		'company_office'=>$data['company_office'],		
		'company_fax'=>$data['company_fax'],
		'company_image'=>$img_name,
		'user_id'=>$this->session->userdata('logged_in')['account_id']
		);*/
	   if( $this->db->insert('bzz_companyinfo',$data))
	   return true;
	   else
	   return false;
	
}

	   public function other_companies($limit=2)
	   {
		   $id = $this->session->userdata('logged_in')['account_id'];
	       $condition = "user_id !=" . "'" . $id .  "'";
		   $this->db->select('*');
		   $this->db->from('bzz_companyinfo');
		   $this->db->where($condition);
		   if($limit!= 0)
		   $this->db->limit($limit);
		   $query = $this->db->get();
		   if($query->num_rows() > 0)
		   {
			   return $query->result();
		}else{
			return false;
		}
	   }
	   
	   public function company_follow($data)
	   {
		       $condition =  "user_id !=" . "'" . $data['user_id'] . "'" . " AND " . "companyinfo_id = ". "'" .$data['companyinfo_id'] ."'";
		   	   $this->db->where($condition);
		       $res = $this->db->get('bzz_cmp_follow');
			   $result = $res->result_array();
			 /* print_r($result);
			  echo $result[0]['companyinfo_id'];
			 exit;*/
		  if($data['companyinfo_id'] == $result[0]['companyinfo_id'] && $data['user_id'] == $result[0]['user_id'])
		       {
			    $con =  "user_id =" . "'" . $data['user_id'] . "'" . " AND " . "companyinfo_id = ". "'" .$data['companyinfo_id'] ."'";
			   $this->db->where($con);
			   
			   $this->db->update('bzz_cmp_follow',$data);
			   }else{
		   $this->db->insert('bzz_cmp_follow',$data);
	   }
	   }
	   public function company_unfollow($cmpinfo_id)
	   {
		   $data= array(
		   'user_id' => $this->session->userdata('logged_in')['account_id'],
		   'companyinfo_id' => $cmpinfo_id,
		   'follow_status' => 'N'
		   );
		   $id = $this->session->userdata('logged_in')['account_id'];
		   $condition =  "user_id =" . "'" . $id . "'" . " AND " . "companyinfo_id =" . "'" . $cmpinfo_id .  "'"; 
		   $this->db->where($condition);
		   $this->db->update('bzz_cmp_follow', $data); 
	   }


public function get_mn_cmp_list()
	{
		$id = $this->session->userdata('logged_in')['account_id'];
	    $condition = "user_id =" . "'" . $id . "'";
		$this->db->select('*');
		$this->db->from('bzz_companyinfo');
		$this->db->where($condition);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
		return false;
		}
	}
	
	
	public function get_companies_to_follow()
	{
	    $id = $this->session->userdata('logged_in')['account_id'];
	    $condition = "user_id =" . "'" . $id . "' AND request_status='Y'";
		$this->db->select('*');
		$this->db->from('bzz_userfriends');
		$this->db->where($condition);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			$friends = $query->result_array();
			$company = array();
			$companies = array();
			foreach($friends as $friend)
			{
				  $id = $this->session->userdata('logged_in')['account_id'];
			    $condition = "user_id =" . "'" . $friend['friend_id'] . "' AND follow_status='Y'" ;
				
				$query = $this->db->get('bzz_cmp_follow');
				$followers = $query->result_array();
				//print_r($followers);
				//echo $followers[0]['user_id'];
				//echo $followers[0]['follow_status'];
				//exit;
				if($followers[0]['user_id'] == $id && $followers[0]['follow_status'] == 'Y' )
				{
				$this->db->select('*');
				$this->db->from('bzz_cmp_follow');
				$this->db->where($condition);
				$query = $this->db->get();
				if($query->num_rows() > 0) {
					$result_cmp = $query->result_array();	
					
					foreach($result_cmp as $cmp)
					{
						$condition = "companyinfo_id =" . "'" . $cmp['companyinfo_id'] . "'";
						$this->db->select('*');
						$this->db->from('bzz_companyinfo');
						$this->db->where($condition);
						$query = $this->db->get();
						if($query->num_rows()>0)
						{
							$result = $query->result_array();
							$companies[] = $result[0];
						}
					}
					
				}
				}
		}
			return $companies;
		} else {
		return false;
		}
   
	}
	
	public function get_cmp_by_id($id)
	{
		$condition = "companyinfo_id =" . "'" . $id . "'";
		$this->db->select('*');
		$this->db->from('bzz_companyinfo');
		$this->db->where($condition);
		$query = $this->db->get();
		if($query->num_rows()>0)
		{
			return $query->result_array();
		}
	}
}
?>
