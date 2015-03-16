<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Customermodel extends CI_Model {

	function __construct()
    { 
   		parent::__construct(); 
  		
    } 
	
	function post_buzz($data){
		 $this->db->insert('posts',$data);
		 return true;
	}
	public function All_Posts(){
	   $this->db->select('*');
	   $this->db->from('posts');
	   $this->db->order_by("id","desc");
	   $query = $this->db->get();
   	   if ($query->num_rows() > 0) {
	   		return  $query->result();
		
	   } 
   }
   public function profiledata($id){
	    $condition = "account_id =" . "'" . $id . "'";
		$this->db->select('*');
		$this->db->from('sign_up');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();

		if ($query->num_rows() == 1) {
			return $query->result();
		} else {
		return false;
		}
   }
   
   public function insertlinks($data)
   {
	    $pid=$data['post_id'];
	    $aid=$data['account_id'];
	    $like=$data['like'];
	    $condition = "post_id =" . $pid . " AND account_id =".$aid;
	    $this->db->select('*');
		$this->db->from('tbl_likes');
		$this->db->where($condition);
		$query = $this->db->get();
		if($query->num_rows()>0){
			$res=$query->result();
			$res_like=$res[0]->like;			
			if($res_like == 'yes' ){
				$slike="no";
			}
			else if($res_like == 'no' || $res_like == ''){
				$slike="yes";
			}
		$data1 = array('like' => $slike);
        $this->db->where(array('post_id'=>$pid,'account_id'=>$aid));
  		$this->db->update('tbl_likes',$data1);	
			echo json_encode($data1);
		}
		else{
	    $this->db->insert('tbl_likes',$data);
			$data1 = array('like' => 'yes');
			echo json_encode($data1);
		}
		
   }
   public function likedata($pid){
	    $condition = "post_id =" . "'" . $pid . "'";
		$this->db->select('*');
		$this->db->from('tbl_likes');
		$this->db->where($condition);
		$query = $this->db->get();
		//return $query->num_rows();
		return $query->result();
		
   }
   public function write_comments($data){
	    $this->db->insert('tbl_likes',$data);
   }
   public function comments_data($pid){
	   $condition = "post_id =" . "'" . $pid . "' and comment != ''";
		$this->db->select('*');
		$this->db->from('tbl_likes');
		$this->db->where($condition);
		$query = $this->db->get();
		//return $query->num_rows();
		return $query->result(); 
   }
   public function updateAboutInfo($data)
   {
	//	$updated_data=array('');  
	$updateddata = array(
		'about'=>$data['about_me_info'],
		'intrests'=>$data['about_me_intrests'],
		'skills'=>$data['about_me_skills']
	);
	$this->db->where('cust_id',$this->session->userdata('logged_in')['account_id']);
	if($this->db->update('cust_sign_up',$updateddata))
	return true;
	else
	return false;	
   }
   
   public function updatePrivacyInfo($data)
   {
		$updatedata = array(
		'profile_visible'=>$data['profile_visible'],
		'comments_visible'=>$data['comments_visible'],
		'companies_visible'=>$data['companies_visible']
		);
		$this->db->where('cust_id',$this->session->userdata('logged_in')['account_id']);
		if($this->db->update('cust_sign_up',$updatedata))
			return true;
		else
			return false;	
   }
   
   public function updateEmailInfo($data)
   {
	  $updatedata = array(
		'email_notification'=>$data['email_notofication'],
	  ); 
	  $this->db->where('cust_id',$this->session->userdata('logged_in')['account_id']);
	  if($this->db->update('cust_sign_up',$updatedata))
			return true;
		else
			return false;
   }
   
   public function manageeducationdata($data)
   {
	   	$educationInfo = array(
		'field_of_study'=>$data['field_of_study'],
		'college_institution'=>$data['college_institution'],
		'degree_certificate'=>$data['degree_certificate'],
		'attended_from'=>$data['year_attended_from'].'-'.$data['month_attended_from'],
		'attended_upto'=>$data['year_attended_to'].'-'.$data['month_attended_to'],
		'specialised_studies'=>$data['special_studies'],
		'cust_id'=>$this->session->userdata('logged_in')['account_id']
		);
		if($data['edu_action']=='add')
		{
		if($this->db->insert('education_info', $educationInfo))
			return $this->db->insert_id();
		else
			return false;
		}
		else if($data['edu_action']=='update')
		{
			$this->db->where('cust_id', $educationInfo['cust_id']);
			if($this->db->update('education_info', $educationInfo))
			return true;
			else 
			return false; 
		}
   }
    public function manageprofessiondata($data)
   {
	   	$professionInfo = array(
		'job_title'=>$data['job_title'],
		'start_date'=>$data['year_attended_from'].'-'.$data['month_attended_from'],
		'end_date'=>$data['year_attended_to'].'-'.$data['month_attended_to'],
		'job_description'=>$data['job_description'],	
		'cust_id'=>$this->session->userdata('logged_in')['account_id']
		);
		if(isset($data['current']))
			$professionInfo['current_job']=$data['current'];
		if($data['prof_action']=='add')
		{
		if($this->db->insert('profession_info', $professionInfo))
			return $this->db->insert_id();
		else
			return false;
		}
		elseif($data['prof_action']=='update')
		{
			$this->db->where('cust_id', $professionInfo['cust_id']);
			if($this->db->update('profession_info', $professionInfo))
			return true;
			else 
			return false; 
		}
   }
    public function manageorganizationdata($data)
   {
	   	$organizationInfo = array(
		'org_name'=>$data['org_name'],
		'position'=>$data['position'],
		'emp_status'=>$data['emp_status'],
		'start_date'=>$data['year_attended_from'].'-'.$data['month_attended_from'],
		'end_date'=>$data['year_attended_to'].'-'.$data['month_attended_to'],
		'org_desc'=>$data['org_description'],
		'cust_id'=>$this->session->userdata('logged_in')['account_id']
		);
		if($data['org_action']=='add')
		{
		if($this->db->insert('organization_info', $organizationInfo))
			return $this->db->insert_id();
		else
			return false;
		}
		elseif($data['org_action']=='update')
		{
			$this->db->where('cust_id', $organizationInfo['cust_id']);
			if($this->db->update('organization_info', $organizationInfo))
			return true;
			else 
			return false; 
		}
   }
    public function managegroupdata($data)
   {
	   	$groupInfo = array(
		'grp_name'=>$data['group_name'],
		'grp_type'=>$data['group_type'],
		'web_url'=>$data['website_url'],
		'state'=>$data['usa_states'],
		'postal_code'=>$data['postal_code'],
		'additional_info'=>$data['additional_info'],
		'city'=>$data['city'],
		'cust_id'=>$this->session->userdata('logged_in')['account_id']
		);
		if($data['grp_action']=='add')
		{
		if($this->db->insert('group_info',$groupInfo))
			return $this->db->insert_id();
		else
			return false;
		}
		elseif($data['grp_action']=='update')
		{
			$this->db->where('cust_id', $groupInfo['cust_id']);
			if($this->db->update('group_info', $groupInfo))
			return true;
			else 
			return false; 
		}
   }
   
    public function managepostboarddata($data)
   {
	   	$postboardInfo = array(
		'first_name'=>$data['firstname'],
		'last_name'=>$data['lastname'],
		'email'=>$data['email'],
		'password'=>md5($data['password']),
		'con_password'=>md5($data['con_password']),
		'country'=>$data['country'],
		'state'=>$data['state'],
		'city'=>$data['city'],
		'postal_code'=>$data['postal_code'],
		'job_type'=>$data['position'],
		'industry'=>$data['industry'],
		'company_name'=>$data['companyname'],);
		//'other_industry'=>$data['oth_industry'],
		$this->db->where('cust_id',$this->session->userdata('logged_in')['account_id']);
		if($this->db->update('cust_sign_up',$postboardInfo))
			return true;
		else
			return false;	
   }
 
 }
?>
