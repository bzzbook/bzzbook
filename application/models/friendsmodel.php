<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Friendsmodel extends CI_Model {

	function __construct()
    {
   		parent::__construct();   		
    } 	
  public function getfriends(){
	   
	    $id = $this->session->userdata('logged_in')['account_id'];
	    $condition = "user_id =" . "'" . $id . "' AND request_status='Y'";
		$this->db->select('*');
		$this->db->from('bzz_userfriends');
		$this->db->where($condition);
		$query = $this->db->get();
		if ($query->num_rows() >0) {
			$friends = $query->result_array();
			$frnds = array();
			foreach($friends as $friend)
			{
			    $condition = "user_id =" . "'" . $friend['friend_id'] . "'";
				$this->db->select('*');
				$this->db->from('bzz_userinfo');
				$this->db->where($condition);
				$query = $this->db->get();
				$frnd = array();
				if ($query->num_rows() == 1) {
					$result = $query->result_array();	
					$frnd['name'] = $result[0]['user_firstname'].' '.$result[0]['user_lastname'];
					
				}
				$this->db->select('*');
				$this->db->from('bzz_user_images');
				$this->db->where($condition);
				$this->db->order_by('user_imageinfo_id','desc');
				$query = $this->db->get();
				$result = $query->result_array();
				$frnd['image'] = $result[0]['user_img_thumb'];
				$frnd['id'] = $friend['friend_id'];
				$frnds[] = $frnd;
			}
			return $frnds;
		} else {
		return false;
		}
   }

   
   public function getPendingRequests($limit = 2)
	{
		$id = $this->session->userdata('logged_in')['account_id'];
	    $condition = "user_id =" . "'" . $id . "' AND request_status ='W'";
		$this->db->select('*');
		$this->db->from('bzz_userfriends');
		$this->db->where($condition);
		$query = $this->db->get();
		$checklimit = 1;
		if ($query->num_rows() >= 1) {
			$friends = $query->result_array();
			$frnds = array();
			foreach($friends as $friend)
			{				
			    $condition = "user_id =" . "'" . $friend['friend_id'] . "'";
				$this->db->select('*');
				$this->db->from('bzz_userinfo');
				$this->db->where($condition);
				$query = $this->db->get();
				$frnd = array();

				if ($query->num_rows() == 1) {
					$result = $query->result_array();	
					$frnd['name'] = $result[0]['user_firstname'].' '.$result[0]['user_lastname'];
				
				}
				$this->db->select('*');
				$this->db->from('bzz_user_images');
				$this->db->where($condition);
				$this->db->order_by('user_imageinfo_id','desc');
				$query = $this->db->get();
				$result = $query->result_array();
				$frnd['image'] = $result[0]['user_img_fav'];
				$frnd['id'] = $friend['friend_id'];
				$frnds[] = $frnd;
				
				if($checklimit==$limit)
				{
					break;
				}
				elseif($limit==0)
				continue;
				else
					$checklimit++;
			}
			return $frnds;
		}else{
			return false;
		}
		
	}	   
   public function confirmfriend($req_id)
	{
		$id = $this->session->userdata('logged_in')['account_id'];
	    $condition = "user_id =" . "'" . $id . "' AND friend_id =".$req_id;
		
			$data = array(
               'request_status' => 'Y',
            );
			$this->db->where($condition);
			$this->db->update('bzz_userfriends', $data); 
			$pend_req = $this->getPendingRequests();
			$list = "";
		    if($pend_req) { foreach($pend_req as $req){
           $list .= " <li>
              <figure><img src='".base_url()."uploads/".$req['image']."' alt='".$req['name']."'></figure>
              <div class='disc'>
                <h4>".$req['name']."</h4>
                <div class='dcBtn'><a href='javascript:void(0);' onclick='acceptFrnd(".$req['id'].")'>Confirm</a><a href='javascript:void(0);' onclick='denyFrnd(".$req['id'].")'>Deny</a><a href='javascript:void(0);' onclick='blockFrnd(".$req['id'].");'>Block</a>  </div>
                </div>
            </li>";
             } }else $list = "No Requests Pending";
			 
			 echo $list;
		
	}
	
	public function denyfriend($req_id)
	{
		$id = $this->session->userdata('logged_in')['account_id'];
	    $condition = "user_id =" . "'" . $id . "' AND friend_id =".$req_id;
		
			$data = array(
               'request_status' => 'N',
            );
			$this->db->where($condition);
			$this->db->update('bzz_userfriends', $data); 
			$pend_req = $this->getPendingRequests();
			$list = "";
		    if($pend_req) { foreach($pend_req as $req){
           $list .= " <li>
              <figure><img src='".base_url()."uploads/".$req['image']."' alt='".$req['name']."'></figure>
              <div class='disc'>
                <h4>".$req['name']."</h4>
                <div class='dcBtn'><a href='javascript:void(0);' onclick='acceptFrnd(".$req['id'].")'>Confirm</a><a href='javascript:void(0);' onclick='denyFrnd(".$req['id'].")'>Deny</a> <a href='javascript:void(0);' onclick='blockFrnd(".$req['id'].");'>Block</a></div>
                </div>
            </li>";
             } }else $list = "No Requests Pending";
			 
			 echo $list;
	
	}
	
	public function blockfriend($req_id)
	{
		$id = $this->session->userdata('logged_in')['account_id'];
	    $condition = "user_id =" . "'" . $id . "' AND friend_id =".$req_id;
		
			$data = array(
               'request_status' => 'B',
            );
			$this->db->where($condition);
			$this->db->update('bzz_userfriends', $data); 
			$pend_req = $this->getPendingRequests();
			$list = "";
		    if($pend_req) { foreach($pend_req as $req){
           $list .= " <li>
              <figure><img src='".base_url()."uploads/".$req['image']."' alt='".$req['name']."'></figure>
              <div class='disc'>
                <h4>".$req['name']."</h4>
                <div class='dcBtn'><a href='javascript:void(0);' onclick='acceptFrnd(".$req['id'].")'>Confirm</a><a href='javascript:void(0);' onclick='denyFrnd(".$req['id'].")'>Deny</a> <a href='javascript:void(0);' onclick='blockFrnd(".$req['id'].");'>Block</a> </div>
                </div>
            </li>";
             } }else $list = "No Requests Pending";
			 
			 echo $list;
		
	}
}
?>