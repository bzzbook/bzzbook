<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Friendsmodel extends CI_Model {

	function __construct()
    {
   		parent::__construct();   		
    } 	
   public function getfriends(){
	   
	    $id = $this->session->userdata('logged_in')['account_id'];
	    $condition = "cust_id =" . "'" . $id . "'";
		$this->db->select('*');
		$this->db->from('friends');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() == 1) {
			$result = $query->result_array();
			if(!empty($result[0]['accepted_friend_ids']))
			$frnd_ids = explode(',',$result[0]['accepted_friend_ids']);
			else
			return false;
			$frnds = array();
			foreach($frnd_ids as $frnd_id)
			{
			    $condition = "cust_id =" . "'" . $frnd_id . "'";
				$this->db->select('*');
				$this->db->from('cust_sign_up');
				$this->db->where($condition);
				$query = $this->db->get();
				$frnd = array();
				if ($query->num_rows() == 1) {
					$result = $query->result_array();	
					$frnd['name'] = $result[0]['first_name'].' '.$result[0]['last_name'];
					
				}
				$this->db->select('*');
				$this->db->from('images');
				$this->db->where($condition);
				$this->db->order_by('img_info_id','desc');
				$query = $this->db->get();
				$result = $query->result_array();
				$frnd['image'] = $result[0]['thumbnail'];
				$frnd['id'] = $frnd_id;
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
	    $condition = "cust_id =" . "'" . $id . "' AND friend_req_ids !=''";
		$this->db->select('*');
		$this->db->from('friends');
		$this->db->where($condition);
		$query = $this->db->get();
		$checklimit = 1;
		if ($query->num_rows() == 1) {
			$result = $query->result_array();
			$frd_reqs = $result[0]['friend_req_ids'];
			$frnd_ids = explode(',',$frd_reqs);
			$frnds = array();
			foreach($frnd_ids as $req_id)
			{				
			    $condition = "cust_id =" . "'" . $req_id . "'";
				$this->db->select('*');
				$this->db->from('cust_sign_up');
				$this->db->where($condition);
				$query = $this->db->get();
				$frnd = array();
				if ($query->num_rows() == 1) {
					$result = $query->result_array();	
					$frnd['name'] = $result[0]['first_name'].' '.$result[0]['last_name'];
					
				}
				$this->db->select('*');
				$this->db->from('images');
				$this->db->where($condition);
				$this->db->order_by('img_info_id','desc');
				$query = $this->db->get();
				$result = $query->result_array();
				$frnd['image'] = $result[0]['thumbnail'];
				$frnd['id'] = $req_id;
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
	    $condition = "cust_id =" . "'" . $id . "'";
		$this->db->select('*');
		$this->db->from('friends');
		$this->db->where($condition);
		$query = $this->db->get();
		if ($query->num_rows() == 1) {
			$result = $query->result_array();
			$frd_reqs = $result[0]['friend_req_ids'];
			$accepted_frnds = $result[0]['accepted_friend_ids'];
						
			if(!empty($accepted_frnds))
			$accepted_frnds.=",".$req_id;
			else 
			$accepted_frnds =$req_id;
			$frd_reqs = explode(',',$frd_reqs);
			if (in_array($req_id, $frd_reqs)) 
			{
				unset($frd_reqs[array_search($req_id,$frd_reqs)]);
			}
			$rem_req = implode(',',$frd_reqs);
			$data = array(
               'friend_req_ids' => $rem_req,
			   'accepted_friend_ids' => $accepted_frnds,
            );
			$this->db->where('cust_id', $id);
			$this->db->update('friends', $data); 
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
	}
	
	public function denyfriend($req_id)
	{
		$id = $this->session->userdata('logged_in')['account_id'];
	    $condition = "cust_id =" . "'" . $id . "'";
		$this->db->select('*');
		$this->db->from('friends');
		$this->db->where($condition);
		$query = $this->db->get();
		if ($query->num_rows() == 1) {
			$result = $query->result_array();
			$frd_reqs = $result[0]['friend_req_ids'];
			$frd_reqs = explode(',',$frd_reqs);
			if (in_array($req_id, $frd_reqs)) 
			{
				unset($frd_reqs[array_search($req_id,$frd_reqs)]);
			}
			$rem_req = implode(',',$frd_reqs);
			$data = array(
               'friend_req_ids' => $rem_req,
            );
			$this->db->where('cust_id', $id);
			$this->db->update('friends', $data); 
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
	}
	
	public function blockfriend($req_id)
	{
		$id = $this->session->userdata('logged_in')['account_id'];
	    $condition = "cust_id =" . "'" . $id . "'";
		$this->db->select('*');
		$this->db->from('friends');
		$this->db->where($condition);
		$query = $this->db->get();
		if ($query->num_rows() == 1) {
			$result = $query->result_array();
			$frd_reqs = $result[0]['friend_req_ids'];
			$blocked_frnds = $result[0]['blocked_friend_ids'];
						
			if(!empty($blocked_frnds))
			$blocked_frnds.=",".$req_id;
			else 
			$blocked_frnds =$req_id;
			$frd_reqs = explode(',',$frd_reqs);
			if (in_array($req_id, $frd_reqs)) 
			{
				unset($frd_reqs[array_search($req_id,$frd_reqs)]);
			}
			$rem_req = implode(',',$frd_reqs);
			$data = array(
               'friend_req_ids' => $rem_req,
			   'blocked_friend_ids' => $blocked_frnds,
            );
			$this->db->where('cust_id', $id);
			$this->db->update('friends', $data); 
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
}
?>