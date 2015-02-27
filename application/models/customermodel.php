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
	    $condition = "post_id =" . "'" . $pid . "' and account_id = $aid";
	    $this->db->select('*');
		$this->db->from('tbl_likes');
		$this->db->where($condition);
		$query = $this->db->get();
		if($query->num_rows()>0){
			$res=$query->result();
			$res_like=$res[0]->like;
			
			if($res_like == 'yes'){
				$slike="no";
			}
			else if($res_like == 'no'){
				$slike="yes";
			}
			
			
		$data1 = array('like' => $slike);

        $this->db->where(array('post_id'=>$pid,'account_id'=>$aid));
        //$where = "post_id = $pid AND account_id = $aid"; 

       // $str = $this->db->update_string('table_name', $data, $where);


		$this->db->update('tbl_likes',$data1);	
			
		}else{
	    $this->db->insert('tbl_likes',$data);
		}
		return true;
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
	   	$educationInfo = array('field_of_study'=>$data['field_of_study'],
		'college_institution'=>$data['college_institution'],
		'degree_certificate'=>$data['degree_certificate'],
		'attended_from'=>$data['year_attended_from'].'-'.$data['month_attended_from'],
		'attended_upto'=>$data['year_attended_to'].'-'.$data['month_attended_to'],
		'specialised_studies'=>$data['special_studies'],
		'cust_id'=>$this->session->userdata('logged_in')['account_id']
		);
		if($this->db->insert('education_info', $educationInfo))
			return $this->db->insert_id();
		else
			return false;
   }
   
 }
?>
