<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Companies extends CI_Model {

	function __construct()
   { 
   		parent::__construct(); 
  		  $this->load->database("bzzbook"); 
    } 

	   
	   public function sign_up($data)
	   {
		  
		    $this->db->insert('comp_sign_up', $data);

	   }
	   public function companies_list()
	   {
		   $id = $this->session->userdata('logged_in')['account_id'];
	       $condition = "user_id =" . "'" . $id .  "'";
		   $this->db->select('*');
		   $this->db->from('bzz_companyinfo');
		   $this->db->where($condition);
		   $query = $this->db->get();
		   if($query->num_rows() > 0)
		   {
			   return $query->result();
		}else{
			return false;
		}
	   }
	   	 public function following_comp_list()
	   {
		   $id = $this->session->userdata('logged_in')['account_id'];
	       $condition = "user_id =" . "'" . $id .  "'";
		   $this->db->select('*');
		   $this->db->from('bzz_companyinfo');
		   $this->db->where($condition);
		   $query = $this->db->get();
		   if($query->num_rows() > 0)
		   {
			   return $query->result();
		}else{
			return false;
		}
	   }	
public function managecompanydata($data,$img_name)
{
		$company_info = array(
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
		);
	   if( $this->db->insert('bzz_companyinfo', $company_info))
	   return $this->db->insert_id();
	   else
	   return false;
	
}


}
?>
