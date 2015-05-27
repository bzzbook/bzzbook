<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile_set extends CI_Model {

	function __construct()
    { 
   		parent::__construct(); 
  		
    } 
	
   public function save_settings(){
	    $id = $this->session->userdata('logged_in')['account_id'];
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
   
   
    public function get_userinfo(){
	    $id = $this->session->userdata('logged_in')['account_id'];
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
   
   public function getorganizationDetails()
   {
	    $id = $this->session->userdata('logged_in')['account_id'];
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
   
   
     public function get_college_details()
   {
	    $id = $this->session->userdata('logged_in')['account_id'];
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
   
        public function get_school_details()
   {
	    $id = $this->session->userdata('logged_in')['account_id'];
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


public function get_my_pics()
{
	$id = $this->session->userdata('logged_in')['account_id'];
	$condition = "posted_by =" . "'" . $id . "' and uploaded_files !=''";
	$this->db->select('*');
	$this->db->where($condition);
	$this->db->order_by("post_id", "desc");
	$query = $this->db->get('bzz_posts');
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

public function get_my_videos()
{
	$id = $this->session->userdata('logged_in')['account_id'];
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

public function get_user_profileinfo()
{
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
	
	
	
public function add_family_members($member_name,$member_relation)
	{
		$id = $this->session->userdata('logged_in')['account_id'];
		
		$this->db->select('familymembers');
		$this->db->from('bzz_userinfo');
		$this->db->where('user_id',$id);
		$query = $this->db->get();
		$data = $query->result_array();
		
		if(empty($data))
		{
			$fam_member_relation = $member_name."-".$member_relation;
			$this->db->where('user_id',$id);
			$this->db->insert('bzz_userinfo',$up_data);
			if($this->db->insert('bzz_userinfo',$up_data))
		return true;
		else
		return false;
		
		}else
		{
			$fam_member_relation = $member_name."-".$member_relation ;
			$data = $data[0]['familymembers'];
			$data .=$fam_member_relation;
			
			$up_data = array('familymembers'=>$data);
		$this->db->where('user_id',$id);
		if($this->db->update('bzz_userinfo',$up_data))
		return true;
		else
		return false;
		}
		
		
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
	
	
	public function add_nic_names($name,$name_type)
	{
		$id = $this->session->userdata('logged_in')['account_id'];
		
		$this->db->select('nickname');
		$this->db->from('bzz_userinfo');
		$this->db->where('user_id',$id);
		$query = $this->db->get();
		$data = $query->result_array();
		
		if(empty($data))
		{
			$nick_name_data = $name."-".$name_type;
			$this->db->where('user_id',$id);
			$up_data = array('nickname'=>$nick_name_data);
			$this->db->insert('bzz_userinfo',$up_data);
			
			if($this->db->insert('bzz_userinfo',$up_data))
		return true;
		else
		return false;
		
		}else
		{
			$nick_name_data = $name."-".$name_type ;
			$data = $data[0]['nickname'];
			$data .=$nick_name_data;
			
			
		 $up_data = array('nickname'=>$data);
		$this->db->where('user_id',$id);
		if($this->db->update('bzz_userinfo',$up_data))
		return true;
		else
		return false;
		}
		
	}
	
	public function add_mobile($mobile)
	{
		$id = $this->session->userdata('logged_in')['account_id'];
		$up_data = array('mobile'=>$mobile);
		$this->db->where('user_id',$id);
		
		if($this->db->update('bzz_userinfo',$up_data))
		return true;
		else
		return false;
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
		
		$data = implode(",",$interested_in);
		
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
		
		if(empty($data['to_years']))
		{	
			$dt = new DateTime();
			$end_date = $dt->format('Y-m-d');
			
		}else
		{
			$end_date = $data['to_years'].'-'.$data['to_months'].'-'.$data['to_days'];
		}


	   	$workInfo = array(
		'org_name'=>$data['company'],
		'position'=>$data['position'],
		'emp_status'=>$data['curent_status'],
		'start_date'=>$data['frm_years'].'-'.$data['frm_months'].'-'.$data['frm_days'],
		'end_date'=>$end_date,
		'org_desc'=>$data['description'],
		'city'=>$data['city'],
		'user_id'=>$this->session->userdata('logged_in')['account_id']
		);
		
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



	public function add_college_info($data)
	{
		
		if(isset($data['edu_status']))
		{
			$edu_status = $data['edu_status'];
			
		}else
		{
			$edu_status = "N";
		}
		
		if(empty($data['to_years']))
		{	
			$dt = new DateTime();
			$end_date = $dt->format('Y-m-d');
			
		}


	   	$college_info = array(
		'college_name'=>$data['college_name'],
		'edu_status'=>$edu_status,
		'start_date'=>$data['frm_years'].'-'.$data['frm_months'].'-'.$data['frm_days'],
		'end_date'=>$data['to_years'].'-'.$data['to_months'].'-'.$data['to_days'],
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
	
	
	
	
	public function add_school_info($data)
	{
		
		if(isset($data['sch_status']))
		{
			$sch_status = $data['sch_status'];
			
		}else
		{
			$sch_status = "N";
		}
		
		if(empty($data['to_years']))
		{	
			$dt = new DateTime();
			$end_date = $dt->format('Y-m-d');
			
		}


	   	$school_info = array(
		'school_name'=>$data['school_name'],
		'sch_status'=>$sch_status,
		'start_date'=>$data['frm_years'].'-'.$data['frm_months'].'-'.$data['frm_days'],
		'end_date'=>$data['to_years'].'-'.$data['to_months'].'-'.$data['to_days'],
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

}

?>
