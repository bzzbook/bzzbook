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
	$condition = "user_id =" . "'" . $id . "'";
	$this->db->select('*');
	$this->db->where($condition);
	$this->db->order_by("upload_id", "desc");
$query = $this->db->get('bzz_user_uploads');
if ($query->num_rows() > 0) {
			return $query->result();
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
}

?>
