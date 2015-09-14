<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile_set extends CI_Model {

	function __construct()
    { 
   		parent::__construct(); 
  		
    } 
	
   public function save_settings($user_id){
	    
		if($user_id!='')
		{
		$id = $user_id;
		
		}else{
		$id = $this->session->userdata('logged_in')['account_id'];
		}
	    $condition = "user_id =" . "'" . $id . "'";
		$this->db->select('*');
		$this->db->from('bzz_userinfo');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() == 1) {
			return $query->result();
		} else {
		return false;
		}
   }
   
   
    public function get_userinfo($user_id){
		
		if($user_id!='')
		{
		$id = $user_id;
		
		}else{
		$id = $this->session->userdata('logged_in')['account_id'];
		}

		$condition = "user_id =" . "'" . $id . "'";
		$this->db->select('*');
		$this->db->from('bzz_userinfo');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() == 1) {
			return $query->result_array();
		} else {
		return false;
		}
   }
   
   public function get_user()
   {
	    $id = $this->session->userdata('logged_in')['account_id'];
	    $condition = "user_id =" . "'" . $id . "'";
		$this->db->select('*');
		$this->db->from('bzz_users');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() == 1) {
			return $query->result();
		} else {
		return false;
		}
	   
   }
   public function get_user_settings()
   {
	      $id = $this->session->userdata('logged_in')['account_id'];
	    $condition = "user_id =" . "'" . $id . "'";
		$this->db->select('*');
		$this->db->from('bzz_usersettings');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() == 1) {
			return $query->result();
		} else {
		return false;
		}
   }
   public function geteducationDetails()
   {
	    $id = $this->session->userdata('logged_in')['account_id'];
	    $condition = "user_id =" . "'" . $id . "'";
		$this->db->select('*');
		$this->db->from('bzz_educationinfo');
		$this->db->where($condition);
		$this->db->order_by("attended_upto", "desc");
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
		return false;
		}
   }
   public function getprofessionDetails()
   {
	    $id = $this->session->userdata('logged_in')['account_id'];
	    $condition = "user_id =" . "'" . $id . "'";
		$this->db->select('*');
		$this->db->from('bzz_professionalinfo');
		$this->db->where($condition);
		$this->db->order_by("end_date", "desc");
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return false;
		}
   }
   
   public function getorganizationDetails($user_id)
   {
	   	   
	   if($user_id!='')
		{
		$id = $user_id;
		
		}else{
		$id = $this->session->userdata('logged_in')['account_id'];
		}
	    
	 	$condition = "user_id =" . "'" . $id . "'";
		$this->db->select('*');
		$this->db->from('bzz_organizationinfo');
		$this->db->where($condition);
		$this->db->order_by("end_date", "desc"); 
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
		return false;
		}
   }
   
   
     public function get_college_details($user_id)
   {
	
	   	if($user_id!='')
		{
		$id = $user_id;
		
		}else{
		$id = $this->session->userdata('logged_in')['account_id'];
		}
	   
	    $condition = "user_id =" . "'" . $id . "'";
		$this->db->select('*');
		$this->db->from('bzz_user_college');
		$this->db->where($condition);
		$this->db->order_by("college_id", "desc"); 
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
		return false;
		}
   }
   
        public function get_school_details($user_id)
   {
	   	if($user_id!='')
		{
		$id = $user_id;
		
		}else{
		$id = $this->session->userdata('logged_in')['account_id'];
		}
	    
	    $condition = "user_id =" . "'" . $id . "'";
		$this->db->select('*');
		$this->db->from('bzz_user_school');
		$this->db->where($condition);
		$this->db->order_by("school_id", "desc"); 
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
		return false;
		}
   }
   
   public function getgroupDetails()
   {
	    $id = $this->session->userdata('logged_in')['account_id'];
	    $condition = "user_id =" . "'" . $id . "'";
		$this->db->select('*');
		$this->db->from('bzz_groupinfo');
		$this->db->where($condition);
		$this->db->order_by("groupinfo_id", "desc");
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
		return false;
		}
   }
   //data retrieval by limit
   
      public function geteducationList()
   {
	    $id = $this->session->userdata('logged_in')['account_id'];
	    $condition = "user_id =" . "'" . $id . "'";
		$this->db->select('*');
		$this->db->from('bzz_educationinfo');
		$this->db->where($condition);
		$this->db->order_by("attended_upto", "desc");
		$query = $this->db->get("","1");
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
		return false;
		}
   }
   public function getprofessionList()
   {
	    $id = $this->session->userdata('logged_in')['account_id'];
	    $condition = "user_id =" . "'" . $id . "'";
		$this->db->select('*');
		$this->db->from('bzz_professionalinfo');
		$this->db->where($condition);
		$this->db->order_by("end_date", "desc");
		$query = $this->db->get("","1");
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
		return false;
		}
   }
   
   public function getorganizationList()
   {
	    $id = $this->session->userdata('logged_in')['account_id'];
	    $condition = "user_id =" . "'" . $id . "'";
		$this->db->select('*');
		$this->db->from('bzz_organizationinfo');
		$this->db->where($condition);
		$this->db->order_by("end_date", "desc"); 
		$query = $this->db->get("","1");
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
		return false;
		}
   }
   
   public function getgroupList()
   {
	    $id = $this->session->userdata('logged_in')['account_id'];
	    $condition = "user_id =" . "'" . $id . "'";
		$this->db->select('*');
		$this->db->from('bzz_groupinfo');
		$this->db->where($condition);
		$this->db->order_by("groupinfo_id", "desc");
		$query = $this->db->get("","1");
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
		return false;
		}
   }
   
   
   //functio0n for adding  groups
   
   public function get_groups()
   {
	    $id = $this->session->userdata('logged_in')['account_id'];
	    $condition = "user_id =" . "'" . $id . "'";
		$this->db->select('*');
		$this->db->from('bzz_groupinfo');
		$this->db->where($condition);
		$this->db->order_by("groupinfo_id");
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
		return false;
		}
   }
   
   
   
   // deleting individual education details by id
   
   public function delEduDetails($id)
   {
	   $this->db->where('educationinfo_id', $id);
       $this->db->delete('bzz_educationinfo'); 
   }
   
   public function delProfDetails($id)
   {
	   $this->db->where('professionalinfo_id', $id);
       $this->db->delete('bzz_professionalinfo'); 
   }
   
   public function delOrgDetails($id)
   {
	   $this->db->where('organization_id', $id);
       $this->db->delete('bzz_organizationinfo'); 
   }
   
   
   
    public function del_mobile_by_id($id)
   {
	   $this->db->where('mobile_id', $id);
      if($this->db->delete('bzz_mobile_nos')) 
	return true;
	else
	return false;
   }
   
    public function del_oth_acc_by_id($id)
   {
	   $this->db->where('account_id', $id);
      if($this->db->delete('bzz_other_accounts')) 
	return true;
	else
	return false;
   }
   
     public function del_Organization_Details($id)
   {	  
	$this->db->where('organization_id',$id);
	if( $this->db->delete('bzz_organizationinfo'))
	return true;
	else
	return false;
   }
   public function delGrpDetails($id)
   {
	   $this->db->where('groupinfo_id', $id);
       $this->db->delete('bzz_groupinfo'); 
   }
   
    // editing individual education details by id
  
    public function editEduDetails($id)
	{
		$this->db->select('*');
		$this->db->from('bzz_educationinfo');
		$this->db->where('educationinfo_id', $id);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
		return false;
		}
	}
	public function editProfDetails($id)
	{
		$this->db->select('*');
		$this->db->from('bzz_professionalinfo');
		$this->db->where('professionalinfo_id', $id);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
		return false;
		}
	}
	public function editOrgDetails($id)
	{
		$this->db->select('*');
		$this->db->from('bzz_organizationinfo');
		$this->db->where('organization_id', $id);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
		return false;
		}
	}
	
	public function editCollegeDetails($id)
	{
		$this->db->select('*');
		$this->db->from('bzz_user_college');
		$this->db->where('college_id', $id);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
		return false;
		}
	}
	
	public function editSchoolDetails($id)
	{
		$this->db->select('*');
		$this->db->from('bzz_user_school');
		$this->db->where('school_id', $id);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
		return false;
		}
	}
	
	
	public function editGrpDetails($id)
	{
		$this->db->select('*');
		$this->db->from('bzz_groupinfo');
		$this->db->where('groupinfo_id',$id);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
		return false;
		}
	}
	public function insert_profile_pic($filename,$thumbnail,$img_fav)
    {
	
        $data = array(
            'user_img_name' => $filename,
			'user_img_thumb' => $thumbnail,
			'user_img_fav' => $img_fav,
			'user_id' => $this->session->userdata('logged_in')['account_id']
        );
        $this->db->insert('bzz_user_images', $data);
        return $this->db->insert_id();
			
			 $image = $this->profile_set->get_profile_pic();
		 
		$figure= "<figure class='cmplogo'><img src='".base_url()."uploads/".$image[0]->user_img_thumb."' alt='".base_url()."uploads/".$image[0]->user_img_thumb."'></figure>";
		
  echo $figure;
  
}
public function croped_profile_pic($thumbnail)
    {
	
        $data = array(
            'user_img_name' => $thumbnail,
			
			'user_id' => $this->session->userdata('logged_in')['account_id']
        );
        $this->db->insert('bzz_user_images', $data);
        return $this->db->insert_id();
  
}
public function add_pics($filename)
{
	 $data = array(
            'image' => substr($filename,6),
			'image_thumb' => $filename,
			'user_id' => $this->session->userdata('logged_in')['account_id']
        );
        $this->db->insert('bzz_user_uploads', $data);
        return $this->db->insert_id();
	
}
public function  add_user_videos($filename)
{
	$data = array(
            'video_name' => $filename,
			'user_id' => $this->session->userdata('logged_in')['account_id']
        );
        $this->db->insert('bzz_user_videos', $data);
        return $this->db->insert_id();
}

public function get_profile_pic($usr_id='')
{
	if(empty($usr_id))
	$user_id = $this->session->userdata('logged_in')['account_id'];
	else 
	$user_id = $usr_id;
	$condition = "user_id ='".$user_id."'";
	$this->db->where($condition);
	$this->db->order_by("user_imageinfo_id", "desc");
	$query = $this->db->get('bzz_user_images','1');
	if ($query->num_rows() > 0) {
		return $query->result();
	} else {
	return false;
	}
}
/*public function get_all_profile_pics()
{
$this->db->order_by("img_info_id", "desc");
$query = $this->db->get('images','9');
if ($query->num_rows() > 0) {
			return $query->result();
		} else {
		return false;
		}
}*/


public function disp_friends($grp_id)
{
  $id = $this->session->userdata('logged_in')['account_id'];
	    $condition = "user_id =" . "'" . $id . "'" . " AND " . "groupinfo_id = "  . "'" . $grp_id . "'";
		$this->db->select('bzz_userfriends');
		$this->db->from('bzz_groupinfo');
		$this->db->where($condition);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
		return false;
		}	
}

public function disp_only_friends()
{
  $id = $this->session->userdata('logged_in')['account_id'];
	    $condition = "user_id =" . "'" . $id . "'" . " AND " . "request_status = 'Y' ";
		$this->db->select('friend_id');
		$this->db->from('bzz_userfriends');
		$this->db->where($condition);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
		return false;
		}	
}

public function getcustDetails($id)
   {
	    //$id = $this->session->userdata('logged_in')['account_id'];
	   $condition = "user_id =" . "'" . $id . "'";
		$this->db->select('*');
		$this->db->from('bzz_userinfo');
		$this->db->where($condition);
		$query = $this->db->get();
		if ($query->num_rows() == 1) {
			return $query->result_array();
		} else {
		return false;
		}
   }


public function get_my_pics($album_id)
{
	if(empty($user_id))
	$id = $this->session->userdata('logged_in')['account_id'];
	else
	$id = $user_id;
	//posted_by ='". $id . "'and
	$condition = "uploaded_files !='' and album_id = ".$album_id."";
	$this->db->select('*');
	$this->db->where($condition);
	$this->db->order_by("post_id", "desc");
	$query = $this->db->get('bzz_posts');
	//echo $this->db->last_query();
	//print_r($query->result_array());
	if ($query->num_rows() > 0) {
			$result = $query->result();
			$pictures = array();
			foreach($result as $post)
			{
				$condition = "like_on =" . "'" . $post->post_id . "' and like_status='Y'";
				$this->db->select('*');
				$this->db->where($condition);
				$query = $this->db->get('bzz_likes');
				$like_count = count($query->result());
				
				$condition = "commented_on =" . "'" . $post->post_id . "'";
				$this->db->select('*');
				$this->db->where($condition);
				$query = $this->db->get('bzz_postcomments');
				$comment_count = count($query->result());
				
				$picture = array();
				$pics = explode(',',$post->uploaded_files);
				foreach($pics as $pic)
				{
					$picture['post_id'] = $post->post_id;
					$picture['image_thumb'] = $pic;
					$picture['like_count'] = $like_count;
					$picture['comment_count'] = $comment_count;
					$pictures[] = $picture;
				}
			}
			return $pictures;
	} else {
	return false;
	}
}

public function get_my_videos($user_id='')
{
	if(empty($user_id))
	$id = $this->session->userdata('logged_in')['account_id'];
	else
	$id = $user_id;
	$condition = "user_id =" . "'" . $id . "' AND video_name!=''";
	$this->db->select('video_name');
	$this->db->where($condition);
	$this->db->order_by("video_id", "desc");
$query = $this->db->get('bzz_user_videos');
if ($query->num_rows() > 0) {
			return $query->result_array();
		} else {
		return false;
		}
}

public function creategroup($grpname,$members)
{
	$id = $this->session->userdata('logged_in')['account_id'];

	$data = array(
   'group_name' => $grpname ,
   'user_id' => $id ,
   'group_members' => $members
);
$this->db->insert('bzz_user_groups', $data); 
$this->session->set_flashdata('group-add-msg', 'Group Created Successfully');
}

public function updategroup($group_id,$grpname,$members)
{
   $data = array(
   'group_name' => $grpname ,
   'group_members' => $members
);
$this->db->where('group_id',$group_id);
$this->db->update('bzz_user_groups', $data); 
$this->session->set_flashdata('group-add-msg', 'Group updated Successfully');
}

   public function get_user_groups($searchinput='')
   {
	    $id = $this->session->userdata('logged_in')['account_id'];
		if(empty($searchinput))
	    $condition = "user_id =" . "'" . $id . "'";
		else
		$condition = "user_id =" . "'" . $id . "' AND group_name LIKE '%".$searchinput."%'";
		$this->db->select('*');
		$this->db->from('bzz_user_groups');
		$this->db->where($condition);
		$this->db->order_by("group_id");
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result_array();
		} else {
		return false;
		}
   }
   public function get_groupmembers($grp_id)
   {
	    $condition = "group_id =" . "'" . $grp_id . "'";
		$this->db->select('group_members');
		$this->db->from('bzz_user_groups');
		$this->db->where($condition);
		$this->db->order_by("group_id");
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result_array();
		} else {
		return false;
		}
   }
   
	public function get_group_byid($group_id)
   {
	    $id = $this->session->userdata('logged_in')['account_id'];
	    $condition = "group_id =" . "'" . $group_id . "'";
		$this->db->select('*');
		$this->db->from('bzz_user_groups');
		$this->db->where($condition);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result_array();
		} else {
		return false;
		}
   }
   
   public function delete_group($group_id)
   {
	   $this->db->delete('bzz_user_groups', array('group_id' => $group_id)); 
	   $this->session->set_flashdata('group-add-msg', 'Group deleted Successfully');
	   redirect('profile/groups');   
   }
    public function updatefield($fieldname,$fieldvalue)
	{
		$up_data = array( $fieldname=>$fieldvalue);
        $id = $this->session->userdata('logged_in')['account_id'];
		$condition = "user_id = '".$id."'";
		$this->db->where($condition);
		if($this->db->update('bzz_userinfo',$up_data))
		return true;
		else
		return false;
	}
	public function addworkplace($orgname,$position)
	{
		$id = $this->session->userdata('logged_in')['account_id'];
		$up_data = array( 'org_name'=>$orgname,'position'=>$position,'user_id'=>$id);
		if($this->db->insert('bzz_organizationinfo',$up_data))
		return $this->db->insert_id();
		else
		return false;
	}
	 public function updateworkplace($orgname,$position,$org_id)
	{
		$up_data = array( 'org_name'=>$orgname,'position'=>$position);
       // $id = $this->session->userdata('logged_in')['account_id'];
		$condition = "organization_id = '".$org_id."'";
		$this->db->where($condition);
		if($this->db->update('bzz_organizationinfo',$up_data))
		return true;
		else
		return false;
	}
	public function editworkplace($org_id)
	{
		$condition = "organization_id =" . "'" . $org_id . "'";
		$this->db->select('*');
		$this->db->from('bzz_organizationinfo');
		$this->db->where($condition);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
		return false;
		}
	}
public function editSideBarSettings()
	{
		$id = $this->session->userdata('logged_in')['account_id'];
		$this->db->select('*');
		$this->db->from('bzz_sidebar_display_settings');
		$this->db->where('user_id',$id);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
		return false;
		}
	}

public function get_user_profileinfo($user_id='')
{
	if(!empty($user_id))
	$id = $user_id;
	else
	$id = $this->session->userdata('logged_in')['account_id'];
	
		 $condition = "user_id ="."'".$id."'";
		 $this->db->select('*');
		 $this->db->from('bzz_user_images');
		 $this->db->where($condition);
		 $query = $this->db->get();
		 if($query->num_rows() > 0)
		 {
				$this->db->select('*');
				$this->db->from('bzz_users');
				$this->db->limit(1);
			    $this->db->join('bzz_user_images','bzz_users.user_id=bzz_user_images.user_id AND bzz_users.user_id='.$id);
			    $this->db->join('bzz_userinfo','bzz_users.user_id=bzz_userinfo.user_id');
			    $this->db->order_by('bzz_user_images.user_imageinfo_id','desc');
			 	$query = $this->db->get();
				$user_profileinfo = $query->result_array();
				
		 }else{
			  $this->db->select('*');
			  $this->db->limit(1);
			  $this->db->from('bzz_users');
			  $this->db->join('bzz_userinfo','bzz_users.user_id=bzz_userinfo.user_id AND bzz_users.user_id='.$id);
			  $query = $this->db->get(); 
			  $user_profileinfo =  $query->result_array();
		 }
	//	 print_r($user_profileinfo);
	return $user_profileinfo;	 
}


public function add_home_town($hometown)
	{
		$id = $this->session->userdata('logged_in')['account_id'];
		$up_data = array('hometown'=>$hometown);
		$this->db->where('user_id',$id);
		if($this->db->update('bzz_userinfo',$up_data))
		return true;
		else
		return false;
	}
	
	
	public function add_location($location)
	{
		$id = $this->session->userdata('logged_in')['account_id'];
		$up_data = array('location'=>$location);
		$this->db->where('user_id',$id);
		if($this->db->update('bzz_userinfo',$up_data))
		return true;
		else
		return false;
	}
	
	
	
public function add_family_members($data)
	{
	
			$up_data = array(
			'member_name'=>$data['family_member'],
			'member_relation' =>$data['family_member_type'],
			'user_id'=>$this->session->userdata('logged_in')['account_id']
			);
			
		if($data['family_action']=='add')
		{
		if($this->db->insert('bzz_family_members', $up_data))
			return $this->db->insert_id();
		else
			return false;
		}
		elseif($data['family_action']=='update')
		{
			
			$this->db->where('fam_member_id', $data['family_disp_id']);
			if($this->db->update('bzz_family_members', $up_data))
			return true;
			else 
			return false; 
		}
		
	}
	
	public function get_family_members($user_id)
	{
		if($user_id!='')
		{
		$id = $user_id;
		
		}else{
		$id = $this->session->userdata('logged_in')['account_id'];
		}
		
		$this->db->select('*');
		$this->db->from('bzz_family_members');
		$this->db->where('user_id',$id);
		$this->db->order_by('fam_member_id','desc');
		$query = $this->db->get();
		if($query->num_rows() > 0)
		{
			return $query->result_array();
		}else 
		{
			return false;
		}
		
	}
	
	public function edit_family_members($id)
	{
		//$id = $this->session->userdata('logged_in')['account_id'];
		$this->db->select('*');
		$this->db->from('bzz_family_members');
		$this->db->where('fam_member_id', $id);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
		return false;
		}
	
	
	}
	
	public function delete_family_member($family_member_id)
	{
			  
	$this->db->where('fam_member_id',$family_member_id);
	if( $this->db->delete('bzz_family_members'))
	return true;
	else
	return false;
	}
	
	
public function add_about_me($aboutme)
	{
		$id = $this->session->userdata('logged_in')['account_id'];
		$up_data = array('aboutme'=>$aboutme);
		$this->db->where('user_id',$id);
		if($this->db->update('bzz_userinfo',$up_data))
		return true;
		else
		return false;
	}
	
		
public function add_fav_quotes($favquotes)
	{
		$id = $this->session->userdata('logged_in')['account_id'];
		$up_data = array('favquotes'=>$favquotes);
		$this->db->where('user_id',$id);
		if($this->db->update('bzz_userinfo',$up_data))
		return true;
		else
		return false;
	}
	
	
	
	public function add_relation($relation)
	{
		$id = $this->session->userdata('logged_in')['account_id'];
		$up_data = array('relationshipstatus'=>$relation);
		$this->db->where('user_id',$id);
		if($this->db->update('bzz_userinfo',$up_data))
		return true;
		else
		return false;
	}
	
	
	public function add_nic_names($data)
	{
		
			$up_data = array(
			'nic_name'=>$data['nic_name'],
			'nic_name_type'=>$data['nic_oth_names'],
			'user_id'=>$this->session->userdata('logged_in')['account_id']
			);
			
		if($data['nickname_action']=='add')
		{
		if($this->db->insert('bzz_nicknames', $up_data))
			return $this->db->insert_id();
		else
			return false;
		}
		elseif($data['nickname_action']=='update')
		{
			
			$this->db->where('nic_name_id', $data['nickname_disp_id']);
			if($this->db->update('bzz_nicknames', $up_data))
			return true;
			else 
			return false; 
		}
	}
	
	
		
	public function delete_nick_name($nickname_id)
	{
	$this->db->where('nic_name_id',$nickname_id);
	if($this->db->delete('bzz_nicknames'))
	return true;
	else
	return false;
	}
	
	
	
	public function get_nick_names($user_id)
	{
		if($user_id!='')
		{
		$id = $user_id;
		
		}else{
		$id = $this->session->userdata('logged_in')['account_id'];
		}
		
		$this->db->select('*');
		$this->db->from('bzz_nicknames');
		$this->db->where('user_id',$id);
		$this->db->order_by('nic_name_id','desc');
		$query = $this->db->get();
		if($query->num_rows() > 0)
		{
			return $query->result_array();
		}else 
		{
			return false;
		}
		
	}
	
	public function edit_nick_name($id)
	{
		//$id = $this->session->userdata('logged_in')['account_id'];
		$this->db->select('*');
		$this->db->from('bzz_nicknames');
		$this->db->where('nic_name_id', $id);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
		return false;
		}
	
	
	}
	
	
	public function add_mobile($mobile,$country_code)
	{
		$id = $this->session->userdata('logged_in')['account_id'];
		$up_data = 
		array(
		'mobile_no'=>$mobile,
		'country_code'=>$country_code,
		'user_id'=>$id
		);

		if($this->db->insert('bzz_mobile_nos',$up_data))
		return true;
		else
		return false;
	}
	
	
	public function add_oth_accounts($account,$account_type)
	{
		$id = $this->session->userdata('logged_in')['account_id'];
		$up_data = 
		array(
		'account_name'=>$account,
		'account_type'=>$account_type,
		'user_id'=>$id
		);

		if($this->db->insert('bzz_other_accounts',$up_data))
		return true;
		else
		return false;
	}
	
	
	public function add_other_accounts_data($account_name,$account_type)
	{
		
	
		$id = $this->session->userdata('logged_in')['account_id'];
		$up_data = 
		array(
		'account_name'=>$account_name,
		'account_type'=>$account_type,
		'user_id'=>$id
		);
		if($this->db->insert('bzz_other_accounts',$up_data))
		return true;
		else
		return false;
	}
	
	public function get_mbl_nos($user_id)
	{
		if($user_id!='')
		{
		$id = $user_id;
		
		}else{
		$id = $this->session->userdata('logged_in')['account_id'];
		}
		$this->db->select('*');
		$this->db->from('bzz_mobile_nos');
		$this->db->where('user_id',$id);
		$this->db->order_by('mobile_id');
		$query = $this->db->get();
		if($query->num_rows() > 0)
		{
			return $query->result_array();
		}else 
		{
			return false;
		}
		
	}
		
	public function get_other_accounts_by_id($user_id)
	{if($user_id!='')
		{
		$id = $user_id;
		
		}else{
		$id = $this->session->userdata('logged_in')['account_id'];
		}
		
		$this->db->select('*');
		$this->db->from('bzz_other_accounts');
		$this->db->where('user_id',$id);
		$this->db->order_by('account_id');
		$query = $this->db->get();
		if($query->num_rows() > 0)
		{
			return $query->result_array();
		}else 
		{
			return false;
		}
		
	}
		
	public function add_website($website)
	{
		$id = $this->session->userdata('logged_in')['account_id'];
		$up_data = array('website'=>$website);
		$this->db->where('user_id',$id);
		
		if($this->db->update('bzz_userinfo',$up_data))
		return true;
		else
		return false;
	}
		
	public function add_address($address,$city,$zip_code,$neighborhood)
	{
		$id = $this->session->userdata('logged_in')['account_id'];
		
		$address_data = $address."|++|".$city."|++|".$zip_code."|++|".$neighborhood;
		$up_data = array(
		'address'=>$address_data
		);
		$this->db->where('user_id',$id);
		
		if($this->db->update('bzz_userinfo',$up_data))
		return true;
		else
		return false;
	}
	
	public function add_languages($language)
	{
		$id = $this->session->userdata('logged_in')['account_id'];
		$up_data = array('languages'=>$language);
		$this->db->where('user_id',$id);
		
		if($this->db->update('bzz_userinfo',$up_data))
		return true;
		else
		return false;
	}
	
	public function add_professional_skills($proff_skills)
	{
		$id = $this->session->userdata('logged_in')['account_id'];
		$up_data = array('professional_skills'=>$proff_skills);
		$this->db->where('user_id',$id);
		
		if($this->db->update('bzz_userinfo',$up_data))
		return true;
		else
		return false;
	}
	public function add_interested_in($interested_in)
	{
		if($interested_in)
		{
		
		$data = implode(",",$interested_in);
		}else{
			$data='';
		}
		
		$id = $this->session->userdata('logged_in')['account_id'];
		$up_data = array('interests'=>$data);
		$this->db->where('user_id',$id);
		
		if($this->db->update('bzz_userinfo',$up_data))
		return true;
		else
		return false;
	}
	
		public function add_relegious_belief($relegion,$description)
	{
		
		$data = $relegion."|@|".$description;
		$id = $this->session->userdata('logged_in')['account_id'];
		$up_data = array('religious'=>$data);
		$this->db->where('user_id',$id);
		
		if($this->db->update('bzz_userinfo',$up_data))
		return true;
		else
		return false;
	}
	
		public function add_political_belief($political,$description)
	{
		
		$data = $political."|@|".$description;
		$id = $this->session->userdata('logged_in')['account_id'];
		$up_data = array('political'=>$data);
		$this->db->where('user_id',$id);
		
		if($this->db->update('bzz_userinfo',$up_data))
		return true;
		else
		return false;
	}
	
	public function add_work_info($data)
	{
		$id = $this->session->userdata('logged_in')['account_id'];
		if(isset($data['curent_status']))
		{
			$current_status = $data['curent_status'];
			
		}else
		{
			$current_status = "res";
		}
		
		if(empty($data['to_years']))
		{	
			$dt = new DateTime();
			$end_date = $dt->format('Y-m-d');
			
		}
		
		if($data['frm_years'] == '0')
		{
			$start_date = '';
		}else{
			
			$start_date = $data['frm_years'].'-'.$data['frm_months'].'-'.$data['frm_days'];
		}
		
		if($data['to_years'] == '0')
		{
			$end_date = '';
		}else{
			
			$end_date = $data['to_years'].'-'.$data['to_months'].'-'.$data['to_days'];
		}

		
	   	$workInfo = array(
		'org_name'=>$data['company'],
		'position'=>$data['position'],
		'org_desc'=>$data['description'],
		'city'=>$data['city'],
		'start_date'=>$start_date,
		'emp_status'=>$current_status,
		'end_date'=>$end_date,		
		'user_id'=>$this->session->userdata('logged_in')['account_id']
		);
		
			
		if($current_status == 'wor')
		{
			$emp_status_change['emp_status'] = 'res';
			$this->db->where('user_id',$id);
			$this->db->update('bzz_organizationinfo', $emp_status_change);
		}
		
		if($data['work_action']=='add')
		{
		if($this->db->insert('bzz_organizationinfo', $workInfo))
			return $this->db->insert_id();
		else
			return false;
		}
		elseif($data['work_action']=='update')
		{
			//$organizationInfo['organization_id']=$data['org_form_id'];
			$this->db->where('organization_id', $data['work_disp_id']);
			if($this->db->update('bzz_organizationinfo', $workInfo))
			return true;
			else 
			return false; 
		}
		
	
		  
	}

public function edit_mobile_no_by_id($mobile_no,$contry_code,$mobile_id)
{
	
	 	$mobInfo = array(
		'mobile_no'=>$mobile_no,
		'country_code'=>$contry_code,	
		//'user_id'=>$this->session->userdata('logged_in')['account_id']
		);
		
		$this->db->where('mobile_id',$mobile_id);
			if($this->db->update('bzz_mobile_nos', $mobInfo))
			return true;
			else 
			return false; 
}
public function edit_account_by_id($account_name,$account_type,$account_id)
{
	
	 	$accInfo = array(
		'account_name'=>$account_name,
		'account_type'=>$account_type,	
		//'user_id'=>$this->session->userdata('logged_in')['account_id']
		);
		
		$this->db->where('account_id',$account_id);
			if($this->db->update('bzz_other_accounts', $accInfo))
			return true;
			else 
			return false; 
}



	public function add_college_info($data)
	{
		
		if(isset($data['edu_status']))
		{
			$edu_status = $data['edu_status'];
			
		}else
		{
			$edu_status = "N";
		}
		
		if(empty($data['to_clg_years']))
		{	
			$dt = new DateTime();
			$end_date = $dt->format('Y-m-d');
			
		}
if($data['frm_clg_years'] == '0')
		{
			$start_date = '';
		}else{
			
			$start_date = $data['frm_clg_years'].'-'.$data['frm_clg_months'].'-'.$data['frm_clg_days'];
		}
		
		if($data['to_clg_years'] == '0')
		{
			$end_date = '';
		}else{
			
			$end_date = $data['to_clg_years'].'-'.$data['to_clg_months'].'-'.$data['to_clg_days'];
		}

	   	$college_info = array(
		'college_name'=>$data['college_name'],
		'edu_status'=>$edu_status,
		'start_date'=>$start_date,
		'end_date'=>$end_date,
		'description'=>$data['description'],
		'concentration1'=>$data['concentration1'],
		'concentration2'=>$data['concentration2'],
		'concentration3'=>$data['concentration3'],
		'attended'=>$data['optionsRadios'],
		'user_id'=>$this->session->userdata('logged_in')['account_id']
		);
		
	
			if($data['clg_action']=='add')
		{
		if($this->db->insert('bzz_user_college', $college_info))
			return $this->db->insert_id();
		else
			return false;
		}
		elseif($data['clg_action']=='update')
		{
			//$organizationInfo['organization_id']=$data['org_form_id'];
			$this->db->where('college_id', $data['college_disp_id']);
			if($this->db->update('bzz_user_college', $college_info))
			return true;
			else 
			return false; 
		}
		
		  
	}
	
	 
     public function del_college_Details($id)
   {	  
	$this->db->where('college_id',$id);
	if( $this->db->delete('bzz_user_college'))
	return true;
	else
	return false;
   }
	
	
	public function add_school_info($data)
	{
		
		if(isset($data['sch_status']))
		{
			$sch_status = $data['sch_status'];
			
		}else
		{
			$sch_status = "N";
		}
		
		if(empty($data['to_sch_years']))
		{	
			$dt = new DateTime();
			$end_date = $dt->format('Y-m-d');
			
		}
		if($data['frm_sch_years'] == '0')
		{
			$start_date = '';
		}else{
			
			$start_date = $data['frm_sch_years'].'-'.$data['frm_sch_months'].'-'.$data['frm_sch_days'];
		}
		
		if($data['to_sch_years'] == '0')
		{
			$end_date = '';
		}else{
			
			$end_date = $data['to_sch_years'].'-'.$data['to_sch_months'].'-'.$data['to_sch_days'];
		}

	   	$school_info = array(
		'school_name'=>$data['school_name'],
		'sch_status'=>$sch_status,
		'start_date'=>$start_date,
		'end_date'=>$end_date,
		'description'=>$data['description'],
		'user_id'=>$this->session->userdata('logged_in')['account_id']
		);
		
	
			if($data['sch_action']=='add')
		{
		if($this->db->insert('bzz_user_school', $school_info))
			return $this->db->insert_id();
		else
			return false;
		}
		elseif($data['sch_action']=='update')
		{
			//$organizationInfo['organization_id']=$data['org_form_id'];
			$this->db->where('school_id', $data['school_disp_id']);
			if($this->db->update('bzz_user_school', $school_info))
			return true;
			else 
			return false; 
		}
		
		  
	}
	
  public function del_school_Details($id)
   {	  
	$this->db->where('school_id',$id);
	if( $this->db->delete('bzz_user_school'))
	return true;
	else
	return false;
   }

	public function get_org_details_by_status_work($user_id)
	{
		
	   	if($user_id!='')
		{
		$id = $user_id;
		
		}else{
		$id = $this->session->userdata('logged_in')['account_id'];
		}
	   
		$condition = "user_id =" . "'" . $id . "'" . " AND " . "emp_status = 'wor'";
		$this->db->select('*');
		$this->db->from('bzz_organizationinfo');
		$this->db->where($condition);
		$this->db->order_by('end_date','desc');
		$query = $this->db->get();
		if($query->num_rows() > 0)
		{
			return $query->result_array();
		}else 
		{
			return false;
		}
		
	}
		public function get_org_details_by_status_all($user_id)
	{
		 if($user_id!='')
		{
		$id = $user_id;
		
		}else{
		$id = $this->session->userdata('logged_in')['account_id'];
		}
	   
		$condition = "user_id =" . "'" . $id . "'" . " AND " . "emp_status != 'wor'";
		$this->db->select('*');
		$this->db->from('bzz_organizationinfo');
		$this->db->limit(4);
		$this->db->where($condition);
		$this->db->order_by('end_date','desc');
		$query = $this->db->get();
		if($query->num_rows() > 0)
		{
			return $query->result_array();
		}else 
		{
			return false;
		}
		
	}
	
	public function get_clg_details_all($user_id)
	{
		
		  if($user_id!='')
		{
		$id = $user_id;
		
		}else{
		$id = $this->session->userdata('logged_in')['account_id'];
		}
		$this->db->select('*');
		$this->db->from('bzz_user_college');
	//	$this->db->limit(4);
		$this->db->where('user_id',$id);
		$this->db->order_by('end_date','desc');
		$query = $this->db->get();
		if($query->num_rows() > 0)
		{
			return $query->result_array();
		}else 
		{
			return false;
		}
		
	}
	
		public function editmobileDetails($id)
	{
		$this->db->select('*');
		$this->db->from('bzz_mobile_nos');
		$this->db->where('mobile_id', $id);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
		return false;
		}
	}
	
	public function editaccountDetails($id)
	{
		$this->db->select('*');
		$this->db->from('bzz_other_accounts');
		$this->db->where('account_id', $id);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
		return false;
		}
	}
	public function update_last_active_time(){
		$id = $this->session->userdata('logged_in')['account_id'];
		$this->db->select('*');
		$this->db->from('bzz_user_activity_log');
		$this->db->where('user_id', $id);
		$query = $this->db->get();
		//print_r($query->result_array());
		if ($query->num_rows() > 0) {
			$data = array(
			   'last_active' => time() 			   
			);
			$this->db->where('user_id',$id);
			$this->db->update('bzz_user_activity_log', $data); 
			//$condition = "last_active <".(time()-900);
			$this->db->where('last_active <',time()-900);
    		$this->db->delete('bzz_user_activity_log'); 
		} else {
			
			$data = array(
            'last_active' => time(),
			'user_id' => $id
      		);
      	    $this->db->insert('bzz_user_activity_log', $data);
		}
	}
	public function remove_user_activity(){
		$id = $this->session->userdata('logged_in')['account_id'];
		$this->db->where('user_id',$id);
        $this->db->delete('bzz_user_activity_log'); 
	}
	
	
	public function get_user_accounts($user_id='')
	{
	if(!empty($user_id))
	$id = $user_id;
	else
	$id = $this->session->userdata('logged_in')['account_id'];
	
		$this->db->select('*');
		$this->db->from('bzz_other_accounts');
		$this->db->where('user_id',$id);
		$query = $this->db->get();
		
		if($query->num_rows() > 0)
		{
			return $query->result_array();
		}else
		return false;
	}
	
	
public function visited_users($user_id='')	
{
	if(!empty($user_id))
	$id = $user_id;
	else
	$id = $this->session->userdata('logged_in')['account_id'];	
	$query = $this->db->select('visited_user_id')->from('bzz_user_profile_visit')->where('user_id',$id)->get();
 	if($query->num_rows() > 0)
	{
		$user_ids = $query->result_array();

		//print_r($user_ids);
		foreach($user_ids as $user_id)
			{
				if($user_id['visited_user_id'] != $id)
				{
				
				
			        	 $usercondition = "user_id ="."'".$user_id['visited_user_id']."'";
						 $this->db->select('*');
						 $this->db->from('bzz_user_images');
						 $this->db->where($usercondition);
				
						 $query = $this->db->get();
						 if($query->num_rows > 0)
						 {
							$this->db->select('*,bzz_users.user_id');
							$this->db->from('bzz_users');
							$this->db->join('bzz_user_images','bzz_users.user_id=bzz_user_images.user_id AND bzz_users.user_id='.$user_id['visited_user_id']);
							$this->db->join('bzz_userinfo','bzz_users.user_id=bzz_userinfo.user_id');
							$this->db->join('bzz_organizationinfo',"bzz_organizationinfo.user_id=bzz_userinfo.user_id AND emp_status='wor'",'left');
							$this->db->order_by('bzz_user_images.user_imageinfo_id','desc');
							$query = $this->db->get();
							$user_data =  $query->result_array();
							
						 }else{
							  $this->db->select('*,bzz_users.user_id');
							// $this->db->limit(2);
							  $this->db->from('bzz_users');
							  $this->db->join('bzz_userinfo','bzz_users.user_id=bzz_userinfo.user_id AND bzz_users.user_id='.$user_id['visited_user_id']);	
							  $this->db->join('bzz_organizationinfo',"bzz_organizationinfo.user_id=bzz_userinfo.user_id AND emp_status='wor'",'left');
							 // $this->db->where($followercondition);
							  $query = $this->db->get(); 
							   $user_data =  $query->result_array();
						 }
						  $userdata[] = $user_data;
					
	
				//	print_r($userdata);
				return $userdata;
			}}
	}else{
	return false;
	}
	
}


public function get_my_albums($user_id = '')
{
	if(empty($user_id))
	$id = $this->session->userdata('logged_in')['account_id'];
	else
	$id = $user_id;
	
	$this->db->select('*');
	//$this->db->from('bzz_albums');
	$this->db->where('album_cr_by',$id);
	$this->db->order_by("album_id", "desc");
	$query = $this->db->get('bzz_albums');
	if ($query->num_rows() > 0) {
	$albums  = $query->result();
			
			return $albums;
	} else {
	return false;
	}
	
	/*$condition = "posted_by =" . "'" . $id . "' and uploaded_files !=''";
	$this->db->select('*');
	$this->db->where($condition);
	$this->db->order_by("post_id", "desc");
	$query = $this->db->get('bzz_posts');
	if ($query->num_rows() > 0) {
	$albums  = $query->result();
			
			return $albums;
	} else {
	return false;
	}*/
}


public function get_album_photos($album_id)
{
	
	$id = $this->session->userdata('logged_in')['account_id'];
	$condition = "bzz_posts.album_id =". $album_id . " and bzz_posts.uploaded_files !=''";
	$this->db->select('uploaded_files');
	$this->db->from('bzz_posts');
	$this->db->join('bzz_albums','bzz_posts.album_id = bzz_albums.album_id and bzz_albums.album_id ='.$album_id);
	$this->db->where($condition);
	$this->db->order_by("bzz_posts.post_id", "desc");
	$query = $this->db->get();
	if ($query->num_rows() > 0) {
		$uploaded_files = array();
	$albums_data  = $query->result_array();
	/*foreach($albums_data as $album_data)
	{
		$uploaded_files[] = $album_data['uploaded_files']; 
	}*/
		//print_r($albums_data);	
			return $albums_data;
	} else {
	return false;
	}
}

public function get_time_line_images()
{
	
	
	$id = $this->session->userdata('logged_in')['account_id'];
	$condition = "posted_by =". $id . " and uploaded_files !='' and profile_pic = 'N' and video = 'N' and album_id is NULL OR album_id = ''";
	$this->db->select('*');
	$this->db->from('bzz_posts');
	
	$this->db->where($condition);
	$this->db->order_by("post_id", "desc");
	$query = $this->db->get();
	if ($query->num_rows() > 0) {
		//$uploaded_files = array();
	$data  = $query->result_array();
	//echo $this->db->last_query();
		
	return $data;
	} else {
	return false;
	}

	
}

public function get_profile_images()
{
	$id = $this->session->userdata('logged_in')['account_id'];
	$condition = "posted_by =". $id . " and uploaded_files !='' and profile_pic = 'Y' ";
	$this->db->select('*');
	$this->db->from('bzz_posts');
	
	$this->db->where($condition);
	$this->db->order_by("post_id", "desc");
	$query = $this->db->get();
	if ($query->num_rows() > 0) {
			$result = $query->result();
			$pictures = array();
			foreach($result as $post)
			{
				$condition = "like_on =" . "'" . $post->post_id . "' and like_status='Y'";
				$this->db->select('*');
				$this->db->where($condition);
				$query = $this->db->get('bzz_likes');
				$like_count = count($query->result());
				
				$condition = "commented_on =" . "'" . $post->post_id . "'";
				$this->db->select('*');
				$this->db->where($condition);
				$query = $this->db->get('bzz_postcomments');
				$comment_count = count($query->result());
				
				$picture = array();
				$pics = explode(',',$post->uploaded_files);
				foreach($pics as $pic)
				{
					$picture['post_id'] = $post->post_id;
					$picture['image_thumb'] = $pic;
					$picture['like_count'] = $like_count;
					$picture['comment_count'] = $comment_count;
					$pictures[] = $picture;
				}
			}
			return $pictures;
	} else {
	return false;
	}
}
public function get_all_time_line_photos()
{
	$id = $this->session->userdata('logged_in')['account_id'];
	$condition = "posted_by =". $id . " and uploaded_files !='' and profile_pic != 'Y' and video = 'N' and album_id is NULL OR album_id = ''";
	$this->db->select('*');
	$this->db->where($condition);
	$this->db->order_by("post_id", "desc");
	$query = $this->db->get('bzz_posts');
	//echo $this->db->last_query();
	//print_r($query->result_array());
	if ($query->num_rows() > 0) {
			$result = $query->result();
			$pictures = array();
			foreach($result as $post)
			{
				$condition = "like_on =" . "'" . $post->post_id . "' and like_status='Y'";
				$this->db->select('*');
				$this->db->where($condition);
				$query = $this->db->get('bzz_likes');
				$like_count = count($query->result());
				
				$condition = "commented_on =" . "'" . $post->post_id . "'";
				$this->db->select('*');
				$this->db->where($condition);
				$query = $this->db->get('bzz_postcomments');
				$comment_count = count($query->result());
				
				$picture = array();
				$pics = explode(',',$post->uploaded_files);
				foreach($pics as $pic)
				{
					$picture['post_id'] = $post->post_id;
					$picture['image_thumb'] = $pic;
					$picture['like_count'] = $like_count;
					$picture['comment_count'] = $comment_count;
					$pictures[] = $picture;
				}
			}
			return $pictures;
	} else {
	return false;
	}

}
public function get_sav_fav_cat_data($cat_id)
{
	$this->db->select('*');
	$this->db->where('category_id',$cat_id);
	$query = $this->db->get('bzz_save_fav_categories');
	if($query->num_rows() == 1)
	{
		return $query->result_array();
	}else{
		return false;
	}

}

public function change_category_name_byid($data,$category_id)
{
	$this->db->where('category_id',$category_id);
	if($this->db->update('bzz_save_fav_categories',$data))
	{
		return true;
	}
	return false;
	
	
}
}
?>
