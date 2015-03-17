<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile_set extends CI_Model {

	function __construct()
    { 
   		parent::__construct(); 
  		
    } 
	
   public function save_settings(){
	    $id = $this->session->userdata('logged_in')['account_id'];
	    $condition = "cust_id =" . "'" . $id . "'";
		$this->db->select('*');
		$this->db->from('cust_sign_up');
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
	    $condition = "cust_id =" . "'" . $id . "'";
		$this->db->select('*');
		$this->db->from('education_info');
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
	    $condition = "cust_id =" . "'" . $id . "'";
		$this->db->select('*');
		$this->db->from('profession_info');
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
	    $condition = "cust_id =" . "'" . $id . "'";
		$this->db->select('*');
		$this->db->from('organization_info');
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
	    $condition = "cust_id =" . "'" . $id . "'";
		$this->db->select('*');
		$this->db->from('group_info');
		$this->db->where($condition);
		$this->db->order_by("grpinfo_id", "desc");
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
	    $condition = "cust_id =" . "'" . $id . "'";
		$this->db->select('*');
		$this->db->from('education_info');
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
	    $condition = "cust_id =" . "'" . $id . "'";
		$this->db->select('*');
		$this->db->from('profession_info');
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
	    $condition = "cust_id =" . "'" . $id . "'";
		$this->db->select('*');
		$this->db->from('organization_info');
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
	    $condition = "cust_id =" . "'" . $id . "'";
		$this->db->select('*');
		$this->db->from('group_info');
		$this->db->where($condition);
		$this->db->order_by("grpinfo_id", "desc");
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
	    $condition = "cust_id =" . "'" . $id . "'";
		$this->db->select('*');
		$this->db->from('group_info');
		$this->db->where($condition);
		$this->db->order_by("grpinfo_id");
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
       $this->db->delete('education_info'); 
   }
   
   public function delProfDetails($id)
   {
	   $this->db->where('professioninfo_id', $id);
       $this->db->delete('profession_info'); 
   }
   
   public function delOrgDetails($id)
   {
	   $this->db->where('orginfo_id', $id);
       $this->db->delete('organization_info'); 
   }
   
   public function delGrpDetails($id)
   {
	   $this->db->where('grpinfo_id', $id);
       $this->db->delete('group_info'); 
   }
   
    // editing individual education details by id
  
    public function editEduDetails($id)
	{
		$this->db->select('*');
		$this->db->from('education_info');
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
		$this->db->from('profession_info');
		$this->db->where('professioninfo_id', $id);
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
		$this->db->from('organization_info');
		$this->db->where('orginfo_id', $id);
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
		$this->db->from('group_info');
		$this->db->where('grpinfo_id', $id);
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
            'filename' => $filename,
			'thumbnail' => $thumbnail,
			'favorite' => $img_fav,
			'cust_id' => $this->session->userdata('logged_in')['account_id']
        );
        $this->db->insert('images', $data);
        return $this->db->insert_id();
  
}
public function add_pics($filename,$thumbnail,$img_fav)
{
	 $data = array(
            'filename' => $filename,
			'thumbnail' => $thumbnail,
			'favorite' => $img_fav,
			'cust_id' => $this->session->userdata('logged_in')['account_id']
        );
        $this->db->insert('images', $data);
        return $this->db->insert_id();
	
}


public function get_profile_pic()
{
$this->db->order_by("img_info_id", "desc");
$query = $this->db->get('images','1');
if ($query->num_rows() > 0) {
			return $query->result();
		} else {
		return false;
		}
}

public function get_all_profile_pics()
{
$this->db->order_by("img_info_id", "desc");
$query = $this->db->get('images','9');
if ($query->num_rows() > 0) {
			return $query->result();
		} else {
		return false;
		}
}


public function disp_friends($grp_id)
{
  $id = $this->session->userdata('logged_in')['account_id'];
	    $condition = "cust_id =" . "'" . $id . "'" . " AND " . "grpinfo_id = "  . "'" . $grp_id . "'";
		$this->db->select('friends');
		$this->db->from('group_info');
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
	    $condition = "cust_id =" . "'" . $id . "'" ;
		$this->db->select('accepted_friend_ids');
		$this->db->from('friends');
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
	   $condition = "cust_id =" . "'" . $id . "'";
		$this->db->select('*');
		$this->db->from('cust_sign_up');
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
	$condition = "cust_id =" . "'" . $id . "'";
	$this->db->select('filename');
	$this->db->where($condition);
	$this->db->order_by("img_info_id", "desc");
$query = $this->db->get('images','12');
if ($query->num_rows() > 0) {
			return $query->result();
		} else {
		return false;
		}
}

public function get_my_videos()
{
	$id = $this->session->userdata('logged_in')['account_id'];
	$condition = "cust_id =" . "'" . $id . "'";
	$this->db->select('videos');
	$this->db->where($condition);
	$this->db->order_by("img_info_id", "desc");
$query = $this->db->get('images','2');
if ($query->num_rows() > 0) {
			return $query->result();
		} else {
		return false;
		}
}

public function creategroup($grpname,$members)
{
	$id = $this->session->userdata('logged_in')['account_id'];

	$data = array(
   'grp_name' => $grpname ,
   'cust_id' => $id ,
   'friends' => $members
);
$this->db->insert('group_info', $data); 
$this->session->set_flashdata('group-add-msg', 'Group Created Successfully');
}
}
?>
