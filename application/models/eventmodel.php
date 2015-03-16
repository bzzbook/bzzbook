<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Jobmodel extends CI_Model {

	function __construct()
    { 
   		parent::__construct(); 
  		
    } 
	
	public function insert_event()
	{
		 	$jobInfo = array(
		'job_title'=>$data['job_title'],
		'job_type'=>$data['job_type'],
		'job_category'=>$data['job_category'],
		'job_salary'=>$data['salary'],
		'job_keyword'=>$data['job_keywords'],
		'job_company_name'=>$data['company_name'],
		'job_industry'=>$data['industry'],
		'job_address'=>$data['address'],
		'job_state'=>$data['state'],
		'job_city'=>$data['city'],
		'job_postal_code'=>$data['postal_code'],
		'job_contact_name'=>$data['name'],
		'job_contact_phone'=>$data['phone'],
		'job_contact_email'=>$data['email'],
		'job_how_to_apply'=>$data['apply_procedure'],
		'job_description'=>$data['job_description'],
		'job_requirements'=>$data['job_requirements'],
		'cust_id'=>$this->session->userdata('logged_in')['account_id']
		);
		
		if($this->db->insert('jobs', $jobInfo))
			return $this->db->insert_id();
		else
			return false;
	} 
 }
?>
