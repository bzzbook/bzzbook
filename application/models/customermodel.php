<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Customermodel extends CI_Model {

	function __construct()
    { 
   		parent::__construct(); 
  		
    } 
	
	function post_buzz($data){
		 $this->db->insert('bzz_posts',$data);
		 return $this->db->insert_id();
	}
	function post_to_wall($data){
		 $this->db->insert('bzz_posts_postedto',$data);
		 return true;
	}
	function insertfav($data){
		 if($this->db->insert('bzz_favorites',$data))
		 return true;
		 else
		 return false;
	}
	public function All_Posts(){
		
  	    $id = $this->session->userdata('logged_in')['account_id'];
	    $condition = "user_id =" . "'" . $id . "' AND request_status = 'Y'";
		$this->db->select('*');
		$this->db->from('bzz_userfriends');
		$this->db->where($condition);
		$query = $this->db->get();
			$friends = array();
		if ($query->num_rows() > 0) {
			$res = $query->result();
			if($res)
			{
			foreach($res as $friend)	
			{
			   $friends[] =	$friend->friend_id;
			}
			}
		}	
	   $friends[] =  $id;
	   $this->db->select('*');
	   $this->db->from('bzz_posts');
/*	   $this->db->where_in('posted_by',$friends);
*/	   $this->db->order_by("post_id","desc");
	   $query = $this->db->get();
   	   if ($query->num_rows() > 0) {
	   		$result =  $query->result();
			$posts = array();
			foreach($result as $res){
		    $friend_ids = explode(',',$res->posted_to);
			if(($res->posted_to==0 && in_array($res->posted_by,$friends))|| $res->posted_by==$id || in_array($id, $friend_ids))
			{
				$posts[] = $res;
			}
			}
			return $posts;
	   } 
	   else 
	   return false;
   }
   public function profiledata($id){
	    $condition = "user_id =" . "'" . $id . "'";
		$this->db->select('*');
		$this->db->from('bzz_userinfo');
		$this->db->join('bzz_user_images','bzz_userinfo.user_id=bzz_user_images.user_id AND bzz_userinfo.user_id='.$id);
		$this->db->order_by('bzz_user_images.user_imageinfo_id','desc');
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
	    $pid=$data['like_on'];
	    $aid=$data['liked_by'];
	   // $like=$data['like'];
	    $condition = "like_on =" . $pid . " AND liked_by =".$aid;
	    $this->db->select('*');
		$this->db->from('bzz_likes');
		$this->db->where($condition);
		$query = $this->db->get();
		if($query->num_rows()>0){
			$res=$query->result();
			$res_like=$res[0]->like_status;			
			if($res_like == 'Y' ){
				$slike="N";
			}
			else if($res_like == 'N'){
				$slike="Y";
			}
			$like_count = count($this->customermodel->likedata($pid));
		$data1 = array('like_status' => $slike);
        $this->db->where($condition);
  		$this->db->update('bzz_likes',$data1);	
	    $data1 = array('like_status' => $slike,'like_count' => $like_count);
			echo json_encode($data1);
		}
		else{
	    $this->db->insert('bzz_likes',$data);
			$data1 = array('like_status' => 'Y','like_count' => $like_count);
			echo json_encode($data1);
		}
		
   }
   public function likedata($pid){
	    $condition = "like_on =" . "'" . $pid . "' AND like_status = 'Y'";
		$this->db->select('*');
		$this->db->from('bzz_likes');
		$this->db->where($condition);
		$query = $this->db->get();
		//return $query->num_rows();
		return $query->result();
		
   }
   public function write_comments($data){
	    $this->db->insert('bzz_postcomments',$data);
   }
   public function comments_data($pid){
	   $condition = "commented_on =" . "'" . $pid . "' and comment_content != ''";
		$this->db->select('*');
		$this->db->from('bzz_postcomments');
		$this->db->where($condition);
		$query = $this->db->get();
		//return $query->num_rows();
		return $query->result(); 
   }
   public function updateAboutInfo($data)
   {
	//	$updated_data=array('');  
	$updateddata = array(
		'user_about'=>$data['about_me_info'],
		'user_intrests'=>$data['about_me_intrests'],
		'user_skills'=>$data['about_me_skills']
	);
	$this->db->where('user_id',$this->session->userdata('logged_in')['account_id']);
	if($this->db->update('bzz_userinfo',$updateddata))
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
		$this->db->where('user_id',$this->session->userdata('logged_in')['account_id']);
		if($this->db->update('bzz_usersettings',$updatedata))
			return true;
		else
			return false;	
   }
   
   public function updateEmailInfo($data)
   {
	  $updatedata = array(
		'email_notification'=>$data['email_notofication'],
	  ); 
	  $this->db->where('user_id',$this->session->userdata('logged_in')['account_id']);
	  if($this->db->update('bzz_usersettings',$updatedata))
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
		'user_id'=>$this->session->userdata('logged_in')['account_id']
		);
		if($data['edu_action']=='add')
		{
		if($this->db->insert('bzz_educationinfo', $educationInfo))
			return $this->db->insert_id();
		else
			return false;
		}
		else if($data['edu_action']=='update')
		{
			//$educationInfo['educationinfo_id']=$data['edu_form_id'];
			$this->db->where('educationinfo_id', $data['edu_form_id']);
			if($this->db->update('bzz_educationinfo', $educationInfo))
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
			
		'user_id'=>$this->session->userdata('logged_in')['account_id']
		);
		if(isset($data['current']))
			$professionInfo['current_job']=$data['current'];
		if($data['prof_action']=='add')
		{
		if($this->db->insert('bzz_professionalinfo', $professionInfo))
			return $this->db->insert_id();
		else
			return false;
		}
		elseif($data['prof_action']=='update')
		{
			//$professionInfo['professionalinfo_id']=$data['prof_form_id'];
			$this->db->where('professionalinfo_id', $data['prof_form_id']);
			if($this->db->update('bzz_professionalinfo', $professionInfo))
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
		'user_id'=>$this->session->userdata('logged_in')['account_id']
		);
		if($data['org_action']=='add')
		{
		if($this->db->insert('bzz_organizationinfo', $organizationInfo))
			return $this->db->insert_id();
		else
			return false;
		}
		elseif($data['org_action']=='update')
		{
			//$organizationInfo['organization_id']=$data['org_form_id'];
			$this->db->where('organization_id', $data['org_form_id']);
			if($this->db->update('bzz_organizationinfo', $organizationInfo))
			return true;
			else 
			return false; 
		}
   }
    public function managegroupdata($data)
   {
	   	$groupInfo = array(
		'group_name'=>$data['group_name'],
		'group_type'=>$data['group_type'],
		'group_web_url'=>$data['website_url'],
		'group_state'=>$data['usa_states'],
		'group_postalcode'=>$data['postal_code'],
		'group_about'=>$data['additional_info'],
		'group_city'=>$data['city'],
		'user_id'=>$this->session->userdata('logged_in')['account_id']
		);
		if($data['grp_action']=='add')
		{
		if($this->db->insert('bzz_groupinfo',$groupInfo))
			return $this->db->insert_id();
		else
			return false;
		}
		elseif($data['grp_action']=='update')
		{
			//$groupInfo['groupinfo_id']=$data['grp_form_id'];
			$this->db->where('groupinfo_id', $data['grp_form_id']);
			if($this->db->update('bzz_groupinfo', $groupInfo))
			return true;
			else 
			return false; 
		}
   }
   
    public function managepostboarddata($data)
   {
	   	$userInfo = array(
		'user_firstname'=>$data['firstname'],
		'user_lastname'=>$data['lastname'],
		'user_jobtype'=>$data['position'],
		'user_industry'=>$data['industry'],
		'user_cmpname'=>$data['companyname'],
		);
		
		$user =array(
		'user_email'=>$data['email'],
		'password'=>md5($data['password']),
		//'con_password'=>md5($data['con_password']),
		'user_country'=>$data['country'],
		'user_state'=>$data['state'],
		'user_city'=>$data['city'],
		'user_postalcode'=>$data['postal_code'],
		);
		//'other_industry'=>$data['oth_industry'],
		$this->db->where('user_id',$this->session->userdata('logged_in')['account_id']);
		if($this->db->update('bzz_userinfo',$userInfo))
  $con1 = true;
  $this->db->where('user_id',$this->session->userdata('logged_in')['account_id']);
  if($this->db->update('bzz_users',$user))
  $con2 = true;
  if($con1 && $con2)
  return true;
  else
  return false;
		
   }
	function get_time_difference_php($created_time)
 {
        date_default_timezone_set('Asia/Calcutta'); //Change as per your default time
        $str = strtotime($created_time);
        $today = strtotime(date('Y-m-d H:i:s'));

        // It returns the time difference in Seconds...
        $time_differnce = $today-$str;

        // To Calculate the time difference in Years...
        $years = 60*60*24*365;

        // To Calculate the time difference in Months...
        $months = 60*60*24*30;

        // To Calculate the time difference in Days...
        $days = 60*60*24;

        // To Calculate the time difference in Hours...
        $hours = 60*60;

        // To Calculate the time difference in Minutes...
        $minutes = 60;

        if(intval($time_differnce/$years) > 1)
        {
            return intval($time_differnce/$years)." years ago";
        }else if(intval($time_differnce/$years) > 0)
        {
            return intval($time_differnce/$years)." year ago";
        }else if(intval($time_differnce/$months) > 1)
        {
            return intval($time_differnce/$months)." months ago";
        }else if(intval(($time_differnce/$months)) > 0)
        {
            return intval(($time_differnce/$months))." month ago";
        }else if(intval(($time_differnce/$days)) > 1)
        {
            return intval(($time_differnce/$days))." days ago";
        }else if (intval(($time_differnce/$days)) > 0) 
        {
            return intval(($time_differnce/$days))." day ago";
        }else if (intval(($time_differnce/$hours)) > 1) 
        {
            return intval(($time_differnce/$hours))." hours ago";
        }else if (intval(($time_differnce/$hours)) > 0) 
        {
            return intval(($time_differnce/$hours))." hour ago";
        }else if (intval(($time_differnce/$minutes)) > 1) 
        {
            return intval(($time_differnce/$minutes))." minutes ago";
        }else if (intval(($time_differnce/$minutes)) > 0) 
        {
            return intval(($time_differnce/$minutes))." minute ago";
        }else if (intval(($time_differnce)) > 1) 
        {
            return intval(($time_differnce))." seconds ago";
        }else
        {
            return "few seconds ago";
        }
  } 
 }
?>
